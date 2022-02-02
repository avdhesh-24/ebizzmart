<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Auth;
use Helper;
use Image;

class CityController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index($Id){
        $lists = City::where('state_id',$Id)->orderBy('name','ASC')->get();
        $statelists = State::find($Id);
        $country = $Id;
        return view('admin.city.list',compact('lists','country','statelists'));
    }


    public function New($country){
        return view('admin.city.add',compact('country'));
    }

  

    public function Edit($Id){
        $lists = City::find($Id);
        return view('admin.city.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $Data = City::find($r->removeId)->delete();
        return back()->with('success_msg', 'City data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = City::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'City status have been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
                'title' => 'required',
            ]);
        $Data = new City();
        $Data->name = $r->title;
        $Data->state_id = $r->state;
        $Data->save();
        return back()->with('success_msg', 'City data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
        ]);

        $Data = City::find($r->preId);
        $Data->name = $r->title;
        $Data->save();
        return back()->with('success_msg', 'City data have been updated successfully.');
    }

}
