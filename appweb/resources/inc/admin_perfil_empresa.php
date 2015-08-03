<?php
$Empresa               = new Empresa;
$Rubro                 = new Rubro;
$Zona                  = new Zona;
$data                  = $Empresa->FnGetById(Fn::FnGetDatosAccess()->id);
$calificacion_positiva = $Empresa->FnTotCalificacionPositiva(Fn::FnGetDatosAccess()->id);
$calificacion_negativa = $Empresa->FnTotCalificacionNegativa(Fn::FnGetDatosAccess()->id);
?>

<div class="row">
    <div class="col-xs-12 content">
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert" href="#">×</a>
            <span>
                En esta sección se encuentra la información de mi comercio donde dichos cambios se verám reflejados
                en la aplicación en la cual los usuarios podrán apreciar, comentar, ranquear
                y conocer.
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
                
                    <div class="alert alert-aviso">
						<a class="close" data-dismiss="alert" href="#">×</a>
						<span></span>
					</div>
                
                    <form accept-charset="UTF-8" role="form" class="form-horizontal form-perfil-empresa" data-toggle="validator">
                        <fieldset>
                            <div class="row">

                                <div class="col-xs-12 text-right"> <legend>Mi ranking</legend> </div>
                                
                                <div class="col-xs-12 col-sm-12 text-right">                           
                                    <div class="a">
                                        <span class="text-success glyphicon glyphicon-thumbs-up ps btn-lg"><b><?php echo (isset($calificacion_positiva))? $calificacion_positiva : 0; ?></b></span>
                                        <span class="text-danger glyphicon glyphicon-thumbs-down ng btn-lg"><b><?php echo (isset($calificacion_negativa))? $calificacion_negativa : 0; ?></b></span>
                                    </div> 
                                </div>
                                
                                <div class="col-xs-12"> <legend>Datos referente</legend> </div>
                                
                                <div class="col-xs-12 col-sm-6">                           
                                    <div class="form-group">
                                        <label for="nombre_referente" class="col-xs-4 control-label">Nombre referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre_referente" id="nombre_referente" value="<?php echo (isset($data->nombre_referente))? $data->nombre_referente : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="dni_referente" class="col-xs-4 control-label">DNI referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="dni_referente" id="dni_referente" value="<?php echo (isset($data->dni_referente))? $data->dni_referente : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>                                
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> <legend>Datos comercio</legend> </div>
                                
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="nombre" class="col-xs-4 control-label">Nombre <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre" id="nombre" value="<?php echo (isset($data->nombre))? $data->nombre : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="razon_social" class="col-xs-4 control-label">Razón social <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="razon_social" id="razon_social" value="<?php echo (isset($data->razon_social))? $data->razon_social : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                
                                </div>
                                
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="logo" class="col-xs-4 control-label">Logo</label>
                                        <div class="col-xs-8">
                                            <input type="file" name="logo" id="logo" class="form-control">
                                            <i class="glyphicon glyphicon-warning-sign" aria-hidden="true"></i> Solo archivos *.jpg/png. Máx. 1mg
                                            <div class="container-img" data-path="<?php echo BASE_URL._DIR_UPLOAD_; ?>logo_empresa/">
                                                <br />
                                                <?php if(isset($data->logo)): ?>
                                                    <img src="<?php echo BASE_URL._DIR_UPLOAD_; ?>logo_empresa/<?php echo $data->logo; ?>" width="100px"/>
                                                <?php else: ?>
                                                    <i class="glyphicon glyphicon-picture" aria-hidden="true"></i> no hay ningún logo cargado
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">   
                                        <label for="telefono" class="col-xs-4 control-label">Teléfono</label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un teléfono" class="form-control" name="telefono" id="telefono" value="<?php echo (isset($data->telefono))? $data->telefono : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label for="descripcion" class="col-xs-4 col-sm-2 control-label">Breve descripción</label>
                                        <div class="col-xs-8 col-sm-10">
                                            <textarea rows="2" placeholder="Ingrese una breve descripción" class="form-control" name="descripcion" id="descripcion"><?php echo (isset($data->descripcion))? $data->descripcion : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label for="web" class="col-xs-4 col-sm-2 control-label">Web (link)</label>
                                        <div class="col-xs-8 col-sm-10">
                                            <input type="url" placeholder="Ingrese la Url de su página Web" class="form-control" name="web" id="web" value="<?php echo (isset($data->web))? $data->web : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                        
                               <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label for="email" class="col-xs-4 col-sm-2 control-label">Email (usuario) <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8 col-sm-10">
                                            <input type="email" placeholder="Ingrese un email" class="form-control" name="email" id="email" value="<?php echo (isset($data->email))? $data->email : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" placeholder="************" class="form-control" name="pw" id="pw" data-minlength="8" value="<?php echo (isset($data->pw))? '********' : ''; ?>" required>
                                            <div class="help-block">M&iacute;nimo 8 caracteres</div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Confirmar Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" class="form-control" data-match="#pw" name="pw2" id="pw2" data-match-error="Los password no coinciden" placeholder="Confirmar password" value="<?php echo (isset($data->pw))? '********' : ''; ?>" data-match-error required>
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
                                
                                <div class="col-xs-12"> <legend>Ubicación y especificación de búsqueda</legend> </div>
                                       
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">
                                        <label for="idzona" class="col-xs-4 control-label">Zona <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <select name="idzona" id="idzona" class="form-control">
                                                <?php foreach($Zona->FnGetAllActivos() as $row): ?>
                                                    <option value="<?php echo $row->id; ?>" <?php echo (isset($data->idzona) && $data->idzona == $row->id)? 'selected' : ''; ?> ><?php echo $row->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">
                                        <label for="idrubro" class="col-xs-4 control-label">Rubro <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <select name="idrubro" id="idrubro" class="form-control">
                                               <?php foreach($Rubro->FnGetAllActivos() as $row): ?>
                                                    <option value="<?php echo $row->id; ?>" <?php echo (isset($data->idrubro) && $data->idrubro == $row->id)? 'selected' : ''; ?> ><?php echo $row->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                               
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">
                                        <label for="direccion" class="col-xs-4 control-label">Dirección <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una dirección" class="form-control" name="direccion" id="direccion" value="<?php echo (isset($data->direccion))? $data->direccion : ''; ?>" required>
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
                                            <input id="pac-input" class="controls" type="text" placeholder="Ingrese dirección..." />
                                            <div id="mapa"></div>
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
<script type="text/javascript"> window.onload = function() { fCargarMapa($('input[name="lat_long"]').val()); } </script>