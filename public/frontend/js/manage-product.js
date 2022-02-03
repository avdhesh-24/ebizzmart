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
            $('.PostStep').append(data.parent_html);
            if(child==0){ 
                $('#nextprocess').attr('href',data.post_product);
                $('#nextprocess').removeClass('disabled',true);
            }else{
                $('#nextprocess').removeAttr('href',true);
                $('#nextprocess').addClass('disabled',true);
            }
            SectionActive();
        }
    });
}