<?php

Class Cliente extends Database
{
	private $id;
	private $nombre;
				
	public function getAll()
	{
		$qry = sprintf("SELECT `id`, `nombre`
						FROM `ClienteTransferido`
						ORDER BY `id` DESC");
		return $this->query($qry);
	}

	public function getAllById($id)
	{
		$qry = sprintf("SELECT `nombre`
						FROM `ClienteTransferido`
						WHERE `id` = %d
						LIMIT 1", $id);
		$arr = $this->query($qry); //crear queryOne
		if(!empty($arr)) return $arr[0];
		else return null;
	}

	public function add($nombre)
	{
		$qry = sprintf("INSERT INTO `ClienteTransferido` ( `nombre` )
						VALUES ( '%s' )", $nombre);
		return $this->execute($qry, "insert");
	}

	public function update($id, $nombre)
	{
		$qry = sprintf("UPDATE `ClienteTransferido`
						set `nombre` = '%s'
						WHERE `id` = %d", $nombre, $id);
		return $this->execute($qry, "update");
	}

	public function delete($id)
	{
		$qry = sprintf("DELETE
						FROM `ClienteTransferido`
						WHERE `id` = %d", $id);
		return $this->execute($qry, "delete");
	}	
}
