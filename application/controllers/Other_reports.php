<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Other_reports extends CI_Controller
{

    function __construct()
    {
        error_reporting(0);
        parent::__construct();
        $this->load->model('Admin/Auth');
        $this->load->model('Main_model');
        $this->load->database();
        if (isset($this->session->userdata['logged_in'])) {
            $Totaltranspotval = $closeing;


            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $from_date = $sess_array['from_date'];
            $to_date = $sess_array['to_date'];
            $this->from_date = $from_date;
            $this->to_date = $to_date;
            $this->userid = $userid;
            $this->user_mail = $email;
        }
    }
     


    public function trial_balance_report_full_beta()
    {


          $formdate=$_GET['formdate'];
                       //$formdate=date('Y-m-d',strtotime($formdate."-1 days"));
                       $todate=$_GET['fromto'];
                 
                    
                      
                    
                
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
                      $difference_debit=0;
                      $close_d_total=0;
                      $close_c_total=0;
                      $difference_credit=0;
                      $closeing_balance_credit=0;
                      $closeing_balance_debit=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $difference=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104)
                                         {
                                            




$result=$this->db->query("



    SELECT (SELECT  SUM(a.credits)  FROM all_ledgers AS a LEFT JOIN accountheads AS b ON a.customer_id = b.id  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0' AND ((a.party_type ='5' AND b.name = 'grand max') OR (a.party_type = '3')) AND a.account_head_id = 104 AND a.customer_id !=61 AND c.mark_customer_id IN ('1','-1','0') AND a.payment_date<'$formdate') AS differencec,

      (SELECT  SUM(a.debits) FROM all_ledgers AS a LEFT JOIN accountheads AS b ON a.customer_id = b.id  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0' AND ((a.party_type ='5' AND b.name = 'grand max') OR (a.party_type = '3')) AND a.account_head_id = 104 AND a.customer_id !=61 AND c.mark_customer_id IN ('1','-1','0') AND a.payment_date<'$formdate') AS differenced,
 
   (SELECT  SUM(a.credits) FROM all_ledgers AS a LEFT JOIN accountheads AS b ON a.customer_id = b.id  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0' AND ((a.party_type ='5' AND b.name = 'grand max') OR (a.party_type = '3')) AND a.account_head_id = 104 AND a.customer_id !=61 AND c.mark_customer_id IN ('1','-1','0') AND a.payment_date BETWEEN '$formdate' AND '$todate') AS totalcridit,


    (SELECT  SUM(a.debits) FROM all_ledgers AS a LEFT JOIN accountheads AS b ON a.customer_id = b.id  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0' AND ((a.party_type ='5' AND b.name = 'grand max') OR (a.party_type = '3')) AND a.account_head_id = 104 AND a.customer_id !=61 AND c.mark_customer_id IN ('1','-1','0') AND a.payment_date BETWEEN '$formdate' AND '$todate') AS totaldebit,


    SUM(a.credits - a.debits) AS totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d FROM all_ledgers AS a LEFT JOIN accountheads AS b ON a.customer_id = b.id  LEFT JOIN vendor AS c ON a.customer_id = c.id WHERE a.deleteid = '0' AND ((a.party_type ='5' AND b.name = 'grand max') OR (a.party_type = '3')) AND a.account_head_id = 104 AND a.customer_id !=61 AND c.mark_customer_id IN ('1','-1','0')");


                                           $debit_status =1;
                                         
                                         }
                                         elseif($value->id==52)
                                         {

                                              $result=$this->db->query("SELECT 
                                          

    (SELECT SUM(credits-debits) FROM all_ledgers WHERE deleteid=0 AND account_head_id=$value->id AND payment_date<'$formdate' AND party_type NOT IN ('4','8','10')) as difference,
    (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND account_head_id=$value->id AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type NOT IN ('4','8','10')) as totalcridit,

    (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND account_head_id=$value->id AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type NOT IN ('4','8','10')) as totaldebit,
        SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type NOT IN ('4','8','10')  ORDER BY id DESC");



                                         
                                         }
                                         elseif($value->id==116)
                                         {

                                             


                                               $result=$this->db->query("SELECT 

                                                 (SELECT SUM(b.amount-0) FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date<'$formdate') as differencec,



  (SELECT SUM(b.amount-0) FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0 AND a.create_date BETWEEN '$formdate' AND '$todate') as  totalcridit,


                                                SUM(b.amount) as totalsum,SUM(0) as close_d,SUM(b.amount) as close_c, SUM(0) as totaldebit, SUM(0) as differenced  FROM orders_process as a join order_product_list_process as b ON a.id=b.order_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.order_base>0  ORDER BY a.id DESC

                                                ");


                                         }
                                         elseif($value->id==119){

                                             
                                              $result=$this->db->query("SELECT 

                                                (SELECT SUM(credits)  FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2=$value->id AND payment_date<'$formdate' AND order_id>0 AND party_type NOT IN ('4','8','10')) as differencec,


                              (SELECT SUM(debits)  FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2=$value->id AND payment_date<'$formdate' AND order_id>0 AND party_type NOT IN ('4','8','10')) as differenced,




                                                (SELECT SUM(credits)  FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2=$value->id AND payment_date BETWEEN '$formdate' AND '$todate' AND order_id>0 AND party_type NOT IN ('4','8','10')) as totalcridit,


                                                (SELECT SUM(debits)  FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2=$value->id AND payment_date BETWEEN '$formdate' AND '$todate' AND order_id>0 AND party_type NOT IN ('4','8','10')) as totaldebit,


                                               SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."'  AND order_id>0 AND party_type NOT IN ('4','8','10') ORDER BY id DESC");

                                                
                                         
                                         }
                                         elseif($value->id==68)
                                         {

                                               




$result=$this->db->query("SELECT 



    (SELECT  SUM(a.credits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND  b.mark_vendor_id IN ('1','-1','0') 
   AND a.payment_date<'$formdate') as differencec,


     (SELECT  SUM(a.debits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND  b.mark_vendor_id IN ('1','-1','0') 
   AND a.payment_date<'$formdate') as differenced,
   
    

     (SELECT  SUM(a.credits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND  b.mark_vendor_id IN ('1','-1','0') 
   AND a.payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

      (SELECT  SUM(a.debits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND  b.mark_vendor_id IN ('1','-1','0') 
   AND a.payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,

    SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=0 AND  b.mark_vendor_id IN ('1','-1','0')");



                                                 $debit_status =1;
                                         
                                         }
                                         elseif($value->id==383)
                                         {


                                              $result=$this->db->query("SELECT


            (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date<'$formdate') as differencec,


            (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date<'$formdate') as differenced,


                                                  
             (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2 AND payment_date BETWEEN '$formdate' AND '$todate' ORDER BY id DESC) as totaldebit,                                  

             SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d FROM all_ledgers WHERE deleteid=0 AND auto_expence_bank_status='1'  AND party_type=2");
                                                  
                                              


                                               
                                         
                                         }
                                         elseif($value->id==381)
                                         {


                             $result=$this->db->query("SELECT 


                                

                                  (SELECT SUM(credits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=5 AND payment_date<'$formdate') as differencec,

  (SELECT SUM(credits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=5 AND payment_date<'$formdate') as differenced,


                                  (SELECT SUM(credits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=5 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,


                                  (SELECT SUM(debits) as totalsum, SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=5 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,


                            SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=5");
                            $debit_status =0;

                                         }
                                         elseif($value->id==372)
                                         {


                           
                                          

 $result=$this->db->query("SELECT
                               

    (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5  AND payment_date<'$formdate') as differencec,



    (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5  AND payment_date<'$formdate') as differenced,


 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,
 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

  FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='372' AND party_type=5 ");
                             $debit_status =1;



                                         }
                                         elseif($value->id==382)
                                         {


                             $result=$this->db->query("SELECT
                               

   (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date<'$formdate') as differencec,

  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date<'$formdate') as differenced,



 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,
 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

  FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='142' AND party_type=5 AND tcs_status=1 ");
                             $debit_status =0;

                                         }
                                         elseif($value->id==373)
                                         {

                                                                               
                                                    $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                                                    SUM(a.debit) as totaldebit,
                                                    SUM(a.credit) as totalcridit,
                                                    SUM(a.opeing_balance_cr) as differencec,
                                                    SUM(a.opeing_balance_dr) as differenced,
                                                    SUM(a.balance_cr-a.balance_dr) as totalsum,
                                                    SUM(a.balance_cr) as close_c,
                                                    SUM(a.balance_dr) as close_d
                                                    FROM commen_ledgers as a   WHERE  a.id>0");

                                                    $debit_status =1;
                                         
                                         }
                                         elseif($value->id==179)
                                         {

                                                


$result=$this->db->query("SELECT


 (SELECT SUM(a.credits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND a.payment_date<'$formdate') as differencec,



 (SELECT SUM(a.debits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND a.payment_date<'$formdate') as differenced,




  (SELECT SUM(a.credits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND a.payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

   (SELECT SUM(a.debits) FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 AND a.payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,

 SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 AND a.cnn_status=1 ");



                                                 $debit_status =1;
                                         
                                         }
                                        elseif($value->id==175)
                                         {

                                       





     $result=$this->db->query("SELECT 

    (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='405') as differencec,


     (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='405') as differenced,


   (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='405') as totalcridit,

      (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='405') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

       FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.customer_id='405'");






                                        }

                                         
                                         elseif($value->id==59)
                                         {


                                          $result=$this->db->query("SELECT 

         (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='161') as differencec,


           (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='161') as differenced,


   (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='161') as totalcridit,

      (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='161') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

       FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.customer_id='161'");





                                        }
                                         elseif($value->id==159)
                                         {




  $result=$this->db->query("SELECT 

  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND payment_date<'$formdate') as differencec,


(SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND payment_date<'$formdate') as differenced,




  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

 FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=1 ");
$debit_status =0;



                                         
                                         }
                                         elseif($value->id==160)
                                         {

$result=$this->db->query("SELECT 

  



  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=0 AND payment_date<'$formdate') as differencec,

 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=0 AND payment_date<'$formdate') as differenced,





  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=0 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=0 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

 FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND driver_collection_status=0 ");
$debit_status =0;



                                            
                                         
                                         }
                                          elseif($value->id==151)
                                         {

                                            



                  $result=$this->db->query("SELECT 

        (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND payment_date<'$formdate' AND party_type=5 AND customer_id=220) as differencec,
 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND payment_date<'$formdate' AND party_type=5 AND customer_id=220) as differenced,




                  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type=5 AND customer_id=220) as totalcridit,


                   (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type=5 AND customer_id=220) as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                   FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND customer_id=220");





                                         
                                         }
                                          elseif($value->id==150)
                                         {

                                              $result=$this->db->query("SELECT 

    (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND payment_date<'$formdate' AND party_type=5 AND customer_id=163) as differencec,
    (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND payment_date<'$formdate' AND party_type=5 AND customer_id=163) as differenced,

                  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type=5 AND customer_id=163) as totalcridit,


                   (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0 AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type=5 AND customer_id=163) as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                   FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND customer_id=163");
                                         
                                         }
                                          elseif($value->id==106)
                                         {
                                        



     $result=$this->db->query("SELECT 

 (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183') as differencec,

 (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183') as differenced,


(SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183') as totalcridit,

(SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

 FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='183'");








                                         }
                                          elseif($value->id==152)
                                         {




                                           $result=$this->db->query("SELECT 

 

 (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229') as differencec,


 (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229') as differenced,



(SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229') as totalcridit,

(SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

 FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.comission_transfered NOT IN ('5') AND a.customer_id='229'");





                                         }
                                           elseif($value->id==164)
                                         {





                                           $result=$this->db->query("SELECT 

            (SELECT SUM(a.credits)  FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date<'$formdate' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13') as differencec,

(SELECT SUM(a.debits)  FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date<'$formdate' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13') as differenced,


                                      (SELECT SUM(a.credits)  FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13') as totalcridit,


                                      (SELECT SUM(a.debits)  FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.comission_transfered NOT IN ('5') AND a.customer_id='13') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d



                            FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5  AND a.comission_transfered NOT IN ('5') AND a.customer_id='13'");





                                         }
                                        elseif($value->id==155)
                                         {


$result=$this->db->query("SELECT 

  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND opening_balance_status=0  AND order_trancation_status=2 AND driver_collection_status=1 AND payment_date<'$formdate') as differencec,


(SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND opening_balance_status=0 AND order_trancation_status=2 AND driver_collection_status=1 AND payment_date<'$formdate') as differenced,




  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND opening_balance_status=0 AND order_trancation_status=2 AND driver_collection_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND party_type=2 AND opening_balance_status=0 AND order_trancation_status=2 AND driver_collection_status=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

 FROM all_ledgers WHERE deleteid=0 AND opening_balance_status=0  AND party_type=2 AND order_trancation_status=2 AND driver_collection_status=1 ");
$debit_status =0;            


                                         
                                         }
                                         elseif($value->id==129)
                                         {
                                            


    $result=$this->db->query("SELECT 

    
    (SELECT SUM(a.credits) FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date<'$formdate') as differencec,

    (SELECT SUM(a.debits) FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date<'$formdate') as differenced,


    (SELECT SUM(a.credits) FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

    (SELECT SUM(a.debits) FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129 AND a.payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d


     FROM all_ledgers as a JOIN accountheads as b ON a.customer_id=b.id  WHERE a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND  a.account_head_id=129");



                                            $debit_status =1;
                                         
                                         }
                                          elseif($value->id==48)
                                         {

                                              $result=$this->db->query("SELECT 


    (SELECT SUM(credits) FROM all_ledgers WHERE deleteid='0' AND payment_date<'$formdate'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5')) as differencec,

(SELECT SUM(debits) FROM all_ledgers WHERE deleteid='0' AND payment_date<'$formdate'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5')) as differenced,



                     (SELECT SUM(credits) FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '$formdate' AND '$todate'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5')) as totalcridit,

                    (SELECT SUM(debits) FROM all_ledgers WHERE deleteid='0' AND payment_date BETWEEN '$formdate' AND '$todate'  AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5')) as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d


                     FROM all_ledgers WHERE deleteid='0'   AND party_type=5 AND customer_id IN ('252','373') AND comission_transfered NOT IN ('5')");
                                         
                                           // $debit_status =1;
                                         }
                                          elseif($value->id==2)
                                         {

                             $result=$this->db->query("SELECT



 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=1 AND payment_date<'$formdate') as differencec,

 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=1 AND payment_date<'$formdate') as differenced,


                        (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                        (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2=$value->id AND party_type=1 AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                        FROM all_ledgers WHERE deleteid=0   AND account_heads_id_2='".$value->id."' AND party_type=1 ");
                              $debit_status =1;
                                         
                                         }
                                          elseif($value->id==120)
                                         {

                                  $result=$this->db->query("SELECT 

         (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2=$value->id  AND payment_date<'$formdate' AND party_type NOT IN ('4','8','10')) as differencec,

            (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2=$value->id  AND payment_date<'$formdate' AND party_type NOT IN ('4','8','10')) as differenced,



                                  (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2=$value->id  AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type NOT IN ('4','8','10')) as totalcridit,

                                  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2=$value->id  AND payment_date BETWEEN '$formdate' AND '$todate' AND party_type NOT IN ('4','8','10')) as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                   FROM all_ledgers WHERE deleteid=0  AND account_heads_id_2='".$value->id."'  AND party_type NOT IN ('4','8','10')");
                                         
                                         }
                                          elseif($value->id==156)
                                         {

                                              $result=$this->db->query("SELECT 

             (SELECT SUM(credits)  FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date<'$formdate' AND customer_id=332) as differencec,
              (SELECT SUM(debits)  FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date<'$formdate' AND customer_id=332) as differenced,

                                             (SELECT SUM(credits)  FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date BETWEEN '$formdate' AND '$todate' AND customer_id=332) as totalcridit,

                                             (SELECT SUM(debits)  FROM all_ledgers WHERE deleteid=0  AND party_type=5 AND payment_date BETWEEN '$formdate' AND '$todate' AND customer_id=332) as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                             FROM all_ledgers WHERE deleteid=0  AND party_type=5  AND customer_id=332");

                                                   


                                                  // $debit_status=0;


                                         
                                         }
                                         elseif($value->id ==153){
                                            $result=$this->db->query("SELECT 


                                              
       (SELECT SUM(a.credits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date<'$formdate' ) as differencec,
       (SELECT SUM(a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date<'$formdate' ) as differenced,


                                              (SELECT SUM(a.credits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '$formdate' AND '$todate' ) as totalcridit,

                                              (SELECT SUM(a.debits) as totalsum FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270' AND a.payment_date BETWEEN '$formdate' AND '$todate' ) as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d 

                                              FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.party_type=5 AND a.customer_id='270'");

                                         }
                                         elseif($value->id==141)
                                         {


                                            $result=$this->db->query("SELECT  

                     (SELECT  SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='329') as differencec,

 (SELECT  SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='329') as differenced,


                                              (SELECT  SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='329') as totalcridit,

                                               (SELECT  SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='329') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

                                               FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.customer_id='329'");


                                         }
                                         elseif($value->id ==172)
                                         {

                                            $result=$this->db->query("SELECT

                 (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='3') as differencec,

  (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='3') as differenced,


                                             (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='3') as totalcridit,

                                              (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='3') as totaldebit,
                                             
                                             SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.customer_id='3'");


                                         }  
                                         elseif($value->id ==170)
                                         {

                                            $result=$this->db->query("SELECT


 (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='180') as differencec,

  (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date<'$formdate' AND a.party_type=5 AND a.customer_id='180') as differenced,

                                              (SELECT SUM(a.credits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='180') as totalcridit,

                                               (SELECT SUM(a.debits) FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0' AND a.payment_date BETWEEN '$formdate' AND '$todate' AND a.party_type=5 AND a.customer_id='180') as totaldebit,SUM(a.credits-a.debits) as totalsum,SUM(a.credits) AS close_c,SUM(a.debits) AS close_d

                                                FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE a.deleteid='0'  AND a.party_type=5 AND a.customer_id='180'");

                                        }  
                                        elseif($value->id ==169)
                                        {
                                            $result=$this->db->query("SELECT



                                           
 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,

 (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,


                                             (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                              FROM all_ledgers WHERE deleteid=0  AND account_head_id='169' AND party_type NOT IN ('4','8','10')");
                                             $debit_status =1;

                                        } 
                                        elseif($value->id ==130)
                                        {







                                            $result=$this->db->query("SELECT

(SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,
(SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,

                                            (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                       
                                             FROM all_ledgers WHERE deleteid=0  AND account_head_id='130' AND party_type NOT IN ('4','8','10') ");
                                             $debit_status =1;
                                        } 
                                         elseif($value->id==165)
                                        {

                                            $result=$this->db->query("SELECT 

 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,
  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,



                                              (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d


                                                 FROM all_ledgers WHERE deleteid=0  AND account_head_id='165' AND party_type NOT IN ('4','8','10') ");
                                             $debit_status =1;
                                             
                                        }
                                         elseif($value->id==142)
                                        {

                                            $result=$this->db->query("SELECT 

(SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,
(SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,

                                              (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                                FROM all_ledgers WHERE deleteid=0  AND account_head_id='142' AND party_type NOT IN ('4','8','10') ");
                                             $debit_status =1;
                                             
                                        } 
                                        elseif($value->id==126)
                                        {





                                            $result=$this->db->query("SELECT 

 (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,
  (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,

                                            (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                             (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                            FROM all_ledgers WHERE deleteid=0  AND account_head_id='126' AND party_type NOT IN ('4','8','10')");

                                             $debit_status =1;
                                             
                                        }    
                                        elseif($value->id==107)
                                        {





                                          $result=$this->db->query("SELECT 
(SELECT SUM(credit)  FROM bankaccount_manage  WHERE bank_account_id!=25 AND create_date<'$formdate'  AND party_type IN('4') AND deleteid=0) as differenced,
(SELECT SUM(debit)  FROM bankaccount_manage  WHERE bank_account_id!=25 AND create_date<'$formdate'  AND party_type IN('4') AND deleteid=0) as differencec,

                               (SELECT SUM(credit)  FROM bankaccount_manage  WHERE bank_account_id!=25 AND create_date BETWEEN '$formdate' AND '$todate'  AND party_type IN('4') AND deleteid=0) as totaldebit,

                               (SELECT SUM(debit)  FROM bankaccount_manage  WHERE bank_account_id!=25 AND  create_date BETWEEN '$formdate' AND '$todate'  AND party_type IN('4') AND deleteid=0) as totalcridit,SUM(a.debit-a.credit) as totalsum,SUM(a.credit) as close_d,SUM(a.debit) as close_c

                            FROM `bankaccount_manage` as a  WHERE a.bank_account_id!='25'   AND a.party_type IN('4') AND a.deleteid=0");
                            $debit_status =1;
                                             
                                        }   
                                         elseif($value->id==384)
                                        {

                                          $result=$this->db->query("SELECT 

         (SELECT SUM(credit)  FROM bankaccount_manage  WHERE bank_account_id=25 AND create_date<'$formdate'  AND party_type IN('4') AND deleteid=0) as differenced,
          (SELECT SUM(debit)  FROM bankaccount_manage  WHERE bank_account_id=25 AND create_date<'$formdate'  AND party_type IN('4') AND deleteid=0) as differencec,

                               (SELECT SUM(credit)  FROM bankaccount_manage  WHERE bank_account_id=25 AND create_date BETWEEN '$formdate' AND '$todate'  AND party_type IN('4') AND deleteid=0) as totaldebit,

                               (SELECT SUM(debit)  FROM bankaccount_manage  WHERE bank_account_id=25 AND  create_date BETWEEN '$formdate' AND '$todate'  AND party_type IN('4') AND deleteid=0) as totalcridit,SUM(a.debit-a.credit) as totalsum,SUM(a.credit) as close_d,SUM(a.debit) as close_c

                            FROM `bankaccount_manage` as a  WHERE a.bank_account_id='25'   AND a.party_type IN('4') AND a.deleteid=0");
                            $debit_status =1;



                                             
                                        }       
                                        else
                                        {
                                         
                                            

                                        $result=$this->db->query("SELECT 
                                        
        (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id=$value->id AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differencec,

            (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id=$value->id AND party_type NOT IN ('4','8','10')  AND payment_date<'$formdate') as differenced,

                                        (SELECT SUM(credits) FROM all_ledgers WHERE deleteid=0  AND account_head_id=$value->id AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totalcridit,

                                        (SELECT SUM(debits) FROM all_ledgers WHERE deleteid=0  AND account_head_id=$value->id AND party_type NOT IN ('4','8','10')  AND payment_date BETWEEN '$formdate' AND '$todate') as totaldebit,SUM(credits-debits) as totalsum,SUM(credits) AS close_c,SUM(debits) AS close_d

                                          FROM all_ledgers WHERE deleteid=0  AND account_head_id='".$value->id."' AND party_type NOT IN ('4','8','10')");
                                               $debit_status =1;
                                             
                                        }
                                         
                                        
                                         
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 
                                                 
                                              $differencec = $partys1ss->differencec;
                                              $differenced = $partys1ss->differenced;
                                              $credits1 = $partys1ss->totalcridit;
                                              $debit1 = $partys1ss->totaldebit;
                                              $totalsum=$partys1ss->totalsum;
                                              $close_c=$partys1ss->close_c;
                                              $close_d=$partys1ss->close_d;


                                         }
                                          
                                       

                                    
                                    



                                   $dnone="";
                               
                                       switch ($value->id) {
                                        case 48:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate;

                                            break;
                                        case 156:
                                            $ssurl=base_url().'index.php/accountheads/others_ledger_find?customer_id=332';
                                            break;
                                        case 151:
                                            $ssurl=base_url().'index.php/accountheads/others_ledger_find?customer_id=220';
                                            break;
                                        case 155:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=346";
                                            break;
                                        case 175:
                                            $ssurl=base_url()."index.php/accountheads/others_ledger_find?customer_id=405";
                                            break;

                                        case 384:
                                            $ssurl=base_url()."index.php/report/accountsreport?cash_in_hand=0";
                                            break;
                                            
                                        case 107:
                                            $ssurl=base_url()."index.php/report/accountsreport?cash_in_hand=1";
                                            break;        
                                        case 150:
                                            $ssurl=base_url().'index.php/accountheads/others_ledger_find?customer_id=163&party_type=5';
                                            break;
                                        case 159:  case 383:
                                            $ssurl=base_url().'index.php/driver/ledger?driver_collection_status=1';
                                            break;  
                                         case 373:
                                            $ssurl=base_url().'index.php/customer/common_ledger';
                                            break;       
                                        case 160:
                                            $ssurl=base_url().'index.php/driver/ledger?driver_collection_status=0';
                                            break;
                                            case 119:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                           
                                            break;
                                        case 68:
                                            $ssurl=base_url().'index.php/report/customer_balance_report_custome_table?column_status=1';
                                            break;
                                         case 179:
                                            $ssurl=base_url().'index.php/customer/ledger?cnn_status=1';
                                            break;    
                                        case 154:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                            break;
                                        case 381:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                             $dnone="d-nones";
                                         break;
                                         case 380:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                             $dnone="d-nones";
                                         break;
                                         case 382:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                             $dnone="d-nones";
                                         break;   
                                        case 116:  case 120:
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
                                            break;
                                             
                                        case 2: 
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id";
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
                                            $ssurl=base_url()."index.php/report/balancereport_base_ledger_beta?accountshead=$value->id&grouped=1&from_date=".$formdate;
                                            break;
                                            }
                                            
                                      
                                         



                                        
                                          $opeing_balance_status=1;
                                          $opeing_balance_status=2;
                                           
                                    


                                         $difference_credit+=$differencec;
                                         $difference_debit+=$differenced;


                                        
                                       

                                         $closeing_balance=$totalsum;
                                         



                                         if($value->id==2)
                                         {


                                                     
                                                      $close_d=$close_c;
                                                      $close_c=0;
                                                   
                                                      $debit1=$credits1;
                                                      $credits1=0;

                                         }
                                         elseif($value->id==172)
                                         {


                                                      // $close_d=abs($totalsum);
                                                      // $close_c=0;
                                                     
                                                      // $debit1=abs($totalsum);
                                                      // $credits1=0;


                                                    if($closeing_balance>0)
                                                    {
                                                        $close_c=$closeing_balance;
                                                        $close_d=0;
                                                    }
                                                    else
                                                    {
                                                         $close_d=abs($closeing_balance);
                                                         $close_c=0;
                                                    }


                                         }
                                          elseif($value->id==173)
                                         {


                                                      $close_d=abs($totalsum);
                                                      $close_c=0;
                                                     
                                                      $debit1=abs($totalsum);
                                                      $credits1=0;

                                                      

                                         }
                                          elseif($value->id==119)
                                         {

                                                      $close_d=$close_c;
                                                      $close_c=0;
                                                     
                                                      $debit1=$credits1;
                                                      $credits1=0;



                                         }
                                          elseif($value->id==155)
                                         {
                                                              


                                                      $close_d=abs($totalsum);
                                                      $close_c=0;
                                                    
                                                      $debit1=abs($totalsum);
                                                      $credits1=0;

                                         }
                                         elseif($value->id==159)
                                         {
                                                              


                                                      $close_d=0;
                                                      $close_c=abs($totalsum);
                                                    
                                                      $debit1=0;
                                                      $credits1=abs($totalsum);

                                         }
                                         elseif($value->id==372)
                                         {

                                         }
                                         elseif($value->id==373)
                                         {

                                         }
                                         elseif($value->id==151)
                                         {
                                          
                                         }
                                         elseif($value->id==174)
                                         {
                                          
                                         }
                                         elseif($value->id==176)
                                         {
                                          
                                         }
                                         elseif($value->id==104)
                                         {
                                          
                                         }
                                         elseif($value->id==107)
                                         {
                                          
                                         }
                                         elseif($value->id==129)
                                         {
                                          
                                         }
                                         elseif($value->id==130)
                                         {
                                          
                                         }
                                         elseif($value->id==68)
                                         {
                                          
                                         }
                                          elseif($value->id==179)
                                         {
                                          
                                         }
                                          elseif($value->id==126)
                                         {
                                          
                                         }
                                         else
                                         {




                                                    if($closeing_balance>0)
                                                    {
                                                        $close_c=$closeing_balance;
                                                        $close_d=0;
                                                    }
                                                    else
                                                    {
                                                         $close_d=abs($closeing_balance);
                                                         $close_c=0;
                                                    }




                                         }

 $close_c_total+=$close_c;
 $close_d_total+=$close_d;



                                       $credits1total+=$credits1;
                                       $debit1total+=$debit1;



                                         




                                  

                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'close_c' => abs($close_c),
                                            'close_d' => abs($close_d),
                                            'closeing_balance_status' => 1,
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=> $ssurl,
                                            'dnone'=> $dnone,
                                            'opeing_balance_status'=> 1,
                                            'opening_balance_d'=>abs($differenced),
                                            'opening_balance_c'=>abs($differencec),
                                            'credit' => round($credits1),
                                            'debit' => round($debit1),
                                            'set' => $credits1+$debit1+abs($differenced)+abs($differencec)+abs($close_c)+abs($close_d)+$totalsum
                
                                        );


                                        if($value->id==116)
                                       {
                                            

                                            //echo "<pre>";print_r($array);
                                           // exit;    

                                              
                                       }


                            
                           
                            
                            

                        $i++;

                     }
                     
                     
if($valuevv->account_type_id==1)
{

//echo $closeing_balance_debit;
//exit;

}

                           


                     $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>$debit1total,
                         'credit'=>$credits1total,
                         'closeing_balance_credit'=>$close_c_total,
                         'closeing_balance_debit'=>abs($close_d_total),
                         'opening_balance_debit'=>abs($difference_debit),
                         'opening_balance_credit'=>$difference_credit,
                         'set'=>$debit1total+$credits1total+abs($difference_debit)+$difference_credit+$close_c_total+abs($close_d_total),
                         'sub'=>$array
                         
                         
                     );
                     
                     
                     
                     
                  }
                    
                    
               
                    
                  echo json_encode($arrayhead);

                           


             

                 

    }  
    
     public function trial_balance_full_formate()
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
                                             $this->load->view('report/trial_balance_full_format.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }




    }
    public function sale_product_brand_wise_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('brand', 'deleteid', '0');
            $data['customers'] = $this->db->query("SELECT pl.brand as categories FROM orders_process op        
                                    LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
                                    LEFT JOIN product_list pl ON oplp.product_id =  pl.id WHERE pl.brand != '' GROUP BY pl.brand ORDER BY pl.brand ASC  ")->result();
            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Brand wise Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_brand_wise_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function sale_product_brand_detail_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('brand', 'deleteid', '0');

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['price_master'] = $this->Main_model->where_names_order_by('price_master', 'deleteid', '0', 'id', 'ASC');
            $data['grouping'] = $this->Main_model->where_names_order_by('grouping', 'deleteid', '0', 'id', 'ASC');

            $data['additional_information'] = $this->Main_model->where_names_three_order_by_new('additional_information', 'grouping', '1', 'deleteid', '0', 'category_id', '0', 'sort_order_id', 'ASC');
            $data['additional_information2'] = $this->Main_model->where_names_three_order_by_new('additional_information', 'grouping', '1', 'deleteid', '0', 'category_id!=', '0', 'sort_order_id', 'ASC');
            $data['additional_information1'] = $this->Main_model->where_names_three_order_by_new('additional_information', 'grouping', '1', 'deleteid', '0', 'category_id=', $categories_id, 'sort_order_id', 'ASC');
            $data['uom'] = $this->Main_model->where_names_order_by('uom', 'deleteid', '0', 'id', 'ASC');

            $data['ys'] = $this->Main_model->where_names_order_by('ys', 'deleteid', '0', 'id', 'ASC');
            $data['brand'] = $this->Main_model->where_names_order_by('brand', 'deleteid', '0', 'id', 'ASC');
            $data['product'] = $this->Main_model->where_names_order_by('product_list', 'deleteid', '0', 'id', 'ASC');
            $data['color'] = $this->Main_model->where_names_order_by('color', 'deleteid', '0', 'id', 'ASC');
            $data['gsm'] = $this->Main_model->where_names_order_by('gsm', 'deleteid', '0', 'id', 'ASC');
            $data['thickness'] = $this->Main_model->where_names_order_by('thickness', 'deleteid', '0', 'id', 'ASC');
            $data['material_type'] = $this->db->query("SELECT DISTINCT id, SUBSTRING_INDEX(SUBSTRING_INDEX(`option`, ',', n), ',', -1) AS `option`
            FROM additional_information
            JOIN (
                SELECT 1 AS n UNION ALL
                SELECT 2 UNION ALL
                SELECT 3 UNION ALL
                SELECT 4
            ) AS numbers
            ON CHAR_LENGTH(`option`)
                -CHAR_LENGTH(REPLACE(`option`, ',', '')) >= n - 1
            WHERE label_name = 'material_type'
            ORDER BY id, n;");

            // Fetch options where label_name is 'categorie_type' directly through query
            $query = $this->db->query("SELECT `option` FROM `additional_information` WHERE `label_name` = 'categorie_type' AND `deleteid` = '0'");
            $result = $query->row();
            if ($result) {
                $categorie_type_option = $result->option;
                // Split the string into an array using a comma as the delimiter
                $optionsArray = array_map('trim', explode(",", $categorie_type_option));

                // Create an array of objects with the "option" key
                $optionObjects = array();
                foreach ($optionsArray as $option) {
                    if (!empty($option)) {
                        $optionObjects[] = $option;
                    }
                }
            }
            // echo "SELECT * FROM `additional_information` WHERE `label_name` = 'categorie_type' AND `deleteid` = '0'";
            // print_r($optionObjects ); exit();
            // $categorie_type_options = $query->result_array();

            // Pass the options to the view
            $data['categorie_type_options'] = $optionObjects;

            $data['title']    = 'Sale Product Brand wise Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_brand_detail_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }


    public function sale_product_area_wise_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sql = $this->db->query("SELECT c.area FROM customers c LEFT JOIN orders_process op ON c.id = op.customer_id WHERE c.area != '' GROUP BY c.area ORDER BY c.area")->result();
            $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->area)) {
                    return strval($obj->area);
                } elseif (is_array($obj) && isset($obj['area'])) {
                    return strval($obj['area']);
                } else {
                    return null; // Handle the case when 'product_id' is not found
                }
            }, $sql));
           
            $areas = array_unique(explode(',', $commaSeperatedCustomer));
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $areas;

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Area wise Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_area_wise_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    public function sale_product_area_wise_customer_report()
    {
        if (isset($this->session->userdata['logged_in'])) {
            $areas = 'ANAIMALAI - SHOP,ANAMALAI PARTY,ANDAMAN & NICOBAR  ISLANDS,ANDAMAN.PARTY,ANDHIYUR-SHOP,ANDHRA,ANNUR PARTY,ANNUR SHOP,ANNUR WORKSHOP,ANTHIYUR - SHOP,ANTHIYUR PARTY,ANTHIYUR WORKSHOP,ARNI,AVI TO ANNUR ROAD,AVINASHI,AVINASHI - PARTY,AVINASHI RD - PARTY,AVINASHI ROAD,AVINASHI SHOP,AVINASHI WORKSHOP,AVN-ANNUR PARTY,BANGALORE,BANNARI -PARTY,BHAVANI WORKSHOP,BHAVANI SHOP,BHAVANI-PARTY,BHAVANISAGAR,CHENGALPATTU,CHENGAPALLI,CHENGAPALLI WORKSHOP,CHENNAI,CHENNIMALAI PARTY,CHENNIMALAI WORKSHOP,CHEYUR,CHEYUR PARTY,CHEYUR ROAD,CHHATTIGARH,CHIDAMBARAM,CHINNAMANUR (THENI),CHITHODE,COIMBATORE,COONOOR PARTY,COVAI - ARCHITECTS & INTERIOR DESINERS,COVAI - AVINASHI RD,COVAI - AVINASHI RD PARTY,COVAI - GANDHIPURAM,COVAI - MARUTHAMALAI RD,COVAI - MARUTHAMALAI RD PARTY,COVAI - METTUPALAYAM RD,COVAI - PALAKAD RD,COVAI - PALAKAD RD PARTY,COVAI - POLLACHI RD,COVAI - POLLACHI RD PARTY,COVAI - SATHY RD PARTY,COVAI - SHOP,COVAI - THADAGAM RD,COVAI ENGINEER,COVAI PARTY,COVAI RASIPURAM ROAD,COVAI -SIRUVANIROAD,COVAI TO GANAPATHYSHOP,COVAI- TRICHY RD PARTY,COVAI-ANNUR ROAD,COVAI-CONTRACTOR,COVAI-GANAPATHY,COVAI-METTUPALAYAM RD PARTY,COVAI-SATHY RD,COVAI-THADAGAM RD PARTY,COVAI-TRICHY RD,CUDDALORE,DHARAPURAM - SHOP,DHARAPURAMPARTY,DHARAPURAM WORKSHOP,DHARMAPURI,DHARMAPURI PARTY,DINDUGAL ENGINEER,DINDUGAL PARTY,DINDUGAL SHOP,DINDUGAL WORKSHOP,EDAPADI PARTY,ERNAKULAM-KERALA,ERODE CONTRACTORS,ERODE PARTY,ERODE SHOP,ERODE WORKSHOP,GOBI FABRICATOR,GOBI ROAD,GOBI- SHOP,GOBI WORKSHOP,GOBI-PARTY,HOSUR,HOSUR PARTY,IDUVAI-PARTY,IDUVAI-WORKSHOP,KALLAKURICHI,KANCHEEPURAM PARTY,KANGAYAM SHOP,KANGEYAM - PARTY,KANGEYAMWORKSHOP,KANJAPALLI,KANKEYAM SHOP,KANYAKUMARI,KARAMADAI -PARTY,KARAMADAI WORKSHOP,KARIKUTI,KARNATAKA,KARUMATHAMPATTI  ROAD,KARUMATHAMPATTI WORKSHOP,KARUMATHAMPATTI-PARTY,KARUR - SHOP,KARURPARTY,KARUR WORKSHOP,KARUVALUR -PARTY,KAVINDAPADI SHOP,KAVUNTHAPADI SHOP,KAVUNTHAPADI WORKSHOP,KERALA,KINATHUKKADAVU,KODAIKANAL,KODUMUDI,KODUVAI - PARTY,KODUVAI WORKSHOP,KOILPALAYAM,KOMARAPALAYAM,KOMARAPALAYAM PARTY,KOMBAI,KOTHAGIRI,KRISHNAGIRI,KUMBAKONAM,KUNNATHUR - PARTY,KUNNATUR WORKSHOP,MADURAI,MADURAI SHOP,MANAMADURAI,MANAPPARAI,MANGALAM PARTY,MANGALAM WORKSHOP,METTUPALAYAM PARTY,METTUPALAYAM SHOP,METTUPALYAM WORKSHOP,METTUR DAM,METTUR DAM PARTY,METTUR SHOP,METTUR WORKSHOP,MUMBAI,MYSORE,NAGAPATTINAM,NAMAKKAL,NAMBIYAMPALAYAM,NAMBIYUR - SHOP,NAMBIYUR-PARTY,NAMBIYUR WORKSHOP,NATHAM,NEGAMAM,ODDANCHATRAM PARTY,OOTY,OOTY PARTY,OTTANCHAITHIHRAM PARTY,OTTANCHATHIRAM - SHOP,OTTANCHATHIRAM WORKSHOP,PADIYUR,PALAKKAD - PARTY,PALAKKAD SHOP,PALANI,PALANI - SHOP,PALANI CONTRACTOR,PALANI WORKSHOP,PALLADAM - PARTY,PALLADAM - SHOP,PALLADAM FABRICATOR,PALLADAM ROAD,PALLADAM WORKSHOP,PALLAGOUNDENPALAYAM PARTY,PASUR,PATI,ODISHA,PERUMANALLUR,PERUMANALLUR FABRICATOR,PERUMANALLUR ROAD,PERUNDURAI CONTRACTOR,PERUNDURAI PARTY,PERUNDURAI SHOP,PERUNDURAI WORKSHOP,POLLACHI,POLLACHI  PARTY,POLLACHI - SHOP,PONDICHERY,PONGALUR,PONGALUR PARTY,PONGALUR SHOP,Primary,PUDHUKOTTAI PARTY,PUDHUVAI,PUDUCHERRY,PULIAMPATTI -PARTY,PULIAMPATTI WORKSHOP,PULIYAMPATTI -SHOP,PULIYANPATTI ROAD,PUTHUKOTAI,RAJAPALAYAM,SAKTHI ROAD,SALEM,SALEM CONTRACTOR,SALEM SHOP,SANKARI,SATHY -PARTY,SATHY WORKSHOP,SATHY-SHOP,SATTUR,SENGAPALY,SIRUMUGAI,SIRUMUGAI PARTY,SIRUMUGAI WORKSHOP,SIVAKASI,SOLAR,SOMANUR - KARUMATHAMPATTI ROAD,SOMANUR-PARTY,SULUR,SULURPARTY,THALAVADI,THANJAVUR,THARMAPURI,THEKALUR - PARTY,THEKALUR WORKSHOP,THEKLUR,THENI,THENI PARTY,THENI SHOP,THENI WORKSHOP,THIRUCHENGODE,THIRUPATHUR,THIRUVALLUR,THIRUVANNAMALAI - CONTRACTOR,THIRUVARUR,THOOTHUKUDI,THURAIYUR,TIRUCHENGODE WORKSHOP,TIRUCHENGODE-PARTY,TIRUCHENGODE-SHOP,TIRUNELVELI,TIRUPATI,TIRUPPATTUR,TIRUPPUR,TIRUPUR ROAD,TRICHY,TRICHY CONTRACTOR,TUP - AVINASHI ROAD SHOP,TUP -CONTRACTOR,TUP - DARAPURAM ROAD SHOP,TUP - PALLADAM RD SHOP,TUP - PARTY,TUP - PARTY,TUP - PONGALUR SHOP,TUP - SITE WORK,TUP - VELLAKOVIL WORKSHOP,TUP KANGAYAM ROAD (PARTY),TUP- PALLADAM ROAD,TUP- SHOP,TUPVEERAPANDI PRIVU,TUP-ARCHITECT,TUP-AVINASHI ROAD(PARTY),TUP-AVINASHIROAD,TUP-CETTI PLM,TUP-COLLAGE ROAD,TUP-COLLEGE ROAD(PARTY),TUP-DHARAPURAM ROAD,TUP-DHARAPURAM ROAD(PARTY),TUP-ENGINEER,TUP-FABRICATORS,TUP-KANGAYA ROAD (PARTY),TUP-KANGAYAM ROAD,TUP-KANKEYAM SHOP,TUP-KONGU MAIN ROAD,TUP-KONGU ROAD (PARTY),TUP-KUMARAN ROAD,TUP-MANGALAM ROAD,TUP-MANGALAM ROAD(PARTY),TUP-PALLADAMROAD(PARTY),TUP-PN ROAD,TUP-PN ROAD(PARTY),TUP-UTHUKULI ROAD,TUP-UTHUKULI ROAD(PARTY),TUP-VELLAKOVIL (PARTY),TUTICORIN,UDUMALAI,UDUMALAI SHOP,UDUMALAI WORKSHOP,UDUMALPET PARTY,UNKNOWN,UTHUKULI PARTY,UTHUKULI SHOP,UTHUKULI WORKSHOP,UTHUKULLI,VALPARAI,VANJEPALYAYAM,VEDASANDUR SHOP,VEELLIRAVELLI,VELAKOVIL,VELLAKOVIL PARTY,VELLAKOVIL SHOP,VELLAKOVIL WORKSHOP,VELLORE,VIJAYAMAGALAM - PARTY,VIJAYAMANGALAM,SOMANUR SHOP,THANJAVUR PARTY,THANJAVUR FABRICATOR,PALANI PARTY,PERUMANALLUR SHOP';
            $areas = array_unique(explode(',', $areas));
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $areas;

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Area wise Customer Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_area_wise_customer_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function sale_product_area_detail_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('brand', 'deleteid', '0');

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Area wise Detailed Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_area_detail_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function fetch_data_sales_product_brand_wise_report()
    {
        $brand = $_GET['brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $testMode = (isset($_GET['test']) && $_GET['test']);
        if ($brand != 'All' && $brand != '') {
            $brandLog .= ' AND pl.brand IN (' . $brand . ')';
        }

        $arrayMain = [];

        if ($testMode) {
            $resultTotal = $this->db->query("SELECT
            COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
            SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
            SUM(CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0  END) AS value
            FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
            LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
            LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
            LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
            WHERE 
            op.deleteid = 0
            AND op.order_base > 0
            AND oplp.deleteid = '0'
            AND op.create_date BETWEEN '$formdate' AND '$todate'
            $brandLog
            GROUP BY
            categories")->result();
        } else {

            $resultTotal = $this->db->query("
    SELECT
        COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
        SUM(oplp.qty) AS qty,
        SUM(CASE WHEN op.create_date > '2024-05-31' THEN ((oplp.qty * oplp.rate) * 1.18) ELSE oplp.qty * oplp.rate END) AS value
    FROM orders_process op
    LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
    LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
    LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
    LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
    WHERE 
        op.deleteid = 0
        AND op.order_base = '1'
        AND oplp.deleteid = '0'
        AND op.create_date BETWEEN '$formdate' AND '$todate'
                $brandLog
            GROUP BY
                categories
        ")->result();
        }

        //    $resultReturns =  $this->db->query("SELECT
        //  pl.categories_id,
        //  pl.categories as categories,
        //  c.company_name as customer_name,
        //  SUM(srp.qty) AS ret_qty,
        //  SUM(srp.qty * srp.rate) AS ret_value
        //  FROM order_sales_return_complaints osrc
        //   LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        //   LEFT JOIN product_list pl ON srp.product_id =  pl.id
        //   LEFT JOIN categories cg ON pl.categories_id =  cg.id
        //   LEFT JOIN customers c ON c.id = osrc.customer
        //   LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        //   LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        //  WHERE
        //  osrc.deleteid = '0' AND 
        //   srp.deleteid = '0' AND 
        //   osrc.order_base = '5' AND osrc.id != 2423   AND
        //   osrc.update_date BETWEEN '$formdate' AND '$todate'
        //  $areaLog 
        //  GROUP BY
        // categories
        //  ")->result(); 

        $resultReturns = $this->db->query("SELECT
         COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
         LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
         LEFT JOIN product_list pl ON srp.product_id =  pl.id
         LEFT JOIN categories cg ON pl.categories_id =  cg.id
         LEFT JOIN customers c ON c.id = osrc.customer
         LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
         LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $brandLog
        GROUP BY
        categories ")->result();



        $combinedArray = array();

        foreach ($resultTotal as $row) {
            $combinedArray[strtolower($row->categories)] = (object) $row;
        }



        foreach ($resultReturns as $row) {
            $key = strtolower($row->categories);
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->ret_qty = $row->ret_qty;
                $combinedArray[$key]->ret_value = $row->ret_value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }




        $combinedArray = array_values($combinedArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];


        foreach ($combinedArray as &$row) {

            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
        }

        usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->categories)), strtolower(trim($b->categories)));
        });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }



    public function fetch_data_sales_product_brand_wise_report_export()
    {
        $brand = $_GET['brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $testMode = (isset($_GET['test']) && $_GET['test']);
        if ($brand != 'All' && $brand != '') {
            $brandLog .= ' AND pl.brand IN (' . $brand . ')';
        }

        $arrayMain = [];

        if ($testMode) {
            $resultTotal = $this->db->query("SELECT
            COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
            SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty END) AS qty,
            SUM(CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0  END) AS value
            FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
            LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
            LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
            LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
            WHERE 
            op.deleteid = 0
            AND op.order_base  > 0
            AND oplp.deleteid = '0'
            AND op.create_date BETWEEN '$formdate' AND '$todate'
            $brandLog
            GROUP BY
            categories")->result();
        } else {

            $resultTotal = $this->db->query("
    SELECT
        COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
        SUM(oplp.qty) AS qty,
        SUM(oplp.qty * oplp.rate) AS value
    FROM orders_process op
    LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
    LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
    LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
    LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
    WHERE 
        op.deleteid = 0
        AND op.order_base = '1'
        AND oplp.deleteid = '0'
        AND op.create_date BETWEEN '$formdate' AND '$todate'
                $brandLog
            GROUP BY
                categories
        ")->result();
        }




        $resultReturns = $this->db->query("SELECT
         COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
         LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
         LEFT JOIN product_list pl ON srp.product_id =  pl.id
         LEFT JOIN categories cg ON pl.categories_id =  cg.id
         LEFT JOIN customers c ON c.id = osrc.customer
         LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
         LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $brandLog
        GROUP BY
        categories ")->result();



        $combinedArray = array();

        foreach ($resultTotal as $row) {
            $combinedArray[strtolower($row->categories)] = (object) $row;
        }



        foreach ($resultReturns as $row) {
            $key = strtolower($row->categories);
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->ret_qty = $row->ret_qty;
                $combinedArray[$key]->ret_value = $row->ret_value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }




        $combinedArray = array_values($combinedArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];


        foreach ($combinedArray as &$row) {

            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
        }

         usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->categories)), strtolower(trim($b->categories)));
        });
        $arrayMain['data'] = $combinedArray;
        $filename = 'Sale Product Report (Brand wise) ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;
        $arrayMain['brand'] = 'Brand';
        $arrayMain['totals'] = $totals;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_brand_wise_report_export', $arrayMain);
    }

    public function fetch_data_brand_wise_details_report()
    {

        $category = $_GET['category'];
        $brand = $_GET['brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $categoryLog = '';
        $stat = '';
        $uom = isset($_GET['uom']) ? $_GET['uom'] : '';
        $categorie_type = isset($_GET['categorie_type']) ? $_GET['categorie_type'] : '';
        $material_type = isset($_GET['material_type']) ? $_GET['material_type'] : '';
        $color = isset($_GET['color']) ? $_GET['color'] : '';
        $thickness = isset($_GET['thickness']) ? $_GET['thickness'] : '';
        $coating_mass = isset($_GET['coating_mass']) ? $_GET['coating_mass'] : '';
        $yield_strength = isset($_GET['yield_strength']) ? $_GET['yield_strength'] : '';
        $testMode = (isset($_GET['test']) && $_GET['test']);


        $brandLog .= ($brand == 'null') ? ' AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) IS NULL' : ' AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) = "' . $brand . '"';

        $categoryLog .= ($category == 'null') ? ' AND COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) IS NULL' : ' AND COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) = "' . $category . '"';

        $stat .= (!empty($uom) && $uom !== 'ALL' && $uom !== 'undefined' && $uom !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.uom, pl_sub.uom, pl_tile.uom) = "' . $uom . '"' : '';

        $stat .= (!empty($categorie_type) && $categorie_type !== 'ALL' && $categorie_type !== 'undefined' && $categorie_type !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.categorie_type, pl_sub.categorie_type, pl_tile.categorie_type) LIKE "%' . $categorie_type . '%"' : '';

        $stat .= (!empty($material_type) && $material_type !== 'ALL' && $material_type !== 'undefined' && $material_type !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.material_type, pl_sub.material_type, pl_tile.material_type) = "' . $material_type . '"' : '';

        $stat .= (!empty($color) && $color !== 'ALL' && $color !== 'undefined' && $color !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.color, pl_sub.color, pl_tile.color) LIKE "%' . $color . '%"' : '';

        $stat .= (!empty($thickness) && $thickness !== 'ALL' && $thickness !== 'undefined' && $thickness !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.thickness, pl_sub.thickness, pl_tile.thickness) LIKE "%' . $thickness . '%"' : '';

        $coating_mass_search_term = preg_replace('/^(AZ|Z)\s*/i', '', $coating_mass);
        $coating_mass_search_term = str_replace(' ', '%', $coating_mass_search_term);
        $stat .= (!empty($coating_mass) && $coating_mass !== 'ALL' && $coating_mass !== 'undefined' && $coating_mass !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.coating_mass, pl_sub.coating_mass, pl_tile.coating_mass) LIKE "%' . $coating_mass_search_term . '%"' : '';

        $search_term_ys = preg_replace('/YS\s*/i', '', $yield_strength);
        $search_term_ys = str_replace(' ', '%', $search_term_ys);
        $stat .= (!empty($yield_strength) && $yield_strength !== 'ALL' && $yield_strength !== 'undefined' && $yield_strength !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.yield_strength, pl_sub.yield_strength, pl_tile.yield_strength) LIKE "%' . $search_term_ys . '%"' : '';



        $arrayMain = [];

        if ($testMode) {
            $result = $this->db->query("SELECT
    oplp.id,
    op.id as order_id,
    op.order_no,
    pl_product.product_name as product_name,
    (CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty END) AS qty,
     (CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END END) AS value
FROM orders_process op
LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
WHERE op.deleteid = 0
    AND oplp.deleteid = 0
    AND oplp.qty > 0
    AND op.order_base != '0'
    AND op.create_date BETWEEN ? AND ?
    $stat
    $brandLog 
    $categoryLog
GROUP BY oplp.id", array($formdate, $todate))->result();
        } else {
            $result = $this->db->query("SELECT
    oplp.id,
    op.id as order_id,
    op.order_no,
    pl_product.product_name as product_name,
    oplp.qty AS qty,
    (oplp.qty * oplp.rate) AS value
FROM orders_process op
LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
WHERE op.deleteid = 0
    AND oplp.deleteid = 0
    AND oplp.qty > 0
    AND op.order_base = '1'
    AND op.create_date BETWEEN ? AND ?
    $stat
    $brandLog 
    $categoryLog
GROUP BY oplp.id", array($formdate, $todate))->result();
        }



        $resultReturns  = $this->db->query("SELECT
        osrc.order_no,
        oplp.id,
        op.id as order_id,
       pl_product.product_name as product_name,
        srp.qty  AS ret_qty,
        srp.qty * srp.rate AS ret_value
      FROM order_sales_return_complaints osrc
         LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
         LEFT JOIN product_list pl ON srp.product_id =  pl.id
         LEFT JOIN categories cg ON pl.categories_id =  cg.id
         LEFT JOIN customers c ON c.id = osrc.customer
         LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
         LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        $stat
        $brandLog 
        $categoryLog GROUP BY srp.id")->result();


        $combinedArray = array();
        foreach ($resultReturns as $row) {
            $combinedArray[$row->id] = (object) $row;
        }
        foreach ($result as $row) {
            $key = $row->id;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }
        $combinedArray = array_values($combinedArray);
        $totals = ['brand_qty' => 0, 'brand_value' => 0, 'brand_ret_qty' => 0, 'brand_ret_value' => 0, 'brand_actual_qty' => 0, 'brand_actual_value' => 0];
        foreach ($combinedArray as &$row) {
            // if(isset($row->ret_qty)){
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            // }
            $totals['brand_qty'] += $row->qty;
            $totals['brand_value'] += $row->value;

            $totals['brand_ret_qty'] += $row->ret_qty;
            $totals['brand_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", ($row->qty - $row->ret_qty));
            $row->actual_value =  sprintf("%.2f", ($row->value - $row->ret_value));
            $totals['brand_actual_qty'] += $row->actual_qty;
            $totals['brand_actual_value'] += $row->actual_value;
        }
         usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->product_name)), strtolower(trim($b->product_name)));
        });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }

    public function fetch_data_brand_wise_details_report_export()
    {
        $category = $_GET['category'];
        $brand = $_GET['brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $categoryLog = '';
        $stat = '';
        $uom = isset($_GET['uom']) ? $_GET['uom'] : '';
        $categorie_type = isset($_GET['categorie_type']) ? $_GET['categorie_type'] : '';
        $material_type = isset($_GET['material_type']) ? $_GET['material_type'] : '';
        $color = isset($_GET['color']) ? $_GET['color'] : '';
        $thickness = isset($_GET['thickness']) ? $_GET['thickness'] : '';
        $coating_mass = isset($_GET['coating_mass']) ? $_GET['coating_mass'] : '';
        $yield_strength = isset($_GET['yield_strength']) ? $_GET['yield_strength'] : '';
        $testMode = (isset($_GET['test']) && $_GET['test']);


        $brandLog .= ($brand == 'null') ? ' AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) IS NULL' : ' AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) = "' . $brand . '"';

        $categoryLog .= ($category == 'null') ? ' AND COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) IS NULL' : ' AND COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) = "' . $category . '"';

        $stat .= (!empty($uom) && $uom !== 'ALL' && $uom !== 'undefined' && $uom !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.uom, pl_sub.uom, pl_tile.uom) = "' . $uom . '"' : '';

        $stat .= (!empty($categorie_type) && $categorie_type !== 'ALL' && $categorie_type !== 'undefined' && $categorie_type !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.categorie_type, pl_sub.categorie_type, pl_tile.categorie_type) LIKE "%' . $categorie_type . '%"' : '';

        $stat .= (!empty($material_type) && $material_type !== 'ALL' && $material_type !== 'undefined' && $material_type !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.material_type, pl_sub.material_type, pl_tile.material_type) = "' . $material_type . '"' : '';

        $stat .= (!empty($color) && $color !== 'ALL' && $color !== 'undefined' && $color !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.color, pl_sub.color, pl_tile.color) LIKE "%' . $color . '%"' : '';

        $stat .= (!empty($thickness) && $thickness !== 'ALL' && $thickness !== 'undefined' && $thickness !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.thickness, pl_sub.thickness, pl_tile.thickness) LIKE "%' . $thickness . '%"' : '';

        $coating_mass_search_term = preg_replace('/^(AZ|Z)\s*/i', '', $coating_mass);
        $coating_mass_search_term = str_replace(' ', '%', $coating_mass_search_term);
        $stat .= (!empty($coating_mass) && $coating_mass !== 'ALL' && $coating_mass !== 'undefined' && $coating_mass !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.coating_mass, pl_sub.coating_mass, pl_tile.coating_mass) LIKE "%' . $coating_mass_search_term . '%"' : '';

        $search_term_ys = preg_replace('/YS\s*/i', '', $yield_strength);
        $search_term_ys = str_replace(' ', '%', $search_term_ys);
        $stat .= (!empty($yield_strength) && $yield_strength !== 'ALL' && $yield_strength !== 'undefined' && $yield_strength !== '? undefined:undefined ?') ? ' AND COALESCE(pl_product.yield_strength, pl_sub.yield_strength, pl_tile.yield_strength) LIKE "%' . $search_term_ys . '%"' : '';



        $arrayMain = [];

        if ($testMode) {
            $result = $this->db->query("SELECT
    oplp.id,
    op.id as order_id,
    op.order_no,
    pl_product.product_name as product_name,
    (CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty END) AS qty,
    (CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END END) AS value
FROM orders_process op
LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
WHERE op.deleteid = 0
    AND oplp.deleteid = 0
    AND oplp.qty > 0
    AND op.order_base != '0'
    AND op.create_date BETWEEN ? AND ?
    $stat
    $brandLog 
    $categoryLog
GROUP BY oplp.id", array($formdate, $todate))->result();
        } else {
            $result = $this->db->query("SELECT
    oplp.id,
    op.id as order_id,
    op.order_no,
    pl_product.product_name as product_name,
    oplp.qty AS qty,
    (oplp.qty * oplp.rate) AS value
FROM orders_process op
LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
WHERE op.deleteid = 0
    AND oplp.deleteid = 0
    AND oplp.qty > 0
    AND op.order_base = '1'
    AND op.create_date BETWEEN ? AND ?
    $stat
    $brandLog 
    $categoryLog
GROUP BY oplp.id", array($formdate, $todate))->result();
        }



        $resultReturns  = $this->db->query("SELECT
        osrc.order_no,
        oplp.id,
        op.id as order_id,
       pl_product.product_name as product_name,
        srp.qty  AS ret_qty,
        srp.qty * srp.rate AS ret_value
       FROM order_sales_return_complaints osrc
         LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
         LEFT JOIN product_list pl ON srp.product_id =  pl.id
         LEFT JOIN categories cg ON pl.categories_id =  cg.id
         LEFT JOIN customers c ON c.id = osrc.customer
         LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
         LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        $stat
        $brandLog 
        $categoryLog GROUP BY srp.id")->result();


        $combinedArray = array();
        foreach ($resultReturns as $row) {
            $combinedArray[$row->id] = (object) $row;
        }
        foreach ($result as $row) {
            $key = $row->id;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }
        $combinedArray = array_values($combinedArray);
        $totals = ['brand_qty' => 0, 'brand_value' => 0, 'brand_ret_qty' => 0, 'brand_ret_value' => 0, 'brand_actual_qty' => 0, 'brand_actual_value' => 0];
        foreach ($combinedArray as &$row) {
            // if(isset($row->ret_qty)){
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            // }
            $totals['brand_qty'] += $row->qty;
            $totals['brand_value'] += $row->value;

            $totals['brand_ret_qty'] += $row->ret_qty;
            $totals['brand_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", ($row->qty - $row->ret_qty));
            $row->actual_value =  sprintf("%.2f", ($row->value - $row->ret_value));
            $totals['brand_actual_qty'] += $row->actual_qty;
            $totals['brand_actual_value'] += $row->actual_value;
        }
          usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->product_name)), strtolower(trim($b->product_name)));
        });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        // echo json_encode($arrayMain); 
        $name = $_GET['brand'] != null ? $_GET['brand'] : 'No Brand';
        $name .= ' - ';
        $name .= $_GET['category'] != null ? $_GET['category'] : 'No Category';
        $filename = "Sale Product Report Brand wise - ($name) Detailed " . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_brand_detail_report_export', $arrayMain);
    }

    public function fetch_data_sales_product_area_wise_report()
    {
        $areaGet = $_GET['area'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaFilter = '';

        if ($areaGet != 'All') {
           if ($areaGet!= '') {
            $areaFilter .= ' AND c.area IN (' . $areaGet . ') ';
           
        }
        }
        

        $arrayMain = [];

        $resultAll = $this->db->query("SELECT
        c.area,
        COUNT(DISTINCT c.id) as customers
        FROM customers c 
        WHERE c.deleteid = 0
        AND c.approved_status > 0
        GROUP BY
        c.area
        ORDER BY
        c.area ASC")->result();

        // print_r($resultAll);
// $resultTotal = $this->db->query("SELECT
//             COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) as categories,
//             SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
//             SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.amount ELSE 0  END) AS value
//             FROM orders_process op
//             LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
//             LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
//             LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
//             LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
//             WHERE 
//             op.deleteid = 0
//             AND op.order_base != '0'
//             AND oplp.deleteid = '0'
//             AND op.create_date BETWEEN '$formdate' AND '$todate'
//             $brandLog
//             GROUP BY
//             categories")->result();


        $result = $this->db->query("SELECT
        c.area,
        COUNT(DISTINCT oplp.order_id) as orders_count,
        COUNT(DISTINCT oplp.id) as order_prod_count,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
         FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base > 0 AND
       
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.area
        ORDER BY
        c.area ASC")->result();
// echo "SELECT
//         c.area,
//         COUNT(DISTINCT oplp.order_id) as orders_count,
//         COUNT(DISTINCT oplp.id) as order_prod_count,
//         SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
//         SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.amount ELSE 0 END)  AS value
//          FROM orders_process op
//         LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
//         LEFT JOIN customers c ON c.id = op.customer_id
//         WHERE
//         op.deleteid = '0' AND 
//         oplp.deleteid = '0' AND 
//         op.order_base != '0' AND
//         op.create_date BETWEEN '$formdate' AND '$todate'
//         $areaFilter 
//         GROUP BY
//         c.area
//         ORDER BY
//         c.area ASC";
        $resultReturns = $this->db->query("SELECT
        c.area,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN admin_users au ON au.id = osrc.user_id
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
        osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.area
        ")->result();

        $combinedArray = array();
        $returnsArr = array();
if($areaGet == '' || $areaGet == 'All'){
   foreach ($resultAll as $row) {
            $combinedArray[$row->area] = (object) $row;
        }
}
       


        foreach ($result as $row) {
            $key = $row->area;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->area = $row->area;
                $combinedArray[$key]->orders_count = $row->orders_count;
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }



        foreach ($resultReturns as $row) {
            $returnsArr[$row->area] = (object) $row;
        }

        foreach ($combinedArray as $row) {
            $key = $row->area;
            if (isset($returnsArr[$key])) {
                $combinedArray[$key]->ret_qty += $returnsArr[$key]->ret_qty;
                $combinedArray[$key]->ret_value += $returnsArr[$key]->ret_value;
            }
        }
        foreach ($resultAll as &$row) {
            if($combinedArray[$row->area]){
              $combinedArray[$row->area]->customers =$row->customers;
            }
        }
        $combinedArray = array_values($combinedArray);


        function sortByName($a, $b)
        {
            $orderByOrdersCount = strtolower($a->area) - strtolower($b->area);
            // $orderByQty = $b->area - $a->area;
            return $orderByOrdersCount  ;
        }
        ksort($combinedArray, 'sortByName');
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0, 'orders_count' => 0, 'order_prod_count' => 0];
        foreach ($combinedArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['orders_count'] += $row->orders_count;
            $row->value = round($row->value,4);
            $row->qty = round($row->qty,4);
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['customers'] += $row->customers;
            $row->actual_qty = $row->qty - $row->ret_qty;
            $row->actual_value = $row->value - $row->ret_value;
            $totals['ret_value'] += $row->ret_value;
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $totals['order_prod_count'] += $row->order_prod_count;
        }


        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }
    public function fetch_data_sales_product_area_wise_customer_report()
    {
        $areaGet = $_GET['area'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];

        $formdate2 = new DateTime($_GET['formdate']);
        $todate2 = new DateTime($_GET['todate']);
        $interval = $formdate2->diff($todate2);
        $months = $interval->format('%m') + (($interval->format('%y') * 12)) + 1;
        $interval = $formdate2->diff($todate2);

        $totalDays = 0;
        while ($formdate2 <= $todate2) {
            $totalDays += cal_days_in_month(CAL_GREGORIAN, $formdate2->format('m'), $formdate2->format('Y'));
            $formdate2->modify('+1 month');
        }




        $days = $interval->format('%a') + 1;
        $areaFilter = '';

        if ($areaGet != 'All' && $areaGet != '') {
            $areaFilter .= ' AND c.area IN (' . $areaGet . ') ';
        }
        if ($areaGet == '') {
            $areaFilter .= ' AND c.area IS NULL ';
        }
        $arrayMain = [];
        $result = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        c.id as customer_id,
        COUNT(DISTINCT op.id) as orders_count,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
         SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base != '0' AND
       
        c.approved_status > 0 AND
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.id
        ORDER BY
        c.area ASC")->result();
        $commaSeperatedCustomer = implode(', ', array_map(function ($obj) {
            if (is_object($obj) && isset($obj->customer_id)) {
                return strval($obj->customer_id);
            } elseif (is_array($obj) && isset($obj['customer_id'])) {
                return strval($obj['customer_id']);
            } else {
                return null; // Handle the case when 'product_id' is not found
            }
        }, $result));
        $sqlSpec = '';
        if ($commaSeperatedCustomer != '') {
            $sqlSpec .= ' AND c.id NOT IN (' . $commaSeperatedCustomer . ') ';
        }
        $resultInvert = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        c.id as customer_id
        FROM customers c 
        WHERE
        c.deleteid = 0  
        $sqlSpec
        $areaFilter 

        AND c.approved_status > 0
        GROUP BY
        c.id
        ORDER BY
        c.area ASC")->result();


        $resultReturns = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        osrc.customer as customer_id,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.id
        ")->result();


        $retArray = array();

        foreach ($resultReturns as $ret) {
            $retArray[$ret->customer_id] = $ret;
        }
        $mergedArray = array_merge($result, $resultInvert);

        foreach ($mergedArray as &$entry) {
            if (isset($retArray[$entry->customer_id])) {
                $entry->ret_qty += $retArray[$entry->customer_id]->ret_qty;
                $entry->ret_value += $retArray[$entry->customer_id]->ret_value;
            }
        }

        $mergedArray = array_values($mergedArray);

        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0, 'orders_count' => 0];
        $sno = 1;

        foreach ($mergedArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['orders_count'] += $row->orders_count;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty = $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
            // Corrected line


            $daysInMonth = $totalDays;
            //Target and days remaining calculation



            $row->target_value_wise_total = intval($row->target_value_wise) * $months;
            $row->target_value =  ($row->target_value_wise_total / $daysInMonth) * $days;
            if($row->target_value != 0){
            $row->perc =  ($row->actual_value / $row->target_value_wise_total) * 100;

          }else{
            $row->perc =  0;

          }


            $row->target_status = $row->target_value <= $row->actual_qty ? 'AHEAD' : 'UNDER TARGET';

            $row->sno = $sno;

            $sno++;
        }


        if ($_GET['filterStatus'] != 'true') {
            $mergedArray = $result;
        }

usort($mergedArray, function($a, $b) {
    return strcmp(strtolower($a->company_name), strtolower($b->company_name)); // Compare names alphabetically
});
$sno = 1;
foreach ($mergedArray as $key => &$value) {
   $value->sno = $sno;
   $sno++;
}
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }
    public function fetch_data_sales_product_area_wise_customer_report_export()
    {
        $areaGet = $_GET['area'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaFilter = '';

        if ($areaGet != 'All' && $areaGet != '') {
            $areaFilter .= ' AND c.area IN (' . $areaGet . ') ';
        }
        if ($areaGet == '') {
            $areaFilter .= ' AND c.area IS NULL ';
        }
        $arrayMain = [];
        $result = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        c.id as customer_id,
        COUNT(DISTINCT op.id) as orders_count,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
         SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base != '0' AND
       
         c.approved_status > 0 AND
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.id
        ORDER BY
        c.area ASC")->result();
        $commaSeperatedCustomer = implode(', ', array_map(function ($obj) {
            if (is_object($obj) && isset($obj->customer_id)) {
                return strval($obj->customer_id);
            } elseif (is_array($obj) && isset($obj['customer_id'])) {
                return strval($obj['customer_id']);
            } else {
                return null; // Handle the case when 'product_id' is not found
            }
        }, $result));
        $sqlSpec = '';
        if ($commaSeperatedCustomer != '') {
            $sqlSpec .= ' AND c.id NOT IN (' . $commaSeperatedCustomer . ') ';
        }
        $resultInvert = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        c.id as customer_id
        FROM customers c 
        WHERE
        c.deleteid = 0  
        $sqlSpec
        $areaFilter 
        AND c.approved_status > 0
        GROUP BY
        c.id
        ORDER BY
        c.area ASC")->result();


        $resultReturns = $this->db->query("SELECT
        c.company_name,
        c.target_value_wise,
        osrc.customer as customer_id,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.id
        ")->result();
        // print_r($resultReturns);
        // exit;
        $retArray = array();

        foreach ($resultReturns as $ret) {
            $retArray[$ret->customer_id] = $ret;
        }
        $mergedArray = array_merge($result, $resultInvert);

        foreach ($mergedArray as &$entry) {
            if (isset($retArray[$entry->customer_id])) {
                $entry->ret_qty += $retArray[$entry->customer_id]->ret_qty;
                $entry->ret_value += $retArray[$entry->customer_id]->ret_value;
            }
        }

        $mergedArray = array_values($mergedArray);

        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0, 'orders_count' => 0];
        $sno = 1;
        foreach ($mergedArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['orders_count'] += $row->orders_count;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
            $row->sno = $sno;

            $sno++;
        }

        if ($_GET['filterStatus'] != 'true') {
            $mergedArray = $result;
        }

usort($mergedArray, function($a, $b) {
    return strcmp(strtolower($a->company_name), strtolower($b->company_name)); // Compare names alphabetically
});
$sno = 1;
foreach ($mergedArray as $key => &$value) {
   $value->sno = $sno;
   $sno++;
}
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Product Report Area wise Customers ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_area_wise_customer_report_export', $arrayMain);
    }
    public function fetch_data_area_wise_details_report()
    {
        // $areaGet = $_GET['area'];
        $customerGet = $_GET['customer'];
        $category = $_GET['category'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaFilter = '';
        $categoryLog = '';
        $customerLog = '';
        // if ($areaGet != '') {
        //      $areaFilter = ' AND c.area  LIKE "%' . $areaGet . '%"  ';
        // }
        // if ($areaGet == '') {
        //     $areaFilter = ' AND c.area IS NULL  ';
        // } 
        if ($category != '') {
            $categoryLog .= ' AND pl.categories LIKE "%' . $category . '%"  ';
        } elseif ($category == 'null') {
            $categoryLog .= ' AND pl.categories  = "NULL"  ';
        } else {
            $categoryLog .= ' AND pl.categories  = ""  ';
        }

        if ($customerGet != '') {
            $customerLog .= ' AND c.id = "' . $customerGet . '"  ';
        } elseif ($customerGet == 'null') {
            $customerLog .= ' AND c.id  = "NULL"  ';
        } else {
            $customerLog .= ' AND c.id  = ""  ';
        }

        $arrayMain = [];

        $result = $this->db->query("SELECT
        c.area,
        pl.product_name as categories,
        oplp.id,
        op.order_no,
        oplp.order_id,
           (CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
         (CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
         LEFT JOIN product_list pl ON oplp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base != '0' AND
       
        oplp.qty IS NOT NULL AND
        op.create_date BETWEEN '$formdate' AND '$todate'
        $categoryLog
        $customerLog
        ORDER BY
        c.area ASC")->result();



        $resultReturns = $this->db->query("SELECT
        pl.product_name as categories,
        oplp.id,
        op.order_no,
        oplp.order_id,
        (srp.qty) AS ret_qty,
        (srp.qty * srp.rate) AS ret_value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN product_list pl ON oplp.product_id = pl.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
         LEFT JOIN sales_return_products srp ON srp.id = oplp.return_id
        LEFT JOIN order_sales_return_complaints osrc ON osrc.id = srp.c_id
        LEFT JOIN customers c ON osrc.customer = c.id
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $categoryLog
        $customerLog
        ")->result();

        $returnArr = array();
        $resultArr = array();
        $comArray = array();
        foreach ($resultReturns as $entry) {
            $returnArr[$entry->id] = $entry;
        }

        foreach ($result as $entry) {
            $comArray[] = $entry;
            $resultArr[$entry->id] = $entry;
        }

        foreach ($returnArr as &$entry) {
            if (isset($resultArr[$entry->id])) {
                $resultArr[$entry->id]->ret_value = $entry->ret_value;
                $resultArr[$entry->id]->ret_qty = $entry->ret_qty;
            } else {
                $comArray[] = (object) $entry;
            }
        }


        $comArray = array_values($comArray);
        $totals = ['area_qty' => 0, 'area_value' => 0, 'area_ret_value' => 0, 'area_ret_qty' => 0, 'area_actual_qty' => 0, 'area_actual_value' => 0];
        foreach ($comArray as &$row) {
            $totals['area_qty'] += $row->qty;
            $totals['area_value'] += $row->value;
            $totals['area_ret_qty'] += $row->ret_qty;
            $totals['area_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['area_actual_qty'] += $row->actual_qty;
            $totals['area_actual_value'] += $row->actual_value;
            // foreach ($object as $item) {
            //         if ($item->$key !== null && $item->$key !== 0) {
            //             return false;
            //         }
            // }
        }
        $arrayMain['data'] = $comArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }
    public function fetch_data_sale_product_area_wise_report_export()
    {
        $areaGet = $_GET['area'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaFilter = '';

        if ($areaGet != 'All' && $areaGet != '') {
            $areaFilter .= ' AND c.area IN (' . $areaGet . ') ';
        }

        $arrayMain = [];

        $resultAll = $this->db->query("SELECT
        c.area,
        COUNT(DISTINCT c.id) as customers
        FROM customers c 
        WHERE c.deleteid = 0
        AND c.approved_status > 0
        GROUP BY
        c.area
        ORDER BY
        c.area ASC")->result();

        // print_r($resultAll);

        $result = $this->db->query("SELECT
        c.area,
        COUNT(DISTINCT oplp.order_id) as orders_count,
        COUNT(DISTINCT oplp.id) as order_prod_count,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base > 0 AND
       
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.area
        ORDER BY
        c.area ASC")->result();

        $resultReturns = $this->db->query("SELECT
        c.area,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN admin_users au ON au.id = osrc.user_id
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaFilter 
        GROUP BY
        c.area
        ")->result();

        $combinedArray = array();
        $returnsArr = array();
if($areaGet == '' || $areaGet == 'All'){
   foreach ($resultAll as $row) {
            $combinedArray[$row->area] = (object) $row;
        }
}
       


        foreach ($result as $row) {
            $key = $row->area;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->area = $row->area;
                $combinedArray[$key]->orders_count = $row->orders_count;
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }



        foreach ($resultReturns as $row) {
            $returnsArr[$row->area] = (object) $row;
        }

        foreach ($combinedArray as $row) {
            $key = $row->area;
            if (isset($returnsArr[$key])) {
                $combinedArray[$key]->ret_qty += $returnsArr[$key]->ret_qty;
                $combinedArray[$key]->ret_value += $returnsArr[$key]->ret_value;
            }
        }
        foreach ($resultAll as &$row) {
            if($combinedArray[$row->area]){
              $combinedArray[$row->area]->customers =$row->customers;
            }
        }
        $combinedArray = array_values($combinedArray);


         function sortByName($a, $b)
        {
            $orderByOrdersCount = strtolower($a->area) - strtolower($b->area);
            // $orderByQty = $b->area - $a->area;
            return $orderByOrdersCount  ;
        }
        ksort($combinedArray, 'sortByName');
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0, 'orders_count' => 0, 'order_prod_count' => 0];
        foreach ($combinedArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['orders_count'] += $row->orders_count;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['customers'] += $row->customers;
            $row->actual_qty = $row->qty - $row->ret_qty;
            $row->actual_value = $row->value - $row->ret_value;
            $totals['ret_value'] += $row->ret_value;
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $totals['order_prod_count'] += $row->order_prod_count;
        }
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Product Report (Area wise) ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_area_wise_report_export', $arrayMain);
    }
    public function fetch_data_area_wise_details_report_export()
    {
        // $areaGet = $_GET['area'];
        $customerGet = $_GET['customer'];
        $category = $_GET['category'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaFilter = '';
        $categoryLog = '';
        $customerLog = '';
        // if ($areaGet != '') {
        //      $areaFilter = ' AND c.area  LIKE "%' . $areaGet . '%"  ';
        // }
        // if ($areaGet == '') {
        //     $areaFilter = ' AND c.area IS NULL  ';
        // } 
        if ($category != '') {
            $categoryLog .= ' AND pl.categories LIKE "%' . $category . '%"  ';
        } elseif ($category == 'null') {
            $categoryLog .= ' AND pl.categories  = "NULL"  ';
        } else {
            $categoryLog .= ' AND pl.categories  = ""  ';
        }

        if ($customerGet != '') {
            $customerLog .= ' AND c.id = "' . $customerGet . '"  ';
        } elseif ($customerGet == 'null') {
            $customerLog .= ' AND c.id  = "NULL"  ';
        } else {
            $customerLog .= ' AND c.id  = ""  ';
        }

        $arrayMain = [];
        $result = $this->db->query("SELECT
        c.area,
        pl.product_name as categories,
        oplp.id,
        op.order_no,
        oplp.order_id,
          (CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
         (CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM orders_process op
            LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN customers c ON c.id = op.customer_id
         LEFT JOIN product_list pl ON oplp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        WHERE
        op.deleteid = '0' AND 
        oplp.deleteid = '0' AND 
        op.order_base != '0' AND
       
        op.create_date BETWEEN '$formdate' AND '$todate'
        $categoryLog
        $customerLog
        ORDER BY
        c.area ASC")->result();


        $resultReturns = $this->db->query("SELECT
        c.area,
        pl.product_name as categories,
        oplp.id,
        op.order_no,
        oplp.order_id,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN product_list pl ON srp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        LEFT JOIN customers c ON c.id = osrc.customer
        LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
        LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $categoryLog
        $customerLog
        ")->result();

        $returnArr = array();
        $resultArr = array();
        $comArray = array();
        foreach ($resultReturns as $entry) {
            $returnArr[$entry->categories] = $entry;
        }

        foreach ($result as $entry) {
            $comArray[] = $entry;
            $resultArr[$entry->categories] = $entry;
        }

        foreach ($returnArr as &$entry) {
            if (isset($resultArr[$entry->categories])) {
                $resultArr[$entry->categories]->ret_value = $entry->ret_value;
                $resultArr[$entry->categories]->ret_qty = $entry->ret_qty;
            } else {
                $comArray[] = (object) $entry;
            }
        }


        $comArray = array_values($comArray);
        $totals = ['area_qty' => 0, 'area_value' => 0, 'area_ret_value' => 0, 'area_ret_qty' => 0, 'area_actual_qty' => 0, 'area_actual_value' => 0];
        foreach ($comArray as &$row) {
            $totals['brand_qty'] += $row->qty;
            $totals['brand_value'] += $row->value;
            $totals['brand_ret_qty'] += $row->ret_qty;
            $totals['brand_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['brand_actual_qty'] += $row->actual_qty;
            $totals['brand_actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
        }
        $arrayMain['data'] = $comArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Product Report (Area wise) Detail ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        $this->load->view('other_reports/sale_product_brand_detail_report_export', $arrayMain);
    }

    public function sale_product_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names_two_order_by('admin_users', 'deleteid', 0, 'access', 12, 'id', 'ASC');

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function fetch_data_sales_product_report()
    {
        $cateid = $_GET['order_status'];
        $sales_group = $_GET['sales_group'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $filterStatus = $_GET['active_status'];



        $stat = ' ';
        $userslog = "";
        $usersgroup = "";
        if ($cateid != 'ALL') {
            $userslog .= ' AND b.sales_member_id="' . $cateid . '"';
        }

        if ($sales_group != 'ALL') {

            $a = ' AND a.id = "' . $sales_group . '"';
        }






        if ($this->session->userdata['logged_in']['access'] == '17') {

            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }


            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }
        $month = date('Y-m-01', strtotime($formdate));
        $tomonth = date('Y-m-01', strtotime($todate));
        $formdate2 = new DateTime($_GET['formdate']);
        $todate2 = new DateTime($_GET['todate']);
        $interval = $formdate2->diff($todate2);
        $months = $interval->format('%m') + (($interval->format('%y') * 12)) + 1;
        $interval = $formdate2->diff($todate2);

        $totalDays = 0;
        while ($formdate2 <= $todate2) {
            $totalDays += cal_days_in_month(CAL_GREGORIAN, $formdate2->format('m'), $formdate2->format('Y'));
            $formdate2->modify('+1 month');
        }




        $days = $interval->format('%a') + 1;
        $areaFilter = '';


        // if($month < date('Y-m-01', strtotime($todate))){
        //     $month = date('Y-m-01', strtotime($todate));
        // }
        // $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 $a  $userslog $usersgroup  GROUP BY a.id ORDER BY a.name ASC");

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND aa.sales_group_id != 40  AND aa.sales_group_id != 41  $userslog  $a $usersgroup GROUP BY a.id ORDER BY a.name ASC");


        $result = $result->result();
        $array = array();
        $arrayMain = array();
        $i = 0;
        $gTotals = array();

        //Total days in month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($formdate)), date('Y', strtotime($formdate)));
        function refineValue($no)
        {
            if (is_numeric($no)) {
                return round($no, 2);
            } else {
                return 0;
            }
        }
        foreach ($result as $valuessg) {
            $salesperson = [];
            $totals = [];

            $resultsubdata = $this->db->query("SELECT aa.username,aa.id ,aa.status  FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801  AND a.id='" . $valuessg->sales_group_id . "'    $userslog $usersgroup     GROUP BY aa.id ORDER BY aa.name ASC");
            $get_sales_person = $resultsubdata->result();

            //             $salesPersons = [];
            //             foreach ($get_sales_person as $sl) {
            //                 $salesPersons[] = $sl->id;
            //             }
            //             $salesPersons = implode(",", $salesPersons);


            foreach ($get_sales_person as $valueget) {
                //Default array per result
                $salesData = array(
                    array("field_name" => "accessories", "cat_id" => 1),
                    array("field_name" => "aluminium", "cat_id" => 36),
                    array("field_name" => "cleat", "cat_id" => 41),
                    array("field_name" => "decking_sheet", "cat_id" => 34),
                    array("field_name" => "extra_sheet_arch", "cat_id" => 582),
                    array("field_name" => "fan_base", "cat_id" => 17),
                    array("field_name" => "sheet", "cat_id" => 3),
                    array("field_name" => "multi_wall", "cat_id" => 20),
                    array("field_name" => "poly_corbonate", "cat_id" => 19),
                    array("field_name" => "polynum", "cat_id" => 13),
                    array("field_name" => "profile_ridge_arch", "cat_id" => 32),
                    array("field_name" => "puff_panels", "cat_id" => 30),
                    array("field_name" => "purlin", "cat_id" => 5),
                    array("field_name" => "screw", "cat_id" => 7),
                    array("field_name" => "screw_accessories", "cat_id" => 9),
                    array("field_name" => "tile_sheet", "cat_id" => 26),
                    array("field_name" => "upvc_item", "cat_id" => 15),
                    array("field_name" => "standing_seam", "cat_id" => 603),
                    array("field_name" => "standing_seam_clips", "cat_id" => 604),
                    array("field_name" => "rock_wool", "cat_id" => 11),
                    array("field_name" => "conversion", "cat_id" => 581),
                    array("field_name" => "rent", "cat_id" => 584),
                    array("field_name" => "hr_plate", "cat_id" => 613),
                    array("field_name" => "liner_sheet", "cat_id" => 590),
                    array("field_name" => "wall_sheet", "cat_id" => 607),
                    array("field_name" => "roll_sheet", "cat_id" => 593),
                    array("field_name" => "puff_panel_accessories", "cat_id" => 618),
                    array("field_name" => "purlin_accessories", "cat_id" => 616),
                    array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
                );
                //Products in category for salesperson
                $prodQuery = [];

                $prodQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.categories_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.categories_id IN (1,36,13,41,34,582,17,3,20,19,32,30,5,7,9,26,15,603,604,11,581,584,613,590,20,593,591,618,616,595,599,40,24,39) AND a.order_base > 0 AND a.customer_id NOT IN (33334,37743) AND a.deleteid='0' AND op.deleteid=0 AND a.user_id = '" . $valueget->id . "' AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.categories_id")->result();
                //Target in category for salesperson

                $targetQuery = $this->db->query("SELECT  SUM(modified_value) as modified_value,field FROM report_changes WHERE salesman_id = '" . $valueget->id . "' AND report_name = 'sales_product_unit_wise' AND  for_date BETWEEN '" . $month . "' AND '" . $tomonth . "' GROUP BY  field,salesman_id")->result();

                $returnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.categories_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
                WHERE (sg.sales_member_id = '" . $valueget->id . "')  AND a.order_base = '5'  AND a.id != 2423 AND a.customer NOT IN (33334,37743) AND
                                a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.categories_id ")->result();

                $deckRollSheetProdId = 1047;
                $rollSheetSqmProdId = 689;

                $rollSheetCatId = 591;

                $deckSheetCatId = 34;
                $sheetCatId = 3;

                $spoudCatId = 595;
                $spanRidgeCatId = 599;

                $specProsQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.product_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId) AND a.customer_id NOT IN (33334,37743) AND a.order_base > 0 AND a.deleteid='0' AND op.deleteid=0 AND a.user_id = '" . $valueget->id . "' AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.product_id")->result();

                $specProdsreturnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.product_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
                WHERE sr.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId) AND (sg.sales_member_id = '" . $valueget->id . "')  AND a.order_base = '5' AND a.id != 2423  AND  a.customer NOT IN (33334,37743) AND
                a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.product_id ")->result();

                $netProductSales = [];
                foreach ($specProsQuery as $prods) {
                    $netProductSales[$prods->product_id]['qty'] = $prods->qty;
                }
                $netProductReturns = [];
                foreach ($specProdsreturnsQuery as $prods) {
                    $netProductReturns[$prods->product_id]['qty'] = $prods->qty;
                }


                $actualSales = [];
                // print_r($returnsQuery);
                //Assign index as category and set value categories_id,qty
                foreach ($prodQuery as $prods) {
                    $actualSales[$prods->categories_id]['qty'] = $prods->qty;
                }

                //Assign index as category and set value modified_value (target), field (cate_id)
                $targetSales = [];
                foreach ($targetQuery as $targets) {
                    $targetSales[$targets->field]['modified_value'] = $targets->modified_value;
                }

                //Assign index as category and set value modified_value (target), field (cate_id)
                $returnSales = [];
                foreach ($returnsQuery as $returns) {
                    $returnSales[$returns->categories_id]['returns'] = $returns->qty;
                }

                //Remapping all values
                foreach ($salesData as &$row) {
                    //salesperson value
                    $row['overall'] = $actualSales[$row['cat_id']]['qty'] ? round($actualSales[$row['cat_id']]['qty'], 2) : 0;
                    if ($row['cat_id'] == $rollSheetCatId) {
                        $row['overall'] = refineValue($row['overall'] - $netProductSales[$rollSheetSqmProdId]['qty'] - $netProductSales[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $deckSheetCatId) {
                        $row['overall'] =  refineValue($row['overall'] + $netProductSales[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $sheetCatId) {
                        $row['overall'] =  refineValue($row['overall'] + $netProductSales[$rollSheetSqmProdId]['qty']);
                    }
                    if ($row['cat_id'] == 9) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[$spoudCatId]['qty']);
                    }
                    if ($row['cat_id'] == 26) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[$spanRidgeCatId]['qty']);
                    }
                    if ($row['cat_id'] == 41) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[40]['qty'] + $actualSales[24]['qty'] + $actualSales[39]['qty']);
                    }
                    //group total value
                    $totals[$row['cat_id']]['overall'] += $row['overall'];

                    //Grand total
                    $gTotals[$row['cat_id']]['overall'] += $row['overall'];

                    //for targets
                    $row['target'] = $targetSales[$row['cat_id']]['modified_value'] ? round($targetSales[$row['cat_id']]['modified_value'], 2) : 0;
                    $totals[$row['cat_id']]['target'] += $row['target'];
                    $gTotals[$row['cat_id']]['target'] += $row['target'];

                    $row['returns'] = $returnSales[$row['cat_id']]['returns'] ? round($returnSales[$row['cat_id']]['returns'], 2) : 0;
                    if ($row['cat_id'] == $rollSheetCatId) {
                        $row['returns'] =  refineValue($row['returns'] - $netProductReturns[$rollSheetSqmProdId]['qty'] - $netProductReturns[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $deckSheetCatId) {
                        $row['returns'] =  refineValue($row['returns'] + $netProductReturns[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $sheetCatId) {
                        $row['returns'] = refineValue($row['returns'] + $netProductReturns[$rollSheetSqmProdId]['qty']);
                    }
                    if ($row['cat_id'] == 9) {
                        $row['returns'] =  refineValue($row['returns'] + $returnSales[$spoudCatId]['qty']);
                    }
                    if ($row['cat_id'] == 26) {
                        $row['returns'] =  refineValue($row['returns'] + $returnSales[$spanRidgeCatId]['qty']);
                    }
                    if ($row['cat_id'] == 41) {
                        $row['returns'] =   refineValue($row['returns'] + $returnSales[40]['qty'] + $returnSales[24]['qty'] + $returnSales[39]['qty']);
                    }
                    $totals[$row['cat_id']]['returns'] += $row['returns'];
                    $gTotals[$row['cat_id']]['returns'] += $row['returns'];

                    $row['actual'] = ($row['overall'] - $row['returns']) ? round($row['overall'] - $row['returns'], 2) : 0;
                    $totals[$row['cat_id']]['actual'] += $row['actual'];
                    $gTotals[$row['cat_id']]['actual'] += $row['actual'];

                    $reqTarget = ($row['target'] / $totalDays) * $days;
                    $row['required_target'] = $reqTarget ?  round($reqTarget, 2) : 0;
                    $row['status'] = $reqTarget > $row['overall'] ? 0 : 1;
                }
                //active/inactive
                if ($filterStatus == 'true' || $valueget->status == '1') {
                    $salesperson[] = array(
                        'sales_team_id' => $valueget->id,
                        'sales_person_name' => $valueget->username,
                        'sales_data' => $salesData,
                    );
                    $i++;
                }
            }

            $totalTeam = array();
            //Remapping all values for totalTeam
            foreach ($totals as $key => $entry) {
                $totalTeam[] = array('cat_id' => $key, 'overall_total' => round($entry['overall'], 2), 'actual_total' => round($entry['actual'], 2), 'target_total' => round($entry['target'], 2));
            }
            $array[] = array(
                'no' => $i,
                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'salesperson' => $salesperson,
                'totals' => $totalTeam
            );
            $i++;
        }


        $gTotalFinal = array();
        //Remapping all values for gTotalFinal
        foreach ($gTotals as $key => $entry) {
            $gTotalFinal[] = array('cat_id' => $key, 'overall_total' => round($entry['overall'], 2), 'actual_total' => round($entry['actual'], 2), 'target_total' => round($entry['target'], 2));
        }
        $arrayMain[] = $array;
        $arrayMain['topaaz'] = $this->generateReportSpecific(33334, $formdate, $todate, $gTotalFinal)['res'];
        $gTotalFinal = $this->generateReportSpecific(33334, $formdate, $todate, $gTotalFinal)['totals'];
        $arrayMain['arasf'] =  $this->generateReportSpecific(37743, $formdate, $todate, $gTotalFinal)['res'];
        // $gTotalFinal = $this->generateReportSpecific(37743,$formdate,$todate,$gTotalFinal)['totals'];
        $arrayMain['totals'] = $this->generateReportSpecific(37743, $formdate, $todate, $gTotalFinal)['totals'];
        echo json_encode($arrayMain);
    }

    public function changeReportValues()
    {
        // date_default_timezone_set('Asia/Kolkata');
        //load db
        $this->load->database();
        $form_data = json_decode(file_get_contents("php://input"));
        //for select
        $this->db->select('rc.id');
        $this->db->from('report_changes rc');
        $this->db->where('rc.report_name', 'sale_product_report');
        $this->db->where('rc.salesman_id', $form_data->salesman_id);
        $this->db->where('rc.field', $form_data->cate_id);
        $query = $this->db->get()->result();
        //if no entries, inserting
        if (count($query) == 0) {
            $input = array(
                'report_name' => 'sale_product_report',
                'field' =>  $form_data->cate_id,
                'modified_value' =>  $form_data->modified_value,
                'salesman_id' => $form_data->salesman_id
            );
            $this->db->insert('report_changes', $input);
        } else {
            //if available, updating value
            $this->db->where('report_name', 'sale_product_report');
            $this->db->where('salesman_id', $form_data->salesman_id);
            $this->db->where('field', $form_data->cate_id);
            $this->db->set('modified_value', $form_data->modified_value);
            $this->db->update('report_changes');
        }
    }

    public function generateReportSpecific($cId, $formdate, $todate, $gTotalFinal)
    {
        $salesData = array(
            array("field_name" => "accessories", "cat_id" => 1),
            array("field_name" => "aluminium", "cat_id" => 36),
            array("field_name" => "cleat", "cat_id" => 41),
            array("field_name" => "decking_sheet", "cat_id" => 34),
            array("field_name" => "extra_sheet_arch", "cat_id" => 582),
            array("field_name" => "fan_base", "cat_id" => 17),
            array("field_name" => "sheet", "cat_id" => 3),
            array("field_name" => "multi_wall", "cat_id" => 20),
            array("field_name" => "poly_corbonate", "cat_id" => 19),
            array("field_name" => "polynum", "cat_id" => 13),
            array("field_name" => "profile_ridge_arch", "cat_id" => 32),
            array("field_name" => "puff_panels", "cat_id" => 30),
            array("field_name" => "purlin", "cat_id" => 5),
            array("field_name" => "screw", "cat_id" => 7),
            array("field_name" => "screw_accessories", "cat_id" => 9),
            array("field_name" => "tile_sheet", "cat_id" => 26),
            array("field_name" => "upvc_item", "cat_id" => 15),
            array("field_name" => "standing_seam", "cat_id" => 603),
            array("field_name" => "standing_seam_clips", "cat_id" => 604),
            array("field_name" => "rock_wool", "cat_id" => 11),
            array("field_name" => "conversion", "cat_id" => 581),
            array("field_name" => "rent", "cat_id" => 584),
            array("field_name" => "hr_plate", "cat_id" => 613),
            array("field_name" => "liner_sheet", "cat_id" => 590),
            array("field_name" => "wall_sheet", "cat_id" => 607),
            array("field_name" => "roll_sheet", "cat_id" => 593),
            array("field_name" => "puff_panel_accessories", "cat_id" => 618),
            array("field_name" => "purlin_accessories", "cat_id" => 616),
             array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
        );
        //Products in category for salesperson
        $prodQuery = [];


        $prodQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.categories_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.categories_id IN (1,36,13,41,34,582,17,3,20,19,32,30,5,7,9,26,15,603,604,11,581,584,613,590,20,593,591,618,616,595,599,40,24,39) AND a.deleteid='0' AND a.order_base > 0 AND op.deleteid=0 AND b.id = '" . $cId . "' AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.categories_id")->result();



        $returnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.categories_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
        WHERE  a.customer = '" . $cId . "'  AND a.remarks = 'Return To Re-sale' AND a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.categories_id ")->result();


        $deckRollSheetProdId = 1047;
        $rollSheetSqmProdId = 689;

        $rollSheetCatId = 591;

        $deckSheetCatId = 34;
        $sheetCatId = 3;

        $spoudCatId = 595;
        $spanRidgeCatId = 599;

        $specProsQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.product_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId) AND b.id = '" . $cId . "' AND a.order_base > 0 AND a.deleteid='0' AND op.deleteid=0 AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.product_id")->result();

        $specProdsreturnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.product_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
                WHERE sr.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId)  AND b.id = '" . $cId . "' AND a.remarks = 'Return To Re-sale' AND
                a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.product_id ")->result();



        $netProductSales = [];
        foreach ($specProsQuery as $prods) {
            $netProductSales[$prods->product_id]['qty'] = $prods->qty;
        }
        $netProductReturns = [];
        foreach ($specProdsreturnsQuery as $prods) {
            $netProductReturns[$prods->product_id]['qty'] = $prods->qty;
        }


        $actualSales = [];
        //Assign index as category and set value categories_id,qty
        foreach ($prodQuery as $prods) {
            $actualSales[$prods->categories_id]['qty'] = $prods->qty;
        }

        //Assign index as category and set value modified_value (target), field (cate_id)
        $returnSales = [];
        foreach ($returnsQuery as $returns) {
            $returnSales[$returns->categories_id]['returns'] = $returns->qty;
        }
        $res = array();
        foreach ($salesData as $entry) {
            if ($entry['cat_id'] == $rollSheetCatId) {
                $entry['overall'] = refineValue($entry['overall'] - $netProductSales[$rollSheetSqmProdId]['qty'] - $netProductSales[$deckRollSheetProdId]['qty']);
            }
            if ($entry['cat_id'] == $deckSheetCatId) {
                $entry['overall'] =  refineValue($entry['overall'] + $netProductSales[$deckRollSheetProdId]['qty']);
            }
            if ($entry['cat_id'] == $sheetCatId) {
                $entry['overall'] =  refineValue($entry['overall'] + $netProductSales[$rollSheetSqmProdId]['qty']);
            }
            if ($entry['cat_id'] == 9) {
                $entry['overall'] =   refineValue($entry['overall'] + $actualSales[$spoudCatId]['qty']);
            }
            if ($entry['cat_id'] == 26) {
                $entry['overall'] =   refineValue($entry['overall'] + $actualSales[$spanRidgeCatId]['qty']);
            }
            if ($entry['cat_id'] == 41) {
                $entry['overall'] =   refineValue($entry['overall'] + $actualSales[40]['qty'] + $actualSales[24]['qty'] + $actualSales[39]['qty']);
            }

            if ($entry['cat_id'] == $rollSheetCatId) {
                $entry['returns'] =  refineValue($entry['returns'] - $netProductReturns[$rollSheetSqmProdId]['qty'] - $netProductReturns[$deckRollSheetProdId]['qty']);
            }
            if ($entry['cat_id'] == $deckSheetCatId) {
                $entry['returns'] =  refineValue($entry['returns'] + $netProductReturns[$deckRollSheetProdId]['qty']);
            }
            if ($entry['cat_id'] == $sheetCatId) {
                $entry['returns'] = refineValue($entry['returns'] + $netProductReturns[$rollSheetSqmProdId]['qty']);
            }
            if ($entry['cat_id'] == 9) {
                $entry['returns'] =  refineValue($entry['returns'] + $returnSales[$spoudCatId]['qty']);
            }
            if ($entry['cat_id'] == 26) {
                $entry['returns'] =  refineValue($entry['returns'] + $returnSales[$spanRidgeCatId]['qty']);
            }
            if ($entry['cat_id'] == 41) {
                $entry['returns'] =   refineValue($entry['returns'] + $returnSales[40]['qty'] + $returnSales[24]['qty'] + $returnSales[39]['qty']);
            }
            $woReturns = $actualSales[$entry['cat_id']]['qty'] - $returnSales[$entry['cat_id']]['qty'];
            foreach ($gTotalFinal as &$total) {
                if ($total['cat_id'] == $entry['cat_id']) {
                    $total['actual_total'] =  round($total['actual_total'] + $woReturns, 2);
                }
            }
            $res[] = array('cat_id' => $entry['cat_id'], 'returns' => $returnSales[$entry['cat_id']]['qty'], 'actual' =>  round($woReturns, 2));
        }
        // $gTotalFinal = $totalRef;
        return array('res' => $res, 'totals' => $gTotalFinal);
    }

    public function fetch_data_sales_product_report_export()
    {
        $cateid = $_GET['order_status'];
        $sales_group = $_GET['sales_group'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $filterStatus = $_GET['active_status'];



        $stat = ' ';
        $userslog = "";
        $usersgroup = "";
        if ($cateid != 'ALL') {
            $userslog .= ' AND b.sales_member_id="' . $cateid . '"';
        }

        if ($sales_group != 'ALL') {

            $a = ' AND a.id = "' . $sales_group . '"';
        }






        if ($this->session->userdata['logged_in']['access'] == '17') {

            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }


            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }
        $month = date('Y-m-01', strtotime($formdate));
        $tomonth = date('Y-m-01', strtotime($todate));
        $formdate2 = new DateTime($_GET['formdate']);
        $todate2 = new DateTime($_GET['todate']);
        $interval = $formdate2->diff($todate2);
        $months = $interval->format('%m') + (($interval->format('%y') * 12)) + 1;
        $interval = $formdate2->diff($todate2);

        $totalDays = 0;
        while ($formdate2 <= $todate2) {
            $totalDays += cal_days_in_month(CAL_GREGORIAN, $formdate2->format('m'), $formdate2->format('Y'));
            $formdate2->modify('+1 month');
        }




        $days = $interval->format('%a') + 1;
        $areaFilter = '';


        // if($month < date('Y-m-01', strtotime($todate))){
        //     $month = date('Y-m-01', strtotime($todate));
        // }
        // $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 $a  $userslog $usersgroup  GROUP BY a.id ORDER BY a.name ASC");

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND aa.sales_group_id != 40  AND aa.sales_group_id != 41  $userslog  $a $usersgroup GROUP BY a.id ORDER BY a.name ASC");


        $result = $result->result();
        $array = array();
        $arrayMain = array();
        $i = 0;
        $gTotals = array();

        //Total days in month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($formdate)), date('Y', strtotime($formdate)));
        function refineValue($no)
        {
            if (is_numeric($no)) {
                return round($no, 2);
            } else {
                return 0;
            }
        }
        
        foreach ($result as $valuessg) {
            $salesperson = [];
            $totals = [];

            $resultsubdata = $this->db->query("SELECT aa.username,aa.id ,aa.status  FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801  AND a.id='" . $valuessg->sales_group_id . "'    $userslog $usersgroup     GROUP BY aa.id ORDER BY aa.name ASC");
            $get_sales_person = $resultsubdata->result();

            //             $salesPersons = [];
            //             foreach ($get_sales_person as $sl) {
            //                 $salesPersons[] = $sl->id;
            //             }
            //             $salesPersons = implode(",", $salesPersons);

            foreach ($get_sales_person as $valueget) {
                //Default array per result
                $salesData = array(
                    array("field_name" => "accessories", "cat_id" => 1),
                    array("field_name" => "aluminium", "cat_id" => 36),
                    array("field_name" => "cleat", "cat_id" => 41),
                    array("field_name" => "decking_sheet", "cat_id" => 34),
                    array("field_name" => "extra_sheet_arch", "cat_id" => 582),
                    array("field_name" => "fan_base", "cat_id" => 17),
                    array("field_name" => "sheet", "cat_id" => 3),
                    array("field_name" => "multi_wall", "cat_id" => 20),
                    array("field_name" => "poly_corbonate", "cat_id" => 19),
                    array("field_name" => "polynum", "cat_id" => 13),
                    array("field_name" => "profile_ridge_arch", "cat_id" => 32),
                    array("field_name" => "puff_panels", "cat_id" => 30),
                    array("field_name" => "purlin", "cat_id" => 5),
                    array("field_name" => "screw", "cat_id" => 7),
                    array("field_name" => "screw_accessories", "cat_id" => 9),
                    array("field_name" => "tile_sheet", "cat_id" => 26),
                    array("field_name" => "upvc_item", "cat_id" => 15),
                    array("field_name" => "standing_seam", "cat_id" => 603),
                    array("field_name" => "standing_seam_clips", "cat_id" => 604),
                    array("field_name" => "rock_wool", "cat_id" => 11),
                    array("field_name" => "conversion", "cat_id" => 581),
                    array("field_name" => "rent", "cat_id" => 584),
                    array("field_name" => "hr_plate", "cat_id" => 613),
                    array("field_name" => "liner_sheet", "cat_id" => 590),
                    array("field_name" => "wall_sheet", "cat_id" => 607),
                    array("field_name" => "roll_sheet", "cat_id" => 593),
                    array("field_name" => "puff_panel_accessories", "cat_id" => 618),
                    array("field_name" => "purlin_accessories", "cat_id" => 616),
                      array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
                     array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
                );
                //Products in category for salesperson
                $prodQuery = [];

                $prodQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.categories_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.categories_id IN (1,36,13,41,34,582,17,3,20,19,32,30,5,7,9,26,15,603,604,11,581,584,613,590,20,593,591,618,616,595,599,40,24,39) AND a.order_base > 0 AND a.customer_id NOT IN (33334,37743) AND a.deleteid='0' AND op.deleteid=0 AND a.user_id = '" . $valueget->id . "' AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.categories_id")->result();
                //Target in category for salesperson

                $targetQuery = $this->db->query("SELECT  SUM(modified_value) as modified_value,field FROM report_changes WHERE salesman_id = '" . $valueget->id . "' AND report_name = 'sales_product_unit_wise' AND  for_date BETWEEN '" . $month . "' AND '" . $tomonth . "' GROUP BY  field,salesman_id")->result();

                $returnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.categories_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
                WHERE (sg.sales_member_id = '" . $valueget->id . "')  AND a.order_base = '5'  AND a.id != 2423 AND a.customer NOT IN (33334,37743) AND
                                a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.categories_id ")->result();

                $deckRollSheetProdId = 1047;
                $rollSheetSqmProdId = 689;

                $rollSheetCatId = 591;

                $deckSheetCatId = 34;
                $sheetCatId = 3;

                $spoudCatId = 595;
                $spanRidgeCatId = 599;

                $specProsQuery = $this->db->query("SELECT SUM(op.qty) as qty ,op.product_id FROM orders_process as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as c ON a.user_id=c.id  JOIN order_product_list_process as op ON a.id=op.order_id WHERE op.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId) AND a.customer_id NOT IN (33334,37743) AND a.order_base > 0 AND a.deleteid='0' AND op.deleteid=0 AND a.user_id = '" . $valueget->id . "' AND a.create_date BETWEEN '" . $formdate . " 00:00:00' AND '" . $todate . " 23:59:59' AND op.product_id>0 GROUP BY op.product_id")->result();

                $specProdsreturnsQuery = $this->db->query("SELECT SUM(sr.qty) as qty, sr.product_id FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id JOIN sales_return_products sr ON a.id = sr.c_id 
                WHERE sr.product_id IN ( $deckRollSheetProdId, $rollSheetSqmProdId) AND (sg.sales_member_id = '" . $valueget->id . "')  AND a.order_base = '5' AND a.id != 2423  AND  a.customer NOT IN (33334,37743) AND
                a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "' GROUP BY sr.product_id ")->result();

                $netProductSales = [];
                foreach ($specProsQuery as $prods) {
                    $netProductSales[$prods->product_id]['qty'] = $prods->qty;
                }
                $netProductReturns = [];
                foreach ($specProdsreturnsQuery as $prods) {
                    $netProductReturns[$prods->product_id]['qty'] = $prods->qty;
                }


                $actualSales = [];
                // print_r($returnsQuery);
                //Assign index as category and set value categories_id,qty
                foreach ($prodQuery as $prods) {
                    $actualSales[$prods->categories_id]['qty'] = $prods->qty;
                }

                //Assign index as category and set value modified_value (target), field (cate_id)
                $targetSales = [];
                foreach ($targetQuery as $targets) {
                    $targetSales[$targets->field]['modified_value'] = $targets->modified_value;
                }

                //Assign index as category and set value modified_value (target), field (cate_id)
                $returnSales = [];
                foreach ($returnsQuery as $returns) {
                    $returnSales[$returns->categories_id]['returns'] = $returns->qty;
                }

                //Remapping all values
                foreach ($salesData as &$row) {
                    //salesperson value
                    $row['overall'] = $actualSales[$row['cat_id']]['qty'] ? round($actualSales[$row['cat_id']]['qty'], 2) : 0;
                    if ($row['cat_id'] == $rollSheetCatId) {
                        $row['overall'] = refineValue($row['overall'] - $netProductSales[$rollSheetSqmProdId]['qty'] - $netProductSales[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $deckSheetCatId) {
                        $row['overall'] =  refineValue($row['overall'] + $netProductSales[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $sheetCatId) {
                        $row['overall'] =  refineValue($row['overall'] + $netProductSales[$rollSheetSqmProdId]['qty']);
                    }
                    if ($row['cat_id'] == 9) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[$spoudCatId]['qty']);
                    }
                    if ($row['cat_id'] == 26) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[$spanRidgeCatId]['qty']);
                    }
                    if ($row['cat_id'] == 41) {
                        $row['overall'] =   refineValue($row['overall'] + $actualSales[40]['qty'] + $actualSales[24]['qty'] + $actualSales[39]['qty']);
                    }
                    //group total value
                    $totals[$row['cat_id']]['overall'] += $row['overall'];

                    //Grand total
                    $gTotals[$row['cat_id']]['overall'] += $row['overall'];

                    //for targets
                    $row['target'] = $targetSales[$row['cat_id']]['modified_value'] ? round($targetSales[$row['cat_id']]['modified_value'], 2) : 0;
                    $totals[$row['cat_id']]['target'] += $row['target'];
                    $gTotals[$row['cat_id']]['target'] += $row['target'];

                    $row['returns'] = $returnSales[$row['cat_id']]['returns'] ? round($returnSales[$row['cat_id']]['returns'], 2) : 0;
                    if ($row['cat_id'] == $rollSheetCatId) {
                        $row['returns'] =  refineValue($row['returns'] - $netProductReturns[$rollSheetSqmProdId]['qty'] - $netProductReturns[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $deckSheetCatId) {
                        $row['returns'] =  refineValue($row['returns'] + $netProductReturns[$deckRollSheetProdId]['qty']);
                    }
                    if ($row['cat_id'] == $sheetCatId) {
                        $row['returns'] = refineValue($row['returns'] + $netProductReturns[$rollSheetSqmProdId]['qty']);
                    }
                    if ($row['cat_id'] == 9) {
                        $row['returns'] =  refineValue($row['returns'] + $returnSales[$spoudCatId]['qty']);
                    }
                    if ($row['cat_id'] == 26) {
                        $row['returns'] =  refineValue($row['returns'] + $returnSales[$spanRidgeCatId]['qty']);
                    }
                    if ($row['cat_id'] == 41) {
                        $row['returns'] =   refineValue($row['returns'] + $returnSales[40]['qty'] + $returnSales[24]['qty'] + $returnSales[39]['qty']);
                    }
                    $totals[$row['cat_id']]['returns'] += $row['returns'];
                    $gTotals[$row['cat_id']]['returns'] += $row['returns'];

                    $row['actual'] = ($row['overall'] - $row['returns']) ? round($row['overall'] - $row['returns'], 2) : 0;
                    $totals[$row['cat_id']]['actual'] += $row['actual'];
                    $gTotals[$row['cat_id']]['actual'] += $row['actual'];

                    $reqTarget = ($row['target'] / $totalDays) * $days;
                    $row['required_target'] = $reqTarget ?  round($reqTarget, 2) : 0;
                    $row['status'] = $reqTarget > $row['overall'] ? 0 : 1;
                }
                //active/inactive
                if ($filterStatus == 'true' || $valueget->status == '1') {
                    $salesperson[] = array(
                        'sales_team_id' => $valueget->id,
                        'sales_person_name' => $valueget->username,
                        'sales_data' => $salesData,
                    );
                    $i++;
                }
            }

            $totalTeam = array();
            //Remapping all values for totalTeam
            foreach ($totals as $key => $entry) {
                $totalTeam[] = array('cat_id' => $key, 'overall_total' => round($entry['overall'], 2), 'actual_total' => round($entry['actual'], 2), 'target_total' => round($entry['target'], 2));
            }
            $array[] = array(
                'no' => $i,
                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'salesperson' => $salesperson,
                'totals' => $totalTeam
            );
            $i++;
        }


        $gTotalFinal = array();
        //Remapping all values for gTotalFinal
        foreach ($gTotals as $key => $entry) {
            $gTotalFinal[] = array('cat_id' => $key, 'overall_total' => round($entry['overall'], 2), 'actual_total' => round($entry['actual'], 2), 'target_total' => round($entry['target'], 2));
        }
        $arrayMain[] = $array;
        $arrayMain['topaaz'] = $this->generateReportSpecific(33334, $formdate, $todate, $gTotalFinal)['res'];
        $gTotalFinal = $this->generateReportSpecific(33334, $formdate, $todate, $gTotalFinal)['totals'];
        $arrayMain['arasf'] =  $this->generateReportSpecific(37743, $formdate, $todate, $gTotalFinal)['res'];
        // $gTotalFinal = $this->generateReportSpecific(37743,$formdate,$todate,$gTotalFinal)['totals'];
        $arrayMain['totals'] = $this->generateReportSpecific(37743, $formdate, $todate, $gTotalFinal)['totals'];
        $data['result'] = $arrayMain;
        $filename = 'Sale Product Report(Unit wise) ' . $formdate . ' to ' . $todate;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");


        $this->load->view('other_reports/sale_product_report_export', $data);
    }

    public function fetch_data_sales_team_report()
    {

        $customer_id = $_GET['customer_id'];
        $cateid = $_GET['sales_group'];
        $filterStatus = $_GET['active_status'];
        //  $sales_group=$_GET['sales_group'];
        $productid = $_GET['productid'];
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $order_status = $_GET['order_status'];
        $payment_mode = $_GET['payment_mode'];

        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;




        $userslog = "";
        $usersgroup = "";

        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id="' . $cateid . '"';
        }






        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }



        function refineValue($value)
        {
            if ($value != 0 && $value != '') {
                $val =  round($value * pow(10, 2)) / pow(10, 2);
                return  round($val, 2);
            } else {
                return 0;
            }
        }

        $search = $_GET['search'];

        $searchsql2 = "";
        if ($search != "") {
            $searchsql = " AND  aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
            $searchsql2 = " AND aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
        }
        $searchsql = "";


        $month = date('Y-m-01', strtotime($formdate));
        $tomonth = date('Y-m-01', strtotime($todate));
        // if($month < date('Y-m-01', strtotime($todate))){
        //     $month = date('Y-m-01', strtotime($todate));
        // }
        $start = new DateTime($formdate);
        $end = new DateTime($todate);
        $monthEnd = new DateTime(date('Y-m-t', strtotime($todate)));

        // Calculate the interval between the start and end dates
        $interval = $end->diff($start);

        // Calculate the total number of days between the start date and the end of the month
        $totalInterval = $monthEnd->diff($start);

        $totalDays = $totalInterval->days;
        $intervalDays = $interval->days;

        // Convert DateInterval objects to integer values
        $totalIntervalDays = intval($totalDays) + 1;
        $intervalDaysValue = intval($intervalDays);

        // echo $intervalDaysValue.' '.$totalIntervalDays;
        // exit;

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND  aa.sales_group_id != 40  AND aa.sales_group_id != 41  $userslog $usersgroup $searchsql2 GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $totals = array(
            'target' => 0,
            'bill_actual' => 0,
            'bill_total' => 0,
            'bill_returns' => 0,
            'required_target' => 0,
            'perc' => 0
        );
        foreach ($result as  $valuessg) {
            $resultsubdata = $this->db->query("SELECT aa.username,aa.id,aa.target,aa.status,aa.phone FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND a.id='" . $valuessg->sales_group_id . "' AND aa.id != 1801 AND aa.status != 0 $userslog $searchsql2  GROUP BY aa.id ORDER BY aa.name ASC");
            $resultsubdata = $resultsubdata->result();
            $subresult = array();
            $i = 1;
            $teamTotal = array(
                'target' => 0,
                'bill_actual' => 0,
                'bill_total' => 0,
                'bill_returns' => 0,
                'required_target' => 0,
                'perc' => 0
            );
            foreach ($resultsubdata as  $val) {
                $billTotal = 0;
                $billData = $this->db->query("SELECT SUM(bill_total) as totals FROM orders_process a WHERE a.order_base > 0 AND a.deleteid = 0 AND a.create_date BETWEEN '" . $formdate . "' AND '" . $todate . "' AND a.user_id = " . $val->id . "  AND a.customer_id NOT IN (33334,37743) ")->row();
                // foreach($billData as $entry){
                //Not a return
                // 
                $billTotal = $billTotal + $billData->totals;
                $teamTotal['bill_total']  = $teamTotal['bill_total'] + $billTotal;

                // } 



                $query_profle_get = $this->db->query("SELECT bill_total FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id
                        WHERE (sg.sales_member_id = '" . $val->id . "') AND  a.deleteid = '0' AND a.order_base = '5' AND a.id != 2423  AND a.customer NOT IN (33334,37743) AND
                                        a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "'  ");


                $result_lengeth = $query_profle_get->result();
                $billReturns = 0;

                foreach ($result_lengeth as $valuess) {
                    $billReturns = $billReturns + $valuess->bill_total;
                    $teamTotal['bill_returns'] += $valuess->bill_total;
                }
                if ($val->id == '106') {
                    $billReturns = $billReturns + 61.1;
                    $teamTotal['bill_returns']  = $teamTotal['bill_returns'] + refineValue($billReturns + 61.1);
                }

                // print_r($billData);
                // exit;
                //Bill Actual
                $billActual = $billTotal - $billReturns;
                $teamTotal['bill_actual'] +=  $billActual;
                //Salesperson Target
                $target = $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) ? $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) : 0;
                $teamTotal['target'] += $target;


                $daysInMonth = $totalIntervalDays;

                //Target and days remaining calculation
                $reqTarget = ($target / $daysInMonth) * ($intervalDaysValue + 1);
                $teamTotal['required_target'] +=  $reqTarget;

                //Status
                $status = $billActual <= $reqTarget ? 'UNDER TARGET' : 'AHEAD';
                if ($billActual && $reqTarget) {
                    $perc = ($billActual / $reqTarget) * 100;
                } else {
                    $perc = 0;
                }
                if ($filterStatus == 'true' || $val->status == '1') {
                    $subresult[] = array(
                        'no' => $i,
                        'id' => $val->id,
                        'sales_team' => $val->username,
                        'phone' => $val->phone,
                        'target' => refineValue($target),
                        'bill_total' => refineValue($billTotal),
                        'bill_actual' => refineValue($billActual),
                        'bill_returns' => refineValue($billReturns),
                        'required_target' => refineValue($reqTarget),
                        'perc' => refineValue($perc),
                        'status' => $status,
                    );
                    $i++;
                }
            }
            if ($teamTotal['bill_actual'] && $teamTotal['required_target']) {
                $teamTotal['perc'] = $teamTotal['bill_actual'] / $teamTotal['required_target']  * 100;
            } else {
                $teamTotal['perc']  = 0;
            }

            $teamTotal['target'] = refineValue($teamTotal['target']);
            $totals['target'] += $teamTotal['target'];

            $teamTotal['bill_actual'] =  refineValue($teamTotal['bill_actual']);
            $totals['bill_actual'] += $teamTotal['bill_actual'];

            $teamTotal['bill_total'] =  refineValue($teamTotal['bill_total']);
            $totals['bill_total'] += $teamTotal['bill_total'];

            $teamTotal['bill_returns'] =  refineValue($teamTotal['bill_returns']);
            $totals['bill_returns'] += $teamTotal['bill_returns'];

            $teamTotal['required_target'] = refineValue($teamTotal['required_target']);
            $totals['required_target'] += $teamTotal['required_target'];

            $teamTotal['perc'] =  refineValue($teamTotal['perc']);

            $array[] = array(
                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'team_total' => $teamTotal,
                'subarray' => $subresult
            );
        }
        // exit;
        $arrayMain = array();
        $arrayMain[] = $array;
        $arrayMain['topaaz'] = $this->generateReportSpecificTargetValue(33334, $formdate, $todate, $totals);
        $arrayMain['arasf'] =  $this->generateReportSpecificTargetValue(37743, $formdate, $todate, $totals);
        $totals['perc'] = refineValue((($totals['bill_actual'] / $totals['required_target']) * 100));
        $totals['required_target'] = refineValue($totals['required_target']);
        // $totals['required_target'] = refineValue($totals['required_target']);

        $totals['bill_actual'] =  $totals['bill_actual'] + $arrayMain['topaaz']['bill_actual'] + $arrayMain['arasf']['bill_actual'];
        $totals['bill_total'] = $totals['bill_total'] + $arrayMain['topaaz']['bill_total'] + $arrayMain['arasf']['bill_total'];
        $totals['bill_returns'] = $totals['bill_returns'] + $arrayMain['topaaz']['bill_returns'] + $arrayMain['arasf']['bill_returns'];
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }


// gg changes testing



public function fetch_data_sales_team_report_testing()
    {

        $customer_id = $_GET['customer_id'];
        $cateid = $_GET['sales_group'];
        $filterStatus = $_GET['active_status'];
        //  $sales_group=$_GET['sales_group'];
        $productid = $_GET['productid'];
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $order_status = $_GET['order_status'];
        $payment_mode = $_GET['payment_mode'];

        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;




        $userslog = "";
        $usersgroup = "";

        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id="' . $cateid . '"';
        }






        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }



        function refineValue($value)
        {
            if ($value != 0 && $value != '') {
                $val =  round($value * pow(10, 2)) / pow(10, 2);
                return  round($val, 2);
            } else {
                return 0;
            }
        }

        $search = $_GET['search'];

        $searchsql2 = "";
        if ($search != "") {
            $searchsql = " AND  aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
            $searchsql2 = " AND aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
        }
        $searchsql = "";


        $month = date('Y-m-01', strtotime($formdate));
        $tomonth = date('Y-m-01', strtotime($todate));
        // if($month < date('Y-m-01', strtotime($todate))){
        //     $month = date('Y-m-01', strtotime($todate));
        // }
        $start = new DateTime($formdate);
        $end = new DateTime($todate);
        $monthEnd = new DateTime(date('Y-m-t', strtotime($todate)));

        // Calculate the interval between the start and end dates
        $interval = $end->diff($start);

        // Calculate the total number of days between the start date and the end of the month
        $totalInterval = $monthEnd->diff($start);

        $totalDays = $totalInterval->days;
        $intervalDays = $interval->days;

        // Convert DateInterval objects to integer values
        $totalIntervalDays = intval($totalDays) + 1;
        $intervalDaysValue = intval($intervalDays);

        // echo $intervalDaysValue.' '.$totalIntervalDays;
        // exit;

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND  aa.sales_group_id != 40  AND aa.sales_group_id != 41  $userslog $usersgroup $searchsql2 GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $totals = array(
            'target' => 0,
            'bill_actual' => 0,
            'bill_total' => 0,
            'bill_returns' => 0,
            'required_target' => 0,
            'perc' => 0
        );
        foreach ($result as  $valuessg) {
            $resultsubdata = $this->db->query("SELECT aa.username,aa.id,aa.target,aa.status,aa.phone FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND a.id='" . $valuessg->sales_group_id . "' AND aa.id != 1801 AND aa.status != 0 $userslog $searchsql2  GROUP BY aa.id ORDER BY aa.name ASC");
            $resultsubdata = $resultsubdata->result();
            $subresult = array();
            $i = 1;
            $teamTotal = array(
                'target' => 0,
                'bill_actual' => 0,
                'bill_total' => 0,
                'bill_returns' => 0,
                'required_target' => 0,
                'perc' => 0
            );
            foreach ($resultsubdata as  $val) {
                $billTotal = 0;
                $billData = $this->db->query("SELECT SUM(bill_total) as totals FROM orders_process a WHERE a.order_base > 0 AND a.deleteid = 0 AND a.create_date BETWEEN '" . $formdate . "' AND '" . $todate . "' AND a.user_id = " . $val->id . "  AND a.customer_id NOT IN (33334,37743,375177,373808) ")->row();
                // foreach($billData as $entry){
                //Not a return
                // 
                $billTotal = $billTotal + $billData->totals;
                $teamTotal['bill_total']  = $teamTotal['bill_total'] + $billTotal;

                // } 



                $query_profle_get = $this->db->query("SELECT bill_total FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id
                        WHERE (sg.sales_member_id = '" . $val->id . "') AND  a.deleteid = '0' AND a.order_base = '5' AND a.id != 2423  AND a.customer NOT IN (33334,37743,375177,373808) AND
                                        a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "'  ");


                $result_lengeth = $query_profle_get->result();
                $billReturns = 0;

                foreach ($result_lengeth as $valuess) {
                    $billReturns = $billReturns + $valuess->bill_total;
                    $teamTotal['bill_returns'] += $valuess->bill_total;
                }
                if ($val->id == '106') {
                    $billReturns = $billReturns + 61.1;
                    $teamTotal['bill_returns']  = $teamTotal['bill_returns'] + refineValue($billReturns + 61.1);
                }

                // print_r($billData);
                // exit;
                //Bill Actual
                $billActual = $billTotal - $billReturns;
                $teamTotal['bill_actual'] +=  $billActual;
                //Salesperson Target
                $target = $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) ? $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) : 0;
                $teamTotal['target'] += $target;


                $daysInMonth = $totalIntervalDays;

                //Target and days remaining calculation
                $reqTarget = ($target / $daysInMonth) * ($intervalDaysValue + 1);
                $teamTotal['required_target'] +=  $reqTarget;

                //Status
                $status = $billActual <= $reqTarget ? 'UNDER TARGET' : 'AHEAD';
                if ($billActual && $reqTarget) {
                    $perc = ($billActual / $reqTarget) * 100;
                } else {
                    $perc = 0;
                }
                if ($filterStatus == 'true' || $val->status == '1') {
                    $subresult[] = array(
                        'no' => $i,
                        'id' => $val->id,
                        'sales_team' => $val->username,
                        'phone' => $val->phone,
                        'target' => refineValue($target),
                        'bill_total' => refineValue($billTotal),
                        'bill_actual' => refineValue($billActual),
                        'bill_returns' => refineValue($billReturns),
                        'required_target' => refineValue($reqTarget),
                        'perc' => refineValue($perc),
                        'status' => $status,
                    );
                    $i++;
                }
            }
            if ($teamTotal['bill_actual'] && $teamTotal['required_target']) {
                $teamTotal['perc'] = $teamTotal['bill_actual'] / $teamTotal['required_target']  * 100;
            } else {
                $teamTotal['perc']  = 0;
            }

            $teamTotal['target'] = refineValue($teamTotal['target']);
            $totals['target'] += $teamTotal['target'];

            $teamTotal['bill_actual'] =  refineValue($teamTotal['bill_actual']);
            $totals['bill_actual'] += $teamTotal['bill_actual'];

            $teamTotal['bill_total'] =  refineValue($teamTotal['bill_total']);
            $totals['bill_total'] += $teamTotal['bill_total'];

            $teamTotal['bill_returns'] =  refineValue($teamTotal['bill_returns']);
            $totals['bill_returns'] += $teamTotal['bill_returns'];

            $teamTotal['required_target'] = refineValue($teamTotal['required_target']);
            $totals['required_target'] += $teamTotal['required_target'];

            $teamTotal['perc'] =  refineValue($teamTotal['perc']);

            $array[] = array(
                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'team_total' => $teamTotal,
                'subarray' => $subresult
            );
        }
        // exit;
        $arrayMain = array();
        $arrayMain[] = $array;
        $arrayMain['topaaz'] = $this->generateReportSpecificTargetValue(33334, $formdate, $todate, $totals);
        $arrayMain['arasf'] =  $this->generateReportSpecificTargetValue(37743, $formdate, $todate, $totals);

        // gg changes testing
        $arrayMain['TOPAAZ_INDUSTRRIES_COIL'] =  $this->generateReportSpecificTargetValue(375177, $formdate, $todate, $totals);

        $arrayMain['ZARON_METAL_SECTION'] =  $this->generateReportSpecificTargetValue(373808, $formdate, $todate, $totals);




        $totals['perc'] = refineValue((($totals['bill_actual'] / $totals['required_target']) * 100));
        $totals['required_target'] = refineValue($totals['required_target']);
        // $totals['required_target'] = refineValue($totals['required_target']);

        $totals['bill_actual'] =  $totals['bill_actual'] + $arrayMain['topaaz']['bill_actual'] + $arrayMain['arasf']['bill_actual']+$arrayMain['TOPAAZ_INDUSTRRIES_COIL']['bill_actual']+$arrayMain['ZARON_METAL_SECTION']['bill_actual'];

        $totals['bill_total'] = $totals['bill_total'] + $arrayMain['topaaz']['bill_total'] + $arrayMain['arasf']['bill_total']+$arrayMain['TOPAAZ_INDUSTRRIES_COIL']['bill_total']+$arrayMain['ZARON_METAL_SECTION']['bill_total'];


        $totals['bill_returns'] = $totals['bill_returns'] + $arrayMain['topaaz']['bill_returns'] + $arrayMain['arasf']['bill_returns']+$arrayMain['TOPAAZ_INDUSTRRIES_COIL']['bill_returns']+$arrayMain['ZARON_METAL_SECTION']['bill_returns'];
        
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }





    public function generateReportSpecificTargetValue($cId, $formdate, $todate, $totals)
    {
        // echo $cId,$formdate,$todate;
        $billTotal = 0;
        $billReturns = 0;
        $billData = $this->db->query("SELECT a.finance_status,a.return_status,a.return_amount,a.return_id,a.bill_total  FROM orders_process as a JOIN customers as b ON a.customer_id=b.id   WHERE  a.create_date BETWEEN '" . $formdate . "' AND '" . $todate . "' AND a.order_no!='' AND a.deleteid=0 AND a.customer_id = '" . $cId . "' AND a.order_base='1'")->result();
        // print_r($billData);
        foreach ($billData as $entry) {
            //Not a return
            $billTotal += $entry->bill_total;
            // $teamTotal['bill_total'] += refineValue($billTotal);
        }
        $query_profle_get = $this->db->query("SELECT bill_total FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id
                 WHERE (a.customer = '" . $cId . "') AND a.remarks = 'Return To Re-sale' AND a.deleteid = '0' AND  
                                 a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "'");


        $result_lengeth = $query_profle_get->result();

        foreach ($result_lengeth as $valuess) {
            $billReturns = $billReturns + refineValue($valuess->bill_total);
            //$teamTotal['bill_returns'] += refineValue($valuess->bill_total);
        }



        //Bill Actual
        $billActual = $billTotal - $billReturns;
        // $teamTotal['bill_actual'] += refineValue($billActual);
        //Salesperson Target

        return array(
            'bill_actual' => $billActual,
            'bill_total' => $billTotal,
            'bill_returns' => $billReturns,
        );
    }

    public function fetch_data_sales_team_report_export()
    {

        $customer_id = $_GET['customer_id'];
        $cateid = $_GET['sales_group'];
        $filterStatus = $_GET['active_status'];
        //  $sales_group=$_GET['sales_group'];
        $productid = $_GET['productid'];
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $order_status = $_GET['order_status'];
        $payment_mode = $_GET['payment_mode'];

        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;




        $userslog = "";
        $usersgroup = "";

        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id="' . $cateid . '"';
        }






        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_member_id IN (' . $sales_team_id . ')';
        }



        function refineValue($value)
        {
            if ($value != 0 && $value != '') {
                $val =  round($value * pow(10, 2)) / pow(10, 2);
                return  round($val, 2);
            } else {
                return 0;
            }
        }

        $search = $_GET['search'];

        $searchsql2 = "";
        if ($search != "") {
            $searchsql = " AND  aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
            $searchsql2 = " AND aa.name LIKE'%" . $search . "%' OR aa.phone LIKE '%" . $search . "%'";
        }
        $searchsql = "";



        $month = date('Y-m-01', strtotime($formdate));
        $tomonth = date('Y-m-01', strtotime($todate));


        $start = new DateTime($formdate);
        $end = new DateTime($todate);
        $monthEnd = new DateTime(date('Y-m-t', strtotime($todate)));

        // Calculate the interval between the start and end dates
        $interval = $end->diff($start);

        // Calculate the total number of days between the start date and the end of the month
        $totalInterval = $monthEnd->diff($start);

        $totalDays = $totalInterval->days;
        $intervalDays = $interval->days;

        // Convert DateInterval objects to integer values
        $totalIntervalDays = intval($totalDays) + 1;
        $intervalDaysValue = intval($intervalDays);

        // echo $intervalDaysValue.' '.$totalIntervalDays;
        // exit;

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND  aa.sales_group_id != 40  AND aa.sales_group_id != 41  $userslog $usersgroup $searchsql2 GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $totals = array(
            'target' => 0,
            'bill_actual' => 0,
            'bill_total' => 0,
            'bill_returns' => 0,
            'required_target' => 0,
            'perc' => 0
        );
        foreach ($result as  $valuessg) {
            $resultsubdata = $this->db->query("SELECT aa.username,aa.id,aa.target,aa.status,aa.phone FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND a.id='" . $valuessg->sales_group_id . "' AND aa.id != 1801 $userslog $searchsql2  GROUP BY aa.id ORDER BY aa.name ASC");
            $resultsubdata = $resultsubdata->result();
            $subresult = array();
            $i = 1;
            $teamTotal = array(
                'target' => 0,
                'bill_actual' => 0,
                'bill_total' => 0,
                'bill_returns' => 0,
                'required_target' => 0,
                'perc' => 0
            );
            foreach ($resultsubdata as  $val) {
                $billTotal = 0;
                $billData = $this->db->query("SELECT SUM(bill_total) as totals FROM orders_process a WHERE a.order_base > 0 AND a.deleteid = 0 AND a.create_date BETWEEN '" . $formdate . "' AND '" . $todate . "' AND a.user_id = " . $val->id . "  AND a.customer_id NOT IN (33334,37743) ")->row();
                // foreach($billData as $entry){
                //Not a return
                // 
                $billTotal = $billTotal + $billData->totals;
                $teamTotal['bill_total']  = $teamTotal['bill_total'] + $billTotal;

                // } 



                $query_profle_get = $this->db->query("SELECT bill_total FROM `order_sales_return_complaints` a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id
                        WHERE (sg.sales_member_id = '" . $val->id . "') AND  a.deleteid = '0' AND a.order_base = '5' AND a.id != 2423  AND a.customer NOT IN (33334,37743) AND
                                        a.update_date BETWEEN '" . $formdate . "' AND '" . $todate . "'  ");


                $result_lengeth = $query_profle_get->result();
                $billReturns = 0;

                foreach ($result_lengeth as $valuess) {
                    $billReturns = $billReturns + $valuess->bill_total;
                    $teamTotal['bill_returns'] += $valuess->bill_total;
                }
                if ($val->id == '106') {
                    $billReturns = $billReturns + 61.1;
                    $teamTotal['bill_returns']  = $teamTotal['bill_returns'] + refineValue($billReturns + 61.1);
                }

                // print_r($billData);
                // exit;
                //Bill Actual
                $billActual = $billTotal - $billReturns;
                $teamTotal['bill_actual'] +=  $billActual;
                //Salesperson Target
                $target = $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) ? $this->getTargets($val->id, $month, 'sales_team_target', '-', $tomonth) : 0;
                $teamTotal['target'] += $target;


                $daysInMonth = $totalIntervalDays;

                //Target and days remaining calculation
                $reqTarget = ($target / $daysInMonth) * ($intervalDaysValue + 1);
                $teamTotal['required_target'] +=  $reqTarget;

                //Status
                $status = $billActual <= $reqTarget ? 'UNDER TARGET' : 'AHEAD';
                if ($billActual && $reqTarget) {
                    $perc = ($billActual / $reqTarget) * 100;
                } else {
                    $perc = 0;
                }
                if ($filterStatus == 'true' || $val->status == '1') {
                    $subresult[] = array(
                        'no' => $i,
                        'id' => $val->id,
                        'sales_team' => $val->username,
                        'phone' => $val->phone,
                        'target' => refineValue($target),
                        'bill_total' => refineValue($billTotal),
                        'bill_actual' => refineValue($billActual),
                        'bill_returns' => refineValue($billReturns),
                        'required_target' => refineValue($reqTarget),
                        'perc' => refineValue($perc),
                        'status' => $status,
                    );
                    $i++;
                }
            }
            if ($teamTotal['bill_actual'] && $teamTotal['required_target']) {
                $teamTotal['perc'] = $teamTotal['bill_actual'] / $teamTotal['required_target']  * 100;
            } else {
                $teamTotal['perc']  = 0;
            }

            $teamTotal['target'] = refineValue($teamTotal['target']);
            $totals['target'] += $teamTotal['target'];

            $teamTotal['bill_actual'] =  refineValue($teamTotal['bill_actual']);
            $totals['bill_actual'] += $teamTotal['bill_actual'];

            $teamTotal['bill_total'] =  refineValue($teamTotal['bill_total']);
            $totals['bill_total'] += $teamTotal['bill_total'];

            $teamTotal['bill_returns'] =  refineValue($teamTotal['bill_returns']);
            $totals['bill_returns'] += $teamTotal['bill_returns'];

            $teamTotal['required_target'] = refineValue($teamTotal['required_target']);
            $totals['required_target'] += $teamTotal['required_target'];

            $teamTotal['perc'] =  refineValue($teamTotal['perc']);

            $array[] = array(
                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'team_total' => $teamTotal,
                'subarray' => $subresult
            );
        }
        // exit;
        $arrayMain = array();
        $arrayMain[] = $array;
        $arrayMain['topaaz'] = $this->generateReportSpecificTargetValue(33334, $formdate, $todate, $totals);
        $arrayMain['arasf'] =  $this->generateReportSpecificTargetValue(37743, $formdate, $todate, $totals);
        $totals['perc'] = refineValue((($totals['bill_actual'] / $totals['required_target']) * 100));
        $totals['required_target'] = refineValue($totals['required_target']);
        // $totals['required_target'] = refineValue($totals['required_target']);

        $totals['bill_actual'] =  $totals['bill_actual'] + $arrayMain['topaaz']['bill_actual'] + $arrayMain['arasf']['bill_actual'];
        $totals['bill_total'] = $totals['bill_total'] + $arrayMain['topaaz']['bill_total'] + $arrayMain['arasf']['bill_total'];
        $totals['bill_returns'] = $totals['bill_returns'] + $arrayMain['topaaz']['bill_returns'] + $arrayMain['arasf']['bill_returns'];
        $arrayMain['totals'] = $totals;
        // print_r($totals);
        // exit;

        $filename = 'Sales Team Order Report ' . $formdate . ' to ' . $todate;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
?>

        <table border="1">
            <thead>
                <tr>


                    <th colspan="9" style="text-align:center">Sales Team Order Report <?= $formdate ?> to <?= $todate ?></th>

                </tr>
                <tr>


                    <th>No</th>
                    <th>Name</th>
                    <th style="width:100px">Target</th>
                    <th style="width:100px"> Sales</th>
                    <th style="width:100px"> Return </th>
                    <th style="width:100px"> Actual </th>
                    <th style="width:100px">Required Target</th>
                    <th style="width:100px">Status</th>
                    <th style="width:100px">%</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($arrayMain[0] as $entry) {
                ?>
                    <tr>
                        <td colspan="9" style="text-align:center;font-weight:bold;"><?= $entry['sales_group_name'] ?></td>
                    </tr>

                    <?php
                    foreach ($entry['subarray'] as $sl) {
                    ?>
                        <tr>
                            <td> <?= $sl['no'] ?></td>
                            <td><?= $showMode == '' ? $sl['sales_team'] : $sl['phone'] . '(' . $sl['sales_team'] . ')' ?></td>
                            <td>
                                <?= $sl['target'] ?></div>
                            </td>
                            <td> <?= $sl['bill_total'] ?></td>
                            <td><?= $sl['bill_returns'] ?></td>
                            <td><?= $sl['bill_actual'] ?></td>
                            <td><?= $sl['required_target'] ?></td>
                            <td style="color:<?= $sl['status'] == 'UNDER TARGET' ? 'red' : 'green' ?>;text-align:center; "><b><?= $sl['status'] ?></b></td>
                            <td>
                                <?= $sl['perc'] ?>%
                            </td>
                        </tr>

                    <?php
                    }


                    if ($entry['team_total']) {
                    ?>
                        <tr style="background-color: #efefef;">
                            <td> </td>
                            <td style="text-align:center;font-weight:bold;">TOTAL</td>
                            <td><?= $entry['team_total']['target'] ?> </td>
                            <td><?= $entry['team_total']['bill_total'] ?></td>
                            <td><?= $entry['team_total']['bill_returns'] ?></td>
                            <td><?= $entry['team_total']['bill_actual'] ?></td>
                            <td><?= $entry['team_total']['required_target'] ?></td>
                            <td></td>
                            <td>
                                <?= $entry['team_total']['perc'] ?>%
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>

            <tbody>


                <tr>

                    <td colspan="9" style="text-align:center">OTHERS</td>

                </tr>

                <tr>
                    <td></td>
                    <td style="color:red">Topaaz</td>
                    <td>-</td>
                    <td><?= $arrayMain['topaaz']['bill_total'] ?></td>
                    <td><?= $arrayMain['topaaz']['bill_returns'] ?></td>
                    <td><?= $arrayMain['topaaz']['bill_actual'] ?> </td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>

                </tr>

                <tr>
                    <td> </td>
                    <td style="color:red">Arasfirma</td>
                    <td>-</td>
                    <td><?= $arrayMain['arasf']['bill_total'] ?></td>
                    <td><?= $arrayMain['arasf']['bill_returns'] ?></td>
                    <td><?= $arrayMain['arasf']['bill_actual'] ?> </td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>

                </tr>

                <tr style="background-color: #efefef;">
                    <td> </td>
                    <td style="color:red;font-weight:bold">GRAND TOTAL</td>
                    <td><?= $totals['target'] ?></td>
                    <td><?= $totals['bill_total'] ?></td>
                    <td><?= $totals['bill_returns'] ?> </td>
                    <td><?= $totals['bill_actual'] ?> </td>
                    <td><?= $totals['required_target'] ?></td>
                    <td>-</td>
                    <td><?= $totals['perc'] ?>%</td>

                </tr>



            </tbody>


        </table>



<?php









    }

    public function fetch_data_sales_product_targets()
    {
        $cateid = $_GET['order_status'];
        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id IN (' . $cateid . ')';
        }



        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 $userslog AND  aa.deleteid=0 AND aa.access=12 AND aa.sales_group_id != 40  AND aa.sales_group_id != 41   GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        $currentDate = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));

        $currentYear = $currentDate->format('Y');
        $startFinancialYear = new DateTime("{$currentYear}-04-01");
        $endFinancialYear = clone $startFinancialYear;
        $endFinancialYear->modify('+1 year')->modify('-1 month');

        $endDate = ($currentDate >= $startFinancialYear && $currentDate < $endFinancialYear)
            ? $endFinancialYear
            : $startFinancialYear->modify('-1 day');
        foreach ($result as $valuessg) {
            $j = 1;

            $salesperson = [];

            $resultsubdata = $this->db->query("SELECT aa.username,aa.id ,aa.status  FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801  AND a.id='" . $valuessg->sales_group_id . "'    $userslog     GROUP BY aa.id ORDER BY aa.name ASC");
            $get_sales_person = $resultsubdata->result();
            foreach ($get_sales_person as $valueget) {
                //active/inactive
                $monthEntry = [];
                $yearTotal = 0;


                for ($i = 0; $i < 12; $i++) {
                    $for_date = date('Y-m-01', strtotime($formMonth . ' + ' . $i . ' months'));
                    $monthEntry[] = array('index' => $i, 'date' => $for_date, 'target' => $this->getTargets($valueget->id, $for_date, 'sales_team_target'));
                    $currentDate->modify('+1 month');
                }


                $currentDateFin = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));
                $currentMonth = (int)$currentDateFin->format('m');
                $currentYear = (int)$currentDateFin->format('Y');
                $financialYearStartMonth = 4;
                if ($currentMonth >= $financialYearStartMonth) {
                    $startYear = $currentYear;
                } else {
                    $startYear = $currentYear - 1;
                }
                for ($i = 0; $i <= 12; $i++) {
                    $for_date = date('Y-m-01', strtotime("$startYear-04-01" . ' + ' . $i . ' months'));
                    $yearTotal += $this->getTargets($valueget->id, $for_date, 'sales_team_target');
                    $currentDateFin->modify('+1 month');
                }



                if ($filterStatus == 'true' || $valueget->status == '1') {
                    $salesperson[] = array(
                        'no' => $j,
                        'sales_team_id' => $valueget->id,
                        'sales_person_name' => $valueget->username,
                        'data' => $monthEntry,
                        'yearTotal' => round($yearTotal)
                    );
                    $j++;
                }
            }
            $array[] = array(

                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'salesperson' => $salesperson,
            );
        }

        $arrayMain[] = $array;

        echo json_encode($arrayMain);
    }
// gg changes testing

    public function fetch_data_sales_product_targets_testing()
    {
        $cateid = $_GET['order_status'];
        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id IN (' . $cateid . ')';
        }



        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 $userslog AND  aa.deleteid=0 AND aa.access=12 AND aa.sales_group_id != 40  AND aa.sales_group_id != 41   GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        $currentDate = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));

        $currentYear = $currentDate->format('Y');
        $startFinancialYear = new DateTime("{$currentYear}-04-01");
        $endFinancialYear = clone $startFinancialYear;
        $endFinancialYear->modify('+1 year')->modify('-1 month');

        $endDate = ($currentDate >= $startFinancialYear && $currentDate < $endFinancialYear)
            ? $endFinancialYear
            : $startFinancialYear->modify('-1 day');
        foreach ($result as $valuessg) {
            $j = 1;

            $salesperson = [];

            $resultsubdata = $this->db->query("SELECT aa.username,aa.id ,aa.status  FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801  AND a.id='" . $valuessg->sales_group_id . "'    $userslog     GROUP BY aa.id ORDER BY aa.name ASC");
            $get_sales_person = $resultsubdata->result();
            foreach ($get_sales_person as $valueget) {
                //active/inactive
                $monthEntry = [];
                $yearTotal = 0;


                for ($i = 0; $i < 12; $i++) {
                    $for_date = date('Y-m-01', strtotime($formMonth . ' + ' . $i . ' months'));
                    $monthEntry[] = array('index' => $i, 'date' => $for_date, 'target' => $this->getTargets($valueget->id, $for_date, 'sales_team_target'));
                    $currentDate->modify('+1 month');
                }


                $currentDateFin = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));
                $currentMonth = (int)$currentDateFin->format('m');
                $currentYear = (int)$currentDateFin->format('Y');
                $financialYearStartMonth = 4;
                if ($currentMonth >= $financialYearStartMonth) {
                    $startYear = $currentYear;
                } else {
                    $startYear = $currentYear - 1;
                }
                for ($i = 0; $i <= 12; $i++) {
                    $for_date = date('Y-m-01', strtotime("$startYear-04-01" . ' + ' . $i . ' months'));
                    $yearTotal += $this->getTargets($valueget->id, $for_date, 'sales_team_target');
                    $currentDateFin->modify('+1 month');
                }



                if ($filterStatus == 'true' || $valueget->status == '1') {
                    $salesperson[] = array(
                        'no' => $j,
                        'sales_team_id' => $valueget->id,
                        'sales_person_name' => $valueget->username,
                        'data' => $monthEntry,
                        'yearTotal' => round($yearTotal)
                    );
                    $j++;
                }
            }
            $array[] = array(

                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'salesperson' => $salesperson,
            );
        }

        $arrayMain[] = $array;

        echo json_encode($arrayMain);
    }
    public function fetch_data_sales_category_targets()
    {
        $cateid = $_GET['order_status'];
        $categoriesId = $_GET['cats'];

        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        $catLog = '';
        if ($cateid > 0) {
            $userslog = ' AND aa.id IN (' . $cateid . ')';
        }

        if ($categoriesId > 0) {
            $catLog = ' AND a.id IN (' . $categoriesId . ')';
        }



        $result = $this->db->query("SELECT aa.username,aa.id ,aa.status FROM sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801 $userslog  GROUP BY aa.id ORDER BY aa.name ASC LIMIT 5 ");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        foreach ($result as $valuessg) {
            $j = 1;
            $cats = [];
            $resultsubdata = $this->db->query("SELECT * FROM  categories a WHERE a.deleteid='0' $catLog ");
            $get_sales_person = $resultsubdata->result();
            foreach ($get_sales_person as $valueget) {
                //active/inactive
                $monthEntry = [];
                $yearTotal = 0;
                for ($i = 0; $i <= 11; $i++) {
                    // Calculate the date by adding $i months to $formMonth
                    $for_date = date('Y-m-01', strtotime($formMonth . ' + ' . $i . ' months'));

                    $monthEntry[] = array('index' => $i, 'date' => $for_date, 'target' => $this->getTargets($valuessg->id, $for_date, 'sales_team_target', $valueget->id));
                    $yearTotal += $monthEntry[$i]['target'];
                }


                $cats[] = array(
                    'no' => $j,
                    'cat_id' => $valueget->id,
                    'categories' => $valueget->categories,
                    'data' => $monthEntry,
                    'yearTotal' => round($yearTotal)
                );
                $j++;
            }
            if ($filterStatus == 'true' || $valueget->status == '1') {

                $array[] = array(

                    'id' => $valuessg->id,
                    'sales_person_name' => $valuessg->username,
                    'cats' => $cats
                );
            }
        }

        $arrayMain[] = $array;

        echo json_encode($arrayMain);
    }

    // gg changes testing

    public function fetch_data_sales_category_targets_testing()
    {
        $cateid = $_GET['order_status'];
        $categoriesId = $_GET['cats'];

        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        $catLog = '';
        if ($cateid > 0) {
            $userslog = ' AND aa.id IN (' . $cateid . ')';
        }

        if ($categoriesId > 0) {
            $catLog = ' AND a.id IN (' . $categoriesId . ')';
        }



        $result = $this->db->query("SELECT aa.username,aa.id ,aa.status FROM sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801 $userslog  GROUP BY aa.id ORDER BY aa.name ASC LIMIT 5 ");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        foreach ($result as $valuessg) {
            $j = 1;
            $cats = [];
            $resultsubdata = $this->db->query("SELECT * FROM  categories a WHERE a.deleteid='0' $catLog ");
            $get_sales_person = $resultsubdata->result();
            foreach ($get_sales_person as $valueget) {
                //active/inactive
                $monthEntry = [];
                $yearTotal = 0;
                for ($i = 0; $i <= 11; $i++) {
                    // Calculate the date by adding $i months to $formMonth
                    $for_date = date('Y-m-01', strtotime($formMonth . ' + ' . $i . ' months'));

                    $monthEntry[] = array('index' => $i, 'date' => $for_date, 'target' => $this->getTargets($valuessg->id, $for_date, 'sales_team_target', $valueget->id));
                    $yearTotal += $monthEntry[$i]['target'];
                }


                $cats[] = array(
                    'no' => $j,
                    'cat_id' => $valueget->id,
                    'categories' => $valueget->categories,
                    'data' => $monthEntry,
                    'yearTotal' => round($yearTotal)
                );
                $j++;
            }
            if ($filterStatus == 'true' || $valueget->status == '1') {

                $array[] = array(

                    'id' => $valuessg->id,
                    'sales_person_name' => $valuessg->username,
                    'cats' => $cats
                );
            }
        }

        $arrayMain[] = $array;

        echo json_encode($arrayMain);
    }
    public function fetch_data_sales_product_unit_targets()
    {
        $cateid = $_GET['order_status'];
        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m-01', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        if ($cateid > 0) {
            $userslog .= ' AND b.sales_member_id IN (' . $cateid . ')';
        }

        $salesData = array(
            array("field_name" => "accessories", "cat_id" => 1),
            array("field_name" => "aluminium", "cat_id" => 36),
            array("field_name" => "cleat", "cat_id" => 41),
            array("field_name" => "decking_sheet", "cat_id" => 34),
            array("field_name" => "extra_sheet_arch", "cat_id" => 582),
            array("field_name" => "fan_base", "cat_id" => 17),
            array("field_name" => "sheet", "cat_id" => 3),
            array("field_name" => "multi_wall", "cat_id" => 20),
            array("field_name" => "poly_corbonate", "cat_id" => 19),
            array("field_name" => "polynum", "cat_id" => 13),
            array("field_name" => "profile_ridge_arch", "cat_id" => 32),
            array("field_name" => "puff_panels", "cat_id" => 30),
            array("field_name" => "purlin", "cat_id" => 5),
            array("field_name" => "screw", "cat_id" => 7),
            array("field_name" => "screw_accessories", "cat_id" => 9),
            array("field_name" => "tile_sheet", "cat_id" => 26),
            array("field_name" => "upvc_item", "cat_id" => 15),
            array("field_name" => "standing_seam", "cat_id" => 603),
            array("field_name" => "standing_seam_clips", "cat_id" => 604),
            array("field_name" => "rock_wool", "cat_id" => 11),
            array("field_name" => "conversion", "cat_id" => 581),
            array("field_name" => "rent", "cat_id" => 584),
            array("field_name" => "hr_plate", "cat_id" => 613),
            array("field_name" => "liner_sheet", "cat_id" => 590),
            array("field_name" => "wall_sheet", "cat_id" => 607),
            array("field_name" => "roll_sheet", "cat_id" => 593),
            array("field_name" => "puff_panel_accessories", "cat_id" => 618),
            array("field_name" => "purlin_accessories", "cat_id" => 616),
             array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
        );

        $result = $this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 $userslog AND  aa.deleteid=0 AND aa.access=12 AND aa.sales_group_id != 40  AND aa.sales_group_id != 41   GROUP BY a.id ORDER BY a.name ASC");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        foreach ($result as $valuessg) {
            $j = 1;

            $salesperson = [];

            $resultsubdata = $this->db->query("SELECT aa.username,aa.id ,aa.status  FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801  AND a.id='" . $valuessg->sales_group_id . "'    $userslog     GROUP BY aa.id ORDER BY aa.name ASC");
            $get_sales_person = $resultsubdata->result();
            foreach ($get_sales_person as $valueget) {
                //active/inactive
                $monthEntry = [];

                $targetQuery = $this->db->query("SELECT  modified_value,field FROM report_changes WHERE salesman_id = '" . $valueget->id . "' AND report_name = 'sales_product_unit_wise' AND  for_date = '" . $formMonth . "' ")->result();

                $targetSales = [];
                foreach ($targetQuery as $targets) {
                    $targetSales[$targets->field]['modified_value'] = $targets->modified_value;
                }

                foreach ($salesData as $entry) {
                    $monthEntry[] = array('cat_id' => $entry['cat_id'], 'target' => $targetSales[$entry['cat_id']]['modified_value']);
                }


                if ($filterStatus == 'true' || $valueget->status == '1') {
                    $salesperson[] = array(
                        'no' => $j,
                        'sales_team_id' => $valueget->id,
                        'sales_person_name' => $valueget->username,
                        'data' => $monthEntry
                    );
                    $j++;
                }
            }
            $array[] = array(

                'id' => $valuessg->sales_group_id,
                'sales_group_name' => $valuessg->sales_group_name,
                'salesperson' => $salesperson,
            );
        }

        $arrayMain[] = $array;
        // exit;
        echo json_encode($arrayMain);
    }
    public function getTargets($id, $for_date, $report_name, $field = '-', $todate = null)
    {

        $result = $this->db->query("SELECT modified_value FROM report_changes WHERE salesman_id = '$id' AND for_date = '$for_date' AND report_name = '$report_name' AND field = '$field' ")->row();
        if ($todate !== null) {
            $result = $this->db->query("SELECT SUM(modified_value) as modified_value FROM report_changes WHERE salesman_id = '$id' AND for_date BETWEEN '$for_date' AND '$todate' AND report_name = '$report_name' AND field = '$field' ")->row();
        }
        // echo json_encode($id);

        if (isset($result->modified_value)) {
            return $result->modified_value;
        } else {
            return 0;
        }
    }

    public function fetch_data_sales_category_unit_targets()
    {
        $cateid = $_GET['order_status'];
        $categoriesId = $_GET['cats'];

        $sales_group = $_GET['sales_group'];
        $formMonth = date('Y-m', strtotime($_GET['formMonth'])); //$_GET['formMonth'];
        $filterStatus = $_GET['active_status'];
        $userslog = '';
        $catLog = '';
        if ($cateid > 0) {
            $userslog = ' AND aa.id IN (' . $cateid . ')';
        }

        if ($categoriesId > 0) {
            $catLog = $categoriesId;
        }



        $result = $this->db->query("SELECT aa.username,aa.id ,aa.status FROM sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE a.deleteid=0 AND aa.deleteid=0 AND aa.access=12 AND  aa.id != 1801 $userslog  GROUP BY aa.id ORDER BY aa.name LIMIT 5  ");
        $result = $result->result();
        $array = array();
        $arrayMain = array();
        foreach ($result as $valuessg) {
            $k = 1;
            $cats = [];
            $get_sales_person = array(
                array("field_name" => "accessories", "cat_id" => 1),
                array("field_name" => "aluminium", "cat_id" => 36),
                array("field_name" => "cleat", "cat_id" => 41),
                array("field_name" => "decking_sheet", "cat_id" => 34),
                array("field_name" => "extra_sheet_arch", "cat_id" => 582),
                array("field_name" => "fan_base", "cat_id" => 17),
                array("field_name" => "sheet", "cat_id" => 3),
                array("field_name" => "multi_wall", "cat_id" => 20),
                array("field_name" => "poly_corbonate", "cat_id" => 19),
                array("field_name" => "polynum", "cat_id" => 13),
                array("field_name" => "profile_ridge_arch", "cat_id" => 32),
                array("field_name" => "puff_panels", "cat_id" => 30),
                array("field_name" => "purlin", "cat_id" => 5),
                array("field_name" => "screw", "cat_id" => 7),
                array("field_name" => "screw_accessories", "cat_id" => 9),
                array("field_name" => "tile_sheet", "cat_id" => 26),
                array("field_name" => "upvc_item", "cat_id" => 15),
                array("field_name" => "standing_seam", "cat_id" => 603),
                array("field_name" => "standing_seam_clips", "cat_id" => 604),
                array("field_name" => "rock_wool", "cat_id" => 11),
                array("field_name" => "conversion", "cat_id" => 581),
                array("field_name" => "rent", "cat_id" => 584),
                array("field_name" => "hr_plate", "cat_id" => 613),
                array("field_name" => "liner_sheet", "cat_id" => 590),
                array("field_name" => "wall_sheet", "cat_id" => 607),
                array("field_name" => "roll_sheet", "cat_id" => 593),
                array("field_name" => "puff_panel_accessories", "cat_id" => 618),
                array("field_name" => "purlin_accessories", "cat_id" => 616),
                 array("field_name" => "roll_sheet_add", "cat_id" => 591),
                    array("field_name" => "spanish_ridge_add", "cat_id" => 599),
            );

            $filteredCats = $get_sales_person;
            if ($catLog != '') {
                $filteredCats = array_filter($get_sales_person, function ($item) use ($catLog) {
                    return in_array($item['cat_id'], explode(',', $catLog));
                });
            }


            $currentDate = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));

            $currentYear = $currentDate->format('Y');
            $startFinancialYear = new DateTime("{$currentYear}-04-01");
            $endFinancialYear = clone $startFinancialYear;
            $endFinancialYear->modify('+1 year')->modify('-1 month');

            $endDate = ($currentDate >= $startFinancialYear && $currentDate < $endFinancialYear)
                ? $endFinancialYear
                : $startFinancialYear->modify('-1 day');

            foreach ($filteredCats as $valueget) {
                $monthEntry = [];
                $yearTotal = 0;



                for ($i = 0; $i < 12; $i++) {
                    $for_date = date('Y-m-01', strtotime($formMonth . ' + ' . $i . ' months'));
                    $monthEntry[] = ['index' => $i, 'date' => $for_date, 'target' => $this->getTargets($valuessg->id, $for_date, 'sales_product_unit_wise', $valueget['cat_id'])];
                    $currentDate->modify('+1 month');
                }


                $currentDateFin = new DateTime(date('Y-m-01', strtotime(date('Y-m', strtotime($_GET['formMonth'])))));
                $currentMonth = (int)$currentDateFin->format('m');
                $currentYear = (int)$currentDateFin->format('Y');
                $financialYearStartMonth = 4;
                if ($currentMonth >= $financialYearStartMonth) {
                    $startYear = $currentYear;
                } else {
                    $startYear = $currentYear - 1;
                }
                for ($i = 0; $i <= 12; $i++) {
                    $for_date = date('Y-m-01', strtotime("$startYear-04-01" . ' + ' . $i . ' months'));
                    $yearTotal += $this->getTargets($valuessg->id, $for_date, 'sales_product_unit_wise', $valueget['cat_id']);
                    $currentDateFin->modify('+1 month');
                }

                $cats[] = array(
                    'no' => $k,
                    'cat_id' => $valueget['cat_id'],
                    'categories' => ucfirst(str_replace('_', ' ', $valueget['field_name'])),
                    'data' => $monthEntry,
                    'yearTotal' => round($yearTotal)
                );
                $k++;
            }
            if ($filterStatus == 'true' || $valuessg->status == '1') {

                $array[] = array(
                    'id' => $valuessg->id,
                    'sales_person_name' => $valuessg->username,
                    'cats' => $cats
                );
            }
        }

        $arrayMain[] = $array;

        echo json_encode($arrayMain);
    }


    public function sale_product_brand_cate_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('brand', 'deleteid', '0');

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Brand Category Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_brand_cate_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function fetch_data_sales_product_cate_wise_report()
    {

        $brand = $_GET['sales_brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $testMode = (isset($_GET['test']) && $_GET['test']);

        if ($brand == 'null') {
            $brandLog .= " IS NULL ";
        } else {
            $brandLog .=  " = '$brand' ";
        }

        $arrayMain = [];
        if ($testMode) {
            $result = $this->db->query("SELECT
        COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty END)  AS qty,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END END) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        WHERE 
        op.deleteid = 0
        AND op.order_base != '0'
        AND oplp.deleteid = 0
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY 
        categories ")->result();
        } else {
            $result = $this->db->query("SELECT
        COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(oplp.qty)  AS qty,
        SUM(oplp.qty * oplp.rate) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        WHERE 
        op.deleteid = 0
        AND op.order_base = '1'
        AND oplp.deleteid = 0
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY 
        categories ")->result();
        }


        $resultReturns  = $this->db->query("SELECT 
         COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
       FROM order_product_list_process oplp
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        LEFT JOIN sales_return_products srp ON srp.id = oplp.return_id
        LEFT JOIN order_sales_return_complaints osrc ON osrc.id = srp.c_id
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        AND  COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY
        categories ")->result();


        $combinedArray = array();

        foreach ($resultReturns as $row) {
            $combinedArray[$row->categories] = (object) $row;
        }

        foreach ($result as &$row) {
            $key = $row->categories;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                if (isset($row->categories)) {
                    $combinedArray[$key] = (object) $row;
                }
            }
        }

        $combinedArray = array_values($combinedArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];


        foreach ($combinedArray as &$row) {

            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty =   $row->qty - $row->ret_qty;
            $row->actual_value =  $row->value - $row->ret_value;
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
        }
         usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->categories)), strtolower(trim($b->categories)));
        });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }

    public function fetch_data_sales_product_cate_wise_report_export()
    {
   $brand = $_GET['sales_brand'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $brandLog = '';
        $testMode = (isset($_GET['test']) && $_GET['test']);

        if ($brand == 'null') {
            $brandLog .= " IS NULL ";
        } else {
            $brandLog .=  " = '$brand' ";
        }

        $arrayMain = [];
        if ($testMode) {
            $result = $this->db->query("SELECT
        COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty END)  AS qty,
          SUM(CASE WHEN op.reason != 'Cancel Approved' THEN CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END END) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        WHERE 
        op.deleteid = 0
        AND op.order_base != '0'
        AND oplp.deleteid = 0
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY 
        categories ")->result();
        } else {
            $result = $this->db->query("SELECT
        COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(oplp.qty)  AS qty,
        SUM(oplp.qty * oplp.rate) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON op.id = oplp.order_id
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        WHERE 
        op.deleteid = 0
        AND op.order_base = '1'
        AND oplp.deleteid = 0
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        AND COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY 
        categories ")->result();
        }


        $resultReturns  = $this->db->query("SELECT 
         COALESCE(pl_product.categories, pl_sub.categories, pl_tile.categories) as categories,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
       FROM order_product_list_process oplp
        LEFT JOIN product_list pl_product ON oplp.product_id = pl_product.id
        LEFT JOIN product_list pl_sub ON oplp.sub_product_id = pl_sub.id
        LEFT JOIN product_list pl_tile ON oplp.tile_material_id = pl_tile.id
        LEFT JOIN sales_return_products srp ON srp.id = oplp.return_id
        LEFT JOIN order_sales_return_complaints osrc ON osrc.id = srp.c_id
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        AND  COALESCE(pl_product.brand, pl_sub.brand, pl_tile.brand) $brandLog
        GROUP BY
        categories ")->result();


        $combinedArray = array();

        foreach ($resultReturns as $row) {
            $combinedArray[$row->categories] = (object) $row;
        }

        foreach ($result as &$row) {
            $key = $row->categories;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->qty = $row->qty;
                $combinedArray[$key]->value = $row->value;
            } else {
                if (isset($row->categories)) {
                    $combinedArray[$key] = (object) $row;
                }
            }
        }

        $combinedArray = array_values($combinedArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];


        foreach ($combinedArray as &$row) {

            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty =   $row->qty - $row->ret_qty;
            $row->actual_value =  $row->value - $row->ret_value;
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
        }
         usort($combinedArray, function ($a, $b) {
            return strcmp(strtolower(trim($a->categories)), strtolower(trim($b->categories)));
        });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        $brandName = $_GET['sales_brand'] == 'null' ? 'No Brand' : $_GET['sales_brand'];
        $filename = "Sale Product Category Report (Brand wise - $brandName) " . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;
        // $arrayMain['brand'] = 'Category';
        // print_r($arrayMain);
        // exit;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_brand_cate_report_export', $arrayMain);
    }

    public function sale_product_area_cate_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('brand', 'deleteid', '0');

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Product Brand Category Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/sale_product_area_cate_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function fetch_data_sales_product_area_cate_wise_report()
    {
        $area = $_GET['sales_customer'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaLog = '';

        if ($area == 'null') {
            $areaLog .= ' AND c.id IS NULL  ';
        } else {
            $areaLog .= ' AND c.id  LIKE "%' . $area . '%"  ';
        }

        $arrayMain = [];

        $result = $this->db->query("SELECT
            pl.categories_id,
        pl.categories as categories,
        c.company_name as customer_name,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM order_product_list_process oplp
        LEFT JOIN orders_process op ON (oplp.order_id = op.id )
        LEFT JOIN customers c ON c.id = op.customer_id
        LEFT JOIN product_list pl ON oplp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        WHERE
        op.deleteid = 0 AND 
        oplp.deleteid = 0 AND 
        (op.order_base != '0' AND op.order_base != -1) AND
       
        cg.categories != '' AND
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaLog 
        GROUP BY
        pl.categories_id
        ORDER BY
        pl.categories_id ASC")->result();


        $resultReturns =  $this->db->query("SELECT
        pl.categories_id,
        pl.categories as categories,
        c.company_name as customer_name,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
         LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
         LEFT JOIN product_list pl ON srp.product_id =  pl.id
         LEFT JOIN categories cg ON pl.categories_id =  cg.id
         LEFT JOIN customers c ON c.id = osrc.customer
         LEFT JOIN order_product_list_process oplp ON oplp.return_id = srp.id
         LEFT JOIN orders_process op ON op.order_no = oplp.order_no
        WHERE
        osrc.deleteid = '0' AND 
         srp.deleteid = '0' AND 
         osrc.order_base = '5' AND osrc.id != 2423   AND
          osrc.remarks = 'Return to Re-sale' AND
         osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaLog 
        GROUP BY
       categories
        ")->result();

        $returnArr = array();
        $resultArr = array();
        $comArray = array();
        foreach ($resultReturns as $entryRet) {
            $returnArr[$entryRet->categories] = (object)  $entryRet;
        }

        foreach ($result as $entrySal) {
            $comArray[] = $entrySal;
            $resultArr[$entrySal->categories] = (object)  $entrySal;
        }

        // print_r($returnArr);
        // exit;

        foreach ($returnArr as &$entry) {
            if (isset($resultArr[$entry->categories])) {
                $resultArr[$entry->categories]->ret_value = $entry->ret_value;
                $resultArr[$entry->categories]->ret_qty = $entry->ret_qty;
            } else {
                $comArray[] =  (object) $entry;
            }
        }


        $comArray = array_values($comArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];

        foreach ($comArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty =  sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value =  sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
        }
        $arrayMain['data'] = $comArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }

    public function fetch_data_sales_product_area_cate_wise_report_export()
    {
        $area = $_GET['sales_customer'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $areaLog = '';

        if ($area == 'null') {
            $areaLog .= ' AND c.id IS NULL  ';
        } else {
            $areaLog .= ' AND c.id  LIKE "%' . $area . '%"  ';
        }

        $arrayMain = [];

        $result = $this->db->query("SELECT
            pl.categories_id,
        pl.categories as categories,
        c.company_name as customer_name,
      SUM(CASE WHEN op.reason != 'Cancel Approved' THEN oplp.qty ELSE 0 END) AS qty,
        SUM(CASE WHEN op.reason != 'Cancel Approved' THEN
                  CASE WHEN op.create_date > '2024-05-31' THEN oplp.amount * 1.18 ELSE oplp.amount END ELSE 0 END)  AS value
        FROM order_product_list_process oplp
        LEFT JOIN orders_process op ON (oplp.order_id = op.id )
        LEFT JOIN customers c ON c.id = op.customer_id
        LEFT JOIN product_list pl ON oplp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        WHERE
        op.deleteid = 0 AND 
        oplp.deleteid = 0 AND 
        (op.order_base != '0' AND op.order_base != -1) AND
       
        cg.categories != '' AND
        op.create_date BETWEEN '$formdate' AND '$todate'
        $areaLog 
        GROUP BY
        pl.categories_id
        ORDER BY
        pl.categories_id ASC")->result();


        $resultReturns = $this->db->query("SELECT
            pl.categories_id,
        pl.categories as categories,
        c.company_name as customer_name,
        SUM(srp.qty) AS ret_qty,
        SUM(srp.qty * srp.rate) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIN sales_return_products srp ON srp.c_id = osrc.id
        LEFT JOIN product_list pl ON srp.product_id =  pl.id
        LEFT JOIN categories cg ON pl.categories_id =  cg.id
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE
        osrc.deleteid = '0' AND 
        srp.deleteid = '0' AND 
        osrc.order_base = '5' AND osrc.id != 2423   AND
         osrc.remarks = 'Return to Re-sale' AND
        osrc.update_date BETWEEN '$formdate' AND '$todate'
        $areaLog 
        GROUP BY
        pl.categories_id
        ")->result();

        $returnArr = array();
        $resultArr = array();
        $comArray = array();
        foreach ($resultReturns as $entryRet) {
            $returnArr[$entryRet->categories_id] = (object)  $entryRet;
        }

        foreach ($result as $entrySal) {
            $comArray[] = $entrySal;
            $resultArr[$entrySal->categories_id] = (object)  $entrySal;
        }

        // print_r($returnArr);
        // exit;

        foreach ($returnArr as &$entry) {
            if (isset($resultArr[$entry->categories_id])) {
                $resultArr[$entry->categories_id]->ret_value = $entry->ret_value;
                $resultArr[$entry->categories_id]->ret_qty = $entry->ret_qty;
            } else {
                $comArray[] =  (object) $entry;
            }
        }


        $comArray = array_values($comArray);
        $totals = ['qty' => 0, 'value' => 0, 'ret_value' => 0, 'ret_qty' => 0, 'actual_qty' => 0, 'actual_value' => 0];

        foreach ($comArray as &$row) {
            $totals['qty'] += $row->qty;
            $totals['value'] += $row->value;
            $totals['ret_qty'] += $row->ret_qty;
            $totals['ret_value'] += $row->ret_value;
            $row->actual_qty =  sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value =  sprintf("%.2f", $row->value - $row->ret_value);
            $totals['actual_qty'] += $row->actual_qty;
            $totals['actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
        }
        $arrayMain['data'] = $comArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Product Category Report (Area wise) ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;
        $arrayMain['brand'] = 'Category';

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/sale_product_brand_wise_report_export', $arrayMain);
    }




    public function regular_irregular_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sql = $this->db->query("SELECT a.name, a.id FROM admin_users a WHERE a.deleteid = 0 AND a.access = 12  ORDER BY a.name ASC")->result();



            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $sql;

            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Regular Irregular Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/regular_irregular_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }

    public function regular_irregular_orders_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sql = $this->db->query("SELECT a.name, a.id FROM admin_users a WHERE a.deleteid = 0 AND a.access = 12  ORDER BY a.name ASC")->result();
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $sql;
            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Regular Irregular Order Details Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/regular_irregular_orders_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }


    public function customer_yes_or_no_regular_group_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sql = $this->db->query("SELECT a.name, a.id FROM admin_users a WHERE a.deleteid = 0 AND a.access = 12 AND a.status > 0  ORDER BY a.name ASC")->result();
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $sql;
            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Regular Consolidated Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/customer_yes_or_no_regular_group_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }



    public function regular_irregular_details_report()
    {
        if (isset($this->session->userdata['logged_in'])) {

            $sql = $this->db->query("SELECT a.name, a.id FROM admin_users a WHERE a.deleteid = 0 AND a.access = 12  ORDER BY a.name ASC")->result();
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $sql;
            $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['active_base'] = 'customer_1';
            //  $data['active']='customer_1';
            $data['title']    = 'Sale Regular Irregular Details Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/regular_irregular_details_report', $data);
        } else {
            $this->load->view('admin/index');
        }
    }




    public function fetch_data_regular_irregular_report()
    {
        $sl = $_GET['sales_person'];
        $status = $_GET['status'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $slLog = '';
        $userslog = '';
        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
        }

        if ($status != 'true') {
            $slLog .= ' AND a.status > 0 ';
        }

         if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT CASE WHEN c.approved_status > 0 THEN c.id END) as customers_count,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO'  THEN c.id END) as irregular_customers,
        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR c.regular = '' THEN c.id END) as not_filled_customers,
        SUM(op.bill_total) as total_bill,
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        SUM(CASE WHEN c.regular = 'NO' THEN op.bill_total ELSE 0 END) as irregular_customers_bill,
        SUM(CASE WHEN c.regular IS NULL OR c.regular = ''  THEN op.bill_total ELSE 0 END) as not_filled_customers_bill,
        a.name,a.id FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != 0)
        AND op.bill_total  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog 
        GROUP BY a.id ORDER BY a.name ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.sales_team_id as id 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = 0) AND 
                    (op.order_base > 0 OR op.order_base = -4) AND
                    op.create_date BETWEEN '$formdate' AND '$todate'
                    $userslog 
                    ")->result();
        // print_r($result2 );
        // exit;


if($slLog == ''){
        $mergeResult = array_merge($result, $result2);
  
}else{
        $mergeResult = array_merge($result);

}

        // $resultReturns  = $this->db->query("SELECT 
        // SUM(osrc.bill_total) AS total_return,
        // a.name,c.sales_team_id as id FROM 
        // order_sales_return_complaints osrc 
        // LEFT JOIN customers c  ON osrc.customer_id = c.id
        // LEFT JOIN admin_users a  ON a.id = c.sales_team_id
        // LEFT JOIN orders_process op  ON op.customer_id = c.id
        // WHERE 
        // a.deleteid = 0 
        // AND osrc.order_base = '5' AND osrc.id != 2423 
        // AND (osrc.update_date BETWEEN '$formdate' AND '$todate' OR op.create_date BETWEEN '$formdate' AND '$todate')
        // AND osrc.deleteid = 0
        // $slLog
        // GROUP BY c.sales_team_id ORDER BY a.name ASC")->result();



        $resultReturns  = $this->db->query("SELECT SUM(osrc.bill_total) as total_return,
        c.sales_team_id as id
        FROM order_sales_return_complaints osrc 
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE osrc.order_base = '5' AND osrc.id != 2423 
        AND osrc.deleteid = '0' AND
         osrc.remarks = 'Return to Re-sale'  
        AND osrc.update_date BETWEEN '$formdate' AND '$todate'
        $userslog 
        GROUP BY c.sales_team_id ")->result();

        // $resultReturns=$this->db->query("SELECT a.*,b.company_name,b.phone,b.locality,b.tcs_status,b.sales_team_id,b.sales_group,b.sales_head, op.order_no as old_order, op.payment_mode FROM order_sales_return_complaints as a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id LEFT JOIN orders_process op ON op.order_no = a.order_no WHERE  a.create_date BETWEEN '$formdate 00:00:00' AND '$todate 23:59:59' $stat $userslog AND a.deleteid = '0' AND a.order_base = '5' AND a.id != 2423 GROUP BY a.id ORDER BY a.id DESC")->result();

        $returnArr = [];

        foreach ($resultReturns as $entry) {
            $returnArr[$entry->id]['total_return'] = $entry->total_return;
        }
        $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->id) && $obj->id != '' && $obj->id != null) {
                    return strval($obj->id);
                } elseif (is_array($obj) && isset($obj['id'])  &&  $obj['id'] != '' && $obj['id'] != null) {
                    return strval($obj['id']);
                }
            }, $result));


            $cond = " WHERE  a.id NOT IN ($commaSeperatedSp) ";
        }


     $resultInvert = $this->db->query("SELECT 
         a.name,a.id FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
         $cond $userslog  GROUP BY a.id HAVING 
    COUNT(c.id) > 0")->result();

if($slLog == ''){
        $mergedArray = array_merge($mergeResult, $resultInvert);
  
}else{
        $mergedArray = array_merge($mergeResult);

}
   

        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT( c.id  ) as customers_count, 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as overall_regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO'   THEN c.id END) as overall_irregular_customers,
        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR (c.regular != 'YES' AND  c.regular != 'NO') THEN c.id END) as overall_not_filled_customers,
        c.sales_team_id
        FROM customers c 
        WHERE c.deleteid = 0
       AND c.approved_status > 0
       $userslog 
        GROUP BY c.sales_team_id")->result();


        // $overAllCustomersAll = $this->db->query("SELECT 
        //        COUNT(c.id) as customers_count, 
        //        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as overall_regular_customers,
        //        COUNT(DISTINCT CASE WHEN c.regular = 'NO' THEN c.id END) as overall_irregular_customers,
        //        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR c.regular = '' THEN c.id END) as overall_not_filled_customers,
        //        c.sales_team_id
        //        FROM customers c 
        //        WHERE c.deleteid = 0
        //         ")->row();
        // print_r($overAllCustomers);

        foreach ($overAllCustomers as $entry) {
            $overAllCustomersArr[$entry->sales_team_id]['overall_customers'] = $entry->customers_count;
            $overAllCustomersArr[$entry->sales_team_id]['overall_regular_customers'] = $entry->overall_regular_customers;
            $overAllCustomersArr[$entry->sales_team_id]['overall_irregular_customers'] = $entry->overall_irregular_customers;
            $overAllCustomersArr[$entry->sales_team_id]['overall_not_filled_customers'] = $entry->overall_not_filled_customers;
            $overAllCustomersArr[$entry->sales_team_id]['new_customers'] = $entry->new_customers;
        }


        $totals = ['customers' => 0, 'regular_customers' => 0, 'irregular_customers' => 0, 'overall_irregular_customers' => 0, 'overall_regular_customers' => 0, 'total_bill' => 0, 'regular_customers_bill' => 0, 'irregular_customers_bill' => 0, 'overall_customers' => 0, 'new_customers' => 0, 'not_filled_customers_bill' => 0];

        foreach ($mergedArray as $key => &$row) {
            if($userslog == ''){
                if ((isset($row->not_sl_customers_bill))) {
                if ($row->not_sl_customers_bill == 0) {
                    unset($row);
                } else {
                    $row->name = 'No Sales Person';
                    $row->id = '';
                    $row->total_bill = $row->not_sl_customers_bill;
                    $row->customers = $row->not_sl_customers;
                }
            }
            }
            
            $row->customers = $row->regular_customers + $row->irregular_customers +  $row->not_filled_customers;

            $totals['customers'] += $row->customers;
            $totals['regular_customers'] += $row->regular_customers;
            $totals['irregular_customers'] += $row->irregular_customers;
            $totals['not_filled_customers'] += $row->not_filled_customers;
            $totals['total_bill'] += $row->total_bill;
            $row->total_return = $returnArr[$row->id]['total_return'];
            $totals['total_return'] += $row->total_return;
            $row->total_actual =  $row->total_bill - $row->total_return;
            $totals['total_actual'] += $row->total_actual;
            $row->overall_customers = $overAllCustomersArr[$row->id]['overall_customers'];
            $row->overall_regular_customers = $overAllCustomersArr[$row->id]['overall_regular_customers'];
            $row->overall_irregular_customers = $overAllCustomersArr[$row->id]['overall_irregular_customers'];
            $row->overall_not_filled_customers = $overAllCustomersArr[$row->id]['overall_not_filled_customers'];

            $row->new_customers = $overAllCustomersArr[$row->id]['new_customers'];
            $totals['overall_customers'] += $row->overall_customers;
            $totals['overall_regular_customers'] += $row->overall_regular_customers;
            $totals['overall_irregular_customers'] += $row->overall_irregular_customers;
            $totals['overall_not_filled_customers'] += $row->overall_not_filled_customers;
            $totals['new_customers'] += $row->new_customers;
            $totals['regular_customers_bill'] += $row->regular_customers_bill;
            $totals['irregular_customers_bill'] += $row->irregular_customers_bill;
            $totals['not_filled_customers_bill'] += $row->not_filled_customers_bill;
        }
        // function compareById($a, $b) {
        //         return $b->total_bill - $a->total_bill;
        // }
        // usort($mergedArray, 'compareById');
        // usort($mergedArray, function($a, $b) {
        //     return $a->name <=> $b->name;
        // });
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }


    public function fetch_data_regular_irregular_report_export()
    {
        $sl = $_GET['sales_person'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $slLog = '';

        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
        }

          if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }


        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT CASE WHEN c.approved_status > 0 THEN c.id END) as customers_count,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO'  THEN c.id END) as irregular_customers,
        COUNT(DISTINCT CASE WHEN (c.regular IS NULL OR c.regular = '')   THEN c.id END) as not_filled_customers,
        SUM(op.bill_total) as total_bill,
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        SUM(CASE WHEN c.regular = 'NO' THEN op.bill_total ELSE 0 END) as irregular_customers_bill,
        SUM(CASE WHEN (c.regular IS NULL OR c.regular = '') THEN op.bill_total ELSE 0 END) as not_filled_customers_bill,
        a.name,a.id FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != 0)
        AND op.bill_total  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog
        GROUP BY a.id ORDER BY a.name ASC")->result();
        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.sales_team_id as id 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = 0) AND 
                    (op.order_base > 0 OR op.order_base = -4) AND
                    op.create_date BETWEEN '$formdate' AND '$todate'
                    $userslog
                    ")->result();
        // print_r($result2 );
        // exit;
     
if($slLog == ''){
        $mergeResult = array_merge($result, $result2);
  
}else{
        $mergeResult = array_merge($result);

}

        // $resultReturns  = $this->db->query("SELECT 
        // SUM(osrc.bill_total) AS total_return,
        // a.name,c.sales_team_id as id FROM 
        // order_sales_return_complaints osrc 
        // LEFT JOIN customers c  ON osrc.customer_id = c.id
        // LEFT JOIN admin_users a  ON a.id = c.sales_team_id
        // LEFT JOIN orders_process op  ON op.customer_id = c.id
        // WHERE 
        // a.deleteid = 0 
        // AND osrc.order_base = '5' AND osrc.id != 2423 
        // AND (osrc.update_date BETWEEN '$formdate' AND '$todate' OR op.create_date BETWEEN '$formdate' AND '$todate')
        // AND osrc.deleteid = 0
        // $slLog
        // GROUP BY c.sales_team_id ORDER BY a.name ASC")->result();



        $resultReturns  = $this->db->query("SELECT SUM(osrc.bill_total) as total_return,
        c.sales_team_id as id
        FROM order_sales_return_complaints osrc 
        LEFT JOIN customers c ON c.id = osrc.customer
        WHERE osrc.order_base = '5' AND osrc.id != 2423 
        AND osrc.deleteid = '0' AND
         osrc.remarks = 'Return to Re-sale'  
        AND osrc.update_date BETWEEN '$formdate' AND '$todate'
        $userslog 
        GROUP BY c.sales_team_id ")->result();

        // $resultReturns=$this->db->query("SELECT a.*,b.company_name,b.phone,b.locality,b.tcs_status,b.sales_team_id,b.sales_group,b.sales_head, op.order_no as old_order, op.payment_mode FROM order_sales_return_complaints as a JOIN customers as b ON a.customer=b.id LEFT JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id LEFT JOIN orders_process op ON op.order_no = a.order_no WHERE  a.create_date BETWEEN '$formdate 00:00:00' AND '$todate 23:59:59' $stat $userslog AND a.deleteid = '0' AND a.order_base = '5' AND a.id != 2423 GROUP BY a.id ORDER BY a.id DESC")->result();

        $returnArr = [];

        foreach ($resultReturns as $entry) {
            $returnArr[$entry->id]['total_return'] = $entry->total_return;
        }
        $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->id) && $obj->id != '' && $obj->id != null) {
                    return strval($obj->id);
                } elseif (is_array($obj) && isset($obj['id'])  &&  $obj['id'] != '' && $obj['id'] != null) {
                    return strval($obj['id']);
                }
            }, $result));


            $cond = " WHERE  a.id NOT IN ($commaSeperatedSp) ";
        }


     $resultInvert = $this->db->query("SELECT 
         a.name,a.id FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
         $cond $userslog  GROUP BY a.id HAVING 
    COUNT(c.id) > 0")->result();

if($slLog == ''){
        $mergedArray = array_merge($mergeResult, $resultInvert);
  
}else{
        $mergedArray = array_merge($mergeResult);

}

        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(CASE WHEN c.approved_status > 0 THEN c.id END) as customers_count, 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND c.approved_status > 0 THEN c.id END) as overall_regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO' AND c.approved_status > 0  THEN c.id END) as overall_irregular_customers,
        COUNT(DISTINCT CASE WHEN (c.regular IS NULL OR c.regular = '')  AND c.approved_status > 0  THEN c.id END) as overall_not_filled_customers,
        c.sales_team_id
        FROM customers c 
        WHERE c.deleteid = 0
        AND c.approved_status > 0
        $userslog
        GROUP BY c.sales_team_id")->result();


        // $overAllCustomersAll = $this->db->query("SELECT 
        //        COUNT(c.id) as customers_count, 
        //        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as overall_regular_customers,
        //        COUNT(DISTINCT CASE WHEN c.regular = 'NO' THEN c.id END) as overall_irregular_customers,
        //        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR c.regular = '' THEN c.id END) as overall_not_filled_customers,
        //        c.sales_team_id
        //        FROM customers c 
        //        WHERE c.deleteid = 0
        //         ")->row();
        // print_r($overAllCustomers);

        foreach ($overAllCustomers as $entry) {
            $overAllCustomersArr[$entry->sales_team_id]['overall_customers'] = $entry->customers_count;
            $overAllCustomersArr[$entry->sales_team_id]['overall_regular_customers'] = $entry->overall_regular_customers;
            $overAllCustomersArr[$entry->sales_team_id]['overall_irregular_customers'] = $entry->overall_irregular_customers;
            $overAllCustomersArr[$entry->sales_team_id]['overall_not_filled_customers'] = $entry->overall_not_filled_customers;
            $overAllCustomersArr[$entry->sales_team_id]['new_customers'] = $entry->new_customers;
        }


        $totals = ['customers' => 0, 'regular_customers' => 0, 'irregular_customers' => 0, 'overall_irregular_customers' => 0, 'overall_regular_customers' => 0, 'total_bill' => 0, 'regular_customers_bill' => 0, 'irregular_customers_bill' => 0, 'overall_customers' => 0, 'new_customers' => 0, 'not_filled_customers_bill' => 0];

        foreach ($mergedArray as $key => &$row) {
            if ((isset($row->not_sl_customers_bill))) {
                if ($row->not_sl_customers_bill == 0) {
                    unset($row);
                } else {
                    $row->name = 'No Sales Person';
                    $row->id = '';
                    $row->total_bill = $row->not_sl_customers_bill;
                    $row->customers = $row->not_sl_customers;
                }
            }
            $row->customers = $row->regular_customers + $row->irregular_customers +  $row->not_filled_customers;

            $totals['customers'] += $row->customers;
            $totals['regular_customers'] += $row->regular_customers;
            $totals['irregular_customers'] += $row->irregular_customers;
            $totals['not_filled_customers'] += $row->not_filled_customers;
            $totals['total_bill'] += $row->total_bill;
            $row->total_return = $returnArr[$row->id]['total_return'];
            $totals['total_return'] += $row->total_return;
            $row->total_actual =  $row->total_bill - $row->total_return;
            $totals['total_actual'] += $row->total_actual;
            $row->overall_customers = $overAllCustomersArr[$row->id]['overall_customers'];
            $row->overall_regular_customers = $overAllCustomersArr[$row->id]['overall_regular_customers'];
            $row->overall_irregular_customers = $overAllCustomersArr[$row->id]['overall_irregular_customers'];
            $row->overall_not_filled_customers = $overAllCustomersArr[$row->id]['overall_not_filled_customers'];

            $row->new_customers = $overAllCustomersArr[$row->id]['new_customers'];
            $totals['overall_customers'] += $row->overall_customers;
            $totals['overall_regular_customers'] += $row->overall_regular_customers;
            $totals['overall_irregular_customers'] += $row->overall_irregular_customers;
            $totals['overall_not_filled_customers'] += $row->overall_not_filled_customers;
            $totals['new_customers'] += $row->new_customers;
            $totals['regular_customers_bill'] += $row->regular_customers_bill;
            $totals['irregular_customers_bill'] += $row->irregular_customers_bill;
            $totals['not_filled_customers_bill'] += $row->not_filled_customers_bill;
        }
        // function compareById($a, $b) {
        //         return $b->total_bill - $a->total_bill;
        // }
        // usort($mergedArray, 'compareById');
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Regular Irregular Report ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/regular_irregular_report_export', $arrayMain);
    }



    public function fetch_data_regular_irregular_details_report()
    {
        $sl = $_GET['sales_person'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $regular_filter = $_GET['regular_filter'];

        $slLog = '';

        if ($sl == '' || $sl == null) {
            $slLog .= ' AND (c.sales_team_id = "" OR c.sales_team_id IS NULL) ';
        } elseif ($sl != 'All') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
        }



         //  gg changes for regular irregular filter
         if($regular_filter != 'ALL' && $regular_filter != ''){

            if($regular_filter == 'NULL' ){ 
                $slLog .= 'AND c.regular IS NULL';
            }else {
                $slLog .= 'AND c.regular="'.$regular_filter.'"';
            }
                

        }


        $result = $this->db->query("SELECT 
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        SUM(CASE WHEN c.regular = 'NO' THEN op.bill_total ELSE 0 END) as irregular_customers_bill,
        SUM(CASE WHEN c.regular IS NULL OR c.regular = '' THEN op.bill_total ELSE 0 END) as not_filled_customers_bill,
        COUNT(DISTINCT op.customer_id) as customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO' THEN c.id END) as irregular_customers,
        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR c.regular = '' THEN c.id END) as not_filled_customers,
        c.company_name as name,
        c.id as customer_id,
        c.regular,
        a.name as sales_name,
        a.id FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != NULL)
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.company_name as name,
                    c.id as customer_id,
                    c.regular
                    FROM 
                    orders_process op
                    LEFT JOIN  customers c  ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = '') AND 
                    (op.order_base > 0) AND
                    op.create_date BETWEEN '$formdate' AND '$todate'
                    GROUP BY 
                    c.id")->result();

        $mergeResult = array_merge($result, $result2);
        $resultReturns  = $this->db->query("SELECT 
        SUM(CASE WHEN c.regular = 'YES' THEN osrc.bill_total ELSE 0 END) as regular_customers_return,
        SUM(CASE WHEN c.regular = 'NO' THEN osrc.bill_total ELSE 0 END) as irregular_customers_return,
        SUM(CASE WHEN (c.regular IS NULL OR c.regular = '') THEN osrc.bill_total ELSE 0 END) as not_filled_customers_return,
        c.company_name as name,
        c.id as customer_id,
        c.regular,
        a.name as sales_name,
        a.id FROM order_sales_return_complaints osrc 
        LEFT JOIN customers c ON c.id = osrc.customer
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        WHERE osrc.order_base = '5' AND osrc.id != 2423
        AND osrc.remarks = 'Return to Re-sale'   
        AND osrc.deleteid = '0'
        AND osrc.update_date BETWEEN '$formdate' AND '$todate' 
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();

        // $resultReturns  = $this->db->query("SELECT SUM(osrc.bill_total) as total_return,
        // c.sales_team_id as id
        // FROM order_sales_return_complaints osrc 
        // LEFT JOIN customers c ON c.id = osrc.customer
        // WHERE osrc.order_base = '5' AND osrc.id != 2423 
        // AND osrc.deleteid = '0'
        // AND osrc.update_date BETWEEN '$formdate' AND '$todate'
        // GROUP BY c.sales_team_id ")->result();

        $returnArr = [];

        foreach ($resultReturns as $entry) {
            $returnArr[$entry->customer_id]['regular_customers_return'] = $entry->regular_customers_return;
            $returnArr[$entry->customer_id]['irregular_customers_return'] = $entry->irregular_customers_return;
            $returnArr[$entry->customer_id]['not_filled_customers_return'] = $entry->not_filled_customers_return;
        }
        $commaSeperatedCustomer = '';
        $cond = '';
        if (count($result) > 0) {

            $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->customer_id) && $obj->customer_id != '') {
                    return strval($obj->customer_id);
                } elseif (is_array($obj) && isset($obj['customer_id'])  &&  $obj['customer_id'] != '') {
                    return strval($obj['customer_id']);
                }
            }, $result));
            $cond = " AND c.id NOT IN ($commaSeperatedCustomer) ";
        }




        $resultInvert = $this->db->query("SELECT 
        c.company_name as name,
        a.name as sales_name,
        c.id as customer_id,
        c.regular,
        COUNT(c.customer_id) as customers,
        COUNT(CASE WHEN c.regular = 'YES' THEN c.id END) as regular_customers,
        COUNT(CASE WHEN c.regular = 'NO' THEN c.id END) as irregular_customers,
        COUNT(CASE WHEN c.regular IS NULL OR c.regular = ''  THEN c.id END) as not_filled_customers
        FROM admin_users a
        LEFT JOIN customers c ON c.sales_team_id = a.id
        WHERE a.deleteid = 0 
        AND c.deleteid = 0
        AND c.sales_team_id != ''
        $cond
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();

        $totals = [
            'regular_customers_bill' => 0,
            'irregular_customers_bill' => 0,
            'not_filled_customers_bill' => 0,
            'regular_customers_return' => 0,
            'irregular_customers_return' => 0,
            'not_filled_customers_return' => 0,
            'net_sales' => 0,
            'customers' => 0,
            'regular_customers' => 0,
            'irregular_customers' => 0,
            'not_filled_customers' => 0
        ];
        $mergedArray = array_merge($mergeResult, $resultInvert);
        foreach ($mergedArray as &$row) {

            $sales = 0;
            $returns = 0;
             $totals['not_filled_customers'] += $row->not_filled_customers;
            $totals['not_filled_customers_bill'] += $row->not_filled_customers_bill;
            if ((isset($row->not_sl_customers_bill))) {

                $row->sales_name = 'No Sales Person';
                $row->name = $row->name;
                $row->not_filled_customers_bill = $row->not_sl_customers_bill;
                $row->not_filled_customers = $row->not_sl_customers;
            }

            $row->regular_customers_return += $returnArr[$row->customer_id]['regular_customers_return'];
            $row->irregular_customers_return += $returnArr[$row->customer_id]['irregular_customers_return'];
            $row->not_filled_customers_return += $returnArr[$row->customer_id]['not_filled_customers_return'];

            $totals['regular_customers_bill'] += $row->regular_customers_bill;
            $totals['irregular_customers_bill'] += $row->irregular_customers_bill;
            // $totals['not_filled_customers_bill'] += $row->not_filled_customers_bill;
            $totals['regular_customers_return'] += $row->regular_customers_return;
            $totals['irregular_customers_return'] += $row->irregular_customers_return;
            $totals['not_filled_customers_return'] += $row->not_filled_customers_return;

            $totals['customers'] += $row->customers;
            $totals['regular_customers'] += $row->regular_customers;
            $totals['irregular_customers'] += $row->irregular_customers;
            // $totals['not_filled_customers'] += $row->not_filled_customers;

            $sales = $row->regular_customers_bill + $row->irregular_customers_bill + $row->not_filled_customers_bill;
            $returns = $row->regular_customers_return + $row->irregular_customers_return + $row->not_filled_customers_return;
            $row->net_sales = round($sales - $returns, 2);
            $totals['net_sales'] += $row->net_sales;
        }


        if ($_GET['filterStatus'] != 'true') {
            if ($sl == '') {
                $mergedArray = array_merge($mergeResult);
            } else {
                $mergedArray = array_merge($result);
            }
        } else {
            if ($sl == '' || $sl == null) {
                $mergedArray = array_merge($mergeResult, $resultInvert);
            } else {
                $mergedArray = array_merge($result, $resultInvert);
            }
        }


        $arrayMain['data'] = $mergedArray;
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }

    public function fetch_data_regular_irregular_details_report_export()
    {
        $sl = $_GET['sales_person'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];

        $regular_filter = $_GET['regular_filter'];

        $slLog = '';

        if ($sl == '' || $sl == null) {
            $slLog .= ' AND (c.sales_team_id = "" OR c.sales_team_id IS NULL) ';
        } elseif ($sl != 'All') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
        }

        //  gg changes for regular irregular filter
        if($regular_filter != 'ALL' && $regular_filter != ''){
                    
            if($regular_filter == 'NULL' ){ 
                $slLog .= 'AND c.regular IS NULL';
            }else {
                $slLog .= 'AND c.regular="'.$regular_filter.'"';
            }
                

        }

        $result = $this->db->query("SELECT 
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        SUM(CASE WHEN c.regular = 'NO' THEN op.bill_total ELSE 0 END) as irregular_customers_bill,
        SUM(CASE WHEN c.regular IS NULL OR c.regular = '' THEN op.bill_total ELSE 0 END) as not_filled_customers_bill,
        COUNT(DISTINCT op.customer_id) as customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO' THEN c.id END) as irregular_customers,
        COUNT(DISTINCT CASE WHEN c.regular IS NULL OR c.regular = '' THEN c.id END) as not_filled_customers,
        c.company_name as name,
        c.id as customer_id,
        c.regular,
        a.name as sales_name,
        a.id FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != NULL)
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.company_name as name,
                    c.id as customer_id,
                    c.regular
                    FROM 
                    orders_process op
                    LEFT JOIN  customers c  ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = '') AND 
                    (op.order_base > 0) AND
                    op.create_date BETWEEN '$formdate' AND '$todate'
                    GROUP BY 
                    c.id")->result();

        $mergeResult = array_merge($result, $result2);
        $resultReturns  = $this->db->query("SELECT 
        SUM(CASE WHEN c.regular = 'YES' AND osrc.order_base = '5' AND osrc.remarks = 'Return to Re-sale'    AND osrc.id != 2423   THEN osrc.bill_total ELSE 0 END) as regular_customers_return,
        SUM(CASE WHEN c.regular = 'NO' AND osrc.order_base = '5' AND osrc.remarks = 'Return to Re-sale'    AND osrc.id != 2423   THEN osrc.bill_total ELSE 0 END) as irregular_customers_return,
        SUM(CASE WHEN (c.regular IS NULL OR c.regular = '') AND osrc.remarks = 'Return to Re-sale'    AND osrc.order_base = '5' AND osrc.remarks = 'Return to Re-sale'    AND osrc.id != 2423   THEN osrc.bill_total ELSE 0 END) as not_filled_customers_return,
        c.company_name as name,
        c.id as customer_id,
        c.regular,
        a.name as sales_name,
        a.id FROM admin_users a
        LEFT JOIN customers c ON c.sales_team_id = a.id
        LEFT JOIN orders_process op ON op.customer_id = c.id 
        LEFT JOIN order_sales_return_complaints osrc ON osrc.order_no = op.order_no
        WHERE a.deleteid = 0 
        AND op.deleteid = 0
        AND c.id != ''
        AND a.access = 12 
        AND osrc.update_date BETWEEN '$formdate' AND '$todate' 
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();


        $returnArr = [];

        foreach ($resultReturns as $entry) {
            $returnArr[$entry->customer_id]['regular_customers_return'] = $entry->regular_customers_return;
            $returnArr[$entry->customer_id]['irregular_customers_return'] = $entry->irregular_customers_return;
            $returnArr[$entry->customer_id]['not_filled_customers_return'] = $entry->not_filled_customers_return;
        }
        $commaSeperatedCustomer = '';
        $cond = '';
        if (count($result) > 0) {

            $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->customer_id) && $obj->customer_id != '') {
                    return strval($obj->customer_id);
                } elseif (is_array($obj) && isset($obj['customer_id'])  &&  $obj['customer_id'] != '') {
                    return strval($obj['customer_id']);
                }
            }, $result));
            $cond = " AND c.id NOT IN ($commaSeperatedCustomer) ";
        }




        $resultInvert = $this->db->query("SELECT 
        c.company_name as name,
        a.name as sales_name,
        c.id as customer_id,
        c.regular,
        COUNT(c.customer_id) as customers,
        COUNT(CASE WHEN c.regular = 'YES' THEN c.id END) as regular_customers,
        COUNT(CASE WHEN c.regular = 'NO' THEN c.id END) as irregular_customers,
        COUNT(CASE WHEN c.regular IS NULL OR c.regular = ''  THEN c.id END) as not_filled_customers
        FROM admin_users a
        LEFT JOIN customers c ON c.sales_team_id = a.id
        WHERE a.deleteid = 0 
        AND c.deleteid = 0
        AND c.sales_team_id != ''
        $cond
        $slLog
        GROUP BY c.id ORDER BY c.company_name ASC")->result();

        $totals = [
            'regular_customers_bill' => 0,
            'irregular_customers_bill' => 0,
            'not_filled_customers_bill' => 0,
            'regular_customers_return' => 0,
            'irregular_customers_return' => 0,
            'not_filled_customers_return' => 0,
            'net_sales' => 0,
            'customers' => 0,
            'regular_customers' => 0,
            'irregular_customers' => 0,
            'not_filled_customers' => 0
        ];
        $mergedArray = array_merge($mergeResult, $resultInvert);
        foreach ($mergedArray as &$row) {

            $sales = 0;
            $returns = 0;
             $totals['not_filled_customers'] += $row->not_filled_customers;
            $totals['not_filled_customers_bill'] += $row->not_filled_customers_bill;
            if (  (isset($row->not_sl_customers_bill))) {

                $row->sales_name = 'No Sales Person';
                $row->name = $row->name;
                $row->not_filled_customers_bill = $row->not_sl_customers_bill;
                $row->not_filled_customers = $row->not_sl_customers;
           


            }

            $row->regular_customers_return += $returnArr[$row->customer_id]['regular_customers_return'];
            $row->irregular_customers_return += $returnArr[$row->customer_id]['irregular_customers_return'];
            $row->not_filled_customers_return += $returnArr[$row->customer_id]['not_filled_customers_return'];

            $totals['regular_customers_bill'] += $row->regular_customers_bill;
            $totals['irregular_customers_bill'] += $row->irregular_customers_bill;
            $totals['regular_customers_return'] += $row->regular_customers_return;
            $totals['irregular_customers_return'] += $row->irregular_customers_return;
            $totals['not_filled_customers_return'] += $row->not_filled_customers_return;

            $totals['customers'] += $row->customers;
            $totals['regular_customers'] += $row->regular_customers;
            $totals['irregular_customers'] += $row->irregular_customers;

            $sales = $row->regular_customers_bill + $row->irregular_customers_bill + $row->not_filled_customers_bill;
            $returns = $row->regular_customers_return + $row->irregular_customers_return + $row->not_filled_customers_return;
            $row->net_sales = round($sales - $returns, 2);
            $totals['net_sales'] += $row->net_sales;
        }


        if ($_GET['filterStatus'] != 'true') {
            if ($sl == '') {
                $mergedArray = array_merge($mergeResult);
            } else {
                $mergedArray = array_merge($result);
            }
        } else {
            if ($sl == '' || $sl == null) {
                $mergedArray = array_merge($mergeResult, $resultInvert);
            } else {
                $mergedArray = array_merge($result, $resultInvert);
            }
        }


        $arrayMain['data'] = $mergedArray;
        $arrayMain['data'] = $mergedArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Regular Irregular Report - Details ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/regular_irregular_details_report_export', $arrayMain);
    }


    public function fetch_data_regular_irregular_orders_report()
    {
        $sl = $_GET['customer_id'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $slLog = '';

        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND c.id IN (' . $sl . ') ';
        }



        $result = $this->db->query("SELECT 
        op.order_no,
        c.company_name,op.id as order_id,
        ROUND(CAST(SUM(oplp.qty) AS DECIMAL(10, 2)), 2) AS qty,
        ROUND(CAST((op.bill_total)  AS DECIMAL(10, 2)), 2) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON oplp.order_id = op.id
        LEFT JOIn customers c ON c.id = op.customer_id
        WHERE op.deleteid = 0
        AND (op.order_base > 0)
        AND (op.create_date BETWEEN '$formdate' AND '$todate')
        $slLog
        GROUP BY op.id ")->result();


        $resultReturns = $this->db->query("SELECT 
        osrc.order_id,
        osrc.order_no,
        c.company_name,
        ROUND(CAST((osrc.qty) AS DECIMAL(10, 2)), 2) AS ret_qty,
        ROUND(CAST((osrc.bill_total)  AS DECIMAL(10, 2)), 2) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIn customers c ON c.id = osrc.customer
        WHERE osrc.deleteid = 0
        AND osrc.order_base = '5' AND osrc.id != 2423  
        AND osrc.remarks = 'Return to Re-sale'   
        AND osrc.update_date BETWEEN '$formdate' AND '$todate'
        $slLog
         ")->result();


        $combinedArray = array();
        foreach ($result as $row) {
            $combinedArray[$row->order_id] = (object) $row;
        }
        foreach ($resultReturns as $row) {
            $key = $row->order_id;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->ret_qty += $row->ret_qty;
                $combinedArray[$key]->ret_value += $row->ret_value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }
        $combinedArray = array_values($combinedArray);

        foreach ($combinedArray as &$row) {
            $totals['brand_qty'] += $row->qty;
            $totals['brand_value'] += $row->value;
            $totals['brand_ret_qty'] += $row->ret_qty;
            $totals['brand_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['brand_actual_qty'] += $row->actual_qty;
            $totals['brand_actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
        }
        usort($combinedArray, function ($a, $b) {
          return strcmp(strtolower(trim($a->order_no)), strtolower(trim($b->order_no)));
      });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        echo json_encode($arrayMain);
    }

    public function fetch_data_regular_irregular_orders_report_export()
    {
        $sl = $_GET['customer_id'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $slLog = '';

        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND c.id IN (' . $sl . ') ';
        }



        $result = $this->db->query("SELECT 
        op.order_no,
        c.company_name,op.id as order_id,
        ROUND(CAST(SUM(oplp.qty) AS DECIMAL(10, 2)), 2) AS qty,
        ROUND(CAST((op.bill_total)  AS DECIMAL(10, 2)), 2) AS value
        FROM orders_process op
        LEFT JOIN order_product_list_process oplp ON oplp.order_id = op.id
        LEFT JOIn customers c ON c.id = op.customer_id
        WHERE op.deleteid = 0
        AND (op.order_base > 0)
        AND (op.create_date BETWEEN '$formdate' AND '$todate')
        $slLog
        GROUP BY op.id ")->result();


        $resultReturns = $this->db->query("SELECT 
        osrc.order_id,
        osrc.order_no,
        c.company_name,
        ROUND(CAST((osrc.qty) AS DECIMAL(10, 2)), 2) AS ret_qty,
        ROUND(CAST((osrc.bill_total)  AS DECIMAL(10, 2)), 2) AS ret_value
        FROM order_sales_return_complaints osrc
        LEFT JOIn customers c ON c.id = osrc.customer
        WHERE osrc.deleteid = 0
        AND osrc.order_base = '5' AND osrc.id != 2423  
        AND osrc.remarks = 'Return to Re-sale'   
        AND osrc.update_date BETWEEN '$formdate' AND '$todate'
        $slLog
         ")->result();


        $combinedArray = array();
        foreach ($result as $row) {
            $combinedArray[$row->order_id] = (object) $row;
        }
        foreach ($resultReturns as $row) {
            $key = $row->order_id;
            if (isset($combinedArray[$key])) {
                $combinedArray[$key]->ret_qty += $row->ret_qty;
                $combinedArray[$key]->ret_value += $row->ret_value;
            } else {
                $combinedArray[$key] = (object) $row;
            }
        }
        $combinedArray = array_values($combinedArray);

        foreach ($combinedArray as &$row) {
            $totals['brand_qty'] += $row->qty;
            $totals['brand_value'] += $row->value;
            $totals['brand_ret_qty'] += $row->ret_qty;
            $totals['brand_ret_value'] += $row->ret_value;
            $row->actual_qty = sprintf("%.2f", $row->qty - $row->ret_qty);
            $row->actual_value = sprintf("%.2f", $row->value - $row->ret_value);
            $totals['brand_actual_qty'] += $row->actual_qty;
            $totals['brand_actual_value'] += $row->actual_value;
            $row->qty = $row->qty == '0.00' ? 0 : $row->qty;
            $row->value = $row->value == '0.00' ? 0 : $row->value;
            $row->ret_qty = $row->ret_qty == '0.00' ? 0 : $row->ret_qty;
            $row->ret_value = $row->ret_value == '0.00' ? 0 : $row->ret_value;
            $row->actual_qty =  $row->actual_qty == '0.00' ? 0 : $row->actual_qty;
            $row->actual_value = $row->actual_value == '0.00' ? 0 : $row->actual_value;
            $row->order_no = '"'.$row->order_no.'"';
        }
        // function compareById($a, $b) {
        //         return $b->total_bill - $a->total_bill;
        // }
        // usort($mergedArray, 'compareById');\
          usort($combinedArray, function ($a, $b) {
          return strcmp(strtolower(trim($a->order_no)), strtolower(trim($b->order_no)));
      });
        $arrayMain['data'] = $combinedArray;
        $arrayMain['totals'] = $totals;
        $filename = 'Sale Regular Irregular Order Details ' . $formdate . ' to ' . $todate;
        $arrayMain['filename'] = $filename;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/regular_irregular_orders_report_export', $arrayMain);
    }
    public function customer_yes_or_no_regular_report()
    {




        if (isset($this->session->userdata['logged_in'])) {
            $data['sales_team'] = $this->Main_model->where_names_three_order_by('admin_users', 'access', 12, 'deleteid', '0', 'status', '1', 'id', 'ASC');
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title']    = 'Regular Customer YES or NO Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/customer_yes_or_no_regular_report.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }

    public function customer_yes_or_no_regular_cons_report()
    {




        if (isset($this->session->userdata['logged_in'])) {
            $data['sales_team'] = $this->Main_model->where_names_three_order_by('admin_users', 'access', 12, 'deleteid', '0', 'status', '1', 'id', 'ASC');
             $sql = $this->db->query("SELECT  (c.area) FROM customers c WHERE  (c.area) != '' GROUP BY c.area ORDER BY c.area")->result();
            $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->area)) {
                    return strval( ($obj->area));
                } elseif (is_array($obj) && isset($obj['area'])) {
                    return strval( ($obj['area']));
                } else {
                    return null; // Handle the case when 'product_id' is not found
                }
            }, $sql));
            $areas = array_unique(explode(',', $commaSeperatedCustomer));
             // $areas[] = 'NULL';
            $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['customers'] =  $areas;
            $data['active_base'] = 'route';
            $data['active'] = 'route';
            $data['title']    = 'Customer Area YES or NO Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/customer_yes_or_no_regular_cons_report.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }



    public function fetch_data_get_customer_yes_no_order_report()
    {


  $limitExtend = " SET SESSION group_concat_max_len = 999999 ";

        $this->db->query( $limitExtend);


        $cateid = $_GET['cate_id']; 
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $searchVal = $_GET['searchVal'];
        $status = $_GET['status'];
        $stat = "";
        $stat2 = "";


        $testMode = (isset($_GET['test']) && $_GET['test']);

        if ($searchVal != '') {
            $stat .= " AND c.company_name LIKE '%$searchVal%' ";
            $stat2 .= " AND b.customername  LIKE '%$searchVal%' ";

        }


        $userslog = "";



        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }


$all = 1;
        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {

$all = 0;

            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }

        // echo $userslog;
        // exit;


        // $currentDate = new DateTime();
        //       $currentYear = (int)date('Y');
        //       $financialYearStart = new DateTime(($currentDate->format('m') >= 4 ? $currentYear : $currentYear - 1) . '-04-01');
        //       $financialYearStart = date($financialYearStart,'Y-m-d');
        //       $today = date('Y-m-d');

        $financialYearStart = date('Y-m-01', strtotime($formdate));
         // $financialYearStart = date('Y-m-01', strtotime($formdate));
    $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;



        $startDateTime = new DateTime($financialYearStart);
        $endDateTime = new DateTime($today);
        $endDateTimeActual = new DateTime($todayActual);


        $inbetween = $startDateTime->diff($endDateTime);
        $inbetweenMonths = $startDateTime->diff($endDateTimeActual);
        $dayCount = $inbetween->days + 1;

        $monthsCount = 0;

       
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateTime, $interval, $endDateTime);
        // $monthsCount = $period->format('%m') + 1;;
        $monthRanges = [];
 

        $sqlMonths = '';
        $sqlMonthsOnly = '';
        $checkNotOrders = ' AND (';
        $headers = [];

        foreach ($period as $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'formatMonth' =>  $date->format('Y-m')
            ];
  $headers[] = [
                
                'month' => $date->format('M'),
                'year' =>  substr($date->format('Y'), -2) ,
                'monthFull' =>   ($date->format('F')) 
            ];
            $sqlMonths .=  "GROUP_CONCAT(DISTINCT CASE WHEN op.create_date BETWEEN '" . $date->format('Y-m-01') . "' AND '" . $date->format('Y-m-t') . "' THEN  op.id  END SEPARATOR ',' ) as " . $date->format('F') . " ,";
            $sqlMonthsOnly .=  "b.".$date->format('F')." ,";
            $checkNotOrders .= " ( b.".$date->format('F')."  IS NOT NULL) OR ";
            $monthsCount++;

        }
        //clear last OR word
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";

            if($status == 'true'){
$checkNotOrders = '';
            }
        // print_r($sqlMonths);
        // exit;
        foreach ($period as $date) {
            $monthsArray[] = "b." . $date->format('F');
        }


        $monthCond = implode(',', $monthsArray);



        if ($cateid != 'ALL') {
        $stat .= ' AND c.sales_team_id="' . $cateid . '"';
        $stat2 .= ' AND b.sales_team_id="' . $cateid . '"';
}
  
            
                    $result = $this->db->query("SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE   cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0  $userslog $stat2    GROUP BY b.customer_id ORDER BY b.customername ASC ");


                    // echo "SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE   cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0 $checkNotOrders  $stat2    GROUP BY b.customer_id ORDER BY b.customername ASC";
                    // exit;
            $groupData = $this->db->query("SELECT 
    COUNT(DISTINCT op.id) as orderTotal,
    COUNT(DISTINCT c.id) as customerTotal,
    COALESCE(billTotal.total_bill, 0) AS billTotal,
    b.customer_id,
    c.sales_team_id
FROM 
    customer_yes_or_no_report b 
LEFT JOIN 
    orders_process op ON op.customer_id = b.customer_id
LEFT JOIN 
    customers c ON c.id = b.customer_id 
LEFT JOIN 
    (
        SELECT 
            op2.customer_id,
            SUM(op2.bill_total) AS total_bill
        FROM 
            orders_process op2 
        WHERE 
            op2.deleteid = '0' AND
            op2.order_base > 0
            AND op2.create_date BETWEEN '$financialYearStart' AND '$today'
        GROUP BY 
            op2.customer_id
    ) AS billTotal ON billTotal.customer_id = b.customer_id
WHERE 
    b.id > 0 
    $stat2 AND 
    c.regular = 'YES' 
    AND op.order_base > '0' 
    AND op.deleteid = '0' 
    AND c.deleteid = '0' 
    AND op.create_date BETWEEN '$financialYearStart' AND '$today'
GROUP BY 
    b.customer_id ")->result();


            $ordersTotal = $this->db->query("SELECT 
                                    $sqlMonths
                                    b.customer_id
                                    FROM orders_process op 
                                    LEFT JOIN customer_yes_or_no_report b   ON op.customer_id = b.customer_id
                                    LEFT JOIN customers c ON c.id = b.customer_id 
                                    WHERE 
                                    c.regular = 'YES' AND
                                    op.order_base > '0'  AND 
                                    op.deleteid = '0' AND 
                                    op.create_date BETWEEN '$financialYearStart' AND '$today'  
                                    GROUP BY op.customer_id ")->result();
           
          

 

        $monthDataArr = array();

        foreach ($ordersTotal as $key => $value) {
            $data = (array) $value;
            $keys = array_keys($data);
            $values = array_values($data);

            foreach ($keys as $in => $m) {
                $monthDataArr[$value->customer_id][$keys[$in]] = $values[$in];
            }
        }



        // print_r($monthDataArr);
        //  exit;
        $groupArr = [];
        $sl = array();

        foreach ($groupData as $value) {
            $groupArr[$value->customer_id]['orderTotal'] = $value->orderTotal;
            $groupArr[$value->customer_id]['customerTotal'] = $value->customerTotal;
            $groupArr[$value->customer_id]['billTotal'] = $value->billTotal;
            if($value->orderTotal > 0){
            $groupArr[$value->customer_id]['valid'] = true;
            }else{
            $groupArr[$value->customer_id]['valid'] = false;
            }

           
        }

        $result = $result->result();

        $i = 1;
        $array = array();
        function Validate($value)
        {
            if ($value != null) {
                return $value;
            } else {
                return '';
            }
        }

        $sl2 = array();
function checkEmpty($value, $monthRanges){
    $nowValue = $value;
    $yes = false;
    foreach($monthRanges as $month){
        $key = $month['month'];
        $valueForMonth = $nowValue->$key;
        // echo $value->customername." Checking month: $key, Value: $valueForMonth, State: $valueForMonth != '' $\n"; // Debugging statement
        if($valueForMonth != ''){
            $yes = true;
             if($month['formatMonth'] > date('Y-m')){
            $yes = false;
        }
        }
       
    }
    // if($yes > 0)  {
    //     return true;
    // } else {
        return $yes;
    // }
}

foreach ($result as $value) {
    // Assuming $monthRanges
    $valid = checkEmpty($value, $monthRanges);
  $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            // $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];
     if($status == 'true' || ($groupArr[$value->customer_id]['billTotal'] || $valid)){
      
             $dataRow = array(
                // 'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                // 'sa' => $sa,
                // 'ba' => $ba,
                'April' => Validate($value->April),
                'May' => Validate($value->May),
                'June' => Validate($value->June),
                'July' => Validate($value->July),
                'August' => Validate($value->August),
                'September' => Validate($value->September),
                'October' => Validate($value->October),
                'November' => Validate($value->November),
                'December' => Validate($value->December),
                'January' => Validate($value->January),
                'February' => Validate($value->February),
                'March' => Validate($value->March),
                'year' => Validate($value->year),
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );
            // array_push($dataRow,$newArray);

           $unoffCus = 0;
           foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] = $monthDataArr[$value->customer_id][$entry['month']];

                if($dataRow[$entry['month']] == ''){
                  if(explode(',', $monthDataArr[$value->customer_id][$entry['month']])[0] != ''){
                    $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                  }
                  // $dataRow['orderIds'] = $monthDataArr[$value->customer_id];
                } 
                if( $entry['formatMonth'] > date('Y-m')){
                  $dataRow[$entry['month']] = '';
                }elseif($entry['formatMonth'] < date('2024-04')){
                  if($groupArr[$value->customer_id]['orderTotal'] == 0){
 $groupArr[$value->customer_id]['orderTotal'] = $groupArr[$value->customer_id]['orderTotal'] + preg_replace('/[^0-9]/', '', $dataRow[$entry['month']]);
                  }
                 
                  // $groupArr[$value->customer_id]['billTotal'] = $groupArr[$value->customer_id]['billTotal'] + 1;
                  $unoffCus++;
                  // $numbersOnly = preg_replace('/[^0-9]/', '', $dataRow[$entry['month']]);
                }
                
               
            }
              $dataRow['sa'] = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $dataRow['ba'] = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);
                   // $sl[$value->sales_team_id]['customers_count'] =  $sl[$value->sales_team_id]['customers_count']  + $unoffCus;

            // $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            // $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;





            $i++;    
            }
     }      
 
  
      function groupBy($array, $key)
{
    $result = array();
   
    foreach ($array as $item) {
        $groupValue = $item[$key];
        $slId = $item['sl_id'];
        if (!isset($result[$groupValue])) {
            $result[$groupValue] = array(
                'key' => $groupValue,
                'sl_id' => (int)$slId,
                'data' => array(),
            );
        }
        $result[$groupValue]['data'][] = $item;


    }

    // Sort the result array by 'sales_member_name'
    usort($result, function($a, $b) {
        return strcmp($a['key'], $b['key']);
    });

    // Add index $i to each item
   

    return array_values($result);
}

$groupingKey = 'sales_member';
$resultArray = groupBy($array, $groupingKey);
// Extract the 'name' column from $arrayOfArrays
usort($resultArray, function($a, $b) {
    return strcmp(strtolower($a['key']),strtolower($b['key'])); // Compare names alphabetically
});

 $i = 1;
    $j = 1;
  foreach ($resultArray as &$value) {
    // foreach ($result as &$item) {
        $value['index'] = $i++;
        $value['customers_count'] = count($value['data']);
        foreach($value['data'] as &$cus){
        $cus['no'] = $j++;
        }
    // }
  }




        foreach ($resultArray as &$value) {
            $slId = $value['sl_id'];
            $value['orders_count'] = $sl[$slId]['orders_count'];
            // $value['customers_count'] = $sl[$slId]['customers_count'];
            // print_r($value);
        }

 $arrayMain['ignore'] =$headers;
 $arrayMain[0] =$resultArray;
        echo json_encode($arrayMain);
    }

    public function fetch_data_get_customer_yes_no_cons_order_report()
   {





        $cateid = $_GET['cate_id'];
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $searchVal = $_GET['searchVal'];
        $status = $_GET['status'];

        $stat = "";
        $stat2 = "";

        if ($searchVal != '') {
            $stat .= " AND b.company_name  LIKE '%$searchVal%' ";
            $stat2 .= " AND c.company_name  LIKE '%$searchVal%' ";
        }

        

        $userslog = "";



        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }




        // $currentDate = new DateTime();
        //       $currentYear = (int)date('Y');
        //       $financialYearStart = new DateTime(($currentDate->format('m') >= 4 ? $currentYear : $currentYear - 1) . '-04-01');
        //       $financialYearStart = date($financialYearStart,'Y-m-d');
        //       $today = date('Y-m-d');
    $financialYearStart = date('Y-m-01', strtotime($formdate));
    $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
		// $financialYearStartFullSecond = $financialYearStartFull + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');


          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;



        $startDateTime = new DateTime($financialYearStart);
        $endDateTime = new DateTime($today);
        $endDateTimeActual = new DateTime($todayActual);


        $inbetween = $startDateTime->diff($endDateTime);
        $inbetweenMonths = $startDateTime->diff($endDateTimeActual);
        $dayCount = $inbetween->days + 1;

        $monthsCount =0;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateTime, $interval, $endDateTime);
        $monthRanges = [];

       
        $sqlMonths = '';
        $sqlMonthsOnly = '';
        $checkNotOrders = ' AND (';
        $headers = [];

        foreach ($period as $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F')
            ];
  $headers[] = [
                
                'month' => $date->format('M'),
                'year' =>  substr($date->format('Y'), -2) ,
                'monthFull' =>   ($date->format('F')) 
            ];
            $sqlMonths .=  "GROUP_CONCAT(CASE WHEN op.create_date BETWEEN '" . $date->format('Y-m-01') . "' AND '" . $date->format('Y-m-t') . "' THEN op.id END SEPARATOR ',' ) as " . $date->format('F') . " ,";
            $sqlMonthsOnly .=  "b.".$date->format('F')." ,";
            $checkNotOrders .= " b.".$date->format('F')."  != '' OR ";
            $monthsCount++;

        }
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";

            if($status == 0){
$checkNotOrders = '';
            }
        // print_r($sqlMonthsOnly);
        // exit;
        foreach ($period as $date) {
            $monthsArray[] = "b." . $date->format('F');
        }


        $monthCond = implode(',', $monthsArray);

$areaMode =  $_GET['areaMode'];
 
ini_set('memory_limit', '4400M');

        if ($cateid != 'All' || $searchVal != '') {
          if($cateid != 'All'){
            $stat .= " AND b.area IN ($cateid) ";
            $stat2 .= " AND c.area IN ($cateid) ";
            
          }
          if($areaMode == 1){
$stat .= " AND (b.area IS NOT NULL AND b.area != '') ";
$stat2 .= " AND (c.area IS NOT NULL OR c.area != '') ";

}else{
$stat .= " AND (b.area IS NULL OR b.area = '')  ";
$stat2 .= " AND (c.area IS NULL OR c.area = '')  ";

}
}
       
 
// echo $financialYearStart;
// exit;

           $result = $this->db->query("SELECT  b.id as customer_id,  b.sales_team_id, b.company_name as customername, b.phone as customerphone, b.area, b.competitor,  COALESCE(b.factory_workshop,'') as factory_workshop, au.username as sales_member, price_rateings as pp,  quality_rateings as qq, ratings as cc,  delivery_time_rateings as dd  , response_commission as rr   FROM customers as b  LEFT JOIN orders_process op  ON op.customer_id = b.id LEFT JOIN admin_users au ON au.id = b.sales_team_id WHERE b.deleteid = 0 $stat AND b.approved_status > 0 GROUP BY b.id ORDER BY b.sales_team_id ASC  ");

         


                $groupData = $this->db->query("SELECT
        COUNT(DISTINCT op.id) AS orderTotal,
        COUNT(DISTINCT b.id) AS customerTotal,
        SUM(op.bill_total) AS billTotal,
        b.id as customer_id,
        b.sales_team_id
    FROM
        customers b
    LEFT JOIN orders_process op ON
        op.customer_id = b.id
    WHERE op.order_base > '0' 
    $stat
    AND op.return_status = 0
    AND op.deleteid IN ('0','2024-12-01')
    AND b.deleteid = '0'  AND b.approved_status > 0 
    AND op.create_date   BETWEEN '$financialYearStart' AND '$today' 
                  GROUP BY b.id, b.area
               ")->result();

 // echo "SELECT
 //        COUNT(DISTINCT op.id) AS orderTotal,
 //        COUNT(DISTINCT b.id) AS customerTotal,
 //        SUM(op.bill_total) AS billTotal,
 //        b.id as customer_id,
 //        b.sales_team_id
 //    FROM
 //        customers b
 //    LEFT JOIN orders_process op ON
 //        op.customer_id = b.id
 //    WHERE op.order_base > '0' 
 //    $stat
 //    AND op.return_status = 0
 //    AND op.deleteid = '0'
 //    AND b.deleteid = '0'
 //    AND op.create_date   BETWEEN '$financialYearStart' AND '$today' 
 //                  GROUP BY b.id, b.sales_team_id";
 //                  exit;
            $ordersTotal = $this->db->query("SELECT 
                                    $sqlMonths
                                    b.id as customer_id
                                    FROM customers b 
                                    LEFT JOIN orders_process op  ON op.customer_id = b.id
                                    WHERE  
                                    op.order_base > '0' 
                                    $stat
                                    AND op.return_status = 0
                                    AND op.deleteid IN ('0','2024-12-01') 
                                    AND b.deleteid = '0'   AND b.approved_status > 0 
                                    GROUP BY 
                                    op.customer_id

                                   ")->result();
// echo "SELECT 
//                                     $sqlMonths
//                                     b.id as customer_id
//                                     FROM customers b 
//                                     LEFT JOIN orders_process op  ON op.customer_id = b.id
//                                     WHERE  
//                                     op.order_base > '0' 
//                                     $stat2
//                                     AND op.return_status = 0
//                                     AND op.deleteid = '0' 
//                                     AND b.deleteid = '0' 
//                                     GROUP BY 
//                                     op.customer_id";
//                                     exit;



        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(DISTINCT c.id) as customers_count, 
        $selectMonths
        c.sales_team_id,
        c.area
        FROM customers c 
        WHERE c.deleteid = 0
        $stat2
        $userslog2 
       AND c.approved_status > 0
       AND c.deleteid = 0
        GROUP BY c.area")->result();


// print_r($overAllCustomers);
// exit;
        foreach ($overAllCustomers as $key => $value) {
           foreach($monthRanges as $months){
            $keyName = $months['month'];
           $overAllCustomersArr[$value->area]['overall_customers_'.$months['no']] = $value->customers_count;

         }
        }


        
        $monthDataArr = array();

        foreach ($ordersTotal as $key => $value) {
           $monthDataArr[$value->customer_id]['customer_id'] = $value->customer_id;
             foreach ($monthRanges as $entry) {
$keyName = $entry['month'];
$monthDataArr[$value->customer_id][$entry['month']] = $value->$keyName;
                }
        }

// print_r($monthDataArr);
// exit;

        $groupArr = [];

        foreach ($groupData as $value) {
            $groupArr[$value->customer_id]['orderTotal'] = $value->orderTotal;
            $groupArr[$value->customer_id]['customerTotal'] = $value->customerTotal;
            $groupArr[$value->customer_id]['billTotal'] = $value->billTotal;
        }

        $result = $result->result();
        $i = 1;
        $array = array();
        function Validate($value)
        {
            if ($value != null) {
                return $value;
            } else {
                return '';
            }
        }

        $sl = array();
// print_r($result);
// exit;

        

        foreach ($result as  $value) {
            // print_r($groupArr[$value->customer_id]);
            if($status == 'false' && $groupArr[$value->customer_id]['orderTotal']){
            $sa = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $ba = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);

             $dataRow = array(
                'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                'sa' => $sa,
                'ba' => $ba,
               
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );

             foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] .= $monthDataArr[$value->customer_id][$entry['month']];
                if($monthDataArr[$value->customer_id][$entry['month']] != ''){
                      $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";

                }
            }
            $sl[$value->area]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            $sl[$value->area]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;





            $i++;    
            }

            if($status != 'false'){
   $sa = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $ba = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);

             $dataRow = array(
                'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                'sa' => $sa,
                'ba' => $ba,
                
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );
          foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] = $monthDataArr[$value->customer_id][$entry['month']];
                                  // $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                if($monthDataArr[$value->customer_id][$entry['month']]){
                      $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                }
                 if(! date('Y-m-31') < $entry['endDate']) {
                  $dataRow[$entry['month']] = '';
                 }
            }
            $sl[$value->area]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            $sl[$value->area]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;
            $i++;    
            }

               
           
        }
        // print_r($arrayMain);
        // exit;
     

       

        function groupByAreaSalesMemberCustomer($array) {
		    $result = [];

		    foreach ($array as $item) {
		        $area = $item['area'];
		        $customer_id = $item['customer_id'];
                if($area == null || $area == ''){
                        $area = 'null';
                    }
		        if (!isset($result[$area])) {
		            $result[$area] = [];
		        }

            $result[$area][] = $item;
		    }

		    return $result;
		}


		// Group by Area, then by sales_member, then by customer_id
		$arrayMain = groupByAreaSalesMemberCustomer($array);
	 

   foreach ($arrayMain as $index => &$entry) {
    $counts = array();
    $customers = array();
    $orders = 0;
    $sa = 0;
    $ba = 0;
    foreach($entry as $cusIn => $customer){
      foreach ($monthRanges as $entryM) {
        // $key2 = $entryM['month'];
        $num = $monthDataArr[$customer['customer_id']][$entryM['month']] != '' ? count(explode(',',$monthDataArr[$customer['customer_id']][$entryM['month']])) : 0;
        $counts[$entryM['month']] += $num;
        // $number = $matches[0];
        // $counts[$key2] += $res[0];
    }
    $sa = $sa + $customer['sa'];
    $ba = $ba + $customer['ba'];
    $orders += $customer['orders'];
    } 


 usort($entry, function ($a, $b) {
          return strcmp(strtolower(trim($a['customername'])), strtolower(trim($b['customername'])));
      });
   

    // print_r($entry);
   
      $entry['stats'] = array(
          'customers' => count($entry), // Assuming each entry in $arrayMain represents one customer
          'orders' => $orders,
          'counts' => $counts,
          'sa' => $sa,
          'ba' => $ba
      );
    }

    // foreach($arrayMain as $cusIn => &$customer){
     
    // } 

		ksort($arrayMain);

    $arrayMain['ignore'] =$headers;

        echo json_encode($arrayMain);
    }


     public function fetch_data_get_customer_yes_no_cons_order_report_export()
   {




        $cateid = $_GET['cate_id'];
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $searchVal = $_GET['searchVal'];
        $status = $_GET['status'];

        $stat = "";
        $stat2 = "";

        if ($searchVal != '') {
            $stat .= " AND b.company_name  LIKE '%$searchVal%' ";
            $stat2 .= " AND c.company_name  LIKE '%$searchVal%' ";
        }

        

        $userslog = "";



        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }




        // $currentDate = new DateTime();
        //       $currentYear = (int)date('Y');
        //       $financialYearStart = new DateTime(($currentDate->format('m') >= 4 ? $currentYear : $currentYear - 1) . '-04-01');
        //       $financialYearStart = date($financialYearStart,'Y-m-d');
        //       $today = date('Y-m-d');
    $financialYearStart = date('Y-m-01', strtotime($formdate));
    $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
    // $financialYearStartFullSecond = $financialYearStartFull + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');


          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;



        $startDateTime = new DateTime($financialYearStart);
        $endDateTime = new DateTime($today);
        $endDateTimeActual = new DateTime($todayActual);


        $inbetween = $startDateTime->diff($endDateTime);
        $inbetweenMonths = $startDateTime->diff($endDateTimeActual);
        $dayCount = $inbetween->days + 1;

        $monthsCount =0;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateTime, $interval, $endDateTime);
        $monthRanges = [];

       
        $sqlMonths = '';
        $sqlMonthsOnly = '';
        $checkNotOrders = ' AND (';
        $headers = [];

        foreach ($period as $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F')
            ];
  $headers[] = [
                
                'month' => $date->format('M'),
                'year' =>  substr($date->format('Y'), -2) ,
                'monthFull' =>   ($date->format('F')) 
            ];
            $sqlMonths .=  "GROUP_CONCAT(CASE WHEN op.create_date BETWEEN '" . $date->format('Y-m-01') . "' AND '" . $date->format('Y-m-t') . "' THEN op.id END SEPARATOR ',' ) as " . $date->format('F') . " ,";
            $sqlMonthsOnly .=  "b.".$date->format('F')." ,";
            $checkNotOrders .= " b.".$date->format('F')."  != '' OR ";
            $monthsCount++;

        }
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";

            if($status == 0){
$checkNotOrders = '';
            }
        // print_r($sqlMonthsOnly);
        // exit;
        foreach ($period as $date) {
            $monthsArray[] = "b." . $date->format('F');
        }


        $monthCond = implode(',', $monthsArray);

$areaMode =  $_GET['areaMode'];
 
ini_set('memory_limit', '4400M');

        if ($cateid != 'All' || $searchVal != '') {
          if($cateid != 'All'){
            $stat .= " AND b.area IN ($cateid) ";
            $stat2 .= " AND b.area IN ($cateid) ";
            
          }
          if($areaMode == 1){
$stat .= " AND (b.area IS NOT NULL AND b.area != '') ";
$stat2 .= " AND (b.area IS NOT NULL OR b.area != '') ";

}else{
$stat .= " AND (b.area IS NULL OR b.area = '')  ";
$stat2 .= " AND (b.area IS NULL OR b.area = '')  ";

}
}
       
 
// echo $financialYearStart;
// exit;

           $result = $this->db->query("SELECT  b.id as customer_id,  b.sales_team_id, b.company_name as customername, b.phone as customerphone, b.area, b.competitor,  COALESCE(b.factory_workshop,'') as factory_workshop, au.username as sales_member, price_rateings as pp,  quality_rateings as qq, ratings as cc,  delivery_time_rateings as dd  , response_commission as rr   FROM customers as b  LEFT JOIN orders_process op  ON op.customer_id = b.id LEFT JOIN admin_users au ON au.id = b.sales_team_id WHERE b.deleteid = 0 $stat  AND b.approved_status > 0 GROUP BY b.id ORDER BY b.sales_team_id ASC  ");

         


                $groupData = $this->db->query("SELECT
        COUNT(DISTINCT op.id) AS orderTotal,
        COUNT(DISTINCT b.id) AS customerTotal,
        SUM(op.bill_total) AS billTotal,
        b.id as customer_id,
        b.sales_team_id
    FROM
        customers b
    LEFT JOIN orders_process op ON
        op.customer_id = b.id
    WHERE op.order_base > '0' 
    $stat
    AND op.return_status = 0
    AND op.deleteid IN ('0','2024-12-01')
    AND b.deleteid = '0'  AND b.approved_status > 0
    AND op.create_date   BETWEEN '$financialYearStart' AND '$today' 
                  GROUP BY b.id, b.sales_team_id
               ")->result();

 // echo "SELECT
 //        COUNT(DISTINCT op.id) AS orderTotal,
 //        COUNT(DISTINCT b.id) AS customerTotal,
 //        SUM(op.bill_total) AS billTotal,
 //        b.id as customer_id,
 //        b.sales_team_id
 //    FROM
 //        customers b
 //    LEFT JOIN orders_process op ON
 //        op.customer_id = b.id
 //    WHERE op.order_base > '0' 
 //    $stat
 //    AND op.return_status = 0
 //    AND op.deleteid = '0'
 //    AND b.deleteid = '0'
 //    AND op.create_date   BETWEEN '$financialYearStart' AND '$today' 
 //                  GROUP BY b.id, b.sales_team_id";
 //                  exit;
            $ordersTotal = $this->db->query("SELECT 
                                    $sqlMonths
                                    b.id as customer_id
                                    FROM customers b 
                                    LEFT JOIN orders_process op  ON op.customer_id = b.id
                                    WHERE  
                                    op.order_base > '0' 
                                    $stat
                                    AND op.return_status = 0  AND b.approved_status > 0
                                    AND op.deleteid IN ('0','2024-12-01') 
                                    AND b.deleteid = '0' 
                                    GROUP BY 
                                    op.customer_id

                                   ")->result();
// echo "SELECT 
//                                     $sqlMonths
//                                     b.id as customer_id
//                                     FROM customers b 
//                                     LEFT JOIN orders_process op  ON op.customer_id = b.id
//                                     WHERE  
//                                     op.order_base > '0' 
//                                     $stat2
//                                     AND op.return_status = 0
//                                     AND op.deleteid = '0' 
//                                     AND b.deleteid = '0' 
//                                     GROUP BY 
//                                     op.customer_id";
//                                     exit;

        $monthDataArr = array();

        foreach ($ordersTotal as $key => $value) {
           $monthDataArr[$value->customer_id]['customer_id'] = $value->customer_id;
             foreach ($monthRanges as $entry) {
$keyName = $entry['month'];
$monthDataArr[$value->customer_id][$entry['month']] = $value->$keyName;
                }
        }

// print_r($monthDataArr);
// exit;

        $groupArr = [];

        foreach ($groupData as $value) {
            $groupArr[$value->customer_id]['orderTotal'] = $value->orderTotal;
            $groupArr[$value->customer_id]['customerTotal'] = $value->customerTotal;
            $groupArr[$value->customer_id]['billTotal'] = $value->billTotal;
        }

        $result = $result->result();
        $i = 1;
        $array = array();
        function Validate($value)
        {
            if ($value != null) {
                return $value;
            } else {
                return '';
            }
        }

        $sl = array();
// print_r($result);
// exit;

        

        foreach ($result as  $value) {
            // print_r($groupArr[$value->customer_id]);
            if($status == 'false' && $groupArr[$value->customer_id]['orderTotal']){
            $sa = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $ba = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);

             $dataRow = array(
                'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                'sa' => $sa,
                'ba' => $ba,
               
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );

             foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] .= $monthDataArr[$value->customer_id][$entry['month']];
                if($monthDataArr[$value->customer_id][$entry['month']] != ''){
                      $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";

                }
            }
            $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;





            $i++;    
            }

            if($status != 'false'){
   $sa = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $ba = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);

             $dataRow = array(
                'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                'sa' => $sa,
                'ba' => $ba,
                
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );
          foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] = $monthDataArr[$value->customer_id][$entry['month']];
                                  // $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                if($monthDataArr[$value->customer_id][$entry['month']]){
                      $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                }
                 if(! date('Y-m-31') < $entry['endDate']) {
                  $dataRow[$entry['month']] = '';
                 }
            }
            $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;
            $i++;    
            }

               
           
        }
        // print_r($arrayMain);
        // exit;
     

       

        function groupByAreaSalesMemberCustomer($array) {
        $result = [];

        foreach ($array as $item) {
            $area = $item['area'];
            $customer_id = $item['customer_id'];
                if($area == null || $area == ''){
                        $area = 'null';
                    }
            if (!isset($result[$area])) {
              
                $result[$area] = [];
            }

            

            // if (!isset($result[$area][$customer_id])) {
                // $result[$area][$customer_id] = [];
            // }

            $result[$area][] = $item;
        }

        return $result;
    }

    // Group by Area, then by sales_member, then by customer_id
    $arrayMain = groupByAreaSalesMemberCustomer($array);

    foreach ($arrayMain as $key => &$value) {
        usort($value, function ($a, $b) {
          return strcmp(strtolower(trim($a['customername'])), strtolower(trim($b['customername'])));
      });
    }
   


    ksort($arrayMain);
    
    $res['ignore'] =$headers;
   $filename = 'Customer Area Yes No Report ';
        $res['filename'] = $filename;
        $res['data'] = $arrayMain;

// print_r($res);
// exit;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/customer_yes_or_no_report_cons_report_export', $res);

    }


    public function fetch_data_get_customer_yes_no_order_report_export()
    {



        $cateid = $_GET['cate_id']; 
        $limit = $_GET['limit'];
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $searchVal = $_GET['searchVal'];
        $status = $_GET['status'];
        $stat = "";
        $stat2 = "";


        $testMode = (isset($_GET['test']) && $_GET['test']);

        if ($searchVal != '') {
            $stat .= " AND c.company_name LIKE '%$searchVal%' ";
            $stat2 .= " AND b.customername  LIKE '%$searchVal%' ";

        }


        $userslog = "";



        if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  b.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";

            $userslog .= ' AND au.id IN (' . $sales_team_id . ')';
        }




        // $currentDate = new DateTime();
        //       $currentYear = (int)date('Y');
        //       $financialYearStart = new DateTime(($currentDate->format('m') >= 4 ? $currentYear : $currentYear - 1) . '-04-01');
        //       $financialYearStart = date($financialYearStart,'Y-m-d');
        //       $today = date('Y-m-d');

        $financialYearStart = date('Y-m-01', strtotime($formdate));
         // $financialYearStart = date('Y-m-01', strtotime($formdate));
    $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;



        $startDateTime = new DateTime($financialYearStart);
        $endDateTime = new DateTime($today);
        $endDateTimeActual = new DateTime($todayActual);


        $inbetween = $startDateTime->diff($endDateTime);
        $inbetweenMonths = $startDateTime->diff($endDateTimeActual);
        $dayCount = $inbetween->days + 1;

        $monthsCount = 0;

       
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateTime, $interval, $endDateTime);
        // $monthsCount = $period->format('%m') + 1;;
        $monthRanges = [];
 

        $sqlMonths = '';
        $sqlMonthsOnly = '';
        $checkNotOrders = ' AND (';
        $headers = [];

        foreach ($period as $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'formatMonth' =>  $date->format('Y-m')
            ];
  $headers[] = [
                
                'month' => $date->format('M'),
                'year' =>  substr($date->format('Y'), -2) ,
                'monthFull' =>   ($date->format('F')) 
            ];
            $sqlMonths .=  "GROUP_CONCAT(DISTINCT CASE WHEN op.create_date BETWEEN '" . $date->format('Y-m-01') . "' AND '" . $date->format('Y-m-t') . "' THEN  op.id  END SEPARATOR ',' ) as " . $date->format('F') . " ,";
            $sqlMonthsOnly .=  "b.".$date->format('F')." ,";
            $checkNotOrders .= " ( b.".$date->format('F')."  IS NOT NULL) OR ";
            $monthsCount++;

        }
        //clear last OR word
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";

            if($status == 'true'){
$checkNotOrders = '';
            }
        // print_r($sqlMonths);
        // exit;
        foreach ($period as $date) {
            $monthsArray[] = "b." . $date->format('F');
        }


        $monthCond = implode(',', $monthsArray);



        if ($cateid != 'ALL') {
        $stat .= ' AND c.sales_team_id="' . $cateid . '"';
        $stat2 .= ' AND b.sales_team_id="' . $cateid . '"';
}
  
            
                    $result = $this->db->query("SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE   cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0 $userslog  $stat2 GROUP BY b.customer_id ORDER BY b.customername ASC ");


                    // echo "SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE   cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0 $checkNotOrders  $stat2    GROUP BY b.customer_id ORDER BY b.customername ASC";
                    // exit;
            $groupData = $this->db->query("SELECT 
    COUNT(DISTINCT op.id) as orderTotal,
    COUNT(DISTINCT c.id) as customerTotal,
    COALESCE(billTotal.total_bill, 0) AS billTotal,
    b.customer_id,
    c.sales_team_id
FROM 
    customer_yes_or_no_report b 
LEFT JOIN 
    orders_process op ON op.customer_id = b.customer_id
LEFT JOIN 
    customers c ON c.id = b.customer_id 
LEFT JOIN 
    (
        SELECT 
            op2.customer_id,
            SUM(op2.bill_total) AS total_bill
        FROM 
            orders_process op2 
        WHERE 
            op2.deleteid = '0'  AND
            op2.order_base > 0
            AND op2.create_date BETWEEN '$financialYearStart' AND '$today'
        GROUP BY 
            op2.customer_id
    ) AS billTotal ON billTotal.customer_id = b.customer_id
WHERE 
    b.id > 0 
    $stat2 AND 
    c.regular = 'YES' 
    AND op.order_base > '0' 
    AND op.deleteid = '0' 
    AND c.deleteid = '0' 
    AND op.create_date BETWEEN '$financialYearStart' AND '$today'
GROUP BY 
    b.customer_id ")->result();


            $ordersTotal = $this->db->query("SELECT 
                                    $sqlMonths
                                    b.customer_id
                                    FROM orders_process op 
                                    LEFT JOIN customer_yes_or_no_report b   ON op.customer_id = b.customer_id
                                    LEFT JOIN customers c ON c.id = b.customer_id 
                                    WHERE 
                                    c.regular = 'YES' AND
                                    op.order_base > '0'  AND 
                                    op.deleteid = '0' AND 
                                    op.create_date BETWEEN '$financialYearStart' AND '$today'  
                                    GROUP BY op.customer_id ")->result();
           
          

 

        $monthDataArr = array();

        foreach ($ordersTotal as $key => $value) {
            $data = (array) $value;
            $keys = array_keys($data);
            $values = array_values($data);

            foreach ($keys as $in => $m) {
                $monthDataArr[$value->customer_id][$keys[$in]] = $values[$in];
            }
        }



        // print_r($monthDataArr);
        //  exit;
        $groupArr = [];
        $sl = array();

        foreach ($groupData as $value) {
            $groupArr[$value->customer_id]['orderTotal'] = $value->orderTotal;
            $groupArr[$value->customer_id]['customerTotal'] = $value->customerTotal;
            $groupArr[$value->customer_id]['billTotal'] = $value->billTotal;
            if($value->orderTotal > 0){
            $groupArr[$value->customer_id]['valid'] = true;
            }else{
            $groupArr[$value->customer_id]['valid'] = false;
            }

           
        }

        $result = $result->result();

        $i = 1;
        $array = array();
        function Validate($value)
        {
            if ($value != null) {
                return $value;
            } else {
                return '';
            }
        }

        $sl2 = array();
function checkEmpty($value, $monthRanges){
    $nowValue = $value;
    $yes = false;
    foreach($monthRanges as $month){
        $key = $month['month'];
        $valueForMonth = $nowValue->$key;
        // echo $value->customername." Checking month: $key, Value: $valueForMonth, State: $valueForMonth != '' $\n"; // Debugging statement
        if($valueForMonth != ''){
            $yes = true;
             if($month['formatMonth'] > date('Y-m')){
            $yes = false;
        }
        }
       
    }
    // if($yes > 0)  {
    //     return true;
    // } else {
        return $yes;
    // }
}

foreach ($result as $value) {
    // Assuming $monthRanges
    $valid = checkEmpty($value, $monthRanges);
  $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            // $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];
     if($status == 'true' || ($groupArr[$value->customer_id]['billTotal'] || $valid)){
      
             $dataRow = array(
                // 'no' => $i,
                'sales_member' => $value->sales_member,
                'customer_id' => $value->customer_id,
                'sl_id' => $value->sales_team_id,
                'customername' => $value->customername,
                'customerphone' => $value->customerphone,
                'area' => $value->area,
                'competitor' => $value->competitor,
                'factory_workshop' => $value->factory_workshop,
                'cc' => $value->cc,
                'pp' => $value->pp,
                'dd' => $value->dd,
                'qq' => $value->qq,
                'rr' => $value->rr,
                // 'sa' => $sa,
                // 'ba' => $ba,
                'April' => Validate($value->April),
                'May' => Validate($value->May),
                'June' => Validate($value->June),
                'July' => Validate($value->July),
                'August' => Validate($value->August),
                'September' => Validate($value->September),
                'October' => Validate($value->October),
                'November' => Validate($value->November),
                'December' => Validate($value->December),
                'January' => Validate($value->January),
                'February' => Validate($value->February),
                'March' => Validate($value->March),
                'year' => Validate($value->year),
                'orders' => $groupArr[$value->customer_id]['orderTotal']
            );
            // array_push($dataRow,$newArray);

           $unoffCus = 0;
           foreach ($monthRanges as $entry) {
                $dataRow[$entry['month'] . "_orders"] = $monthDataArr[$value->customer_id][$entry['month']];

                if($dataRow[$entry['month']] == ''){
                  if(explode(',', $monthDataArr[$value->customer_id][$entry['month']])[0] != ''){
                    $dataRow[$entry['month']] = "YES (".count(explode(',', $monthDataArr[$value->customer_id][$entry['month']])).")";
                  }
                  // $dataRow['orderIds'] = $monthDataArr[$value->customer_id];
                } 
                if( $entry['formatMonth'] > date('Y-m')){
                  $dataRow[$entry['month']] = '';
                }elseif($entry['formatMonth'] < date('2024-04')){
                  if($groupArr[$value->customer_id]['orderTotal'] == 0){
 $groupArr[$value->customer_id]['orderTotal'] = $groupArr[$value->customer_id]['orderTotal'] + preg_replace('/[^0-9]/', '', $dataRow[$entry['month']]);
                  }
                 
                  // $groupArr[$value->customer_id]['billTotal'] = $groupArr[$value->customer_id]['billTotal'] + 1;
                  $unoffCus++;
                  // $numbersOnly = preg_replace('/[^0-9]/', '', $dataRow[$entry['month']]);
                }
                
               
            }
              $dataRow['sa'] = sprintf("%.2f", $groupArr[$value->customer_id]['billTotal'] / $monthsCount);
            $dataRow['ba'] = sprintf("%.2f", $groupArr[$value->customer_id]['orderTotal'] / $monthsCount);
                   // $sl[$value->sales_team_id]['customers_count'] =  $sl[$value->sales_team_id]['customers_count']  + $unoffCus;

            // $sl[$value->sales_team_id]['orders_count'] += $groupArr[$value->customer_id]['orderTotal'];
            // $sl[$value->sales_team_id]['customers_count'] += $groupArr[$value->customer_id]['customerTotal'];

            $array[] = $dataRow;





            $i++;    
            }
     }      
 
  
      function groupBy($array, $key)
{
    $result = array();
    foreach ($array as $item) {
        $groupValue = $item[$key];
        $slId = $item['sl_id'];
        if (!isset($result[$groupValue])) {
            $result[$groupValue] = array(
                'key' => $groupValue,
                'sl_id' => (int)$slId,
                'data' => array(),
            );
        }
        $result[$groupValue]['data'][] = $item;


    }

    // Sort the result array by 'sales_member_name'
    usort($result, function($a, $b) {
        return strcmp($a['key'], $b['key']);
    });

 

    return array_values($result);
}

$groupingKey = 'sales_member';
$resultArray = groupBy($array, $groupingKey);
usort($resultArray, function($a, $b) {
    return strcmp(strtolower($a['key']),strtolower($b['key'])); // Compare names alphabetically
});

 $i = 1;
    $j = 1;
  foreach ($resultArray as &$value) {
    // foreach ($result as &$item) {
        $value['index'] = $i++;
        $value['customers_count'] = count($value['data']);
        foreach($value['data'] as &$cus){
        $cus['no'] = $j++;
        }
    // }
  }

        foreach ($resultArray as &$value) {
            $slId = $value['sl_id'];
            $value['orders_count'] = $sl[$slId]['orders_count'];
            // $value['customers_count'] = $sl[$slId]['customers_count'];
            // print_r($value);
        }

 $arrayMain['ignore'] =$headers;
 $arrayMain[0] =$resultArray;
        $filename = 'Regular Customer Yes No Report ';
        $arrayMain['filename'] = $filename;
        $arrayMain['data'] = $resultArray;

        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/customer_yes_or_no_report_export', $arrayMain);
    }




    public function balancereport_base_ledger_tcs()
    {


        ini_set('memory_limit', '4400M');

        if (isset($this->session->userdata['logged_in'])) {

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['partytype'] = $this->Main_model->where_names('partytype', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('customers', 'deleteid', '0');
            $data['bankaccount'] = $this->Main_model->where_names('bankaccount', 'deleteid', '0');


            $data['data_title'] = "";
            if (isset($_GET['accountshead'])) {
                $accountshead = $this->Main_model->where_names('accountheads_sub_group', 'id', $_GET['accountshead']);
                foreach ($accountshead as $val) {
                    $data['data_title'] = $val->name;
                }
            }


            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title']    = 'Recent Ledger Transaction - TCS';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/balancereport_base_ledger_tcs.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }
    public function balancereport_base_ledger_roundoff()
    {


        ini_set('memory_limit', '4400M');

        if (isset($this->session->userdata['logged_in'])) {

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['partytype'] = $this->Main_model->where_names('partytype', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('customers', 'deleteid', '0');
            $data['bankaccount'] = $this->Main_model->where_names('bankaccount', 'deleteid', '0');


            $data['data_title'] = "";
            if (isset($_GET['accountshead'])) {
                $accountshead = $this->Main_model->where_names('accountheads_sub_group', 'id', $_GET['accountshead']);
                foreach ($accountshead as $val) {
                    $data['data_title'] = $val->name;
                }
            }


            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title']    = 'Recent Ledger Transaction - TCS';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/balancereport_base_ledger_roundoff.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }
    public function list_ret_resale()
    {


        ini_set('memory_limit', '4400M');

        if (isset($this->session->userdata['logged_in'])) {

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['partytype'] = $this->Main_model->where_names('partytype', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('customers', 'deleteid', '0');
            $data['bankaccount'] = $this->Main_model->where_names('bankaccount', 'deleteid', '0');


            $data['data_title'] = "";
            if (isset($_GET['accountshead'])) {
                $accountshead = $this->Main_model->where_names('accountheads_sub_group', 'id', $_GET['accountshead']);
                foreach ($accountshead as $val) {
                    $data['data_title'] = $val->name;
                }
            }


            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title']    = 'Customer Return to Re-sale Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/list_ret_resale.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }

    public function fetch_data_get_roundoff()
    {
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $arrayFinal = [];
        $query = $this->db->query("SELECT op.*, c.company_name FROM orders_process op LEFT JOIN customers c ON c.id = op.customer_id WHERE op.tcsamount > 0 AND op.roundoff != '' AND op.deleteid = 0 AND op.create_date BETWEEN '$formdate' AND '$todate' ORDER BY op.order_no ASC ")->result();

        $totals = 0;
        foreach ($query as  &$row) {
            $row->create_date = date('d-m-Y', strtotime($row->create_date));
            $row->bill_actual = $row->bill_total - $row->roundoff;
            $totals = $totals + $row->roundoff;
        }

        $arrayFinal['data'] = $query;
        $arrayFinal['totals'] = $totals;

        echo json_encode($arrayFinal);
    }
    public function fetch_data_get_tcs()
    {
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $arrayFinal = [];
        $query = $this->db->query("SELECT op.*, c.company_name FROM orders_process op LEFT JOIN customers c ON c.id = op.customer_id WHERE op.tcsamount > 0 AND op.tcsamount != '' AND op.deleteid = 0 AND op.create_date BETWEEN '$formdate' AND '$todate' ORDER BY op.order_no ASC ")->result();

        $totals = 0;
        foreach ($query as  &$row) {
            $row->create_date = date('d-m-Y', strtotime($row->create_date));
            $row->bill_actual = $row->bill_total - $row->tcsamount;
            $totals = $totals + $row->tcsamount;
        }
        $arrayFinal['data'] = $query;
        $arrayFinal['totals'] = $totals;
        echo json_encode($arrayFinal);
    }
    public function setYearTarget()
    {
        $form_data = json_decode(file_get_contents("php://input"));

        $yearTarget = $form_data->target ? $form_data->target : 0;
        $id = $form_data->id;
        $reportName = $form_data->report_name;
        $catId = isset($form_data->field_name) ? $form_data->field_name : '-';

        $currentDate = new DateTime(date('Y-m-01', strtotime($form_data->for_date)));

        $currentYear = $currentDate->format('Y');
        $startFinancialYear = new DateTime("{$currentYear}-04-01");
        $endFinancialYear = clone $startFinancialYear;
        $endFinancialYear->modify('+1 year')->modify('-1 month');

        $endDate = ($currentDate >= $startFinancialYear && $currentDate < $endFinancialYear)
            ? $endFinancialYear
            : $startFinancialYear->modify('-1 day');

        // $interval = $currentDate->diff($endDate);
        $numMonths = 12;

        if ($numMonths <= 0) {
            $forMonth = $currentDate->format('Y-m-01');
            $this->setMonthlyTarget($id, $reportName, round($yearTarget, 2), $forMonth, $catId);
            return;
        }

        $monthlyTarget =  round($yearTarget / $numMonths, 2);

        while ($currentDate <= $endDate) {
            $forMonth = $currentDate->format('Y-m-01');

            $this->setMonthlyTarget($id, $reportName, $monthlyTarget, $forMonth, $catId);

            $currentDate->modify('+1 month');
        }
    }





    private function setMonthlyTarget($id, $reportName, $target, $forMonth, $catId)
    {
        $getQuery = $this->db->query('SELECT modified_value FROM report_changes WHERE salesman_id = ? AND report_name = ? AND for_date = ? AND field = ?', array($id, $reportName, $forMonth, $catId))->row();

        if (isset($getQuery->modified_value)) {
            $updateQuery = 'UPDATE report_changes SET modified_value = ? WHERE salesman_id = ? AND report_name = ? AND for_date = ? AND field = ?';
            $this->db->query($updateQuery, array($target, $id, $reportName, $forMonth, $catId));
        } else {
            $insertQuery = 'INSERT INTO report_changes (salesman_id, report_name, modified_value, for_date, field) VALUES (?, ?, ?, ?, ?)';
            $this->db->query($insertQuery, array($id, $reportName, $target, $forMonth, $catId));
        }
    }


    public function fetch_data_get_ret_resale()
    {
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $customer_id = $_GET['customer_id'];

        $sql = '';

        if ($customer_id != '' && $customer_id != 'All') {
            $sql .=  ' AND op.customer_id="' . $customer_id . '"';
        }


        $arrayFinal = [];
        $query = $this->db->query(
       "SELECT                                                       
                                op.create_date,
                                op.create_time,
                                b.create_date as return_date,
                                cc.company_name,
                                op.order_no,
                                b.re_order_no,
                                op.payment_mode,
                                op.bill_total as bill_actual,
                                b.remarks as reason,
                                SUM(c.qty*c.rate) as return_amount,
                                SUM(c.return_qty_pick*c.rate) as return_picked_amount,
                                SUM(c.return_qty_pick) as return_picked_qty,
                                SUM(c.return_delivered_qty) as return_delivered_qty,
                                SUM(c.return_delivered_qty*c.rate) as return_delivered_amount_fix,
                                SUM(c.qty) as return_qty,b.return_delivered_amount as return_delivered_amount

                                                                      FROM  order_sales_return_complaints as b 
                                                                      LEFT JOIN orders_process op ON b.order_no = op.order_no
                                                                      LEFT JOIN customers cc ON cc.id = op.customer_id
                                                                      JOIN sales_return_products as c ON b.id=c.c_id  

                                                                      WHERE b.deleteid=0  AND  b.order_base=2  AND date(b.create_date) <= '".$todate."'  AND b.remarks NOT IN ('Driver Return Trip Assigned','Driver Delivered The Order') $sql GROUP BY b.id  ORDER BY b.id DESC")->result();

        $totals = 0;
        foreach ($query as  &$row) {



                                                            $return_delivered_amount=$row->return_delivered_amount;
                                                            $return_amount_val=$row->return_amount;
                                                            $gstreturn=$return_amount_val*18/100;
                                                            $inproduction_total_return=round($return_amount_val+$gstreturn);
                                                            $return_return_picked_amount=$row->return_picked_amount;
                                                            $gstreturn_picked=$return_return_picked_amount*18/100;
                                                            $inproduction_total_return_picked=round($return_return_picked_amount+$gstreturn_picked);
                                                            
                                                            if($return_delivered_amount<=0)
                                                            {
                                                                $return_delivered_amount_fix=$row->return_delivered_amount_fix;
                                                                if($return_delivered_amount_fix>0)
                                                                {
                                                                       $gstreturn_next=$return_delivered_amount_fix*18/100;
                                                                       $return_delivered_amount=round($return_delivered_amount_fix+$gstreturn_next);

                                                                }

                                                            }
                            


                            $inproduction_total_return=round($inproduction_total_return-$return_delivered_amount-$inproduction_total_return_picked);


                                                                     if($inproduction_total_return<=2)
                                                                     {
                                                                        $inproduction_total_return=0;
                                                                     }

            $row->return_amount =$inproduction_total_return;
            $row->return_qty =$row->return_qty-$row->return_picked_qty;
            $row->order_no = $row->order_no . ' (' . $row->re_order_no . ')';
            $row->create_date = date('d-m-Y h:i:s A', strtotime($row->create_date . ' ' . $row->create_time));
            $row->return_date = date('d-m-Y h:i:s A', strtotime($row->return_date));
        }
        $arrayFinal['data'] = $query;
        $arrayFinal['totals'] = $totals;
        echo json_encode($arrayFinal);
    }




    public function customer_cnn_report()
    {


        ini_set('memory_limit', '4400M');

        if (isset($this->session->userdata['logged_in'])) {

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['partytype'] = $this->Main_model->where_names('partytype', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('customers', 'deleteid', '0');
            $data['bankaccount'] = $this->Main_model->where_names('bankaccount', 'deleteid', '0');


            $data['data_title'] = "";
            if (isset($_GET['accountshead'])) {
                $accountshead = $this->Main_model->where_names('accountheads_sub_group', 'id', $_GET['accountshead']);
                foreach ($accountshead as $val) {
                    $data['data_title'] = $val->name;
                }
            }


            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title']    = 'Customer CNN Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/customer_cnn_report.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }




    public function fetch_data_customer_cnn_report()
    {
        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $customer_id = $_GET['customer_id'];

        $sql = '';

        // if($customer_id != '' && $customer_id != 'All'){
        //     $sql .=  ' AND op.customer_id LIKE "%' . $customer_id.'%" ' ;
        // }
        $totals = [];

        $arrayFinal = [];
        $query = $this->db->query("SELECT c.company_name , au.username,  (al.credits) as credits
                FROM customers c 
                LEFT JOIN all_ledgers al ON al.customer_id = c.id
                LEFT JOIN admin_users au ON au.id = al.user_id AND au.id = c.sales_team_id
                WHERE 
                payment_date BETWEEN '$formdate' AND '$todate' AND
                al.cnn_status = '1' AND
                al.credits > 0 AND
                al.deleteid = '0' AND 
                al.party_type=1
                 
                ORDER BY 
                c.company_name ASC")->result();

        foreach ($query as &$en) {
            $totals['credits'] += $en->credits;
        }

        // $totals = 0;
        $arrayFinal['data'] = $query;
        $arrayFinal['totals'] = $totals;
        echo json_encode($arrayFinal);
    }




    public function profit_or_loss_report()
    {
        ini_set('memory_limit', '4400M');

        if (isset($this->session->userdata['logged_in'])) {

            $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
            $data['partytype'] = $this->Main_model->where_names('partytype', 'deleteid', '0');
            $data['customers'] = $this->Main_model->where_names('customers', 'deleteid', '0');
            $data['bankaccount'] = $this->Main_model->where_names('bankaccount', 'deleteid', '0');


            $data['data_title'] = "";
            if (isset($_GET['accountshead'])) {
                $accountshead = $this->Main_model->where_names('accountheads_sub_group', 'id', $_GET['accountshead']);
                foreach ($accountshead as $val) {
                    $data['data_title'] = $val->name;
                }
            }


            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title']    = 'Profit or Loss Report';
            $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('other_reports/profit_or_loss_report.php', $data);
        } else {

            redirect('index.php/adminmain');
        }
    }


    public function fetch_data_profit_or_loss_report()
    {

        $formdate = $_GET['formdate'];
        $todate = $_GET['todate'];
        $customer_id = $_GET['customer_id'];
        $sql = '';

        // if($customer_id != '' && $customer_id != 'All'){
        //     $sql .=  ' AND op.customer_id LIKE "%' . $customer_id.'%" ' ;
        // }

        $totals = [];

        $arrayFinal = [];
        $query = $this->db->query("SELECT 
                c.company_name, 
                au.username, 
                oplp.product_name, 
                pl.id, 
                pl.purchase_price, 
                oplp.order_no,
                pl.average_price,
                pl.selling_average_price

                FROM orders_process op
                LEFT JOIN order_product_list_process oplp ON oplp.order_id = op.id
                LEFT JOIN customers c ON op.customer_id = c.id
                LEFT JOIN admin_users au ON au.id = c.sales_team_id
                LEFT JOIN product_list pl ON pl.id = oplp.product_id

                WHERE
                op.create_date BETWEEN '$formdate' AND '$todate'
                AND op.deleteid = '0'
                AND op.order_base > '0'

                ORDER BY 
                op.id ASC ")->result();

        //Get All Selling Price total_rate, total_entries
        // $actual_selling_price = $this->db->query("SELECT
        //  SUM(oplp.rate) as total_rate, 
        //  COUNT(oplp.rate) as total_entries,
        //  oplp.product_id as id
        //  FROM order_product_list_process oplp

        //  WHERE 
        //  oplp.deleteid = '0' 

        //  GROUP BY oplp.product_id")->result();

        // $selArray = [];

        // //Indexing using Product
        // foreach($actual_selling_price as &$entry){
        //  $selArray[$entry->id] = (object) $entry;
        // }

        $sno = 1;
        foreach ($query as &$en) {
            $avg = 0;
            $en->profit_or_loss = str_replace('-', '', $en->average_price - $en->selling_average_price);
            $en->sno = $sno;
            $sno++;
        }

        $arrayFinal['data'] = $query;
        $arrayFinal['totals'] = $totals;
        echo json_encode($arrayFinal);
    }



     public function fetch_data_customer_yes_or_no_group()
    {
        $sl = $_GET['sales_person'];
        $formdate =  date('Y-m-01',strtotime($_GET['formdate']));
        $todate =  date('Y-m-t',strtotime($_GET['todate']));
        $slLog = '';
        $userslog = '';
        $userslog2 = '';

        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
            $slLog2 .= ' AND au.id IN (' . $sl . ') ';
            $slLog3 .= ' AND c.sales_team_id IN (' . $sl . ') ';
        }


   if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        $sqlMonths = '';

        $startDate = date('Y-m-01',strtotime($formdate));
        $startDateObj = new DateTime($startDate);

        $endDate =    date('Y-m-t',strtotime($todate));
        $endDateObj = new DateTime($endDate);
   $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;
        // $intervalMonths = new DateInterval()
 		$inbetweenMonths = $startDateObj->diff($endDateObj);
        // $dayCount = $inbetween->days + 1;

        $monthsCount = $inbetweenMonths->format('%m') + 1;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateObj, $interval, $endDateObj);
        $monthRanges = [];
 

        $sqlMonths = '';
        $selectMonths = '';
         $sqlMonthsOnly =  "";
          $checkNotOrders = " AND ( ";
        // $monthcount = 0;
        $monthsNumbers = [];
        foreach ($period as $key => $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'no' => $date->format('n')
            ];
            $monthsNumbers[$key] = array('no'=>$date->format('n'),'str'=> $date->format('01-m-Y')." To ".$date->format('t-m-Y')." (".$date->format('F').")");
			// $monthsNumbers[$key]['str'] = $date->format('Y-m-01')." To ".$date->format('Y-m-t')." (".$date->format('F').")";


            $sqlMonths .=  "COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN c.id END) as regular_customers_".$date->format('n').",
                    COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN op.id END) as bill_count_".$date->format('n').",";

            $selectMonths .=  " COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND c.create_date_by <= '".$date->format('Y-m-t')."' THEN c.id END) as regular_customers_create_".$date->format('n').",
 COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND c.create_date_by IS NULL THEN c.id END) as regular_customers_create_no_user_".$date->format('n').",
            ";

            

             $sqlMonthsOnly .=  " b.".$date->format('F')." as ".$date->format('F')."_content , ";
		          $checkNotOrders .= " b.".$date->format('F')."  != '' OR ";
            $monthsCount++;

        }
        //clear last OR word
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";
 
 
        // print_r($monthsNumbers);


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN op.id END) as bill_count,
        $sqlMonths
        SUM(op.bill_total) as total_bill,
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        a.name,a.id,sg.name as sg_name FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        LEFT JOIN sales_group sg ON a.sales_group_id = sg.id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != 0)
        AND op.bill_total  != ''
        AND c.deleteid  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog2
        GROUP BY a.id ORDER BY a.name ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.sales_team_id as id 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = 0) AND 

                    (op.order_base > 0 OR op.order_base = -4) AND  
                    op.create_date BETWEEN '$formdate' AND '$todate' $slLog3
                    ")->result();
        // print_r($result2 );
        // exit;


 $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->id) && $obj->id != '' && $obj->id != null) {
                    return strval($obj->id);
                } elseif (is_array($obj) && isset($obj['id'])  &&  $obj['id'] != '' && $obj['id'] != null) {
                    return strval($obj['id']);
                }
            }, $result));


            $cond = "   a.id NOT IN ($commaSeperatedSp) ";
        }
     $resultInvert = $this->db->query("SELECT 
         a.name,a.id FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
        WHERE $cond  GROUP BY a.id HAVING 
    COUNT(c.id) > 0")->result();
   if ($this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {

        $mergeResult =  $result;
      }else{
        $mergeResult = array_merge($result,$result2);

      }
if($slLog3){
        $mergedArray = array_merge($mergeResult);
}else{
        $mergedArray = array_merge($mergeResult, $resultInvert);
}


        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(CASE WHEN c.approved_status > 0 THEN c.id END) as customers_count, 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as overall_regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO'   THEN c.id END) as overall_irregular_customers,
        COUNT(DISTINCT CASE WHEN ( c.regular IS NULL OR c.regular = '') THEN c.id END) as overall_not_filled_customers,
        $selectMonths
        c.sales_team_id
        FROM customers c 
        WHERE c.deleteid = 0
        $slLog3
        $userslog2 
       AND c.approved_status > 0
        GROUP BY c.sales_team_id")->result();
 


  $pastData = array();
  // $resultDB = $this->db->query("SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, au.id as sales_id, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0  $checkNotOrders AND b.year = '$yearCond' GROUP BY b.sales_team_id ")->result();

   $resultDB = $this->db->query("SELECT b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username AS sales_member, au.id AS sales_id, b.year FROM customer_yes_or_no_report AS b LEFT JOIN admin_users au ON au.id = b.sales_team_id LEFT JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0 $checkNotOrders $slLog2 $userslog  GROUP BY cus.id ")->result();

 // echo "SELECT b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username AS sales_member, au.id AS sales_id, b.year FROM customer_yes_or_no_report AS b LEFT JOIN admin_users au ON au.id = b.sales_team_id LEFT JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0 $checkNotOrders $slLog2  GROUP BY cus.id ";
 // exit;


foreach ($resultDB as &$lineit) {
  if(!isset($pastData[$lineit->sales_id])){
    foreach ($monthRanges as $month) {
        $pastData[$lineit->sales_id]["orders_".$month['no']] = 0;
        $pastData[$lineit->sales_id]["customers_".$month['no']] = 0;
        // $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
    foreach ($monthRanges as $month) {
      $key = $month['month'].'_content';
      if($lineit->$key != ''){
        $cusCounts = 1;
        $ordersCount = 0;
        $ordersCount = preg_replace('/[^0-9]/', '', $lineit->$key);
        $pastData[$lineit->sales_id]["orders_".$month['no']] += $ordersCount;
        $pastData[$lineit->sales_id]["customers_".$month['no']] += $cusCounts;
        $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
    }
  }else{
     foreach ($monthRanges as $month) {
      $key = $month['month'].'_content';
      if($lineit->$key != ''){
        $cusCounts = 1;
        $ordersCount = 0;
        $ordersCount = preg_replace('/[^0-9]/', '', $lineit->$key);
        $pastData[$lineit->sales_id]["orders_".$month['no']] += $ordersCount;
        $pastData[$lineit->sales_id]["customers_".$month['no']] += $cusCounts;
        $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
   }
  }
}


  //  print_r($mergedArray);
  // exit;

  foreach ($mergedArray as $key => &$row) {
      foreach ($monthRanges as $month) {
        if($month['start']  <  '2024-04-01'){
           $key = 'bill_count_'.$month['no'];
      $key2 = 'regular_customers_'.$month['no'];
      $row->$key =  $pastData[$row->id]["orders_".$month['no']] ? $row->$key + $pastData[$row->id]["orders_".$month['no']] : 0;
      $row->$key2 =  $pastData[$row->id]["customers_".$month['no']] ? $row->$key2 + $pastData[$row->id]["customers_".$month['no']] : 0;
        }
     
          }
      }

        foreach ($overAllCustomers as $entry) {
            $overAllCustomersArr[$entry->sales_team_id]['overall_regular_customers'] = $entry->overall_regular_customers;
              foreach ($monthsNumbers as $key => $value) {
                 $key = 'regular_customers_create_'.$value['no'];
                 $key2 = 'regular_customers_create_no_user_'.$value['no'];
                 $overAllCustomersArr[$entry->sales_team_id]['regular_customers_create_'.$value['no']] = $entry->$key +  $entry->$key2;
              }
        }


        
        foreach ($mergedArray as $key => &$row) {
           
            if(isset($overAllCustomersArr[$row->id]['overall_regular_customers'])){
                 if ((isset($row->not_sl_customers_bill))) {
                if ($row->not_sl_customers_bill == 0) {
                    unset($row);
                } else {
                    $row->name = 'No Sales Person';
                    $row->id = '';
                    $row->total_bill = $row->not_sl_customers_bill;
                    $row->customers = $row->not_sl_customers;
                }
            }

            // print_r($row);


           


            $totals['regular_customers'] += $row->regular_customers;

            $totals['total_orders'] += $row->bill_count;
            $row->overall_regular_customers = $overAllCustomersArr[$row->id]['overall_regular_customers'];
            // if((intval($row->regular_customers) /  intval($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100 )){
            if ($overAllCustomersArr[$row->id]['overall_regular_customers'] != 0) {
                 $row->percentage = (float) ($row->regular_customers) / ($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100;
            } else {
                $row->percentage = 0;
            }

            foreach ($monthsNumbers as $key => $value) {
            	  if ($overAllCustomersArr[$row->id]['overall_regular_customers'] != 0) {
            	  	$keyName = 'percentage_'.$value['no'];
                  $keyNameC = 'regular_customers_'.$value['no'];
            	  	// $keyNameC2 = 'regular_customers_create_'.$value['no'];
                   $row->$keyName = (float) ($row->$keyNameC) / ($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100;
	                 // $row->$keyNameC2 =  ($overAllCustomersArr[$row->id][$keyNameC2]) * 100;
	            } else {
	            	$keyName = 'percentage_'.$value['no'];
	                $row->$keyName = 0;
	            }


            


            }

              //Assign for months mentioned $value['no'] is Month Number
			   foreach ($monthsNumbers as $key => $value) {
                 $key = 'regular_customers_create_'.$value['no'];
                 $row->$key = $overAllCustomersArr[$row->id]['regular_customers_create_'.$value['no']];
                $totals[$key] += $row->$key;

              }
            $totals['overall_regular_customers'] += $row->overall_regular_customers;
            $totals['percentage_add'] += $row->percentage;

            foreach ($monthsNumbers as $key => $value2) {
	            	  	// $keyName = 'percentage_'.$value2['no'];
	            	  	$keyNameC = 'regular_customers_'.$value2['no'];
	            	  	$keyName = 'bill_count_'.$value2['no'];
        						$totals[$keyNameC] += $row->$keyNameC;
        						$totals[$keyName] += $row->$keyName;

	            	  	 
	            }
            }else{
                unset($row);
            }
            
        }
            $totals['percentage'] = ($totals['regular_customers'] /  $totals['overall_regular_customers'])  * 100;
 				foreach ($monthsNumbers as $key => $value2) {
	            	  	$keyName = 'percentage_'.$value2['no'];
                    $keyNameC = 'regular_customers_'.$value2['no'];
	            	  	$keyName2 = 'regular_customers_create_'.$value2['no'];
	            	  	$keyNameCommon = 'overall_regular_customers_'.$value2['no'];
	            	  	$totals[$keyName] = ($totals[$keyNameC] /  $totals['overall_regular_customers'])  * 100;
                    $totals[$keyNameCommon] = $totals['overall_regular_customers'];
	            	  	$totals[$keyName2] = $totals[$keyName2];
	            }
       
            $resArr = array();
            foreach ($mergedArray as $key => $value) {
                $name = $value->sg_name;
                 if(!isset($resArr[$name])){
                    $resArr[$name] = [];
                    
                }
                $resArr[$name][] = $value;
                $resArr[$name]['regular_customers'] += $value->regular_customers;
                $resArr[$name]['overall_regular_customers'] += $value->overall_regular_customers;
                $resArr[$name]['total_orders'] += $value->bill_count;

                
            	 foreach ($monthsNumbers as $key => $value2) {
	            	  	$keyName = 'regular_customers_'.$value2['no'];
	            	  	$keyNameC = 'total_orders_'.$value2['no'];
                    $keyNameB = 'bill_count_'.$value2['no'];
	            	  	$keyName2 = 'regular_customers_create_'.$value2['no'];

		                $resArr[$name][$keyName] += $value->$keyName;
            $resArr[$name][$keyNameC] += $value->$keyNameB;
						$resArr[$name][$keyName2] += $value->$keyName2;
	            }
            }


            foreach ($resArr as $key => &$value) {


 				       foreach ($monthsNumbers as $key2 => $value2) {
                  $keyNameC = 'regular_customers_'.$value2['no'];
         					// $keyNameC2 = 'regular_customers_create_'.$value2['no'];
         					$keyName = 'percentage_'.$value2['no'];
        	            	    if ($resArr[$key]['overall_regular_customers'] != 0) {
        		                    $resArr[$key][$keyName] = ($resArr[$key][$keyNameC] / $resArr[$key]['overall_regular_customers']) * 100;
        		                } else {
        		                    $value[$keyName] =  0;
        		                }
        	            }

                        if ($resArr[$key]['overall_regular_customers'] != 0) {
                            $resArr[$key]['percentage'] = ($resArr[$key]['regular_customers'] / $resArr[$key]['overall_regular_customers']) * 100;
                        } else {
                            $value['percentage'] =  0;
                        }
  if($slLog3 || (! $this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12')){

    if($key == ''){
      unset($resArr[$key]);
    }
  }
                // $resArr[$key][$keyNameC2] = $resArr[$name][$keyNameC2];
            }
function customSort($a, $b) {

    if ($a == '') {
        return 1; // $a is empty, move it to the end
    } elseif ($b == '') {
        return -1; // $b is empty, keep it at current position
    } else {
        return strcmp($a, $b); // Compare non-empty indexes normally
    }
}

// Sort the array by index
uksort($resArr, 'customSort');
        $arrayMain['data'] = $resArr;
        $arrayMain['totals'] = $totals;
        $arrayMain['months'] = $monthsNumbers;
        echo json_encode($arrayMain);
    }








 public function fetch_data_customer_yes_or_no_group_export()
    {
        $sl = $_GET['sales_person'];
        $formdate =  date('Y-m-01',strtotime($_GET['formdate']));
        $todate =  date('Y-m-t',strtotime($_GET['todate']));
        $slLog = '';
        $userslog = '';
        $userslog2 = '';

        if ($sl != 'All' && $sl != '') {
            $slLog .= ' AND a.id IN (' . $sl . ') ';
            $slLog2 .= ' AND au.id IN (' . $sl . ') ';
            $slLog3 .= ' AND c.sales_team_id IN (' . $sl . ') ';
        }


   if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        $sqlMonths = '';

        $startDate = date('Y-m-01',strtotime($formdate));
        $startDateObj = new DateTime($startDate);

        $endDate =    date('Y-m-t',strtotime($todate));
        $endDateObj = new DateTime($endDate);
   $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;
        // $intervalMonths = new DateInterval()
    $inbetweenMonths = $startDateObj->diff($endDateObj);
        // $dayCount = $inbetween->days + 1;

        $monthsCount = $inbetweenMonths->format('%m') + 1;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateObj, $interval, $endDateObj);
        $monthRanges = [];
 

        $sqlMonths = '';
        $selectMonths = '';
         $sqlMonthsOnly =  "";
          $checkNotOrders = " AND ( ";
        // $monthcount = 0;
        $monthsNumbers = [];
        foreach ($period as $key => $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'no' => $date->format('n')
            ];
            $monthsNumbers[$key] = array('no'=>$date->format('n'),'str'=> $date->format('01-m-Y')." To ".$date->format('t-m-Y')." (".$date->format('F').")");
      // $monthsNumbers[$key]['str'] = $date->format('Y-m-01')." To ".$date->format('Y-m-t')." (".$date->format('F').")";


            $sqlMonths .=  "COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN c.id END) as regular_customers_".$date->format('n').",
                    COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN op.id END) as bill_count_".$date->format('n').",";

            $selectMonths .=  " COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND c.create_date_by <= '".$date->format('Y-m-t')."' THEN c.id END) as regular_customers_create_".$date->format('n').",
 COUNT(DISTINCT CASE WHEN c.regular = 'YES' AND c.create_date_by IS NULL THEN c.id END) as regular_customers_create_no_user_".$date->format('n').",
            ";

            

             $sqlMonthsOnly .=  " b.".$date->format('F')." as ".$date->format('F')."_content , ";
              $checkNotOrders .= " b.".$date->format('F')."  != '' OR ";
            $monthsCount++;

        }
        //clear last OR word
        $checkNotOrders = substr($checkNotOrders, 0, -3);

            $checkNotOrders .= "  ) ";
 
 
        // print_r($monthsNumbers);


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN c.id END) as regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'YES'  THEN op.id END) as bill_count,
        $sqlMonths
        SUM(op.bill_total) as total_bill,
        SUM(CASE WHEN c.regular = 'YES' THEN op.bill_total ELSE 0 END) as regular_customers_bill,
        a.name,a.id,sg.name as sg_name FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        LEFT JOIN sales_group sg ON a.sales_group_id = sg.id
        WHERE 
        op.deleteid = 0 
        AND (op.order_base > 0)
        AND (c.sales_team_id != '' OR c.sales_team_id != 0)
        AND op.bill_total  != ''
        AND c.deleteid  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog2
        GROUP BY a.id ORDER BY a.name ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.sales_team_id IS NULL OR c.sales_team_id = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill, 
                    c.sales_team_id as id 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (c.sales_team_id IS NULL OR c.sales_team_id = 0) AND 

                    (op.order_base > 0 OR op.order_base = -4) AND  
                    op.create_date BETWEEN '$formdate' AND '$todate' $slLog3
                    ")->result();
        // print_r($result2 );
        // exit;


 $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->id) && $obj->id != '' && $obj->id != null) {
                    return strval($obj->id);
                } elseif (is_array($obj) && isset($obj['id'])  &&  $obj['id'] != '' && $obj['id'] != null) {
                    return strval($obj['id']);
                }
            }, $result));


            $cond = "   a.id NOT IN ($commaSeperatedSp) ";
        }
     $resultInvert = $this->db->query("SELECT 
         a.name,a.id FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
        WHERE $cond  GROUP BY a.id HAVING 
    COUNT(c.id) > 0")->result();
   if ($this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {

        $mergeResult =  $result;
      }else{
        $mergeResult = array_merge($result,$result2);

      }
if($slLog3){
        $mergedArray = array_merge($mergeResult);
}else{
        $mergedArray = array_merge($mergeResult, $resultInvert);
}


        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(CASE WHEN c.approved_status > 0 THEN c.id END) as customers_count, 
        COUNT(DISTINCT CASE WHEN c.regular = 'YES' THEN c.id END) as overall_regular_customers,
        COUNT(DISTINCT CASE WHEN c.regular = 'NO'   THEN c.id END) as overall_irregular_customers,
        COUNT(DISTINCT CASE WHEN ( c.regular IS NULL OR c.regular = '') THEN c.id END) as overall_not_filled_customers,
        $selectMonths
        c.sales_team_id
        FROM customers c 
        WHERE c.deleteid = 0
        $slLog3
        $userslog2 
       AND c.approved_status > 0
        GROUP BY c.sales_team_id")->result();
 


  $pastData = array();
  // $resultDB = $this->db->query("SELECT  b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username as sales_member, au.id as sales_id, b.year FROM customer_yes_or_no_report as b LEFT JOIN admin_users au ON au.id = b.sales_team_id JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0  $checkNotOrders AND b.year = '$yearCond' GROUP BY b.sales_team_id ")->result();

   $resultDB = $this->db->query("SELECT b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username AS sales_member, au.id AS sales_id, b.year FROM customer_yes_or_no_report AS b LEFT JOIN admin_users au ON au.id = b.sales_team_id LEFT JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0 AND cus.deleteid = 0 $checkNotOrders $slLog2 $userslog  GROUP BY cus.id ")->result();

 // echo "SELECT b.id, b.sales_member, b.sales_team_id, b.customer_id, b.customername, b.customerphone, b.area, b.competitor, b.factory_workshop, b.cc, b.pp, b.dd, b.qq, b.rr, b.sa, b.ba, $sqlMonthsOnly au.username AS sales_member, au.id AS sales_id, b.year FROM customer_yes_or_no_report AS b LEFT JOIN admin_users au ON au.id = b.sales_team_id LEFT JOIN customers cus ON cus.id = b.customer_id WHERE cus.regular = 'YES' AND cus.approved_status > 0 $checkNotOrders $slLog2  GROUP BY cus.id ";
 // exit;


foreach ($resultDB as &$lineit) {
  if(!isset($pastData[$lineit->sales_id])){
    foreach ($monthRanges as $month) {
        $pastData[$lineit->sales_id]["orders_".$month['no']] = 0;
        $pastData[$lineit->sales_id]["customers_".$month['no']] = 0;
        // $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
    foreach ($monthRanges as $month) {
      $key = $month['month'].'_content';
      if($lineit->$key != ''){
        $cusCounts = 1;
        $ordersCount = 0;
        $ordersCount = preg_replace('/[^0-9]/', '', $lineit->$key);
        $pastData[$lineit->sales_id]["orders_".$month['no']] += $ordersCount;
        $pastData[$lineit->sales_id]["customers_".$month['no']] += $cusCounts;
        $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
    }
  }else{
     foreach ($monthRanges as $month) {
      $key = $month['month'].'_content';
      if($lineit->$key != ''){
        $cusCounts = 1;
        $ordersCount = 0;
        $ordersCount = preg_replace('/[^0-9]/', '', $lineit->$key);
        $pastData[$lineit->sales_id]["orders_".$month['no']] += $ordersCount;
        $pastData[$lineit->sales_id]["customers_".$month['no']] += $cusCounts;
        $pastData[$lineit->sales_id]['name'] = $lineit->sales_member;
      }
   }
  }
}


  //  print_r($mergedArray);
  // exit;

  foreach ($mergedArray as $key => &$row) {
      foreach ($monthRanges as $month) {
        if($month['start']  <  '2024-04-01'){
           $key = 'bill_count_'.$month['no'];
      $key2 = 'regular_customers_'.$month['no'];
      $row->$key =  $pastData[$row->id]["orders_".$month['no']] ? $row->$key + $pastData[$row->id]["orders_".$month['no']] : 0;
      $row->$key2 =  $pastData[$row->id]["customers_".$month['no']] ? $row->$key2 + $pastData[$row->id]["customers_".$month['no']] : 0;
        }
     
          }
      }

        foreach ($overAllCustomers as $entry) {
            $overAllCustomersArr[$entry->sales_team_id]['overall_regular_customers'] = $entry->overall_regular_customers;
              foreach ($monthsNumbers as $key => $value) {
                 $key = 'regular_customers_create_'.$value['no'];
                 $key2 = 'regular_customers_create_no_user_'.$value['no'];
                 $overAllCustomersArr[$entry->sales_team_id]['regular_customers_create_'.$value['no']] = $entry->$key +  $entry->$key2;
              }
        }


        
        foreach ($mergedArray as $key => &$row) {
           
            if(isset($overAllCustomersArr[$row->id]['overall_regular_customers'])){
                 if ((isset($row->not_sl_customers_bill))) {
                if ($row->not_sl_customers_bill == 0) {
                    unset($row);
                } else {
                    $row->name = 'No Sales Person';
                    $row->id = '';
                    $row->total_bill = $row->not_sl_customers_bill;
                    $row->customers = $row->not_sl_customers;
                }
            }

            // print_r($row);


           


            $totals['regular_customers'] += $row->regular_customers;

            $totals['total_orders'] += $row->bill_count;
            $row->overall_regular_customers = $overAllCustomersArr[$row->id]['overall_regular_customers'];
            // if((intval($row->regular_customers) /  intval($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100 )){
            if ($overAllCustomersArr[$row->id]['overall_regular_customers'] != 0) {
                 $row->percentage = (float) ($row->regular_customers) / ($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100;
            } else {
                $row->percentage = 0;
            }

            foreach ($monthsNumbers as $key => $value) {
                if ($overAllCustomersArr[$row->id]['overall_regular_customers'] != 0) {
                  $keyName = 'percentage_'.$value['no'];
                  $keyNameC = 'regular_customers_'.$value['no'];
                  // $keyNameC2 = 'regular_customers_create_'.$value['no'];
                   $row->$keyName = (float) ($row->$keyNameC) / ($overAllCustomersArr[$row->id]['overall_regular_customers']) * 100;
                   // $row->$keyNameC2 =  ($overAllCustomersArr[$row->id][$keyNameC2]) * 100;
              } else {
                $keyName = 'percentage_'.$value['no'];
                  $row->$keyName = 0;
              }


            


            }

              //Assign for months mentioned $value['no'] is Month Number
         foreach ($monthsNumbers as $key => $value) {
                 $key = 'regular_customers_create_'.$value['no'];
                 $row->$key = $overAllCustomersArr[$row->id]['regular_customers_create_'.$value['no']];
                $totals[$key] += $row->$key;

              }
            $totals['overall_regular_customers'] += $row->overall_regular_customers;
            $totals['percentage_add'] += $row->percentage;

            foreach ($monthsNumbers as $key => $value2) {
                    // $keyName = 'percentage_'.$value2['no'];
                    $keyNameC = 'regular_customers_'.$value2['no'];
                    $keyName = 'bill_count_'.$value2['no'];
                    $totals[$keyNameC] += $row->$keyNameC;
                    $totals[$keyName] += $row->$keyName;

                     
              }
            }else{
                unset($row);
            }
            
        }
            $totals['percentage'] = ($totals['regular_customers'] /  $totals['overall_regular_customers'])  * 100;
        foreach ($monthsNumbers as $key => $value2) {
                    $keyName = 'percentage_'.$value2['no'];
                    $keyNameC = 'regular_customers_'.$value2['no'];
                    $keyName2 = 'regular_customers_create_'.$value2['no'];
                    $keyNameCommon = 'overall_regular_customers_'.$value2['no'];
                    $totals[$keyName] = ($totals[$keyNameC] /  $totals['overall_regular_customers'])  * 100;
                    $totals[$keyNameCommon] = $totals['overall_regular_customers'];
                    $totals[$keyName2] = $totals[$keyName2];
              }
       
            $resArr = array();
            foreach ($mergedArray as $key => $value) {
                $name = $value->sg_name;
                 if(!isset($resArr[$name])){
                    $resArr[$name] = [];
                    
                }
                $resArr[$name][] = $value;
                $resArr[$name]['regular_customers'] += $value->regular_customers;
                $resArr[$name]['overall_regular_customers'] += $value->overall_regular_customers;
                $resArr[$name]['total_orders'] += $value->bill_count;

                
               foreach ($monthsNumbers as $key => $value2) {
                    $keyName = 'regular_customers_'.$value2['no'];
                    $keyNameC = 'total_orders_'.$value2['no'];
                    $keyNameB = 'bill_count_'.$value2['no'];
                    $keyName2 = 'regular_customers_create_'.$value2['no'];

                    $resArr[$name][$keyName] += $value->$keyName;
            $resArr[$name][$keyNameC] += $value->$keyNameB;
            $resArr[$name][$keyName2] += $value->$keyName2;
              }
            }


            foreach ($resArr as $key => &$value) {


               foreach ($monthsNumbers as $key2 => $value2) {
                  $keyNameC = 'regular_customers_'.$value2['no'];
                  // $keyNameC2 = 'regular_customers_create_'.$value2['no'];
                  $keyName = 'percentage_'.$value2['no'];
                            if ($resArr[$key]['overall_regular_customers'] != 0) {
                                $resArr[$key][$keyName] = ($resArr[$key][$keyNameC] / $resArr[$key]['overall_regular_customers']) * 100;
                            } else {
                                $value[$keyName] =  0;
                            }
                      }

                        if ($resArr[$key]['overall_regular_customers'] != 0) {
                            $resArr[$key]['percentage'] = ($resArr[$key]['regular_customers'] / $resArr[$key]['overall_regular_customers']) * 100;
                        } else {
                            $value['percentage'] =  0;
                        }
  if($slLog3 || (! $this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12')){

    if($key == ''){
      unset($resArr[$key]);
    }
  }
                // $resArr[$key][$keyNameC2] = $resArr[$name][$keyNameC2];
            }
function customSort($a, $b) {

    if ($a == '') {
        return 1; // $a is empty, move it to the end
    } elseif ($b == '') {
        return -1; // $b is empty, keep it at current position
    } else {
        return strcmp($a, $b); // Compare non-empty indexes normally
    }
}

// Sort the array by index
uksort($resArr, 'customSort');
        $arrayMain['data'] = $resArr;
        $arrayMain['totals'] = $totals;
        $arrayMain['months'] = $monthsNumbers;
       $filename = 'Regular Consolidated Report - '.$formdate.' to '.$todate;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/customer_yes_or_no_group_export.php', $arrayMain);
    }



     public function sms_api_report()
        {
    

            ini_set('memory_limit', '4400M');
    
                                            if(isset($this->session->userdata['logged_in']))
                                            {
    
                                                 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                                 $data['partytype'] = $this->Main_model->where_names('partytype','deleteid','0');
                                                 $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                                 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                          $data['customers']= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'access',12,'id','ASC'); 
                                          $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                                        //  $data['data_title']= 'SMS Api Report';
                                                 $data['active_base']='customer_1';
                                                 $data['active']='customer_1';
                                                 $data['title']    = 'SMS Api Report';
                                                 $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                                 $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                                 $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                                 $this->load->view('other_reports/sms_api_report.php',$data);
    
    
                                            }
                                            else
                                            {
    
                                                  redirect('index.php/adminmain');
    
                                            }
    
    
    
    
        }

        public function smsApiReport(){
            // URL of the CSV downloading API
            ini_set('memory_limit', '4400M');

            $uname = 'zaron';
            $pass = urlencode('zaron@123');
            $formdate = urlencode($_GET['formdate']);
            $todate = urlencode($_GET['todate']);
            $slId = urlencode($_GET['id']);
            $grpId = urlencode($_GET['sale_group']);
            $url = "http://bulksmscoimbatore.co.in/getdelivery?uname=".$uname."&pwd=".$pass."&from=".$formdate."&to=".$todate;

            // Make a request to the API
            $response = file_get_contents($url);

            // print_r($response);
            // exit;
           //echo $url;
           //exit;

            // Check if the request was successful
            if ($response !== false) {
                // Parse the CSV data into an array
                $csvData = array_map('str_getcsv', explode("\n", $response));

                // $excludedArrays = array_slice($csvData, 4);
                  foreach ($csvData as $key => &$entry) {
                   if ($key == 3) {
                     array_splice($entry, 5, 0, $entry[4]);
                      array_splice($entry, 6, 0, $entry[5]);

                       $entry[5] = 'User Name';
                        $entry[3] = 'Request Sent';
                        $entry[4] = 'Delivered';
                   }
                 }
            if ($slId == 'ALL' && $grpId == 'ALL') {

                foreach ($csvData as $key => &$entry) {
                  
                  // print_r($entry);
                  // echo '<br>';
                    if ($key > 3) {

                        $num = $entry[2];
                        $otp = preg_replace("/[^0-9]/", "",$entry[7]);
                        $res =  $this->db->query("SELECT GROUP_CONCAT(DISTINCT au.username SEPARATOR ',') as usernames, lt.request_date FROM admin_users au LEFT JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp' ")->row();
                        array_splice($entry, 5, 0, $entry[4]);
                        array_splice($entry, 6, 0, $entry[5]);

                        $entry[5] = $res->usernames;
                        $dateTime = $entry[3];
                        $entry[3] = $res->request_date ? date('d-m-Y h:i:s A',strtotime($res->request_date)) : '';
                        $entry[4] =  $dateTime;
                        
                    }
                }

                
            }

            if ($slId != 'ALL'  && $grpId == 'ALL') {
                foreach ($csvData as $key => &$entry) {
                  
                    if ($key > 3) {
                        $num = $entry[2];
                        $name = explode(" ", $entry[6])[1];
                        $otp = preg_replace("/[^0-9]/", "",$entry[7]);
                      

                        $res1 =  $this->db->query("SELECT au.username, lt.request_date FROM admin_users au LEFT JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'  AND au.id = '$slId'  ")->result();


                        if (count($res1) == 0 ) {
                            unset($csvData[$key]);
                        } else {
                            $res =  $this->db->query("SELECT GROUP_CONCAT(au.username SEPARATOR ',') as usernames, lt.request_date FROM admin_users au LEFT JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'  AND au.id = '$slId' ")->row();
                            array_splice($entry, 5, 0, $entry[4]);
                            array_splice($entry, 6, 0, $entry[5]);

                        $entry[5] = $res->usernames;
                        $dateTime = $entry[3];
                        $entry[3] = $res->request_date ? date('d-m-Y h:i:s A',strtotime($res->request_date)) : '';
                        $entry[4] =  $dateTime;
                        }
                    }
                }
            }

            if ($slId == 'ALL'  && $grpId != 'ALL') {
              
                foreach ($csvData as $key => &$entry) {
                    if ($key > 3) {
                        $num = $entry[2];
                        $name = explode(" ", $entry[6])[1];
                        $otp = preg_replace("/[^0-9]/", "",$entry[7]);

                        $res1 =  $this->db->query("SELECT au.username, lt.request_date FROM admin_users au   JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'  AND au.sales_group_id = '$grpId'  ")->result();


                        if (count($res1) == 0) {
                            unset($csvData[$key]);
                        } else {
                            $res =  $this->db->query("SELECT GROUP_CONCAT(au.username SEPARATOR ',') as usernames, lt.request_date FROM admin_users au   JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'   AND au.sales_group_id = '$grpId' ")->row();
                            array_splice($entry, 5, 0, $entry[4]);
                            array_splice($entry, 6, 0, $entry[5]);

                        $entry[5] = $res->usernames;
                        $dateTime = $entry[3];
                        $entry[3] = $res->request_date ? date('d-m-Y h:i:s A',strtotime($res->request_date)) : '';
                        $entry[4] =  $dateTime;
                        }
                    }
                }
            }



            if ($slId != 'ALL'  && $grpId != 'ALL') {
              
                foreach ($csvData as $key => &$entry) {
                    if ($key > 3) {
                        $num = $entry[2];
                        $name = explode(" ", $entry[6])[1];
                        $otp = preg_replace("/[^0-9]/", "",$entry[7]);

                        $res1 =  $this->db->query("SELECT au.username, lt.request_date FROM admin_users au   JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'  AND au.sales_group_id = '$grpId' AND au.id = '$slId' ")->result();


                        if (count($res1) == 0) {
                            unset($csvData[$key]);
                        } else {
                            $res =  $this->db->query("SELECT GROUP_CONCAT(au.username SEPARATOR ',') as usernames, lt.request_date FROM admin_users au   JOIN login_tries lt ON lt.user_id = au.id WHERE au.phone LIKE '%$num%' AND lt.otp = '$otp'   AND au.sales_group_id = '$grpId' AND au.id = '$slId' ")->row();
                            array_splice($entry, 5, 0, $entry[4]);
                            array_splice($entry, 6, 0, $entry[5]);

                        $entry[5] = $res->usernames;
                        $dateTime = $entry[3];
                        $entry[3] = $res->request_date ? date('d-m-Y h:i:s A',strtotime($res->request_date)) : '';
                        $entry[4] =  $dateTime;
                        }
                    }
                }
            }

               


                $csvData = array_values($csvData);
                $export = ($_GET['export'] && $_GET['export'] == 'true');
              if ($export) {
                  $filename =   "SMS Api Report - ".str_replace('+', ' ', $formdate)." TO ".str_replace('+', ' ', $todate)." .csv"; // Add file extension

                  header('Content-Type: application/csv');
                  header('Content-Disposition: attachment; filename="' . $filename . '"');
                  header('Pragma: no-cache');
                  header('Expires: 0');

                  $output = fopen('php://output', 'w');
                  foreach ($csvData as $line) {
                      fputcsv($output, $line);
                  }
                  fclose($output);
                  exit; // Stop script execution after downloading the file
              } else {
                  echo json_encode($csvData);
              }
                // Now you can use the $csvData array in your PHP code
                // print_r($csvData);
            } else {
                // Handle the case where the request failed
                echo "Failed to fetch CSV data";
            }
            
        }

        public function customer_yes_or_no_area_group_report()
        {
            if (isset($this->session->userdata['logged_in'])) {

                $sql = $this->db->query("SELECT a.area as name, a.area as id  FROM customers a GROUP BY a.area ORDER BY a.area ASC ")->result();
                foreach ($sql as $key => &$value) {
                  if($value->name == null){
                    $value->name = ' No Area';
                    $value->id = 'NULL';
                  }
                }
                $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
                $data['customers'] =  $sql;
                $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

                $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
                $data['active_base'] = 'customer_1';
                //  $data['active']='customer_1';
                $data['title']    = 'Area Consolidated Report';
                $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                $this->load->view('other_reports/customer_yes_or_no_area_group_report', $data);
            } else {
                $this->load->view('admin/index');
            }
        }


        public function fetch_data_customer_yes_or_no_area()
    {
        $sl = $_GET['sales_person'];
        $formdate =  date('Y-m-01',strtotime($_GET['formdate']));
        $todate =  date('Y-m-t',strtotime($_GET['todate']));
        $slLog = '';
        $userslog = '';
        $userslog2 = '';

        if ( $sl != 'All' && $sl != '' && $sl != "NULL" ) {
            $slLog .= ' AND c.area IN (' . $sl . ') ';
            $slLog2 .= ' AND au.area IN (' . $sl . ') ';
            $slLog3 .= ' AND c.area IN (' . $sl . ') ';
        }

        if($sl == "NULL" ){
           $slLog = ' AND c.area IS NULL ';
            $slLog2 = ' AND au.area IS NULL ';
            $slLog3 = ' AND c.area IS NULL ';
        } 


   if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        $sqlMonths = '';

        $startDate = date('Y-m-01',strtotime($formdate));
        $startDateObj = new DateTime($startDate);

        $endDate =    date('Y-m-t',strtotime($todate));
        $endDateObj = new DateTime($endDate);
   $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;
        // $intervalMonths = new DateInterval()
    $inbetweenMonths = $startDateObj->diff($endDateObj);
        // $dayCount = $inbetween->days + 1;

        $monthsCount = $inbetweenMonths->format('%m') + 1;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateObj, $interval, $endDateObj);
        $monthRanges = [];
 

        $sqlMonths = '';
        $selectMonths = '';
         $sqlMonthsOnly =  "";
          $checkNotOrders = " AND ( ";
        // $monthcount = 0;
        $monthsNumbers = [];
        foreach ($period as $key => $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'no' => $date->format('n')
            ];
            $monthsNumbers[$key] = array('no'=>$date->format('n'),'str'=> $date->format('01-m-Y')." To ".$date->format('t-m-Y')." (".$date->format('F').")");


            $sqlMonths .=  "COUNT(DISTINCT CASE WHEN op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN c.id END) as  customers_".$date->format('n').",
                    COUNT(DISTINCT CASE WHEN  op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN op.id END) as bill_count_".$date->format('n').",";

             $selectMonths .= " COUNT(DISTINCT CASE WHEN STR_TO_DATE(c.approved_date, '%d-%m-%Y') <= STR_TO_DATE('".$date->format('t-m-Y')."', '%d-%m-%Y') THEN c.id END) as regular_customers_create_".$date->format('n').",
COUNT(DISTINCT CASE WHEN c.approved_date IS NULL OR c.approved_date = '' THEN c.id END) as regular_customers_create_no_user_".$date->format('n').", ";

           
            $monthsCount++;

        }


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT c.id) as  customers,
        COUNT(DISTINCT op.id) as bill_count,
        $sqlMonths
        a.name,a.id,sg.name as sg_name, c.area FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        LEFT JOIN sales_group sg ON a.sales_group_id = sg.id
        WHERE 
        op.deleteid = 0 
        AND op.order_base != '0' 
        AND (c.area != '' OR c.area != 0)
        AND op.bill_total  != ''
        AND c.deleteid = 0  AND c.deleteid  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog2
        GROUP BY c.area ORDER BY c.area ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.area IS NULL OR c.area = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill,
                     $sqlMonths 
                    c.area as area 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (op.order_base != '0') AND  c.deleteid = 0 AND
                    op.deleteid = 0 AND
                    op.create_date BETWEEN '$formdate' AND '$todate' $slLog3 GROUP BY c.area
                    ")->result();


 $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->area) && $obj->area != '' && $obj->area != null) {
                    return "'".strval($obj->area)."'";
                } elseif (is_array($obj) && isset($obj['area'])  &&  $obj['area'] != '' && $obj['area'] != null) {
                    return "'".strval($obj['area'])."'";
                }
            }, $result));


            $cond = " AND  c.area NOT IN ($commaSeperatedSp) ";
        }
        if($commaSeperatedSp == ''){
          $cond = '';
        }
     $resultInvert = $this->db->query("SELECT 
         a.name,a.id, c.area FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
         WHERE c.deleteid =  0 $cond   AND c.approved_status > 0 GROUP BY c.area ")->result();
   if ($this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {

        $mergeResult =  $result;
      }else{
        $mergeResult = array_merge($result,$result2);

      }
if($slLog3){
        $mergedArray = array_merge($mergeResult);
}else{
        $mergedArray = array_merge($mergeResult, $resultInvert);
}


        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(DISTINCT c.id) as customers_count, 
        $selectMonths
        c.sales_team_id,
        c.area
        FROM customers c 
        WHERE c.deleteid = 0
        $slLog3
        $userslog2 
       AND c.approved_status > 0
       AND c.deleteid = 0
        GROUP BY c.area")->result();


// print_r($overAllCustomers);
// exit;
        foreach ($overAllCustomers as $key => $value) {
           foreach($monthRanges as $months){
            $keyName = 'regular_customers_create_'.$months['no'];
            $keyNameWO = 'regular_customers_create_no_user_'.$months['no'];
           $overAllCustomersArr[$value->area]['overall_customers_'.$months['no']] = $value->$keyName + $value->$keyNameWO;

         }
        }

   
         $resArr = array();
         $totals = array();
         foreach ($mergedArray as $key => $value) {
          foreach($monthRanges as $months){
            $keyName = 'customers_'.$months['no'];
            $keyName2 = 'bill_count_'.$months['no'];
            
           $resArr[$value->area]['customers_create_'.$months['no']] = $overAllCustomersArr[$value->area]['overall_customers_'.$months['no']];
           $resArr[$value->area]['customers_'.$months['no']] = $value->$keyName ? $value->$keyName : 0;
           $resArr[$value->area]['total_orders_'.$months['no']] = $value->$keyName2 ?  $value->$keyName2 : 0 ;
           $resArr[$value->area]['percentage_'.$months['no']] = $resArr[$value->area]['customers_create_'.$months['no']] ?  ($resArr[$value->area]['customers_'.$months['no']] / $resArr[$value->area]['customers_create_'.$months['no']]) * 100 : 0 ;
           // $totals['customers_create_'.$months['no']] += $resArr[$value->area]['customers_create_'.$months['no']];
          // $totals['customers_create_'.$months['no']] += $overAllCustomers[0]->customers_count;

         
          }

         }

         foreach ($resArr as $key => $value) {
            foreach($monthRanges as $months){     
            $keyName = 'customers_create_'.$months['no'];
            $keyName2 = 'customers_'.$months['no'];
            $keyName3 = 'total_orders_'.$months['no'];
           $totals['customers_create_'.$months['no']] += $value[$keyName];
           $totals['customers_'.$months['no']] += $value[$keyName2];
           $totals['bill_count_'.$months['no']] += $value[$keyName3];
           $totals['percentage_'.$months['no']] = ($totals['customers_'.$months['no']] / $totals['customers_create_'.$months['no']]) * 100;
         }
         }
          
 
        $arrayMain['data'] = $resArr;
        $arrayMain['totals'] = $totals;
        $arrayMain['months'] = $monthsNumbers;
        echo json_encode($arrayMain);
    }

    public function fetch_data_customer_yes_or_no_area_export()
    {
        $sl = $_GET['sales_person'];
        $formdate =  date('Y-m-01',strtotime($_GET['formdate']));
        $todate =  date('Y-m-t',strtotime($_GET['todate']));
        $slLog = '';
        $userslog = '';
        $userslog2 = '';
  if($sl == "NULL" ){
           $slLog = ' AND c.area IS NULL ';
            $slLog2 = ' AND au.area IS NULL ';
            $slLog3 = ' AND c.area IS NULL ';
        }else
        if ( $sl != 'All' && $sl != '' && $sl != "NULL" ) {
            $slLog .= ' AND c.area IN (' . $sl . ') ';
            $slLog2 .= ' AND au.area IN (' . $sl . ') ';
            $slLog3 .= ' AND c.area IN (' . $sl . ') ';
        }

      


   if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        $sqlMonths = '';

        $startDate = date('Y-m-01',strtotime($formdate));
        $startDateObj = new DateTime($startDate);

        $endDate =    date('Y-m-t',strtotime($todate));
        $endDateObj = new DateTime($endDate);
   $financialYearStartFull = date('Y', strtotime($formdate));
    $financialYearStartFullSecond = date('Y', strtotime($formdate)) + 1;
        $today = date('Y-m-t', strtotime($todate));
        $todayActual = date('Y-m-d');

          $yearCond = $financialYearStartFull.'-'.$financialYearStartFullSecond;
        // $intervalMonths = new DateInterval()
    $inbetweenMonths = $startDateObj->diff($endDateObj);
        // $dayCount = $inbetween->days + 1;

        $monthsCount = $inbetweenMonths->format('%m') + 1;

        // echo $dayCount;
        $interval = new DateInterval('P1M'); // 1 month interval
        $period = new DatePeriod($startDateObj, $interval, $endDateObj);
        $monthRanges = [];
 

        $sqlMonths = '';
        $selectMonths = '';
         $sqlMonthsOnly =  "";
          $checkNotOrders = " AND ( ";
        // $monthcount = 0;
        $monthsNumbers = [];
        foreach ($period as $key => $date) {
            $monthRanges[] = [
                'start' => $date->format('Y-m-01'),
                'end' => $date->format('Y-m-t'),
                'month' => $date->format('F'),
                'no' => $date->format('n')
            ];
            $monthsNumbers[$key] = array('no'=>$date->format('n'),'str'=> $date->format('01-m-Y')." To ".$date->format('t-m-Y')." (".$date->format('F').")");


            $sqlMonths .=  "COUNT(DISTINCT CASE WHEN op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN c.id END) as  customers_".$date->format('n').",
                    COUNT(DISTINCT CASE WHEN  op.create_date BETWEEN '".$date->format('Y-m-01')."' AND '".$date->format('Y-m-t')."' THEN op.id END) as bill_count_".$date->format('n').",";
 $selectMonths .= " COUNT(DISTINCT CASE WHEN STR_TO_DATE(c.approved_date, '%d-%m-%Y') <= STR_TO_DATE('".$date->format('t-m-Y')."', '%d-%m-%Y') THEN c.id END) as regular_customers_create_".$date->format('n').",
COUNT(DISTINCT CASE WHEN c.approved_date IS NULL OR c.approved_date = '' THEN c.id END) as regular_customers_create_no_user_".$date->format('n').", ";
           
            $monthsCount++;

        }


        $result = $this->db->query("SELECT 
        COUNT(DISTINCT c.id) as  customers,
        COUNT(DISTINCT op.id) as bill_count,
        $sqlMonths
        a.name,a.id,sg.name as sg_name, c.area FROM 
        orders_process as op
        LEFT JOIN customers as c ON op.customer_id=c.id 
        LEFT JOIN admin_users a ON a.id = c.sales_team_id
        LEFT JOIN sales_group sg ON a.sales_group_id = sg.id
        WHERE 
        op.deleteid = 0 
        AND op.order_base != '0' 
        AND (c.area != '' OR c.area != 0)
        AND op.bill_total  != ''
        AND c.deleteid = 0  AND c.deleteid  != ''
        AND op.create_date BETWEEN '$formdate' AND '$todate'
        $slLog
        $userslog2
        GROUP BY c.area ORDER BY c.area ASC")->result();

        $result2 = $this->db->query("SELECT 
                    COUNT(DISTINCT c.id  ) as not_sl_customers, 
                    SUM(CASE WHEN (c.area IS NULL OR c.area = '') THEN op.bill_total ELSE 0 END) as not_sl_customers_bill,
                     $sqlMonths 
                    c.area as area 
                    FROM 
                    orders_process op 
                    LEFT JOIN customers c ON op.customer_id = c.id 
                    WHERE 
                    (op.order_base != '0') AND  c.deleteid = 0 AND
                    op.deleteid = 0 AND
                    op.create_date BETWEEN '$formdate' AND '$todate' $slLog3 GROUP BY c.area
                    ")->result();


 $cond = '';
        if (count($result) > 0) {
            $commaSeperatedSp = implode(',', array_map(function ($obj) {
                if (is_object($obj) && isset($obj->area) && $obj->area != '' && $obj->area != null) {
                    return "'".strval($obj->area)."'";
                } elseif (is_array($obj) && isset($obj['area'])  &&  $obj['area'] != '' && $obj['area'] != null) {
                    return "'".strval($obj['area'])."'";
                }
            }, $result));


            $cond = " AND  c.area NOT IN ($commaSeperatedSp) ";
        }
        if($commaSeperatedSp == ''){
          $cond = '';
        }
     $resultInvert = $this->db->query("SELECT 
         a.name,a.id, c.area FROM admin_users a 
         LEFT JOIN customers c ON c.sales_team_id = a.id
         WHERE c.deleteid =  0 $cond   AND c.approved_status > 0 GROUP BY c.area ")->result();
   if ($this->session->userdata['logged_in']['access'] == '17' || $this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {

        $mergeResult =  $result;
      }else{
        $mergeResult = array_merge($result,$result2);

      }
if($slLog3){
        $mergedArray = array_merge($mergeResult);
}else{
        $mergedArray = array_merge($mergeResult, $resultInvert);
}


        $overAllCustomersArr = [];
        $overAllCustomers = $this->db->query("SELECT 
        COUNT(DISTINCT c.id) as customers_count, 
        $selectMonths
        c.sales_team_id,
        c.area
        FROM customers c 
        WHERE c.deleteid = 0
        $slLog3
        $userslog2 
       AND c.approved_status > 0
       AND c.deleteid = 0
        GROUP BY c.area")->result();


// print_r($overAllCustomers);
// exit;
        foreach ($overAllCustomers as $key => $value) {
           foreach($monthRanges as $months){
            $keyName = 'regular_customers_create_'.$months['no'];
            $keyNameWO = 'regular_customers_create_no_user_'.$months['no'];
           $overAllCustomersArr[$value->area]['overall_customers_'.$months['no']] = $value->$keyName + $value->$keyNameWO;

         }
        }

   
         $resArr = array();
         $totals = array();
         foreach ($mergedArray as $key => $value) {
          foreach($monthRanges as $months){
            $keyName = 'customers_'.$months['no'];
            $keyName2 = 'bill_count_'.$months['no'];
            
           $resArr[$value->area]['customers_create_'.$months['no']] = $overAllCustomersArr[$value->area]['overall_customers_'.$months['no']];
           $resArr[$value->area]['customers_'.$months['no']] = $value->$keyName ? $value->$keyName : 0;
           $resArr[$value->area]['total_orders_'.$months['no']] = $value->$keyName2 ?  $value->$keyName2 : 0 ;
           $resArr[$value->area]['percentage_'.$months['no']] = ($resArr[$value->area]['customers_'.$months['no']] / $resArr[$value->area]['customers_create_'.$months['no']]) * 100 ;
           // $totals['customers_create_'.$months['no']] += $resArr[$value->area]['customers_create_'.$months['no']];
          // $totals['customers_create_'.$months['no']] += $overAllCustomers[0]->customers_count;

         
          }

         }

         foreach ($resArr as $key => $value) {
            foreach($monthRanges as $months){     
            $keyName = 'customers_create_'.$months['no'];
            $keyName2 = 'customers_'.$months['no'];
            $keyName3 = 'total_orders_'.$months['no'];
           $totals['customers_create_'.$months['no']] += $value[$keyName];
           $totals['customers_'.$months['no']] += $value[$keyName2];
           $totals['bill_count_'.$months['no']] += $value[$keyName3];
           $totals['percentage_'.$months['no']] = ($totals['customers_'.$months['no']] / $totals['customers_create_'.$months['no']]) * 100;
         }
         }
          
 
        $arrayMain['data'] = $resArr;
        $arrayMain['totals'] = $totals;
        $arrayMain['months'] = $monthsNumbers;
        $filename = 'Area Consolidated Report - '.$formdate.' to '.$todate;
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$filename.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        $this->load->view('other_reports/customer_yes_or_no_area_group_report_export.php', $arrayMain);
    }

    public function payment_and_abstract()
        {
            if (isset($this->session->userdata['logged_in'])) {

                $sql = $this->db->query("SELECT v.vehicle_name name, v.id as id, v.vehicle_number   FROM vehicle v LEFT JOIN orders_process op ON op.vehicle_id = v.id WHERE  op.deleteid = 0  AND
          op.delivery_date_status = 1 AND
          op.driver_id IS NOT NULL  AND
          op.vehicle_id IS NOT NULL  GROUP BY v.id ORDER BY v.vehicle_name ASC ")->result();
                foreach ($sql as $key => &$value) {
                  if($value->name == null){
                    $value->name = ' No Name';
                    $value->id = 'NULL';
                  }
                }
                $data['sales_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
                $data['customers'] =  $sql;
                $data['categories'] = $this->Main_model->where_names('categories', 'deleteid', '0');

                $data['user_group'] = $this->Main_model->where_names('user_group', 'deleteid', '0');
                $data['active_base'] = 'customer_1';
                //  $data['active']='customer_1';
                $data['title']    = 'Payment and Abstract View';
                $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                $this->load->view('other_reports/payment_and_abstract', $data);
            } else {
                $this->load->view('admin/index');
            }
        }



    public function fetch_data_payment_and_abstract(){



        $formdate =  $_GET['formdate'];
        $vId =  $_GET['vId'];
        $userslog = '';
        $userslog2 = '';
        $vFilter = '';

        if($vId != 'ALL'){
          $vFilter .= ' AND v.id = '.$vId;
        }
  

      


   if ($this->session->userdata['logged_in']['access'] == '17') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT define_saleshd_id FROM `admin_users`  WHERE id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as  $values) {

                $sales_team_id[] = $values->define_saleshd_id;
            }


            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->define_saleshd_id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            // $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }



        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {



            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head', 'sales_head_id', $sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }

            $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }

            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog .= ' AND  au.id IN (' . $sales_team_id . ')';
            // $userslog2 .= ' AND  c.sales_team_id IN (' . $sales_team_id . ')';
        }




        $getQuery = $this->db->query("SELECT 
          c.company_name as name, op.order_no, op.payment_mode, op.bill_total, op.driver_recived_payment as collectamount, c.phone , op.trip_id
          FROM orders_process op 
          LEFT JOIN vehicle v ON v.id  = op.vehicle_id
          LEFT JOIN customers c ON c.id  = op.customer_id
          WHERE 
          op.deleteid = 0  AND
          op.delivery_date_status = 1 AND
          op.driver_id IS NOT NULL  AND
          op.vehicle_id IS NOT NULL  AND 
          op.delivery_date = '$formdate'  AND
          op.assign_status != 0  
          $vFilter
          $userslog
          ORDER BY op.trip_id
          ")->result();

        echo json_encode($getQuery);

    }



}
