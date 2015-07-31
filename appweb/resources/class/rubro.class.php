<?php

Class Rubro extends Database
{
	private $id;
	private $descripcion;
	private $icono;
	private $estado;
	private $habilitado;

	public function FnGetById($id)
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `icono`, `habilitado`
				FROM `Rubro`
				WHERE `id` = %d
				LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnGetAll()
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `icono`, `habilitado`
				FROM `Rubro`
				WHERE `estado` = 1
				ORDER BY `id` DESC", False);
		return $this->query($qry);
	}
	
	public function FnGetAllActivos()
	{
		$qry = sprintf("SELECT `id`, `descripcion`, `icono`, `habilitado`
				FROM `Rubro`
				WHERE `estado` = 1
				AND `habilitado` = 1
				ORDER BY `descripcion` ASC", False);
		return $this->query($qry);
	}

	public function FnGuardar( $descripcion, $icono)
	{
		$err = -1;
		$qry = sprintf("INSERT INTO `Rubro` (`descripcion`,`icono`)
							VALUES ('%s', '%s')", $descripcion, $icono);
		$insert = $this->execute($qry, "insert");
		if($insert <= 0) $err = 1;
		return $err;			
	}

	public function FnBorrar($id)
	{
		$qry = sprintf("UPDATE `Rubro` SET `estado` = 0 WHERE `id` = %d", $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}

	public function FnEditar($id, $descripcion, $icono)
	{
		$err       = -1;
		$icono_ant = '';

		// Si viene un icono, guardo el anterior para despues borrarlo
		if(!empty($icono))
		{
			$data     = $this->FnGetById($id);
			$icono_ant = $data->icono;
		}
		//

		$update_icono= (!empty($icono))? ' ,`icono` = "'.$icono.'" ' : '';
		$qry = sprintf("UPDATE `Rubro`
							SET `descripcion` = '%s'
							{$update_icono}
						WHERE `id` = %d", 
						$descripcion, $id);
		$update = $this->execute($qry, "update");
		if(!$update) $err = 1;
		else{
			// Si se hizo la actualizacion correctamente borro el logo anterior
			if(!empty($icono_ant)) @unlink(ROOT_DIR._DIR_UPLOAD_.'icono_rubro'._DS_.$icono_ant);
		}

		return $err;		
	}

	public function FnHabilitar($id, $habilitado)
	{
		$qry = sprintf("UPDATE `Rubro` SET `habilitado` = %d WHERE `id` = %d", $habilitado, $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}
}