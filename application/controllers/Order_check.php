<?php
ini_set('memory_limit', '4400M');
defined('BASEPATH') or exit('No direct script access allowed');

class Order_check extends CI_Controller
{

  function __construct()
  {
    error_reporting(0);
    parent::__construct();
    $this->load->model('Admin/Users_model');
    if (isset($this->session->userdata['logged_in'])) {
      $sess_array = $this->session->userdata['logged_in'];
      $userid = $sess_array['userid'];
      $email = $sess_array['email'];
      $sales_id = $sess_array['sales_id'];
      $define_saleshd_id = $sess_array['define_saleshd_id'];
      $define_salesteam_id = $sess_array['define_salesteam_id'];
      $define_driver_id = $sess_array['define_driver_id'];
      $customer_id = $sess_array['customer_id'];
      $username = $sess_array['username'];
      $this->userid = $userid;
      $this->username = $username;
      $this->user_mail = $email;
      $this->sales_id = $sales_id;
      $this->define_saleshd_id = $define_saleshd_id;
      $this->define_salesteam_id = $define_salesteam_id;
      $this->define_driver_id = $define_driver_id;
      $this->customer_id = $customer_id;
      profile($this->user_mail);
    }
  }






public function fetch_single_data_totaldel_pickup_test_val() 
{

   

    
    
       $form_data = json_decode(file_get_contents("php://input"));
       $tablenamemain = 'orders_process';
       $tablename = 'order_product_list_process';
       $convert = $form_data->convert;
       $get_convertion = $form_data->convertion;
       $DC_id = $form_data->DC_id;
       $total_show_value = $form_data->amount;
      
         
       if($total_show_value==0)
       {


                                $poin_to_member = $this->db->query("SELECT * FROM order_delivery_order_status  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
                                $poin_to_member = $poin_to_member->result();
                                if(count($poin_to_member)==1)
                                {

                                                    //$total_show_value=0.2;
                                                    $this->db->query("UPDATE order_delivery_order_status SET total_picked_amount='".$total_show_value."',collection_remarks_2='".$total_show_value."' WHERE order_id='".$_GET['order_id']."'  AND dispatch_status=0 AND deleteid=0 AND finance_status=2");


                                }
           


       }






       
   }



    public function fetch_product_get_vendor_order_no() 
    {


       // $form_data = json_decode(file_get_contents("php://input"));
        $order_no = $_GET['order_no'];
        $sql="";
          $array = array();
        if($order_no!='')
        {
            
          
            
            $sql=' AND b.order_no="'.$order_no.'"';
          
        
        
        $array = array();
        $query = $this->db->query("SELECT b.reason,b.delivery_date_status,b.delivery_confirm_date_time,b.finance_status  FROM  orders_process as b   WHERE b.deleteid='0' AND b.order_base>0  $sql  ORDER BY b.id  DESC");
        $result=$query->result();                       
        foreach ($result as $value) {



             $array['status'] =0;
            if($value->finance_status=='3')
            {
                $array['msg']='Trip in progress. Return is not available. However, driver can return if the order is not delivered.';
                $array['status'] =1;
            }
            if($value->finance_status=='4')
            {
                $array['msg']='Trip in progress Reconcilation Pending. Return is not available. However, driver can return if the order is not delivered.';
                $array['status'] =1;
            }

            


            if($value->delivery_date_status==0)
            {
              $status=' Delivery date not confirmed';
            }
            else
            {
            
             $status=' Delivery date confirmed '.$value->delivery_confirm_date_time;
            }

            
            $array['reason'] = $value->reason.' '.$status;
        }



          } 


        echo json_encode($array);
    }


    public function fetch_data_table_delivery()
    {
   
       $pagenum = $_GET['page'];
           $pagesize = $_GET['size'];
           $offset = ($pagenum - 1) * $pagesize;
           $search = $_GET['search'];
           if (isset($_GET['page_next'])) {
               $offset = $_GET['page_next'];
           }
           
           $tablename = $_GET['tablename'];
           $order_base = $_GET['order_base'];
           $order_base_val=$_GET['order_base'];
           $where = "";
           $where1 = "";
           // echo $_GET['cMode'] === 'true' ? 'true' : 'false';
           // exit;
           
           if ($_GET['cMode'] == 1) 
           {
               $where .= ' AND ds.delivery_date_status=1';
           }
           else
           {
               $where .= ' AND ds.delivery_date_status=0';
               $where .= ' AND ds.dispatch_status=0';
               $where .= ' AND ds.deleteid IN ("0","1002")';
           }
   
   
   
           //$where .= ' AND ds.return_base=0';
   
   
   
           $sqls = "";
           
           
           if($order_base==110)
           {
               $where .=" AND a.paricel_mode=1";
               $order_base=1;
               $where .= " AND a.order_base = '".$order_base."'";
           }
           elseif($order_base==111)
           {
   
   
               $where .=" AND a.full_delivery=1";
               $order_base=1;
               $where .= " AND a.order_base = '".$order_base."'";
   
   
           }
           elseif($order_base==156)
           {
               
               $where .=" AND a.missing_customer=1";
               $order_base=1;
               $where .= " AND a.order_base = '".$order_base."'";
           }
           elseif($order_base==26)
           {
               $where .= " AND a.md_approved_status = '1'";
               $order_base=1;
               $where .= " AND a.order_base = '".$order_base."'";
           }
           elseif($order_base==27)
           {
               $where .= " AND a.md_approved_status = '2'";
               $order_base=1;
               $where .= " AND a.order_base = '".$order_base."'";
           }
           elseif($order_base==28)
           {
               //$where .= " AND a.md_approved_status = '0'";
               $where .= " AND a.order_base >= '20'";
               
           }
           elseif($order_base==1)
           {
               //$where .= " AND a.md_approved_status = '0'";
   
   
                // $where .= " AND a.order_base IN ('1','21','23','20','11') AND a.finance_status=2 AND a.assign_status=0 AND a.delivery_date_status=0 AND a.delivery_status=2";
                          
               
           }
           else
           {
                //$where .= " AND a.order_base = '".$order_base."' AND a.finance_status=2 AND a.assign_status=0 AND a.delivery_date_status=0 AND a.delivery_status=2";
           }
           
           
           if($search != "")
           {
                      
                 //AND a.order_base IN ('1','21','23','20','11')
              $where .=" AND a.order_no LIKE '%" . $search . "%'";
             //$where .= " OR c.name='" . $search . "' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
              $where1 .= " AND order_no LIKE '%" . $search . "'";
               
              $where .= " AND a.order_base IN ('1','21','23','20','11','120')  AND ds.delivery_status IN  ('2','1') AND ds.finance_status NOT IN ('10')";   
   
   
           }
           else
           {
   
   
                           if(isset($_GET['from_date'])) 
                           {     
                               if($_GET['from_date']!='')
                               {
                                   
                                       $from_date = $_GET['from_date'];
                                       $to_date = $_GET['to_date'];
                                       $where .= " AND a.delivery_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                                   
                               }
                               else
                               {
                                   
   
                                     if($order_base==1)
                                     {
   
   
                                         $from_date = date('Y-m-d');
                                         $to_date = date('Y-m-d');
                                         $where .= " AND a.delivery_date BETWEEN  '".$from_date."' AND '".$to_date."'";
   
   
                                     }
                                    
   
                               }
                                
                           }
   
   //AND a.order_base IN ('1','21','23','20','11')
               // gg changes for scope task to hide feault deliverey_status = 2
   
                         // $where .= " AND a.order_base IN ('1','21','23','20','11','120') AND a.delivery_status IN ('2','1')";
                          
                         $where .= " AND a.order_base IN ('1','21','23','20','11','120') AND ds.finance_status NOT IN ('10')";                         
           
           }
   
   
           //$where .= " AND a.finance_status NOT IN ('10')";
           
           
           $i = 1;
           $array = array();
   
   
   
           $JOIN=' JOIN order_delivery_order_status as ds ON a.id=ds.order_id';
           
            $userslog="";
           
           if ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
           {
               
            
               $sales_team_id = array($this->userid);
               $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
               foreach ($resultsales_team as $values) {
                   $sales_team_id[] = $values->sales_member_id;
               }
              
              
               $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
               foreach ($poin_to_member as $point) {
                   $sales_team_id[] = $point->id;
               }
               
               
               $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
               $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
              
               
           }
          
          
               
               // $whereNew = ($_GET['cMode'] == 1) ? '  HAVING COUNT(CASE WHEN oplp.picked_status = 1 THEN oplp.id END) > COUNT(oplp.id) ' : ' HAVING COUNT(CASE WHEN oplp.picked_status = 1 THEN oplp.id END)  > COUNT(oplp.id)  ';
   
   
   
               $whereNew="";
               //$whereNew = ($_GET['cMode'] == 1) ? '  GROUP BY ds.randam_id ' : '    GROUP BY ds.randam_id  ';
   
               $querycount = $this->db->query("SELECT a.id FROM $tablename as a   $JOIN  WHERE a.deleteid='0'  $where $whereNew ");
               $resultcount = $querycount->result();
               $count = count($resultcount);
   
   
               // $query = $this->db->query("SELECT a.*,ds.picked_status as picked_status_last,ds.randam_id,ds.reason as reason_last,ds.collection_remarks as collection_remarks_final, ds.collection_remarks_2,c.name, b.company_name, b.email, b.phone, b.sales_team_id, b.sales_team_sub_id, b.address1, b.address2, b.landmark, b.zone, b.pincode, b.state FROM orders_process AS a LEFT JOIN customers AS b ON a.customer_id = b.id LEFT JOIN admin_users AS c ON a.user_id = c.id  $JOIN WHERE a.deleteid = '0'  $userslog $where $whereNew ORDER BY ds.id DESC LIMIT $offset, $pagesize ");
               // $result = $query->result();
   
                // gg changes scope task




   
                $query = $this->db->query("SELECT a.*,ds.return_id as return_ids,ds.payment_mode,ds.delivery_status,ds.delivery_charge,ds.picked_status as picked_status_last,ds.randam_id,ds.reason as reason_last,ds.collection_remarks as collection_remarks_final,  ds.id as aa_id,ds.collection_remarks_2,c.name, b.company_name, b.email, b.phone,b.id as c_id, b.sales_team_id, b.sales_team_sub_id, b.address1, b.address2, b.landmark, b.zone, b.pincode, b.state FROM orders_process AS a LEFT JOIN customers AS b ON a.customer_id = b.id LEFT JOIN admin_users AS c ON a.user_id = c.id  $JOIN WHERE a.deleteid = '0'  $userslog $where $whereNew ORDER BY ds.id DESC LIMIT $offset, $pagesize ");
                $result = $query->result();    
    
   
   
           
           
           
           if ($tablename == 'orders') {
               $tablename_sub = "order_product_list";
           }
           if ($tablename == 'orders_quotation') {
               $tablename_sub = "order_product_list_quotation";
           }
           if ($tablename == 'orders_process') {
               $tablename_sub = "order_product_list_process";
           }
           foreach ($result as $value) {
   
   
   
   


//CHECK RETURN //

$resultsub_inproduction_all=$this->db->query(
                                                                "SELECT 
                                                                   
                                                                     SUM(ss.qty*c.rate) as totaldelivery_amount,
                                                                     b.id
                                                                      FROM  
                                                                      order_sales_return_complaints as b JOIN sales_return_products as c ON b.id=c.c_id
                                                                      JOIN sales_load_products as ss  ON ss.order_product_id=c.purchase_order_product_id

                                                                        WHERE b.deleteid=0 AND b.id='" . $value->return_ids . "' AND  b.order_base=2 AND ss.delivered_products=1 AND ss.return_status=1 GROUP BY b.id   ORDER BY b.id DESC");
$resultsub_inproduction_all=$resultsub_inproduction_all->result();

$totaldelivery_amount_val_all=0;
if(count($resultsub_inproduction_all)>0)
{
     foreach($resultsub_inproduction_all as $rrrrv)
     {

     
        $totaldelivery_amount_all=$rrrrv->totaldelivery_amount;
        $gstreturn_de_all=$totaldelivery_amount_all*18/100;
        $totaldelivery_amount_val_all=round($totaldelivery_amount_all+$gstreturn_de_all);
       
     }

}



  $resultsub_inproduction=$this->db->query(
                                                                "SELECT 
                                                                    SUM(c.qty*c.rate) as bill_total,
                                                                    SUM(c.return_qty_pick*c.rate) as return_picked_amount,
                                                                     SUM(c.return_qty_pick) as return_picked_qty,
                                                                     SUM(c.return_delivered_qty) as return_delivered_qty,
                                                                     SUM(c.return_delivered_qty*c.rate) as return_delivered_amount_fix,
                                                                     SUM(c.qty) as bill_qty,b.return_delivered_amount as return_delivered_amount

                                                                      FROM  order_sales_return_complaints as b JOIN sales_return_products as c ON b.id=c.c_id  WHERE b.deleteid=0 AND b.id='".$value->id."' AND  b.order_base=2  AND b.remarks NOT IN ('Driver Return Trip Assigned','Driver Delivered The Order')  ORDER BY b.id DESC");



                                                                 $resultsub_inproduction=$resultsub_inproduction->result();
                                                                 $inproduction_total_return=0;

                                                                 // echo "</br>"; 
                                                                 // echo "Query 7 - " . date("Y-m-d H:i:s"); 
                                                                 // echo "</br>";
                                                                 // echo "SELECT SUM(b.bill_total) as bill_total FROM  order_sales_return_complaints as b   WHERE b.deleteid=0 AND b.customer='".$value->id."'  AND b.order_base=2 AND b.driver_delivery_status=0 ORDER BY b.id DESC"; 
if(count($resultsub_inproduction)>0)
{


                                                                 foreach($resultsub_inproduction as $vals)
                                                                 { 
                                                                        

                                                                

                                                            $return_delivered_amount=$vals->return_delivered_amount;
                                                            $return_amount_val=$vals->bill_total;
                                                            $gstreturn=$return_amount_val*18/100;
                                                            $inproduction_total_return=round($return_amount_val+$gstreturn);
                                                            $return_return_picked_amount=$vals->return_picked_amount;
                                                            $gstreturn_picked=$return_return_picked_amount*18/100;
                                                            $inproduction_total_return_picked=round($return_return_picked_amount+$gstreturn_picked);
                            


                                                            if($return_delivered_amount<=0)
                                                            {
                                                                $return_delivered_amount_fix=$vals->return_delivered_amount_fix;
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
                                                                       

                                                                  
                                                                
                                                     
                                                                 }



                                                           


}
if($inproduction_total_return==0)
{

    $this->db->query("DELETE FROM order_delivery_order_status  WHERE finance_status=2 AND deleteid=0 AND reason='Return Partial Dispatched Yet to confirm'");

}
// CHECK RETURN END //
   
                if($_GET['cMode']!=1)
                {
   
   
          //$this->db->query("UPDATE sales_load_products SET randam_id=NULL WHERE randam_id IS NOT NULL AND loadstatus=0 AND dispatch_load='0' AND order_id='".$value->id."'"); 
         // $this->db->query("UPDATE order_product_list_process SET dispatch_status=0,loadstatus=0  WHERE randam_id IS NULL AND order_id='".$value->id."'"); 
                    
                }
   
   
               $order_by = $value->name;
              
   
               $company_name = $value->company_name;
               $email = $value->email;
               $phone = $value->phone;
           
   
               if ($value->reason == 1) {
                   $value->reason = 'Moved';
               }
              
               if ($value->reason == '-2') {
                   $value->reason = 'TL Re-Assigned';
               }
                if ($value->delivery_status == '1') {
                   $value->delivery_status = 'Client Scope';
                }
                // gg changes for scope task name change
                if ($value->delivery_status == '2') {
                   $value->delivery_status = 'Zaron Scope';
                }
   
   
              $le_amount=$value->bill_total;
              $discountfulltotal=$value->bill_total;
   
   
               $pending_amount='';
               
             
             $commission=$value->commission_check+$value->commission_check_fact;
   
   
               $commision_value = 0;
               if ($value->commission_check == 1) {
                   $commision_value = $value->bill_total - $value->bill_total_rate;
               }
   
               if ($value->commission_check_fact == 1) {
                   $commision_value_fact =
                       $value->bill_total - $value->bill_total_fact;
                   $commision_value = $commision_value_fact;
               }
    if($value->create_date > '2024-05-31'){
                   
                   $commision_value = round($commision_value * 1.18);
                                   $commision_value = round($commision_value);
   
               } 
   
             if($value->deleteid==0)
             {
   
                $collection_remarks_final= $value->collection_remarks_final;
                  //if($value->delivery_date_status==0)
                  //{
               $return_date="";
               if($value->return_date!='')
               {
                   $return_date=date('d-m-Y', strtotime($value->return_date));
               }
               
                if($value->collection_remarks_final>0)
                {
   
                        
                          $value->collection_remarks=$value->collection_remarks_final;
                        
   
                }
                else
                {
   
                         $value->collection_remarks=$discountfulltotal;
                         $this->db->query("UPDATE orders_process SET collection_remarks='".$discountfulltotal."'  WHERE id='".$value->id."'");
   
                  
                }
   
   
   
   
   
                
   
                         
   
                           if($value->collection_remarks_final>0)
                           {
   
                           }
                           else
                           {
   
                                $poin_to_member = $this->db->query("SELECT * FROM order_delivery_order_status  WHERE order_id='" . $value->id . "' AND finance_status>=3");
                                 $poin_to_member = $poin_to_member->result();
                                 $collection_remarks=0;
                                 foreach($poin_to_member as $tcs)
                                 {
                                        $collection_remarks_get+=$tcs->collection_remarks;
                                 }
   
   
                                if(count($poin_to_member)>0)
                                {
                                   $value->collection_remarks=$value->bill_total-$collection_remarks_get;
                                }
   
                           }
                            
                            
   
                            if($collection_remarks_final==0)
                            {
   
                                 if($value->collection_remarks_2==0)
                                 {
                                   $value->collection_remarks=$value->bill_total;
                                 }
                                 else
                                 {
                                   $value->collection_remarks=$value->collection_remarks_2;
                                 }
                             
                            }
   
   
                               $disabled='';
                            if($value->reason_last=='CallBack' || $value->reason_last=='Driver Return Partial' || $value->reason_last=='Driver Full Return')
                            { 
   
                             $disabled='disabled';
   
                            }
   
                       
$this->db->query("UPDATE  order_delivery_order_status SET customer_id='".$value->c_id."'  WHERE id='" . $value->aa_id . "'");

               
               $array[] = array('no' => $i, 'disabled' => $disabled,'randam_id' => $value->randam_id,'picked_status' => $value->picked_status_last,'collection_remarks' => $value->collection_remarks, 'finance_status' => $value->finance_status,'id' => $value->id,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason_last, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->delivery_date)),'return_date' => $return_date,'create_date_new' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,'cMode'=>$_GET['cMode']);
               $i++;
   
   
                  //}
   
   
               }
   
   
           }
           $myData = array('PortalActivity' => $array, 'totalCount' => $count);
           
           
           echo json_encode($myData);
          
    }
   


 // for gate orders

 
 public function fetch_data_table_delivery_gate()
 {

    $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $order_base_val=$_GET['order_base'];
        $where = "";
        $where1 = "";
       

        $where .= ' AND ds.randam_id!=""';

        if ($_GET['cMode'] == 1) 
        {
            $where .= ' AND ds.delivery_date_status=1';
        }
        else
        {
            $where .= ' AND ds.delivery_date_status=0';
            $where .= ' AND ds.dispatch_status=0';
        }



        $where .= ' AND ds.return_base=0';



        $sqls = "";
        
        
        if($order_base==110)
        {
            $where .=" AND a.paricel_mode=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==111)
        {


            $where .=" AND a.full_delivery=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";


        }
        elseif($order_base==156)
        {
            
            $where .=" AND a.missing_customer=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==26)
        {
            $where .= " AND a.md_approved_status = '1'";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==27)
        {
            $where .= " AND a.md_approved_status = '2'";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==28)
        {
            //$where .= " AND a.md_approved_status = '0'";
            $where .= " AND a.order_base >= '20'";
            
        }
        elseif($order_base==1)
        {
            //$where .= " AND a.md_approved_status = '0'";


             // $where .= " AND a.order_base IN ('1','21','23','20','11') AND a.finance_status=2 AND a.assign_status=0 AND a.delivery_date_status=0 AND a.delivery_status=2";
                       
            
        }
        else
        {
             //$where .= " AND a.order_base = '".$order_base."' AND a.finance_status=2 AND a.assign_status=0 AND a.delivery_date_status=0 AND a.delivery_status=2";
        }
        
        
        if($search != "")
        {
                   
              //AND a.order_base IN ('1','21','23','20','11')
           $where .=" AND a.order_no LIKE '%" . $search . "%'";
          //$where .= " OR c.name='" . $search . "' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
           $where1 .= " AND order_no LIKE '%" . $search . "'";
            
           $where .= " AND a.order_base IN ('1','21','23','20','11','120')  AND a.delivery_status IN  ('2','1')";   


        }
        else
        {


                        if(isset($_GET['from_date'])) 
                        {     
                            if($_GET['from_date']!='')
                            {
                                
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $where .= " AND a.delivery_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                                
                            }
                            else
                            {
                                

                                  if($order_base==1)
                                  {


                                      $from_date = date('Y-m-d');
                                      $to_date = date('Y-m-d');
                                      $where .= " AND a.delivery_date BETWEEN  '".$from_date."' AND '".$to_date."'";


                                  }
                                 

                            }
                             
                        }

                       $where .= " AND a.order_base IN ('1','21','23','20','11','120') AND a.delivery_status IN ('2','1')";   
                       
        
        }


      
        
        
        $i = 1;
        $array = array();



        //$JOIN='LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id JOIN order_delivery_order_status as ds ON a.id=ds.order_id JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id';

        $JOIN='LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id JOIN order_delivery_order_status as ds ON a.id=ds.order_id LEFT JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id';
        
         $userslog="";
        
        if ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
        {
            
         
            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }
           
           
            $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
           
            
        }
       
   
// for gate order purpose

        $viewstatus=0;
         if(isset($_GET['viewstatus'])) 
         {  
                 
                $viewstatus= $_GET['viewstatus'];
               
         }


          $whereNew="";

          if($search == "")
          {
 
 
             if ($viewstatus == 0) {
                 // If viewstatus is 0, include rows where uom is 'Kg' or billing_options is 2
                 $whereNew .= " AND (ps.uom='Kg' OR pp.billing_options=2)";
             } else {
                 // If viewstatus is not 0, exclude orders where uom is 'Kg' or any row has billing_options = 2
                 $whereNew .= " AND ps.uom != 'Kg' 
                                AND a.order_no NOT IN (
                                    SELECT 
                                        a_sub.order_no
                                    FROM 
                                        orders_process AS a_sub
                                    LEFT JOIN 
                                        order_product_list_process AS pp_sub ON pp_sub.order_id = a_sub.id
                                    LEFT JOIN 
                                        product_list AS ps_sub ON ps_sub.id = pp_sub.product_id
                                    WHERE 
                                        ps_sub.uom = 'Kg' OR pp_sub.billing_options = 2
                                )";
             }
             
             
 
          }

         

         $filter=0;
         if(isset($_GET['filter'])) 
         {  
                
                $filter= $_GET['filter'];
                if($filter>0)
                {
                    $where .=" AND a.convertion=2";
                }
               
         }  


          $filter_parcel=0;
         if(isset($_GET['filter_parcel'])) 
         {  
                 
                $filter_parcel= $_GET['filter_parcel'];
                if($filter_parcel>0)
                {
                    $whereview="";
                    $where .=" AND a.full_delivery=1";
                }
               
         } 


        if($filter_parcel>0)
        {
                       $where .=" AND ds.finance_status>=3";
        }
        else
        {


                       $where .=" AND ds.finance_status>=3";
                      

        }
           
        
        if ($search != "")
        {

                     if($this->session->userdata['logged_in']['access']!=12)
                     {
                       $sales_search=" OR c.name LIKE '%" . $search . "%'";
                     }
                   
                     $where .= " AND a.order_no='" . $search . "' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR d.name LIKE '%" . $search . "%' OR v.vehicle_number LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%' $sales_search";
            
        }
        else
        {
             //$from_date='2024-02-06';
            // $where .= " AND a.create_date >= '2024-02-06'";
        }
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];

        if($order_base==1)
        {
            $where .=" AND ds.gate_login_view_status='1'";
        }
        elseif($order_base==2)
        {

            

                 $where .=" AND ds.gate_login_view_status='2'";

            

        }
        else
        {
             

               $where .=" AND ds.gate_login_view_status='0'";

            
        }


        if($order_base==50)
        {
              $where .=" AND ds.convertion=0";
        }

        if($order_base==3)
        {
               $where .=" AND ds.convertion>0";
        }



            $querycount = $this->db->query("SELECT a.id FROM $tablename as a   $JOIN LEFT JOIN customers AS b ON a.customer_id = b.id LEFT JOIN admin_users AS c ON a.user_id = c.id  WHERE a.deleteid='0'  $where $whereNew ");
            $resultcount = $querycount->result();
            $count = count($resultcount);
            $query = $this->db->query("SELECT a.return_date,a.id,a.reason,a.delivery_status,a.bill_total,a.commission_check,a.commission_check_fact,a.bill_total_rate,a.bill_total_fact,ds.picked_status as picked_status_last,ds.randam_id,ds.reason as reason_last,a.create_date,a.create_time,a.order_no,a.delivery_date,ds.collection_remarks as collection_remarks_final,ds.id as aa_id, ds.collection_remarks_2,c.name, b.company_name, b.email, b.phone, b.sales_team_id, b.sales_team_sub_id, b.address1, b.address2, b.landmark, b.zone, b.pincode, b.state,d.name as dname,v.vehicle_name,v.vehicle_number  FROM orders_process AS a  LEFT JOIN customers AS b ON a.customer_id = b.id LEFT JOIN admin_users AS c ON a.user_id = c.id  $JOIN WHERE a.deleteid = '0'  $userslog $where $whereNew GROUP BY a.id,ds.id ORDER BY ds.id DESC LIMIT $offset, $pagesize ");


         
            $result = $query->result();
 

        
        
        if ($tablename == 'orders') {
            $tablename_sub = "order_product_list";
        }
        if ($tablename == 'orders_quotation') {
            $tablename_sub = "order_product_list_quotation";
        }
        if ($tablename == 'orders_process') {
            $tablename_sub = "order_product_list_process";
        }
        foreach ($result as $value) {





             if($_GET['cMode']!=1)
             {


       //$this->db->query("UPDATE sales_load_products SET randam_id=NULL WHERE randam_id IS NOT NULL AND loadstatus=0 AND dispatch_load='0' AND order_id='".$value->id."'"); 
      // $this->db->query("UPDATE order_product_list_process SET dispatch_status=0,loadstatus=0  WHERE randam_id IS NULL AND order_id='".$value->id."'"); 
                 
             }


           
             $order_by = $value->name;
             $order_byd = $value->dname;
             $vehicle_number = $value->vehicle_name.' | '.$value->vehicle_number;
           

            $company_name = $value->company_name;
            $email = $value->email;
            $phone = $value->phone;
        

            if ($value->reason == 1) {
                $value->reason = 'Moved';
            }
           
            if ($value->reason == '-2') {
                $value->reason = 'TL Re-Assigned';
            }
             if ($value->delivery_status == '1') {
                $value->delivery_status = 'Client Scope';
             }
             
             if ($value->delivery_status == '2') {
                $value->delivery_status = 'Own Scope';
             }


           $le_amount=$value->bill_total;
           $discountfulltotal=$value->bill_total;


            $pending_amount='';
            
          
          $commission=$value->commission_check+$value->commission_check_fact;


            $commision_value = 0;
            if ($value->commission_check == 1) {
                $commision_value = $value->bill_total - $value->bill_total_rate;
            }

            if ($value->commission_check_fact == 1) {
                $commision_value_fact =
                    $value->bill_total - $value->bill_total_fact;
                $commision_value = $commision_value_fact;
            }
 if($value->create_date > '2024-05-31'){
                
                $commision_value = round($commision_value * 1.18);
                                $commision_value = round($commision_value);

            } 

          if($value->deleteid==0)
          {

             $collection_remarks_final= $value->collection_remarks_final;
               //if($value->delivery_date_status==0)
               //{
            $return_date="";
            if($value->return_date!='')
            {
                $return_date=date('d-m-Y', strtotime($value->return_date));
            }
            
             if($value->collection_remarks_final>0)
             {

                     
                       $value->collection_remarks=$value->collection_remarks_final;
                     

             }
             else
             {

                      $value->collection_remarks=$discountfulltotal;
                      $this->db->query("UPDATE orders_process SET collection_remarks='".$discountfulltotal."'  WHERE id='".$value->id."'");

               
             }





             

                      

                        if($value->collection_remarks_final>0)
                        {

                        }
                        else
                        {

                             $poin_to_member = $this->db->query("SELECT * FROM order_delivery_order_status  WHERE order_id='" . $value->id . "' AND finance_status>=3");
                              $poin_to_member = $poin_to_member->result();
                              $collection_remarks=0;
                              foreach($poin_to_member as $tcs)
                              {
                                     $collection_remarks_get+=$tcs->collection_remarks;
                              }


                             if(count($poin_to_member)>0)
                             {
                                $value->collection_remarks=$value->bill_total-$collection_remarks_get;
                             }

                        }
                         
                         

                         if($collection_remarks_final==0)
                         {

                              if($value->collection_remarks_2==0)
                              {
                                $value->collection_remarks=$value->bill_total;
                              }
                              else
                              {
                                $value->collection_remarks=$value->collection_remarks_2;
                              }
                          
                         }


                            $disabled='';
                         if($value->reason_last=='CallBack' || $value->reason_last=='Driver Return Partial' || $value->reason_last=='Driver Full Return')
                         { 

                          $disabled='disabled';

                         }


                         $convertion_value = $this->db->query("SELECT convertion FROM order_delivery_order_status  WHERE order_id='" . $value->id . "' AND randam_id='".$value->randam_id."'")->row();

                        

                    
//$this->db->query("UPDATE  order_delivery_order_status SET collection_remarks='".$value->collection_remarks."'  WHERE id='" . $value->aa_id . "'");



            $array[] = array('no' => $i, 'disabled' => $disabled,'randam_id' => $value->randam_id,'picked_status' => $value->picked_status_last,'collection_remarks' => $value->collection_remarks_2, 'finance_status' => $value->finance_status,'id' => $value->id,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason_last, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->delivery_date)),'return_date' => $return_date,'create_date_new' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,'cMode'=>$_GET['cMode'],'vehicle_number' => $vehicle_number,
            'order_byd' => $order_byd,
            'convertion' => $convertion_value->convertion
        );





            $i++;


               //}


            }


        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        
        
        echo json_encode($myData);
       
 }



 

 public function gatelogin_count()
 {

     $tablename = $_GET['tablename'];



      $from_date='2024-02-06';


      $where= " AND a.create_date >= '".$from_date."'";
      $where.= " AND a.finance_status >=3";
     $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.order_id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.finance_status>=3 AND a.convertion=0  AND a.gate_login_view_status='0' AND ps.uom='Kg' $where GROUP BY a.id ORDER BY a.id DESC");
     $resultcount = $querycount->result();
     $w_update_pending = count($resultcount);


     
     $querycount_2 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.order_id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.convertion>0  AND a.gate_login_view_status='0' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
     $resultcount_2 = $querycount_2->result();
     $w_update = count($resultcount_2);




     $querycount_3 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.order_id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.convertion>0  AND a.gate_login_view_status='1' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
     $resultcount_3 = $querycount_3->result();
     $w_update_approved = count($resultcount_3);



     $querycount_4 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id  LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.order_id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0  AND a.gate_login_view_status='2' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
     $resultcount_4 = $querycount_4->result();
     $w_update_rejected = count($resultcount_4);




     $array = array(

         'w_update_pending' => $w_update_pending,
         'w_update' => $w_update,
         'w_update_approved' => $w_update_approved,
         'w_update_rejected' => $w_update_rejected


     );
     echo json_encode($array);
 }


 
public function orders_partial_pack_approval_list() {
        if (isset($this->session->userdata['logged_in'])) {
         
                                             
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            
            
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Dispatch Notification';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/orders_partial_pack_approval_list', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
public function order_delivery_order_status_update() 
{

   $ssd = $this->db->query("SELECT * FROM order_delivery_order_status  WHERE   finance_status IN ('3') AND randam_id IS NOT NULL AND picked_status=0");
  $ssd = $ssd->result();
  $i=1;
  foreach($ssd as $ss)
  {



$this->db->query("UPDATE order_delivery_order_status SET picked_status=1 WHERE id='".$ss->id."' AND deleteid=0");


      $order_id=$ss->order_id;
      $finance_status=$ss->finance_status;
      $assign_status=$ss->assign_status;
      $trip_id=$ss->trip_id;
      $create_time=$ss->create_time;
      $create_date=$ss->create_date;
      $delivery_date_status=$ss->delivery_date_status;
      $delivery_confirm_person=$ss->delivery_confirm_person;
      $delivery_confirm_date_time=$ss->delivery_confirm_date_time;
      $reason=$ss->reason;
      $dispatch_load_status=$ss->dispatch_load_status;

      $dispath_load_status_view=$ss->dispath_load_status_view;
      $seq_status=$ss->seq_status;
      $sort_id=$ss->sort_id;
      $vehicle_id=$ss->vehicle_id;
      $driver_id=$ss->driver_id;
      $start_reading=$ss->start_reading;

      $km_reading_end=$ss->km_reading_end;
      $assign_date=$ss->assign_date;
      $assign_time=$ss->assign_time;

      $randam_id=$ss->randam_id;

      $collection_remarks=$ss->collection_remarks;
      $trip_start_date=$ss->trip_start_date;
      $trip_start_time=$ss->trip_start_time;
      $trip_end_date=$ss->trip_end_date;
      $loading_time=$ss->loading_time;
      $loading_date=$ss->loading_date;

      $rescheduling_delivery=$ss->rescheduling_delivery;
      $rescheduling_remarks=$ss->rescheduling_remarks;
      $gate_weight=$ss->gate_weight;
      $gate_status=$ss->gate_status;
      $driver_recived_payment=$ss->driver_recived_payment;
      $pickup=$ss->pickup;
      $otp=$ss->otp;
      $payment_mode=$ss->payment_mode;


      $reference_no=$ss->reference_no;
      $return_excess=$ss->return_excess;
      $collectamount=$ss->collectamount;
      $payment_mode_reconciliation=$ss->payment_mode_reconciliation;
      $reconcilation_status=$ss->reconcilation_status;
      $payment_recived_date=$ss->payment_recived_date;
      $payment_recived_time=$ss->payment_recived_time;
      $return_status=$ss->return_status;
      $return_id=$ss->return_id;
      $return_amount=$ss->return_amount;
      $delivery_status=$ss->delivery_status;
      $return_base=$ss->return_base;
      $delivery_date=$ss->delivery_date;
      $delivery_time=$ss->delivery_time;
      $pack_approved_status=$ss->pack_approved_status;


      $pack_approved_by=$ss->pack_approved_by;
      $pack_approved_date=$ss->pack_approved_date;
      $pack_approved_time=$ss->pack_approved_time;
      $delivery_mode=$ss->delivery_mode;
      $delivery_notes_status=$ss->delivery_notes_status;


      $tcs_amount_get=$ss->tcs_amount_get;
      $toll_charge=$ss->toll_charge;
      $rent_approval=$ss->rent_approval;
      $deliver_count=$ss->deliver_count;

      $localorlong=$ss->localorlong;
      $order_no=$ss->order_no;
      $customer_id=$ss->customer_id;
$order_base=$ss->order_base;
$randam_id=$ss->randam_id;




      $load['order_id']=$order_id;
      $load['finance_status']=$finance_status;
      $load['assign_status']=$assign_status;
      $load['trip_id']=$trip_id;
      $load['create_time']=$create_time;
      $load['create_date']=$create_date;
      $load['delivery_date_status']=$delivery_date_status;
      $load['delivery_confirm_person']=$delivery_confirm_person;
      $load['delivery_confirm_date_time']=$delivery_confirm_date_time;
      $load['reason']=$reason;
      $load['dispatch_load_status']=$dispatch_load_status;

      $load['dispath_load_status_view']=$dispath_load_status_view;
      $load['seq_status']=$seq_status;
      $load['sort_id']=$sort_id;
      $load['vehicle_id']=$vehicle_id;
      $load['driver_id']=$driver_id;
      $load['start_reading']=$start_reading;

      $load['km_reading_end']=$km_reading_end;
      $load['assign_date']=$assign_date;
      $load['assign_time']=$assign_time;
      $load['customer_id']=$customer_id;

      

      $load['collection_remarks']=$collection_remarks;
      $load['trip_start_date']=$trip_start_date;
      $load['trip_start_time']=$trip_start_time;
      $load['trip_end_date']=$trip_end_date;
      $load['loading_time']=$loading_time;
      $load['loading_date']=$loading_date;

      $load['rescheduling_delivery']=$rescheduling_delivery;
      $load['rescheduling_remarks']=$rescheduling_remarks;
      $load['gate_weight']=$gate_weight;
      $load['gate_status']=$gate_status;
      $load['driver_recived_payment']=$driver_recived_payment;
      $load['pickup']=$pickup;
      $load['otp']=$otp;
      $load['payment_mode']=$payment_mode;


      $load['reference_no']=$reference_no;
      $load['return_excess']=$return_excess;
      $load['collectamount']=$collectamount;
      $load['payment_mode_reconciliation']=$payment_mode_reconciliation;
      $load['reconcilation_status']=$reconcilation_status;
      $load['payment_recived_date']=$payment_recived_date;
      $load['payment_recived_time']=$payment_recived_time;
      $load['return_status']=$return_status;
      $load['return_id']=$return_id;
      $load['return_amount']=$return_amount;
      $load['delivery_status']=$delivery_status;
      $load['return_base']=$return_base;
      $load['delivery_date']=$delivery_date;
      $load['delivery_time']=$delivery_time;
      $load['pack_approved_status']=$pack_approved_status;


      $load['pack_approved_by']=$pack_approved_by;
      $load['pack_approved_date']=$pack_approved_date;
      $load['pack_approved_time']=$pack_approved_time;
      $load['delivery_mode']=$delivery_mode;
      $load['delivery_notes_status']=$delivery_notes_status;


      $load['tcs_amount_get']=$tcs_amount_get;
      $load['toll_charge']=$toll_charge;
      $load['rent_approval']=$rent_approval;
      $load['deliver_count']=$deliver_count;

      $load['localorlong']=$localorlong;
      $load['order_no']=$order_no;
      $load['order_base']=$order_base;

      if($finance_status==2)
      {
        $load['dispatch_status']=0;
      }
      else
      {
        $load['dispatch_status']=1;
      }
      

                     
                   // $randam_id='DC-'.$order_id;
                    if($finance_status!=2)
                    {




                                    $load['randam_id']=$randam_id;
                       



                                    $vv = $this->db->query("SELECT * FROM order_product_list_process  WHERE order_id='" . $order_id . "' AND deleteid=0");
                                    $vv = $vv->result();
                                    foreach($vv as $d)
                                    {

                                       $order_product_id =$d->id;
                                       $loadstatus =$d->loadstatus;


                                        $vvs = $this->db->query("SELECT * FROM sales_load_products  WHERE order_product_id='" . $order_product_id . "'");
                                        $vvs = $vvs->result();

                                       if(count($vvs)==0)
                                       {



                                          $loads['order_product_id']=$order_product_id;
                                          $loads['order_id']=$order_id;
                                          $loads['qty']=$d->qty;
                                          $loads['nos']=$d->nos;
                                          $loads['amount']=$d->amount;
                                          $loads['loadstatus']=0;
                                          $loads['pickedstatus']=1;
                                          $loads['randam_id']=$load['randam_id'];


                                          if($order_base>0)
                                          {
                                             $this->Main_model->insert_commen($loads, 'sales_load_products');
                                          }

                                         

                                       }

                                       if($loadstatus==1)
                                       {

$this->db->query("UPDATE sales_load_products SET randam_id='".$load['randam_id']."' WHERE order_product_id='".$order_product_id."' AND randam_id IS NOT NULL");
$this->db->query("UPDATE order_product_list_process SET picked_status=1,dispatch_status=1,randam_id='".$load['randam_id']."' WHERE id='".$order_product_id."'");
//$this->db->query("UPDATE denomination SET randam_id='".$load['randam_id']."' WHERE order_id='".$order_id."'");


                                       }
                                       else
                                       {

$this->db->query("UPDATE sales_load_products SET randam_id='".$load['randam_id']."' WHERE order_product_id='".$order_product_id."' AND randam_id IS NOT NULL");
$this->db->query("UPDATE order_product_list_process SET picked_status=1,randam_id='".$load['randam_id']."' WHERE id='".$order_product_id."'");

//$this->db->query("UPDATE sales_load_products SET randam_id='".$load['randam_id']."',pickedstatus=1,loadstatus=0 WHERE order_product_id='".$order_product_id."'");
//$this->db->query("UPDATE denomination SET randam_id='".$load['randam_id']."' WHERE order_id='".$order_id."'");
//$this->db->query("UPDATE order_product_list_process SET dispatch_status=1 WHERE id='".$order_product_id."'");                               

                                   

                                       }



                                    }






                

                    } 
                    else
                    {
                       $load['randam_id']=NULL;
                    }
                   

                 
//$this->Main_model->insert_commen($load, 'order_delivery_order_status');
                             



$i++;


  }





}
public function undoTCS() {


                                            $form_data = json_decode(file_get_contents("php://input"));
                                            $datass['get_id'] = $form_data->order_id;
                                            $datass['tcsamount'] = 0;
                                            $datass['tcs_status'] = 1;
                                            $tablename = $form_data->tablenamemain;
                                            $this->Main_model->update_commen($datass, $tablename);


                                              $order_no = $form_data->order_no;

$this->db->query("UPDATE all_ledgers SET deleteid='0'  WHERE customer_id='166' AND party_type='5' AND order_no='".$order_no."' AND deleteid='71'");


                                            $datassh['userid'] = $this->userid;
                                            $datassh['order_id'] = $form_data->order_id;
                                            $datassh['tablename'] = $tablename;
                                            $datassh['order_no'] = $order_no;
                                            $datassh['inputname'] ='TCS Removed';
                                            $datassh['notes'] =' TCS Removed';
                                            $this->Main_model->insert_commen($datassh, 'bill_changes_log');


  
 }
 public function fetch_data_table_finance_with_uom()
 {

        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $where = "";
        $sqls = "";
        

         $viewstatus=0;
         if(isset($_GET['viewstatus'])) 
         {  
                 
                $viewstatus= $_GET['viewstatus'];
               
         }


         $whereview="";

         if($search == "")
         {


                 if($viewstatus==0)
                 {
                     $whereview .= " AND ps.uom='Kg'";
                 }
                 else
                 {
                     $whereview .= " AND ps.uom!='Kg'";
                 }

         }
        
       




         $filter=0;
         if(isset($_GET['filter'])) 
         {  
                
                $filter= $_GET['filter'];
                if($filter>0)
                {
                    $where .=" AND a.convertion=2";
                }
               
         }  


          $filter_parcel=0;
         if(isset($_GET['filter_parcel'])) 
         {  
                 
                $filter_parcel= $_GET['filter_parcel'];
                if($filter_parcel>0)
                {
                    $whereview="";
                    $where .=" AND a.full_delivery=1";
                }
               
         } 


        if($filter_parcel>0)
        {
                       $where .=" AND a.finance_status>=3";
        }
        else
        {


                       $where .=" AND a.finance_status>=3";
                      

        }
           
        
        if ($search != "")
        {

                     if($this->session->userdata['logged_in']['access']!=12)
                     {
                       $sales_search=" OR c.name LIKE '%" . $search . "%'";
                     }
                   
                     $where .= " AND a.order_no='" . $search . "' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR d.name LIKE '%" . $search . "%' OR v.vehicle_number LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%' $sales_search";
            
        }
        else
        {
             //$from_date='2024-02-06';
            // $where .= " AND a.create_date >= '2024-02-06'";
        }
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];

        if($order_base==1)
        {
            $where .=" AND a.gate_login_view_status='1'";
        }
        elseif($order_base==2)
        {

            

                 $where .=" AND a.gate_login_view_status='2'";

            

        }
        else
        {
             

               $where .=" AND a.gate_login_view_status='0'";

            
        }


        if($order_base==50)
        {
              $where .=" AND a.convertion=0";
        }

        if($order_base==3)
        {
               $where .=" AND a.convertion>0";
        }



        $i = 1;
        $array = array();
     
           $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.create_date >= '2024-02-06' $whereview $where   GROUP BY a.id ORDER BY a.id DESC");
           $resultcount = $querycount->result();
           $count=count($resultcount);
                
                
           $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,d.name as dname,v.vehicle_name,v.vehicle_number FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0  $whereview  $where GROUP BY a.id ORDER BY a.id DESC LIMIT $offset, $pagesize");
           $result = $query->result();







        foreach ($result as $value) 
        {


                 $tablename_sub = "order_product_list_process";


                 $discountfulltotal = $value->bill_total;

                 $order_by = $value->name;
                 $order_byd = $value->dname;
                 $vehicle_number = $value->vehicle_name.' | '.$value->vehicle_number;
            
            
                 $company_name = $value->company_name;
                 $email = $value->email;
                 $phone = $value->phone;
             

                 if($value->gate_login_view_status==1)
                 {
                    $status="Weight Approved";
                 }
                 else if($value->gate_login_view_status==2)
                 {
                    $status="Weight Rejected";
                 }

                    if($order_base==3)
                    {
                           $status="Approval pending";
                    }
                    
            
    


            $array[] = array('no' => $i,'gate_login_view_status'=>$value->gate_login_view_status,'status' => $status, 'payment_id_base' => $payment_id_base,'convertion' => $value->convertion,'id' => $value->id,'vehicle_number' => $vehicle_number, 'base_id' => base64_encode($value->id), 'selforder' => $value->selforder,'customer_id' => $value->customer_id,'finance_status' => $value->finance_status,'order_no' => $value->order_no, 'name' => $company_name, 'email' => $email, 'order_byd' => $order_byd, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commission), 'delivery_charge' => $value->delivery_charge, 'phone' => $phone, 'reason' => $value->reason, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->finance_status, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time);
            $i++;



          


        }









        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }


 public function removeTCS() {


        $form_data = json_decode(file_get_contents("php://input"));
        $datass['get_id'] = $form_data->order_id;
        $order_no = $form_data->order_no;
        $datass['tcsamount'] = 0;
        $datass['tcs_status'] = 2;
        $tablename = $form_data->tablenamemain;
        $this->Main_model->update_commen($datass, $tablename);





$this->db->query("UPDATE all_ledgers SET deleteid='71'  WHERE customer_id='166' AND party_type='5' AND order_no='".$order_no."' AND deleteid='0'");






                                            $datassh['userid'] = $this->userid;
                                            $datassh['order_id'] = $form_data->order_id;
                                            $datassh['tablename'] = $tablename;
                                            $datassh['order_no'] = $order_no;
                                            $datassh['inputname'] ='TCS Removed';
                                            $datassh['notes'] =' TCS Removed';
                                            $this->Main_model->insert_commen($datassh, 'bill_changes_log');



    }




     public function gate_approved_for_finance() 
     {


                date_default_timezone_set("Asia/Kolkata");
                $date = date('Y-m-d');
                $time = date('h:i A');
                $form_data = json_decode(file_get_contents("php://input"));

                                             $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) 
                                             {
                                                
                                                                $username=$team->name;
                                                                
                                             }


              
                $order_id=$form_data->order_id;
                $order_id=explode('|',$order_id);
                for($i=0;$i<count($order_id);$i++)
                {
                          

                          $resultp= $this->Main_model->where_names('orders_process','id',$order_id[$i]);
                          foreach ($resultp as  $value)
                          {

                            

                                             $id=$value->id;
                                             $order_no=$value->order_no;
                                             $finance_status=$value->finance_status;
                                             $customer_id=$value->customer_id;
                                             $difference_val=$value->difference;
                                             $trip_id=$value->trip_id;


                                        

                                             $day_log['username'] = $username;
                                             $day_log['changes'] = '';
                                             $day_log['table_name'] = 'orders_process';
                                             $day_log['reference_no'] = $order_no;
                                             $day_log['create_date'] =$date;
                                             $day_log['create_time'] =$time;
                                             $day_log['details'] ="Gate Approved By Finance";
                                             $this->Main_model->insert_commen($day_log, 'day_log');

                             
                            

                          }


                         $this->db->query("UPDATE orders_process SET gate_login_view_status='1' WHERE id='".$order_id[$i]."'");
            
             
                }

     }
    
