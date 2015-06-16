<?php
$Empresa = new Empresa;
$Rubro   = new Rubro;
$Zona   = new Zona;
$data = $Empresa->FnGetById(Fn::FnGetDatosAccess()->id);
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
                
                    <div class="alert alert-aviso"><span></span></div>
                
                    <form accept-charset="UTF-8" role="form" class="form-horizontal form-perfil-empresa" data-toggle="validator">
                        <fieldset>
                            <div class="row">

                                <div class="col-xs-12"> <legend>Datos referente</legend> </div>
                                
                                <div class="col-xs-6">                           
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Nombre referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre_referente" value="<?php echo (isset($data->nombre_referente))? $data->nombre_referente : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">DNI referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="dni_referente" value="<?php echo (isset($data->dni_referente))? $data->dni_referente : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>                                
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> <legend>Datos comercio</legend> </div>
                                
                                <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Nombre <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre" value="<?php echo (isset($data->nombre))? $data->nombre : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Razón social <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-sm-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="razon_social" value="<?php echo (isset($data->razon_social))? $data->razon_social : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                
                                </div>
                                
                                <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Logo</label>
                                        <div class="col-xs-8">
                                            <input type="file" name="logo" id="logo" class="form-control">
                                            <i class="glyphicon glyphicon-warning-sign"></i> Solo archivos *.jpg/png. Máx. 1mg
                                            <div class="container-img text-center" data-path="<?php echo BASE_URL._DIR_UPLOAD_; ?>logo_empresa/">
                                                <br />
                                                <?php if(isset($data->logo)): ?>
                                                    <img src="<?php echo BASE_URL._DIR_UPLOAD_; ?>logo_empresa/<?php echo $data->logo; ?>" width="100px"/>
                                                <?php else: ?>
                                                    <i class="glyphicon glyphicon-picture"></i> no hay ningún logo cargado
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-6"> 
                                    <div class="form-group">   
                                        <label class="col-xs-4 control-label">Teléfono</label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un teléfono" class="form-control" name="telefono" value="<?php echo (isset($data->telefono))? $data->telefono : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label class="col-xs-2 control-label">Breve descripción</label>
                                        <div class="col-xs-10">
                                            <textarea rows="2" placeholder="Ingrese una breve descripción" class="form-control" name="descripcion"><?php echo (isset($data->descripcion))? $data->descripcion : ''; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                        
                               <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Email (usuario) <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="email" placeholder="Ingrese un email" class="form-control" name="email" value="<?php echo (isset($data->email))? $data->email : ''; ?>" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6"> 
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" placeholder="************" class="form-control" name="pw">
                                            <i class="glyphicon glyphicon-ok"></i> password cargada
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <div class="col-xs-offset-3 col-xs-9">
                                            <span class="label label-default">
                                                Las modificaciones tanto de email como de contraseña se verán reflejadas
                                                en el próximo inicio de sesión.
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> <legend>Ubicación y especificación de búsqueda</legend> </div>
                                       
                                <div class="col-xs-6">        
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Zona <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <select name="idzona" class="form-control">
                                                <?php foreach($Zona->getZonas() as $row): ?>
                                                    <option value="<?php echo $row->id; ?>" <?php echo (isset($data->idzona) && $data->idzona == $row->id)? 'selected' : ''; ?> ><?php echo $row->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">        
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Rubro <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <select name="idrubro" class="form-control">
                                               <?php foreach($Rubro->getRubros() as $row): ?>
                                                    <option value="<?php echo $row->id; ?>" <?php echo (isset($data->idrubro) && $data->idrubro == $row->id)? 'selected' : ''; ?> ><?php echo $row->descripcion; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>                               
                                    </div>
                                </div>
                                
                                <div class="col-xs-6">        
                                    <div class="form-group">
                                        <label class="col-xs-4 control-label">Dirección <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una dirección" class="form-control" name="direccion" value="<?php echo (isset($data->direccion))? $data->direccion : ''; ?>" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">        
                                    <div class="form-group">    
                                        <label class="col-xs-4 control-label">Latitud / Longitud</label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="-" class="form-control" readonly name="lat_long" value="<?php echo (isset($data->lat_long) && $data->lat_long != '')? $data->lat_long : ''; ?>">
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


<style type="text/css">

  #mapa {
    height: 400px;
    margin: 0px;
    padding: 0px
  }
  .controls {
    margin-top: 16px;
    border: 1px solid transparent;
    border-radius: 2px 0 0 2px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    height: 32px;
    outline: none;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  }

  #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 400px;
  }

  #pac-input:focus {
    border-color: #4d90fe;
  }

  .pac-container {
    font-family: Roboto;
  }

  #type-selector {
    color: #fff;
    background-color: #4d90fe;
    padding: 5px 11px 0px 11px;
  }

  #type-selector label {
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
  }
  #target {
    width: 345px;
  }

</style>