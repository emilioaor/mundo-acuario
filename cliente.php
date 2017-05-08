<?php
	
	session_start();
	$usuario=$_SESSION['usuario'];
	$contra=$_SESSION['contra'];
	$nivel=$_SESSION['nivel'];
	$rif=$_SESSION['rif'];
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
	height: 750px;
}
#p2 {
	float: left;
	height: 250px;
	width: 950px;
}
#btn_agregar {
	color: #0FF;
	border: 2px solid #0FF;
	background-color: #39659C;
}
#tabla_solicitudes {
	margin-right: auto;
	margin-left: auto;
}
#btn_abrir {
	color: #0FF;
	background-color: #39659C;
	border: 2px solid #0FF;
}
#tabla_agregar {
	margin-right: auto;
	margin-left: auto;
}
#descripcion {
	width: 280px;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #3A659C;
	font-size: 18px;
	margin-left: 15px;
}
#agregar {
	margin-right: auto;
	margin-left: auto;
	width: 200px;
	text-align: center;
	clear: right;
}
#atras {
	text-align: center;
	width: 200px;
	margin-right: auto;
	margin-left: auto;
	margin-top: 40px;
}
a {
	font-family: "Courier New", Courier, monospace;
	color: #0FF;
	background-color: #39659C;
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
#codigo {
	width: 1px;
	visibility: hidden;
}
#btn_confirmar {
	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
#codigo_activacion {
	width: 280px;
}
</style>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' es requerido.\n'; }
    } if (errors) alert('Error:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_cliente.png" name="barra" width="350" height="60" id="barra" />
  
  <p><span id="titulo">Mis Solicitudes</span> </p>
  <hr />
  
   <table width="732" border="0" id="tabla_solicitudes">
  <tr>
    <th width="110" scope="row">Numero</th>
    <th width="300">Descripcion</th>
    <th width="100">Fecha</th>
    <th width="120">Estatus</th>
    <th width="80">&nbsp;</th>
    </tr>
  </table>
  
  <div id="p1">
  
  <table width="733" border="0" id="tabla_solicitudes">
 
 <?php
 		
	include_once('php/conectar.php');
	
	$q="select * from solicitud where rif='$rif' order by codigo desc";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	for($x=0;$x<=($cantidad-1);$x++){
 	
	$codigo=mysql_result($result,$x,0);
	$descripcion=mysql_result($result,$x,1);
	$fecha=mysql_result($result,$x,3);
	$estatus=mysql_result($result,$x,4);
	
 ?>
 
 <form method="post" action="cliente_solicitud.php" id="form<?php echo $x ?>">
  <tr id="fila<?php echo $x ?>">
    <td width="110" height="30" align="center" scope="row" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" ><?php echo $codigo ?></td>
    <td width="301" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $descripcion ?></td>
    <td width="100" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $fecha ?></td>
    <td width="120" align="center" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><?php echo $estatus ?></td>
    <th width="80" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"><input type="submit" name="btn_abrir" id="btn_abrir" value="Abrir" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" />
      
      <input type="text" name="codigo" id="codigo" value="<?php echo $codigo ?>" /></th>
    </tr>
 </form>
  
  <?php } ?>
  </table>

  </div>
  
  <div id="p2">
  
  <hr />
  
  <form action="php/agregar_solicitud.php" method="post" onsubmit="MM_validateForm('descripcion','','R','codigo_activacion','','R');return document.MM_returnValue" >
  
 <table width="284" id="tabla_agregar">
  <tr>
    <th width="276" scope="row">Descripcion</th>
    </tr>
  <tr>
    <th height="30" scope="row"><label for="descripcion"></label>
      <input type="text" name="descripcion" id="descripcion" /></th>
    </tr>
  <tr>
    <th height="21" scope="row">Codigo de Validacion</th>
    </tr>
  <tr>
    <th height="24" scope="row"><input type="text" name="codigo_activacion" id="codigo_activacion" /></th>
    </tr>
  <tr>
    <th height="24" scope="row"><input type="submit" name="btn_agregar" id="btn_agregar" value="Agregar Solicitud" /></th>
    </tr>
 </table>

  </form>
  
  <p id="atras"><a href="index.html">Cerrar Sesion</a></p>
  
  </div>
</div>
<div id="pie"></div>


</body>
</html>
