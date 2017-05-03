// JavaScript Document
$(document).ready(function() {
		$('.modulo.colombia').find('label').trigger('click');
	
    $('.btn-menu a').bind('click', function() {
        $('.container .content').toggleClass('active');
        $('#overlay').toggleClass('activa');
        $('#header-mundial').toggleClass('active');
    });

    $('.container-menu li').bind('click', function() {
        $('.container .content').toggleClass('active');
        $('#overlay').toggleClass('activa');
        $('#header-mundial').toggleClass('active');
    });

    $('#overlay').bind('click', function() {
        $('.active').removeClass('active');
        $('.activa').removeClass('activa');
    });

    $('.btn_compartir').bind('click', function() {
        $('.redes-header').toggle();
        $('.compartir').toggleClass('activo');
    });

    $('.equipos').bind('click', function() {
        $('.drop_equipos').toggleClass('activo');
        $('.secciones .overlay').toggleClass('activa');
    });
    
    
    $('input[id*=ac-]').click(function(){
        $('div[id*=grupo-]').removeClass('abierto');
        id = $(this).attr('id');
        id = id.replace('ac-',"");
        $('#grupo-'+id).addClass('abierto');        
    });
});

$(function() {
    var toggles = $('.toggle a'),
            codes = $('.code');

    toggles.on("click", function(event) {
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


$('.btn-menu a').bind('click', function() {
    $('.container .content').toggleClass('active');
    $('.secciones .overlay').toggleClass('activa');
});

$('.secciones .overlay').bind('click', function() {
    $('.active').removeClass('active');
    $('.activa').removeClass('activa');
    $('.drop_equipos').removeClass('activo');
});


$('.colombia label').bind('click', function() {
    $('.colombia label').toggleClass('up');
});
$('.mundo label').bind('click', function() {
    $('.mundo label').toggleClass('up');
});
$('.opinion label').bind('click', function() {
    $('.opinion label').toggleClass('up');
});
$('.multimedia label').bind('click', function() {
    $('.multimedia label').toggleClass('up');
});
$('.redes label').bind('click', function() {
    $('.redes label').toggleClass('up');
});
$('.curiosidades label').bind('click', function() {
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
    document.getElementById("skipAd" + id_video).style.display = "block";
}
function CerrarVent() {
    document.getElementById("skipAd" + id_video).style.display = "none";
    id_video = "";
}

var videoPlayerPauta;
var player_actual, idDivActual, idVideoActual, htmlcontent;


function renderVideo(idVideo, idDiv, autoplay, sinpauta) {
//    htmlcontent=$('#'+idDiv).html();
//    if(adSetCode)
//            adSetCode = adSetCode.toString();
//    id_video = idVideo;
//    //jQuery('#'+id_div).html('<div id="contiene_video_nota_'+idVideo+'" class="contiene-video-nota-interna"></div>');
//    videoPlayerPauta = OO.Player.create(id_div, idVideo,{onCreate: function(player) {
//        OO.$("#skipAd"+idVideo).click(function(){ player.skipAd(),CerrarVent(); });
//                    mesb=player.mb;
//
//                    mesb.subscribe(OO.EVENTS.WILL_PLAY_ADS, 'ads', OO._.bind(playingInstreamAd,this)); 
//                    mesb.subscribe(OO.EVENTS.PLAYHEAD_TIME_CHANGED, 'time', OO._.bind(playheadTime,this)); 
//                    mesb.subscribe(OO.EVENTS.ADS_PLAYED, 'time', OO._.bind(playhead,this));
//    },'adSetCode':adSetCode,'autoplay':auto_play,'wmode':'transparent'}); 
//    idDivActual = idDiv;
//    idVideoActual = idVideo;
//    player_actual = videoPlayerPauta;

    htmlcontent = $('#' + idDiv).html();
    $('#' + idDiv).parent().prepend('<button id="cerrar_pauta_' + idVideo + '" style="display:none"></button>');
    videoPlayerPauta = OO.ready(function() {
        videoPlayer = OO.Player.create(idDiv, idVideo, {
            onCreate: function(Player) {
                var boton = $('#cerrar_pauta_' + idVideo);
                boton.bind("click", function() {
                    Player.skipAd()
                });
                mesb = Player.mb;
                if (sinpauta == 1) {
                    mesb.subscribe(OO.EVENTS.WILL_PLAY_ADS, "ads", function() {
                        boton.trigger('click');
                    }); //funcion que quita la pauta antes de empezar
                } else {
                    var x = 10;
                    boton.unbind("click");
                    mesb.subscribe(OO.EVENTS.WILL_PLAY_ADS, "ads", function() {
                        var milisegundos = 1000;
                        timer = setInterval(function() {
                            if (x > 0) {
                                boton.css('display', 'block').html('Podra cerrar este anuncio en ' + x + ' segundos');
                                x--;
                            } else {
                                boton.html('Cerrar Pauta').bind("click", function() {
                                    Player.skipAd();
                                    boton.remove();
                                });
                            }
                        }, milisegundos);
                    }); //funcion activa el boton de cerrar pauta
                    mesb.subscribe(OO.EVENTS.ADS_PLAYED, "time", function() {
                        boton.remove();

                    }); //funcion quita el boton de cerrarr pauta
                }
            },
            'autoplay': autoplay, wmode: 'transparent'});
        idDivActual = idDiv;
        idVideoActual = idVideo;
        player_actual = videoPlayer;
    })
}

function eliminaVideoCarousel(div, img, idVideo) {
    //console.log(player_actual + ' ' +idDivActual);
    if (player_actual)
    {
        player_actual.destroy(player_actual, idVideoActual);
        $('#cerrar_pauta_' + idVideoActual).remove();
    }

    if (idDivActual != undefined) {
        $('#' + idDivActual).html(htmlcontent);
        //document.getElementById(idDiv).innerHTML = "<figure><a onclick='renderVideo(\""+ idVideo +"\","+ idDiv +",\""+ autopl +"\",\""+ adset +"\")'href='javascript:void(0);'><img src='"+enlace_img+"'/></a></figure>";
    }
}

