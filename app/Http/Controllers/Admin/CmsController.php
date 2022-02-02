<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Cms;
use Auth;
use Helper;
use Image;
class CmsController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index($Id){
        $lists = Cms::find($Id);
        $pagetitle = $lists->page;
        return view('admin.cms.edit',compact('lists','pagetitle'));
    }

    public function Update(Request $r){
        if($r->preId==2){
            $validated = $r->validate([
                'description' => 'required',
                'title' => 'required',
                'heading' => 'required',
            ]);
        }
        if($r->preId==1){
            $validated = $r->validate([
                'description' => 'required',
            ]);
        }
        
        if(empty($r->image)){
            $FileName = $r->preimage;
        }else{
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = Helper::DirectFile('uploads/cms/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/cms/',400,469,$r->image);
            }
        }
        
        if(empty($r->image2)){
            $FileName2 = $r->preimage2;
        }else{ 
            $extension2 =  $r->image2->getClientOriginalExtension();
            if(strtoupper($extension2)=='SVG' || strtoupper($extension2)=='WEBP'){
                $FileName2 = Helper::DirectFile('uploads/cms/',$r->image2);
            }else{
                $FileName2 = Helper::ImageWithSize('uploads/cms/',400,469,$r->image2);
            }
        }
        
        $Data = CMS::find($r->preId);
        $Data->title = $r->title;
        $Data->heading = $r->heading;
        $Data->description = $r->description;
        $Data->image = $FileName;
        $Data->img = $FileName2;
        $Data->image_alt = $r->title;
        $Data->img_alt = $r->title;
        $Data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }

    public function Update2(Request $r){
        $validated = $r->validate([
            'description' => 'required',
            'title' => 'required',
            'banner' => 'required|mimes:jpeg,jpg,png,gif,svg,webp|max:2024',
            'meta_title' => 'required',
        ]);

        if(empty($r->banner)){
            $FileName = $r->prebanner;
        }else{
            if(file_exists(public_path('uploads/cms/'.$r->banner))){
                unlink(public_path('uploads/cms/'.$r->banner));
            }

            $extension =  $r->banner->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = Helper::DirectFile('uploads/cms/',$r->banner);
            }else{
                $FileName = Helper::ImageWithSize('uploads/cms/',1600,469,$r->banner);
            }
        }

        $Data = CMS::find($r->preId);
        $Data->title = $r->title;
        $Data->description = $r->description;
        $Data->banner = $FileName;
        $Data->meta_title = $r->meta_title;
        $Data->meta_keywords = $r->meta_keywords;
        $Data->meta_description = $r->meta_description;
        $Data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
}
