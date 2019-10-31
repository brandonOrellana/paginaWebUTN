<?php 
include 'session.php';

	$usuariobase="root";
	$contrasenia="";
	$base_de_datos="todo_td";
	$conexion = mysqli_connect("localhost:3306",$usuariobase,$contrasenia,$base_de_datos);

	$sql="SELECT * from todo";

	$filtro="";


	if(isset($_GET['filtro'])){
		$filtro=$_GET['filtro'];
		$sql="SELECT * from todo where tarea like '%$filtro%'";
		}
	$filtroTarea = 3;

	if(isset($_GET['filtroTarea'])){
		$filtroTarea=$_GET['filtroTarea'];
		if($filtroTarea!=3){
			$sql="SELECT * FROM `todo` WHERE `realizada` = '$filtroTarea' ";
		}
	}

$resultado_consulta=mysqli_query($conexion,$sql);
		?>
					<html>
					<link rel="StyleSheet" href="estilos.css" type="text/css">
					<head>
					    <title>TODO_td</title>
					</head>

					<body>
					<div id="cabecera">
						To-Do	
						<span id="usuario">Usuario:<?php echo $usuario ?> </span>
					</div>
							
					<ul id="menuhorizontal">
						<li><a href='registroUsuarios.php'>Registrar usuarios</a></li>
						<li><a href='validarUsuario.php'>Cambiar Usuario</a><li>
						<li><a href='cambiarContrasenia.php'>Cambiar contrasenia de usuario</a><li>
						<li><a href='ingresoDtos.php'>Ingresar Tarea</a><li>						
					</ul>	
					<br>
					<br>	
					<br>
					<br>				
							<form method="get" action="interfas.php">
							<span class="label success">Filtro Nombre</span>
							<input type="text" name="filtro" placeholder="Filtro" value="<?php echo $filtro ?>">
										<button type="submit">Filtrar</button>
							</form>

							<form method="get" action="interfas.php"> 
							<span class="label success">Filtro de tareas terminadas</span>
									<select name="filtroTarea">
									<option value="1" >Finalizadas</option>
									<option value="0" >SinFinalizadas</option>
									</select>
										<button type="submit">Filtrar</button>
							</form>
								
							<table>
							  <tr>
							    <th>Id</th>
							    <th>Tarea</th>
							    <th>Descripcion</th>
							    <th>Limite</th>
							    <th>Realizada</th>
							    <th>asignadoA</th>
							    <th>--</th>
							    <th>--</th>
							  </tr>		


					<?php

						while($vector_fila=mysqli_fetch_array($resultado_consulta)){
							$e0= $vector_fila["id"];
							$e1= $vector_fila["tarea"];
							$e2= $vector_fila["descripcion"];
							$e3= $vector_fila["limite"];
							$e4= $vector_fila["realizada"]? "si":"no";
							$e5= $vector_fila["asignadoA"];							
							echo"
								  <tr>
								    <td>$e0</td>
								    <td>$e1</td>
								    <td>$e2</td>
								    <td>$e3</td>
								    <td>$e4</td>
								    <td>$e5</td>
								    <td><a id='link' href='editar.php?id=$e0'>Editar</a>
								    <td><a id='link' href='borrar.php?id=$e0&filtro=$filtro&filtroTarea=$filtroTarea'>Borrar</a>
								  </tr>";
						}
					?>
					</table>
					</body>
					</html
	<?php

	mysqli_close($conexion);



	if(!$resultado_consulta){
		die("no se pudo");
	}
	echo "registrado";	




	/*
			<form method="get" action="filtro.php"> 
		Filtro de tareas terminadas<br>
			<select name="filtro">
			<option value="si" >Finalizadas</option>
			<option value="no" >SinFinalizadas</option>

			</select>
			<button type="submit">Filtrar</button>
		</form>
	*/	
 ?>
 