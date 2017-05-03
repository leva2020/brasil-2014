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

