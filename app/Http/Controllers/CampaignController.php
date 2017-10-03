<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Campaign;

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

    public function submitAd(Request $request){
        $data = $request->all();

        //get the no of connections
        $locations = explode(',',$data['locations']);
        $data['connections'] = count($locations)*1000;

        $validator = $this->validator($request->all());

        if (!$validator->passes()) {
            return response()->json(['status' => '201', 'message' => trans('auth.login_failed')]);
        } else {
            $upload = $this->uploadImage($request);
            dd(public_path());
            $campaign = Campaign::create($data);
            if($campaign)
                return view('campaign.show-ad');
        }
    }

    public function uploadImage(Request $request){
        if($request->hasFile('graphicad1') || $request->hasFile('graphicad2')){
            $file1 = $request->file('graphicad1');
            $file2 = $request->file('graphicad2');
            $username = auth()->user()->username;
            File::exists(public_path() . '/uploads/'.$username) || File::makeDirectory(public_path() . '/uploads/'.$username, $mode = 0777, true, true);
            //upload path
            $destinationPath = public_path().'/uploads/'.$username.'/';
            dd($destinationPath);

            if($file1){
                //get temp file name
                $file_name1 = $file1->getClientOriginalName();
                //get extension
                $file_ext = File::extension($file_name1);
                $file_size = $file1->getClientSize();
                $upload1 = $file1->move($destinationPath, $file_name1);
            }
            if($file2){
                //get temp file name
                $file_name2 = $file2->getClientOriginalName();
                //get extension
                $file_ext = File::extension($file_name2);
                $file_size = $file2->getClientSize();
                $upload2 = $file2->move($destinationPath, $file_name2);
            }

            return $destinationPath;

            if ($upload1 || $upload2) {
                return ($upload1 && $upload2) ? $upload1.'|'.$upload2 : ($upload1) ? $upload1 : $upload2;
            } else {
                return false;
            }
        }
    }

    public function showAd(){
        return view('campaign.show-ad');
    }
}
