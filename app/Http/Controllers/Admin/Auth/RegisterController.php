<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    
    public function __construct(){
        $this->middleware('guest');
    }

    protected function validator(array $data){
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required','min:10','numeric'],
            'password' => ['required','min:8'],
            'name' => ['required','string', 'max:255',]
        ]);
    }

    protected function create(array $data){
        Session::flash('success_msg', "Thank You for creating your account. We have sent a verification link on your Email ID, please click it to verify your Email ID.");
        
        $user = new User();
        $user->email = $data['email'];
        $user->mobile = $data['mobile'];
        $user->user_id = 'EBZ-'.random_int(100, 100000);
        $user->password = bcrypt($data['password']);
        $user->name = $data['name'];
        $user->save();

        return $user;
        Mail::to($user->email)->send(new ActivateMail($user));
    }



    public function Verification(Request $request){

        if (! $request->hasValidSignature()) {

            abort(401);

        }

    }

    
}
