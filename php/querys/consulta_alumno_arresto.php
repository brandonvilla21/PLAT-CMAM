<?php
	header("Content-Type: text/html;charset=utf-8");
	include("../conexion_db_cmam.php");
	include("functions_alumno.php");

	/*Seleciona la base de datos a utilizar*/
	mysqli_select_db($conexion, $base_de_datos)
		or die("Ha fallado la conexion con la base de datos");

	$id_alumno = mb_strtoupper($_POST['id_alumno'],'utf-8');
	//$myQuery = "SELECT * FROM tbl_alumno WHERE id_alumno='".$id_alumno."'";
  	$query = "SELECT 
  			id_alumno, 
  			nombre, 
  			apellido_paterno, 
  			apellido_materno, 
  			rango,
  			puntos_demerito,
  			horas_arresto,
  			foto 
			FROM tbl_alumno
			WHERE id_alumno = '$id_alumno'";

	$result = mysqli_query($conexion, $query);

  /*Almacena los datos en variables*/
	while($row = mysqli_fetch_array($result)) {
	    $id_alumno        = $row['id_alumno'];
	    $nombre           = $row['nombre'];
	    $apellido_paterno = $row['apellido_paterno'];
	    $apellido_materno = $row['apellido_materno'];
		$rango	  		  =	$row['rango'];
		$horas_arresto    = $row['horas_arresto'];
		$puntos_demerito  = $row['puntos_demerito'];
		
		$foto 			  = $row['foto'];

	}
?>

<div id="div_frm_registrar">
	<?php
    /*
    * Con ese metodo se identifica si se encontro o no
    * al alumno.
    * isset() Regresa TRUE si la variable es definida
    *         Regresa FALSE si la variable es indefinida
    */
    if (isset($nombre)) {
    ?>
		<h2 id="encontrado_h2">Datos generales del alumno</h2><hr>
	    <div id="div_encontrado">
			<table class="tbl_lista_verde_simple" >
				<tr>
				    <th style="width: 70em;">No. de control:</th>
				    <th style="width: 400em;">Alumno:</th>
				    <th style="width: 100em;">Grado: </th>
				    <th style="width: 35em;">Horas de arresto</th>
				    <th style="width: 35em;">Pts. de demerito: </th>		    
			  	</tr>
			  	<tr>
				  	<td> <input type="text" name="id_alumno" value="<?php echo $id_alumno?>" class="estilo_heredado" readonly form="alta_arresto" style="border: none"></td>
				    <td><?php echo $nombre. " " . $apellido_paterno . " " .  " " . $apellido_materno ?></td>
				    <td><?php echo $rango ?></td>
				    <td><?php echo $horas_arresto ?></td>
				    <td><?php echo $puntos_demerito ?></td>			    
				</tr>
			</table>
		</div>

		<div>
			<br>
			<form id="alta_arresto" method="post" action="../../php/querys/alta_arresto.php" name="alta_arresto">
				<label>Motivo de arresto:</label>
				<br>
				<textarea name="motivo" class="input_frm" form="alta_arresto" style="width: 500px; height: 60px" required="true" maxlength="300"></textarea>

				<br><br>
				<label>Total de horas:</label> 
				<input class="input_frm"  type="number" value="1" min="0.00" name="horas" step="1" style="width: 75px;">
				<span class="espacio_horizontal_30px "></span>
				<label>Puntos de demérito:</label> 
				<input class="input_frm"  type="number" value="1" min="0.00" name="puntos" step="1" style="width: 75px;">
				<br><br>
				<input type="submit" class="btn_aceptar" name="btn_aceptar" value="Cargar arresto">
				<br>
			</form>
			<br>
		</div>

		<hr>

		<div>
			<h3> Historial de arrestos </h3>
			<!-- Historial:  -->
			<table class="tbl_lista_verde_simple" >
				<tr>
				    <th style="width: 30em;">Id de arresto</th>
				    <th style="width: 100em;">Motivo </th>
				    <th style="width: 40em;">Fecha</th>
				    <th style="width: 20em;">Horas</th>
				    <th style="width: 20em;">Puntos</th>
				    <th style="width: 30em;">Estado</th>
			  	</tr>

			  	<?php 
			  		
			  		$result = getHistorialArrestos($id_alumno, $conexion);

				  	imprimirHistorialArresto($result);
		  		?>

			</table>

		</div>


    <?php
    } 
    else { 
    ?>
		<div id="div_no_encontrado">
			<h2>No se encontro al alumno</h2>
		</div>
    <?php } ?>
</div>
