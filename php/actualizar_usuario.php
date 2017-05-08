<?php

	$usuario=$_POST['usuario'];
	$contra=$_POST['contra'];
	$cod_nivel=$_POST['nivel'];
		
	include_once('conectar.php');
	
	$q="update usuarios set contra='$contra', cod_nivel=$cod_nivel where usuario='$usuario'";
	$result=mysql_query($q,$conectar);
	
	echo "<script type='text/javascript' >alert('Usuario Actualizado');location.href='../administrador_usuarios.php'</script>";

?>