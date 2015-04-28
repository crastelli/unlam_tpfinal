$(function()
{
	$('body').on('click', '.navbar .btn-logout', function(e)
	{
		$.post("function.php", { acc: 'admin-logout' })
		.done(function(response)
		{	
			var JSON = $.parseJSON(response);
			console.log(JSON);
			if(JSON.codErr == -1)
			{
				location.reload(false);
			}
		});

	});	

});