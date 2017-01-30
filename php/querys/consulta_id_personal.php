<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");
  $id_alumno = $_GET['id_alumno'];
  //$query = "SELECT COUNT(id_personal) AS 'contador' FROM tbl_personal";
  $query = "SELECT * FROM tbl_alumno WHERE id_alumno ='$id_alumno'";

  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);
	$id = $row['id_alumno'];
  $nombre = $row['nombre'];
  echo $nombre;
  echo $id;

  $datos = array(
    "nombre" => $nombre,
    "id" => $id
  );
  $json =  json_encode($datos);
  echo $json;
