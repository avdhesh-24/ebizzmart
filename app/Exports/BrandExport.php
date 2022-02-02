<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Brand;
use Auth;
use App\Models\User;
class BrandExport implements FromCollection
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
        $data = Brand::orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Brand Name',
            'Brand Image',
            'Brand Description',
            'Brand Status',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $da->name,
                asset('uploads/brand/'.$da->icon),
                $da->description,
                ($da->status==1 ? 'Active' : 'Deactive'),
                $da->meta_title,
                $da->meta_keywords,
                $da->meta_description,
            ];
        endforeach;
        return collect($result);
    }
    public function getSpecific(){
        $data = Brand::orderby('id','DESC');
        if(!empty($this->start) && !empty($this->end)){ 
            $data = $data->WhereDate('created_at','>=',$this->start);
            $data = $data->WhereDate('created_at','<=',$this->end);
        }
        if(!empty($this->start) && empty($this->end)){ 
            $data = $data->WhereDate('created_at',$this->start);
        }
        $data = $data->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Brand Name',
            'Brand Image',
            'Brand Description',
            'Brand Status',
            'Meta Title',
            'Meta Keywords',
            'Meta Description',
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->updated_at)),
                $da->name,
                $da->image,
                $da->description,
                ($da->status==1 ? 'Active' : 'Deactive'),
                $da->meta_title,
                $da->meta_keywords,
                $da->meta_description,
            ];
        endforeach;
        return collect($result);
    }
}
