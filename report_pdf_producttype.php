<?php
require('fpdf182/fpdf.php');
include('connectdb.php');
// เขียนภาษา SQL 
$sql="SELECT * FROM categories order by categoryname";
$result=mysqli_query($conn,$sql) or die('sql ผิด');
		// 3. นับจำนวนข้อมูล
$count=mysqli_num_rows($result);


$pdf=new FPDF("L");   // P= แนวตั้ง, L=แนวนอน

$pdf->AddPage();
$pdf->AddFont('THSarabun','','THSarabun.php');
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('THSarabun','B','THSarabun Bold.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('THSarabun','I','THSarabun Italic.php');
 
// เพิ่มฟอนต์ภาษาไทยเข้ามา ตัวหนา  กำหนด ชื่อ เป็น angsana
$pdf->AddFont('THSarabun','BI','THSarabun BoldItalic.php');

$pdf->SetFont('THSarabun','B',18);
// กำหนดสีพื้นหลัง
$pdf->SetFillColor(255,5,6);

// แสดงข้อความอย่างเดียว 
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลประเภทสินค้า')); //  x,y, ข้อความ    
$pdf->SetXY(180,8);
 $pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');

$pdf->SetFont('THSarabun','B',16);

//-------- ส่วนหัวของตาราง ------------------
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสประเภทสินค้า"),L,R,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อประเภทสินค้า"),L,R,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(110,20);
$pdf->MultiCell(110, 8 , iconv('UTF-8', 'tis620',"คำอธิบาย"),L,R,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------


$y=28;
while($row=mysqli_fetch_assoc($result))
{
$pdf->SetFont('THSarabun','B',16);
$pdf->SetXY(10,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["categoryid"]),1,L,0); //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,$y);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',$row["categoryname"]),1,L,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(110,$y);
$pdf->MultiCell(110, 8 , iconv('UTF-8', 'tis620',$row["description"]),1,L,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$y=$y+8;   // เพิ่มบรรทัด
//  ถ้าบรรทัดเกิดหน้า ให้ขึ้นหน้าใหม่
if($y>260)
	{
$pdf->AddPage();
$pdf->SetXY(180,8);
$pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');
$pdf->SetFont('THSarabun','B',18);
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลประเภทสินค้า')); //  x,y, ข้อความ   
 //-------- ส่วนหัวของตาราง ------------------
 $pdf->SetFont('THSarabun','B',16);
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสประเภทสินค้า"),1,C,fill);   //  
$pdf->SetXY(40,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อประเภทสินค้า"),1,C,fill);   //  
$y=28;
	}

}

$pdf->Output();   // แสดงผล
?>
