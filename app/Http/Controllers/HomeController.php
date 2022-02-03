<?php

namespace App\Http\Controllers;

use App\Models\PaymentCurrency;
use App\Models\Advertisement;
use App\Models\CompanyImage;
use Illuminate\Http\Request;
use App\Models\PaymentType;
use App\Models\ContactInfo;
use App\Models\Category;
use App\Models\Language;
use App\Models\Product;
use App\Models\Company;
use App\Models\Service;
use App\Models\Stories;
use App\Models\Banner;
use App\Models\Bottom;
use App\Models\State;
use App\Models\User;
use App\Models\City;
use App\Models\Cms;
use Helper;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth','verified');
    } 

  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index(){
        $sliders = Banner::where('status',1)->get();
        $bottoms = Bottom::where('status',1)->get();
        $companies = Company::where('status',1)->get();
        $featured = Product::with('defaultprice')->where(['status'=>1,'featured'=>1])->get();
        $categories = Category::with('child','child.child')->where(['status'=>1,'home'=>1])->get();
        $advertisements = Advertisement::whereRaw('? between start_date and end_date', [date('Y-m-d')])->where('status',1)->get();
        return view('home',compact('sliders','bottoms','advertisements','categories','featured','companies'));
    }

    public function Search(){
        $heights = Height::where('status',1)->get();
        $states = State::where('status',1)->get();
        $cities = City::where('status',1)->get();
        $castes = Caste::where('status',1)->get();
        $maritals = Marital::where('status',1)->get();
        $mothertongues = MontherTongue::where('status',1)->get();
        $regionals = Regional::where('status',1)->get();
        $religions = Religion::where('status',1)->get();
        $employesectors = EmployedIn::where('status',1)->get();
        $degrees = HeighestDegree::where('status',1)->get();
        return view('search',compact('degrees','employesectors','religions','regionals','heights','states','cities','castes','maritals','mothertongues'));
    }

    public function Contact(){
        $lists = ContactInfo::where('status',1)->get();
        return view('contact',compact('lists'));
    }

    public function terms(){
        $cms = Cms::find(7);
        return view('cms',compact('cms'));
    }

    
    public function privacy_policy(){
        $cms = Cms::find(9);
        return view('cms',compact('cms'));
    }

    public function cookie_policy(){
        $cms = Cms::find(10);
        return view('cms',compact('cms'));
    }

    
    public function Help($Alias=null){
        if($Alias!=''){
            $meta = HelpCategory::where(['alias'=>$Alias])->first();
            $lists = HelpQuestion::where(['category_id'=>$meta->id])->get();
            $data = Cms::find(13);
            return view('help-view',compact('lists','data','meta'));
        }else{
            $lists = HelpCategory::where(['status'=>1])->get();
            $data = Cms::find(13);
            return view('help',compact('lists','data'));
        }
    }

    public function Search_Profile(Request $r){
        
        $profile = $r->profile;
        $horoscope = $r->horoscope;
        $user = User::where('status',1);
        if(!empty($r->name)){ $user = $user->where('name','LIKE','%'.$r->name.'%')->orwhere('matrin_id','LIKE','%'.$r->name.'%');}
        if(!empty($r->age)){ $user = $user->where('age',$r->age);}
        if(!empty($r->height)){ $user = $user->where('height',$r->height);}
        if(!empty($r->religion)){ $user = $user->where('religion',$r->religion);}
        if(!empty($r->caste)){ $user = $user->where('caste',$r->caste);}
        if(!empty($r->mother_tongue)){ $user = $user->where('mother_tongue',$r->mother_tongue);}
        if(!empty($r->country)){ $user = $user->where('country',$r->country);}
        if(!empty($r->income)){ $user = $user->where('annual_income',$r->income);}
        if(!empty($r->job_sector)){ $user = $user->where('job_details',$r->job_sector);}
        if(!empty($r->degree)){ $user = $user->where('specific_degree',$r->degree);}
        if(!empty($r->smoke)){ $user = $user->where('smoking',$r->smoke);}
        if(!empty($r->drink)){ $user = $user->where('take_hard_drinks',$r->drink);}
        if(!empty($r->diet)){ $user = $user->where('eating_habit',$r->diet);}
        if(!empty($r->challenged)){ $user = $user->where('challenged',$r->challenged);}
        if(!empty($r->abroad)){ $user = $user->where('abroad',$r->abroad);}
        if(!empty($r->hiv)){ $user = $user->where('hiv',$r->hiv);}

        if(!empty(Auth::user()->id)){ 
            $user = $user->whereNotIn('id',[Auth::user()->id])->paginate(10);
        }else{
            $user = $user->paginate(10);
        }

        $casts = Caste::where('status',1)->orderby('title','ASC')->get();
        $castdatas=array();
        foreach($casts as $cast):
            $castcount = User::where(['status'=>1,'caste'=>$cast->id])->count();
            $castdatas[] = ['result'=>$cast,'count'=>$castcount];
        endforeach;
        
        $maritals = Marital::where('status',1)->orderby('title','ASC')->get();
        $maritaldatas=array();
        foreach($maritals as $marital):
            $maritalcount = User::where(['status'=>1,'marital_status'=>$marital->id])->count();
            $maritaldatas[] = ['result'=>$marital,'count'=>$maritalcount];
        endforeach;

        $mothertongues = MontherTongue::where('status',1)->orderby('title','ASC')->get();
        $mothertonguedatas=array();
        foreach($mothertongues as $mothertongue):
            $mothertonguecount = User::where(['status'=>1,'mother_tongue'=>$mothertongue->id])->count();
            $mothertonguedatas[] = ['result'=>$mothertongue,'count'=>$mothertonguecount];
        endforeach;

        $sectors = EmployedIn::where('status',1)->orderby('title','ASC')->get();
        $sectordatas=array();
        foreach($sectors as $sector):
            $sectorcount = User::where(['status'=>1,'job_details'=>$sector->id])->count();
            $sectordatas[] = ['result'=>$sector,'count'=>$sectorcount];
        endforeach;

        $degrees = HeighestDegree::where('status',1)->orderby('title','ASC')->get();
        $degredatas=array();
        foreach($degrees as $degre):
            $degrecount = User::where(['status'=>1,'education'=>$degre->id])->count();
            $degredatas[] = ['result'=>$degre,'count'=>$degrecount];
        endforeach;


        $manglikArr=array('Yes','No','Dont Know');
        $manglikdatas=array();
        foreach($manglikArr as $manglik):
            $manglikcount = User::where(['status'=>1,'manglik_status'=>$manglik])->count();
            $manglikdatas[] = ['result'=>$manglik,'count'=>$manglikcount];
        endforeach;



        return view('search-profile',compact('user','castdatas','manglikdatas','degredatas','maritaldatas','sectordatas','mothertonguedatas'));
       
    }

    public function Category($alias=null){
        $data = Category::where('alias',$alias)->first();
        if(empty($data)){abort(404); }
        $childs = Category::where('parent',$data->id)->count();
        return view('category',compact('alias','data','childs'));
    }

    public function Product($alias){
        $data = Product::where('alias',$alias)->first();
        if(empty($data)){ abort(404); }
        return view('product',compact('alias','data'));
    }

    public function Company($alias=null,$page=null){
        $data = Company::with('user','business','factories','trademarketdistribution','type','banners','countries','cities','albums','certification','productcertification')->where('company_alias',$alias)->first();
        if(empty($data)){ abort(404); }
        if(!empty($page)){
            $paymenttypes = PaymentType::where('status',1)->orderby('name','ASC')->get();
            $languages = Language::where('status',1)->orderby('name','ASC')->get();
            $paymentcurrencies = PaymentCurrency::where('status',1)->orderby('name','ASC')->get();
        
            if($page=='about'){ return view('company-about',compact('alias','data','paymenttypes','languages','paymentcurrencies')); }
            if($page=='contact'){ return view('company-contact',compact('alias','data')); }
        }else{
            return view('company',compact('alias','data'));
        }
    }

    public function Companies(){
        $data = Company::where('status',1)->paginate(1);
        return view('companies',compact('data'));
    }
}
