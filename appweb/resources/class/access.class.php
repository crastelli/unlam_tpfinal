<?php
require "../class/database.class.conf.php";

session_start();

Class Access extends Database
{

	/**
		# LOGIN
	*/
	private function FnLoginUsuario($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `pw` = '%s'
						AND `estado` = 1
						LIMIT 1", $email, $pw);
		return $this->queryOne($qry);
	}

	private function FnLoginEmpresa($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`, `razon_social`, `logo`
				FROM `Empresa`
				WHERE `email` = '%s'
				AND `pw` = '%s'
				AND `estado` = 1
				LIMIT 1", $email, $pw);
		return $this->queryOne($qry);
	}

	public function FnExisteUsuario($email)
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

	public function FnExisteEmpresa($email)
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

	public function FnGetUsuarioId($id)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `telefono`, `direccion`, `email`
						FROM `Usuario`
						WHERE `id` = %d
						AND `estado` = 1
						LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnGetEmpresaId($id)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`, `razon_social`, `logo`, `telefono`, `direccion`
								`descripcion`, `habilitado`
					FROM `Empresa`
					WHERE `id` = %d
					AND `estado` = 1
					LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnSetAccess($email, $pw)
	{
		$err = 0;

		$access = $this->FnLoginUsuario($email, $pw);
		if( $access )
		{
			$_SESSION["usuario"] = array( 
										"id"     => $access->id, 
										"nombre" => $access->nombre,
										"email"  => $access->email,
										"root"   => 1
										);	
		}else{
				
			$access = $this->FnLoginEmpresa($email, $pw);
			if( $access )
			{
				$_SESSION["usuario"] = array( 
										"id"           => $access->id, 
										"nombre"       => $access->nombre,
										"razon_social" => $access->razon_social,
										"email"        => $access->email,
										"logo"         => $access->logo,
										"root"         => 0
										);	
			}else $err = 1;

		}

		return $err;
	}

	public function FnRecuperarPw($email)
	{
		$err = 0;

		$access = $this->FnExisteUsuario($email);
		if( $access )
		{
			//ENVIO CORREO
			$err = -1;
		}else{

			$access = $this->FnExisteEmpresa($email);
			if( $access )
			{
				//ENVIO CORREO
				$err = -1;
			}else $err = 1;
		}
		return $err;
	}

	public function FnLogout()
	{
		$err = 0;
		if( session_destroy() ) $err = -1;
		return $err;
	}

	/**
		# PERFIL
	*/

	public function FnAdminGuardarPerfilUsuario($id, $nombre, $telefono, $direcion, $email, $pw)
	{
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
		if($update) return -1;
		return 1;
	}
}
