// AOS.init({ easing: 'ease-in-out-sine' });
// var rellax = new Rellax('.rellax', { center: true });
function goBack() {window.history.back();}
function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
}
function increment_val(){
    var da=$("#qty").val();
    var newQuantity = parseInt(da)+1;
    $("#qty").val(newQuantity);
} 
function decrement_quantity(){
    var da=$("#qty").val();
    var inputQuantityElement = $("#qty");
    if($(inputQuantityElement).val() > 1) {
        var newQuantity = parseInt(da)-1;
        $("#qty").val(newQuantity);
    }
}

$(function () {$("[data-bs-toggle=tooltip").tooltip();});

document.addEventListener("DOMContentLoaded", function(){
    $('.preloader').delay(1700).fadeOut('slow');
    $('.preloader-img').delay(1700).fadeOut();
});

$(document).ready(function(){
    
    $('.SearchBox .dropdown-menu').find('a').click(function(e) {
        e.preventDefault();
        var param = $(this).attr("href").replace("#","");
        var concept = $(this).text();
        $('.SearchBox #search_concept').text(concept);
    });
    
    // Country Select //
    var conr;
    $('.CountrySelect .dropdown-menu').find('li').click(function(e) {
        e.preventDefault();
        // var concept = $(this).text();
        var conn = $(this).data('name');
        var spa = $(this).data('text');
        var conc = $(this).data('code');
        // $('.CountrySelect #CountryName').text(concept);
        $('.CountrySelect #CountryName').text(conn);
        $('.CountrySelect button .flagicon').removeClass("fi-"+conr).addClass("fi-"+conc);
        $('.CountrySelect #ccode').val(spa);
        conr = conc;
    });
    $(document).click(function(e) {
        if (!$(e.target).is('#navigatin , #navigatin *')) {
            $('body').css('overflow','inherit');
            $('#navigatin').removeClass('show');
        }
    });
    $('.menubar').click(function (e) {
        $('body').css('overflow','hidden');
        e.stopPropagation();
    });
    $('.MenuBar .logo .navbar-toggler').click(function (e) {
        $('body').css('overflow','auto');
    });
    $('.counter-count').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 5000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    if ($(window).width() > 992){
        $(window).scroll(function () {
            if ($(this).scrollTop() >99) {
                $('.navbar-expand-lg>.st').addClass('is-fixed');
            } else {
                $('.navbar-expand-lg>.st').removeClass('is-fixed');
            }
            if ($(this).scrollTop() > 50) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
    };
    if ($(window).width() < 991){
        $(window).scroll(function () {
            if ($(this).scrollTop() >70) {
                $('.navbar-expand-lg>.st').addClass('is-fixed');
                $('.BuyBtnBox').addClass('fullboxby');
                $('.cartbox.right .card-footer').addClass('fullboxby');
            } else {
                $('.navbar-expand-lg>.st').removeClass('is-fixed');
                $('.BuyBtnBox').removeClass('fullboxby');
                $('.cartbox.right .card-footer').removeClass('fullboxby');
            }
            if ($(this).scrollTop() > 50) {
                $('#scroll-top').fadeIn();
            } else {
                $('#scroll-top').fadeOut();
            }
        });
    };
    $('#scroll-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    $('.SignUpMobal').click(function (){
        if ($('#login').hasClass('show')){
            $('#login').modal('hide');
            $('#SignUp').modal('show');
            $('body').addClass('modal-SignUp');
        }
    });
    $('.LoginMobal').click(function (){
        if ($('#SignUp').hasClass('show')){
            $('#SignUp').modal('hide');
            $('body').removeClass('modal-SignUp');
            $('#login').modal('show');
        }
    });
    $('.btn-close').click(function (){
        $('body').removeClass('modal-SignUp');
    });
    $('#loginsec').click(function(){
        $('.ForgotSec').removeClass('active');
        $('.LoginSec').addClass('active');
    });
    $('#fpsec').click(function(){
        $('.LoginSec').removeClass('active');
        $('.ForgotSec').addClass('active');
    });
    $('#lpass-icon').click(function(){
        if ($(this).hasClass('fa-eye')){
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('.lpass').attr('type', 'password');
        } else {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('.lpass').attr('type', 'text');
        }
    });
    $('#npass-icon').click(function(){
        if ($(this).hasClass('fa-eye')){
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('.npass').attr('type', 'password');
        } else {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('.npass').attr('type', 'text');
        }
    });
    $('#cpass-icon').click(function(){
        if ($(this).hasClass('fa-eye')){
            $(this).removeClass('fa-eye');
            $(this).addClass('fa-eye-slash');
            $('.cpass').attr('type', 'password');
        } else {
            $(this).removeClass('fa-eye-slash');
            $(this).addClass('fa-eye');
            $('.cpass').attr('type', 'text');
        }
    });
    $.fn.ProCatMenu = function(options) {
        var opts = $.extend({}, $.fn.ProCatMenu.defaults, options);
        return this.each(function() {
            var obj = $(this);
            $(obj).find('.tabMenu li').on(opts.trigger_event_type, function() {
                $(obj).find('.tabMenu li').removeClass('active');
                $(this).addClass('active');

            })
        });
    }
    $('.CatMenuBar .CatMegamenu').ProCatMenu({
        trigger_event_type: 'mouseover' //mouseover | click 
    });
    var topMenu = jQuery(".hmenu"),
    offset = 40,
    topMenuHeight = topMenu.outerHeight()+170,
    menuItems =  topMenu.find('a[href*="#"]'),
    scrollItems = menuItems.map(function(){
        var href = jQuery(this).attr("href"),
        id = href.substring(href.indexOf('#')),
        item = jQuery(id);
        if (item.length) { return item; }
    });
    menuItems.click(function(e){
        var href = jQuery(this).attr("href"),
        id = href.substring(href.indexOf('#'));
        offsetTop = href === "#" ? 0 : jQuery(id).offset().top-topMenuHeight+3;
        jQuery('html, body').stop().animate({
            scrollTop: offsetTop
        }, 300);
        e.preventDefault();
    });
    jQuery(window).scroll(function(){
        var fromTop = jQuery(this).scrollTop()+topMenuHeight;
        var cur = scrollItems.map(function(){
            if (jQuery(this).offset().top < fromTop)
            return this;
        });
        cur = cur[cur.length-1];
        var id = cur && cur.length ? cur[0].id : "";               
        menuItems.parent().removeClass("active");
        if(id){
            menuItems.parent().end().filter("[href*='#"+id+"']").parent().addClass("active");
        }
    });
});
jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
$('.UserD #edit-user').click(function(){
    $(".UserD .edittextbox .inputtext").attr("contenteditable", true);
    $(".UserD .edittextbox .inputtext").attr("readonly", false);
    $(".UserD .edittextbox .inputtext.date").attr("type", 'date');
    $(".UserD .edittextbox .PhotoBox input").attr("type", 'file');
    $(".UserD .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-user").hide();
    $("#save-user").show();
    $("#cancel-user").show();
});
$('.UserD #save-user').click(function(){
    $.get(UpdateUserInfo,{
        name : $('input[name=name]').val(),
        alternative_email : $('input[name=alternative_email]').val(),
        alternative_phone : $('input[name=alternative_phone]').val(),
        country : $('select[name=country]').val(),
        city : $('select[name=city]').val(),
        address : $('input[name=address]').val(),
    },function(data){
        toastr.success('User Information Updated Successfully.');
        $(".UserD .edittextbox .inputtext").attr("contenteditable", false);
        $(".UserD .edittextbox .inputtext").attr("readonly", true);
        $(".UserD .edittextbox .inputtext.date").attr("type", 'text');
        $(".UserD .edittextbox .PhotoBox input").attr("type", 'text');
        $(".UserD .edittextbox select.inputtext").addClass('noeditt');
        $("#save-user").hide();
        $("#cancel-user").hide();
        $("#edit-user").show();
    });
});
$('.UserD #cancel-user').click(function(){
    $(".UserD .edittextbox .inputtext").attr("contenteditable", false);
    $(".UserD .edittextbox .inputtext").attr("readonly", true);
    $(".UserD .edittextbox .inputtext.date").attr("type", 'text');
    $(".UserD .edittextbox .PhotoBox input").attr("type", 'text');
    $(".UserD .edittextbox select.inputtext").addClass('noeditt');
    $("#save-user").hide();
    $("#cancel-user").hide();
    $("#edit-user").show();
});

$('.Cominfo #edit-company').click(function(){
    $(".Cominfo .edittextbox .inputtext").attr("contenteditable", true);
    $(".Cominfo .edittextbox .inputtext").attr("readonly", false);
    $(".Cominfo .edittextbox .inputtext.date").attr("type", 'date');
    $(".Cominfo .edittextbox .PhotoBox input").attr("type", 'file');
    $(".Cominfo .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-company").hide();
    $("#save-company").show();
    $("#cancel-company").show();
});
$('.Cominfo #save-company').click(function(){
    $.get(UpdateCompanyInfo,{
        company : $('input[name=company_name]').val(),
        gst : $('input[name=gst]').val(),
        website : $('input[name=website]').val(),
        company_phone_no : $('input[name=company_phone_no]').val(),
        iam : $('select[name=iam]').chosen().val(),
        business_type : $('select[name=business_type]').chosen().val(),
        country : $('select[name=country]').chosen().val(),
        city : $('select[name=city]').chosen().val(),
        business_in : $('select[name=business_in]').chosen().val(),
        address : $('input[name=address]').val(),
        pincode : $('input[name=pincode]').val(),
        about : myEditor.getData(),
        'for' : 'company-info'
    },function(data){
        toastr.success('User Information Updated Successfully.');
        $(".Cominfo .edittextbox .inputtext").attr("contenteditable", false);
        $(".Cominfo .edittextbox .inputtext").attr("readonly", true);
        $(".Cominfo .edittextbox .inputtext.date").attr("type", 'text');
        $(".Cominfo .edittextbox .PhotoBox input").attr("type", 'text');
        $(".Cominfo .edittextbox select.inputtext").addClass('noeditt');
        $("#save-company").hide();
        $("#cancel-company").hide();
        $("#edit-company").show();
    });
});
$('.Cominfo #cancel-company').click(function(){
    $(".Cominfo .edittextbox .inputtext").attr("contenteditable", false);
    $(".Cominfo .edittextbox .inputtext").attr("readonly", true);
    $(".Cominfo .edittextbox .inputtext.date").attr("type", 'text');
    $(".Cominfo .edittextbox .PhotoBox input").attr("type", 'text');
    $(".Cominfo .edittextbox select.inputtext").addClass('noeditt');
    $("#save-company").hide();
    $("#cancel-company").hide();
    $("#edit-company").show();
});

$('.ComOthinfo #edit-company-other').click(function(){
    $(".ComOthinfo .edittextbox .inputtext").attr("contenteditable", true);
    $(".ComOthinfo .edittextbox .inputtext").attr("readonly", false);
    $(".ComOthinfo .edittextbox .inputtext.date").attr("type", 'date');
    $(".ComOthinfo .edittextbox .PhotoBox input").attr("type", 'file');
    $(".ComOthinfo .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-company-other").hide();
    $("#save-company-other").show();
    $("#cancel-company-other").show();
});
$('.ComOthinfo #save-company-other').click(function(){
    console.log(myEditor.getData());
    $.get(UpdateCompanyInfo,{
        established : $('input[name=established]').val(),
        certifications : $('input[name=certifications]').val(),
        annual_revenue : $('input[name=annual_revenue]').val(),
        employees : $('select[name=employees]').val(),
        patents : $('input[name=patents]').val(),
        website : $('input[name=website]').val(),
        'for' : 'company-other-info'
    },function(data){
        toastr.success('User Information Updated Successfully.');
        $(".ComOthinfo .edittextbox .inputtext").attr("contenteditable", false);
        $(".ComOthinfo .edittextbox .inputtext").attr("readonly", true);
        $(".ComOthinfo .edittextbox .inputtext.date").attr("type", 'text');
        $(".ComOthinfo .edittextbox .PhotoBox input").attr("type", 'text');
        $(".ComOthinfo .edittextbox select.inputtext").addClass('noeditt');
        $("#save-company-other").hide();
        $("#cancel-company-other").hide();
        $("#edit-company-other").show();
    });
});
$('.ComOthinfo #cancel-company-other').click(function(){
    $(".ComOthinfo .edittextbox .inputtext").attr("contenteditable", false);
    $(".ComOthinfo .edittextbox .inputtext").attr("readonly", true);
    $(".ComOthinfo .edittextbox .inputtext.date").attr("type", 'text');
    $(".ComOthinfo .edittextbox .PhotoBox input").attr("type", 'text');
    $(".ComOthinfo .edittextbox select.inputtext").addClass('noeditt');
    $("#save-company-other").hide();
    $("#cancel-company-other").hide();
    $("#edit-company-other").show();
});


$('#edit-company-album').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", true);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .inputtext.date").attr("type", 'date');
    $(".edittextbox .PhotoBox input").attr("type", 'file');
    $(".edittextbox select.inputtext").removeClass('noeditt');
    $(".edittextbox .btn-close").show();
    $(".edittextbox .pic").show();
    $("#edit-company-album").hide();
    $("#save-company-album").show();
    $("#cancel-company-album").show();
});
$('#upload-image-form').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url: UpdateCompanyAlbum,
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save-company-album").hide();
        $("#cancel-company-album").hide();
        $("#edit-company-album").show();
        $('.albumbox').append(data.uploaded_image);
        $('#image-input').wrap('<form>').closest('form').get(0).reset();
     }
    })
});
function RemoveAlbum(Id){
    $.ajax({
        data:{'id':Id},
        url:RemoveAlbumUrl,
        method:'GET',
        dataType:'JSON',
        success:function(data){
            toastr.success(data.message);
            $('.albumbox').html(data.uploaded_image);
        }
    });
}
$('#cancel-company-album').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", false);
    $(".edittextbox .inputtext").attr("readonly", true);
    $(".edittextbox .inputtext.date").attr("type", 'text');
    $(".edittextbox .PhotoBox input").attr("type", 'text');
    $(".edittextbox select.inputtext").addClass('noeditt');
    $(".edittextbox .btn-close").hide();
    $(".edittextbox .pic").hide();
    $("#save-company-album").hide();
    $("#cancel-company-album").hide();
    $("#edit-company-album").show();
});


