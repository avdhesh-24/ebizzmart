<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use Auth;
use Helper;
use Image;

class StateController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function index($Id){
        $lists = State::where('country_id',$Id)->orderBy('name','ASC')->get();
        $country = $Id;
        return view('admin.state.list',compact('lists','country'));
    }


    public function New($country){
        return view('admin.state.add',compact('country'));
    }

  

    public function Edit($Id){
        $lists = State::find($Id);
        return view('admin.state.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $Data = State::find($r->removeId)->delete();
        return back()->with('success_msg', 'State data have been remove successfully.');
    }

    public function Status($Status,$Id){
        $Data = State::find($Id);
        $Data->status = $Status;
        $Data->save();
        return back()->with('success_msg', 'State status have been updated successfully.');
    }

    public function Save(Request $r){
        $validated = $r->validate([
                'title' => 'required',
            ]);
        $Data = new State();
        $Data->name = $r->title;
        $Data->country_id = $r->country;
        $Data->save();
        return back()->with('success_msg', 'State data have been saved successfully.');
    }

    public function Update(Request $r){
        $validated = $r->validate([
            'title' => 'required',
        ]);

        $Data = State::find($r->preId);
        $Data->name = $r->title;
        $Data->save();
        return back()->with('success_msg', 'State data have been updated successfully.');
    }


}
