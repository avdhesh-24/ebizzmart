$.validator.setDefaults({
    submitHandler: function() {
        alert("submitted!");
    }
});

	$().ready(function() {
		$(".company-contact").validate({
			rules: {
				name: {
					required: true,
				},
                ccode: "required",
				mobile: {
					required: true,
					minlength: 8
				},
				email: {
					required: true,
					email: true
				},
				subject: {
					required: true,
					maxlength: 200
				},
				message: "required",
			},
		});
        
    });