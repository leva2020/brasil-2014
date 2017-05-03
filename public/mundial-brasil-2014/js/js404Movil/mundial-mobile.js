// JavaScript Document
$(document).ready(function(){
    $('.btn-menu a').bind('click', function(){
	$('.container .content').toggleClass('active');
        $('.secciones .overlay').toggleClass('activa');
    });

    $('.secciones .overlay').bind('click', function(){
        $('.active').removeClass('active');
        $('.activa').removeClass('activa');
    });
});

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


//var id_video = "";
var videoPlayerPauta = "";

function playheadTime() {
    time = videoPlayerPauta.getPlayheadTime();
    if (time > 5 && timeAds == 1) {
        abrirVent();
        timeAds = 0;
    }
}

function playingInstreamAd() {
    if (videoPlayerPauta.playingInstreamAd = !0) {
        timeAds = 1;
    }
}

function playhead() {
    CerrarVent();
}

function abrirVent() {
    document.getElementById("skipAd"+id_video).style.display = "block";
}
function CerrarVent() {
    document.getElementById("skipAd"+id_video).style.display = "none";
    id_video = "";
}

var videoPlayerPauta;
var player_actual, idDivActual,idVideoActual, htmlcontent;


function renderVideo(idVideo, idDiv, autoplay, adSetCode){
    htmlcontent=$('#'+idDiv).html();
    if(adSetCode)
            adSetCode = adSetCode.toString();
    id_video = idVideo;
    //jQuery('#'+id_div).html('<div id="contiene_video_nota_'+idVideo+'" class="contiene-video-nota-interna"></div>');
    videoPlayerPauta = OO.Player.create(idDiv, idVideo,{onCreate: function(player) {
           OO.$("#skipAd"+idVideo).click(function(){ player.skipAd(),CerrarVent(); });
                       mesb=player.mb;

                       mesb.subscribe(OO.EVENTS.WILL_PLAY_ADS, 'ads', OO._.bind(playingInstreamAd,this)); 
                       mesb.subscribe(OO.EVENTS.PLAYHEAD_TIME_CHANGED, 'time', OO._.bind(playheadTime,this)); 
                       mesb.subscribe(OO.EVENTS.ADS_PLAYED, 'time', OO._.bind(playhead,this));
            },'adSetCode':adSetCode,'autoplay':autoplay,'wmode':'transparent'}); 
        idDivActual = idDiv;
        idVideoActual = idVideo;
        player_actual = videoPlayerPauta;
}

function eliminaVideoCarousel(div, img, idVideo){
    //console.log(player_actual + ' ' +idDivActual);
    if (player_actual)
    {
        player_actual.destroy(player_actual,idVideoActual);
        $('#cerrar_pauta_'+idVideoActual).remove();
    }
    
    if(idDivActual!=undefined){
        $('#'+idDivActual).html(htmlcontent);
        //document.getElementById(idDiv).innerHTML = "<figure><a onclick='renderVideo(\""+ idVideo +"\","+ idDiv +",\""+ autopl +"\",\""+ adset +"\")'href='javascript:void(0);'><img src='"+enlace_img+"'/></a></figure>";
    }
}
 
