<?php
include ("controlador/conexion.php");

class mUsuario{
	var $arr;
	
	function mUsuario(){}

	function cons($c){
		$conexionBD = new conexion();
		$conexionBD->conectarBD();
		$conexionBD->ejeCon($c,1);
	}

	function insUsu($idtipousu, $nombre, $contrasena, $fechaUltContra, $pregunta, $respuesta, $e_mail){
		$sql = "INSERT INTO usuario (IdTipoUsuario, Nombre, Contrasena, FechaUltimaContrasena, PreguntaRecordarContrasena, RespuestaRecordarContrasena, E_mail) values 
		('".$idtipousu."', '".$nombre."','".$contrasena."','".$fechaUltContra."','".$pregunta."','".$respuesta."','".$e_mail."')";
		$this->cons($sql);
	}

	function updUsu($idUsuario, $idtipousu, $nombre, $contrasena, $fechaUltContra, $pregunta, $respuesta, $e_mail){
		$sql = "UPDATE usuario SET IdTipoUsuario='" .$idtipousu. "',Nombre= '".$nombre."',Contrasena= '".$contrasena."',FechaUltimaContrasena='".$fechaUltContra."',PreguntaRecordarContrasena='".$pregunta."',RespuestaRecordarContrasena='".$respuesta."',E_mail='".$e_mail."' WHERE idUsuario = '".$idUsuario."';";
		$this->cons($sql);
	}