   public function gate_approved_for_finance_re() 
     {


                date_default_timezone_set("Asia/Kolkata");
                $date = date('Y-m-d');
                $time = date('h:i A');
                $form_data = json_decode(file_get_contents("php://input"));

                                             $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) 
                                             {
                                                
                                                                $username=$team->name;
                                                                
                                             }


              
                $order_id=$form_data->order_id;
                $order_id=explode('|',$order_id);
                for($i=0;$i<count($order_id);$i++)
                {
                          

                          $resultp= $this->Main_model->where_names('orders_process','id',$order_id[$i]);
                          foreach ($resultp as  $value)
                          {

                            

                                             $id=$value->id;
                                             $order_no=$value->order_no;
                                             $finance_status=$value->finance_status;
                                             $customer_id=$value->customer_id;
                                             $difference_val=$value->difference;
                                             $trip_id=$value->trip_id;


                                        

                                             $day_log['username'] = $username;
                                             $day_log['changes'] = '';
                                             $day_log['table_name'] = 'orders_process';
                                             $day_log['reference_no'] = $order_no;
                                             $day_log['create_date'] =$date;
                                             $day_log['create_time'] =$time;
                                             $day_log['details'] ="Gate Rejected By Finance";
                                             $this->Main_model->insert_commen($day_log, 'day_log');

                             
                            

                          }


         $this->db->query("UPDATE orders_process SET gate_login_view_status='2',convertion='2' WHERE id='".$order_id[$i]."'");
           
             
                }

     }


