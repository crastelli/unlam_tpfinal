<?php

Class Admin extends Usuario
{
	public function FnLogin($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `pw` = '%s'
						AND `estado` = 1
						LIMIT 1", $email, $pw);
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
		$qry = sprintf("SELECT `id`, `nombre`, `telefono`, `direccion`, `email`
						FROM `Usuario`
						WHERE `id` = %d
						AND `estado` = 1
						LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	private function FnGetByEmail($email)
	{
		return true;
	}

	public function FnRecuperarPw($email)
	{
		$err = 1;

		$us = $this->FnGetByEmail($email);
		if( $us )
		{
			//ENVIO CORREO
			$err = -1;
		}

		return $err;
	}

	public function FnGuardarPerfil($id, $nombre, $telefono, $direcion, $email, $pw)
	{
		$err = 1;
		
		$update_pw = (!empty($pw))? ' ,`pw` = "'.$pw.'" ' : '';
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