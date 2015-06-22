function fCargarMapa()
{
    var popup;
    var n = 1;
    var options = {
        zoom: 11,
        center: new google.maps.LatLng(-34.612727, -58.445734),
        disableDefaultUI: true
    };
 
    var map = new google.maps.Map(document.getElementById('mapa'), options);
}

$(function()
{
    fCargarMapa();
    $('#rubro').multiselect({
        nonSelectedText : "Seleccioná un rubro",
        allSelectedText : "Todos los rubros",
        numberDisplayed: 4
    });

    // Popup's
    $('.modal-registrar-empresa').on('click', function()
    {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url: "http://localhost/milugar/appweb/resources/inc/modals/modal_registrar_empresa.php",
            title:'Registro de empresa',
            size: 'lg',
            buttons: [
                {text: 'Cancelar', style: 'danger', close: true, click: fCancelarRegistroEmpresa },
                {text: 'Enviar', style: 'success', close: true, click: fGuardarRegistroEmpresa }
            ]
        };        
        eModal.ajax(options);
    });

    $('.modal-contacto').on('click', function()
    {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url: "http://localhost/milugar/appweb/resources/inc/modals/modal_contacto.php",
            title:'Contacto',
            size: 'lg',
            buttons: [
                {text: 'Cancelar', style: 'danger', close: true, click: fCancelarContacto },
                {text: 'Enviar', style: 'success', close: true, click: fGuardarContacto }
            ]
        };        
        eModal.ajax(options);
    });

    $('.modal-terminos').on('click', function()
    {
        var options = {
            // TODO: PONER URL DINAMICA PARA JS
            url: "http://localhost/milugar/appweb/resources/inc/modals/modal_terminos.php",
            title:'Terminos y condiciones',
            size: 'lg',
            buttons: [
                {text: 'Cerrar', style: 'info', close: true}
            ]
        };        
        eModal.ajax(options);
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