// GG CHANGES GATE STATUS

public function gate_approved_for_finance_packlist() 
{


   date_default_timezone_set("Asia/Kolkata");
   $date = date('Y-m-d');
   $time = date('h:i A');
   $form_data = json_decode(file_get_contents("php://input"));

   $order_id=$form_data->order_id;
   $randam_id=$form_data->dc_id;

   $this->db->query("UPDATE order_delivery_order_status SET gate_login_view_status='1' WHERE order_id='".$order_id."' AND randam_id='".$randam_id."' AND deleteid=0");


   $this->db->query("UPDATE orders_process SET gate_login_view_status='1'  WHERE id='" .$order_id. "'");


}

public function gate_approved_for_finance_re_packlist() 
{


   date_default_timezone_set("Asia/Kolkata");
   $date = date('Y-m-d');
   $time = date('h:i A');
   $form_data = json_decode(file_get_contents("php://input"));

   $order_id=$form_data->order_id;
   $randam_id=$form_data->dc_id;
   $this->db->query("UPDATE order_delivery_order_status SET gate_login_view_status='2' WHERE order_id='".$order_id."' AND randam_id='".$randam_id."' AND deleteid=0");
   
   
   $this->db->query("UPDATE orders_process SET gate_login_view_status='2'  WHERE id='" .$order_id. "'");


}








 public function check_kg_order()
 {
 
     $form_data = json_decode(file_get_contents("php://input"));
     $id=$form_data->id;
     $result= $this->Main_model->where_names('all_ledgers','id',$id);
     foreach ($result as  $value) 
     {

                        $order_no = $value->order_no;
                       


     }


        $whereview .= " AND ps.uom='Kg' AND a.order_no='".$order_no."'";
        $query = $this->db->query("SELECT a.* FROM orders_process as a  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0  $whereview  GROUP BY a.id ORDER BY a.id");
         $results = $query->result();
         $status=1;
         if(count($results)>0)
         {

                foreach ($results as $values) 
                {
                    

                        if($values->convertion==2)
                        {
                            $status=1;
                        }
                        else
                        {
                            $status=0;
                        }


                }


         }

        $myData = array('status' => $status);
        echo json_encode($myData);
       

 }






     public function fetch_data_production_order_by_print_files() 
     {





        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        $convert = $_GET['convert'];
        $status = $_GET['status'];

        $cancelid = $_GET['cancelid'];
          $order_no1 = $_GET['order_no1'];
         $order_no2 = $_GET['order_no2'];


         $from_date = $_GET['from_date'];
        if($from_date!='')
        {


            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

         }
         else
         {

               $from_date =  date('Y-m-d');
               $to_date = date('Y-m-d');

         }


       
          $status=0;
           if(isset($_GET['status_ssd']))
           {
                 $status=$_GET['status_ssd'];
           }

         

         $sqlstatuss = '';
         if($cancelid=='0')
         {

             if($order_no1=='')
             {
                 $sqlstatuss .= ' AND a.create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND a.order_base NOT IN ("22","-1")';
             }
             else
             {
                 $sqlstatuss .= ' AND   a.order_base NOT IN ("22","-1")';
             }


         }
         else
         {
             $cancelid=-1;
             $sqlstatuss .= ' AND  a.order_base=' . $cancelid;
         }



      
        if($order_no1>0)
        {




             if($order_no1>0 && $order_no2>0)
             {

                  $sqlstatuss .= ' AND  a.create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND a.count BETWEEN "'.$order_no1 .'" AND "'.$order_no2 .'"';

             }
             else
             {

                  $sqlstatuss .= ' AND  a.count="'.$order_no1 .'"';

             }

                
           

        }

           if($status=='1')
        {
            $sqlstatuss .= ' AND   a.SSD_check=' . $status;
        }


      
        
        $order_id = $_GET['order_id'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT a.* FROM $tablenamemain as a JOIN  $tablename_sub as b ON a.id=b.order_id WHERE   a.deleteid=0  AND  b.deleteid=0  AND b.product_id>0 AND b.reference_image!=''   $sqlstatuss GROUP BY a.id ORDER BY a.id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs)
        {
            $customer_id = $valuecs->customer_id;
            $company_name="";
            $customer_id_list = $this->Main_model->where_names('customers', 'id', $customer_id);
            foreach ($customer_id_list as $csvals)
            {
                  
                  $company_name=$csvals->company_name;
                  $sales_team_id=$csvals->sales_team_id;
                  


            }

              $sales_name = "";
            $sales_phone="";
            $sales_team_id = $this->Main_model->where_names('admin_users', 'id', $valuecs->user_id);
            foreach ($sales_team_id as $val) {
                $sales_name = $val->name;
                $sales_phone = $val->phone;
            }



$subarray=array();
$k=1;
  $result = $this->db->query("SELECT * FROM $tablename_sub WHERE order_id='" . $valuecs->id . "' AND  deleteid=0  ORDER BY product_id,sort_id ASC");
        $result = $result->result();



         foreach ($result as $valuess) {
             $product_ids[]=$valuess->product_id;
             
        }

$product_ids_set=array_unique($product_ids);
            $product_ids_set=implode(',',$product_ids_set);
        $product_ids_set=explode(',',$product_ids_set);


        foreach ($result as $value) 
        {
            $amountdata = $value->rate * $value->qty;
            $amount = $amountdata + $value->commission;
            $description = "";
            $product_name = "";


                
            
            for ($i=0; $i <count($product_ids_set); $i++)
            { 
                
                if($i % 2 == 0) 
                {
                          $color_style ="";
                        if($product_ids_set[$i]==$value->product_id)
                        {
                            $color_style ="gray";
                        }
                        
                         
                }



            }





$product_name_sub="";
  $product_list = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list as $csval) {
                
                $product_name_sub = $csval->product_name;

               
               $colors_sub=$csval->color.' '.$csval->thickness.' '.$csval->brand;









               
            }




            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;
                $product_name = $csval->product_name;



$uomstatus = $csval->uom;




                if($csval->categorie_type!='')
               {
                   $product_name = $csval->categorie_type.' '.$csval->material_type;
               }
               else
               {
                  $product_name = $csval->product_name;
               }
                

               



              // $colors=$csval->color.' '.$csval->thickness.' '.$csval->brand;
  $colors=$csval->color.' '.$csval->thickness.' '.$csval->coating_mass.' '.$csval->yield_strength.' '.$csval->brand;



                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                } 
                elseif ($categories_id == '591') {
                    $cate_status = 1;
                }
                else {
                    $cate_status = 0;
                }
            }




 $additional_information = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');

            $same = 0;
            
            $qty = 0;
            if ($convert == 1) {
                $qty = round($value->qty, 4);
            }
            if ($convert == 2) {
                $qty = round($value->Sqr_feet_to_Meter, 4);
            }
            if ($convert == 3) {
                $qty = round($value->qty, 4);
            }
            if ($convert == 'undefined') {
                $qty = round($value->qty, 4);
            }
            if ($convert == 4) {
                $qty = round($value->profile * $value->nos * 304.8, 4);
            }
            if ($convert == 5) {
                $qty = round($value->profile * $value->nos / 3.2808, 4);
            }
            if ($convert == 6) {
                $qty = round($value->profile * $value->nos * 12, 4);
            }
            if ($value->proudtcion_no_val == 0 || $value->proudtcion_no_val == '') {
                $proudtcion_no_val = $value->nos;
                $cmp_no = 0;
            } else {
                $cmp_no = $value->proudtcion_no_val;
                $proudtcion_no_val = $value->nos - $value->proudtcion_no_val;
            }
            $imagestatus = 1;
            if ($value->reference_image == '') {
                $imagestatus = 0;
            }
            if ($value->gst == '') {
                $value->gst = $gst;
            }


            if($value->nos>0)
            {
                
            }
            else
            {
                $value->nos=$value->qty;
            }
             
             
             $crimp=0;
             if($value->crimp>0)
             {
                $crimp=$value->crimp;
             }

              $conversion=$value->profile+$crimp;
            $meconversion=$value->profile+$crimp;
            $profile=$value->profile;
            $crimp=$value->crimp;
            if($value->uom=='4')
            {
                     
                      $conversion=$value->profile+$crimp;
                        
                      $meconversion=$conversion/1000;
                   

                    $profile=$value->profile;
                    $profile=$profile/304.8;

                     $crimp=$value->crimp;
                     $crimp=$crimp/304.8;

                      


            }

            if($value->uom=='3')
            {

                       $length_data= $value->profile+$crimp;
                       
                       $conversion=$length_data*304.8;
                       $meconversion=$length_data/3.281;

                       $profile=$value->profile;
                        $crimp=$value->crimp;



            }


            if($value->uom=='5')
            {          
                       $length_data= $value->profile+$crimp;
                      
                       $conversion=$length_data*1000;

                       $meconversion= $value->profile+$crimp;


                      $profile=$value->profile;
                      $profile=$profile*3.281;

                      $crimp=$value->crimp;
                      $crimp=$crimp*3.281;



            }

            if($value->uom=='6')
            {

                      $length_data= $value->profile+$crimp;
                     

                      $conversion=$length_data*25.4;
                      $meconversion=$length_data/39.37;


                      $profile=$value->profile;
                      $profile=$profile/12;


                      $crimp=$value->crimp;
                      $crimp=$crimp/12;



            }






             $reference_image="";
             if($value->reference_image!="")
             {
                  $reference_image=base_url().$value->reference_image; 
             }
                

          
             
           if($value->reference_image!='')
           {


           $subarraydata=array();
            foreach ($additional_information as $vl)
            {
                        $label_name = strtolower($vl->label_name);

                       
                        if($value->$label_name!='')
                        {



                        $subarraydata[] =ucfirst($label_name) .' : '.$value->$label_name;


                        }

                        
            }


           $subvalues= implode(' , ', $subarraydata);
          

if($uomstatus=='Nos')
              {
                     $value->nos=$value->qty;
              }

$uom_image='';

                if($value->uom_image=='6')
            {
                $uom_image='INCH';
            }
            if($value->uom_image=='3')
            {
                $uom_image='FEET';
            }
            if($value->uom_image=='4')
            {
                $uom_image='MM';
            }
            if($value->uom_image=='5')
            {
                $uom_image='MTR';
            }
            


            $subarray[] = array('no' => $k, 'id' => $value->id,
             'same' => $same, 
             'imagestatus' => $imagestatus,
              'subvalues' => $subvalues,
              'uom_image' => $uom_image,
              'order_id' => $value->order_id,
               'labelid' => $value->labelid,
                'order_no' => $value->order_no,
                'reason' => $value->reason,
                 'type' => $type,
                  'product_name_tab' => $product_name,
                  'colors' => $colors,
                   'categories' => $categories,
                    'description' => $description,
                     'color_style'=>$color_style,
                     'product_id' => $value->product_id,
                      'tile_material_name' => $value->tile_material_name,
                       'tile_material_id' => $value->tile_material_id,
                        'categories_id' => $value->categories_id, 
                        'profile_tab' => round($profile,3),
                         'crimp_tab' =>  round($crimp,3), 
                         'dim_two' => $value->dim_two, 
                         'dim_one' => $value->dim_one,
                          'dim_three' => $value->dim_three,
                          'reference_image' => $reference_image,
                           'image_length' => $value->image_length, 
                           'product_name_sub' => $product_name_sub, 
                           'remarks' => $value->remarks, 
                           'colors_sub' => $colors_sub,
                          'gst' => $value->gst,
                           'gst_check' => $value->gst_check, 
                           'extra_crimp' => $value->extra_crimp, 
                          'back_crimp' => $value->back_crimp, 
                          'checked' => $value->checked, 
                          'nos_tab' => $value->nos, 
                          'unit_tab' => $value->unit,
                           'return_status' => $value->return_status,
                           'fact_tab' => $value->fact,
                            'conversion' => round($conversion), 
                            'meconversion' => round($meconversion,2), 
                           'uom' => $value->uom, 
                           'billing_options' => $value->billing_options,
                            'commission_tab' => $value->commission,
                             'cate_status' => $cate_status, 
                            'categories_id_get' => $categories_id,
                             'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2), 
                             'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                              'rate_tab' => $value->rate,
                               'qty_tab' => round($value->qty,3));
           

            }


            $k++;
        }


          $array[] = array('no' => $i, 
            'company_name' => $company_name, 
             'sales_name'=>$sales_name,
            'sales_phone'=>$sales_phone,
            'order_no' => $valuecs->order_no,
            'delivery_date_time' => $valuecs->delivery_date_time,
            'SSD_check' => $valuecs->SSD_check,
            'excess_payment_status' => $valuecs->excess_payment_status,
            'base_id' => base64_encode($valuecs->id),
            'create_date' => date('d-m-Y',strtotime($valuecs->create_date)),
            'subarray' => $subarray
           );




          $i++;
        }



      
        echo json_encode($array);










    }


  
  public function fetch_data_production_order_by_print() 
     {

       
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        $convert = $_GET['convert'];
        $status = $_GET['status'];

        $cancelid = $_GET['cancelid'];

         $order_no1 = $_GET['order_no1'];
         $order_no2 = $_GET['order_no2'];

         $from_date = $_GET['from_date'];
        if($from_date!='')
        {


            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];

         }
         else
         {

               $from_date =  date('Y-m-d');
               $to_date = date('Y-m-d');

         }
           

            $status=0;
           if(isset($_GET['status_ssd']))
           {
                 $status=$_GET['status_ssd'];
           }



         $sqlstatuss = '';
         if($cancelid=='0')
         {

             if($order_no1=='')
             {
                 $sqlstatuss .= ' AND create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND   order_base NOT IN ("22","-1")';
             }
             else
             {
                 $sqlstatuss .= ' AND   order_base NOT IN ("22","-1")';
             }


         }
         else
         {
             $cancelid=-1;
             $sqlstatuss .= ' AND  create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND order_base=' . $cancelid;
         }
        


        if($order_no1>0)
        {

             if($order_no1>0 && $order_no2>0)
             {

                $sqlstatuss .= ' AND create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND count BETWEEN "'.$order_no1 .'" AND "'.$order_no2 .'"';

             }
             else
             {

                  $sqlstatuss .= ' AND  count="'.$order_no1 .'"';

             }

                
           

        }


        if($status=='1')
        {
            $sqlstatuss .= ' AND   SSD_check=' . $status;
        }

      
        
        $order_id = $_GET['order_id'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE   deleteid=0  $sqlstatuss  ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs)
        {
            $customer_id = $valuecs->customer_id;
            $company_name="";
            $customer_id_list = $this->Main_model->where_names('customers', 'id', $customer_id);
            foreach ($customer_id_list as $csvals)
            {
                  
                  $company_name=$csvals->company_name;
                  $sales_team_id=$csvals->sales_team_id;


            }



            $sales_name = "";
            $sales_phone="";
            $sales_team_id = $this->Main_model->where_names('admin_users', 'id', $valuecs->user_id);
            foreach ($sales_team_id as $val) {
                $sales_name = $val->name;
                $sales_phone = $val->phone;
            }

$subarray=array();
$product_ids=array();


$k=1;
  $result = $this->db->query("SELECT * FROM $tablename_sub WHERE order_id='" . $valuecs->id . "' AND  deleteid=0 AND product_id>0  ORDER BY categories_id,sort_id ASC");
        $result = $result->result();


         foreach ($result as $valuess) {
             $product_ids[]=$valuess->product_id;
             
        }

        $product_ids_set=array_unique($product_ids);
         $product_ids_set=implode(',',$product_ids_set);
        $product_ids_set=explode(',',$product_ids_set);



        foreach ($result as $value) {
            $amountdata = $value->rate * $value->qty;
            $amount = $amountdata + $value->commission;
            $description = "";
            $product_name = "";



            $color_style ="";
          
            for ($i=0; $i <count($product_ids_set); $i++)
            { 
                
                if($i % 2 == 0) 
                {

                        if($product_ids_set[$i]==$value->product_id)
                        {
                            $color_style ="gray";
                        }
                        
                         
                }



            }





$product_name_sub="";
  $product_list = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list as $csval) {
                
                $product_name_sub = $csval->product_name;


               $colors_sub=$csval->color.' '.$csval->thickness.' '.$csval->brand;

               
            }




            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;


$uomstatus = $csval->uom;


               

               

               if($csval->categorie_type!='')
               {
                   $product_name = $csval->categorie_type.' '.$csval->material_type;
               }
               else
               {
                  $product_name = $csval->product_name;
               }
                

               



              // $colors=$csval->color.' '.$csval->thickness.' '.$csval->brand;

  $colors=$csval->color.' '.$csval->thickness.' '.$csval->coating_mass.' '.$csval->yield_strength.' '.$csval->brand;


                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                } 
                elseif ($categories_id == '591') {
                    $cate_status = 1;
                }
                else {
                    $cate_status = 0;
                }
            }



               $additional_information = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');


            $same = 0;

            $qty = 0;
            if ($convert == 1) {
                $qty = round($value->qty, 4);
            }
            if ($convert == 2) {
                $qty = round($value->Sqr_feet_to_Meter, 4);
            }
            if ($convert == 3) {
                $qty = round($value->qty, 4);
            }
            if ($convert == 'undefined') {
                $qty = round($value->qty, 4);
            }
            if ($convert == 4) {
                $qty = round($value->profile * $value->nos * 304.8, 4);
            }
            if ($convert == 5) {
                $qty = round($value->profile * $value->nos / 3.2808, 4);
            }
            if ($convert == 6) {
                $qty = round($value->profile * $value->nos * 12, 4);
            }
            if ($value->proudtcion_no_val == 0 || $value->proudtcion_no_val == '') {
                $proudtcion_no_val = $value->nos;
                $cmp_no = 0;
            }
             else {
                $cmp_no = $value->proudtcion_no_val;
                $proudtcion_no_val = $value->nos - $value->proudtcion_no_val;
            }
            $imagestatus = 1;
            if ($value->reference_image == '') {
                $imagestatus = 0;
            }
            if ($value->gst == '') {
                $value->gst = $gst;
            }


            if($value->nos>0)
            {
                
            }
            else
            {
                $value->nos=$value->qty;
            }
             
             
             $crimp=0;
             if($value->crimp>0)
             {
                $crimp=$value->crimp;
             }

              $conversion=$value->profile+$crimp;
            $meconversion=$value->profile+$crimp;
            $profile=$value->profile;
            $crimp=$value->crimp;
            if($value->uom=='4')
            {
                     
                      $conversion=$value->profile+$crimp;
                        
                      $meconversion=$conversion/1000;
                   

                    $profile=$value->profile;
                    $profile=$profile/304.8;

                     $crimp=$value->crimp;
                     $crimp=$crimp/304.8;

                      


            }

            if($value->uom=='3')
            {

                       $length_data= $value->profile+$crimp;
                       
                       $conversion=$length_data*304.8;
                       $meconversion=$length_data/3.281;

                       $profile=$value->profile;
                        $crimp=$value->crimp;



            }


            if($value->uom=='5')
            {          
                       $length_data= $value->profile+$crimp;
                      
                       $conversion=$length_data*1000;

                       $meconversion= $value->profile+$crimp;


                      $profile=$value->profile;
                      $profile=$profile*3.281;

                      $crimp=$value->crimp;
                      $crimp=$crimp*3.281;



            }

            if($value->uom=='6')
            {

                      $length_data= $value->profile+$crimp;
                     

                      $conversion=$length_data*25.4;
                      $meconversion=$length_data/39.37;


                      $profile=$value->profile;
                      $profile=$profile/12;


                      $crimp=$value->crimp;
                      $crimp=$crimp/12;



            }




             


             $reference_image="";
             if($value->reference_image!="")
             {
                  $reference_image=base_url().$value->reference_image; 
             }

            $subarraydata=array();
            foreach ($additional_information as $vl)
            {
                        $label_name = strtolower($vl->label_name);

                       
                        if($value->$label_name!='')
                        {



                        $subarraydata[] =ucfirst($label_name) .' : '.$value->$label_name;


                        }

                        
            }


           $subvalues= implode(' , ', $subarraydata);
            



              if($uomstatus=='Nos')
              {
                     $value->nos=$value->qty;
              }
         
