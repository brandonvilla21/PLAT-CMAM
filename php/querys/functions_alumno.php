<?php

	//Consultas rápidas para un alumno individual.


	function getNombre($id_alumno, $conexion){
		$sql = "SELECT nombre FROM tbl_alumno WHERE id_alumno = '$id_alumno'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['nombre'];
	}

	function getFoto($id_alumno, $conexion){
		$sql = "SELECT foto FROM tbl_alumno WHERE id_alumno = '$id_alumno'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['foto'];
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


	function getHistorialArrestos($id_alumno, $conexion){
		//Retorna un arreglo de tbl_arresto
		$query = "SELECT id_arresto, id_alumno, motivo, fecha, horas, puntos, estado
				  FROM tbl_arresto
				  WHERE id_alumno = '$id_alumno'";
				  $result = mysqli_query($conexion, $query);
	  	return $result;
	}

	function imprimirHistorialArresto($result){
		while($row = mysqli_fetch_array($result)) {
			echo '<tr>';
				echo '<td>'. $row['id_arresto'] .'</td>';
				echo '<td>'. $row['motivo'] .'</td>';
				echo '<td>'. $row['fecha'] .'</td>';
				echo '<td>'. $row['horas'] .'</td>';
				echo '<td>'. $row['puntos'] .'</td>';
				echo '<td ';
				if($row['estado'] == 'DEBIDO'){
					 echo ' style="background-color: #fdbab3 ;" ';
				}
				echo '>' . $row['estado'] . '</td>';
			echo '</tr>';
		}
	}

 	function getEstadoCuenta($id_alumno, $conexion, $query){
	  $result = mysqli_query($conexion, $query);
  	return $result;
	}

	function imprimirEstadoCuenta($result){
		while($row = mysqli_fetch_array($result)) {
			$debe  						= $row['saldo_deudor'];
			$abono 						= $row['saldo_acredor'];
			$id_estado_cuenta = $row['id_estado_cuenta'];
			echo '<tr>';
				echo '<td>'. $row['descripcion'] .'</td>';
				echo '<td>'. "$".$row['total'] .'</td>';
				echo '<td>'. "$".$abono .'</td>';
				echo '<td>'. "$".$debe .'</td>';
				if($debe > 0 ){
					echo '<td ';
					echo ' style="background-color: #fdbab3 ;" ';
					echo '><a href ="../../html/pag/consultar_abono.php?mensaje='.$id_estado_cuenta.'">' . "DEBE" . '</a></td>';

				} else {
					echo '<td>PAGADO</td>';
				}
			echo '</tr>';
		}
	}






?>
