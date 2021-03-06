<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Zonas", "menu-class" => "page-zona" ];

try {
    Fn::FnCheckAccess(1);
    $ObjZona = new Zona();
    $data    = new StdClass();
    if(isset($_GET["id"])) $data = $ObjZona->FnGetById($_GET["id"]);
    if(isset($_GET["view"])) $edit = 'disabled';
    else $edit = '';
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
                        <h1><?php echo $ArrInfoPage["page-title"]; ?> edici&oacute;n</h1>
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
                            
                            <form accept-charset="UTF-8" role="form" class="form-horizontal form-editar" data-acc="admin-zona-editar" data-retorno="admin_zona.php" data-toggle="validator">
                                <fieldset>
                                
                                    <div class="col-xs-12 col-sm-6">        
                                        <div class="form-group">
                                            <label for="descripcion" class="col-xs-4 control-label">Descripci&oacute;n <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8">
                                                <input type="text" placeholder="Ingrese una descripcion" <?php echo $edit; ?> class="form-control" name="descripcion" id="direccion" value="<?php echo (isset($data->descripcion))? $data->descripcion : ''; ?>" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">        
                                        <div class="form-group">    
                                            <label for="lat_long" class="col-xs-4 control-label">Latitud / Longitud</label>
                                            <div class="col-xs-8">
                                                <input type="text" placeholder="-" class="form-control" readonly name="lat_long" id="lat_long" value="<?php echo (isset($data->lat_long) && $data->lat_long != '')? $data->lat_long : ''; ?>" required>
                                                <div class="help-block with-errors"></div>
                                             </div>
                                        </div>
                                    </div>   
                                    
                                    <div class="col-xs-12">     
                                        <div class="form-group">
                                            <div class="col-xs-12">  
                                                <input id="pac-input" class="controls" type="text" <?php echo $edit; ?> placeholder="Ingrese dirección..." />
                                                <div id="mapa"></div>
                                            </div>
                                        </div>  
                                    </div>
                                    
                                    <div class="col-xs-12">                                                                                                   
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                              <div class="pull-right">
                                                <a href="admin_zona.php" class="btn btn-default volver">Volver</a>
                                                <button type="submit" <?php echo $edit; ?> class="btn btn-primary guardar">Guardar</button>
                                              </div>
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                                
                                <!-- Hidden -->
                                <input type="hidden" name="id" value="<?php echo (isset($data->id))? $data->id : 0; ?>">
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

<script type="text/javascript"> window.onload = function() { fCargarMapa($('input[name="lat_long"]').val()); } </script>