$uom_image='';

             if($value->uom_image=='6')
            {
                $uom_image='INCH';
            }
            if($value->uom_image=='3')
            {
                $uom_image='FEET';
            }
            if($value->uom_image=='4')
            {
                $uom_image='MM';
            }
            if($value->uom_image=='5')
            {
                $uom_image='MTR';
            }
            


            $subarray[] = array(
                'no' => $k, 
                'id' => $value->id,
                'uom_image' => $uom_image,
                'subvalues' => $subvalues,
                'same' => $same, 
                'imagestatus' => $imagestatus,
                'order_id' => $value->order_id,
                'labelid' => $value->labelid,
                'order_no' => $value->order_no,
                 'color_style'=>$color_style,
                 'reason' => $value->reason,
                 'type' => $type,
                  'product_name_tab' => $product_name,
                  'colors' => $colors,
                   'categories' => $categories,
                    'description' => $description,
                     'product_id' => $value->product_id,
                      'tile_material_name' => $value->tile_material_name,
                       'tile_material_id' => $value->tile_material_id,
                        'categories_id' => $value->categories_id, 
                         'remarks' => $value->remarks, 
                        'profile_tab' => round($profile,3),
                         'crimp_tab' => round($crimp,3), 
                         'dim_two' => $value->dim_two, 
                         'dim_one' => $value->dim_one,
                          'dim_three' => $value->dim_three,
                          'reference_image' => $reference_image,
                           'image_length' => $value->image_length, 
                           'product_name_sub' => $product_name_sub, 
                            'colors_sub' => $colors_sub, 
                          'gst' => $value->gst,
                           'gst_check' => $value->gst_check, 
                           'extra_crimp' => $value->extra_crimp, 
                          'back_crimp' => $value->back_crimp, 
                          'checked' => $value->checked, 
                          'nos_tab' => $value->nos, 
                          'unit_tab' => $value->unit,
                           'return_status' => $value->return_status,
                           'fact_tab' => $value->fact,
                            'conversion' => round($conversion), 
                            'meconversion' => round($meconversion,2), 
                           'uom' => $value->uom, 
                           'billing_options' => $value->billing_options,
                            'commission_tab' => $value->commission,
                             'cate_status' => $cate_status, 
                            'categories_id_get' => $categories_id,
                             'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2), 
                             'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                              'rate_tab' => $value->rate,
                               'qty_tab' => round($value->qty,3));









            $k++;
        }



       











          $array[] = array('no' => $i, 
            'company_name' => $company_name, 
            'sales_name'=>$sales_name,
            'sales_phone'=>$sales_phone,
            'order_no' => $valuecs->order_no,
            'delivery_date_time' => $valuecs->delivery_date_time,
            'SSD_check' => $valuecs->SSD_check,
            'excess_payment_status' => $valuecs->excess_payment_status,
            'base_id' => base64_encode($valuecs->id),
            'create_date' => date('d-m-Y',strtotime($valuecs->create_date)),
            'subarray' => $subarray
           );




          $i++;
        }



      
        echo json_encode($array);
    }


  public function enquiries_list_new()
  {


    if (isset($this->session->userdata['logged_in'])) {
      $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
      $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
      $neworder_id = 1;


      $order_last_count = $this->Main_model->order_last_count('orders');
      foreach ($order_last_count as $r) {
        $neworder_id = $r->id + 1;
      }

      $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'deleteid', 0, 'access', 12, 'id', 'ASC');

      $data['neworder_id'] = base64_encode($neworder_id);
      $data['title'] = 'Enquiry List';
      $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
      $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
      $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
      $this->load->view('order_check/enquiries_list_new', $data);
    } else {
      $this->load->view('admin/index');
    }
  }

  public function fetch_data_table_new()
  {
   
    // $tablename = $_GET['tablename'];
    $order_base = $_GET['order_base'];
    $formdate = $_GET['from_date'] ? $_GET['from_date'] : date('Y-m-d');
    $to_date = $_GET['to_date'];
    $sales_team = $_GET['sales_team'];
    $slQuerya = '';
    $slQueryo = '';
    $slQueryop = '';
    if($sales_team != 'All'){
      $slQuerya = "  AND a.user_id='".$sales_team."' ";
      $slQueryo = "  AND o.user_id='".$sales_team."' ";
      $slQueryop = "  AND op.user_id='".$sales_team."' ";
    }
 
    $array = [];
    
if($order_base == 'old_convert'){
  //today_old_convert
  $today_oldconverttotal=$this->db->query("SELECT op.*, ad.username as order_by , oo.create_date as enquiry_date, oo.create_time as enquiry_time, o.create_date as quotation_date, o.create_time as quotation_time  FROM orders_process op LEFT JOIN orders_quotation o ON o.id = op.move_id  LEFT JOIN orders oo ON oo.id = o.move_id LEFT JOIN admin_users ad ON ad.id = op.user_id WHERE o.order_base > 0 AND op.order_base > 0 AND o.deleteid=0 AND op.create_date = '".$formdate."' AND oo.create_date < '".$formdate."' $slQueryo ");
  $today_oldconverttotal=$today_oldconverttotal->result();
  $today_old_convert_orderProcess=count($today_oldconverttotal);
  $array = array(
    'enq_count' => 0,
    'quot_count' => 0,
    'order_count' => $today_old_convert_orderProcess,
    
    'enquiries' => [],
    'orders' => $today_oldconverttotal,
    'quotations' => [],
    );


}elseif($order_base == 'today_total'){
  //today_old_convert
  $today_oldconverttotals=$this->db->query("SELECT op.*, ad.username as order_by   FROM orders op  LEFT JOIN admin_users ad ON ad.id = op.user_id   WHERE  op.create_date = '".$formdate."' AND op.deleteid=0 $slQueryop ");
  $today_oldconverttotals=$today_oldconverttotals->result();
  $today_old_convert_orderProcesss=count($today_oldconverttotals);
  $array = array(
    'enq_count' => $today_old_convert_orderProcesss,
    'quot_count' => 0,
    'order_count' => 0,
    
    'enquiries' => $today_oldconverttotals,
    'orders' => [],
    'quotations' => [],
    );


} elseif($order_base == 'today_bills'){
  //today_old_convert
  $today_oldconverttotals=$this->db->query("SELECT op.*, ad.username as order_by  , oo.create_date as enquiry_date, oo.create_time as enquiry_time, o.create_date as quotation_date, o.create_time as quotation_time FROM orders_process op LEFT JOIN orders_quotation o ON o.id = op.move_id  LEFT JOIN orders oo ON oo.id = o.move_id  LEFT JOIN admin_users ad ON ad.id = op.user_id   WHERE  op.create_date = '".$formdate."' AND op.deleteid=0 $slQueryop ");
  $today_oldconverttotals=$today_oldconverttotals->result();
  $today_old_convert_orderProcesss=count($today_oldconverttotals);
  $array = array(
    'enq_count' => 0,
    'quot_count' => 0,
    'order_count' => $today_old_convert_orderProcesss,
    
    'enquiries' => [],
    'orders' => $today_oldconverttotals,
    'quotations' => [],
    );


}  elseif($order_base == 'today_convert'){

  $today_oldconverttotal=$this->db->query("SELECT op.*, ad.username as order_by , oo.create_date as enquiry_date, oo.create_time as enquiry_time, o.create_date as quotation_date, o.create_time as quotation_time  FROM orders_process op  LEFT JOIN admin_users ad ON ad.id = op.user_id  LEFT JOIN orders_quotation o ON o.id = op.move_id LEFT JOIN orders oo ON oo.id = o.move_id WHERE o.order_base > 0 AND op.order_base > 0 AND o.deleteid=0 AND op.create_date = '".$formdate."' AND o.create_date = '".$formdate."' AND oo.create_date = '".$formdate."' $slQueryo ");
  $today_oldconverttotal=$today_oldconverttotal->result();
  $today_old_convert_orderProcess=count($today_oldconverttotal);


   //today_convert
  //  $today_convetedtotal=$this->db->query("SELECT op.*  FROM orders_process op WHERE op.deleteid = 0 $slQueryop AND  op.create_date = '".$formdate."'  ");
  //  $today_convetedtotal=$today_convetedtotal->result();
  //  $today_old_convert_orderProcess=count($today_convetedtotal);
 $array = array(
    'enq_count' => 0,
    'quot_count' => 0,
    'order_count' => $today_old_convert_orderProcess,
    
    'enquiries' => [],
    'orders' => $today_oldconverttotal,
    'quotations' => [],
    );

    // $today_old_convert_orderProcess=$today_old_convert_orderProcess + $today_old_convert_orderProcess;


}elseif($order_base == 'pending'){
   //today_pending
   $today_billingpending=$this->db->query("SELECT * , ad.username as order_by  FROM orders a  LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE  a.order_base IN ('3','5','-4' ,'0') AND a.deleteid=0 AND create_date = '".$formdate."' $slQuerya ")->result();
   $today_billingpending2=$this->db->query("SELECT *, ad.username as order_by   FROM orders_quotation a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base IN ('3','5','-4' ,'0') AND a.deleteid=0 AND create_date = '".$formdate."' $slQuerya ")->result();
    $today_pendingOrders=count($today_billingpending);
    $today_pendingQuotes=count($today_billingpending2);

    $array = array(
      'enq_count' => $today_pendingOrders,
      'quot_count' => $today_pendingQuotes,
      'order_count' => 0,
      
      'enquiries' => $today_billingpending,
      'orders' => [],
      'quotations' => $today_billingpending2,
      );
  

}elseif($order_base == 'missing'){
  //today_missed
  $today_totalmissedQuery=$this->db->query("SELECT  * , ad.username as order_by  FROM orders a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE  a.order_base = '-2' AND a.deleteid=0 AND a.missed_date = '".$formdate."' AND a.create_date  = '".$formdate."' $slQuerya ")->result();
  $today_totalmissedQuery2=$this->db->query("SELECT  * , ad.username as order_by  FROM orders_quotation a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE  a.order_base = '-2' AND a.deleteid=0 AND a.missed_date = '".$formdate."' AND a.create_date  = '".$formdate."'  $slQuerya ")->result();
  $today_missedOrders =count($today_totalmissedQuery);
  $today_missedQuotes = count($today_totalmissedQuery2);

  $array = array(
    'enq_count' => $today_missedOrders,
    'quot_count' => $today_missedQuotes,
    'order_count' => 0,
    
    'enquiries' => $today_totalmissedQuery,
    'orders' => [],
    'quotations' => $today_totalmissedQuery2,
    );

}elseif($order_base == 'cancel'){
  //today_cancel
  $today_totalcancelQuery=$this->db->query("SELECT  * , ad.username as order_by  FROM orders a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base = '-1' AND a.cancelled_date = '".$formdate."' AND  a.create_date  = '".$formdate."' AND  a.deleteid='0'  $slQuerya  ")->result();
  $today_totalcancelQuery2=$this->db->query("SELECT  * , ad.username as order_by  FROM orders_quotation a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base = '-1' AND a.cancelled_date = '".$formdate."' AND  a.create_date  = '".$formdate."' AND a.deleteid='0'  $slQuerya  ")->result();
  $today_cancelOrders=count($today_totalcancelQuery);
  $today_cancelQuotes=count($today_totalcancelQuery2);

  $array = array(
    'enq_count' => $today_cancelOrders,
    'quot_count' => $today_cancelQuotes,
    'order_count' => 0,
    
    'enquiries' => $today_totalcancelQuery,
    'orders' => [],
    'quotations' => $today_totalcancelQuery2,
    );
}elseif($order_base == 'pending_missing'){
  //today old pendings -> missing
  $today_totaloldmissedQuery=$this->db->query("SELECT  * , ad.username as order_by  FROM orders a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base = '-2' AND a.create_date < '".$formdate."' AND  a.missed_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->result();
  $today_totaloldmissedQuery2=$this->db->query("SELECT  * , ad.username as order_by  FROM orders_quotation a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base = '-2' AND a.create_date < '".$formdate."' AND  a.missed_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->result();
  $today_pending_missedOrders=count($today_totaloldmissedQuery);
  $today_pending_missedQuotes=count($today_totaloldmissedQuery2);

  $array = array(
    'enq_count' => $today_pending_missedOrders,
    'quot_count' => $today_pending_missedQuotes,
    'order_count' => 0,
    
    'enquiries' => $today_totaloldmissedQuery,
    'orders' => [],
    'quotations' => $today_totaloldmissedQuery2,
    );
}elseif($order_base == 'pending_cancel'){
 //today old pendings -> cancel
 $today_totaloldcancelQuery= $this->db->query("SELECT  * , ad.username as order_by  FROM orders a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE a.order_base = '-1' AND a.create_date < '".$formdate."' AND  a.cancelled_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->result();
 $today_totaloldcancelQuery2= $this->db->query("SELECT  * , ad.username as order_by  FROM orders_quotation a LEFT JOIN admin_users ad ON ad.id = a.user_id  WHERE  a.order_base = '-1' AND a.create_date < '".$formdate."' AND  a.cancelled_date = '".$formdate."' AND a.deleteid='0'  $slQuerya ")->result();
 $today_pending_cancelOrders=count($today_totaloldcancelQuery);
 $today_pending_cancelQuotes=count($today_totaloldcancelQuery2);

 $array = array(
  'enq_count' => $today_pending_cancelOrders,
  'quot_count' => $today_pending_cancelQuotes,
  'order_count' => 0,
  
  'enquiries' => $today_totaloldcancelQuery,
  'orders' => [],
  'quotations' => $today_totaloldcancelQuery2,
  );
}else{
    //today order convert -> cancel
    $today_totalordercancelQuery=$this->db->query("SELECT op.* , ad.username as order_by , oo.create_date as enquiry_date, oo.create_time as enquiry_time, o.create_date as quotation_date, o.create_time as quotation_time   FROM orders_process op LEFT JOIN orders_quotation o ON o.id = op.move_id  LEFT JOIN orders oo ON oo.id = o.move_id  LEFT JOIN admin_users ad ON ad.id = op.user_id  WHERE  op.order_base = -1 AND o.deleteid=0  AND op.cancelled_date = '".$formdate."'  $slQueryop ");
    $today_totalordercancelQuery=$today_totalordercancelQuery->result();
    $today_converted_cancelOrderProcess=count($today_totalordercancelQuery);

    $array = array(
      'enq_count' => 0,
      'quot_count' => 0,
      'order_count' => $today_converted_cancelOrderProcess,
      
      'enquiries' => [],
      'orders' => $today_totalordercancelQuery,
      'quotations' => [],
      );
}
 
 

   
 
   
     
    echo json_encode($array);
       
  }
  public function getcount_list_new()
  {
   
    $tablename = $_GET['tablename'];
    $formdate = $_GET['from_date'] ? $_GET['from_date'] : date('Y-m-d');
    $to_date = $_GET['to_date'];
    $sales_team = $_GET['sales_team'];
    $slQuerya = '';
    $slQueryo = '';
    $slQueryop = '';
    if($sales_team != 'All'){
      $slQuerya = "  AND a.user_id='".$sales_team."' ";
      $slQueryo = "  AND o.user_id='".$sales_team."' ";
      $slQueryop = "  AND op.user_id='".$sales_team."' ";
    }
 
    
 
 
    ///Today's - today_count
    $today_resultoverall=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders as a WHERE a.deleteid='0' $slQuerya AND a.create_date = '".$formdate."' ");
    $today_resultoverall=$today_resultoverall->row();
    $today_count=$today_resultoverall->totalcount ;

    //today_old_convert
    $today_oldconverttotal=$this->db->query("SELECT COUNT(o.id) as totalcount  FROM orders_process op LEFT JOIN orders_quotation o ON o.id = op.move_id WHERE o.order_base > 0 AND op.order_base > 0 AND o.deleteid=0 AND op.create_date = '".$formdate."' AND o.create_date < '".$formdate."' $slQueryo ");
    $today_oldconverttotal=$today_oldconverttotal->row();
    $today_old_convert=$today_oldconverttotal->totalcount;
 
     //today_convert
    $today_convetedtotal=$this->db->query("SELECT COUNT(op.id) as totalcount  FROM orders_process op WHERE op.deleteid = 0 $slQueryop AND  op.create_date = '".$formdate."'  ");
    $today_convetedtotal=$today_convetedtotal->row();
    $today_convert=$today_convetedtotal->totalcount - $today_old_convert;
 


    $today_billing=$today_convert + $today_old_convert;
 
    
       
    //today_pending
    $today_billingpending=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders a WHERE  a.order_base IN ('3','5','-4' ,'0') AND a.deleteid=0 AND create_date = '".$formdate."' $slQuerya ")->row();
    $today_billingpending2=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_quotation a WHERE a.order_base IN ('3','5','-4' ,'0') AND a.deleteid=0 AND create_date = '".$formdate."' $slQuerya ")->row();
     $today_pending=$today_billingpending->totalcount + $today_billingpending2->totalcount;
    //  $today_pending=$today_billingpending->totalcount ;
 
    //today_missed
    $today_totalmissedQuery=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders a WHERE  a.order_base = '-2' AND a.deleteid=0 AND a.missed_date = '".$formdate."' AND a.create_date  = '".$formdate."' $slQuerya ")->row();
    $today_totalmissedQuery2=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_quotation a WHERE  a.order_base = '-2' AND a.deleteid=0 AND a.missed_date = '".$formdate."' AND a.create_date  = '".$formdate."'  $slQuerya ")->row();
    $today_missed=$today_totalmissedQuery->totalcount + $today_totalmissedQuery2->totalcount;
    // $today_missed=$today_totalmissedQuery->totalcount  ;
 
  //today_cancel
  $today_totalcancelQuery=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders a WHERE a.order_base = '-1' AND a.cancelled_date = '".$formdate."' AND  a.create_date  = '".$formdate."' AND  a.deleteid='0'  $slQuerya  ")->row();
  $today_totalcancelQuery2=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_quotation a WHERE a.order_base = '-1' AND a.cancelled_date = '".$formdate."' AND  a.create_date  = '".$formdate."' AND a.deleteid='0'  $slQuerya  ")->row();
  $today_cancel=$today_totalcancelQuery->totalcount + $today_totalcancelQuery2->totalcount;
  // $today_cancel=$today_totalcancelQuery->totalcount  ;
 

    //today old pendings -> missing
    $today_totaloldmissedQuery=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders a WHERE a.order_base = '-2' AND a.create_date < '".$formdate."' AND  a.missed_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->row();
    $today_totaloldmissedQuery2=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_quotation a WHERE a.order_base = '-2' AND a.create_date < '".$formdate."' AND  a.missed_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->row();
    $today_pending_missed=$today_totaloldmissedQuery->totalcount + $today_totaloldmissedQuery2->totalcount;
    // $today_pending_missed=$today_totaloldmissedQuery->totalcount ;
 
     //today old pendings -> cancel
     $today_totaloldcancelQuery= $this->db->query("SELECT COUNT(id) as totalcount  FROM orders a WHERE a.order_base = '-1' AND a.create_date < '".$formdate."' AND  a.cancelled_date = '".$formdate."' AND a.deleteid='0' $slQuerya ")->row();
     $today_totaloldcancelQuery2= $this->db->query("SELECT COUNT(id) as totalcount  FROM orders_quotation a WHERE  a.order_base = '-1' AND a.create_date < '".$formdate."' AND  a.cancelled_date = '".$formdate."' AND a.deleteid='0'  $slQuerya ")->row();
     $today_pending_cancel=$today_totaloldcancelQuery->totalcount + $today_totaloldcancelQuery2->totalcount;
    //  $today_pending_cancel=$today_totaloldcancelQuery->totalcount;
 

       //today order convert -> cancel
      $today_totalordercancelQuery=$this->db->query("SELECT COUNT(o.id) as totalcount  FROM orders_process op LEFT JOIN orders_quotation o ON o.id = op.move_id WHERE  op.order_base = -1 AND o.deleteid=0  AND op.cancelled_date = '".$formdate."'  $slQueryop ");
       $today_totalordercancelQuery=$today_totalordercancelQuery->row();
       $today_converted_cancel=$today_totalordercancelQuery->totalcount;
 
    $array = array(
      'today_total' =>$today_count,
      'today_pending' =>$today_pending,
      'today_missing' =>$today_missed,
      'today_cancelled' =>$today_cancel,
      'today_bills' =>$today_billing,
      'today_old_convert' =>$today_old_convert,
      'today_pending_missing' =>$today_pending_missed,
      'today_pending_cancel' =>$today_pending_cancel,
      'today_order_cancel' =>$today_converted_cancel,
      'today_converted' =>$today_convert);
     
    echo json_encode($array);
  }
  public function enquiries_list()
  {


    if (isset($this->session->userdata['logged_in'])) {
      $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
      $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
      $neworder_id = 1;


      $order_last_count = $this->Main_model->order_last_count('orders');
      foreach ($order_last_count as $r) {
        $neworder_id = $r->id + 1;
      }

      $data['customers'] = $this->Main_model->where_names_two_order_by('admin_users', 'deleteid', 0, 'access', 12, 'id', 'ASC');

      $data['neworder_id'] = base64_encode($neworder_id);
      $data['title'] = 'Enquiry List';
      $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
      $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
      $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
      $this->load->view('order_check/enquiries_list', $data);
    } else {
      $this->load->view('admin/index');
    }
  }

  public function quotation_list() {
    if (isset($this->session->userdata['logged_in'])) {
        $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
        $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
        $neworder_id = 1;
        $order_last_count = $this->Main_model->order_last_count('orders_quotation');
        foreach ($order_last_count as $r) {
            $neworder_id = $r->id + 1;
        }
        $data['neworder_id'] = base64_encode($neworder_id);
        $data['active_base'] = 'customer_1';
        $data['active'] = 'customer_1';
        $data['title'] = 'Quotation List';
        $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
        $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
        $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
        $this->load->view('order_check/quotation_list', $data);
    } else {
        $this->load->view('admin/index');
    }
}

public function orders_list() 
{


    if (isset($this->session->userdata['logged_in'])) 
    {


        $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
        $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
        $neworder_id = 1;


       $datess=date('Y-m-01');
       $datess2=date('Y-m-t');

       $querycount = $this->db->query("SELECT id,deletemod,deleteid,count(deletemod) FROM `all_ledgers` WHERE party_type=1 AND deleteid=0 AND `payment_date` BETWEEN '".$datess."' AND '".$datess2."' AND order_id!='TR' GROUP BY deletemod HAVING count(deletemod)>1");
        $resultcount = $querycount->result();
        if(count($resultcount)>0)
        {
               foreach ($resultcount as  $svalue) {
                   $deletemod=$svalue->deletemod;
                   if($deletemod!='')
                   {
                    $this->db->query("UPDATE all_ledgers SET deleteid=66  WHERE deletemod='".$deletemod."' AND party_type=1 LIMIT 1");
                   }
              }

        }


       $querycount2 = $this->db->query("SELECT id,deletemod,deleteid,count(deletemod) FROM `all_ledgers` WHERE party_type=2 AND deleteid=0 AND `payment_date` BETWEEN '".$datess."' AND '".$datess2."' AND order_id!='TR' GROUP BY deletemod HAVING count(deletemod)>1");
        $querycount2 = $querycount2->result();
        if(count($querycount2)>0)
        {
               foreach ($querycount2 as  $svalue2) {
                   $deletemod2=$svalue2->deletemod;
                   if($deletemod2!='')
                   {
                    $this->db->query("UPDATE all_ledgers SET deleteid=66  WHERE deletemod='".$deletemod2."' AND party_type=2 LIMIT 1");
                   }
              }

        }


                                          $formdate=date('Y-m-d');
                                          $todate=date('Y-m-d');
                                          
                                         
                                          $lastmonthfrom= date('Y-m-d', strtotime("-1 days"));
                                          $lastmonthto=date('Y-m-d', strtotime("-1 days"));
                                          

$sql="";
                                      if($this->session->userdata['logged_in']['access']=='16')
                                      {
                                                                 
                                                        $sales_group_id=array();         
                                                        $sales_group = $this->Main_model->where_names_two_order_by('sales_group','sales_group_head',$this->userid,'deleteid','0','id','ASC');   
                                                        foreach($sales_group as $val)
                                                        {
                                                            $sales_group_id[]=$val->id;
                                                        }
                                                        
                                                        
                                                        $sales_group_idval="'".implode("','",$sales_group_id)."'";
                                                        $sql=' AND a.sales_group IN ('.$sales_group_idval.')';
                                                      
                                                                 
                                      }
                                      
                                      
                                      if($this->session->userdata['logged_in']['access']=='17')
                                      {
                                                                 
                                                        
                                                        $sql=' AND a.user_id="'.$this->userid.'"';
                                                      
                                                                 
                                      }
                                      
                                      
                                      if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                                      {
                                                                 
                                                            $sales_team_id = array($this->userid);
                                                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                            foreach ($resultsales_team as $values) {
                                                                $sales_team_id[] = $values->sales_member_id;
                                                            }
                                                           
                                                            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                                                           
                                                            $sql = ' AND  a.user_id IN (' . $sales_team_id . ')';
                                                        
                                                                 
                                      }
                                 
                                          
                                          $data['toatalvalue']=0;
                                          $resulttotalsale=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                                          
                                          $resulttotalsale=$resulttotalsale->result();
                                          foreach($resulttotalsale as $totsale)
                                          {
                                               $data['toatalvalue']=round($totsale->toatalvalue+$totsale->tcsamount);
                                          }
                                          
                                          
                                          $data['toatalvaluels']=0;
                                          $resulttotalsalels=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                                          
                                          $resulttotalsalels=$resulttotalsalels->result();
                                          foreach($resulttotalsalels as $totsalels)
                                          {
                                               $data['toatalvaluels']=round($totsalels->toatalvalue+$totsalels->tcsamount);
                                          }
                                          
                                          
                                           $data['toatalvaluedd']=0;
                                           $resulttotalsaledd=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.trip_end_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0  $sql");
                                          
                                          $resulttotalsaledd=$resulttotalsaledd->result();
                                          foreach($resulttotalsaledd as $totsaledd)
                                          {
                                               $data['toatalvaluedd']=round($totsaledd->toatalvalue+$totsaledd->tcsamount);
                                          }
                                          
                                          $data['toatalvaluelsdd']=0;
                                          $resulttotalsalelsdd=$this->db->query("SELECT SUM(a.bill_total) as toatalvalue FROM orders_process as a   WHERE a.trip_end_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0   AND a.order_base>0 $sql");
                                          
                                          $resulttotalsalelsdd=$resulttotalsalelsdd->result();
                                          foreach($resulttotalsalelsdd as $totsalelsdd)
                                          {
                                               $data['toatalvaluelsdd']=round($totsalelsdd->toatalvalue+$totsalelsdd->tcsamount);
                                          }
                                          
                                          
                                          $data['totalcount']=0;
                                          $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base>0 $sql");
                                          $resulttotalcount=$resulttotalcount->result();
                                          foreach($resulttotalcount as $totcount)
                                          {
                                               $data['totalcount']=$totcount->totalcount;
                                          }
                                          
                                          
                                          $data['totalcountlastmonth']=0;
                                          $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                                          $resulttotalcountlm=$resulttotalcountlm->result();
                                          foreach($resulttotalcountlm as $totcountm)
                                          {
                                               $data['totalcountlastmonth']=$totcountm->totalcount;
                                          }
                                          
                                          
                                          $data['totalcountdd']=0;
                                          $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.trip_end_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                                          $resulttotalcount=$resulttotalcount->result();
                                          foreach($resulttotalcount as $totcount)
                                          {
                                               $data['totalcountdd']=$totcount->totalcount;
                                          }
                                         
                                         
                                          $data['totalcountlastmonthdd']=0;
                                          $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM orders_process as a WHERE a.trip_end_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base>0 $sql");
                                          $resulttotalcountlm=$resulttotalcountlm->result();
                                          foreach($resulttotalcountlm as $totcountm)
                                          {
                                               $data['totalcountlastmonthdd']=$totcountm->totalcount;
                                          }
                                         
                                         
        $order_last_count = $this->Main_model->order_last_count('orders_process');
        foreach ($order_last_count as $r) {
            $neworder_id = $r->id + 1;
        }
        $data['neworder_id'] = base64_encode($neworder_id);
        
        
        $data['active_base'] = 'customer_1';
        $data['active'] = 'customer_1';
        $data['title'] = 'Order List';
        $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
        $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
        $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
        $this->load->view('order_check/orders_list', $data);
    } else {
        $this->load->view('admin/index');
    }
}
  public function fetch_data_table()
  {
    $pagenum = $_GET['page'];
    $pagesize = $_GET['size'];
    $offset = ($pagenum - 1) * $pagesize;
    $search = $_GET['search'];
    if (isset($_GET['page_next'])) {
      $offset = $_GET['page_next'];
    }


    $tablename = $_GET['tablename'];
    $order_base = $_GET['order_base'];
    $order_base_val = $_GET['order_base'];
    $where = "";
    $where1 = "";
    $slCond = '';
    if ($_GET['sl'] && $_GET['sl'] != 'ALL') {
      $slCond = ' AND a.user_id = "' . $_GET['sl'] . '" ';
    }

    if ($search == "") {


      if (isset($_GET['from_date'])) {
        if ($_GET['from_date'] != '') {
          if ($order_base == 1 || $order_base == 121) {
            $from_date = $_GET['from_date'];
            $to_date = $_GET['to_date'];
            $where .= " AND a.create_date BETWEEN  '" . $from_date . "' AND '" . $to_date . "'";
          }
        } else {

          if ($order_base == 1) {

            $from_date = date('Y-m-d');
            $to_date = date('Y-m-d');
            $where .= " AND a.create_date BETWEEN  '" . $from_date . "' AND '" . $to_date . "'";
          }
        }
      }
    }


    $sqls = "";


    if ($order_base == 110) {
      $where .= " AND a.paricel_mode=1";
      $order_base = 1;
      $where .= " AND a.order_base = '" . $order_base . "'";
    } elseif ($order_base == 111) {


      $where .= " AND a.full_delivery=1";
      $order_base = 1;
      $where .= " AND a.order_base = '" . $order_base . "'";
    } elseif ($order_base == 156) {

      $where .= " AND a.missing_customer=1";
      $order_base = 1;
      $where .= " AND a.order_base = '" . $order_base . "'";
    } elseif ($order_base == 26) {
      $where .= " AND a.md_approved_status = '1'";
      $order_base = 1;
      $where .= " AND a.order_base = '" . $order_base . "'";
    } elseif ($order_base == 27) {
      $where .= " AND a.md_approved_status = '2'";
      $order_base = 1;
      $where .= " AND a.order_base = '" . $order_base . "'";
    } elseif ($order_base == 28) {
      //$where .= " AND a.md_approved_status = '0'";
      $where .= " AND a.order_base >= '20'";
    } elseif ($order_base == 1) {
      //$where .= " AND a.md_approved_status = '0'";
      $where .= " AND a.order_base >= '1'";
    } elseif ($order_base == 121) {
      //$where .= " AND a.md_approved_status = '0'";
      // $where .= " AND a.order_base >= '1'";

    } else {
      $where .= " AND a.order_base = '" . $order_base . "'";
    }


    if ($search != "") {


      if ($this->session->userdata['logged_in']['access'] != 12) {
        $where .= " AND c.name LIKE '%" . $search . "%'";
        $where .= " OR a.order_no LIKE '%" . $search . "%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
        $where1 .= " AND order_no LIKE '%" . $search . "%'";
      } else {
        $where .= " AND a.order_no LIKE '%" . $search . "%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
        $where1 .= " AND order_no LIKE '%" . $search . "%'";
      }
    }


    $i = 1;
    $array = array();


    if ($this->session->userdata['logged_in']['access'] == '17') {


      $sales_team_id = array($this->userid);
      $poin_to_member = $this->Main_model->where_names('admin_users', 'mark_sales_member', $this->userid);
      foreach ($poin_to_member as $point) {
        $sales_team_id[] = $point->id;
      }

      $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
      $userslog = ' AND  a.entry_user_id IN (' . $sales_team_id . ')';


      $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $resultcount = $querycount->result();
      $count = count($resultcount);


      $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $slCond $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $result = $query->result();
    } elseif ($this->session->userdata['logged_in']['access'] == '20') {


      $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
      $resultcount = $querycount->result();
      $count = count($resultcount);


      $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond  AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $result = $query->result();


      if (count($result) == 0) {


        $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
        $resultcount = $querycount->result();
        $count = count($resultcount);


        $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'   $slCond AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
        $result = $query->result();
      }
    } elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12') {


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
      $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';


      $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond  $userslog $where ORDER BY a.id DESC");
      $resultcount = $querycount->result();
      $count = count($resultcount);


      $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $result = $query->result();
    } elseif ($this->session->userdata['logged_in']['access'] == '16') {


      $sales_team_id = array($this->userid);
      $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='" . $this->userid . "'");
      $resultsales_team = $query->result();
      foreach ($resultsales_team as $values) {
        $sales_team_id[] = $values->id;
      }


      $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
      $userslog = ' AND  a.sales_group IN (' . $sales_team_id . ')';


      $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0' $slCond $userslog $where ORDER BY a.id DESC ");
      $resultcount = $querycount->result();
      $count = count($resultcount);


      $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'   $slCond $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $result = $query->result();
    } else {


      $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0' $slCond $where ORDER BY a.id DESC");
      $resultcount = $querycount->result();
      $count = count($resultcount);


      $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0'  $slCond $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
      $result = $query->result();
    }


    if ($tablename == 'orders') {
      $tablename_sub = "order_product_list";
    }
    if ($tablename == 'orders_quotation') {
      $tablename_sub = "order_product_list_quotation";
    }
    if ($tablename == 'orders_process') {
      $tablename_sub = "order_product_list_process";
    }
    foreach ($result as $value) {


      $order_by = $value->name;


      $company_name = $value->company_name;
      $email = $value->email;
      $phone = $value->phone;


      if ($value->reason == 1) {
        $value->reason = 'Moved';
      }
      if ($value->reason == '-2') {
        $value->reason = 'TL Re-Assigned';
      }


      if ($value->delivery_status == '1') {
        $value->delivery_status = 'Client Scope';
      }

      if ($value->delivery_status == '2') {
        $value->delivery_status = 'Own Scope';
      }


      $delivery_date_time = "";
      if ($tablename == 'orders_process') {


        $delivery_date_time = date('d-m-Y', strtotime($value->delivery_date_time));
      }


      $le_amount = $value->bill_total;
      $discountfulltotal = $value->bill_total;


      $pending_amount = '';
      if ($order_base_val == 111) {


        $resultsub_production = $this->db->query("SELECT SUM(a.qty*a.rate) as totalvalue FROM order_product_list_process as a  WHERE a.deleteid=0 AND a.order_id='" . $value->id . "' AND a.return_status=0 ORDER BY a.id DESC");
        $resultsub_production = $resultsub_production->result();
        $production = 0;
        foreach ($resultsub_production as $val) {

          $production += $val->totalvalue;
        }

        $resultload = $this->db->query("SELECT SUM(qty*rate) as totalvalue FROM sales_load_products  WHERE order_id='" . $value->id . "' AND loadstatus=1 AND delivered_products=1  ORDER BY id ASC");
        $resultload = $resultload->result();
        foreach ($resultload as $valueload) {

          $loadamount = $valueload->totalvalue;
        }
        if ($loadamount > 0) {

          $production = $production - $loadamount;

          if ($production > 0) {

            $pending_amount = 'Partial Pending Amount :' . round($production);
          }
        }
      }


      if ($value->delivery_date_status == 1) {
        $delivery_date_status = 'Date confirmed';
      } else {
        $delivery_date_status = 'Date yet to be confirmed';
      }


      $commission = $value->commission_check + $value->commission_check_fact;


      if ($tablename == 'orders') {

        if ($value->order_base == 0) {


          $date = date('Y-m-d', strtotime("-1 days"));
          $this->db->query("UPDATE orders SET order_base='-3',reason='Archive' WHERE create_date < '" . $date . "' AND bill_total=0 AND order_base=0");
        }
      }


      if ($tablename == 'orders_process') {

        if ($value->order_base == '-1') {

          $this->db->query("UPDATE all_ledgers SET deleteid='1',notes='Cancel Approved Update' WHERE order_id='" . $value->id . "' AND  order_no='" . $value->order_no . "' AND deleteid=0");
        }
      }


      $commision_value = 0;
      if ($value->commission_check == 1) {
        $commision_value = $value->bill_total - $value->bill_total_rate;
      }

      if ($value->commission_check_fact == 1) {
        $commision_value_fact =
          $value->bill_total - $value->bill_total_fact;
        $commision_value = $commision_value_fact;
      }

 if($value->create_date > '2024-05-31'){
                
                $commision_value = round($commision_value * 1.18);
                                $commision_value = round($commision_value);

            } 
      $arr = array('5', '6');

      if (in_array($value->finance_status, $arr)) {

        $querycount = $this->db->query("SELECT * FROM all_ledgers WHERE  order_no='" . $value->order_no . "' AND commission_customer>0  ORDER BY id DESC");
        $resultcount = $querycount->result();
        $countset = count($resultcount);
        if ($countset == 0) {


          $data_address_refer['order_no'] = $value->order_no;
          $data_address_refer['difference'] = 0;
          $data_address_refer['reference_no'] = $value->order_no;
          $data_address_refer['credits'] = round($commision_value, 2);
          $data_address_refer['order_id'] = 0;
          $data_address_refer['customer_id'] = 252;
          $data_address_refer["payment_mode"] = 0;
          $data_address_refer['user_id'] = 1769;
          $data_address_refer['account_head_id'] = 48;
          $data_address_refer['account_heads_id_2'] = 48;
          $data_address_refer['order_trancation_status'] = 0;
          $data_address_refer['bank_id'] = 0;
          $data_address_refer['credits'] = round($commision_value, 2);
          $data_address_refer['debits'] = 0;
          $data_address_refer['collected_amount'] = $commision_value;
          $data_address_refer['payment_date'] = $value->payment_recived_date;
          $data_address_refer['notes'] = 'Order Commission Updated';
          $data_address_refer['process_by'] = 'Order Commission ' . $value->order_no;
          $data_address_refer['commission_customer'] = 1;
          $data_address_refer['sales_team_id'] = $value->sales_team_id;
          $data_address_refer['payment_time'] = $value->payment_recived_time;
          $data_address_refer['party_type'] = 5;
          $data_address_refer['comission_transfered'] = 0;
          $data_address_refer['deletemod'] = 'CMM' . $value->order_no;


          if ($commision_value > 0) {
            $setchek = $this->Main_model->where_names('all_ledgers', 'deletemod', $data_address_refer['deletemod']);
            if (count($setchek) == 0) {

              $insertdatavals = $this->Main_model->insert_commen($data_address_refer, 'all_ledgers');

              $data_address_refer['credits'] = 0;
              $data_address_refer['debits'] = round($commision_value, 2);
              $data_address_refer['collected_amount'] = round($commision_value, 2);
              $data_address_refer['process_by'] = 'Commission Payment Debit Update ' . $value->order_no;
              $data_address_refer['party_type'] = 5;
              $data_address_refer['deletemod'] = 'DPAY_SET_OR' . $insertdatavals;
              $deletemodset = 'DPAY_SET_OR' . $insertdatavals;
              $data_address_refer['comission_transfered'] = 5;
              $data_address_refer['account_head_id'] = 154;
              $data_address_refer['account_heads_id_2'] = 154;
              $result_cmm = $this->Main_model->where_names('all_ledgers', 'deletemod', $deletemodset);
              if (count($result_cmm) == 0) {


                $this->Main_model->insert_commen($data_address_refer, 'all_ledgers');
              }
            }
          } else {


            //$this->db->query("UPDATE all_ledgers SET credits='".round($commision_value,2)."' WHERE order_no='".$value->order_no."' AND commission_customer='1' AND customer_id='252'  AND party_type=1");


          }
        }
      }


      $colorcount = 1;
      if ($tablename == 'orders_process') {

        $getcount = $this->db->query("SELECT count(order_no) as totcount FROM orders_process WHERE  order_no='" . $value->order_no . "' AND deleteid=0");
        $getcount = $getcount->result();

        foreach ($getcount as $st) {
          $colorcount = $st->totcount;
        }
      }


      if ($value->deleteid == 0) {


        if ($value->order_no == 'APR/30') {
          $commision_value = '4231';
        }

        if ($value->payment_mode_old != '') {
          $value->payment_mode = $value->payment_mode_old;
        }
        $newStatus = '';
        $newDate = '';
        if($tablename == 'orders'){
        switch ($value->order_base) {
          case '1':
            $newStatus = 'Just Enquiry';
            break;
          case '-1':
            $newStatus = 'Cancelled Enquiry';
            $newDate = date('d-m-Y', strtotime($value->cancelled_date));

            break;
          case '-2':
            $newStatus = 'Missed Enquiry';
            $newDate = date('d-m-Y', strtotime($value->missed_date));

            break;
          case '-4':
            $newStatus = 'Remaindered Enquiry';
            break;
          case '3':
            $newStatus = '(Req. to TL) - Enquiry';
          case '-3':
            $newStatus = 'Archived Enquiry';
            break;
          case '5':
            $newStatus = '(Req. to MD) - Enquiry';
            break;
          default:
            $newStatus = 'Open Enquiry';
        }
      }

        // if($value->order_base == 1){
        $sql = $this->db->query("SELECT id,order_base,date_modified,create_date,cancelled_date,missed_date FROM orders_quotation  WHERE move_id =  " . $value->id . " ")->row();


        $qBase = $sql->order_base;
        $qMissedDate = $sql->missed_date;
        $qCancelDate = $sql->cancelled_date;
        if($tablename == 'orders_quotation'){
          $qBase = $value->order_base;
          $qMissedDate = $value->missed_date;
          $qCancelDate = $value->cancelled_date;
        }

        if (isset($qBase)) {

          switch ($qBase) {
            case '1':
              $newStatus = 'Just Quotation';
              break;
            case '-1':
              $newStatus = 'Cancelled Quotation ';
              $newDate = date('d-m-Y', strtotime($qCancelDate));

              break;
            case '-2':
              $newStatus = 'Missed Quotation';
              $newDate = date('d-m-Y', strtotime($qMissedDate));

              break;
            case '-4':
              $newStatus = 'Remaindered Quotation';
              break;
            case '3':
              $newStatus = '(Req. to TL) - Quotation';
            case '-3':
              $newStatus = 'Archived Quotation';
              break;
            case '5':
              $newStatus = '(Req. to MD) - Quotation';
              break;
            default:
              $newStatus = 'Open Quotation';
          }
          //  $newStatus = $sql->order_base;
          if(isset($sql->id)){
            $sql2 = $this->db->query("SELECT id,order_base,date_modified,create_date,cancelled_date,missed_date FROM orders_process  WHERE move_id = " . $sql->id . "")->row();
            $oBase = $sql2->order_base;
            $oMissedDate = $sql2->missed_date;
            $oCancelDate = $sql2->cancelled_date;
          }
         
            if($tablename == 'orders_process'){
              $oBase = $value->order_base;
              $oMissedDate = $value->missed_date;
              $oCancelDate = $value->cancelled_date;
            }
          if (isset($oBase)) {

            switch ($oBase) {
              case '1':
                $newStatus = 'Just Order';
                break;
              case '-1':
                $newStatus = 'Cancelled Order';
                $newDate = date('d-m-Y', strtotime($oCancelDate));

                break;
              case '-2':
                $newStatus = 'Missed Order';
                $newDate = date('d-m-Y', strtotime($oMissedDate));

                break;
              case '-4':
                $newStatus = 'Remaindered Order ';
                break;
              case '3':
                $newStatus = '(Req. to TL) - Order';
              case '-3':
                $newStatus = 'Archived Order';
                break;
              case '5':
                $newStatus = '(Req. to MD) - Order';
                break;
              default:
                $newStatus = 'Open Order';
            }
        }
        }
        if ($newDate == '01-01-1970') {
          $newDate = '';
        }
        if($order_base == -1 && $tablename != 'orders_process'){
          if($value->reason == 'Cancelled'){
            $array[] = array('no' => $i, 'delivery_confirm_person' => $value->delivery_confirm_person, 'new_status' => $newStatus, 'new_date' => $newDate, 'delivery_confirm_date_time' => $value->delivery_confirm_date_time, 'finance_status' => $value->finance_status, 'id' => $value->id, 'colorcount' => $colorcount, 'pending_amount' => $pending_amount, 'le_amount' => $le_amount, 'payment_mode' => $value->payment_mode, 'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no, 'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal, 2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time, 'delivery_date' => $delivery_date_time, 'delivery_date_status' => $delivery_date_status);
          }
             
            
        }else{
          $array[] = array('no' => $i, 'delivery_confirm_person' => $value->delivery_confirm_person, 'new_status' => $newStatus, 'new_date' => $newDate, 'delivery_confirm_date_time' => $value->delivery_confirm_date_time, 'finance_status' => $value->finance_status, 'id' => $value->id, 'colorcount' => $colorcount, 'pending_amount' => $pending_amount, 'le_amount' => $le_amount, 'payment_mode' => $value->payment_mode, 'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no, 'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal, 2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time, 'delivery_date' => $delivery_date_time, 'delivery_date_status' => $delivery_date_status);
        }
       
       
      }


      $i++;
    }
    $myData = array('PortalActivity' => $array, 'totalCount' => $count);


    echo json_encode($myData);
  }

  
   function get_fetch_order_list()
  {
     $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        
     
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $order_base_val=$_GET['order_base'];
        $sales_team = $_GET['sales_team'];

        if($sales_team>0)
        {
            $sales_id=$sales_team;
        }
        $where = "";
        $where1 = "";
        

          if($sales_team>0)
           {
                $sales_id=$sales_team;
                $where .= " AND a.user_id='".$sales_id."'";
               // $where1 .= " AND user_id='".$sales_id."'";
           }

        
        if($search == "")
        {
        
        
         if(isset($_GET['from_date'])) 
        {     
            if($_GET['from_date']!='')
            {
                  
                      $from_date = $_GET['from_date'];
                      $to_date = $_GET['to_date'];
                      $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                  
                
            }
            else
            {

                  
                  $from_date = date('Y-m-d');
                  $to_date = date('Y-m-d');
                  $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                  
                 

            }
             
        }

       }
        
        
        $sqls = "";
        
        
        if($order_base==110)
        {
            $where .=" AND a.paricel_mode=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==111)
        {


            $where .=" AND a.full_delivery=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";


        }
        elseif($order_base==156)
        {
            
            $where .=" AND a.missing_customer=1";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==26)
        {
            $where .= " AND a.md_approved_status = '1'";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==27)
        {
            $where .= " AND a.md_approved_status = '2'";
            $order_base=1;
            $where .= " AND a.order_base = '".$order_base."'";
        }
        elseif($order_base==28)
        {
            //$where .= " AND a.md_approved_status = '0'";
            $where .= " AND a.order_base >= '20'";
            
        }
        elseif($order_base==1)
        {
            //$where .= " AND a.md_approved_status = '0'";
            $where .= " AND a.order_base >= '1'";
            
        }
         elseif($order_base==121)
        {
            //$where .= " AND a.md_approved_status = '0'";
            // $where .= " AND a.order_base >= '1'";
            
        }
        else
        {
             $where .= " AND a.order_base = '".$order_base."'";
        }
        
        
        if($search != "")
        {
                   
              
                    if($this->session->userdata['logged_in']['access']!=12)
                    {
                       $where .=" AND c.name LIKE '%" . $search . "%'";
                       $where .= " OR a.order_no LIKE '%" . $search . "%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
                       $where1 .= " AND order_no LIKE '%" . $search . "%'";
                    }
                    else
                    {
                         $where .= " AND a.order_no LIKE '%" . $search . "%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
                         $where1 .= " AND order_no LIKE '%" . $search . "%'";
                    }
                   
                    
        }
        
        
        $i = 1;
        $array = array();
        
        
        if($this->session->userdata['logged_in']['access'] == '17')
        {
                 
                 
                $sales_team_id = array($this->userid);
                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                foreach ($poin_to_member as $point) {
                    $sales_team_id[] = $point->id;
                }
                
                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                $userslog = ' AND  a.entry_user_id IN (' . $sales_team_id . ')';
                
                
                $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
                $resultcount = $querycount->result();
                $count=count($resultcount);
                
                
                $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
                $result = $query->result();
           
            
        }elseif ($this->session->userdata['logged_in']['access'] == '20') {
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
            
            if (count($result) == 0) {
                
                
                $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
                $resultcount = $querycount->result();
                $count=count($resultcount);
                
                
                $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
                $result = $query->result();
            } 
            
            
        }
        elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
        {
            
         
            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }
           
           
            $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
            foreach ($poin_to_member as $point) {
                $sales_team_id[] = $point->id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'   $userslog $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
            
        }
        elseif ($this->session->userdata['logged_in']['access'] == '16') 
        {
           
           
            $sales_team_id = array($this->userid);
            $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.sales_group IN (' . $sales_team_id . ')';
           
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC ");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        else
        {
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0'  $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        
        
        if ($tablename == 'orders') {
            $tablename_sub = "order_product_list";
        }
        if ($tablename == 'orders_quotation') {
            $tablename_sub = "order_product_list_quotation";
        }
        if ($tablename == 'orders_process') {
            $tablename_sub = "order_product_list_process";
        }
        foreach ($result as $value) {
           

            $order_by = $value->name;


            $company_name = $value->company_name;
            $email = $value->email;
            $phone = $value->phone;
        
            
            if ($value->reason == 1) {
                $value->reason = 'Moved';
            }
            if ($value->reason == '-2') {
                $value->reason = 'TL Re-Assigned';
            }
            
            
             if ($value->delivery_status == '1') {
                $value->delivery_status = 'Client Scope';
             }
             
             if ($value->delivery_status == '2') {
                $value->delivery_status = 'Own Scope';
             }


             $delivery_date_time="";
             if($tablename == 'orders_process') 
             {


                          $delivery_date_time=date('d-m-Y', strtotime($value->delivery_date_time));

                           
                          if($this->session->userdata['logged_in']['access']!=12)
                          {

                              if($value->reason_by!='')
                              {
                                   $value->reason=$value->reason_by;
                              }  

                         }
                          


             }
              

           $le_amount=$value->bill_total;
           $discountfulltotal=$value->bill_total;
           $pending_amount='';
           
            
            
             if($value->delivery_date_status==1)
             {
                $delivery_date_status='Date confirmed';
             }
             else
             {
                $delivery_date_status='Date yet to be confirmed';
             }


          $commission=$value->commission_check+$value->commission_check_fact;


         if($tablename=='orders')
         {
                    
                    if($value->order_base==0)
                    {


                    $date=date('Y-m-d',strtotime("-1 days"));
                    $this->db->query("UPDATE orders SET order_base='-3',reason='Archive' WHERE create_date < '".$date."' AND bill_total=0 AND order_base=0");
                   
                   }


         }
        

             

            $commision_value = 0;
            if($value->commission_check == 1) 
            {
                $commision_value = $value->bill_total - $value->bill_total_rate;
            }

            if ($value->commission_check_fact == 1) 
            {
                $commision_value_fact =
                $value->bill_total - $value->bill_total_fact;
                $commision_value = $commision_value_fact;
            }
 if($value->create_date > '2024-05-31'){
                
                $commision_value = round($commision_value * 1.18);
                                                $commision_value = round($commision_value);

            } 
                if($value->deleteid==0)
                {



                    if($value->payment_mode_old!='')
                    {
                         $value->payment_mode=$value->payment_mode_old;
                    }


                    $enqDate = '';
                    $quoteDate = '';
                    $orderDate = '';
                    if($tablename == 'orders'){
                        $enqDate = date('d-m-Y',strtotime($value->create_date)).' '.$value->create_time;
                        $sqlQuote = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders_quotation WHERE move_id = '$value->id' ")->row();
                        if(isset($sqlQuote->create_date)){
                            $quoteDate = date('d-m-Y',strtotime($sqlQuote->create_date)).' '.$sqlQuote->create_time;
                            $sqlOrder = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders_process WHERE move_id = '$sqlQuote->id' ")->row();
                            if(isset($sqlOrder->create_date)){
                            $orderDate = date('d-m-Y',strtotime($sqlOrder->create_date)).' '.$sqlOrder->create_time;
                        }
                        }
                    }elseif($tablename == 'orders_quotation'){
                        $quoteDate =  date('d-m-Y',strtotime($value->create_date)).' '.$value->create_time;
                        $sqlEnq = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders WHERE id = '$value->move_id' ")->row();
                        if(isset($sqlEnq->create_date)){
                            $enqDate = date('d-m-Y',strtotime($sqlEnq->create_date)).' '.$sqlEnq->create_time;
                        }
                        $sqlOrder = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders_process WHERE move_id = '$value->id' ")->row();
                        if(isset($sqlOrder->create_date)){
                            $orderDate = date('d-m-Y',strtotime($sqlOrder->create_date)).' '.$sqlOrder->create_time;
                           
                        }
                    }elseif($tablename == 'orders_process'){
                        $orderDate =  date('d-m-Y',strtotime($value->create_date)).' '.$value->create_time;
                        $sqlQuote = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders_quotation WHERE id = '$value->move_id' ")->row();

                        if(isset($sqlQuote->create_date)){
                            $quoteDate = date('d-m-Y',strtotime($sqlQuote->create_date)).' '.$sqlQuote->create_time;
                            $sqlEnq = $this->db->query("SELECT id,create_date,create_time,move_id FROM orders WHERE id = '$sqlQuote->move_id' ")->row();
                            if(isset($sqlEnq->create_date)){
                                $enqDate = date('d-m-Y',strtotime($sqlEnq->create_date)).' '.$sqlEnq->create_time;
                            }
                        }
                    }
           
                    if($order_base == -1 && $tablename != 'orders_process'){
                        if($value->reason == 'Cancelled'){
            $array[] = array('no' => $i, 'delivery_confirm_person' => $value->delivery_confirm_person,'delivery_confirm_date_time' => $value->delivery_confirm_date_time,'finance_status' => $value->finance_status,'id' => $value->id,'colorcount' => $colorcount,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,
            'enquiry_date' => $enqDate,
            'quotation_date' => $quoteDate,
            'order_date' => $orderDate,
            'delivery_date' => $delivery_date_time,'delivery_date_status' => $delivery_date_status);
            }
        }else{
            $array[] = array('no' => $i, 'delivery_confirm_person' => $value->delivery_confirm_person,'delivery_confirm_date_time' => $value->delivery_confirm_date_time,'finance_status' => $value->finance_status,'id' => $value->id,'colorcount' => $colorcount,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,
            'enquiry_date' => $enqDate,
            'quotation_date' => $quoteDate,
            'order_date' => $orderDate,
            'delivery_date' => $delivery_date_time,'delivery_date_status' => $delivery_date_status);
            
        }
    }


            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        
        
        echo json_encode($myData);
   } 
  
    
    public function getcount()
    {


           $tablename = $_GET['tablename'];
           $from_date = $_GET['from_date'];
           $to_date = $_GET['to_date'];
           $sales_team = $_GET['sales_team'];
           $where="";
           if($sales_team>0)
           {
               $sales_id=$sales_team;
               $where .= " AND user_id='".$sales_id."'";
           }


          if(isset($_GET['from_date'])) 
          {     
              if($_GET['from_date']!='')
              {
                    
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date'];
                        $where .= " AND create_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                    
                  
              }
              else
              {

                    
                    $from_date = date('Y-m-d');
                    $to_date = date('Y-m-d');
                    $where .= " AND create_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                    
                   

              }
               
          }



         
            $resultpending = $this->db->query("SELECT id FROM $tablename WHERE order_base='0' AND deleteid=0 $where");
            $resultpending = $resultpending->result();



            $resultprocessed = $this->db->query("SELECT id FROM $tablename WHERE order_base='1' AND deleteid=0 $where");
            $resultprocessed = $resultprocessed->result();



            $resultcancel = $this->db->query("SELECT id FROM $tablename WHERE order_base='-1' AND deleteid=0 $where");
            $resultcancel = $resultcancel->result();

            $resultrequest = $this->db->query("SELECT id FROM $tablename WHERE order_base='3' AND deleteid=0 $where");
            $resultrequest = $resultrequest->result();



            $purchase_team = $this->db->query("SELECT id FROM $tablename WHERE order_base='4' AND deleteid=0 $where");
            $purchase_team = $purchase_team->result();



            $md_team = $this->db->query("SELECT id FROM $tablename WHERE order_base='5' AND deleteid=0 $where");
            $md_team = $md_team->result();



            $finance_team = $this->db->query("SELECT id FROM $tablename WHERE order_base='7' AND deleteid=0 $where");
            $finance_team = $finance_team->result();




            $reassign = $this->db->query("SELECT id FROM $tablename WHERE order_base='-2' AND deleteid=0 $where");
            $reassign = $reassign->result();

            $archive = $this->db->query("SELECT id FROM $tablename WHERE order_base='-3' AND deleteid=0 $where");
            $archive = $archive->result();
            

            $remainder = $this->db->query("SELECT id FROM $tablename WHERE order_base='-4' AND deleteid=0 $where");
            $remainder = $remainder->result();
            


            $pending_driver = $this->db->query("SELECT id FROM $tablename WHERE order_base='10' AND deleteid=0 $where");
            $pending_driver = $pending_driver->result();
            
         
            $missing = $this->db->query("SELECT id FROM $tablename WHERE missing_customer='1' AND deleteid=0 $where");
            $missing = $missing->result();
            

            $rejected_order = $this->db->query("SELECT id FROM $tablename WHERE md_approved_status='2'  AND deleteid=0 $where");
            $rejected_order = $rejected_order->result();
            


            $request_order = $this->db->query("SELECT id FROM $tablename WHERE order_base>='20' AND paricel_mode='1' AND deleteid=0 $where");
            $request_order = $request_order->result();
            
          

            $p_completed = $this->db->query("SELECT id FROM $tablename WHERE order_base='1' AND paricel_mode='1' AND deleteid=0 $where");
            $p_completed = $p_completed->result();
            

            $p_d_completed = $this->db->query("SELECT id FROM $tablename WHERE order_base='1' AND full_delivery='1' AND deleteid=0 $where");
            $p_d_completed = $p_d_completed->result();
            
            
            if ($tablename == 'orders') {
                $tablenamemain = 'order_product_list';
            }
            if ($tablename == 'orders_process') {
                $tablenamemain = 'order_product_list_process';
            }
            if ($tablename == 'orders_quotation') {
                $tablenamemain = 'order_product_list_quotation';
            }
            $resultsameqty = $this->db->query("SELECT a.customer_id FROM $tablename as a JOIN $tablenamemain as b ON b.order_id=a.id JOIN product_list as c ON c.id=b.product_id WHERE  c.link_to_purchase=1 GROUP BY b.order_id ORDER BY a.id DESC");
            $vendor_po_order = $resultsameqty->result();
    
        $array = array('pending' => count($resultpending),'remainder' => count($remainder),'request_order' => count($request_order),'p_d_completed' => count($p_d_completed),'pending_driver' => count($pending_driver),'rejected_order' => count($rejected_order),'missing' => count($missing),'p_completed' => count($p_completed), 'proceed' => count($resultprocessed), 'cancel' => count($resultcancel), 'purchase_team' => count($purchase_team), 'request' => count($resultrequest), 'requestp' => count($purchase_team), 'md_team' => count($md_team), 'reassign' => count($reassign), 'archive' => count($archive), 'finance_team' => count($finance_team), 'vendor_po_order' => count($vendor_po_order));
        echo json_encode($array);
    }
    public function enquiries_list_count() {


        if (isset($this->session->userdata['logged_in'])) {
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;


            $order_last_count = $this->Main_model->order_last_count('orders');

          // print_r( $order_last_count);exit();
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
//print_r( $neworder_id);exit();

            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Enquiry List';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/enquiries_list_count', $data);
        } else {
            $this->load->view('admin/index');
        }
    }



        public function fetchDataCategorybase() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $convert = $_GET['convert'];
        if( $tablename_sub == 'order_version_product_quatation' || $tablename_sub == 'order_version_product_list'){
            $result = $this->db->query("SELECT a.c_file_1,a.c_file_2,a.c_file_3,a.competitor_name1,a.competitor_name2,a.competitor_name3,b.type,b.uom,a.id,a.billing_options,a.categories_name,SUM(a.commission_fact_status) as commission_fact_status,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total,SUM(a.net_rate1) as net_rate1,SUM(a.net_rate2) as net_rate2,SUM(a.net_rate3) as net_rate3,SUM(a.total_1) as total_1,SUM(a.total_2) as total_2,SUM(a.total_3) as total_3 FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.version='" . $_GET['version'] . "' AND a.deleteid=0 GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.sort_id ASC");
        }else{
            $result = $this->db->query("SELECT a.c_file_1,a.c_file_2,a.c_file_3,a.competitor_name1,a.competitor_name2,a.competitor_name3,b.type,b.uom,a.id,a.billing_options,a.categories_name,SUM(a.commission_fact_status) as commission_fact_status,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total,SUM(a.net_rate1) as net_rate1,SUM(a.net_rate2) as net_rate2,SUM(a.net_rate3) as net_rate3,SUM(a.total_1) as total_1,SUM(a.total_2) as total_2,SUM(a.total_3) as total_3 FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.sort_id ASC");
        }
        $result = $result->result();
        foreach ($result as $value) {
            if ($convert == 1) {
                $qty = $value->qty_total;
            } else {
                $qty = $value->Sqr_feet_to_Meter;
            }


              $categories_idset=$value->categories_id;


              $arraycate=array('3','19','26','30','32');
               $fact_commission_view=0;
              if(in_array($categories_idset, $arraycate))
              {

                  $fact_commission_view=1;
              }
            

            if ($value->categories_name == 'Puff panel') {
                $value->type = '13';
            }
            $lablenos = 'Nos';
            if ($value->type == '2') {
                $lable = 'Height';
                $lable2 = 'Length';
                $lablenos = 'Nos';
                $labletype = 2;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '4') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $lablenos = 'Nos';
                $labletype = 4;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '5') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 5;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '6') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 6;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '15') {
                $lable = 'Length';
                $lable2 = 'Width';
                $labletype = 15;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '16') {
                $lable = 'Profile';
                $lable2 = 'Width';
                $labletype = 16;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '19') {
                $lable = 'Profile';
                $lable2 = 'Width';
                $labletype = 19;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '7') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 7;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
                if ($value->categories_name == 'Polynum') {
                    $lable = 'QTY';
                    $lablenos = 'Full Roll (Nos)';
                    $lablefact1 = 'Partial Roll (Rmt)';
                    $lablefact2 = '';
                    $value->uom='QTY';
                }
            } elseif ($value->type == '10') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 10;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '11') {
                $lable = 'Length';
                $lable2 = 'Thickness';
                $labletype = 11;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '12') {
                $lable = 'Length';
                $lable2 = 'Thickness';
                $labletype = 12;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '9') {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 9;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '8') {
                $lable = 'Crimp';
                $lable2 = 'Crimp';
                $labletype = 8;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '0') {
                $lable = 'Profile';
                $lable2 = 'Crimp';
                $labletype = 1;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '13') {
                $lable = 'Profile';
                $lable2 = 'Lapping';
                $labletype = 1;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } elseif ($value->type == '14') {
                $lable = 'Profile';
                $lable2 = 'Lapping';
                $labletype = 14;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            } else {
                $lable = 'Length';
                $lable2 = 'Crimp';
                $labletype = 1;
                $lablefact1 = 'Fact';
                $lablefact2 = '';
            }
              if($value->billing_options>0)
            {
                 if($value->billing_options==2)
                 {
                      $value->uom = 'KG';
                 }
                 else
                 {
                    $value->uom = $value->uom;
                 }

            }
            else
            {

                if ($value->uom != '') {
                $value->uom = $value->uom;
                } else {
                    $value->uom = 'QTY';
                }

            }
                
                $categories_id=$value->categories_id;


              $sub_product_id_class="";
              if($categories_id == '1')
              {
                      

                      $sub_product_id_class='sub_product_id';

              }


              $tile_material_name_class="";
              if($categories_id=='26')
              {
                      

                      $tile_material_name_class='tile_material_name';

              }
              if($categories_id=='590')
              {
                      

                      $tile_material_name_class='tile_material_name';

              }


                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                }
                elseif ($categories_id == '591') {
                    $cate_status = 1;
                }
                 else {
                    $cate_status = 0;
                }


                if($value->commission_fact_status>0)
                {
                    $commission_check_fact=1;
                }
                else
                {
                    $commission_check_fact=0;
                }

                 
                $activel_qty_total_set_overall=$value->activel_qty_total_set;
                $activel_qty_total_set=$qty;
            if($value->c_file_1=='')
            {
                $value->c_file_1=0;
            }

            if($value->c_file_2=='')
            {
                $value->c_file_2=0;
            }

            if($value->c_file_3=='')
            {
                $value->c_file_3=0;
            }












