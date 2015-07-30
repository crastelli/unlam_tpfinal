<?php
require ROOT_DIR._DIR_PLG_.'PHPMailer/phpmailer.php';

Class Correo extends PHPMailer {

	private $correo;

	function __construct(){

		$this->correo = new PHPMailer;
	}

	public function Enviar($subject, $address, $body, $name, $cc=False)
   	{
		$this->correo->IsSMTP();
		$this->correo->IsHTML(true);
		$this->correo->SMTPAuth   = true;    		
		$this->correo->SMTPSecure = 'ssl'; 
		$this->correo->Host       = 'smtp.gmail.com';
		$this->correo->Port       = 465;  
		$this->correo->Username   = 'milugar.sa@gmail.com';  
		$this->correo->Password   = 'milugarsa';

		$name = utf8_decode($name);
		$body = utf8_decode($body);

		$cuerpo= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"> <head> <meta name="viewport" content="width=device-width" /> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <title>Really Simple HTML Email Template</title> </head> <body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;"><!-- body --><table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td><td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content --><div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;"><table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Estimado,</p><h1 style="font-family: Helvetica Neue, Helvetica, Arial, Lucida Grande, sans-serif; font-size: 36px; line-height: 1.2; color: #000; font-weight: 200; margin: 0 0 10px; padding: 0;">'.$name.'</h1> <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">'.$body.'</p> <p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Muchas gracias!, <em><a href="http://www.milugar.com">milugar.com</a></em></p></td></tr></table></div><!-- /content --> </td><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td></tr></table><!-- /body --><!-- footer --><table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td><td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"></td><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td></tr></table><!-- /footer --></body></html>';

		$this->correo->Subject = utf8_decode($subject);

		$this->correo->Body = $cuerpo;

		foreach ($address as $row)
		{
			$this->correo->AddAddress($row->email);
			if(!$cc)
			{
				$this->correo->Send();
				$this->correo->ClearAddresses();
			}
		}

		if($cc)
		{
			$this->correo->Send();
			$this->correo->ClearAddresses();
		}

		$this->correo->ClearAttachments();
		return $this->correo->ErrorInfo;
   	}

	public function MiEnviar($subject, $address, $body)
   	{
		$this->correo->IsSMTP();
		$this->correo->IsHTML(true);
		$this->correo->SMTPAuth   = true;    		
		$this->correo->SMTPSecure = 'ssl'; 
		$this->correo->Host       = 'smtp.gmail.com';
		$this->correo->Port       = 465;  
		$this->correo->Username   = 'milugar.sa@gmail.com';  
		$this->correo->Password   = 'milugarsa';
		
		$body = utf8_decode($body);

		$cuerpo= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"> <head> <meta name="viewport" content="width=device-width" /> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> <title>Really Simple HTML Email Template</title> </head> <body bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; margin: 0; padding: 0;"><!-- body --><table class="body-wrap" bgcolor="#f6f6f6" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td><td class="container" bgcolor="#FFFFFF" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;"><!-- content --><div class="content" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; max-width: 600px; display: block; margin: 0 auto; padding: 0;"><table style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; margin: 0; padding: 0;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">'.$body.'<p style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6; font-weight: normal; margin: 0 0 10px; padding: 0;">Muchas gracias!, <em><a href="http://www.milugar.com">milugar.com</a></em></p></td></tr></table></div><!-- /content --> </td><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td></tr></table><!-- /body --><!-- footer --><table class="footer-wrap" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; width: 100%; clear: both !important; margin: 0; padding: 0;"><tr style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td><td class="container" style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto; padding: 0;"></td><td style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;"></td></tr></table><!-- /footer --></body></html>';

		$this->correo->Subject = utf8_decode($subject);

		$this->correo->Body = $cuerpo;

		$this->correo->AddAddress('milugar.sa@gmail.com');

		$this->correo->Send();
		$this->correo->ClearAddresses();

		return $this->correo->ErrorInfo;
   	}
}