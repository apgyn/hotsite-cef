$(document).ready(function(){
    
	//Homepage Slider
    var options = {
        nextButton: false,
        prevButton: false,
        pagination: true,
        animateStartingFrameIn: true,
        autoPlay: true,
        autoPlayDelay: 5000,
        preloader: true
    };
    
    var mySequence = $("#sequence").sequence(options).data("sequence");

	$( window ).resize(function() {
		$('.col-footer:eq(0), .col-footer:eq(1)').css('height', '');
		var footerColHeight = Math.max($('.col-footer:eq(0)').height(), $('.col-footer:eq(1)').height()) + 'px';
		$('.col-footer:eq(0), .col-footer:eq(1)').css('height', footerColHeight);
	});
	$( window ).resize();
	
	
	/* Hidden form search */
	$("#btnConsultar").click(function(){
		if($("#containerSearch").find(".hidden").length > 0){
			$("#sectionSearch").removeClass("hidden").fadeIn("slow");
			$("#result-form").css("display","none").fadeOut("fast");
			$("#cpf").val('').focus();
			$(window).scrollTop($('#cpf-form').offset().top);
		}
		else{
			$("#sectionSearch").addClass("hidden").fadeOut("slow");
		}
		
	});
	
	/* Ação Botão Limpar */
	$("#btnLimpar").click(function(){
		if($("#containerSearch").find(".hidden").length <= 0){
			$("#result-form").css("display","none").fadeOut("fast");
			$("#cpf").val('').focus();
		}
		else{
			$("#sectionSearch").addClass("hidden").fadeOut("slow");
		}
	});
	
	/* MASK INPUT FOR CNPJ AND PHONE */
	$("#cpf").mask("999.999.999-99");
	
	/* INIT POLYFIILER */
	webshim.setOptions({
		// configure generally option
		'extendNative': true,
		
		// configure forms-shim
		'forms': { 
			'lazyCustomMessages': true, // implement customValidationMessages
			'addValidators': true
		}
	});
	webshims.polyfill('forms forms-ext');
	webshims.activeLang('pt-BR');

});