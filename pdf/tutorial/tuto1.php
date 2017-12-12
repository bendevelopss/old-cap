<?php
require('../fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World! tae');
$pdf->Cell(40,15,'Hello World! tae');
$pdf->Output();
?>
