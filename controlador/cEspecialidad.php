<?php
include("modelo/mEspecialidad.php");
include ("modelo/mPagina.php");

$ins = new mEspecialidad();
$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;	
$Espe = isset($_POST["Espe"]) ? $_POST["Espe"]:NULL;	

If ($Espe && !$actu){
	$ins -> insEsp($Espe);
}




//Paginar
	$bo = "";
	$nreg = 20;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(IdEspecialidad)as Npe FROM Especialidad";  
	if($filtro) $conp.= " WHERE Especialidad.Nombre LIKE '%".$filtro."%'";


?>