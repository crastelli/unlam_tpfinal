<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Rubros", "menu-class" => "page-rubro" ];

try {
    Fn::FnCheckAccess(1);
    $ObjRubro = new Rubro();
    $data     = new StdClass();
    if(isset($_GET["id"])) $data = $ObjRubro->FnGetById($_GET["id"]);
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
                            
                            <form accept-charset="UTF-8" role="form" class="form-horizontal form-editar" data-acc="admin-rubro-editar" data-retorno="admin_rubro.php" data-toggle="validator">
                                <fieldset>
                                
                                    <div class="col-xs-12">                           
                                        <div class="form-group">
                                            <label for="descripcion" class="col-xs-4 col-sm-2 control-label">Descripci&oacute;n <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <input type="text" placeholder="Ingrese una descripci&oacute;n" <?php echo $edit; ?> class="form-control" name="descripcion" id="descripcion" value="<?php echo (isset($data->descripcion))? $data->descripcion : ''; ?>" data-match-error required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div class="col-xs-12"> 
                                        <div class="form-group">
                                            <label for="icono" class="col-xs-4 col-sm-2 control-label">&Iacute;cono <abbr title="Campo requerido">*</abbr></label>
                                            <div class="col-xs-8 col-sm-10">
                                                <input type="file" name="icono" id="icono" class="form-control" <?php echo $edit; ?> onchange="javascript: document.getElementById('icono_txt').value = this.files[0].name;">
                                                <input type="text" id="icono_txt" class="simular_hidden" value="<?php echo (isset($data->icono))? $data->icono : ''; ?>" data-match-error required>
                                                <i class="glyphicon glyphicon-warning-sign"></i> Solo archivos *.jpg/png. Máx. 1mg
                                                <div class="help-block with-errors"></div>
                                                <div class="container-img" data-path="<?php echo BASE_URL._DIR_UPLOAD_; ?>icono_rubro/">
                                                    <br />
                                                    <?php if(isset($data->icono)): ?>
                                                        <img src="<?php echo BASE_URL._DIR_UPLOAD_; ?>icono_rubro/<?php echo $data->icono; ?>" width="25px"/>
                                                    <?php else: ?>
                                                        <i class="glyphicon glyphicon-picture"></i> no hay ningún icono cargado
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                    
                                    
                                    <div class="col-xs-12">                                                                                                   
                                        <div class="form-group">
                                            <div class="col-xs-offset-2 col-xs-10">
                                              <div class="pull-right">
                                                <a href="admin_rubro.php" class="btn btn-default volver">Volver</a>
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