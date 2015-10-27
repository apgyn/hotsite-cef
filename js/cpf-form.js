(function ($, window, document, undefined) {
    'use strict';
	
    var $form = $('#cpf-form');

    $form.submit(function (e) {
        // remove the error class
        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        // get the form data
        var formData = {
            'cpf' : $('input[name="cpf"]').val(),
        };

        // process the form
		$('#loading').show();
        $.ajax({
            type : 'POST',
            url  : 'processing/process.php',
            data : formData,
            dataType : 'json',
            encode : true,
			complete: function(){
			   $('#loading').hide();
			}
        }).done(function (data) {
            // handle errors
            if (!data.success) {
                if (data.errors.cpf) {
                    $('#cpf-field').addClass('has-error');
                    $('#cpf-field').find('.col-md-10').append('<span class="help-block">' + data.errors.cpf + '</span>');
					$("#result-form").addClass("hidden").fadeOut("fast");
                }
				if (data.errors.cpfQuery) {
					$("#result-form").removeClass("hidden").fadeIn("slow");
					$('#result-form').html('<div class="alert alert-danger text-center">' + data.errors.cpfQuery + '</div>');
					$(window).scrollTop($('#result-form').offset().top);
                }
				else if(data.errors.cpfQueryNotFound){
					$("#result-form").removeClass("hidden").fadeIn("slow");
					$('#result-form').html('<div class="alert alert-warning text-center">' + data.errors.cpfQueryNotFound + '</div>');
					$(window).scrollTop($('#result-form').offset().top);
				}
                
            } else {
				// display success message
				$("#result-form").removeClass("hidden").fadeIn("slow");
				if(data.messageNova){
					$('#result-form').html('<div class="alert alert-info">' + data.messageNova + '</div>');
			   		$(window).scrollTop($('#result-form').offset().top);
				}
				else{
					$('#result-form').html('<div class="alert alert-success">' + data.messageExistente + '</div>');
				    //$("#result-form").focus();
				    $(window).scrollTop($('#result-form').offset().top);
				}
               
            }
        }).fail(function (xhr, desc, err) {
            // for debug
            //alert('Desculpe! Ocorreu algum erro!');
			$('#result-form').html('<div class="alert alert-danger text-center">Desculpe! Ocorreu um erro inesperado ('+err+'). Tente novamente em alguns instantes.</div>');
			console.log(xhr);
			console.log("Detalhes: " + desc + ". nErro:" + err);
        });

        e.preventDefault();
    });
}(jQuery, window, document));