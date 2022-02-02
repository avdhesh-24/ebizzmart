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
                        <a class="breadcrumb-item" aria-current="page">Complete Profile Details</a>
                      </div>
                    </nav>
                </div>
                <div class="col-12">
                    <div class="ProFormBlock">
                        <ul class="topnav">
                            <li class="active"><a href="#">Profile Details</a></li>
                            <li class="disabled"><a>Career Details</a></li>
                            <li class="disabled"><a>Lifestyle & Family</a></li>
                        </ul>
                        <div class="FormBlock">
                            <form class="active" action="{{route('save-profile-details')}}" method="post">
                                @csrf
                                <h4 class="h4 mcolor1 text-center mb-5">Complete your profile now to contact members you like and to receive interests</h4>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="Name" name="name" value="{{empty(old('name'))?Auth::user()->name:old('name')}}" placeholder="Groom's Name">
                                            <label for="name" class="form-label">Groom's Name<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating">
                                            <input id="input_01" class="form-control datepicker" name="dob" placeholder="Date of Birth" type="text" data-value="1997-02-14" value="{{old('dob')}}">
                                            <label for="name" class="form-label">Date of Birth<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="mother_tongue">
                                                <option disabled="" selected="">-- Select Mother tongue --</option>
                                                @foreach($mothertongue as $mtg) 
                                                <option value="{{$mtg->id}}" {{$mtg->id==old('mother_tongue')?'selected':''}}>{{$mtg->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Mother tongue<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="religion">
                                                <option value="">-- Select Religion--</option> 
                                                @foreach($religions as $rl) 
                                                <option value="{{$rl->title}}" {{$rl->title==old('religion')?'selected':''}}>{{$rl->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Religion<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="regional">
                                                <option value="">-- Select Regional--</option> 
                                                @foreach($regionals as $rg) 
                                                <option value="{{$rg->title}}" {{$rg->title==old('regional')?'selected':''}}>{{$rg->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Regional<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-floating check">
                                            <select class="form-control select2" name="caste">
                                                <option value="">-- Select Caste --</option>
                                                @foreach($castes as $cast) 
                                                <option value="{{$cast->id}}" {{$cast->id==old('caste')?'selected':''}}>{{$cast->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Caste<span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" {{!empty(old('all_cast'))?'checked':''}} value="yes" name="all_cast" id="stay">
                                            <label class="form-check-label" for="stay">Caste no bar (I am open to marry people of all castes) </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="marital">
                                                <option value="">-- Select Marital--</option> 
                                                @foreach($marital as $mrt) 
                                                <option value="{{$mrt->id}}" {{$mrt->title==old('marital')?'selected':''}}>{{$mrt->title}}</option>
                                                @endforeach
                                            </select>
                                            <label for="name" class="form-label">Marital status<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-control select2" name="height">
                                                <option value="">-- Select Height --</option>
                                                @foreach($height as $ht) 
                                                <option value="{{$ht->title}}" {{$ht->title==old('height')?'selected':''}}>{{$ht->title}}</option>
                                                @endforeach
                                                
                                            </select>
                                            <label for="name" class="form-label">Height<span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <span class="tabT">Are you manglik?</span>
                                            <div class="radiob">
                                                <div class="form-check">
                                                    <input type="radio" name="manglik" id="Manglik" value="manglik">
                                                    <label for="Manglik">Manglik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="manglik" id="Non-manglik" value="non-manglik">
                                                    <label for="Non-manglik">Non-manglik</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="manglik" id="Anshik" value="anshik-manglik" checked>
                                                    <label for="Anshik">Anshik manglik</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-floating">
                                            <span class="tabT">Horoscope match is necessary?</span>
                                            <div class="radiob">
                                                <div class="form-check">
                                                    <input type="radio" name="necessary" value="necessary" id="Must">
                                                    <label for="Must">Must</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="necessary" value="none-necessary" id="Not" checked>
                                                    <label for="Not">Not Necessary</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 text-center">
                                        <button type="submit" id="svbtn" onclick="$('#svbtn').hide(); $('#prcbtn').show(); " class="btn btn-main">Save and Continue</button>
                                        <button type="button" id="prcbtn" style="display:none" class="btn btn-main">Processing...</button>
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