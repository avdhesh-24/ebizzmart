$.validator.setDefaults({
    submitHandler: function() {
        
        $('#ccsvbtn').hide();
        $('#ccprcbtn').show();
        return true;
    }
});

$().ready(function() {
    $(".company-contact").validate({
        rules: {
            name: {required: true,},
            ccode: "required",
            mobile: {required: true,minlength: 8},
            email: {required: true,email: true},
            subject: {required: true,maxlength: 200},
            message: "required",
        },
    });
    
});