$('.BankD #edit-bank').click(function(){
    $(".BankD .edittextbox .inputtext").attr("contenteditable", true);
    $(".BankD .edittextbox .inputtext").attr("readonly", false);
    $(".BankD .edittextbox .inputtext.date").attr("type", 'date');
    $(".BankD .edittextbox .PhotoBox input").attr("type", 'file');
    $(".BankD .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-bank").hide();
    $("#save-bank").show();
    $("#cancel-bank").show();
});
$('.BankD #save-bank').click(function(){
    $.get(UpdateBankInfo,{
        ifsc_code : $('input[name=ifsc_code]').val(),
        bank_name : $('input[name=bank_name]').val(),
        account_number : $('input[name=account_number]').val(),
        account_type : $('input[name=account_type]').val(),
    },function(data){
        toastr.success('User Information Updated Successfully.');
        $(".BankD .edittextbox .inputtext").attr("contenteditable", false);
        $(".BankD .edittextbox .inputtext").attr("readonly", true);
        $(".BankD .edittextbox .inputtext.date").attr("type", 'text');
        $(".BankD .edittextbox .PhotoBox input").attr("type", 'text');
        $(".BankD .edittextbox select.inputtext").addClass('noeditt');
        $("#save-bank").hide();
        $("#cancel-bank").hide();
        $("#edit-bank").show();
    });
});
$('.BankD #cancel-bank').click(function(){
    $(".BankD .edittextbox .inputtext").attr("contenteditable", false);
    $(".BankD .edittextbox .inputtext").attr("readonly", true);
    $(".BankD .edittextbox .inputtext.date").attr("type", 'text');
    $(".BankD .edittextbox .PhotoBox input").attr("type", 'text');
    $(".BankD .edittextbox select.inputtext").addClass('noeditt');
    $("#save-bank").hide();
    $("#cancel-bank").hide();
    $("#edit-bank").show();
});


