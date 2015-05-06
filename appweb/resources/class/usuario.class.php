<?php

Class Usuario extends Database
{
	
	protected $id;
	protected $nombre;
	protected $email;
	protected $pw;
	protected $telefono;
	protected $direccion;
	protected $estado;
	protected $fecha;

	static public function setAccesoAdmin($ObjAcceso)
	{
		$err = 0;
		if(!is_null($ObjAcceso))
		{
			$_SESSION["usuario"] = array( 
									"id"     => $ObjAcceso->id, 
									"nombre" => $ObjAcceso->nombre,
									"email"  => $ObjAcceso->email,
									"root"   => 1
									);
		}else $err = 1;
		return $err;
	}

	static public function setAccesoEmpresa($ObjAcceso)
	{
		$err = 0;
		if(!is_null($ObjAcceso))
		{
			$_SESSION["usuario"] = 	array( 
										"id"           => $ObjAcceso->id, 
										"nombre"       => $ObjAcceso->nombre,
										"razon_social" => $ObjAcceso->razon_social,
										"email"        => $ObjAcceso->email,
										"logo"         => $ObjAcceso->logo,
										"root"         => 0
										);
		}else $err = 1;
		return $err;
	}

	static public function FnLogout()
	{
		$err = 0;
		if( session_destroy() ) $err = -1;
		return $err;
	}	

}