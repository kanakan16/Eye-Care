<?php	
	require('fpdf/fpdf.php');
	$pdf = new FPDF('P','mm','A4');
	//$fname = $_POST['fname'];
	$pdf->AddPage();
	
	//set font
	$pdf->SetFont('Arial','B',12);
	
	//Cell(width,height,border,endline,[align])
	
	$pdf->Cell(130,5,'hai',1,0);
	
	$pdf->Output();
?>