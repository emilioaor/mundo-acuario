<?php  

	
	include_once('conectar.php');
	
	$codigo_detalle=$_POST['codigo_detalle'];
	
	$q2="select * from producto_solicitud where codigo=$codigo_detalle";
	$result2=mysql_query($q2,$conectar);
	$codigo_producto=mysql_result($result2,0,2);
	$cantidad_solicitada=mysql_result($result2,0,4);

	$q="delete from producto_solicitud where codigo=$codigo_detalle";
	$result=mysql_query($q,$conectar);
	
	$q3="select * from productos where codigo=$codigo_producto";
	$result3=mysql_query($q3,$conectar);
	$cantidad_disponible=mysql_result($result3,0,4);
	
	$cantidad_nueva=$cantidad_disponible+$cantidad_solicitada;
	
	$q4="update productos set cantidad=$cantidad_nueva where codigo=$codigo_producto";
	$result4=mysql_query($q4,$conectar);
	
	
	echo "<script type='text/javascript' >location.href='../cliente_solicitud.php'</script>";
	
?>