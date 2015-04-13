<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="stylesheet" href="css/style1.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
	  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<title>..:::Central de Citas:::..</title>
</head>

<body>
	<center>
		<div id="contenedor">
			<div id="encabe">
				<?php
					include("vista/cabezote.php");
				?>
			</div>
			<div id="menu">
				<?php
					include("vista/menu.php");
				?>
			</div>
			<div id="contenidorc">
				<?php  
					$Pac = isset($_GET["pac"]) ? $_GET["pac"] : NULL;
					$Up = isset($_GET["up"]) ? $_GET["up"] : NULL;
					if (is_null($Pac)) {
						include("vista/vPrin.php");
					} else if ($Pac == "101") {
						if (is_null($Up)) {
							include("vista/vUsuario.php");
						}else{
							include("vista/vUsuario1.php");
						}
					}else if ($Pac == "102"){
						include("vista/vTipoUsuario.php");
					}else if ($Pac == "103"){
						include("vista/vTipoIdentificacion.php");
					}else if ($Pac == "104"){
						include("vista/vProfesional.php");
					}else if ($Pac == "105"){
						include("vista/vSuscripcion.php");
					}
				?>
			</div>
		</div>
	</center>
</body>
</html>
