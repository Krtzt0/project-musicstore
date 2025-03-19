<?php
require('fpdf182/fpdf.php');
include('connectdb.php');
// เขียนภาษา SQL 
$sql="SELECT orders.Order_id,customer.Customer_name,product.Product_name,employees.Employee_firstname
                        FROM orders INNER JOIN customer ON orders.Customer_id = customer.Customer_id
                        INNER JOIN product ON orders.Product_id = product.Product_id
                        INNER JOIN employees ON orders.Employee_id = employees.Employee_id";

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
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลการสั่งซื้อ')); //  x,y, ข้อความ    
$pdf->SetXY(180,8);
 $pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');

$pdf->SetFont('THSarabun','B',16);

//-------- ส่วนหัวของตาราง ------------------
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสการสั่งซื้อ"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,20);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',"ชื่อลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(90,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(160,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"ชื่อพนักงาน"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------


$y=28;
while($row=mysqli_fetch_assoc($result))
{
$pdf->SetFont('THSarabun','',16);
$pdf->SetXY(10,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["Order_id"]),1,C,0); //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,$y);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',$row["Customer_name"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(90,$y);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',$row["Product_name"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(160,$y);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',$row["Employee_firstname"]),1,C,0);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$y=$y+8;   // เพิ่มบรรทัด
//  ถ้าบรรทัดเกิดหน้า ให้ขึ้นหน้าใหม่
if($y>260)
	{
$pdf->AddPage();
$pdf->SetXY(180,8);
$pdf->Cell(10,10,'Page '.$pdf->PageNo(),0,0,'C');
$pdf->SetFont('THSarabun','B',18);
$pdf->Text( 88 , 15 , iconv('UTF-8', 'tis620', 'รายงานข้อมูลการสั่งซื้อ')); //  x,y, ข้อความ   
 //-------- ส่วนหัวของตาราง ------------------
 $pdf->SetFont('THSarabun','B',16);
$pdf->SetXY(10,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"รหัสการสั่งซื้อ"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(40,20);
$pdf->MultiCell(50, 8 , iconv('UTF-8', 'tis620',"ชื่อลูกค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(90,20);
$pdf->MultiCell(70, 8 , iconv('UTF-8', 'tis620',"ชื่อสินค้า"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
$pdf->SetXY(160,20);
$pdf->MultiCell(30, 8 , iconv('UTF-8', 'tis620',"ชื่อพนักงาน"),1,C,fill);   //  ยาว,สูง,ข้อความ,เส้นขอบ,ตำแหน่ง(L,R,C),แสดงสีพื้นหลัง(fill,0)
//-------- จบส่วนหัวของตาราง ------------------
$y=28;
	}

}

$pdf->Output();   // แสดงผล
?>
