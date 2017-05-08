<?php
	
	include_once('conectar.php');
	
	$num_solicitud=$_POST['codigo_solicitud'];
	$codigo_producto=$_POST['codigo_producto'];
	$precio=$_POST['precio'];
	$cantidad_solicitada=$_POST['cantidad_solicitada'];
	
	$q2="select * from productos where codigo=$codigo_producto";
	$result2=mysql_query($q2,$conectar);
	$cantidad_disponible=mysql_result($result2,0,4);
	
	if($cantidad_disponible>=$cantidad_solicitada){
		
		$cantidad_nueva=$cantidad_disponible-$cantidad_solicitada;
		
		$q="insert into producto_solicitud values(NULL,$num_solicitud,$codigo_producto,$precio,$cantidad_solicitada)";
		$result=mysql_query($q,$conectar);
		
		$q3="update productos set cantidad=$cantidad_nueva where codigo=$codigo_producto";
		$result3=mysql_query($q3,$conectar);
	}
	else
	{
		echo "<script type='text/javascript' >alert('Disculpe, no disponemos de esa cantidad');</script>";
	}
	
	
	
	echo "<script type='text/javascript' >location.href='../cliente_solicitud.php'</script>";

?>