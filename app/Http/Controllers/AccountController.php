<?php

namespace App\Http\Controllers;

use App\Models\CompanyProductCertification;
use Illuminate\Support\Facades\Validator;
use App\Models\MainMarketDistribution;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyCertification;
use App\Models\CompanyBannerImage;
use App\Models\MembershipPrice;
use App\Models\PaymentCurrency;
use App\Models\CompanyFactorie;
use Illuminate\Http\Request;
use App\Models\BusinessType;
use App\Models\CompanyImage;
use App\Models\Testimonial;
use App\Models\PaymentType;
use App\Models\Membership;
use App\Models\UserImage;
use App\Models\UserType;
use App\Models\Category;
use App\Models\Language;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\Plan;
use App\Models\User;
use App\Models\City;
use App\Models\Bank;
use Helper;
use Auth;
use Mail;
class AccountController extends Controller{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }

    public function Complete_Registration(){
        $countries = Country::where('status',1)->orderby('name','ASC')->get();
        $states = State::where('country_id',Auth::user()->country)->get();
        $Sta=array();
        foreach($states as $state){
            $Sta[] = $state->id;
        }
        $cities = City::whereIn('state_id',$Sta)->where('status',1)->get();
        $usertype = UserType::where('status',1)->orderby('name','ASC')->get();
        $businesstype = BusinessType::where('status',1)->orderby('id','ASC')->get();
        return view('auth.complete-registration',compact('countries','usertype','businesstype','cities'));
    }

    public function index(){
        $countries = Country::where('status',1)->orderby('name','ASC')->get();
        $states = State::where('country_id',Auth::user()->country)->get();
        $Sta=array();
        foreach($states as $state){
            $Sta[] = $state->id;
        }
        $cities = City::whereIn('state_id',$Sta)->where('status',1)->get();
        $usertype = UserType::where('status',1)->orderby('name','ASC')->get();
        $businesstype = BusinessType::where('status',1)->orderby('id','ASC')->get();
        $list = User::with('comp','banks','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        return view('account.profile',compact('list','countries','usertype','businesstype','cities'));
    }

    public function Company(){
        $list = User::with('comp','banks','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        $countries = Country::where('status',1)->orderby('name','ASC')->get();
        $states = State::where('country_id',Auth::user()->country)->get();
        $categories = $this->getCategory(0,$list->comp->business_in);
        $Sta=array();
        foreach($states as $state){
            $Sta[] = $state->id;
        }
        $cities = City::whereIn('state_id',$Sta)->where('status',1)->get();
        $usertype = UserType::where('status',1)->orderby('name','ASC')->get();
        $businesstype = BusinessType::where('status',1)->orderby('id','ASC')->get();
        $albums = CompanyImage::where('company_id',Auth::user()->company)->get();
        $banners = CompanyBannerImage::where('company_id',Auth::user()->company)->get();
        return view('account.company-info',compact('categories','list','albums','banners','countries','cities','usertype','businesstype'));    
    }

    public function Company_Introduction(){
        $list = User::with('comp','banks','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        return view('account.company-introduction',compact('list'));    
    }

    public function Partner_Factories(){
        $list = User::with('comp','banks','comp.factories','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        return view('account.partner-factories',compact('list'));    
    }

    public function Certifications_Trademarks(){
        $list = User::with('comp','banks','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        $certifications = CompanyCertification::where('company_id',Auth::user()->company)->get();
        $productcertifications = CompanyProductCertification::where('company_id',Auth::user()->company)->get();
        return view('account.certifications-and-trademarks',compact('list','productcertifications','certifications'));    
    }

    public function Trade_Capacity(){
        $paymenttypes = PaymentType::where('status',1)->orderby('name','ASC')->get();
        $languages = Language::where('status',1)->orderby('name','ASC')->get();
        $paymentcurrencies = PaymentCurrency::where('status',1)->orderby('name','ASC')->get();
        $markets = MainMarketDistribution::where('company_id',Auth::user()->company)->first();
        $list = User::with('comp','banks','comp.business','comp.type')->where('id',Auth()->user()->id)->first();
        return view('account.trade-capacity',compact('list','markets','paymentcurrencies','languages','paymenttypes'));    
    }

    public function getCategory($parent=null,$BuinessIn=null){
        $data = Category::where('parent',$parent)->get();
        $Html ='';
        foreach($data as $da){
            $select='';
            $child = $this->getCategory($da->id,$BuinessIn);
            if(!empty($child)){
                $Html .='<optgroup label="'.$da->name.'">
                            '.$child.'
                        </optgroup>';
            }else{
                if(!empty($BuinessIn)){ 
                    $PreData = json_decode($BuinessIn); 
                    if(in_array($da->id,$PreData)){ $select='selected';}
                }
                $Html .='<option value="'.$da->id.'" '.$select.'>'.$da->name.'</option>';
            }
            
        }
        return $Html;
    }
  
    public function User_Information(Request $r){
        $data = User::find(Auth()->user()->id);
        $data->name = $r->name;
        $data->alternative_phone = $r->alternative_phone;
        $data->alternative_email = $r->alternative_email;
        $data->product_interest = $r->product_interest;
        $data->address = $r->address;
        $data->country = $r->country;
        $data->city = $r->city;
        $data->save();
        return redirect()->back()->with(array('success_msg' => 'Your profile has been updated successfully!')); 
    }

    public function Update_Company_Introduction(Request $r){
        $data = Company::find(Auth()->user()->company);
        $data->company_introduction = $r->company_introduction;
        $data->save();
        return response()->json([
            'message'   => 'Introduction Upload Successfully',
        ]);
    }

    public function Company_Information(Request $r){
        $data = Company::find(Auth()->user()->company);
        if($r->for=='company-other-info'){
            $data->website = $r->website;
            $data->established = $r->established;
            $data->certifications = $r->certifications;
            $data->annual_revenue = $r->annual_revenue;
            $data->employees = $r->employees;
            $data->patents = $r->patents;
        }else{
            $data->company_name = $r->company;
            $data->gst = $r->gst;
            $data->iam = $r->iam;
            $data->company_phone_no = $r->company_phone_no;
            $data->business_type = $r->business_type;
            $data->country = $r->country;
            $data->city = $r->city;
            $data->address = $r->address;
            $data->pincode = $r->pincode;
            $data->about = $r->about;
            $data->business_in = ($r->business_in ? json_encode($r->business_in) :'');
        }
        $data->save();
        return redirect()->back()->with(array('success_msg' => 'Company profile has been updated successfully!')); 
    }

    public function Update_Trade_Capacity(Request $r){
        $data = Company::find(Auth()->user()->company);
        $data->annual_sales = $r->annual_sales;
        $data->export_percentage = $r->export_percentage;
        $data->start_exporting = $r->start_exporting;
        $data->trade_department = $r->trade_department;
        $data->multiple_industries = $r->multiple_industries;
        $data->overseas_office = $r->overseas_office;
        $data->currency = ($r->currency ? json_encode($r->currency) : '');
        $data->payment_type = ($r->type ? json_encode($r->type) : '');
        $data->language = ($r->language ? json_encode($r->language) : '');
        $data->save();

        $find = MainMarketDistribution::where('company_id',Auth::user()->company)->first();  
        if(empty($find)){
            $market = new MainMarketDistribution();
            $market->company_id = Auth()->user()->company;
        }else{
            $market = MainMarketDistribution::find($find->id);
        }
        $market->north_america = $r->north_america;
        $market->south_america = $r->south_america;
        $market->central_america = $r->central_america;
        $market->eastern_europe = $r->eastern_europe;
        $market->northern_europe = $r->northern_europe;
        $market->southern_europe = $r->southern_europe;
        $market->southeast_asia = $r->southeast_asia;
        $market->eastern_asia = $r->eastern_asia;
        $market->south_asia = $r->south_asia;
        $market->africa = $r->africa;
        $market->oceania = $r->oceania;
        $market->mid_east = $r->mid_east;
        $market->domestic_market = $r->domestic_market;
        $market->save();

        return response()->json([
            'message'   => 'Information Updated Successfully',
        ]);
    }

    public function Company_Logo(Request $request){
        $ImgHtml='';
        $LogoHtml='';
        if ($request->file('logo')) {
            $logoPath = $request->file('logo');
            $extension =  $logoPath->getClientOriginalExtension();
            if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                $LogoName = Helper::DirectFile('uploads/company/',$logoPath);
            }else{
                $LogoName = Helper::ImageWithSize('uploads/company/',200,200,$logoPath);
            }
            $image =  Company::find(Auth::user()->company);
            $image->logo = $LogoName;
            $image->save();
            $LogoHtml .= '<div class="col-2">
                                <div class="ComAlbums">
                                    <div><img src="'.asset('uploads/company/'.$LogoName).'"/></div>
                                </div>
                            </div>';
        }else{
            $LogoName = $request->prelogo;
            $LogoHtml .= '<div class="col-2">
                                <div class="ComAlbums">
                                    <div><img src="'.asset('uploads/company/'.$LogoName).'"/></div>
                                </div>
                            </div>';
        }

        if ($request->file('banner')) {
            $imagePath = $request->file('banner');
            foreach($imagePath as $img){
                $extension =  $img->getClientOriginalExtension();
                if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                    $ImageName = Helper::DirectFile('uploads/company/banner/',$img);
                }else{
                    $ImageName = Helper::ImageWithSize('uploads/company/banner/',1350,400,$img);
                }
                $image = new CompanyBannerImage;
                $image->image = $ImageName;
                $image->company_id = Auth::user()->company;
                $image->save();

                $ImgHtml .= '<div class="col-3">
                                    <div class="ComAlbums">
                                        <a href="'.asset('uploads/company/banner/'.$ImageName).'" data-fancybox="gallery">
                                            <img src="'.asset('uploads/company/banner/'.$ImageName).'"/>
                                        </a>
                                        <button type="button" onclick="RemoveCompanyBanner('.$image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                                    </div>
                                </div>';
            }
        }
  
          return response()->json([
            'message'   => 'Data Uploaded Successfully',
            'banner_image' => $ImgHtml,
            'logo' => $LogoHtml
          ]);
    }

    public function Remove_Company_Banner(Request $r){
        $Id = $r->id;
        $data = CompanyBannerImage::find($Id);
        $CompanyId = $data->company_id;
        $data->delete();

        $Images = CompanyBannerImage::where('company_id',$CompanyId)->get();
        if(!empty($data->image) && file_exists(public_path('uploads/company/banner/'.$data->image))){
            unlink(public_path('uploads/company/banner/'.$data->image));
        } 

        $ImgHtml ='';
        foreach($Images as $Image){
            $ImgHtml .= '<div class="col-3">
                            <div class="ComAlbums">
                                <a href="'.asset('uploads/company/banner/'.$Image->image).'" data-fancybox="gallery">
                                    <img src="'.asset('uploads/company/banner/'.$Image->image).'"/>
                                </a>
                                <button type="button" onclick="RemoveCompanyBanner('.$Image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                            </div>
                        </div>';    
        }
        

        return response()->json([
            'message'   => 'Image Removed Successfully',
            'banner_image' => $ImgHtml
          ]);
    }

    public function Company_Album(Request $request){
        // $request->validate([
        //     'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        //   ]);
            $ImgHtml='';
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                foreach($imagePath as $img){
                    $extension =  $img->getClientOriginalExtension();
                    if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                        $ImageName = Helper::DirectFile('uploads/company/',$img);
                        $thumb = $ImageName;
                        \File::copy(public_path('uploads/company/'.$ImageName),public_path('uploads/company/thumb/'.$ImageName));
                
                    }else{
                        $thumb = Helper::ImageWithSize('uploads/company/thumb/',400,400,$img);
                        $ImageName = Helper::ImageWithSize('uploads/company/',1000,1000,$img);
                    }
                    $image = new CompanyImage;
                    $image->thumb_image = $thumb;
                    $image->image = $ImageName;
                    $image->company_id = Auth::user()->company;
                    $image->save();

                    $ImgHtml .= '<div class="col-2">
                                    <div class="ComAlbums">
                                        <div><img src="'.asset('uploads/company/thumb/'.$thumb).'"/></div>
                                        <button type="button" onclick="RemoveAlbum('.$image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                                    </div>
                                </div>';
                }
            }
  
          return response()->json([
            'message'   => 'Image Upload Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    function Remove_Company_Album(Request $r){
        $Id = $r->id;
        $data = CompanyImage::find($Id);
        $CompanyId = $data->company_id;
        $data->delete();

        $Images = CompanyImage::where('company_id',$CompanyId)->get();
        if(!empty($data->thumb_image) && file_exists(public_path('uploads/company/thumb/'.$data->thumb_image))){
            unlink(public_path('uploads/company/thumb/'.$data->thumb_image));
        }
        if(!empty($data->image) && file_exists(public_path('uploads/company/'.$data->image))){
            unlink(public_path('uploads/company/'.$data->image));
        } 

        $ImgHtml ='';
        foreach($Images as $Image){
            $ImgHtml .= '<div class="col-2">
                            <div class="ComAlbums">
                                <div><img src="'.asset('uploads/company/thumb/'.$Image->thumb_image).'"/></div>
                                <button type="button" onclick="RemoveAlbum('.$Image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                            </div>
                        </div>';    
        }
        

        return response()->json([
            'message'   => 'Image Removed Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    public function Company_Certifications(Request $request){
       
            $ImgHtml='';
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                foreach($imagePath as $key => $img){
                    $extension =  $img->getClientOriginalExtension();
                    if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                        $ImageName = Helper::DirectFile('uploads/company/certifications/',$img);
                        $thumb = $ImageName;
                        \File::copy(public_path('uploads/company/certifications/'.$ImageName),public_path('uploads/company/certifications/thumb/'.$ImageName));
                
                    }else{
                        $thumb = Helper::ImageWithSize('uploads/company/certifications/thumb/',400,400,$img);
                        $ImageName = Helper::ImageWithSize('uploads/company/certifications/',1000,1000,$img);
                    }
                    $image = new CompanyCertification;
                    $image->thumb_image = $thumb;
                    $image->image = $ImageName;
                    $image->name = ($request->certificate_name[$key] ? $request->certificate_name[$key] : '');
                    $image->company_id = Auth::user()->company;
                    $image->save();

                    $ImgHtml .= '<div class="col-3">
                                    <div class="ComAlbums">
                                        <div><img src="'.asset('uploads/company/certifications/thumb/'.$thumb).'"/></div>
                                        <button type="button" onclick="RemoveCertifications('.$image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                                    </div>
                                    <h3 class="h6 text-center thm1">'.$image->name.'</h3>
                                </div>';
                }
            }
  
          return response()->json([
            'message'   => 'Image Upload Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    function Remove_Company_Certifications(Request $r){
        $Id = $r->id;
        $data = CompanyCertification::find($Id);
        $CompanyId = $data->company_id;
        $data->delete();

        $Images = CompanyCertification::where('company_id',$CompanyId)->get();
        if(!empty($data->thumb_image) && file_exists(public_path('uploads/company/certifications/thumb/'.$data->thumb_image))){
            unlink(public_path('uploads/company/certifications/thumb/'.$data->thumb_image));
        }
        if(!empty($data->image) && file_exists(public_path('uploads/company/certifications/'.$data->image))){
            unlink(public_path('uploads/company/certifications/'.$data->image));
        } 

        $ImgHtml ='';
        foreach($Images as $Image){
            $ImgHtml .= '<div class="col-3">
                            <div class="ComAlbums">
                                <div><img src="'.asset('uploads/company/certifications/thumb/'.$Image->thumb_image).'"/></div>
                                <button type="button" onclick="RemoveCertifications('.$Image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                            </div>
                            <h3 class="h6 text-center thm1">'.$Image->name.'</h3>
                        </div>';    
        }
        

        return response()->json([
            'message'   => 'Image Removed Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    public function Company_Product_Certifications(Request $request){
        $ImgHtml='';
            if ($request->file('file')) {
                $imagePath = $request->file('file');
                foreach($imagePath as $key => $img){
                    $extension =  $img->getClientOriginalExtension();
                    if(strtoupper($extension)=='SVG' || strtoupper($extension)=='WEBP'){
                        $ImageName = Helper::DirectFile('uploads/company/product-certifications/',$img);
                        $thumb = $ImageName;
                        \File::copy(public_path('uploads/company/product-certifications/'.$ImageName),public_path('uploads/company/product-certifications/thumb/'.$ImageName));
                
                    }else{
                        $thumb = Helper::ImageWithSize('uploads/company/product-certifications/thumb/',400,400,$img);
                        $ImageName = Helper::ImageWithSize('uploads/company/product-certifications/',1000,1000,$img);
                    }
                    $image = new CompanyProductCertification;
                    $image->thumb_image = $thumb;
                    $image->image = $ImageName;
                    $image->name = ($request->certificate_name[$key] ? $request->certificate_name[$key] : '');
                    $image->company_id = Auth::user()->company;
                    $image->save();

                    $ImgHtml .= '<div class="col-3">
                                    <div class="ComAlbums">
                                        <div><img src="'.asset('uploads/company/product-certifications/thumb/'.$thumb).'"/></div>
                                        <button type="button" onclick="RemoveProductCertifications('.$image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                                    </div>
                                    <h3 class="h6 text-center thm1">'.$image->name.'</h3>
                                </div>';
                }
            }
  
          return response()->json([
            'message'   => 'Image Upload Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    function Remove_Company_Product_Certifications(Request $r){
        $Id = $r->id;
        $data = CompanyProductCertification::find($Id);
        $CompanyId = $data->company_id;
        $data->delete();

        $Images = CompanyProductCertification::where('company_id',$CompanyId)->get();
        if(!empty($data->thumb_image) && file_exists(public_path('uploads/company/product-certifications/thumb/'.$data->thumb_image))){
            unlink(public_path('uploads/company/product-certifications/thumb/'.$data->thumb_image));
        }
        if(!empty($data->image) && file_exists(public_path('uploads/company/product-certifications/'.$data->image))){
            unlink(public_path('uploads/company/product-certifications/'.$data->image));
        } 

        $ImgHtml ='';
        foreach($Images as $Image){
            $ImgHtml .= '<div class="col-3">
                            <div class="ComAlbums">
                                <div><img src="'.asset('uploads/company/product-certifications/thumb/'.$Image->thumb_image).'"/></div>
                                <button type="button" onclick="RemoveProductCertifications('.$Image->id.')" class="btn btn-danger btn-close"><!--<i class="fa fa-trash"></i>--></button>
                            </div>
                            <h3 class="h6 text-center thm1">'.$Image->name.'</h3>
                        </div>';    
        }
        

        return response()->json([
            'message'   => 'Image Removed Successfully',
            'uploaded_image' => $ImgHtml
          ]);
    }

    public function Bank_Information(Request $r){
        if(Auth()->user()->bank==0){ 
            $data = new Bank(); 
        }
        else{ $data = Bank::find(Auth()->user()->bank); }
        $data->ifsc_code = $r->ifsc_code;
        $data->bank_name = $r->bank_name;
        $data->account_number = $r->account_number;
        $data->account_type = $r->account_type;
        $data->save();

        $user = User::find(Auth()->user()->id);
        $user->bank = $data->id;
        $user->save();

        return redirect()->back()->with(array('success_msg' => 'Your profile has been updated successfully!')); 
    }

    public function Change_Password(){
        return view('account.change-password');
    }

    public function Save_Password(Request $r){
        $this->validate($r,[
            'old_password'=>'required',
            'password'=>'required_with:confirm_password',
         ]);

        $Old = $r->old_password;
        $New = $r->password;
        $Confirm = $r->confirm_password;
        if (Hash::check($Old,Auth::user()->password)) {
            $data = User::find(Auth::user()->id);
            $data->password = bcrypt($New);
            $data->save();
            return redirect()->back()->with(array('success_msg' => 'Your password has been changed successfully!')); 
    
        }else{
            return redirect()->back()->with(array('error_msg' => 'Your old password don`t match.please try again!')); 
    
        }
    }

    public function Post_Testimonials(){
        $lists = Testimonial::orderby('id','DESC')->paginate(5);
        return view('account.post-testimonials',compact('lists'));
    }

    public function Edit_Testimonials($Id){
        $lists = Testimonial::find($Id);
        return view('account.edit-testimonials',compact('lists'));
    }

    public function Save_Post_Testimonials(Request $r){
        $this->validate($r,[
            'rating'=>'required',
            'name'=>'required',
            'message'=>'required',
        ]);

        $rating = $r->rating;
        $name = $r->name;
        $email = $r->email;
        $message = $r->message;

        $data = new Testimonial();
        $data->user_id = Auth::user()->id;
        $data->rating = $rating;
        $data->name = $name;
        $data->email = $email;
        $data->message = $message;
        $data->save();
        return redirect()->back()->with(array('success_msg' => 'Your testimonial post has been saved successfully!')); 
    }

    public function Update_Post_Testimonials(Request $r){
        $this->validate($r,[
            'rating'=>'required',
            'name'=>'required',
            'message'=>'required',
        ]);

        $preId = $r->preId;
        $rating = $r->rating;
        $name = $r->name;
        $email = $r->email;
        $message = $r->message;

        $data = Testimonial::find($preId);
        $data->user_id = Auth::user()->id;
        $data->rating = $rating;
        $data->name = $name;
        $data->email = $email;
        $data->message = $message;
        $data->save();
        return redirect()->back()->with(array('success_msg' => 'Your testimonial post has been updated successfully!')); 
    }

    public function Remove_Testimonials($Id){
        $data = Testimonial::find($Id);
        $data->delete();
        return redirect()->back()->with(array('success_msg' => 'Your post testimonial has been removed successfully!')); 
    
    }

    public function Manage_Membership(){
        $memberships = Membership::where(['status'=>1])->get();
        $memberships_plans = Plan::where(['status'=>1])->get();
        $membership_price = MembershipPrice::all();
        return view('account.manage-membership',compact('memberships','memberships_plans','membership_price'));
    }


    public function Complete_Profile(){
        $castes = Caste::where('status',1)->get();
        $regionals = Regional::where('status',1)->get();
        $religions = Religion::where('status',1)->get();
        $mothertongue = MontherTongue::where('status',1)->get();
        $marital = Marital::where('status',1)->get();
        $height = Height::where('status',1)->get();
        return view('auth.complete-profile',compact('castes','mothertongue','height','marital','religions','regionals'));
    }


    public function Save_Complete_Profile(Request $r){
        $validated = $r->validate([
            'name' => 'required',
            'country' => 'required',
            'city' => 'required',
            'company_phone_no' => 'required',
            'company_name' => 'required',
            'business_type' => 'required',
            'iam' => 'required',
            'free_membership_agreement'=>'required',
            'receive_emails'=>'required',
        ]);

        $Data = User::find(Auth::user()->id);
        $Data->name = $r->name;
        $Data->alternative_email = $r->alternative_email;
        $Data->alternative_phone = $r->alternative_phone;
        $Data->country = $r->country;
        $Data->city = $r->city;
        $Data->free_membership_agreement = $r->free_membership_agreement;
        $Data->receive_emails = $r->receive_emails;
        

        $company = new Company();
        $company->company_phone_no = $r->company_phone_no;
        $company->company_name = $r->company_name;
        $company->company_alias = Helper::NewAlias('companies','company_name',$r->company_name);
        $company->business_type = $r->business_type;
        $company->iam = $r->iam;
        $company->save();

        $Data->company = $company->id;
        $Data->save();

        return redirect(route('profile'))->with(array('success_msg' => 'Your profile has been completed successfully.')); 
    

    }
    
    public function Get_Country_State(Request $r){
        $Country = $r->country;
        return State::where(['status'=>1,'country_id'=>$Country])->get();
    }

    public function Country_City(Request $r){
        $states = State::where('country_id',$r->country)->get();
        $Sta=array();
        foreach($states as $state){
            $Sta[] = $state->id;
        }
        $cities = City::whereIn('state_id',$Sta)->where('status',1)->get();
        return $cities;
    }

    public function Save_Partner_factories(Request $r){
        if(!empty($r->preId)){
            $data = CompanyFactorie::find($r->preId);
        }else{
            $data = new CompanyFactorie();
        }
        
        $data->company_id = Auth::user()->company;
        $data->factory_size = $r->factory_size;
        $data->factory_address = $r->factory_region;
        $data->production_line = $r->production_line;
        $data->annual_output = $r->annual_output;
        $data->manufacturing = $r->manufacturing;
        $data->save();
        return response()->json([
            'message'   => 'Factorie Added Successfully',
        ]);
    }

}
