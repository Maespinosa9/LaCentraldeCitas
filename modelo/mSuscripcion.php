<?php
include ("controlador/conexion.php");

class mSuscripcion{
	var $arr;

	function mSuscripcion(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insSus(){
		$sql = ""
	}
}
