<?php
require('fpdf/fpdf.php');

$content = $_POST['content'];
$pdf = new FPDF();
$pdf -> AddPage();

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(80);
$pdf->Cell(30, 10, 'Appointment Records', 1, 0, 'C');
$pdf->Ln(20);


$pdf ->SetFont('Arial', '', 12);

$pdf ->Cell(0,10,$content,0,1,'C');

$pdf ->Output();
?>