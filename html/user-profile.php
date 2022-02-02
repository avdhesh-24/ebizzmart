<?php
session_start();
ob_start();
$user='';
$active='My Profile';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>User Profile : ebizzmart</title>
<link rel="stylesheet" type="text/css" media="screen,projection" href="css/profile.css">
<?php include "header.php";?>
<div class="contentp">
    <section class="grey Profile pt-1">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fal fa-home-alt"></i></a></li>
                        <li class="breadcrumb-item"><a aria-current="page">User Profile</a></li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <?php include "account-left.php"; ?>
                <div class="col-md-10">
                    <form class="card links mb-4">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="PhotoBox me-4"><label><input type="text" class="d-none"><span><img src="img/man-colored.svg"></span></label>Profile Picture</div>
                                <div class="w-100">
                                    <h3 class="h5 thm">User Information</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>User Name</span>
                                                    <input type="text" name="age" value="Vishnu Sharma" placeholder="User Name" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Primary Email <span class="sws-top sws-bounce" title="Verified"><i class="fas fa-shield-check thm"></i></span></span>
                                                    <input type="text" name="age" value="avdhesh.sws@gmail.com" placeholder="Primary Email" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Primary Phone No. <span class="sws-top sws-bounce" title="Verified"><i class="fas fa-shield-check thm"></i></span></span>
                                                    <input type="text" name="age" value="+91 - 9898989898" placeholder="Primary Phone No." class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Alternative Email</span>
                                                    <input type="text" name="age" value="avdhesh.sws@gmail.com" placeholder="Alternative Email" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Alternative Phone No.</span>
                                                    <input type="text" name="age" value="+91 - 9898989898" placeholder="Alternative Phone No" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Product of Interest</span>
                                                    <input type="text" name="age" value="" placeholder="Product of Interest" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-12">
                                            <ul class="prolist AllDetail">
                                                <li><span>Address</span>
                                                    <input type="text" name="age" value="New Delhi, Delhi, India, 110059" placeholder="Alternative Email" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links mb-4">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Company Information</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Company Name</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>GSTIN</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Website</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>PAN</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form class="card links">
                        <div class="card-body">
                            <a class="EditText text-primary sws-top sws-bounce" title="Edit" id="edit"><i class="far fa-edit"></i> </a>
                            <a class="EditText thm me-4 sws-top sws-bounce" title="Save" id="save" style="display:none"><i class="far fa-check"></i></a>
                            <a class="EditText text-danger sws-top sws-bounce" title="Cancel" id="cancel" style="display:none"><i class="far fa-times"></i></a>
                            <div class="d-flex edittextbox">
                                <div class="w-100">
                                    <h3 class="h5 thm">Bank Account Details</h3>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>IFSC Code</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Bank Name</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col col-md-6">
                                            <ul class="prolist AllDetail">
                                                <li><span>Account Number</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                                <li><span>Account Type</span>
                                                    <input type="text" name="age" value="" placeholder="" class="inputtext noeditt" contenteditable="false" readonly="readonly">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php";?>
<script type="text/javascript">
$(document).ready(function(){
    $('#edit').click(function(){
        $(".edittextbox .inputtext").attr("contenteditable", true);
        $(".edittextbox .inputtext").attr("readonly", false);
        $(".edittextbox .inputtext.date").attr("type", 'date');
        $(".edittextbox .PhotoBox input").attr("type", 'file');
        $(".edittextbox select.inputtext").removeClass('noeditt');
        $("#edit").hide();
        $("#save").show();
        $("#cancel").show();
    });
    $('#save').click(function(){
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save").hide();
        $("#cancel").hide();
        $("#edit").show();
    });
    $('#cancel').click(function(){
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save").hide();
        $("#cancel").hide();
        $("#edit").show();
    });
});
</script>
</body>
</html>