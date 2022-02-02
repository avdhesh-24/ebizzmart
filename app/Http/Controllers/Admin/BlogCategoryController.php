<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Auth;
use Helper;
use Image;
class BlogCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $lists = BlogCategory::orderBy('id','DESC')->get();
        return view('admin.blog.blog-category.list',compact('lists'));
    }

    public function New(){
        return view('admin.blog.blog-category.add');
    }

    public function Edit($Id){
        $lists = BlogCategory::find($Id);
        return view('admin.blog.blog-category.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $Data = BlogCategory::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = BlogCategory::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'Status have been updated successfully.');
    }

   
    public function Save(Request $r){
        $validated = $r->validate([
                'title' => 'required',
            ]);
        $Data = new BlogCategory();
        $Data->title = $r->title;
        $Data->alias = Helper::NewAlias('blog_categories','title',$r->title);
        $Data->save();
        return back()->with('success_msg', 'Data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
        ]);

        $Data = BlogCategory::find($r->preId);
        $Data->title = $r->title;
        $Data->alias = $r->alias;
        $Data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
}
