<?php $ObjUs = (Object) $_SESSION["usuario"]; ?>

<nav class="navbar navbar-default navbar-fixed-top bootstrap-admin-navbar" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                    <a class="navbar-brand" href="admin_home.php">Panel Administrador</a>
                </div>
                <div class="collapse navbar-collapse main-navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        
                        <?php
                            $ArrInfoPage["menu-class"]
                        ?>
                        
                        <?php if($ObjUs->root == 0): ?>
							<li class="page-home <?php echo ($ArrInfoPage['menu-class'] == 'page-home')? 'active' : ''; ?>"> <a href="admin_home.php">Inicio</a> </li>
							<li class="page-perfil <?php echo ($ArrInfoPage['menu-class'] == 'page-perfil')? 'active' : ''; ?>"> <a href="admin_perfil.php">Mi perfil</a> </li>
                            <li class="page-empresa-imagen <?php echo ($ArrInfoPage['menu-class'] == 'page-empresa-imagen')? 'active' : ''; ?>"> <a href="#">Mis imágenes</a> </li>
							<li class="page-empresa-video <?php echo ($ArrInfoPage['menu-class'] == 'page-empresa-video')? 'active' : ''; ?>"> <a href="#">Mis videos</a> </li>
						<?php else: ?>
							<li class="page-home <?php echo ($ArrInfoPage['menu-class'] == 'page-home')? 'active' : ''; ?>"> <a href="admin_home.php">Inicio</a> </li>
							<li class="page-perfil <?php echo ($ArrInfoPage['menu-class'] == 'page-perfil')? 'active' : ''; ?>"> <a href="admin_perfil.php">Mi perfil</a> </li>
                            <li class="page-zona <?php echo ($ArrInfoPage['menu-class'] == 'page-zona')? 'active' : ''; ?>"> <a href="admin_zona.php">Lugares/Zonas</a> </li>
							<li class="page-rubro <?php echo ($ArrInfoPage['menu-class'] == 'page-rubro')? 'active' : ''; ?>"> <a href="admin_rubro.php">Rubros</a> </li>
                            <li class="page-empresa <?php echo ($ArrInfoPage['menu-class'] == 'page-empresa')? 'active' : ''; ?>"> <a href="admin_empresa.php">Empresas</a> </li>
						<?php endif; ?>
							<li><a href="javascript:void(0);" class="btn-logout">Salir</a></li>
						</ul>
						                        
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>