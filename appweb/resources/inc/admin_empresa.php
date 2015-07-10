<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Empresas", "menu-class" => "page-empresa" ];

try {
    Fn::FnCheckAccess(1);
    $ObjEmpresa = new Empresa();
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
                            Listado de todos los comercios registrados. Ac&aacute; podr&aacute;s dar de baja y/o registrar nuevos locales para que 
                            que los comerciantes puedan dar a conocer su comercio d&aacute;ndole la posibilidad de colocar informaci&oacute;n del 
                            mismo mediante caracter&iacute;sticas y/o fotos del lugar.
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
                                <a href="admin_empresa_editar.php" alt="Nuevo" title="Nuevo" class="btn btn-sm btn-primary">Nuevo</a>
                                Listado de <?php echo $ArrInfoPage["page-title"]; ?>
                            </div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                        
                            <div class="alert alert-aviso"><span></span></div>
                            
                            <table class="table table-striped table-bordered" id="listado">
                                <thead>
                                    <tr>
                                        <th>Cta. Premium</th>
                                        <th>Habilitaci&oacute;n</th>
                                        <th>Logo</th>
                                        <th>Nombre</th>
                                        <th>Raz&oacute;n social</th>
                                        <th>Direcci&oacute;n</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ObjEmpresa->FnGetEmpresas() as $row): ?>
                                        <tr class="item" data-id="<?php echo $row->id; ?>">
                                            
                                            <td width="30px">
                                                <input type="checkbox" data-size="mini" data-label-text="Premium" class="cbx-admin-premium checkbox" data-acc="admin-empresa-premium" <?php echo ($row->es_premium == 1)? 'checked':''; ?> >
                                            </td>
                                                                                        
                                            <td width="30px">
                                                <input type="checkbox" data-size="mini" data-label-text="Habilitado" class="cbx-admin-habilitar checkbox" data-acc="admin-empresa-habilitar" <?php echo ($row->habilitado == 1)? 'checked':''; ?> >
                                            </td>
                                            
                                            <td><img src="<?php echo BASE_URL._DIR_UPLOAD_; ?>logo_empresa/<?php echo $row->logo; ?>" width="35px"/></td>
                                            <td><?php echo $row->nombre; ?></td>
                                            <td><?php echo $row->razon_social; ?></td>
                                            <td><?php echo $row->direccion; ?></td>
                                            <td>
                                                <a href="admin_empresa_editar.php?id=<?php echo $row->id; ?>" class="btn btn-sm btn-primary btn-editar" alt="Modificar" title="Modificar">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                                
                                                <a href="admin_empresa_editar.php?id=<?php echo $row->id; ?>&view" alt="Consultar" title="Consultar" class="btn btn-sm btn-warning btn-editar">
                                                    <i class="glyphicon glyphicon-bell"></i>
                                                </a>
                                                
                                                <button class="btn btn-sm btn-danger btn-admin-borrar" data-acc="admin-empresa-borrar" alt="Eliminar" title="Eliminar">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                                
                                                <span class="separador">|</span>
                                                
                                                <a href="admin_empresa_imagen.php?id=<?php echo $row->id; ?>" alt="Imagenes" title="Imagenes" class="btn btn-sm btn-default">
                                                    <i class="glyphicon glyphicon-picture"></i>
                                                </a>
                                                
                                                <a href="admin_empresa_video.php?id=<?php echo $row->id; ?>" alt="Videos" title="Videos" class="btn btn-sm btn-default">
                                                    <i class="glyphicon glyphicon-film"></i>
                                                </a>
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