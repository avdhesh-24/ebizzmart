SectionActive();
function SectionActive(){
    $.fn.ProCatMenu = function(options) {
        var opts = $.extend({}, $.fn.ProCatMenu.defaults, options);
        return this.each(function() {
            var obj = $(this);
            $(obj).find('#CatBox1 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(1)').addClass('active');
            })
            $(obj).find('#CatBox2 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox2 li').removeClass('active');
                $('#CatBox2 li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(2)').addClass('active');
            })
            $(obj).find('#CatBox3 li').on(opts.trigger_event_type, function() {
                $(obj).find('.CatBox3 li').removeClass('active');
                $(this).addClass('active');
                $('.PostStep li:nth-child(3)').addClass('active');
            })
        });
    }
    $('.CatBoxs').ProCatMenu({
        trigger_event_type: 'click' //mouseover | click 
    });
    
    $('.PostStep li:nth-child(1)').click(function(){
        $('#CatBox2 li').removeClass('active');
        $('.PostStep li:nth-child(2)').removeClass('active');
    });
    $('.PostStep li:nth-child(2)').click(function(){
        $('#CatBox3 li').removeClass('active');
        $('.PostStep li:nth-child(3)').removeClass('active');
    });
}
function getChildCategory(category,level,child){
    $.ajax({
        data:{category:category,_token: XCSRF_Token},
        url: ChooseProductCategory,
        method:'POST',
        dataType:'JSON',
        success:function(data){
            if(level==2){ $('.PostStep').html('');  $('.childBox').html(''); $('.childBox').hide(); }
            $('#CatBox'+level).html(data.category_html);
            $('#CatBox'+level).show();
            $('#parentCat'+level).remove();
            $('#parentCat'+(level-1)).remove();
            $('.PostStep').append(data.parent_html);
            if(child==0){ 
                $('#nextprocess').attr('href',data.post_product);
                $('#nextprocess').removeClass('disabled',true);
                $('#CatBox'+level).html('');
                $('#CatBox'+level).hide();
            }else{
                $('#nextprocess').removeAttr('href',true);
                $('#nextprocess').addClass('disabled',true);
            }
            SectionActive();
        }
    });
}
$('.searchproductcategory').on('keyup',function(e){
    $.ajax({
        data:{search:e.target.value,_token:XCSRF_Token},
        url:SearchProductCategory,
        method:'POST',
        datatype:'JSON',
        cache:false,
        success:function(data){
            console.log(data.html);
            $('.searchbox').html(data.html);
            if(e.target.value==''){ $('.searchbox').html(''); }
        }
    });
});
$('#add-product').on('submit', function(event){
    event.preventDefault();
    $('#svbtn').hide();
    $('#prcbtn').show();
    $('.formerror').html('');
    $.ajax({
        data:new FormData(this),
        url:AddProduct,
        method:'POST',
        cache:false,
        datatype:'JSON',     
        processData: false,
        contentType: false,
        success:function(data){
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.success(data.message);
            $('#svbtn').show();
            $('#prcbtn').hide();
            $('#add-product').wrap('<form>').closest('form').get(0).reset();
        },
        error: function (response) {
            if(response.responseJSON.errors.product_name!=undefined){
                $('.product_name').text(response.responseJSON.errors.product_name);
                $('input[name=product_name]').focus();
            }
            if(response.responseJSON.errors.minimum_order_qty!=undefined){          
                $('.minimum_order_qty').text(response.responseJSON.errors.minimum_order_qty);
                $('input[name=minimum_order_qty]').focus();
            }
            if(response.responseJSON.errors.availability!=undefined){  
                $('.availability').text(response.responseJSON.errors.availability);
                $('input[name=availability]').focus();
            }
            if(response.responseJSON.errors.default_image!=undefined){  
                $('.default_image').text(response.responseJSON.errors.default_image);
                $('input[name=default_image]').focus();
            }
            if(response.responseJSON.errors.brand!=undefined){  
                $('.brand').text(response.responseJSON.errors.brand);
                $('#btnradio1').focus();
            }
            if(response.responseJSON.errors.policies!=undefined){  
                $('.policies').text(response.responseJSON.errors.policies);
                $('input[name=policies]').focus();
            }
            $('#svbtn').show();
            $('#prcbtn').hide();
        }
    });
});