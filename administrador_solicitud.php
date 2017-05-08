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
	height: 700px;
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
	height: 400px;
}
#tabla_solicitudes {
	margin-right: auto;
	margin-left: auto;
}
#p3 {
	float: left;
	height: 180px;
	width: 950px;
}
#p4 {
	float: left;
	width: 180px;
	height: 400px;
	overflow: auto;
}
#btn_despachar {
	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
#despachar {
	width: 500px;
	text-align: center;
	margin-right: auto;
	margin-left: auto;
}
#num_solicitud {
	height: 1px;
	width: 1px;
	visibility: hidden;
}
#atras {
	text-align: center;
	width: 200px;
	margin-right: auto;
	margin-left: auto;
	font-family: "Courier New", Courier, monospace;
}
#codigo {
	height: 1px;
	width: 1px;
	visibility: hidden;
}
#nsol {
	text-align: center;
	width: 200px;
	margin-right: auto;
	margin-left: auto;
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
#p5 {
	float: left;
	width: 770px;
	height: 400px;
	overflow: auto;
}
</style>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_administrador.png" name="barra" width="350" height="60" id="barra" />
  
  <p><span id="titulo">Detalles de la Solicitud</span> </p>
  <hr />
  <div id="p2">
  
  <div id="p4">
  
  <table width="166" border="0" id="tabla_solicitudes">
  <tr>
    <th width="160"><span id="titulo">Solicitudes</span></th>
    </tr>
    
    <?php 
		
  	
	include_once('php/conectar.php');
	
  	$num_solicitud=$_POST['codigo'];
				
	$q4="select * from solicitud where codigo=$num_solicitud";
	$result4=mysql_query($q4,$conectar);
	$rif=mysql_result($result4,0,2);
	$estatus=mysql_result($result4,0,4);
  	
	$q2="select * from producto_solicitud where cod_sol=$num_solicitud";
	$result2=mysql_query($q2,$conectar);
	$cantidad22=mysql_num_rows($result2);
	
	$q5="select * from solicitud where rif='$rif'";
	$result5=mysql_query($q5,$conectar);
	$cantidad5=mysql_num_rows($result5);
	
	for($x=0;$x<=($cantidad5-1);$x++){
		
	$solicitud=mysql_result($result5,$x,0);
	?>
  <tr>
    <th height="39">
    <form id="form_soli" method="post" action="administrador_solicitud.php">
      <input type="text" name="codigo" id="codigo" value="<?php echo $solicitud ?>" />
      <input type="submit" class="btn_actualizar" value="<?php echo $solicitud ?>" />
    </form>
    </th>
  </tr>
  
  <?php } ?>
  </table>
</div>
  
  <div id="p5">
  
  <p id="nsol">Solicitud N°:<b> <?php echo $num_solicitud ?></b></p>
  
  <table width="662" border="1" id="tabla_carrito">
      <tr>
    <th width="250" bgcolor="#3A659C">Producto</th>
    <th width="90" bgcolor="#3A659C">Cantidad</th>
    <th width="90" bgcolor="#3A659C">Precio</th>
    <th width="100" bgcolor="#3A659C">&nbsp;</th>
    </tr>
  
	<?php
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
    </tr>
  </form>
  
  <?php }  ?>
  
  <tr>
    <th colspan="3" align="right" bgcolor="#3A659C">Total</th>
    <th bgcolor="#3A659C"><?php echo $total ?></th>
    </tr>
</table>
  
  </div>


</div>
  
  <div id="p3">
  <hr />
  
  <?php if($estatus=='Por Confirmar'){ ?>
  
  <form action="php/despachar_solicitud_administrador.php" method="post">
  <p id="despachar">
  <input name="btn_despachar" type="submit" id="btn_despachar" value="Marcar Como Despachado" />
  <label for="num_solicitud"></label>
  <input type="text" name="num_solicitud" id="num_solicitud" value="<?php echo $num_solicitud ?>" />
  </p>
  </form>
  
  <?php } ?>
  
  <p id="atras"><a href="administrador.php">Atras</a>
    
    
  </p>
  </div>
</div>
<div id="pie"></div>
</body>
</html>
