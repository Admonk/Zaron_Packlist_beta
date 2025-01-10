<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_new extends CI_Controller {

    function __construct() {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');
             $this->load->model('Main_model');
             $this->load->database();
             if(isset($this->session->userdata['logged_in']))
             {$Totaltranspotval=$closeing;


               $sess_array =$this->session->userdata['logged_in'];
               $userid=$sess_array['userid'];
               $email=$sess_array['email'];
               $from_date=$sess_array['from_date'];
               $to_date=$sess_array['to_date'];
               $this->from_date=$from_date;
               $this->to_date=$to_date;
               $this->userid=$userid;
               $this->user_mail=$email;


            }

    }

     public function trial_balance_report_full_nov()
    {


            
                        $formdate='2023-10-01';
                        $formdate=date('Y-m-d',strtotime($formdate."-1 days"));
                        $todate=$_GET['fromto'];
                        $formdate=$_GET['formdate'];
                        //$todate=date('Y-m-d',strtotime($todate."-1 days"));
                 
                    
                 
                
                  $resulth=$this->db->query("SELECT b.id as account_type_id,b.name as account_type_name  FROM accountheads_sub_group as a JOIN accounttype as b ON a.account_type=b.id WHERE b.deleteid=0   GROUP BY b.id ORDER BY b.name ASC");
                  $resulth=$resulth->result();
                   
                  $arrayhead=array(); 
                   
                  foreach ($resulth as  $valuevv)
                  {
                     
                     
                     
                  $result=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0  AND account_type='".$valuevv->account_type_id."'   ORDER BY name ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $credits1total=0;
                      $debit1total=0;
                      $debit_status=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104)
                                         {
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=3 ORDER BY id DESC");
                                         //  $result=$this->db->query("SELECT SUM(a.credits - a.debits) as totalsum FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=3 AND b.deleteid=0 ORDER BY a.id DESC");

$result=$this->db->query("SELECT (SUM(a.credits) - SUM(a.debits)) AS totalsum FROM all_ledgers AS a  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0'  AND c.deleteid='0'  AND c.mark_customer_id IN ('1','-1','0')   AND a.payment_date <='".$todate."' AND a.party_type='3' GROUP BY a.customer_id ORDER BY a.payment_date ASC");


                                           $debit_status =1;
                                         
                                         }
                                         elseif($value->id==52){
                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==116){

                                              $formdate2=date('2023-04-01');

      // $result=$this->db->query("SELECT 
      // (SELECT SUM(debits) FROM all_ledgers WHERE `payment_date` BETWEEN '".$todate."' AND '".$todate."' AND deleteid=0 AND account_heads_id_2 = 116 
      // AND order_id > 0) AS difference, (SELECT SUM(credits) - SUM(debits) FROM all_ledgers WHERE `payment_date` < '".$todate."' 
      // AND deleteid = 0 AND account_heads_id_2 = 116 AND order_id > 0) AS totalsum,
      // SUM(credits) as totalcridit, SUM(debits) as totaldebit FROM all_ledgers 
      // WHERE deleteid = 0 AND account_heads_id_2 = 116 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id > 0 ORDER BY id DESC");

                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         

   $result=$this->db->query("SELECT SUM((b.rate+b.commission)*b.qty) as totalsum, SUM((b.rate+b.commission)*b.qty) as totalcridit,SUM((b.rate+b.commission)*b.qty) as totaldebit FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");


                                         }
                                         elseif($value->id==119){

                                              $formdate2=date('2023-04-01');
                                              $result=$this->db->query("SELECT SUM(credits_sub_total-debits) as totalsum, SUM(credits_sub_total) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==68)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND a.payment_date<='".$todate."' AND b.mark_vendor_id IN ('0','1','-1') GROUP BY a.customer_id");


                                                 $debit_status =1;
                                         
                                         }
                                         elseif($value->id==372)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             $debit_status =1;

                                         }
                                         elseif($value->id==382)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date<='".$todate."' ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==373)
                                         {






                                               $resultlocality=$this->db->query("SELECT customer_id FROM commen_ledgers");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->customer_id!=0)
                                                   {
                                                       $array1[]=$vl->customer_id;
                                                       
                                                   }
                                                   
                                                   
                                               }


                                                                               
                                                    // $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                                                    // SUM(a.balance_dr) as totaldebit,
                                                    // SUM(a.balance_cr) as totalcridit,
                                                    // SUM(a.balance_cr-a.balance_dr) as totalsum
                                                    // FROM commen_ledgers as a   WHERE  a.id>0 GROUP BY a.customer_id");


