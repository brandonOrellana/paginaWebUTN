<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html>
<link rel="StyleSheet" href="estilos.css" type="text/css">
<head>
	<title>Formulario</title>
</head>
<body>
					<div id="cabecera">
						Ingresar datos
						<span id="usuario">Usuario:<?php echo $usuario ?> </span>
					</div><br>
		<p><span class="label success">Ingresar tareas: </span></p><br>
		<form method="post" action="ingresoDtos.php"> 
		<span class="label success">Tareas </span>
			<input type="text" name="tarea" required><br><br>
			<span class="label success">Descripcion: </span>
			<input type="text" name="descripcion" required><br><br>
			<span class="label success">Limite </span>
			<input type="text" name="limite" required><br><br>
			<span class="label success">Realizada?(si/no) </span>
			<input type="text" name="realizada" required><br><br>
			<button type="submit">Guardar</button>
		</form>

</body>
</html>




<?php 

   if(!isset($_POST['tarea'])){die("no mandaste tarea");}
   if(!isset($_POST['descripcion'])){die("no mandaste descripcion");}
   if(!isset($_POST['limite'])){die("no mandaste limite");}
   if(!isset($_POST['realizada'])){die("no mandaste realizada");}
 



   if(empty($_POST['tarea'])){die("tarea esta vacio");}
   if(empty($_POST['descripcion'])){die("descripcion esta vacio");}
   if(empty($_POST['limite'])){die("limite esta vacio");}
   if(empty($_POST['realizada'])){die("realizada esta vacio");}
  

	$tarea=$_POST['tarea'];
	$descripcion=$_POST['descripcion'];
	$limite=$_POST['limite'];
	$realizada=$_POST['realizada'];


	$fecha= date("Y-m-d");

	if($realizada=="si"){
		$realizada=1;
	}else{
		$realizada=0;
	}


	$usuarioBase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuarioBase,$contrasenia,$base_de_datos);

$sql = "INSERT INTO `todo`(tarea,descripcion,limite,realizada,fecha,asignadoA) VALUES ('$tarea','$descripcion','$limite',$realizada,'$fecha','$usuario')";
	$resultado_consulta=mysqli_query($conexion,$sql);
	if(!$resultado_consulta){
		die("no se pudo");
	}else{		
		echo "SI SE PUDO";
		header("Location: interfas.php"); 
	}
	

 ?>