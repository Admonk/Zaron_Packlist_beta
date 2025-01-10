<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
require_once('excel/php-excel-reader/excel_reader2.php');
require_once('excel/SpreadsheetReader.php');



$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        
        $targetPath = 'storage/' . $_FILES['file']['name'];
              
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        
        for ($i = 0; $i <= 0; $i++) {



            $Reader->ChangeSheet($i);
            $count = 0;
            
            
            
           
            
            foreach ($Reader as $Row) {


                        if ($count == 0) {
                            $count++;
                            continue;
                        }
          
                
                        
                          $product_id = mysqli_real_escape_string($conn, $Row[0]);
                          $categorie_name                = mysqli_real_escape_string($conn, $Row[1]);
                          $product_name               = mysqli_real_escape_string($conn, $Row[2]);
                          $stock           = mysqli_real_escape_string($conn, $Row[3]);
                          $optimal_stock           = mysqli_real_escape_string($conn, $Row[4]);
                          $production_stock           = mysqli_real_escape_string($conn, $Row[5]);
                          $min_order_stock           = mysqli_real_escape_string($conn, $Row[6]);
                          
                          $status         = 1;
                          $type=0;
                          
                          
                          
                                      $sql="UPDATE `product_list` SET 
                                     `stock`='".$stock."',
                                     `optimal_stock`='".$optimal_stock."',
                                     `production_stock`='".$production_stock."',
                                     `min_order_stock`='".$min_order_stock."'
                                      WHERE id='".$product_id."'";
                                      
                                      
                                      
                                      echo "<br><br><br><br>";
                                      
                                      $result     = mysqli_query($conn, $sql);


                       

                          


                  }

                  
            }
            
            

                    if (!empty($result)) {
                        
                        $type    = "success";
                        $message = "Excel Data Imported into the Database";
                        

                        ?>
                        <script>
                        alert('Success:Excel Data Imported into the Database.');
                         window.location.href = 'http://erp.zaron.in/index.php/products/products_list';
                        </script>
                        <?php
                    } else {
                        $type    = "error";
                        $message = "Problem in Importing Excel Data";
                        ?>
                        <script>
                        alert('error:Problem in Importing Excel Data.');
                         window.location.href = 'http://erp.zaron.in/index.php/products/products_list';
                        </script>
                        <?php
                    }
    } else {
                        $type    = "error";
                        $message = "error:Invalid File Type. Upload Excel File.";
        
                        ?>
                        <script>
                        alert('error:Invalid File Type. Upload Excel File.');
                         window.location.href = 'http://erp.zaron.in/index.php/products/products_list';
                        </script>
                        <?php
        
        
    }
    ?>
    



          