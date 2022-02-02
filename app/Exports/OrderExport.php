<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Order;
use Auth;
use App\Models\OrderItem;
use App\Models\User;
class OrderExport implements FromCollection
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
        if($this->type==1){ return $this->getAllOrder();}
        if($this->type==2){ return $this->getSpecificOrder();}
    }
    public function getAllOrder(){
        $orders = Order::with('user','user.usercountry','user.userstate','user.usercity','items','items.itemsize','items.itemsize.attribute','items.orderstatus','orderstatus','useraddress','ordercountry','orderstate','ordercity')->orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'Order No',
            'Order Status',
            'Payment Status',
            'Transaction Id',
            'Order Date',
            'Order Subtotal',
            'Order Discount',
            'Discount Coupon',
            'Order Total',
            'Earn Points',
            'Point Transfer',
            'Shipping Name',
            'Shipping Mobile',
            'Shipping Address',
            'Shipping Landmark',
            'Shipping Country',
            'Shipping State',
            'Shipping City',
            'Shipping Post Code',
            'Customer Name',
            'Customer Email',
            'Customer Mobile',
            'Customer Id',
        ];
        foreach($orders as $order):
            $result[] = [
                $order->order_number,
                $order->orderstatus->title,
                ($order->payment_status==1 ? 'Online Payment' : 'COD'),
                $order->transaction_id,
                date('d F Y',strtotime($order->payment_date)),
                $order->order_subtotal,
                $order->coupon_discount,
                $order->coupon,
                $order->order_amount,
                $order->earn_points,
                ($order->point_transfer==1 ? 'Yes' : 'No'),
                $order->name.' '.$order->last_name,
                $order->mobile,
                $order->house_no.' '.$order->street,
                $order->lankmark,
                $order->ordercountry->name,
                $order->orderstate->name,
                $order->ordercity->name,
                $order->pincode,
                $order->user->name,
                $order->user->email,
                $order->user->mobile,
                $order->user->user_id,
            ];
        endforeach;
        return collect($result);
    }
    public function getSpecificOrder(){
        $orders = Order::with('user','user.usercountry','user.userstate','user.usercity','items','items.itemsize','items.itemsize.attribute','items.orderstatus','orderstatus','useraddress','ordercountry','orderstate','ordercity');
        if(!empty($this->start) && !empty($this->end)){ 
            $orders = $orders->WhereDate('payment_date','>=',$this->start);
            $orders = $orders->WhereDate('payment_date','<=',$this->end);
        }
        if(!empty($this->start) && empty($this->end)){ 
            $orders = $orders->WhereDate('payment_date',$this->start);
        }
        $orders = $orders->orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'Order No',
            'Order Status',
            'Payment Status',
            'Transaction Id',
            'Order Date',
            'Order Subtotal',
            'Order Discount',
            'Discount Coupon',
            'Order Total',
            'Earn Points',
            'Point Transfer',
            'Shipping Name',
            'Shipping Mobile',
            'Shipping Address',
            'Shipping Landmark',
            'Shipping Country',
            'Shipping State',
            'Shipping City',
            'Shipping Post Code',
            'Customer Name',
            'Customer Email',
            'Customer Mobile',
            'Customer Id',
        ];
        foreach($orders as $order):
            $result[] = [
                $order->order_number,
                $order->orderstatus->title,
                ($order->payment_status==1 ? 'Online Payment' : 'COD'),
                $order->transaction_id,
                date('d F Y',strtotime($order->payment_date)),
                $order->order_subtotal,
                $order->coupon_discount,
                $order->coupon,
                $order->order_amount,
                $order->earn_points,
                ($order->point_transfer==1 ? 'Yes' : 'No'),
                $order->name.' '.$order->last_name,
                $order->mobile,
                $order->house_no.' '.$order->street,
                $order->lankmark,
                $order->ordercountry->name,
                $order->orderstate->name,
                $order->ordercity->name,
                $order->pincode,
                $order->user->name,
                $order->user->email,
                $order->user->mobile,
                $order->user->user_id,
            ];
        endforeach;
        return collect($result);
    }
}
