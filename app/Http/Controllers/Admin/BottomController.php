<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Bottom;
use Auth;
use Helper;
use Image;
class BottomController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){
        return view('admin.bottom.list');
    }

    public function New(){
        return view('admin.bottom.add');
    }

    public function Edit($Id){
        $lists = Bottom::find($Id);
        return view('admin.bottom.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $data = Bottom::find($r->removeId);
        if(!empty($data->image) && file_exists(public_path('uploads/banner-bottom/'.$data->image))){
            unlink(public_path('uploads/banner-bottom/'.$data->image));
        }
        $data->delete();
        return back()->with('success_msg', 'Banner data have been remove successfully.');
    }

    public function Status($Status,$Id){
        Bottom::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Data status have been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp|required',
        ]); 
        $extension =  $r->image->getClientOriginalExtension();
        if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
            $FileName = Helper::DirectFile('uploads/banner-bottom/',$r->image);
        }else{
            $FileName = Helper::ImageWithSize('uploads/banner-bottom/',70,70,$r->image);
        }
        $Newextension=strtoupper($extension);
        $Alt=$r->alt;
        $data = new Bottom();
        $data->image = $FileName;
        $data->button = $r->button;
        $data->title = $r->title;
        $data->link = $r->link;
        $data->save();
        return back()->with('success_msg', 'Data have been saved successfully.');
    }

    public function Update(Request $r){
        

            if(empty($r->image)){
                $FileName = $r->preimage;
            }else{
                $extension =  $r->image->getClientOriginalExtension();
                if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                    $FileName = Helper::DirectFile('uploads/banner-bottom/',$r->image);
                }else{
                    $FileName = Helper::ImageWithSize('uploads/banner-bottom/',70,70,$r->image);
                }
            }
        $data = Bottom::find($r->preId);
        $data->image = $FileName;
        $data->button = $r->button;
        $data->title = $r->title;
        $data->link = $r->link;
        $data->save();
        return back()->with('success_msg', 'Data data have been updated successfully.');
    }
}
