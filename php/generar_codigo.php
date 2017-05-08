<?php
	
	include_once('conectar.php');

	$usuario=$_POST['combo_usuario'];
	$codigo=rand(10000,32767);
	
	$q="insert into codigo_activacion values('$codigo','$usuario')";
	$result=mysql_query($q,$conectar);
	
	echo "<script type='text/javascript'> alert('Codigo Generado: $codigo'); location.href='../administrador_codigos.php'</script>";
	
?>