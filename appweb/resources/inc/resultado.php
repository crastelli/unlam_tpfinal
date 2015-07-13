<?php
require "../../config/ini.php";

try {
	$ObjRubro   = new Rubro();
	$ObjZona    = new Zona();
	$ObjEmpresa = new Empresa();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

$json = "null";
if( !empty($_POST) )
{
	$idzona    = ( isset($_POST["idzona"]) && $_POST["idzona"] > 0 )? $_POST["idzona"] : null;
	$arr_rubro = ( isset($_POST["arr_rubro"]) && count($_POST["arr_rubro"]) > 0 )? $_POST["arr_rubro"] : null;

	if( !is_null($idzona) && !is_null($arr_rubro) )
	{
		$zona    = $ObjZona->FnGetById($idzona);
		$empresa = $ObjEmpresa->FnGetByResultadoFiltro($idzona, $arr_rubro);
		$json    = array( "zona" => array("lat_long" => $zona->lat_long), "empresas" => array() );
		foreach ($empresa as $row)
		{
			array_push($json["empresas"], $row);
		}
		$json = json_encode($json);
	}
}
?>

<?php require ROOT_DIR._DIR_TMP_."header.php"; ?>


<div class="row contenido-gral ajaxContainer">
	<div id="contenedorBtnContraerResultBusqueda" class="col-xs-12">
		<button class="btn btn-primary" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span><span class="sr-only">Ver resultados de la búsqueda</span></button>
	</div>
	<main id="contenido" class="col-xs-12 formResultado" role="main">
		<header class="sr-only">
			<h1>Resultados de la búsqueda</h1>
		</header>
		<article>
			<p class="clearfix"><button class="btn btn-primary pull-right" type="button" data-toggle="collapse" data-target="#opcionesFiltro" aria-expanded="true" aria-controls="opcionesFiltro"><span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filtrar búsqueda <span class="caret"></span></button></p>
			<div class="collapse in" id="opcionesFiltro">
				<div class="well">
					<form id="formBuscar" class="form-horizontal clearfix contenido-filtro">
						<div class="form-group">
							<label for="ciudad" class="col-sm-2 control-label">Ciudad</label>
							<div class="col-sm-10">
								<select name="idzona" id="idzona" class="form-control">
									<?php foreach($ObjZona->FnGetAllActivos() as $row): ?>
										<option value="<?php echo $row->id; ?>"><?php echo $row->descripcion; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="rubro" class="col-sm-2 control-label">Rubro</label>
							<div class="col-sm-10">
								<select name="arr_rubro" id="rubro" multiple>
									<?php foreach($ObjRubro->FnGetAllActivos() as $row): ?>
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
					
						<!-- Hidden -->
						<input type="hidden" name="is_post" value="<?php echo ( !empty($_POST) )? True: False; ?>">
						<!--  -->
					</form>
				</div>
			</div>
			
			<?php if( !empty($_POST) && !is_null($arr_rubro) ): ?>
				<ul id="listaResultadosFiltros" class="nav nav-pills nav-stacked">
					<?php foreach ($empresa as $row): ?>
						<li><a href="#"><?php echo $row->direccion; ?></a></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
			
			<p><a href="javascript:void(0);" class="modal-empresa-foto-video">FOTOS&VIDEOS(no va aca, solo de prueba)</a></p>
			
		</article>	
	</main>
</div>

<?php require ROOT_DIR._DIR_TMP_."footer.php"; ?>

<script>fCargarMapa(<?php echo $json; ?>);</script>
