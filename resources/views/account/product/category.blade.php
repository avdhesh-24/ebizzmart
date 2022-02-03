@extends('layouts.app')
@section('content')
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Manage Product</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <x-account-left/>
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="h5 thm text-center">Select Category</h3>
                            <div class="w-75 mx-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="SearchBox">
                                    <span class="btn btn-main mt-0" id="SearchBox">Go!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="card">
                        <div class="card-body">
                            <ul class="PostStep">
                                <li><a href="#">Select Category</a></li>
                            </ul>
                            <div class="row CatBoxs">
                                <div class="col-md-4">
                                    <div class="CatBox" id="CatBox1">
                                        <ul>
                                            @foreach($category as $cat)
                                            <li><span>{{$cat->name}} ({{count($cat->child)}})</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="CatBox" id="CatBox2" style="display:none">
                                        <ul>
                                            <li><span>Agricultural Growing Media</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="CatBox" id="CatBox3" style="display:none">
                                        <ul>
                                            <li><span>Agricultural Growing Media</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p><small><strong>Categories Selected:</strong> Consumer Electronics >> Video Games & Accessories >> Light Guns</small></p>
                                <a href="manage-product-edit.php" class="btn btn-main2 mt-0">I have read and agree to the following terms.</a>
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
<title>Product Category : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/profile.css')}}">
<link rel="stylesheet" type="text/css" media="screen,projection" href="{{asset('frontend/css/pro-manage.css')}}">
@endpush

@push('scripts')
<script type="text/javascript">
$(document).ready(function(){
    $.fn.ProCatMenu = function(options) {
        var opts = $.extend({}, $.fn.ProCatMenu.defaults, options);
        return this.each(function() {
            var obj = $(this);
            $(obj).find('#CatBox1 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(1)').addClass('active');
            })
            $(obj).find('#CatBox2 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox2 li').removeClass('active');
                $('#CatBox2 li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(2)').addClass('active');
            })
            $(obj).find('#CatBox3 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox3 li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(3)').addClass('active');
            })
        });
    }
    $('.CatBoxs').ProCatMenu({
        trigger_event_type: 'click' //mouseover | click 
    });
    $('#CatBox1 li span').click(function(){
        $('#CatBox2').show();
    });
    $('#CatBox2 li span').click(function(){
        $('#CatBox3').show();
    });
    $('.PostStep li:nth-child(1)').click(function(){
        $('#CatBox2 li').removeClass('active');
        $('.PostStep li:nth-child(2)').removeClass('active');
    });
    $('.PostStep li:nth-child(2)').click(function(){
        $('#CatBox3 li').removeClass('active');
        $('.PostStep li:nth-child(3)').removeClass('active');
    });
});
</script>
@endpush       