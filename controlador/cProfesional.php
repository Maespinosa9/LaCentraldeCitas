<?php
include("modelo/mProfesional.php");
include ("modelo/mPagina.php");	

$ins = new mProfesional();

$delete = isset($_GET["del"]) ? $_GET["del"]:NULL;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$pac = isset ($_GET["pac"]) ? $_GET["pac"]:NULL;
$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;

$PriApe = isset($_POST["PriApe"]) ? $_POST["PriApe"]:NULL;
$SegApe = isset($_POST["SegApe"]) ? $_POST["SegApe"]:NULL;
$PriNom = isset($_POST["PriNom"]) ? $_POST["PriNom"]:NULL;
$SegNom = isset($_POST["SegNom"]) ? $_POST["SegNom"]:NULL;
$TipoDoc = isset($_POST["TipoDoc"]) ? $_POST["TipoDoc"]:NULL;
$Ide = isset($_POST["Ide"]) ? $_POST["Ide"]:NULL;
$Reg = isset($_POST["Reg"]) ? $_POST["Reg"]:NULL;
$mail = isset($_POST["mail"]) ? $_POST["mail"]:NULL;
$Dire = isset($_POST["Dire"]) ? $_POST["Dire"]:NULL;
$Tel = isset($_POST["Tel"]) ? $_POST["Tel"]:NULL;
$Cel = isset($_POST["Cel"]) ? $_POST["Cel"]:NULL;
$Conm = isset($_POST["Conm"]) ? $_POST["Conm"]:NULL;
$Obs = isset($_POST["Obs"]) ? $_POST["Obs"]:NULL;
$IdUsu = isset($_POST["IdUsu"]) ? $_POST["IdUsu"]:NULL;

If ($PriApe && $PriNom && $TipoDoc && $Ide && $Reg && $IdUsu && !$actu){
	echo "entro";
	$ins->insProf($IdUsu, $TipoDoc, $Ide, $PriApe, $SegApe, $PriNom, $SegNom, $Reg, $Dire, $Tel, $Cel, $mail, $Obs, $Conm);
}

$Tipoide = $ins->SelTipoId();
$TipoUsu = $ins->SelUsu();

//Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pag = new mpagina($nreg);
	$conp ="SELECT count(idProfesional)as Npe FROM Profesional";  
	if($filtro) $conp.= " WHERE Profesional.Nombre LIKE '%".$filtro."%'";


?>