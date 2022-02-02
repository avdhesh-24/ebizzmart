<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Helper;
class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.brand');
    }
    public function Edit(Request $r){
        $validated = $r->validate([
            'edit_name' => 'required',
            'alias' => 'required',
            'edit_meta_title' => 'required',
        ]); 

        if(!empty($r->image)){
            $extension =  $r->icon->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = Helper::DirectFile('uploads/brand/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/brand/',200,200,$r->image);
            }
        }else{
            $FileName = $r->preimage;
        }
        
        $data = Brand::find($r->editId);
        $data->name = $r->edit_name;
        $data->alias = $r->alias;
        $data->icon = $FileName;
        $data->meta_title = $r->edit_meta_title;
        $data->meta_keywords = $r->edit_meta_keywords;
        $data->meta_description = $r->edit_meta_description;
        $data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
    public function Save(Request $r){
        $validated = $r->validate([
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp|required',
            'meta_title' => 'required',
        ]); 
        $extension =  $r->image->getClientOriginalExtension();
        if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
            $FileName = Helper::DirectFile('uploads/brand/',$r->image);
        }else{
            $FileName = Helper::ImageWithSize('uploads/brand/',200,200,$r->image);
        }
        $data = new Brand();
        $data->name = $r->name;
        $data->alias = Helper::NewAlias('brands','name',$r->name);
        $data->icon = $FileName;
        $data->meta_title = $r->meta_title;
        $data->meta_keywords = $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->save();
       
        return back()->with('success_msg', 'Data have been saved successfully.');
    }
    public function Remove(Request $r){
        Brand::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data has been remove successfully.');
    }
    public function Status($Status,$Id){
        $data = Brand::find($Id);
        $data->status = $Status;
        $data->save();
        return back()->with('success_msg', 'Data status has been updated successfully.');
    }
    public function Detail(Request $r){
        $Id = $r->id;
        $data = Brand::find($Id);
        return $data;
    }
}
