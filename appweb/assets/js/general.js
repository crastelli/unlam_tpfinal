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

var idzona, arr_rubro;

function fCargarMapa(json)
{
    if(json != null)
    {
        console.log("HACER POST");
    }else{
        console.log("ES NULO");
    }

	n = 1,
	options = {
        zoom: 11,
        center: new google.maps.LatLng(-34.612727, -58.445734),
        disableDefaultUI: true
    };
    var map = new google.maps.Map(document.getElementById('mapaFondo'), options);
}

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