$('#edit-certifications').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", true);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .inputtext.date").attr("type", 'date');
    $(".edittextbox .PhotoBox input").attr("type", 'file');
    $(".edittextbox select.inputtext").removeClass('noeditt');
    $(".CertificationsAlbum .btn-close").show();
    $(".CertificationsAlbum .edittextbox .pic").show();
    $('.certificateName').show();
    $("#edit-certifications").hide();
    $("#save-certifications").show();
    $("#cancel-certifications").show();
});
$('#certifications-image').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url: CertificationsAlbum,
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save-certifications").hide();
        $("#cancel-certifications").hide();
        $("#edit-certifications").show();
        $('.certificationsbox').append(data.uploaded_image);
        $('#image-input').wrap('<form>').closest('form').get(0).reset();
        $('#certifications-image').wrap('<form>').closest('form').get(0).reset();
     }
    })
});
function RemoveCertifications(Id){
    $.ajax({
        data:{'id':Id},
        url:RemoveCertificationsAlbum,
        method:'GET',
        dataType:'JSON',
        success:function(data){
            toastr.success(data.message);
            $('.certificationsbox').html(data.uploaded_image);
        }
    });
}
$('#cancel-certifications').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", false);
    $(".edittextbox .inputtext").attr("readonly", true);
    $(".edittextbox .inputtext.date").attr("type", 'text');
    $(".edittextbox .PhotoBox input").attr("type", 'text');
    $(".edittextbox select.inputtext").addClass('noeditt');
    $(".CertificationsAlbum .btn-close").hide();
    $(".CertificationsAlbum .edittextbox .pic").hide();
    $("#save-certifications").hide();
    $("#cancel-certifications").hide();
    $("#edit-certifications").show();
    $('.certificateName').hide();
});