$resultfetch = $array1;
$result=$this->db->query("SELECT a.party_type,a.customer_id,SUM(a.debits) as totaldebit,SUM(a.credits) as totalcridit,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a  WHERE a.deleteid=0 AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.party_type IN ('1','3') AND a.cnn_status=0 AND a.payment_date<='".$todate."'");




                                                    $debit_status =1;
                                         
                                         }
                                         elseif($value->id==179)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND b.CNN='YES'  AND a.payment_date<='".$todate."' GROUP BY a.customer_id ORDER BY aa.name ASC");



                                                 $debit_status =1;
                                         
                                         }
                                      
                                         elseif($value->id==59)
                                         {
                                          $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.account_head_id='59' group by a.customer_id ORDER BY a.id DESC");
                                        }
                                         elseif($value->id==159)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date<='".$todate."' AND party_type=2 AND driver_collection_status=1  ORDER BY id DESC");
                                            $debit_status =0;
                                         
                                         }
                                         elseif($value->id==160)
                                         {

// SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' ORDER BY a.idd DESC
                                              $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' AND party_type NOT IN ('4','8','10') AND a.payment_date<='".$todate."' ORDER BY a.id DESC");
                                         
                                         }
                                          elseif($value->id==151)
                                         {


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.account_head_id='".$value->id."' group by a.customer_id ORDER BY a.id DESC");


                                              // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=5 AND customer_id=220 ORDER BY id DESC");
                                               $debit_status =1;
                                         
                                         }
                                         
                                          elseif($value->id==152)
                                         {
                                           $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.account_head_id='".$value->id."' group by a.customer_id ORDER BY a.id DESC");
                                         }
                                        elseif($value->id==155)
                                         {
    
                                      // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id=155 ORDER BY id DESC");
  
//$formdates='2024-03-01';  
$result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND opening_balance_status=0 AND order_trancation_status=2  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
$debit_status =0;


                                         
                                         }
                                         elseif($value->id==129)
                                         {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id=129 group by customer_id ORDER BY payment_date ASC");
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid='0' AND account_head_id=129 GROUP by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id='".$value->id."' AND a.payment_date<='".$todate."'  GROUP BY a.customer_id");



                                            $debit_status =1;
                                         
                                         }
                                          elseif($value->id==48)
                                         {

                                              //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5') ORDER BY id DESC");


                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND account_head_id IN ('48') AND comission_transfered NOT IN ('5') ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==400)
                                         {

                                              $result=$this->db->query("SELECT SUM(debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('1') AND debits>0 ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==154)
                                         {

                                              $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(debits) as totalcridit,SUM(credits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('0') AND account_head_id=48 AND credits>0 ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                          elseif($value->id==2)
                                         {


                                    //   $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)-credits) as totalsum, SUM(credits) as  totaldebit,SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    // $debit_status =1;  


                                      $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)-debits) as totalsum, SUM(debits) as  totalcridit,SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)) as  totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    $debit_status =1;    

                             // $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(credits) as  totaldebit,SUM(debits) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             //  $debit_status =1;
                                         
                                         }
                                          elseif($value->id==120)
                                         {

                                  $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2='".$value->id."'  AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                         // elseif($value->id ==153)
                                         // {

                                         //    $result=$this->db->query("SELECT SUM(credits) as credits, SUM(debits) as debits,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");

                                         // }
                                          elseif($value->id==141){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.account_head_id='".$value->id."' ORDER BY a.id DESC");
                                         }
                                         // elseif($value->id ==172){
                                         //    $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='3' ORDER BY a.id DESC");

                                         //      $debit_status=1;
                                         // }  
                                        elseif($value->id ==169)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                        elseif($value->id ==130)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                         elseif($value->id==165)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                         elseif($value->id==142)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==126)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                         elseif($value->id==392)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==393)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                        elseif($value->id==394)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==388)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==390)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==391)
                                        {

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==395)
                                        {

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND opening_balance_status=0  group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }   
                                        else
                                        {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit, SUM(debits) as totaldebit,account_head_id FROM all_ledgers 
                                            //  WHERE    deleteid=0 AND account_heads_id_2='".$value->id."' ORDER BY payment_date ASC");
                                            

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                               $debit_status =1;
                                             
                                        }
                                         
                                        
                                         // Babu
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 
                                                 
                                            //  if($value->id == 48){
                                               
                                            //     $credits1 += $partys1ss->totalcridit;

                                            //     $debit1 += $partys1ss->totaldebit;

                                            // }

                                            if($debit_status ==1)
                                            {





                                               

                                                if($value->id==373)
                                                {













                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }


                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;







                                                    


                                                }
                                                elseif($value->id==372)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                elseif($value->id==400)
                                                {




                                                                      $credits1 += 0;
                                                                      $debit1 += $partys1ss->totaldebit*2;

                            


                                                }

                                                elseif($value->id==2)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }                               
                                                elseif($value->id==151)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                else
                                                {


                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }

                                                                    $credits1 += $partys1ss->totalcridit;
                                                                    $debit1 += $partys1ss->totaldebit;


                                                }






                                               


                                            }
                                            else
                                            {


                                            
                                                  if($value->trail_view_status==0)
                                                  {  
                                                     
                                                     if($partys1ss->totaldebit!='')
                                                     {  
                                                          
                                                          if($value->id==116)
                                                          {


                                                                $totalcommssion=0;
                                                                // $resultset=$this->db->query("SELECT SUM(credits) as totalcridit FROM all_ledgers WHERE deleteid=0 AND customer_id='252' AND party_type=5  AND commission_customer>0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                                                // $resultset=$resultset->result();
                                                                // foreach($resultset as $ss)
                                                                // {
                                                                //    $totalcommssion= $ss->totalcridit;
                                                                // }


                                                              $credits1=$partys1ss->totaldebit-$totalcommssion;
                                                          }
                                                          else
                                                          {
                                                               $credits1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                     }
                                                     else
                                                     {
                                                          $credits1=0;
                                                     }
                                                    
                                                     $credits1=abs($credits1);
                                                     $set=1;
                                                     $creditssell=$credits1;
                                                   


                                                  }
                                                  if($value->trail_view_status==1)
                                                  {
                                                      if($partys1ss->totalcridit!='')
                                                      {
                                                          
                                                          if($value->id==119)
                                                          {
                                                              $debit1=$partys1ss->totalcridit;
                                                          }
                                                          else
                                                          {
                                                              $debit1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          $debit1=0;
                                                      } 
                                                      
                                                      $debit1=abs($debit1);
                                                      $creditssell=$debit1;




                                                   
                                                  }
                                                  
                                                }    
                                            


                                                  
                                         

                                                  
                                         }
                                          
                                       

                                    
                                    



                                   $dnone="";
                                    //  $ssurl=base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id;

                                       switch ($value->id) {
                                        case 48:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;

                                            break;
                                        case 156:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=332&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 151:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=220&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 155:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=346&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 175:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=405&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 150:
                          $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=163&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 159:  case 383:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=1&party_type=2&from_date=".$formdate."&to_date=".$todate;
                                            break;  
                                         case 373:
                                            $ssurl=base_url()."index.php/customer/common_ledger?party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;       
                                        case 160:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=0&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;
                                            case 119:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            $debit1=$credits1;
                                            $credits1=0;
                                            break;
                                        // case 172:
                                        //     $debit1=$credits1;
                                        //     $credits1=0;
                                        //     break;
                                        case 68:
                                            //$ssurl=base_url()."index.php/report/customer_balance_comparision?from_date=".$formdate."&to_date=".$todate;

                                         $ssurl=base_url()."index.php/customer/ledger?trail_balance=0&party_type=1&from_date=".$formdate."&to_date=".$todate;


                                            break;
                                         case 179:
                                            $ssurl=base_url()."index.php/customer/ledger?cnn_status=1&party_type=1&from_date=".$formdate."&to_date=".$todate;
                                            break;    
                                        case 154:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 381:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";

                                         break;


                                          case 388:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=580&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                           case 390:
                                            // $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=297&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                         case 380:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate;
                                             $dnone="d-nones";
                                         break;
                                        
                                         case 382:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                         break;   
                                        case 116: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                             
                                        case 2: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                        break; 
                                        case 104: 
                                            $ssurl=base_url()."index.php/vendor/ledger?trail_balance=0&from_date=".$formdate."&to_date=".$todate;
                                        break;    
                                        case 124:
                                            $credits1=0;
                                            $result_stock=$this->db->query("SELECT selling_average_price,average_price,stock FROM product_list WHERE deleteid=0 AND stock>0  ORDER BY id DESC");
                                            $result_stock=$result_stock->result();
                                            foreach($result_stock as $stock)
                                            {
                                                $selling_average_price=$stock->selling_average_price;
                                                $average_price=$stock->average_price;
                                                $profile_loss_price=$selling_average_price-$average_price;
                                                $valueprice=abs($profile_loss_price);
                                                //$credits1+=$valueprice*$stock->stock;                                                
                                            }
                                            $ssurl="#";
                                            break;
                                        default:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                            }
                                            
                                            
                                       $credits1total+=$credits1;
                                       $debit1total+=$debit1;
                        



                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=> $ssurl,
                                            'dnone'=> $dnone,
                                            'credit' => $credits1,
                                            'debit' => $debit1,
                                            'set' => $credits1+$debit1
                
                                        );
                            
                            

                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                            
                    
                     $credit=[];
                     $debit=[];
                     $credit_cash=[];
                     $debit_cash=[];



            $result2=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=0 and b.id!=25");
            $result2=$result2->result();
            foreach ($result2 as  $value) {
  $result_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                               $resultcheck=$result_balance->result(); 
                             foreach ($resultcheck as  $value1) {

                                // print_r($value1);
                                $total_debit=$value1->total_debit;
                                $total_credit=$value1->total_credit;
                                $total = $total_credit-$total_debit;
                                             

                               
                                                 if($total > 0){
                                                     $credit[] =$total;
                                                 }else{
                                                     $debit[] = abs($total);
                                                 }
                                                
                             }

                            }




 $credit_un=[];
                     $debit_un=[];
                                    $result2_un=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=1 and b.id!=25");
            $result2_un=$result2_un->result();
            foreach ($result2_un as  $value_un) {
  $result_balance_un=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value_un->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                               $result_balance_un=$result_balance_un->result(); 
                             foreach ($result_balance_un as  $value1_un) {

                                // print_r($value1);
                                $total_debit_un=$value1_un->total_debit;
                                $total_credit_un=$value1_un->total_credit;
                                $total_un = $total_credit_un-$total_debit_un;
                                             

                               
                                                 if($total_un > 0){
                                                     $credit_un[] =$total_un;
                                                 }else{
                                                     $debit_un[] = abs($total_un);
                                                 }
                                                
                             }

                            }





                            



                            $result_cash_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id=25  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                             $resultcheck_cash=$result_cash_balance->result(); 
                           foreach ($resultcheck_cash as  $value2) {

                              // print_r($value1);
                              $total_debit=$value2->total_debit;
                              $total_credit=$value2->total_credit;
                              $total = $total_credit-$total_debit;
                                           

                             
                                               if($total > 0){
                                                   $credit_cash[] =$total;
                                               }else{
                                                   $debit_cash[] = abs($total);
                                               }
             
                           }










                            $credit_total_bank=0;
                            $dedit_total_bank=0;
                            $credit_total_cash=0;
                            $dedit_total_cash=0;


                             $credit_total_bank_un=0;
                            $dedit_total_bank_un=0;
                           


                            foreach ($credit as $credits) {
                                $credit_total_bank += $credits;
                            }
                            foreach ($debit as $debits) {
                                $dedit_total_bank += $debits;
                            }


                            foreach ($credit_un as $credits_un) {
                                $credit_total_bank_un += $credits_un;
                            }
                            foreach ($debit_un as $debits_un) {
                                $dedit_total_bank_un += $debits_un;
                            }

                            foreach ($credit_cash as $credits) {
                                $credit_total_cash = $credits;
                            }
                            foreach ($debit_cash as $debits) {
                                $dedit_total_cash = $debits;
                            }
                            
                           
                    //  $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");

                     
                     $resultbank=$this->db->query("SELECT a.*,SUM(b.credit) as totalcridit,SUM(b.debit) as totaldebit,SUM(b.credit-b.debit) as total FROM bankaccount as a JOIN  bankaccount_manage  as b ON a.id=b.bank_account_id WHERE a.deleteid=0  AND b.deleteid=0 AND b.party_type NOT IN('1','2','3','5') AND   b.create_date<='".$todate."'  GROUP BY a.account_type ORDER BY a.bank_name ASC");
                     $resultbank=$resultbank->result();
                     
                     
                     $credits1totalbank=0;
                     $debit1totalbank=0;
                     $bankcash_credit=0;
                     $bankcash_debit=0;

                     foreach ($resultbank as  $valueb) 
                     {
                         
                         
                            
                            
                                         $setbank=0;
                                         $debitbank1=0;
                                         $creditsbank1=0;
                                       
                                             
                                             
                                                      $balancebank=$valueb->total;
                                                 
                                                    $debitbank1 = $dedit_total_bank;
                                                    $creditsbank1 = $credit_total_bank;  
                                                    $credits1totalbank_un =$credit_total_bank_un;
                                                    $debit1totalbank_un =$dedit_total_bank_un; 

                                                

                                                        


                                                      $balancebank=abs($balancebank);
                    
                    
                                                      
                                                     
                                                      
                                                      
                                                      $setbank=1;
                                                
                                         
                             
                                       
                                       
                                      
                                      
                                       if($valueb->id!=25)
                                       {


                                       $credits1totalbank =$credit_total_bank;
                                       $debit1totalbank =$dedit_total_bank; 

                                       } 




                                       if($valueb->id==25)
                                       {


                                       $bankcash_credit =$credit_total_cash;
                                       $bankcash_debit =$dedit_total_cash; 

                                       }   
                                     
                                        

                                   
                                       
                                        if($valuevv->account_type_id==18 && $valueb->account_type == 1){

                                            $array1[] = array(
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "CASH IN HAND", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_cash,
                                                'debit' => $dedit_total_cash,
                                                'set' => $credit_total_cash+$dedit_total_cash
                    
                                            );

                                        }

                                       if($valuevv->account_type_id==18 && $valueb->account_type == 0){
                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "BANK IN ACCOUNT", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=0&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank,
                                                'debit' => $dedit_total_bank,
                                                'set' => $credit_total_bank+$dedit_total_bank,
                    
                                            );


                                        }


                                         if($valuevv->account_type_id==32 && $valueb->account_type == 0){

                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "SECURED LOAN", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank_un,
                                                'debit' => $dedit_total_bank_un,
                                                'set' => $credit_total_bank_un+$dedit_total_bank_un,
                    
                                            );


                                        }


                                    
                                    
                                        

                                   
                         
                        
                       


                        $i++;

                     }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    //  $array1 =[];
                     $arrayval=array_merge($array,$array1);

                    // echo "<pre>";print_r($arrayval);
                    // exit;
                     
                     
                      $totalset=$credits1total+$debit1total;
                      //$totalsetbank=$credits1totalbank+$debit1totalbank;
                     
                     if($valuevv->account_type_id==18)
                     {
                        
                        
                         $debit1total = $debit1total + $debitbank1 + $bankcash_debit;
                         $credits1total =$credits1total + $creditsbank1 + $bankcash_credit;

                     }


                     if($valuevv->account_type_id==32)
                     {
           
                        
                         $debit1total = $debit1total + $debit1totalbank_un;
                         $credits1total =$credits1total + $credits1totalbank_un;
                         $totalset=$debit1total+$credits1total;

                     }
                    //  elseif($valuevv->account_type_id==27)
                    //  {
                    //       $totalsetbank=$creditsbank1+$bankcash_debit;

                    
                         
                    //      $arrayhead[]=array(
                           
                    //      'id'=>$valuevv->account_type_id,
                    //      'account_type_name'=>$valuevv->account_type_name,
                    //      'debit'=>round($bankcash_debit+$debit1total,2),
                    //      'credit'=>round($bankcash_credit+$credits1total,2),
                    //      'set'=>round($totalsetbank+$totalset,2),
                    //      'sub'=>$arrayval
                         
                         
                    //      );
                         
                    //  }
                    //  else
                    //  {
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>$debit1total,
                         'credit'=>$credits1total,
                         'set'=>$totalset,
                         'sub'=>$arrayval
                         
                         
                         );
                    //  }
                     
                       
                     
                     
                     
                     
                  }
                    
                    
               
                     
                     
                    
                  echo json_encode($arrayhead);
 
                     

    }
    

    public function trial_balance_full_nov()
    {
                  

                 
//$this->db->query("UPDATE accountheads SET  op_status =2,payment_status=2,op=0,opening_balance=0 WHERE id = 720"); 
//$this->db->query("UPDATE all_ledgers SET  debits=0,credits=0 WHERE customer_id='720' AND party_type='5' AND opening_balance_status='1'  AND deleteid=0"); 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {



                                             $this->db->query("DELETE FROM table_customize_new  WHERE user_id='".$this->userid."'");



                                            
                                          $column_enable = [8,9,10];
                                          $column_disable = [1,2,3,4,5,6,7,11,12,13,14];
                                          foreach($column_disable as $Key => $val){
                                              $basedata['user_id'] = $this->userid;
                                              $basedata['label_id'] = $val;
                                              $basedata['status'] = 0;
                                              $this->Main_model->insert_commen($basedata, 'table_customize_new');
                                                 }
                                     
                                          foreach($column_enable as $Key => $val){
                                             $basedata['user_id'] = $this->userid;
                                             $basedata['label_id'] = $val;
                                             $basedata['status'] = 1;
                                             $this->Main_model->insert_commen($basedata, 'table_customize_new');

                                                 }

                                            $checkop = $this->Main_model->where_names('accountheads','id','720');
                                            foreach ($checkop as  $value) {
                                                $op=$value->op;
                                                $op_status=$value->op_status;
                                            }
                                            $data['op']=$op;
                                            $data['op_status']=$op_status;
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance_full_nov.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

     public function trial_balance_full_third_section()
    {
                  

                 
//$this->db->query("UPDATE accountheads SET  op_status =2,payment_status=2,op=0,opening_balance=0 WHERE id = 720"); 
//$this->db->query("UPDATE all_ledgers SET  debits=0,credits=0 WHERE customer_id='720' AND party_type='5' AND opening_balance_status='1'  AND deleteid=0"); 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {



                                             $this->db->query("DELETE FROM table_customize_new  WHERE user_id='".$this->userid."'");



                                            
                                          $column_enable = [8,9,10];
                                          $column_disable = [1,2,3,4,5,6,7,11,12,13,14];
                                          foreach($column_disable as $Key => $val){
                                              $basedata['user_id'] = $this->userid;
                                              $basedata['label_id'] = $val;
                                              $basedata['status'] = 0;
                                              $this->Main_model->insert_commen($basedata, 'table_customize_new');
                                                 }
                                     
                                          foreach($column_enable as $Key => $val){
                                             $basedata['user_id'] = $this->userid;
                                             $basedata['label_id'] = $val;
                                             $basedata['status'] = 1;
                                             $this->Main_model->insert_commen($basedata, 'table_customize_new');

                                                 }

                                            $checkop = $this->Main_model->where_names('accountheads','id','720');
                                            foreach ($checkop as  $value) {
                                                $op=$value->op;
                                                $op_status=$value->op_status;
                                            }
                                            $data['op']=$op;
                                            $data['op_status']=$op_status;
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance_full_third_section.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    


    
     public function trial_balance_report_full_beta_test_third()
    {


            
                        $formdate='2023-10-01';
                        $formdate=date('Y-m-d',strtotime($formdate."-1 days"));
                        $todate=$_GET['fromto'];
                        $formdate=$_GET['formdate'];
                        //$todate=date('Y-m-d',strtotime($todate."-1 days"));
                 
                    
                        // $resultaset=$this->trial_balance_report1_sub($formdate,$todate);
                
                        // $resulta=json_decode($resultaset);
                   
                      
                
                        // $a=0;
                        // foreach($resulta as $vl)
                        // {
                        //     $a+=$vl->credit;
                        // }
                        
                      
                        
                        // $resultb=$this->trial_balance_report_sub($formdate,$todate);
                        
                        // $resultb=json_decode($resultb);
                            
                            
                        // $b=0;
                        // foreach($resultb as $vl)
                        // {
                        //     $b+=$vl->credit;
                        // }
                           
                         
                      
                        // $total=$a-$b;
                       
                        // $total=abs($total);
                    

                      
                    
                     
                
                  $resulth=$this->db->query("SELECT b.id as account_type_id,b.name as account_type_name  FROM accountheads_sub_group as a JOIN accounttype as b ON a.account_type=b.id WHERE b.deleteid=0    GROUP BY b.id ORDER BY b.name ASC");
                  $resulth=$resulth->result();
                   
                  $arrayhead=array(); 
                   
                  foreach ($resulth as  $valuevv)
                  {
                     
                     
                     
                  $result=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0  AND account_type='".$valuevv->account_type_id."'  AND id NOT IN ('179','373','68','104','155','160','159','154','119','116','2','107','105','384') ORDER BY name ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $credits1total=0;
                      $debit1total=0;
                      $debit_status=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104)
                                         {
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=3 ORDER BY id DESC");
                                         //  $result=$this->db->query("SELECT SUM(a.credits - a.debits) as totalsum FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=3 AND b.deleteid=0 ORDER BY a.id DESC");

$result=$this->db->query("SELECT (SUM(a.credits) - SUM(a.debits)) AS totalsum FROM all_ledgers AS a  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0'  AND c.deleteid='0'  AND c.mark_customer_id IN ('1','-1','0')   AND a.payment_date <='".$todate."' AND a.party_type='3' GROUP BY a.customer_id ORDER BY a.payment_date ASC");


                                           $debit_status =1;
                                         
                                         }
                                         elseif($value->id==52){


                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10') group by customer_id  ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==116){

                                              $formdate2=date('2023-04-01');

      // $result=$this->db->query("SELECT 
      // (SELECT SUM(debits) FROM all_ledgers WHERE `payment_date` BETWEEN '".$todate."' AND '".$todate."' AND deleteid=0 AND account_heads_id_2 = 116 
      // AND order_id > 0) AS difference, (SELECT SUM(credits) - SUM(debits) FROM all_ledgers WHERE `payment_date` < '".$todate."' 
      // AND deleteid = 0 AND account_heads_id_2 = 116 AND order_id > 0) AS totalsum,
      // SUM(credits) as totalcridit, SUM(debits) as totaldebit FROM all_ledgers 
      // WHERE deleteid = 0 AND account_heads_id_2 = 116 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id > 0 ORDER BY id DESC");

                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         

   $result=$this->db->query("SELECT SUM((b.rate+b.commission)*b.qty) as totalsum, SUM((b.rate+b.commission)*b.qty) as totalcridit,SUM((b.rate+b.commission)*b.qty) as totaldebit FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");


                                         }
                                         elseif($value->id==119){

                                              $formdate2=date('2023-04-01');
                                              $result=$this->db->query("SELECT SUM(credits_sub_total-debits) as totalsum, SUM(credits_sub_total) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==68)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND a.payment_date<='".$todate."' AND b.mark_vendor_id IN ('0','1','-1') GROUP BY a.customer_id");


                                                 $debit_status =1;
                                         
                                         }
                                         elseif($value->id==383)
                                         {


                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date<='".$todate."' GROUP BY customer_id ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==381)
                                         {


                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=5 AND payment_date<='".$todate."' GROUP BY customer_id ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==372)
                                         {


                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' GROUP BY customer_id ORDER BY id DESC");
                             $debit_status =1;

                                         }
                                         elseif($value->id==382)
                                         {


                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date<='".$todate."' GROUP BY customer_id ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==373)
                                         {






                                               $resultlocality=$this->db->query("SELECT customer_id FROM commen_ledgers");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->customer_id!=0)
                                                   {
                                                       $array1[]=$vl->customer_id;
                                                       
                                                   }
                                                   
                                                   
                                               }


                                                                               
                                                    // $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                                                    // SUM(a.balance_dr) as totaldebit,
                                                    // SUM(a.balance_cr) as totalcridit,
                                                    // SUM(a.balance_cr-a.balance_dr) as totalsum
                                                    // FROM commen_ledgers as a   WHERE  a.id>0 GROUP BY a.customer_id");


$resultfetch = $array1;
$result=$this->db->query("SELECT a.party_type,a.customer_id,SUM(a.debits) as totaldebit,SUM(a.credits) as totalcridit,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a  WHERE a.deleteid=0 AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.party_type IN ('1','3') AND a.cnn_status=0 AND a.payment_date<='".$todate."'");




                                                    $debit_status =1;
                                         
                                         }
                                         elseif($value->id==179)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND b.CNN='YES'  AND a.payment_date<='".$todate."' GROUP BY a.customer_id ORDER BY aa.name ASC");



                                                 $debit_status =1;
                                         
                                         }
                                        elseif($value->id==175)
                                         {

                                        $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='405' ORDER BY a.id DESC");
                                        }

                                         
                                         elseif($value->id==59)
                                         {
                                          $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='161' ORDER BY a.id DESC");
                                        }
                                         elseif($value->id==159)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date<='".$todate."' AND party_type=2 AND driver_collection_status=1  ORDER BY id DESC");
                                            $debit_status =0;
                                         
                                         }
                                         elseif($value->id==160)
                                         {

// SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' ORDER BY a.idd DESC
                                              $result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' AND party_type NOT IN ('4','8','10') AND a.payment_date<='".$todate."' group by a.customer_id ORDER BY a.id DESC");
                                         
                                         }
                                          elseif($value->id==151)
                                         {

                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=5 AND customer_id=220 group by customer_id ORDER BY id DESC");
                                               $debit_status =1;
                                         
                                         }
                                          elseif($value->id==150)
                                         {

                                         $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND party_type=5 AND customer_id=163 group by customer_id ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==106)
                                         {
                                           $result=$this->db->query("SELECT  a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183' group by a.customer_id ORDER BY a.id DESC");
                                         }
                                          elseif($value->id==152)
                                         {
                                           $result=$this->db->query("SELECT  a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229'  group by a.customer_id ORDER BY a.id DESC");
                                         }
                                           elseif($value->id==164)
                                         {
                                           $result=$this->db->query("SELECT  a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13'  group by a.customer_id ORDER BY a.id DESC");
                                         }
                                        elseif($value->id==155)
                                         {
    
                                      // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id=155 ORDER BY id DESC");
  
//$formdates='2024-03-01';  
$result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND opening_balance_status=0 AND order_trancation_status=2  AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  group by customer_id ORDER BY id DESC");
$debit_status =0;


                                         
                                         }
                                         elseif($value->id==129)
                                         {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id=129 group by customer_id ORDER BY payment_date ASC");
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid='0' AND account_head_id=129 GROUP by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date<='".$todate."'  GROUP BY a.customer_id");



                                            $debit_status =1;
                                         
                                         }
                                          elseif($value->id==48)
                                         {

                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252','373','384') AND comission_transfered NOT IN ('5') GROUP BY customer_id ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==400)
                                         {

                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('1') AND debits>0 GROUP BY customer_id ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==154)
                                         {

                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(debits-credits) as totalsum, SUM(debits) as totalcridit,SUM(credits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('0') AND account_head_id=48 AND credits>0  GROUP BY customer_id ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                          elseif($value->id==2)
                                         {


                                    //   $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)-credits) as totalsum, SUM(credits) as  totaldebit,SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    // $debit_status =1;  


                                      $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)-debits) as totalsum, SUM(debits) as  totalcridit,SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)) as  totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    $debit_status =1;    

                             // $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(credits) as  totaldebit,SUM(debits) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             //  $debit_status =1;
                                         
                                         }
                                          elseif($value->id==120)
                                         {

                                  $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2='".$value->id."'  AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==156)
                                         {

                                              $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND customer_id=332 group by customer_id ORDER BY id DESC");

                                                   


                                                  // $debit_status=0;


                                         
                                         }
                                         elseif($value->id ==153){
                                            $result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(credits) as credits, SUM(debits) as debits,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' group by a.customer_id ORDER BY a.id DESC");

                                         }
                                          elseif($value->id==141){
                                            $result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.account_head_id='141' group by a.customer_id ORDER BY a.id DESC");
                                         }
                                         elseif($value->id ==172){
                                            $result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='3' group by a.customer_id ORDER BY a.id DESC");

                                              $debit_status=1;
                                         }  
                                         elseif($value->id ==170){
                                            $result=$this->db->query("SELECT a.customer_id,a.party_type,SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='180' group by a.customer_id ORDER BY a.id DESC");

                                        }  
                                        elseif($value->id ==169)
                                        {
                                            $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                        elseif($value->id ==130)
                                        {
                                            $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                         elseif($value->id==165)
                                        {

                                            $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                         elseif($value->id==142)
                                        {

                                            $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==126)
                                        {

                                            $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                         elseif($value->id==392)
                                        {

                                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==393)
                                        {

                                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                        elseif($value->id==394)
                                        {

                                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==388)
                                        {

                                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==390)
                                        {

                                             $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==391)
                                        {

                                        $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==395)
                                        {

                                        $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') AND opening_balance_status=0  group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }   
                                        else
                                        {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit, SUM(debits) as totaldebit,account_head_id FROM all_ledgers 
                                            //  WHERE    deleteid=0 AND account_heads_id_2='".$value->id."' ORDER BY payment_date ASC");
                                            

                                         $result=$this->db->query("SELECT customer_id,party_type,SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                               $debit_status =1;
                                             
                                        }
                                         
                                        
                                         // Babu

                                        $thiredarray=array();
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 

                                             


                                               if(isset($partys1ss->customer_id))
  {


                                                       if($partys1ss->party_type=='1')
                                                       {
                                                           $query = $this->db->query("SELECT deleteid,id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$partys1ss->customer_id."' ORDER BY company_name ASC");
                                                          
                                                           $tableleg="Customer";
                                                          
                                                      
                                                       }
                                                       elseif($partys1ss->party_type=='2')
                                                       {
                                                            $query = $this->db->query("SELECT deleteid,id,name FROM driver  WHERE deleteid='0'  AND id='".$partys1ss->customer_id."' ORDER BY name ASC");
                                                            $tableleg="Driver";
                                                            
                                                       }
                                                       elseif($partys1ss->party_type=='3')
                                                       {
                                                           $query = $this->db->query("SELECT deleteid,id,name FROM vendor  WHERE deleteid='0' AND id='".$partys1ss->customer_id."' ORDER BY name ASC");
                                                           $tableleg="Vendor";
                                                           
                                                           
                                                       }
                                                       elseif($partys1ss->party_type=='5')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT deleteid,id,name FROM accountheads  WHERE deleteid='0' AND id='".$partys1ss->customer_id."' ORDER BY name ASC");
                                                            $tableleg="Accounts head";

                                                          
                   // $this->db->query("UPDATE   accountheads SET trail_balance_link=1  WHERE  id='".$partys1ss->customer_id."'");
                   // $this->db->query("UPDATE   accountheads SET trail_balance_link=1  WHERE  account_heads_id='48'");         
                                                           
                                                       }
                                                       else
                                                       {

                                                            $query = $this->db->query("SELECT deleteid,id,name FROM accountheads  WHERE deleteid='0' AND id='".$partys1ss->customer_id."' ORDER BY name ASC");
                                                            $tableleg="Accounts head";

                                                           
                                                           
                                                       }
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {

                                                         $names= $val->name;
                                                         $nameids= $val->id;
                                                         $deleteid= $val->deleteid;
                                                                           
                                                       }
                                                       
}
                                              
                                              if($partys1ss->totalsum>0)
                                              {
                                              	$sstcc=round($partys1ss->totalsum,2);
                                              	$sstdd=0;
                                              }
                                              else
                                              {
                                              	$sstdd=round($partys1ss->totalsum,2);
                                              	$sstcc=0;
                                              }
                                         	$thiredarray[]=array(
                                               
                                                'namess'=>$nameids.' | '.$names,
                                                'tableleg'=>$tableleg,
                                                'totalcridit'=>$sstcc,
                                                'totaldebit'=>$sstdd,
                                                'totalsum'=>$partys1ss->totalsum,


                                         	);
                                                 
                                            //  if($value->id == 48){
                                               
                                            //     $credits1 += $partys1ss->totalcridit;

                                            //     $debit1 += $partys1ss->totaldebit;

                                            // }

                                            if($debit_status ==1)
                                            {





                                               

                                                if($value->id==373)
                                                {













                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }


                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;







                                                    


                                                }
                                                elseif($value->id==372)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                elseif($value->id==400)
                                                {




                                                                      $credits1 += 0;
                                                                      $debit1 += $partys1ss->totaldebit*2;

                            


                                                }

                                                elseif($value->id==2)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }                               
                                                elseif($value->id==151)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                else
                                                {


                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }

                                                                    $credits1 += $partys1ss->totalcridit;
                                                                    $debit1 += $partys1ss->totaldebit;


                                                }






                                               


                                            }
                                            else
                                            {


                                            
                                                  if($value->trail_view_status==0)
                                                  {  
                                                     
                                                     if($partys1ss->totaldebit!='')
                                                     {  
                                                          
                                                          if($value->id==116)
                                                          {


                                                                $totalcommssion=0;
                                                                // $resultset=$this->db->query("SELECT SUM(credits) as totalcridit FROM all_ledgers WHERE deleteid=0 AND customer_id='252' AND party_type=5  AND commission_customer>0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                                                // $resultset=$resultset->result();
                                                                // foreach($resultset as $ss)
                                                                // {
                                                                //    $totalcommssion= $ss->totalcridit;
                                                                // }


                                                              $credits1=$partys1ss->totaldebit-$totalcommssion;
                                                          }
                                                          else
                                                          {
                                                               $credits1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                     }
                                                     else
                                                     {
                                                          $credits1=0;
                                                     }
                                                    
                                                     $credits1=abs($credits1);
                                                     $set=1;
                                                     $creditssell=$credits1;
                                                   


                                                  }
                                                  if($value->trail_view_status==1)
                                                  {
                                                      if($partys1ss->totalcridit!='')
                                                      {
                                                          
                                                          if($value->id==119)
                                                          {
                                                              $debit1=$partys1ss->totalcridit;
                                                          }
                                                          else
                                                          {
                                                              $debit1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          $debit1=0;
                                                      } 
                                                      
                                                      $debit1=abs($debit1);
                                                      $creditssell=$debit1;




                                                   
                                                  }
                                                  
                                                }    
                                            


                                                  
                                         

                                                  
                                         }
                                          
                                       

                                    
                                    



                                   $dnone="";
                                    //  $ssurl=base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id;

                                       switch ($value->id) {
                                        case 48:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;

                                            break;
                                        case 156:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=332&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 151:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=220&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 155:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=346&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 175:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=405&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 150:
                          $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=163&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 159:  case 383:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=1&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;  
                                         case 373:
                                            $ssurl=base_url()."index.php/customer/common_ledger?party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;       
                                        case 160:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=0&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;
                                            case 119:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            $debit1=$credits1;
                                            $credits1=0;
                                            break;
                                        // case 172:
                                        //     $debit1=$credits1;
                                        //     $credits1=0;
                                        //     break;
                                        case 68:
                                            //$ssurl=base_url()."index.php/report/customer_balance_comparision?from_date=".$formdate."&to_date=".$todate;

                                         $ssurl=base_url()."index.php/customer/ledger?trail_balance=0&party_type=1&from_date=".$formdate."&to_date=".$todate;


                                            break;
                                         case 179:
                                            $ssurl=base_url()."index.php/customer/ledger?cnn_status=1&party_type=1&from_date=".$formdate."&to_date=".$todate;
                                            break;    
                                        case 154:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 381:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";

                                         break;


                                          case 388:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=580&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                           case 390:
                                            // $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=297&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                         case 380:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate;
                                             $dnone="d-nones";
                                         break;
                                        
                                         case 382:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                         break;   
                                        case 116: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                             
                                        case 2: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                        break; 
                                        case 104: 
                                            $ssurl=base_url()."index.php/vendor/ledger?trail_balance=0&from_date=".$formdate."&to_date=".$todate;
                                        break;    
                                        case 124:
                                            $credits1=0;
                                            $result_stock=$this->db->query("SELECT selling_average_price,average_price,stock FROM product_list WHERE deleteid=0 AND stock>0  ORDER BY id DESC");
                                            $result_stock=$result_stock->result();
                                            foreach($result_stock as $stock)
                                            {
                                                $selling_average_price=$stock->selling_average_price;
                                                $average_price=$stock->average_price;
                                                $profile_loss_price=$selling_average_price-$average_price;
                                                $valueprice=abs($profile_loss_price);
                                                //$credits1+=$valueprice*$stock->stock;                                                
                                            }
                                            $ssurl="#";
                                            break;
                                        default:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                            }
                                            
                                            
                                       $credits1total+=$credits1;
                                       $debit1total+=$debit1;
                        



                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=> $ssurl,
                                            'dnone'=> $dnone,
                                            'credit' => $credits1,
                                            'debit' => $debit1,
                                            'set' => $credits1+$debit1,
                                            'third_array'=>$thiredarray
                
                                        );
                            
                            

                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                            
                    
                     $credit=[];
                     $debit=[];
                     $credit_cash=[];
                     $debit_cash=[];



            $result2=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=0 and b.id!=25");
            $result2=$result2->result();
            foreach ($result2 as  $value) {
  $result_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                               $resultcheck=$result_balance->result(); 
                             foreach ($resultcheck as  $value1) {

                                // print_r($value1);
                                $total_debit=$value1->total_debit;
                                $total_credit=$value1->total_credit;
                                $total = $total_credit-$total_debit;
                                             

                               
                                                 if($total > 0){
                                                     $credit[] =$total;
                                                 }else{
                                                     $debit[] = abs($total);
                                                 }
                                                
                             }

                            }




 $credit_un=[];
                     $debit_un=[];
                                    $result2_un=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=1 and b.id!=25");
            $result2_un=$result2_un->result();
            foreach ($result2_un as  $value_un) {
  $result_balance_un=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value_un->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                               $result_balance_un=$result_balance_un->result(); 
                             foreach ($result_balance_un as  $value1_un) {

                                // print_r($value1);
                                $total_debit_un=$value1_un->total_debit;
                                $total_credit_un=$value1_un->total_credit;
                                $total_un = $total_credit_un-$total_debit_un;
                                             

                               
                                                 if($total_un > 0){
                                                     $credit_un[] =$total_un;
                                                 }else{
                                                     $debit_un[] = abs($total_un);
                                                 }
                                                
                             }

                            }





                            



                            $result_cash_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id=25  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                             $resultcheck_cash=$result_cash_balance->result(); 
                           foreach ($resultcheck_cash as  $value2) {

                              // print_r($value1);
                              $total_debit=$value2->total_debit;
                              $total_credit=$value2->total_credit;
                              $total = $total_credit-$total_debit;
                                           

                             
                                               if($total > 0){
                                                   $credit_cash[] =$total;
                                               }else{
                                                   $debit_cash[] = abs($total);
                                               }
             
                           }










                            $credit_total_bank=0;
                            $dedit_total_bank=0;
                            $credit_total_cash=0;
                            $dedit_total_cash=0;


                             $credit_total_bank_un=0;
                            $dedit_total_bank_un=0;
                           


                            foreach ($credit as $credits) {
                                $credit_total_bank += $credits;
                            }
                            foreach ($debit as $debits) {
                                $dedit_total_bank += $debits;
                            }


                            foreach ($credit_un as $credits_un) {
                                $credit_total_bank_un += $credits_un;
                            }
                            foreach ($debit_un as $debits_un) {
                                $dedit_total_bank_un += $debits_un;
                            }

                            foreach ($credit_cash as $credits) {
                                $credit_total_cash = $credits;
                            }
                            foreach ($debit_cash as $debits) {
                                $dedit_total_cash = $debits;
                            }
                            
                           
                    //  $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");

                     
                     $resultbank=$this->db->query("SELECT a.*,SUM(b.credit) as totalcridit,SUM(b.debit) as totaldebit,SUM(b.credit-b.debit) as total FROM bankaccount as a JOIN  bankaccount_manage  as b ON a.id=b.bank_account_id WHERE a.deleteid=0  AND b.deleteid=0 AND b.party_type NOT IN('1','2','3','5') AND   b.create_date<='".$todate."'  GROUP BY a.account_type ORDER BY a.bank_name ASC");
                     $resultbank=$resultbank->result();
                     
                     
                     $credits1totalbank=0;
                     $debit1totalbank=0;
                     $bankcash_credit=0;
                     $bankcash_debit=0;

                     foreach ($resultbank as  $valueb) 
                     {
                         
                         
                            
                            
                                         $setbank=0;
                                         $debitbank1=0;
                                         $creditsbank1=0;
                                       
                                             
                                             
                                                      $balancebank=$valueb->total;
                                                 
                                                    $debitbank1 = $dedit_total_bank;
                                                    $creditsbank1 = $credit_total_bank;  
                                                    $credits1totalbank_un =$credit_total_bank_un;
                                                    $debit1totalbank_un =$dedit_total_bank_un; 

                                                

                                                        


                                                      $balancebank=abs($balancebank);
                    
                    
                                                      
                                                     
                                                      
                                                      
                                                      $setbank=1;
                                                
                                         
                             
                                       
                                       
                                      
                                      
                                       if($valueb->id!=25)
                                       {


                                       $credits1totalbank =$credit_total_bank;
                                       $debit1totalbank =$dedit_total_bank; 

                                       } 




                                       if($valueb->id==25)
                                       {


                                       $bankcash_credit =$credit_total_cash;
                                       $bankcash_debit =$dedit_total_cash; 

                                       }   
                                     
                                        

                                   
                                       
                                        if($valuevv->account_type_id==18 && $valueb->account_type == 1){

                                            $array1[] = array(
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "CASH IN HAND", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_cash,
                                                'debit' => $dedit_total_cash,
                                                'set' => $credit_total_cash+$dedit_total_cash
                    
                                            );

                                        }

                                       if($valuevv->account_type_id==18 && $valueb->account_type == 0){
                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "BANK IN ACCOUNT", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=0&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank,
                                                'debit' => $dedit_total_bank,
                                                'set' => $credit_total_bank+$dedit_total_bank,
                    
                                            );


                                        }


                                         if($valuevv->account_type_id==32 && $valueb->account_type == 0){

                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "UNSECURED LOAN", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank_un,
                                                'debit' => $dedit_total_bank_un,
                                                'set' => $credit_total_bank_un+$dedit_total_bank_un,
                    
                                            );


                                        }


                                    
                                    
                                        

                                   
                         
                        
                       


                        $i++;

                     }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    //  $array1 =[];
                     $arrayval=array_merge($array,$array1);

                    // echo "<pre>";print_r($arrayval);
                    // exit;
                     
                     
                      $totalset=$credits1total+$debit1total;
                      //$totalsetbank=$credits1totalbank+$debit1totalbank;
                     
                     if($valuevv->account_type_id==18)
                     {
                        
                        
                         $debit1total = $debit1total + $debitbank1 + $bankcash_debit;
                         $credits1total =$credits1total + $creditsbank1 + $bankcash_credit;

                     }


                     if($valuevv->account_type_id==32)
                     {
           
                        
                         $debit1total = $debit1total + $debit1totalbank_un;
                         $credits1total =$credits1total + $credits1totalbank_un;
                         $totalset=$debit1total+$credits1total;

                     }
                    //  elseif($valuevv->account_type_id==27)
                    //  {
                    //       $totalsetbank=$creditsbank1+$bankcash_debit;

                    
                         
                    //      $arrayhead[]=array(
                           
                    //      'id'=>$valuevv->account_type_id,
                    //      'account_type_name'=>$valuevv->account_type_name,
                    //      'debit'=>round($bankcash_debit+$debit1total,2),
                    //      'credit'=>round($bankcash_credit+$credits1total,2),
                    //      'set'=>round($totalsetbank+$totalset,2),
                    //      'sub'=>$arrayval
                         
                         
                    //      );
                         
                    //  }
                    //  else
                    //  {
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>$debit1total,
                         'credit'=>$credits1total,
                         'set'=>$totalset,
                         'sub'=>$arrayval
                         
                         
                         );
                    //  }
                     
                       
                     
                     
                     
                     
                  }
                    
                    
              //  echo json_encode($arrayhead);
                     
                     //echo "<pre>";print_r($arrayhead);
                    //exit;

                  ?>



 <table  border="yes" id="datatable"  style="border-collapse: collapse;width: 100%;">
                      <thead>
                           <tr>


                          <th></th>
                          <th ><b>   General Ledger A/c Bal.</b></th>
                     
                          
                          <th></th>
                          
                          <!--<th></th>-->
                          
                        </tr>
                        <tr>


                          <th ><b>Account Name</b></th>
                          
                        
                          
                          <th><b>Debit  </b></th>
                            <th><b>Credit </b></th>
                          
                          <!--<th><b>Balance  </b></th>-->
                          
                        </tr>
                       
                      </thead>
                      <!-- <pre>{{ namesDataledgergroup | json }}</pre> -->
