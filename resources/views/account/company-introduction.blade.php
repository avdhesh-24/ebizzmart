@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('company-information')}}">Company Infomation</a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Company Introduction</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card links ComPro">
                        <x-company-profile-percentage/>
                    </div>
                    <x-company-menu/>

                    <form class="card links mb-4 Cominfo" id="company-introduction" style="display:none;">
                        @csrf
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" data-title="Edit" id="edit-company-introduction"><i class="far fa-edit"></i> </a>
                            <button class="EditText thm me-4 sws-top sws-bounce" id="save-company-introduction" style="display:none" type="submit"><i class="far fa-check"></i></button>
                            <a class="EditText text-danger sws-top sws-bounce" data-title="Cancel" id="cancel-company-introduction" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Introduction</h3>
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <textarea name="company_introduction" id="editor" placeholder="Write Here Company Introduction..." class="inputtext noeditt editor" contenteditable="false" readonly="readonly">{{$list->comp->company_introduction}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
 
@push('css')
<title>Company Introduction : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/company-info.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/choosen/chosen.css')}}">
<style>
.defaultimgcss{width:130px;border-radius: 5px;cursor: pointer;transition: 0.3s;border: 1px solid #ddd;border-radius: 3px;padding: 4px;}
</style>
@endpush

@push('scripts')
<script src="{{asset('frontend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('frontend/ckeditor/config.js')}}"></script>
<script src="{{asset('frontend/js/choosen/chosen.jquery.js')}}"></script>
<script>
    var myEditor;
    $('.Cominfo').show();
    ClassicEditor
		.create( document.querySelector( '#editor' ), {
			extraPlugins: [ SimpleUploadAdapterPlugin ],
		} )
		.then( editor => {
			myEditor = editor;
            console.log( 'Editor was initialized', editor );
		} )
		.catch( err => {
			console.error( err.stack );
		} );
    const UpdateIntroduction = "{{route('account.update-company-introduction')}}";
 </script>
@endpush       