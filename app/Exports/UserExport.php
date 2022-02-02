<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Auth;
use App\Models\User;
class UserExport implements FromCollection
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
        $data = User::with('usercountry','userstate','usercity')->orderby('id','DESC')->get();
        $result=array();
        $result[] = [
            'S.No',
            'Created',
            'User Id',
            'User Name',
            'User Mobile',
            'User Email',
            'User DOB',
            'User Gender',
            'User Country',
            'User State',
            'User City',
            'User Status'
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $da->user_id,
                $da->name,
                $da->mobile,
                $da->email,
                (!empty($da->dob) ? date('d F Y',strtotime($da->dob)) : ''),
                $da->gender,
                (!empty($da->usercountry->name) ? $da->usercountry->name : ''),
                (!empty($da->userstate->name) ? $da->userstate->name : ''),
                (!empty($da->usercity->name) ? $da->usercity->name : ''),
                ($da->status==1 ? 'Active' : 'Deactive'),
            ];
        endforeach;
        return collect($result);
    }
    public function getSpecific(){
        $data = User::with('usercountry','userstate','usercity')->orderby('id','DESC');
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
            'User Id',
            'User Name',
            'User Mobile',
            'User Email',
            'User DOB',
            'User Gender',
            'User Country',
            'User State',
            'User City',
            'User Status'
        ];
        foreach($data as $key => $da):
            $result[] = [
                ($key+1),
                date('d F Y',strtotime($da->created_at)),
                $da->user_id,
                $da->name,
                $da->mobile,
                $da->email,
                (!empty($da->dob) ? date('d F Y',strtotime($da->dob)) : ''),
                $da->gender,
                (!empty($da->usercountry->name) ? $da->usercountry->name : ''),
                (!empty($da->userstate->name) ? $da->userstate->name : ''),
                (!empty($da->usercity->name) ? $da->usercity->name : ''),
                ($da->status==1 ? 'Active' : 'Deactive'),
            ];
        endforeach;
        return collect($result);
    }
}
