<?php
$Admin = new Admin;
$data = $Admin->FnGetById(Fn::FnGetDatosAccess()->id);
?>

<div class="row">
    <div class="col-xs-12 content">
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
        <div class="col-xs-12">
            <div class="panel panel-default">
            
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">Modificar <?php echo $ArrInfoPage["page-title"]; ?></div>
                </div>
                            
                <div class="bootstrap-admin-panel-content">
                    
                    <div class="alert alert-aviso"><span></span></div>
                    
                    <form accept-charset="UTF-8" role="form" class="form-horizontal form-perfil-admin" data-toggle="validator">
                        <fieldset>
                            <div class="row">
                                
                                <div class="col-xs-12"> <legend>Mis datos</legend> </div>
                                
                                <div class="col-xs-12">                           
                                    <div class="form-group">
                                        <label class="col-xs-4 col-sm-2 control-label" for="textinput">Nombre <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8 col-sm-10">
                                            <input type="text" name="nombre" placeholder="Ingrese un nombre" class="form-control" value="<?php echo (isset($data->nombre))? $data->nombre : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6">                           
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="textinput">Teléfono</label>
                                        <div class="col-xs-8">
                                            <input type="text" name="telefono" placeholder="Ingrese un teléfono" class="form-control" value="<?php echo (isset($data->telefono))? $data->telefono : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">                           
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label" for="textinput">Dirección <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" name="direccion" placeholder="Ingrese una dirección" class="form-control" value="<?php echo (isset($data->direccion))? $data->direccion : ''; ?>" ata-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

<<<<<<< HEAD
                                <div class="col-xs-12">                           
=======
                                <div class="col-xs-12 col-sm-6">                           
>>>>>>> 4dd64b5ef593700c855844d308bf41d5e3f9c064
                                    <div class="form-group">
                                        <label class="col-xs-2 control-label" for="textinput">Email (usuario) <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-10">
                                            <input type="email" name="email" placeholder="Ingrese un email" class="form-control" value="<?php echo (isset($data->email))? $data->email : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
<<<<<<< HEAD
                                
                                <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Password <abbr title="Campo requerido">*</abbr></label>
=======
                                <div class="col-xs-12 col-sm-6">                           
                                    <div class="form-group">                                                    
                                        <label class="col-xs-4 control-label" for="textinput">Password <abbr title="Campo requerido">*</abbr></label>
>>>>>>> 4dd64b5ef593700c855844d308bf41d5e3f9c064
                                        <div class="col-xs-8">
                                            <input type="password" placeholder="************" class="form-control" name="pw" id="pw" data-minlength="8" value="<?php echo (isset($data->pw))? '********' : ''; ?>" required>
                                            <div class="help-block">M&iacute;nimo 8 caracteres</div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Confirmar Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" class="form-control" data-match="#pw" name="pw2" data-match-error="Los password no coinciden" placeholder="Confirmar password" value="<?php echo (isset($data->pw))? '********' : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                
                               <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                            <span class="label label-default">
                                                Las modificaciones tanto de email como de contraseña se verán reflejadas
                                                en el próximo inicio de sesión.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="col-xs-12">                          
                                    <div class="form-group">
                                        <div class="col-xs-offset-2 col-xs-10">
                                          <div class="pull-right">
                                            <button type="submit" class="btn btn-primary guardar">Guardar</button>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- row -->
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