$('#edit-product-certifications').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", true);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .inputtext.date").attr("type", 'date');
    $(".edittextbox .PhotoBox input").attr("type", 'file');
    $(".edittextbox select.inputtext").removeClass('noeditt');
    $(".ProductCertificationsAlbum .btn-close").show();
    $(".ProductCertificationsAlbum .edittextbox .pic").show();
    $("#edit-product-certifications").hide();
    $("#save-product-certifications").show();
    $("#cancel-product-certifications").show();
    $('.productcertificateName').show();
});
$('#product-certifications-image').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url: ProductCertifications,
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        // $("#save-product-certifications").hide();
        // $("#cancel-product-certifications").hide();
        // $("#edit-product-certifications").show();
        $('.productcertificationsbox').append(data.uploaded_image);
        $('#image-input').wrap('<form>').closest('form').get(0).reset();
        $('#product-certifications-image').wrap('<form>').closest('form').get(0).reset();
     }
    })
});
function RemoveProductCertifications(Id){
    $.ajax({
        data:{'id':Id},
        url:RemoveProductCertification,
        method:'GET',
        dataType:'JSON',
        success:function(data){
            toastr.success(data.message);
            $('.productcertificationsbox').html(data.uploaded_image);
        }
    });
}
$('#cancel-product-certifications').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", false);
    $(".edittextbox .inputtext").attr("readonly", true);
    $(".edittextbox .inputtext.date").attr("type", 'text');
    $(".edittextbox .PhotoBox input").attr("type", 'text');
    $(".edittextbox select.inputtext").addClass('noeditt');
    $(".ProductCertificationsAlbum .btn-close").hide();
    $(".ProductCertificationsAlbum .edittextbox .pic").hide();
    $("#save-product-certifications").hide();
    $("#cancel-product-certifications").hide();
    $("#edit-product-certifications").show();
    $('.productcertificateName').hide();
});

