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

$('.btn-menu a').bind('click', function(){
	$('.container .content').toggleClass('active');
  $('.secciones .overlay').toggleClass('activa');
});

$('.secciones .overlay').bind('click', function(){
	$('.active').removeClass('active');
  $('.activa').removeClass('activa');
});

$('.colombia label').bind('click', function(){
  $('.colombia label').toggleClass('up');
});
$('.mundo label').bind('click', function(){
  $('.mundo label').toggleClass('up');
});
$('.opinion label').bind('click', function(){
  $('.opinion label').toggleClass('up');
});
$('.multimedia label').bind('click', function(){
  $('.multimedia label').toggleClass('up');
});
$('.redes label').bind('click', function(){
  $('.redes label').toggleClass('up');
});
$('.curiosidades label').bind('click', function(){
  $('.curiosidades label').toggleClass('up');
});









