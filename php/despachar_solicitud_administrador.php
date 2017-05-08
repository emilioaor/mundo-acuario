<?php

	include_once('conectar.php');
	
	$num_solicitud=$_POST['num_solicitud'];

	$q="update solicitud set estatus='Despachado' where codigo=$num_solicitud";
	$result=mysql_query($q,$conectar);
	
	echo "<script type='text/javascript' > alert('Solicitud Despachada'); location.href='../administrador.php'</script>";

?>