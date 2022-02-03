<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use Auth;
use Helper;
use Image;
class ContactController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $lists = ContactInfo::orderBy('id','DESC')->get();
        return view('admin.contact.list',compact('lists'));
    }

    public function New(){
        return view('admin.contact.add');
    }

    public function Edit($Id){
        $lists = ContactInfo::find($Id);
        return view('admin.contact.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $Data = ContactInfo::find($r->removeId)->delete();
        return back()->with('success_msg', 'Contact Info data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = ContactInfo::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'Contact Info status have been updated successfully.');
    }


    public function Save(Request $r){
        $validated = $r->validate([
                'title' => 'required',
                'location' => 'required',
                
            ]);
        $Data = new ContactInfo();
        $Data->title = $r->title;
        $Data->location = $r->location;
        $Data->address = $r->address;
        $Data->mobile = $r->mobile;
        $Data->phone = $r->phone;
        $Data->email = $r->email;
        $Data->save();
        return back()->with('success_msg', 'Contact Info data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
            'location' => 'required',
        ]);

        $Data = ContactInfo::find($r->preId);
        $Data->title = $r->title;
        $Data->location = $r->location;
        $Data->address = $r->address;
        $Data->mobile = $r->mobile;
        $Data->phone = $r->phone;
        $Data->email = $r->email;
        $Data->save();
        return back()->with('success_msg', 'Contact Info data have been updated successfully.');
    }
}
