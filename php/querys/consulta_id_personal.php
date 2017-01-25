<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");

  $query = "SELECT COUNT(id_personal) AS 'contador' FROM tbl_personal";

  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);
	$contador = $row['contador'];
  $datos = array(
    'contador' => $row['contador'];
  );
  json_encode($datos);