<?php

foreach ($arrayhead as$valuex) {

	?>



                        <tbody >
  <!-- Main Data -->
  <tr >
    <td>
      <b>
        <a href="#" style="color: #ef7b3f; font-weight: 800;"><?php echo $valuex['account_type_name']; ?></a>
      </b>
      <i class="fa fa-angle-down" style="float: right;"></i>
    </td>
    <td>
      <b ><a href="#"><?php echo $valuex['debit']; ?></a></b>
    </td>
    <td>
      <b><a href="#"><?php echo $valuex['credit']; ?></a></b>
    </td>
    <!-- <td><pre>{{ namesvv.sub | json }}</pre></td> -->
  </tr>
<?php

foreach ($valuex['sub'] as $valuexx) {

	?>
  <!-- Sub Array -->
  <tr >
    <td><a href="<?php echo $valuexx['url']; ?>" target="_blank" style="color:green; font-weight: 800;"> <?php echo $valuexx['name']; ?></a></td>
    <td style="color:green; font-weight: 800;"><?php echo $valuexx['debit']; ?></td>
    <td style="color:green; font-weight: 800;"><?php echo $valuexx['credit']; ?></td>
     
  </tr>
<?php

foreach ($valuexx['third_array'] as $valuexxx) {

	?>
   <tr>
    <td>3rd SUB | <?php echo $valuexxx['namess']; ?></td>
    <td><?php echo $valuexxx['totaldebit']; ?></td>
    <td><?php echo $valuexxx['totalcridit']; ?></td>
  </tr>
  <?php } ?>
<?php } ?>
  <!-- Third Array -->
 
</tbody>  

 

	<?php
}

