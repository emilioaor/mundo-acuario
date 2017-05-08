<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mundo Acuario</title>
<link href="css/pagina_basica.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#principal {
	height: 600px;
	width: 950px;
	margin-right: auto;
	margin-left: auto;
	background-color: #FFF;
	padding-bottom: 10px;
}
#p1 {
	float: left;
	height: 600px;
	width: 700px;
}
#titulo {
	font-family: "Courier New", Courier, monospace;
	font-size: 36px;
	color: #3B669B;
	font-weight: bold;
}
.imagenes {
	height: 150px;
	width: 150px;
	border-radius:50px 50px 50px 50px;
	border: 5px solid #3B669B;
}
#separador1 {
	margin-top: -10px;
}
#p2 {
	height: 450px;
	width: 700px;
	overflow: auto;
}
.productos {
	height: 200px;
	width: 200px;
	margin-top: 17px;
	margin-left: 25px;
	float: left;
	font-family: "Courier New", Courier, monospace;
	text-align: center;
}
#form_clasificacion {
	text-align: center;
}
#clasificacion {
	width: 120px;
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



<?php 
	include_once('php/conectar.php');
	
	$q="select * from productos";
	
	if(isset($_POST['clasificacion'])){	
	
		$cod_clasif=$_POST['clasificacion'];
		
		if($cod_clasif=="todo"){
			$q="select * from productos";
		}
		else
		{
			$q="select * from productos where cod_clasif=$cod_clasif";	
		}

	}
	
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);

?>

<body>

<div id="encabezado"><img src="imagenes/banner.jpg" width="950" height="400" /></div>

<div id="botones"><a href="index.html"><img src="imagenes/btn_inicio.png" width="302" height="105" class="botones" /></a><a href="informacion.html"><img src="imagenes/btn_qs.png" width="302" height="105" class="botones" /></a><a href="registro.html"><img src="imagenes/btn_registro.png" alt="" width="302" height="105" class="botones" /></a><a href="contacto.html"><img src="imagenes/btn_contacto.png" width="302" height="105" class="botones" /></a><a href="produto.php"><img src="imagenes/btn_productos.png" width="180" height="51" class="botones" /></a></div>

<div id="principal">

  <div id="ingreso">
  
  <form action="php/ingreso_usuario.php" method="post" onsubmit="MM_validateForm('usuario','','R','contraseña','','R');return document.MM_returnValue">
  <p id="titulo_ingreso">Ingreso de Usuario</p>
  <br />
    Usuario<br />
  <input name="usuario" type="text" id="usuario" />
   <br />
    Contraseña  <br />
      <input type="password" name="contraseña" id="contraseña" />
  <br /><br />
    
      <input type="submit" name="btn_ingresar" id="btn_ingresar" value="Ingresar" />
    
  </form>
  
  </div>
  
	<div id="p1">
    
    <p id="titulo">Productos</p>
    <hr id="separador1" />
    
    <form action="" method="post" id="form_clasificacion">
    
    		<select name="clasificacion" id="clasificacion" onchange="document.getElementById('form_clasificacion').submit()" >
    		  <option value="todo" <?php if(!isset($cod_clasif)){ ?>  selected="selected" <?php } ?> >Todo</option>
              
              	<?php  
	
				$q2="select * from clasificacion";
				$result2=mysql_query($q2,$conectar);
				$cantidad2=mysql_num_rows($result2);
				
					for($x=0;$x<=($cantidad2-1);$x++){
						
					$codigo=mysql_result($result2,$x,0);
					$clasificacion=mysql_result($result2,$x,1);	
				?>
              
              
            	<option value="<?php echo $codigo ?>" <?php if(isset($cod_clasif) && ($cod_clasif==$codigo) ){ ?>  selected="selected" <?php } ?>   ><?php echo $clasificacion ?></option>
                
                <?php } ?>
                
            </select>
    </form>
    
    <div id="p2">
    
    <?php
	
	$c=0;
	
	for($x=0;$x<=($cantidad-1);$x++){
		
		$c++;
		$producto=mysql_result($result,$x,1);
		$precio=mysql_result($result,$x,2);
		$ruta=mysql_result($result,$x,5);
	
    ?>
    <div class="productos">
    
     
    <img  src="<?php echo $ruta ?>" width="150" height="150" class="imagenes" /> <br />
    
    	<?php echo $producto ?> <br />
    </div>
    
    <?php 
		
		if($c==3){
			echo "<br>";
			$c=0;	
		}
	
		} 
	?>
    
    </div>
	</div>
    
</div>
<div id="pie"></div>
</body>
</html>
