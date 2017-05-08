<?php

	include_once('conectar.php');
	
	$usuario=$_POST['usuario'];
	$contra=$_POST['contraseña'];
	
	$q="select * from usuarios where usuario='$usuario' and contra='$contra'";
	$result=mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	if($cantidad>0){
		
		//usuario correcto verificar nivel
		
			$nivel=mysql_result($result,0,2);
			$rif=mysql_result($result,0,3);
			session_start();
			$_SESSION['usuario']=$usuario;
			$_SESSION['contra']=$contra;
			$_SESSION['nivel']=$nivel;
			
			switch($nivel){
				
				case 1:
					echo "<script type='text/javascript' >location.href='../administrador.php'</script>";
				break;
				
				case 2:
					echo "<script type='text/javascript' >location.href='../vendedor.php'</script>";
				break;
				
				case 3:
					$_SESSION['rif']=$rif;
					echo "<script type='text/javascript' >location.href='../cliente.php'</script>";
				break;			
				
			}
			
	}
	else
	{
		//usuario incorrecto
		echo "<script type='text/javascript'>alert('Usuario o contraseña incorrecta'); location.href='../index.html'</script>";	
	}

?>