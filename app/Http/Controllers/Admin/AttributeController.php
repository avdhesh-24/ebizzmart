<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use Auth;
use Helper;
use Image;
class AttributeController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function Group_index($Id=null){
        $lists = AttributeGroup::latest()->paginate(10);
        return view('admin.attribute.group.list',compact('lists'));
    }

    public function New_Group(){
        return view('admin.attribute.group.add');
    }

    public function Edit_Group($Id){
        $lists = AttributeGroup::find($Id);
        return view('admin.attribute.group.edit',compact('lists'));
    }

    public function Remove_Group(Request $r){
        AttributeGroup::find($r->removeId)->delete();
        return back()->with('success_msg', 'Attribute group data have been remove successfully.');
    }

    public function Group_Status($Status,$Id){
        AttributeGroup::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Attribute group status have been updated successfully.');
    }

    public function Save_Group(Request $r){
        $Name = $r->name;
        if(!empty($r->name)){
            foreach($r->name as $Name){
                if(!empty($Name)){
                    $data = new AttributeGroup();
                    $data->title = $Name;
                    $data->save();
                }
            }
        }
        return back()->with('success_msg', 'Attribute group have been saved successfully.');
    }

    public function Update_Group(Request $r){
        $Name = $r->name;
        $validated = $r->validate([
            'name' => 'required',
        ]);
       
        $data = AttributeGroup::find($r->preId);
        $data->title = $Name;
        $data->save();
        return back()->with('success_msg', 'Attribute group have been updated successfully.');
    }

    public function Search_Group(Request $r){
        $Search = $r->search;
        $Parent = $r->parent;
        $lists = AttributeGroup::latest();
        if(!empty($Search)){ $lists = $lists->where('title','LIKE','%'.$Search.'%'); }
        $lists = $lists->get();
        $Html='';
        foreach($lists as $key => $Rows):
            $Html .='<tr>';
                $Html .='<td>'.($key + 1).'</td>';
                $Html .='<td>'.date("d F,Y",strtotime($Rows->updated_at)).'</td>';
               
                $Html .='<td>'.$Rows->title.'</td>';
                $Html .='<td>';
                        if($Rows->status==1):
                            $Html .='<a href="'.action('Admin\AttributeController@Group_Status',['status'=>0,'id'=>$Rows->id]).'"  data-toggle="tooltip" data-placement="top" data-original-title="If you want to Deactive this category then click here">
                                        <span class="badge badge-success badge-pill">Activated</span>
                                    </a>';
                        endif;
                        if($Rows->status==0):
                            $Html .='<a href="'.action('Admin\AttributeController@Group_Status',['status'=>1,'id'=>$Rows->id]).'"  data-toggle="tooltip" data-placement="top" data-original-title="If you want to Active this category then click here">
                                        <span class="badge badge-danger badge-pill">Deactivated</span>

                                    </a>';
                        endif;
                $Html .='</td>';

                $Html .='<td>';
                $Html .='<a href="'.action('Admin\AttributeController@Edit_Group',['id'=>$Rows->id]).'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"data-original-title="Click here for edit attribute group"><i class="fas fa-pencil-alt"></i></a>';
                $Html .='<a href="'.action('Admin\AttributeController@attributes',['id'=>$Rows->id]).'" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" data-original-title="Click here for see all attributes"><i class="fas fa-sitemap"></i></a>';
                $Html .='<button class="btn btn-danger btn-sm  ml-1" onclick="return deleteConfirmation('.$Rows->id.')" data-toggle="tooltip" data-placement="top"data-original-title="Click here for remove attribute group"><i class="fas fa-trash-alt"></i></button>';
              $Html .='</td>';

              $Html .='</tr>';
        endforeach;    
        echo $Html;
    }




    /*************** END GROUP *******************/
    
    public function index($Id=null){
        $lists = Attribute::where('attribute_group_id',$Id)->latest()->paginate(10);
        return view('admin.attribute.list',compact('lists','Id'));
    }

    public function New($Id){
        return view('admin.attribute.add',compact('Id'));
    }

    public function Edit($Id){
        $lists = Attribute::find($Id);
        return view('admin.attribute.edit',compact('lists'));
    }

    public function Remove(Request $r){
        Attribute::find($r->removeId)->delete();
        return back()->with('success_msg', 'Attribute data have been remove successfully.');
    }

    public function Status($Status,$Id){
        Attribute::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Attribute status have been updated successfully.');
    }

    public function Save(Request $r){
        if(!empty($r->name)){
            foreach($r->name as $Name){
                if(!empty($Name)){
                    $data = new Attribute();
                    $data->title = $Name;
                    $data->attribute_group_id = $r->group;
                    $data->save();
                }
            }
        }
        return back()->with('success_msg', 'Attribute have been saved successfully.');
    }

    public function Update(Request $r){
        $Name = $r->name;
        $validated = $r->validate([
            'name' => 'required',
        ]);
       
        $data = Attribute::find($r->preId);
        $data->title = $Name;
        $data->save();
        return back()->with('success_msg', 'Attribute have been updated successfully.');
    }

    public function search(Request $r){
        $Search = $r->search;
        $Parent = $r->parent;
        $lists = Attribute::latest();
        if(!empty($Search)){ $lists = $lists->where('title','LIKE','%'.$Search.'%'); }
        $lists = $lists->get();
        $Html='';
        foreach($lists as $key => $Rows):
            $Html .='<tr>';
                $Html .='<td>'.($key + 1).'</td>';
                $Html .='<td>'.date("d F,Y",strtotime($Rows->updated_at)).'</td>';
               
                $Html .='<td>'.$Rows->title.'</td>';
                $Html .='<td>';
                        if($Rows->status==1):
                            $Html .='<a href="'.action('Admin\AttributeController@Status',['status'=>0,'id'=>$Rows->id]).'">
                                        <span class="badge badge-success badge-pill">Activated</span>
                                    </a>';
                        endif;
                        if($Rows->status==0):
                            $Html .='<a href="'.action('Admin\AttributeController@Status',['status'=>1,'id'=>$Rows->id]).'">
                                        <span class="badge badge-danger badge-pill">Deactivated</span>

                                    </a>';
                        endif;
                $Html .='</td>';

                $Html .='<td>';
                $Html .='<a href="'.action('Admin\AttributeController@Edit',['id'=>$Rows->id]).'" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"data-original-title="Edit Attribute"><i class="fas fa-pencil-alt"></i></a>';
                
                $Html .='<button class="btn btn-danger btn-sm  ml-1" onclick="return deleteConfirmation('.$Rows->id.')" data-toggle="tooltip" data-placement="top"data-original-title="Remove Attribute"><i class="fas fa-trash-alt"></i></button>';
              $Html .='</td>';

              $Html .='</tr>';
        endforeach;    
        echo $Html;
    }
}
