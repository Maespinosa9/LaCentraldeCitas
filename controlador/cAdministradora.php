<?php
include("modelo/mAdministradora.php");
include ("modelo/mPagina.php");	

$ins = new mAdministradora();
$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

$TipoAds = $ins->SelTipoAd();


//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idAdministradora)as Npe FROM Administradora";  
	if($filtro) $conp.= " WHERE Administradora.Nombre LIKE '%".$filtro."%'";

?>