<?php

	
	$codigo=$_POST['codigo'];
	$producto=$_POST['producto2'];
	$precio=$_POST['precio'];
	$unidad=$_POST['unidad'];
	$cantidad=$_POST['cantidad'];
	$cod_clasif=$_POST['clasificacion'];
	
	
	include_once('conectar.php');
	
	$q="update productos set producto='$producto',precio=$precio,unid_med='$unidad',cantidad=$cantidad,cod_clasif=$cod_clasif where codigo=$codigo";
	
	
	$result=mysql_query($q,$conectar);
	
	echo "<script type='text/javascript' >alert('Producto Actualizado'); location.href='../administrador_productos.php'</script>";

?>