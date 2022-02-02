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
                        <a class="breadcrumb-item" href="{{url('/')}}">Home</a>
                        <a class="breadcrumb-item" aria-current="page">Lifestyle & Family</a>
                      </div>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="ProFormBlock">
                        <ul class="topnav">
                            <li><a href="{{url('complete-profile-details')}}">Profile Details</a></li>
                            <li><a href="{{url('complete-career-details')}}">Career Details</a></li>
                            <li class="active"><a href="{{route('lifestyle-and-family')}}">Lifestyle & Family</a></li>
                        </ul>
                        <div class="FormBlock">
                            <form class="active" action="{{route('save-lifestyle-details')}}" method="post">
                            @csrf    
                            <h4 class="h4 mcolor1 text-center mb-3">We would love to know about your family.</h4>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <span class="tabT">Family type</span>
                                            <div class="radiob">
                                                <div class="form-check">
                                                    <input type="radio" name="family_type" id="Joint" value="joint-family">
                                                    <label for="Joint">Joint Family</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="family_type" id="Nuclear" value="nuclear-family">
                                                    <label for="Nuclear">Nuclear Family</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="family_type" id="Others" value="other" checked>
                                                    <label for="Others">Others</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="father_occupation">
                                                <option disabled="" selected="">-- Select Father's Occupation --</option>
                                                @foreach($fatheroccupation as $father)
                                                <option value="{{$father->id}}">{{$father->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Father's Occupation<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="mother_occupation">
                                                <option disabled="" selected="">-- Select Mother's Occupation --</option>
                                                @foreach($motheroccupation as $mother)
                                                <option value="{{$mother->id}}">{{$mother->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Mother's Occupation<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <span class="tabT">Brother</span>
                                            <div class="radiob">
                                                <div class="form-check">
                                                    <input type="radio" name="brother" value="0" id="bnone">
                                                    <label for="bnone">None</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="brother" value="1" id="b1">
                                                    <label for="b1">1</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="brother" value="2" id="b2">
                                                    <label for="b2">2</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="brother" value="3" id="b3">
                                                    <label for="b3">3</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="brother" value="3+" id="b3p">
                                                    <label for="b3p">3+</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <span class="tabT">Sister</span>
                                            <div class="radiob">
                                                <div class="form-check">
                                                    <input type="radio" name="sister" value="0" id="snone">
                                                    <label for="snone">None</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="sister" value="1" id="s1">
                                                    <label for="s1">1</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="sister" value="2" id="s2">
                                                    <label for="s2">2</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="sister" value="3"  id="s3">
                                                    <label for="s3">3</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="sister"  value="3+"  id="s3p">
                                                    <label for="s3p">3+</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="Name" name="contact_address" maxlength="10" oninput="maxLengthCheck(this)" placeholder="Contact address">
                                            <label for="name" class="form-label">Contact Number<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="mg" name="about_family">{{old('about_family')}}</textarea>
                                            <label for="mg" class="form-label">About My Family<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button type="submit" id="cmpsvbtn" onclick="$('#cmpsvbtn').hide(); $('#cmpprcbtn').show();" class="btn btn-main">Add to my profile</button>
                                        <button type="button" id="cmpprcbtn" style="display:none" class="btn btn-main">Processing...</button>
                                    
                                        <a href="profile-details-form.php" class="btn">I will add this later</a>
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