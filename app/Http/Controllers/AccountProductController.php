<?php

namespace App\Http\Controllers;
use App\Models\ProductAattribute;
use App\Models\CategoryAttribute;
use Illuminate\Http\Request;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
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
            $category = Category::with('catattribute','catattribute.attribute_group','catattribute.attribute_group.attributes')->where('alias',$category)->first();
            // echo "<pre>";
            // print_r($category); exit;
            if(empty($category)){abour(404); }
            $brands = Brand::where('status',1)->orderby('name','ASC')->get();
            return view('account.product.add',compact('category','brands'));
        }else{
            if(empty($_GET)){
                $category = Category::with('child')->where(['level'=>1,'status'=>1])->orderby('name','ASC')->get();
            }else{
                $category = Category::with('child')->where(['level'=>1,'status'=>1])->where('name','LIKE','%'.$_GET['search'].'%')->orderby('name','ASC')->get();
            }
            return view('account.product.category',compact('category'));
        }
    }
    public function Save(Request $r){
        $validated = $r->validate([
            'product_name' => 'required|max:255',
            'minimum_order_qty'=>'required|min:1',
            'availability'=>'accepted',
            'category' => 'required',
            'default_image' =>'required',
            'company' => 'required',
            'brand' => 'required',
            'policies' => 'accepted',
        ]);
        
        if(!empty($r->default_image)){
            $extension =  $r->default_image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $ImageName = Helper::DirectFile('uploads/product/',$r->default_image);
                $thumb = $ImageName;
                \File::copy(public_path('uploads/product/'.$ImageName),public_path('uploads/product/banner/'.$ImageName));
        
            }else{
                $thumb = Helper::ProductImageWithSize('uploads/product/',400,400,$r->default_image);
                $ImageName = Helper::ProductImageWithSize('uploads/product/banner/',900,900,$r->default_image);
            }
        }else{
            $ImageName='';
        }
        
        $data = new Product();
        $data->title = $r->product_name;
        $data->alias = Helper::NewAlias('products','title',$r->product_name);
        $data->description = $r->description;
        $data->brand_id = $r->brand;
        $data->company_id = $r->company;
        $data->meta_title = $r->meta_title ? $r->meta_title : $r->product_name;
        $data->short_description = $r->short_description;
        $data->category_id = $r->category;
        $data->availability = $r->availability;
        $data->minimum_order = $r->minimum_order_qty;
        $data->meta_keywords= $r->meta_keywords;
        $data->meta_description = $r->meta_description;
        $data->image = $ImageName;
        $data->thumb_image = $thumb;
        $data->save();
        self::AddProductImages($r->all(),$data->id);
        self::AddProductAttribute($r->all(),$data->id);

        return response()->json([
            'message'=> 'Product has been saved!'
        ]);
    }
    public function AddProductImages($data,$ProductId){
        if(!empty($data['moreimg'])){
            $Moimage = $data['moreimg'];
            foreach($Moimage as $key => $Ro){
                $Image = $Ro;

                if(empty($Image)){
                    $FileName = '';
                }else{
                    $extension =  $Image->getClientOriginalExtension();
                    if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                        $FileName = Helper::DirectFile('uploads/product/',$Image);
                    }else{
                        $FileName = Helper::ProductImageWithSize('uploads/product/',900,900,$Image);
                    }
                    \File::copy(public_path('uploads/product/'.$FileName),public_path('uploads/product/banner/'.$FileName));
        
                }

                $data = new ProductImage();
                $data->product_id = $ProductId;
                $data->image = $FileName;
                $data->save();
            }
        }
        

        return true;
    }

    public function AddProductAttribute($data,$ProductId){
        $Attribute = $data['attribute'];
        $Attributegroup = $data['attributegroup'];
        $Attributetitle = $data['attribute_title'];
        $attributeId = $data['attributeId'];
        $sku = $data['sku'];
        $mrp = $data['mrp'];
        $selling_price = $data['selling_price'];


        foreach($sku as $key => $Ro):
            if(!empty($Attribute[$key])):
                if($Attributegroup[$key]==1 && !empty($sku[$key])){
                    if(!empty($data['preattribute_sizeId'][$key])){
                        $dataA = ProductSize::find($data['preattribute_sizeId'][$key]);
                    }else{
                        $dataA = new ProductSize();
                        $dataA->product_id = $ProductId;
                    }
                    $dataA->attribute_id = $Attribute[$key];
                    $dataA->sku = $sku[$key];
                    $dataA->mrp = $mrp[$key];
                    $dataA->selling_price = $selling_price[$key];
                    $dataA->save();
                }
            endif;    
        endforeach; 

       
        foreach($attributeId as $key => $Ro):
            if(!empty($Attributetitle[$key])):
                if(!empty($data['preattribute_titleId'][$key])){
                    $dataA = ProductAattribute::find($data['preattribute_titleId'][$key]);
                }else{
                    $dataA = new ProductAattribute();
                    $dataA->product_id = $ProductId;
                }
                $dataA->attribute_id = $attributeId[$key];
                $dataA->description = $Attributetitle[$key];
                $dataA->save();
            endif;    
        endforeach; 
    }
    public function Choose_Product_Category(Request $r){
        $category = $r->category;
        $parent = Category::find($category);
        $lists = Category::with('child')->where(['parent'=>$category,'status'=>1])->orderby('name','ASC')->get();
        $html='<ul>';
        foreach($lists as $list){
            $level = $list->level + 1;
            $html .='<li onclick="getChildCategory('.$list->id.','.$level.','.count($list->child).')"><span>'.$list->name.' </span></li>'; 
        }
        $html .='</ul>'; 
        return response()->json([
            'category_html'=>$html,
            'parent_html' => '<li class="active" id="parentCat'.$parent->level.'"><a href="#">'.$parent->name.'</a></li>',
            'post_product' => route('account.post-product',['category'=>$parent->alias]) 
        ]);
    }
    public function Search_Product_Category(Request $r){
        $search = $r->search;
        $lists = Category::with('child')->where('name','LIKE','%'.$search.'%')->where('status',1)->get();
        $Html='<ul>';
        foreach($lists as $list){
            if(count($list->child)==0){
                $Html .= '<li><a href="'.route('account.post-product',['category'=>$list->alias]).'">'.$list->name.'</a></li>';
            }
        }
        $Html .='</ul>';
        return response()->json([
            'html'=>$Html,
        ]);
    }
}
