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
	height: 600px;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #3A659C;
	font-size: 18px;
	margin-left: 15px;
	margin-top: 15px;
}
#p1 {
	height: 320px;
	width: 950px;
	overflow: auto;
}
#buscar {
	float: left;
	height: 50px;
	width: 950px;
	text-align: center;
}
#atras {
	text-align: center;
	width: 950px;
}
#barra {
	margin-top: -30px;
	margin-left: 300px;
}
#telefono {
	width: 120px;
}
#direccion {
	width: 320px;
}
#empresa {
	width: 320px;
}
#rif {
	width: 115px;
}
#correo {
	width: 200px;
}
#apellido {
	width: 200px;
}
#nombre {
	width: 200px;
}
.tabla_empresas {
	margin-right: auto;
	margin-left: auto;
}
#cedula {
	width: 120px;
}
#fecha {
	width: 150px;
}
#btn_actualizar {	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
a {
	font-family: "Courier New", Courier, monospace;
	color: #0FF;
	background-color: #3A659C;
}
.mas {
	float: right;
	background-color: #FFF;
	color: #3A659C;
	text-decoration: underline;
	font-family: "Courier New", Courier, monospace;
	font-size: 14px;
}
.menos {
	float: right;
	background-color: #FFF;
	color: #3A659C;
	text-decoration: underline;
	font-family: "Courier New", Courier, monospace;
	font-size: 14px;
}
</style>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_administrador.png" name="barra" width="350" height="60" id="barra" /><br /><br />
  
  <p><span id="titulo">Empresas</span></p>
  <hr id="separador1" />
  <div id="buscar">
  		
        <input name="nombre_empresa" type="text" id="nombre_empresa" /> <input type="button" value="Buscar" onclick="var emp=document.getElementById('nombre_empresa').value; document.getElementById(emp).scrollIntoView(true); " />
  	
  </div>
  
  <div id="p1">
    
    <?php
  	
	include_once('php/conectar.php');
	
	$q="select * from empresa";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	
	
	for($x=0;$x<=($cantidad-1);$x++){
  		
		$rif=mysql_result($result,$x,0);
		$empresa=mysql_result($result,$x,1);
		$direccion=mysql_result($result,$x,2);
		$telefono=mysql_result($result,$x,3);
		$fecha=mysql_result($result,$x,4);
		$cedula=mysql_result($result,$x,5);
		$nombre=mysql_result($result,$x,6);
		$apellido=mysql_result($result,$x,7);
		$correo=mysql_result($result,$x,8);
  ?>
    
    <form method="post" action="php/actualizar_empresa.php" id="form<?php echo $x ?>" >
    <table width="900" height="33" border="0" class="tabla_empresas" id="a<?php echo $x ?>" >
  <tr>
    <th width="117">RIF</th>
    <th width="320" colspan="2">Empresa</th>
    <th colspan="2">Direccion</th>
    <th width="120">Telefono</th>
  </tr>   
  <tr>
    <th align="center"><input name="rif" type="text" id="rif" value="<?php echo $rif ?>" readonly="readonly" /><span id="<?php echo $rif ?>"></span></th>
    <th colspan="2" align="center"><label for="empresa"></label>
      <input name="empresa" type="text" id="empresa" value="<?php echo $empresa ?>" /></th>
    <th colspan="2" align="center"><input name="direccion" type="text" id="direccion" value="<?php echo $direccion ?>" /></th>
    <th align="center"><input name="telefono" type="text" id="telefono" value="<?php echo $telefono ?>" /></th>
  </tr>
  </table>
  
  <table width="900" class="tabla_empresas" id="b<?php echo $x ?>" style="display:none">
  <tr>
    <th width="156" align="center">Fecha de Inscripcion</th>
    <th width="120" align="center">Cedula</th>
    <th width="200" align="center">Nombre</th>
    <th width="200" align="center">Apellido</th>
    <th width="200" align="center">Correo</th>
    </tr>
  <tr>
    <th align="center"><input name="fecha" type="text" id="fecha" value="<?php echo $fecha ?>" /></th>
    <th align="center"><input name="cedula" type="text" id="cedula" value="<?php echo $cedula ?>" /></th>
    <th align="center"><input name="nombre" type="text" id="nombre" value="<?php echo $nombre ?>" /></th>
    <th align="center"><input name="apellido" type="text" id="apellido" value="<?php echo $apellido ?>" /></th>
    <th align="center"><label for="correo"></label>
      <input name="correo" type="text" id="correo" value="<?php echo $correo ?>" /></th>
    </tr>
  <tr>
    <th height="49" colspan="5" align="center"><input type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" /></th>
    </tr> 
  </table>
  </form>
  
  <input name="mas" type="button" class="mas" id="mas<?php echo $x ?>" onclick="if(document.getElementById('b<?php echo $x?>').style.display!='none'){ document.getElementById('b<?php echo $x ?>').style.display='none'; document.getElementById('mas<?php echo $x ?>').value='Ver mas...' }else{ document.getElementById('b<?php echo $x ?>').style.display='block'; document.getElementById('mas<?php echo $x ?>').value='Ver menos' }" value="Ver mas..." />
    <hr />
  
  <?php } ?>
  </div>
<hr />
<p id="atras"><a href="administrador.php">Atras</a></p>

</div>
<div id="pie"></div>
</body>
</html>
