<?php
//Clase de conexión con las bases de datos de mysql
// class conexion{
// 	var $link;
// 	var $resultado;

// 	function conexion(){}

// 	function conectarBD(){
// 		include("configuracion.php");
// 		$this->link = mysql_connect($serv_db,$usu_db,$pass_db);
// 		if (!$this->link){
// 			die("<h5>No se logro realizar la conexion</h5>");
// 		}
// 		$db2= mysql_select_db($db);
// 		if (!$db2)		{
// 			echo "no se puede conectar db";
// 		}
// 	}

// 	function desconectarBD(){
// 		mysql_close($this->link);
// 	}

// 	function ejeCon($con, $op){
// 		$this->resultado = mysql_query($con) or 
// 		die("La consulta fallo: ".mysql_error());
// 		if ($op==0){
// 			while ($linea = mysql_fetch_array($this->resultado)){
// 				$arrayResultado[] = $linea;
// 			}
// 		}else{
// 			$arrayResultado[] =0;
// 		}
// 		$resarr = isset($arrayResultado) ? $arrayResultado:NULL;
// 		if($resarr){
// 			return $arrayResultado;
// 		}
// 	}
// }


//Clase de Conexión base de datos sql

class conexion{
	var $link;
	var $resultado;

	function conexion(){}

	function conectarBD(){
		include("configuracion.php");
		$serverName = "serverName\sqlexpress"; //serverName\instanceName
		$connectionInfo = array( "Database"=>$db, "UID"=>$usu_db, "PWD"=>$pass_db);
		$this->link = sqlsrv_connect( $serverName, $connectionInfo);

		if( $this->link ) {
		     echo "Conexión establecida.<br />";
		}else{
		     echo "Conexión no se pudo establecer.<br />";
		     die( print_r( sqlsrv_errors(), true));
		}
	}

	function desconectarBD(){
		sqlsrv_close( $conn );
	}

	function ejeCon($con, $op){
		$this->resultado = sqlsrv_query($this->link, $con) or 
		die("La consulta fallo: ".sqlsrv_errors());
		if ($op==0){
			while ($linea = sqlsrv_fetch_array ($this->resultado)){
				$arrayResultado[] = $linea;
			}
		}else{
			$arrayResultado[] =0;
		}
		$resarr = isset($arrayResultado) ? $arrayResultado:NULL;
		if($resarr){
			return $arrayResultado;
		}
	}
}
?>