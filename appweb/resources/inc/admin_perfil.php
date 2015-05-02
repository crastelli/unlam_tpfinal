<?php
require "../class/access.class.php";
require "../class/function.class.php";

$ArrInfoPage = [ "page-title" => "Mi Perfíl", "menu-class" => "page-perfil" ];

Fn::FnCheckAccess(1);
$objAccess = new Access;

?>  

<?php require "../template/admin_header.php"; ?>
<?php require "../template/admin_menu.php"; ?>


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
                            Acá está la información de mi comercio en la cual aparecerá reflejada
                            en la aplicación en la cual los usuarios podrán apreciar, comentar, ranquear
                            y conocer.
                        </span>
                    </div>
                </div>
            </div>
            
        
            <?php if($_SESSION['usuario']['root'] == 1): ?>
                <?php require("admin_perfil_root.php"); ?>
            <?php else: ?>
                <?php require("admin_perfil_empresa.php"); ?>
            <?php endif; ?>
            
            
    </div>
</div>



<?php require "../template/admin_footer.php"; ?>