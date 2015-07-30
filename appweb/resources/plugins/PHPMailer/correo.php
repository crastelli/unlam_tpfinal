<?php
require ROOT_DIR._DIR_PLG_.'PHPMailer/phpmailer.php';

class Correo extends PHPMailer {

	var $debug   = TRUE;
	var $Host;
	var $SMTPAuth = true;
	var $Port;
	var $Username;
	var $Password;
	var $From;
	var $FromName;
	var $SMTPSecure;

	public function __construct()
	{
     //vacio
	}

	public function Enviar($subject, $address, $body)
   	{

		$cuerpo= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html><head><title></title><meta http-equiv="Content-Type" content="text/html;charset=utf-8"><meta name="viewport" content="width=320, target-densitydpi=device-dpi"><!--[if gte mso 9]><style _tmplitem="70" >.article-content ol, .article-content ul{margin: 0 0 0 24px;padding: 0;list-style-position: inside;}</style><![endif]--></head><body style="background-color: #ececec;margin: 0;padding: 0;font-family: HelveticaNeue, sans-serif;width: 100% !important;"><table width="100%" cellpadding="0" cellspacing="0" border="0" id="background-table" style="background-color: #ececec;"><tbody><tr style="border-collapse: collapse;"><td align="center" bgcolor="#ececec" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"><table class="w640" style="margin:0 10px;" width="90%" cellpadding="0" cellspacing="0" border="0"><tbody><tr style="border-collapse: collapse;"><td class="w640" width="90%" height="20" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td></tr><tr style="border-collapse: collapse;"><td class="w640" width="90%" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"><table id="top-bar" class="w640" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#004A99" style="border-radius: 6px 6px 0px 0px;-moz-border-radius: 6px 6px 0px 0px;-webkit-border-radius: 6px 6px 0px 0px;-webkit-font-smoothing: antialiased;background-color: #004A99;color: #004A99;"><tbody><tr style="border-collapse: collapse;"><td class="w15" width="15" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td><td class="w255" width="auto" height="16" valign="middle" align="right" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		</td></tr></tbody></table></td></tr><tr style="border-collapse: collapse;">
		<td id="header" class="w640" width="90%" align="center" bgcolor="#004A99" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		<div align="left" style="text-align: left"><img editable="true" width="278" src='."<?php echo BASE_URL._DIR_ASSETS_; ?>images/logo-milugar.png".' class="w640" border="0" align="top" style="display: inline;outline: none;text-decoration: none;">
		</div></td></tr><tr style="border-collapse: collapse;"><td class="w640" width="90%" height="30" bgcolor="#ffffff" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td> </tr><tr id="simple-content-row" style="border-collapse: collapse;"><td class="w640" width="640" bgcolor="#ffffff" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		<table align="left" class="w640" width="100%" cellpadding="0" cellspacing="0" border="0"><tbody>
		<tr style="border-collapse: collapse;"><td class="w30" width="30" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td><td class="w580" width="auto" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		<repeater><layout label="Text only"><table class="w580" width="100%" cellpadding="0" cellspacing="0" border="0">
		<tbody><tr style="border-collapse: collapse;"><td class="w580" width="100%" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		<p align="left" class="article-title" style="font-size: 18px;line-height: 24px;color: #004A99;font-weight: bold;margin-top: 0px;margin-bottom: 18px;font-family: HelveticaNeue, sans-serif;">
		<singleline label="Title"></singleline></p><div align="left" class="article-content" style="font-size: 13px;line-height: 18px;color: #444444;margin-top: 0px;margin-bottom: 18px;font-family: HelveticaNeue, sans-serif;">
		<multiline label="Description">' . utf8_decode($body) . '</multiline></div></td></tr><tr style="border-collapse: collapse;"><td class="w580" width="100%" height="10" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		</td></tr></tbody></table></layout></repeater></td><td class="w30" width="30" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td></tr></tbody></table>
		</td></tr><tr style="border-collapse: collapse;">
		<td class="w640" width="100%" height="15" bgcolor="#ffffff" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td></tr><tr style="border-collapse: collapse;"><td class="w640" width="100%" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"><table id="footer" class="w640" width="100%" cellpadding="0" cellspacing="0" border="0" bgcolor="#004A99" style="border-radius: 0px 0px 6px 6px;-moz-border-radius: 0px 0px 6px 6px;-webkit-border-radius: 0px 0px 6px 6px;-webkit-font-smoothing: antialiased;background-color: #004A99;color: #004A99;">
		<tbody><tr style="border-collapse: collapse;"><td class="w30" width="30" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;">
		</td><td class="w580 h0" width="auto" height="15" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td><td class="w30" width="30" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td></tr></tbody>
		</table></td></tr><tr style="border-collapse: collapse;"><td class="w640" width="100%" height="60" style="font-family: HelveticaNeue, sans-serif;border-collapse: collapse;"></td></tr></tbody></table></td></tr></tbody></table></body></html>';

		$this->Subject = utf8_decode($subject);

		$this->Body = $cuerpo;

		foreach ($address as $row)
		{
			$this->AddAddress($row->email);
			if(!$cc)
			{
				@$this->Send();
				@$this->ClearAddresses();
			}
		}

		if($cc)
		{
			@$this->Send();
			@$this->ClearAddresses();
		}

		$this->ClearAttachments();
		return $this->ErrorInfo;
   	}

	public function send()
	{

		$this->From     	= "milugar.sa@gmail.com";
		$this->FromName 	= "Sistema Envio Mails";
		$this->Password 	= 'milugarsa';

		$server           = "smtp.gmail.com";
		$this->Port       = 465;
		$this->SMTPSecure = "ssl";

		parent::IsSMTP();
		$mail->CharSet  = "UTF-8";
		$this->SMTPAuth = true;
		parent::IsHTML(true);
		$this->Host     = $server;
		$this->Username = $this->From;
		
		//print_r($this);
		parent::Send();

	}

}


?>
