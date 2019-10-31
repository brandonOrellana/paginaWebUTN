<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html>
<link rel="StyleSheet" href="estilos.css" type="text/css">
<head>
	<title>REGISTRO USUARIO</title>
				<style>
			form { 
			  display: block;
			  margin-top: 0em;
			}
</style>
</head>
<body>
					<div id="cabecera">
						Registrar usuario
						<span id="usuario">Usuario:<?php echo $usuario ?> </span>
					</div><br>
		<form method="post" action="registroUsuarios.php"> 
		<span class="label success">Nombre usuario: </span>
			<input type="text" name="usuario" required><br><br>
		<span class="label success">Contrasenia: </span>
			<input type="text" name="contrasenia" required><br><br>
		<span class="label success">Email: </span>
			<input type="text" name="email" required><br><br>
		<span class="label success">Nombre completo: </span>
			<input type="text" name="nombre" required><br><br>

			<button type="submit">Guardar</button>
		</form>

</body>
</html>




<?php 
   if(!isset($_POST['usuario'])){echo "no mandaste usuario";die();}
   if(!isset($_POST['contrasenia'])){echo "no mandaste contrasenia";die();}
   if(!isset($_POST['email'])){echo "no mandaste email";die();}
   if(!isset($_POST['nombre'])){echo "no mandaste nombre";die();}

   if(empty($_POST['usuario'])){echo "usuario esta vacio";die();}
   if(empty($_POST['contrasenia'])){echo "contrasenia esta vacio";die();}
   if(empty($_POST['email'])){echo "email esta vacio";die();}
   if(empty($_POST['nombre'])){echo "nombre esta vacio";die();}


	$usuario=$_POST['usuario'];
	$contraseniaUsuario=$_POST['contrasenia'];
	$email=$_POST['email'];
	$nombre=$_POST['nombre'];


	$fecha= date("Y-m-d");


	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);

$sql = "INSERT INTO `usuarios`(usuario,email,nombre,fecha,clave) VALUES ('$usuario','$email','$nombre','$fecha','$contraseniaUsuario')";
	$resultado_consulta=mysqli_query($conexion,$sql);


		if($resultado_consulta){
			echo "Registro exitoso";
			if($resultado_consulta) header("Location: interfas.php"); 
		}
		else {
			echo "no se pudo hacer el update";
			header("Location: error.php"); 
		}



	
 ?>
 



