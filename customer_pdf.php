<?php
require('fpdf182/fpdf.php');
include('connectdb.php');
// เขียนภาษา SQL 
$sql="select * from Customer";

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
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลสินค้า')); //  x,y, ข้อความ    
$pdf->SetXY(200,8);
 $pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');

$pdf->SetFont('THSarabun','B',16);

//-------- ส่วนหัวของตาราง ------------------
$pdf->SetXY(35,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(65,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(135,20);
$pdf->MultiCell(55, 8 , iconv('UTF-8', 'tis620',"อีเมล"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(190,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"เบอร์โทร"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(220,20);
$pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',"วันเกิด"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------


$y=28;
while($row=mysqli_fetch_assoc($result))
{
$pdf->SetFont('THSarabun','',16);
$pdf->SetXY(35,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["Customer_id"]),1,C,0); //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(65,$y);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',$row["Customer_name"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(135,$y);
$pdf->MultiCell(55, 8 , iconv('UTF-8', 'tis620',$row["Customer_email"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(190,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["Customer_phone"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(220,$y);
$pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',$row["Customer_birth"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$y=$y+8;   // เพิ่มบรรทัด
//  ถ้าบรรทัดเกิดหน้า ให้ขึ้นหน้าใหม่
if($y>260)
	{
$pdf->AddPage();
$pdf->SetXY(180,8);
$pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');
$pdf->SetFont('THSarabun','B',18);
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลสินค้า')); //  x,y, ข้อความ   
 //-------- ส่วนหัวของตาราง ------------------
 $pdf->SetFont('THSarabun','B',16);
 $pdf->SetXY(35,20);
 $pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
 $pdf->SetXY(65,20);
 $pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
 $pdf->SetXY(135,20);
 $pdf->MultiCell(55, 8 , iconv('UTF-8', 'tis620',"อีเมล"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
 $pdf->SetXY(190,20);
 $pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"เบอร์โทร"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
 $pdf->SetXY(220,20);
 $pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',"วันเกิด"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------
$y=28;
	}

}

$pdf->Output();   // แสดงผล
?>
