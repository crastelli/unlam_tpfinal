<?php

Class Empresa extends Usuario
{
	private $nombre_referente;
	private $dni_referente;
	private $razon_social;
	private $logo;
	private $descripcion;
	private $es_premium;
	private $habilitado;

	public function FnLogin($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`, `razon_social`, `logo`
				FROM `Empresa`
				WHERE `email` = '%s'
				AND `pw` = '%s'
				AND `estado` = 1
				LIMIT 1", $email, $pw);
		return $this->queryOne($qry);
	}	

	public function FnExiste($email)
	{
		$qry = sprintf("SELECT 1
					FROM `Empresa`
					WHERE `email` = '%s'
					AND `estado` = 1
					LIMIT 1", $email);
		$existe = $this->queryOne($qry);
		if($existe)return true;
		else return false;
	}

	public function FnGetById($id)
	{
		$qry = sprintf("SELECT `id`, `nombre_referente`, `dni_referente`, `nombre`, `email`, `razon_social`, `logo`, `telefono`, `direccion`,
								`descripcion`, `habilitado`
					FROM `Empresa`
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

	public function FnGuardarPerfil($id, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw)
	{
		$err = -1;
		$logo_ant = '';

		if(!$this->FnExistente($id, $email))
		{
			// Si viene un logo, guardo el anterior para despues borrarlo
			if(!empty($logo))
			{
				$data     = $this->FnGetById($id);
				$logo_ant = $data->logo;
			}
			//

			$update_pw   = (!empty($pw))? ' ,`pw` = "'.$pw.'" ' : '';
			$update_logo = (!empty($logo))? ' ,`logo` = "'.$logo.'" ' : '';
			$qry = sprintf("UPDATE `Empresa`
								SET `nombre_referente` = '%s',
								`dni_referente`        = '%s',
								`nombre`               = '%s',
								`razon_social`         = '%s',
								`telefono`             = '%s',
								`direccion`            = '%s',
								`descripcion`          = '%s',
								`email`                = '%s'
								{$update_pw}
								{$update_logo}
							WHERE `id` = %d", 
							$nombre_referente, $dni_referente, $nombre, $razon_social, $telefono, $direccion, $descripcion, $email, $id);
			$update = $this->execute($qry, "update");
			if(!$update) $err = 1;
			else{
				// Si se hizo la actualizacion correctamente borro el logo anterior
				if(!empty($logo_ant)) @unlink(ROOT_DIR._DIR_UPLOAD_.'logo_empresa'._DS_.$logo_ant);
			}
		}else $err = 2;
		return $err;		
	}

	// Chequea que no haya otra empresa registrada con dicho email.
	private function FnExistente($id, $email)
	{
		$qry = sprintf("SELECT 1
					FROM `Empresa`
					WHERE `id` != %d
					AND `email` = '%s'
					LIMIT 1", $id, $email);
		return $this->queryOne($qry);	
	}

}