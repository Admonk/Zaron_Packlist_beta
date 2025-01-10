<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "efficq6n_madhura", "GUI6Tr&VE%&&", "efficq6n_madhura");
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
                          $name  = mysqli_real_escape_string($conn, $Row[0]);
                          $email       = mysqli_real_escape_string($conn, $Row[1]);
                          $phone                 = mysqli_real_escape_string($conn, $Row[2]);
                          $password              = mysqli_real_escape_string($conn, $Row[3]);
                          $address              = mysqli_real_escape_string($conn, $Row[4]);
                         
                          $status         = 1;


                         

                        
                          $date_added=date('d-m-Y g:i A');


                         


                        $id_get_m = "SELECT id FROM executive_list WHERE `phone` LIKE '%" . $phone . "%' ";
                        $result_m     = mysqli_query($conn, $id_get_m);
                        $query_sku_option_m=mysqli_num_rows($result_m);
                        if($query_sku_option_m==0)
                        {

                          if($phone!='')
                          {
                              
                          
                            $sql="INSERT INTO `executive_list` (`name`, `email`,`phone`, `address`, `status`,`password`,  `date_added`) VALUES ( '". $name ."', '".$email."', '".$phone."' ,'".$address."', '1', '".$password."' ,'".$date_added."')";
                            $result     = mysqli_query($conn, $sql);
                            $lsat_id=mysqli_insert_id($conn);
                           
                              $sql="INSERT INTO `admin_users` (`customer_and_executive_id`,`name`, `email`,`phone`,`password`, `org_password`,`address`, `status`,`access`,  `update_date`) VALUES ( '". $lsat_id ."','". $name ."', '".$email."', '".$phone."' ,'".md5($password)."' ,'".$password."','".$address."', '1','E', '".$date_added."')";
                              $result     = mysqli_query($conn, $sql);

                          }

                         }
                         else
                         {

                             $rowm = mysqli_fetch_assoc($result_m);
                             $row_id=$rowm['id'];
                             $sql="UPDATE `executive_list` SET `name`='".$name."',`phone`='".$phone."',`email`='".$email."',`address`='".$address."' WHERE id='".$row_id."'";
                             $result     = mysqli_query($conn, $sql);

                         }
                          


                  }

                  
            }
            
            
          

                    if (!empty($result)) {
                        
                        $type    = "success";
                        $message = "Excel Data Imported into the Database";
                        
                        ?>
                        <script>
                         alert('Success:Excel Data Imported into the Database');
                         window.location.href = 'https://admonk.in/madhura/customer/executive_list';
                        </script>
                       
                        <?php
                       
                      } else {
                        $type    = "error";
                        $message = "error:Problem in Importing Excel Data";
                        ?>
                        <script>
                        alert('error:Problem in Importing Excel Data');
                         window.location.href = 'https://admonk.in/madhura/customer/executive_list';
                        </script>
                        
                        <?php
                       

                    }
    } else {
                        $type    = "error";
                       $message = "error:Invalid File Type. Upload Excel File.";
        
                        ?>
                        <script>
                        alert('error:Invalid File Type. Upload Excel File.');
                         window.location.href = 'https://admonk.in/madhura/customer/executive_list';
                        </script>
                        <?php
        
        
    }
    ?>



          