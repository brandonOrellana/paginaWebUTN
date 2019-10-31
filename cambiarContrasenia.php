
<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html>
<link rel="StyleSheet" href="estilos.css" type="text/css">

<head>
	<title>CAMBIAR CONTRASENIA DE USUARIO</title>
</head>
<body>
					<div id="cabecera">
						Cambio de contrasenia
						<span id="usuario">Usuario:<?php echo $usuario ?> </span>
					</div><br>
		<p><span class="label success">Filtro Nombre</span></p><br>
		<form method="get" action="cambiarContrasenia.php"> 
		<span class="label success">Nombre usuario: </span>
			  <input type="text" name="usuario" required><br><br>
		<span class="label success">Contrasenia:  </span>
			  <input type="text" name="contrasenia" required><br><br>
		<span class="label success">ContraseniaNueva:  </span>
				<input type="text" name="contraseniaNueva" required><br><br>

			<button type="submit">Cambiar</button>
		</form>

<?php


   if(!isset($_GET['usuario'])){echo "no mandaste usuario";die();}
   if(!isset($_GET['contrasenia'])){echo "no mandaste contrasenia";die();}
   if(!isset($_GET['contraseniaNueva'])){echo "no mandaste contrasenia";die();}

   if(empty($_GET['usuario'])){echo "usuario esta vacio";die();}
   if(empty($_GET['contrasenia'])){echo "contrasenia esta vacio";die();}
   if(empty($_GET['contraseniaNueva'])){echo "contrasenia esta vacio";die();}

	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);

	$usuario=$_GET['usuario'];
	$contrasenia=$_GET['contrasenia'];
	$contraseniaNueva=$_GET['contraseniaNueva'];

	$sql = "SELECT * from usuarios where usuario like '%$usuario%'";
	$resultado_consulta=mysqli_query($conexion,$sql);
	$vector_fila=mysqli_fetch_array($resultado_consulta);
	$contraseniaCorrecta = $vector_fila['clave'];
	$id = $vector_fila['id'];
	
	$password_encriptado = password_hash($contraseniaCorrecta, PASSWORD_BCRYPT);
	$coinciden = password_verify($contrasenia,$password_encriptado);
	if(!$coinciden){
		die("contrasenia invalida");
	}else{
		//UPDATE `usuarios` SET `clave` = '1234' WHERE `usuarios`.`id` = 1;
		$sql = "UPDATE usuarios SET clave='$contraseniaNueva' WHERE id=$id ";
		$resultado_consulta=mysqli_query($conexion,$sql);
		if($resultado_consulta){
			echo "update exitoso";
			header("Location: interfas.php"); 
		}
		else {
			echo "no se pudo hacer el update";
			header("Location: error.php"); 
		}
	}

	if(!$resultado_consulta){
		die("Usuario invalido");
	}
	

 ?>

</body>
</html>
