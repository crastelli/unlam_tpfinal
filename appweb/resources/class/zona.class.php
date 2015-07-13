<?php

Class Zona extends Database
{
	private $id;
	private $descripcion;
	private $lat_long;
	private $estado;
	private $habilitado;

	public function FnGetById($id)
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `lat_long`, `habilitado`
				FROM `Zona`
				WHERE `id` = %d
				LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnGetAll()
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `lat_long`, `habilitado`
				FROM `Zona`
				WHERE `estado` = 1", False);
		return $this->query($qry);
	}	

	public function FnGetAllActivos()
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `lat_long`, `habilitado`
				FROM `Zona`
				WHERE `estado` = 1
				AND `habilitado` = 1", False);
		return $this->query($qry);
	}

	public function FnGuardar( $descripcion, $lat_long)
	{
		$err = -1;
		$qry = sprintf("INSERT INTO `Zona` (`descripcion`,`lat_long`)
							VALUES ('%s', '%s')", $descripcion, $lat_long);
		$insert = $this->execute($qry, "insert");
		if($insert <= 0) $err = 1;
		return $err;			
	}

	public function FnBorrar($id)
	{
		$qry = sprintf("UPDATE `Zona` SET `estado` = 0 WHERE `id` = %d", $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}

	public function FnEditar($id, $descripcion, $lat_long)
	{
		$err = -1;
		$qry = sprintf("UPDATE `Zona`
							SET `descripcion` = '%s',
							`lat_long` = '%s'
						WHERE `id` = %d", 
						$descripcion, $lat_long, $id);
		$update = $this->execute($qry, "update");
		if(!$update) $err = 1;
		return $err;		
	}

	public function FnHabilitar($id, $habilitado)
	{
		$qry = sprintf("UPDATE `Zona` SET `habilitado` = %d WHERE `id` = %d", $habilitado, $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}
}