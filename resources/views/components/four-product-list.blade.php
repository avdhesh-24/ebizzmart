@foreach($lists as $list)
@php 
    $Off=0;
    $startdate = $list->created_at; 
    $enddate = date('Y-m-d h:i:s'); 
    $diff = Helper::dateDifference($startdate, $enddate);
    if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp)):
        $Off = round(100 - ($list->defaultprice->selling_price/$list->defaultprice->mrp)*100);
    endif;
@endphp 
<div class="col-sm-12">
    <div class="card ProBlock {{$diff<=7?'New':''}} {{$Off>0 ? 'Off' : ''}}">
        <span class="OffTag"><span>{{$Off}}% off</span></span>
        <div class="NewTag"><span>New</span></div>
        <div class="card-head"><a href="{{route('product',['alias'=>$list->alias])}}"><img src="{{asset('uploads/product/'.$list->thumb_image)}}"></a></div>
        <div class="card-body">
            <h3 class="name mb-0"><a href="{{route('product',['alias'=>$list->alias])}}">{{$list->title}}</a></h3>
            <p class="m-0"><small class="text-black-50">Manufacturers, Suppliers</small></p>
            <span class="star" title="star" data-title="3"></span>
            @if(empty($list->defaultprice->selling_price) && empty($list->defaultprice->mrp))
            <span class="askprice">ASK FOR PRICE</span>
            @endif
            @if(!empty($list->defaultprice->selling_price) && !empty($list->defaultprice->mrp))
            <span class="price">
                <i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}} 
                <span class="cutprice"><i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}}</span>
            </span>
            @endif
            @if(!empty($list->defaultprice->mrp) && empty($list->defaultprice->selling_price))
            <span class="price">
                <i class="rupee">&#8377;</i>{{$list->defaultprice->mrp}} 
            </span>
            @endif
            @if(empty($list->defaultprice->mrp) && !empty($list->defaultprice->selling_price))
            <span class="price">
                <i class="rupee">&#8377;</i>{{$list->defaultprice->selling_price}} 
            </span>
            @endif
            <p class="m-0"><small>{{$list->minimum_order}} Pieces (Min Order)</small></p>
            <ul>
                @foreach($list->attribute as $attribute)
                <li><span class="text-secondary">{{$attribute->attribute->title}}</span> {{$attribute->description}}</li>
                @endforeach
            </ul>
        </div>
        <div class="card-footer">
            <div>
                <p class="m-0"><small class="d-flex align-items-center justify-content-center"><i class="far fa-map-marker-alt me-1 thm1"></i> Basavanagudi,Bangalore</small></p>
                <a href="#ViewMobile" data-bs-toggle="modal" class="btn btn-main"><i class="fal fa-phone-alt me-2"></i> View Mobile</a><a href="#SendInquiry" data-bs-toggle="modal" class="btn btn-main1"><i class="fal fa-envelope me-2"></i> Send Inquiry</a>
            </div>
        </div>
    </div>
</div>
@endforeach