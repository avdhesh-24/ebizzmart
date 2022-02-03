
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
        company_email : $('input[name=company_email]').val(),
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
        toastr.success('Company profile has been updated successfully!');
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
        toastr.success('Company information has been updated successfully!');
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

$('#edit-company-logo').click(function(){
    $(".logosec .edittextbox .inputtext").attr("contenteditable", true);
    $(".logosec .edittextbox .inputtext").attr("readonly", false);
    $(".logosec .edittextbox .inputtext.date").attr("type", 'date');
    $(".logosec .edittextbox .PhotoBox input").attr("type", 'file');
    $(".logosec .edittextbox select.inputtext").removeClass('noeditt');
    $(".logosec .edittextbox .btn-close").show();
    $(".logosec .edittextbox .pic").show();
    $("#edit-company-logo").hide();
    $("#save-company-logo").show();
    $("#cancel-company-logo").show();
});
$('#upload-company-logo').on('submit', function(event){
    event.preventDefault();
    $.ajax({
     url: UpdateCompanyLogo,
     method:"POST",
     data:new FormData(this),
     dataType:'JSON',
     contentType: false,
     cache: false,
     processData: false,
     success:function(data)
     {
        toastr.success(data.message);
        $(".logosec .edittextbox .inputtext").attr("contenteditable", false);
        $(".logosec .edittextbox .inputtext").attr("readonly", true);
        $(".logosec .edittextbox .inputtext.date").attr("type", 'text');
        $(".logosec .edittextbox .PhotoBox input").attr("type", 'text');
        $(".logosec .edittextbox select.inputtext").addClass('noeditt');
        $(".logosec .edittextbox .pic").hide();
        $("#save-company-logo").hide();
        $("#cancel-company-logo").hide();
        $("#edit-company-logo").show();
        $('.logobox').html(data.logo);
        $('.bannerbox').append(data.banner_image);
        $('#image-input').wrap('<form>').closest('form').get(0).reset();
     }
    })
});
function RemoveCompanyBanner(Id){
    $.ajax({
        data:{'id':Id},
        url:RemoveBannerUrl,
        method:'GET',
        dataType:'JSON',
        success:function(data){
            toastr.success(data.message);
            $('.bannerbox').html(data.banner_image);
        }
    });
}
$('#cancel-company-logo').click(function(){
    $(".logosec .edittextbox .inputtext").attr("contenteditable", false);
    $(".logosec .edittextbox .inputtext").attr("readonly", true);
    $(".logosec .edittextbox .inputtext.date").attr("type", 'text');
    $(".logosec .edittextbox .PhotoBox input").attr("type", 'text');
    $(".logosec .edittextbox select.inputtext").addClass('noeditt');
    $(".logosec .edittextbox .btn-close").hide();
    $(".logosec .edittextbox .pic").hide();
    $("#save-company-logo").hide();
    $("#cancel-company-logo").hide();
    $("#edit-company-logo").show();
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