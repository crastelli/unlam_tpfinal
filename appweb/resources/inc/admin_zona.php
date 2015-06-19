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
                            Listado de todas las zonas cargadas en la aplicaci&oacute;n.
                        </span>
                    </div>
                </div>
            </div> 
            
            <!-- Listado principal -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">Listado de <?php echo $ArrInfoPage["page-title"]; ?></div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                            <table class="table table-striped table-bordered" id="listado-rubros">
                                <thead>
                                    <tr>
                                        <th>Descripci&oacute;n</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ObjZona->FnGetZonas() as $row): ?>
                                        <tr>
                                            <td><?php echo $row->descripcion; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary btn-editar" alt="Modificar" title="Modificar" id="<?php echo $row->id; ?>">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </button>
                                                
                                                <button class="btn btn-sm btn-warning btn-consultar" alt="Consultar" title="Consultar" id="<?php echo $row->id; ?>">
                                                    <i class="glyphicon glyphicon-bell"></i>
                                                </button>
                                                
                                                <button class="btn btn-sm btn-danger btn-borrar" alt="Eliminar" title="Eliminar" id="<?php echo $row->id; ?>">
                                                    <i class="glyphicon glyphicon-trash"></i>
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