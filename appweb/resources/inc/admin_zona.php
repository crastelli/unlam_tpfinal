<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Zonas", "menu-class" => "page-zona" ];

try {
    Fn::FnCheckAccess(1);
    $ObjZona = new Zona();
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

            <div class="row">
                <div class="col-xs-12 content">
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <span>
                            Listado de todas los zonas cargados en la aplicaci&oacute;n.
                        </span>
                    </div>
                </div>
            </div> 
            
            <!-- Listado principal -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">
                                <a href="admin_zona_editar.php" alt="Nuevo" title="Nuevo" class="btn btn-sm btn-primary">Nuevo</a>
                                Listado de <?php echo $ArrInfoPage["page-title"]; ?>
                            </div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        
                            <div class="alert alert-aviso">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<span></span>
							</div>
                            
                            <table class="table table-striped table-bordered" id="listado">
                                <thead>
                                    <tr>
                                        <th>Habilitaci&oacute;n</th>
                                        <th>Descripci&oacute;n</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ObjZona->FnGetAll() as $row): ?>
                                        <tr class="item" data-id="<?php echo $row->id; ?>">
                                            
                                            <td width="30px">
                                                <input type="checkbox" data-size="mini" data-label-text="Habilitado" class="cbx-admin-habilitar checkbox" data-acc="admin-zona-habilitar" <?php echo ($row->habilitado == 1)? 'checked':''; ?> >
                                            </td>
                                            
                                            <td><?php echo $row->descripcion; ?></td>
                                            <td>
                                                <a href="admin_zona_editar.php?id=<?php echo $row->id; ?>" class="btn btn-sm btn-primary btn-editar" title="Modificar">
                                                    <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i><span class="sr-only"> Modificar</span>
                                                </a>
                                                
                                                <a href="admin_zona_editar.php?id=<?php echo $row->id; ?>&view" title="Consultar" class="btn btn-sm btn-warning btn-editar">
                                                    <i class="glyphicon glyphicon-bell" aria-hidden="true"></i><span class="sr-only"> Consultar</span>
                                                </a>
                                                
                                                <button class="btn btn-sm btn-danger btn-admin-borrar" data-acc="admin-zona-borrar" title="Eliminar">
                                                    <i class="glyphicon glyphicon-trash" aria-hidden="true"></i><span class="sr-only"> Eliminar</span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>                             
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listado principal -->
            
        </div>
    </div>
</div>


<?php require ROOT_DIR._DIR_TMP_."admin_footer.php"; ?>