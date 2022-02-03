<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use Helper;
use Image;

class CountryController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index(){
        $lists = Country::orderBy('name','ASC')->get();
        return view('admin.country.list',compact('lists'));
    }

    public function New(){
        return view('admin.country.add');
    }

 
    public function Edit($Id){
        $lists = Country::find($Id);
        return view('admin.country.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $Data = Country::find($r->removeId)->delete();
        return back()->with('success_msg', 'Country data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = Country::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'Country status have been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
                'title' => 'required',
            ]);
        $Data = new Country();
        $Data->name = $r->title;
        $Data->sortname = $r->sortcode;
        $Data->phonecode = $r->phonecode;
        $Data->save();
        return back()->with('success_msg', 'Country data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
        ]);

        $Data = Country::find($r->preId);
        $Data->name = $r->title;
        $Data->sortname = $r->sortcode;
        $Data->phonecode = $r->phonecode;
        $Data->save();
        return back()->with('success_msg', 'Country data have been updated successfully.');
    }

   
} 
