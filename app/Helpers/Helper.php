<?php
namespace App\Helpers ;

use Illuminate\Http\Request;
use Validator;
use Image;
use Sendgrid;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\CommanEmail;
use App\Models\Category;
use Mail;
class Helper{

    static function NewAlias($Table,$Field,$Title){
        $table=$Table; 
        $field=$Field; 
        $slug = $Title; 
        $slug = Str::slug($Title, "-");
        $key=NULL;
        $value=NULL;
        $i = 0;
        $params = array ();
        $params[$field] = $slug;
        if($key)$params["$key !="] = $value;
        while (DB::table($table)->where($params)->get()->count())
        {
            if (!preg_match ('/-{1}[0-9]+$/', $slug ))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                $params [$field] = $slug;
        }

       return  $alias=$slug;
    }

    static function SupportEnquiry(){
        return "support@ebizzmart.in";
    }

    static function OrderEnquiry(){
        return "order@ebizzmart.in";
    }

    static function InfoEnquiry(){
        return "info@ebizzmart.in";
    }

    static function ContactEnquiry(){
        return "contact@ebizzmart.in";
    }

    static function CompanyCategory($Category){
        if(!empty($Category)){
            $Arr = json_decode($Category);
            $Cat = Category::whereIn('id',$Arr)->get();
            $html = '';
            foreach($Cat as $ct):
                $html .= self::ParentCat($ct);
            endforeach;
            return $html;
        }
    }

    static function ParentCat($data){
        if($data->parent==0){
            return $data->name;
        }else{
            $Cat = Category::find($data->parent);
            self::ParentCat($Cat);
        }
    }

    static function dateDifference($start_date, $end_date){
        // calulating the difference in timestamps 
        $diff = strtotime($start_date) - strtotime($end_date);
        
        // 1 day = 24 hours 
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }

    static function ProductImageWithSize($path,$width,$height,$image){
        $extension =  $image->getClientOriginalExtension(); // getting image extension
        $fileName = date("Y-m-d").rand(1111111,9999999).'.webp'; // renameing image
        $imagesource = public_path($path. $fileName); // upload path
	    Image::make($image->getRealPath())->encode('webp', 90)->resize($width,$height,function ($constraint) {
                    $constraint->aspectRatio();
        })->brightness(1)->save($imagesource);
        return $fileName;
    }

    static function ImageWithSize($path,$width,$height,$image){
        $extension =  $image->getClientOriginalExtension(); // getting image extension
        $fileName = date("Y-m-d").rand(1111111,9999999).'.webp'; // renameing image
        $imagesource = public_path($path. $fileName); // upload path
	    Image::make($image->getRealPath())->encode('webp', 90)->resize($width,null,function ($constraint) {
                    $constraint->aspectRatio();
        })->brightness(1)->save($imagesource);
        return $fileName;
    }


    static function ImageWithOutSize($path,$image){
        $extension =  $image->getClientOriginalExtension(); // getting image extension
        $fileName = date("Y-m-d").rand(1111111,9999999).'.'.$extension; // renameing image
        $imagesource = public_path($path. $fileName); // upload path
		Image::make($image->getRealPath())->brightness(1)->save($imagesource);
        return $fileName;
    }


    static function DirectFile($Path,$Image){
        $extension =  $Image->getClientOriginalName(); 
        $fileName = date("Y-m-d").rand(1111111,9999999).'.'.$extension; 
        $Image->move($Path,$fileName);
        return $fileName;
    }
    
    
    static function youtube_preview($data,$width,$height){
        $url = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe class='".$width."' height='" . $height . "' src='//www.youtube.com/embed/$1\' frameborder='0' allowfullscreen></iframe>", $data);
        return $url;
    }
   

    static public function sendMail($email,$subject,$title,$message){
        $data = [
            'title' => $title,
            'subject' => $subject,
            'description'=>$message,
        ];
  
       return  Mail::to($email)->send(new CommanEmail($data));
    }

    static function getPartnerMatch($FromUser){
        $NumCout=0;
        if(!empty($FromUser->age) && !empty(Auth::user()->looking_age)){
            if($FromUser->age==Auth::user()->looking_age){ $NumCout +=1; }
        }
        if(!empty($FromUser->height) && !empty(Auth::user()->looking_height)){
            if($FromUser->height==Auth::user()->looking_height){ $NumCout +=1; }
        }
        if(!empty($FromUser->gender) && !empty(Auth::user()->looking_gender)){
            if($FromUser->gender==Auth::user()->looking_gender){ $NumCout +=1; }
        }
        if(!empty($FromUser->marital_status) && !empty(Auth::user()->looking_marital_status)){
            if($FromUser->marital_status==Auth::user()->looking_marital_status){ $NumCout +=1; }
        }
        if(!empty($FromUser->religion) && !empty(Auth::user()->looking_religion)){
            if($FromUser->religion==Auth::user()->looking_religion){ $NumCout +=1; }
        }
        if(!empty($FromUser->caste) && !empty(Auth::user()->looking_caste)){
            if($FromUser->caste==Auth::user()->looking_caste){ $NumCout +=1; }
        }
        if(!empty($FromUser->sub_caste) && !empty(Auth::user()->looking_sub_caste)){
            if($FromUser->sub_caste==Auth::user()->looking_sub_caste){ $NumCout +=1; }
        }
        if(!empty($FromUser->gothr) && !empty(Auth::user()->looking_gothr)){
            if($FromUser->gothr==Auth::user()->looking_gothr){ $NumCout +=1; }
        }
        if(!empty($FromUser->monther_tongue) && !empty(Auth::user()->looking_monther_tongue)){
            if($FromUser->monther_tongue==Auth::user()->looking_monther_tongue){ $NumCout +=1; }
        }
        if(!empty($FromUser->features) && !empty(Auth::user()->looking_features)){
            if($FromUser->features==Auth::user()->looking_features){ $NumCout +=1; }
        }
        if(!empty($FromUser->complexion) && !empty(Auth::user()->looking_complexion)){
            if($FromUser->complexion==Auth::user()->looking_complexion){ $NumCout +=1; }
        }
        if(!empty($FromUser->special_cases) && !empty(Auth::user()->looking_special_cases)){
            if($FromUser->special_cases==Auth::user()->looking_special_cases){ $NumCout +=1; }
        }
        if(!empty($FromUser->blood_group) && !empty(Auth::user()->looking_blood_group)){
            if($FromUser->blood_group==Auth::user()->looking_blood_group){ $NumCout +=1; }
        }
        if(!empty($FromUser->body_type) && !empty(Auth::user()->looking_body_type)){
            if($FromUser->body_type==Auth::user()->looking_body_type){ $NumCout +=1; }
        }
        if(!empty($FromUser->body_weight) && !empty(Auth::user()->looking_body_weight)){
            if($FromUser->body_weight==Auth::user()->looking_body_weight){ $NumCout +=1; }
        }
        if(!empty($FromUser->location) && !empty(Auth::user()->looking_location)){
            if($FromUser->location==Auth::user()->looking_location){ $NumCout +=1; }
        }
        
        return $NumCout;
    }

}
  
?>
