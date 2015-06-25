
                                <div class="col-xs-12"> <legend>Datos referente</legend> </div>
                                
                                <div class="col-xs-12 col-sm-6">                           
                                    <div class="form-group">
                                        <label for="nombre_referente" class="col-xs-4 control-label">Nombre referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre_referente" id="nombre_referente" value="" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="dni_referente" class="col-xs-4 control-label">DNI referente <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="dni_referente" id="dni_referente" value="" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>                                
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> <legend>Datos comercio</legend> </div>
                                
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="nombre" class="col-xs-4 control-label">Nombre <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un nombre" class="form-control" name="nombre" id="nombre" value="" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="razon_social" class="col-xs-4 control-label">Razón social <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una razón social" class="form-control" name="razon_social" id="razon_social" value="" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>                                
                                </div>
                                
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="logo" class="col-xs-4 control-label">Logo</label>
                                        <div class="col-xs-8">
                                            <input type="file" name="logo" id="logo" class="form-control">
                                            <i class="glyphicon glyphicon-warning-sign"></i> Solo archivos *.jpg/png. Máx. 1mg
                                            <div class="container-img" data-path="http://localhost/milugar/appweb\upload\logo_empresa/">
                                                <br />
                                                                                                    <i class="glyphicon glyphicon-picture"></i> no hay ningún logo cargado
                                                                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">   
                                        <label for="telefono" class="col-xs-4 control-label">Teléfono</label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese un teléfono" class="form-control" name="telefono" id="telefono" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label for="descripcion" class="col-xs-4 col-sm-2 control-label">Breve descripción</label>
                                        <div class="col-xs-8 col-sm-10">
                                            <textarea rows="2" placeholder="Ingrese una breve descripción" class="form-control" name="descripcion" id="descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                        
                               <div class="col-xs-12"> 
                                    <div class="form-group">
                                        <label for="email" class="col-xs-4 col-sm-2 control-label">Email (usuario) <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8 col-sm-10">
                                            <input type="email" placeholder="Ingrese un email" class="form-control" name="email" id="email" value="" data-match-error required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="pw" class="col-xs-4 control-label">Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" placeholder="************" class="form-control" name="pw" id="pw" data-minlength="8" value="" required>
                                            <div class="help-block">M&iacute;nimo 8 caracteres</div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-xs-12 col-sm-6"> 
                                    <div class="form-group">
                                        <label for="pw2" class="col-xs-4 control-label">Confirmar Password <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="password" class="form-control" data-match="#pw" name="pw2" id="pw2" data-match-error="Los password no coinciden" placeholder="Confirmar password" value="" data-match-error required>
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
                                                                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">
                                        <label for="idrubro" class="col-xs-4 control-label">Rubro <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <select name="idrubro" id="idrubro" class="form-control">
                                                                                           </select>
                                        </div>                               
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">
                                        <label for="direccion" class="col-xs-4 control-label">Dirección <abbr title="Campo requerido">*</abbr></label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="Ingrese una dirección" class="form-control" name="direccion" id="direccion" value="" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">        
                                    <div class="form-group">    
                                        <label for="lat_long" class="col-xs-4 control-label">Latitud / Longitud</label>
                                        <div class="col-xs-8">
                                            <input type="text" placeholder="-" class="form-control" readonly name="lat_long" id="lat_long" value="">
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