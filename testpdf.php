<?php
require('fpdf182/fpdf.php');
$pdf=new FPDF("P");
$pdf->AddPage();

$pdf->AddFont('THSarabun','','THSarabun.php');
$pdf->AddFont('THSarabun Bold','B','THSarabun Bold.php');
$pdf->AddFont('THSarabun BoldItalic','BI','THSarabun BoldItalic.php');
$pdf->AddFont('THSarabun Italic','I','THSarabun Italic.php');
$pdf->SetFont('THSarabun Bold','B',20);
$pdf->Text( 90 , 20 , iconv('UTF-8','tis620','รายงาย'));
$pdf->SetXY(10,40);
$pdf->SetFillColor(192,192,192);
$pdf->Cell(30,8,iconv('UTF-8','tis620',"ลำดับ"),1,0,C,true,"http://www.nrru.ac.th");

$pdf->SetXY(40,40);
$pdf->Cell(60,8,iconv('UTF-8','tis620',"ชื่อ"),1,0,C,true,"");

$pdf->SetXY(100,40);
$pdf->Cell(30,8,iconv('UTF-8','tis620',"สาขา"),1,0,C,true,"");

$pdf->SetXY(10,60);
$pdf->MultiCell(30,8,iconv('UTF-8','tis620',"ลำดับ......................."),1,R,fill);

$pdf->Image('123.jpg',10,100,50,50);




$pdf->Output();

?>