<?php

session_start();
if(!isset($_SESSION['id'])){
	die("error");
}
$usuario=$_SESSION['usuario'];
 ?>