?>
</table>    
<?php
                    
                  //echo json_encode($arrayhead);
 
                     

    }
    
        public function fetch_data_get_ledger_view_all_base_by()
    {

                    
                    $accountshead=0;
                    if(isset($_GET['accountshead']))
                    {
                         $accountshead=$_GET['accountshead'];
                     
                    }
                   
                      if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];

                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     $qq="";
                     $St="";
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }

                       if($accountshead=='72')
                     {
                         $qq=" AND account_head_id IN ('14','15','16','17','18','20','21','22','23','24','25','27','28','29','30','31','32','33','34','36','37','38','39','40','41','42','43','44','45','46','47','48','49','50','51','53','54','55','57','64','65','66','67','73','74','75','76','77','78','79','80','81','134','135','136','137','138','141','143','144','147','148','152','153')";
                     }
                     
                     if($accountshead=='116')
                     {
                         $qq=' AND order_id>0 AND account_heads_id_2='.$accountshead;
                     }
                      if($accountshead=='123')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }
                     if($accountshead=='119')
                     {
                         $qq=' AND order_id>0 AND account_heads_id_2='.$accountshead;
                     }
                     if($accountshead=='2')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }

                     if($accountshead=='68')
                     {
                         $qq=' AND party_type=1';
                     }

                      if($accountshead=='380')
                     {
                         $qq=' AND party_type=5 AND account_heads_id_2=372';
                     }

                     if($accountshead=='381')
                     {
                         $qq=' AND party_type=5 AND account_heads_id_2='.$accountshead;
                     }

                     if($accountshead=='382')
                     {
                         $qq=' AND party_type=5 AND account_heads_id_2=142 AND tcs_status=1';
                     }



                     if($accountshead=='155')
                     {
                         $qq=' AND party_type=2 AND driver_collection_status=1';
                     }

                     if($accountshead=='104')
                     {
                         $qq=' AND party_type IN ("3","5") AND account_head_id='.$accountshead;
                     }
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $party_type=$_GET['party_type'];
                     
                     
                     if($accountshead==107 || $accountshead==106 || $accountshead==105)
                     {
                         //$party_type=4;
                         
                     }
                     
                     
                     
                     $Stl="";
                     $banksteup_bank="";
                     $internal_payment_status=1;
                     if(isset($_GET['payment_status']))
                     {
                              $payment_status=$_GET['payment_status'];
                              
                              if($payment_status!='')
                              {
                                      if($payment_status=='1')
                                      {
                                          //$Stl=' AND account_head_id IN ("105","106","107")';
                                          
                                         
                                          $payment_mode='Cash';
                                          $banksteup1=" AND bank_id IN ('25','24') AND order_trancation_status=0 AND opening_balance_status=0";
                                          $banksteup_bank=" AND bank_account_id  IN ('25','24')";
                                      }
                                      else
                                      {
                                          
                                         $payment_mode='NON Cash';
                                        // $Stl=' AND account_head_id  NOT IN ("105","106","107")';
                                         $banksteup1=" AND bank_id NOT IN ('0','25','24') AND  order_trancation_status=0 AND opening_balance_status=0";
                                         $banksteup_bank=" AND bank_account_id NOT IN ('0','25','24')";
                                      } 
                                  
                              }
                              
                         
                         
                     }
                     
                     
                     
                   
                    
                                  if($party_type=='All')
                                  {
                                      $St=' ';
                                  }
                                  else
                                  {
                                      $St=' AND party_type='.$party_type;
                                  }
                          
                                   if($deleteid==1)
                                   {
                                    $Stdel=' AND deleteid!=0';
                                   }
                                   else
                                   {
                                     $Stdel=' AND deleteid=0';
                                   }
                                  

                           $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
         $result4=$this->db->query("SELECT *  FROM all_ledgers  WHERE  `update_date` BETWEEN '".$formdate."' AND '".$todate."' $Stdel  $banksteup1  $St $qq $Stl ORDER BY update_date DESC");
                              
                              
                              
                              
                              
                     $array5=array();   
                     
                   
                     
                     if($accountshead=='0')
                     {
                         

                         $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                     $result5=$this->db->query("SELECT * FROM bankaccount_manage  WHERE  `update_date` BETWEEN '".$formdate."' AND '".$todate."' $Stdel  $banksteup_bank ORDER BY update_date DESC");
                     $result5=$result5->result();
                     $ll=1;
                     foreach ($result5 as  $value)
                     {
                         
                             $query = $this->db->query("SELECT id,bank_name FROM bankaccount  WHERE deleteid='0' AND id='".$value->bank_account_id."' ORDER BY bank_name ASC");
                             $res=$query->result();
                             foreach($res as $partys)
                             {
                                                        $bank_name=$partys->bank_name.' (Bank AC)';
                                                        $customer_id=$partys->id;
                             }
                             
                                $account_head_idname="";
                            
                            
                              $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_head_id."'  ORDER BY sort_order ASC");
                              $result_account_head_text=$result_account_head->result();
                              
                             foreach($result_account_head_text as $ass)
                             {
                                                        $account_head_idname=$ass->name;
                                                       
                             }
                             
                             
                             $url='bankaccount/statement?bank_id='.$customer_id.'&name='.$bank_name;
                              $addclass="";
                         if($value->changes_status==1)
                         {
                             $addclass="bgcolorchange";
                             
                         }
                         
                         
                         
                         
                         
                         
                         
                                       $username="";
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username= $valuess->name; 
                                          
                                         
                                       }
                                        
                         
                         
                         
                         
                         
                         
                         
                            $array5[] = array(
                            
                            
                            'no' => $ll, 
                            'id' => $value->id, 
                            'party_name' => $bank_name, 
                            'order_id' => '', 
                            'order_no' => '', 
                            'addclass' => $addclass,
                            'org_amount' => $value->amount,
                            'payment_mode' => $payment_mode, 
                            'reference_no' => $value->name,
                            'table'=>"bankaccount",
                            'link' => $url,
                            'username' => $username,
                            'invoice_link' => $invoice_link,
                            'notes' => $value->status_by.' | '.$value->deletemod, 
                            'amount' => 0, 
                            'paid_status' => $value->status, 
                            'Payoff' => $value->debit, 
                            'Payout' => $value->credit,
                            'debits' => $value->credit,
                            'credits' => $value->debit,
                            'process_by' => $value->status_by.' | '.$value->deletemod,
                            'bank_name'=>$bank_name,
                            'payment_date' => date('d-m-Y',strtotime($value->create_date)).' '.$value->create_time, 
                            'payment_time' => $value->create_time,
                            'accounthead'=>$account_head_idname
                        
                            

                        );


                         
                         $ll++;
                     }
                     
                     }
                              
                              
                              
                              
                              
                              
                             
                     $result4=$result4->result();
                     $array3=array();
                    
                      
                    
                 
                     
                         
                     $l=$ll;
                     foreach ($result4 as  $value)
                     {
                       
                       
                            $account_head_idname="";
                            
                            
                              $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_head_id."'  ORDER BY sort_order ASC");
                              $result_account_head_text=$result_account_head->result();
                              
                             foreach($result_account_head_text as $ass)
                             {
                                                        $account_head_idname=$ass->name;
                                                       
                             }
                             
                             
                             
                             
                             
                           
                             if($value->debits==''){ $value->debits=0; }
                             if($value->credits==''){ $value->credits=0; }
                         
                            if($value->party_type==1)
                            {
                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");
                                        
                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                        
                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                            }
                            
                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }
                             

                              if($value->party_type==5 || $value->party_type==7)
                            {
  $url=$traget.'/others_ledger_find?'.$traget2.'='.$customer_id.'&party_type='.$value->party_type;
                           
                            }
                             else
                             {
  $url=$traget.'/ledger_find?'.$traget2.'='.$customer_id.'&party_type='.$value->party_type;
                           
                              }

                           
                            
                            
                            $order_no=$value->order_no;
                             if (strpos($order_no, 'JE-') !== false) {
                                $stinc= '1';
                            }
                            else
                            {
                                $stinc=  '0';
                            }
                                                        
                            
                            if($stinc==1)
                            {
                                $val= explode('JE-', $order_no);
                                $invoice_link=base_url().'index.php/manual_journals/invoice/'.$val[1];
                                
                            }
                            else
                            {
                                
                                $invoice_link=0;
                            }
                            
                             
                             
                           $bank_name="";
                           $bank_name_dd= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                           foreach($bank_name_dd as $bb)
                           {
                               $bank_name=$bb->bank_name;
                              
                           }
                             
                           $addclass="";
                         if($value->changes_status==1)
                         {
                             $addclass="bgcolorchange";
                             
                         }
                         
                              $valueset=$value->balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                             $total=abs($valueset);
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                       $username="";
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username= $valuess->name; 
                                          
                                         
                                       }
                                        
                         
                         
                            if($accountshead==2)
                            {
                                $value->debits=$value->credits;
                                $value->credits=0;
                                $account_head_idname="SALES RETURN";
                            }
                             if($accountshead==119)
                            {
                                $value->debits=$value->credits;
                                $value->credits=0;
                                $account_head_idname="PURCHASE ACCOUNT";
                            }

                              if($accountshead==155)
                            {
                                $value->debits=$value->credits;
                                 $value->credits=0;
                                $account_head_idname="AUTO EXPENSES";

                            }


                            if ($accountshead == 48) {
                                // case 48:
                                    
                                   if($value->totalsum>0)
                                    {
                                      $value->credits=$value->totalsum;
                                      $value->debits=0;
                                    }
                                    else
                                    {


                                        $value->debits=abs($value->totalsum);
                                        $value->credits=0;

                                    }
                                
                                //     break;
                              
                                // default:
                                
                                //     if($value->totalsum>0)
                                //     {
                                //       $value->credits=$value->totalsum;
                                //       $value->debits=0;
                                //     }
                                //     else
                                //     {


                                //         $value->debits=abs($value->totalsum);
                                //         $value->credits=0;

                                //     }
                                
                                }

                     
                         
                            $array3[] = array(
                            
                            
                            'no' => $l+1, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'addclass' => $addclass, 
                            'org_amount' => $value->org_amount, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'table'=>"all_ledgers",
                            'link' => $url,
                            'username' => $username,
                            'invoice_link' => $invoice_link,
                            'notes' => $value->notes.' | '.$value->deletemod, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by.' | '.$value->deletemod,
                            'balance' => $total,
                            'getstatus' => $getstatus,
                            'bank_name'=>$bank_name,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)).' '.$value->payment_time, 
                            'payment_time' => $value->payment_time,
                            'accounthead'=>$account_head_idname
                        
                            

                        );


                        $l++;

                     }
                     
                     
                     
              
                     
                     
                     
                     
                    $arrayval=array_merge($array5,$array3);

                     echo json_encode($arrayval);
                     
                     
                     

    }
    
    
    public function last_edit_ledger()
    {
                  

                                         ini_set('memory_limit', '4400M');
 
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['partytype'] = $this->Main_model->where_names('partytype','deleteid','0');
                                             $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             
                                             
                                             $data['data_title']="";
                                             if(isset($_GET['accountshead']))
                                             {
                                                  $accountshead = $this->Main_model->where_names('accountheads_sub_group','id',$_GET['accountshead']);
                                                  foreach($accountshead as $val)
                                                  {
                                                     $data['data_title']= $val->name;
                                                  }
                                             }
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Recent Ledger Transaction';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/last_edit_ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

    public function trial_balance_full_current_date()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {



                                             $this->db->query("DELETE FROM table_customize_new  WHERE user_id='".$this->userid."'");



                                            
                                          $column_enable = [8,9,10];
                                          $column_disable = [1,2,3,4,5,6,7,11,12,13,14];
                                          foreach($column_disable as $Key => $val){
                                              $basedata['user_id'] = $this->userid;
                                              $basedata['label_id'] = $val;
                                              $basedata['status'] = 0;
                                              $this->Main_model->insert_commen($basedata, 'table_customize_new');
                                                 }
                                     
                                          foreach($column_enable as $Key => $val){
                                             $basedata['user_id'] = $this->userid;
                                             $basedata['label_id'] = $val;
                                             $basedata['status'] = 1;
                                             $this->Main_model->insert_commen($basedata, 'table_customize_new');

                                                 }

                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance_full_current_date.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    public function trial_balance_log_commission()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance  Commision log';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_commission.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}


    public function trial_balance_log_sales()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance  Sales log';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_sales.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}






    public function trial_balance_log_manual_journal()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='journal';
                                             $data['title']    = 'Trial Balance Manual journal';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_manuval.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}
 public function trial_balance_log_ex_return()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='ex_return';
                                             $data['title']    = 'Trial Balance Excess Return';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_exreturn.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}



 public function trial_balance_log_discount()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='journal';
                                             $data['title']    = 'Trial Balance Discount';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_discount.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}

    public function trial_balance_log_voucher()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='voucher';
                                             $data['title']    = 'Trial Balance voucher';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_manuval.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}

public function trial_balance_log_party()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='party';
                                             $data['title']    = 'Trial Balance Party';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_manuval.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}
   public function trial_balance_log_bank_inter_transfer()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='voucher';
                                             $data['title']    = 'Trial Balance Bank Internal Transfer';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_bank.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}



 public function trial_balance_log_purchase()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='return';
                                             $data['title']    = 'Trial Balance purchase';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_purchase.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}
 public function trial_balance_log_return()
{




                                        if(isset($this->session->userdata['logged_in']))
                                        {


                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['type']='return';
                                             $data['title']    = 'Trial Balance return';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_log_return.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




}


     public function fetch_data_accounts_log_report_commission()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              





  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE   customer_id=252 AND commission_customer=1  $sqls GROUP BY order_no ORDER BY order_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{






                        $result=$this->db->query("SELECT * FROM all_ledgers WHERE  process_by LIKE '%Commission%' AND order_no LIKE '%".$ddf->order_no."%' AND deleteid=0
                          ORDER BY order_no,id DESC ");

                     $result=$result->result();





                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;
                    

                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }






$bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND deletemod LIKE '%".$value->id."%' AND status_by LIKE '%Commission%' AND deleteid=0 ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {


                                                     $bankaccount='';
                                                      $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }




                                                       // $created_by_bank='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->user_id."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $created_by_bank=$values_set->name;

                                                       //    }



                                                       //      $deleted_by='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->deleted_by."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $deleted_by_bank=$values_set->name;

                                                       //    }


                                                       //      $edited_by='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->edited_by."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $edited_by_bank=$values_set->name;

                                                       //    }

















                                                       $array[] = array(

                                                            'deletemod' => $bankss->deletemod,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => $bankss->debit,
                                                            'debits' => $bankss->credit,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }

                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->notes.' | '.$value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                             



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                            );

                        }



}


 






                   

                    echo json_encode($mainarray);

}


















 public function fetch_data_accounts_log_report_exreturn()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              





  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE   process_by='Excess Payment Debit'   $sqls GROUP BY deletemod ORDER BY id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{




$deletemodddf=str_replace('DPAY_SET', '', $ddf->deletemod);

                        $result=$this->db->query("SELECT * FROM all_ledgers WHERE   deletemod LIKE '%".$deletemodddf."%' AND deleteid=0
                          ORDER BY order_no,id DESC ");

                     $result=$result->result();





                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;
                    

                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }



$deletemod=str_replace('DPAY_SET', '', $value->deletemod);



$bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND deletemod LIKE '%".$deletemod."%'  AND deleteid=0 ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {


                                                     $bankaccount='';
                                                      $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }




                                                       // $created_by_bank='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->user_id."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $created_by_bank=$values_set->name;

                                                       //    }



                                                       //      $deleted_by='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->deleted_by."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $deleted_by_bank=$values_set->name;

                                                       //    }


                                                       //      $edited_by='';
                                                       //    $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$bankss->edited_by."'");
                                                       //    $resultsales_team=$query->result();
                                                       //    foreach ($resultsales_team as  $values_set) 
                                                       //    {

                                                       //          $edited_by_bank=$values_set->name;

                                                       //    }

















                                                       $array[] = array(

                                                            'deletemod' => $bankss->deletemod,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => $bankss->debit,
                                                            'debits' => $bankss->credit,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }

                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                            );



}


 






                   

                    echo json_encode($mainarray);

}
























  public function fetch_data_accounts_log_report_manuval()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


   if($type=='journal')
   {
            $sqls.=" AND process_by IN ('Manual Journals')";
   }


    if($type=='party')
   {
            $sqls.=" AND process_by IN ('Party Transfer')";
   }


   if($type=='voucher')
   {
        $sqls.=" AND process_by IN ('Voucher')";
   }

    if($type=='ex_return')
   {
        $sqls.=" AND process_by IN ('Voucher')";
   }


  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE  id>0  $sqls GROUP BY deletemod ORDER BY order_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                       $bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND deletemod='".$ddf->deletemod."' AND deleteid='0' ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {


                                                     $bankaccount='';
                                                      $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }


                                                       $array[] = array(

                                                            'deletemod' => $bankss->deletemod.'-'.$bankss->id,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => $bankss->debit,
                                                            'debits' => $bankss->credit,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }



        $result=$this->db->query("SELECT * FROM all_ledgers WHERE  deletemod='".$ddf->deletemod."' AND deleteid=0 ORDER BY order_no,id DESC ");
                          

                     $result=$result->result();





                    
                    

                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }








                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                            );



}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}






  public function fetch_data_accounts_log_report_sales()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


 


  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE  id>0   AND party_type=1 AND order_id>0 $sqls GROUP BY order_no ORDER BY order_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                       $bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND selse_order_no='".$ddf->order_no."' AND deleteid='0' ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {


                                                      $bankaccount='';
                                                      $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }


                                                       $array[] = array(

                                                            'deletemod' => $bankss->deletemod.'-'.$bankss->id,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => $bankss->debit,
                                                            'debits' => $bankss->credit,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }



                       $bank=$this->db->query("SELECT a.*,SUM((b.rate+b.commission)*b.qty) as amountot FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid='0' AND b.deleteid='0' AND a.order_base NOT IN ('0') AND a.id='".$ddf->order_id."'");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {





                                                     $bankaccount='';
                                                      $querys = $this->db->query("SELECT company_name as name FROM `customers`  WHERE id='".$bankss->customer_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }


                                                       $array[] = array(

                                                            'deletemod' => $bankss->order_no,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => round($bankss->amountot,2),
                                                            'debits' => 0,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }



$result=$this->db->query("SELECT * FROM all_ledgers WHERE customer_id NOT IN ('252','346') AND  order_no='".$ddf->order_no."' AND deleteid='0' ORDER BY order_no,id DESC ");
                          

                     $result=$result->result();
                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }








                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits,2),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }

                    

                            if($sstcolor=='bgcolor')
                            {

                                $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'order_id' => base64_encode($ddf->order_id),
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                                  );


                            }

                             


}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}























  public function fetch_data_accounts_log_report_pur()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


 


  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE  id>0   AND party_type IN ('3','5') AND purchase_entry=1  $sqls GROUP BY order_no ORDER BY order_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                      




