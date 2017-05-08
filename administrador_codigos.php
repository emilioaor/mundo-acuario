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
.tabla_codigos {
	margin-right: auto;
	margin-left: auto;
}
#codigo {
	width: 150px;
}
a {
	color: #0FF;
	background-color: #3A659C;
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
#p1 {
	height: 370px;
	width: 950px;
	overflow: auto;
}
#barra {
	margin-top: -30px;
	margin-left: 300px;
}
#combo_usuario {
	width: 200px;
}
#btn_generar {
	color: #0FF;
	border: 2px solid #0FF;
	background-color: #39659C;
}
#tabla_generar {
	margin-right: auto;
	margin-left: auto;
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
  
  <table width="303" border="0" class="tabla_codigos">
  <tr>
    <th width="144" scope="row">Usuario</th>
    <th width="149">Codigo de Activacion</th>
  </tr>
</table>

  <div id="p1">
  
  
 
    
     <table width="301" height="35" border="0" class="tabla_codigos">
     
      <?php 
  
  	include_once('php/conectar.php');
	
	$q="select * from codigo_activacion";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	for($x=0;$x<=($cantidad-1);$x++){
  		
		$codigo=mysql_result($result,$x,0);
		$usuario=mysql_result($result,$x,1);
  ?>
  <tr id="fila<?php echo $x ?>">
    <th width="144" scope="row"><label for="combo_usuario"></label>
      <input name="usuario" type="text" id="usuario" value="<?php echo $usuario ?>" readonly="readonly" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''"  /></th>
    <th width="147"><label for="codigo"></label>
      <input name="codigo" type="text" id="codigo" value="<?php echo $codigo ?>" readonly="readonly"  onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></th>
  </tr>
  
  <?php } ?>
</table>
  
  
  </div>

  <div id="p2">
  <hr />
  
  <form method="post" action="php/generar_codigo.php">
  
  <table width="207" border="0" id="tabla_generar">
  <tr>
    <th width="201" scope="row">Usuario</th>
    </tr>
  <tr>
    <th scope="row">
    
    <select name="combo_usuario" id="combo_usuario">
      <?php 
	  	
		$q2="select * from usuarios";
		$result2=mysql_query($q2,$conectar);
		$cantidad=mysql_num_rows($result2);
		
		for($x=0;$x<=($cantidad-1);$x++){
		
		$usu=mysql_result($result2,$x,0);
	   ?>
      
      <option value="<?php echo $usu ?>"><?php echo $usu ?></option>´
      
      
      <?php } ?>
    </select>
    
    </th>
    </tr>
  <tr>
    <th height="43" scope="row"><input type="submit" name="btn_generar" id="btn_generar" value="Generar Codigo" /></th>
  </tr>
  </table>

</form>
  
  <p><a href="administrador.php">Atras</a></p>
 

</div>

</div>
<div id="pie"></div>
</body>
</html>
