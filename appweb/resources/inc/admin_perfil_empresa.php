<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title">Modificar <?php echo $ArrInfoPage["page-title"]; ?></div>
                </div>
                
                <div class="bootstrap-admin-panel-content">
                    <form accept-charset="UTF-8" role="form" class="form-horizontal" data-toggle="validator">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Mis datos</legend>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Nombre</label>
                                <div class="col-sm-4">
                                  <input type="text" placeholder="Ingrese un nombre" class="form-control" data-match-error required>
                                  <div class="help-block with-errors"></div>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Razón social</label>
                                <div class="col-sm-4">
                                  <input type="text" placeholder="Ingrese una razón social" class="form-control" data-match-error required>
                                  <div class="help-block with-errors"></div>
                                </div>                                
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Logo</label>
                                <div class="col-sm-5">
                                  <input type="file" class="form-control">
                                </div>
                                <div class="col-sm-5">
                                  <i class="glyphicon glyphicon-picture"></i> no hay ningún logo cargado
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Breve descripción</label>
                                <div class="col-sm-10">
                                  <textarea placeholder="Ingrese una breve descripción" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Teléfono</label>
                                <div class="col-sm-4">
                                  <input type="text" placeholder="Ingrese un teléfono" class="form-control">
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Dirección</label>
                                <div class="col-sm-4">
                                  <input type="text" placeholder="Ingrese una dirección" class="form-control">
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Email (usuario)</label>
                                <div class="col-sm-4">
                                  <input type="email" placeholder="Ingrese un email" class="form-control" data-match-error required>
                                  <div class="help-block with-errors"></div>
                                </div>

                                <label class="col-sm-2 control-label" for="textinput">Password</label>
                                <div class="col-sm-2">
                                  <input type="password" placeholder="************" class="form-control">
                                </div>
                                
                                <div class="col-sm-2">
                                    <i class="glyphicon glyphicon-ok"></i> password cargada
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-sm-2 control-label" for="textinput">Habilitar</label>
                                <div class="col-sm-2">
                                    <select class="form-control" id="habilitado">
                                        <option value="0">No</option>
                                        <option value="1">Si</option>
                                    </select>
                                </div>
                            </div>  
                                
                                
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                  <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                  </div>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>