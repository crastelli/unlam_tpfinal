<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Galería de Videos", "menu-class" => "page-empresa-video" ];

try {
    Fn::FnCheckAccess(1);
    $ObjEmpresa = new Empresa();
    $data       = new StdClass();
    $es_root    = ( isset($_SESSION["usuario"]) && $_SESSION["usuario"]["root"] == 1 )? True : False;

    if( isset($_SESSION["usuario"]) )
    {
        if( $es_root )
        {
            $idempresa = (isset($_GET["id"]))? $_GET["id"] : null;
        }else{
            $idempresa = ($_SESSION["usuario"]["id"] > 0)? $_SESSION["usuario"]["id"] : null;
        }
        $data = $ObjEmpresa->FnGetVideos($idempresa);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
?>

<?php require ROOT_DIR._DIR_TMP_."admin_header.php"; ?>
<?php require ROOT_DIR._DIR_TMP_."admin_menu.php"; ?>

<div class="container">
    <!-- left, vertical navbar & content -->
    <div class="row">
        <!-- content -->
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-header">
                        <h1><?php echo $ArrInfoPage["page-title"]; ?></h1>
                    </div>
                </div>
            </div>
            
            <!-- Listado principal -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">Modificar <?php echo $ArrInfoPage["page-title"]; ?></div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        
                            <div class="alert alert-aviso">
								<span></span>
							</div>
                            
                            <form accept-charset="UTF-8" role="form" class="form-horizontal form-editar" data-acc="admin-empresa-video-editar" data-retorno="<?php echo ($es_root)? 'admin_empresa_video.php?id='.$idempresa : 'admin_empresa_video.php'; ?>" data-toggle="validator">
                                <fieldset>

                                    <div class="col-xs-12">                           
                                        <div class="form-group">
                                            <label for="titulo" class="col-xs-4 col-sm-2 control-label">T&iacute;tulo <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <input type="text" placeholder="Ingrese un t&iacute;tulo" maxlength="32" class="form-control" name="titulo" id="titulo" data-match-error required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xs-12">                           
                                        <div class="form-group">
                                            <label for="link" class="col-xs-4 col-sm-2 control-label">Link <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <input type="text" placeholder="Ingrese el link del video de YouTube" class="form-control" name="link" id="link" data-match-error required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> 
                                    </div>  
                                                                   
                                    <div class="col-xs-12">                           
                                        <div class="form-group">
                                            <label for="descripcion" class="col-xs-4 col-sm-2 control-label">Descripci&oacute;n <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <textarea placeholder="Ingrese una descripci&oacute;n" class="form-control" name="descripcion" id="descripcion" data-match-error required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    
                                    <div class="col-xs-12 galeria" id="listado"> 
                                        <div class="form-group">
                                            <?php if(!empty($data)): ?>
                                                <?php foreach($data as $row): ?>

                                                    <article class="col-xs-12 col-sm-6 col-md-3 contenido-video item" data-id="<?php echo $row->id; ?>">
                                                        <div class="panel panel-default">
															<div class="panel-heading">
																<p class="panel-title text-center">
																	<a class="btn btn-xs btn-warning btn-admin-borrar" data-acc="admin-empresa-video-borrar" id="<?php echo $row->id; ?>">Eliminar</a>
																	<input type="checkbox" data-size="mini" data-label-text="Habilitado" class="cbx-admin-habilitar checkbox" data-acc="admin-empresa-video-habilitar" <?php echo ($row->habilitado == 1)? 'checked':''; ?> >
																</p>
                                                            </div>
                                                            <div class="panel-body">
                                                                <a href="https://www.youtube.com/watch?v=<?php echo $row->codigo; ?>" title="<?php echo $row->titulo; ?>" class="zoom" data-title="<?php echo $row->titulo; ?>" data-footer="<?php echo $row->descripcion; ?>" data-type="youtube" data-toggle="lightbox">
                                                                    <img style="height:200px;/*FIX*/" src="//i1.ytimg.com/vi/<?php echo $row->codigo; ?>/mqdefault.jpg" alt="<?php echo $row->titulo; ?>" />
                                                                    <span class="overlay"><i class="glyphicon glyphicon-fullscreen" aria-hiddeh="true"></i></span>
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
                                                <i class="glyphicon glyphicon-facetime-video" aria-hiddeh="true"></i> no hay ningun video cargado
                                            <?php endif; ?>    
                                        </div> 
                                    </div>                                   
                                    
                                    
                                    <div class="col-xs-12">                                                                                                   
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                              <div class="pull-right">
                                                <?php if($es_root): ?>
                                                    <a href="admin_empresa.php" class="btn btn-default volver">Volver</a>
                                                <?php endif; ?>
                                                <button type="submit" class="btn btn-primary guardar">Guardar</button>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </fieldset>
                                
                                <!-- Hidden -->
                                <input type="hidden" name="idempresa" value="<?php echo (isset($idempresa))? $idempresa : 0; ?>">
                                <!-- -->
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listado principal -->
            
        </div>
    </div>
</div>


<?php require ROOT_DIR._DIR_TMP_."admin_footer.php"; ?>

<link href="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/bootstrap/css/ekko.css" rel="stylesheet">
<script src="<?php echo BASE_URL._DIR_ASSETS_; ?>lib/ekko_lightbox.js"></script>
