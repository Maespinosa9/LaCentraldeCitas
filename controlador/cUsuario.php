<?php
include("modelo/mUsuario.php");
include ("modelo/mPagina.php");	

$ins = new mUsuario();
$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"]:NULL;
$pass = isset($_POST["pass"]) ? $_POST["pass"]:NULL;
$preg = isset($_POST["preg"]) ? $_POST["preg"]:NULL;
$res = isset($_POST["res"]) ? $_POST["res"]:NULL;
$mail = isset($_POST["mail"]) ? $_POST["mail"]:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
$IdTipoUsu = isset($_POST["TipoUsu"]) ? $_POST["TipoUsu"]:NULL;

$TipoUsu = $ins->seltipoUsu();

date_default_timezone_set("America/Bogota");
$date = date('Y/m/d H:i:s');

if ($Nombre && $pass && $preg && $res && $mail && $IdTipoUsu && !$actu){
	$ins->insUsu($IdTipoUsu, $Nombre, $pass, $date, $preg, $res, $mail);
}

//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idUsuario)as Npe FROM usuario";  
	if($filtro) $conp.= " WHERE usuario.Nombre LIKE '%".$filtro."%'";

?>