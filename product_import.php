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
                          $categorie_id                 = mysqli_real_escape_string($conn, $Row[1]);
                          $categorie_name                = mysqli_real_escape_string($conn, $Row[2]);
                          $brand              = mysqli_real_escape_string($conn, $Row[3]);
                          $product_name               = mysqli_real_escape_string($conn, $Row[4]);
                          
                          $purchase_name               = mysqli_real_escape_string($conn, $Row[5]);
                          $specification               = mysqli_real_escape_string($conn, $Row[6]);
                          
                          $regular_price             = mysqli_real_escape_string($conn, $Row[7]);
                          $kg_price             = mysqli_real_escape_string($conn, $Row[8]);
                          $conversion_price            = mysqli_real_escape_string($conn, $Row[9]);
                          $coil_sale_price            = mysqli_real_escape_string($conn, $Row[10]);
                          $Retail_charges_price= mysqli_real_escape_string($conn, $Row[11]);
                          $formula            = mysqli_real_escape_string($conn, $Row[12]);
                          $formula2           = mysqli_real_escape_string($conn, $Row[13]);
                          $stock            = mysqli_real_escape_string($conn, $Row[14]);
                          $gst            = mysqli_real_escape_string($conn, $Row[15]);
                          $mos            = mysqli_real_escape_string($conn, $Row[16]);
                          $HSN_SAC            = mysqli_real_escape_string($conn, $Row[17]);
                          $description            = mysqli_real_escape_string($conn, $Row[18]);
                          
                          
                          $stock           = mysqli_real_escape_string($conn, $Row[19]);
                          $optimal_stock           = mysqli_real_escape_string($conn, $Row[20]);
                          $production_stock           = mysqli_real_escape_string($conn, $Row[21]);
                          $min_order_stock           = mysqli_real_escape_string($conn, $Row[22]);
                         
                          
                          $status         = 1;
                          $type=0;
                          
                          
                          
                          if($product_id==0)
                          {
                             
                                 if($categorie_id==0)
                                 {
                                    
                                        $sql="INSERT INTO `categories` (`categories`, `status`,`deleteid`,`type`) VALUES ( '". $categorie_name ."', '".$status."', '0' ,'0')";
                                        $result     = mysqli_query($conn, $sql);
                                        $categorie_id=mysqli_insert_id($conn);
                                        
                                     
                                   
                                 }
                                 else
                                 {
                                        //$sql="UPDATE `categories` SET `categories`='".$categorie_name."' WHERE id='".$categorie_id."'";
                                        //$result     = mysqli_query($conn, $sql);
                                        
                                         $sql_current = "SELECT * FROM categories WHERE id='".$categorie_id."' AND deleteid=0";
                                         $result = mysqli_query($conn, $sql_current);
                                         $res=$result->num_rows;
                                         while($value = mysqli_fetch_assoc($result))
                                         {
                                             $type=$value['type'];
                                             $categorie_name=$value['categories'];
                                         }
                                        
                                 }
                                 
                                $sql="INSERT INTO `product_list` (`categories_id`,`categories`, `brand`,`product_name`,`price`, `kg_price`,`conversion_price`, `coil_sale_price`,`retail_price`,`formula`,`formula2`,`stock`,`gst`,`mos`,`HSN_SAC`,`description`,`status`,`type`,`deleteid`,`stock`,`optimal_stock`,`production_stock`,`min_order_stock`,`purchase_name`,`specification`) 
                                 VALUES ( '". $categorie_id ."','". $categorie_name ."', '".$brand."', '".$product_name."' ,'".$regular_price."' ,'".$kg_price."','".$conversion_price."', '".$coil_sale_price."', '".$Retail_charges_price."', '".$formula."', '".$formula2."', '".$stock."', '".$gst."', '".$mos."', '".$HSN_SAC."', '".$description."', '".$status."', '".$type."', '0', '".$stock."', '".$optimal_stock."', '".$production_stock."', '".$min_order_stock."', '".$purchase_name."', '".$specification."')";
                                 $result     = mysqli_query($conn, $sql);                                 
                                 
                              
                          }
                          else
                          {
                              
                                 if($categorie_id==0)
                                 {
                                    
                                        $sql="INSERT INTO `categories` (`categories`, `status`,`deleteid`,`type`) VALUES ( '". $categorie_name ."', '".$status."', '0' ,'0')";
                                        $result     = mysqli_query($conn, $sql);
                                        $categorie_id=mysqli_insert_id($conn);
                                   
                                 }
                                 else
                                 {
                                        // $sql="UPDATE `categories` SET `categories`='".$categorie_name."' WHERE id='".$categorie_id."'";
                                        // $result     = mysqli_query($conn, $sql);
                                        
                                       $sql_current = "SELECT * FROM categories WHERE id='".$categorie_id."' AND deleteid=0";
                                         $result = mysqli_query($conn, $sql_current);
                                         $res=$result->num_rows;
                                         while($value = mysqli_fetch_assoc($result))
                                         {
                                             $type=$value['type'];
                                             $categorie_name=$value['categories'];
                                         }
                                 }
                              
                              
                              
                                   $sql="UPDATE `product_list` SET 
                                 `categories_id`='".$categorie_id."',
                                 `categories`='".$categorie_name."',
                                 `brand`='".$brand."',
                                 `product_name`='".$product_name."',
                                 `price`='".$regular_price."',
                                 `kg_price`='".$kg_price."',
                                 `conversion_price`='".$conversion_price."',
                                 `coil_sale_price`='".$coil_sale_price."',
                                 `retail_price`='".$Retail_charges_price."',
                                 `formula`='".$formula."',
                                 `purchase_name`='".$purchase_name."',
                                 `specification`='".$specification."',
                                 `formula2`='".$formula2."',
                                 `stock`='".$stock."',
                                 `gst`='".$gst."',
                                 `mos`='".$mos."',
                                 `HSN_SAC`='".$HSN_SAC."',
                                 `description`='".$description."',
                                 `type`='".$type."',
                                 `stock`='".$stock."',
                                 `optimal_stock`='".$optimal_stock."',
                                 `production_stock`='".$production_stock."',
                                 `min_order_stock`='".$min_order_stock."'
                                  WHERE id='".$product_id."'";
                                  $result     = mysqli_query($conn, $sql);
                              
                              
                              
                          }


                       

                          


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
    



          