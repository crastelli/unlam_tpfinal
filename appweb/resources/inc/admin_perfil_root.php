<?php
$Admin = new Admin;
$data = $Admin->FnGetById(Fn::FnGetDatosAccess()->id);
?>

<div class="row">
    <div class="col-lg-12 content">
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <span>
                En esta sección se encuentra los datos de ingreso al panel para poder organizar y llevar a cabo la administración
                de la aplicación.
            </span>
        </div>
    </div>
</div>
<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">Modificar <?php echo $ArrInfoPage["page-title"]; ?></div>
                </div>
                            
                <div class="bootstrap-admin-panel-content">
                    
                    <div class="alert alert-aviso"><span></span></div>
                    
                    <form accept-charset="UTF-8" role="form" class="form-horizontal form-perfil-admin" data-toggle="validator">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Mis datos</legend>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Nombre</label>
                                <div class="col-sm-10">
                                  <input type="text" name="nombre" placeholder="Ingrese un nombre" class="form-control" value="<?php echo (isset($data->nombre))? $data->nombre : ''; ?>" data-match-error required>
                                  <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Teléfono</label>
                                <div class="col-sm-4">
                                  <input type="text" name="telefono" placeholder="Ingrese un teléfono" class="form-control" value="<?php echo (isset($data->telefono))? $data->telefono : ''; ?>">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Dirección</label>
                                <div class="col-sm-4">
                                  <input type="text" name="direccion" placeholder="Ingrese una dirección" class="form-control" value="<?php echo (isset($data->direccion))? $data->direccion : ''; ?>">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Email (usuario)</label>
                                <div class="col-sm-4">
                                  <input type="email" name="email" placeholder="Ingrese un email" class="form-control" value="<?php echo (isset($data->email))? $data->email : ''; ?>" data-match-error required>
                                  <div class="help-block with-errors"></div>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Password</label>
                                <div class="col-sm-4">
                                  <input type="password" name="pw" placeholder="************" class="form-control">
                                  <div class="help-block"><i class="glyphicon glyphicon-ok"></i> password cargada</div>
                                </div>
                            </div>
                            
                           <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <span class="label label-default">
                                        Las modificaciones tanto de email como de contraseña se verán reflejadas
                                        en el próximo inicio de sesión.
                                    </span>
                                </div>
                            </div>
                                                        
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="pull-right">
                                    <button type="submit" class="btn btn-primary guardar">Guardar</button>
                                  </div>
                                </div>
                            </div>

                        </fieldset>
                        
                        <!-- Hidden -->
                        <input type="hidden" name="id" value="<?php echo (isset($data->id))? $data->id : ''; ?>">
                        <!-- -->
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>