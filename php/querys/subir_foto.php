<?php
  //Se reciben los datos de la imagen.
  $nombre_img = $_FILES['imagen']['name'];
  $tipo = $_FILES['imagen']['type'];
  $tamano = $_FILES['imagen']['size'];

  //Si existe imagen y tiene un tamaño correcto.
  if (($nombre_img == !NULL) && ($_FILES['imagen']['size'] <= 500000))//500 kb
  {
     //Indicamos los formatos que permitimos subir al servidor, aunque eso ya se hizo en el input de la imagen.
     //Pero por si acaso.
     if (($_FILES["imagen"]["type"] == "image/jpeg")
     || ($_FILES["imagen"]["type"] == "image/jpg")
     || ($_FILES["imagen"]["type"] == "image/png"))
     {
         // Ruta donde se guardarán las imágenes que se suban.
         $directorio = '../../uploads/';

         $resultado = mysqli_query($conexion, $query)
         or die (header('Location: ../../html/pag/alumno_registro_incorrecto.php'));

         // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
         move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio. $foto);

         // //Si no falla, redirecciona a la pagina de registro correcto.
 				 header('Location: ../../html/pag/alumno_registro_correcto.php');
       }
      else
      {
         //si no cumple con el formato
         echo "No se puede subir una imagen con ese formato ";
         //header('Location: ../../html/pag/alumno_registro_incorrecto.php');
      }
  }
  else
  {
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL){
      echo "La imagen es demasiado grande ";
      //header('Location: ../../html/pag/alumno_registro_incorrecto.php');
    }
  }

?>
