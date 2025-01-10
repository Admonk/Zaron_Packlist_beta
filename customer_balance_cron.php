<?php
error_reporting(E_ALL);
date_default_timezone_set("Asia/Kolkata");
$conn = mysqli_connect("localhost", "zaronlive", "Zaronlive@54321$", "zaronlive");
$time=date('h:i A');
$date1=date('Y-m-d');
$date2=date('Y-m-d', strtotime(' +1 day'));

$date3=date('Y-m-d', strtotime(' -1 day'));
$fromdate=date('Y-m-01');

//$sql=" AND a.payment_date BETWEEN '".$fromdate."' AND '".$date1."'";

$sql="";

$customer_id=0;
$sql1=" AND a.customer_id>0";
if(isset($_GET['customer_id']))
{
    $customer_id=$_GET['customer_id'];
    $sql1=" AND a.customer_id='".$customer_id."'";
}

$sql_current_l = "SELECT b.mark_vendor_id,b.locality,a.customer_id,b.feedback_details,b.sales_team_id,b.company_name,b.phone,b.tcs_status,a.id,a.opening_balance_status,SUM(a.debits) as debits,SUM(a.credits) as credits,a.payment_date,a.deleteid,a.deletemod FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.party_type='1'  AND b.deleteid=0  AND a.customer_id NOT LIKE '%EE%' AND a.cnn_status=0   $sql1  GROUP BY a.customer_id ORDER BY b.sales_team_id DESC";





                                     $result_l = mysqli_query($conn, $sql_current_l);
                                     $res_l=$result_l->num_rows;
                                     $sales_team_id=0;
                                  
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

                                               
                                                // $a1="SELECT a.sales_team_id FROM customers as a  WHERE  a.id='".$value['customer_id']."'";
                                                // $a1 = mysqli_query($conn, $a1);
                                                // while($aa1 = mysqli_fetch_assoc($a1))
                                                // {
                                                //   $sales_team_id=$aa1['sales_team_id'];
                                                                                        
                                                // }







                                                      

                                                               $tcs_status = $value['tcs_status'];
                                                               $customer_id=$value['customer_id'];
                                                               $mark_vendor_id=$value['mark_vendor_id'];
                                                               //$trnDr=round($value['debits'],2);
                                                               //$trnCr=round($value['credits'],2);
                                                               $payment_date=$value['payment_date'];
                                                               $deleteid=0;
                                                               $deletemod=$value['deletemod'];
                                                               $trid=$value['id'];
                                                               $opening_balance_status=$value['opening_balance_status'];
                                                        

                                                        $company_name=$value['company_name'];
                                                        $phone=$value['phone'];
                                                        $sales_team_id=$value['sales_team_id'];
                                                        $feedback_details=$value['feedback_details'];
                                                      







                                                          

                                                    $resultDRss="SELECT SUM(a.credits-a.debits) as totalamount FROM all_ledgers as a   WHERE   a.opening_balance_status='0' AND a.payment_date < '".$date1."'  AND a.deleteid=0 AND a.cnn_status=0 AND a.opening_balance_status='0' AND a.party_type='1'  AND a.customer_id='".$customer_id."'";
                                                              
                                                           
                                                                 $total_credit_balance=0;
                                                                 $total_debit_balance=0;
                                                                 $resultDRss = mysqli_query($conn, $resultDRss);
                                                                 while($vals = mysqli_fetch_assoc($resultDRss))
                                                                 { 
                                                                   
                                                                                $opeing_balance_values=$vals['totalamount']; 
                                                                                if($opeing_balance_values>0)
                                                                                {
                                                                                    $total_credit_balance=abs($opeing_balance_values);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $total_debit_balance=abs($opeing_balance_values);
                                                                                }
                                                                                         
                                                                }


                                             if($mark_vendor_id>0)
                                             {


 $total_credit_balance=0;
                                                                 $total_debit_balance=0;
                                          $oldresultDRsscurrentdate="SELECT SUM(a.credits-a.debits) as totalamount,SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE   a.opening_balance_status='0' AND a.payment_date < '".$date1."'  AND a.cnn_status = 0  AND a.deleteid=0 AND a.party_type IN ('3','1')  AND a.customer_id IN ('".$mark_vendor_id."','".$customer_id."')";

                                              

                                                    $oldresultDRsscurrentdate = mysqli_query($conn, $oldresultDRsscurrentdate);
                                                                 while($vals = mysqli_fetch_assoc($oldresultDRsscurrentdate))
                                                                 { 
                                                                   
                                                                                $opeing_balance_values=$vals['totalamount']; 
                                                                                if($opeing_balance_values>0)
                                                                                {
                                                                                    $total_credit_balance=abs($opeing_balance_values);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $total_debit_balance=abs($opeing_balance_values);
                                                                                }
                                                                                         
                                                                }


                                             }
                               


                                                   $opeing_balance="SELECT SUM(a.credits-a.debits) as totalamount FROM all_ledgers as a   WHERE   a.opening_balance_status='1'  AND a.deleteid=0  AND a.party_type='1' AND a.cnn_status=0  AND a.customer_id='".$customer_id."'";
                                                           

                                                                 $total_credit_balance_new=0;
                                                                 $total_debit_balance_new=0;
                                                                 $opeing_balance = mysqli_query($conn, $opeing_balance);
                                                                 while($val = mysqli_fetch_assoc($opeing_balance))
                                                                 { 
                                                                   
                                                                                $opeing_balance_value=$val['totalamount']; 
                                                                                if($opeing_balance_value>0)
                                                                                {
                                                                              $total_credit_balance_new=abs($opeing_balance_value);
                                                                                }
                                                                                else
                                                                                {
                                                                              $total_debit_balance_new=abs($opeing_balance_value);
                                                                                }
                                                                                         
                                                                }





                                             if($mark_vendor_id>0)
                                             {


                                            $total_credit_balance_new=0;
                                            $total_debit_balance_new=0;
                                            $resultDRsscurrentdate="SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE   a.opening_balance_status='1' AND a.cnn_status = 0  AND a.deleteid=0 AND a.party_type IN ('3','1')  AND a.customer_id IN ('".$mark_vendor_id."','".$customer_id."')";
                                              $resultDRsscurrentdate = mysqli_query($conn, $resultDRsscurrentdate);

                                                                 while($setv = mysqli_fetch_assoc($resultDRsscurrentdate))
                                                                 { 



                                                                         $opeing_balance_value=$setv['credits']-$setv['debits'];

                                                                              if($opeing_balance_value>0)
                                                                                {
                                                                              $total_credit_balance_new=abs($opeing_balance_value);
                                                                                }
                                                                                else
                                                                                {
                                                                              $total_debit_balance_new=abs($opeing_balance_value);
                                                                                }



                                                                 }


                                             }


                                                


                                                   $totalvaluecrited= round($total_credit_balance+$total_credit_balance_new,2);
                                                  $totalvaluedebit= round($total_debit_balance+$total_debit_balance_new,2);





                                                                
                                                                $totalvaluecrited=abs($totalvaluecrited);
                                                                $totalvaluedebit=abs($totalvaluedebit);



                                                                
                                                                $opening_balance_val=$totalvaluecrited-$totalvaluedebit;
                                                    
                                                        
                                                                $payment_status="";


                                                                 if($opening_balance_val>0)
                                                                 {
                                                                   $opening_balance_cr=abs($opening_balance_val);
                                                                   $opening_balance_dr=0;
                                                                 }
                                                                 else
                                                                 {


                                                                   $opening_balance_dr=abs($opening_balance_val);
                                                                   $opening_balance_cr=0;

                                                                 }
                                                                
                                                                 


                                                                $opening_balance=abs($opening_balance_val);
                                                                
                                                                
                                                                if($opening_balance_val>0)
                                                                {
                                                                    $payment_status='CR';
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    $payment_status='DR';  
                                                                   
                                                                }
                                                                                    

                                             



                                                                $trnDr=0;
                                                                $trnCr=0;

                                                                $resultDRss_1="SELECT  SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date BETWEEN '".$date1."' AND '".$date1."' AND   a.opening_balance_status='0' AND a.cnn_status=0  AND a.deleteid=0  AND a.party_type='1' AND a.customer_id='".$customer_id."'";
                                                           
                                                                 $total_credit_balance=0;
                                                                 $total_debit_balance=0;
                                                                 $resultDRss_1 = mysqli_query($conn, $resultDRss_1);
                                                                 while($vals_1 = mysqli_fetch_assoc($resultDRss_1))
                                                                 { 
                                                                    $trnDr=round($vals_1['debits']);
                                                                    $trnCr=round($vals_1['credits']);
                                                                                         
                                                                }

