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
          
                
                          $inward_qty=0;
                          $price=0;
                          $company_name = mysqli_real_escape_string($conn, trim($Row[0]));

                          $company_name1=str_replace('-', ' ', $company_name);
                          $company_name=str_replace('/', ' ', $company_name1);


                          $sales_group                 = mysqli_real_escape_string($conn, $Row[1]);
                          $sales_team_id                = mysqli_real_escape_string($conn, $Row[2]);
                          $address1              = mysqli_real_escape_string($conn, $Row[3]);
                          $address2               = mysqli_real_escape_string($conn, $Row[4]);
                          $route           = mysqli_real_escape_string($conn, $Row[5]);
                          $locality             = mysqli_real_escape_string($conn, $Row[6]);
                          
                          $phone             = mysqli_real_escape_string($conn, trim($Row[7]));
                          $alphone             = mysqli_real_escape_string($conn, $Row[8]);
                          $gst            = mysqli_real_escape_string($conn, $Row[9]);
                          $state            = mysqli_real_escape_string($conn, $Row[10]);
                          
                          $city            = mysqli_real_escape_string($conn, $Row[11]);
                          $zone            = mysqli_real_escape_string($conn, $Row[12]);
                          $pincode            = mysqli_real_escape_string($conn, $Row[13]);
                          $pin=substr(time(), 4);
                          $pin            = mysqli_real_escape_string($conn, $Row[14]);
                          $type            = mysqli_real_escape_string($conn, $Row[15]);
                          
                          
                          
                              $Opening_Balance            = mysqli_real_escape_string($conn, $Row[16]);
                           $Cridet_limit            = mysqli_real_escape_string($conn, $Row[17]);
                           $Cridet_Period            = mysqli_real_escape_string($conn, $Row[18]);
                           $FeedBack            = mysqli_real_escape_string($conn, $Row[19]);
                           $Over_All_Rating            = mysqli_real_escape_string($conn, $Row[20]);
                           $Price_Rating            = mysqli_real_escape_string($conn, $Row[21]);
                           $Delivery_Time_Rating            = mysqli_real_escape_string($conn, $Row[22]);
                           $Quality_Rating            = mysqli_real_escape_string($conn, $Row[23]);
                          $Response_Commission_Rating           = mysqli_real_escape_string($conn, $Row[24]);
                          
                          
                          
                          $status         = 1;
                          $date_added=date('d-m-Y g:i A');


                             $sql_current = "SELECT * FROM route WHERE `name`='" . $route . "' AND deleteid=0";
                             $result = mysqli_query($conn, $sql_current);
                             $res=$result->num_rows;
                             
                             if($result->num_rows>0)
                             {  
                                 $route=0;
                                 while($value = mysqli_fetch_assoc($result))
                                 {
                                     $route=$value['id'];
                                 }
                                 
                             }
                             else
                             {
                                 
                                      $sql="INSERT INTO `route` (`name`, `status`, `deleteid`) VALUES 
                                      ( '". $route ."','1', '0')";
                                      $result     = mysqli_query($conn, $sql);
                                      $route=mysqli_insert_id($conn);
                          
                                 
                                 
                             }
                             
                             
                             $sql_current_l = "SELECT * FROM locality WHERE `name`='" . $locality . "' AND deleteid=0";
                             $result_l = mysqli_query($conn, $sql_current_l);
                             $res_l=$result_l->num_rows;
                            
                             
                             
                           
                             
                             if($result_l->num_rows>0)
                             {
                                 
                                         $locality=0;
                                         while($value_l = mysqli_fetch_assoc($result_l))
                                         {
                                             $locality=$value_l['id'];
                                             $locality_name=$value_l['name'];
                                         }
                                 
                                         $sql="UPDATE `locality` SET `name`='".$locality_name."',`route_id`='".$route."' WHERE id='".$locality."'";
                                         mysqli_query($conn, $sql);
                             
                                 
                                 
                             }
                             else
                             {
                                      $sql="INSERT INTO `locality` (`route_id`,`name`, `status`, `deleteid`) VALUES 
                                      ( '". $route ."','". $locality ."','1', '0')";
                                      $result     = mysqli_query($conn, $sql);
                                      $locality=mysqli_insert_id($conn);
                             }
                             
                             
                            
                             
                             $sql_current_l = "SELECT * FROM admin_users WHERE `name`= '" . $sales_team_id . "' AND access='12' AND deleteid=0";
                             $result_l = mysqli_query($conn, $sql_current_l);
                             $res_l=$result_l->num_rows;
                             $sales_team_id=0;
                            
                             if($result_l->num_rows>0)
                             {
                                 while($value_l = mysqli_fetch_assoc($result_l))
                                 {
                                     $sales_team_id=$value_l['id'];
                                    // $sales_group=$value_l['sales_group_id'];
                                 }
                                 
                             }
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             $sql_current_lg = "SELECT * FROM sales_group WHERE `name`='" . $sales_group . "' AND deleteid=0";
                             $result_lg = mysqli_query($conn, $sql_current_lg);
                             $res_lg=$result_lg->num_rows;
                            
                             
                             
                           
                             
                             if($result_lg->num_rows>0)
                             {
                                 
                                         $sales_group=0;
                                         while($value_lg = mysqli_fetch_assoc($result_lg))
                                         {
                                            
                                             $sales_group=$value_lg['id'];
                                             $sales_group_name=$value_lg['name'];
                                         }
                                 
                                         $sql="UPDATE `sales_group` SET `name`='".$sales_group_name."' WHERE id='".$sales_group."'";
                                         mysqli_query($conn, $sql);
                             
                                 
                                 
                             }
                             else
                             {
                                      $sql="INSERT INTO `sales_group` (`name`,  `deleteid`) VALUES 
                                      ('". $sales_group ."', '0')";
                                      $result     = mysqli_query($conn, $sql);
                                      $sales_group=mysqli_insert_id($conn);
                             }
                             
                             
                             
                             
                             
                             
                             
                             
                             
                        
                                      $gst_status='1';
                                      if(trim($gst)=='')
                                      {
                                          $gst='Un-Registered';
                                           $gst_status='2';
                                      }
                              
                          
                         echo "WHERE"; $sql="INSERT INTO `customers` (`company_name`,`gst_status`,`landline`, `sales_group`,`sales_team_id`,`address1`, `address2`,`landmark`, `phone`,  `gst`,`state`,`status`,`pin`,`city`,`locality`,`pincode`,`route`,`customer_type`,`opening_balance`,`credit_limit`,`credit_period`,`feedback_details`,`ratings`,`price_rateings`,`delivery_time_rateings`,`quality_rateings`,`response_commission`) VALUES 
                          ( '". $company_name ."','". $gst_status ."','". $alphone ."', '".$sales_group."', '".$sales_team_id."' ,'".$address1."' ,'".$address2."','".$landmark."', '".$phone."', '".$gst."','".$state."','1','".$pin."','".$city."','".$locality."','".$pincode."','".$route."','".$type."','".$Opening_Balance."','".$Cridet_limit."','".$Cridet_Period."','".$FeedBack."','".$Over_All_Rating."','".$Price_Rating."','".$Delivery_Time_Rating."','".$Quality_Rating."','".$Response_Commission_Rating."')";
                         
                         echo "<br><br>";
                         
                          $result     = mysqli_query($conn, $sql);
                          $lsat_id=mysqli_insert_id($conn);
                          
                          
                          
                          
                              $sql="INSERT INTO `customers_adddrss` (`customer_id`,`name`, `address1`, `address2`,`landmark`, `phone`,`state`,`status`,`city`,`locality`,`pincode`,`route`) VALUES 
                          ( '". $lsat_id ."','". $company_name ."', '".$address1."' ,'".$address2."','".$landmark."', '".$phone."', '".$state."','1','".$city."','".$locality."','".$pincode."','".$route."')";
                          $result     = mysqli_query($conn, $sql);
                          
                              
                          
                          

                             
                             
                             
 


                          


                  }

                  
            }
            
            

                    if (!empty($result)) {
                        
                        $type    = "success";
                        $message = "Excel Data Imported into the Database";
                        

                        ?>
                        <script>
                        alert('Success:Excel Data Imported into the Database.');
                         window.location.href = 'http://erp.zaron.in/index.php/customer/customer_list';
                        </script>
                        <?php
                    } else {
                        $type    = "error";
                        $message = "Problem in Importing Excel Data";
                        ?>
                        <script>
                        alert('error:Problem in Importing Excel Data.');
                         window.location.href = 'http://erp.zaron.in/index.php/customer/customer_list';
                        </script>
                        <?php
                    }
    } else {
                        $type    = "error";
                        $message = "error:Invalid File Type. Upload Excel File.";
        
                        ?>
                        <script>
                        alert('error:Invalid File Type. Upload Excel File.');
                         window.location.href = 'http://erp.zaron.in/index.php/customer/customer_list';
                        </script>
                        <?php
        
        
    }
    ?>
    



          
