<?php

	include_once('conectar.php');
	
	$usuario=$_POST['usuario_nuevo'];
	$contra=$_POST['contraseña_nueva'];
	$rcontra=$_POST['re_contraseña'];
	$rif=$_POST['rif'];
	$empresa=$_POST['empresa'];
	$direccion=$_POST['direccion'];
	$telefono=$_POST['telefono'];
	$cedula=$_POST['cedula'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$correo=$_POST['correo'];
	
	
	if($contra==$rcontra){
		
		$q="insert into empresa values('$rif','$empresa','$direccion','$telefono',NOW(),'$cedula','$nombre','$apellido','$correo')";
		
		$result=mysql_query($q,$conectar);
		
		$q2="insert into usuarios values('$usuario','$contra',3,'$rif')";
		$result2=mysql_query($q2,$conectar);
		
		echo "<script type='text/javascript' >alert('Registro Completado'); location.href='../index.html'</script>";	
	}
	else
	{
		echo "<script type='text/javascript' >alert('Contraseñas no coinciden'); location.href='../registro.html'</script>";	
	}

?>