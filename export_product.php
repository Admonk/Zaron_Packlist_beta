<?php 
ob_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
include('export-an-excel/Classes/PHPExcel.php');

$objPHPExcel	=	new	PHPExcel();




$objPHPExcel->setActiveSheetIndex(0);
 
$objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Product ID');
$objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Categorie ID');
$objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Categorie Name');
$objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Brand');
$objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Product Name'); 
$objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Purchase Name'); 
$objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Specification'); 
$objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Regular Price');
$objPHPExcel->getActiveSheet()->SetCellValue('I1', 'KG Price');
$objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Conversion Price');
$objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Coil Sale Price');
$objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Retail & Charges Price');
$objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Fact/Sq.Mtrs/Running meter weight/ Dimension 1');
$objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Fact/Sq.Mtrs/Running meter weight/ Dimension 2');
$objPHPExcel->getActiveSheet()->SetCellValue('O1', 'GST');
$objPHPExcel->getActiveSheet()->SetCellValue('P1', 'HSN SAC');
$objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'MOS');
$objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Description');
$objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Actual Stock');
$objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Stock On Hold');
$objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Stock In Production');
$objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Min Order QTY');

$objPHPExcel->getActiveSheet()->getStyle("A1:V1")->getFont()->setBold(true);
 $sql_current = "SELECT * FROM product_list WHERE deleteid=0 ORDER BY id DESC";
 $result = mysqli_query($conn, $sql_current);
 $res=$result->num_rows;
 
 
  if($result->num_rows>0)
 {
          $rowCount   =   2;
          while($value = mysqli_fetch_assoc($result))
          {
              
              
              
                  
                 
                  $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, mb_strtoupper($value['id'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, mb_strtoupper($value['categories_id'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, mb_strtoupper($value['categories'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, mb_strtoupper($value['brand'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, mb_strtoupper($value['product_name'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, mb_strtoupper($value['purchase_name'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, mb_strtoupper($value['specification'],'UTF-8'));
                  
                  
                  
                  $objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, mb_strtoupper($value['price'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, mb_strtoupper($value['kg_price'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, mb_strtoupper($value['conversion_price'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, mb_strtoupper($value['coil_sale_price'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, mb_strtoupper($value['retail_price'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, mb_strtoupper($value['formula'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, mb_strtoupper($value['formula2'],'UTF-8'));
                 
                  $objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, mb_strtoupper($value['gst'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, mb_strtoupper($value['HSN_SAC'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, mb_strtoupper($value['mos'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, mb_strtoupper($value['description'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, mb_strtoupper($value['stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, mb_strtoupper($value['optimal_stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, mb_strtoupper($value['production_stock'],'UTF-8'));
                  $objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, mb_strtoupper($value['min_order_stock'],'UTF-8'));
                 
                 
                  
                  
                
                 $rowCount++;
          }
          
          
          
 }

 
$objWriter  =   new PHPExcel_Writer_Excel2007($objPHPExcel);
 
 
header('Content-Type: application/vnd.ms-excel'); //mime type
header('Content-Disposition: attachment;filename="product_list.xlsx"'); //tell browser what's the file name
header('Cache-Control: max-age=0'); //no cache
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
$objWriter->save('php://output');











?>
    



          

          
