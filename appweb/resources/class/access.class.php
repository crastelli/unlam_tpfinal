<?php
require "../class/database.class.conf.php";

session_start();

Class Access extends Database
{

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

	private function FnGetUsuario($email)
	{
		$qry = sprintf("SELECT `id`, `nombre`
						FROM `Usuario`
						WHERE `email` = '%s'
						AND `estado` = 1
						LIMIT 1", $email);
		return $this->queryOne($qry);
	}

	private function FnGetEmpresa($email)
	{
		$qry = sprintf("SELECT `id`, `nombre`
					FROM `Empresa`
					WHERE `email` = '%s'
					AND `estado` = 1
					LIMIT 1", $email);
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

		$access = $this->FnGetUsuario($email);
		if( $access )
		{
			//ENVIO CORREO
			$err = -1;
		}else{

			$access = $this->FnGetEmpresa($email);
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
}
