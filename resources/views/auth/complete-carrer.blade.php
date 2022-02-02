@php
namespace App\Http\Controllers;
use App\Models\Country;
@endphp
@extends('layouts.app')
@section('title', 'Welcome To Matrin')
@section('keywords', 'Welcome To Matrin')
@section('description', 'Welcome To Matrin')

@push('css')
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile-form.css')}}">
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.css" onload="this.rel='stylesheet'" integrity="sha512-x9ZSPqJJfUhtPuo+fw6331wHeC3vhDpNI3Iu4KC05zJrxx7MWYewaDaASGxAUgWyrwU50oFn6Xk0CrQnTSuoOA==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.date.css" onload="this.rel='stylesheet'" integrity="sha512-Ix4qjGzOeoBtc8sdu1i79G1Gxy6azm56P4z+KFl+po7kOtlKhYSJdquftaI4hj1USIahQuZq5xpg7WgRykDJPA==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/themes/default.time.css" onload="this.rel='stylesheet'" integrity="sha512-OVCdZvsw/MeYx12cD+0Cmw/TA5Iw3bJXM4dpSIxXmDK3X5erHyETXkB3OGqnNQ72sL4UOuyTH9kdWds2MGYcBQ==" crossorigin="anonymous" />
<link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" onload="this.rel='stylesheet'" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" />
@endpush
@section('content')
    <section class="ProForm">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb" class="p-0">
                      <div class="breadcrumb mb-2">
                        <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
                        <a class="breadcrumb-item" aria-current="page">Career Details</a>
                      </div>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="ProFormBlock">
                        <ul class="topnav">
                            <li><a href="{{url('complete-profile-details')}}">Profile Details</a></li>
                            <li class="active"><a href="{{url('complete-career-details')}}">Career Details</a></li>
                            <li class="disabled"><a href="#">Lifestyle & Family</a></li>
                        </ul>
                        <div class="FormBlock">
                            <form class="active" action="{{route('save-career-details')}}" method="post">
                                @csrf
                                <h4 class="h4 mcolor1 text-center mb-5">Great! You are about to complete your Jeevansathi profile.</h4>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="country" onchange="getstate(event)">
                                                <option disabled="" selected="">-- Select Country --</option>
                                                @foreach( range('A', 'Z') as $elements)
                                                @php $country = Country::where('name','LIKE',$elements.'%')->where('status',1)->get(); @endphp
                                                @if($country->count()>0)
                                                <optgroup label="{{$elements}}">
                                                    @foreach($country as $count)
                                                    <option value="{{$count->id}}" {{old('country')==$count->id?'selected':''}}>{{$count->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                                @endif
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Country<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="state" onchange="getcity(event)">
                                                <option disabled="" selected="">-- Select State  --</option>
                                            </select>
                                            <label for="name" class="form-label">State<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="city">
                                                <option disabled="" selected="">-- Select City --</option>
                                            </select>
                                            <label for="name" class="form-label">City living in<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <input type="number" autocomplete="off" value="{{!empty(old('pincode'))?old('pincode'):''}}" name="pincode" class="form-control" id="Name" name="Name" placeholder="Groom's Name">
                                            <label for="name" class="form-label">Pincode<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="degree">
                                                <option disabled="" selected="">-- Select Highest Degree --</option> 
                                                @foreach($degrees as $degree) 
                                                <option value="{{$degree->id}}" {{old('degree')==$degree->id?'selected':''}}>{{$degree->title}}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-check-label" for="Manglik">Highest Degree</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="employed_sector">
                                                <option disabled="" selected="">-- Select Employed Sector --</option> 
                                                @foreach($employeds as $employed) 
                                                <option value="{{$employed->id}}" {{old('employed_sector')==$employed->id?'selected':''}}>{{$employed->title}}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-check-label" for="Manglik">Employed In</label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="income">
                                                <option value="">No Income</option>
                                                <option value="0-1lakh" {{old('income')=='0-1lakh'?'selected':''}}>Rs. 0 - 1 Lakh</option>
                                                <option value="1-2lakh" {{old('income')=='1-2lakh'?'selected':''}}>Rs. 1 - 2 Lakh</option>
                                                <option value="2-3lakh" {{old('income')=='2-3lakh'?'selected':''}}>Rs. 2 - 3 Lakh</option>
                                                <option value="3-4lakh" {{old('income')=='3-4lakh'?'selected':''}}>Rs. 3 - 4 Lakh</option>
                                                <option value="4-5lakh" {{old('income')=='4-5lakh'?'selected':''}}>Rs. 4 - 5 Lakh</option>
                                                <option value="5-7lakh" {{old('income')=='5-7lakh'?'selected':''}}>Rs. 5 - 7 Lakh</option>
                                                <option value="7-10lakh" {{old('income')=='7-10lakh'?'selected':''}}>Rs. 7 - 10 Lakh</option>
                                                <option value="10-15lakh" {{old('income')=='10-15lakh'?'selected':''}}>Rs. 10 - 15 Lakh</option>
                                                <option value="15-20lakh" {{old('income')=='15-20lakh'?'selected':''}}>Rs. 15 - 20 Lakh</option>
                                                <option value="20-40lakh" {{old('income')=='20-40lakh'?'selected':''}}>Rs. 20 - 25 Lakh</option>
                                                <option value="40-70lakh" {{old('income')=='40-70lakh'?'selected':''}}>Rs. 25 - 35 Lakh</option>
                                                <option value="70lakh-1crore" {{old('income')=='70lakh-1crore'?'selected':''}}>Rs. 70 Lakh - 1 crore</option>
                                                <option value="1crore-above" {{old('income')=='1crore-above'?'selected':''}}>Rs. 1 crore &amp; above</option>
                                            </select>
                                            <label for="name" class="form-label">Annual Income<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="h5 mb-3 mcolor1">Here is your chance to make your profile stand out!</h4>
                                        <div class="form-check form-switch mb-3">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">हिंदी में लिखें</label>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" name="about" id="mg">{{old('about')}}</textarea>
                                            <label for="mg" class="form-label">Express Yourself!<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="mb-3">
                                            <small>Introduce yourself (Don't mention your name, number or social handles). Write about your values, beliefs/goals and aspirations.<br>
                                            How do you describe yourself? Your interests and hobbies.<br><br>
                                            This text will be screened by our team.</small>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" id="cmpsvbtn" onclick="$('#cmpsvbtn').hide(); $('#cmpprcbtn').show();" class="btn btn-main">Save and Continue</button>
                                        <button type="button" id="cmpprcbtn" style="display:none" class="btn btn-main">Processing...</button>
                                    
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/picker.js" integrity="sha512-VQa5Pmc87GQrifaBaI+ejCQBHkca6yhwKH+iFihubE4Mf3NSj0jVN3cppGHPlFSa2MRmAD7xwuZ8fr9DOHUsgw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/picker.date.js" integrity="sha512-4UAypxd5+OVqRf2SeJTnkd+W47HoLnpHjwannVikXGsgJxH2Hl+SBDM9UYyi+3hpNc16aaGeOu5RvesbSwlRlA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/picker.time.js" integrity="sha512-j3HVwMQuwEYegEnNfKlQ/paV3/b7TB4/Ul9bYIjBKiwbIXGQ/mzs3H+wqfvNo/7mKtNXUZnQWHDj3xNrNNA/7w==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pickadate.js/3.6.4/compressed/legacy.js" integrity="sha512-NlqsoqftDXKDcYpkM+t9THig+2elSdz+7hyJDHZOqDwULkorkyWD+B48EI4Q3h3Qw+kdMYkVSkBoMX+omV2ZPw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
    <?php if(!empty(old('country'))): ?>
        $.get("{{url('get-country-state')}}",{
        country:"{{old('country')}}",
        },function(data){
            var Html ='<option disabled="" selected="">-- Select State  --</option>';
                for(var A=0;A<data.length;A++){
                    if({{old('state')}}==data[A].id){
                    Html +='<option value="'+data[A].id+'" selected>'+data[A].name+'</option>'; 
                }else{
                    Html +='<option value="'+data[A].id+'">'+data[A].name+'</option>'; 
                }
                    
                }  
                $('select[name=state]').html(Html);   
        });
    <?php endif; ?>
    <?php if(!empty(old('state'))): ?>
        $.get("{{url('get-state-city')}}",{
            state:"{{old('state')}}",
        },function(data){
            var Html ='<option disabled="" selected="">-- Select State  --</option>';
            for(var A=0;A<data.length;A++){
                if({{old('city')}}==data[A].id){
                    Html +='<option value="'+data[A].id+'" selected>'+data[A].name+'</option>'; 
                }else{
                    Html +='<option value="'+data[A].id+'">'+data[A].name+'</option>'; 
                }
                
            }  
            $('select[name=city]').html(Html);   
        });
    <?php endif; ?>
});
function getstate(event){
   $.get("{{url('get-country-state')}}",{
        country:event.target.value
   },function(data){
       var Html ='<option disabled="" selected="">-- Select State  --</option>';
        for(var A=0;A<data.length;A++){
            Html +='<option value="'+data[A].id+'">'+data[A].name+'</option>'; 
        }  
        $('select[name=state]').html(Html);   
   });
}
function getcity(event){
   $.get("{{url('get-state-city')}}",{
        state:event.target.value
   },function(data){
       var Html ='<option disabled="" selected="">-- Select City  --</option>';
        for(var A=0;A<data.length;A++){
            Html +='<option value="'+data[A].id+'">'+data[A].name+'</option>'; 
        }  
        $('select[name=city]').html(Html);   
   });
}
$('.select2').select2();
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
if(dd<10) {dd='0'+dd;}
if(mm<10) {mm='0'+mm;}
today = dd+'/'+mm+'/'+yyyy;
var $input = $( '.datepicker' ).pickadate({
    formatSubmit: 'yyyy/mm/dd',
    // editable: true,
    closeOnSelect: false,
    closeOnClear: false,
})
var picker = $input.pickadate('picker')
// picker.set('select', '14 October, 2014')
// picker.open()

// $('button').on('click', function() {
//     picker.set('disable', true);
// });
var $input2 = $( '.timepicker' ).pickatime({})
var picker2 = $input2.pickatime('picker2')
picker2.open()
</script>
@endpush