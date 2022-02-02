<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;
use Auth;
use App\Models\User;
class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $type;
    protected $start;
    protected $end;
    
    function __construct($data) {
        $this->type = $data['type'];
        $this->start = $data['start'];
        $this->end = $data['end'];
    }
    public function collection(){
        if($this->type==1){ return $this->getAll();}
        if($this->type==2){ return $this->getSpecific();}
    }
    public function getAll(){
        $data = Product::with('brand','category')->orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Product Name',
            'Product Thumb Image',
            'Product Image',
            'Minimum Order',
            'Availability',
            'Brand Name',
            'Category Name',
            'Product Description',
            'Product Ingredients',
            'Product Status',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $da->title,
                asset('uploads/product/thumb/'.$da->thumb_image),
                asset('uploads/product/'.$da->image),
                $da->minimum_order,
                ($da->availability==1 ? 'In Stock' : 'Out Of Stock'),
                $da->brand->name,
                $da->category->name,
                $da->description,
                $da->ingredients,
                ($da->status==1 ? 'Active' : 'Deactive'),
                $da->meta_title,
                $da->meta_keywords,
                $da->meta_description,
            ];
        endforeach;
        return collect($result);
    }
    public function getSpecific(){
        $data = Product::with('brand','category');
        if(!empty($this->start) && !empty($this->end)){ 
            $data = $data->WhereDate('created_at','>=',$this->start);
            $data = $data->WhereDate('created_at','<=',$this->end);
        }
        if(!empty($this->start) && empty($this->end)){ 
            $data = $data->WhereDate('created_at',$this->start);
        }
        $data = $data->orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Product Name',
            'Product Thumb Image',
            'Product Image',
            'Minimum Order',
            'Availability',
            'Brand Name',
            'Category Name',
            'Product Description',
            'Product Ingredients',
            'Product Status',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $da->title,
                asset('uploads/product/thumb/'.$da->thumb_image),
                asset('uploads/product/'.$da->image),
                $da->minimum_order,
                ($da->availability==1 ? 'In Stock' : 'Out Of Stock'),
                $da->brand->name,
                $da->category->name,
                $da->description,
                $da->ingredients,
                ($da->status==1 ? 'Active' : 'Deactive'),
                $da->meta_title,
                $da->meta_keywords,
                $da->meta_description,
            ];
        endforeach;
        return collect($result);
    }
}
