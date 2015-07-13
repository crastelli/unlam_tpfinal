// ALERTAS CUSTOMIZADAS
alertify.info = alertify.extend("info");
alertify.warning = alertify.extend("warning");
alertify.set({ labels: {
    ok     : "Aceptar",
    cancel : "Cancelar"
} });
function alerta(type, msg)
{
    switch(type)
    {
        case 'info'    : alertify.info(msg); break;
        case 'warning' : alertify.warning(msg); break;
        case 'danger'  : alertify.danger(msg); break;
        case 'success' : alertify.success(msg); break;
    }
}
//



// <!-- MAPA -->
var markers = [],
    map,
    idzona,
    arr_rubro,
    zona_coordenadas,
    zona_lat,
    zona_lng,
    infowindow = null;

function fCargarMapa(json)
{
    if(json != null)
    {
        zona_coordenadas = json.zona.lat_long.split(',');
        zona_lat         = parseFloat(zona_coordenadas[0]);
        zona_lng         = parseFloat(zona_coordenadas[1]);
    }else{
        zona_lat = "-34.612727";
        zona_lng = "-58.445734";
    }

    n = 1,
    options = {
        zoom             : 15,
        center           : new google.maps.LatLng(zona_lat, zona_lng),
        disableDefaultUI : true
    };

    map = new google.maps.Map(document.getElementById('mapaFondo'), options);

    if(json != null && json.empresas.length > 0)
    {
        clearMarkers();
        // 
        infowindow = new google.maps.InfoWindow({
            content: "cargando..."
        });
        //
        for (var i = 0; i < json.empresas.length; i++)
        {
            addMarkerWithTimeout(json.empresas[i], i * 200);
        }
    }

}

function addMarkerWithTimeout(item, timeout)
{
    var marker,
        coordenadas,
        lat,
        lng;

    window.setTimeout(function()
    {
        coordenadas = item.lat_long.split(',');
        lat         = parseFloat(coordenadas[0]);
        lng         = parseFloat(coordenadas[1]);

        var getHtmlMarker = function(item)
        {
            var html = '';
            html += "<div class='contenido-html-marker'>";
            html += "<h2 class='nombre'>"+item.nombre+"</h2>";
            html += item.descripcion;
            html += "<a href='javascript:void(0);' class='modal-empresa-foto-video'>Más info.</a>"; //TODO: NO FUNCIONA LA APERTURA DEL MODAL DESDE ACA
            html += "</div>";
            return html;
        };

        marker = new google.maps.Marker({
            position  : new google.maps.LatLng(lat, lng),
            map       : map,
            html      : getHtmlMarker(item),
            animation : google.maps.Animation.DROP
        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(this.html);
            infowindow.open(map, this);
        });

    }, timeout);
}

function addInfoWindowMarker()
{
    for (var i = 0; i < markers.length; i++)
    {
        var marker = markers[i];
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(this.html);
            infowindow.open(map, this);
        });
    }
}

function clearMarkers()
{
    for (var i = 0; i < markers.length; i++)
        markers[i].setMap(null);
    markers = [];
}

// <!---


$(function()
{
    $('form#formBuscar select#rubro').multiselect({
        nonSelectedText : "Seleccioná un rubro",
        allSelectedText : "Todos los rubros",
        numberDisplayed: 7
    });

    // Popup's
    $('.modal-registrar-empresa').on('click', function() {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url     : "http://localhost/milugar/appweb/resources/inc/modals/modal_registrar_empresa.php",
            title   :'Registro de empresa',
            size    : 'lg',
            buttons : [
                        {text: 'Cancelar', style: 'danger', close: true, click: fCancelarRegistroEmpresa },
                        {text: 'Enviar', style: 'success', close: true, click: fGuardarRegistroEmpresa }
                    ]
        };        
        eModal.ajax(options);
    });

    $('.modal-contacto').on('click', function() {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url     : "http://localhost/milugar/appweb/resources/inc/modals/modal_contacto.php",
            title   :'Contacto',
            size    : 'lg',
            buttons : [
                        {text: 'Cancelar', style: 'danger', close: true, click: fCancelarContacto },
                        {text: 'Enviar', style: 'success', close: true, click: fGuardarContacto }
                    ]
        };        
        eModal.ajax(options);
    });

    $('.modal-terminos').on('click', function() {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url     : "http://localhost/milugar/appweb/resources/inc/modals/modal_terminos.php",
            title   :'Terminos y condiciones',
            size    : 'lg',
            buttons : [
                        {text   : 'Cerrar', style: 'info', close: true}
                    ]
        };        
        eModal.ajax(options);
    });

    $('.modal-empresa-foto-video').on('click', function() {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url     : "http://localhost/milugar/appweb/resources/inc/modals/modal_empresa_foto_video.php",
            title   :'Información de la empresa',
            size    : 'lg',
            buttons : [
                        {text   : 'Cerrar', style: 'info', close: true}
                    ]
        };        
        eModal.ajax(options);
    });
	
	
    if($('#contenido.formResultado').length > 0)
    {
        var form_resultado = $('#contenido.formResultado'),
            is_post = form_resultado.find("input[name='is_post']").val();

        if(is_post) form_resultado.addClass('contenidoColapsado');/*Queremos que se vean los resultados de la búsqueda con el JavaScript desactivado*/
    	$('#contenedorBtnContraerResultBusqueda button').click(function(){
    		if (form_resultado.hasClass('contenidoColapsado')) {
    			form_resultado.removeClass('contenidoColapsado').addClass('contenidoExpandido');
    		} else {
    			form_resultado.removeClass('contenidoExpandido').addClass('contenidoColapsado');
    		}
    	});
    }

    $('body').on('click', '.buscar', function()
    {
        var contenido = $('.contenido-filtro'),
            idzona        = contenido.find('select[name="idzona"]').val(),
            arr_rubro     = contenido.find('select[name="arr_rubro"]').val();

            $.redirect('resultado.php', {
              'idzona'    : idzona,
              'arr_rubro' : arr_rubro
            });
    });
    

}); // End jQuery

// Funciones/acciones de los modals
function fCancelarRegistroEmpresa()
{
    console.log("fCancelarRegistroEmpresa");
}
function fGuardarRegistroEmpresa()
{
    console.log("fGuardarRegistroEmpresa");
}

function fCancelarContacto()
{
    console.log("fCancelarContacto");
}

function fGuardarContacto()
{
    console.log("fGuardarContacto");
}
// <!--
