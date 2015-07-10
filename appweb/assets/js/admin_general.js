$(function()
{
	$('.checkbox').bootstrapSwitch();

	// GALERIA -->
	$(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });   
	// <!--

	// CERRAR SESSION -->
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
	// <!--

	// PERFIL ADMINISTRADOR -->
	$('.form-perfil-admin').find('input[name="pw"]').on('click', function(e)
	{
		if( $(this).val() == '********' )
		{
			$(this).val('');
			$(this).parents().find('input[name="pw2"]').val('')
		}
	});
	$('.form-perfil-admin').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();
			var $msg = $('div.alert-aviso');
			$msg.hide();

			bootbox.confirm("¿Desea modificar los datos de su Perfíl?", function(result)
			{
				if(result)
				{
					var $form    = $('.form-perfil-admin'),
						formData = new FormData( $form[0] );

					formData.append("acc", "admin-perfil-admin");

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
										$form.find('input[name="pw"]').val('********');
										$form.find('input[name="pw2"]').val('********');
					            	},
					    complete	: function(){
											$('html, body').animate({
										        scrollTop: $('.panel').offset().top
										    }, 1000);
					    				}
		        	});
					
				}
			}); 
		}else{
			$('html, body').animate({
		        scrollTop: $('.form-perfil-admin').offset().top
		    }, 1000);
		}	
	});
	// <!--

	// PERFIL EMPRESA -->
	$('.form-perfil-empresa').find('input[name="pw"]').on('click', function(e)
	{
		if( $(this).val() == '********' )
		{
			$(this).val('');
			$(this).parents().find('input[name="pw2"]').val('')
		}
	});
	$('.form-perfil-empresa').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
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
										$form.find('input[name="pw"]').val('********');
										$form.find('input[name="pw2"]').val('********');
										$form.find('input[name="logo"]').val('');

										// Cuando actualizo una imagen la actualizo en la vista
										var path_upload = $form.find('div.container-img').data("path");

										if(JSON.data_extra["logo"] != '')
										{
											if( $form.find('div.container-img img').length > 0)
											{
												$form.find('div.container-img img').attr("src", path_upload+JSON.data_extra["logo"]);
											}else{
												// En el caso de que sea la primera carga de la imagen creo la misma cuando la suba
												var img = $('<img>');
												img.attr('src', path_upload+JSON.data_extra["logo"]);
												img.attr('width', '100px');
												$form.find('div.container-img').html(img);
											}
										}
					            	},
					    complete	: function(){
											$('html, body').animate({
										        scrollTop: $('.panel').offset().top
										    }, 1000);
					    				}
		        	});
				}
			}); 
		}else{
			$('html, body').animate({
		        scrollTop: $('.form-perfil-empresa').offset().top
		    }, 1000);
		}	
	});
	// <!--




	// ABM -->
	$('.form-editar').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();
			var $msg = $('div.alert-aviso');
			$msg.hide();

				var $form      = $('.form-editar'),
				formData       = new FormData( $form[0] ),
				formAcc        = $form.data('acc'),
				pagina_retorno = $form.data('retorno');

			formData.append("acc", formAcc );

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
								// TODO: ERROR CUANDO VIENE 3 QUE ES EL PESO DE LA IMAGEN SUPERIOR A 1MG
								if(JSON.status["codErr"] == -1)
								{
									location.href = pagina_retorno;
								}else{
									$msg.removeClass();
									$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
									$msg.find('span').text(JSON.status["msg"]);
									$msg.show();
								}
			            	}
        	});
 
		}else{
			$('html, body').animate({
		        scrollTop: $('.form-editar').offset().top
		    }, 1000);
		}	
	});
	$('.btn-admin-borrar').on('click', function()
	{
			var id  = $(this).parents('.item').data('id'),
			$msg    = $('div.alert-aviso'),
			formAcc = $(this).data('acc');
			$msg.hide();

			bootbox.confirm("¿Desea borrar este registro?", function(result)
			{
				if(result)
				{
					$.post('ajax_function.php', { id: id, acc: formAcc })
					.done(function( response )
					{
						var JSON = $.parseJSON(response);
						if(JSON.status["codErr"] == -1)
						{
							$('#listado').find('.item[data-id="'+id+'"]').remove();
						}
						$msg.removeClass();
						$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
						$msg.find('span').text(JSON.status["msg"]);
						$msg.show();
					})
				}
			});
	});
	$('.cbx-admin-habilitar').on('switchChange.bootstrapSwitch', function(event, state)
	{
			var id  = $(this).parents('.item').data('id'),
			$msg    = $('div.alert-aviso'),
			formAcc = $(this).data('acc');
			$msg.hide();

			var fCambiarCheck = function(op, id, event)
			{
				var msg = '';
				if(op == 1) msg = "¿Desea habilitarlo?";
				else msg = "¿Desea deshabilitarlo?";

				bootbox.confirm(msg, function(result)
				{
					if(result)
					{
						$.post('ajax_function.php', { id: id, habilitado: op, acc: formAcc })
						.done(function( response )
						{
							var JSON = $.parseJSON(response);
							if(JSON.status["codErr"] == 1)
							{
								if (event.is(':checked') == true)
								{
									event.bootstrapSwitch('state', false,true);
									event.prop('checked', false);
								}else{
									event.bootstrapSwitch('state', true,true);
									event.prop('checked', true);
								}
							}
							$msg.removeClass();
							$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
							$msg.find('span').text(JSON.status["msg"]);
							$msg.show();

						})
					}else{
						if (event.is(':checked') == true)
						{
							event.bootstrapSwitch('state', false,true);
							event.prop('checked', false);
						}else{
							event.bootstrapSwitch('state', true,true);
							event.prop('checked', true);
						}
					}
				});
			};

			if( $(this).is(':checked') == true )
			{
				fCambiarCheck(1, id, $(this));
			}else{
				fCambiarCheck(0, id, $(this));
			}

	});
	// <!-- Exclusivo para Empresas -->
	$('.cbx-admin-premium').on('switchChange.bootstrapSwitch', function(event, state)
	{
			var id  = $(this).parents('.item').data('id'),
			$msg    = $('div.alert-aviso'),
			formAcc = $(this).data('acc');
			$msg.hide();

			var fCambiarCheck = function(op, id, event)
			{
				var msg = '';
				if(op == 1) msg = "¿Desea activar la cuenta Premium?";
				else msg = "¿Desea desactivar la cuenta Premium?";

				bootbox.confirm(msg, function(result)
				{
					if(result)
					{
						$.post('ajax_function.php', { id: id, es_premium: op, acc: formAcc })
						.done(function( response )
						{
							var JSON = $.parseJSON(response);
							if(JSON.status["codErr"] == 1)
							{
								if (event.is(':checked') == true)
								{
									event.bootstrapSwitch('state', false,true);
									event.prop('checked', false);
								}else{
									event.bootstrapSwitch('state', true,true);
									event.prop('checked', true);
								}
							}
							$msg.removeClass();
							$msg.addClass('alert alert-aviso alert-'+JSON.status["class"]);
							$msg.find('span').text(JSON.status["msg"]);
							$msg.show();

						})
					}else{

						if (event.is(':checked') == true)
						{
							event.bootstrapSwitch('state', false,true);
							event.prop('checked', false);
						}else{
							event.bootstrapSwitch('state', true,true);
							event.prop('checked', true);
						}
							
					}
				});
			};
	
			if( $(this).is(':checked') == true )
			{
				fCambiarCheck(1, id, $(this));
			}else{
				fCambiarCheck(0, id, $(this));
			}
	});
	// <!--

}); // <!-- End jQuery