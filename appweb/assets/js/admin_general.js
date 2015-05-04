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
					if(JSON.status["codErr"] == -1)
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
		var $msg = $('div.alert-aviso');
		$msg.hide();

		bootbox.confirm("¿Desea modificar los datos de su Perfíl?", function(result)
		{
			if(result)
			{
				var $form    = $('.form-perfil-usuario'),
					formData = new FormData( $form[0] );

				formData.append("acc", "admin-perfil-usuario");

				$.ajax({
					url         : 'ajax_function.php',  
					type        : 'POST',
					data        : formData,
					cache       : false,
					contentType : false,
					processData : false,
					success     : function(response)
								{
									var JSON = $.parseJSON(response);
									$msg.removeClass();
									$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
									$msg.find('span').text(JSON.status["msg"]);
									$msg.show();
									$form.find('input[name="pw"]').val('');
				            	}
	        	});
				
			}
		}); 	
	});

	$('body').on('click', '.form-perfil-empresa .guardar', function(e)
	{
		e.preventDefault();
		var $msg = $('div.alert-aviso');
		$msg.hide();

		bootbox.confirm("¿Desea modificar los datos de su Perfíl?", function(result)
		{
			if(result)
			{

				var $form    = $('.form-perfil-empresa'),
					formData = new FormData( $form[0] );

				formData.append("acc", "admin-perfil-empresa");

				$.ajax({
					url         : 'ajax_function.php',  
					type        : 'POST',
					data        : formData,
					cache       : false,
					contentType : false,
					processData : false,
					success     : function(response)
								{									
									var JSON = $.parseJSON(response);
									$msg.removeClass();
									$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
									$msg.find('span').text(JSON.status["msg"]);
									$msg.show();
									$form.find('input[name="pw"]').val('');
									// Cuando actualizo una imagen la actualizo en la vista
									var path_upload = $form.find('div.container-img').data("path");
									if( $form.find('div.container-img > img').length > 0)
									{
										$form.find('div.container-img > img').attr("src", path_upload+JSON.data_extra["logo"]);
									}else{
										// En el caso de que sea la primera carga de la imagen creo la misma cuando la suba
										var img = $('<img>');
										img.attr('src', path_upload+JSON.data_extra["logo"]);
										img.attr('width', '100px');
										$form.find('div.container-img').html(img);
									}
				            	}
	        	});
			}
		}); 	
	});

}); // End jQuery