$('#edit-partner-factories').click(function(){
    $(".AddFactories .edittextbox .inputtext").attr("contenteditable", true);
    $(".AddFactories .edittextbox .inputtext").attr("readonly", false);
    $(".AddFactories .edittextbox .inputtext.date").attr("type", 'date');
    $(".AddFactories .edittextbox .PhotoBox input").attr("type", 'file');
    $(".AddFactories .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-partner-factories").hide();
    $("#save-partner-factories").show();
    $("#cancel-partner-factories").show();
    $('.addFactories').show();
});
$('#partner-factories').on('submit', function(event){
    event.preventDefault();
    $.ajax({
        url: AddFactoriesUrl,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data){
            toastr.success(data.message);
            $(".AddFactories .edittextbox .inputtext").attr("contenteditable", false);
            $(".AddFactories .edittextbox .inputtext").attr("readonly", true);
            $(".AddFactories .edittextbox .inputtext.date").attr("type", 'text');
            $(".AddFactories .edittextbox .PhotoBox input").attr("type", 'text');
            $(".AddFactories .edittextbox select.inputtext").addClass('noeditt');
            $("#save-partner-factories").hide();
            $("#cancel-partner-factories").hide();
            $("#edit-partner-factories").show();
            $('.addFactories').hide();
            $('.factoriesbox').append(data.html);
            $('#partner-factories').wrap('<form>').closest('form').get(0).reset();
        }
    })
});
$('#cancel-partner-factories').click(function(){
    $(".AddFactories .edittextbox .inputtext").attr("contenteditable", false);
    $(".AddFactories .edittextbox .inputtext").attr("readonly", true);
    $(".AddFactories .edittextbox .inputtext.date").attr("type", 'text');
    $(".AddFactories .edittextbox .PhotoBox input").attr("type", 'text');
    $(".AddFactories .edittextbox select.inputtext").addClass('noeditt');
    $("#save-partner-factories").hide();
    $("#cancel-partner-factories").hide();
    $("#edit-partner-factories").show();
    $('.addFactories').hide();
});

