<?php require "../../config/ini.php"; ?>
<?php require ROOT_DIR._DIR_TML_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">
	<main id="contenido" class="col-xs-12 col-md-6" role="main">
		<article>
			<form action="index.html" class="form-inline">
				<div class="form-group">
					<label for="opciones" class="sr-only">Opciones</label>
					<select name="opciones" class="form-control" id="opciones" required>
						<option value="">Seleccione</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Entrar</button>
			</form>
		</article>
	</main>
</div>

<?php require ROOT_DIR._DIR_TML_."footer.php"; ?>