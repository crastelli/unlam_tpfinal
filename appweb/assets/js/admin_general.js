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
										$form.find('input[name="pw"]').val('');
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
										$form.find('input[name="pw"]').val('');
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

}); // End jQuery