function EditFactorie(Id){
    $(".EditFactories"+Id+" .edittextbox .inputtext").attr("contenteditable", true);
    $(".EditFactories"+Id+" .edittextbox .inputtext").attr("readonly", false);
    $(".EditFactories"+Id+" .edittextbox .inputtext.date").attr("type", 'date');
    $(".EditFactories"+Id+" .edittextbox .PhotoBox input").attr("type", 'file');
    $(".EditFactories"+Id+" .edittextbox select.inputtext").removeClass('noeditt');
    $("#edit-update-factories"+Id).hide();
    $("#save-update-factories"+Id).show();
    $("#cancel-update-factories"+Id).show();
}
function SaveFactorie(Id){
    $('#partner-factories'+Id).on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url: AddFactoriesUrl,
            method:"POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data){
                toastr.success(data.message);
                $(".EditFactories"+Id+" .edittextbox .inputtext").attr("contenteditable", false);
                $(".EditFactories"+Id+" .edittextbox .inputtext").attr("readonly", true);
                $(".EditFactories"+Id+" .edittextbox .inputtext.date").attr("type", 'text');
                $(".EditFactories"+Id+" .edittextbox .PhotoBox input").attr("type", 'text');
                $(".EditFactories"+Id+" .edittextbox select.inputtext").addClass('noeditt');
                $("#save-update-factories"+Id).hide();
                $("#cancel-update-factories"+Id).hide();
                $("#edit-update-factories"+Id).show();
            }
        })
    });
}
function CancelFactorie(Id){
    $(".EditFactories"+Id+" .edittextbox .inputtext").attr("contenteditable", false);
    $(".EditFactories"+Id+" .edittextbox .inputtext").attr("readonly", true);
    $(".EditFactories"+Id+" .edittextbox .inputtext.date").attr("type", 'text');
    $(".EditFactories"+Id+" .edittextbox .PhotoBox input").attr("type", 'text');
    $(".EditFactories"+Id+" .edittextbox select.inputtext").addClass('noeditt');
    $("#save-update-factories"+Id).hide();
    $("#cancel-update-factories"+Id).hide();
    $("#edit-update-factories"+Id).show();
}

