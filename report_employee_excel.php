<?php
/** Error reporting */
error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
require_once "PHPExcel-1.8/Classes/PHPExcel.php";
include ("connectdb.php");

// ----- กำหนดรูปแบบข้อความ -----------------
$datastyle = array(
    'font' => array(
        'name' => 'TH SarabunPSK',
        'size' => 16,
        'bold' => true,
        'color' => array(
            'rgb' => '000000'
        ),
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array(
                'rgb' => '000000'
            ),
        ),
    ),   
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
);


$datastyletitle = array(
    'font' => array(
        'name' => 'TH SarabunPSK',
        'size' => 16,
        'bold' => true,
        'color' => array(
            'rgb' => '000000'
        ),
    ),
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
            'color' => array(
                'rgb' => '000000'
            ),
        ),
    ), 
	'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
            'rgb' => 'ccffff',
        ),
    ),
);



/** PHPExcel */

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
// Set properties
$objPHPExcel->getProperties()->setCreator("Sura")
							 ->setLastModifiedBy("Sura")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
// กำหนดแนวตั้งแนวนอน
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE );
// กำหนดขนาดกระดาษ
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);

// ใส่ข้อความลงไปใน cell
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'รายงานข้อมูลพนักงาน')
            ->setCellValue('A3', 'รหัสพนักงาน')
            ->setCellValue('B3', 'ชื่อพนักงาน')
			->setCellValue('C3', 'นามสกุลพนักงาน')
            ->setCellValue('D3', 'วันเกิด');

// กำหนดรูปแบบข้อความลงไปใน cell 
$objPHPExcel->getActiveSheet()->getStyle('A3:D3')->applyFromArray($datastyletitle);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // กำหนดความกว้างของแถว
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60); // กำหนดความกว้างของแถว
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60); // กำหนดความกว้างของแถว
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60); // กำหนดความกว้างของแถว


$sql="select * from employees ";
$result=mysqli_query($conn,$sql);


$i = 4;  // ----- นับแถว -----
while($objResult = mysqli_fetch_array($result))
{
	$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objResult["Employee_id"]);
	$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $objResult["Employee_firstname"]);
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $objResult["Employee_lastname"]);
    $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objResult["Employee_birth"]);
   $objPHPExcel->getActiveSheet()->getStyle('A'. $i.':D'.$i)->applyFromArray($datastyle);
	$i++;
}

// ---- ใส่ footer ----------------
$objPHPExcel->getActiveSheet()
    ->getHeaderFooter()->setOddFooter('&C&H&16&"TH SarabunPSK"บริษัท .................................... หมายเลขโทรศัพท์ ................................');
$objPHPExcel->getActiveSheet()
    ->getHeaderFooter()->setEvenFooter('&C&H&16&"TH SarabunPSK"บริษัท .................................... หมายเลขโทรศัพท์ ................................');

mysqli_close($conn);


// Save Excel 2007 file
/*
$fname="data_journal_".date("d-m-Y").".xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fname.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
*/
$fname="รายงานข้อมูลสินค้าวันที่ ".date("d-m-Y").".xls";
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$fname.'"');   //  กำหนดชือไฟล์  
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>