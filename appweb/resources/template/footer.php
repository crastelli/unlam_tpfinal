        <nav id="nav">
            <h2 class="sr-only">Navegación</h2>
            <ul class="list-unstyled list-inline">
                <li><a href="javascript:void(0);" class="modal-registrar-empresa">Registro</a></li>
                <li><a href="javascript:void(0);" class="modal-contacto">Contacto</a></li>
                <li><a href="javascript:void(0);" class="modal-terminos">Términos y condiciones</a></li>
            </ul>
        </nav>
        
    </div> <!-- Fin #contenedor -->
    
	<div id="mapaFondo"></div>
    <div id="fb-root"></div>

    <!-- Config FB -->
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        window.fbAsyncInit = function()
        {
            FB.init({
                appId   : '1027003033991093',
                version : 'v2.4',
                xfbml   : true,
                status  : true,
                cookie  : true,
                oauth   : true
            });
        }        
    </script>

	<!-- jQuery  -->
	<script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/jquery.min.js"></script>
    
    <!-- Bootstrap core JS -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Select multiselect-->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootstrap-multiselect.js"></script>
   
    <!-- eModal -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/eModal.min.js"></script>
    
    <!-- Alertify -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootstrap/js/alertify.min.js"></script>

    <!-- Google Maps -->
    <script src="//maps.google.com/maps/api/js?sensor=false&amp;language=es&libraries=places"></script>

    <!-- Redirect -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/jquery.redirect.js"></script>
    
    <!-- JS General -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>js/general.js"></script>

    <!-- Extras -->
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootbox.min.js"></script>
    <script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/validator.js"></script>
 
    <!-- Variables globales URL JS -->   
    <script>
        var ROOT_DIR = "<?php echo ROOT_DIR; ?>",
        BASE_URL     = "<?php echo BASE_URL; ?>",
        _DIR_ASSETS_ = "<?php echo _DIR_ASSETS_; ?>",
        _DIR_INC_    = "<?php echo _DIR_INC_; ?>",
        _DIR_CLASS_  = "<?php echo _DIR_CLASS_; ?>",
        _DIR_TMP_    = "<?php echo _DIR_TMP_; ?>",
        _DIR_PLG_    = "<?php echo _DIR_PLG_; ?>",
        _DIR_UPLOAD_ = "<?php echo _DIR_UPLOAD_; ?>";
    </script>
    <!-- -->
   </body>
</html>