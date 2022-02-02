<?php



namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use App\Providers\RouteServiceProvider;

use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

use Mail;

use Session;



class RegisterController extends Controller{

    

    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    

    public function __construct()

    {

        $this->middleware('guest');

    }



    protected function validator(array $data){

        return Validator::make($data, [

            'name'=>'required|string|max:255',

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'mobile' => ['required','min:10','numeric'],

            'password' => ['required','min:8'],

            

        ]);

    }



    protected function create(array $data){
        Session::flash('success_msg', "Thank You for creating your account. We have sent a verification link on your Email ID, please click it to verify your Email ID.");

        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'mobile' => $data['mobile'],

            'user_id' => 'EBZ-'.random_int(100, 100000),

            'password' => bcrypt($data['password']),

          ]);

        

         Mail::to($user->email)->send(new ActivateMail($user));

        

    }



    public function Verification(Request $request){

        if (! $request->hasValidSignature()) {

            abort(401);

        }

    }

    



}

