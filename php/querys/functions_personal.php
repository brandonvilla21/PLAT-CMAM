<?php

	//Consultas rápidas para un elemento del personal (individualmente).
  function getFoto($id_personal, $conexion){
		$sql = "SELECT foto FROM tbl_personal WHERE id_personal = '$id_personal'";
		$result = mysqli_query($conexion, $sql);
		$row = mysqli_fetch_array($result);
		return $row['foto'];
	}
?>
