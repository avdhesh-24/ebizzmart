<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Models\CategoryBrand;
use App\Models\CategoryAttribute;
use App\Models\AttributeGroup;
use Auth;
use Helper;
use Image;
class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index($Parent=null){
        if(!empty($Parent)){
            $lists = Category::where('parent',$Parent)->orderBy('id','DESC')->get();
        }else{
            $lists = Category::with('child')->where(['level'=>1])->orderBy('id','DESC')->get();
        }
        return view('admin.category.list',compact('lists','Parent'));
    }

    public function Brand($category){
        return view('admin.category.brand-mapp',compact('category'));
    }

    public function New($Parent=null){
       return view('admin.category.add',compact('Parent'));
    }

    public function Edit($Id){
        $lists = Category::find($Id);
        return view('admin.category.edit',compact('lists'));
    }

    public function Remove(Request $r){
        Category::find($r->removeId)->delete();
        return back()->with('success_msg', 'Category has been remove successfully.');
    }

    public function Status($Status,$Id){
        Category::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Category status has been updated successfully.');
    }

    public function TopStatus($Status,$Id){
        Category::where('id',$Id)->update(['top_status'=>$Status]);
        return back()->with('success_msg', 'This category has been set in top categories.');
    }

    public function HomeStatus($Status,$Id){
        Category::where('id',$Id)->update(['home'=>$Status]);
        return back()->with('success_msg', 'This category has been set in home page.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
            'category_name' => 'required',
            'icon' => 'required',
            'image' => 'required',
            'meta_title' => 'required',
        ]);

        if(!empty($r->image)){
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $ImageName = Helper::DirectFile('uploads/category/',$r->image); 
                $ThumbName = $ImageName;
                \File::copy('uploads/category/'.$ImageName,'uploads/category/thumb/'.$ImageName);
            }else{
                $ImageName = Helper::ImageWithSize('uploads/category/',312,468,$r->image);
                $ThumbName = Helper::ImageWithSize('uploads/category/thumb/',90,90,$r->image);
            }
        }else{
            $ImageName='';
            $ThumbName='';
        }
        
        if(!empty($r->icon)){
            $extension =  $r->icon->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $Icon = Helper::DirectFile('uploads/category/icon/',$r->icon); 
            }else{
                $Icon = Helper::ImageWithSize('uploads/category/icon/',50,50,$r->icon);
            }
        }else{
            $Icon='';
        }

        $data = new Category();
        $data->name = $r->category_name;
        $data->alias = Helper::NewAlias('categories','name',$r->category_name);
        $data->description = $r->category_decription;
        $data->meta_title = $r->meta_title;
        $data->meta_keywords= $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->parent = $r->parent;
        $data->level = $r->level;
        $data->icon = $Icon;
        $data->image = $ImageName;
        $data->thumb_image = $ThumbName;
        $data->save();
        return back()->with('success_msg', 'Category has been saved successfully.');
    }
 

    public function Update(Request $r){
        $validated = $r->validate([
            'category_name' => 'required',
            'category_alias' => 'required',
            'meta_title' => 'required',
        ]);

        if(!empty($r->image)){
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $ImageName = Helper::DirectFile('uploads/category/',$r->image); 
                $ThumbName = $ImageName;
                \File::copy('uploads/category/thumb/'.$ImageName,'uploads/category/'.$ImageName);
            }else{
                $ImageName = Helper::ImageWithSize('uploads/category/',312,468,$r->image);
                $ThumbName = Helper::ImageWithSize('uploads/category/thumb/',90,90,$r->image);
            }
        }else{
            $ImageName=$r->preimage;
            $ThumbName=$r->preimage;
        }
        
        if(!empty($r->icon)){
            $extension =  $r->icon->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $Icon = Helper::DirectFile('uploads/category/icon/',$r->icon); 
            }else{
                $Icon = Helper::ImageWithSize('uploads/category/icon/',50,50,$r->icon);
            }
        }else{
            $Icon=$r->preicon;
        }

        $data = Category::find($r->category_id);
        $data->name = $r->category_name;
        $data->alias = $r->category_alias;
        $data->description = $r->category_decription;
        $data->meta_title = $r->meta_title;
        $data->meta_keywords= $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->icon = $Icon;
        $data->image = $ImageName;
        $data->thumb_image = $ThumbName;
        $data->save();
        return back()->with('success_msg', 'Category has been updated successfully.');
    }

    public function Remove_Brand(Request $r){
        CategoryBrand::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data has been remove successfully.');
    }

    function Save_Brand(Request $r){
        $validated = $r->validate([
            'brand' => 'required',
        ]); 
        $brand = $r->brand;
        foreach($brand as $key => $re){
            $check = CategoryBrand::where(['category_id'=>$r->category,'brand_id'=>$re])->count();
            if($check==0){
                $data = new CategoryBrand();
                $data->category_id = $r->category;
                $data->brand_id = $re;
                $data->save();
            }
        }
        return back()->with('success_msg', 'Data have been saved successfully.');
    }

    ///////// Attribute Group

    public function Mapped_Attribute_Group(Request $r){
        $checks = $r->checkbox;
        $preId = $r->AttrpreId;
        CategoryAttribute::where('category_id',$preId)->delete();
        if(!empty($checks)){
            foreach($checks as $check):
                $data = new CategoryAttribute(); 
                $data->category_id = $preId;
                $data->attribute_group_id = $check; 
                $data->save();
            endforeach;    
        }
        return back()->with('success_msg', 'Attribute group have been updated successfully.');
    }

    public function Attribute_Group(Request $r){
        $category = $r->category;
        $data = CategoryAttribute::where('category_id',$category)->get();
        $groups = AttributeGroup::where('status',1)->get();
        $Section=array();
        foreach($data as $roes):
            $Section[]=$roes->attribute_group_id;
        endforeach; 
        $Html='<input type="hidden" name="AttrpreId" value="'.$category.'"><div class="row">';
        foreach($groups as $group):
            if(in_array($group->id,$Section)){$checked1='checked';}else{$checked1='';}
            $Html .='<div class="col-lg-6 stretch-card mt-2">
                        <div class="form-group mb-1">
                        <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label">
                            <input type="checkbox" id="checkbox" '.$checked1.' name="checkbox[]" value="'.$group->id.'" class="form-check-input">
                            <i class="input-helper"></i>
                            '.$group->title.'</strong>
                            </label>
                        </div>
                        </div>
                    </div>';
        endforeach;
        $Html .='</div>';
        echo $Html;
    }
}
