<?php

require_once 'includes/conexion.php';

	session_start();


if(isset($_POST)){

	
	//Recoger datos del formulario de registro
	$nombre 	= isset($_POST['nombre']) ? $_POST['nombre'] : false;
	$apellidos  = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
	$email 		= isset($_POST['email']) ? trim($_POST['email']) : false;
	$password 	= isset($_POST['password']) ? $_POST['password'] : false;


	//Array de errores

	$errores = array();

	// Validar los datos antes de guardarlos en la base de datos

	//Validar campo Nombre
	if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
		$nombre_validado = true;
	}else{
		$nombre_validado = false;
		$errores['nombre'] = "El nombre es inválido";
	}

	//Validar campo Apellidos
	if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
		$apellidos_validado = true;
	}else{
		$apellidos_validado = false;
		$errores['apellidos'] = "El apellido es inválido";
	}

	//Validar campo Email
	if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email_validado = true;
	}else{
		$email_validado = false;
		$errores['email'] = "El email es inválido";
	}	

	//Validar campo Password
	if(!empty($password)){
		$password_validado = true;
	}else{
		$password_validado = false;
		$errores['password'] = "La password esta vacía";
	}

	$guardar_usuario = false;
	
	if (count($errores) == 0) {
		$guardar_usuario = true;

		//cifrar la contraseña
		$password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

		// Insertar usuario en la tabla usuarios de la BBDD

		$sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
		$guardar = mysqli_query($db, $sql);

		if($guardar){
			$_SESSION['completado'] = "El registro se ha completado con exito";
		}else{
			$_SESSION['errores']['general'] = "Fallo al guardar el usuario!";
		}


	}else{
		$_SESSION['errores'] = $errores;
		
	}

}

header('location: index.php');