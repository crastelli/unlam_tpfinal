$(function()
{
	$('.form-login').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();

			var $msg  = $('div.alert'),
				$form = $(this),
				formData = new FormData( $form[0] );

			formData.append("acc", "admin-login");

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
								console.log(JSON);
								if(JSON.status["codErr"] == 0)
								{
									location.reload(false);
								}else{
									$msg.removeClass();
									$msg.addClass('alert alert-'+JSON.status["class"]);
									$msg.find('span').text(JSON.status["msg"]);
									$form.find('input[name="pw"]').val('');
								}
			            	}
        	});
		}
	});


	$('.form-recuperarpw').validator().on('submit', function (e)
	{
		if (!e.isDefaultPrevented())
		{
			e.preventDefault();

			var $msg  = $('div.alert'),
				$form = $(this),
				formData = new FormData( $form[0] );

			formData.append("acc", "admin-recuperarpw");


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
								$msg.addClass('alert alert-'+JSON.status["class"]);
								$msg.find('span').text(JSON.status["msg"]);
								if(JSON.status["codErr"] == -1)
								{
									$form.find('input[name="email"]').val('');
								}
								$form.find('input').prop('disabled', false);
			            	},
			    beforeSend : function(){
			    				$form.find('input').prop('disabled', true);
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