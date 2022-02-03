<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Mail\CommanEmail;
use Auth;
use Helper;
use Mail;

class EnquiryController extends Controller
{
    public function Contact_Form(Request $r){
        $validated = $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/[0-9]{9}/',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);
        $data = new ContactInquiry();
        $data->name = $r->name;
        $data->email = $r->email;
        $data->phone = $r->mobile;
        $data->subject = $r->subject;
        $data->message = $r->message;
        $data->save();


        $data = [
            'subject' => 'You have received a new inquiry',
            'description'=>'You have received a new inquiry from a <strong>MATRIN</strong> contact page.below are customer contact details.',
            'tabledata' => self::TableDesign($r->all())
        ];
      
        Mail::to(Helper::ContactEnquiry())->send(new ContactInquiryMail($data));
       
        return redirect()->back()->with(array('success_msg' => 'Thank you for your inquiry. Our representative will call you back soon')); 
    
    }

    public function Company_Contact_Enquiry(Request $r){
        $validated = $r->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/[0-9]{9}/',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);
        
        $data = new ContactInquiry();
        $data->name = $r->name;
        $data->company_id = $r->company_id;
        $data->email = $r->email;
        $data->phone = $r->mobile;
        $data->subject = $r->subject;
        $data->message = $r->message;
        $data->save();
        $first = ContactInquiry::with('company')->where('id',$data->id)->first();
        $data = [
            'subject' => 'You have received a new inquiry',
            'description'=>'You have received a new inquiry from a <strong>Ebizzmart</strong>.<br> below are customer contact details.',
            'tabledata' => $this->TableDesign($first)
        ];
        Mail::to(Helper::ContactEnquiry())->send(new CommanEmail($data));
        return redirect()->back()->with(array('success_msg' => 'Thank you for your inquiry. Our representative will call you back soon')); 
    }

    public function TableDesign($data){
        $Html='<table class="table">';
            if(!empty($data['name'])):
                $Html .='<tr>';
                    $Html .='<td>Customer Name<td>';
                    $Html .='<td>'.$data['name'].'<td>';
                $Html .='</tr>';
            endif;
            if(!empty($data['company']->company_name)):
                $Html .='<tr>';
                    $Html .='<td>Company Name<td>';
                    $Html .='<td><a href="'.route('company',['alias'=>$data['company']->company_alias]).'">'.$data['company']->company_name.'</a><td>';
                $Html .='</tr>';
            endif;
            if(!empty($data['email'])):
            $Html .='<tr>';
                $Html .='<td>Email Address<td>';
                $Html .='<td>'.$data['email'].'<td>';
            $Html .='</tr>';
            endif;
            if(!empty($data['mobile'])):
            $Html .='<tr>';
                $Html .='<td>Contact Number<td>';
                $Html .='<td>'.$data['mobile'].'<td>';
            $Html .='</tr>';
            endif;
            if(!empty($data['subject'])):
            $Html .='<tr>';
                $Html .='<td>Contact Reason<td>';
                $Html .='<td>'.$data['subject'].'<td>';
            $Html .='</tr>';
            endif;
            if(!empty($data['message'])):
            $Html .='<tr>';
                $Html .='<td>Message<td>';
                $Html .='<td>'.$data['message'].'<td>';
            $Html .='</tr>';
            endif;
        $Html .='</table>';

        return $Html;
    }
}
