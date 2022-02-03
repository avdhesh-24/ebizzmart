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
            $category = Category::find($category);
            return view('account.product.add',compact('category'));
        }else{
            $category = Category::with('child')->where(['level'=>1,'status'=>1])->orderby('name','ASC')->get();
            return view('account.product.category',compact('category'));
        }
    }
}
