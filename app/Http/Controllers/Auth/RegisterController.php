<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Country;
use App\Helpers;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/auth/account-created';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255|min:2',
            'lastname' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'companyname' => 'required|min:2',
            'country_id' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'country_id' => $data['country_id'],
            'email' => $data['email'],
            //'activation_code' => $data['activation_code'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegister(){
        $data['countries'] = Country::active()->get();
        return view('auth.register')->with($data);
    }

    public function showReset(){
        return view('auth.reset');
    }

    public function createSuccess(){
        return view('auth.account-created');
    }

    public function doRegister(){
        $rules = array(
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        );

        // run the validation rules on the Requests from the form
        $validator = Validator::make(Request::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('secure/register')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Request::except('password')); // send back the Request (not the password) so that we can repopulate the form
        } else {

            // check for unique email
            $user = User::where('email','=',Request::get('email'))->first();

            if($user === null) {
                // create our user data for the authentication
                $input = Request::all();
                //generate activation code for user
                $input['activation_code'] = generate_verification_code();

                // create user and commit to db
                $user = $this->create($input);


                //Send verifcation email
//                try {
//                    Mail::send('emails.auth.welcome', [
//                        'first_name' => $user->firstname,
//                        'last_name' => $user->lastname,
//                        'email_address' => $user->email,
//                        'code' => $user->activation_code
//                    ], function ($mail) use ($user) {
//                        $mail->from('do-not-reply@my-gpi.com', 'Global Performance Index');
//                        $mail->to($user->email, $user->firstname . " " . $user->lastname)
//                            ->subject('GPI Account Activation');
                        //$mail->bcc('krish.ranganath@my-gpi.com', 'Dr Krish');
                    //});
                    //send registration details to krish
//                    Mail::send('emails.auth.registration', [
//                        'email_address' => $user->email,
//                        'first_name' => $user->firstname,
//                        'last_name' => $user->lastname,
//                        'phone' => $user->individual->phone,
//                        'user_type' => 'Individual',
//                    ], function ($mail) use ($user) {
//                        $mail->from('do-not-reply@my-gpi.com', 'Global Performance Index');
//                        $mail->to('info@my-gpi.com', 'Kris Ranganath')
//                            ->subject('GPI - New User Registration');
//                    });
//                } catch (\Exception $e) {
//                    return redirect('secure/account-created')
//                        ->with('auth_error', $e->getMessage())
//                        ->withInput();
//                }

                if($user)
                    return view('auth.account-created');
                else {
                    $data['error'] = "Error creating account";
                    return view('auth.register')->with($data);
                }
            } else {
                $data['email_error'] = 'Your email address has already registered.';
                return view('auth.register')->with($data);
            }

        }
    }

    public function doReset(){
        $rules = array(
            'email' => 'required|email|max:255|unique:users',
        );

        // run the validation rules on the Requests from the form
        $validator = Validator::make(Request::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('password/reset')
                ->withErrors($validator); // send back all errors to the login form
        } else {
            //find user
            $user = User::where('email','=',Request::get('email'))->get()->first();
            if($user != null){

            }else{
                $data['errors'] = "Cannot find user record";
                return view('auth.reset')->with($data);
            }
        }
    }
}
