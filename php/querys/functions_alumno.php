<?php

	//Consultas rápidas para un alumno individual.


	function getNombre($id_alumno, $conexion){
		$sql = "SELECT nombre FROM tbl_alumno WHERE id_alumno = '$id_alumno'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['nombre'];
	}


	function getHorasArresto($id_alumno, $conexion){
		$sql = "SELECT horas_arresto FROM tbl_alumno WHERE id_alumno = '$id_alumno'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['horas_arresto'];
	}

	function getPuntosDemerito($id_alumno, $conexion){
		$sql = "SELECT puntos_demerito FROM tbl_alumno WHERE id_alumno = '$id_alumno'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['puntos_demerito'];
	}


	




?>
