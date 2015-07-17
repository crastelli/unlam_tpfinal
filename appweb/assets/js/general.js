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
            content: "Cargando..."
        });
        //
        for (var i = 0; i < json.empresas.length; i++)
        {
            addMarkerWithTimeout(json.empresas[i], i * 200);
        }

        closeInfoWindow = function() {
            infowindow.close();
        };
        google.maps.event.addListener(map, 'click', closeInfoWindow);
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

        var image = BASE_URL+_DIR_UPLOAD_+'icono_rubro/'+item.icono;
        marker = new google.maps.Marker({
            position  : new google.maps.LatLng(lat, lng),
            map       : map,
            id        : item.id,
            icon      : image,
            animation : google.maps.Animation.DROP
        });

        markers.push(marker);

        getInfoWindowMarker(marker);

    }, timeout);    
}

function getInfoWindowMarker(marker)
{
    google.maps.event.addListener(marker, 'click', function () 
    {
        getInfoWindow(marker);
    });
}

function getInfoWindow(marker)
{
    infowindow.setContent(getInfoEmpresa(marker.id));
    infowindow.open(map, marker);
}

function getInfoEmpresa(id)
{
    var html = 'Error al cargar la información.';
    $.ajax({
        async   : false,
        dataType: "JSON",
        type    : "POST",
        url     : "ajax_function.php",
        data    : { id: id, acc: 'info_empresa' },
        success : function(item)
                {
                    // -->
                    html = '<div class="panel panel-default">'
                                +'<div class="panel-heading">'
                                    + '<b>'+item.nombre.toUpperCase()+'</b>';
                            if(item.es_premium == 1)
                            {
                                html    += '<button type="button" class="btn btn-warning btn-xs" style="float:right;margin-left: 5px;" onclick="javascript: openModalFotoVideo('+item.id+');">'
                                            +'<span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Más información'
                                        + '</button>';
                            }
                    html +=     '</div>'
                                +'<div class="panel-body">'
                                    + '<table>'
                                        +'<tr>'
                                            +'<td valign="button" style="padding:0 14px 0 0">'
                                                +'<img src="'+BASE_URL+_DIR_UPLOAD_+'logo_empresa/'+item.logo+'" width="100px"/>'
                                            +'</td>'
                                            +'<td>';
                                                html += '<i class="text-primary glyphicon glyphicon-info-sign"></i>&nbsp;<label>Descripción:&nbsp;</label>';
                                                html += (item.descripcion != '')? item.descripcion : ' <em>-Sin Información-</em>';
                                                html += '<br /><i class="text-primary glyphicon glyphicon-briefcase"></i>&nbsp;<label>Razon Social:&nbsp;</label>';
                                                html += (item.razon_social != '')? item.razon_social : ' <em>-Sin Información-</em>';
                                                html += '<br /><i class="text-primary glyphicon glyphicon-map-marker"></i>&nbsp;<label>Dirección:&nbsp;</label>';
                                                html += (item.direccion != '')? item.direccion : ' <em>-Sin Información-</em>';
                                                html += '<br /><i class="text-primary glyphicon glyphicon-earphone"></i>&nbsp;<label>Teléfono:&nbsp;</label>';
                                                html += (item.telefono != '')? item.telefono : ' <em>-Sin Información-</em>';
                                                                        
                                                html    +=  '<button type="button" class="btn btn-info btn-xl" style="float:right;margin-left: 5px;" onclick="javascript: openModalFb('+item.id+');">'
                                                             +'<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Comentarios'
                                                        +  '</button>';

                                            html += '</td>'
                                        +'</tr>'
                                    + '</table>'
                                +'</div>'
                            +'</div>';
                    // <!--
                }
    });
    
    return html;
}

function clearMarkers()
{
    for (var i = 0; i < markers.length; i++)
        markers[i].setMap(null);
    markers = [];
}


function openModalFotoVideo(id)
{
    var options = {
            url     : BASE_URL+_DIR_INC_+"modals/modal_empresa_foto_video.php?id="+id,
            title   :'Información del Comercio',
            size    : 'lg',
            buttons : [
                        {text   : 'Cerrar', style: 'info', close: true}
                    ]
        };        
        eModal.ajax(options);
}

function openModalFb(id)
{
    var options = {
            url     : BASE_URL+_DIR_INC_+"modals/modal_empresa_fb.php?id="+id,
            title   :'Comentarios del Comercio',
            size    : 'lg',
            buttons : [
                        {text   : 'Cerrar', style: 'info', close: true}
                    ]
        };        
        eModal.ajax(options);
}

// <!---

$(function()
{
    $('form#formBuscar select#rubro').multiselect({
        nonSelectedText : "Seleccioná un rubro",
        allSelectedText : "Todos los rubros",
        numberDisplayed : 7
    });

    // Popup's
    $('.modal-registrar-empresa').on('click', function() {
        var options = {
            url     : BASE_URL+_DIR_INC_+"modals/modal_registrar_empresa.php",
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
            url     : BASE_URL+_DIR_INC_+"modals/modal_contacto.php",
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
            url     : BASE_URL+_DIR_INC_+"modals/modal_terminos.php",
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
            url     : BASE_URL+_DIR_INC_+"modals/modal_empresa_foto_video.php",
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
