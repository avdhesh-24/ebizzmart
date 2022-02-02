<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Sign Up : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/login.css">
<?php include "header.php";?>
<div class="contentp">
    <section class="CartP LoginBlock">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">Sign Up</a></li>
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
                            <div>
                                <div class="text-center w-100 mb-5">
                                    <img src="img/logo.svg" class="login-logo">
                                </div>
                                <h3 class="thm1 h6 mb-1">Welcome!</h3>
                                <h2 class="thm h5">Let's Create your Business Profile with this Sign up</h2>
                                <form class="" action="user-profile.php" method="post">
                                    <div class="form-floating mb-4">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Mobile No. / Email ID">
                                        <label for="email" class="form-label">Email ID</label>
                                    </div>
                                    <div class="form-floating mb-4">
                                        <input type="number" class="form-control" maxlength="10" oninput="maxLengthCheck(this)" id="mobile" name="mobile" placeholder="Mobile No. / Email ID">
                                        <label for="mobile" class="form-label">Mobile No.</label>
                                    </div>
                                    <div class="form-floating mb-1">
                                        <input type="password" class="form-control lpass" id="password" name="password" placeholder="Password">
                                        <label for="password" class="form-label">Create New Password</label>
                                        <i id="lpass-icon" class="mt10px fa fa-eye-slash"></i>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="stay">
                                                <label class="form-check-label" for="stay">By clicking on 'Register me', you confirm that you accept the <a href="#" class="thm1">Terms of Use</a> and <a href="#" class="thm1">Privacy Policy</a></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center mb-4">
                                        <button type="submit" class="btn btn-main w-100">Register me</button>
                                    </div>
                                    <div class="or"><span>OR Continue With</span></div>
                                    <div class="text-center login-icon mb-0">
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Facebook" aria-label="Login with Facebook"><img src="img/fb-c.svg"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Google" aria-label="Login with Google"><img src="img/google-icon.svg"></a>
                                        <a href="#" title="" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Login with Twitter" aria-label="Login with Twitter"><img src="img/t-c.svg"></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center"><p class="w-100 m-0">Returning Customer? <a class="mcolor" href="login.php"><strong>Login</strong></a></p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php";?>
</body>
</html>