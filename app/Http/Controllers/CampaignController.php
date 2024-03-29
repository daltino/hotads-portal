<?php

namespace App\Http\Controllers;

use App\Location;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Campaign;
use File;
//use Intervention\Image\ImageManagerStatic as Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CampaignController extends Controller
{
    protected function validator(array $data, $captcha = null)
    {
        $rules = [
            'locations'      => 'required',
        ];
        return Validator::make($data, $rules);
    }

    //
    /**
     *  Function to create ad campaign
     */
    public function createAd(){
        return view('campaign.create-ad');
    }


    // Function to submit advert
    public function submitAd(Request $request){
        $data = $request->all();

        //get the no of connections
        $data['connections'] = 1000;
        $data['user_id'] = auth()->user()->id;

        $validator = $this->validator($request->all());

        if (!$validator->passes()) {
            return response()->json(['status' => '201', 'message' => trans('auth.login_failed')]);
        } else {
            $upload = $this->uploadImage($request);
            if(strstr($upload,'|')){
                $upload = explode('|',$upload);
                $data['graphicad1'] = $upload[0];
                $data['graphicad2'] = $upload[1];
            }else
                $data['graphicad1'] = $upload;

            $campaign = Campaign::create($data);
            if($campaign){
                $campaigns = Campaign::where('user_id',auth()->user()->id)->get();

                //mail admin about new campaign
                $user = auth()->user();

                Mail::send('emails.campaign', ['user' => $user, 'campaign'=>$campaign], function ($m) use ($user,$campaign) {
                    $m->from('noreply@hotads.co', 'Hotads');

                    $m->to('info@hotads.co,whyte.dalton@hotads.co,daltino06@yahoo.com,tariah.kennedy@hotads.co,atamuno.florence@hotads.co,', 'Hotads Admin')->subject('New Campaign Request from ' . $user->firstname.' '.$user->lastname.' of '.$user->company_name);
                });

                return view('campaign.show-ad')->with('campaigns',$campaigns);
            } else {

            }
        }
    }


    // Function to upload image ad 1 & 2
    public function uploadImage(Request $request){
        if($request->hasFile('graphicad1') || $request->hasFile('graphicad2')){
            $file1 = $request->file('graphicad1');
            $file2 = $request->file('graphicad2');
            $username = auth()->user()->username;
            File::exists(public_path() . '/uploads'.$username) || File::makeDirectory(public_path() . '/uploads'.$username, $mode = 0777, true, true);
            //upload path
            $destinationPath = public_path().'/uploads'.$username.'/';
            $upload1 = false; $upload2 = false;

            if($file1){
                //get temp file name
                $file_name1 = $file1->getClientOriginalName();
                //get extension
                $file_ext = File::extension($file_name1);
                $file_size = $file1->getClientSize();
                $upload1 = $file1->move($destinationPath, $file_name1);
                $upload1 = '/uploads/'.$file_name1;
            }
            if($file2){
                //get temp file name
                $file_name2 = $file2->getClientOriginalName();
                //get extension
                $file_ext = File::extension($file_name2);
                $file_size = $file2->getClientSize();
                $upload2 = $file2->move($destinationPath, $file_name2);
                $upload2 = '/uploads/'.$file_name2;
            }

            if ($upload1 && $upload2) {
                return $upload1.'|'.$upload2;
            } else if($upload1) {
                return $upload1;
            } else if($upload2) {
                return $upload2;
            } else {
                return false;
            }
        }
    }

    // Get used impressions for a location
    public function getUsedConnections($location, $startDate)
    {
        $startDate = $startDate->toDateTimeString();
        $api_key = '3eca0f02fbf59a1667854d77b858cd1e';
        $root = 'https://api.hotspotsystem.com/v2.0';
        $url = $root . '/locations/';
        $todayconn = 0;
        $usedconn = 0;
        $phn = 'PH Mall';
        $ph = 0;
        $pht = 0;
        $headers = array(
            'sn-apikey: ' . $api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);

        if ($info['http_code'] === 200) {
            // Do something with the response
            $json = json_decode($response, true);
            $spots = '';
            $phdone = 0;
            $pht = 0;
            $ph = 0;
            foreach($json['items'] as $spot){
                //&& $spot['name'] != 'BLD by Play'
                if($spot['name'] == $location){
                    //get customers
                    $spot_id = $spot['id'];
                    $i = 0;
                    while($i < 3){
                        $offset = $i*1000;
                        $url = $root.'/locations/'.$spot['id'].'/transactions/mac?limit=1000&offset='.$offset.'&sort=-id';
                        $chc = curl_init();
                        curl_setopt($chc, CURLOPT_URL, $url);
                        curl_setopt($chc, CURLOPT_HTTPHEADER, $headers);
                        curl_setopt($chc, CURLOPT_TIMEOUT, 30);
                        curl_setopt($chc, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($chc, CURLOPT_VERBOSE, true);
                        $responsec = curl_exec($chc);
                        $infoc = curl_getinfo($chc);
                        if($infoc['http_code'] == 200){
                            $jsonc = json_decode($responsec);
                            $today = date('Y-m-d');
                            foreach($jsonc->items as $mact){
                                if(strtotime($mact->action_date_gmt) > strtotime('midnight')){
                                    $todayconn++;
                                }
                            }
                            foreach($jsonc->items as $mact){
                                if(strtotime($mact->action_date_gmt) > strtotime($startDate)){
                                    $usedconn++;
                                }
                            }
                        }
                        if($spot['name'] == 'PH Mall' || $spot['name'] == 'GNC PH'){
                            $phn = 'PH Mall';
                            $ph += $todayconn;
                            $pht += $jsonc->metadata->total_count;
                            if($phdone == 0)
                                $phdone++;
                        }
                        else{
                        }
                        curl_close($chc);
                        $i++;
                    }
                }
            }
        }
        curl_close($ch);
        return [$todayconn,$usedconn,$ph,$pht];
    }

    // Function to call the hotspotsystem.com API for subscribers
    public function getSubscribers($location,$startDate,$endDate){
        $startDate = $startDate->toDateString();
        $endDate = $endDate->toDateString();
        $api_key = '3eca0f02fbf59a1667854d77b858cd1e';
        $root = 'https://api.hotspotsystem.com/v2.0';
        $url = $root . '/locations/'.$location.'/customers?limit=1000&sort=-id';
        $headers = array(
            'sn-apikey: ' . $api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        $users = array();

        if ($info['http_code'] === 200) {
            // Do something with the response
            $json = json_decode($response, true);
            foreach($json['items'] as $subscriber){
                if($subscriber['email'] || $subscriber['phone']){
                    array_push($users,$subscriber);
                }
            }
        }
        curl_close($ch);
        return $users;
    }

    // Function to list all adverts
    public function showAd(){
        $campaigns = Campaign::where('user_id',auth()->user()->id)->get();
        $grandtotal = 0;
        foreach($campaigns as $campaign){
            $usedConns = $this->getUsedConnections($campaign->locations,$campaign->created_at);
            $campaign->used_connections = $usedConns[1];
            $grandtotal += $usedConns[1];
            $campaign->today_connections = $usedConns[0];
            $campaign->save();
        }
        return view('campaign.show-ad',compact('campaigns','grandtotal'));
    }

    // Function to list users for a specific hotspot location
    public function showUsers($cid){
        $campaign = Campaign::find($cid);
        $location = Location::where('name',$campaign->locations)->first();
        $starDate = Carbon::now();
        $endDate = Carbon::now();
        $users = $this->getSubscribers($location->hsID,$starDate,$endDate);
        return view('campaign.show-users',compact('users','location'));
    }

    public function showEditAd($cid)
    {
        $campaign = Campaign::find($cid);
        return view('campaign.edit-ad')->with('campaign',$campaign);
    }

    public function updateAd(Request $request)
    {
        $data = $request->all();
        $cid = $data['cid'];
        $campaign = Campaign::find($cid);

        $data['user_id'] = auth()->user()->id;

        $validator = $this->validator($request->all());

        if (!$validator->passes()) {
            return response()->json(['status' => '201', 'message' => 'Invalid details submitted!']);
        } else {
            $upload = $this->uploadImage($request);
            if(strstr($upload,'|')){
                $upload = explode('|',$upload);
                $data['graphicad1'] = $upload[0];
                $data['graphicad2'] = $upload[1];
            }else
                $data['graphicad1'] = $upload;

            $campaign->location = $data['locations'];
            $campaign->graphicad1 = $data['graphicad1'];
            $campaign->graphicad2 = $data['graphicad2'];
            $campaign->videolink = $data['videolink'];
            $campaign->ssid = $data['ssid'];
            $campaign->save();

            $campaigns = Campaign::where('user_id',auth()->user()->id)->get();
            return view('campaign.show-ad')->with('campaigns',$campaigns);
        }
    }

    public function deleteAd($cid)
    {
        $campaign = Campaign::find($cid);
        $campaign->delete();
        $this->showAd();
    }

    // Function to reach support
    public function contactSupport()
    {
        return view('support');
    }

    // Function to post email of support form
    public function submitContactSupport(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();

        Mail::send('emails.support', ['user' => $user, 'message'=>$data], function ($m) use ($user,$data) {
            $m->from('noreply@hotads.co', 'Hotads');

            $m->to('info@hotads.co,whyte.dalton@hotads.co,daltino06@yahoo.com,tariah.kennedy@hotads.co,atamuno.florence@hotads.co,', 'Hotads Admin')->subject('Support Request from ' . $user->firstname.' '.$user->lastname.' of '.$user->company_name);
        });

    }
}
