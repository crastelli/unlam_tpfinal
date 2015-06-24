<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Rubros", "menu-class" => "page-rubro" ];

try {
    Fn::FnCheckAccess(1);
    $ObjRubro = new Rubro();
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
                            Listado de todas los rubros cargados en la aplicaci&oacute;n.
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
                                <a href="admin_rubro_editar.php" alt="Nuevo" title="Nuevo" class="btn btn-sm btn-primary">Nuevo</a>
                                Listado de <?php echo $ArrInfoPage["page-title"]; ?>
                            </div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        
                            <div class="alert alert-aviso"><span></span></div>
                            
                            <table class="table table-striped table-bordered" id="listado">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>&Iacute;cono</th>
                                        <th>Descripci&oacute;n</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ObjRubro->FnGetAll() as $row): ?>
                                        <tr data-id="<?php echo $row->id; ?>">
                                            <td width="30px"><input type="checkbox" class="cbx-admin-rubro-habilitar" <?php echo ($row->habilitado == 1)? 'checked':''; ?> ></td>
                                            <td><img src="<?php echo BASE_URL._DIR_UPLOAD_; ?>icono_rubro/<?php echo $row->icono; ?>" width="25px"/></td>
                                            <td><?php echo $row->descripcion; ?></td>
                                            <td>
                                                <a href="admin_rubro_editar.php?id=<?php echo $row->id; ?>" class="btn btn-sm btn-primary btn-editar" alt="Modificar" title="Modificar">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                                
                                                <a href="admin_rubro_editar.php?id=<?php echo $row->id; ?>&view" alt="Consultar" title="Consultar" class="btn btn-sm btn-warning btn-editar">
                                                    <i class="glyphicon glyphicon-bell"></i>
                                                </a>
                                                
                                                <button class="btn btn-sm btn-danger btn-admin-rubro-borrar" alt="Eliminar" title="Eliminar" id="<?php echo $row->id; ?>">
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