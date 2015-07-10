<?php
require "../../config/ini.php";

try {
	$ObjRubro = new Rubro();
	$ObjZona  = new Zona();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

$json = "null";
if( !empty($_POST) )
{
	$json = json_encode(array(
			"idzona" => (isset($_POST["idzona"]))? $_POST["idzona"] : null,
			"rubro"  => (isset($_POST["arr_rubro"]))? $_POST["arr_rubro"] : null
		));
}

?>

<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>

<div class="row" class="contenido-gral ajaxContainer">
	<main id="contenido" class="col-xs-12 col-md-6 formResultado" role="main">
		<header>
			<h1>Resultados de la b&uacute;squeda</h1>
		</header>
		<article>
			<p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#opcionesFiltro" aria-expanded="false" aria-controls="opcionesFiltro">Filtrar búsqueda <span class="caret"></span></button></p>
			<div class="collapse" id="opcionesFiltro">
				<div class="well">
					<form action="resultados.php" method="get" id="formBuscar" class="form-horizontal clearfix contenido-filtro">
						<div class="form-group">
							<label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-10">
								<select name="idzona" id="idzona" class="form-control">
									<?php foreach($ObjZona->FnGetAll() as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->descripcion; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="rubro" class="col-sm-2 control-label">Rubro</label>
							<div class="col-sm-10">
								<select name="arr_rubro" id="rubro" multiple>
									<?php foreach($ObjRubro->FnGetAll() as $row): ?>
									<option value="<?php echo $row->id; ?>"><?php echo $row->descripcion; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="button" class="btn btn-lg btn-primary buscar">Buscar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
			<ul id="listaResultadosFiltros" class="nav nav-pills nav-stacked">
				<li><a href="#">Av. Libertador 4214 (Bar)</a></li>
				<li><a href="#">Av. Rivadavia 11224 (Restaurante)</a></li>
				<li><a href="#">Av. F. Alcorta 4523 (Bar)</a></li>
				<li><a href="#">Alvares Tomas 534 (Restaurante)</a></li>
				<li><a href="#">Av. Corrientes 232 (Restaurante)</a></li>
				<li><a href="#">Gral. Hornos 5022 (Gimnasio)</a></li>
			</ul>
			
			
			<p><a href="javascript:void(0);" class="modal-empresa-foto-video">FOTOS&VIDEOS(no va aca, solo de prueba)</a></p>
			
		</article>	
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>

<script>fCargarMapa(<?php echo $json; ?>);</script>