if($labletype==1 || $labletype==2 || $labletype==3 || $labletype==4 || $labletype==5 || $labletype==6  || $labletype==16 || $labletype==8 || $labletype==10 || $labletype==11 || $labletype==12 || $labletype==13 || $labletype==14)
{
    $col=4;
}
else
{
     $col=3;
}





   if($value->net_rate1=='')
   {
      //$value->total_1=$value->amount_total;
      $value->net_rate1=$activel_qty_total_set;
   }

    if($value->net_rate2=='')
   {
      //$value->total_2=$value->amount_total;
      $value->net_rate2=$activel_qty_total_set;
   }

   if($value->net_rate3=='')
   {
      //$value->total_3=$value->amount_total;
      $value->net_rate3=$activel_qty_total_set;
   }



            
    $array[] = array('no' => $i,
        'tile_material_name'=>$tile_material_name_class,
        'sub_product_id'=>$sub_product_id_class,
        'fact_commission_view'=>$fact_commission_view,
         'commission_check_fact' => $commission_check_fact,
         'id' => $value->id, 
          'col' => $col, 
         'categories_id' => $value->categories_id,
         'activel_qty_total_set_overall' => round($activel_qty_total_set_overall,3),
         'activel_qty_total_set' => round($activel_qty_total_set,3),
         'cate_status' => $cate_status,
         'net_rate1' => round($value->net_rate1,2),
         'net_rate2' => round($value->net_rate2,2),
         'net_rate3' => round($value->net_rate3,2),
         'total_1' => round($value->total_1,2),
         'total_2' => round($value->total_2,2),
         'total_3' => round($value->total_3,2),
         'c_file_1' => $value->c_file_1,
         'c_file_2' => $value->c_file_2,
         'c_file_3' => $value->c_file_3,
         'type' => $value->type,
           'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype,'activel_qty_total'=>$activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total,2), 'nos_total' => round($value->nos_total,2), 'fact_total' => round($value->fact_total,2),
        'competitor_name1' =>$value->competitor_name1,
        'competitor_name2' =>$value->competitor_name2,
        'competitor_name3' =>$value->competitor_name3,
         'qty_total' => round($qty,3),
             'amount_total' => round($value->amount_total,2));
            $i++;
        }
        echo json_encode($array);
    }


     public function fetch_data() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        $convert = $_GET['convert'];
        $customer_id = 0;
    
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
            $base_check = $valuecs->base_check;
        }
        if($this->session->userdata['logged_in']['access']==11){
            $result = $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0  AND product_id>0  AND action_id=1 ORDER BY categories_id,sort_id,id ASC");
            $result = $result->result();

        }
        else{
            $result = $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0  AND product_id>0  ORDER BY categories_id,sort_id,id ASC");
            $result = $result->result();  
        }
       
        foreach ($result as $value) {


            $rate=$value->rate+$value->commission;

            $amountdata =$rate * $value->qty;
            $amount = $amountdata;
            $description = "";
            $product_name = "";
            $kg_price = 0;
            $og_price = 0;
            $og_formula = 0;
            $kg_formula2 = 0;
            $stock = 0;
            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;
                $product_name = $csval->product_name;
                $weight = $csval->weight;
                $thickness= $csval->thickness;
                $price= $csval->price;

                
                       if($tablenamemain=='purchase_orders_process')
                        {    
                             if($csval->purchase_name!='')
                             {
                                 $product_name = $csval->purchase_name;
                             }
                             
                        }
                
                
                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                $kg_price = $csval->kg_price;
                $og_price = $csval->price;
                $stock = round($csval->stock);
                

                $og_formula = $csval->length;
                $kg_formula2 = $csval->width;


                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                } 
                elseif ($categories_id == '591') {
                    $cate_status = 1;
                }
                else {
                    $cate_status = 0;
                }
            }
            $resultsameqty = $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='" . $_GET['order_id'] . "' AND a.product_id='" . $value->product_id . "' AND b.customer_id='" . $customer_id . "' AND a.deleteid=0 ORDER BY a.sort_id ASC");
            $resultsameqty = $resultsameqty->result();
            $same = 0;
            if (count($resultsameqty) > 0) {
                $same = 1;
            }
            $this->db->query("UPDATE $tablename_sub SET cul='3' WHERE id='" . $value->id . "'");
            $qty = round($value->qty, 4);
            if ($convert == 1) {
                $qty = round($value->qty, 4);
            }
            if ($convert == 2) {
                $qty = round($value->qty * 10.764, 4);
            }
            if ($convert == 'undefined') {
                $qty = round($value->qty, 4);
            }
            $profile = $value->profile;
            $crimp = $value->crimp;
            if ($value->base_id == "") {
                $value->base_id = 1;
            }
            $imagestatus = 1;
            if ($value->reference_image == '') {
                $imagestatus = 0;
                $value->reference_image=0;
            }
            else
            {
                $value->reference_image=base_url().$value->reference_image;
            }
            
            if ($value->gst == '') {
                $value->gst = $gst;
            }
            if ($value->count_id != '') {
                $count_id = $i;
            } else {
                $count_id = $i;
            }
            
            
                 $profile_edit=0;
                $crimp_edit=0;
                $fact_edit=0;
                $nos_edit=0;
                $qty_edit=0;
                $commission_edit=0;
            if($tablename_sub=='order_product_list_process')
            {
                $profile_edit=$value->profile_edit;
                $crimp_edit=$value->crimp_edit;
                $fact_edit=$value->fact_edit;
                $nos_edit=$value->nos_edit;
                $qty_edit=$value->qty_edit;
                $commission_edit=$value->commission_edit;
            }


           $sort_id= $value->sort_id;
           $sorthide=0;
           $resultmaincountset = $this->db->query("SELECT * FROM $tablename_sub  WHERE sort_id='" .$sort_id . "' AND deleteid=0 ORDER BY id ASC");
           $resultcsset = $resultmaincountset->result();
           if (count($resultcsset)>1) 
           {
               $sorthide=1;
           }
       

            $product_name_sub="";
           $product_list_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list_sub as $csval_sub)
            {

                $product_name_sub=$csval_sub->product_name;
            }


         $rate= $value->rate+$value->commission;
         $old_rate= $value->basic_rate;
         $rate_edit=0;
         if($value->rate_edit>0)
         {
             $rate_edit= $value->rate_edit+$value->commission;
         }
        

         //basic rate
        //  $basic_rate = $value->basic_rate;

        //  if($basic_rate != null){
        //     $base_rate=round($basic_rate,3);
        //  }else{
            $base_rate=round($rate/1.18,3);
        //  }

            


            if($value->amount_1=='')
            {
               // $value->amount_1=$rate;
            }
            if($value->amount_2=='')
            {
                //$value->amount_2=$rate;
            }
            if($value->amount_3=='')
            {
                //$value->amount_3=$rate;
            }



            if($value->net_rate1=='')
            {
                $value->net_rate1=$qty;
            }
            if($value->net_rate2=='')
            {
                $value->net_rate2=$qty;
            }
            if($value->net_rate3=='')
            {
                $value->net_rate3=$qty;
            }




             if($value->c_fact_1=='')
            {
                //$value->c_fact_1=$value->fact;
            }
            if($value->c_fact_2=='')
            {
                //$value->c_fact_2=$value->fact;
            }
            if($value->c_fact_3=='')
            {
                //$value->c_fact_3=$value->fact;
            }



            if($value->total_1=='')
            {
                //$value->total_1=$amount;
            }
            if($value->total_2=='')
            {
                //$value->total_2=$amount;
            }
            if($value->total_3=='')
            {
                //$value->total_3=$amount;
            }

           
            $array[] = array('no' => $count_id,
            'profile_edit' => round($profile_edit,3),
            'crimp_edit' => round($crimp_edit,3),
            'fact_edit' => round($fact_edit,3),
            'nos_edit' => round($nos_edit,3),
            'qty_edit' => round($qty_edit,3),
             'commission_edit' => round($commission_edit,3),
             'commission_fact' => $value->commission_fact,
            'id' => $value->id,
             'same' => $same,
             'base_rate' => $base_rate,
             'base_check' => $base_check,
             'sorthide' => $sorthide, 
             'imagestatus' => $imagestatus,
              'order_id' => $value->order_id,
              'activel_qty' => $value->activel_qty,
              'weight' => round($value->weight,2),
              'default_weight'=>round($weight,2),
              'thickness'=>$thickness,
              'sub_product_name_tab'=>$product_name_sub,
              'purchase_request' => $value->purchase_request,
              'purchase_id' => $value->purchase_id,
               'product_name_tab' => $product_name,
                'tile_material_name' => $value->tile_material_name,
                 'tile_material_id' => $value->tile_material_id,
                 'reference_image' => $value->reference_image,
                 'sub_product_id' => $value->sub_product_id, 
                 'categories' => $categories,
                  'type' => $type,
                   'description' => $description, 
                   'product_id' => $value->product_id,
                   'sort_id' => $value->sort_id,
                   'count_id' => $value->count_id,
                    'return_status' => $value->return_status,
                    'rate_edit' => round($rate_edit,2), 
                    'categories_id' => $value->categories_id,
                     'specifications' => $value->specifications,
                      'profile_tab' => round($profile,3), 
                      'crimp_tab' => round($crimp,3), 
                      'checked' => $value->checked, 
                      'dim_two' => $value->dim_two,
                       'dim_one' => $value->dim_one,
                        'dim_three' => $value->dim_three,
                         'image_length' => $value->image_length,
                          'gst' => $value->gst,
                           'gst_check' => $value->gst_check, 
                           'extra_crimp' => round($value->extra_crimp,3),
                            'back_crimp' => round($value->back_crimp,3),
                             'proudtcion_no' => $value->proudtcion_no,
                              'nos_tab' => round($value->nos,2),
                               'unit_tab' => $value->unit,
                                'return_status' => $value->return_status,
                                 'fact_tab' => round($value->fact,2), 
                                 'uom' => $value->uom,
                                  'base_id' => $value->base_id,
                                  'sub_product_id_edit' => $value->sub_product_id_edit,
                                   'stock' => $stock, 
                                   'kg_price' => $kg_price, 
                                   'og_price' => $og_price, 
                                   'og_formula' => $og_formula,
                                    'kg_formula2' => $kg_formula2, 
                                    'billing_options' => $value->billing_options,
                                     'commission_tab' => round($value->commission,2),
                                      'cate_status' => $cate_status, 
                                      'net_rate1' => $value->net_rate1,
                                      'net_rate2' => $value->net_rate2,
                                      'net_rate3' => $value->net_rate3,
                                      'amount_1' => $value->amount_1,
                                      'amount_2' => $value->amount_2,
                                      'amount_3' => $value->amount_3,
                                      'total_1' => round($value->total_1, 2),
                                      'total_2' => round($value->total_2, 2),
                                      'total_3' => round($value->total_3, 2),
                                      'c_fact_1' => $value->c_fact_1,
                                      'c_fact_2' => $value->c_fact_2,
                                      'c_fact_3' => $value->c_fact_3,
                                      'categories_id_get' => $categories_id,
                                       'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2),
                                        'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                                         'rate_tab' => round($rate,2), 
                                         'old_rate' => $old_rate, 
                                         'cul' => $value->cul,
                                          'qty_tab' => round($qty,3), 
                                          'amount_tab' => sprintf("%.2f",$amount),
                                          'selling_price' => round($price, 2));
            $i++;
        }
        echo json_encode($array);
    }

       public function fetch_single_data_total() {
        $amounttotal = 0;
        $Meter_to_Sqr_feet = 0;
        $Sqr_feet_to_Meter = 0;
        $discount = 0;
        $fullqty = 0;
        $nos = 0;
        $unit = 0;
        $fact = 0;
        $commission = 0;
        $billtotal=0;
        $amounttotalgst = 0;
        $amounttotal_with_out_commission = 0;
        $form_data = json_decode(file_get_contents("php://input"));
        $tablenamemain = $form_data->tablenamemain;
        $tablename = $form_data->tablename_sub;
        $convert = $form_data->convert;
        $approved_status = 1;
        $total_1=0;
        $total_2=0;
        $total_3=0;
        $gst_price=0;
        $get_gst_price=0;
        $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($result as $value) {

            $rate=$value->rate+$value->commission;
            $amounttotal+= $rate*$value->qty;
            $amounttotal_with_out_commission+= $value->rate * $value->qty;
            $Meter_to_Sqr_feet+= $value->Meter_to_Sqr_feet;
            $Sqr_feet_to_Meter+= $value->Sqr_feet_to_Meter;
          


            $billtotal+= $rate * $value->qty;


            $commission+= $value->commission;
            $fullqty+= $value->qty;
            $nos+= $value->nos;
            $unit+= floatval($value->unit);
            $fact+= $value->fact;

            $total_1+= $value->total_1;
            $total_2+= $value->total_2;
            $total_3+= $value->total_3;

            $base_rate=round($rate/1.18,2);
            $gst_price=round($base_rate*$value->qty,2);


            $amountset= $rate*$value->qty;
            $get_gst_price+=$amountset-$gst_price;
            


        }


  //$amounttotalgstamt= $billtotal/1.18;
  //$amounttotalgst=$amounttotalgstamt*9/100;
   $amounttotalgst=round($get_gst_price,2);

 $statusviewdata = $this->db->query("SELECT b.uom FROM $tablename as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='".$_GET['order_id']."' AND  a.deleteid = '0' AND b.uom='Kg'");
 $statusviewdata = $statusviewdata->result();
    if(count($statusviewdata)>0)
    {
        $statusview=0;
    }
    else{
         $statusview=1;
    }               


        $user_id_check=0;

        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            $production_assign = $valuedis->production_assign;
            $discount = $valuedis->discount;
            $order_no = $valuedis->order_no;
            $minisroundoff = $valuedis->roundoff;
            $roundoffstatus = $valuedis->roundoffstatus;
            $user_id = $valuedis->user_id;
            $gate_login_view_status = $valuedis->gate_login_view_status;
             $discountPre = $valuedis->discountPre;
           

            $print_status = $valuedis->print_status;
            if($valuedis->user_id>0)
            {
                $user_id_check = $valuedis->user_id;
            }
            
            $create_date = date('d/m/Y', strtotime($valuedis->create_date));
            $create_time = $valuedis->create_time;
            $reason = $valuedis->reason;
            $paricel_mode = $valuedis->paricel_mode;
            $collection_remarks=$valuedis->collection_remarks;
            $order_base = $valuedis->order_base;
            $reason = $valuedis->reason;
            $customer_id = $valuedis->customer_id;
            $SSD_check = $valuedis->SSD_check;
            $excess_payment_status = $valuedis->excess_payment_status;
            $payment_mode = $valuedis->payment_mode;
            $gst_check = $valuedis->gst_check;
            $delivery_date_time = $valuedis->delivery_date_time;
            $mark_date = $valuedis->mark_date;

            $tcs_status=$valuedis->tcs_status;
            $tcsamount=$valuedis->tcsamount;

            $create_date_val = $valuedis->create_date;     

            $commission_check = $valuedis->commission_check;
            $commission_check_fact = $valuedis->commission_check_fact;
            $bill_total_rate = $valuedis->bill_total_rate;
            $without_commsision_total = $valuedis->without_commsision_total;

        }


        if($gst_check==0) 
        {
            $amounttotalgst=0;
        }

        if ($minisroundoff == '') {
            $minisroundoff = 0;
        }
        $salesphone = "";
        $salesname = "";
        $resultsales = $this->Main_model->where_names('admin_users', 'id', $user_id);
        foreach ($resultsales as $valuesales) {
            $salesphone = $valuesales->phone;
            $salesphone2 = $valuesales->phone2;
            $salesname = $valuesales->name;
        }
        $roundoff = $amounttotal;
        if($roundoffstatus == 1)
        {
              $discountfulltotal = $roundoff - $discount + $minisroundoff;
              $amounttotal_with_out_commission_val = $amounttotal_with_out_commission - $discount + $minisroundoff;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='+'; 


        } 
        else 
        {
              $discountfulltotal = $roundoff - $discount - $minisroundoff;
              $amounttotal_with_out_commission_val = $amounttotal_with_out_commission - $discount - $minisroundoff;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='-';

        }


        $credit_limit = 0;
        
        $payment_terms = "";
        $delivery_status_check = "";
        $account_number = "";
        $customers_data = $this->Main_model->where_names(
            "customers",
            "id",
            $customer_id
        );
        foreach ($customers_data as $csvalv) {
            $credit_limit = $csvalv->credit_limit;
            $credit_status = $csvalv->credit;
            $approved_status = $csvalv->approved_status;
            $payment_terms = $csvalv->payment_terms;
            $account_number = $csvalv->account_number;
           $gst_view = $csvalv->gst;
          
$tcs_status_customer = $csvalv->tcs_status;
            if ($payment_terms == "Credit") {
                $delivery_status_check = 2;
            }

            if ($payment_terms == "Cash & Carry") {
                $delivery_status_check = 1;
            }
        }


          $tcsamount=0;
          $orgtcsamount=0;
          $withput_tcsamount=0;
        

                $discountfulltotal=$discountfulltotal+$tcsamount;
                $org_fulltotal=$discountfulltotal_base+$orgtcsamount;
                $org_fulltotal_without_commision=$amounttotal_with_out_commission_val+$withput_tcsamount;


            $whole = floor($discountfulltotal); 
            $decimal1 = $discountfulltotal - $whole;
            $totalval= round($decimal1,2);


            $roundoffstatusval_data="";
            $getdataminis=0;
            if($totalval!=0)
            {


                    if($totalval>0.5)
                    {
                           $getplusevalue=1-$totalval;
                           $discountfulltotal=$discountfulltotal+$getplusevalue;
                          
                           if($getplusevalue>0)
                           {
                             $getdataminis=$getplusevalue;
                             $roundoffstatusval_data=" (+) ".$getplusevalue;
                           }

                          
                    }
                    elseif($totalval == 0.5){
                        $round_full_total=round($discountfulltotal,2);
                        $discountfulltotal=round($round_full_total);

                        if($totalval>0)
                        {
                            $getdataminis=$totalval;
                            $roundoffstatusval_data=" (-) ".$totalval;
                        }
                    }
                    elseif($totalval >= 0.1){
                        $round_full_total=round($discountfulltotal,2);
                        $discountfulltotal=round($round_full_total);

                        if($totalval>0)
                        {
                            $getdataminis=$totalval;
                            $roundoffstatusval_data=" (-) ".$totalval;
                        }
                    }
                    else
                    {


                            $discountfulltotal=round($discountfulltotal-$totalval);

                           if($totalval>0)
                           {
                               $getdataminis=$totalval;
                               $roundoffstatusval_data=" (-) ".$totalval;
                           }
                           

                    }


            }


            $whole1 = floor($org_fulltotal); 
            $decimal11 = $org_fulltotal - $whole1;
            $totalval1= round($decimal11,3);


            $roundoffstatusval_data1="";
            if($totalval1!=0)
            {


                    if($totalval1>0.5)
                    {
                           $getplusevalue1=1-$totalval1;
                           $org_fulltotal=$org_fulltotal+$getplusevalue1;
                         
                    }
                    else
                    {


                           $org_fulltotal=round($org_fulltotal-$totalval1);


                    }


            }


            $le_amount_check=0;
           
            


   $bill_total=round($discountfulltotal,2);


     
  




