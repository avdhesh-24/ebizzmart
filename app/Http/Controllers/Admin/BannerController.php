<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Banner;
use Auth;
use Helper;
use Image; 
class BannerController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $lists = Banner::orderBy('id','DESC')->get();
        return view('admin.banner.list',compact('lists'));
    }

    public function New(){
        return view('admin.banner.add');
    }

    public function Edit($Id){
        $lists = Banner::find($Id);
        return view('admin.banner.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $data = Banner::find($r->removeId);
        if(!empty($data->image) && file_exists(public_path('uploads/banner-bottom/'.$data->image))){
            unlink(public_path('uploads/banner-bottom/'.$data->image));
        }
        $data->delete();
        return back()->with('success_msg', 'Banner data have been remove successfully.');
    }

    public function Status($Status,$Id){
        Banner::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Banner status have been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp|required',
        ]); 
        $extension =  $r->image->getClientOriginalExtension();
        if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
            $FileName = Helper::DirectFile('uploads/banner/',$r->image);
        }else{
            $FileName = Helper::ImageWithSize('uploads/banner/',1920,925,$r->image);
        }
        $Newextension=strtoupper($extension);
        $Alt=$r->alt;
        $data = new Banner();
        $data->image = $FileName;
        $data->image_alt = $r->banner_text;
        $data->link = $r->banner_link;
        $data->save();
        return back()->with('success_msg', 'Banner data have been saved successfully.');
    }

    public function Update(Request $r){
        if(empty($r->image)){
            $FileName = $r->preimage;
            $Newextension=$r->pretype;
        }else{
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $FileName = Helper::DirectFile('uploads/banner/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/banner/',1920,925,$r->image);
            }
            $Newextension=strtoupper($extension);
        }
            $Alt=$r->alt;
        $data = Banner::find($r->preId);
        $data->image = $FileName;
        $data->image_alt = $r->banner_text;
        $data->link = $r->banner_link;
        $data->save();
        
        return back()->with('success_msg', 'Banner data have been updated successfully.');
    }
}
