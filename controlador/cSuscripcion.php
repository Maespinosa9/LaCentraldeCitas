<?php
include("modelo/mSuscripcion.php");
include ("modelo/mPagina.php");	

$ins = new mSuscripcion();
$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
$IdVen = isset($_POST["IdVen"]) ? $_POST["IdVen"]:NULL;
$UsCre = isset($_POST["UsCre"]) ? $_POST["UsCre"]:NULL;
$Prof = isset($_POST["Prof"]) ? $_POST["Prof"]:NULL;

date_default_timezone_set("America/Bogota");
$date = date('Y-m-d H:m:s');


If ($IdVen && $UsCre && $Prof && !$actu){
	$ins->insSus($IdVen, $date, $UsCre, $Prof);
} 

$Vendedor = $ins -> SelUsu();
$Prof = $ins -> SelProf();



//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(s.IdSuscripcion) as Npe, s.*, u.Nombre, p.PrimerNombre, p.segundoNombre, p.PrimerApellido, p.SegundoApellido from suscripcion as s inner join Usuario as u on u.IdUsuario = s.IdVendedor inner join Profesional as P on p.IdProfesional =  s.IdProfesional";
	if($filtro) $conp.= " WHERE p.PrimerNombre LIKE '%".$filtro."%' OR p.segundoNombre LIKE '%".$filtro."%' OR p.PrimerApellido LIKE '%".$filtro."%' OR p.SegundoApellido LIKE '%".$filtro."%'";


?>