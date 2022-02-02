<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/jquery-switchbutton/jquery.switchButton.css')}}" rel="stylesheet">
    
    @stack('style')
    <link rel="stylesheet" href="{{asset('admin/css/bracket.css')}}">
    <style>
      .error{color: #ed6a6a;font-size: 13px;}
      .defaultimgcss {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 4px;
        width: 150px;
      }
      .defaultimgcss:hover {opacity: 0.7;}
      .defaultimgcss2 {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        border: 1px solid #ddd;
        border-radius: 3px;
        padding: 4px;
      }
      .defaultimgcss2:hover {opacity: 0.7;}
      
  </style>
  </head>

  <body>
    <div class="br-logo"><a href="#"><img src="{{asset('frontend/img/logo.svg')}}" class="w-100"></a></div>
    <x-admin.left-panel/>
    <x-admin.head-panel/>
    <x-admin.right-panel/>
    
    {!! $slot !!}


    <script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('admin/lib/moment/moment.js')}}"></script>
    <script src="{{asset('admin/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('admin/lib/jquery-switchbutton/jquery.switchButton.js')}}"></script>
    <script src="{{asset('admin/lib/peity/jquery.peity.js')}}"></script>

    @stack('scripts')

    <script src="{{asset('admin/js/bracket.js')}}"></script>
    
    <script>
      $(function(){
        'use strict'
        $(window).resize(function(){
          minimizeMenu();
        });
        minimizeMenu();
        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
      setTimeout(function(){
        $('.alert').fadeOut();
      },5000);
    </script>
  </body>
</html>
