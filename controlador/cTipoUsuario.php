<?php
include("modelo/mTipoUsuario.php");
include ("modelo/mPagina.php");


$ins = new mTipoUsuario();
$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$Nombre = isset($_POST["Nombre"]) ? $_POST["Nombre"]:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

if ($Nombre && !$actu){
	$ins->insTipoUsu($Nombre);
}


//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idTipoUsuario)as Npe FROM TipoUsuario";  
	if($filtro) $conp.= " WHERE TipoUsuario.Nombre LIKE '%".$filtro."%'";
?>