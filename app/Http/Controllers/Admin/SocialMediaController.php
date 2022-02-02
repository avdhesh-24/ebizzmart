<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Auth;
use Helper;
use Image;
class SocialMediaController extends Controller{ 
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $lists = SocialMedia::orderBy('id','DESC')->get();
        $platforms=array('facebook'=>'Facebook','youtube'=>'Youtube','linkedin'=>'Linkedin','twitter'=>'Twitter','instagram'=>'Instagram');
        return view('admin.social-media.add',compact('lists','platforms'));
    }

    public function Remove(Request $r){
        $Data = SocialMedia::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data have been remove successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
                'platform' => 'required',
                'link' => 'required|url',
            ]);
        $Data = new SocialMedia();
        $Data->title = $r->platform;
        $Data->link = $r->link;
        $Data->save();
        return back()->with('success_msg', 'Data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'edit_platform' => 'required',
            'edit_link' => 'required|url',
        ]);

        $Data = SocialMedia::find($r->preId);
        $Data->title = $r->edit_platform;
        $Data->link = $r->edit_link;
        $Data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }

}
