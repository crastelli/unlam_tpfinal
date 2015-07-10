<?php require "../../config/ini.php"; ?>
<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">

	<main id="contenido" class="col-xs-12 contenidoConFormBuscar" role="main">
		<header class="sr-only">
			<h1>Inicio</h1>
		</header>
		<article>
			<form action="resultado.php" id="formBuscar" class="form-inline" method="get">
				<div class="form-group filtro_zona">
					<select name="ciudad" id="ciudad" class="form-control">
						<option value="1">Capital Federal / GBA</option>
						<option value="2">Ramos Mejía</option>
						<option value="3">Tigre</option>
						<option value="4">San Justo</option>
						<option value="5">Lomas de Zamora</option>
						<option value="6">Quilmes</option>
					</select>
				</div>
				<div class="form-group filtro_rubro">
					<select name="rubro" id="rubro" multiple>
					<option value="1">Tiendas</option>
					<option value="2">Restaurantes</option>
					<option value="4">Bares</option>
					<option value="5">Pizzerías</option>
					<option value="13">Hoteles</option>
					<option value="14">Cafés</option>
					<option value="15">Zapaterías</option>
					<option value="todos">Otros</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-lg btn-primary">Buscar</button>
				</div>
			</form>
		</article>
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>