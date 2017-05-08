<?php

	include_once('conectar.php');
	$codigo_activacion=$_POST['codigo_activacion'];
	$descripcion=$_POST['descripcion'];
	
	
	$q3="select * from codigo_activacion where codigo='$codigo_activacion'";
	$result3=mysql_query($q3,$conectar);
	$cantidad3=mysql_num_rows($result3);
	
	if($cantidad3>0){
			
	session_start();
	$rif=$_SESSION['rif'];
	
	$q="insert into solicitud values(NULL,'$descripcion','$rif',NOW(),'Por Confirmar')";
	$result=mysql_query($q,$conectar);
	
	$q2="select * from solicitud order by codigo desc";
	$result2=mysql_query($q2,$conectar);
	$num_solicitud=mysql_result($result2,0,0);
	
	$_SESSION['solicitud']=$num_solicitud;
	
	echo "<script type='text/javascript' >alert('Solicitud Generada numero: $num_solicitud'); location.href='../cliente.php'</script>";
	
	}
	else
	{
		echo "<script type='text/javascript' >alert('Codigo Invalido'); location.href='../cliente.php'</script>";	
	}
	
	

?>