$result=$this->db->query("SELECT * FROM all_ledgers WHERE  party_type IN ('3','5') AND purchase_entry=1 AND order_no='".$ddf->order_no."' AND deleteid='0' ORDER BY order_no,id DESC ");
                          

                     $result=$result->result();
                     foreach ($result as  $value)
                     {

                          

                                

                      if($value->order_id>0)
                       {


                              //  $loading_charges_dec=0;
                              // $query = $this->db->query("SELECT loading_charges,roundoff,convert_status FROM `purchase_invoice`  WHERE id='".$value->order_id."'");
                              // $resultsales_team=$query->result();
                              // foreach ($resultsales_team as  $values_set) 
                              // {

                              //       $loading_charges_dec=$values_set->loading_charges;
                              //       $roundoff=$values_set->roundoff;
                              //       $convert_status=$values_set->convert_status;


                              //       if($roundoff>0)
                              //       {
                              //           if($convert_status==0)
                              //           {
                              //                 $roundoffDr=$roundoff;
                              //           }

                              //           if($convert_status==1)
                              //           {
                              //               $roundoffCr=$roundoff;
                              //           }

                              //       }

                              // }


                                                      $credits_sub_total=$value->credits_sub_total;


                                                      // if($value->payment_date>'2024-05-31')
                                                      // {



                                                      // if($roundoffDr>0)
                                                      // {       
                                                      //         $roundoffDr=$roundoffDr*2;
                                                      //         $credits_sub_total=$value->credits_sub_total-$roundoffDr;
                                                      // }
                                                      // if($roundoffCr>0)
                                                      // {
                                                      //         $credits_sub_total=$value->credits_sub_total+$roundoffCr;
                                                      // }

                                                      // }
                                                      






                                  $array[] = array(


                                
                                    'deletemod' => $value->deletemod,
                                    'party_name' => 'PURCHASE ACCOUNT',
                                    'order_no' => $value->order_no,
                                    'reference_no' => $value->reference_no,
                                    'created_by' => $created_by,
                                    'edited_by' => $edited_by,
                                    'deleted_by' => $deleted_by,
                                    'credits' => $value->debits,
                                    'debits' => round($credits_sub_total),
                                    'SS'=>1,
                                    'payment_mode' => $value->payment_mode_payoff,
                                    'notes' => $value->process_by.' | '.$value->reference_no,
                                    'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                    'status' => $status


                                     );


                               

                                     

                              }



                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }








                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits,2),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }

                    

                            if($sstcolor=='bgcolor')
                            {

                                $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'order_id' => base64_encode($ddf->order_id),
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                                  );


                            }

                             


}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}



  public function fetch_data_accounts_log_report_bank()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


   
        $sqls.=" AND status_by IN ('Bank Internal transfer')";
  


  $resultss=$this->db->query("SELECT * FROM bankaccount_manage WHERE  id>0  $sqls GROUP BY deletemod ORDER BY id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                       $bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND deletemod='".$ddf->deletemod."' AND deleteid='0' ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {


                                                     $bankaccount='';
                                                      $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                                                      $bankaccounts=$querys->result();
                                                      foreach ($bankaccounts as  $bank) 
                                                      {

                                                            $bankaccount=$bank->name;

                                                      }


                                                       $array[] = array(

                                                            'deletemod' => $bankss->deletemod,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->name,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => $bankss->debit,
                                                            'debits' => $bankss->credit,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                                                            'status' => $status_bank

                                                        );

                       }





                       


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->create_date)),
                                'subarray'=>$array
                                


                            );



}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}



  public function fetch_data_accounts_log_report_return()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


  


  

$resultss=$this->db->query("SELECT * FROM all_ledgers WHERE  process_by LIKE '%Sales Return%'   $sqls GROUP BY reference_no ORDER BY reference_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                       $bank=$this->db->query("SELECT * FROM order_sales_return_complaints WHERE re_order_no='".$ddf->reference_no."' AND deleteid='0' ORDER BY id DESC ");
                       $bank=$bank->result();
                       foreach ($bank as  $bankss) 
                       {
                                                       

                                                        if($bankss->update_date > '2024-05-31')
                                                        {

                                                             $bankss->bill_total=round($bankss->bill_total/1.18,2);

                                                        }

                                                       $array[] = array(

                                                            'deletemod' => $bankss->re_order_no.' | '.$bankss->order_no,
                                                            'party_name' => $bankaccount,
                                                            'order_no' => $bankss->customer_id,
                                                            'reference_no' => $bankss->ex_code,
                                                            'created_by' => $created_by_bank,
                                                            'edited_by' => $edited_by_bank,
                                                            'deleted_by' => $deleted_by_bank,
                                                            'credits' => 0,
                                                            'debits' => $bankss->bill_total,
                                                            'payment_mode' => $bankaccount,
                                                            'SS' => $ss,
                                                            'notes' => $bankss->status_by,
                                                            'create_date' =>date('d-m-Y',strtotime($bankss->update_date)),
                                                            'status' => $status_bank

                                                        );

                       }



        $result=$this->db->query("SELECT * FROM all_ledgers WHERE  process_by LIKE '%Sales Return%' AND reference_no='".$ddf->reference_no."' AND deleteid=0 ORDER BY order_no,id DESC ");
                          

                     $result=$result->result();





                    
                    

                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }








                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits),
                                'debits' => round($value->debits,2),
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                            );



}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}



    public function weighted_product_list($id){

        if(isset($this->session->userdata['logged_in']))
        {
            
            $data['id']=$id;
            $data['fromdate'] = '01-july-2023';
            $data['currentdate'] = date('Y-M-d');
            $data['active_base']='route';
            $data['active']='route';
            $data['title']    = 'Weighted average product list';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('report/weighted_product_list.php',$data);
        }
        else
        {
            redirect('index.php/adminmain');
        }
    }

    public function weighted_product_list_val() {
        $id = $_GET['id'];
    

        $resultvent = $this->Main_model->where_names('product_list', 'id', $id);
        

        foreach ($resultvent as $value) {
            $uom = $value->uom;
        }

        // Your database query
        $currentDate = date('Y-m-d');
        $query = $this->db->query("SELECT a.qty, a.amount,a.uom, b.create_date FROM order_product_list_process as a LEFT JOIN orders_process as b ON a.order_id = b.id WHERE a.deleteid = '0' AND b.deleteid = '0'  AND DATE(a.create_date) BETWEEN '2023-10-01' AND '$currentDate' AND a.product_id = '" . $id . "' ");
        $res = $query->result();

         //Return Process
         $query1 = $this->db->query("SELECT b.qty, b.rate, a.create_date FROM order_sales_return_complaints as a LEFT JOIN sales_return_products as b ON a.id = b.c_id WHERE a.deleteid = '0' AND b.deleteid = '0' AND a.order_base = 5  AND DATE(a.create_date) BETWEEN '2023-10-01' AND '$currentDate' AND b.product_id = '" . $id . "' ");
         $result = $query1->result();

          //Opening Process
          $query_open = $this->db->query("SELECT opening_val, opening_qty, create_date FROM product_list  WHERE deleteid = '0'  AND DATE(create_date) BETWEEN '2023-10-01' AND '$currentDate' AND id = '" . $id . "' ");
          $resultOpen = $query_open->result();

        $orderedMonths = [
            1 => 'April', 2 => 'May', 3 => 'June', 4 => 'July', 5 => 'August', 6 => 'September',
            7 => 'October', 8 => 'November', 9 => 'December', 10 => 'January', 11 => 'February', 12 => 'March'
        ];
        
        // Initialize an associative array to store qty and value for each month
        $monthlyData = [];
        
        // Initialize the array with zeros for each month
        foreach ($orderedMonths as $order => $monthName) {
            $monthlyData[$monthName] = [
                'outqty' => 0,
                'outvalue' => 0,
            ];
            $monthlyData[$monthName]['order'] = $order; // Store the order number
        }
        
        // Loop through the results and update the data
        foreach ($res as $val) {
            $date = $val->create_date;
            $month = date('F', strtotime($date)); // Get the full month name
        
            $qty = $val->qty;
            $amount = $val->amount;
        
            // Update the data for the corresponding month
            $monthlyData[$month]['outqty'] += $qty;
            $monthlyData[$month]['outvalue'] += $amount;
            $monthlyData[$month]['uom'] = $uom;
        }

        // Loop through the return results and update the data
        foreach ($result as $val) {
            $date = $val->create_date;
            $month = date('F', strtotime($date)); // Get the full month name

            $r_qty = $val->qty;
            $r_rate = $val->rate;
            $r_value = $val->qty * $val->rate;

            // Update the "return" data for the corresponding month
            $monthlyData[$month]['return_qty'] += $r_qty;
            $monthlyData[$month]['return_rate'] += $r_rate;
            $monthlyData[$month]['return_value'] += $r_value;
        }

        foreach ($resultOpen as $val) {
            $date = $val->create_date;
            $month = date('F', strtotime($date)); // Get the full month name

            $monthlyData[$month]['openvalue'] += $val->opening_val;
            $monthlyData[$month]['openqty'] += $val->opening_qty;
            $monthlyData[$month]['uom'] = $uom;

        }

        $opentotqty = 0;
        $opentotval = 0;
        // Round the values to two decimal places
        foreach ($monthlyData as &$monthData) {
            $monthData['outqty'] = round($monthData['outqty'], 2);
            $monthData['outvalue'] = round($monthData['outvalue'], 2);
            $monthData['openvalue'] = round($monthData['openvalue'], 2);
            $monthData['openqty'] = round($monthData['openqty'], 2);
            $monthData['return_qty'] = round($monthData['return_qty'], 2);
            $monthData['return_value'] = round($monthData['return_value'], 2);
            $monthData['inqty'] = 0;
            $monthData['invalue'] = 0;
            $monthData['closing_qty'] = round(($opentotqty + $monthData['inqty']) - ($monthData['outqty'] - $monthData['return_qty']) , 2);
            $monthData['closing_value'] = round(($opentotval + $monthData['invalue']) - ($monthData['outvalue'] - $monthData['return_value']), 2);
        }

        // Initialize variables to store grand totals

        $grandTotals = [
            'outvalue' => 0,
            'outqty' => 0,
            'openvalue' => 0,
            'openqty' => 0,
            'inqty' => 0,
            'invalue' => 0,
            'return_value' => 0,
            'return_Gqty' => 0,
            'closing_value' => 0,
            'closing_qty' => 0,
            
        ];

        // Loop through $monthlyData to accumulate grand totals
        foreach ($monthlyData as $monthData) {
            $grandTotals['outvalue'] += $monthData['outvalue'];
            $grandTotals['outqty'] += $monthData['outqty'];
            $grandTotals['openvalue'] += $monthData['openvalue'];
            $grandTotals['openqty'] += $monthData['openqty'];
            $grandTotals['invalue'] += $monthData['invalue'];
            $grandTotals['inqty'] += $monthData['inqty'];
            $grandTotals['return_value'] += $monthData['return_value'];
            $grandTotals['return_qty'] += $monthData['return_qty'];
            

        }
            $grandTotals['closing_value'] = ($opentotval + $grandTotals['invalue']) - ($grandTotals['outvalue'] - $grandTotals['return_value']);
            $grandTotals['closing_qty'] = ($opentotqty + $grandTotals['inqty']) - ($grandTotals['outqty'] - $grandTotals['return_qty']);

            $grandTotals['uom'] =   $uom;

        // Round the grand total values
        foreach ($grandTotals as $key => &$value) {
            if ($key !== 'uom') { // Check if the key is not 'uom'
                $value = round($value, 2); // Round up the numeric values to 2 decimal places
            }
        }

        // Add the grand totals to your $monthlyData array
        $monthlyData['grand_totals'] = $grandTotals;

        // Encode the data as JSON and echo it
        echo json_encode($monthlyData);
    }

    public function weighted_average_opening()
    {

                    if(isset($this->session->userdata['logged_in']))
                    {

                            $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');

                            $data['accountstypename']="";
                            if(isset($_GET['accountstype']))
                            {

                                $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                foreach($accounttype as $vl)
                                {
                                    $accountstypename=$vl->name;
                                }
                                $data['accountstypename']=$accountstypename;
                            }

                            $data['active_base']='route';
                            $data['active']='route';
                            $data['title']    = 'Weighted Average';
                            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                            $this->load->view('report/weighted_average_opening.php',$data);


                    }
                    else
                    {

                            redirect('index.php/adminmain');

                    }

    }
    public function weighted_average()
    {

                                        if(isset($this->session->userdata['logged_in']))
                                        {

                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');

                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {

                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }

                                             $data['fromdate']= $_GET['formdate'];
                                             $data['fromto']= $_GET['todate'];
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Weighted Average';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/weighted_average.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




    }

    public function weighted_avg_list() {
        // Fetch product list with necessary columns
        $result = $this->db->query("SELECT id, price, stock, product_name, categories, weight, uom, opening_val, opening_qty, create_by, update_by, optimal_stock, production_stock, min_order_stock FROM product_list WHERE deleteid = '0' ORDER BY TRIM(BOTH ' ' FROM product_name) ASC")->result_array();
    
        $array = [];
        $tot_avg = 0;
    
        foreach ($result as $key => $value) {
            $price = intval($value['price']);
            $stock = intval($value['stock']);
    
            if ($stock != 0) {
                $avg = abs($price * $stock);
                $tot_avg += $avg;
            }
    
            $currentDate = date('Y-m-d');
            $query = $this->db->query("SELECT SUM(a.qty) as total_qty, SUM(a.qty*a.rate) as total_amount FROM order_product_list_process as a LEFT JOIN orders_process as b ON a.order_id=b.id WHERE a.deleteid='0' AND b.deleteid='0' AND a.product_id = ? AND a.create_date BETWEEN '2023-10-01' AND ?", [$value['id'], $currentDate]);
            $resultqty = $query->row_array();
    
            $totqty = intval($resultqty['total_qty']);
            $totamt = intval($resultqty['total_amount']);
    
            $totrate = ($totqty != 0) ? $totamt / $totqty : 0;
    
            // Retrieve user names
            $create_by = $this->Main_model->where_names('admin_users', 'id', $value['create_by']);
            $update_by = $this->Main_model->where_names('admin_users', 'id', $value['update_by']);
    
            // Return Process total
            $query1 = $this->db->query("SELECT COALESCE(SUM(b.qty * b.rate), 0) as total FROM order_sales_return_complaints as a LEFT JOIN sales_return_products as b ON a.id = b.c_id WHERE a.deleteid = '0' AND b.deleteid = '0' AND a.order_base = 5 AND DATE(a.create_date) BETWEEN '2023-10-01' AND ? AND b.product_id = ?", [$currentDate, $value['id']]);
            $result1 = $query1->row();
            $totamt1 = $totamt - $result1->total;
    
            $opening_rate = ($value['opening_qty'] != 0) ? $value['opening_val'] / $value['opening_qty'] : 0;

            
            // $totamt = 0 - $totamt;
    
            $array[] = [
                'no' => $key + 1,
                'id' => $value['id'],
                'product_name' => $value['product_name'],
                'price' => round($totrate, 2),
                'stock' => round($totqty, 2),
                'avg' => $totamt1,
                'categories' => $value['categories'],
                'weight' => $value['weight'],
                'uom' => $value['uom'],
                'opening_val' => $value['opening_val'] ?: '0',
                'opening_qty' => $value['opening_qty'] ?: '0',
                'opening_rate' => $opening_rate,
                'return_val' => $result1->total,
                'optimal_stock' => round($value['optimal_stock'], 2),
                'production_stock' => round($value['production_stock'], 2),
                'min_order_stock' => round($value['min_order_stock'], 2),
                'create_by' => $create_by,
                'update_by' => $update_by,
            ];
        }
    
        // Fetch opening total
        $result_tot = $this->db->query("SELECT SUM(opening_val) as total FROM product_list WHERE deleteid = '0'")->row();

        //Fetching closing total
        // $querytot = $this->db->query("SELECT SUM(a.qty) as total_qty, SUM(a.amount) as total_amount FROM order_product_list_process as a LEFT JOIN orders_process as b ON a.order_id=b.id WHERE a.deleteid='0' AND b.deleteid='0' AND a.create_date BETWEEN '2023-10-01' AND ?", [$currentDate]);
        // $resulttot = $querytot->row_array();
        // $total_amount = intval($resulttot['total_amount']);

        //  // Return Process total
        //  $queryre = $this->db->query("SELECT COALESCE(SUM(b.qty * b.rate), 0) as total FROM order_sales_return_complaints as a LEFT JOIN sales_return_products as b ON a.id = b.c_id WHERE a.deleteid = '0' AND b.deleteid = '0' AND a.order_base = 5 AND DATE(a.create_date) BETWEEN '2023-10-01' AND ? ", [$currentDate]);
        //  $resultre = $queryre->row();
        //  $totamtre = $resultre->total; 
        $formdate = '2023-10-01';
        $todate = $currentDate;
        //sales value
        $query = $this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as credits,SUM(debits) as total_amount FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='116' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0  ORDER BY id DESC");
        
        $resultqty = $query->result();

        //return
        $query1 = $this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as total,SUM(debits) as debits FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='2' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
        $result1 = $query1->result();

        //Commision
        $query_commision = $this->db->query("SELECT SUM(debits) as dtotalvalue FROM all_ledgers WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0 AND account_head_id=154 ORDER BY id DESC")->result();

        // Store the sum of total in $tot_tot
        $total_sum = round($resultqty[0]->total_amount);
        $total_return = round($result1[0]->total);
        $total_comm = round($query_commision[0]->dtotalvalue);
        $total_amount = ($total_sum - $total_return);

        $varray['Gt_closing'] = 0-$total_amount ; //must be negative value
        $varray['Gt_opening'] = $result_tot->total;
        $varray['list'] = $array;
    
        echo json_encode($varray);
    }
     public function trial_balance_full_sales()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {



                                             $this->db->query("DELETE FROM table_customize_new  WHERE user_id='".$this->userid."'");



                                            
                                          $column_enable = [8,9,10];
                                          $column_disable = [1,2,3,4,5,6,7,11,12,13,14];
                                          foreach($column_disable as $Key => $val){
                                              $basedata['user_id'] = $this->userid;
                                              $basedata['label_id'] = $val;
                                              $basedata['status'] = 0;
                                              $this->Main_model->insert_commen($basedata, 'table_customize_new');
                                                 }
                                     
                                          foreach($column_enable as $Key => $val){
                                             $basedata['user_id'] = $this->userid;
                                             $basedata['label_id'] = $val;
                                             $basedata['status'] = 1;
                                             $this->Main_model->insert_commen($basedata, 'table_customize_new');

                                                 }

                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report_log/trial_balance_full_sales_only.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

    public function trial_balance_report_full_sales_only()
    {




                        $formdate='2023-10-01';
                        $formdate=date('Y-m-d',strtotime($formdate."-1 days"));
                        $todate=$_GET['fromto'];
                        $formdate=$_GET['formdate'];
                        //$todate=date('Y-m-d',strtotime($todate."-1 days"));
                 
                    
                        // $resultaset=$this->trial_balance_report1_sub($formdate,$todate);
                
                        // $resulta=json_decode($resultaset);
                   
                      
                
                        // $a=0;
                        // foreach($resulta as $vl)
                        // {
                        //     $a+=$vl->credit;
                        // }
                        
                      
                        
                        // $resultb=$this->trial_balance_report_sub($formdate,$todate);
                        
                        // $resultb=json_decode($resultb);
                            
                            
                        // $b=0;
                        // foreach($resultb as $vl)
                        // {
                        //     $b+=$vl->credit;
                        // }
                           
                         
                      
                        // $total=$a-$b;
                       
                        // $total=abs($total);
                    

                      
                    
                     
                
                  $resulth=$this->db->query("SELECT b.id as account_type_id,b.name as account_type_name  FROM accountheads_sub_group as a JOIN accounttype as b ON a.account_type=b.id WHERE b.deleteid=0 AND b.id IN ('18','11','34','37','1','2')   GROUP BY b.id ORDER BY b.name ASC");
                  $resulth=$resulth->result();
                   
                  $arrayhead=array(); 
                   
                  foreach ($resulth as  $valuevv)
                  {
                     
                     
                     
                  $result=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0  AND account_type='".$valuevv->account_type_id."'  AND id IN ('373','68','142','104','151','372','155','156','160','159','154','119','116','116','2','179') ORDER BY name ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $credits1total=0;
                      $debit1total=0;
                      $debit_status=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104)
                                         {
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=3 ORDER BY id DESC");
                                         //  $result=$this->db->query("SELECT SUM(a.credits - a.debits) as totalsum FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=3 AND b.deleteid=0 ORDER BY a.id DESC");

$result=$this->db->query("SELECT (SUM(a.credits) - SUM(a.debits)) AS totalsum FROM all_ledgers AS a  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0'  AND c.deleteid='0'  AND c.mark_customer_id IN ('1','-1','0')   AND a.payment_date <='".$todate."' AND a.party_type='3' GROUP BY a.customer_id ORDER BY a.payment_date ASC");


                                           $debit_status =1;
                                         
                                         }
                                         elseif($value->id==52){
                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==116){

                                              $formdate2=date('2023-04-01');

      // $result=$this->db->query("SELECT 
      // (SELECT SUM(debits) FROM all_ledgers WHERE `payment_date` BETWEEN '".$todate."' AND '".$todate."' AND deleteid=0 AND account_heads_id_2 = 116 
      // AND order_id > 0) AS difference, (SELECT SUM(credits) - SUM(debits) FROM all_ledgers WHERE `payment_date` < '".$todate."' 
      // AND deleteid = 0 AND account_heads_id_2 = 116 AND order_id > 0) AS totalsum,
      // SUM(credits) as totalcridit, SUM(debits) as totaldebit FROM all_ledgers 
      // WHERE deleteid = 0 AND account_heads_id_2 = 116 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id > 0 ORDER BY id DESC");

                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         

   $result=$this->db->query("SELECT SUM((b.rate+b.commission)*b.qty) as totalsum, SUM((b.rate+b.commission)*b.qty) as totalcridit,SUM((b.rate+b.commission)*b.qty) as totaldebit FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");


                                         }
                                         elseif($value->id==119){

                                              $formdate2=date('2023-04-01');
                                              $result=$this->db->query("SELECT SUM(credits_sub_total-debits) as totalsum, SUM(credits_sub_total) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==68)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND a.payment_date<='".$todate."' AND b.mark_vendor_id IN ('0','1','-1') GROUP BY a.customer_id");


                                                 $debit_status =1;
                                         
                                         }
                                         elseif($value->id==383)
                                         {


                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date<='".$todate."' ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==381)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=5 AND payment_date<='".$todate."' ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==372)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             $debit_status =1;

                                         }
                                         elseif($value->id==382)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date<='".$todate."' ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==373)
                                         {






                                               $resultlocality=$this->db->query("SELECT customer_id FROM commen_ledgers");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->customer_id!=0)
                                                   {
                                                       $array1[]=$vl->customer_id;
                                                       
                                                   }
                                                   
                                                   
                                               }


                                                                               
                                                    // $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                                                    // SUM(a.balance_dr) as totaldebit,
                                                    // SUM(a.balance_cr) as totalcridit,
                                                    // SUM(a.balance_cr-a.balance_dr) as totalsum
                                                    // FROM commen_ledgers as a   WHERE  a.id>0 GROUP BY a.customer_id");


