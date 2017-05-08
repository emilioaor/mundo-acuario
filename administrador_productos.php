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
	height: 760px;
}
#ver {
	width: 950px;
	text-align: center;
	font-family: "Courier New", Courier, monospace;
}
a {
	color: #0FF;
	background-color: #3A659C;
	font-family: "Courier New", Courier, monospace;
}
#tabla_productos {
	margin-right: auto;
	margin-left: auto;
	font-family: "Courier New", Courier, monospace;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	color: #3A659C;
	font-size: 18px;
	margin-left: 15px;
	margin-top: 15px;
}
#p2 {
	height: 250px;
	width: 950px;
	text-align: center;
}
#atras {
	color: #0FF;
	background-color: #3A659C;
}
#tabla_agregar {
	font-family: "Courier New", Courier, monospace;
	margin-right: auto;
	margin-left: auto;
}
#p1 {
	height: 370px;
	width: 950px;
	overflow: auto;
}
#codigo {
	width: 80px;
}
#cantidad {
	width: 120px;
}
#unidad {
	width: 150px;
}
#precio {
	width: 120px;
}
#producto {
	width: 350px;
}
#foto {
	height: 100px;
	width: 100px;
}
#btn_guardar {
	border: 2px solid #0FF;
	color: #0FF;
	background-color: #3A659C;
}
#barra {
	margin-top: -30px;
	margin-left: 300px;
}
#producto2 {
	width: 200px;
}
#clasificacion {
	width: 120px;
}
#codigo {
	width: 50px;
	text-align: center;
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
  
  
  <img src="imagenes/barra_administrador.png" name="barra" width="350" height="60" id="barra" /><br /><br />
  
  <p><span id="titulo">Productos</span></p>
  <hr id="separador1" />
  <table width="930" height="24" border="0" id="tabla_productos">
  <tr>
    <th width="78" height="20">Codigo</th>
    <th width="200">Producto</th>
    <th width="120">Precio</th>
    <th width="150">Unidad Medida</th>
    <th width="120">Cantidad</th>
    <th width="135">Clasificacion</th>
    <th width="97" align="left">&nbsp;</th>
  </tr>
</table>

  
  <div id="p1">
  
  <?php
  	
	include_once('php/conectar.php');
	
	$q="select * from productos";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	
	
	
  
  ?>
  
  
  <table width="930" height="34" border="0" id="tabla_productos">
    
  <?php 
  
   for($x=0;$x<=($cantidad-1);$x++){
			
		$codigo=mysql_result($result,$x,0);
		$producto=mysql_result($result,$x,1);
		$precio=mysql_result($result,$x,2);
		$unidad=mysql_result($result,$x,3);
		$cant=mysql_result($result,$x,4);
		$cod_clasif=mysql_result($result,$x,6);
   ?>
   <form method="post" id="form<?php echo $x ?>" action="php/actualizar_producto.php">
  <tr id="fila<?php echo $x ?>">
    <td width="78" height="30" align="center"><input name="codigo" type="text" id="codigo" value="<?php echo $codigo ?>" readonly="readonly" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></td>
    <td width="200" align="center"><input name="producto2" type="text" id="producto2" value="<?php echo $producto ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></td>
    <td width="120" align="center"><input name="precio" type="text" id="precio" value="<?php echo $precio ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"/></td>
    <td width="150" align="center"><input name="unidad" type="text" id="unidad" value="<?php echo $unidad ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"/></td>
    <td width="120" align="center"><label for="cantidad"></label>
      <input name="cantidad" type="text" id="cantidad" value="<?php echo $cant ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></td>
    <td width="134" align="center">
    <select name="clasificacion" id="clasificacion">
      <?php 
	  
	  	include_once('php/conectar.php');
			$q2="select * from clasificacion";
			$result2=mysql_query($q2,$conectar);
			$cantidad2=mysql_num_rows($result2);
			
			for($y=0;$y<=($cantidad2-1);$y++){
				
				$codigo_clasif=mysql_result($result2,$y,0);
				$clasificacion=mysql_result($result2,$y,1);
	   ?>
      
      <option value="<?php echo $codigo_clasif ?>" <?php if($cod_clasif==$codigo_clasif){ ?>selected="selected" <?php } ?>  ><?php echo $clasificacion ?></option>
    
    	<?php } ?>
    
    </select>
    
    </td>
    <td width="98" align="center"><input name="button" type="submit" class="btn_actualizar" id="button" value="Actualizar" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></td>
  </tr>
  </form>
  <?php  } ?>
  
  </table>
  </div>

  <div id="p2">
  <hr />
  <p><a href="administrador.php">Atras</a></p>
  <form action="php/agregar_producto.php" method="post" enctype="multipart/form-data" id="form_agregar" onsubmit="MM_validateForm('codigo','','R','producto','','R','precio','','R','unidad','','R','cantidad','','R');return document.MM_returnValue">
  
  <table width="900" height="94" border="0" id="tabla_productos">
  <tr>
    <th width="350">Producto</th>
    <th width="120">Precio</th>
    <th width="150">Unidad Medida</th>
    <th>Cantidad</th>
    <th>Clasificacion</th>
  </tr>
  <tr>
    <td align="center"><label for="codigo"></label>      <input type="text" name="producto" id="producto" /></td>
    <td align="center"><input type="text" name="precio" id="precio" /></td>
    <td align="center"><input type="text" name="unidad" id="unidad" /></td>
    <td width="120" align="center"><input type="text" name="cantidad" id="cantidad" /></td>
    <td width="138" align="center">
    
    <select name="clasificacion" id="clasificacion">
    
    	 <?php 
	  
	  	include_once('php/conectar.php');
			$q3="select * from clasificacion";
			$result3=mysql_query($q3,$conectar);
			$cantidad3=mysql_num_rows($result3);
			
			for($y=0;$y<=($cantidad2-1);$y++){
				
				$codigo_clasif=mysql_result($result3,$y,0);
				$clasificacion=mysql_result($result3,$y,1);
	   ?>
      <option value="<?php echo $codigo_clasif ?>"><?php echo $clasificacion ?></option>
      
      <?php } ?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td height="42" colspan="5" align="center"><label for="archivo"></label>
      <input type="file" name="archivo" id="archivo" /></td>
    </tr>
  <tr>
    <td height="42" colspan="5" align="center"><input type="submit" name="btn_guardar" id="btn_guardar" value="Guardar" /></td>
  </tr> 
  </table>
</form>

<p id="ver"><a href="produto.php" target="_blank">Ver Pagina Productos</a></p>

</div>

</div>
<div id="pie"></div>
</body>
</html>
