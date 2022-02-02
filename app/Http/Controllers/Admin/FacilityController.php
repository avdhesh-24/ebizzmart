<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;
use Helper;
class FacilityController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function index(){
        return view('admin.facility');
    }
    public function Edit(Request $r){
        $validated = $r->validate([
            'edittitle' => 'required',
        ]); 

        if(!empty($r->icon)){
            $extension =  $r->icon->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = Helper::DirectFile('uploads/facility/',$r->icon);
            }else{
                $FileName = Helper::ImageWithSize('uploads/facility/',50,50,$r->icon);
            }
        }else{
            $FileName = $r->preicon;
        }
        
        $data = Facility::find($r->editId);
        $data->title = $r->edittitle;
        $data->icon = $FileName;
        $data->save();
        return back()->with('success_msg', 'Data have been updated successfully.');
    }
    public function Save(Request $r){
        $validated = $r->validate([
            'title' => 'required',
            'icon' => 'mimes:jpeg,jpg,png,gif,svg,webp|required',
        ]); 
        $extension =  $r->icon->getClientOriginalExtension();
        if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
            $FileName = Helper::DirectFile('uploads/facility/',$r->icon);
        }else{
            $FileName = Helper::ImageWithSize('uploads/facility/',50,50,$r->icon);
        }
        $data = new Facility();
        $data->title = $r->title;
        $data->icon = $FileName;
        $data->save();
       
        return back()->with('success_msg', 'Data have been saved successfully.');
    }
    public function Remove(Request $r){
        Facility::find($r->removeId)->delete();
        return back()->with('success_msg', 'Data has been remove successfully.');
    }
    public function Status($Status,$Id){
        $data = Facility::find($Id);
        $data->status = $Status;
        $data->save();
        return back()->with('success_msg', 'Data status has been updated successfully.');
    }
}
