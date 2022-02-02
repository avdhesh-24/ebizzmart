<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">
    <title>Ebizzmart Access Panel | Ebizzmart</title>
    <link href="{{asset('admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/bracket.css')}}">
    <style>
      .error{color: #eb7777;font-size: 13px;}
    .alert{border-width: 0;padding: 15px 20px;position: absolute;width: calc(100% - 40px);top: 30px;left: 0;right: 0;margin: 0 auto;}
    </style>
  </head>
  <body class=" bg-br-primary">
    <div class="container">
      <div class="row align-items-center justify-content-center ht-100v">
        <x-admin.alert/>
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
          
          <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><img src="{{asset('frontend/img/logo.svg')}}" style="width: 70%;margin-bottom: 15px;"></div>
          <div class="tx-center mg-b-20">Happy to see you again! Please enter registered email and password for login.</div>
          <form action="{{action('Admin\Auth\LoginController@login')}}" method="post">
            @csrf
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter your username" autocomplete="off" id="email" name="email" value="{{old('email')}}">
            @error('email')<span class="error">{{$message}}</span>@enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter your password" name="password" id="password">
            @error('password')<span class="error">{{$message}}</span>@enderror
            <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
          </div>
            <button type="submit" id="svbtn" onclick="$('#svbtn').hide();$('#prcbtn').show();" style="cursor:pointer;" class="btn btn-success btn-block">Sign In</button>
            <button type="button" id="prcbtn" style="display:none;" disabled class="btn btn-success btn-block">Processing...</button>
          </form>
        </div>
      </div>
    </div>

    <script src="{{asset('admin/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('admin/lib/bootstrap/bootstrap.js')}}"></script>
    <script>
      setTimeout(function(){
        $('.alert').hide();  },5000);
    </script>
  </body>
</html>
