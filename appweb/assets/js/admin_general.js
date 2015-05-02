$(function()
{
	$('body').on('click', '.navbar .btn-logout', function(e)
	{
		bootbox.confirm("¿Desea salir del Panel de Administración?", function(result)
		{
			if(result)
			{
				$.post("ajax_function.php", { acc: 'admin-logout' })
				.done(function(response)
				{	
					var JSON = $.parseJSON(response);
					if(JSON.codErr == -1)
					{
						location.reload(false);
					}
				});
			}
		}); 
	});	


	$('body').on('click', '.form-perfil-usuario .guardar', function(e)
	{
		e.preventDefault();

		bootbox.confirm("¿Desea modificar los datos de su Perfíl?", function(result)
		{
			if(result)
			{

				var $form = $('.form-perfil-usuario');

				var varJSON = {	
							id        : $form.find('input[name="id"]').val(),
							nombre    : $form.find('input[name="nombre"]').val(),
							telefono  : $form.find('input[name="telefono"]').val(),
							direccion : $form.find('input[name="direccion"]').val(),
							email     : $form.find('input[name="email"]').val(),
							pw        : $form.find('input[name="pw"]').val()
				}

				$.post("ajax_function.php", { acc: 'admin-perfil-usuario', dataJSON: JSON.stringify(varJSON) })
				.done(function(response)
				{	
					var $msg = $('div.alert-aviso'),
						JSON = $.parseJSON(response);
					$msg.removeClass();
					$msg.addClass('alert alert-aviso alert-'+JSON.class);
					$msg.find('span').text(JSON.msg);
					$msg.show();
					$form.find('input[name="pw"]').val('');
				});
				
			}
		}); 	
	});

});