$('#edit-trade-capacity').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", true);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .form-check input.inputtext").attr("disabled", false);
    $(".edittextbox .inputtext.date").attr("type", 'date');
    $(".edittextbox .PhotoBox input").attr("type", 'file');
    $(".edittextbox select.inputtext").removeClass('noeditt');
    $(".edittextbox .AllDetail>li>small").show();
    $("#edit-trade-capacity").hide();
    $("#save-trade-capacity").show();
    $("#cancel-trade-capacity").show();
});

$('#trade-capacity').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url: UpdateTradeCapacity,
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save-trade-capacity").hide();
        $("#cancel-trade-capacity").hide();
        $("#edit-trade-capacity").show();
     }
    })
});

$('#cancel-trade-capacity').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", false);
    $(".edittextbox .inputtext").attr("readonly", true);
    $(".edittextbox .form-check input.inputtext").attr("disabled", true);
    $(".edittextbox .inputtext.date").attr("type", 'text');
    $(".edittextbox .PhotoBox input").attr("type", 'text');
    $(".edittextbox select.inputtext").addClass('noeditt');
    $(".edittextbox .AllDetail>li>small").hide();
    $("#save-trade-capacity").hide();
    $("#cancel-trade-capacity").hide();
    $("#edit-trade-capacity").show();
});

$('#edit-company-introduction').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", true);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .inputtext").attr("readonly", false);
    $(".edittextbox .form-check input.inputtext").attr("disabled", false);
    $(".edittextbox .inputtext.date").attr("type", 'date');
    $(".edittextbox .PhotoBox input").attr("type", 'file');
    $(".edittextbox select.inputtext").removeClass('noeditt');
    $(".edittextbox .AllDetail>li>small").show();
    $("#edit-company-introduction").hide();
    $("#save-company-introduction").show();
    $("#cancel-company-introduction").show();
});

$('#company-introduction').on('submit', function(event){
    event.preventDefault();
    let formData = new FormData(this);
    formData.append("company_introduction",myEditor.getData(),);
    $.ajax({
     url: UpdateIntroduction,
     method:"POST",
     data:formData,
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".edittextbox .inputtext").attr("contenteditable", false);
        $(".edittextbox .inputtext").attr("readonly", true);
        $(".edittextbox .inputtext.date").attr("type", 'text');
        $(".edittextbox .PhotoBox input").attr("type", 'text');
        $(".edittextbox select.inputtext").addClass('noeditt');
        $("#save-company-introduction").hide();
        $("#cancel-company-introduction").hide();
        $("#edit-company-introduction").show();
     }
    })
});

$('#cancel-company-introduction').click(function(){
    $(".edittextbox .inputtext").attr("contenteditable", false);
    $(".edittextbox .inputtext").attr("readonly", true);
    $(".edittextbox .form-check input.inputtext").attr("disabled", true);
    $(".edittextbox .inputtext.date").attr("type", 'text');
    $(".edittextbox .PhotoBox input").attr("type", 'text');
    $(".edittextbox select.inputtext").addClass('noeditt');
    $(".edittextbox .AllDetail>li>small").hide();
    $("#save-company-introduction").hide();
    $("#cancel-company-introduction").hide();
    $("#edit-company-introduction").show();
});