<?php

	include_once('conectar.php');
	
	$rif=$_POST['rif'];
	$empresa=$_POST['empresa'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$fecha=$_POST['fecha'];
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	
	$q="update empresa set empresa='$empresa',direccion='$direccion',telefono='$telefono',fecha_inscrip='$fecha',cedula='$cedula',nombre='$nombre',apellido='$apellido',correo='$correo' where rif='$rif'";
	
	$result=mysql_query($q,$conectar);
	
	echo "<script type='text/javascript'>alert('Empresa Actualizada');location.href='../administrador_empresas.php'</script>";

?>