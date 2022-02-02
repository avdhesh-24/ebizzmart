<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Coupon;
use Auth;
use App\Models\User;
class CouponExport implements FromCollection
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
        $data = Coupon::orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Coupon Type',
            'Coupon Code',
            'Coupon Validity',
            'Coupon Discount',
            'Coupon Status',
        ];
        foreach($data as $key => $da):
            $Type='';
            $Discount='';
            if($da->type==1){ $Type = $da->percentage.'% Discount ';  $Discount = $da->percentage.'% ';}
            if($da->type==2){ $Type = 'Shop for '.$da->shopping_price.' Value and Get '.$da->discount_price.' value shopping free'; $Discount=$da->discount_price;}
            
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $Type,
                $da->code,
                date('d F Y',strtotime($da->start_date)).'----'.date('d F Y',strtotime($da->end_date)),
                $Discount,
                ($da->status==1 ? 'Active' : 'Deactive'),
            ];
        endforeach;
        return collect($result);
    }
    public function getSpecific(){
        $data = Coupon::orderby('id','DESC');
        if(!empty($this->start) && !empty($this->end)){ 
            $data = $data->whereDate('created_at','>=',$this->start);
            $data = $data->whereDate('created_at','<=',$this->end);
        }
        if(!empty($this->start) && empty($this->end)){ 
            $data = $data->whereDate('created_at',$this->start);
        }
        $data = $data->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'Coupon Type',
            'Coupon Code',
            'Coupon Validity',
            'Coupon Discount',
            'Coupon Status',
        ];
        foreach($data as $key => $da):
            $Type='';
            $Discount='';
            if($da->type==1){ $Type = $da->percentage.'% Discount ';  $Discount = $da->percentage.'% ';}
            if($da->type==2){ $Type = 'Shop for '.$da->shopping_price.' Value and Get '.$da->discount_price.' value shopping free'; $Discount=$da->discount_price;}
            
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $Type,
                $da->code,
                date('d F Y',strtotime($da->start_date)).'----'.date('d F Y',strtotime($da->end_date)),
                $Discount,
                ($da->status==1 ? 'Active' : 'Deactive'),
            ];
        endforeach;
        return collect($result);
    }
}
