$(function() {
		   
	function reloadCaptcha(){ 
		$("#captchax").attr("src","php/captcha/captcha.php?r=" + Math.random()); 
	}
	
	$('.captcode').click(function(e){
		e.preventDefault();
		reloadCaptcha();
	});	
	
	function swapButton(){
		var txtswap = $(".frm-footer button[type='submit']");
		if (txtswap.text() == txtswap.data("btntext-sending")) {
			txtswap.text(txtswap.data("btntext-original"));
		} else {
			txtswap.data("btntext-original", txtswap.text());
			txtswap.text(txtswap.data("btntext-sending"));
		}
	}
	
	$("#floraforms").validate({
			errorClass: "state-error",
			validClass: "state-success",
			errorElement: "em",
			rules: {
				firstname: {
						required: true,
						minlength: 2
				},
				lastname: {
						required: true
				},				
				emailaddress: {
						required: true,
						email: true
				},
				telephone: {
						required: true
				},			
				captcha:{
					required:true,
					remote:'php/captcha/process.php'
				}				
			},
			messages:{
				firstname: {
						required: 'Insira seu nome',
						minlength: 'Necessário mais de 2 caracteres'
				},
				lastname: {
						required: 'Insira seu sobrenome'
				},				
				emailaddress: {
						required: 'Insira um e-mail válido',
						email: 'Insira um e-mail válido'
				},
				telephone: {
						required: 'Insira seu telefone'
				},				
				captcha:{
						required: 'É necessário inserir o captcha',
						remote:'Captcha incorreto'
				}				
			},
			highlight: function(element, errorClass, validClass) {
					$(element).closest('.field').addClass(errorClass).removeClass(validClass);
			},
			unhighlight: function(element, errorClass, validClass) {
					$(element).closest('.field').removeClass(errorClass).addClass(validClass);
			},
			errorPlacement: function(error, element) {
			   if (element.is(":radio") || element.is(":checkbox")) {
						element.closest('.option-group').after(error);
			   } else {
						error.insertAfter(element.parent());
			   }
			},	
			submitHandler:function(form) {
				$(form).ajaxSubmit({
						target:'.response',			   
						beforeSubmit:function(){
							swapButton();
							$('.frm-footer').addClass('elemprogress');
						},
						error:function(){
							swapButton();
							$('.frm-footer').removeClass('elemprogress');
						},
						 success:function(){
								swapButton();
								$('.frm-footer').removeClass('elemprogress');
								$('.alert-success').show().delay(10000).fadeOut();
								$('.field').removeClass("state-error, state-success");
								if( $('.alert-error').length == 0){
									$('#floraforms').resetForm();
									reloadCaptcha();
								}
						 }
				  });
			}		
	});					

});	