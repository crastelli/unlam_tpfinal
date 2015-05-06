<?php
require "../../config/ini.php";

try {
    Fn::FnCheckAccess(1);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

$ArrInfoPage = [ "page-title" => "Inicio", "menu-class" => "page-home" ];
?>

<?php require ROOT_DIR._DIR_TML_."admin_header.php"; ?>
<?php require ROOT_DIR._DIR_TML_."admin_menu.php"; ?>

<div class="container">
    <!-- left, vertical navbar & content -->
    <div class="row">
        <!-- content -->
        <div class="col-md-12">
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-header">
                        <h1><?php echo $ArrInfoPage["page-title"]; ?></h1>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 content">
                    <div class="alert alert-info">
                        <a class="close" data-dismiss="alert" href="#">×</a>
                        <span>
                            Este es el panel de administración en el cual podrás administrar
                            tu comercio de manera en la cual los usuarios puedan apreciar
                            y conocer tu local. Al cual, podrán generar comentarios y ranquearlo
                            para su conocimiento y mejor elección a la hora de elegir un lugar
                            donde ir!
                        </span>
                    </div>
                </div>
            </div>            
            
        </div>
    </div>
</div>

<?php require ROOT_DIR._DIR_TML_."admin_footer.php"; ?>