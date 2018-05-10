<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>American School Way</title>
	<link rel="stylesheet" type="text/css" href="css/contactenos.css">
	<link rel="stylesheet" type="text/css" href="./js/libraries/bootstrap-4.1.1/dist/css/bootstrap.min.css"  integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./js/libraries/jquery-ui/jquery-ui.min.css">
	<script type="text/javascript" src="./js/libraries/jquery-ui/external/jquery/jquery.js"></script>
	<script type="text/javascript" src="./js/libraries/jquery-ui/jquery-ui.js"></script>
	<script type="text/javascript" src="./js/libraries/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="./js/contactenos/contactenos.js"></script>
</head>
</head>
<body>
	<div class="container-fluid">
		<div class=" container-fluid">
			<div class="col-lg-12" style="height: 66px"></div>
		</div>
		<div class=" jumbotron offset-lg-8 col-xs-10 offset-md-4 col-md-8 col-lg-4 ">
			<center>
			<img src="img/logo.png" class=" text-center img-fluid">
			</center>
			<div id="mensajeRepuesta">
			</div>
			<form id="formContactenos" method="POST">
				<input type="hidden" name="utm_source" value="<?php echo $_GET['utm_source']; ?>">
			  <div class="form-group">
			    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y apellido">
			    <span name='error_name'></span>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="correo" name="correo" placeholder="Email">
			    <span name='error_correo'></span>
			  </div>
			  <div class="form-group">
			    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
			    <span name='error_telefono'></span>
			  </div>
			  <div class="form-group">
			    <select class="form-control" id="ciudad" name="ciudad">
			    	<option value="">Ciudad</option>
			    	<option value="1">Bogotá</option>
			    </select>
			    <span name='error_ciudad'></span>
			  </div>
			  <div class="form-group">
			    <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje"></textarea>
			    <span name='error_mensaje'></span>
			  </div>
			  <button name="contactenos" id="contactenos" class="btn btn-success btn-block btn-lg">Contácteme</button>
			</form>
		</div>
		<div class="offset-lg-8 col-xs-10 offset-md-4 col-md-8 col-lg-4 " style="color: #fff">
			<b>Tus datos estan seguros con nosotros Ley 1581 de 2012</b>
		</div>
	</div>
</body>
</html>