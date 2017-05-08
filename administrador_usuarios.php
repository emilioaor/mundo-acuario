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
table {
	margin-right: auto;
	margin-left: auto;
}
#usuario {
	width: 200px;
}
#contra {
	width: 200px;
}
#nivel {
	width: 200px;
}
#empresa {
	width: 200px;
}
#btn_actualizar {
	color: #0FF;
	background-color: #3A659C;
	border: 2px solid #0FF;
}
#atras {
	font-family: "Courier New", Courier, monospace;
	color: #0FF;
	background-color: #39659C;
}
#ir_atras {
	text-align: center;
	width: 950px;
}
#p2 {
	float: left;
	height: 100px;
	width: 950px;
}
</style>
</head>

<body>
<div id="encabezado"></div>
<div id="principal">
  
  
  <img src="imagenes/barra_administrador.png" name="barra" width="350" height="60" id="barra" />
  
  <p><span id="titulo">Usuarios</span> </p>
  <hr />
  
  
  <table width="922" border="0">
  <tr>
    <th width="200">Empresa</th>
    <th width="200">Usuario</th>
    <th width="200">Contraseña</th>
    <th width="200">Nivel</th>
    <th width="100">&nbsp;</th>
  </tr>
</table>

  
  <div id="p1">
  
 <table width="922" border="0">
 
 <?php 
 
 include_once('php/conectar.php');
 
 $q="select * from usuarios";
 $result=mysql_query($q,$conectar);
 $cantidad=mysql_num_rows($result);
 
 for($x=0;$x<=($cantidad-1);$x++){
 
 $usuario=mysql_result($result,$x,0);
 $contra=mysql_result($result,$x,1);
 $cod_nivel=mysql_result($result,$x,2);
 $rif=mysql_result($result,$x,3);
 $empresa=''; 
 
 $q2="select empresa from empresa where rif='$rif'";
 $result2=mysql_query($q2,$conectar);
 $cantidad2=mysql_num_rows($result2);
 if($cantidad2>0){
	$empresa=mysql_result($result2,0,0); 
 }
  
 ?>
 
 <form method="post" action="php/actualizar_usuario.php" id="form<?php echo $x ?>">
  <tr id="fila<?php echo $x ?>">
    <th width="200" height="33"><label for="usuario">
      <input name="empresa" type="text" id="empresa" readonly="readonly" value="<?php echo $empresa ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" />
    </label></th>
    <th width="200"><input name="usuario" type="text" id="usuario" value="<?php echo $usuario ?>" readonly="readonly"onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></th>
    <th width="200"><input name="contra" type="text" id="contra" value="<?php echo $contra ?>" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></th>
    <th width="200"><label for="nivel"></label>
      <select name="nivel" id="nivel" >
        <option value="1" <?php if($cod_nivel==1){ ?>selected="selected" <?php }?> >Administrador</option>
        <option value="2" <?php if($cod_nivel==2){ ?>selected="selected" <?php }?> >Vendedor</option>
        <option value="3" <?php if($cod_nivel==3){ ?>selected="selected" <?php }?> >Comprador</option>
      </select></th>
    <th width="100"><input type="submit" name="btn_actualizar" id="btn_actualizar" value="Actualizar" onmouseover="document.getElementById('fila<?php echo $x ?>').bgColor='#3A659C'" onmouseout="document.getElementById('fila<?php echo $x ?>').bgColor=''" /></th>
  </tr>
  </form>
  
  <?php } ?>
  
  </table>
</div>
<div id="p2">
<hr />
<p id="ir_atras"><a href="administrador.php" id="atras">Atras</a></p>

</div>

</div>
<div id="pie"></div>
</body>
</html>
