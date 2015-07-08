<?php

Class Admin extends Usuario
{
	public function FnLogin($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`, `pw`
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `pw` = '%s'
						AND `estado` = 1
						LIMIT 1", $email, md5($pw));
		return $this->queryOne($qry);
	}

	public function FnExiste($email)
	{
		$qry = sprintf("SELECT 1
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `estado` = 1
						LIMIT 1", $email);
		$existe = $this->queryOne($qry);
		if($existe)return true;
		else return false;
	}

	public function FnGetById($id)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `telefono`, `direccion`, `email`, `pw`
						FROM `Usuario`
						WHERE `id` = %d
						AND `estado` = 1
						LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnGetByEmail($email)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `telefono`, `direccion`, `email`, `pw`
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `estado` = 1
						LIMIT 1", $email);
		return $this->queryOne($qry);
	}

	public function FnRecuperarPw($email)
	{
		$us = $this->FnGetByEmail($email);
		if( $us ) return $us;
		return null;
	}

	public function FnModificarPassword($id, $pw)
	{
		$err = 1;
		$qry = sprintf("UPDATE `Usuario`
							SET `pw` = '%s'
						WHERE `id` = %d", 
						md5($pw), $id);
		$update = $this->execute($qry, "update");
		if($update) $err = -1;
		
		return $err;
	}

	public function FnGuardarPerfil($id, $nombre, $telefono, $direcion, $email, $pw)
	{
		$err = 1;
		
		$update_pw = (!empty($pw))? ' ,`pw` = "'.md5($pw).'" ' : '';
		$qry = sprintf("UPDATE `Usuario`
							SET `nombre` = '%s',
							`telefono`   = '%s',
							`direccion`  = '%s',
							`email`      = '%s'
							{$update_pw}
						WHERE `id` = %d", 
						$nombre, $telefono, $direcion, $email, $id);
		$update = $this->execute($qry, "update");
		if($update) $err = -1;
		
		return $err;
	}

}