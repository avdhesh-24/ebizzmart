<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Session;
use Hash;
use URL;
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
    protected $redirectTo = RouteServiceProvider::ADMINHOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }

    public function login(Request $r){
        $validated = $r->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]); 
        $email = $r->input('email');
        $password = $r->input('password');
        $keep_me = $r->input('keep_me');
        if(Admin::where('email',$email)->count()>0):
            $Check=Admin::where('email',$email)->get();
            if (Hash::check($password,$Check[0]->password)):
                if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])):
                    return redirect('/control-panel/dashboard/')->with(['success_msg' => 'Welcome Back! '.Auth::guard('admin')->user()->name.'.']);
                endif;    
            else:
              return redirect()->back()->with(['error_msg' => 'Password does not match.']);  
            endif;    
        else:
              return redirect()->back()->with(['error_msg' => 'This email not registered.please enter currect email address.']);
        endif;    
    }
    
    protected function guard(){
        return Auth::guard('admin');
    }
}
