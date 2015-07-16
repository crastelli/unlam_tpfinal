<?php
require "../../../config/ini.php";

try {
    $ObjEmpresa = new Empresa();
    if( isset($_GET["id"]) && $_GET["id"] > 0 )
    {
        $listFoto  = $ObjEmpresa->FnGetImagenes($_GET["id"]);
        $listVideo = $ObjEmpresa->FnGetVideos($_GET["id"]);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
?>

<div>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#foto" aria-controls="foto" role="tab" data-toggle="tab">Imágenes</a></li>
		<li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab">Videos</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	
		<div role="tabpanel" class="tab-pane active" id="foto">
			<!-- -->
			<div class="col-xs-12 galeria" class="listado"> 
                <div class="form-group">
                    <?php if(!empty($listFoto)): ?>
                        <?php foreach($listFoto as $row): ?>

                            <article class="col-xs-12 col-sm-6 col-md-3 contenido-imagen item" data-id="<?php echo $row->id; ?>">
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="<?php echo BASE_URL._DIR_UPLOAD_; ?>galeria_imagen_empresa/<?php echo $row->imagen; ?>" title="<?php echo $row->titulo; ?>" class="zoom" data-title="<?php echo $row->titulo; ?>" data-footer="<?php echo $row->descripcion; ?>" data-type="image" data-toggle="lightbox">
                                            <img style="height:200px;/*FIX*/" src="<?php echo BASE_URL._DIR_UPLOAD_; ?>galeria_imagen_empresa/<?php echo $row->imagen; ?>" alt="<?php echo $row->titulo; ?>" />
                                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                                        </a>
                                    </div>
                                    <div class="panel-footer">
                                        <h5>
                                            <?php echo $row->titulo; ?>
                                        </h5>
                                    </div>
                                </div>
                                
                            </article>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <i class="glyphicon glyphicon-picture"></i> no hay ninguna imagen cargada
                    <?php endif; ?>    
                </div> 
            </div>  
            <!-- -->
		</div>
		
        
		<div role="tabpanel" class="tab-pane" id="video">
            <!-- -->          
            <div class="col-xs-12 galeria" class="listado"> 
                <div class="form-group">
                    <?php if(!empty($listVideo)): ?>
                        <?php foreach($listVideo as $row): ?>

                            <article class="col-xs-12 col-sm-6 col-md-3 contenido-video item" data-id="<?php echo $row->id; ?>">
                                
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <a href="https://www.youtube.com/watch?v=<?php echo $row->codigo; ?>" title="<?php echo $row->titulo; ?>" class="zoom" data-title="<?php echo $row->titulo; ?>" data-footer="<?php echo $row->descripcion; ?>" data-type="youtube" data-toggle="lightbox">
                                            <img style="height:200px;/*FIX*/" src="//i1.ytimg.com/vi/<?php echo $row->codigo; ?>/mqdefault.jpg" alt="<?php echo $row->titulo; ?>" />
                                            <span class="overlay"><i class="glyphicon glyphicon-fullscreen"></i></span>
                                        </a>
                                    </div>
                                    <div class="panel-footer">
                                        <h5>
                                            <?php echo $row->titulo; ?>
                                        </h5>
                                    </div>
                                </div>
                            </article>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <i class="glyphicon glyphicon-facetime-video"></i> no hay ningun video cargado
                    <?php endif; ?>    
                </div> 
            </div> 
			<!-- -->          
		</div>      
		
	</div>

</div>


<link href="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootstrap/css/ekko.css" rel="stylesheet">
<script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/ekko_lightbox.js"></script>
<script type="text/javascript">
    // GALERIA -->
    $(document).undelegate('*[data-toggle="lightbox"]', 'click');
    $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });   
    // <!--
</script>