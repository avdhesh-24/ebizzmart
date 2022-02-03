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