$resultfetch = $array1;
$result=$this->db->query("SELECT a.party_type,a.customer_id,SUM(a.debits) as totaldebit,SUM(a.credits) as totalcridit,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a  WHERE a.deleteid=0 AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.party_type IN ('1','3') AND a.cnn_status=0 AND a.payment_date<='".$todate."'");




                                                    $debit_status =1;
                                         
                                         }
                                         elseif($value->id==179)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND b.CNN='YES'  AND a.payment_date<='".$todate."' GROUP BY a.customer_id ORDER BY aa.name ASC");



                                                 $debit_status =1;
                                         
                                         }
                                        elseif($value->id==175)
                                         {

                                        $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='405' ORDER BY a.id DESC");
                                        }

                                         
                                         elseif($value->id==59)
                                         {
                                          $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='161' ORDER BY a.id DESC");
                                        }
                                         elseif($value->id==159)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date<='".$todate."' AND party_type=2 AND driver_collection_status=1  ORDER BY id DESC");
                                            $debit_status =0;
                                         
                                         }
                                         elseif($value->id==160)
                                         {

// SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' ORDER BY a.idd DESC
                                              $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' AND party_type NOT IN ('4','8','10') AND a.payment_date<='".$todate."' ORDER BY a.id DESC");
                                         
                                         }
                                          elseif($value->id==151)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=5 AND customer_id=220 ORDER BY id DESC");
                                               $debit_status =1;
                                         
                                         }
                                          elseif($value->id==150)
                                         {

                                         $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND party_type=5 AND customer_id=163 ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==106)
                                         {
                                           $result=$this->db->query("SELECT  SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183' ORDER BY a.id DESC");
                                         }
                                          elseif($value->id==152)
                                         {
                                           $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229' ORDER BY a.id DESC");
                                         }
                                           elseif($value->id==164)
                                         {
                                           $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13' ORDER BY a.id DESC");
                                         }
                                        elseif($value->id==155)
                                         {
    
                                      // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id=155 ORDER BY id DESC");
  
//$formdates='2024-03-01';  
$result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND opening_balance_status=0 AND order_trancation_status=2  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
$debit_status =0;


                                         
                                         }
                                         elseif($value->id==129)
                                         {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id=129 group by customer_id ORDER BY payment_date ASC");
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid='0' AND account_head_id=129 GROUP by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date<='".$todate."'  GROUP BY a.customer_id");



                                            $debit_status =1;
                                         
                                         }
                                          elseif($value->id==48)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5') ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==154)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(debits) as totalcridit,SUM(credits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('0') AND account_head_id=48 AND credits>0 ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                          elseif($value->id==2)
                                         {


                                      $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)-credits) as totalsum, SUM(credits) as  totaldebit,SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    $debit_status =1;    

                             // $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(credits) as  totaldebit,SUM(debits) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             //  $debit_status =1;
                                         
                                         }
                                          elseif($value->id==120)
                                         {

                                  $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2='".$value->id."'  AND payment_date<='".$todate."' AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==156)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND customer_id=332 ORDER BY id DESC");

                                                   


                                                  // $debit_status=0;


                                         
                                         }
                                         elseif($value->id ==153){
                                            $result=$this->db->query("SELECT SUM(credits) as credits, SUM(debits) as debits,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");

                                         }
                                          elseif($value->id==141){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.account_head_id='141' ORDER BY a.id DESC");
                                         }
                                         elseif($value->id ==172){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='3' ORDER BY a.id DESC");

                                              $debit_status=1;
                                         }  
                                         elseif($value->id ==170){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<='".$todate."' AND a.party_type=5 AND a.customer_id='180' ORDER BY a.id DESC");

                                        }  
                                        elseif($value->id ==169)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                        elseif($value->id ==130)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                         elseif($value->id==165)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                         elseif($value->id==142)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==126)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10') AND payment_date<='".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                         elseif($value->id==392)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==393)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                        elseif($value->id==394)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==388)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==390)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date<='".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }     
                                        else
                                        {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit, SUM(debits) as totaldebit,account_head_id FROM all_ledgers 
                                            //  WHERE    deleteid=0 AND account_heads_id_2='".$value->id."' ORDER BY payment_date ASC");
                                            

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                               $debit_status =1;
                                             
                                        }
                                         
                                        
                                         // Babu
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 
                                                 
                                            //  if($value->id == 48){
                                               
                                            //     $credits1 += $partys1ss->totalcridit;

                                            //     $debit1 += $partys1ss->totaldebit;

                                            // }

                                            if($debit_status ==1)
                                            {





                                               

                                                if($value->id==373)
                                                {













                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }


                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;










                                                }
                                                elseif($value->id==372)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                elseif($value->id==151)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                else
                                                {


                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }

                                                                    $credits1 += $partys1ss->totalcridit;
                                                                    $debit1 += $partys1ss->totaldebit;


                                                }






                                               


                                            }
                                            else
                                            {


                                            
                                                  if($value->trail_view_status==0)
                                                  {  
                                                     
                                                     if($partys1ss->totaldebit!='')
                                                     {  
                                                          
                                                          if($value->id==116)
                                                          {


                                                                $totalcommssion=0;
                                                                // $resultset=$this->db->query("SELECT SUM(credits) as totalcridit FROM all_ledgers WHERE deleteid=0 AND customer_id='252' AND party_type=5  AND commission_customer>0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                                                // $resultset=$resultset->result();
                                                                // foreach($resultset as $ss)
                                                                // {
                                                                //    $totalcommssion= $ss->totalcridit;
                                                                // }


                                                              $credits1=$partys1ss->totaldebit-$totalcommssion;
                                                          }
                                                          else
                                                          {
                                                               $credits1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                     }
                                                     else
                                                     {
                                                          $credits1=0;
                                                     }
                                                    
                                                     $credits1=abs($credits1);
                                                     $set=1;
                                                     $creditssell=$credits1;
                                                   


                                                  }
                                                  if($value->trail_view_status==1)
                                                  {
                                                      if($partys1ss->totalcridit!='')
                                                      {
                                                          
                                                          if($value->id==119)
                                                          {
                                                              $debit1=$partys1ss->totalcridit;
                                                          }
                                                          else
                                                          {
                                                              $debit1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          $debit1=0;
                                                      } 
                                                      
                                                      $debit1=abs($debit1);
                                                      $creditssell=$debit1;




                                                   
                                                  }
                                                  
                                                }    
                                            


                                                  
                                         

                                                  
                                         }
                                          
                                       

                                    
                                    



                                   $dnone="";
                                    //  $ssurl=base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id;

                                       switch ($value->id) {
                                        case 48:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;

                                            break;
                                        case 156:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=332&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 151:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=220&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 155:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=346&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 175:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=405&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 150:
                          $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=163&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 159:  case 383:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=1&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;  
                                         case 373:
                                            $ssurl=base_url()."index.php/customer/common_ledger?party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;       
                                        case 160:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=0&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;
                                            case 119:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            $debit1=$credits1;
                                            $credits1=0;
                                            break;
                                        // case 172:
                                        //     $debit1=$credits1;
                                        //     $credits1=0;
                                        //     break;
                                        case 68:
                                            //$ssurl=base_url()."index.php/report/customer_balance_comparision?from_date=".$formdate."&to_date=".$todate;

                                         $ssurl=base_url()."index.php/customer/ledger?trail_balance=0&party_type=1&from_date=".$formdate."&to_date=".$todate;


                                            break;
                                         case 179:
                                            $ssurl=base_url()."index.php/customer/ledger?cnn_status=1&party_type=1&from_date=".$formdate."&to_date=".$todate;
                                            break;    
                                        case 154:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 381:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";

                                         break;


                                          case 388:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=580&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                           case 390:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=297&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                         case 380:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate;
                                             $dnone="d-nones";
                                         break;
                                        
                                         case 382:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                         break;   
                                        case 116:  case 120:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                             
                                        case 2: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                        break; 
                                        case 104: 
                                            $ssurl=base_url()."index.php/vendor/ledger?trail_balance=0&from_date=".$formdate."&to_date=".$todate;
                                        break;    
                                        case 124:
                                            $credits1=0;
                                            $result_stock=$this->db->query("SELECT selling_average_price,average_price,stock FROM product_list WHERE deleteid=0 AND stock>0  ORDER BY id DESC");
                                            $result_stock=$result_stock->result();
                                            foreach($result_stock as $stock)
                                            {
                                                $selling_average_price=$stock->selling_average_price;
                                                $average_price=$stock->average_price;
                                                $profile_loss_price=$selling_average_price-$average_price;
                                                $valueprice=abs($profile_loss_price);
                                                //$credits1+=$valueprice*$stock->stock;                                                
                                            }
                                            $ssurl="#";
                                            break;
                                        default:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                            }
                                            
                                            
                                       $credits1total+=$credits1;
                                       $debit1total+=$debit1;
                        



                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=> $ssurl,
                                            'dnone'=> $dnone,
                                            'credit' => $credits1,
                                            'debit' => $debit1,
                                            'set' => $credits1+$debit1
                
                                        );
                            
                            

                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                            
                    
                     $credit=[];
                     $debit=[];
                     $credit_cash=[];
                     $debit_cash=[];



            $result2=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=0 and b.id!=25");
            $result2=$result2->result();
            foreach ($result2 as  $value) {
  $result_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0 AND a.internal_payment_status=0 AND  a.opening_balance_status=0");
                               $resultcheck=$result_balance->result(); 
                             foreach ($resultcheck as  $value1) {

                                // print_r($value1);
                                $total_debit=$value1->total_debit;
                                $total_credit=$value1->total_credit;
                                $total = $total_credit-$total_debit;
                                             

                               
                                                 if($total > 0){
                                                     $credit[] =$total;
                                                 }else{
                                                     $debit[] = abs($total);
                                                 }
                                                
                             }

                            }




 $credit_un=[];
                     $debit_un=[];
                                    $result2_un=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=1 and b.id!=25");
            $result2_un=$result2_un->result();
            foreach ($result2_un as  $value_un) {
  $result_balance_un=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value_un->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                               $result_balance_un=$result_balance_un->result(); 
                             foreach ($result_balance_un as  $value1_un) {

                                // print_r($value1);
                                $total_debit_un=$value1_un->total_debit;
                                $total_credit_un=$value1_un->total_credit;
                                $total_un = $total_credit_un-$total_debit_un;
                                             

                               
                                                 if($total_un > 0){
                                                     $credit_un[] =$total_un;
                                                 }else{
                                                     $debit_un[] = abs($total_un);
                                                 }
                                                
                             }

                            }





                            



                            $result_cash_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id=25  AND a.party_type NOT IN('1','2','3','5') AND a.create_date<='".$todate."' AND a.deleteid=0");
                             $resultcheck_cash=$result_cash_balance->result(); 
                           foreach ($resultcheck_cash as  $value2) {

                              // print_r($value1);
                              $total_debit=$value2->total_debit;
                              $total_credit=$value2->total_credit;
                              $total = $total_credit-$total_debit;
                                           

                             
                                               if($total > 0){
                                                   $credit_cash[] =$total;
                                               }else{
                                                   $debit_cash[] = abs($total);
                                               }
             
                           }










                            $credit_total_bank=0;
                            $dedit_total_bank=0;
                            $credit_total_cash=0;
                            $dedit_total_cash=0;


                             $credit_total_bank_un=0;
                            $dedit_total_bank_un=0;
                           


                            foreach ($credit as $credits) {
                                $credit_total_bank += $credits;
                            }
                            foreach ($debit as $debits) {
                                $dedit_total_bank += $debits;
                            }


                            foreach ($credit_un as $credits_un) {
                                $credit_total_bank_un += $credits_un;
                            }
                            foreach ($debit_un as $debits_un) {
                                $dedit_total_bank_un += $debits_un;
                            }

                            foreach ($credit_cash as $credits) {
                                $credit_total_cash = $credits;
                            }
                            foreach ($debit_cash as $debits) {
                                $dedit_total_cash = $debits;
                            }
                            
                           
                    //  $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");

                     
                     $resultbank=$this->db->query("SELECT a.*,SUM(b.credit) as totalcridit,SUM(b.debit) as totaldebit,SUM(b.credit-b.debit) as total FROM bankaccount as a JOIN  bankaccount_manage  as b ON a.id=b.bank_account_id WHERE a.deleteid=0  AND b.deleteid=0 AND b.party_type NOT IN('1','2','3','5') AND   b.create_date<='".$todate."'  GROUP BY a.account_type ORDER BY a.bank_name ASC");
                     $resultbank=$resultbank->result();
                     
                     
                     $credits1totalbank=0;
                     $debit1totalbank=0;
                     $bankcash_credit=0;
                     $bankcash_debit=0;

                     foreach ($resultbank as  $valueb) 
                     {
                         
                         
                            
                            
                                         $setbank=0;
                                         $debitbank1=0;
                                         $creditsbank1=0;
                                       
                                             
                                             
                                                      $balancebank=$valueb->total;
                                                 
                                                    $debitbank1 = $dedit_total_bank;
                                                    $creditsbank1 = $credit_total_bank;  
                                                    $credits1totalbank_un =$credit_total_bank_un;
                                                    $debit1totalbank_un =$dedit_total_bank_un; 

                                                

                                                        


                                                      $balancebank=abs($balancebank);
                    
                    
                                                      
                                                     
                                                      
                                                      
                                                      $setbank=1;
                                                
                                         
                             
                                       
                                       
                                      
                                      
                                       if($valueb->id!=25)
                                       {


                                       $credits1totalbank =$credit_total_bank;
                                       $debit1totalbank =$dedit_total_bank; 

                                       } 




                                       if($valueb->id==25)
                                       {


                                       $bankcash_credit =$credit_total_cash;
                                       $bankcash_debit =$dedit_total_cash; 

                                       }   
                                     
                                        

                                   
                                       
                                        if($valuevv->account_type_id==18 && $valueb->account_type == 1){

                                            $array1[] = array(
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "CASH IN HAND", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_cash,
                                                'debit' => $dedit_total_cash,
                                                'set' => $credit_total_cash+$dedit_total_cash
                    
                                            );

                                        }

                                       if($valuevv->account_type_id==18 && $valueb->account_type == 0){
                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "BANK IN ACCOUNT", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=0&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank,
                                                'debit' => $dedit_total_bank,
                                                'set' => $credit_total_bank+$dedit_total_bank,
                    
                                            );


                                        }


                                         if($valuevv->account_type_id==32 && $valueb->account_type == 0){

                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "UNSECURED LOAN", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank_un,
                                                'debit' => $dedit_total_bank_un,
                                                'set' => $credit_total_bank_un+$dedit_total_bank_un,
                    
                                            );


                                        }


                                    
                                    
                                        

                                   
                         
                        
                       


                        $i++;

                     }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    //  $array1 =[];
                     $arrayval=array_merge($array,$array1);

                    // echo "<pre>";print_r($arrayval);
                    // exit;
                     
                     
                      $totalset=$credits1total+$debit1total;
                      //$totalsetbank=$credits1totalbank+$debit1totalbank;
                     
                     if($valuevv->account_type_id==18)
                     {
                        
                        
                         $debit1total = $debit1total + $debitbank1 + $bankcash_debit;
                         $credits1total =$credits1total + $creditsbank1 + $bankcash_credit;

                     }


                     if($valuevv->account_type_id==32)
                     {
           
                        
                         $debit1total = $debit1total + $debit1totalbank_un;
                         $credits1total =$credits1total + $credits1totalbank_un;
                         $totalset=$debit1total+$credits1total;

                     }
                    //  elseif($valuevv->account_type_id==27)
                    //  {
                    //       $totalsetbank=$creditsbank1+$bankcash_debit;

                    
                         
                    //      $arrayhead[]=array(
                           
                    //      'id'=>$valuevv->account_type_id,
                    //      'account_type_name'=>$valuevv->account_type_name,
                    //      'debit'=>round($bankcash_debit+$debit1total,2),
                    //      'credit'=>round($bankcash_credit+$credits1total,2),
                    //      'set'=>round($totalsetbank+$totalset,2),
                    //      'sub'=>$arrayval
                         
                         
                    //      );
                         
                    //  }
                    //  else
                    //  {
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>$debit1total,
                         'credit'=>$credits1total,
                         'set'=>$totalset,
                         'sub'=>$arrayval
                         
                         
                         );
                    //  }
                     
                       
                     
                     
                     
                     
                  }
                    
                    
               
                     
                     
                    
                  echo json_encode($arrayhead);
 
                     

    }





  public function fetch_data_accounts_log_report_discount()
    {






                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $type=$_GET['type'];
                   
                     
                  
                    $userslog="";


                 
                   $sqls=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   $sqlb=" AND create_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid IN ('0')";
                   if(isset($_GET['delete']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1') AND process_by!='Party Change Deleted'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('1')";

                   }


                   if(isset($_GET['edit']))
                   {

                    $todate=date('Y-m-d', strtotime('+1 day', strtotime($todate)));
                    $sqls=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND payment_date!='".$formdate."'";
                    $sqlb=" AND update_date BETWEEN '".$formdate."' AND '".$todate."' AND deleteid  IN ('0') AND create_date!='".$formdate."'";

                   }
              


  
            $sqls.=" AND process_by NOT IN ('Manual Journals','Party Transfer')";
 


   


  $resultss=$this->db->query("SELECT * FROM all_ledgers WHERE  id>0 AND customer_id IN ('220')  $sqls GROUP BY deletemod ORDER BY order_no,id ASC ");
$resultss=$resultss->result();


   $mainarray=array();

foreach ($resultss as  $ddf)
{


                     $i=1;
                     $array=array();
                     $totalcredits=0;
                     $totaldebit=0;


                       // $bank=$this->db->query("SELECT * FROM bankaccount_manage WHERE party_type IN ('4')  AND deletemod='".$ddf->deletemod."' AND deleteid='0' ORDER BY id DESC ");
                       // $bank=$bank->result();
                       // foreach ($bank as  $bankss) 
                       // {


                       //                               $bankaccount='';
                       //                                $querys = $this->db->query("SELECT bank_name as name FROM `bankaccount`  WHERE id='".$bankss->bank_account_id."'");
                       //                                $bankaccounts=$querys->result();
                       //                                foreach ($bankaccounts as  $bank) 
                       //                                {

                       //                                      $bankaccount=$bank->name;

                       //                                }


                       //                                 $array[] = array(

                       //                                      'deletemod' => $bankss->deletemod.'-'.$bankss->id,
                       //                                      'party_name' => $bankaccount,
                       //                                      'order_no' => $bankss->name,
                       //                                      'reference_no' => $bankss->ex_code,
                       //                                      'created_by' => $created_by_bank,
                       //                                      'edited_by' => $edited_by_bank,
                       //                                      'deleted_by' => $deleted_by_bank,
                       //                                      'credits' => $bankss->debit,
                       //                                      'debits' => $bankss->credit,
                       //                                      'payment_mode' => $bankaccount,
                       //                                      'SS' => $ss,
                       //                                      'notes' => $bankss->status_by,
                       //                                      'create_date' =>date('d-m-Y',strtotime($bankss->create_date)),
                       //                                      'status' => $status_bank

                       //                                  );

                       // }



        $result=$this->db->query("SELECT * FROM all_ledgers WHERE  deletemod='".$ddf->deletemod."' AND deleteid=0 ORDER BY order_no,id DESC ");
                          

                     $result=$result->result();





                    
                    

                     foreach ($result as  $value)
                     {

                          




                             $status="";
                             if($value->deleteid=='1')
                             {
                                  $status='Deleted';
                             }


                             if($value->party_type==1)
                            {

                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");

                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");

                            }

                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';

                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }

                             if($value->party_type==4)
                            {
                                        $table='bankaccount';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,bank_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");


                            }


                             $party_name="";
                             $res=$query->result();


                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }

                           


                            





 
                       

                         
                              $created_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $created_by=$values_set->name;

                              }



                              $deleted_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->deleted_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $deleted_by=$values_set->name;

                              }


                              $edited_by='';
                              $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->edited_by."'");
                              $resultsales_team=$query->result();
                              foreach ($resultsales_team as  $values_set) 
                              {

                                    $edited_by=$values_set->name;

                              }

                                if($value->debits=='')
                                {
                                    $value->debits=0;
                                }
                                if($value->credits=='')
                                {
                                    $value->credits=0;
                                }








                         




















  

                     $os=array(1,2,3,5);
                     if(in_array($value->party_type, $os))
                     {




                            $array[] = array(


                                
                                'deletemod' => $value->deletemod,
                                'party_name' => $party_name,
                                'order_no' => $value->order_no,
                                'reference_no' => $value->reference_no,
                                'created_by' => $created_by,
                                'edited_by' => $edited_by,
                                'deleted_by' => $deleted_by,
                                'credits' => round($value->credits),
                                'debits' => $value->debits,
                                'SS'=>1,
                                'payment_mode' => $value->payment_mode_payoff,
                                'notes' => $value->process_by.' | '.$value->reference_no,
                                'create_date' =>date('d-m-Y',strtotime($value->payment_date)),
                                'status' => $status


                            );


                          



                       }     
                            $i++;






                     }
                             


                              for ($i=0; $i<count($array) ; $i++)
                              {

                                $totalcredits+=$array[$i]['credits'];
                                $totaldebit+=$array[$i]['debits'];
                                
                              }

                                         $sstcolor='ssttts';
                              if(round($totalcredits)!=round($totaldebit))
                              {
                                  $sstcolor='bgcolor';
                              }



                             $mainarray[] = array(


                                
                                
                                
                                'sstcolor' => $sstcolor,
                                'order_no' => $ddf->order_no,
                                'creditstot' => round($totalcredits),
                                'debitstot' => round($totaldebit),
                                'create_date' =>date('d-m-Y',strtotime($ddf->payment_date)),
                                'subarray'=>$array
                                


                            );



}


 


