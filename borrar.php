<?php
	include 'session.php';
	$id=0;
	$filtro="";
	$filtroTarea = 3;

	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);


	$id = $_GET["id"];
	$filtro=$_GET["filtro"];
	$filtroTarea=$_GET["filtroTarea"];

    $sql = "DELETE FROM todo where id=$id";
	$resultado_consulta=mysqli_query($conexion,$sql);
		if($resultado_consulta){
			echo "update exitoso";
			 header("Location: interfas.php?filtro=$filtro&filtroTarea=$filtroTarea");  
		}
		else {
			echo "no se pudo <br>";
			// header("Location: error.php"); 
		}
 ?>