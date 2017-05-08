<?php
	
	include_once('conectar.php');
	
	$nick=$_GET['nick'];
	$mensaje=$_GET['mensaje'];

	$q="insert into contacto values(NULL,'$nick','$mensaje')";
	$result=mysql_query($q,$conectar);

?>