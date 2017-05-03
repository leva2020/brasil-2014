// JavaScript Document

$(function(){
  var toggles = $('.toggle a'),
      codes = $('.code');
  
  toggles.on("click", function(event){
    event.preventDefault();
    var $this = $(this);
         
    if (!$this.hasClass("active")) {
      toggles.removeClass("active");
      $this.addClass("active");
      codes.hide().filter(this.hash).show();
    }
  });
  toggles.first().click();
});


$('.btn-menu a').bind('click', function(){
	$('.btnVerGrupos').toggleClass("active");
  $('.botonesInferiores').toggleClass("active");
  $('.container .content').toggleClass('active');
  $('.secciones .overlay').toggleClass('activa');
});

$('.secciones .overlay').bind('click', function(){
	$('.active').removeClass('active');
  $('.activa').removeClass('activa');
});

$('.btn_compartir').bind('click', function(){
	$('.redes-header').toggle();
	$('.compartir').toggleClass('activo');
});


/*
$('.grupoa label').bind('click', function(){
  $('.grupoa label').toggleClass('up');
});
$('.grupob label').bind('click', function(){
  $('.grupob label').toggleClass('up');
});
$('.grupoc label').bind('click', function(){
  $('.grupoc label').toggleClass('up');
});
$('.grupod label').bind('click', function(){
  $('.grupod label').toggleClass('up');
});
$('.grupoe label').bind('click', function(){
  $('.grupoe label').toggleClass('up');
});
$('.grupof label').bind('click', function(){
  $('.grupof label').toggleClass('up');
});
$('.grupog label').bind('click', function(){
  $('.grupog label').toggleClass('up');
});
$('.grupoh label').bind('click', function(){
  $('.grupoh label').toggleClass('up');
});
*/


/* ------- CALENDARIO FILTROS POR GRUPOS ---------*/
		
			/*---Active control remoto calendario- */
			$('.btnTabla').click(function(){
					$('.btnTabla').css({ opacity: 0.4 });
					$(this).css({ opacity: 1});		
			});
			
			$('.btnTodosGrupos').click(function (evento) {
				$('.btnTabla').css({ opacity: 1 });
				$('.partidosCalendario.grupoa').css('display','block');	
				$('.partidosCalendario.grupob').css('display','block');
				$('.partidosCalendario.grupoc').css('display','block');
				$('.partidosCalendario.grupod').css('display','block');
				$('.partidosCalendario.grupoe').css('display','block');
				$('.partidosCalendario.grupof').css('display','block');
				$('.partidosCalendario.grupog').css('display','block');
				$('.partidosCalendario.grupoh').css('display','block');
			});
			
			
			$('.btnTabla.a').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','block');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.b').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','block');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.c').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','block');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.d').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','block');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.e').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','block');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.f').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','block');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.g').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','block');
				$('.partidosCalendario.grupoh').css('display','none');

			});
			
			$('.btnTabla.h').click(function (evento) {
				$('.partidosCalendario.grupoa').css('display','none');	
				$('.partidosCalendario.grupob').css('display','none');
				$('.partidosCalendario.grupoc').css('display','none');
				$('.partidosCalendario.grupod').css('display','none');
				$('.partidosCalendario.grupoe').css('display','none');
				$('.partidosCalendario.grupof').css('display','none');
				$('.partidosCalendario.grupog').css('display','none');
				$('.partidosCalendario.grupoh').css('display','block');

			});

