<?php
require "../../config/ini.php";

try {
    Fn::FnCheckAccess(1);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
$ArrInfoPage = [ "page-title" => "Mi Perfíl", "menu-class" => "page-perfil" ];
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
        
            <?php if($_SESSION['usuario']['root'] == 1): ?>
                <?php require("admin_perfil_root.php"); ?>
            <?php else: ?>
                <?php require("admin_perfil_empresa.php"); ?>
            <?php endif; ?>            
    </div>
</div>

<?php require ROOT_DIR._DIR_TML_."admin_footer.php"; ?>