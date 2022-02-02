<div class="br-sideleft overflow-y-auto">
      <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
      <div class="br-sideleft-menu">
        <a href="{{route('admin.home')}}" class="br-menu-link {{Request::segment(2)=='dashboard'?'active':''}}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div>
        </a>
        <a href="javascript:void(0)" class="br-menu-link {{in_array(Request::segment(2),$homemanagement) ? 'active show-sub' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-24"></i>
            <span class="menu-item-label">Home Management </span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column" style="display:{{in_array(Request::segment(2),$homemanagement) ? 'block' : 'none' }}">
          <li class="nav-item"><a href="{{route('admin.banner')}}" class="nav-link {{Request::segment(2)=='banner'?'active':''}}">Banner</a></li>
          <li class="nav-item"><a href="{{route('admin.bottom')}}" class="nav-link {{Request::segment(2)=='bottom'?'active':''}}">Banner Bottom</a></li>
          <li class="nav-item"><a href="{{route('admin.addvertisment')}}" class="nav-link {{Request::segment(2)=='advertisement-management'?'active':''}}">Addvertisment</a></li>
          <li class="nav-item"><a href="{{route('admin.top-category')}}" class="nav-link {{Request::segment(2)=='top-category'?'active':''}}">Top Category</a></li>
          <li class="nav-item"><a href="{{route('admin.our-facility')}}" class="nav-link {{Request::segment(2)=='our-facility'?'active':''}}">Our Facility</a></li>
          <li class="nav-item"><a href="{{route('admin.region-suppliers')}}" class="nav-link {{Request::segment(2)=='region-suppliers'?'active':''}}">Region Suppliers</a></li>
        </ul>
        
        <a href="javascript:void(0)" class="br-menu-link {{in_array(Request::segment(2),$catelog) ? 'active show-sub' : '' }}">
          <div class="br-menu-item">
            <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
            <span class="menu-item-label">Catelog Management </span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column" style="display:{{in_array(Request::segment(2),$catelog) ? 'block' : 'none' }}">
          <li class="nav-item"><a href="{{route('admin.brand')}}" class="nav-link {{in_array(Request::segment(2),$brandarr)?'active':''}}">Brand</a></li>
          <li class="nav-item"><a href="{{route('admin.category')}}" class="nav-link {{in_array(Request::segment(2),$categoryarr)?'active':''}}">Category</a></li>
          <li class="nav-item"><a href="{{route('admin.attribute-group')}}" class="nav-link {{in_array(Request::segment(2),$attributearr)?'active':''}}">Attributes</a></li>
          <li class="nav-item"><a href="{{route('admin.products')}}" class="nav-link {{in_array(Request::segment(2),$productarr)?'active':''}}">Product</a></li>
        </ul>
      </div>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->