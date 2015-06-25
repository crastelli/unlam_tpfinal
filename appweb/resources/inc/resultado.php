<?php require "../../config/ini.php"; ?>
<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">
	<main id="contenido" class="col-xs-12 col-md-6 formResultado" role="main">
		<header>
			<h1>Resultados de la búsqueda</h1>
		</header>
		<article>
			<p><button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#opcionesFiltro" aria-expanded="false" aria-controls="opcionesFiltro">Filtrar búsqueda <span class="caret"></span></button></p>
			<div class="collapse" id="opcionesFiltro">
				<div class="well">
					<form action="resultados.php" method="get" id="formBuscar" class="form-horizontal clearfix">
						<div class="form-group">
							<label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-10">
								<select name="ciudad" id="ciudad" class="form-control">
									<option value="1">Capital Federal / GBA</option>
									<option value="2">Ramos Mejía</option>
									<option value="3">Tigre</option>
									<option value="4">San justo</option>
									<option value="5">Lomas de Zamora</option>
									<option value="6">Quilmes</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="rubro" class="col-sm-2 control-label">Rubro</label>
							<div class="col-sm-10">
								<select name="rubro" id="rubro" multiple="multiple">
									<option value="1">Otros</option>
									<option value="2">Restaurantes</option>
									<option value="3">Tiendas</option>
									<option value="4">Bares</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Buscar</button>
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
			<p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFotosVideos">Ver fotos y videos</button></p>
			<div class="modal fade" id="modalFotosVideos" tabindex="-1" role="dialog" aria-labelledby="modalFotosVideosTitulo" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="modal-title" id="modalFotosVideosTitulo">Fotos y videos</h2>
</div>
<div class="modal-body">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#fotos" aria-controls="fotos" role="tab" data-toggle="tab">Fotos</a></li>
    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="fotos">
	<p>Fotos</p>
	</div>
    <div role="tabpanel" class="tab-pane" id="videos">
	<p>Videos</p>
	</div>
  </div>

</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary">Guardar cambios</button>
</div>
</div>
</div>
</div>
		</article>	
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>