<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Session;
use Mail;
use Hash;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
        Auth::logout();
        return  redirect()->back()->with(array('success_msg' => 'You are logout! thanks for coming!'));
    }

    public function Account_Login(Request $r){
        $this->validate($r,[
            'login_email'=>'required',
            'login_password'=>'required'
         ]);

        $Email = $r->login_email;
        $Password = $r->login_password;

        $email_count = User::where('email',$Email)->orwhere('matrin_id',$Email)->count();
        if ($email_count == 1):
            $get_pass = User::where('email',$Email)->orwhere('matrin_id',$Email)->first();
		    $db_password = $get_pass->password;
            $email = $get_pass->email;
            $Name = $get_pass->name;
            if($get_pass->verification_status==0):
                return redirect()->back()->with(array('error_msg' => 'This account is not verify please click the link given on email to verify account!')); 
            endif;    
            if (Hash::check($Password, $db_password)):
                $random_data = str_random(8);
                User::where('email', $email)->update(['remember_token' => $random_data,'last_login'=>date('Y-m-d')]);
			    if(Auth::attempt(['email' => $email, 'password' => $Password,'status' => 1])):
                    Session::put('random_data', $random_data);
                    return redirect()->back()->with(array('success_msg' => 'Welcome Back! '.$Name));
                else:
                    return redirect()->back()->with(array(
                        'error_msg' => 'This account is still under review, We`ll notify through email when the account is activated.'
                    ));    
                endif; 
            else:
                return redirect()->back()->with(array('error_msg' => 'Password does not match.Please choose correct password!'));
            endif; 
        else:
            return redirect()->back()->with(array('error_msg' => 'This account is not registred.Please choose correct and  registred account!'));       
        endif;
    }


}
