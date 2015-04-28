<?php $ObjUs = (Object) $_SESSION["usuario"]; ?>


<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar bootstrap-admin-navbar-under-small" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin_home.php">Panel Administrador</a>
                </div>
                <div class="collapse navbar-collapse main-navbar-collapse">
                    <ul class="nav navbar-nav">
                        
                        <?php
                            $ArrInfoPage["menu-class"]
                        ?>
                        
                        <?php if($ObjUs->root == 0): ?>
							<li class="page-home <?php echo ($ArrInfoPage['menu-class'] == 'page-home')? 'active' : ''; ?>"> <a href="admin_home.php">Inicio</a> </li>
							<li class="page-perfil <?php echo ($ArrInfoPage['menu-class'] == 'page-perfil')? 'active' : ''; ?>"> <a href="admin_perfil.php">Mi perfíl</a> </li>
							<li class="page-empresa-imagen <?php echo ($ArrInfoPage['menu-class'] == 'page-empresa-imagen')? 'active' : ''; ?>"> <a href="#">Mis imágenes</a> </li>
						<?php else: ?>
							<li class="page-home <?php echo ($ArrInfoPage['menu-class'] == 'page-home')? 'active' : ''; ?>"> <a href="admin_home.php">Inicio</a> </li>
							<li class="page-perfil <?php echo ($ArrInfoPage['menu-class'] == 'page-perfil')? 'active' : ''; ?>"> <a href="admin_perfil.php">Mi perfíl</a> </li>
							<li class="page-empresa <?php echo ($ArrInfoPage['menu-class'] == 'page-empresa')? 'active' : ''; ?>"> <a href="admin_empresa.php">Empresas</a> </li>
						<?php endif; ?>
							<li><a href="javascript:void(0);" class="btn-logout">Cerrar sesión</a></li>
						</ul>
						                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>