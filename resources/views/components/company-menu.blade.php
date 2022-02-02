<div class="card p-0 mb-4 ComMenuS">
    <div class="card-body">
        <div class="ComMenu">
            <ul>
                <li class="{{Request::segment(1)=='company-information' ? 'active' : ''}}"><a href="{{route('account.company-information')}}">Company Overview</a></li>
                <li class="{{Request::segment(1)=='trade-capacity' ? 'active' : ''}}"><a href="{{route('account.trade-capacity')}}">Trade Capacity</a></li>
                <li class="{{Request::segment(1)=='' ? 'active' : ''}}"><a href="partner-factories.php">Partner Factories</a></li>
                <li class="{{Request::segment(1)=='company-introduction' ? 'active' : ''}}"><a href="{{route('account.company-introduction')}}">Company Introduction</a></li>
                <li class="{{Request::segment(1)=='certifications-and-trademarks' ? 'active' : ''}}"><a href="{{route('account.certifications-and-trademarks')}}">Certifications &amp; Trademarks</a></li>
            </ul>
        </div>
    </div>
</div>