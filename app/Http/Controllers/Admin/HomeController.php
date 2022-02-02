<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Cms;
use App\Models\RegionSupplier;
use App\Models\TopCategory;
use Auth;
use Helper;
use Image;
class HomeController extends Controller{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct(){

        $this->middleware('auth:admin');

    }

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */  

    public function index(){
        return view('admin.home');
    }
    public function Region_Suppliers(){
        return view('admin.region-supplier');
    }
    public function Region_Supplier_Edit(Request $r){
        $validated = $r->validate([
            'editregion' => 'required',
        ]); 
        $data = RegionSupplier::find($r->editId);
        $data->country_id = $r->editregion;
        $data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
    public function Save_Region_Suppliers(Request $r){
        $validated = $r->validate([
            'region' => 'required',
        ]); 
        $region = $r->region;
        foreach($region as $re){
            $data = new RegionSupplier();
            $data->country_id = $re;
            $data->save();
        }

        return back()->with('success_msg', 'Data have been saved successfully.');
    }
    public function Remove_Region_Suppliers(Request $r){
        RegionSupplier::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data has been remove successfully.');
    }

    public function Region_Supplier_Status($Status,$Id){
        $data = RegionSupplier::find($Id);
        $data->status = $Status;
        $data->save();
        return back()->with('success_msg', 'Data status has been updated successfully.');
    }


    public function Top_Category(){
        return view('admin.top-category');
    }

    public function Remove_Top_Category(Request $r){
        TopCategory::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data has been remove successfully.');
    }

    function Save_Top_Category(Request $r){
        $validated = $r->validate([
            'category' => 'required',
        ]); 
        $brand = $r->category;
        foreach($brand as $key => $re){
            $check = TopCategory::where(['category_id'=>$re])->count();
            if($check==0){
                $data = new TopCategory();
                $data->category_id = $re;
                $data->save();
            }
        }
        return back()->with('success_msg', 'Data have been saved successfully.');
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

}