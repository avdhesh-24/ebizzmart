<div class="contentp">
    <section class="grey pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fal fa-home-alt"></i></a></li>
                        @foreach($breadcrem as $key=>$bread)
                            @if($key==Request::segment(2))
                            <li class="breadcrumb-item"><a aria-current="page">{{$bread}}</a></li>
                            @else
                            <li class="breadcrumb-item"><a href="{{url('category/'.$key)}}">{{$bread}}</a></li>
                            @endif
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <h1 class="Heading h3">{{$list->name}}</h1>
                </div>
            </div>
            <div class="infinite-scroll">
                <div class="row mt-3">
                    <div class="col-12">
                        <ul class="CompaniesList">
                            @foreach($childs as $child)
                            <li>
                                <a href="{{route('category',['alias'=>$child->alias])}}">
                                    <img src="{{asset('uploads/category/icon/'.$child->icon)}}" width="64" height="64" alt="{{$child->name}}">
                                    <span>{{$child->name}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div style="display:none;">{{ $childs->appends(request()->all())->render('pagination') }}</div>
            </div>
            <div class="row mt-3">
                {!! $list->description !!}
            </div>
        </div>
    </section>
</div>