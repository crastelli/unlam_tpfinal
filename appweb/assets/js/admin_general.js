$(function()
{
	$('body').on('click', '.navbar .btn-logout', function(e)
	{
		bootbox.confirm("¿Desea salir del Panel de Administración?", function(result) {
			if(result)
			{
				$.post("function.php", { acc: 'admin-logout' })
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

});