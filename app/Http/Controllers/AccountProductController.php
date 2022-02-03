<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Helper;
use Auth;
use Mail;
class AccountProductController extends Controller{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    public function index(){
        $lists = Product::with('category','brand','defaultprice')->where('company_id',Auth::user()->company)->paginate(10);
        return view('account.product.list',compact('lists'));
    }
    public function New($category=null){
        if(!empty($category)){
            $category = Category::where('alias',$category);
            return view('account.product.add',compact('category'));
        }else{
            $category = Category::with('child')->where(['level'=>1,'status'=>1])->orderby('name','ASC')->get();
            return view('account.product.category',compact('category'));
        }
    }
    public function Choose_Product_Category(Request $r){
        $category = $r->category;
        $parent = Category::find($category);
        $lists = Category::with('child')->where(['parent'=>$category,'status'=>1])->orderby('name','ASC')->get();
        $html='<ul>';
        foreach($lists as $list){
            $level = $list->level + 1;
            $html .='<li onclick="getChildCategory('.$list->id.','.$level.','.count($list->child).')"><span>'.$list->name.' ('.count($list->child).')</span></li>'; 
        }
        $html .='</ul>'; 
        return response()->json([
            'category_html'=>$html,
            'parent_html' => '<li class="active"><a href="#">'.$parent->name.'</a></li>',
            'post_product' => route('account.post-product',['category'=>$parent->alias]) 
        ]);
    }
}
