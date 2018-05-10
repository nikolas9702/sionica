<?php

include __DIR__.'/../model/contactenosModel.php';
include 'BD.php';
use PHPMailer\PHPMailer\PHPMailer;

class contactenosController 
{
	private $informacion;
	private $camposValida;
	function __construct($informacion )
	{
		$this->informacion = $informacion;
		$this->validarCampos();
	}
	public function validarCampos()
	{
		$this->EnviarCorreo();
		$respuesta = [];
		$this->camposValida = [ "utm_source" ,"name", "correo", "telefono", "ciudad", "mensaje", ];
		foreach ($this->informacion as $key => $value) {
			foreach ($this->camposValida as $key2 => $value2) {
			 	if ($key == $key2 && $value == "") {
			 		$respuesta[$key] = "Campo Obligatorio";
				}
				elseif ($key == "telefono" && ( !is_numeric($value) || strlen($value) < 7 && strlen($value) >  15 )  ) {
			 		$respuesta[$key] = "Telefono no valido";
				}
				elseif ($key == "ciudad" && (!is_numeric($value) )) {
			 		$respuesta[$key] = "Ciudad no valido";
				}
				elseif ($key == "correo" && !filter_var($value, FILTER_VALIDATE_EMAIL) ) {
			 		$respuesta[$key] = "Correo no valido";
				}
			}
		}
		if(count($respuesta) != 0)
			echo json_encode($respuesta);
		else
			echo json_encode(['mensaje' => ($this->setContectonos() == 1) ? 'Su solicitud ha sido un exito ' : 'No puedo agregar su contacto  correctamente ']);
	}
	public function setContectonos()
	{
		$db = new BD;
		$contactenosMode = new contactenosMode;
		return $db->bd->query('insert into '.$contactenosMode->table.' ('.implode(",", $this->camposValida).') values (\''.implode('\',\'', $this->informacion).'\')');
	}
	public function EnviarCorreo()
	{
		$mail = new PHPMailer;

		$mail->isSMTP();

		$mail->SMTPDebug = 0;
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "dilan.gonzalez.garcia@gmail.com";
		$mail->Password = "**************";
		$mail->setFrom('dilan.gonzalez.garcia@gmail.com', 'Dilan Gonzalez');
		$mail->addReplyTo('dilan.gonzalez.garcia@gmail.com', 'Dilan Gonzalez');
		$mail->addAddress('dilan.gonzalez.garcia@gmail.com', 'John Doe');
		$mail->Subject = 'Prueba Sionica Dilan Nicolas Gonzalez Garcia';
		$mail->msgHTML("<hmtl>
			<body>
			</body>
			<h1>Bien hecho has toma la mejor decision de tu vida </h1>
			estudiar Ingles. ".$this->informacion['name']."
			<br> con nuestro esfuerzo lo vamos a lograr <br>
			</html>");
		$mail->AltBody = 'This is a plain-text message body';

		if (!$mail->send()) {
			return true;
		} else {
			return true;
		}
	}
}