<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Login : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/login.css">
<?php include "header.php";?>
<div class="contentp">
    <section class="CartP LoginBlock">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Login</a></li>
                    </ol>
                </div>
            </div>
            <div class="row align-items-center LoginRow">
                <div class="col-md-6">
                    <div class="">
                        <!-- <div class="logo"><a href="#"><img src="img/logo.png"></a></div> -->
                        <div class="img"><img src="img/login-img.svg" class="w-md-50"></div>
                        <h1 class="h5">One place to track all your business data</h1>
                        <ul>
                            <li><i class="fas fa-check-circle"></i>Generate and update E-WayBills easily</li>
                            <li><i class="fas fa-check-circle"></i>Convert to e-invoices in 1-click</li>
                            <li><i class="fas fa-check-circle"></i>Email and share your invoices</li>
                        </ul>
                        <a href="#" class="btn btn-main1">Need help?</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="login">
                            <div class="LoginSec active">
                                <div class="text-center w-100 mb-5">
                                    <img src="img/logo.svg" class="login-logo">
                                </div>
                                <h3 class="thm1 h6 mb-1">Welcome!</h3>
                                <h2 class="thm h5">Create / Login to your account</h2>
                                <form action="user-profile.php" method="post" class="mt-3">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="lemail" name="lemail" placeholder="Mobile No. / Email ID">
                                        <label for="lemail" class="form-label">Mobile No. / Email ID</label>
                                    </div>
                                    <div class="form-floating mb-1">
                                        <input type="password" class="form-control lpass" id="lpassword" name="lpassword" placeholder="Password">
                                        <label for="lpassword" class="form-label">Password</label>
                                        <i id="lpass-icon" class="mt10px far fa-eye-slash"></i>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="form-check mt-1">
                                                <input class="form-check-input" type="checkbox" value="" id="lstay">
                                                <label class="form-check-label" for="lstay">Stay Logged in </label>
                                            </div>
                                        </div>
                                        <div class="col text-right">
                                            <a href="javascript:void(0)" id="fpsec" class="mcolor1">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn btn-main w-100">Login</button>
                                    </div>
                                    <div class="or"><span>OR Continue With</span></div>
                                    <div class="text-center login-icon mb-0">
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Facebook" aria-label="Login with Facebook"><img src="img/fb-c.svg"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Google" aria-label="Login with Google"><img src="img/google-icon.svg"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Twitter" aria-label="Login with Twitter"><img src="img/t-c.svg"></a>
                                    </div>
                                </form>
                            </div>
                            <div class="ForgotSec">
                                <div class="text-center w-100 mb-5">
                                    <img src="img/logo.svg" class="login-logo">
                                </div>
                                <h2 class="thm h5">Forgot Password</h2>
                                <form action="thanks.php" method="post">
                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" id="femail" name="femail" placeholder="Mobile No. / Email ID">
                                        <label for="femail" class="form-label">Mobile No. / Email ID</label>
                                    </div>
                                    <div class="text-center mb-3">
                                        <button type="submit" class="btn btn-main mb-4 w-100">Submit</button>
                                        <!-- <div class="text-center"><a href="javascript:void(0)" id="loginsec" class="mcolor1">Back to Login</a></div> -->
                                        <div class="text-center"><p class="w-100">Return to <a href="javascript:void(0)" id="loginsec" class="mcolor1"><strong>Login</strong></a></p></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center"><p class="w-100 m-0">New to eBizzMart? <a class="mcolor" href="sign-up.php"><strong>Sign Up Free</strong></a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php";?>
<script>
    $('#loginsec').click(function(){
        $('.ForgotSec').removeClass('active');
        $('.LoginSec').addClass('active');
    });
    $('#fpsec').click(function(){
        $('.LoginSec').removeClass('active');
        $('.ForgotSec').addClass('active');
    });
</script>
</body>
</html>