<?php
  header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");
  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");
  $id_alumno = $_GET['id_alumno'];
  $query = "SELECT * FROM tbl_alumno WHERE id_alumno ='$id_alumno'";

  $result = mysqli_query($conexion, $query);

  $row = mysqli_fetch_array($result);
	$id               = $row['id_alumno'];
  $apellido_paterno = $row['apellido_paterno'];
  $apellido_materno = $row['apellido_materno'];
  $nombre           = $row['nombre'];
  $calle            = $row['calle'];
  $colonia          = $row['colonia'];
  $ciudad           = $row['ciudad'];
  $nombre_completo  = $nombre . " " . $apellido_paterno . " " . $apellido_materno;
  $direccion        = $calle . ", " .$colonia;

  /*Almacena en un arreglo toda la informacion obtenida de la consulta*/
  $datos = array(
    "id"        => $id,
    "nombre"    => $nombre_completo,
    "ciudad"    => $ciudad,
    "direccion" => $direccion
  );

  /*Genera un JSON con los datos obtenidos del arreglo*/
  $json =  json_encode($datos);

  /*Imprime todo el JSON para que pueda ser obtenido desde la funcion en Javascript*/
  echo $json;
