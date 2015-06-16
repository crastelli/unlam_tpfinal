<?php
require "../../config/ini.php";
$ArrInfoPage = [ "page-title" => "Empresas", "menu-class" => "page-empresa" ];

try {
    Fn::FnCheckAccess(1);
    Fn::FnCheckAccessAdmin();
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
                            Listado de todos los comercios registrados.
                            Acá podrás dar de baja y/o registrar nuevos locales para que que los comerciantes
                            puedan dar a conocer su comercio dandole la posibilidad de colocar información
                            del mismo mediante características y/o fotos del lugar.
                        </span>
                    </div>
                </div>
            </div> 
            
            
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">Listado de <?php echo $ArrInfoPage["page-title"]; ?></div>
                        </div>
                        <div class="bootstrap-admin-panel-content">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Oferta 1</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oferta 2</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oferta 3</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oferta 3</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oferta 3</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Oferta 3</td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" alt="Modificar" title="Modificar">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-warning" alt="Consultar" title="Consultar">
                                                <i class="glyphicon glyphicon-bell"></i>
                                            </button>
                                            
                                            <button class="btn btn-sm btn-danger" alt="Eliminar" title="Eliminar">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>                                                                        
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require ROOT_DIR._DIR_TMP_."admin_footer.php"; ?>