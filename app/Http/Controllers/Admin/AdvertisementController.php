<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Advertisement;
use App\Models\AdvertisementSection;
use Auth;
use Helper;
use Image; 
class AdvertisementController extends Controller{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    
    public function index(){
        $lists = Advertisement::orderBy('id','DESC')->get();
        return view('admin.advertisement.list',compact('lists'));
    }

    public function New(){
        return view('admin.advertisement.add');
    }

    public function Edit($Id){
        $lists = Advertisement::find($Id);
        return view('admin.advertisement.edit',compact('lists'));
    }

    public function Remove(Request $r){
        $data = Advertisement::find($r->removeId);
        if(!empty($data->image) && file_exists(public_path('uploads/advertisement/'.$data->image))){
            unlink(public_path('uploads/advertisement/'.$data->image));
        }
        $data->delete();
        return back()->with('success_msg', 'Advertisement data have been remove successfully.');
    }

    public function Status($Status,$Id){
        Advertisement::where('id',$Id)->update(['status'=>$Status]);
        return back()->with('success_msg', 'Advertisement status have been updated successfully.');
    }

    public function Save(Request $r){
        $Image = $r->image;
        if(empty($Image)){return back()->with('error_msg', 'Please choose at least one image.');}
        foreach($Image as $img){
            $extension =  $img->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $FileName = Helper::DirectFile('uploads/advertisement/',$img);
            }else{
                $FileName = Helper::ImageWithSize('uploads/advertisement/',1901,150,$img);
            }
            $data = new Advertisement();
            $data->link = $r->link;
            $data->image = $FileName;
            $data->image_alt = $r->title;
            $data->save();
        }
        return back()->with('success_msg', 'Advertisement data have been saved successfully.');
    }

    public function Update(Request $r){
        if(empty($r->image)){
            $FileName = $r->preimage;
        }else{
            $extension =  $r->image->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP' || strtoupper($extension)=='MP4'){
                $FileName = Helper::DirectFile('uploads/advertisement/',$r->image);
            }else{
                $FileName = Helper::ImageWithSize('uploads/advertisement/',1201,170,$r->image);
            }
        }
        
        $data = Advertisement::find($r->preId);
        $data->link = $r->link;
        $data->image = $FileName;
        $data->image_alt = $r->title;
        $data->save();
        return back()->with('success_msg', 'Advertisement data have been updated successfully.');
    }

    public function Mapped(Request $r){
        $checks = $r->checkbox;
        $preId = $r->preId;

        if(!empty($checks)){
            AdvertisementSection::where('advertisement_id',$preId)->delete();
            foreach($checks as $check):
                $data = new AdvertisementSection(); 
                $data->advertisement_id = $preId;
                $data->section = $check; 
                $data->save();
            endforeach;    
        }
        return back()->with('success_msg', 'Advertisement section have been updated successfully.');
    }


    public function Section(Request $r){
        $Advertisment = $r->advertisement;
        $data = AdvertisementSection::where('advertisement_id',$Advertisment)->get();
        $Section=array();
        foreach($data as $roes):
            $Section[]=$roes->section;
        endforeach; 
        $Html='';
        if(in_array('top-of-latest-offers-home-page',$Section)){$checked1='checked';}else{$checked1='';}
        $Html .='<div class="col-lg-12 stretch-card mt-3">
                    <div class="form-group mb-1">
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" id="checkbox" '.$checked1.' name="checkbox[]" value="top-of-latest-offers-home-page" class="form-check-input">
                        <i class="input-helper"></i>
                        Top Of Latest Offers <strong>(Home Page)</strong>
                        </label>
                    </div>
                    </div>
                </div>';

        if(in_array('bottom-of-latest-offers-home-page',$Section)){$checked2='checked';}else{$checked2='';}
        $Html .='<div class="col-lg-12 stretch-card">
                    <div class="form-group mb-1">
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" id="checkbox" '.$checked2.' name="checkbox[]" value="bottom-of-latest-offers-home-page" class="form-check-input">
                        <i class="input-helper"></i>
                        Bottom Of Latest Offers <strong>(Home Page)</strong>
                        </label>
                    </div>
                    </div>
                </div>';

        if(in_array('top-of-deal-of-the-day-home-page',$Section)){$checked3='checked';}else{$checked3='';}        
        $Html .='<div class="col-lg-12 stretch-card">
                    <div class="form-group mb-1">
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" id="checkbox" '.$checked3.' name="checkbox[]" value="top-of-deal-of-the-day-home-page" class="form-check-input">
                        <i class="input-helper"></i>
                        Top Of Deal Of The Day <strong>(Home Page)</strong>
                        </label>
                    </div>
                    </div>
                </div>';

        if(in_array('bottom-of-deal-of-the-day-home-page',$Section)){$checked4='checked';}else{$checked4='';}
        $Html .='<div class="col-lg-12 stretch-card">
                    <div class="form-group mb-1">
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" id="checkbox" '.$checked4.' name="checkbox[]" value="bottom-of-deal-of-the-day-home-page" class="form-check-input">
                        <i class="input-helper"></i>
                        Bottom Of Deal Of The Day <strong>(Home Page)</strong>
                        </label>
                    </div>
                    </div>
                </div>';

        if(in_array('category-listing-page',$Section)){$checked5='checked';}else{$checked5='';}
        $Html .='<div class="col-lg-12 stretch-card">
                    <div class="form-group mb-1">
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                        <input type="checkbox" id="checkbox" '.$checked5.' name="checkbox[]" value="category-listing-page" class="form-check-input">
                        <i class="input-helper"></i>
                        On Category <strong>(Category Listing Page)</strong>
                        </label>
                    </div>
                    </div>
                </div>';

        if(in_array('brand-listing-page',$Section)){$checked5='checked';}else{$checked5='';}
        $Html .='<div class="col-lg-12 stretch-card">
                            <div class="form-group mb-1">
                            <div class="form-check form-check-flat form-check-primary">
                                <label class="form-check-label">
                                <input type="checkbox" id="checkbox" '.$checked5.' name="checkbox[]" value="brand-listing-page" class="form-check-input">
                                <i class="input-helper"></i>
                                On Category <strong>(Brand Listing Page)</strong>
                                </label>
                            </div>
                            </div>
                        </div>';

        echo $Html;
    }
}
