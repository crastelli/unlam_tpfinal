<?php
require "../../config/ini.php";

try {
	$ObjRubro = new Rubro();
	$ObjZona  = new Zona();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
?>	
<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">

	<main id="contenido" class="col-xs-12 contenidoConFormBuscar" role="main">
		<header class="sr-only">
			<h1>Inicio</h1>
		</header>
		<article>
			<form id="formBuscar" class="form-inline contenido-filtro">
				<div class="form-group filtro_zona">
					<select name="idzona" id="idzona" class="form-control">
						<?php foreach($ObjZona->FnGetAllActivos() as $row): ?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group filtro_rubro">
					<select name="arr_rubro" id="rubro" multiple>
						<?php foreach($ObjRubro->FnGetAllActivos() as $row): ?>
						<option value="<?php echo $row->id; ?>"><?php echo $row->descripcion; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-lg btn-primary buscar">Buscar</button>
				</div>
			</form>
		</article>
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>

<script>fCargarMapa(null);</script>
