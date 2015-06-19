<?php require "../../config/ini.php"; ?>
<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">
	<main id="contenido" class="col-xs-12 col-md-6" role="main">
		<article>
			<form action="home.php" id="formBuscar" class="form-inline" method="post">
				<div class="form-group">
					<select name="seleccionuno" id="seleccionuno" class="form-control">
						<option value="1">Capital Federal / GBA</option>
						<option value="2">Ramos Mejía</option>
						<option value="3">Tigre</option>
						<option value="4">San justo</option>
						<option value="5">Lomas de Zamora</option>
						<option value="6">Quilmes</option>
					</select>
				</div>
				<div class="form-group">
					<select name="rubro" id="rubro" multiple="multiple">
					<option value="1">Otros</option>
					<option value="2">Restaurantes</option>
					<option value="3">Tiendas</option>
					<option value="4">Bares</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</div>
			</form>
		</article>
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>