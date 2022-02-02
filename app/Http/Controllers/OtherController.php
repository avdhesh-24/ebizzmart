<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserImage;
use App\Models\User;
use Auth;
use Helper;
use Mail;
use Image;
class OtherController extends Controller{

    public function __construct(){

        $this->middleware(['auth','verified']);

    }


    function Ckeditor_Image(Request $r){
        $ImageName = Helper::ImageWithOutSize('frontend/ckeditor/images/',$r->upload);
        return response()->json([
            'url' => asset('frontend/ckeditor/images/'.$ImageName)
        ]);
    }
    

}

