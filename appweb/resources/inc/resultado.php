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
			
			
			<p><a href="javascript:void(0);" class="modal-empresa-foto-video">FOTOS&VIDEOS(no va aca, solo de prueba)</a></p>
			
		</article>	
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>