//echo "<pre>";print_r($mainarray);
//exit;



                   

                    echo json_encode($mainarray);

}

     public function trial_balance_report_full_beta_test()
    {




                        $formdate='2023-10-01';
                        $formdate=date('Y-m-d',strtotime($formdate."-1 days"));
                        $todate=$_GET['fromto'];
                        $formdate=$_GET['formdate'];
                        //$todate=date('Y-m-d',strtotime($todate."-1 days"));
                 
                    
                        // $resultaset=$this->trial_balance_report1_sub($formdate,$todate);
                
                        // $resulta=json_decode($resultaset);
                   
                      
                
                        // $a=0;
                        // foreach($resulta as $vl)
                        // {
                        //     $a+=$vl->credit;
                        // }
                        
                      
                        
                        // $resultb=$this->trial_balance_report_sub($formdate,$todate);
                        
                        // $resultb=json_decode($resultb);
                            
                            
                        // $b=0;
                        // foreach($resultb as $vl)
                        // {
                        //     $b+=$vl->credit;
                        // }
                           
                         
                      
                        // $total=$a-$b;
                       
                        // $total=abs($total);
                    

                      
                    
                     
                
                  $resulth=$this->db->query("SELECT b.id as account_type_id,b.name as account_type_name  FROM accountheads_sub_group as a JOIN accounttype as b ON a.account_type=b.id WHERE b.deleteid=0   GROUP BY b.id ORDER BY b.name ASC");
                  $resulth=$resulth->result();
                   
                  $arrayhead=array(); 
                   
                  foreach ($resulth as  $valuevv)
                  {
                     
                     
                     
                  $result=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0  AND account_type='".$valuevv->account_type_id."'   ORDER BY name ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $credits1total=0;
                      $debit1total=0;
                      $debit_status=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104)
                                         {
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=3 ORDER BY id DESC");
                                         //  $result=$this->db->query("SELECT SUM(a.credits - a.debits) as totalsum FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=3 AND b.deleteid=0 ORDER BY a.id DESC");

$result=$this->db->query("SELECT (SUM(a.credits) - SUM(a.debits)) AS totalsum FROM all_ledgers AS a  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0'  AND c.deleteid='0'  AND c.mark_customer_id IN ('1','-1','0')   AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type='3' GROUP BY a.customer_id ORDER BY a.payment_date ASC");


                                           $debit_status =1;
                                         
                                         }
                                         elseif($value->id==52){
                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==116){

                                              $formdate2=date('2023-04-01');

      // $result=$this->db->query("SELECT 
      // (SELECT SUM(debits) FROM all_ledgers WHERE `payment_date` BETWEEN '".$todate."' AND '".$todate."' AND deleteid=0 AND account_heads_id_2 = 116 
      // AND order_id > 0) AS difference, (SELECT SUM(credits) - SUM(debits) FROM all_ledgers WHERE `payment_date` < '".$todate."' 
      // AND deleteid = 0 AND account_heads_id_2 = 116 AND order_id > 0) AS totalsum,
      // SUM(credits) as totalcridit, SUM(debits) as totaldebit FROM all_ledgers 
      // WHERE deleteid = 0 AND account_heads_id_2 = 116 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id > 0 ORDER BY id DESC");

                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");
                                         

   $result=$this->db->query("SELECT SUM((b.rate+b.commission)*b.qty) as totalsum, SUM((b.rate+b.commission)*b.qty) as totalcridit,SUM((b.rate+b.commission)*b.qty) as totaldebit FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");


                                         }
                                         elseif($value->id==119){

                                              $formdate2=date('2023-04-01');
                                              $result=$this->db->query("SELECT SUM(credits_sub_total-debits) as totalsum, SUM(credits_sub_total) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND order_id>0 AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==68)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND b.mark_vendor_id IN ('0','1','-1') GROUP BY a.customer_id");


                                                 $debit_status =1;
                                         
                                         }
                                         elseif($value->id==383)
                                         {


                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==381)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==372)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             $debit_status =1;

                                         }
                                         elseif($value->id==382)
                                         {


                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             $debit_status =0;

                                         }
                                         elseif($value->id==373)
                                         {






                                               $resultlocality=$this->db->query("SELECT customer_id FROM commen_ledgers");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->customer_id!=0)
                                                   {
                                                       $array1[]=$vl->customer_id;
                                                       
                                                   }
                                                   
                                                   
                                               }


                                                                               
                                                    // $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                                                    // SUM(a.balance_dr) as totaldebit,
                                                    // SUM(a.balance_cr) as totalcridit,
                                                    // SUM(a.balance_cr-a.balance_dr) as totalsum
                                                    // FROM commen_ledgers as a   WHERE  a.id>0 GROUP BY a.customer_id");


