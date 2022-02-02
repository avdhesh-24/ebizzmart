<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Auth;
use Helper;
use Image;
class BlogController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $lists = Blog::with('category')->orderBy('id','DESC')->get();
        return view('admin.blog.list',compact('lists'));
    }

    public function New(){
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog.add',compact('categories'));
    }

    public function Edit($Id){
        $lists = Blog::find($Id);
        $categories = BlogCategory::where('status',1)->get();
        return view('admin.blog.edit',compact('lists','categories'));
    }

    public function Remove(Request $r){
        $Data = Blog::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = Blog::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'Status have been updated successfully.');
    }

   
    public function Save(Request $r){
            $validated = $r->validate([
                'title' => 'required',
                'category' => 'required',
                'post_date' => 'required',
                'image' => 'required|mimes:jpeg,jpg,png,gif,svg,webp,mp4|max:2024',
                'banner' => 'required|mimes:jpeg,jpg,png,gif,svg,webp,mp4|max:2024',
                'description' => 'required'
            ]);
        if(empty($r->image)){
            $FileName = '';
        }else{
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $FileName = Helper::DirectFile('uploads/blog/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/blog/',360,350,$r->image);
            }
        }
        
        if(empty($r->banner)){
            $BannerName = '';
        }else{
            $extension =  $r->banner->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $BannerName = Helper::DirectFile('uploads/blog/banner/',$r->banner);
            }else{
                $BannerName = Helper::ImageWithSize('uploads/blog/banner/',1600,400,$r->banner);
            }
        }
        $Data = new Blog();
        $Data->title = $r->title;
        $Data->category_id = $r->category;
        $Data->image = $FileName;
        $Data->banner = $BannerName;
        $Data->post_date = date("Y-m-d",strtotime($r->post_date));
        $Data->description = $r->description;
        $Data->short_description = $r->sort_description;
        $Data->meta_title = $r->meta_title;
        $Data->meta_keywords = $r->meta_keywords;
        $Data->meta_description = $r->meta_description;

        $Data->alias = Helper::NewAlias('blogs','title',$r->title);
        $Data->save();
        return back()->with('success_msg', 'Data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
            'category' => 'required',
            'post_date' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg,webp,mp4|max:2024',
            'banner' => 'mimes:jpeg,jpg,png,gif,svg,webp,mp4|max:2024',
            'description' => 'required'
        ]);

        if(empty($r->image)){
            $FileName = $r->preimage;
        }else{
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $FileName = Helper::DirectFile('uploads/blog/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/blog/',360,350,$r->image);
            }
        }
        
        if(empty($r->banner)){
            $BannerName = $r->prebanner;
        }else{
            $extension =  $r->banner->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $BannerName = Helper::DirectFile('uploads/blog/banner/',$r->banner);
            }else{
                $BannerName = Helper::ImageWithSize('uploads/blog/banner/',1600,400,$r->banner);
            }
        }

        $Data = Blog::find($r->preId);
        $Data->title = $r->title;
        $Data->category_id = $r->category;
        $Data->image = $FileName;
        $Data->banner = $BannerName;
        $Data->post_date = date("Y-m-d",strtotime($r->post_date));
        $Data->description = $r->description;
        $Data->short_description = $r->sort_description;
        $Data->meta_title = $r->meta_title;
        $Data->meta_keywords = $r->meta_keywords;
        $Data->meta_description = $r->meta_description;
        $Alias=$r->alias;
        if(empty($r->alias)){$Alias = $r->prealias;}
        $Data->alias = $Alias;
        $Data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }

    
}
