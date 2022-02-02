<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserImage;
use App\Models\UserShortlist;
use Auth;
use Helper;
use Image;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index($Id=null){
        if(!empty($Id)){
            $lists = User::with('image')->find($Id);
            $images = UserImage::where('user_id',$Id)->get();
            $shortlists = UserShortlist::join('users','user_shortlists.shortlist_user','users.id')->where('user_shortlists.user_id',$Id)->get();
            return view('admin.user.detail',compact('lists','images','shortlists'));
        }else{
            $lists = User::orderBy('id','DESC')->get();
            return view('admin.user.list',compact('lists'));
        }
        
    }

    public function Remove(Request $r){
        $User = User::find($r->removeId);

        $subject=$User->matrin_id.' Account deleted.';
        $title='Hi, '.$User->name;
        $message='Your account ('.$User->matrin_id.') has been removed.if you any query please contact us on info@matrin.com';
        Helper::sendMail($User->email,$subject,$title,$message);   
        $Data = User::find($r->removeId)->delete(); 
        return back()->with('success_msg', 'User ('.$User->matrin_id.') account have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = User::find($Id);
        $Data->status = $Status;
        $Data->save();
        if($Status==0){
            $subject=$Data->matrin_id.' Account Deactivate.';
            $title= 'Hi, '.$Data->name;
            $message='Your account ('.$Data->matrin_id.') deactivated.if you any query please contact us on info@matrin.com';
        }else{
            $subject=$Data->matrin_id.' Account Activate.';
            $title='Hi, '.$Data->name;
            $message='Your account ('.$Data->matrin_id.') activated.if you any query please contact us on info@matrin.com';
        }
        
        Helper::sendMail($Data->email,$subject,$title,$message);
        return back()->with('success_msg', 'User ('.$Data->matrin_id.') status have been updated successfully.');
    }

    public function Verification_Status($Status,$Id){
        $Data = User::find($Id);
        $Data->verification_status = $Status;
        $Data->save();

        if($Status==0){
            $subject='Account verification request is not approved.';
            $title='Hi, '.$Data->name;
            $message='Your account ('.$Data->matrin_id.') verification request is disapproved.if you any query please contact us on info@matrin.com';
        }else{
            $subject='Account verification request is approved.';
            $title='Hi, '.$Data->name;
            $message='Your account ('.$Data->matrin_id.') verification request is approved.if you any query please contact us on info@matrin.com';
        }
        
        Helper::sendMail($Data->email,$subject,$title,$message);
        return back()->with('success_msg', 'User ('.$Data->matrin_id.') verification status have been updated successfully.');
    }
}
