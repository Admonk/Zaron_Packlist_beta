<?php
ob_start();
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
require_once('excel/php-excel-reader/excel_reader2.php');
require_once('excel/SpreadsheetReader.php');

    
 $date_time=date('g:i A');
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        
        $targetPath = 'storage/' . $_FILES['file']['name'];
              
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        $totalamountval=0;
        for ($i = 0; $i <= 0; $i++) {



             $Reader->ChangeSheet($i);
             $count = 0;
            
             $order_no_array=array();
             foreach ($Reader as $Row) {


                        if ($count == 0) {
                            $count++;
                            continue;
                        }
          
          
          
          
                         $order_no_array[] = mysqli_real_escape_string($conn, $Row[0]);
                          $order_no = mysqli_real_escape_string($conn, $Row[0]);
                          
                          $date                 = date('Y-m-d',strtotime(mysqli_real_escape_string($conn, $Row[1])));
                          $customer_name                = mysqli_real_escape_string($conn, $Row[2]);
                          $route_name              = mysqli_real_escape_string($conn, $Row[3]);
                          $product_name               = mysqli_real_escape_string($conn, $Row[4]);
                          
                          $profile             = mysqli_real_escape_string($conn, $Row[5]);
                          $crimp             = mysqli_real_escape_string($conn, $Row[6]);
                          $nos            = mysqli_real_escape_string($conn, $Row[7]);
                          $uom            = mysqli_real_escape_string($conn, $Row[8]);
                          $uom            = 3;
                          $category_name= mysqli_real_escape_string($conn, $Row[9]);
                          
                          $qty            = mysqli_real_escape_string($conn, $Row[10]);
                          $rate           = mysqli_real_escape_string($conn, $Row[11]);
                          $totalamount            = mysqli_real_escape_string($conn, $Row[12]);
                          $salesperson            = mysqli_real_escape_string($conn, $Row[13]);
                          $order_status=1;
                          
                       
                          
                                   $sql_current_l = "SELECT * FROM admin_users WHERE `name`= '" . $salesperson . "' AND access='12' AND deleteid=0";
                                     $result_l = mysqli_query($conn, $sql_current_l);
                                     $res_l=$result_l->num_rows;
                                     $sales_team_id=0;
                                    
                                     if($result_l->num_rows>0)
                                     {
                                         while($value_l = mysqli_fetch_assoc($result_l))
                                         {
                                             $sales_team_id=$value_l['id'];
                                             $sales_group_id=$value_l['sales_group_id'];
                                            
                                         }
                                         
                                     }
                                     
                                     
                                     
                                     
                                         $sql_current_l = "SELECT * FROM customers WHERE `company_name`= '" . $customer_name . "'  AND deleteid=0";
                                         $result_l = mysqli_query($conn, $sql_current_l);
                                         $res_l=$result_l->num_rows;
                                         $address_id=0;
                                         $customer_id=0;
                                         if($result_l->num_rows>0)
                                         {
                                             while($value_l = mysqli_fetch_assoc($result_l))
                                             {
                                                 $customer_id=$value_l['id'];
                                                 $address_id=$value_l['address_id'];
                                                
                                             }
                                             
                                         }
                                         
                                         
                                         
                                         if($customer_id==0)
                                         {
                                             
                                           if($customer_name!='')
                                           {
                                               
                                           
                                           $cus_sql="INSERT INTO `customers` (`name`, `company_name`, `email`, `phone`, `gst`, `gst_status`, `pin`, `profile`, `zone`, `address1`, `address2`, `google_map_link`, `pincode`, `landmark`, `locality`, `route`, `city`, `feedback_details`, `feedback_sub`, `opening_balance`, `payment_status`, `credit_limit`, `credit_period`, `state`, `sales_group`, `sales_team_id`, `sales_head`, `landline`, `ratings`, `price_rateings`, `delivery_time_rateings`, `quality_rateings`, `response_commission`, `status`, `login_status`, `login_ip`, `update_date`, `deleteid`, `customer_type`, `custome_type`, `mdbirthday`, `mdname`, `address_id`, `account_heads_id`) VALUES ( NULL, '".$customer_name."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', NULL, CURRENT_TIMESTAMP, '0', NULL, NULL, NULL, NULL, NULL, 68)";
                                           $result_cus     = mysqli_query($conn, $cus_sql);
                                           $customer_id=mysqli_insert_id($conn); 
                                           
                                           }
                                           
                                             
                                             
                                         }
                                         
                                         
                                     
                                         $sql_current = "SELECT * FROM locality WHERE name='".$route_name."' AND deleteid=0";
                                         $result = mysqli_query($conn, $sql_current);
                                         $res=$result->num_rows;
                                         while($value = mysqli_fetch_assoc($result))
                                         {
                                            
                                             
                                             $route_id=$value['route_id'];
                                         }
                                     
                                     
                                     
                                         
                                         
                                         $sql_current = "SELECT * FROM product_list WHERE product_name='".$product_name."' AND deleteid=0";
                                         $result = mysqli_query($conn, $sql_current);
                                         $res=$result->num_rows;
                                         while($value = mysqli_fetch_assoc($result))
                                         {
                                            
                                             $product_name=$value['product_name'];
                                             $product_id=$value['id'];
                                             $type=$value['type'];
                                             $gst=$value['gst'];
                                             $categories=$value['categories'];
                                             $categories_id=$value['categories_id'];
                                             $formula=$value['formula'];
                                             
                                         }
                             
                                     
                      
                          
                          if($order_no!='')
                          {
                             
                              
                                         $sql_currentsss = "SELECT * FROM orders_process WHERE order_no='".$order_no."'";
                                         $resultsss = mysqli_query($conn, $sql_currentsss);
                                         $resss=$resultsss->num_rows;   
                                         
                                         if($resss==0)
                                         {
                                             
                                         
                                         
                                         
                                         
                                         $order_no_get=$order_no;
                                         
                                         
                                        $sql="INSERT INTO `orders_process` 
                                        (
                                        `order_no`,
                                        `customer_id`,
                                        `customer_address_id`,
                                        `user_id`,
                                        `entry_user_id`,
                                        `create_date`,
                                        `create_time`,
                                        `status`,
                                        `route_id`,
                                        `move_id`,
                                        `finance_status`,
                                        `payment_mode`,
                                        `delivery_status`,
                                        `delivery_mode`,
                                        `sales_group`,
                                        `deleteid`,
                                        `order_base`,
                                        `assign_date`,
                                        `trip_start_date`,
                                        `trip_end_date`,
                                        `payment_recived_date`,
                                        `production_start_date`,
                                        `reason`) 
                                        
                                         VALUES ( 
                                        '". $order_no ."',
                                        '".$customer_id."',
                                        '".$address_id."',
                                        '".$sales_team_id."',
                                        '".$sales_team_id."',
                                        '".$date."',
                                        '".$date_time."',
                                        '1',
                                        '".$route_id."',
                                        '1',
                                        '2',
                                        'Cash',
                                        '2',
                                        'full',
                                        '".$sales_group_id."',
                                        '0' ,
                                        '".$order_status."',
                                        '".$date."',
                                        '".$date."',
                                        '".$date."',
                                        '".$date."',
                                        '".$date."',
                                        'Process To Transpot')";
                                        
                                        $result     = mysqli_query($conn, $sql);
                                        $order_id=mysqli_insert_id($conn);
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        if($customer_id!=0)
                                        {
                                            
                                        
                                             
                                             
                                         $sqlleg="INSERT INTO `all_ledgers` 
                                         (
                                         `order_id`,
                                         `user_id`,
                                         `customer_id`,
                                         `payment_mode`,
                                         `order_no`,
                                         `reference_no`,
                                         `amount`,
                                         `credits`,
                                         `debits`,
                                         `payout`,
                                         `payin`,
                                         `paid_status`,
                                         `collected_amount`,
                                         `payment_date`,
                                         `payment_time`,
                                         `deleteid`,
                                         `balance`,
                                         `difference`,
                                         `payment_mode_payoff`,
                                         `notes`,
                                         `process_by`,
                                         `deletemod`,
                                         `cash_trasfer_status`,
                                         `account_head_id`,
                                         `account_heads_id_2`,
                                         `party_type`) VALUES 
                                          ('".$order_id."',
                                          '1', 
                                          '".$customer_id."',
                                          '', 
                                          '".$order_no."',
                                          '".$order_no."',
                                          '0',
                                          '0',
                                          '0',
                                           NULL,
                                          '0', 
                                          '0', 
                                          '0',
                                          '".$date."',
                                          '".$date_time."',
                                          '0',
                                          '0',
                                          '0',
                                           NULL,
                                          'Order Process',
                                          'Order Processed against order id ".$order_no."',
                                           NULL, '0', '68','116', '1')";
                                          
                                          
                                           $resultsss     = mysqli_query($conn, $sqlleg);
                                           $order_id_data=mysqli_insert_id($conn);
                                        
                                        }
                                        
                                        
                                        
                                        
                                        
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                                       
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                         
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                         }
                                         else
                                         {
                                             while($valuess = mysqli_fetch_assoc($resultsss))
                                             {
                                                 $order_id=$valuess['id'];
                                                 $order_no_get=$valuess['order_no_get'];
                                             }
                                             
                                         }
                                        
                                         
                                         
                                        
                                        
                                        $sql="INSERT INTO `order_product_list_process` 
                                        (
                                        `order_no`,
                                        `order_id`,
                                        `product_name`,
                                        `product_id`,
                                        `categories_id`,
                                        `categories_name`,
                                        `profile`,
                                        `crimp`,
                                        `nos`,
                                        `uom`,
                                        `rate`,
                                        `gst`,
                                        `qty`,
                                        `amount`,
                                        `fact`,
                                        `process_start_date`) 
                                        
                                         VALUES ( 
                                        '". $order_no ."',
                                        '".$order_id."',
                                        '".$product_name."',
                                        '".$product_id."',
                                        '".$categories_id."',
                                        '".$categories."',
                                        '".$profile."',
                                        '".$crimp."',
                                        '".$nos."',
                                        '".$uom."',
                                        '".$rate."',
                                        '".$gst."',
                                        '".$qty."',
                                        '".$totalamount."',
                                        '".$formula."',
                                        '".$date."')";
                                        
                                        $result     = mysqli_query($conn, $sql);
                                        mysqli_insert_id($conn);
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                     
                                     
                             
                              
                          }
                         


                       

                          


                  }
                  
                  
                  
                  
                  
                  
                  
                                 $orders_no_value=array_unique($order_no_array);
								 $orders_no_value=implode("','", $orders_no_value);
                                 $sql_current_amount = "SELECT SUM(qty*rate) as amount,order_no FROM order_product_list_process WHERE deleteid=0 AND order_no IN('".$orders_no_value."') GROUP BY order_id  ORDER BY id DESC";
 

                                                  $result_amm = mysqli_query($conn, $sql_current_amount);
                                                  $resmm=$result_amm->num_rows;
                                                  while($valuemm = mysqli_fetch_assoc($result_amm))
                                                  {
                                                      
                                                         $totalamountval=round($valuemm['amount']);
                                                         $order_noset=$valuemm['order_no'];

                                                         

                                                              $customer_id=0;
                                                              $sql_current_bal_cus = "SELECT * FROM orders_process WHERE customer_id!='0' AND order_no='".$order_noset."'";
                                                              $result_bal_cus = mysqli_query($conn, $sql_current_bal_cus);
				                                              $res_bal_cus=$result_bal_cus->num_rows;
				                                              while($valcus = mysqli_fetch_assoc($result_bal_cus))
				                                              {

				                                              	$customer_id=$valcus['customer_id'];

				                                              }

                                                             if($customer_id!=0)
                                                             {



			                                                             $balancetotal=0;
							                                             $debitsamount=0;
							                                             $creditsamount=0;
							                                             $sql_current_bal = "SELECT * FROM all_ledgers WHERE customer_id='".$customer_id."' AND party_type='1' AND deleteid=0";
							                                             $result_bal = mysqli_query($conn, $sql_current_bal);
							                                             $res_bal=$result_bal->num_rows;
							                                             while($val = mysqli_fetch_assoc($result_bal))
							                                             {
							                                                
							                                                                                     $payid=$val['id'];
							                                                                                     $customer_id=$val['customer_id'];
							                                                                                     $debitsamount+=$val['debits'];
							                                                                                     $creditsamount+=$val['credits'];
							                                                                                  
							                                                 
							                                             }
							                                             
				                                                         $balancetotal=$creditsamount-$debitsamount;

                                            
				                                                         if($balancetotal==0)
				                                                         {
				                                                                                                                 $balance='-'.$totalamountval;
				                                                         }
				                                                         else
				                                                         {
				                                                                                                                                          
				                                                                                                                   
				                                                                                                                $balance=$balancetotal-$totalamountval;
				                                                         } 
			                                                    
                                                  
                                                    
                                                    
				                                                          $sqlssv="UPDATE `all_ledgers` SET 
				                                                         `debits`='".$totalamountval."',
				                                                         `balance`='".$balance."',
				                                                         `amount`='".$totalamountval."',
				                                                         `collected_amount`='".$totalamountval."'
				                                                          WHERE order_no='".$order_noset."'";
				                                                          mysqli_query($conn, $sqlssv);


                                                          }
                                                       
                                                       
                                                       
                                                  }
                  
                  
                  

                  
            }
            
     
                    if (!empty($result)) {
                        
                        $type    = "success";
                        $message = "Excel Data Imported into the Database";
                        

                        ?>
                        <script>
                        alert('Success:Excel Data Imported into the Database.');
                         window.location.href = 'http://erp.zaron.in/index.php/order/orders_list';
                        </script>
                        <?php
                    } else {
                        $type    = "error";
                        $message = "Problem in Importing Excel Data";
                        ?>
                        <script>
                        alert('error:Problem in Importing Excel Data.');
                         window.location.href = 'http://erp.zaron.in/index.php/order/orders_list';
                        </script>
                        <?php
                    }
    } else {
                        $type    = "error";
                        $message = "error:Invalid File Type. Upload Excel File.";
        
                        ?>
                        <script>
                        alert('error:Invalid File Type. Upload Excel File.');
                         window.location.href = 'http://erp.zaron.in/index.php/order/orders_list';
                        </script>
                        <?php
        
        
    }
    ?>
    



          