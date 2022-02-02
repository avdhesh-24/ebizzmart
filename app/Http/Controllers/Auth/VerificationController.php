<?php



namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\VerifiesEmails;

use App\Mail\CommanEmail;

use App\Models\User;

use Mail;

class VerificationController extends Controller

{

    use VerifiesEmails;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }



    public function verify(Request $request) {

        $userID = $request['id'];

        $user = User::findOrFail($userID);

        $date = date("Y-m-d g:i:s");

        $user->email_verified_at = $date; 

        $user->last_login = date('Y-m-d');

        $user->status =1; 

        $user->verification_status =1; 

        $user->save();





        self::sendOfferMail($user->email);

 

        return redirect(route('account.complete-registration'))->with(array('success_msg' => 'Thank you for verifying your email address and your email has been verified!')); 

    }



    public function sendOfferMail($email){

        $data = [

            'title' => 'Thank you for verifying your email address.',

            'subject' => 'Thank you for verifying your email address',

            'description'=>'Your new account has been activated and you can now access your account and upgrade you plans.<br><br> You can login with your <b>username ('.$email.')</b> and <b>password</b> to get started.',

            'url' => url('my-profile')

        ];

  

       return  Mail::to($email)->send(new CommanEmail($data));

    }

}

