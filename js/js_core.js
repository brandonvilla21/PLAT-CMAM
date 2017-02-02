function precargarPaginaIndex(){

	//Carga los divs a la pagina Index.php

	/**** En el index no se carga la cabecera, pues es una seccion indepediente*/

	//Carga del menu de navegación:
	$("#div_menu_navegacion").load("html/div/div_menu_navegacion.php");

	//Carga de pie de pagina:
	$("#div_pie_pagina").load("html/div/div_pie_pagina.php");

	//Carga de formulario de login
	$("#div_login").load("html/div/div_login.php");

}

function precargarPagina(){
	//Carga de la cabecera:
	$("#div_cabecera").load("../div/div_cabecera.php");

	//Carga del menu de navegación:
	$("#div_menu_navegacion").load("../div/div_menu_navegacion.php");

	//Carga de pie de pagina:
	$("#div_pie_pagina").load("../div/div_pie_pagina.php");

	//Carga de formulario de login
	$("#div_login").load("../div/div_login.php");

}

function setValue(id_elemento, nuevo_valor){
	//Asigna un nuevo valor al elemento:
	$("#"+id_elemento).prop('value', nuevo_valor);
}


function setReadOnly(id_elemento, valor){
	//Asigna un nuevo valor al elemento:
	$("#"+id_elemento).prop('readonly', valor);
}



function introducirNumeroControlAlumno(id_elemento){
	setValue('id_alumno', "");
	setReadOnly('id_alumno', false);
}



function generarNumeroControlAlumno(nivel, grupo, int_total_alumnos){

	string_total_alumnos = int_total_alumnos.toString();
	//alert("Longitud de nuemro  " + string_total_alumnos.length);
	// //Año:
	var fecha = new Date();
	var ano =  fecha.getFullYear().toString();


	while (string_total_alumnos.length<3){
    string_total_alumnos = '0' + string_total_alumnos;
	}

	//alert("Numero de alumnos acompletados: " + string_total_alumnos);
	//Forma del numero de control: [TIPO DE USUARIO] + [NIVEL] + [GRUPO] + [AÑO] + [NUMERO DE ALUMNO].
	numero_control = "A" + nivel + grupo + ano.charAt(2) + ano.charAt(3) + string_total_alumnos;

	setReadOnly('id_alumno', true);


	$("#id_alumno").prop('value', numero_control);
}


function generarCurp(apellido_paterno, apellido_materno, nombre, fecha_nacimiento, sexo, id_elemento){
	//Este metodo genera los primeros 12 digitos aproximados de la curp.
	var curp;

	// Generar parcialmente la CURP:
	curp = apellido_paterno.toString().charAt(0) +
		apellido_paterno.toString().charAt(1) +
		apellido_materno.toString().charAt(0) +
		nombre.toString().charAt(0) +
		fecha_nacimiento.toString().charAt(2) +
		fecha_nacimiento.toString().charAt(3) +
		fecha_nacimiento.toString().charAt(5) +
		fecha_nacimiento.toString().charAt(6) +
	 	fecha_nacimiento.toString().charAt(8) +
	 	fecha_nacimiento.toString().charAt(9) +
	 	sexo;

	// Enviarla al elemento especificado
	setValue(id_elemento, curp.toUpperCase());
}

function consultaAlumno() {
	//Obtiene el id del alumno y lo almacena en una variable
	var id_alumno = document.getElementById("id_alumno").value;
	if (id_alumno != "") {
		//Llama al archivo consulta_alumno.php pasando como parametro el id del alumno
		$("#div_resultado").load("../../php/querys/consulta_alumno.php", {
			'id_alumno': id_alumno
		});
	}

}

function consultaAlumnoArresto() {
	//Obtiene el id del alumno y lo almacena en una variable
	var id_alumno = document.getElementById("id_alumno").value;
	if (id_alumno != "") {
		//Llama al archivo consulta_alumno.php pasando como parametro el id del alumno
		$("#div_resultado").load("../../php/querys/consulta_alumno_arresto.php", {
			'id_alumno': id_alumno
		});
	}
}


function consultaPersonal() {
	//Obtiene el id del personal y lo almacena en una variable
	var id_personal = document.getElementById("id_personal").value;
	if (id_personal != "") {
		//Llama al archivo consulta_personal.php pasando como parametro el id del personal
		$("#div_resultado").load("../../php/querys/consulta_personal.php", {
			'id_personal': id_personal
		});
	}

}

function modificaAlumno() {
	//Obtiene el id del alumno y lo almacena en una variable
	var id_alumno = document.getElementById("id_alumno").value;
	//Llama al archivo consulta_alumno.php pasando como parametro el id del alumno
	$("#div_resultado").load("../../php/querys/modifica_alumno.php",{
		'id_alumno': id_alumno
	});

}

function modificaPersonal() {
	//Obtiene el id del personal y lo almacena en una variable
	var id_personal = document.getElementById("id_personal").value;
	//Llama al archivo consulta_personal.php pasando como parametro el id del personal
	$("#div_resultado").load("../../php/querys/modifica_personal.php",{
		'id_personal': id_personal
	});

}

function getAlumno() {

	var id_alumno = document.getElementById("id_alumno_pago").value;

	$.ajax({
		type		: "GET",
		url 		: "../../php/querys/consulta_datos_alumno.php",
		data		: {
			'id_alumno' : id_alumno
		},
		success : function(response) {
			/*En la variable json contendra todo el JSON que se obtuvo de la consulta*/
			var json= JSON.parse(response);

			document.getElementById('h4__datosAlumno').innerHTML = 'Datos del alumno:';
			document.getElementById('span__lineaAlumno').innerHTML = '<hr>';
			document.getElementById('span__lineaPago').innerHTML = '<hr>';

			/*Por medio de un for, accede a todo el JSON y manda los datos por getElementById()*/
			for (var variable in json) {
				document.getElementById(`a__${variable}_alumno`).innerHTML = json[variable];
			}
			document.getElementById('img__foto_alumno').src = '../../img/itcg_logo.jpg';
			document.getElementById('div_pago').style.display = 'visible';
		},
		error   : function(xhr, ajaxOptions, thrownError) {
			alert("Error: "+ xhr.status);
			alert(thrownError);
		}
	});
}

function getDatosPago() {
	var id_concepto = document.getElementById("id_concepto_pago").value;

	$.ajax({
		type		: "GET",
		url 		: "../../php/querys/consulta_concepto_pago.php",
		data		: {
			'id_concepto_pago' : id_concepto
		},
		success : function (response) {
			var json = JSON.parse(response);
			document.getElementById("descripcion__pago").innerHTML = `DESCRIPCION: ${json['descripcion']}`;
			document.getElementById("precio__pago").innerHTML = `PRECIO: $${json['precio']}`;
		},
		error   : function(xhr, ajaxOptions, thrownError) {
			alert("Error: "+ xhr.status);
			alert(thrownError);
		}
	});
}
