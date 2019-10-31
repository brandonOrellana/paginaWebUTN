

<!DOCTYPE html>
<html>
<link rel="StyleSheet" href="estilos.css" type="text/css">
<head>
	<title>INGRESAR	USUARIO</title>

</head>
<body>
					<div id="cabecera">
						Validacion usuario
					</div><br>
		<form method="get" action="validarUsuario.php"> 
		<span class="label success">Nombre usuario: </span>
			<input type="text" name="usuario" required><br><br>
		<span class="label success">Contrasenia: </span>
			 <input type="text" name="contrasenia" required><br><br>

			<button type="submit">Validar</button>
		</form>

<?php
	session_start();

   if(!isset($_GET['usuario'])){echo "no mandaste usuario";die();}
   if(!isset($_GET['contrasenia'])){echo "no mandaste contrasenia";die();}
   if(empty($_GET['usuario'])){echo "usuario esta vacio";die();}
   if(empty($_GET['contrasenia'])){echo "contrasenia esta vacio";die();}




	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);

	$usuario=$_GET['usuario'];
	$contrasenia=$_GET['contrasenia'];

	$sql = "SELECT * from usuarios where usuario like '%$usuario%'";
	$resultado_consulta=mysqli_query($conexion,$sql);
	$vector_fila=mysqli_fetch_array($resultado_consulta);
	$contraseniaCorrecta = $vector_fila['contrasenia'];
	$id = $vector_fila['id'];
	$usuario = $vector_fila['usuario'];


	$password_encriptado = password_hash($contraseniaCorrecta, PASSWORD_BCRYPT);
	$coinciden = password_verify($contrasenia,$password_encriptado);

	$_SESSION['usuario']=$usuario;
	$_SESSION['id']=$id;


		if(!isset($_SESSION['$id'])){
			 header("Location: interfas.php"); 
		}
		else {
			 header("Location: error.php"); 
		}


	if(!$coinciden){
		die("contrasenia invalida");
	}

	if(!$resultado_consulta){
		die("Usuario invalido");
	}else{	
		echo "Usuario valido";
		header("Location: interfas.php"); 
	}


 ?>

</body>
</html>
