<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
include('export-an-excel/Classes/PHPExcel.php');

$objPHPExcel	=	new	PHPExcel();




$objPHPExcel->setActiveSheetIndex(0);
 
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Product ID');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Categorie Name');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Product Name'); 
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Actual Stock');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Stock On Hold');
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Stock In Production');
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Min Order QTY');

$objPHPExcel->getActiveSheet()->getStyle("A1:G1")->getFont()->setBold(true);


 $sql_current = "SELECT * FROM product_list WHERE deleteid=0 ORDER BY id DESC";
 $result = mysqli_query($conn, $sql_current);
 $res=$result->num_rows;
 
 
  if($result->num_rows>0)
 {
          $rowCount   =   2;
          while($value = mysqli_fetch_assoc($result))
          {
              
              
              
              
              
              
                  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($value['id'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($value['categories'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($value['product_name'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($value['stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($value['optimal_stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($value['production_stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($value['min_order_stock'],'UTF-8'));
                 
                 
                  
                
                 $rowCount++;
          }
          
          
          
 }

 
$objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
 
 
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="product_list_stock.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');











?>
    



          