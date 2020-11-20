<?php
include("connect_db.php");

//recibir los datos y almacenarlos en variables

		
		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$telefono = $_POST["telefono"];
		$pass = $_POST["pass"];
		$organizacion_run = $_POST["organizacion_run"];

		//enviaremos la contraseña encriptada a la bd
		$pass = md5($password);
		

		//consulta para insertar
		$consulta = "INSERT INTO registro(nombre, email, telefono, pass, organizacion_run)
					 VALUES ('$nombre', '$email', '$telefono', '$pass', '$organizacion_run')";
		

		//verificar usuario no este duplicado

		$verificar_usuario = mysqli_query($conexion, "SELECT * FROM registro WHERE organizacion_run = '$organizacion_run'");
		if (mysqli_num_rows($verificar_usuario) > 0){
			echo "<script> alert('La organizacion ya esta registrada');
			window.location = 'registro.php';
			</script>";
			exit;
		}
		//verificar que el email no este duplicado
		
		$verificar_email = mysqli_query($conexion, "SELECT * FROM registro WHERE email = '$email'");
		if (mysqli_num_rows($verificar_email) > 0){
			echo "<script> alert('El correo ya esta registrado');
			window.location = 'registro.php';
			</script>";
			
			exit;
		}

		//ejecutar consulta
		$resultado = mysqli_query($conexion,$consulta);
		if(!$resultado){
			echo "<script> alert('Error al registrarse');
			window.location = 'registro.php';
			</script>";
		}else{
			echo "<script> alert('Usted a sido registrado');
			window.location = 'registro.php';
			</script>";
		}
	//cerrar conexion
	mysqli_close($conexion);
	

?>	