$resultfetch = $array1;
$result=$this->db->query("SELECT a.party_type,a.customer_id,SUM(a.debits) as totaldebit,SUM(a.credits) as totalcridit,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a  WHERE a.deleteid=0 AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.party_type IN ('1','3') AND a.cnn_status=0 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'");




                                                    $debit_status =1;
                                         
                                         }
                                         elseif($value->id==179)
                                         {

                                                 //$result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid=0 AND party_type=1 group by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND b.CNN='YES'  AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' GROUP BY a.customer_id ORDER BY aa.name ASC");



                                                 $debit_status =1;
                                         
                                         }
                                        elseif($value->id==175)
                                         {

                                        $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='405' ORDER BY a.id DESC");
                                        }

                                         
                                         elseif($value->id==59)
                                         {
                                          $result=$this->db->query("SELECT *, SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='161' ORDER BY a.id DESC");
                                        }
                                         elseif($value->id==159)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=2 AND driver_collection_status=1  ORDER BY id DESC");
                                            $debit_status =0;
                                         
                                         }
                                         elseif($value->id==160)
                                         {

// SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' ORDER BY a.idd DESC
                                              $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a WHERE a.deleteid='0' AND a.party_type=2 AND a.driver_collection_status='0' AND party_type NOT IN ('4','8','10') AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");
                                         
                                         }
                                          elseif($value->id==151)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=5 AND customer_id=220 ORDER BY id DESC");
                                               $debit_status =1;
                                         
                                         }
                                          elseif($value->id==150)
                                         {

                                         $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type=5 AND customer_id=163 ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==106)
                                         {
                                           $result=$this->db->query("SELECT  SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183' ORDER BY a.id DESC");
                                         }
                                          elseif($value->id==152)
                                         {
                                           $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229' ORDER BY a.id DESC");
                                         }
                                           elseif($value->id==164)
                                         {
                                           $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13' ORDER BY a.id DESC");
                                         }
                                        elseif($value->id==155)
                                         {
    
                                      // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id=155 ORDER BY id DESC");
  
//$formdates='2024-03-01';  
$result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND opening_balance_status=0 AND order_trancation_status=2  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
$debit_status =0;


                                         
                                         }
                                         elseif($value->id==129)
                                         {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id=129 group by customer_id ORDER BY payment_date ASC");
                                             // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum FROM all_ledgers WHERE deleteid='0' AND account_head_id=129 GROUP by customer_id ORDER BY payment_date ASC");


$result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  GROUP BY a.customer_id");



                                            $debit_status =1;
                                         
                                         }
                                          elseif($value->id==48)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5') ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==154)
                                         {

                                              $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(debits) as totalcridit,SUM(credits) as totaldebit FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND party_type=5 AND customer_id IN ('252') AND comission_transfered IN ('0') AND account_head_id=48 AND credits>0 ORDER BY id DESC");
                                         
                                           // $debit_status =1;
                                         }
                                         elseif($value->id==391)
                                        {

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==2)
                                        {


                                    //   $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)-credits) as totalsum, SUM(credits) as  totaldebit,SUM((CASE WHEN payment_date > '2024-05-31' THEN debits / 1.18 ELSE debits END)) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    // $debit_status =1;  


                                      $result=$this->db->query("SELECT SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)-debits) as totalsum, SUM(debits) as  totalcridit,SUM((CASE WHEN payment_date > '2024-05-31' THEN credits / 1.18 ELSE credits END)) as  totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                    $debit_status =1;    

                             // $result=$this->db->query("SELECT SUM(debits-credits) as totalsum, SUM(credits) as  totaldebit,SUM(debits) as totalcridit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                             //  $debit_status =1;
                                         
                                         }
                                          elseif($value->id==120)
                                         {

                                  $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2='".$value->id."'  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND party_type NOT IN ('4','8','10') ORDER BY id DESC");
                                         
                                         }
                                          elseif($value->id==156)
                                         {

                                              $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND customer_id=332 ORDER BY id DESC");

                                                   


                                                  // $debit_status=0;


                                         
                                         }
                                         elseif($value->id ==153){
                                            $result=$this->db->query("SELECT SUM(credits) as credits, SUM(debits) as debits,SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY a.id DESC");

                                         }
                                          elseif($value->id==141){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.account_head_id='141' ORDER BY a.id DESC");
                                         }
                                         elseif($value->id ==172){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='3' ORDER BY a.id DESC");

                                              $debit_status=1;
                                         }  
                                         elseif($value->id ==170){
                                            $result=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.party_type=5 AND a.customer_id='180' ORDER BY a.id DESC");

                                        }  
                                        elseif($value->id ==169)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10') AND payment_date BETWEEN '".$formdate."' AND '".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                        elseif($value->id ==130)
                                        {
                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10') AND payment_date BETWEEN '".$formdate."' AND '".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                        } 
                                         elseif($value->id==165)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10') AND payment_date BETWEEN '".$formdate."' AND '".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                         elseif($value->id==142)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10') AND payment_date
                                                BETWEEN '".$formdate."' AND '".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==126)
                                        {

                                            $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10') AND payment_date BETWEEN '".$formdate."' AND '".$todate."' group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                         elseif($value->id==392)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==393)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }
                                        elseif($value->id==394)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }  
                                        elseif($value->id==388)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==390)
                                        {

                                             $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                             $debit_status =1;
                                             
                                        }     
                                        else
                                        {
                                            // $result=$this->db->query("SELECT SUM(credits-debits) as totalsum,SUM(credits) as totalcridit, SUM(debits) as totaldebit,account_head_id FROM all_ledgers 
                                            //  WHERE    deleteid=0 AND account_heads_id_2='".$value->id."' ORDER BY payment_date ASC");
                                            

                                        $result=$this->db->query("SELECT SUM(credits-debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10') group by customer_id ORDER BY id DESC");
                                               $debit_status =1;
                                             
                                        }
                                         
                                        
                                         // Babu
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 
                                                 
                                            //  if($value->id == 48){
                                               
                                            //     $credits1 += $partys1ss->totalcridit;

                                            //     $debit1 += $partys1ss->totaldebit;

                                            // }

                                            if($debit_status ==1)
                                            {





                                               

                                                if($value->id==373)
                                                {













                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }


                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;










                                                }
                                                elseif($value->id==372)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                elseif($value->id==154)
                                                {


                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;

                                                                        $credits1 += $partys1ss->totalcridit;
                                                                        $debit1 += $partys1ss->totaldebit;


                                                }
                                                elseif($value->id==2)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;
                                                                      


                                                }
                                                elseif($value->id==151)
                                                {




                                                                      $credits1 += $partys1ss->totalcridit;
                                                                      $debit1 += $partys1ss->totaldebit;


                                                }
                                                else
                                                {


                                                                     if($partys1ss->totalsum>0)
                                                                    {
                                                                        $partys1ss->totalcridit=$partys1ss->totalsum;
                                                                        $partys1ss->totaldebit=0;
                                                                    }
                                                                    else
                                                                    {
                                    
                                    
                                                                        $partys1ss->totaldebit=abs($partys1ss->totalsum);
                                                                        $partys1ss->totalcridit=0;
                                    
                                                                    }

                                                                    $credits1 += $partys1ss->totalcridit;
                                                                    $debit1 += $partys1ss->totaldebit;


                                                }






                                               


                                            }
                                            else
                                            {


                                            
                                                  if($value->trail_view_status==0)
                                                  {  
                                                     
                                                     if($partys1ss->totaldebit!='')
                                                     {  
                                                          
                                                          if($value->id==116)
                                                          {


                                                                $totalcommssion=0;
                                                                // $resultset=$this->db->query("SELECT SUM(credits) as totalcridit FROM all_ledgers WHERE deleteid=0 AND customer_id='252' AND party_type=5  AND commission_customer>0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                                                // $resultset=$resultset->result();
                                                                // foreach($resultset as $ss)
                                                                // {
                                                                //    $totalcommssion= $ss->totalcridit;
                                                                // }


                                                              $credits1=$partys1ss->totaldebit-$totalcommssion;
                                                          }
                                                          else
                                                          {
                                                               $credits1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                     }
                                                     else
                                                     {
                                                          $credits1=0;
                                                     }
                                                    
                                                     $credits1=abs($credits1);
                                                     $set=1;
                                                     $creditssell=$credits1;
                                                   


                                                  }
                                                  if($value->trail_view_status==1)
                                                  {
                                                      if($partys1ss->totalcridit!='')
                                                      {
                                                          
                                                          if($value->id==119)
                                                          {
                                                              $debit1=$partys1ss->totalcridit;
                                                          }
                                                          else
                                                          {
                                                              $debit1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          $debit1=0;
                                                      } 
                                                      
                                                      $debit1=abs($debit1);
                                                      $creditssell=$debit1;




                                                   
                                                  }
                                                  
                                                }    
                                            


                                                  
                                         

                                                  
                                         }
                                          
                                       

                                    
                                    



                                   $dnone="";
                                    //  $ssurl=base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id;

                                       switch ($value->id) {
                                        case 48:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;

                                            break;
                                        case 156:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=332&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 151:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=220&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 155:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=346&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 175:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=405&party_type=5&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 150:
                          $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=163&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 159:  case 383:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=1&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;  
                                         case 373:
                                            $ssurl=base_url()."index.php/customer/common_ledger?party_type=0&from_date=".$formdate."&to_date=".$todate;
                                            break;       
                                        case 160:
                                            $ssurl=base_url()."index.php/driver/ledger?driver_collection_status=0&party_type=2&from_date=".$formdate."&to_date=".$todate;;
                                            break;
                                            case 119:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            $debit1=$credits1;
                                            $credits1=0;
                                            break;
                                        // case 172:
                                        //     $debit1=$credits1;
                                        //     $credits1=0;
                                        //     break;
                                        case 68:
                                            //$ssurl=base_url()."index.php/report/customer_balance_comparision?from_date=".$formdate."&to_date=".$todate;

                                         $ssurl=base_url()."index.php/customer/ledger?trail_balance=0&party_type=1&from_date=".$formdate."&to_date=".$todate;


                                            break;
                                         case 179:
                                            $ssurl=base_url()."index.php/customer/ledger?cnn_status=1&party_type=1&from_date=".$formdate."&to_date=".$todate;
                                            break;    
                                        case 154:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                        case 381:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";

                                         break;


                                          case 388:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=580&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                           case 390:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=297&party_type=0&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                             
                                         break;
                                         case 380:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate;
                                             $dnone="d-nones";
                                         break;
                                        
                                         case 382:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                             $dnone="d-nones";
                                         break;   
                                        case 116:  case 120:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                             
                                        case 2: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&from_date=".$formdate."&to_date=".$todate;
                                        break; 
                                        case 104: 
                                            $ssurl=base_url()."index.php/vendor/ledger?trail_balance=0&from_date=".$formdate."&to_date=".$todate;
                                        break;    
                                        case 124:
                                            $credits1=0;
                                            $result_stock=$this->db->query("SELECT selling_average_price,average_price,stock FROM product_list WHERE deleteid=0 AND stock>0  ORDER BY id DESC");
                                            $result_stock=$result_stock->result();
                                            foreach($result_stock as $stock)
                                            {
                                                $selling_average_price=$stock->selling_average_price;
                                                $average_price=$stock->average_price;
                                                $profile_loss_price=$selling_average_price-$average_price;
                                                $valueprice=abs($profile_loss_price);
                                                //$credits1+=$valueprice*$stock->stock;                                                
                                            }
                                            $ssurl="#";
                                            break;
                                        default:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate."&to_date=".$todate;
                                            break;
                                            }
                                            
                                            
                                       $credits1total+=$credits1;
                                       $debit1total+=$debit1;
                        



                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=> $ssurl,
                                            'dnone'=> $dnone,
                                            'credit' => $credits1,
                                            'debit' => $debit1,
                                            'set' => $credits1+$debit1
                
                                        );
                            
                            

                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                            
                    
                     $credit=[];
                     $debit=[];
                     $credit_cash=[];
                     $debit_cash=[];



            $result2=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=0 and b.id!=25");
            $result2=$result2->result();
            foreach ($result2 as  $value) {
  $result_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0");
                               $resultcheck=$result_balance->result(); 
                             foreach ($resultcheck as  $value1) {

                                // print_r($value1);
                                $total_debit=$value1->total_debit;
                                $total_credit=$value1->total_credit;
                                $total = $total_credit-$total_debit;
                                             

                               
                                                 if($total > 0){
                                                     $credit[] =$total;
                                                 }else{
                                                     $debit[] = abs($total);
                                                 }
                                                
                             }

                            }




 $credit_un=[];
                     $debit_un=[];
                                    $result2_un=$this->db->query("SELECT b.bank_name,b.id,b.account_type FROM  bankaccount as b WHERE b.deleteid=0 AND b.trail_blance_spilt=1 and b.id!=25");
            $result2_un=$result2_un->result();
            foreach ($result2_un as  $value_un) {
  $result_balance_un=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value_un->id."'  AND a.party_type NOT IN('1','2','3','5') AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0");
                               $result_balance_un=$result_balance_un->result(); 
                             foreach ($result_balance_un as  $value1_un) {

                                // print_r($value1);
                                $total_debit_un=$value1_un->total_debit;
                                $total_credit_un=$value1_un->total_credit;
                                $total_un = $total_credit_un-$total_debit_un;
                                             

                               
                                                 if($total_un > 0){
                                                     $credit_un[] =$total_un;
                                                 }else{
                                                     $debit_un[] = abs($total_un);
                                                 }
                                                
                             }

                            }





                            



                            $result_cash_balance=$this->db->query("SELECT a.bank_account_id,SUM(a.credit) as total_debit,SUM(a.debit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id=25  AND a.party_type NOT IN('1','2','3','5') AND a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0");
                             $resultcheck_cash=$result_cash_balance->result(); 
                           foreach ($resultcheck_cash as  $value2) {

                              // print_r($value1);
                              $total_debit=$value2->total_debit;
                              $total_credit=$value2->total_credit;
                              $total = $total_credit-$total_debit;
                                           

                             
                                               if($total > 0){
                                                   $credit_cash[] =$total;
                                               }else{
                                                   $debit_cash[] = abs($total);
                                               }
             
                           }










                            $credit_total_bank=0;
                            $dedit_total_bank=0;
                            $credit_total_cash=0;
                            $dedit_total_cash=0;


                             $credit_total_bank_un=0;
                            $dedit_total_bank_un=0;
                           


                            foreach ($credit as $credits) {
                                $credit_total_bank += $credits;
                            }
                            foreach ($debit as $debits) {
                                $dedit_total_bank += $debits;
                            }


                            foreach ($credit_un as $credits_un) {
                                $credit_total_bank_un += $credits_un;
                            }
                            foreach ($debit_un as $debits_un) {
                                $dedit_total_bank_un += $debits_un;
                            }

                            foreach ($credit_cash as $credits) {
                                $credit_total_cash = $credits;
                            }
                            foreach ($debit_cash as $debits) {
                                $dedit_total_cash = $debits;
                            }
                            
                           
                    //  $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");

                     
                     $resultbank=$this->db->query("SELECT a.*,SUM(b.credit) as totalcridit,SUM(b.debit) as totaldebit,SUM(b.credit-b.debit) as total FROM bankaccount as a JOIN  bankaccount_manage  as b ON a.id=b.bank_account_id WHERE a.deleteid=0  AND b.deleteid=0 AND b.party_type NOT IN('1','2','3','5') AND   b.create_date BETWEEN '".$formdate."' AND '".$todate."'  GROUP BY a.account_type ORDER BY a.bank_name ASC");
                     $resultbank=$resultbank->result();
                     
                     
                     $credits1totalbank=0;
                     $debit1totalbank=0;
                     $bankcash_credit=0;
                     $bankcash_debit=0;

                     foreach ($resultbank as  $valueb) 
                     {
                         
                         
                            
                            
                                         $setbank=0;
                                         $debitbank1=0;
                                         $creditsbank1=0;
                                       
                                             
                                             
                                                      $balancebank=$valueb->total;
                                                 
                                                    $debitbank1 = $dedit_total_bank;
                                                    $creditsbank1 = $credit_total_bank;  
                                                    $credits1totalbank_un =$credit_total_bank_un;
                                                    $debit1totalbank_un =$dedit_total_bank_un; 

                                                

                                                        


                                                      $balancebank=abs($balancebank);
                    
                    
                                                      
                                                     
                                                      
                                                      
                                                      $setbank=1;
                                                
                                         
                             
                                       
                                       
                                      
                                      
                                       if($valueb->id!=25)
                                       {


                                       $credits1totalbank =$credit_total_bank;
                                       $debit1totalbank =$dedit_total_bank; 

                                       } 




                                       if($valueb->id==25)
                                       {


                                       $bankcash_credit =$credit_total_cash;
                                       $bankcash_debit =$dedit_total_cash; 

                                       }   
                                     
                                        

                                   
                                       
                                        if($valuevv->account_type_id==18 && $valueb->account_type == 1){

                                            $array1[] = array(
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "CASH IN HAND", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_cash,
                                                'debit' => $dedit_total_cash,
                                                'set' => $credit_total_cash+$dedit_total_cash
                    
                                            );

                                        }

                                       if($valuevv->account_type_id==18 && $valueb->account_type == 0){
                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "BANK IN ACCOUNT", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=0&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank,
                                                'debit' => $dedit_total_bank,
                                                'set' => $credit_total_bank+$dedit_total_bank,
                    
                                            );


                                        }


                                         if($valuevv->account_type_id==32 && $valueb->account_type == 0){

                                            $array1[] = array(
                                            
                                                'no' => $i, 
                                                'id' => $valueb->id, 
                                                'account_type' => $valuevv->account_type_id,
                                                'name' => "UNSECURED LOAN", 
                                                'trail_view_status' => $trail_view_status,
                                                'url'=>base_url().'index.php/report/accountsreport?cash_in_hand=0&trail_blance_spilt=1&from_date='.$formdate.'&to_date='.$todate,
                                                'credit' => $credit_total_bank_un,
                                                'debit' => $dedit_total_bank_un,
                                                'set' => $credit_total_bank_un+$dedit_total_bank_un,
                    
                                            );


                                        }


                                    
                                    
                                        

                                   
                         
                        
                       


                        $i++;

                     }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    //  $array1 =[];
                     $arrayval=array_merge($array,$array1);

                    // echo "<pre>";print_r($arrayval);
                    // exit;
                     
                     
                      $totalset=$credits1total+$debit1total;
                      //$totalsetbank=$credits1totalbank+$debit1totalbank;
                     
                     if($valuevv->account_type_id==18)
                     {
                        
                        
                         $debit1total = $debit1total + $debitbank1 + $bankcash_debit;
                         $credits1total =$credits1total + $creditsbank1 + $bankcash_credit;

                     }


                     if($valuevv->account_type_id==32)
                     {
           
                        
                         $debit1total = $debit1total + $debit1totalbank_un;
                         $credits1total =$credits1total + $credits1totalbank_un;
                         $totalset=$debit1total+$credits1total;

                     }
                    //  elseif($valuevv->account_type_id==27)
                    //  {
                    //       $totalsetbank=$creditsbank1+$bankcash_debit;

                    
                         
                    //      $arrayhead[]=array(
                           
                    //      'id'=>$valuevv->account_type_id,
                    //      'account_type_name'=>$valuevv->account_type_name,
                    //      'debit'=>round($bankcash_debit+$debit1total,2),
                    //      'credit'=>round($bankcash_credit+$credits1total,2),
                    //      'set'=>round($totalsetbank+$totalset,2),
                    //      'sub'=>$arrayval
                         
                         
                    //      );
                         
                    //  }
                    //  else
                    //  {
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>$debit1total,
                         'credit'=>$credits1total,
                         'set'=>$totalset,
                         'sub'=>$arrayval
                         
                         
                         );
                    //  }
                     
                       
                     
                     
                     
                     
                  }
                    
                    
               
                     
                     
                    
                  echo json_encode($arrayhead);
 
                     

    }
    



    

}