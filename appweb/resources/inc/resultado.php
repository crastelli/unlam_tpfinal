<?php require "../../config/ini.php"; ?>
<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row" class="contenido-gral ajaxContainer">
	<main id="contenido" class="col-xs-12 col-md-6 formResultado" role="main">	
		<article>
			##
				hacer la funcionalidad de apertura y cierre de este contenedor
			##
			<p><b>Filtros</b></p>
			##
				achicar el tamaño de los selectores en alto y centrarlos
				el boton buscar deberia estar alineado a la derecha y mas chico (en relacion a los selectores)
			##
			<form action="home.php" id="formBuscar" class="form-inline" method="post">
				<div class="form-group filtro_zona">
					<select name="seleccionuno" id="seleccionuno" class="form-control">
						<option value="1">Capital Federal / GBA</option>
						<option value="2">Ramos Mejía</option>
						<option value="3">Tigre</option>
						<option value="4">San justo</option>
						<option value="5">Lomas de Zamora</option>
						<option value="6">Quilmes</option>
					</select>
				</div>
				<br />
				<div class="form-group filtro_rubro">
					<select name="rubro" id="rubro" multiple="multiple">
					<option value="1">Otros</option>
					<option value="2">Restaurantes</option>
					<option value="3">Tiendas</option>
					<option value="4">Bares</option>
					</select>
				</div>
				<br />
				<div class="form-group">
					<button type="submit" class="btn btn-lg btn-primary">Buscar</button>
				</div>
			</form>
		</article>	
		
		
		<hr />
		<article>
			<p><b>Resultados</b></p>
			##
				aca va el resultado de los filtros en formato de lista
				el ul deberia tener un scroll con un tamaño fijo hasta el fin del contenedor
				y en los li poner un hover de otro color al pasar el mouse por encima
			##
			<ul>
				<li><a href="#">Av. Libertador 4214 (Bar)</a></li>
				<li><a href="#">Av. Rivadavia 11224 (Restaurante)</a></li>
				<li><a href="#">Av. F. Alcorta 4523 (Bar)</a></li>
				<li><a href="#">Alvares Tomas 534 (Restaurante)</a></li>
				<li><a href="#">Av. Corrientes 232 (Restaurante)</a></li>
				<li><a href="#">Gral. Hornos 5022 (Gimnasio)</a></li>
			</ul>
		</article>	
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>