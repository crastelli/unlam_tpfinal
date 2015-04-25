<?php $ObjUs = (Object) $_SESSION["usuario"]; ?>

<ul class="admin-menu">
<?php if($ObjUs->root == 0): ?>
	<li>Mi perfil</li>
	<li>Mis imagenes</li>
	<li>Mi videos</li>
<?php else: ?>
	<li>Mi perfil</li>
	<li>Empresas</li>
<?php endif; ?>
	<li><a class="btn btn-sm btn-danger btn-logout">Cerrar sesión</a></li>
</ul>