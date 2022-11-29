<?php

if(isset($_POST)){


	require_once 'includes/conexion.php';

	
	//Recoger datos del formulario de actualizacion
	$nombre 	= isset($_POST['nombre']) ? $_POST['nombre'] : false;
	$apellidos  = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
	$email 		= isset($_POST['email']) ? trim($_POST['email']) : false;
	


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

	$guardar_usuario = false;
	
	if (count($errores) == 0) {
		$usuario = $_SESSION['usuario'];
		$guardar_usuario = true;

		//comprobar si el mail ya existe

		$sql = "SELECT id, email FROM usuarios WHERE email = '$email'";
		$isset_email = mysqli_query($db, $sql);
		$isset_user = mysqli_fetch_assoc($isset_email);

		if($isset_user['id'] == $usuario['id'] || empty($isset_user)){
			// Actualizar usuario en la tabla usuarios de la BBDD
			$usuario = $_SESSION['usuario'];
			$sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', email = '$email' WHERE id = ".$usuario['id'];
			$guardar = mysqli_query($db, $sql);

			if($guardar){
				$_SESSION['usuario']['nombre'] = $nombre;
				$_SESSION['usuario']['apellidos'] = $apellidos;
				$_SESSION['usuario']['email'] = $email;
				$_SESSION['completado'] = "Tus datos se han actualizado con exito";
				
			}else{
				$_SESSION['errores']['general'] = "Fallo al actualizar!";
			}

		}else{
			$_SESSION['errores']['general'] = "El mail ya existe!";
		}

	}else{
		$_SESSION['errores'] = $errores;
	}

}

header('location: mis-datos.php');