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


$('.btn_compartir').bind('click', function(){
	$('.redes-header').toggle();
	$('.compartir').toggleClass('activo');
});


$('.equipos').bind('click', function(){
	$('.drop_equipos').toggleClass('activo');
	  $('.secciones .overlay').toggleClass('activa');
});



$('.btn-menu a').bind('click', function(){
	$('.container .content').toggleClass('active');
  $('.secciones .overlay').toggleClass('activa');
});

$('.secciones .overlay').bind('click', function(){
	$('.active').removeClass('active');
  $('.activa').removeClass('activa');
  $('.drop_equipos').removeClass('activo');
});

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




