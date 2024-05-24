<?php
	$conexion = null;

	/*-----------------Funcion conectar con la bbdd-----------------*/
	function conectar()
	{	
		global $conexion;
		$conexion = mysqli_connect('localhost','root','','user_bbdd');
	}


	/*-----------------Funcion obtener categorias (Calculadoras)-----------------*/
	function getCategorias()
	{
		global $conexion;
		$respuesta = mysqli_query($conexion, "SELECT * FROM categorias");

		return $respuesta->fetch_all();
	}


	/*-----------------Funcion DESconectar con la bbdd-----------------*/
	function desconectar()
	{
		global $conexion;
		mysqli_close($conexion);
	}

	
	/*-----------------Funcion Validar login usuario-----------------*/
	function validarLogin($usuario, $clave)
	{
		global $conexion;
		$consulta="SELECT * FROM usuarios WHERE usuario='".$usuario."' AND clave='".$clave."'";
		$respuesta = mysqli_query($conexion, $consulta);

		if( $fila=mysqli_fetch_row($respuesta))
		{
			session_start();
			$_SESSION['usuario'] = $usuario;
			return true;
		}
		return false;
	}
	

	/*-----------------Verificar sesion iniciada-----------------*/
	function haIniciadoSesion()
	{
		global $conexion;
		session_start();
		return isset( $_SESSION['usuario']);
	}
?>