<?php
	require 'funciones.php';
	$usuario = $_POST['txtUsuario'];
	$clave = $_POST['txtClave'];
	conectar();

	if (validarLogin($usuario, $clave)) {
		// INICIAMOS SESIÓN
		header('Location: ../user/main.php');
		exit; // Asegura que el script se detenga después de redirigir
	} else {
		// VOLVEMOS AL INDEX
		?>
		<script>
			alert('Los datos ingresados son incorrectos.');
			location.href = "../index.html";
		</script>
		<?php
		desconectar();
	}
?>