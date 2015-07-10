<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Galería de Imágenes", "menu-class" => "page-empresa-imagen" ];

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
        $data = $ObjEmpresa->FnGetImagenes($idempresa);
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
                        
                            <div class="alert alert-aviso"><span></span></div>
                            
                            <form accept-charset="UTF-8" role="form" class="form-horizontal form-editar" data-acc="admin-empresa-imagen-editar" data-retorno="<?php echo ($es_root)? 'admin_empresa_imagen.php?id='.$idempresa : 'admin_empresa_imagen.php'; ?>" data-toggle="validator">
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
                                            <label for="descripcion" class="col-xs-4 col-sm-2 control-label">Descripci&oacute;n <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <textarea placeholder="Ingrese una descripci&oacute;n" class="form-control" name="descripcion" id="descripcion" data-match-error required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xs-12"> 
                                        <div class="form-group">
                                            <label for="imagen" class="col-xs-4 col-sm-2 control-label">Imagen <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <input type="file" name="imagen" id="imagen" class="form-control" onchange="javascript: document.getElementById('imagen_txt').value = this.files[0].name;">
                                                <input type="text" id="imagen_txt" class="simular_hidden" value="<?php echo (isset($data->imagen))? $data->imagen : ''; ?>" data-match-error required>
                                                <i class="glyphicon glyphicon-warning-sign"></i> Solo archivos *.jpg/png. Máx. 1mg
                                                <div class="help-block with-errors"></div>                                             
                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-xs-12 galeria" id="listado"> 
                                        <div class="form-group">
                                            <?php if(!empty($data)): ?>
                                                <?php foreach($data as $row): ?>

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
                                                                    <span class="pull-right">
                                                                        <i class="glyphicon glyphicon-remove text-danger btn-admin-borrar" data-acc="admin-empresa-imagen-borrar"></i>
                                                                        <input type="checkbox" class="cbx-admin-habilitar" data-acc="admin-empresa-imagen-habilitar" <?php echo ($row->habilitado == 1)? 'checked':''; ?> >
                                                                    </span>
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
