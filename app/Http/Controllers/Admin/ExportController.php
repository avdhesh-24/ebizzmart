<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\BrandExport;
use App\Exports\OrderExport;
use App\Exports\ProductExport;
use App\Exports\CouponExport;
use App\Exports\UserExport;
use App\Exports\CategoryProductSample;
use App\Imports\CategoryProductImport;
use Excel;
use Helper;
use image;
class ExportController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function Product(Request $r){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End];
        if($Type==1){
            return Excel::download(new ProductExport($data), 'products.xlsx');
        }else{
            return Excel::download(new ProductExport($data), 'products.xlsx');
        }
    }

    public function Coupon(Request $r){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End];
        if($Type==1){
            return Excel::download(new CouponExport($data), 'coupons.xlsx');
        }else{
            return Excel::download(new CouponExport($data), 'coupons.xlsx');
        }
    }

    public function Order(Request $r){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End];
        if($Type==1){
            return Excel::download(new OrderExport($data), 'orders.xlsx');
        }else{
            return Excel::download(new OrderExport($data), 'orders.xlsx');
        }
        
    }

    public function Brand(Request $r){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End];
        if($Type==1){
            return Excel::download(new BrandExport($data), 'brand.xlsx');
        }else{
            return Excel::download(new BrandExport($data), 'brand.xlsx');
        }
    }

    public function Category(Request $r,$parent=null){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End,'parent'=>$parent];
        if($Type==1){
            return Excel::download(new BrandExport($data), 'brand.xlsx');
        }else{
            return Excel::download(new BrandExport($data), 'brand.xlsx');
        }
    }

    public function Users(Request $r){
        $Type = $r->export_type;
        $Start = $r->start_date;
        $End = $r->end_date;
        $data = ['type'=>$Type,'start'=>$Start,'end'=>$End];
        if($Type==1){
            return Excel::download(new UserExport($data), 'users.xlsx');
        }else{
            return Excel::download(new UserExport($data), 'users.xlsx');
        }
        
    }
    
    

    ////// DOWNLOAD 
    public function Download_Product_CategoryCSV($CategoryId){
        return Excel::download(new CategoryProductSample($CategoryId), 'category-product-format.xlsx');
    }



    //// IMPORT

    public function Category_Product(Request $r){
        $file = $r->importcsv;
        Excel::import(new CategoryProductImport,$file);
        return back();
    }

    public function Bulk_Product_Image(Request $r){
        $Images = $r->bulkimage;
        if(empty($Images)){
            return back()->with('error_msg', 'Please choose at least one image.');
        }else{
            foreach($Images as $Image){
                $BigImage = $Image;
                $extension =  $Image->getClientOriginalExtension();
                if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){

                    $extension =  $Image->getClientOriginalName(); 
                    $ThumbFileName = $extension; 
                    $Image->move('uploads/product/thumb/',$ThumbFileName);
                    \File::copy('uploads/product/thumb/'.$ThumbFileName,'uploads/product/'.$ThumbFileName);

                }else{
                    $ThumbFileName = Helper::ImageWithSizeWithOrignalName('uploads/product/thumb/',283,212,$Image);
                    $FileName = Helper::ImageWithSizeWithOrignalName('uploads/product/',900,900,$Image);
                }

                
            }
        }

        return back()->with('success_msg', 'Bulk images uploaded successfully.');
    }
}