if($mark_vendor_id>0)
{

  $Drss="SELECT SUM(a.debits) as debits,SUM(CASE WHEN a.payment_date > '2024-05-31' AND a.account_heads_id_2 = 119 THEN a.credits * 1.18 ELSE a.credits END) as credits FROM all_ledgers as a   WHERE   a.payment_date BETWEEN '".$date1."' AND '".$date1."' AND a.deleteid=0 AND a.party_type='3' AND  a.cnn_status = 0 AND a.opening_balance_status='0'  AND a.customer_id='".$mark_vendor_id."'";
                                                                  $Drss = mysqli_query($conn, $Drss);
                                                                 while($sd = mysqli_fetch_assoc($Drss))
                                                                 { 

                                                                        $trnDr=round($trnDr+$sd['debits']);
                                                                        $trnCr=round($trnCr+$sd['credits']);


                                                                 }




}



 




                                                                  $creditsset=0;
                                                                  $debitsset=0;
                                                                  $Toatbalance=0;
                                                                 
                                                                  $closeing=0;
                                                                  $Total_trn_dr=0;
                                                                  $Total_trn_cr=0;
                                                                  $payment_status_bu_closeing="";
                                                                  
                                                                  $TotalDr=$opening_balance_dr;
                                                                  $TotalCr=$opening_balance_cr;
                                                                  $totbalance=  $trnCr-$trnDr;
                                                                  
                                                                  $Total_trn_dr=$opening_balance_dr+$trnDr;
                                                                  $Total_trn_cr=$opening_balance_cr+$trnCr;






                                                                  if($Total_trn_dr<$Total_trn_cr)
                                                                  {
                                                                      $creditsset=$Total_trn_dr-$Total_trn_cr;
                                                                      $creditsset=abs($creditsset);
                                                                      $payment_status_bu_closeing='CR';
                                                                      $closeing= $creditsset;
                                                                    
                                                                      
                                                                  }
                                                                  else
                                                                  {
                                                                      
                                                                      $debitsset=$Total_trn_cr-$Total_trn_dr; 
                                                                      $debitsset_val=$Total_trn_cr-$Total_trn_dr;
                                                                      $debitsset=abs($debitsset);
                                                                      $payment_status_bu_closeing='DR';
                                                                      if($debitsset==0)
                                                                      {
                                                                          $payment_status_bu_closeing='CR';
                                                                      }
                                                                      else
                                                                      {
                                                                          $payment_status_bu_closeing='DR';
                                                                      }
                                                                     
                                                                      $closeing= $debitsset;


                                                                      
                                                                  }
                                                                  
                                                                                        









                                                                 $discount1=0;
                                                                $resultsub_production="SELECT 
                                   b.total_picked_amount AS totalvalue,
                                   os.bill_total AS bill_total
                                   FROM 
                                        order_product_list_process AS a 
                                    JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                    JOIN orders_process AS os ON a.order_id = os.id
                                         
                                        JOIN all_ledgers al ON al.order_id = b.order_id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND b.assign_status IN ('0')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.reason!='Return To Re-sale' AND b.return_status IN ('0','2') AND b.deleteid IN ('0','88')  GROUP BY b.id ORDER BY a.id DESC";
                                                                
                                                              
                                                                 $production=0;
    
                                                                 $resultsub_production = mysqli_query($conn, $resultsub_production);
                                                                 while($val = mysqli_fetch_assoc($resultsub_production))
                                                                 {
                                                                               
                                                                            if($val['totalvalue']>0)
                                                                    {
                                                                       $totalvalue=$val['totalvalue'];
                                                                       //$totalvalue=$val->bill_total;
                                                                    }
                                                                    else
                                                                    {
                                                                        $totalvalue=$val['bill_total'];
                                                                    }
                                                                    


                                                                            
                                                                             $production+=round($totalvalue);
                                                                  
                                                                            // $production+=round($totalvalue,2);
                                                     
                                                                 }
                                                                 

                                                             
                                                               
                                                                 $discount2=0;
                                                                 $resultsub="SELECT 
                                                                      b.total_picked_amount AS totalvalue,
                                                                      b.total_picked_amount_confirmed AS totalvaluepick
                                                                FROM  order_product_list_process AS a 
                                    JOIN 
                                        order_delivery_order_status AS b ON a.order_id = b.order_id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND  b.assign_status IN ('11','12','1')  AND b.return_status IN ('0','2') AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC";
                                                              
                                                                 $total=0;
                                                               

                                                                 $resultsub = mysqli_query($conn, $resultsub);
                                                                 while($val = mysqli_fetch_assoc($resultsub))
                                                                 {




                                                                     if($val['totalvaluepick']>0)
                                                                   {
                                                                      $totalvalue=$val['totalvaluepick'];
                                                                   }
                                                                   else
                                                                   {
                                                                    $totalvalue=$val['totalvalue'];
                                                                   }
                                                                   
                                                                             //$totalvalue=$val['totalvalue'];
                                                                             $total+=round($totalvalue);
                                                                  

                                                     
                                                                 }
                                                                 
                                                                 
                                                                      
                                                                 $resultsub_inproduction="SELECT SUM(b.bill_total) as bill_total FROM  order_sales_return_complaints as b   WHERE b.deleteid=0 AND b.customer='".$customer_id."'  AND b.order_base=2 AND b.driver_delivery_status=0 ORDER BY b.id DESC";
                                                                
                                                                 $inproduction_total_return=0;
                                                                 $resultsub_inproduction = mysqli_query($conn, $resultsub_inproduction);
                                                                 while($vals = mysqli_fetch_assoc($resultsub_inproduction))
                                                                 {
                                                                   
                                                                  
                                                                             $inproduction_total_return=round($vals['bill_total']);
                                                     
                                                                 }
                                                                 
                                                                 
                                                                 //$production=$inproduction_total_return+$production;
                                                                 $resultsub="SELECT SUM(b.bill_total) as bill_total FROM  order_sales_return_complaints as b   WHERE b.deleteid=0 AND b.customer='".$customer_id."'  AND b.order_base=1 AND b.driver_delivery_status=0 ORDER BY b.id DESC";
                                                               
                                                                 $total_return=0;
                                                                 $resultsub = mysqli_query($conn, $resultsub);
                                                                 while($val = mysqli_fetch_assoc($resultsub))
                                                                 { 
                                                                   
                                                                   $total_return=round($val['bill_total']);
                                                     
                                                                 }
                            
                                                               
                                                               
                                                               
                                                                  $discount3=0;
                                                                 $resultsub="SELECT 
                                        b.total_picked_amount AS totalvalue,
                                        b.total_picked_amount_confirmed AS totalvaluepick
                                        FROM
                                   order_product_list_process AS a 
                                    JOIN 
                                        order_delivery_order_status AS b ON a.order_id = b.order_id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND b.return_status IN ('0','2') AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC";
                                                           
                                                                 $total_transit=0;
                                                                 $resultsub = mysqli_query($conn, $resultsub);
                                                                 while($val = mysqli_fetch_assoc($resultsub))
                                                                 { 
                                                                   

                                    
                                                                     if($val['totalvaluepick']>0)
                                                                   {
                                                                      $totalvalue=$val['totalvaluepick'];
                                                                   }
                                                                   else
                                                                   {
                                                                    $totalvalue=$val['totalvalue'];
                                                                   }
                                                                   $total_transit+=round($totalvalue);
                                                                  
                                                     
                                                                }
                                                                
                                                                
                                                                  
                                                  
                                                                 $sheet_in_factory=round($total+$total_return,2);











                                         if($payment_status_bu_closeing=='DR')
                                         {
                                             
                                                        $Totaltranspot= $inproduction_total_return+$production+$sheet_in_factory+$total_transit;
                                                        //$Totaltranspotval= $closeing-$Totaltranspot;
                                                        $Totaltranspotval= $debitsset-$Totaltranspot;
                                                         
                                                       
                                                         $Totaltranspotval=abs($Totaltranspotval);
                                                         if($closeing<$Totaltranspot)
                                                         {
                                                             $getstatus=1;
                                                             
                                                             
                                                             if($closeing>0)
                                                             {
                                                                  $getstatus=0;
                                                                  //$Totaltranspotval=$closeing;
                                                             }
                                                             
                                                         }
                                                         else
                                                         {
                                                             $getstatus=0;
                                                             
                                                         }

                                             
                                         }


                                           if($payment_status_bu_closeing=='CR')
                                         {
                                             
                                             $Totaltranspot= $production+$sheet_in_factory+$total_transit;
                                             //$Totaltranspotval= $closeing-$Totaltranspot;
                                             $Totaltranspotval= $closeing;
                                             $getstatus=1;
                                             $totgetce+=  $Totaltranspotval;
                                             
                                         }




                                         if($getstatus==0)
                                         { 
                                             
                                            $totalcheck=round($production+$sheet_in_factory+$total_transit+$Totaltranspotval+$inproduction_total_return,2);
                                          
                                         }
                                         else
                                         {
                                            $totalcheck=round($production+$closeing+$sheet_in_factory+$total_transit+$inproduction_total_return,2);
                                         
                                         }


                                          if($totalcheck>0)
                                          {
                                              $hidestatus="";
                                          }
                                          else
                                          {
                                              if($checked120=='checked')
                                              {
                                                   $hidestatus="shownullvalue getview";
                                              }
                                              else
                                              {
                                                   $hidestatus="getview";
                                              }
                                             
                                          }
                                          




                                          if($Totaltranspotval>5)
                                          {
                                              
                                              $Totaltranspotval=round($Totaltranspotval,2);
                                          }
                                          else
                                          {
                                              $Totaltranspotval=0;
                                          }
                                          


                                         if($getstatus==0)
                                         {

                                               $st=$production+$sheet_in_factory+$inproduction_total_return+$total_transit;
                                               $setvalue=$debitsset-$st;
                                               if($setvalue<0)
                                               {
                                                 
                                                  $Totaltranspotval=$setvalue;
                                                  $sheet=$debitsset;

                                               }
                                               else
                                               {
                                                 $sheet=$st;
                                               }

                                             
                                               
                                         }
                                         else
                                         {
                                             
                                             $sheet=0;
                                             $Totaltranspotval=0; 

                                         }
                                      
                                         























  

                                                                    






                                        $sql_current_bal = "SELECT * FROM customer_balance_report_beta1 WHERE  customer_id='".$customer_id."' AND update_date='".$date1."'";
                                                           $result_bal = mysqli_query($conn, $sql_current_bal);
                                                           $res_bal=$result_bal->num_rows;



                                                          if($res_bal>0)
                                                          {



 
                                                                echo    $sqlssv="UPDATE `customer_balance_report_beta1` SET 
                                                                  `customer_id`='".$customer_id."',
                                                                   `route_name`='".$route_name."',
                                                                   `payment_status`='".$payment_status."',
                                                                    `opening_balance_dr`='".$opening_balance_dr."',
                                                                    `opening_balance_cr`='".$opening_balance_cr."',
                                                                    `opening_balance`='".$opening_balance."',
                                                                    `trnDr`='".$trnDr."',
                                                                    `trnCr`='".$trnCr."',
                                                                    `trnDrtotal`='".$Total_trn_dr."',
                                                                    `trnCrtotal`='".$Total_trn_cr."',
                                                                    `closeing`='".$closeing."',
                                                                    `payment_status_bu_closeing`='".$payment_status_bu_closeing."',
                                                                    `getstatus`='".$getstatus."',
                                                                    `balance`='".$Totaltranspotval."',
                                                                    `sheet`='".$sheet."',
                                                                    `hidestatus`='".$hidestatus."',
                                                                   `total_credit_balance_new`='".$total_credit_balance_new."',
                                                                   `total_debit_balance_new`='".$total_debit_balance_new."',
                                                                   `total_credit_balance`='".$total_credit_balance."',
                                                                   `total_debit_balance`='".$total_debit_balance."',
                                                                   `sales_team_id`='".$sales_team_id."',
                                                                    `customername`='".$company_name."',
                                                                     `customerphone`='".$phone."',
                                                                      `opening_balance_status`='".$opening_balance_status."',
                                                                       `debit`='".$debitsset."',
                                                                        `credit`='".$creditsset."',
                                                                         `production`='".$production."',
                                                                          `inproduction_total_return`='".$inproduction_total_return."',
                                                                           `sheet_in_factory`='".$sheet_in_factory."',
                                                                 `transit`='".$total_transit."',
                                                                 `feedback_details`='".$feedback_details."',
                                                                 `phone`='".$phone."',
                                                                  `create_date`='".$payment_date."',
                                                                  `update_date`='".$date1."',
                                                                  `update_time`='".$time."',
                                                                   `deletemod`='".$deletemod."',
                                                                    `deleteid`='".$deleteid."',
                                                                     `total_transit`='".$total_transit."'
                                                                  WHERE customer_id='".$customer_id."' AND update_date='".$date1."'";
                                                                 $rs= mysqli_query($conn, $sqlssv);


if($rs==1)
{


$setres=array('success' =>1);
echo json_encode($setres);

}






                                                          }
                                                          else
                                                          {




  echo $cus_sql="INSERT INTO `customer_balance_report_beta1` (
         `customer_id`,
         `payment_status`,
         `opening_balance_dr`,
         `opening_balance_cr`,
         `opening_balance`,
         `trnDr`,
         `trnCr`,
         `trnDrtotal`,
         `trnCrtotal`,
         `closeing`,
         `payment_status_bu_closeing`,
         `getstatus`,
         `balance`,
         `sheet`,
         `hidestatus`,
        `route_name`, 
        `sales_team_id`,
        `customername`,
        `customerphone`,
        `total_credit_balance_new`,
        `total_debit_balance_new`,
        `total_credit_balance`,
        `total_debit_balance`,
        `opening_balance_status`, 
        `debit`,
        `credit`, 
        `production`, 
        `inproduction_total_return`,
        `sheet_in_factory`,
        `transit`,
        `feedback_details`,
        `phone`,
        `create_date`,
        `update_date`,
        `update_time`,
        `deletemod`,
        `deleteid`,
        `trid`,
        `total_transit`

       ) VALUES ( 
        '".$customer_id."',
        '".$payment_status."',
        '".$opening_balance_dr."',
        '".$opening_balance_cr."',
        '".$opening_balance."',
        '".$trnDr."',
        '".$trnCr."',
        '".$Total_trn_dr."',
        '".$Total_trn_cr."',
        '".$closeing."',
        '".$payment_status_bu_closeing."',
        '".$getstatus."',
        '".$Totaltranspotval."',
        '".$sheet."',
        '".$hidestatus."',
        '".$route_name."',
        '".$sales_team_id."',
        '".$company_name."',
        '".$phone."',
       '".$total_credit_balance_new."',
       '".$total_debit_balance_new."',
       '".$total_credit_balance."',
       '".$total_debit_balance."',
       '".$opening_balance_status."',
       '".$debitsset."',
       '".$creditsset."',
       '".$production."',
       '".$inproduction_total_return."',
       '".$sheet_in_factory."',
       '".$total_transit."',
       '".$feedback_details."',
       '".$phone."',
       '".$payment_date."',
       '".$date1."',
       '".$time."',
       '".$deletemod."',
       '".$deleteid."',
       '".$trid."',
       '".$total_transit."'
         )";




                                           $result_cus     = mysqli_query($conn, $cus_sql);
                                           $customer_ids=mysqli_insert_id($conn); 




if($customer_ids==1)
{


$setres=array('success' =>1);
echo json_encode($setres);

}

                                                          }


















                                                                
                                                      


                                            
                                         }
                                         
                                     }





