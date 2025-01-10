<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
$time=date('h:i A');
$date1=date('Y-m-d');
$date2=date('Y-m-d', strtotime(' +1 day'));
$year = date('Y'); 
$date3=date('Y-m-d', strtotime(' -1 day'));
$fromdate=date('Y-m-01');

//$sql=" AND a.payment_date BETWEEN '".$fromdate."' AND '".$date1."'";

$sql="";

$customer_id=0;
$sql1=" AND b.id>0";
if(isset($_GET['customer_id']))
{
    $customer_id=$_GET['customer_id'];
    $sql1=" AND b.id='".$customer_id."'";
}


                 if(date('m') <= 3)
                {
                    
                     $from_year = date('Y')-1; 
                     $to_year=date('Y');
                     
                } 
                else
                {
                
                      $from_year = date('Y'); 
                      $to_year=date('Y')+1;
                     
                     
                    
                }

                     //echo   $year=$from_year.'-'.$to_year;
                     //exit;



                     $now = time(); // or your date as well
                     $datey=date('Y');
                     $your_date = strtotime($from_year."-04-01");
                     $datediff = $now - $your_date;
                    
                     $no_of_days= round($datediff / (60 * 60 * 24));


                     $months = array(
                        
                        'April',
                        'May',
                        'June',
                        'July ',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                        'January',
                        'February',
                        'March'
                    );


 $sql_current_l = "SELECT b.factory_workshop,b.sales_team_id,b.competitor,b.locality,b.phone,b.ratings as cc,b.price_rateings as pp,b.delivery_time_rateings as dd,b.quality_rateings as qq,b.response_commission as rr,b.id as customer_id,b.company_name,b.sales_team_id FROM customers as b  JOIN all_ledgers as c ON b.id=c.customer_id  WHERE b.deleteid='0' AND c.party_type=1  $sql1 GROUP BY b.id  ORDER BY b.sales_team_id DESC";





                                     $result_l = mysqli_query($conn, $sql_current_l);
                                      $res_l=$result_l->num_rows;
                                    


                                 
                                     if($result_l->num_rows>0)
                                     {
                                         while($value = mysqli_fetch_assoc($result_l))
                                         {





                      

                                                                $route_name="";
                                                                $a="SELECT r.name FROM locality as a JOIN route as r ON a.route_id=r.id WHERE  a.id='".$value['locality']."'";
                                                                $a = mysqli_query($conn, $a);
                                                                while($aa = mysqli_fetch_assoc($a))
                                                                {
                                                                    $route_name=$aa['name'];
                                                                                                        
                                                                }

                                                               
                                                               $a1="SELECT a.name FROM admin_users as a  WHERE  a.id='".$value['sales_team_id']."'";
                                                                $a1 = mysqli_query($conn, $a1);
                                                                while($aa1 = mysqli_fetch_assoc($a1))
                                                                {
                                                                    $sales_member=$aa1['name'];
                                                                                                        
                                                                }

                                                               $customername = $value['company_name'];
                                                               $customer_id=$value['customer_id'];
                                                               $customerphone=$value['phone'];
                                                               $sales_team_id=$value['sales_team_id'];
                                                              

                                                               $factory_workshop=$value['factory_workshop'];
                                                               $competitor=$value['competitor'];
                                                               $cc=$value['cc'];
                                                        

                                                                $pp=$value['pp'];
                                                                $qq=$value['dd'];
                                                                $rr=$value['rr'];



                                         $sql_current_bal = "SELECT * FROM customer_yes_or_no_report WHERE  customer_id='".$customer_id."' AND year='".$year."'";
                                                           $result_bal = mysqli_query($conn, $sql_current_bal);
                                                           $res_bal=$result_bal->num_rows;
                                                          if($res_bal>0)
                                                          {



 
                                                                     $sqlssv="UPDATE `customer_yes_or_no_report` SET 
                                                                    `customer_id`='".$customer_id."',
                                                                    `area`='".$route_name."',
                                                                    `sales_member`='".$sales_member."',
                                                                    `sales_team_id`='".$sales_team_id."',
                                                                    `customername`='".$customername."',
                                                                    `customerphone`='".$customerphone."',
                                                                    `competitor`='".$competitor."',
                                                                    `factory_workshop`='".$factory_workshop."',
                                                                    `cc`='".$cc."',
                                                                    `pp`='".$pp."',
                                                                    `dd`='".$dd."',
                                                                    `qq`='".$qq."',
                                                                    `rr`='".$rr."',
                                                                    `update_date`='".$date1."',
                                                                    `update_time`='".$time."',
                                                                    `year`='".$year."'
                                                                     WHERE customer_id='".$customer_id."'";
                                                                     mysqli_query($conn, $sqlssv);
 





                                                          }
                                                          else
                                                          {




   $cus_sql="INSERT INTO `customer_yes_or_no_report` (
                                                                   
                                                                    `customer_id`,
                                                                    `area`,
                                                                    `sales_member`,
                                                                    `sales_team_id`,
                                                                    `customername`,
                                                                    `customerphone`,
                                                                    `competitor`,
                                                                    `factory_workshop`,
                                                                    `cc`,
                                                                    `pp`,
                                                                    `dd`,
                                                                    `qq`,
                                                                    `rr`,
                                                                    `update_date`,
                                                                    `update_time`,
                                                                    `year`

       ) VALUES ( 
                                                                         '".$customer_id."',
                                                                         '".$route_name."',
                                                                         '".$sales_member."',
                                                                         '".$sales_team_id."',
                                                                         '".$customername."',
                                                                         '".$customerphone."',
                                                                         '".$competitor."',
                                                                         '".$factory_workshop."',
                                                                         '".$cc."',
                                                                         '".$pp."',
                                                                         '".$dd."',
                                                                         '".$qq."',
                                                                         '".$rr."',
                                                                         '".$date1."',
                                                                         '".$time."',
                                                                         '".$year."'
         )";




                                               $result_cus     = mysqli_query($conn, $cus_sql);
                                           $customer_ids=mysqli_insert_id($conn); 





                                                          }




                                                                $monthvales=array();
                                                                for ($j=0; $j <count($months) ; $j++) 
                                                                { 
                                                                    
                                                                    
                                                                   
                                                                 $monthss="SELECT id as nos,MONTHNAME(create_date) as month FROM orders_process   WHERE  customer_id='".$value['customer_id']."' AND order_base>0 AND deleteid=0 HAVING month='".$months[$j]."'";
                                                                 $resultaugset = mysqli_query($conn, $monthss);

                                                                    
                                                                    $Setup='';

                                                                    if($resultaugset->num_rows>0)
                                                                    {
                                                                        $ssd=0;
                                                                        while($valueset = mysqli_fetch_assoc($resultaugset))
                                                                        {
     
                                                                            $ssd++;

                                                                         }

                                                                         $Setup='YES ('.$ssd.')';

                                                                     }
                                                                 
                                                                   $monthsval=  $months[$j];


                                                              

                                     echo  $sqlssvss="UPDATE `customer_yes_or_no_report` SET ".$monthsval."='".$Setup."' WHERE customer_id='".$customer_id."'";
                                     mysqli_query($conn, $sqlssvss);
                                     

                                     echo "<br>"; 
                                     echo "<br>"; 
                                     echo "<br>";                               
                                       
                                                                    
                                                                }




 $totalba=0;
                          


$monthss_setval="SELECT count(a.id) as nos,SUM(a.bill_total) as totalamount  FROM orders_process as a WHERE   a.order_base>0 AND a.customer_id='".$value['customer_id']."'";
        $set = mysqli_query($conn, $monthss_setval);


                                 while($as = mysqli_fetch_assoc($set))
                                 {
                                                       $nos=1;
                                                       if($as['nos']!='')
                                                       {
                                                          $nos=$as['nos'];
                                                       }
                                                       
                                                       $totalamount=1;
                                                       if($as['totalamount']!='')
                                                       {
                                                           $totalamount=round($as['totalamount'],2);
                                                       }

                                                       
                                                      $totalsa=$totalamount/$no_of_days;
                                                      $totalba=$nos/$no_of_days;
                                }



                                  $sqlssvsss="UPDATE `customer_yes_or_no_report` SET sa='".substr($totalsa,0,3)."',ba='".substr($totalba,0,3)."' WHERE customer_id='".$customer_id."'";
                                  mysqli_query($conn, $sqlssvsss);
                                






                                                               




                                                              



                                                                
                                                      


                                            
                                         }
                                         
                                     }





