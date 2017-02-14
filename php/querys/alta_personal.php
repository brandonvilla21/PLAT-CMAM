<?php
	header("Content-Type: text/html;charset=utf-8");
  include("../conexion_db_cmam.php");

  /*Seleciona la base de datos a utilizar*/
  mysqli_select_db($conexion, $base_de_datos)
    or die("Ha fallado la conexion con la base de datos");

		if($_FILES['foto']['name'] == ''){
			echo "no se seleccionó ningun archivo.";
			$nombre_foto = "NULL.jpg";

		}
		else {

			//Direccion donde se guardarán las fotos:
			$carpeta_fotos = "../../img/foto/";

			//Obtener la extension del archivo.
			$extension = explode("/", $_FILES['foto']['type'])[1];

			//Se establece el tipo de imagen para poder identificar la extensión de la imagen.
			// $extension = $_FILES['foto']['type'];
			// switch ($extension) {
			// 	case "image/jpg":		$extension = "jpg"; 	break;
			// 	case "image/jpeg": 	$extension = "jpg"; 	break;
			// 	case "image/png":  	$extension = "png"; 	break;
			// }

			//Nombre que tendrá la foto = id_personal + extensión. Ejemplo: AS0117000.jpg
			$nombre_foto = mb_strtoupper($_REQUEST['id_personal'],'utf-8') . ".". $extension;

			//Guarda e archivo en una variable
			$archivo = $_FILES['foto']['tmp_name'];

			//Copiar el archivo en a dirección:
			copy($archivo, $carpeta_fotos . $nombre_foto);

		}


  /*Variables que obtienen los datos del formulario*/
  $id_personal      = mb_strtoupper($_REQUEST['id_personal'],'utf-8');
  $contrasena       = $_REQUEST['contrasena'];
  $id_cargo         = mb_strtoupper($_REQUEST['id_cargo'],'utf-8');
  $nombre           = mb_strtoupper($_REQUEST['nombre'],'utf-8');
  $apellido_paterno = mb_strtoupper($_REQUEST['apellido_paterno'],'utf-8');
  $apellido_materno = mb_strtoupper($_REQUEST['apellido_materno'],'utf-8');
	$numero_telefono 	= $_REQUEST['numero_telefono'];
	$numero_celular 	= $_REQUEST['numero_celular'];
	$correo					 	= $_REQUEST['correo'];
	$foto 					  = $nombre_foto;
  /*Sentencia SQL*/
  $query =
  "INSERT INTO `tbl_personal`
  (
    `id_personal`,
    `contrasena`,
    `id_cargo`,
    `nombre`,
    `apellido_paterno`,
    `apellido_materno`,
		`foto`,
		`numero_telefono`,
		`numero_celular`,
		`correo`
  )
  VALUES
  (
    '$id_personal',
    '$contrasena',
    '$id_cargo',
    '$nombre',
    '$apellido_paterno',
    '$apellido_materno',
		'$foto',
		'$numero_telefono',
		'$numero_celular',
		'$correo'
  ) ";
  /*Se ejecuta el query*/
	$resultado = mysqli_query($conexion, $query)

	//Si falla (or die), redirecciona a la pagina de fallo.
		or die (header('Location: ../../html/pag/personal_registro_incorrecto.php'));
				// or die ("No se pudo ejecutar el query " .mysqli_error($conexion) );

		//Si no falla, redirecciona a la pagina de registro correcto.
		header('Location: ../../html/pag/personal_registro_correcto.php');

?>
