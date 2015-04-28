<?php
require "../class/access.class.php";
require "../class/function.class.php";
$ArrInfoPage = [ "page-title" => "Inicio", "menu-class" => "page-home" ];

Fn::FnCheckAccess(1);

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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="text-muted bootstrap-admin-box-title">CONTENIDO</div>
                        </div>
                        
                	</div>
                </div>
            </div>
            
        </div>
    </div>
</div>











<?php require "../template/admin_footer.php"; ?>