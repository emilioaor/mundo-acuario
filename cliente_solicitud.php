<?php
	
	session_start();
	
	if(isset($_POST['codigo'])){
		
		$_SESSION['num_solicitud']=$_POST['codigo'];
			
	}
	
	$num_solicitud=$_SESSION['num_solicitud'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mundo Acuario</title>
<link href="css/pagina_basica.css" rel="stylesheet" type="text/css" />
<style type="text/css">

#principal {
	width: 950px;
	margin-right: auto;
	margin-left: auto;
	min-height:500px;
	background-color: #FFF;
	border-radius:20px 20px 0px 0px;
	-webkit-border-radius:20px 20px 0px 0px;
	-moz-border-radius:20px 20px 0px 0px;
	-ms-border-radius:20px 20px 0px 0px;
	-o-border-radius:20px 20px 0px 0px;
	padding-bottom: 10px;
	height: 900px;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #3A659C;
	font-size: 18px;
	margin-left: 15px;
}
#tabla_productos {
	margin-right: auto;
	margin-left: auto;
}
#barra {
	margin-top: -30px;
	margin-left: 300px;
}
#p1 {
	height: 350px;
	width: 950px;
	float: left;
	overflow: auto;
}
#btn_agregar {
	color: #0FF;
	border: 2px solid #0FF;
	background-color: #39659C;
}
#p2 {
	width: 950px;
	float: left;
	height: 300px;
	overflow: auto;
}
#p3 {
	float: left;
	height: 50px;
	width: 950px;
}
#atras {
	text-align: center;
	width: 200px;
	margin-right: auto;
	margin-left: auto;
	font-family: "Courier New", Courier, monospace;
}
a {
	color: #0FF;
	background-color: #3A659C;
}
#codigo_solicitud {
	width: 1px;
	visibility: hidden;
	height: 1px;
}
#codigo_producto {
	width: 1px;
	visibility: hidden;
	height: 1px;
}
#precio {
	width: 1px;
	visibility: hidden;
	height: 1px;
}
#cantidad_solicitada {
	width: 50px;
}
#tabla_carrito {
	margin-right: auto;
	margin-left: auto;
}
#btn_quitar {
	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
#codigo_detalle {
	height: 1px;
	width: 1px;
	visibility: hidden;
}
</style>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_cliente.png" name="barra" width="350" height="60" id="barra" />
  
  <p><span id="titulo">Generar Solicitud</span> </p>
  <hr />
  
  <table width="925" border="0" id="tabla_productos">
  <tr>
    <th width="90" scope="row">Codigo</th>
    <th width="180">Producto</th>
    <th width="92">Precio</th>
    <th width="120">Unidad Medida</th>
    <th width="120">Disponible</th>
    <th width="147">Imagen</th>
    <th width="148">Cantidad a Comprar</th>
  </tr>
  </table>
  
  <div id="p1">
  
  <table width="925" border="0" id="tabla_productos">
  
  <?php
  	
	include_once('php/conectar.php');
	
	$q4="select * from solicitud where codigo=$num_solicitud";
	$result4=mysql_query($q4,$conectar);
	$estatus=mysql_result($result4,0,4);
	
	$q="select * from productos";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	for($x=0;$x<=($cantidad-1);$x++){
	
  		$codigo=mysql_result($result,$x,0);
		$producto=mysql_result($result,$x,1);
		$precio=mysql_result($result,$x,2);
		$unidad=mysql_result($result,$x,3);
		$cantidad2=mysql_result($result,$x,4);
		$ruta=mysql_result($result,$x,5);
  ?>
  
  <form method="post" action="php/agregar_detalle_solicitud.php" id="form<?php echo $x ?>" >
  
  <tr id="fila<?php echo $x ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" >
    <th width="88" height="78" scope="row"><?php echo $codigo ?></th>
    <th width="179"><?php echo $producto ?></th>
    <th width="91"><?php echo $precio ?></th>
    <th width="119"><?php echo $unidad ?></th>
    <th width="119"><?php echo $cantidad2 ?></th>
    <th width="147"><img src="<?php echo $ruta ?>" width="60" height="60" /></th>
    <th width="152">
    <?php if($estatus=='Por Confirmar'){ ?>
    <input name="cantidad_solicitada" type="text" id="cantidad_solicitada" value="0" /><input type="submit" name="btn_agregar" id="btn_agregar" value="Agregar al Carrito" /><br />
    <input name="codigo_solicitud" type="text" id="codigo_solicitud" value="<?php echo $num_solicitud ?>" />
  <input name="codigo_producto" type="text" id="codigo_producto" value="<?php echo $codigo ?>" />
  <input name="precio" type="text" id="precio" value="<?php echo $precio ?>" /><?php } ?>
    </th>
  </tr>
 
 </form>
 
  <?php } ?>
  
  </table>

  
  </div>
  
  <div id="p2">
  
  <hr />
  
  <p><span id="titulo">Carrito</span></p>
  <table width="662" border="1" id="tabla_carrito">
  <tr>
    <th width="250" bgcolor="#3A659C">Producto</th>
    <th width="90" bgcolor="#3A659C">Cantidad</th>
    <th width="90" bgcolor="#3A659C">Precio</th>
    <th width="100" bgcolor="#3A659C">&nbsp;</th>
    <th width="98" bgcolor="#3A659C">&nbsp;</th>
  </tr>
  
  <?php
  	
	$q2="select * from producto_solicitud where cod_sol=$num_solicitud";
	$result2=mysql_query($q2,$conectar);
	$cantidad22=mysql_num_rows($result2);
	
	$total=0;
		
	for($x=0;$x<=($cantidad22-1);$x++){
		
		$codigo_detalle=mysql_result($result2,$x,0);
		$cod_producto=mysql_result($result2,$x,2);
		$precio=mysql_result($result2,$x,3);
		$cantidad=mysql_result($result2,$x,4);
		$subtotal=$precio*$cantidad;
		
		$q3="select * from productos where codigo=$cod_producto";
		$result3=mysql_query($q3,$conectar);
		
		$producto=mysql_result($result3,0,1);
		
		$total=$total+$subtotal;	
  ?>
  
  
  <form method="post" action="php/quitar_producto_solicitud.php">
  <tr>
    <th height="38"><?php echo $producto ?></th>
    <th><?php echo $cantidad ?></th>
    <th><?php echo $precio ?></th>
    <th><?php echo $subtotal ?></th>
    <th>
	<?php if($estatus=='Por Confirmar'){ ?>
    <input type="submit" name="btn_quitar" id="btn_quitar" value="Quitar" />
    <input type="text" name="codigo_detalle" id="codigo_detalle" value="<?php echo $codigo_detalle ?>" />
    <?php } ?>
    </th>
  </tr>
  </form>
  
  <?php }  ?>
  
  <tr>
    <th colspan="3" align="right" bgcolor="#3A659C">Total</th>
    <th bgcolor="#3A659C"><?php echo $total ?></th>
    <th bgcolor="#3A659C">&nbsp;</th>
  </tr>
</table>

  </div>
  
  <div id="p3">
  <p id="atras"><a href="cliente.php">Atras</a>
    <label for="codigo_detalle"></label>
    
  </p>
  </div>
</div>
<div id="pie"></div>
</body>
</html>
