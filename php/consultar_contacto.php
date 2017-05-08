
<div id="p4">

<?php
	
	include_once('conectar.php');
	
	$q="select * from contacto";
	$result= mysql_query($q,$conectar);
	$cantidad=mysql_num_rows($result);
	
	$inicio=0;
	
	if($cantidad>6){
		$inicio=$cantidad-6;
	}
	
	for($x=$inicio;$x<=($cantidad-1);$x++){
		
		$nick=mysql_result($result,$x,1);
		$mensaje=mysql_result($result,$x,2);
		
		echo "<b>".$nick." dice:</b><br>".$mensaje."<br><hr>";	
	}
	
	
?>

</div>