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
	height: 750px;
}
#p2 {
	float: left;
	height: 250px;
	width: 950px;
}
.boton_menu {
	height: 100px;
	width: 200px;
	margin-top: 80px;
	margin-left: 87px;
	text-decoration: none;
}
.menu {
	height: 150px;
	width: 200px;
	margin-left: 30px;
	float: left;
	text-align: center;
}
.boton_menu:hover {
	height: 120px;
	width: 220px;
	margin-top: 60px;
	margin-left: 67px;
	text-decoration: none;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #3A659C;
	font-size: 18px;
	margin-left: 15px;
}
#barra {
	margin-top: -30px;
	margin-left: 300px;
}
.btn_menu {
	text-decoration: none;
	height: 110px;
	width: 150px;
}
.btn_menu:hover {
	text-decoration: none;
	height: 120px;
	width: 160px;
}
#p1 {
	height: 350px;
	width: 950px;
	float: left;
	overflow: auto;
}
#salida {
	font-family: "Courier New", Courier, monospace;
	color: #00FFFF;
	background-color: #3A659C;
}
#cerrar_sesion {
	width: 950px;
	text-align: center;
	margin-top: 15px;
	float: left;
}
#codigo {
	height: 1px;
	width: 1px;
	visibility: hidden;
}
#tabla_solicitudes {
	margin-right: auto;
	margin-left: auto;
}
#btn_abrir {
	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
#reporte {
	float: left;
	width: 950px;
	text-align: center;
}
#link_reporte {
	color: #0FF;
	background-color: #3A659C;
	font-family: "Courier New", Courier, monospace;
}
</style>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_administrador.png" name="barra" width="350" height="60" id="barra" />
  
  <p><span id="titulo">Solicitudes</span> </p>
  <hr />
  
  <table width="927" border="0" id="tabla_solicitudes">
  <tr>
  	<th width="190" >Empresa</td>
    <th width="110" scope="row">Solicitud</th>
    <th width="301">Descripcion</th>
    <th width="100">Fecha</th>
    <th width="120">Estatus</th>
    <th width="80">&nbsp;</th>
    </tr>
  </table>
  
  <div id="p1">
  
  <table width="927" border="0" id="tabla_solicitudes">
 
 <?php
 		
	include_once('php/conectar.php');
	
	$q="select * from solicitud order by codigo desc";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	
	
	for($x=0;$x<=($cantidad-1);$x++){
 	
	$empresas_usadas[$x]="";
	$repetido=false;
	$codigo=mysql_result($result,$x,0);
	$descripcion=mysql_result($result,$x,1);
	$rif=mysql_result($result,$x,2);
	$fecha=mysql_result($result,$x,3);
	$estatus=mysql_result($result,$x,4);
	
	$q2="select * from empresa where rif='$rif'";
	$result2=mysql_query($q2,$conectar);
	
	$empresa=mysql_result($result2,0,1);
	
	
		for($y=0;$y<=$x;$y++){
			
			if($empresa==$empresas_usadas[$y]){
				$repetido=true;	
			}
		}
		
	$empresas_usadas[$x]=$empresa;
	
	if(!$repetido){
 ?>
 
 <form method="post" action="administrador_solicitud.php" id="form<?php echo $x ?>">
  <tr id="fila<?php echo $x ?>"  >
    
    <td width="190" height="30" align="center" scope="row" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" ><?php echo $empresa ?></td>
    
    <td width="110" height="30" align="center" scope="row" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" ><?php echo $codigo ?></td>
    <td width="301" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $descripcion ?></td>
    <td width="100" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $fecha ?></td>
    <td width="120" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $estatus ?></td>
    <th width="80" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><input type="submit" name="btn_abrir" id="btn_abrir" value="Abrir" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" />
      
      <input type="text" name="codigo" id="codigo" value="<?php echo $codigo ?>" /></th>
    </tr>
 </form>
  
  <?php
	}
  
   }
    ?>
  </table>
  
  </div>
  
  <div id="p2">
  
  	<div id="reporte"> <a href="reporte.php" target="_new" id="link_reporte">Generar Reporte</a>  	</div><br />
  
  <hr />
  
   <br />
  
  
  <div class="menu"><a href="administrador_empresas.php"><img src="imagenes/menu_empresas.png" width="150" height="110" class="btn_menu" /></a>
  </div>
  
  <div class="menu"><a href="administrador_productos.php"><img src="imagenes/menu_productos.png" width="150" height="110" class="btn_menu" /></a>
  </div>

<div class="menu"><a href="administrador_usuarios.php"><img src="imagenes/menu_usuarios.png" width="150" height="110" class="btn_menu" /></a></div>

<div class="menu"><a href="administrador_codigos.php"><img src="imagenes/menu_codigos.png" width="384" height="183" class="btn_menu" /></a></div>
  
  
  <div id="cerrar_sesion"><a href="index.html" id="salida">Cerrar Sesion</a></div>
  
  
  </div>
  
  
  
  
</div>
<div id="pie"></div>
</body>
</html>
