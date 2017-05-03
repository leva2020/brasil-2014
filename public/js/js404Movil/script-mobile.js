// Can also be used with $(document).ready()
$(window).load(function() {
	$('#slider-blogs').flexslider({
		animation : "slide",
		slideshow : false,
		minItems : 1,
		maxItems : 1,
		itemWidth : 290,
		touch : true,
		video : false,
		controlNav : true,
		directionNav : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slider-gossip').flexslider({
		slideshow : false,
		animation : "slide",
		touch : true,
		video : false,
		animationSpeed : 400,
		controlNav : true,
		directionNav : true,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slider-marcadores-mobile').flexslider({
		animation : "slide",
		slideshow : false,
		directionNav : false,
		selector : ".slides > .lista-marcadores",
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#galeriaApaisada').flexslider({
		animation : "slide",
		animationLoop : true,
		maxtems : 1,
		controlNav : false,
		directionNav : true,
		animationLoop : true,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slidesDesarrollo').flexslider({
		slideshow : false,
		animation : "slide",
		itemWidth : 108,
		itemMargin : 10,
		directionNav : true,
		controlNav : false,
		maxItems : 2,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slider-caricaturas').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : false,
		controlNav : true,
		maxItems : 1,
		itemWidth : 245,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slider-equipos').flexslider({
		slideshow : false,
		animationLoop : false,
		animation : "slide",
		directionNav : true,
		controlNav : false,
		itemWidth : 35,
		itemMargin : 5,
		maxItems : 4,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#especiales').flexslider({
		animation : "slide",
		slideshow : false,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#galeria-reciente').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : true,
		controlNav : false,
		maxItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#multimediaTouchTec').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : true,
		controlNav : true,
		maxItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#landingTag').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : false,
		controlNav : true,
		maxItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#galeria-caricaturas-1').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : false,
		controlNav : true,
		maxItems : 1,
		minItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#galeria-caricaturas-2').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : false,
		controlNav : true,
		maxItems : 1,
		minItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('#slider-periodistas-canal-et').flexslider({
		slideshow : false,
		animation : "slide",
		directionNav : true,
		controlNav : false,
		minItems : 1,
		touch : true,
		video : false,
		animationSpeed : 600,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
	$('.now-showing').flexslider({
		slideshow : false,
		animation : "slide",
		itemWidth : 165,
		minItems : 1,
		maxItems : 1,
		itemMargin : 0,
		touch : true,
		video : false,
		animationSpeed : 400,
		directionNav : true,
		controlNav : false,
		useCSS : false,
		start : function(slider) {
			$('body').removeClass('loading');
		}
	});
});

//script iScroll

var myScroll;
function loaded() {
	try {
		myScroll = new iScroll('wrapperNav');
	} catch (e) {
		if ( typeof console !== "undefined")
			console.log(e);
	}
}

document.addEventListener('DOMContentLoaded', function() {
	setTimeout(loaded, 2000);
}, false);

$(document).ready(function() {

	/***
	 * Función para probar btn activar buscador menu header
	 */
	$(".btn-activar-buscar").click(function() {
		$(".menu-navegacion .top-menu").toggleClass("buscador-activo");
	});

	/***
	 * Función para probar btn mostrar biografía caricaturista
	 */

	$(".modulo-caricaturas .biografia .btn-mas").click(function() {
		$(".modulo-caricaturas .biografia .btn-mas").css("display", "none");
		$(".modulo-caricaturas .biografia .bio-completa").css("display", "block");
	});

	$(".modulo-caricaturas .ui-collapsible-heading").click(function() {
		$(".modulo-caricaturas .biografia .btn-mas").css("display", "block");
		$(".modulo-caricaturas .biografia .bio-completa").css("display", "none");
	});
	/***
	 * Función cerrar galerias recientes
	 */
	$("#galeria-reciente #btn-cerrar-gal-rel").click(function() {
		var sliderGrande = $("#galeria-reciente").data('flexslider');
		sliderGrande.flexAnimate(0);
		return false;
	});
	$("#galeria-reciente-fullscreen #btn-cerrar-gal-rel").click(function() {
		var sliderGrande = $("#galeria-reciente-fullscreen").data('flexslider');
		sliderGrande.flexAnimate(0);
		return false;
	});

	/***
	 * Función abrir galeria en fullscreen
	 */
	var clicSlideImg = $("#galeria-reciente .slides img");
	var clicSlideBtn = $("#galeria-reciente .slides .btn-maximizar");
	clicSlideImg.click(function() {
		abrirFullScreen();
		return false;
	});
	clicSlideBtn.click(function() {
		abrirFullScreen();
		return false;
	});

	function abrirFullScreen() {

		var cSlider = $("#galeria-reciente").data("flexslider");
		var cSlide = cSlider.find(".flex-active-slide").index() - 1;
		var vSlideActual = cSlide;

		$.modal.close();
		$('.contenedor-galeria-fullscreen').modal({
			appendTo : ".galerias-webapp"
		});

		$('#galeria-reciente-fullscreen').flexslider({
			slideshow : false,
			startAt : cSlide,
			animation : "slide",
			directionNav : true,
			controlNav : false,
			maxItems : 1,
			touch : true,
			video : false,
			animationSpeed : 600,
			useCSS : false,
			start : function(slider) {
				$('body').removeClass('loading');
			},
			after : function(slider) {
				vSlideActual = slider.currentSlide;
			}
		});

		$("#simplemodal-container .simplemodal-close").click(function() {
			cSlider.flexAnimate(vSlideActual);
			return false;
		});

	}

	/***
	 * Función galeria caricaturas fullscreen
	 */
	/*var clicSlideImgCaricaturas = $("#galeria-caricaturas-1 .slides img");
	var clicSlideBtnCaricaturas = $("#galeria-caricaturas-1 .slides .btn-maximizar");
	clicSlideImgCaricaturas.click(function() {
		abrirFullScreenCaricaturas();
		return false;
	});
	clicSlideBtnCaricaturas.click(function() {
		abrirFullScreenCaricaturas();
		return false;
	});

	function abrirFullScreenCaricaturas() {

		var cSlider = $("#galeria-caricaturas-1").data("flexslider");
		var cSlide = cSlider.find(".flex-active-slide").index() - 1;
		var vSlideActual = cSlide;
		$.modal.close();

		var contenedor = $('#galeria-caricaturas-fullscreen-1').parent();
		contenedor.modal({
			appendTo : ".caricaturas-webapp"
		});

		$('#galeria-caricaturas-fullscreen-1').flexslider({
			slideshow : false,
			startAt : cSlide,
			animation : "slide",
			directionNav : false,
			controlNav : true,
			maxItems : 1,
			touch : true,
			video : false,
			animationSpeed : 600,
			useCSS : false,
			start : function(slider) {
				$('body').removeClass('loading');
			},
			after : function(slider) {
				vSlideActual = slider.currentSlide;
			}
		});

		$("#simplemodal-container .simplemodal-close").click(function() {
			cSlider.flexAnimate(vSlideActual);
			return false;
		});

	}*/ 
	
	$(".home-caricaturas .slider-caricaturas .btn-maximizar").click(function() {
		$('.slider-fullscreen').toggleClass("activo");
		return false;
	});
	$(".home-caricaturas .slider-caricaturas img").click(function() {
		$('.slider-fullscreen').toggleClass("activo");
		return false;
	});
});
