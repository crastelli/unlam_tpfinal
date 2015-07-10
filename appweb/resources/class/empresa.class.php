<?php

Class Empresa extends Usuario
{
	private $nombre_referente;
	private $dni_referente;
	private $razon_social;
	private $logo;
	private $idzona;
	private $idrubro;
	private $latitud;
	private $longitud;
	private $descripcion;
	private $habilitado;
	private $es_premium;

	public function FnLogin($email, $pw)
	{
		$qry = sprintf("SELECT `id`, `nombre`, `email`, `razon_social`, `logo`
				FROM `Empresa`
				WHERE `email` = '%s'
				AND `pw` = '%s'
				AND `estado` = 1
				LIMIT 1", $email, md5($pw));
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

	public function FnGetEmpresas()
	{
		$qry = sprintf("SELECT `id`, `nombre_referente`, `dni_referente`, `nombre`, `email`, `pw`, `razon_social`, `logo`, `telefono`, `direccion`,
								`descripcion`, `habilitado`, `idzona`, `idrubro`, `lat_long`, `es_premium`
 					FROM `Empresa`
					WHERE `estado` = 1", False);
		return $this->query($qry);
	}

	public function FnGetById($id)
	{
		$qry = sprintf("SELECT `id`, `nombre_referente`, `dni_referente`, `nombre`, `email`, `pw`, `razon_social`, `logo`, `telefono`, `direccion`,
								`descripcion`, `habilitado`, `idzona`, `idrubro`, `lat_long`, `es_premium`
 					FROM `Empresa`
					WHERE `id` = %d
					AND `estado` = 1
					LIMIT 1", $id);
		return $this->queryOne($qry);
	}

	public function FnGetByEmail($email)
	{
		$qry = sprintf("SELECT `id`, `nombre_referente`, `dni_referente`, `nombre`, `email`, `pw`, `razon_social`, `logo`, `telefono`, `direccion`,
								`descripcion`, `habilitado`, `idzona`, `idrubro`, `lat_long`, `es_premium`
 					FROM `Empresa`
					WHERE `email` = '%s'
					AND `estado` = 1
					LIMIT 1", $email);
		return $this->queryOne($qry);
	}

	public function FnRecuperarPw($email)
	{
		$empresa = $this->FnGetByEmail($email);
		if( $empresa ) return $empresa;
		return null;
	}

	public function FnModificarPassword($id, $pw)
	{
		$err = 1;
		$qry = sprintf("UPDATE `Empresa`
							SET `pw` = '%s'
						WHERE `id` = %d", 
						md5($pw), $id);
		$update = $this->execute($qry, "update");
		if($update) $err = -1;
		
		return $err;
	}

	public function FnEditar($id, $idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw)
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

			$update_pw   = (!empty($pw))? ' ,`pw` = "'.md5($pw).'" ' : '';
			$update_logo = (!empty($logo))? ' ,`logo` = "'.$logo.'" ' : '';
			$qry = sprintf("UPDATE `Empresa`
								SET `nombre_referente` = '%s',
								`dni_referente`        = '%s',
								`nombre`               = '%s',
								`razon_social`         = '%s',
								`telefono`             = '%s',
								`direccion`            = '%s',
								`descripcion`          = '%s',
								`email`                = '%s',
								`idzona`               = %d,
								`idrubro`              = %d, 
								`lat_long`             = '%s'
								{$update_pw}
								{$update_logo}
							WHERE `id` = %d", 
							$nombre_referente, $dni_referente, $nombre, $razon_social, $telefono, $direccion, $descripcion, $email, $idzona, $idrubro, $lat_long, $id);
			$update = $this->execute($qry, "update");
			if(!$update) $err = 1;
			else{
				// Si se hizo la actualizacion correctamente borro el logo anterior
				if(!empty($logo_ant)) @unlink(ROOT_DIR._DIR_UPLOAD_.'logo_empresa'._DS_.$logo_ant);
			}
		}else $err = 2;
		return $err;		
	}

	public function FnGuardar($idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $logo, $telefono, $direccion, $descripcion, $email, $pw)
	{
		$err = -1;
		if(!$this->FnExistente(null, $email))
		{
			$qry = sprintf("INSERT INTO `Empresa`
							(`idzona`, `idrubro`, `lat_long`, `nombre_referente`, `dni_referente`, 
							`nombre`, `razon_social`, `telefono`, `direccion`, `descripcion`, 
							`email`, `pw`, `logo`)
							VALUES (%d, %d, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
							$idzona, $idrubro, $lat_long, $nombre_referente, $dni_referente, $nombre, $razon_social, $telefono, $direccion, $descripcion, $email, md5($pw), $logo);
			$insert = $this->execute($qry, "insert");
			if($insert <= 0) $err = 1;
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

	public function FnBorrar($id)
	{
		$qry = sprintf("UPDATE `Empresa` SET `estado` = 0 WHERE `id` = %d", $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}

	public function FnHabilitar($id, $habilitado)
	{
		$qry = sprintf("UPDATE `Empresa` SET `habilitado` = %d WHERE `id` = %d", $habilitado, $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}	

	public function FnEsPremium($id, $es_premium)
	{
		$qry = sprintf("UPDATE `Empresa` SET `es_premium` = %d WHERE `id` = %d", $es_premium, $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}

	// Imagen -->
	public function FnGetImagenes($idempresa)
	{
		$qry = sprintf("SELECT `id`, `idempresa`, `titulo`, `descripcion`, `link_imagen` imagen, `estado`, `habilitado`, `fecha`
					FROM `Imagen_rel_empresa`
					WHERE `idempresa` = %d
					AND `estado` = 1", $idempresa);
		return $this->query($qry);	
	}
	public function FnGuardarImagen($idempresa, $titulo, $descripcion, $imagen)
	{
		$err = -1;

		$qry = sprintf("INSERT INTO `Imagen_rel_empresa`
						(`idempresa`, `titulo`, `descripcion`, `link_imagen`)
						VALUES (%d, '%s', '%s', '%s')",
						$idempresa, $titulo, $descripcion, $imagen);
		$insert = $this->execute($qry, "insert");
		if($insert <= 0) $err = 1;

		return $err;		
	}
	public function FnBorrarImagen($id)
	{
		$qry = sprintf("UPDATE `Imagen_rel_empresa` SET `estado` = 0 WHERE `id` = %d", $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
				
	}
	public function FnHabilitarImagenEmpresa($id, $habilitado)
	{
		$qry = sprintf("UPDATE `Imagen_rel_empresa` SET `habilitado` = %d WHERE `id` = %d", $habilitado, $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
	}		
	// -->

	// Video -->
	public function FnGetVideos($idempresa)
	{
		$qry = sprintf("SELECT `id`, `idempresa`, `titulo`, `descripcion`, `codigo`, `estado`, `habilitado`, `fecha`
					FROM `Video_rel_empresa`
					WHERE `idempresa` = %d
					AND `estado` = 1", $idempresa);
		return $this->query($qry);	
	}
	public function FnGuardarVideo($idempresa, $titulo, $descripcion, $link)
	{
		$err = -1;

		$codigo = '';
		if($link != '')
		{
			$match = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
		    if((int) $match > 0)
		                $codigo = $matches[0];
		}

		$qry = sprintf("INSERT INTO `Video_rel_empresa`
						(`idempresa`, `titulo`, `descripcion`, `codigo`)
						VALUES (%d, '%s', '%s', '%s')",
						$idempresa, $titulo, $descripcion, $codigo);
		$insert = $this->execute($qry, "insert");
		if($insert <= 0) $err = 1;

		return $err;		
	}
	public function FnBorrarVideo($id)
	{
		$qry = sprintf("UPDATE `Video_rel_empresa` SET `estado` = 0 WHERE `id` = %d", $id);
		$update = $this->execute($qry, "update");
		if($update) return -1;
		else return 1;
				
	}
	public function FnHabilitarVideoEmpresa($id, $habilitado)
	{
		$qry = sprintf("UPDATE `Video_rel_empresa` SET `habilitado` = %d WHERE `id` = %d", $habilitado, $id);
		$update = $this->execute($qry, "update");
		echo $qry;die;
		if($update) return -1;
		else return 1;
	}	
	// -->	
}