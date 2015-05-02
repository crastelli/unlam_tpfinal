$(function()
{
	$(document).mousemove(function(e){
	 TweenLite.to($('body'), 
	    .5, 
	    { css: 
	        {
	            'background-position':parseInt(event.pageX/80) + "% "+parseInt(event.pageY/120)+"%, "+parseInt(event.pageX/150)+"% "+parseInt(event.pageY/150)+"%, "+parseInt(event.pageX/300)+"% "+parseInt(event.pageY/300)+"%"
	        }
	    });
	});


	$('.form-login').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();

			var $this = $(this),
				$msg  = $('div.alert'),
				varJSON = {
							email : $this.find('input[name="email"]').val(),
							pw    : $this.find('input[name="pw"]').val()
							};
			
			$.post("ajax_function.php", { acc: 'admin-login', dataJSON: JSON.stringify(varJSON) })
			.done(function(response)
			{	
				var JSON = $.parseJSON(response);
				console.log(JSON);
				if(JSON.codErr == 0)
				{
					location.reload(false);
				}else{
					$msg.removeClass();
					$msg.addClass('alert alert-'+JSON.class);
					$msg.find('span').text(JSON.msg);
					$this.find('input[name="pw"]').val('');
				}
			});
		}
	});


	$('.form-recuperarpw').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();

			var $this   = $(this),
				$msg    = $('div.alert'),
				varJSON = { email: $this.find('input[name="email"]').val() };
			
			$.post("ajax_function.php", { acc: 'admin-recuperarpw', dataJSON: JSON.stringify(varJSON) })
			.done(function(response)
			{	
				var JSON = $.parseJSON(response);
				$msg.removeClass();
				$msg.addClass('alert alert-'+JSON.class);
				$msg.find('span').text(JSON.msg);
				if(JSON.codErr == -1)
				{
					$this.find('input[name="email"]').val('');
				}
			});
		}
	}); 


	$('body').on('click', '.btn-recuperarpw', function(e)
	{

		$('.panel-login').hide();
		$('.form-login input.form-control').each(function(i, e) { $(this).val(''); });
	
		$('.panel-recuperarpw').show();

	});

	$('body').on('click', '.btn-login', function(e)
	{

		$('.panel-recuperarpw').hide();
		$('.form-recuperarpw input.form-control').each(function(i, e) { $(this).val(''); });

		$('.panel-login').show();

	});

});