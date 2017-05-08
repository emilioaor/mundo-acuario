<?php

	$producto=$_POST['producto'];
	$precio=$_POST['precio'];
	$unidad=$_POST['unidad'];
	$cantidad=$_POST['cantidad'];
	$cod_clasif=$_POST['clasificacion'];
	
	include_once('conectar.php');
	
	$path="fotos_productos/";
	
	$path=$path.basename($_FILES['archivo']['name']);
	
	$foto=basename($_FILES['archivo']['name']);
	
	if(move_uploaded_file($_FILES['archivo']['tmp_name'],"../".$path)){
		
		$q="insert into productos values(NULL,'$producto',$precio,'$unidad',$cantidad,'$path',$cod_clasif)";
		$result=mysql_query($q,$conectar);
		
		echo "<script type='text/javascript' >alert('Producto cargado satisfactoriamente');</script>";	
	}
	else
	{
		echo "<script type='text/javascript' >alert('Error al cargar foto del producto, registro cancelado');</script>";	
	}
	
	
	echo "<script type='text/javascript' >location.href='../administrador_productos.php';</script>";	
	


?>