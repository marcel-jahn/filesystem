<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function postRegister(Request $request)
    {
        $rules = array(
            'name'                  => 'required',                        // just a normal required validation
            'email'                 => 'required|email|unique:users',     // required and must be unique in the ducks table
            'password'              => 'required|min:3|confirmed',
        );

        $validator = Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return redirect('/files/register')
                ->withErrors($validator);

        } else {
            $data = $request->all();
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            return redirect('files/user');
        }
    }
    public function postLogin(){
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = \Validator::make(\Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return redirect('files/login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(\Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => \Input::get('email'),
                'password'  => \Input::get('password')
            );

            // attempt to do the login
            if (\Auth::attempt($userdata)) {
                $user = \Auth::user();
                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                return redirect('files/user/show');

            } else {        

                // validation not successful, send back to form 
                return redirect('files/login');

            }

        }
    }

    public function getIndex(){
        if(!\Auth::check()){
           return redirect('files/login');
        }else{
            return redirect('files/user/show');
        }
    }
    public function getLogin(){
        return view('filemanager.auth.login');
    }
    public function getRegister(){
        return view('filemanager.auth.register');
    }
    public function getLogout(){
        \Auth::logout();
        return redirect('/files/login');
    }

}
