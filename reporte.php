<?php

require('fpdf/fpdf.php');
include_once('php/conectar.php');

$q="select * from solicitud order by estatus";
$result=mysql_query($q,$conectar);
$cantidad=mysql_num_rows($result);

$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

	$pdf->Cell(120,10,"Mundo Acuario: Reporte de Solicitudes - ".date('d/m/Y'),null,null,'c');
	$pdf->Image('imagenes/logo.jpg' , 170 ,null, 20 , 20,'JPG');
	$pdf->Ln(10);
		
	$estatus_anterior='';
	
for($x=0;$x<=($cantidad-1);$x++){
		
	$codigo=mysql_result($result,$x,0);
	$descripcion=mysql_result($result,$x,1);
	$rif=mysql_result($result,$x,2);
	$fecha=mysql_result($result,$x,3);
	$estatus=mysql_result($result,$x,4);
	
	if($estatus!=$estatus_anterior){
		$pdf->SetFont('Arial','B',14);
		
		$pdf->Cell(null,10,"$estatus:");
		$pdf->Ln(10);
		
		$pdf->Cell(40,10,"Codigo");
		$pdf->Cell(80,10,"Descripcion");
		$pdf->Cell(40,10,"Rif");
		$pdf->Cell(40,10,"Fecha");
		$pdf->Ln(10);
		
		$estatus_anterior=$estatus;
	}
	
	$pdf->SetFont('Arial',null,10);
	$pdf->Cell(40,10,"$codigo");
	$pdf->Cell(80,10,"$descripcion",null,null,'c');
	$pdf->Cell(40,10,"$rif",null,null,'c');
	$pdf->Cell(40,10,"$fecha",null,null,'c');
	$pdf->Ln(10);
}



$pdf->Output();
?>