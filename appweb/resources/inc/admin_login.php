<?php
require "../../config/ini.php";
try {
    Fn::FnCheckAccess(0);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

$ArrInfoPage = [ "page-title" => "Login", "menu-class" => "" ];
?>  

<?php require ROOT_DIR._DIR_TML_."admin_header.php"; ?>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4">
    	
    		<div class="alert alert-info">
                <a class="close" data-dismiss="alert" href="#">×</a>
                <span>Ingrese los datos por favor.</span>
            </div>
            
    		<div class="panel panel-default panel-login">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Ingresar al sistema</h3>
			 	</div>
			 	
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" class="form-login" data-toggle="validator">
	                    <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" placeholder="E-mail" name="email" type="email" data-match-error required>
				    		    <div class="help-block with-errors"></div>
				    		</div>	
				    		
				    		<div class="form-group">
				    			<input class="form-control" placeholder="Password" name="pw" maxlength="30" type="password" data-match-error required>
				    			<span class="help-block with-errors"></span>
				    		</div>

				    		<input class="btn btn-lg btn-success btn-block btn-login-submit" type="submit" value="Ingresar">
				    		<input class="btn btn-sm btn-primary btn-block btn-recuperarpw" type="button" value="Olvidé mi contraseña">			    		
				    		
				    	</fieldset>			    	
			      	</form>
			    </div>
			 </div>   
			  
			<div class="panel panel-default panel-recuperarpw" style="display:none">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Recuperar contraseña</h3>
			 	</div>
			    <div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" class="form-recuperarpw" data-toggle="validator">
	                    <fieldset>
				    	  	<div class="form-group">
				    		    <input class="form-control" placeholder="E-mail" name="email" type="email" data-match-error required>
				    			<div class="help-block with-errors"></div>
				    		</div>
				    		
				    		<input class="btn btn-lg btn-success btn-block btn-recuperarpw-submit" type="submit" value="Enviar">
				    		<input class="btn btn-sm btn-primary btn-block btn-login" type="button" value="Volver">			    		
				    		
				    	</fieldset>			    	
			      	</form>
			    </div>

			    
			</div>
			
		</div>
	</div>
</div>

<?php require ROOT_DIR._DIR_TML_."admin_footer.php"; ?>

<!-- Custom styles for this template -->
<link href="<?php echo BASE_URL._DIR_ASSETS_; ?>css/admin_login.css" rel="stylesheet">
<!-- Animacion js login -->
<script src="<?php echo BASE_URL._DIR_ASSETS_; ?>js/admin_login.js"></script>