<?php
require('fpdf182/fpdf.php');
include('connectdb.php');
// เขียนภาษา SQL 
$sql="SELECT product.Product_id,product.Product_name,producttype.Type_name,product.Product_price
      FROM product 
      INNER JOIN producttype ON product.Type_id=producttype.Type_id";

$result=mysqli_query($conn,$sql) or die('sql ผิด');
		// 3. นับจำนวนข้อมูล
$count=mysqli_num_rows($result);


$pdf=new FPDF("P");   // P= แนวตั้ง, L=แนวนอน

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
$pdf->SetXY(180,8);
 $pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');

$pdf->SetFont('THSarabun','B',16);

//-------- ส่วนหัวของตาราง ------------------
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(110,20);
$pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',"ชื่อประเภท"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(150,20);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',"ราคา"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------


$y=28;
while($row=mysqli_fetch_assoc($result))
{
$pdf->SetFont('THSarabun','',16);
$pdf->SetXY(10,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["Product_id"]),1,C,0); //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,$y);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',$row["Product_name"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(110,$y);
$pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',$row["Type_name"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(150,$y);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',$row["Product_price"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
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
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(110,20);
$pdf->MultiCell(40, 8 , iconv('UTF-8', 'tis620',"ชื่อประเภท"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(150,20);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',"ราคา"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------
$y=28;
	}

}

$pdf->Output();   // แสดงผล
?>
