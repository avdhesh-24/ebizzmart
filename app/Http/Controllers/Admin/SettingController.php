<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Admin;
use Hash;
use Auth;
class SettingController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $setting=Setting::find(1);
        return view('admin.setting',compact('setting'));
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'mail' => 'required|email',
            'address' => 'required',
            'invoice_email' => 'required|email',
            'mobile' => 'required|digits:10',
        ]);

        $Data = Setting::find(1);
        $Data->mail = $r->mail;
        $Data->cc = $r->cc;
        $Data->invoice_address = $r->address;
        $Data->invoice_email = $r->invoice_email;
        $Data->invoice_mobile = $r->mobile;
        $Data->note = $r->note;
        $Data->save();

        if(!empty($r->name) && !empty($r->email) && !empty($r->old_pass) && !empty($r->new_pass)){
            if($r->old_pass!='' && Hash::make($r->old_pass)!=Auth::guard('admin')->user()->password){ return back()->with('error_msg', 'Old Password Does`t Match.'); }
            $data = Admin::find(Auth::guard('admin')->user()->id);
            $Data->name = $r->name;
            $Data->email = $r->email;
            $Data->password = Hash::make($r->new_pass);
            $Data->save();
        }

        
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
}
