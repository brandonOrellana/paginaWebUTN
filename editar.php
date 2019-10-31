<?php 

include 'session.php';

	$id=0;

		/*	$tarea="";
			$descripcion="";
			$limite=0000-00-00;
			$realizada= null;
			$fecha_realizada=0000-00-00;

*/

	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);


	$id = $_GET["id"];

    $sql = "SELECT * FROM todo where id=$id";
	$resultado_consulta=mysqli_query($conexion,$sql);
	if($registro = mysqli_fetch_array($resultado_consulta)){
			$tarea=$registro['tarea'];
			$descripcion=$registro['descripcion'];
			$limite=$registro['limite'];
			$realizada=$registro['realizada'];
}

?>

<html>
<link rel="StyleSheet" href="estilos.css" type="text/css">
	<body>
						<div id="cabecera">
						Edicion de usuario
						<span id="usuario">Usuario:<?php echo $usuario ?> </span>
					</div><br>
		<form method="POST">
			<input type="text" name="tarea" value="<?php echo $tarea; ?>">
			<input type="text" name="descripcion" value="<?php echo $descripcion; ?>">
			<input type="text" name="limite" value="<?php echo $limite; ?>">
			<input type="text" name="realizada" value="<?php echo $realizada?>">
			<button type="submit">Actualizar</button>
		</form>
	</body>
</html>


<?php


		if(!empty($_POST)){
			$tarea=$_POST['tarea'];
			$descripcion=$_POST['descripcion'];
			$limite=$_POST['limite'];
			$realizada=$_POST['realizada'];

            $sql="UPDATE todo SET tarea='$tarea', 
            					descripcion='$descripcion', 
            					limite='$limite', 
            					realizada=$realizada
            					WHERE id=$id";
		$respuesta = mysqli_query($conexion, $sql);
		if($respuesta){
			echo "update exitoso";
			 header("Location: interfas.php");  
		}
		else {
			echo "no se pudo hacer el update<br>";
			// header("Location: error.php"); 
		}

	}
 ?>