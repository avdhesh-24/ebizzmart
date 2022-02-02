@if(count($facility) >0 )
<section class="BrandLinksTop Home pt-3">
    <div class="container">
        <div class="owl-carousel" id="BrandLinksTop">
            @foreach($facility as $fac)
            <div class="item">
                <div><img src="{{asset('uploads/facility/'.$fac->icon)}}" style="width:30px!important;"> {{$fac->title}}</div>
            </div>
            @endforeach
        </div>
    </div>
</section> 
@endif

<section class="BrandLinks">
    <div class="container">
        @if(count($topcategory)>0)
        <div class="card links mb-4">
            <div class="card-body">
                <h3 class="mb-3 h4 thm1"><strong>Top Categories</strong></h3><hr class="border-secondary">
                @foreach($topcategory as $top)
                <ul>
                    <li>
                        <a href="#"><strong>{{$top->category->name}}:</strong></a>
                    </li>
                    @foreach($top->category->categorybrand as $bra)
                    <li><a href="#">{{$bra->brand->name}}</a></li>
                    @endforeach
                </ul>
                @endforeach
            </div>
        </div>
        @endif
        @if(count($supplierregion)>0)
        <div class="card flag">
            <div class="card-body">
                <h3 class="mb-3 h4 thm1"><strong>Find Suppliers by Region</strong></h3><hr class="border-secondary">
                <ul>
                    @foreach($supplierregion as $supplier)
                    <li><img src="{{asset('frontend/country-flag/svg/'.strtolower($supplier->regioncountry->sortname).'.svg')}}" class="me-2">{{$supplier->regioncountry->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
    </div>
</section>