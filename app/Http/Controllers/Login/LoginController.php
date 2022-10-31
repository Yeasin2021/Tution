<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Rules\UpdatePassword;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{


    public function loginForm(){
        $notify[]=['info','Pleaze Login First'];
        return view('login.login')->withNotify($notify);
    }


    public function login(Request $request){


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',


        ]);

        if ($validator->fails()) {

           $messages = $validator->messages();

                foreach ($messages->all() as $message)
                {
                    toastr()->error ( $message);
                }

             return redirect()->back()->withInput();
       }


        $loginData=$request->only('email','password');
        if(Auth::attempt($loginData)){
            $request->session()->regenerate();
            $notify[]=['info','Welcome To Admin Panel.'];
            // toastr()->info("Welcome To Admin Panel.");
            return redirect()->route('dash-board')->withNotify($notify);
        }else{

            $notify[]=['error','These credentials do not match our records.'];
            // return view('login.login')->withNotify($notify);

        //   toastr()->error("These credentials do not match our records.");
        //   toastr()->warning('Warning Message');
          return redirect()->back()->withNotify($notify);
      }

    }



    public function logout(){
        Auth::logout();
        // toastr()->success("Logout Successful.");
        $notify[]=['info','Logout Successful.'];
        return redirect()->route('login-form')->withNotify($notify);

  }



//   Fprget password Method


  public function forgetPassword(){
    return view('login.forget-password');

  }

  public function forgetPasswordLink(Request $request){
      $request->validate([
          'email' => 'required|email'

      ]);
     $user = User::where('email', $request->email)->first();
    //  dd($user);


     if($user){
     Password::sendResetLink(
      $request->only('email')
      );
        //  toastr()->success("You will get a reset link in your email");
        //  return \redirect()->back();
        $notify[]=['info','You will get a reset link in your email'];
        return \redirect()->back()->withNotify($notify);

     }else{
        //  toastr()->error('Sorry, Your e-mail is invalid');
        //  return \redirect()->back();
        $notify[]=['info','Your e-mail is invalid'];
        return \redirect()->back()->withNotify($notify);
     }
  }


  public function passwordReset($p_token, $p_email){
       $token = $p_token;
       $email = $p_email;

      return view('login.reset-password', \compact('token','email'));
  }
  public function resetPassword(Request $request){
      $request->validate([
          'token' => 'required',
          'email' => 'required|email',
          'password' => 'required|min:6|confirmed',
      ]);
      $user = User::where('email', $request->email)->first();


      Password::reset(
          $request->only('email', 'password', 'password_confirmation', 'token'),
          function ($user, $password) use ($request) {
              $user->forceFill([
                  'password' => bcrypt($password)
              ])->setRememberToken(Str::random(60));

              $user->save();


          });

        //   toastr()->success("Your passowrd reset successfully");
        //   return \redirect()->route('login-form');
        $notify[]=['info','Your passowrd reset successfully'];
        return \redirect()->route('login-form')->withNotify($notify);


  }



//   Reset Password Method Or Change password By Admin Panel


public function password()
    {

      return view('login.update_reset_password');

    }


    //user update password method By Admin Panel
    public function updatePassword(Request $request)
    {
       $this->validate($request,[
           'old_password' => ['required', new UpdatePassword()],
           'password'=> 'required|min:6|confirmed'
       ]);

       try{

           auth()->user()->update([
                'password' => \bcrypt($request->password),
           ]);

           Auth::logout();

           $notify[]=['info','Your Password Reset Successfully'];
           return redirect()->route('login-form')->withNotify($notify);


       }catch(Throwable $exception){
           $notify[]=['info','Something is Worng'];
           return redirect()->back()->withNotify($notify);
        //    toastr()->error('Something is Worng');
        //    return redirect()->back();
       }


    }








}