if($roundoff_val=='-')
{
    $minisroundoffround=$minisroundoff+$getdataminis;
}
else
{
    $minisroundoffround=$minisroundoff+$getdataminis;
}

$minisroundoffround=round($minisroundoffround,2);


        

        if ($account_number != "") {
            $bank_name = "HDFC BANK";
            $ifsccode = "";
            $branch = "";
        } else {
            $account_number = "1643135000001944";
            $bank_name = "KARUR VYSYA BANK";
            $ifsccode = "KVBL0001643";
            $branch = "AVINASHI";
        }

        $resultdis = $this->Main_model->where_names_two_order_by(
            $tablenamemain,
            "id",
            $_GET["order_id"],
            "deleteid",
            "0",
            "id",
            "DESC"
        );
        foreach ($resultdis as $valuedis) {
            $commision_value = 0;
            if ($valuedis->commission_check == 1) {
                $commision_value =
                    $valuedis->bill_total - $valuedis->bill_total_rate;
            }

            if ($valuedis->commission_check_fact == 1) {
                $commision_value_fact =
                    $valuedis->bill_total - $valuedis->bill_total_fact;
                $commision_value = $commision_value_fact;
            }
        }


        


         


          $array = [
            "order_no_id" => $order_no,
            "collection_remarks" => $collection_remarks,
            "commissiontotal" => $commision_value,
            "total_1" => round($total_1),
            "total_2" => round($total_2),
            "total_3" => round($total_3),

            "total_1_d" => round($discountfulltotal-$total_1),
            "total_2_d" => round($discountfulltotal-$total_2),
            "total_3_d" => round($discountfulltotal-$total_3),

            "ifsccode" => $ifsccode,
            "branch" => $branch,
            "print_status"=>$print_status,
            "account_number" => $account_number,
            "delivery_status_check" => $delivery_status_check,
            "minisroundoffround" => $minisroundoffround,
            "SSD_check" => $SSD_check,
            "payment_mode" => $payment_mode,
            "excess_payment_status" => $excess_payment_status,
            "delivery_date_time" => $delivery_date_time,
            "tcsamount" => $tcsamount,
            "statusview" => $statusview,
            "order_base" => $order_base,
            "discountPre"=>$discountPre,
            "reason" => $reason,
            "user_id_check" => $user_id_check,
            "user_id" => $user_id,
            "salesphone" => $salesphone,
            "salesphone2" => $salesphone2,
            "salesname" => $salesname,
            "gate_login_view_status"=>$gate_login_view_status,
            "credit_limit_status" => $credit_limit_status,
            "reason" => $reason,
            "paricel_mode" => $paricel_mode,
            "production_assign" => $production_assign,
            "mark_date" => $mark_date,
            "create_date" => $create_date,
            "create_time" => $create_time,
            "minisroundoff" => $minisroundoff,
            "roundoff_val" => $roundoff_val,
            "gst_view" => $gst_view,
            "roundoffstatusval_data" => $roundoffstatusval_data,
            "fulltotal" => round($discountfulltotal_base-$amounttotalgst, 2),
            "discountfulltotal" => round($discountfulltotal, 2),
            "org_fulltotal" => round($org_fulltotal, 2),
            "totalitems" => count($result),
            "gsttotal" => round($amounttotalgst/2, 2),
            "discount" => round($discount),
            "commission" => round($commission, 2),
            "amounttotal_with_out_commission" => round(
                $amounttotal_with_out_commission,
                2
            ),
            "Meter_to_Sqr_feet" => round($Meter_to_Sqr_feet, 2),
            "Sqr_feet_to_Meter" => round($Sqr_feet_to_Meter, 2),
            "NOS" => round($nos, 2),
            "UNIT" => round($unit, 2),
            "FACT" => round($fact, 2),
            "fullqty" => round($fullqty, 2),
        ];
            echo json_encode($array);
    }


     public function ordercreate_product_cometitor() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            
            
             $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
            $data['layout_plan'] = $resultmain->result();
            
            $version = 'O';
            
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            if($this->session->userdata['logged_in']['access'] == '11')
            {            
                
                
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                            $data['sales_team'] = $this->Main_model->where_in_names('admin_users','id',$sales_team_id);
                           
            } 
            else 
            {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            }
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);

            // if($neworder_id){
            // $ver_data = $this->db->query("SELECT o.id AS order_id, o.version AS lversion, b.* FROM orders AS o LEFT JOIN enquiry_version AS b ON b.order_id = o.id WHERE b.order_id = $neworder_id ORDER BY b.id ASC");
            // $data['allversions'] = $ver_data->result();

            // $array = array(); 
            // $orderversion = $this->Main_model->where_names('enquiry_version', 'order_id', $neworder_id);
            // foreach ($orderversion as $value) {
                
            //     $orderversionData = array(
            //         'id' => $value->order_id,
            //         'name' => $value->version
            //     );

            //     $array[] = $orderversionData;
            // }

            // $data['version_link'] = $array;
            // }


            $data['old_tablename'] = '0';
            $data['version'] = 'O';
            $data['old_tablename_sub'] = '0';
            $data['tablename'] = 'orders';
            $data['tablename_sub'] = 'order_product_list';
            $data['order_vp_list'] = 'order_version_product_list';
            $data['order_v_log'] = 'enquiry_version';
            $data['movetablename'] = 'orders_quotation';
            $data['movetablename_sub'] = 'order_product_list_quotation';
            $data['order_title'] = 'Enquiry NO';
            $data['order_lable'] = 'Enquiry Create';
            $data['missed'] = 'Enquiry';
            $data['move'] = 'Quotation';
            $data['status_base'] = 0;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('orders', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '00' . $neworder_quotation_id;
            }


             $viewbase=0;
             if(isset($_GET['viewbase'])) 
             {
                           
                           $viewbase=1;

             }


             if($viewbase==1)
             {


                    $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
                    if(count($resorder) > 0) 
                    {
                        foreach ($resorder as $data_val) {
                            $order_no = $data_val->order_no;
                            $data['order_id'] = $neworder_id;
                            $data['count_id'] = $neworder_quotation_id;
                            $data['order_no'] = $order_no;
                        }
                    } 
                 

             } 
             else
             {


                    $resorder = $this->Main_model->where_names_two_order_by($data['tablename'],'entry_user_id',$this->userid, 'id', $neworder_id,'id', 'ASC');
                    if(count($resorder) > 0) 
                    {
                        foreach ($resorder as $data_val) {
                            $order_no = $data_val->order_no;
                            $data['order_id'] = $neworder_id;
                            $data['count_id'] = $neworder_quotation_id;
                            $data['order_no'] = $order_no;
                        }
                    } 
                    else 
                    {

                        $order_last_count = $this->Main_model->order_last_count('orders');
                        foreach ($order_last_count as $r) {
                            $neworder_id = $r->id + 1;
                        }
                     $data['order_id'] = $neworder_id;
                     $data['count_id'] = $neworder_quotation_id;
                     $data['order_no'] = $neworder_id . '/' .'E/'. $version . '/' .$this->sales_id . '/' . $neworder_quotation_id . '/' . date('Y');
                    }
                    
                    
             }

             


            //$data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Create Competitor';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/order_product_cometitor', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
     public function ordercreate_product_cometitor_quotation() {
        if (isset($this->session->userdata['logged_in'])) {
           $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
           
            $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
            $data['layout_plan'] = $resultmain->result();
            
            
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            if ($this->session->userdata['logged_in']['access'] == '11') {
                
                
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                            $data['sales_team'] = $this->Main_model->where_in_names('admin_users','id',$sales_team_id);
                
            } else {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            }
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);

          
            
            $data['page'] = 'Quotation';
            $data['old_tablename'] = 'orders';
            $data['old_tablename_sub'] = 'order_product_list';
            $data['tablename'] = 'orders_quotation';
            $data['tablename_sub'] = 'order_product_list_quotation';
            $data['movetablename'] = 'orders_process';
            $data['movetablename_sub'] = 'order_product_list_process';
            $data['order_title'] = 'Quotation NO';
            $data['order_lable'] = 'Quotation Create';
            $data['order_vp_list'] = 'order_version_product_quatation';
            $data['order_v_log'] = 'enquiry_version';
            $data['order_lable'] = 'Quotation Create';
            $data['missed'] = 'Quotation';
            $data['move'] = 'Order ';
            $data['status_base'] = 10;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '00' . $neworder_quotation_id;
            }
            $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
            if (count($resorder) > 0) {
                foreach ($resorder as $data_val) {
                    $order_no = $data_val->order_no;
                    $data['order_id'] = $neworder_id;
                    $data['count_id'] = $neworder_quotation_id;
                    $data['order_no'] = $order_no;
                }
            } else {
                $data['order_id'] = $neworder_id;
                $data['count_id'] = $neworder_quotation_id;
                $data['order_no'] = $neworder_id . '/' . $this->sales_id . '/' . $neworder_quotation_id . '/' . date('Y');
            }
            //$data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation Add';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/order_product_cometitor', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    public function ordercreate_product_cometitor_process() {
        if (isset($this->session->userdata['logged_in'])) {
           $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
           
            $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
            $data['layout_plan'] = $resultmain->result();
            
            
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            if ($this->session->userdata['logged_in']['access'] == '11') {
                
                
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                            $data['sales_team'] = $this->Main_model->where_in_names('admin_users','id',$sales_team_id);
                
            } else {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            }
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);

           
            $data['page'] = 'Quotation';
            $data['old_tablename'] = 'orders';
            $data['old_tablename_sub'] = 'order_product_list';
            $data['tablename'] = 'orders_process';
            $data['tablename_sub'] = 'order_product_list_process';
            $data['movetablename'] = 'orders_process';
            $data['movetablename_sub'] = 'order_product_list_process';
            $data['order_title'] = 'Quotation NO';
            $data['order_lable'] = 'Quotation Create';
            $data['order_vp_list'] = 'order_version_product_quatation';
            $data['order_v_log'] = 'enquiry_version';
            $data['order_lable'] = 'Quotation Create';
            $data['missed'] = 'Quotation';
            $data['move'] = 'Order ';
            $data['status_base'] = 10;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '00' . $neworder_quotation_id;
            }
            $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
            if (count($resorder) > 0) {
                foreach ($resorder as $data_val) {
                    $order_no = $data_val->order_no;
                    $data['order_id'] = $neworder_id;
                    $data['count_id'] = $neworder_quotation_id;
                    $data['order_no'] = $order_no;
                }
            } else {
                $data['order_id'] = $neworder_id;
                $data['count_id'] = $neworder_quotation_id;
                $data['order_no'] = $neworder_id . '/' . $this->sales_id . '/' . $neworder_quotation_id . '/' . date('Y');
            }
            //$data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation Add';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/order_product_cometitor', $data);
        } else {
            $this->load->view('admin/index');
        }
    }




// live insert
public function insert_packed_details(){



 $query = $this->db->query("SELECT * FROM  sales_load_products as a  WHERE a.amount>0 ORDER BY a.id  ASC");
    $result=$query->result(); 

    foreach($result as $details) {

        $query = $this->db->query("SELECT * FROM   order_product_list_process as a WHERE  a.id='".$details->order_product_id."'");
        $result_whole=$query->row(); 

        $packlist=array(
            'order_product_id'=>$details->order_product_id ,
            'order_id'=>$details->order_id ,
            'randam_id'=>$details->randam_id  ,
            'nos'=>$details->nos  ,
            'qty'=>$details->qty  ,
            'activel_qty'=>$details->qty ,
            'billed_qty'=>$result_whole->qty ,
            'rate'=>$details->rate,
            'amount'=>$details->amount,
            'created_date'=>$details->date_update ,
        );

        $this->db->insert('packed_details_test',$packlist);

    }

echo 'success';exit;




}



}
