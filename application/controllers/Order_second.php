<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '4400M');
class Order_second extends CI_Controller {
    function __construct() {
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



    public function fetch_data_table() {
        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        
     
        $this->db->query("UPDATE orders_process SET  assign_status_11_date = null, assign_status_12_date = null, assign_status_1_date = null, assign_status_2_date = null, assign_status_3_date = null WHERE finance_status = 2 AND assign_status = 0");


        $this->db->query("UPDATE order_delivery_order_status SET  assign_status_0_date=create_date,assign_status_11_date = null, assign_status_12_date = null, assign_status_1_date = null, assign_status_2_date = null, assign_status_3_date = null WHERE finance_status = 2 AND assign_status = 0");
        

        
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $order_base_val=$_GET['order_base'];
        $where = "";
        $where1 = "";
        
        $filterOrders = "";
        $filterOrders = $_GET['orders'];


        $order_by=" a.id";  
       
        
       
        if($search == "")
        {
        
        
         if(isset($_GET['from_date'])) 
        {     
            if($_GET['from_date']!='')
            {
                  
                    $from_date = $_GET['from_date'];
                    $to_date = $_GET['to_date'];
                    $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";

                      if($tablename=='orders_process')
                      {
                        $order_by=" a.count";
                      } 

                
                   
                
            }
            else
            {

                  if($order_base==1)
                  {

                    $from_date = date('Y-m-d');
                    $to_date = date('Y-m-d');
                    $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";

                      if($tablename=='orders_process')
                      {
                        $order_by=" a.count";
                      }


                  
                  }

            }
             
        }
   $limitExtend = " SET SESSION group_concat_max_len = 9999999 ";
        $this->db->query( $limitExtend);

         if($filterOrders != ''){
             $filterOrders = base64_decode($filterOrders);
        // echo "<script> console.log($filterOrders) </script>";

             $where .= "  AND a.id IN ( $filterOrders ) ";
             $where1 .= "  AND  id IN ( $filterOrders ) ";
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
        

         if($this->session->userdata['logged_in']['access']=='31')
        {


                  $where .= " AND a.customer_id='" . $this->userid . "'";
                  $where1 .= " AND customer_id='" . $this->userid . "'";


                  if($search != "")
                  {
                          $where .= " AND a.order_no LIKE '%" . $search. "%'";
                          $where1 .= " AND order_no LIKE '%" . $search . "%'";
                  }
                 

        }
        else
        {
                if($search != "")
                {
                           
                      
                            if($this->session->userdata['logged_in']['access']!=12)
                            {

                                
                               //$where .=" AND c.name LIKE '%" . $search . "%'";
                               $where .= " AND a.order_no LIKE '%". $search ."%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
                               
                               $where1 .= " AND order_no='" . $search . "'";
                               
                            }
                            else
                            {
                                 $where .= " AND a.order_no LIKE '%" . $search . "%' OR a.trip_id LIKE '%" . $search . "%' OR b.company_name LIKE '%" . $search . "%' OR b.phone LIKE '%" . $search . "%' OR a.reason LIKE '%" . $search . "%'";
                                 $where1 .= " AND order_no='" . $search . "'";
                            }
                           
                            
                            
                    
                    
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
                
                
                $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
                $result = $query->result();
           
            
            
        }elseif ($this->session->userdata['logged_in']['access'] == '20') {
            
              $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
            
            if (count($result) == 0) {
                
                
                    $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
                $resultcount = $querycount->result();
                $count=count($resultcount);
                
                
                $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
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
            $poin_to_member_base = $this->Main_model->where_names_two_order_by('admin_users','id',$this->userid,'assign_base',1,'id','Desc');

            if(count($poin_to_member)>0 && count($poin_to_member_base)>0)
            {

                 

                    
   
                   if($tablename!='orders_process')
                   {

                            foreach ($poin_to_member as $point) 
                            {
                                $sales_team_id[] = $point->id;
                            }
                         $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                         $userslog = ' AND  a.entry_user_id IN (' . $sales_team_id . ')';
                   }
                   else
                   {

                      $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                       if($filterOrders == ''){
                      $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
                  }


                   }

             
                    

            }
            else
            {

                   $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                     if($filterOrders == ''){
                   $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
               }
             

            }
            
            
              $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'   $userslog $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            if($filterOrders != ''){
                 $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id   JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
             }else{
                 $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
             }
           
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
            
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        else
        {
            
            
          $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0'  $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        
        
        
        
        
        
        
        
        // echo "SELECT a.*,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id  WHERE a.deleteid='0' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize";
        // exit;
        
        
        
        
        
        
        
        
        
        if ($tablename == 'orders') {
            $tablename_sub = "order_product_list";
        }
        if ($tablename == 'orders_quotation') {
            $tablename_sub = "order_product_list_quotation";
        }
        if ($tablename == 'orders_process') {
            $tablename_sub = "order_product_list_process";
        }

        // echo "<pre>";print_r($result);
        // exit;
        foreach ($result as $value) {
           




            $order_by = $value->name;

             if($value->old_user_id=='0')
            {
                $order_by_name = $value->name;
                $order_by = $value->name;
            } 
            else
            {
                $old_salesperson = $this->Main_model->where_names('admin_users','id',$value->old_user_id);
                foreach ($old_salesperson as $old) {
                    $order_by_name = $old->username;
                    $order_by = $old->username;
                }


            }



            //  if($value->old_user_id=='0')
            // {
            //     $order_by_name = $value->name;
            // } 
            // else
            // {
            //     $old_salesperson = $this->Main_model->where_names('admin_users','id',$value->old_user_id);
            //     foreach ($old_salesperson as $old) {
            //         $order_by_name = $old->username;
            //     }


            // }


           
  
                // $old_salesperson = $this->Main_model->where_names('admin_users','id',$value->entry_user_id);
                // foreach ($old_salesperson as $old) {
                //     $order_by = $old->username;
                // }


          


           
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
                $value->delivery_status = 'Zaron Scope';
             }


             
             $delivery_date_time="";
             if($tablename == 'orders_process') 
             {


                          $delivery_date_time=date('d-m-Y', strtotime($value->delivery_date_time));
                          



             }
              


           
           $le_amount=$value->bill_total;
           $discountfulltotal=$value->bill_total;



            $pending_amount='';
            if($order_base_val==111)
            {
               

                                                              
                                                                
                                                           $resultsub_production=$this->db->query("SELECT SUM(a.qty*a.rate) as totalvalue FROM order_product_list_process as a  WHERE a.deleteid=0 AND a.order_id='".$value->id."' AND a.return_status=0 ORDER BY a.id DESC");
                                                                 $resultsub_production=$resultsub_production->result();
                                                                 $production=0;
                                                                 foreach($resultsub_production as $val)
                                                                 { 

                                                                         $production+=$val->totalvalue;
                                                                 }

                                                                $resultload = $this->db->query("SELECT SUM(qty*rate) as totalvalue FROM sales_load_products  WHERE order_id='" . $value->id . "' AND loadstatus=1 AND delivered_products=1  ORDER BY id ASC");
                                                                    $resultload = $resultload->result();
                                                                    foreach ($resultload as $valueload)
                                                                    {
                                                                        
                                                                          $loadamount= $valueload->totalvalue;
                                                                        
                                                                    }
                                                                 if($loadamount>0)   
                                                                 {   

                                                                 $production=$production-$loadamount;   
                                                                                                                        
                                                                 if($production>0)
                                                                 {

                                                                   $pending_amount='Partial Pending Amount :'.round($production);

                                                                 }
                                                                 }


            }
            
            


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
        



  $trip_id='';
            $vehicle_name = "";
                                    $driver_name="";
               
         if($tablename=='orders_process')
         {

                        
                       $this->db->query("UPDATE orders_process SET  assign_status_3_date = assign_date WHERE assign_status_3_date IS NULL AND assign_status = 3");

                     $sscheck = $this->db->query("SELECT order_id,delivery_date_status,reason,assign_status,finance_status FROM order_delivery_order_status WHERE  order_id='".$value->id."'  ORDER BY id DESC");
                        $sscheck = $sscheck->result();
                        if(count($sscheck)>0)
                        {



                                foreach ($sscheck as $ssv)
                                {
            $this->db->query("UPDATE orders_process SET delivery_date_status='".$ssv->delivery_date_status."',reason='".$ssv->reason."',assign_status='".$ssv->assign_status."',finance_status='".$ssv->finance_status."' WHERE id='".$ssv->order_id."'");
                                }



                        }




  $this->db->query("UPDATE order_delivery_order_status SET customer_id='".$value->customer_id."' WHERE order_id='".$value->id."' AND  order_no='".$value->order_no."'");
                 

                        if($value->order_base=='22')
                        {
                            
$this->db->query("UPDATE orders_process SET reason='MD cancel order request' WHERE id='".$value->id."'");
$this->db->query("UPDATE order_delivery_order_status SET reason='MD cancel order request' WHERE order_id='".$value->id."'");

                        }


                    $trip_id=$value->trip_id;

                                    if($value->vehicle_id>0)
                                    {


                                            $vehicle = $this->Main_model->where_names(
                                                "vehicle",
                                                "id",
                                                $value->vehicle_id
                                            );
                                            foreach ($vehicle as $vehicle_v) {
                                                $vehicle_name = $vehicle_v->vehicle_name.' | '.$vehicle_v->vehicle_number;
                                                $vehicle_id = $vehicle_v->id;
                                            }

                                            $driver = $this->Main_model->where_names(
                                                "driver",
                                                "vehicle_id",
                                                $vehicle_id
                                            );
                                            foreach ($driver as $valuess) 
                                            {
                                                $driver_id = $valuess->id;
                                                $driver_name = $valuess->name.' | '.$valuess->phone;

                                            }

                                    }
                                        
                    
                    if($value->order_base=='-1')
                    {

             $this->db->query("UPDATE all_ledgers SET deleteid='1',notes='Cancel Approved' WHERE order_id='".$value->id."' AND  order_no='".$value->order_no."' AND deleteid=0");



    $this->db->query("UPDATE order_delivery_order_status SET reason='Cancel Approved',order_base='-1' WHERE order_id='".$value->id."' AND  order_no='".$value->order_no."'");

$newModOrderNo=$value->order_no;

  $autoroundoff_deletemod='AUTOROUND-'.$newModOrderNo;
  $this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE order_no='".$newModOrderNo."' AND customer_id='372' AND deletemod='".$autoroundoff_deletemod."' AND party_type=5");



  $autoroundoff_deletemod1='ROUND-'.$newModOrderNo;
  $this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE order_no='".$newModOrderNo."' AND customer_id='372' AND deletemod='".$autoroundoff_deletemod1."' AND party_type=5");
  

  $DISCOUNT_DELETEMOD='DISCOUNT-'.$newModOrderNo;
  $this->db->query("UPDATE all_ledgers SET  deleteid=13 WHERE order_no='".$newModOrderNo."' AND customer_id='220' AND deletemod='".$DISCOUNT_DELETEMOD."' AND party_type=5");

   $tcsset='TCS-'.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='166'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$tcsset."'");
$this->db->query("UPDATE all_ledgers SET deleteid='102' WHERE customer_id='166' AND debits='0' AND credits='0' AND party_type='5'  AND deleteid='0'");

                   
   $sgstOut='SGST OUT - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='585'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$sgstOut."'");


    $cgstOut='CGST OUT - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='586'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$cgstOut."'");

   $igstOut='IGST OUT - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='587'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$igstOut."'");

   $sgstIn='SGST IN - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='588'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$sgstIn."'");

   $cgstIn='CGST IN - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='589'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$cgstIn."'");

   $igstIn='IGST IN - '.$newModOrderNo;
$this->db->query("UPDATE all_ledgers SET deleteid=13 WHERE customer_id='590'  AND order_no='".$newModOrderNo."' AND party_type=5  AND deletemod='".$igstIn."'");
                   }


$queryc = $this->db->query("SELECT * FROM all_ledgers WHERE  order_id='".$value->id."' AND party_type=1  ORDER BY id DESC");
                        $ress = $queryc->result();

                        foreach ($ress as $ss) {
                            $order_no=$ss->order_no;
                        }

            if($order_no!=$value->order_no)
            {


                  $newModOrderNo=$value->order_no;
            $notes='Order Process-'.$newModOrderNo;
            $deletemod='ORDER'.$newModOrderNo;
            $this->db->query("UPDATE all_ledgers SET deletemod='".$deletemod."',notes='".$notes."',process_by='".$notes."',order_no='".$newModOrderNo."',reference_no='".$newModOrderNo."' WHERE order_id='".$value->id."' AND party_type=1");



                                   



            }



            //s $this->validateEntry($value->id);
          

                   
            
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


             if($value->commsision_amount>0)
            {
                   $commision_value=$value->commsision_amount;
            }








                         $arr=array('5','6');

                         if (in_array($value->finance_status, $arr))
                         {

                        $querycount = $this->db->query("SELECT * FROM all_ledgers WHERE  order_no='".$value->order_no."' AND commission_customer>0  ORDER BY id DESC");
                        $resultcount = $querycount->result();
                        $countset = count($resultcount);
                        if($countset==0)
                        {

                                   
                        $data_address_refer['order_no'] = $value->order_no;
                        $data_address_refer['difference'] = 0;
                        $data_address_refer['reference_no'] = $value->order_no;
                        $data_address_refer['credits'] = round($commision_value,2);
                        $data_address_refer['order_id'] = 0;
                        $data_address_refer['customer_id'] = 252;
                        $data_address_refer["payment_mode"] = 0;
                        $data_address_refer['user_id'] = 1769;
                        $data_address_refer['account_head_id'] = 48;
                        $data_address_refer['account_heads_id_2'] = 48;
                        $data_address_refer['order_trancation_status'] = 0;
                        $data_address_refer['bank_id'] = 0;
                        $data_address_refer['credits'] = round($commision_value,2);
                        $data_address_refer['debits'] = 0;
                        $data_address_refer['collected_amount'] = $commision_value;
                        $data_address_refer['payment_date'] = $value->payment_recived_date;
                        $data_address_refer['notes'] = 'Order Commission Updated';
                        $data_address_refer['process_by'] = 'Order Commission '.$value->order_no;
                        $data_address_refer['commission_customer'] =1;
                        $data_address_refer['sales_team_id'] =$value->sales_team_id;
                        $data_address_refer['payment_time'] = $value->payment_recived_time;
                        $data_address_refer['party_type'] = 5;
                        $data_address_refer['comission_transfered'] = 0;
                        $data_address_refer['deletemod'] = 'CMM'.$value->order_no;
                        
                       

                           if($commision_value>0)
                           {
                               $setchek = $this->Main_model->where_names('all_ledgers','deletemod',$data_address_refer['deletemod']);
                               if(count($setchek)==0)
                               {

                                       //$insertdatavals=$this->Main_model->insert_commen($data_address_refer, 'all_ledgers');

                                            $data_address_refer['credits'] = 0;
                                            $data_address_refer['debits'] = round($commision_value,2);
                                            $data_address_refer['collected_amount'] = round($commision_value,2);
                                            $data_address_refer['process_by'] = 'Commission Payment Debit Update '.$value->order_no;
                                            $data_address_refer['party_type'] = 5;
                                            $data_address_refer['deletemod'] = 'DPAY_SET_OR'.$insertdatavals;
                                            $deletemodset = 'DPAY_SET_OR'.$insertdatavals;
                                            $data_address_refer['comission_transfered'] = 5;
                                            $data_address_refer['account_head_id'] = 48;
                                            $data_address_refer['account_heads_id_2'] = 48;
                                            $result_cmm= $this->Main_model->where_names('all_ledgers','deletemod',$deletemodset);
                                            if(count($result_cmm)==0)
                                            {


                                                  //$this->Main_model->insert_commen($data_address_refer, 'all_ledgers');


                                            }


                                }
                           }
                           else
                           {


//$this->db->query("UPDATE all_ledgers SET credits='".round($commision_value,2)."' WHERE order_no='".$value->order_no."' AND commission_customer='1' AND customer_id='252'  AND party_type=1");




                           }
                           

                                
                                   


                        }

                    }






             $colorcount=1;
             if($tablename=='orders_process')
             {

            // $getcount = $this->db->query("SELECT count(order_no) as totcount FROM orders_process WHERE  order_no='".$value->order_no."' AND deleteid=0");
            //          $getcount = $getcount->result();
                           
            //               foreach($getcount as $st)
            //               {
            //                      $colorcount=$st->totcount;
            //               }


             }







                if($value->deleteid==0)
                {


                    if($value->order_no=='APR/30')
                    {
                        $commision_value='4231';
                    }

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
           




        if($value->tcs_status==0)
        {
             $value->tcsamount='';
        }


                   $mobile_order=$value->mobile_order;
                   $color='';
                   if($mobile_order=='1')
                   {
                     //$order_by='Customer';
                     if ($this->session->userdata['logged_in']['access'] != '31') {
                          $color='Customer-bg';
                     }
                   }


             if($tablename=='orders_process')
             {     

                if(round($commision_value)<0)
                {

                                                      
                                                                    

$this->db->query("UPDATE all_ledgers SET deleteid='65' WHERE customer_id='252' AND deleteid='0'  AND order_no='".$value->order_no."' AND party_type=5");

                }
                if($value->tcsamount<0)
                {

       
   
$this->db->query("UPDATE all_ledgers SET deleteid='64' WHERE customer_id='166' AND deleteid='0' AND order_no='".$value->order_no."' AND party_type=5");

                }

             }
  


             if($value->return_id>0)
             {

                  $update_date_return = "";
                  $orderby = $this->Main_model->where_names_two_order_by('order_sales_return_complaints', 'id', $value->return_id, 'deleteid', '0', 'id', 'DESC');
                   foreach ($orderby as $orderbyval) {
                    $update_date_return = date('d-M',strtotime($orderbyval->update_date));
                  }
                  $value->reason='Driver Returned on . '.$update_date_return.'. '.$value->reason;
             }




            
            $array[] = array('no' => $i,
                  'trip_id'=>$trip_id,
                  'vehicle_name'=>$vehicle_name,
                  'driver_name'=>$driver_name,
                  'color'=>$color,
                  'delivery_confirm_person' => $value->delivery_confirm_person,'delivery_confirm_date_time' => $value->delivery_confirm_date_time,'finance_status' => $value->finance_status,'id' => $value->id,'tcsamount' => $value->tcsamount,'colorcount' => $colorcount,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,'delivery_date' => $delivery_date_time,
                'enquiry_date' => $enqDate,
                'quotation_date' => $quoteDate,
                'order_date' => $orderDate,
                'reason_by' => $value->reason_by,
                'delivery_date_status' => $delivery_date_status);

               }


            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        
        
        
        echo json_encode($myData);
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
                 $sqlstatuss .= ' AND create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'" AND   order_base NOT IN ("22","-1","-2")';
             }
             else
             {
                 $sqlstatuss .= ' AND   order_base NOT IN ("22","-1","-2")';
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



         // get loged in user id
        $sess_array =$this->session->userdata['logged_in'];
        $user = $sess_array['userid'];

         //get categories
         $query = $this->db->query("SELECT a.production_print 
         FROM `user_category_filter` as a 
         WHERE a.user_login_id = '".$user."'   ");
         

        // Check if categories is set and not empty
        if (isset($_GET['categories'])) 
        {
             $category = $_GET['categories'];
        }
        else
        {
            $query = $query->row(); // Assuming you expect a single result
            $category = $query ? $query->production_print : "";
        }

        $category_val = $category;

        if ($category === "0"){
            $category = "";
            $category_val = "0";
        }

        if($category && $category != 'null' && !empty($category))
        {

              $categoriesArray = explode(',', $category);
                
        }

     


        $category_id = "";
        if (!empty($categoriesArray)) {
            // Include category filter
           
            $category_id = implode(',', $categoriesArray); // Convert array to comma-separated string
            $sqlstatuss .= ' AND EXISTS (
                SELECT 1
                FROM ' . $tablename_sub . ' AS sub
                WHERE sub.order_id = ' . $tablenamemain . '.id
                AND sub.categories_id IN (' . $category_id . ')
            )';
        }

      
        
        $order_id = $_GET['order_id'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE   deleteid=0  $sqlstatuss  ORDER BY count ASC");
        $resultcs = $resultmain->result();



        // Store category values against the login user
        if (!empty($category_val)) {
            // Check if the user ID exists in the table
            $userchek = $this->db->get_where('user_category_filter', array('user_login_id' => $user));
            $userdata = $userchek->row();

            if ($userdata) {
                // User ID exists, update the production_print field
                $data = array('production_print' => $category_val);
                $this->db->where('user_login_id', $user);
                $this->db->update('user_category_filter', $data);
            } else {
                // User ID doesn't exist, insert a new record
                $data = array(
                    'user_login_id' => $user,
                    'production_print' => $category_val
                );
                $this->db->insert('user_category_filter', $data);
            }
        }
        else
        {
                $data = array('production_print' => $category_val);
                $this->db->where('user_login_id', $user);
                $this->db->update('user_category_filter', $data);
        }









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
$tile_material_id=array();

$k=1;

           // $this->validateEntry($valuecs->id);
            
       if (isset($category_id) && !empty($category_id)) {
            $test = "yes";
            $result = $this->db->query("SELECT * FROM $tablename_sub WHERE order_id='" . $valuecs->id . "'
                AND categories_id IN (" . $category_id . ")
                AND deleteid=0 AND product_id>0
                ORDER BY categories_id,sort_id ASC");
        } else {
            $test = 'no';
            $result = $this->db->query("SELECT * FROM $tablename_sub WHERE order_id='" . $valuecs->id . "'
                AND deleteid=0 AND product_id>0
                ORDER BY categories_id,sort_id ASC");
        }




        $result = $result->result();


         foreach ($result as $valuess) {

         	    
              $product_ids[]=$valuess->product_id;
              

              if($valuess->tile_material_id>0)
              {
                $tile_material_id[]=$valuess->tile_material_id;
              }

               if($valuess->sub_product_id>0)
               {
                $tile_material_id[]=$valuess->sub_product_id;
              }
             
        }

                                                   

        $product_ids_set=array_unique($product_ids);
         $product_ids_set=implode(',',$product_ids_set);
        $product_ids_set=explode(',',$product_ids_set);

  $tile_material_id_set=array();
  if(count($tile_material_id)>0)
  {
       $tile_material_id_set=array_unique($tile_material_id);
       $tile_material_id_set=implode(',',$tile_material_id_set);
       $tile_material_id_set=explode(',',$tile_material_id_set);
  }   


        foreach ($result as $value) {
            $amountdata = $value->rate * $value->qty;
            $amount = $amountdata + $value->commission;
            $description = "";
            $product_name = "";

                     
           if(count($product_ids_set)>0)
           {
              $color_style ="white";
            
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
          }

           // if($value->tile_material_id>0 || $value->sub_product_id>0)
           // {

           //          //$color_style ="";
           //          for ($j=0; $j <count($tile_material_id_set); $j++)
           //         { 



           //            if($j % 2 == 0) 
           //            {
           //                if($tile_material_id_set[$j]==$value->tile_material_id || $tile_material_id_set[$j]==$value->sub_product_id)
           //                {
           //                           $color_style ="gray";
           //                }
           //             }

           //         }

           // }


if($value->sort_color!='')
{
            //$color_style=$value->sort_color;
}


$product_name_sub="";
  $product_list = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list as $csval) {
                
                $product_name_sub = $csval->product_name;

               if($csval->brand=='NO BRAND')
               {
                  $csval->brand='';
               }
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
                   if($csval->categories_id==19)
                   {

                        $colors=$csval->color.' '.$csval->thickness;
                        $product_name =str_replace($colors,'', $csval->product_name);

                                  
                   }
                   else
                   {
                        $product_name = $csval->product_name;
                   }

               }
                

               

               if($csval->brand=='NO BRAND')
               {
                  $csval->brand='';
               }

               //$colors=$csval->color.' '.$csval->thickness.' '.$csval->brand;

$colors=$csval->color.' '.$csval->thickness.' '.$csval->coating_mass.' '.$csval->yield_strength.' '.$csval->brand;


                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                if ($categories_id == '1') {
                    $cate_status = 1;
                }
                elseif ($categories_id == '630') {
                    $cate_status = 1;
                }
                 elseif ($categories_id == '2622') {
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
                elseif ($categories_id == '591' || $categories_id == '626' || $categories_id == '627' || $categories_id == '628') {
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


            if($value->nos>=0)
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
            



              if($uomstatus=='Nos' && $value->categories_id != "1")
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
                'subvalues' => $subvalues,
                'uom_image' => $uom_image,
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
            'order_id' => $valuecs->id,
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












    public function fetch_single_data_total_loop() {
        $amounttotal = 0;
        $Meter_to_Sqr_feet = 0;
        $Sqr_feet_to_Meter = 0;
        $discount = 0;
        $fullqty = 0;
        $nos = 0;
        $sst_set=0;
        $unit = 0;
        $fact = 0;
        $commission = 0; 
        $billtotal=0;
        $subtotal=0;
        $amounttotalgst = 0;
        $amounttotal_with_out_commission = 0;
        //$form_data = json_decode(file_get_contents("php://input"));
        $tablenamemain = 'orders_process';
        $tablename = 'order_product_list_process';
        $convert = 1;
        $get_gst_price=0;
        $old_fact_amount=0;
        $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($result as $value) {

            // $rate=$value->rate+$value->commission;
            // $amounttotal+= $rate*$value->qty;

            // gg changes

            $rate=$value->rate+$value->commission;
            $amounttotal_datas= $rate*$value->qty;

    
            $decimalPosition = strpos((string)$amounttotal_datas, '.');
            
            // Check if there's a decimal point and more than 2 digits after it
            if ($decimalPosition !== false && strlen(substr((string)$amounttotal_datas, $decimalPosition + 1)) > 2) {
                // Truncate to 2 decimal places without rounding
                $amounttotal_datas = floor($amounttotal_datas * 100) / 100;
            }
            
            // Format the number to two decimal places (this is optional if you just want to display it)
            $amounttotal_data = sprintf("%.2f", $amounttotal_datas);
            
            $amounttotal += $amounttotal_data;








            $amounttotal_with_out_commission+= $value->rate * $value->qty;
            $Meter_to_Sqr_feet+= $value->Meter_to_Sqr_feet;
            $Sqr_feet_to_Meter+= $value->Sqr_feet_to_Meter;
            $billtotal+= $rate * $value->qty;
            $commission+= $value->commission;
            $fullqty+= $value->qty;
            $nos+= $value->nos;
            $unit+= $value->unit;
            $fact+= $value->fact;

            $sst_set=1;
            $old_fact_amount+= $value->old_fact_amount;

//For GST Task, Creating SGST and CGST from july 1

            $create_date_check_gst= date('Y-m-d',strtotime($value->create_date));

            if($create_date_check_gst>'2024-02-20')
            {
                //For GST Task, Creating SGST and CGST from july 1
   
            $base_rate=round($rate*0.18,2);
            $gst_price=round($base_rate*$value->qty,2);


            }
            else
            {

//For GST Task, Creating SGST and CGST from july 1

                  $base_rate=round($rate*0.18,2);
            $gst_price=round($base_rate*$value->qty,2);



            }


            $amountset= $rate*$value->qty;
            $subtotal+= $rate*$value->qty;
            $get_gst_price+=$gst_price;


            $commssion_amount=round($amountset-$value->old_fact_amount,2);
            if($commssion_amount<0)
            {
                $commssion_amount=0;
            }
            $this->db->query("UPDATE $tablename SET amount='".$amountset."',commssion_amount='".$commssion_amount."' WHERE id='".$value->id."'");



        }



  //$amounttotalgstamt= $billtotal/1.18;
  //$amounttotalgst=$amounttotalgstamt*9/100;
  $subtotal_with_gst=$subtotal*1.18;
 // $amounttotalgst=round($subtotal_with_gst-$subtotal,2);

  // gg changes
  $amounttotalgst=$subtotal_with_gst-$subtotal;
 


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

        $create_date_check = '';
        //For GST Task, Creating SGST and CGST from july 1

        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            $mobile_order= $valuedis->mobile_order;
            $create_date_check= $valuedis->create_date;
            if($create_date_check > '2024-05-31'){
            $id = $valuedis->id;
            $datass_val['get_id'] = $id;
            $datass_val['gst_check'] = 1;
            $this->Main_model->update_commen($datass_val, $tablenamemain);
            $tablename_sub = $tablename;
            $datass['get_id'] = $id;
            $datass['gst_check'] = 1;
            $this->Main_model->update_commen_where($datass, 'order_id', $tablename_sub);

            }

        }
//For GST Task, Creating SGST and CGST from july 1

        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {

            $mobile_order= $valuedis->mobile_order;
            $production_assign = $valuedis->production_assign;
            $discount = $valuedis->discount;
            $order_no = $valuedis->order_no;
            $minisroundoff = $valuedis->roundoff;
            $roundoffstatus = $valuedis->roundoffstatus;
            $user_id = $valuedis->user_id;
            $discountPre = $valuedis->discountPre;
            $gate_login_view_status = $valuedis->gate_login_view_status;
              $convertion=$valuedis->convertion;
            $print_status = $valuedis->print_status;
            if($valuedis->user_id>0)
            {
                $user_id_check = $valuedis->user_id;
            }
            $create_date_check= $valuedis->create_date;
           
            $create_date = date('d/m/Y', strtotime($valuedis->create_date));
            $create_time = $valuedis->create_time;
            $reason = $valuedis->reason;
            $paricel_mode = $valuedis->paricel_mode;
            $order_base = $valuedis->order_base;
            $reason = $valuedis->reason;
            $customer_id = $valuedis->customer_id;
            $collection_remarks=$valuedis->collection_remarks;
            $SSD_check = $valuedis->SSD_check;
            $excess_payment_status = $valuedis->excess_payment_status;
            $payment_mode = $valuedis->payment_mode;


            //For GST Task, Creating SGST and CGST from july 1
            //Checking date for Auto GST
            if($create_date_check > '2024-05-31'){
                $gst_check = 1;
                // echo 'OK';
            }else{
                $gst_check = $valuedis->gst_check;
            }



            $gst_check = $valuedis->gst_check;
            $delivery_date_time = $valuedis->delivery_date_time;
            $mark_date = $valuedis->mark_date;

            $tcs_status=$valuedis->tcs_status;
            $tcsamount=$valuedis->tcsamount;
            $tcsamount_last=$valuedis->tcsamount;

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


        if($old_fact_amount>0)
        {


           
              
               $chh=date('2024-01-05');
              if($create_date_check>$chh)
              {

                   
                     $amounttotal_with_out_commission=$old_fact_amount;
                 


              }

              
            
        }        


         //For GST Task, Creating SGST and CGST from july 1
 
         // if($create_date_check > '2024-05-20'){
        //  $roundoffWithGst = round($roundoff * 1.18,2);

        // gg changes
        $roundoffWithGst = $roundoff * 1.18;
        //$roundoffWithGst = round($roundoff * 1.18,2);



         $total_sub_total_with_commission=$roundoffWithGst;
         $total_sub_total_with_out_commission=round($amounttotal_with_out_commission * 1.18,2);

        // }
        if($roundoffstatus == 1)
        {

              $discountfulltotal = $roundoff - $discount + $minisroundoff;
              //For GST Task, Creating SGST and CGST from july 1

            if($create_date_check > '2024-05-31'){
              $discountfulltotal = $roundoffWithGst - $discount + $minisroundoff;
             }
              $amounttotal_with_out_commission_val = $amounttotal_with_out_commission - $discount + $minisroundoff;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='+'; 


        } 
        else 
        {


              $discountfulltotal = $roundoff - $discount - $minisroundoff;

//For GST Task, Creating SGST and CGST from july 1

        if($create_date_check > '2024-05-31'){
              $discountfulltotal = $roundoffWithGst - $discount - $minisroundoff;
          }
              $amounttotal_with_out_commission_val = $amounttotal_with_out_commission - $discount - $minisroundoff;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='-';

        }





        $credit_limit = 0;
        $approved_status = 1;
        $payment_terms = "";
        $delivery_status_check = "";
        $account_number = "";
        $last_bill_amount_total=0;
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
$tcs_status_customer = $csvalv->tcs_status;
$gst_view = $csvalv->gst;


            if ($payment_terms == "Credit") {
                $delivery_status_check = 2;
            }

            if ($payment_terms == "Cash & Carry") {
                $delivery_status_check = 1;
            }


            $last_bill_amount_total = $csvalv->last_bill_amount_total;
        }


          $tcsamount=0;
          $orgtcsamount=0;
          $withput_tcsamount=0;
          $table = array("orders","orders_process", "orders_quotation");

          if (in_array($tablenamemain, $table))
          {

             if($tcs_status==1)
              {

                            $tcsamount=round($discountfulltotal*0.1/100);
                            $orgtcsamount=round($discountfulltotal_base*0.1/100);
                            $withput_tcsamount=round($amounttotal_with_out_commission_val*0.1/100);


                             $finacel_year=date('2024-04-01');

                        if($create_date_val>=$finacel_year)  
                        {



                        $resultset = $this->db->query("SELECT SUM(a.bill_total) as totalamount FROM $tablenamemain as a  WHERE  a.id<'".$_GET['order_id']."' AND a.order_base = '1' AND a.create_date>='".$finacel_year."'  AND a.customer_id='".$customer_id."'");
                         $resultset = $resultset->result();
                   
                        foreach ($resultset as $set)
                       {
                                          $set->totalamount=$set->totalamount+$last_bill_amount_total;
                                          $tcsamountval=round($set->totalamount,2);
                                          $tcsamountvaldata=  $tcsamountval+$discountfulltotal;
                                          if($tcsamountvaldata>5000000)
                                          {
                                                $tcs_status=1;
                                                $tcsamount=round($discountfulltotal*0.1/100);
                                                $orgtcsamount=round($discountfulltotal_base*0.1/100);
                                                $withput_tcsamount=round($amounttotal_with_out_commission_val*0.1/100);
                                          }
                                          else
                                          {
 
                                                 $tcs_status=0;
                                                 $tcsamount=0;
                                                 $withput_tcsamount=0;

                                          }


            $this->db->query("UPDATE $tablenamemain SET tcs_status='" . $tcs_status . "',tcsamount='".$tcsamount."' WHERE id='" .$_GET["order_id"] ."'");
                                          
                                
                               
                             }


                        }   





              }
              
              if($tcs_status==0)
              {



                          $finacel_year=date('2024-04-01');

                        if($create_date_val>=$finacel_year)  
                        {



                       
                        $resultset = $this->db->query("SELECT SUM(a.bill_total) as totalamount FROM $tablenamemain as a  WHERE  a.id<'".$_GET['order_id']."' AND a.order_base = '1' AND a.create_date>='".$finacel_year."' AND a.customer_id='".$customer_id."'");
                         $resultset = $resultset->result();
                   
                        foreach ($resultset as $set)
                        {




                                          $set->totalamount=$set->totalamount+$last_bill_amount_total;
                                          $tcsamountval=round($set->totalamount,2);
                                          $tcsamountvaldata=  $tcsamountval+$discountfulltotal;
                                          if($tcsamountvaldata>5000000)
                                          {

                                                $tcs_status=1;
                                                $tcsamount=round($discountfulltotal*0.1/100);
                                                $orgtcsamount=round($discountfulltotal_base*0.1/100);
                                                $withput_tcsamount=round($amounttotal_with_out_commission_val*0.1/100);
                                                
                                          }
                                          else
                                          {
 
                                                 $tcs_status=0;
                                                 $tcsamount=0;
                                                 $withput_tcsamount=0;

                                          }


                                        
                                         
                                          if($tcs_status_customer!='2')
                                          {

                                             
           

        $this->db->query("UPDATE $tablenamemain SET tcs_status='" . $tcs_status . "',tcsamount='".$tcsamount."' WHERE id='" .$_GET["order_id"] ."'");
        $this->db->query("UPDATE customers SET tcs_status='" . $tcs_status . "' WHERE id='" .$customer_id ."'" );

            

                                          }
                                          else
                                          {

                                              $tcs_status=0;
                                              $tcsamount=0;
                                              $withput_tcsamount=0;

                                          }

                                
                               
                         }


                        }  




             }


          }

          if($tcsamount_last>0)
          {
            //$tcsamount=$tcsamount_last;
            //$tcs_status=1;
            //$this->db->query("UPDATE $tablenamemain SET tcs_status='" . $tcs_status . "',tcsamount='".$tcsamount."' WHERE id='" .$_GET["order_id"] ."'" );
          }



                $discountfulltotal=$discountfulltotal+$tcsamount;
                $org_fulltotal=$discountfulltotal_base+$orgtcsamount;
                $org_fulltotal_without_commision=$amounttotal_with_out_commission_val+$withput_tcsamount;





//             $discountfulltotal_tst = round($discountfulltotal,2); 
// //For GST Task, Creating SGST and CGST from july 1            
//             $discountfulltotalRaw = round($discountfulltotal,2);                   
//             $whole = explode('.',$discountfulltotal); 
//             $decimal1=0;
//             if(isset($whole[1]))
//             {
//                $decimal1 = '0.'.$whole[1];
//             }
//             $totalval= round($decimal1,2);


//             $roundoffstatusval_data="";
//             $getdataminis=0;



         // gg changes 

         $discountfulltotal_tst = round($discountfulltotal,2); 
         //For GST Task, Creating SGST and CGST from july 1            
         $discountfulltotalRaw = round($discountfulltotal,2); 
         

         $amounttotalgst_roundoff=$roundoff*0.18/2;
         if (strpos($amounttotalgst_roundoff, '.') !== false && strlen(substr(strrchr($amounttotalgst_roundoff, "."), 1)) > 2) {
             // Only truncate if more than 2 digits after decimal
             $amounttotalgst_roundoff = floor($amounttotalgst_roundoff * 100) / 100;
         }
         $amounttotalgst_roundoff_total = sprintf("%.2f", $amounttotalgst_roundoff);

         $discountfulltotal_roundoff=$roundoff + $amounttotalgst_roundoff_total + $amounttotalgst_roundoff_total;


            $whole = explode('.',$discountfulltotal_roundoff); 
            $decimal1=0;
            if(isset($whole[1]))
            {
               $decimal1 = '0.'.$whole[1];
            }
            $totalval= $decimal1;


            $roundoffstatusval_data="";
            $getdataminis=0;





            if($totalval!=0)
            {

                     $symble="+";
                    if($totalval>0.5)
                    {
                           $getplusevalue=1-$totalval;
                           $discountfulltotal=round($discountfulltotal+$getplusevalue);
                          
                           if($getplusevalue>0)
                           {
                             $getdataminis=$getplusevalue;
                             $symble="+";
                             $roundoffstatusval_data=$getplusevalue;
                           }

                          


                    }
                    elseif($totalval == 0.5){

                        $getplusevalue=$totalval;
                        $round_full_total=round($discountfulltotal,2);
                        $discountfulltotal=round($round_full_total);

                        if($totalval>0)
                        {
                            $getdataminis=$totalval;
                            $symble="+";
                            $roundoffstatusval_data=$totalval;
                        }


                    }
                    else
                    {



                            $discountfulltotal=round($discountfulltotal-$totalval);

                           if($totalval>0)
                           {
                               $getdataminis=$totalval;
                               $symble="-";
                               $roundoffstatusval_data=$totalval;
                           }
                           

                    }


                      if($tablenamemain == 'orders_process') 
                       {
                                       $autoroundoff_deletemod='AUTOROUND-'.$order_no;
                                      if($symble=='+')
                                      {

                    $this->db->query("UPDATE all_ledgers SET credits='".$getplusevalue."',debits='0' WHERE order_no='".$order_no."' AND customer_id='372' AND deletemod='".$autoroundoff_deletemod."' AND party_type=5");

                                      }
                                      else
                                      {

                           $this->db->query("UPDATE all_ledgers SET  debits='".$totalval."',credits='0' WHERE order_no='".$order_no."' AND customer_id='372' AND deletemod='".$autoroundoff_deletemod."' AND party_type=5");             

                                      }  


                                $DISCOUNT_DELETEMOD='DISCOUNT-'.$order_no;
                                $this->db->query("UPDATE all_ledgers SET  debits='".$discount."',credits='0' WHERE order_no='".$order_no."' AND customer_id='220' AND deletemod='".$DISCOUNT_DELETEMOD."' AND party_type=5");     
                                 $ninePerc = round($org_fulltotal * 0.09,2);
                                 $sGstDMode='SGST OUT - '.$order_no;

                                 
                                 $ninePerc=$amounttotalgst/2;   

                                $this->db->query("UPDATE all_ledgers SET  credits='$amounttotalgst_roundoff_total',debits='0' WHERE order_no='$order_no' AND customer_id='585'  AND party_type=5");    

                                 $cGstDMode='CGST OUT - '.$order_no;
                                $this->db->query("UPDATE all_ledgers SET  credits='$amounttotalgst_roundoff_total',debits='0' WHERE order_no='$order_no' AND customer_id='586'  AND party_type=5");    


                       }




            }
            else
            {

                $discountfulltotal=round($discountfulltotal);
                
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
            // $queryget = $this->db->query("SELECT * FROM all_ledgers  WHERE deleteid='0'   AND order_id='" . $_GET['order_id'] . "'  AND party_type='1' AND debits>=0");
            // $resultgg = $queryget->result();
            // foreach ($resultgg as  $valuegg) {
            //     $le_amount_check=$valuegg->debits;
            // }


             if($tablenamemain == 'orders_process') 
             {



                $data_roundoff['order_id'] = 0;
                $data_roundoff['customer_id'] =372;
                $data_roundoff['user_id'] = $this->userid;
                $data_roundoff['notes'] = 'Round off - Order Process ' . $order_no;
                $data_roundoff['deletemod'] = 'ROUND-'.$order_no;
                $data_roundoff['credits'] =  $minisroundoff;
                $data_roundoff['debits'] =  0;
                $data_roundoff['order_no'] = $order_no;
                $data_roundoff['reference_no'] = $order_no;
                $data_roundoff['party_type'] = 5;
                $data_roundoff['account_head_id'] = 372;
                $data_roundoff['account_heads_id_2'] = 372;
                $data_roundoff['payment_date'] = $create_date_val;
                $data_roundoff['payment_time'] = date('h:i A');
                $data_roundoff['bank_id'] = 0;

                       if($order_base=='-2')
                        {
                          if($mobile_order==1)
                           {

                                   $data_roundoff['deleteid'] = 1021;
                            }

                        }
                
                if($minisroundoff>0)
                {


                    $rounoffcheck=$this->db->query("SELECT id  FROM all_ledgers  WHERE deletemod='".$data_roundoff['deletemod']."' AND order_no='".$order_no."' AND party_type=5 AND customer_id=372");
                    $rounoffcheck = $rounoffcheck->result();
                    if(count($rounoffcheck)==0)
                    {
                          $this->Main_model->insert_commen($data_roundoff , 'all_ledgers');
                    }
                    else
                    {
                        

                         $this->db->query("UPDATE all_ledgers SET credits='".$minisroundoff."',debits=0 WHERE deletemod='".$data_roundoff['deletemod']."' AND order_no='".$order_no."' AND party_type=5 AND customer_id=372");


                    }


                }



                       
                              $totaldebit=round($discountfulltotal,2);
 $debits_last_value=0;
            $debits_value=$this->db->query("SELECT debits  FROM all_ledgers  WHERE order_id='".$_GET['order_id']."' AND order_no='".$order_no."' AND party_type=1  AND deleteid=0");
            $debits_value = $debits_value->result();
            foreach ($debits_value as $ss) {
                $debits_last_value = $ss->debits;
            }

if($debits_last_value!=$totaldebit)
{

    
$this->db->query("UPDATE all_ledgers SET debits='".$totaldebit."' WHERE order_id='".$_GET['order_id']."' AND order_no='".$order_no."' AND party_type=1  AND deleteid=0");



}

$this->db->query("UPDATE all_ledgers SET order_date='".$create_date_check."',update_date=update_date  WHERE order_id='".$_GET['order_id']."' AND order_no='".$order_no."' AND party_type=1  AND deleteid=0");



                        


             }



   $bill_total=round($discountfulltotal,2);

$gstValue = 0;
if($create_date_check > '2024-05-31'){

$gstValue =$get_gst_price;

}

               $chh=date('2024-01-05');
              if($create_date_check>$chh)
              {

                    if($commission_check_fact==1)
                     {


                        $this->db->query("UPDATE $tablenamemain SET  bill_total_fact='" .round($org_fulltotal_without_commision + $gstValue) . "',without_commsision_total='" . round($org_fulltotal_without_commision + $gstValue) . "' WHERE id='" .$_GET["order_id"] ."'" );

                     }


                    if($commission_check==1)
                    {


                         $this->db->query("UPDATE $tablenamemain SET bill_total_rate='" .round($org_fulltotal_without_commision + $gstValue) . "',without_commsision_total='" . round($org_fulltotal_without_commision + $gstValue) . "' WHERE id='" .$_GET["order_id"] ."'" );

                    }

             }
             else
             {


                    if($commission_check_fact==1)
                     {


                        $this->db->query("UPDATE $tablenamemain SET  bill_total_fact='" .round($without_commsision_total + $gstValue) . "' WHERE id='" .$_GET["order_id"] ."'" );

                     }


                    if($commission_check==1)
                    {


                         $this->db->query("UPDATE $tablenamemain SET bill_total_rate='" .round($without_commsision_total + $gstValue) . "' WHERE id='" .$_GET["order_id"] ."'" );

                    }

             }

  


         if($commission_check_fact==0 && $commission_check==0)
         {


             $this->db->query("UPDATE $tablenamemain SET without_commsision_total='" . $bill_total . "' WHERE id='" .$_GET["order_id"] ."'" );
    


         }



if($commission_check_fact==0)
{


$this->db->query("UPDATE $tablenamemain SET bill_total_rate='" .round($org_fulltotal_without_commision + $gstValue) . "',without_commsision_total='" . round($org_fulltotal_without_commision + $gstValue) . "' WHERE id='" .$_GET["order_id"] ."'" );

}

$this->db->query("UPDATE $tablenamemain SET bill_total='" . $bill_total . "' WHERE id='" .$_GET["order_id"] ."'" );
    















$credit_limit_status='0';



$tabless = array("orders","orders_quotation");
if(in_array($tablenamemain, $tabless))
{
            


if($credit_status=='YES')
{


            if($credit_limit>0)
            {

                         $credit_limit_set=$credit_limit;
                         $credit_limit_check=0;
   

                         $getstatus=1;
                         $queryget=$this->db->query("SELECT SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit FROM all_ledgers  as a  WHERE  a.deleteid='0' AND a.party_type=1   AND a.customer_id='".$customer_id."'  AND a.cnn_status=0 ORDER BY a.id DESC");
                     
                         $resultgg = $queryget->result();
                         foreach ($resultgg as  $valuegg) 
                         {
                                                    $valueset=$valuegg->totalcridit-$valuegg->totaldebit;
                                                    if($valueset>=0)
                                                    {
                                                        $getstatus=1;
                                                        $getstatus2='CR';

                                                    }
                                                    else
                                                    {
                                                        $getstatus=0;
                                                        $getstatus2='DR';
                                                    }
                                                    $credit_limit_check=str_replace('-','', $valueset);
                                                    

                         }

                   

                      if($credit_limit_check>=0)
                      {

                              $credit_limit_check_val=$credit_limit_check-$bill_total;



                              if($getstatus==1)
                              {


                               $credit_limit=$credit_limit+$credit_limit_check;
                              

                              }
                              else
                              {
                                $credit_limit=$credit_limit-$credit_limit_check;
                              }
                             

                              
                              $excess=$bill_total-$credit_limit;
                              
                              

                              if($credit_limit<$bill_total)
                              {




$credit_limit_status="Closing Balance - ".$getstatus2." : ".round($credit_limit_check).", Credit Limit : ".$credit_limit_set.", Excess :  ".round($excess);
$this->db->query("UPDATE $tablenamemain SET reason='".$credit_limit_status."' WHERE id='".$_GET['order_id']."' AND order_base=0");



                              }
                              else
                              {


                                        if($tablenamemain=='orders')
                                        {
                                            $ss='Open Enquiry';
                                        }
                                        else
                                        {
                                             $ss='Open Quotation';
                                        }


                                         
                        $this->db->query("UPDATE $tablenamemain SET reason='".$ss."' WHERE id='".$_GET['order_id']."' AND order_base=0");



                              }


                      }
                   


            }
            else
            {
                                if($tablenamemain=='orders')
                                {
                                    $ss='Open Enquiry';
                                }
                                else
                                {
                                     $ss='Open Quotation';
                                }


                                $this->db->query("UPDATE $tablenamemain SET reason='".$ss."' WHERE id='".$_GET['order_id']."' AND order_base=0");
            }




        }
        else
        {


                                   if($tablenamemain=='orders')
                                    {
                                        $ss='Open Enquiry';
                                    }
                                    else
                                    {
                                         $ss='Open Quotation';
                                    }
                                   $this->db->query("UPDATE $tablenamemain SET reason='".$ss."' WHERE id='".$_GET['order_id']."' AND order_base=0");
     
        }


    }
















if($roundoff_val=='-')
{
    $minisroundoffround=$minisroundoff+$getdataminis;
}
else
{
    $minisroundoffround=$minisroundoff+$getdataminis;
}

$minisroundoffround=round($minisroundoffround,2);



    

         if($approved_status <= 0)
         {

                    if($tablenamemain=='orders_quotation')
                    {

                       $credit_limit_status = 'Customer Verification Pending';

                    }


            if($tablenamemain!='orders_process')
            {

            $cc = "Customer Verification Pending";
            $this->db->query("UPDATE $tablenamemain SET reason='" .  $cc ."' WHERE id='" . $_GET["order_id"] ."' AND order_base>=0");

            }
                      
            
         }

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

            if($valuedis->create_date > '2024-05-31'){
                
                $commision_value = $commision_value * 1.18;
                $commision_value = round($commision_value);

                if($tcsamount>0)
                {


             $commision_value =round($total_sub_total_with_commission-$total_sub_total_with_out_commission);
                       
                }



            } 



  $this->db->query("UPDATE $tablenamemain SET commsision_amount='" .  $commision_value ."' WHERE id='" . $_GET["order_id"] ."'");          
       
  if($tablenamemain == 'orders_process') 
  {


  $this->db->query("UPDATE $tablenamemain SET bill_sub_total='" .  $fulltotal ."' WHERE id='" . $_GET["order_id"] ."'");          

                   $tcsset='TCS-'.$order_no;

                  $tcscheck=$this->db->query("SELECT id  FROM all_ledgers  WHERE deletemod='".$tcsset."' AND order_no='".$order_no."' AND party_type=5 AND customer_id=166");
                    $tcscheck = $tcscheck->result();
                    if(count($tcscheck)==0)
                    {



                        $data_tcs['order_id'] = 0;
                        $data_tcs['customer_id'] = 166;
                        $data_tcs['user_id'] = $this->userid;
                        $data_tcs['notes'] = 'TCS - Order Process ' . $order_no;
                        $data_tcs['credits'] =  $tcsamount;
                        // $data_tcs['debitstoatal'] =  $tcsamount;
                        $data_tcs['order_no'] = $order_no;
                        $data_tcs['reference_no'] = $order_no;
                        $data_tcs['party_type'] = 5;
                        $data_tcs['account_head_id'] = 142;
                        $data_tcs['account_heads_id_2'] = 142;
                        $data_tcs['payment_date'] = $create_date_val;
                        $data_tcs['payment_time'] = date('h:i A');

                        $data_tcs['tcs_status'] = 1;

                        $data_tcs['deletemod'] = $tcsset;
                        
                        $data_tcs['bank_id'] = 0;

                        if($order_base=='-2')
                        {
                          if($mobile_order==1)
                           {

                                   $data_tcs['deleteid'] = 1021;
                            }

                        }

                        if($tcsamount>0)
                        {
                            $this->Main_model->insert_commen($data_tcs, 'all_ledgers');
                        }
                        
                        



                    }
                    else
                    {

                          if($tcsamount>0)
                        {
                            if($tcs_status=='1')
                            {


                              $deleteids=0;
                              if($order_base=='-1')
                              {
                                 $deleteids=13;
                              }

                              if($order_base=='-2')
                              {
                                 $deleteids=1021;
                              }

$this->db->query("UPDATE all_ledgers SET credits='".$tcsamount."',debits=0,deleteid='".$deleteids."' WHERE customer_id='166'  AND order_no='".$order_no."' AND party_type=5  AND deletemod='".$tcsset."'");
                            }

                        }

                          if($tcs_status!='1')
                            {

$this->db->query("UPDATE all_ledgers SET deleteid='34' WHERE customer_id='166'  AND order_no='".$order_no."' AND party_type=5  AND deletemod='".$tcsset."'");

                            }

                    }

     


  }





            if($commision_value>0)
            {


             if($tablenamemain == 'orders_process') 
             {







$de='CMM'.$order_no;
$this->db->query("UPDATE all_ledgers SET credits='".$commision_value."',debits=0 WHERE customer_id='252'  AND order_no='".$order_no."' AND party_type=5  AND deleteid=0  AND deletemod='".$de."'");

//$this->db->query("UPDATE all_ledgers SET md_verification='0',notes='commission value Changed Re-Updated' WHERE customer_id='252'  AND order_no='".$order_no."' AND party_type=5  AND deleteid=0  AND deletemod='".$de."' AND md_verification=1 AND collected_amount!='".$commision_value."'");

$this->db->query("UPDATE all_ledgers SET debits='".$commision_value."',credits=0 WHERE customer_id='252'  AND order_no='".$order_no."' AND party_type=5  AND deleteid=0 AND account_head_id=154 AND credits=0");



//$this->db->query("UPDATE all_ledgers SET credits='".$commision_value."' WHERE customer_id='252'  AND order_no='".$order_no."' AND party_type=5  AND deleteid=0 AND account_head_id=48");




             }



            }


            if($collection_remarks>0)
            {
                $collection_remarks=$collection_remarks;
            }
            else
            {
                $collection_remarks=$discountfulltotal;
            }

//For GST Task, Creating SGST and CGST from july 1

            if($create_date_check > '2024-05-31'){
                $fullTotal = round($discountfulltotal_base,2);
                $org_fulltotal = round($discountfulltotal - $minisroundoffround, 2);
            }else{
                $fullTotal = round($discountfulltotal_base-$amounttotalgst,2);
                $org_fulltotal =  round($org_fulltotal,2);
            }

  if($tablenamemain == 'orders_process') 
  {


  $this->db->query("UPDATE $tablenamemain SET bill_sub_total='".$fullTotal."' WHERE id='" . $_GET["order_id"] ."'");          


   }

if($tcs_status==1)
{
    $this->db->query("UPDATE customers SET tcs_status='" . $tcs_status . "' WHERE id='" .$customer_id ."' AND tcs_status=0");
}


          $array = [
            "order_no_id" => $order_no,
            "commissiontotal" => $commision_value,
            "collection_remarks" => $collection_remarks,
            "bank_name" => $bank_name,
            "ifsccode" => $ifsccode,
            "branch" => $branch,
            "print_status"=>$print_status,
            "approved_status"=>$approved_status,
            "customer_id"=>$customer_id,
            "account_number" => $account_number,
            "convertion"=>$convertion,
            "gate_login_view_status"=>$gate_login_view_status,
            "delivery_status_check" => $delivery_status_check,
            "minisroundoffround" => $minisroundoffround,
            "SSD_check" => $SSD_check,
            "tcs_status"=>$tcs_status,
            "gst_view" => $gst_view,
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
            "credit_limit_status" => $credit_limit_status,
            "reason" => $reason,
            "paricel_mode" => $paricel_mode,
            "production_assign" => $production_assign,
            "mark_date" => $mark_date,
            "create_date" => $create_date,
            "create_time" => $create_time,
            "minisroundoff" => $minisroundoff,
            "roundoff_val" => $roundoff_val,
            "symble"=>$symble,
            "roundoffstatusval_data" => $roundoffstatusval_data,
           //For GST Task, Creating SGST and CGST from july 1
 "create_date_formatted" => $create_date_check,
            //Removed GST Amount from total
            // "fulltotal" => round($discountfulltotal_base-$amounttotalgst, 3),
            "fulltotal" =>  $fullTotal,

//For GST Task, Creating SGST and CGST from july 1

            //Roundoff from grandtotal
            // "org_fulltotal" => round($org_fulltotal, 2),
            "org_fulltotal" => $org_fulltotal,
            "discountfulltotal" => round($discountfulltotal, 2),
            "totalitems" => count($result),


            // "gsttotal" => round($amounttotalgst/2, 3),
            //gg changes
            "gsttotal" => $amounttotalgst_roundoff_total,


            "discount" => round($discount,2),
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
            "sst_set"=>$sst_set
        ];
            echo json_encode($array);
        
    }
    
    
 public function fetch_data_complaints_table() {
        
        date_default_timezone_set('Asia/Kolkata');
        
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
        $sqls1="";
        if ($search != "") {


            $where = " AND a.re_order_no LIKE '%" . $search . "%' OR a.order_no LIKE '%" . $search . "%'  OR b.name LIKE '%" . $search . "%' OR a.customer_id LIKE '%" . $search . "%'";

        }        
        if($this->session->userdata['logged_in']['access']==11 || $this->session->userdata['logged_in']['access']==12)
        {
          
          
            $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('admin_users','define_saleshd_id',$sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $sqls = ' AND  a.sales_id IN (' . $sales_team_id . ')';
            $sqls1 = ' AND  sales_id IN (' . $sales_team_id . ')';
             
        }
        
        
        
            $i = 1;
            $array = array();
            
            
            $querycount = $this->db->query("SELECT a.*,b.name FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            $query = $this->db->query("SELECT a.*,b.name FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
       
        
        
        
        
        foreach ($result as $value) {
         
               
               $createDate = $value->invoice_date;
               $reOrderNum = $value->re_order_no;
               $totalqty=0;
               $totalamountGST = 0;
                $totalamount=0;
                $query_profle_get = $this->db->query("SELECT * FROM sales_return_products  WHERE c_id='".$value->id."' AND deleteid=0");
                $result_lengeth = $query_profle_get->result();
                foreach ($result_lengeth as $valuess)
                {      
                    
                          $totalqty+=$valuess->qty;
                          $totalamount += round($valuess->qty*$valuess->rate);
                          $totalamountGST += round(($valuess->qty*$valuess->rate) * 1.18);
                    
                       
                }
                    
         
                if($value->id=='106')
               {
                  $totalamount=$totalamount+61.1;
               }


              $totalamount= round($totalamount,2);

              if($createDate > '2024-05-31')
              {



              //$this->db->query("UPDATE $tablename SET bill_total='".$totalamountGST."' WHERE id='".$value->id."'");
              // echo $reOrderNum;
              // exit;
              if($reOrderNum != '')
              {





if($totalamountGST>0)
{

    $reOrderNumss='RE-'.$value->id;
     //$this->db->query("UPDATE all_ledgers SET credits='".$totalamountGST."' WHERE reference_no = '".$reOrderNum."'   AND account_heads_id_2 = 2 AND account_head_id = 68 AND deletemod='".$reOrderNumss."'");




}

             
       $withGST = $totalamountGST;
       $withOutGST = $totalamountGST / 1.18;
       $diffrence = $withGST - $withOutGST;
       $ninePerc = round(($diffrence / 2), 2);

//$this->db->query("UPDATE all_ledgers SET debits='".$ninePerc."' WHERE deletemod = 'SGST OUT - ".$reOrderNum."'   AND customer_id = 585 AND party_type = 5");
//$this->db->query("UPDATE all_ledgers SET debits='".$ninePerc."' WHERE deletemod = 'CGST OUT - ".$reOrderNum."'   AND customer_id = 586 AND party_type = 5");


              }

              $totalamount= round($totalamountGST,2);


          }
          else
          {

              //$this->db->query("UPDATE $tablename SET bill_total='".$totalamount."' WHERE id='".$value->id."'");

          }

               if($value->re_order_no!='')
               {


$this->db->query("UPDATE all_ledgers SET return_invoice_date='".$value->update_date."',payment_date='".$value->update_date."' WHERE reference_no='".$value->re_order_no."'  AND notes='Sales Return'  ");
               
               }



              
                $res = $this->db->query("SELECT reason,create_date,customer_id,id,user_id FROM orders_process  WHERE order_no='".$value->order_no."' AND deleteid=0");
                $res = $res->result();
                foreach ($res as $valuess)
                {      
                    
                           $reason=$valuess->reason;
                           $user_id=$valuess->user_id;
                           $create_date=$valuess->create_date;
                           $customer_id=$valuess->customer_id;
                           $order_id=$valuess->id;
                           $company_name="";
 
                                         // $resultvordervv= $this->Main_model->where_names('customers','id',$customer_id);
                                         // foreach ($resultvordervv as  $value2) {
                                                     
                                         //               $company_name=$value2->company_name;
                                                      
                                         // }   

//$this->db->query("UPDATE order_sales_return_complaints SET customer='".$customer_id."',customer_id='".$company_name."',order_id='".$order_id."' WHERE id='".$value->id."'");

                          // $this->db->query("UPDATE orders_process SET return_id='".$value->id."'  WHERE id='".$order_id."'");
                       
                }



           


            if($value->deleteid==0)
            {



               $queryss = $this->db->query("SELECT b.username as sales_person  FROM  admin_users as b  WHERE  b.id='" . $user_id . "'   ORDER BY b.id ASC");
                     $results = $queryss->result();
                     foreach ($results as  $values) {
                        $sales_person=$values->sales_person;
                     }

                      $array[] = array('no' => $i, 'id' => $value->id,'reason' => $reason,'driver_delivery_status'=>$value->driver_delivery_status,'amount' => $totalamount,'order_base' => $value->order_base,'driver_return' => $value->driver_return,'order_by' => $value->name,'qty'=>round($totalqty,2),'customer_id'=>$value->customer_id,'order_no' => $value->order_no,'re_order_no' => $value->re_order_no,'sales_person' => $sales_person, 'remarks' => $value->remarks, 'product_id' => $value->product_id,'create_date' => date('d-m-Y', strtotime($value->update_date)),'invoice_date' => date('d-m-Y', strtotime($value->invoice_date)),'update_date' => date('d-m-Y', strtotime($value->update_date)));
                $i++;





               // if($value->order_base == '5')
              // {




              // if($value->update_date > '2024-05-31'){



                // $re_order_no = $value->re_order_no;
                // $withGSTAmount = $value->bill_total;
                // $withoutGSTAmount = $value->bill_total / 1.18;
                // $data_address_driver = 'RE-'.$value->id;
                // $data_sGst['order_id'] = 0;
                // $data_sGst['customer_id'] =585;
                // $data_sGst['user_id'] = $user_id;
                // $data_sGst['notes'] = 'SGST - Order Process ' . $re_order_no;
                // $data_sGst['deletemod'] = 'SGST OUT - '.$re_order_no;
                // $data_sGst['debits'] =   ($withGSTAmount - $withoutGSTAmount) / 2;
                // $data_sGst['amount'] =   ($withGSTAmount - $withoutGSTAmount) / 2;
                // $data_sGst['order_no'] = $data_address_driver;
                // $data_sGst['reference_no'] =  $re_order_no;
                // $data_sGst['party_type'] = 5;
                // $data_sGst['process_by'] = 'Sales Return SGST';
                // $data_sGst['account_head_id'] = 142;
                // $data_sGst['account_heads_id_2'] = 142;
                // $data_sGst['payment_date'] =  $value->update_date;
                // $data_sGst['payment_time'] = $value->update_time;
                // $data_sGst['deleteid'] = '0';
                //     $data_sGst['bank_id'] = 0;
                // //$this->Main_model->insert_commen($data_sGst , 'all_ledgers');

                // $data_cGst['order_id'] = 0;
                // $data_cGst['customer_id'] =586;
                // $data_cGst['user_id'] = $user_id;
                // $data_cGst['notes'] = 'CGST - Order Process ' .  $re_order_no;
                // $data_cGst['deletemod'] = 'CGST OUT - '. $re_order_no;
                // $data_cGst['debits'] =     ($withGSTAmount - $withoutGSTAmount) / 2;
                // $data_cGst['amount'] =    ($withGSTAmount - $withoutGSTAmount) / 2;
                // $data_cGst['order_no'] = $data_address_driver;
                // $data_cGst['reference_no'] =$re_order_no;
                // $data_cGst['party_type'] = 5;
                // $data_cGst['process_by'] = 'Sales Return CGST';

                // $data_cGst['account_head_id'] = 142;
                // $data_cGst['account_heads_id_2'] = 142;
                // $data_cGst['payment_date'] = $value->update_date;
                // $data_cGst['payment_time'] =  $value->update_time;
                // $data_cGst['deleteid'] = '0';
                //     $data_cGst['bank_id'] = 0;
                // //$this->Main_model->insert_commen($data_cGst , 'all_ledgers');
//}     
                                                    
   // }   






            }



                 
            
            
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }

    public function pick_list_view()
    {
          if (isset($this->session->userdata['logged_in'])) {
              $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
              $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
              $data['remarks'] = $this->Main_model->where_names_order_by('remarks', 'deleteid', '0', 'id', 'ASC');
  
              //get other option provision
              $query = $this->db->query("SELECT a.value 
              FROM `common_setting` as a 
              WHERE a.name = 'other_option'   ");
              $query = $query->row(); // Assuming you expect a single result
  
              $data['common_setting'] = $query ? $query->value : "";
  
              $data['DC_id_data']=$_GET['DC_id'];
  
  
  $query = $this->db->query("SELECT *  FROM order_delivery_order_status  WHERE  order_id='" . $_GET['id'] . "' AND delivery_notes_status=1 AND randam_id IS NOT NULL ");
  $data['DC_list'] = $query->result();
  
  
  // dispatch_status upload image
  
  $query123 = $this->db->query("SELECT dispatch_load_status FROM order_delivery_order_status  WHERE  order_id='" . $_GET['id'] . "' AND randam_id='" . $_GET['DC_id'] . "'");
  $data['dispatch_status_upload'] = $query123->row();
  
  
  
  
              $neworder_id = 1;
              $data['id'] = $_GET['id'];
              $data['vehicle_id'] = '-1';
              $data['trip_id'] = '0';
              $order_last_count = $this->Main_model->where_names('orders_process', 'id', $data['id']);
              foreach ($order_last_count as $r) {
                  $data['vehicle_id'] = $r->vehicle_id;
                  $data['trip_id'] = $r->trip_id;
              }
              $data['neworder_id'] = base64_encode($neworder_id);
  
              $data['driver_pickip'] = $_GET['driver_pickip'];
              $data['active_base'] = 'customer_1';
              $data['active'] = 'customer_1';
              if($_GET['convertion'] == '2'){
                  $data['title'] = 'Gate Orders';
              }else {
                  $data['title'] = 'Pack List View';
              }
                      
              $data['status_base'] = 1;
              $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
              $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
              $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
              $this->load->view('order/pick_list_view', $data);
          } else {
              $this->load->view('admin/index');
          }
      }
  
  




    public function gatelogin_count()
    {

        $tablename = $_GET['tablename'];



         $from_date='2024-02-06';


         $where= " AND a.create_date >= '".$from_date."'";
         $where.= " AND a.finance_status >=3";
        $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.finance_status>=3 AND a.convertion=0  AND a.gate_login_view_status='0' AND ps.uom='Kg' $where GROUP BY a.id ORDER BY a.id DESC");
        $resultcount = $querycount->result();
        $w_update_pending = count($resultcount);


        $querycount_2 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.convertion>0  AND a.gate_login_view_status='0' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
        $resultcount_2 = $querycount_2->result();
        $w_update = count($resultcount_2);




        $querycount_3 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0 AND a.convertion>0  AND a.gate_login_view_status='1' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
        $resultcount_3 = $querycount_3->result();
        $w_update_approved = count($resultcount_3);



        $querycount_4 = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id  JOIN order_product_list_process as pp ON pp.order_id=a.id JOIN product_list as ps ON ps.id=pp.product_id WHERE a.deleteid='0' AND a.order_base>0  AND a.gate_login_view_status='2' AND ps.uom='Kg' $where  GROUP BY a.id ORDER BY a.id DESC");
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




   public function driver_orders_list_trip_base() 
    {

        if (isset($this->session->userdata['logged_in'])) 
        {
           

            //$data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            //$data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }

            $data['table_cust_transport'] = $this->Main_model->where_names('table_cust_transport','user_id',$this->userid);
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Driver Panel Trip view';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
           



            $data['vehicle_id_data'] = $_GET['vehicle_id'];
            $data['delivery_status'] = $_GET['delivery_status'];
             if($_GET['delivery_status']==1)
           {
                
                $data['delivery_text'] ="Client Scope";
           }
           else
           {
                  $data['delivery_text'] ="Zaron Scope";
           }

            $sql="";
            $define_driver_id=0;
            $resultsales = $this->Main_model->where_names('admin_users', 'id', $this->userid);
            foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
            }
            
            if($this->session->userdata['logged_in']['access']==13)
            {

                $sql=" AND b.driver_id='".$define_driver_id."'";

            }
        

            $result = $this->db->query("SELECT a.vehicle_owner as vehicle_owner,a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status IN ('3','10','7') AND b.assign_status NOT IN ('0')  AND b.order_base>0  AND b.md_approved_status IN ('1','0') AND b.delivery_status=2 AND a.deleteid=0 $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

            $result = $result->result();

            $data['vehicle'] = $result;

            $this->load->view('order/driver_orders_list_trip_base', $data);


        } 
        else 
        {
            $this->load->view('admin/index');
        }
    }


    public function driver_orders_list_trip_order_base() 
    {
        if (isset($this->session->userdata['logged_in'])) 
        {

            $data['from_date']=date('Y-m-d');
            if(isset($_GET['from_date']))
            {
                $data['from_date']=$_GET['from_date'];
            }
           
            $data['table_cust_transport'] = $this->Main_model->where_names('table_cust_transport','user_id',$this->userid);
           // $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
           //  $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Driver Panel Trip view';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
           



           $vehicle_id = $_GET['vehicle_id'];

            $data['vehicle_id_data'] = $_GET['vehicle_id'];
            $data['trip_id']=0;
            if(isset($_GET['trip_id']))
            {
                $data['trip_id']=$_GET['trip_id'];
            }



           $data['delivery_status'] = $_GET['delivery_status'];
           if($_GET['delivery_status']==1)
           {
                
                $data['delivery_text'] ="Client Scope";
           }
           else
           {
                  $data['delivery_text'] ="Zaron Scope";
           }

            $sql="";
            $define_driver_id=0;
            $resultsales = $this->Main_model->where_names('admin_users', 'id', $this->userid);
            foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
            }
            
            if($this->session->userdata['logged_in']['access']==13)
            {

                $sql=" AND b.driver_id='".$define_driver_id."'";

            }
        
            if($vehicle_id>0)
            {
                $sql .=" AND b.vehicle_id='".$vehicle_id."'";
            }
             
             $result = $this->db->query("SELECT a.vehicle_owner as vehicle_owner,a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status IN ('3','10','4','5','6','7') AND b.assign_status NOT IN ('0')  AND b.order_base>0  AND b.md_approved_status IN ('1','0') AND b.delivery_status=2 AND a.deleteid=0 $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

            $result = $result->result();

            $data['vehicle'] = $result;

            $this->load->view('order/driver_orders_list_trip_order_base', $data);


        } 
        else 
        {
            $this->load->view('admin/index');
        }
    }



    public function fetch_data_table_transpot_assign_data_driver_list_limit()
    {

        $vehicle_id = $_GET["vehicle_id"];


        $tablename = $_GET["tablename"];
        $order_base = $_GET["order_base"];
        $route_id = $_GET["route_id"];
        $assigen_status = $_GET["assaignstates"];
        $search = $_GET["search"];
        $from_date = $_GET["from_date"];
        $to_date = $_GET["to_date"];
        $delivery_status = $_GET["delivery_status"];
        $status = 0;
        if (isset($_GET["status"])) {
            $status = $_GET["status"];
        }



        $wheresearch = "";


        if ($status != 'ALL') {



            if ($status == 0) {
                $wheresearch .= " AND  ds.km_reading_end<=0";
            } else {
                $wheresearch .= " AND  ds.km_reading_end>0";
            }
        }


        if ($search != "") {

            $wheresearch .= " AND ds.finance_status IN ('3','12','4','5','6','11')";
            $wheresearch .= " AND  (a.order_no='" .  $search . "' OR  ds.trip_id='" . $search .  "' OR ds.randam_id='" . $search .  "')";
        } else {

            if ($from_date != '') {



                //$wheresearch .= ' AND a.delivery_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                $wheresearch .= " AND ds.finance_status IN ('3','12','4','5','6','11')";
            } else {



                $from_date = date('Y-m-d');
                $to_date = date('Y-m-d');
                //$wheresearch .= ' AND a.delivery_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                $wheresearch .= " AND ds.finance_status IN ('3','12','4','5','6','11')";
            }


            if ($vehicle_id > 0) {


                $wheresearch .= " AND  ds.vehicle_id='" . $vehicle_id . "'";
            } else {

                if ($this->session->userdata['logged_in']['access'] == 31) {

                    $vehicle_ids = array();
                    $resultsalesss = $this->Main_model->where_names('vehicle', 'vehicle_owner', $this->userid);
                    foreach ($resultsalesss as $ssd) {
                        $vehicle_ids[] = $ssd->id;
                    }

                    $vehicle_ids_values = implode("','", $vehicle_ids);

                    $wheresearch .= " AND ds.vehicle_id IN ('" . $vehicle_ids_values . "')";
                }
            }
        }


        if($search == "")
        {


            if (isset($_GET["trip_id"])) {
                if ($_GET["trip_id"] != '0') {

                    $trip_id = $_GET["trip_id"];
                    $wheresearch .= " AND  ds.trip_id='" . $trip_id . "'";
                }
            }

        }


        if ($vehicle_id > 0) {

            $GROUPBY = 'GROUP BY ds.trip_id';
        } else {

            if ($this->session->userdata["logged_in"]["access"] == "13") {

                $GROUPBY = 'GROUP BY ds.trip_id';
            } else {
                $GROUPBY = 'GROUP BY ds.trip_id';
            }
        }




        $orderby = "ASC";
        if ($assigen_status == 12) {
            $orderby = "DESC";
        }
        if ($assigen_status == 3) {
            $orderby = "DESC";
        }

        $i = 1;

        $define_driver_id = 0;
        $resultsales = $this->Main_model->where_names("admin_users", "id", $this->userid);

        foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
        }


          $JOIN="";
          $JOIN=' JOIN order_delivery_order_status as ds ON a.id=ds.order_id';
          $wheresearch .= ' AND ds.dispatch_status IN (1,0)';
          $wheresearch .= ' AND ds.trip_id!="0"';
         
          
        









        if ($this->session->userdata["logged_in"]["access"] != "13") {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a  $JOIN WHERE a.deleteid='0' AND a.order_base IN ('1','20','120','121','21','12','11','23') AND a.selforder=0 AND a.delivery_status='" . $delivery_status . "'  $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT ds.trip_id as trip_id,ds.delivery_mode,ds.randam_id as randam_id,ds.trip_id as trip_id_last,ds.vehicle_id as vehicle_id_last,ds.driver_id as driver_id_last,ds.sort_id as sort_id_last,ds.assign_date,ds.start_reading,ds.km_reading_end,a.bill_total,a.delivery_date,ds.seq_status,ds.toll_charge FROM $tablename as a  $JOIN WHERE a.deleteid='0' AND a.order_base IN ('1','20','120','121','21','12','11','23') AND a.selforder=0 AND a.delivery_status='" . $delivery_status . "'   $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $result = $query->result();
        } else {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a   $JOIN WHERE a.deleteid='0' AND a.order_base IN ('1','20','120','121','21','12','11','23') AND a.selforder=0 AND a.delivery_status='" . $delivery_status . "' AND ds.driver_id='" .
                    $define_driver_id .
                    "' $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT ds.trip_id as trip_id,ds.delivery_mode,ds.randam_id as randam_id,ds.trip_id as trip_id_last,ds.vehicle_id as vehicle_id_last,ds.driver_id as driver_id_last,ds.sort_id as sort_id_last,ds.assign_date,ds.start_reading,ds.km_reading_end,a.bill_total,a.delivery_date,ds.seq_status,ds.toll_charge FROM $tablename as a $JOIN  WHERE a.deleteid='0' AND a.order_base IN ('1','20','120','121','21','12','11','23') AND a.selforder=0  AND a.delivery_status='" . $delivery_status . "' AND ds.driver_id='" .
                    $define_driver_id .
                    "' $wheresearch $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $result = $query->result();
        }

        $trip_id_array = [];
        $paricel_mode = 0;
        $weighttotal = 0;


        foreach ($result as $values) {


            $bill_total = 0;
            $load_amt = 0;
            $collected_amount = 0;
            $bill_total_collectable = 0;
            $bill_total_collectable_amt = 0;
            $diff_total_value = 0;
            $lengeth_total = 0;
            $trip_status = "Pending";
            $re_status = "Pending";
            $bgnone = "";
            $array = [];

            $querys_trip_statuspending = $this->db->query("SELECT ds.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   $JOIN WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0 AND ds.finance_status !=4 AND ds.assign_status='12' AND ds.trip_id='" . $values->trip_id . "' AND ds.assign_status NOT IN ('2','3') AND ds.delivery_status='" . $delivery_status . "'   ORDER BY a.sort_id ASC");
            $querys_trip_statuspending = $querys_trip_statuspending->result();
            foreach ($querys_trip_statuspending as $tripvalue) {


                if ($tripvalue->total_re > 0) 
                {


                    $trip_status = 'Pending (' . $tripvalue->total_re . ')';
                    $bgnone = "bggray";

                }

            }


            $querys_trip_status = $this->db->query("SELECT ds.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a  $JOIN  WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND ds.trip_id='" . $values->trip_id . "' AND ds.assign_status IN ('2','3') AND ds.delivery_status='" . $delivery_status . "'   ORDER BY a.sort_id ASC");
            $querys_trip_status = $querys_trip_status->result();
            foreach ($querys_trip_status as $tripvalue) 
            {


                if ($tripvalue->total_re > 0) {

                    if ($tripvalue->finance_status > 3) {
                        $trip_status = 'Completed (' . $tripvalue->total_re . ')';
                        $bgnone = "bggreen";
                        
                    } else {
                        $trip_status = 'Started (' . $tripvalue->total_re . ')';
                        $bgnone = "bgyellow";
                    }
                }
            }


            $querys_re_status = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re  FROM $tablename as a   $JOIN WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND ds.trip_id='" . $values->trip_id . "' AND ds.finance_status IN ('5','6') AND a.delivery_status='" . $delivery_status . "'    ORDER BY a.sort_id ASC");
            $querys_re_status = $querys_re_status->result();
            foreach ($querys_re_status as $revalue) {

                if ($revalue->total_re > 0) {


                    $re_status = 'Completed';
                }
            }



            $querys = $this->db->query(
                "SELECT a.*,
                ds.return_amount,
                ds.collection_remarks as collection_remarks_last,
                ds.collection_remarks_2 as collection_remarks_last_2,
                ds.randam_id,
                ds.tcs_amount_get,
                ds.trip_id as trip_id_last,
                ds.reason as reason_last,
                ds.assign_date as assign_date_last,
                ds.assign_time as assign_time_last,
                ds.trip_start_date as trip_start_date_last,
                ds.trip_start_time as trip_start_time_last,
                ds.trip_end_date as trip_end_date_last,
                ds.trip_end_time as trip_end_time_last,
                ds.loading_time as loading_time_last,
                ds.loading_date as loading_date_last,
                ds.delivery_confirm_person as delivery_confirm_person_last,
                ds.seq_status as seq_status_last,
                ds.finance_status as finance_status_last,
                ds.firstroundoff as firstroundoff,
                ds.assign_status as assign_status_last,
                ds.start_reading as start_reading_last,
                ds.km_reading_end as km_reading_end_last,               
                ds.toll_charge as toll_charge,  
                ds.driver_recived_payment as driver_recived_payment_last,
                ds.vehicle_id as vehicle_id_last,ds.driver_id as driver_id_last,ds.sort_id as sort_id_last FROM $tablename as a $JOIN  WHERE a.deleteid='0' AND a.order_base IN ('1','20','120','121','21','11','23') AND a.selforder=0  AND ds.trip_id='" .
                    $values->trip_id .
                    "' AND a.delivery_status='" . $delivery_status . "' $wheresearch  ORDER BY a.sort_id ASC "
            );
            $results = $querys->result();
            $lengeth_array = array();
            foreach ($results as $value) {



                    $minisroundoff = $value->firstroundoff;
                    $discount = $value->discount;
                    $tcs_status = $value->tcs_status;
                    $create_date_val = $value->create_date;
                       
                     $tcsamount=0;
                     if($value->tcs_amount_get>0)
                     {

                       $tcsamount = $value->tcs_amount_get;
                            
                     }
              
                //$JOINS=' JOIN order_delivery_order_status as ds ON b.order_id=ds.order_id';
                $resultload = $this->db->query("SELECT SUM(a.amount) as totalvalue FROM sales_load_products as a JOIN order_product_list_process as b ON a.order_product_id=b.id  WHERE a.order_id='".$value->id."' AND a.loadstatus='1' AND a.randam_id='".$value->randam_id."'  ORDER BY a.id DESC");

                $resultload = $resultload->result();
                foreach ($resultload as $valueload) 
                {

                    if($value->roundoffstatus == 1) 
                    {


                         $loadamount = $valueload->totalvalue;

                         $minisroundoff = $minisroundoff + $discount;
                          //babu 
                          if($create_date_val>'2024-05-31')
                          {

                          $gstamountata_loadamount=$loadamount*0.18;
                          $loadamount=round($loadamount+$gstamountata_loadamount);

                          }
                           //babu 
                        $loadamount = $loadamount + $tcsamount+$minisroundoff;
                        $load_amt += $loadamount;
                    
                    } 
                    else 
                    {


                        $minisroundoff = $minisroundoff + $discount;

                        $loadamount = $valueload->totalvalue;

                           //babu 
                          if($create_date_val>'2024-05-31')
                          {
                               $gstamountata_loadamount=$loadamount*0.18;
                               $loadamount=round($loadamount+$gstamountata_loadamount);
                          }
                           //babu 
                        $loadamount = $loadamount + $tcsamount - $minisroundoff;
                        $load_amt += $loadamount;
                    
                    }


                }



                $denomination_total = $value->driver_recived_payment_last;
                $paricel_mode = $value->paricel_mode;
                $tablename_sub = "order_product_list_process";
                $delivery_charge = $value->delivery_charge;
                $totalamount_total = 0;
                $commission_total = 0;
                $totalamountparciel = 0;
                $commissionparciel = 0;
               

                $lengeth = 0;
                $weight = 0;
                $lengeth_total = 0;



// gg changes for maxi length and maxi weight work

                $query_profle_get = $this->db->query("SELECT a.profile,a.crimp,a.uom FROM $tablename_sub as a LEFT JOIN sales_load_products as b ON a.id=b.order_product_id  WHERE a.order_id='" . $value->id . "' AND a.deleteid=0 AND a.profile>0 AND a.categories_id NOT IN ('13','591') AND b.randam_id='".$value->randam_id."'");




                $lengeth_array_single = array();
                $result_lengeth = $query_profle_get->result();
                foreach ($result_lengeth as $valuess) {

                    $valuess->profile = $valuess->profile + $valuess->crimp;
                    if ($valuess->uom == '3') {
                        $lengeth = $valuess->profile;
                    }
                    if ($valuess->uom == '4') {

                        $lengeth = $valuess->profile / 304.8;
                        $lengeth = round($lengeth, 2);
                    }
                    if ($valuess->uom == '5') {

                        $lengeth = $valuess->profile * 3.281;
                        $lengeth = round($lengeth, 2);
                    }
                    if ($valuess->uom == '6') {
                        $lengeth = $valuess->profile / 12;
                        $lengeth = round($lengeth, 2);
                    }

                    $lengeth_array[] = $lengeth;
                    $lengeth_array_single[] = $lengeth;
                }

                $lengeth = max($lengeth_array_single);
                $lengeth_total = max($lengeth_array);

                $weight = 0;

                // gg changes for maxi length and maxi weight work



                /*$query_weight_get = $this->db->query(
                    "SELECT a.*,b.billing_options,b.categories_id,b.weight,c.uom FROM sales_load_products as a 
                    
                    LEFT JOIN order_product_list_process AS b 
                                 ON a.order_product_id = b.id

                        LEFT JOIN product_list AS c
                                 ON b.product_id = c.id 
                                 WHERE a.order_id='" .
                        $value->id .
                        "' AND a.loadstatus=1 AND a.randam_id='".$value->randam_id."'"
                );*/


                $query_weight_get = $this->db->query(
                    "SELECT a.*,b.billing_options,b.categories_id,b.weight,c.uom,CASE
                WHEN b.nos = 0 OR b.nos IS NULL THEN b.qty
                ELSE b.nos
                END AS total_nos
                     FROM sales_load_products as a 
                    
                    LEFT JOIN order_product_list_process AS b 
                                 ON a.order_product_id = b.id

                        LEFT JOIN product_list AS c
                                 ON b.product_id = c.id 
                                 WHERE a.order_id='" .
                        $value->id .
                        "' AND a.loadstatus=1 AND a.randam_id='".$value->randam_id."'"
                );

                $result_totalweight = $query_weight_get->result();
      
                foreach ($result_totalweight as $we) {

                    // check this product is kg or not

                    // for kg uom restriction
                    $uom_kg=$we->uom;
           
                    if( $we->categories_id == 611 || $we->categories_id == 627 || $we->categories_id == 626 || $we->categories_id == 36 || $we->categories_id == 34 || $we->categories_id == 5){

                        if($we->billing_options==2)
                        {
                            $uom_kg= 'Kg';
                        }
                        elseif($we->categories_id == 5 || $we->categories_id == 36)
                        {
                            $uom_kg= 'Kg';
                        }else
                        {
                            $uom_kg = 'Qty';
                        }
        
                    }
                  
                   /* if($uom_kg == 'Kg'){
                       
                        $weight += round($we->qty, 2);
                        $weighttotal += round($we->qty, 2);

                    }else {
                       
                        $weight += round($we->weight, 2);
                        $weighttotal += round($we->weight, 2);
                    }
                */


                
                            if ($uom_kg == 'Kg') {
                                $weight += round($we->qty, 2);
                                $weighttotal += round($we->qty, 2);
                            } else {
                                // Weight calculation based on packed quantity
                                if ($we->total_nos > 0) {
                                    $single_weight = round($we->weight / $we->total_nos, 2);
                                    $total_we = $single_weight * $we->nos;
                            
                                    $weight += round($total_we, 2);
                                    $weighttotal += round($total_we, 2);
                                } else {
                                    // Handle cases where total_nos is zero
                                    $weight += 0;
                                    $weighttotal += 0;
                                }
                            }
                
                 
                }

               
            
                $route_id_base = $value->route_id;

                $company_name_company = "";
                $email = "";
                $phone = "";
                $address = "";
                $customers = $this->Main_model->where_names(
                    "customers",
                    "id",
                    $value->customer_id
                );
                foreach ($customers as $csval) {
                    $company_name_company = $csval->company_name;
                    $email = $csval->email;
                    $phone = $csval->phone;

                    $locality = $csval->locality;
                    $address =
                        $csval->address1 .
                        " " .
                        $csval->address2 .
                        " " .
                        $csval->landmark .
                        " " .
                        $csval->zone .
                        " " .
                        $csval->pincode .
                        " " .
                        $csval->state;
                }

                $sales_name = "";
                $sales_phone = "";
                $sales_person = $this->Main_model->where_names(
                    "admin_users",
                    "id",
                    $value->user_id
                );
                foreach ($sales_person as $sales) {
                    $sales_name = $sales->name;
                    $sales_phone = $sales->phone;
                }

                if ($value->customer_address_id > 0) {
                    $customers_adddrss = $this->Main_model->where_names(
                        "customers_adddrss",
                        "id",
                        $value->customer_address_id
                    );
                    foreach ($customers_adddrss as $customers_adddrss_v) {
                        $locality = $customers_adddrss_v->locality;
                        $company_name = $customers_adddrss_v->name;
                        $phone = $customers_adddrss_v->phone;
                        $address =
                            $customers_adddrss_v->address1 .
                            " " .
                            $customers_adddrss_v->address2 .
                            " " .
                            $customers_adddrss_v->landmark .
                            " " .
                            $customers_adddrss_v->zone .
                            " " .
                            $customers_adddrss_v->pincode .
                            " " .
                            $customers_adddrss_v->state;
                    }
                }

                if ($value->shipping_address > 0) {
                    $customers_adddrss = $this->Main_model->where_names(
                        "customers_adddrss",
                        "id",
                        $value->shipping_address
                    );
                    foreach ($customers_adddrss as $customers_adddrss_v) {
                        $locality = $customers_adddrss_v->locality;
                        $company_name = $customers_adddrss_v->name;
                        $phone = $customers_adddrss_v->phone;
                        $address =
                            $customers_adddrss_v->address1 .
                            " " .
                            $customers_adddrss_v->address2 .
                            " " .
                            $customers_adddrss_v->landmark .
                            " " .
                            $customers_adddrss_v->zone .
                            " " .
                            $customers_adddrss_v->pincode .
                            " " .
                            $customers_adddrss_v->state;
                    }
                }

                $loc_name = "";

                $loc_name_id = $this->Main_model->where_names(
                    "locality",
                    "id",
                    $locality
                );
                foreach ($loc_name_id as $valc) {
                    $loc_name = $valc->name;
                    $route_id = $valc->route_id;
                }

                $route_name = "";
                $route = $this->Main_model->where_names(
                    "route",
                    "id",
                    $route_id
                );
                foreach ($route as $route_v) {
                    $route_name = $route_v->name;
                }
                $return_id = 0;
                $discountfulltotal = $value->bill_total;
                if ($value->return_id > 0) {
                    $query = $this->db->query("SELECT SUM(c.qty*c.rate) as bill_total,b.driver_return FROM  order_sales_return_complaints as b JOIN sales_return_products as c ON b.id=c.c_id  WHERE b.deleteid=0 AND b.id='" . $value->return_id . "'  AND c.deleteid=0  ORDER BY b.id DESC
                        ");
                    $query = $query->row();

                    if ($query->driver_return != 2) {


                        if ($query->bill_total > 0) {
                            $return_id = $value->return_id;
                            $value->bill_total = $query->bill_total;
                            $discountfulltotal = $query->bill_total;
                            $driver_return = $query->driver_return;
                        }
                    }
                }




               $query_normal = $this->db->query("SELECT a.id FROM $tablename as a $JOIN WHERE  ds.driver_id='" . $value->driver_id . "'  AND ds.trip_id='" . $value->trip_id_last . "' AND a.order_base>0 AND a.deleteid=0 AND a.delivery_status='" . $delivery_status . "'");
               

                $query_normal = $query_normal->result();

                $query_normal2 = $this->db->query("SELECT a.id FROM $tablename as a $JOIN WHERE  ds.driver_id='" . $value->driver_id . "'  AND ds.assign_status=1 AND ds.trip_id='" . $value->trip_id_last . "' AND a.order_base>0 AND a.deleteid=0 AND a.delivery_status='" . $delivery_status . "'");
                $query_normal2 = $query_normal2->result();






                $first_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT ds.sort_id FROM $tablename as a $JOIN WHERE  a.deleteid=0 AND ds.assign_status=1 AND  ds.driver_id='" .
                        $value->driver_id_last .
                        "' AND ds.trip_id='" .
                        $value->trip_id_last .
                        "' AND a.order_base>0 AND a.delivery_status='" . $delivery_status . "' ORDER BY ds.sort_id ASC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $first_sort_id = $valuesss->sort_id;
                }


                if (count($query_normal) != count($query_normal2)) {
                    $first_sort_id = -1;
                }





                $last_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT ds.sort_id FROM $tablename as a $JOIN WHERE  a.deleteid=0 AND ds.driver_id='" .
                        $value->driver_id_last .
                        "' AND ds.trip_id='" .
                        $value->trip_id_last .
                        "' AND a.order_base>0 AND ds.finance_status=4 AND a.delivery_status='" . $delivery_status . "' ORDER BY ds.sort_id DESC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $last_sort_id = $valuesss->sort_id;
                }





                $query_normal_3 = $this->db->query("SELECT a.id FROM $tablename as a $JOIN  WHERE  ds.driver_id='" . $value->driver_id_last . "' AND ds.trip_id='" . $value->trip_id_last . "' AND a.order_base>0 AND a.deleteid=0 AND a.delivery_status='" . $delivery_status . "'");
                $query_normal_3 = $query_normal_3->result();

                $query_normal_4 = $this->db->query("SELECT a.id FROM $tablename as a $JOIN  WHERE  ds.driver_id='" . $value->driver_id_last . "'  AND ds.finance_status IN ('4','11','5','6') AND ds.trip_id='" . $value->trip_id_last . "' AND a.order_base>0 AND a.deleteid=0 AND a.delivery_status='" . $delivery_status . "'");
                $query_normal_4 = $query_normal_4->result();



                if ($value->return_manuval_status == 0) {


                    if (count($query_normal_3) != count($query_normal_4)) {
                        $last_sort_id = -1;
                    }
                }




                $statuscolor = "badge-soft-yellow";
                $statusbodycolor = "badge-soft-light";

                if ($value->assign_status_last == "12") {
                    if ($value->seq_status_last == 0) {

                        $statuscolor = "";
                        $value->reason = "Sequence Pending";
                    } else {

                        $statuscolor = "";
                        $value->reason = "Driver Loading Pending";
                    }
                }

                if ($value->assign_status_last == "11") {


                    if ($value->seq_status_last == 0) {

                        $statuscolor = "";
                        $value->reason = "Sequence Pending";
                    } else {

                        $statuscolor = "";
                        $value->reason = "Dispatch Loading Pending";
                    }
                }

                if ($value->assign_status_last == "1") {

                    $statuscolor = "";         //pending
                    $statusbodycolor = "badge-soft-light";
                }

                if ($value->assign_status_last == "2") {

                    // Started
                    $statuscolor = "badge-soft-yellow";
                    $statusbodycolor = "badge-soft-light";
                    //$value->reason = "Trip Started";

                }



                if ($value->assign_status_last == "3") {

                    //trip complete
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-success";
                }

                if ($value->finance_status_last == "10") {

                    //return
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-info";
                    $value->assign_status_last = 8;
                }

                if ($value->reason_last == "Driver Trip Started") {            //reached location
                    $statuscolor = "badge-soft-yellow";
                    $statusbodycolor = "badge-soft-light";
                }

                if ($value->reason_last == "Reached location") {            //reached location
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-wer";
                    $value->reason = "Reached location";
                }

                if ($value->reason_last == "Re-Delivery") {            //reached location
                    $statuscolor = "badge-soft-danger";
                    $statusbodycolor = "badge-soft-wer";
                }


                if ($value->finance_status_last == "11") {            //reached location
                    $statuscolor = "badge-soft-danger";
                    $statusbodycolor = "badge-soft-wer";
                    $value->assign_status_last = 3;
                }

                if ($value->finance_status_last == "12") {            //reached location
                    $statuscolor = "badge-soft-danger";
                    $statusbodycolor = "badge-soft-wer";
                    $value->assign_status_last = 2;
                }

                if ($value->return_id > 0) {

                    if ($value->assign_status_last == 11) {            //reached location
                        $statuscolor = "badge-soft-danger";
                        $statusbodycolor = "badge-soft-wer";
                        $value->reason = "Return Order Assigned";
                        $value->assign_status_last = 12;
                    }
                }








                if ($value->order_base > 0) {



                    if ($value->payment_mode == 'Cash') {

                        $bill_total_collectable += $value->bill_total;


                        if ($value->loading_status != 0) {
                            //$bill_total_collectable_amt += round($loadamount);
                        } else {
                            //$bill_total_collectable_amt += $value->collection_remarks_last;
                            //$bill_total_collectable_amt += round($loadamount);
                        }
                    }



                 
                   $delivery_mode = $value->delivery_mode;
                   

                    $diff_total = $value->bill_total - $value->driver_recived_payment_last;
                    //$diff_total=$value->collection_remarks;
                    //$diff= $value->bill_total-$diff_total;
                    $diff = $diff_total;

                    if ($diff < 0) {
                        $diff = 0;
                    }

                    $totkm = $value->km_reading_end_last - $value->start_reading_last;
                    if ($totkm < 0) {
                        $totkm = "";
                    }

                    if ($value->payment_mode != 'Cash') {
                        $diff = 0;
                    }


                    $diff_total_value += $diff;


                    $query_normal_5 = $this->db->query("SELECT a.id FROM $tablename as a $JOIN WHERE  ds.driver_id='" . $value->driver_id_last . "'  AND ds.dispatch_load_status IN ('1') AND ds.trip_id='" . $value->trip_id_last . "'  AND a.order_base>0 AND a.deleteid=0 AND a.delivery_status='" . $delivery_status . "'");
                    $query_normal_5 = $query_normal_5->result();

                    $pickup = 1;
                    if (count($query_normal_3) != count($query_normal_5)) {
                        $pickup = 0;
                        // $value->reason = "Dispatch Loading Pending";
                    }


                    $bill_total += $value->bill_total;


                    if ($value->return_id > 0) {
                        $value->driver_recived_payment = 0;
                        $collected_amount += $value->driver_recived_payment_last;
                    } else {
                        $collected_amount += $value->driver_recived_payment_last;
                    }

                    if ($value->loading_status != 0) {
                        $value->collection_remarks = round($loadamount);
                    }

                    
$loadamount=$value->collection_remarks_last_2;
 if($value->collection_remarks_last>0)
{
    $collectable_amount_tot=$value->collection_remarks_last;
    $collection_remarks_edit=1;
     //$loadamount=$value->collection_remarks_last;
    //$this->db->query("UPDATE order_delivery_order_status SET collection_remarks='".round($value->collection_remarks)."' WHERE randam_id='" . $value->randam_id . "'");
}
else
{
    //$this->db->query("UPDATE order_delivery_order_status SET collection_remarks_2='".round($loadamount)."' WHERE randam_id='" . $value->randam_id . "'");
    //$collectable_amount_tot=$loadamount;

    $collectable_amount_tot=$value->collection_remarks_last_2;
    $loadamount=$value->collection_remarks_last_2;
    $collection_remarks_edit=0;
}

$bill_total_collectable_amt += round($collectable_amount_tot);
  //$this->db->query("UPDATE order_delivery_order_status SET collection_remarks='".round($loadamount)."' WHERE randam_id='" . $value->randam_id . "'");



  // gg changes for return afftected to diff
  $return_amount_data=$value->return_amount;

  if($collection_remarks_edit==0) {
     $collectable_amount_tot=$collectable_amount_tot-$return_amount_data;
  }



                    $array[] = [
                        "no" => $value->sort_id_last,
                        "sales_id" => $value->id,
                        "pickup" => $pickup,
                        "totkm" => $totkm,
                        "bill_amount" => round($value->bill_total),
                        "driver_recived_payment" => round($value->driver_recived_payment_last),
                        "sales_phone" => $sales_phone,
                        "diff" => round($collectable_amount_tot-$value->driver_recived_payment_last),
                        "loc_name" => $loc_name,
                        "return_id" => $return_id,
                        "delivery_mode" => $delivery_mode,
                        "first_sort_id" => $first_sort_id,
                        "last_sort_id" => $last_sort_id,
                        "sales_name" => $sales_name,
                        "denomination_total" => $denomination_total,
                        "weight" => round($weight, 2),
                        "gate_status" => $value->gate_status,
                        "end_reading_factory" => $value->end_reading_factory,
                        "collectable_amount_tot" => round($collectable_amount_tot),
                        "start_reading_factory" => $value->start_reading_factory,
                        "start_reading" => $value->start_reading_last,
                        "km_reading_end" => $value->km_reading_end_last,                        
                        "toll_charge" => $value->toll_charge,
                        "gate_weight" => $value->gate_weight,
                        "payment_mode" => $value->payment_mode,
                        "id" => $value->id,
                        "base_id" => base64_encode($value->id),
                        "order_no" => $value->order_no,
                        "lengeth" => round($lengeth, 2),
                        "rescheduling_delivery" => $value->rescheduling_delivery,
                        "rescheduling_date" => $value->rescheduling_date,
                        "payment_mode_order" => $value->payment_mode_order,
                        "rescheduling_remarks" => $value->rescheduling_remarks,
                        "name" => $company_name,
                        "company_name" => $company_name_company,
                        "email" => $email,
                        "phone" => $phone,
                        "totalamount" => round($discountfulltotal, 2),
                        "commission" => round($commission),
                        "delivery_charge" => $value->delivery_charge,
                        "seq_status" => $value->seq_status_last,
                        "reason" => $value->reason_last,
                        "sort_id" => $value->sort_id_last,
                        "randam_id" => $value->randam_id,
                        "route_name" => $route_name,
                        "address" => $address,
                        "color" => $statuscolor,
                        "bodycolor" => $statusbodycolor,
                        "loadamount" => round($loadamount),
                        "assign_status" => $value->assign_status_last,
                        "loading_time" => $value->loading_time_last,

                        "loading_date" => date(
                            "d-m-Y",
                            strtotime($value->loading_date_last)
                        ),

                        "trip_start_time" => $value->trip_start_time_last,
                        "trip_start_date" => date(
                            "d-m-Y",
                            strtotime($value->trip_start_date_last)
                        ),
                        "trip_end_time" => $value->trip_end_time_last,
                        "trip_end_date" => date(
                            "d-m-Y",
                            strtotime($value->trip_end_date_last)
                        ),


                        "delivery_confirm_person" => $value->delivery_confirm_person_last,
                        "order_base" => $value->finance_status,
                        "delivery_date" => date(
                            "d-m-Y",
                            strtotime($value->delivery_date)
                        ),
                        "create_date" => date(
                            "d-m-Y",
                            strtotime($value->create_date)
                        ),
                        "trip_id" => $value->trip_id,
                        "create_time" => $value->create_time,
                    ];
                }
            }

            $vehicle_number = "";
            $vehicle = $this->Main_model->where_names(
                "vehicle",
                "id",
                $value->vehicle_id_last
            );
            foreach ($vehicle as $vehicle_v) {
                $vehicle_number =
                    $vehicle_v->vehicle_name .
                    " | " .
                    $vehicle_v->vehicle_number;
                $vehicle_id = $vehicle_v->id;
            }

            $driver_name = "";
            $driver_phone = "";
            $driver = $this->Main_model->where_names(
                "driver",
                "id",
                $value->driver_id_last
            );
            foreach ($driver as $driver_v) {
                $driver_name = $driver_v->name;
                $driver_phone = $driver_v->phone;
            }

            $st = "";
            $sts = "false";
            $collapsed = "collapsed";
            if ($i == 1) {
                $st = "show";
                $sts = "true";
                $collapsed = "";
            }


            $totalkm = $values->km_reading_end - $values->start_reading;

            $diff_amt = 0;
            if ($collected_amount > 0) {
                $collected_amount_tot = $collected_amount;
                //$diff_amt=$bill_total_collectable-$collected_amount_tot;
            }

            //if ($bill_total_collectable_amt > 0) {
                //$diff_amt=$bill_total-$bill_total_collectable_amt;
            //}


            if ($diff_total_value > 0) {
                $diff_amt = $diff_total_value;
            }

            if ($totalkm < 0) {
                $totalkm = 0;
            }



            $km_color = "emptycolor";

            if ($values->km_reading_end > 0) {
                $km_color = "";
            }


            $values->trip_id = str_replace(' ', '', $values->trip_id);
            $trip_id_array[] = [
                "subarray" => $array,
                "no" => $i,
                "sh" => $st,
                "expended" => $sts,
                "collapsed" => $collapsed,
                "emptycolor" => $km_color,
                "bgnone" => $bgnone,
                "trip_id" => $values->trip_id,
                "collectable_amount_tot" => $bill_total_collectable_amt,
                'assign_date' => date('d-m-Y', strtotime($values->delivery_date)),
                "vehicle_id" => $values->vehicle_id_last,
                "start_reading" => $values->start_reading,
                "km_reading_end" => $values->km_reading_end,
                "seq_status" => $values->seq_status,
                "totalkm" => $totalkm,
                "randam_id"=>$values->randam_id,
                "lengeth_total" => round($lengeth_total, 2),
                "weighttotal" => round($weighttotal, 2),
                "bill_total" => $bill_total,
                "load_amt" => round($load_amt),
                "collected_amount" => round($collected_amount),
                "diff_amt" => round($load_amt-$collected_amount),
                "trip_status" => $trip_status,
                "re_status" => $re_status,
                "loc_name" => $loc_name,
                "vehicle_id" => $values->vehicle_id_last,
                "vehicle_number" => $vehicle_number,
                "driver_name" => $driver_name,
                "driver_phone" => $driver_phone,
            ];

            $i++;
        }

        $trip_id_array_data = $trip_id_array;

        $myData = [
            "PortalActivity" => $trip_id_array_data,
            "totalCount" => $count,
            "weighttotal" => round($weighttotal, 2),
        ];




        echo json_encode($myData);
 

        
    }
   


























    public function driver_orders_list_trip_base_status() 
    {

        if (isset($this->session->userdata['logged_in'])) 
        {
           

            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }

            $data['table_cust_transport'] = $this->Main_model->where_names('table_cust_transport','user_id',$this->userid);
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Driver Panel Trip view';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
           



            $data['vehicle_id_data'] = $_GET['vehicle_id'];
            $data['delivery_status'] = $_GET['delivery_status'];
             if($_GET['delivery_status']==1)
           {
                
                $data['delivery_text'] ="Client Scope";
           }
           else
           {
                  $data['delivery_text'] ="Zaron Scope";
           }

            $sql="";
            $define_driver_id=0;
            $resultsales = $this->Main_model->where_names('admin_users', 'id', $this->userid);
            foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
            }
            
            if($this->session->userdata['logged_in']['access']==13)
            {

                $sql=" AND b.driver_id='".$define_driver_id."'";

            }
        

            $result = $this->db->query("SELECT a.vehicle_owner as vehicle_owner,a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status IN ('3','10','7') AND b.assign_status NOT IN ('0')  AND b.order_base=1  AND b.md_approved_status IN ('1','0') AND b.delivery_status=2 AND a.deleteid=0 $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

            $result = $result->result();

            $data['vehicle'] = $result;

            $this->load->view('order/driver_orders_list_trip_base_status', $data);


        } 
        else 
        {
            $this->load->view('admin/index');
        }
    }


   public function driver_orders_list_trip_order_base_status() 
    {
        if (isset($this->session->userdata['logged_in'])) 
        {

            $data['from_date']=date('Y-m-d');
            if(isset($_GET['from_date']))
            {
                $data['from_date']=$_GET['from_date'];
            }
           
            $data['table_cust_transport'] = $this->Main_model->where_names('table_cust_transport','user_id',$this->userid);
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Driver Panel Trip view';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
           



           $vehicle_id = $_GET['vehicle_id'];

            $data['vehicle_id_data'] = $_GET['vehicle_id'];
           $data['trip_id'] = 0;
           $data['delivery_status'] = $_GET['delivery_status'];
           if($_GET['delivery_status']==1)
           {
                
                $data['delivery_text'] ="Client Scope";
           }
           else
           {
                  $data['delivery_text'] ="Zaron Scope";
           }

            $sql="";
            $define_driver_id=0;
            $resultsales = $this->Main_model->where_names('admin_users', 'id', $this->userid);
            foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
            }
            
            if($this->session->userdata['logged_in']['access']==13)
            {

                $sql=" AND b.driver_id='".$define_driver_id."'";

            }

            if($vehicle_id>0)
            {
                $sql .=" AND b.vehicle_id='".$vehicle_id."'";
            }
        
             
             
             $result = $this->db->query("SELECT a.vehicle_owner as vehicle_owner,a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status IN ('3','10','4','5','6','7') AND b.assign_status NOT IN ('0')  AND b.order_base>0  AND b.md_approved_status IN ('1','0') AND b.delivery_status=2 AND a.deleteid=0 $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

            $result = $result->result();

            $data['vehicle'] = $result;


            $this->load->view('order/driver_orders_list_trip_order_base_status', $data);


        } 
        else 
        {
            $this->load->view('admin/index');
        }
    }

public function fetch_data_table_transpot_assign_data_driver_list_limit_base_status()
{
       

        $vehicle_id = $_GET["vehicle_id"];

      
        $tablename = $_GET["tablename"];
        $order_base = $_GET["order_base"];
        $route_id = $_GET["route_id"];
        $assigen_status = $_GET["assaignstates"];
        $search = $_GET["search"];
        $from_date = $_GET["from_date"];
        $to_date = $_GET["to_date"];
        $delivery_status = $_GET["delivery_status"];
        $status =0;
        if (isset($_GET["status"]))
        {
            $status = $_GET["status"];
        }
        


        $wheresearch = "";
        $date=date('Y-06-30');

        if($status!='ALL')
        {

            if($status==0)
            {
               $wheresearch .= " AND  a.km_reading_end<=0 AND a.vehicle_id>0 AND a.driver_id>0 AND a.delivery_date>'".$date."'";
            }
            else
            {
                $wheresearch .= " AND  a.km_reading_end>0 AND a.vehicle_id>0 AND a.driver_id>0 AND a.delivery_date>'".$date."'";
            }

        }   
        
         
        if($search != "") 
        {
            
                                    $wheresearch .= " AND a.finance_status IN ('3','4','5','6','11')";
                                    $wheresearch .= " AND  (a.order_no='" .  $search . "' OR  a.trip_id='" .$search .  "')";
            
        }
        else
        {

                                    if($from_date!='')
                                    {


                                          
                                        //$wheresearch .= ' AND a.delivery_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                                        $wheresearch .= " AND a.finance_status IN ('3','4','5','6','11')";

                                        

                                    }
                                    else
                                    {



                                        $from_date=date('Y-m-d');
                                        $to_date=date('Y-m-d');
                                        //$wheresearch .= ' AND a.delivery_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                                        $wheresearch .= " AND a.finance_status IN ('3','4','5','6','11')";

                                       

                                    }


                                   if($vehicle_id > 0)
                                   {

                                   
                                       $wheresearch .= " AND  a.vehicle_id='" . $vehicle_id . "'";


                                   }
                                   else
                                   {

                                        if($this->session->userdata['logged_in']['access']==31)
                                        {

                                            $vehicle_ids=array();
                                            $resultsalesss = $this->Main_model->where_names('vehicle', 'vehicle_owner', $this->userid);
                                            foreach ($resultsalesss as $ssd) {
                                            $vehicle_ids[] = $ssd->id;
                                            }
                
                                             $vehicle_ids_values=implode("','", $vehicle_ids);
                                            
                                             $wheresearch .=" AND a.vehicle_id IN ('".$vehicle_ids_values."')";

                                        }

                                   }
                                    
                                    


                            
                           
        }

       
          if(isset($_GET["trip_id"]))
         {

                 $trip_id = $_GET["trip_id"];
                 if($trip_id!='0')
                 {
                     $wheresearch .= " AND  a.trip_id='".$trip_id."'";
                 }
                
         
         }  

         
        
        if($vehicle_id>0)
        {

             $GROUPBY='GROUP BY a.trip_id';
          
        }
        else
        {

             if($this->session->userdata["logged_in"]["access"] == "13")
             {

                    $GROUPBY='GROUP BY a.trip_id';
             }
             else
             {
                    $GROUPBY='GROUP BY a.trip_id';
             }
            
        }
           
       
            

        $orderby = "ASC";
        if ($assigen_status == 12) {
            $orderby = "DESC";
        }
        if ($assigen_status == 3) {
            $orderby = "DESC";
        }

        $i = 1;

        $define_driver_id = 0;
        $resultsales = $this->Main_model->where_names("admin_users", "id",$this->userid);
        
        foreach ($resultsales as $valuesales)
        {
            $define_driver_id = $valuesales->define_driver_id;
        }

        if($this->session->userdata["logged_in"]["access"] != "13")
        {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status='".$delivery_status."'  $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT a.trip_id,a.vehicle_id,a.assign_date,a.start_reading,a.km_reading_end,a.bill_total,a.delivery_date,a.seq_status FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status='".$delivery_status."'   $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $result = $query->result();

        }
        else
        {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status='".$delivery_status."' AND a.driver_id='" .
                    $define_driver_id .
                    "' $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT a.trip_id,a.vehicle_id,a.assign_date,a.start_reading,a.km_reading_end,a.bill_total,a.delivery_date,a.seq_status FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0  AND a.delivery_status='".$delivery_status."' AND a.driver_id='" .
                    $define_driver_id .
                    "' $wheresearch $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $result = $query->result();
        }

        $trip_id_array = [];
        $paricel_mode = 0;
        $weighttotal = 0;
       
       
        foreach ($result as $values) {


            $bill_total=0;
            $load_amt=0;
            $collected_amount=0;
            $bill_total_collectable=0;
            $bill_total_collectable_amt=0;
            $lengeth_total=0;
            $trip_status="Pending";
            $re_status="Pending";
            $bgnone="";
            $array = [];

            $querys_trip_statuspending = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0 AND a.finance_status !=4 AND a.assign_status='12' AND a.trip_id='" . $values->trip_id . "'  AND a.assign_status NOT IN ('2','3')  ORDER BY a.sort_id ASC");    
            $querys_trip_statuspending = $querys_trip_statuspending->result();
            foreach ($querys_trip_statuspending as $tripvalue) 
            {
            

               if($tripvalue->total_re>0)
               {


                   $trip_status='Pending ('.$tripvalue->total_re.')';
                   $bgnone="bggray";

               }


            }


            $querys_trip_status = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND a.trip_id='" . $values->trip_id . "' AND a.assign_status IN ('2','3')  ORDER BY a.sort_id ASC");    
             $querys_trip_status = $querys_trip_status->result();
             foreach ($querys_trip_status as $tripvalue) 
             {
             

                if($tripvalue->total_re>0)
                {

                    if($tripvalue->finance_status>3)
                    {
                           $trip_status='Completed ('.$tripvalue->total_re.')';
                           $bgnone="bggreen";
                    }
                    else
                    {
                           $trip_status='Started ('.$tripvalue->total_re.')';
                           $bgnone="bgyellow";
                    }
                    

                }


             }



            $querys_re_status = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND a.trip_id='" . $values->trip_id . "' AND a.finance_status IN ('5','6')   ORDER BY a.sort_id ASC");    
             $querys_re_status = $querys_re_status->result();
             foreach ($querys_re_status as $revalue) 
             {

                if($revalue->total_re>0)
                {


                    $re_status='Completed';

                }

             }



            $querys = $this->db->query(
                "SELECT a.* FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','11') AND a.selforder=0  AND a.trip_id='" .
                    $values->trip_id .
                    "' $wheresearch  ORDER BY a.sort_id ASC "
            );
            $results = $querys->result();
            $lengeth_array=array();
            foreach ($results as $value)
            {

                $bill_total+=$value->bill_total;
                $collected_amount+=$value->driver_recived_payment;


                  $minisroundoff = $value->roundoff;
                  $discount = $value->discount;
                  $tcsamount=$value->tcsamount;
                  $resultload = $this->db->query("SELECT SUM(amount) as totalvalue FROM sales_load_products  WHERE order_id='" . $value->id . "'");
                  $resultload = $resultload->result();
                  foreach ($resultload as $valueload)
                  {

                     if($value->roundoffstatus == 1)
                     {
                           
                             $loadamount= $valueload->totalvalue-$discount+$minisroundoff;
                             $loadamount=$loadamount+$tcsamount;
                             $load_amt+=$loadamount;

                     }
                     else
                     {
                              
                             $minisroundoff=$minisroundoff+$discount; 
                             $loadamount= $valueload->totalvalue-$minisroundoff;
                             $loadamount=$loadamount+$tcsamount;
                             $load_amt+=$loadamount;


                     }

                                                                        
                  }


                $denomination_total = $value->driver_recived_payment;
                $paricel_mode = $value->paricel_mode;
                $tablename_sub = "order_product_list_process";
                $delivery_charge = $value->delivery_charge;
                $totalamount_total = 0;
                $commission_total = 0;
                $totalamountparciel = 0;
                $commissionparciel = 0;
                $diff_total_value=0;

                $lengeth = 0;
                $weight = 0;
                $lengeth_total =0;
                $query_profle_get = $this->db->query("SELECT profile as profile,crimp,uom FROM $tablename_sub  WHERE order_id='" .$value->id ."' AND deleteid=0 AND profile>0 AND categories_id NOT IN ('13','591')"); 
                $lengeth_array_single=array();
                $result_lengeth = $query_profle_get->result();
                foreach ($result_lengeth as $valuess)
                {

                    $valuess->profile=$valuess->profile+$valuess->crimp;
                    if($valuess->uom=='3')
                    {
                        $lengeth = $valuess->profile;
                    }
                    if($valuess->uom=='4')
                    {

                        $lengeth = $valuess->profile/304.8;
                        $lengeth=round($lengeth,2);

                    }
                    if($valuess->uom=='5')
                    {

                        $lengeth = $valuess->profile*3.281;
                        $lengeth=round($lengeth,2);

                    }
                    if($valuess->uom=='6')
                    {
                         $lengeth = $valuess->profile/12;
                         $lengeth=round($lengeth,2);
                    }
                    
                    $lengeth_array[] = $lengeth;
                    $lengeth_array_single[] = $lengeth;


                }


                 $lengeth = max($lengeth_array_single);
                $lengeth_total= max($lengeth_array);

                $weight = 0;
                $query_weight_get = $this->db->query(
                    "SELECT SUM(weight) as totalweight FROM $tablename_sub  WHERE order_id='" .
                        $value->id .
                        "' AND deleteid=0"
                );
                $result_totalweight = $query_weight_get->result();
                foreach ($result_totalweight as $we) {
                    $weight = round($we->totalweight,2);
                    $weighttotal += round($we->totalweight,2);
                }




                $route_id_base = $value->route_id;

                $company_name_company = "";
                $email = "";
                $phone = "";
                $address = "";
                $customers = $this->Main_model->where_names(
                    "customers",
                    "id",
                    $value->customer_id
                );
                foreach ($customers as $csval) {
                    $company_name_company = $csval->company_name;
                    $email = $csval->email;
                    $phone = $csval->phone;

                    $locality = $csval->locality;
                    $address =
                        $csval->address1 .
                        " " .
                        $csval->address2 .
                        " " .
                        $csval->landmark .
                        " " .
                        $csval->zone .
                        " " .
                        $csval->pincode .
                        " " .
                        $csval->state;
                }

                $sales_name = "";
                $sales_phone = "";
                $sales_person = $this->Main_model->where_names(
                    "admin_users",
                    "id",
                    $value->user_id
                );
                foreach ($sales_person as $sales) {
                    $sales_name = $sales->name;
                    $sales_phone = $sales->phone;
                }

                if ($value->customer_address_id > 0) {
                    $customers_adddrss = $this->Main_model->where_names(
                        "customers_adddrss",
                        "id",
                        $value->customer_address_id
                    );
                    foreach ($customers_adddrss as $customers_adddrss_v) {
                        $locality = $customers_adddrss_v->locality;
                        $company_name = $customers_adddrss_v->name;
                        $phone = $customers_adddrss_v->phone;
                        $address =
                            $customers_adddrss_v->address1 .
                            " " .
                            $customers_adddrss_v->address2 .
                            " " .
                            $customers_adddrss_v->landmark .
                            " " .
                            $customers_adddrss_v->zone .
                            " " .
                            $customers_adddrss_v->pincode .
                            " " .
                            $customers_adddrss_v->state;
                    }
                }

                if ($value->shipping_address > 0) {
                    $customers_adddrss = $this->Main_model->where_names(
                        "customers_adddrss",
                        "id",
                        $value->shipping_address
                    );
                    foreach ($customers_adddrss as $customers_adddrss_v) {
                        $locality = $customers_adddrss_v->locality;
                        $company_name = $customers_adddrss_v->name;
                        $phone = $customers_adddrss_v->phone;
                        $address =
                            $customers_adddrss_v->address1 .
                            " " .
                            $customers_adddrss_v->address2 .
                            " " .
                            $customers_adddrss_v->landmark .
                            " " .
                            $customers_adddrss_v->zone .
                            " " .
                            $customers_adddrss_v->pincode .
                            " " .
                            $customers_adddrss_v->state;
                    }
                }

                $loc_name = "";

                $loc_name_id = $this->Main_model->where_names(
                    "locality",
                    "id",
                    $locality
                );
                foreach ($loc_name_id as $valc) {
                    $loc_name = $valc->name;
                    $route_id = $valc->route_id;
                }

                $route_name = "";
                $route = $this->Main_model->where_names(
                    "route",
                    "id",
                    $route_id
                );
                foreach ($route as $route_v)
                {
                    $route_name = $route_v->name;
                }
                $return_id=0;
                $discountfulltotal=$value->bill_total;
                if($value->return_id>0)
                {
                    $query = $this->db->query("SELECT SUM(c.qty*c.rate) as bill_total,b.driver_return FROM  order_sales_return_complaints as b JOIN sales_return_products as c ON b.id=c.c_id  WHERE b.deleteid=0 AND b.id='".$value->return_id."'  AND c.deleteid=0  ORDER BY b.id DESC
                        ");
                    $query = $query->row();                     
                   
                    if($query->driver_return!=2)
                    {


                            if($query->bill_total>0)
                            {
                                 $return_id = $value->return_id;
                                 $value->bill_total = $query->bill_total;
                                 $discountfulltotal = $query->bill_total;
                                 $driver_return = $query->driver_return;

                            }

                    }
                    
                }





$query_normal = $this->db->query("SELECT id FROM $tablename WHERE  driver_id='" . $value->driver_id . "' AND trip_id='" . $value->trip_id ."' AND order_base>0 AND deleteid=0");
$query_normal = $query_normal->result();

$query_normal2 = $this->db->query("SELECT id FROM $tablename WHERE  driver_id='" . $value->driver_id . "'  AND assign_status=1 AND trip_id='" . $value->trip_id ."' AND order_base>0 AND deleteid=0");
$query_normal2 = $query_normal2->result();




              
                
                $first_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT sort_id FROM $tablename WHERE  deleteid=0 AND assign_status=1 AND  driver_id='" .
                        $value->driver_id .
                        "' AND trip_id='" .
                        $value->trip_id .
                        "' AND order_base>0 ORDER BY sort_id ASC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $first_sort_id = $valuesss->sort_id;
                }


                if(count($query_normal)!=count($query_normal2))
                {
                    $first_sort_id=-1;
                }





                $last_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT sort_id FROM $tablename WHERE  deleteid=0 AND driver_id='" .
                        $value->driver_id .
                        "' AND trip_id='" .
                        $value->trip_id .
                        "' AND order_base>0  ORDER BY sort_id DESC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $last_sort_id = $valuesss->sort_id;
                }



                  $query_normal_3 = $this->db->query("SELECT id FROM $tablename WHERE  driver_id='" . $value->driver_id . "' AND trip_id='" . $value->trip_id ."' AND order_base>0 AND deleteid=0");
$query_normal_3 = $query_normal_3->result();

$query_normal_4= $this->db->query("SELECT id FROM $tablename WHERE  driver_id='" . $value->driver_id . "'  AND finance_status IN ('4','11') AND trip_id='" . $value->trip_id ."' AND order_base>0 AND deleteid=0");
$query_normal_4 = $query_normal_4->result();


                if(count($query_normal_3)!=count($query_normal_4))
                {
                    $last_sort_id=-1;
                }


                

                $statuscolor = "badge-soft-yellow";       
                $statusbodycolor = "badge-soft-light";

                if ($value->assign_status == "12") 
                {
                    if($value->seq_status==0)
                    {

                         $statuscolor = "";
                         $value->reason = "Sequence Pending";

                    }
                    else
                    {

                         $statuscolor = "";
                    $value->reason = "Driver Loading Pending";

                    }
                   
                }

                 if ($value->assign_status == "11") 
                {
                     if($value->seq_status==0)
                    {

                         $statuscolor = "";
                         $value->reason = "Sequence Pending";

                    }
                    else
                    {

                         $statuscolor = "";
                         $value->reason = "Dispatch Loading Pending";

                    }

                }

                if ($value->assign_status == "1") {
                    $statuscolor = "";         //pending
                    $statusbodycolor = "badge-soft-light";
                }

                if ($value->assign_status == "2") {             // Started
                    $statuscolor = "badge-soft-yellow"; 
                    $statusbodycolor = "badge-soft-light"; 
                    //$value->reason = "Trip Started";
                }

                

                if ($value->assign_status == "3") {             //trip complete
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-success";
                   
                }

                if ($value->finance_status == "10") {           //return
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-info";
                    $value->assign_status=8;
                }

                if($value->reason == "Driver Trip Started")
                {            //reached location
                    $statuscolor = "badge-soft-yellow";
                    $statusbodycolor = "badge-soft-light";
                    
                }

                if($value->reason == "Reached location")
                {            //reached location
                    $statuscolor = "badge-soft-success";
                    $statusbodycolor = "badge-soft-wer";
                    $value->reason = "Reached location";
                }

                
                  if($value->reason == "Re-Delivery")
                {            //reached location
                    $statuscolor = "badge-soft-danger";
                    $statusbodycolor = "badge-soft-wer";
                   
                }


                if($value->finance_status=="11")
                {            //reached location
                    $statuscolor = "badge-soft-danger";
                    $statusbodycolor = "badge-soft-wer";
                    $value->assign_status=3;
                   
                }




                

                if ($value->order_base > 0)
                {



                    if($value->payment_mode=='Cash')
                    {
                        $bill_total_collectable+=$value->bill_total;
                         $bill_total_collectable_amt+=$value->collection_remarks;
                    }

                    
                    if($value->loading_status=='1')
                    {
                        $delivery_mode='PART';
                    }
                    else{
                         $delivery_mode='FULL';
                    }
                  
                     $diff_total=$value->collection_remarks-$value->driver_recived_payment;
                   //$diff_total=$value->collection_remarks;
                   //$diff= $value->bill_total-$diff_total;
                   $diff= $diff_total;

                   if($diff<0)
                   {
                      $diff=0;
                   }
                   $totkm= $value->km_reading_end-$value->start_reading;
                   if($totkm<0)
                   {
                      $totkm="";
                   }

                   if($value->payment_mode!='Cash')
                   {
                      $diff=0;
                   }

                         $diff_total_value+=$diff;

$query_normal_5= $this->db->query("SELECT id FROM $tablename WHERE  driver_id='" . $value->driver_id . "'  AND dispatch_load_status IN ('1') AND trip_id='" . $value->trip_id ."' AND order_base>0 AND deleteid=0");
$query_normal_5 = $query_normal_5->result();

                $pickup=1;
                if(count($query_normal_3)!=count($query_normal_5))
                {
                    $pickup=0;
                    // $value->reason = "Dispatch Loading Pending";
                }



                    $array[] = [
                        "no" => $value->sort_id,
                        "sales_id" => $value->id,
                        "pickup" => $pickup,
                        "totkm" => $totkm,
                        "bill_amount" => round($value->bill_total),
                        "driver_recived_payment" => round($value->driver_recived_payment),
                        "sales_phone" => $sales_phone,
                        "diff" => $diff,
                        "loc_name" => $loc_name,
                        "return_id"=>$return_id,
                        "delivery_mode" => $delivery_mode,
                        "first_sort_id" => $first_sort_id,
                        "last_sort_id" => $last_sort_id,
                        "sales_name" => $sales_name,
                        "denomination_total" => $denomination_total,
                        "weight" => round($weight,2),
                        "gate_status" => $value->gate_status,
                        "end_reading_factory" => $value->end_reading_factory,
                        "collectable_amount_tot" => $value->collection_remarks,
                        "start_reading_factory" =>$value->start_reading_factory,
                        "start_reading" => $value->start_reading,
                        "km_reading_end" => $value->km_reading_end,
                        "gate_weight" => $value->gate_weight,
                        "payment_mode" => $value->payment_mode,
                        "id" => $value->id,
                        "base_id" => base64_encode($value->id),
                        "order_no" => $value->order_no,
                        "lengeth" => round($lengeth,2),
                        "rescheduling_delivery" =>
                            $value->rescheduling_delivery,
                        "rescheduling_date" => $value->rescheduling_date,
                        "payment_mode_order"=>$value->payment_mode_order,
                        "rescheduling_remarks" => $value->rescheduling_remarks,
                        "name" => $company_name,
                        "company_name" => $company_name_company,
                        "email" => $email,
                        "phone" => $phone,
                        "totalamount" => round($discountfulltotal, 2),
                        "commission" => round($commission),
                        "delivery_charge" => $value->delivery_charge,
                        "seq_status" => $value->seq_status,
                        "reason" => $value->reason,
                        "sort_id" => $value->sort_id,
                        "route_name" => $route_name,
                        "address" => $address,
                        "color" => $statuscolor,
                        "bodycolor" => $statusbodycolor,
                        "loadamount"=>round($loadamount),
                        "assign_status" => $value->assign_status,
                        "loading_time" => $value->loading_time,
                        "loading_date"=>date(
                            "d-m-Y",
                            strtotime($value->loading_date)
                        ),

                        "trip_start_time" => $value->trip_start_time,
                        "trip_start_date"=>date(
                            "d-m-Y",
                            strtotime($value->trip_start_date)
                        ),
                        "trip_end_time" => $value->trip_end_time,
                        "trip_end_date"=>date(
                            "d-m-Y",
                            strtotime($value->trip_end_date)
                        ),
                        

                        "delivery_confirm_person"=>$value->delivery_confirm_person,
                        "order_base" => $value->finance_status,
                        "delivery_date" => date(
                            "d-m-Y",
                            strtotime($value->delivery_date)
                        ),
                        "create_date" => date(
                            "d-m-Y",
                            strtotime($value->create_date)
                        ),
                        "trip_id" => $value->trip_id,
                        "create_time" => $value->create_time,
                    ];
                }
            }

            $vehicle_number = "";
            $vehicle = $this->Main_model->where_names(
                "vehicle",
                "id",
                $value->vehicle_id
            );
            foreach ($vehicle as $vehicle_v) {
                $vehicle_number =
                    $vehicle_v->vehicle_name .
                    " | " .
                    $vehicle_v->vehicle_number;
                $vehicle_id = $vehicle_v->id;
            }

            $driver_name = "";
            $driver_phone = "";
            $driver = $this->Main_model->where_names(
                "driver",
                "id",
                $value->driver_id
            );
            foreach ($driver as $driver_v) {
                $driver_name = $driver_v->name;
                $driver_phone = $driver_v->phone;
            }

            $st = "";
            $sts = "false";
            $collapsed = "collapsed";
            if ($i == 1) {
                $st = "show";
                $sts = "true";
                $collapsed = "";
            }


                        $totalkm=$values->km_reading_end-$values->start_reading;
                        
                        $diff_amt=0;
                        if($collected_amount>0)
                        {
                           // $diff_amt=$bill_total_collectable-$collected_amount;
                        }



                   

                       
                       if($diff_total_value>0)
                       {
                          $diff_amt=$diff_total_value;
                       }


                      
                       if($totalkm<0)
                       {
                          $totalkm=0;
                       }
                       


            $km_color="emptycolor";
           
            if($values->km_reading_end>0)
            {
                   $km_color="";
            }


$values->trip_id=str_replace(' ','', $values->trip_id);
            $trip_id_array[] = [
                "subarray" => $array,
                "no" => $i,
                "sh" => $st,
                "expended" => $sts,
                "collapsed" => $collapsed,
                "emptycolor" => $km_color,
                "bgnone" => $bgnone,
                "trip_id" => $values->trip_id,
                "collectable_amount_tot" => $bill_total_collectable_amt,
                'assign_date'=>date('d-m-Y',strtotime($values->delivery_date)),
                "vehicle_id" => $values->vehicle_id,
                "start_reading" => $values->start_reading,
                "km_reading_end" => $values->km_reading_end,
                "seq_status" => $values->seq_status,
                "totalkm" => $totalkm,
                "lengeth_total"=>round($lengeth_total,2),
                "weighttotal"=>round($weighttotal,2),
                "bill_total"=>$bill_total,
                "load_amt"=>round($load_amt),
                "collected_amount"=>round($collected_amount),
                "diff_amt"=>round($diff_amt),
                "trip_status"=>$trip_status,
                "re_status"=>$re_status,
                "loc_name"=>$loc_name,
                "vehicle_id"=>$values->vehicle_id,
                "vehicle_number" => $vehicle_number,
                "driver_name" => $driver_name,
                "driver_phone" => $driver_phone,
            ];

            $i++;
        }

        $trip_id_array_data = $trip_id_array;

        $myData = [
            "PortalActivity" => $trip_id_array_data,
            "totalCount" => $count,
            "weighttotal" => round($weighttotal, 2),
        ];




        echo json_encode($myData);
    }






  public function fetch_data_delivery_note() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        $DC_id = $_GET['DC_id'];

   
        $sql = "";

        $sql=" AND ss.randam_id='".$DC_id."'";
        $JOIN=' JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id JOIN sales_load_products as ss ON a.id=ss.order_product_id';
        $newArray = array();
        $convert = $_GET['convert'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
        }
        $result = $this->db->query("SELECT a.*,b.color FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0  AND a.product_id>0 AND a.loadstatus=1 $sql GROUP BY ss.order_product_id ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
        $result = $result->result();
        foreach ($result as $value) {


            $rate = $value->rate + $value->commission;
            $amountdata =  $rate * $value->qty;
            $amount = $amountdata;
            $description = "";
            $product_name = "";
            $kg_price = 0;
            $og_price = 0;
            $og_formula = 0;
            $kg_formula2 = 0;
            $stock = 0;


            $rowprofile = 0;
            $statusviewdata = $this->db->query("SELECT SUM(nos) as nos,SUM(amount) as amount,SUM(qty) as qty FROM sales_load_products  WHERE  loadstatus=1  AND order_id='".$value->order_id."' AND randam_id='".$DC_id."' ORDER BY id ASC");
            $statusviewdata = $statusviewdata->result();
            foreach ($statusviewdata as $r) {

                $rowprofile =$r->nos;
            }


            $found = 0; //If no duplicate found then it will be zero
            foreach ($newArray as $v) {
                if ($v == $value->color) {
                    // Duplicate Exist
                    $found = 1;
                }
            }

            if (!$found) {    //No duplicate found in $newArray
                if ($value->color != '') {
                    $newArray[] = $value->color;
                }
            }


            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;
                $product_name = $csval->product_name;
                $weight = $csval->weight;
                $thickness = $csval->thickness;


                if ($tablenamemain == 'purchase_orders_process') {
                    if ($csval->purchase_name != '') {
                        $product_name = $csval->purchase_name;
                    }
                }

                $default_uom = $csval->uom;
                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                $kg_price = $csval->kg_price;
                $og_price = $csval->price;
                $stock = round($csval->stock);
                $og_formula = $csval->formula;
                $kg_formula2 = $csval->formula2;
                if ($categories_id == '1') {
                    $cate_status = 1;
                }elseif ($categories_id == '630') {
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
                } elseif ($categories_id == '591') {
                    $cate_status = 1;
                }
                elseif ($categories_id == '627') {
                    $cate_status = 1;
                }
                elseif ($categories_id == '628') {
                    $cate_status = 1;
                }
                 else {
                    $cate_status = 0;
                }
            }

            $same = 0;

            //$this->db->query("UPDATE $tablename_sub SET cul='3' WHERE id='" . $value->id . "'");
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
                $value->reference_image = 0;
            } else {
                $value->reference_image = base_url() . $value->reference_image;
            }

            if ($value->gst == '') {
                $value->gst = $gst;
            }


            $sort_id = $value->sort_id;
            $sorthide = 0;


            $product_name_sub = "";
            if ($value->sub_product_id > 0) {


                $product_list_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
                foreach ($product_list_sub as $csval_sub) {

                    $product_name_sub = $csval_sub->product_name;
                }
            }


            $rate = $value->rate + $value->commission;

            $remarks = $value->remarks;
            $value->remarks = '';
            if ($value->select_profile == 'Tata Profile') {
                $value->remarks .= 'Tata Profile';
            }


            if ($remarks != '') {
                $value->remarks .= $remarks;
            }

            if ($value->print != '') {

                if ($value->print == 'Yes') {
                    $value->remarks .= ' | YP';
                }
            }

            if ($value->reverse_color != '') {

                if ($value->reverse_color == 'Yes') {
                    $value->remarks .= ' | Rev Color';
                }
            }

            if ($value->combination != '') {

                if ($value->combination == 'Yes') {
                    $value->remarks .= ' | Combi lot';
                }
            }


            if ($value->film_guard != '') {


                $value->remarks .= ' | ' . $value->film_guard;
            }


            if ($value->packaging != '') {
                if ($value->packaging == 'Premium') {
                    $value->packaging = 'P - Packing';
                }
                if ($value->packaging == 'Normal') {
                    $value->packaging = 'N - Packing';
                }

                if ($value->packaging == 'Courier') {
                    $value->packaging = 'C - Packing';
                }
                $value->remarks .= ' | ' . $value->packaging;
            }


            if ($value->uom == '3') {
                $profile_tab_convert = round($profile, 3);
                $crimp_tab_convert = round($crimp, 3);
            }


            if ($value->uom == '4') {
                $profile_set = $profile / 304.8;
                $crimp_set = $crimp / 304.8;
                $profile_tab_convert = round($profile_set, 3);
                $crimp_tab_convert = round($crimp_set, 3);
            }

            if ($value->uom == '5') {
                $profile_set = $profile * 3.281;
                $crimp_set = $crimp * 3.281;
                $profile_tab_convert = round($profile_set, 3);
                $crimp_tab_convert = round($crimp_set, 3);
            }


            if ($value->uom == '6') {
                $profile_set = $profile / 12;
                $crimp_set = $crimp / 12;
                $profile_tab_convert = round($profile_set, 3);
                $crimp_tab_convert = round($crimp_set, 3);
            }

            if ($value->uom == '2') {
                $profile_set = $profile * 10.764;
                $crimp_set = $crimp * 10.764;
                $profile_tab_convert = round($profile_set, 3);
                $crimp_tab_convert = round($crimp_set, 3);
            }

            if ($value->remark != "other" && $value->remark != "") {
                //get other option provision
                $query = $this->db->query("SELECT a.options 
                FROM `remarks` as a 
                WHERE a.id = '" . $value->remark . "'   ");
                $query = $query->row(); // Assuming you expect a single result

                $remarks = $query ? $query->options : "";
            } else {
                $remarks = $value->remark == "other" ? $value->otherremark : $value->remark;
            }

            $profile_val = '';
            if ($value->profile) {
                $data = [2 => 'SQMTR', 3 => 'FEET', 4 => 'MM', 5 => 'MTR', 6 => 'INCH'];

                $profile = $value->profile;
                $uom = $value->uom;

                if ($uom === '2') {
                    // Convert from square meters to feet
                    $profile_val = $profile * 10.7639;
                } elseif ($uom === '4') {
                    // Convert from millimeters to feet
                    $profile_val = $profile * 0.00328084;
                } elseif ($uom === '5') {
                    // Convert from meters to feet
                    $profile_val = $profile * 3.28084;
                } elseif ($uom === '6') {
                    // Convert from inches to feet
                    $profile_val = $profile * 0.0833333;
                } else {
                    $profile_val = $profile; // If uom is '3' (FEET), no conversion needed
                }
            }

             $resultload = $this->db->query("SELECT SUM(nos) as nos,SUM(amount) as amount,SUM(qty) as qty FROM sales_load_products  WHERE order_product_id='" . $value->id . "' AND loadstatus=1  AND order_id='".$value->order_id."' AND randam_id='".$DC_id."' ORDER BY id ASC");
                            $resultload = $resultload->result();
                            foreach ($resultload as $valueload)
                            {
                                
                                    $value->nos= $valueload->nos;
                                    $qty= $valueload->qty;
                                   
                            }

            $array[] = array(
                'no' => $i,
                'id' => $value->id,
                'found' => $found,
                'rowprofile' => $rowprofile,
                'profile_tab_convert' => $profile_tab_convert,
                'crimp_tab_convert' => $crimp_tab_convert,
                'same' => $same,
                'default_uom' => $default_uom,
                'sorthide' => $sorthide,
                'imagestatus' => $imagestatus,
                'order_id' => $value->order_id,
                'activel_qty' => $value->activel_qty,
                'select_profile' => $value->select_profile,
                'remarks' => $value->remarks,
                'weight' => round($value->weight, 2),
                'default_weight' => round($weight, 2),
                'thickness' => $thickness,
                'sub_product_name_tab' => $product_name_sub,
                'purchase_request' => $value->purchase_request,
                'purchase_id' => $value->purchase_id,
                'product_name_tab' => $product_name,
                'tile_material_name' => $value->tile_material_name,
                'tile_material_id' => $value->tile_material_id,
                'reference_image' => $value->reference_image,
                'sub_product_id' => $value->sub_product_id,
                'remarks' => $value->remarks,
                'categories' => $categories,
                'type' => $type,
                'description' => $description,
                'product_id' => $value->product_id,
                'return_complaint' => $value->return_complaint,
                'sort_id' => $value->sort_id,
                'count_id' => $value->count_id,
                'return_status' => $value->return_status,
                'rate_edit' => round($value->rate_edit, 2),
                'categories_id' => $value->categories_id,
                'specifications' => $value->specifications,
                'profile_tab' => round($profile, 3),
                'crimp_tab' => round($crimp, 3),
                'checked' => $value->checked,
                'dim_two' => $value->dim_two,
                'dim_one' => $value->dim_one,
                'dim_three' => $value->dim_three,
                'image_length' => $value->image_length,
                'gst' => $value->gst,
                'gst_check' => $value->gst_check,
                'extra_crimp' => round($value->extra_crimp, 3),
                'back_crimp' => round($value->back_crimp, 3),
                'proudtcion_no' => $value->proudtcion_no,
                'nos_tab' => round($value->nos, 2),
                'unit_tab' => $value->unit,
                'return_status' => $value->return_status,
                'fact_tab' => round($value->fact, 2),
                'uom' => $value->uom,
                'base_id' => $value->base_id,
                'stock' => $stock,
                'kg_price' => $kg_price,
                'og_price' => $og_price,
                'og_formula' => $og_formula,
                'kg_formula2' => $kg_formula2,
                'billing_options' => $value->billing_options,
                'commission_tab' => round($value->commission, 2),
                'cate_status' => $cate_status,
                'categories_id_get' => $categories_id,
                'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2),
                'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                'rate_tab' => round($rate, 2),
                'cul' => $value->cul,
                'qty_tab' => round($qty, 3),
                'amount_tab' => round($amount, 2),
                'remark' => $remarks,
                'profile_val' => round($profile_val, 3),
            );
            $i++;
        }


        echo json_encode($array);
    }
    









  public function fetchDataCategorybase_delevery_notes() {
       $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $DC_id = $_GET['DC_id'];

        $sql = "";


        if (isset($_GET['attachment_status'])) {


            $attachment_status = $_GET['attachment_status'];


            if ($attachment_status == 1) {
                $sql .= " AND a.reference_image!=''";
            }
        }

        $sql .= " AND ds.randam_id='".$DC_id."'";
        $JOIN=' JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id';

        $convert = $_GET['convert'];
        $result = $this->db->query("SELECT b.type,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 AND a.loadstatus=1 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
        $result = $result->result();
        foreach ($result as $value) {
            if ($convert == 1) {
                $qty = $value->qty_total;
            } else {
                $qty = $value->Sqr_feet_to_Meter;
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
                    $value->uom = 'QTY';
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
            if ($value->uom != '') {
                $value->uom = $value->uom;
            } else {
                $value->uom = 'QTY';
            }


            $categories_id = $value->categories_id;
            if ($categories_id == '1') {
                $cate_status = 1;
            }
            elseif ($categories_id == '630') {
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
            } elseif ($categories_id == '591') {
                $cate_status = 1;
            } 
            elseif ($categories_id == '627') {
                    $cate_status = 1;
            }
            elseif ($categories_id == '628') {
                    $cate_status = 1;
            }
            else {
                $cate_status = 0;
            }


            $activel_qty_total_set_overall = $value->activel_qty_total_set;
            $activel_qty_total_set = $qty;


            $nos_total = 0;
            $statusviewdata = $this->db->query("SELECT SUM(nos) as nos,SUM(amount) as amount,SUM(qty) as qty FROM sales_load_products  WHERE  pickedstatus=1   AND randam_id='".$DC_id."' ORDER BY id ASC");
            $statusviewdata = $statusviewdata->result();
            foreach ($statusviewdata as $r) {

                $nos_total =$r->nos;
            }


            $array[] = array(
                'no' => $i, 'id' => $value->id, 'categories_id' => $value->categories_id, 'activel_qty_total_set_overall' => round($activel_qty_total_set_overall, 3), 'activel_qty_total_set' => round($activel_qty_total_set, 3), 'cate_status' => $cate_status, 'type' => $value->type, 'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype, 'activel_qty_total' => $activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total, 2), 'nos_total' => round($nos_total, 2), 'fact_total' => round($value->fact_total, 2), 'qty_total' => round($qty, 3),
                'amount_total' => round($value->amount_total, 2)
            );
            $i++;
        }
        echo json_encode($array);
    }
        



// for return org bakup gg changes


public function fetch_data_delivery_note_dc() {
    $i = 1;
    $array = array();
    $cate_status = '0';
    $tablename_sub = $_GET['tablename_sub'];
    $tablenamemain = $_GET['tablenamemain'];
    $DC_id = $_GET['DC_id'];


    $sql = "";

    $sql=" AND ss.randam_id='".$DC_id."'";
    $JOIN='JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id JOIN sales_load_products as ss ON a.id=ss.order_product_id';
    $newArray = array();
    $convert = $_GET['convert'];
    $customer_id = 0;
    $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
    $resultcs = $resultmain->result();
    foreach ($resultcs as $valuecs) {
        $customer_id = $valuecs->customer_id;
    }

    //AND a.loadstatus=1 ->gg changes
    $result = $this->db->query("SELECT a.*,b.color as item_return_status FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0  AND a.product_id>0 AND ss.loadstatus=1 $sql GROUP BY ss.order_product_id ORDER BY a.categories_id,a.sort_id ASC");
    //--  $result_data1 = $result->result();
    $result = $result->result();



// GET RETURNED ITEMS
$JOIN12='JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id JOIN sales_load_products as ss ON a.id=ss.order_product_id
JOIN  sales_return_products as rs ON a.id=rs.purchase_order_product_id';
        $return_ids = $this->return_items($DC_id);
        $result_data2 = array();

        if (!empty($return_ids)) {
            // Extract the 'purchase_order_product_id' from each object in $return_ids
            $return_ids_array = array_map(function($obj) {
                return $obj->purchase_order_product_id;  // Extract 'purchase_order_product_id'
            }, $return_ids);
            
            // Convert the array of IDs into a comma-separated string
            $return_ids_str = implode(',', $return_ids_array);

            $result12 = $this->db->query("
                SELECT a.*, b.color,rs.qty as return_qty,rs.amount as return_amount,rs.edit_nos as return_nos,rs.edit_nos as return_org_qty,rs.return_recived_status as item_return_status
                FROM $tablename_sub as a 
                JOIN product_list as b ON a.product_id = b.id 
                $JOIN12 
                WHERE a.order_id = '" . $_GET['order_id'] . "' 
                AND a.deleteid = 0  
                AND a.product_id > 0 
                AND a.id IN ($return_ids_str)  
                GROUP BY ss.order_product_id 
                ORDER BY a.categories_id, a.sort_id ASC
            ");

            $result_data2 = $result12->result();
        }

 //--   $result=array_merge($result_data1,$result_data2);

//vbn

    foreach ($result as $value) {


        $rate = $value->rate + $value->commission;
        $amountdata =  $rate * $value->qty;
        $amount = $amountdata;
        $description = "";
        $product_name = "";
        $kg_price = 0;
        $og_price = 0;
        $og_formula = 0;
        $kg_formula2 = 0;
        $stock = 0;

        // gg changes

        if($i==1) {
            $rowprofile = 0;
            $statusviewdata = $this->db->query("SELECT SUM(nos) as nos,SUM(amount) as amount,SUM(qty) as qty FROM sales_load_products  WHERE  loadstatus=1  AND order_id='".$value->order_id."' AND randam_id='".$DC_id."' ORDER BY id ASC");
            $statusviewdata = $statusviewdata->result();
            foreach ($statusviewdata as $r) {

                $rowprofile =$r->nos;
            }
        }else {
            $rowprofile='';
        }

        $found = 0; //If no duplicate found then it will be zero
        foreach ($newArray as $v) {
            if ($v == $value->color) {
                // Duplicate Exist
                $found = 1;
            }
        }

        if (!$found) {    //No duplicate found in $newArray
            if ($value->color != '') {
                $newArray[] = $value->color;
            }
        }


        $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
        foreach ($product_list as $csval) {
            $description = $csval->description;
            $product_name = $csval->product_name;
            $weight = $csval->weight;
            $thickness = $csval->thickness;


            if ($tablenamemain == 'purchase_orders_process') {
                if ($csval->purchase_name != '') {
                    $product_name = $csval->purchase_name;
                }
            }

            $default_uom = $csval->uom;
            $categories = $csval->categories;
            $categories_id = $csval->categories_id;
            $type = $csval->type;
            $gst = $csval->gst;
            $kg_price = $csval->kg_price;
            $og_price = $csval->price;
            $stock = round($csval->stock);
            $og_formula = $csval->formula;
            $kg_formula2 = $csval->formula2;
            if ($categories_id == '1') {
                $cate_status = 1;
            } elseif ($categories_id == '2622') {
                $cate_status = 1;
            } elseif ($categories_id == '5') {
                $cate_status = 0;
            } elseif ($categories_id == '32') {
                $cate_status = 1;
            } elseif ($categories_id == '40') {
                $cate_status = 0;
            } elseif ($categories_id == '41') {
                $cate_status = 0;
            }
            elseif ($categories_id == '591' || $categories_id == '626' || $categories_id == '611' || $categories_id == '627') {
                $cate_status = 1;
            }
             else {
                $cate_status = 0;
            }
        }

        $same = 0;

        //$this->db->query("UPDATE $tablename_sub SET cul='3' WHERE id='" . $value->id . "'");
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
                   // gg changes 

               $dim_one=$value->dim_one;
               $dim_two=$value->dim_two;
               $dim_three=$value->dim_three;
        if ($value->base_id == "") {
            $value->base_id = 1;
        }
        $imagestatus = 1;
        if ($value->reference_image == '') {
            $imagestatus = 0;
            $value->reference_image = 0;
        } else {
            $value->reference_image = base_url() . $value->reference_image;
        }

        if ($value->gst == '') {
            $value->gst = $gst;
        }


        $sort_id = $value->sort_id;
        $sorthide = 0;


        $product_name_sub = "";
        if ($value->sub_product_id > 0) {


            $product_list_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list_sub as $csval_sub) {

                $product_name_sub = $csval_sub->product_name;
            }
        }


        $rate = $value->rate + $value->commission;

        $remarks = $value->remarks;
        $value->remarks = '';
        if ($value->select_profile == 'Tata Profile') {
            $value->remarks .= 'Tata Profile';
        }


        if ($remarks != '') {
            $value->remarks .= $remarks;
        }

        if ($value->print != '') {

            if ($value->print == 'Yes') {
                $value->remarks .= ' | YP';
            }
        }

        if ($value->reverse_color != '') {

            if ($value->reverse_color == 'Yes') {
                $value->remarks .= ' | Rev Color';
            }
        }

        if ($value->combination != '') {

            if ($value->combination == 'Yes') {
                $value->remarks .= ' | Combi lot';
            }
        }


        if ($value->film_guard != '') {


            $value->remarks .= ' | ' . $value->film_guard;
        }


        if ($value->packaging != '') {
            if ($value->packaging == 'Premium') {
                $value->packaging = 'P - Packing';
            }
            if ($value->packaging == 'Normal') {
                $value->packaging = 'N - Packing';
            }

            if ($value->packaging == 'Courier') {
                $value->packaging = 'C - Packing';
            }
            $value->remarks .= ' | ' . $value->packaging;
        }


       /* if ($value->uom == '3') {
            $profile_tab_convert = round($profile, 3);
            $crimp_tab_convert = round($crimp, 3);
        }


        if ($value->uom == '4') {
            $profile_set = $profile / 304.8;
            $crimp_set = $crimp / 304.8;
            $profile_tab_convert = round($profile_set, 3);
            $crimp_tab_convert = round($crimp_set, 3);
        }

        if ($value->uom == '5') {
            $profile_set = $profile * 3.281;
            $crimp_set = $crimp * 3.281;
            $profile_tab_convert = round($profile_set, 3);
            $crimp_tab_convert = round($crimp_set, 3);
        }


        if ($value->uom == '6') {
            $profile_set = $profile / 12;
            $crimp_set = $crimp / 12;
            $profile_tab_convert = round($profile_set, 3);
            $crimp_tab_convert = round($crimp_set, 3);
        }

        if ($value->uom == '2') {
            $profile_set = $profile * 10.764;
            $crimp_set = $crimp * 10.764;
            $profile_tab_convert = round($profile_set, 3);
            $crimp_tab_convert = round($crimp_set, 3);
        }*/


        // conversion ->gg changes

if ($value->uom == '3') {
$profile_tab_convert = round($profile, 3);
$crimp_tab_convert = round($crimp, 3);
$dim_one_convert = round($dim_one, 3);
$dim_two_convert = round($dim_two, 3);
$dim_three_convert = round($dim_three, 3);
}

if ($value->uom == '4') {
$profile_set = $profile / 304.8;
$crimp_set = $crimp / 304.8;
$dim_one_convert = $dim_one / 304.8;
$dim_two_convert = $dim_two / 304.8;
$dim_three_convert = $dim_three / 304.8;

$profile_tab_convert = round($profile_set, 3);
$crimp_tab_convert = round($crimp_set, 3);
$dim_one_convert = round($dim_one_convert, 3);
$dim_two_convert = round($dim_two_convert, 3);
$dim_three_convert = round($dim_three_convert, 3);
}

if ($value->uom == '5') {
$profile_set = $profile / 0.305; // Corrected from 3.281 to 0.305
$crimp_set = $crimp / 0.305; // Corrected from 3.281 to 0.305
$dim_one_convert = $dim_one / 0.305;
$dim_two_convert = $dim_two / 0.305;
$dim_three_convert = $dim_three / 0.305;

$profile_tab_convert = round($profile_set, 3);
$crimp_tab_convert = round($crimp_set, 3);
$dim_one_convert = round($dim_one_convert, 3);
$dim_two_convert = round($dim_two_convert, 3);
$dim_three_convert = round($dim_three_convert, 3);
}

if ($value->uom == '6') {
$profile_set = $profile / 12;
$crimp_set = $crimp / 12;
$dim_one_convert = $dim_one / 12;
$dim_two_convert = $dim_two / 12;
$dim_three_convert = $dim_three / 12;

$profile_tab_convert = round($profile_set, 3);
$crimp_tab_convert = round($crimp_set, 3);
$dim_one_convert = round($dim_one_convert, 3);
$dim_two_convert = round($dim_two_convert, 3);
$dim_three_convert = round($dim_three_convert, 3);
}

if ($value->uom == '2') {
$profile_set = $profile / 10.764;
$crimp_set = $crimp / 10.764;
$dim_one_convert = $dim_one / 10.764;
$dim_two_convert = $dim_two / 10.764;
$dim_three_convert = $dim_three / 10.764;

$profile_tab_convert = round($profile_set, 3);
$crimp_tab_convert = round($crimp_set, 3);
$dim_one_convert = round($dim_one_convert, 3);
$dim_two_convert = round($dim_two_convert, 3);
$dim_three_convert = round($dim_three_convert, 3);
}











        if ($value->remark != "other" && $value->remark != "") {
            //get other option provision
            $query = $this->db->query("SELECT a.options 
            FROM `remarks` as a 
            WHERE a.id = '" . $value->remark . "'   ");
            $query = $query->row(); // Assuming you expect a single result

            $remarks = $query ? $query->options : "";
        } else {
            $remarks = $value->remark == "other" ? $value->otherremark : $value->remark;
        }

        $profile_val = '';
        if ($value->profile) {
            $data = [2 => 'SQMTR', 3 => 'FEET', 4 => 'MM', 5 => 'MTR', 6 => 'INCH'];

            $profile = $value->profile;
            $uom = $value->uom;

            if ($uom === '2') {
                // Convert from square meters to feet
                $profile_val = $profile * 10.7639;
            } elseif ($uom === '4') {
                // Convert from millimeters to feet
                $profile_val = $profile * 0.00328084;
            } elseif ($uom === '5') {
                // Convert from meters to feet
                $profile_val = $profile * 3.28084;
            } elseif ($uom === '6') {
                // Convert from inches to feet
                $profile_val = $profile * 0.0833333;
            } else {
                $profile_val = $profile; // If uom is '3' (FEET), no conversion needed
            }
        }

         $resultload = $this->db->query("SELECT SUM(nos) as nos,SUM(amount) as amount,SUM(qty) as qty FROM sales_load_products  WHERE order_product_id='" . $value->id . "' AND loadstatus=1  AND order_id='".$value->order_id."' AND randam_id='".$DC_id."' ORDER BY id ASC");
                        $resultload = $resultload->result();
                        foreach ($resultload as $valueload)
                        {
                            
                                $value->nos= $valueload->nos;
                                // gg changes for driver return nos updated for nos category products
                                $value->qty= $valueload->qty;
                                $qty= $valueload->qty;
                               
                        }


                        if($type == 9){
                            $row_total_count=round($value->qty, 2);
                            $nos_tab_data=round($value->qty, 2);
                        }else {
                            $row_total_count=round($value->nos, 2);
                            $nos_tab_data=round($value->nos, 2);

                        }



// to check if item is returned

$this->db->select('sales_return_products.*');
$this->db->where('randam_id', $DC_id);
$this->db->where('purchase_order_product_id', $value->id);
$sales_return_products=$this->db->get('sales_return_products');
$sales_returns=$sales_return_products->row();

if($sales_returns->return_recived_status == "1"){

            $value->remarks='Returned'.' ( '.$sales_returns->edit_nos.' ) ';

            // to show nos and qty when driver whole return means
            $return_nos_tab_data=0;
            $return_qty_data=0;
            if($nos_tab_data == '0'){

                        $return_nos_tab_data=$sales_returns->edit_nos;
                        $return_qty_data=$sales_returns->qty;
                        
            }
            

}else {
    $value->remarks='';
}
   
                        
        $array[] = array(
            'no' => $i,
            'id' => $value->id,
            'found' => $found,
            // 'rowprofile' => $rowprofile,
            'rowprofile' => $row_total_count,
            'profile_tab_convert' => $profile_tab_convert,
            'crimp_tab_convert' => $crimp_tab_convert,
            'dim_one_convert' => $dim_one_convert,
            'dim_two_convert' => $dim_two_convert,
            'dim_three_convert' => $dim_three_convert,
            'same' => $same,
            'default_uom' => $default_uom,
            'sorthide' => $sorthide,
            'imagestatus' => $imagestatus,
            'order_id' => $value->order_id,
            'activel_qty' => $value->activel_qty,
            'select_profile' => $value->select_profile,
            'remarks' => $value->remarks,
            'weight' => round($value->weight, 2),
            'default_weight' => round($weight, 2),
            'thickness' => $thickness,
            'sub_product_name_tab' => $product_name_sub,
            'purchase_request' => $value->purchase_request,
            'purchase_id' => $value->purchase_id,
            'product_name_tab' => $product_name,
            'tile_material_name' => $value->tile_material_name,
            'tile_material_id' => $value->tile_material_id,
            'meterial_category' => $value->meterial_category,
            'reference_image' => $value->reference_image,
            'sub_product_id' => $value->sub_product_id,
            'remarks' => $value->remarks,
            'categories' => $categories,
            'type' => $type,
            'description' => $description,
            'product_id' => $value->product_id,
            'return_complaint' => $value->return_complaint,
            'sort_id' => $value->sort_id,
            'count_id' => $value->count_id,
            'return_status' => $value->return_status,
            'rate_edit' => round($value->rate_edit, 2),
            'categories_id' => $value->categories_id,
            'specifications' => $value->specifications,
            'profile_tab' => round($profile, 3),
            'crimp_tab' => round($crimp, 3),
            'checked' => $value->checked,
            'dim_two' => $value->dim_two,
            'dim_one' => $value->dim_one,
            'dim_three' => $value->dim_three,
            'image_length' => $value->image_length,
            'gst' => $value->gst,
            'gst_check' => $value->gst_check,
            'extra_crimp' => round($value->extra_crimp, 3),
            'back_crimp' => round($value->back_crimp, 3),
            'proudtcion_no' => $value->proudtcion_no,
            'nos_tab' => $nos_tab_data,
            'unit_tab' => $value->unit,
            'return_status' => $value->return_status,
            'fact_tab' => round($value->fact, 2),
            'uom' => $value->uom,
            'base_id' => $value->base_id,
            'stock' => $stock,
            'kg_price' => $kg_price,
            'og_price' => $og_price,
            'og_formula' => $og_formula,
            'kg_formula2' => $kg_formula2,
            'billing_options' => $value->billing_options,
            'commission_tab' => round($value->commission, 2),
            'cate_status' => $cate_status,
            'categories_id_get' => $categories_id,
            'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2),
            'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
            'rate_tab' => round($rate, 2),
            'cul' => $value->cul,
            'qty_tab' => round($qty, 3),
            'amount_tab' => round($amount, 2),
            'remark' => $remarks,
            'profile_val' => round($profile_val, 3),
            'return_nos_tab_data' => $return_nos_tab_data,
            'return_qty_data' => round($return_qty_data, 3),
          
        );
        $i++;
    }


    echo json_encode($array);
}







public function return_items($dc_id) {
    $this->db->select('sales_return_products.purchase_order_product_id');
    $this->db->where('randam_id', $dc_id);
    $sales_return_products=$this->db->get('sales_return_products');
    $data=$sales_return_products->result();
    return $data;
}









    public function fetchDataCategorybase_delevery_notes_dc() {
        $i = 1;
         $array = array();
         $cate_status = '0';
         $tablename_sub = $_GET['tablename_sub'];
         $DC_id = $_GET['DC_id'];
    
         $sql = "";
    
    
         if (isset($_GET['attachment_status'])) {
    
    
             $attachment_status = $_GET['attachment_status'];
    
    
             if ($attachment_status == 1) {
                 $sql .= " AND a.reference_image!=''";
             }
         }
    
    //    // gg changes
    
    //    $sql=" AND ss.randam_id='".$DC_id."'";
    //    $JOIN=' JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id JOIN sales_load_products as ss ON a.id=ss.order_product_id';
       
    //    $convert = $_GET['convert'];
    //    $result = $this->db->query("SELECT b.type,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
    //    $result = $result->result();
    
    // gg changes
    
    $sql=" AND ss.randam_id='".$DC_id."'";
    $JOIN=' JOIN order_delivery_order_status as ds ON a.order_id=ds.order_id JOIN sales_load_products as ss ON a.id=ss.order_product_id';
    
    $convert = $_GET['convert'];
    $result1 = $this->db->query("SELECT b.type,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
    $result_data1 = $result1->result();
    
    $return_ids = $this->return_items($DC_id);
    
    $result_data2 = array();
    
    if (!empty($return_ids)) {
        // Extract the 'purchase_order_product_id' from each object in $return_ids
        $return_ids_array = array_map(function($obj) {
            return $obj->purchase_order_product_id;  // Extract 'purchase_order_product_id'
        }, $return_ids);
        
        // Convert the array of IDs into a comma-separated string
        $return_ids_str = implode(',', $return_ids_array);
    
        $result12 = $this->db->query("SELECT b.type,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id $JOIN WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 AND a.id IN ($return_ids_str) GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
    
        $result_data2 = $result12->result();
    }
    
    
    // Merge the arrays
    $result = array_merge($result_data1, $result_data2);
    
    
    
    
    /*
    // Extract 'categories_id' from the result
    $categories = array_column($result, 'categories_id');
    
    // Use array_unique to get unique category IDs
    $unique_categories = array_unique($categories);
    
    // Filter the result to include only unique 'categories_id' objects
    $unique_result = array_filter($result, function($item) use (&$unique_categories) {
        if (in_array($item->categories_id, $unique_categories)) {
            // Remove the current 'categories_id' from $unique_categories to avoid duplicates
            unset($unique_categories[array_search($item->categories_id, $unique_categories)]);
            return true;
        }
        return false;
    });
    
    // Convert the filtered result back to an indexed array
    $result = array_values($unique_result);
    
    */
    
    
    
    
    
    // Extract unique combinations of 'type' and 'categories_id'
    $unique_keys = [];
    $unique_result = array_filter($result, function($item) use (&$unique_keys) {
        // Create a unique key based on 'type' and 'categories_id'
        $key = $item->type . '-' . $item->categories_id;
        if (!in_array($key, $unique_keys)) {
            // Add the unique key to the list to avoid duplicates
            $unique_keys[] = $key;
            return true;
        }
        return false;
    });
    
    // Convert the filtered result back to an indexed array
    $result = array_values($unique_result);
    
    
    
    // Now $result contains only unique 'categories_id' objects
    
    
         foreach ($result as $value) {
             if ($convert == 1) {
                 $qty = $value->qty_total;
             } else {
                 $qty = $value->Sqr_feet_to_Meter;
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
                     $value->uom = 'QTY';
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
         
    
    
    // GG CHANGES FOR KG TH
    
    if($value->billing_options>0)
                {
    
    
                     if($value->billing_options==2)
                     {
                        $value->uom = 'Qty';
                     }
                     else
                     {
                        $value->uom = 'Qty';
                     }
    
    
                }
                else
                {
    
                    if($value->uom != '') 
                    {
                        $value->uom = $value->uom;
                    } 
                    else 
                    {
                        $value->uom = 'Qty';
                    }
    
                }
           
                //AStockUpdate-live-01/07
                 if($value->categories_id == 611 || $value->categories_id == 627 || $value->categories_id == 626 || $value->categories_id == 36 || $value->categories_id == 34){ 
                    
                       $value->uom = 'Qty';
                }
    
    
    
                if($convertion==2)
                {
    
                      if($value->categories_id == 611 || $value->categories_id == 627 || $value->categories_id == 626 || $value->categories_id == 36 || $value->categories_id == 34){
                    
                       $value->uom = 'Kg';
    
                      }
    
                }
    
            //  if ($value->uom != '') {
            //      $value->uom = $value->uom;
            //  } else {
            //      $value->uom = 'QTY';
            //  }
    
    
    
    
    
    
    
    
    
    
    
    
    
             $categories_id = $value->categories_id;
             if ($categories_id == '1') {
                 $cate_status = 1;
             } elseif ($categories_id == '2622') {
                 $cate_status = 1;
             } elseif ($categories_id == '5') {
                 $cate_status = 0;
             } elseif ($categories_id == '32') {
                 $cate_status = 1;
             } elseif ($categories_id == '40') {
                 $cate_status = 0;
             } elseif ($categories_id == '41') {
                 $cate_status = 0;
             }
             elseif ($categories_id == '591' || $categories_id == '626' || $categories_id == '611' || $categories_id == '627') {
                 $cate_status = 1;
             }
              else {
                 $cate_status = 0;
             }
    
    
             $activel_qty_total_set_overall = $value->activel_qty_total_set;
             $activel_qty_total_set = $qty;
    
    
             $nos_total = 0;
             $qty_total = 0;
             
             $statusviewdata = $this->db->query("SELECT nos, qty FROM sales_load_products WHERE pickedstatus=1 AND randam_id='".$DC_id."' ORDER BY id ASC");
             $statusviewdata = $statusviewdata->result();
             
             foreach ($statusviewdata as $row) {
                 // Check if 'nos' is not empty
                 if (!empty($row->nos)) {
                     $nos_total += intval($row->nos);  // Sum 'nos' if it has a value
                 } else {
                     $qty_total += intval($row->qty);   // Sum 'qty' if 'nos' is empty
                 }
             }
             
             // Total of nos and qty
             $nos_total_data = $nos_total + $qty_total;   
    
             $array[] = array(
                 'no' => $i, 'id' => $value->id, 'categories_id' => $value->categories_id, 'activel_qty_total_set_overall' => round($activel_qty_total_set_overall, 3), 'activel_qty_total_set' => round($activel_qty_total_set, 3), 'cate_status' => $cate_status, 'type' => $value->type, 'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype, 'activel_qty_total' => $activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total, 2), 'nos_total' => round($nos_total_data, 2), 'fact_total' => round($value->fact_total, 2), 'qty_total' => round($qty, 3),
                 'amount_total' => round($value->amount_total, 2)
             );
             $i++;
         }
         echo json_encode($array);
     }
         
    
















    
    
    
     public function get_address() {
         
         $data_address=array();
        $form_data = json_decode(file_get_contents("php://input"));
        $tablename = $form_data->tablename_sub;
        $id = $form_data->id;
        $result = $this->Main_model->where_names('customers_adddrss', 'id', $id);
        foreach ($result as $form_data) {
                        $data_address['id'] = $form_data->id;
                        $data_address['name'] = $form_data->name;
                        $data_address['address1'] = $form_data->address1;
                        $data_address['address2'] = $form_data->address2;
                        $data_address['locality'] = $form_data->locality;
                        $data_address['phone'] = $form_data->phone;
                        $data_address['zone'] = $form_data->zone;
                        $data_address['city'] = $form_data->city;
                         $data_address['gst_status'] = $form_data->gst_status;
                        $data_address['gstno'] = $form_data->gstno;
                        $data_address['pincode'] = $form_data->pincode;
                        $data_address['state'] = $form_data->state;
                        $data_address['landmark'] = $form_data->landmark;
                        $data_address['google_map_link'] = $form_data->google_map_link;
        }
        echo json_encode($data_address);
    }
    
    public function customeradd_address() {
         $form_data = json_decode(file_get_contents("php://input"));
        
        
        if ($form_data->action == 'Save') {
            
            
            if ($form_data->phone != '' && $form_data->name != '') 
            {
                
                
                $tablename = $form_data->tablename;
                $tablenamemain = $form_data->tablenamemain;
                $result = $this->Main_model->where_names($tablenamemain, 'id', $form_data->order_id);
                if (count($result) > 0) {
                    foreach ($result as $cus) {
                        $customer_id = $cus->customer_id;
                        $sales_group = $cus->sales_group;
                    }
                    if($customer_id>0)
                    {
                        
                        
                         $locality=explode('-', $form_data->locality);
                         $form_data->locality=$locality[0];
                        
                        
                        $data_address['customer_id'] = $customer_id;
                        $data_address['user_id'] = $this->userid;
                        $data_address['name'] = $form_data->name;
                        $data_address['address1'] = $form_data->address1;
                        $data_address['address2'] = $form_data->address2;
                        $data_address['locality'] = $form_data->locality;
                        $data_address['phone'] = $form_data->phone;
                        $data_address['zone'] = $form_data->zone;
                        $data_address['city'] = $form_data->city;
                        $data_address['pincode'] = $form_data->pincode;
                        $data_address['state'] = $form_data->state;
                        $data_address['landmark'] = $form_data->landmark;
                        $data_address['status'] = $form_data->status;
                        $data_address['google_map_link'] = $form_data->google_map_link;
                        $data_address['gstno'] = $form_data->gstno;
                        $data_address['gst_status'] = $form_data->gst_status;

    
                        $data_address_cus['get_id'] = $customer_id;
                        // $data_address_cus['gst_status'] = $form_data->gst_status;
                        // $data_address_cus['gst'] = $form_data->gstno;

                        // $this->Main_model->update_commen($data_address_cus, 'customers');
                        if($form_data->address_id>0)
                        {    
                             $data_address['get_id'] = $form_data->address_id;
                             $addressid=$form_data->address_id;
                             $this->Main_model->update_commen($data_address, 'customers_adddrss');
                        }
                        else
                        {
                            $addressid = $this->Main_model->insert_commen($data_address, 'customers_adddrss');
                        }
                          
                        
                        $route_id = 0;
                        $routeset = $this->Main_model->where_names('locality', 'id', $form_data->locality);
                        foreach ($routeset as $routesetval) {
                            $route_id = $routesetval->route_id;
                        }
                        $datass['get_id'] = $form_data->order_id;
                        $datass['customer_address_id'] = $addressid;
                        $datass['route_id'] = $route_id;
                        $datass['sales_group'] = $sales_group;
                        
                        
                        $this->Main_model->update_commen($datass, $tablenamemain);

                        
                        $array = array('error' => '2', 'massage' => 'Customer address successfully Added..');
                        echo json_encode($array);
                    } 
                    else
                    {
                        $array = array('error' => '3', 'massage' => 'Please select Customer');
                        echo json_encode($array);
                    }
                    
                    
                } else {
                    $array = array('error' => '3', 'massage' => 'Please select Customer');
                    echo json_encode($array);
                }
            } else {
                $array = array('error' => '1');
                echo json_encode($array);
            }
        }
    }
    
    
    public function overview_attachement() {
        if (isset($this->session->userdata['logged_in'])) {
           // $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            
            
            
            //$resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
           // $data['layout_plan'] = $resultmain->result();
            
            
            $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content', 'deleteid', '0', 'id', 'ASC');
            //$data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            
           // $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            
            
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);
            $data['old_tablename'] = $_GET['old_tablename'];
            $data['old_tablename_sub'] = $_GET['old_tablename_sub'];
            $data['tablename'] = $_GET['tablename'];
            $data['tablename_sub'] = $_GET['tablename_sub'];
            $data['movetablename'] = $_GET['movetablename'];
            $data['movetablename_sub'] = $_GET['movetablename_sub'];
            $data['order_title'] = 'Quotation NO';
            $data['order_lable'] = 'Quotation Create';
            $data['missed'] = 'Quotation';
            $data['move'] = 'Order ';
            $data['status_base'] = 10;
            $neworder_quotation_id = 1;



            $data['viewstatus'] = $_GET['viewstatus'];
           



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
            
            
             if($_GET['tablename']=='orders_quotation')
             {
                 $order_id='QC_'.$data['order_id'];
             }
             else
             {
                 $order_id='OR_'.$data['order_id'];
             }
            
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $order_id, 'id', 'ASC');
            
            
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Overview Attachement' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/overview_attachement', $data);
        } else {
            $this->load->view('admin/index');
        }
    }


 
    public function fetchDataCategorybase() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        
        $sql="";
        
        
        if(isset($_GET['attachment_status']))
        {
            
        
        
                $attachment_status = $_GET['attachment_status'];
                
               
                if($attachment_status==1)
                {
                    $sql=" AND a.reference_image!=''";
                }
                
        
        }
        
        
             if (isset($_GET['DC_id']))
         {

                $DC_id = $_GET['DC_id'];
               // $sql.=' AND a.randam_id="'.$DC_id.'"';

         }


        
        $convert = $_GET['convert'];
        $result = $this->db->query("SELECT b.gst,b.type,a.categories_id,a.billing_options,a.product_id,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.weight) as weight_tot,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.sort_id,a.count_id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            if ($convert == 1) {
                $qty = $value->qty_total;
            } else {
                $qty = $value->Sqr_feet_to_Meter;
            }
            $wegtot = $value->weight_tot;
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
                      //$value->uom = 'KG';
                      // GG CHANGES FOR KG TO QTY
                      $value->uom = 'QTY';

                 }
                 else
                 {
                    $value->uom = $value->uom;
                 }

                 $value->uom = 'QTY';

            }
            else
            {

                if ($value->uom != '') {
                $value->uom = $value->uom;
                } else {
                    $value->uom = 'QTY';
                }

            }
            $categories_id = $value->categories_id;
            if ($categories_id == '1') {
                $cate_status = 1;
            } elseif ($categories_id == '2622') {
                $cate_status = 1;
            } elseif ($categories_id == '5') {
                $cate_status = 0;
            } elseif ($categories_id == '32') {
                $cate_status = 1;
            } elseif ($categories_id == '40') {
                $cate_status = 0;
            } elseif ($categories_id == '41') {
                $cate_status = 0;
            }
            elseif ($categories_id == '591' || $categories_id == '626' || 
            $categories_id == '611' || $categories_id == '627' || $categories_id == '628') {
                $cate_status = 1;
            }
            else {
                $cate_status = 0;
            }
 
      


           $edit_nos=0;
           $edit_qty=0;



               if($value->gst>0)
               {
                         $gst=$value->gst;
               }
               else
               {
                    $gst=18;
               }


                $activel_qty_total_set_overall=$value->activel_qty_total_set;
                $activel_qty_total_set=$qty;


            if($DC_id!='')
            {


                        $queryss = $this->db->query("SELECT SUM(b.qty) as qty,SUM(b.nos) as nos,SUM(b.amount) as amount,SUM(b.weight) as weight_tot  FROM order_product_list_process as a  JOIN sales_load_products as b ON a.id=b.order_product_id WHERE a.deleteid='0' AND b.loadstatus='1' AND b.delivered_products='0' AND b.randam_id='" . $DC_id . "' AND a.categories_id='".$value->categories_id."'");
                        $queryss = $queryss->result();
                        foreach ($queryss as $valueload)
                        {
              
                          $qty= $valueload->qty;
                          $wegtot= $valueload->qty;
                          $value->nos_total= $valueload->nos;
                          $value->amount_total= round($valueload->amount);
                                         
                         }



             }            

            
            
            $array[] = array('no' => $i,'gst' => $gst, 'id' => $value->id, 'categories_id' => $value->categories_id,'activel_qty_total_set_overall' => round($activel_qty_total_set_overall,3),'activel_qty_total_set' => round($activel_qty_total_set,3),'cate_status' => $cate_status, 'type' => $value->type,'tile_check' => $value->tile_check > 0 ? $value->tile_check : '0', 'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype,'activel_qty_total'=>$activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total,2), 'nos_total' => round($value->nos_total,2), 'fact_total' => round($value->fact_total,2), 'qty_total' => round($qty,3),'weg_total' => round($wegtot,3),
             'amount_total' => round($value->amount_total,2));
            $i++;
        }
        echo json_encode($array);
    }
       

   
        
    public function print_log() {
        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        
     
        
        
        
        
        $tablename = $_GET['tablename'];
        
        
        
        $i = 1;
        $array = array();
        
        
        
        
        
        $querycount = $this->db->query("SELECT * FROM $tablename  WHERE print_status='1'  ORDER BY id DESC");
        $resultcount = $querycount->result();
        $count=count($resultcount);
            
            
        $query = $this->db->query("SELECT * FROM $tablename   WHERE print_status='1'  ORDER BY id DESC LIMIT $offset, $pagesize");
        $result = $query->result();
        
      
        foreach ($result as $value) {
           






             $name = "";
             $sales_head_res = $this->Main_model->where_names('admin_users', 'id', $value->user_id);
             foreach ($sales_head_res as $orderbyvals) {
                $name = $orderbyvals->name;
             }



            
            $array[] = array('no' => $i,'name' => $name,  'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,'form_order' => $value->form_order,'to_order' => $value->to_order);
            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        
        
        
        echo json_encode($myData);
    }
    
    
        
         public function production_print_log_details() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            
            
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            
            
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Production print Log';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/production_print_log_details', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
         
        
    public function fetch_data() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        
       
        
        $sql="";
        if(isset($_GET['attachment_status']))
        {
             $attachment_status = $_GET['attachment_status'];
        
                if($attachment_status==1)
                {
                    $sql=" AND reference_image!=''";
                }
        
        
        }
        
        $convert = $_GET['convert'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
            $base_check = $valuecs->base_check;
            $gst_check = $valuecs->gst_check;
        }
        $result = $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0 AND product_id>0  $sql ORDER BY categories_id,sort_id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            $rate=$value->rate+$value->commission;
            $amountdata =  $rate * $value->qty;
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
                $fact2 = $csval->formula2; // fact2 changes
                $fact1 = $csval->formula; // fact2 changes
                # //WEIGHT RETURN UPDATE
                $density= $csval->density;
                $dimensions= $csval->dimensions;
                $price= $csval->price;
                $standard_weight = $csval->standard_weight;       
                $kg_rmtr_weight = $csval->kg_rmtr_weight;

                
                
                       if($tablenamemain=='purchase_orders_process')
                        {    
                             if($csval->purchase_name!='')
                             {
                                 $product_name = $csval->purchase_name;
                             }
                             
                        }

                    # //WEIGHT RETURN UPDATE
                
                    if ($csval->categories_id == '1') {
                            if($csval->sub_product_id > 0){
                            $product_list1 = $this->Main_model->where_names('product_list', 'id', $csval->sub_product_id);
                            foreach ($product_list1 as $csval1) {
                                $thickness= $csval1->thickness;
                                $standard_weight = $csval1->standard_weight;       
                                $kg_rmtr_weight = $csval1->kg_rmtr_weight;      
                            }
                            }
                        }

                      
                        $thickness_tile_prod = "";
                        if($value->tile_material_id > 0){
                            $product_list2 = $this->Main_model->where_names('product_list', 'id', $value->tile_material_id);
                            foreach ($product_list2 as $val1) {
                                $thickness_tile_prod= $val1->thickness;
                                $standard_weight = $val1->standard_weight;       
                                $kg_rmtr_weight = $val1->kg_rmtr_weight;      
                            }
                        }else if($value->sub_product_id > 0){
                            $product_list3 = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
                            foreach ($product_list3 as $val3) {
                                $thickness_tile_prod= $val3->thickness;
                                $standard_weight = $val3->standard_weight;       
                                $kg_rmtr_weight = $val3->kg_rmtr_weight;      
                            }
                        }else{
                            $standard_weight = $csval->standard_weight;       
                            $kg_rmtr_weight = $csval->kg_rmtr_weight;      
                        }
                

                        if ($csval->categories_id == '30') {
                            $top_thickness= $csval->top_sheet_thickness;
                            $bottom_thickness= $csval->bottom_sheet_thickness;
                            $foarm_thickness= $csval->foam_denstiy;
                            if($foarm_thickness == '40(+/- 2) kgs/m3'){
                                $foarm = '40';
                            }else if($foarm_thickness == '50(+/- 2) kgs/m3'){
                                $foarm = '50';
                            }else{
                                $foarm = '';
                            }
                        }
                # //WEIGHT RETURN UPDATE
                
                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                 $formula = $csval->formula;
                $gst = $csval->gst;


                $kg_price = $csval->kg_price;
                $og_price = $csval->price;
                $stock = round($csval->stock);
                $og_formula = $csval->formula;
                $kg_formula2 = $csval->formula2;


                $og_formula = $csval->length;
                $kg_formula2 = $csval->width;


                if ($categories_id == '1') {
                    $cate_status = 1;
                }elseif ($categories_id == '630') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 0;
                } elseif ($categories_id == '41') {
                    $cate_status = 0;
                } 
                elseif ($categories_id == '36') {
                    $cate_status = 0;
                     $kg_formula2 = $csval->formula2; // fact2 changes
                     $og_formula = $csval->formula; // fact2 changes
                } 
                elseif ($categories_id == '34') {
                    $cate_status = 0;
                     $kg_formula2 = $csval->formula2; // fact2 changes
                     $og_formula = $csval->formula; // fact2 changes
                } 
                elseif ($categories_id == '591' || $categories_id == '626' || $categories_id == '627' || $categories_id == '628') {
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
            if($tablename_sub=='order_product_list_process')
            {
                $profile_edit=$value->profile_edit;
                $crimp_edit=$value->crimp_edit;
                $fact_edit=$value->fact_edit;
                $nos_edit=$value->nos_edit;
                $qty_edit=$value->qty_edit;
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
                 $product_name_sub_thick=$csval_sub->thickness; //WEIGHT RETURN UPDATE
            }




           $edit_nos=0;
           $edit_qty=0;
       





            $rate=$value->rate+$value->commission;


            if($amount>0)
            {
               $disabled="0";
            }
            else
            {
                $disabled="1";
            }


            $create_date_check_gst= date('Y-m-d',strtotime($value->create_date));
            if($create_date_check_gst>'2024-02-20')
            {

             $base_rate=round($rate/1.18,4);


            }
            else
            {


              $base_rate=round($rate/1.18,3);



            }

           if($value->gst>0)
           {
                     $value->gst=$value->gst;
           }
           else
           {
            $value->gst=18;
           }



            $gst_price=0;
            $gstamount=0;
            if($gst_check==1)
            {


                    if($create_date_check_gst>'2024-02-20')
                    {

                      $gst_price=round($rate-$base_rate,4);


                    }
                    else
                    {


                     $gst_price=round($rate-$base_rate,3);



                    }
                    
                  $gstamount= $gst_price*$qty;



            }

               $sub_product_id_check='';
                if($value->sub_product_id>0)
                {
                     $sub_product_id_check= $value->sub_product_id.'-';
                }

                if($value->fact2 > 0){ // fact2 changes
                    $fact2 = $value->fact2;
                }

                 
               

            //decking roll sheet
            $fact_tab =$value->fact;
            if(($value->categories_id == '626' || $value->categories_id == '611') && $value->sub_product_id > 0){
                $prod_li_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
                    foreach ($prod_li_sub as $sub)
                    {
                        $fact1=$sub->formula;
                        $fact2=$sub->formula2  ;
                    }
                    if($value->fact > 0){
                        $fact_tab = $value->fact;
                    }else{
                        $fact_tab = $fact1;
                    }

                     if($value->fact2 > 0){
                        $fact2 = $value->fact2;
                    }
                    
             }
            $billing_options = $value->billing_options;
             if($value->categories_id == '611' || $value->categories_id == '627'){
               if($value->billing_options > 0){
                    $billing_options = $value->billing_options;
               }else{
                    $billing_options = 4;
               }

             }

             $prod_li = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
                foreach ($prod_li as $subs)
                {
                    $basefact=$subs->formula;
                    $basecat=$subs->categories_id;
                }
// gg changes for activel qty
                $prod_li = $this->Main_model->where_names('product_list', 'id', $value->product_id);
                foreach ($prod_li as $sub1)
                {
                    if($sub1->uom == 'Kg'){
                        $activel_qty=$value->weight;
                    }else{
                        $activel_qty=$value->weight;
                    }
                    
                }
          

            $array[] = array('no' => $count_id,
            'profile_edit' => round($profile_edit,3),
            'crimp_edit' => round($crimp_edit,3),
            'fact_edit' => round($fact_edit,3),
            'nos_edit' => round($nos_edit-$edit_nos,3),
            'qty_edit' => round($qty_edit-$qty,3),
            'id' => $value->id,
            'oid' => $value->order_process_product_id,
             'same' => $same,
             'fact2'=> $fact2, // fact2 changes
             'fact1'=> $fact1, // fact2 changes
             'gst_price' => $gst_price,
             'base_rate' => $base_rate,
             'base_check' => $base_check,
             'disabled' => $disabled,
             'sorthide' => $sorthide, 
             'imagestatus' => $imagestatus,
              'order_id' => $value->order_id,
              //'activel_qty' => $value->activel_qty,

              'activel_qty' => $activel_qty,
              'qty' => $value->activel_qty,


              'weight' => round($value->weight,3),
              
              'default_weight'=>round($weight,3),//weight update return old
              'thickness'=>$thickness,//weight update return old
              'standard_weight'=>round($standard_weight,3), //weight update return old
              'kg_rmtr_weight'=>round($kg_rmtr_weight,3), //weight update return old
              'default_fact'=>$formula,//weight update return old
              'basefact'=> $basefact, // weight update return old
             'basecat'=> $basecat,  //weight update return old
             'thickness_tile_prod' => $thickness_tile_prod, //weight update return old
              'product_name_sub_thick'=>$product_name_sub_thick, //weight update return old

              'sub_product_name_tab'=>$product_name_sub,
              'purchase_request' => $value->purchase_request,
              'purchase_id' => $value->purchase_id,
               'product_name_tab' => $product_name,
                'tile_material_name' => $value->tile_material_name,
                 'tile_material_id' => $value->tile_material_id,
                 'meterial_category' => $value->meterial_category,
                 'reference_image' => $value->reference_image,
                 'sub_product_id' => $value->sub_product_id, 
                 'remarks' => $value->remarks, 
                 'select_profile' => $value->select_profile,
                 'categories' => $categories,
                  'type' => $type,
                   'description' => $description, 
                   'product_id' => $value->product_id,
                    'return_complaint' => $value->return_complaint,
                    'sort_id' => $value->sort_id,
                   'count_id' => $value->count_id,
                    'return_status' => $value->return_status,
                    'rate_edit' => round($value->rate_edit,2), 
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
                              'nos_tab' => round($value->nos-$edit_nos,2),
                               'unit_tab' => $value->unit,
                                'return_status' => $value->return_status,
                                 'fact_tab' => round($fact_tab,2), 
                                 'uom' => $value->uom,
                                  'base_id' => $value->base_id,
                                   'stock' => $stock, 
                                   'kg_price' => $kg_price, 
                                   'og_price' => $og_price, 
                                   'og_formula' => $og_formula,
                                    'kg_formula2' => $kg_formula2, 
                                    'billing_options' => $value->billing_options,
                                     'commission_tab' => round($value->commission,2),
                                      'cate_status' => $cate_status, 
                                      'categories_id_get' => $categories_id,
                                       'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2),
                                        'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                                         'rate_tab' => round($rate,2), 
                                         'cul' => $value->cul,
                                          'qty_tab' => round($qty-$edit_qty,3), 
                                          'amount_tab' => round($amount, 2),
                                          'picked_status' => $value->picked_status,
                                          'org_qty' => round($value->org_qty), 
                                          'org_nos' => round($value->org_nos), 

                                        );
            $i++;
        }
        echo json_encode($array);
    }
    
    // update status gg changes 

    public function update_status_material_return(){

        date_default_timezone_set("Asia/Kolkata"); 
        $date= date('Y-m-d');
        $time= date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
            $id=$form_data->id;
            $status=$form_data->status;


            if (isset($id) && $id > 0 && !is_nan($id) && $id != 0) {
                // Value is valid, update the record

                $this->db->query("UPDATE order_product_list_process_return_temp 
                                SET picked_status='" . $form_data->status ."'
                                WHERE id='" . $form_data->id . "'");

            }


             

    }




    
   public function sales_return_data_temp()
    {
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $order_no=$form_data->order_no;
                   $remarks=$form_data->remarks;
                   $create_date=$form_data->create_date;
                   
                   
                     
       
        
                $deleteid = 0;
                if($deleteid == 0)
                {
           
           
           
          
             $tablenamemain='orders_process';
            //$result_order = $this->Main_model->where_names($tablenamemain, 'order_no', $order_no);
                $result_order =$this->Main_model->where_names_two_order_by($tablenamemain, 'order_no', $order_no, 'deleteid', '0', 'id', 'ASC');



            foreach ($result_order as $orders) {
               
                $find['order_no']=$orders->order_no;

                //gst task
                $createDateValue=$orders->create_date;

                $customer_id = $orders->customer_id;
                $find['customer_id'] = $orders->customer_id;
                $find['sales_group'] = $orders->sales_group;
                $find['roundoff'] = $orders->roundoff;
                $find['roundoffstatus'] = $orders->roundoffstatus;
                $find['move_id'] = $form_data->order_id;
                $find['customer_address_id'] = $orders->customer_address_id;
                $find['route_id'] = $orders->route_id;
                $find['user_id'] = $orders->user_id;
                $find['entry_user_id'] = $this->userid;
                $find['remarks'] = $remarks;
              
                $find['create_date'] = $orders->create_date;
                $find['roundoff'] = $orders->roundoff;
                $find['roundoffstatus'] = $orders->roundoffstatus;
                $find['mark_date'] = $orders->mark_date;
                $find['return_date'] = $create_date;

                $find['create_time'] = $time;
                $find['status'] = 1;
                $find['deleteid'] = $deleteid;
                $find['finance_status'] = 2;
                $find['delivery_status'] = 1;
                $find['selforder'] =0;
                $find['commission_check'] = $orders->commission_check;
                $find['gst_check'] = $orders->gst_check;
                $find['delivery_charge'] = $orders->delivery_charge;



                $find['SSD_check'] = $orders->SSD_check;
                $find['delivery_date_time'] = $orders->delivery_date_time;

                $delivery_status=$orders->delivery_status;

                $find['delivery_status'] = $orders->delivery_status;
                $find['payment_mode'] = $orders->payment_mode;
                $find['paricel_mode'] = $orders->paricel_mode;
                $find['order_base'] = 1;
                $find['reason'] = 'Return Order Created';
                $find['discount'] = $orders->discount;
                
                
                
                $find['delivery_mode'] = $orders->delivery_mode;
                $payment_mode = $orders->payment_mode;
                $delivery_charge = $orders->delivery_charge;
                $minisroundoff = $orders->roundoff;
                $roundoffstatus = $orders->roundoffstatus;
                $discount = $orders->discount;
                
                $find['others'] = $orders->others;
                $find['print'] = $orders->print;
                $find['packaging'] = $orders->packaging;
                $find['competitorname'] = $orders->competitorname;
                $find['details'] = $orders->details;
                $result_order = $this->Main_model->where_names('orders_process_return_temp', 'order_no', $orders->order_no);
               
               
                if(count($result_order) == 0) 
                {
                    
                    $insertid = $this->Main_model->insert_commen($find, 'orders_process_return_temp');
                    $order_no = $form_data->order_no;
                    $find['order_no'] = $order_no;
                    $this->db->query("UPDATE orders_process_return_temp SET order_no='".$order_no."' WHERE id='".$insertid."'");


                }
                else
                {
                    foreach ($result_order as $orderst) {
                        $insertid = $orderst->id;
                    }
                    $datass['get_id'] = $form_data->order_no;
                    $datass['order_base'] = 1;
                    $datass['customer_id'] = $orders->customer_id;
                    $datass['customer_address_id'] = $orders->customer_address_id;
                    $datass['remarks'] = $remarks;
                    $datass['return_date'] = $create_date;
                    $datass['create_date'] = $create_date;
                    $datass['finance_status'] = 2;
                    $datass['roundoff'] = $orders->roundoff;
                    $datass['roundoffstatus'] = $orders->roundoffstatus;
                    $datass['deleteid'] = $deleteid;
                    $this->Main_model->update_commen_where($datass, 'order_no', 'orders_process_return_temp');
                }
                
              
                $this->Main_model->delete_where_new('order_product_list_process_return_temp', 'order_id', $insertid);
                $result_order_product = $this->Main_model->where_names_two_order_by('order_product_list_process', 'order_id', $orders->id, 'deleteid', '0', 'id', 'ASC');
                $totalamount = 0;
                foreach ($result_order_product as $orders_product) {
                    $findp['order_id'] = $insertid;
                    $findp['order_id'] = $insertid;
                    $findp['order_process_product_id'] = $orders_product->id;
                    $findp['product_name'] = $orders_product->product_name;
                    $findp['loadstatus_by_cate'] = $orders_product->loadstatus_by_cate;
                    $findp['product_id'] = $orders_product->product_id;
                    $findp['tile_material_name'] = $orders_product->tile_material_name;
                    $findp['tile_material_id'] = $orders_product->tile_material_id;
                    $findp['meterial_category'] = $orders_product->meterial_category;
                    $findp['categories_name'] = $orders_product->categories_name;
                    $findp['dim_one'] = $orders_product->dim_one;
                    $findp['dim_two'] = $orders_product->dim_two;
                    $findp['dim_three'] = $orders_product->dim_three;
                    $findp['base_id'] = $orders_product->base_id;
                    $findp['image_length'] = $orders_product->image_length;
                    $findp['gst'] = $orders_product->gst;
                    $findp['gst_check'] = $orders_product->gst_check;
                    $findp['categories_id'] = $orders_product->categories_id;
                    $findp['profile'] = $orders_product->profile;
                    $findp['commission'] = $orders_product->commission;
                    $findp['address_id'] = $orders_product->address_id;
                    $findp['address_id_mark'] = $orders_product->address_id_mark;
                    $findp['paricel_mode'] = $orders_product->paricel_mode;
                    $additional_information = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');
                    foreach ($additional_information as $vl) {
                        $label_name = strtolower($vl->label_name);
                        $findp[$label_name] = $orders_product->$label_name;
                    }
                    $findp['crimp'] = $orders_product->crimp;
                    $findp['extra_crimp'] = $orders_product->extra_crimp;
                    $findp['back_crimp'] = $orders_product->back_crimp;
                    $findp['Meter_to_Sqr_feet'] = $orders_product->Meter_to_Sqr_feet;
                    $findp['Sqr_feet_to_Meter'] = $orders_product->Sqr_feet_to_Meter;



                  
                    // $findp['weight'] = $orders_product->weight;
                    $findp['uom'] = $orders_product->uom;
                    $findp['billing_options'] = $orders_product->billing_options;
                    $findp['unit'] = $orders_product->unit;
                    $findp['fact'] = $orders_product->fact;
                    $findp['fact2'] = $orders_product->fact2;
                    $findp['section_lable'] = $orders_product->section_lable;
                    $findp['section_value'] = $orders_product->section_value;
                    $findp['degree'] = $orders_product->degree;
                    $findp['sub_product_id'] = $orders_product->sub_product_id;
                    $findp['value_id'] = $orders_product->value_id;
                    $findp['reference_image'] = $orders_product->reference_image;
                    $findp['rate'] = $orders_product->rate;
                    


                    $findp['activel_qty'] = $orders_product->qty;
                    $findp['modify_qty'] = $orders_product->modify_qty;
                    $findp['sort_id'] = $orders_product->sort_id;
                    $findp['count_id'] = $orders_product->count_id;
                    //gst task
                     if($createDateValue > '2024-05-31'){
                    $findp['amount'] = $orders_product->amount * 1.18;
                    }else{
                        $findp['amount'] = $orders_product->amount;
                    }
                    $findp['deleteid'] = $orders_product->deleteid;
                    $findp['create_date'] = $orders_product->create_date;


                      

              $edit_nos=0;
              $edit_qty=0;
            $resultmaincountset = $this->db->query("SELECT SUM(qty) as qty,SUM(edit_nos) as edit_nos FROM sales_return_products  WHERE product_id='" .$orders_product->product_id . "' AND order_no='".$orders_product->order_id."'  AND order_process_product_id='" . $orders_product->id . "' AND deleteid=0 ORDER BY id ASC");
            
           $resultcsset = $resultmaincountset->result();
          foreach($resultcsset as $vl)
          {

             $edit_qty=$vl->qty;
             $edit_nos=$vl->edit_nos;

          }



                    $findp['nos'] = $orders_product->nos - $edit_nos;
                     $findp['qty'] = $orders_product->qty - $edit_qty;

                  $nos = $orders_product->nos - $edit_nos;
                    $results= $this->Main_model->where_names_row('*','product_list','id',$orders_product->product_id);
                    if($results->uom == 'Nos' || $results->uom == 'nos'){
                         $single = $orders_product->weight/$orders_product->qty;
                            $weg = $single * $findp['qty'];
                        // $weg = $findp['qty'];
                    }
                    else
                    {
                        if($orders_product->weight > 0 || $orders_product->weight < 0){
                            $single = $orders_product->weight/$orders_product->nos;
                            $weg = $single * $nos;
                        }else{
                            $weg = $orders_product->weight;
                        }
                    }

                               if($weg>0)
                               {
                                   $findp['weight'] = $weg;
                               }

                    




                    $findp['org_order_id'] = $orders_product->order_id;
                    $findp['org_qty'] = $orders_product->qty;
                    $findp['org_nos'] = $orders_product->nos;
                    $totalamount+= $orders_product->rate * $orders_product->qty;
                    $this->Main_model->insert_commen($findp, 'order_product_list_process_return_temp');
                }
            }
           // exit();
            
              $array = array('error' => '2', 'insert_id' =>base64_encode($insertid), 'massage' => 'Submitted');
              echo json_encode($array);

           
        } 
                
                 
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function sales_return_data_temp_old()
    {
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                      $customer=explode('-', $form_data->customer);
                      $customer_id=$customer[0];
                      $company_name=$customer[1];
                      $remarks=$form_data->remarks;
                      $create_date=$form_data->create_date;
                      
                      
                      

                                         $company_name="";
                                         $resultvordervv= $this->Main_model->where_names('customers','id',$customer_id);
                                         foreach ($resultvordervv as  $value2) {
                                                     
                                                       $company_name=$value2->company_name;
                                                       $route=$value2->route;
                                                       $locality=$value2->locality;
                                                      
                                         }



                                         $route_id=0;
                                         $resultvordervvw= $this->Main_model->where_names('locality','id',$locality);
                                         foreach ($resultvordervvw as  $value2w) {
                                                     
                                                      
                                                       $route_id=$value2w->route_id;
                                                      
                                                      
                                         }
                                         
                                         
                                         $neworder_id = 1;
                                         $order_last_count = $this->Main_model->order_last_count_mounth_year('orders_process_return_temp');
                                         foreach ($order_last_count as $r) {
                                            $neworder_id = $r->id + 1;
                                         }
                                         
                                         
                                         
                                         
                                         
                                         
                                             $order_no_data_new ='';
                   
                   
    
                                            
                                            $find['month'] = date('M');
                                            $find['year'] = date('Y');
                                            $find['count'] = $neworder_id;
                                            $find['order_no']=$order_no_data_new; 
                                            $find['customer_id'] = $customer_id;
                                            $find['remarks'] = $remarks;
                                            $find['create_date'] = $create_date;
                                            $find['mark_date'] = $create_date;
                                            $find['return_date'] = $create_date;
                                            $find['create_time'] = $time;
                                            $find['status'] = 1;
                                            $find['deleteid'] = 0;
                                            $find['finance_status'] = 2;
                                            $find['delivery_status'] = 1;
                                            $find['selforder'] =0;
                                           
                                            $find['order_base'] = 1;
                                            $find['reason'] = 'Return Order Created';
                                            
                                            $result_order = $this->Main_model->where_names('orders_process_return_temp', 'order_no', $orders->order_no);
                                            $insertid = $this->Main_model->insert_commen($find, 'orders_process_return_temp');
                                           
                                        
                                       
                                        
                                           $array = array('error' => '2', 'insert_id' =>base64_encode($insertid), 'massage' => 'Submitted');
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
        $amounttotalgst = 0;
        $amounttotal_with_out_commission = 0;
        $form_data = json_decode(file_get_contents("php://input"));
        $tablenamemain = $form_data->tablenamemain;
        $tablename = $form_data->tablename_sub;
        $convert = $form_data->convert;
        

        $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($result as $value) {
            $rate=$value->rate+$value->commission;
            //$amounttotal+= $rate * $value->qty;
            
       
            if($value->picked_status==1 )
            {

                        $amount_things=$value->rate*$value->qty;
                        $decimalPosition1 = strpos((string)$amount_things, '.');

                        // Check if there's a decimal point and more than 2 digits after it
                        if ($decimalPosition1 !== false && strlen(substr((string)$amount_things, $decimalPosition1 + 1)) > 2) {
                            // Truncate to 2 decimal places without rounding
                            $amount_things = floor($amount_things * 100) / 100;
                        }
                        $amounttotal+=$amount_things;


          }






            $amounttotal_with_out_commission+= $value->rate * $value->qty;
            $Meter_to_Sqr_feet+= $value->Meter_to_Sqr_feet;
            $Sqr_feet_to_Meter+= $value->Sqr_feet_to_Meter;
            $amounttotalgst+= $value->rate * $value->qty * $value->gst / 100;
            $commission+= $value->commission;
            $fullqty+= $value->qty;
            $nos+= $value->nos;
            $unit+= $value->unit;
            $fact+= $value->fact;
        }




// gg canges 

$picked_amount_sub=$amounttotal;
$picked_amount_gst_picked= $picked_amount_sub * 0.18/2 ;

if (strpos($picked_amount_gst_picked , '.') !== false && strlen(substr(strrchr($picked_amount_gst_picked , "."), 1)) > 2) {
    // Only truncate if more than 2 digits after decimal
    $picked_amount_gst_picked = floor($picked_amount_gst_picked * 100) / 100;
}

// $truncatedValue_gsts_picked = floor($picked_amount_gst_picked * 100) / 100;
$picked_amount_gst = sprintf("%.2f", $picked_amount_gst_picked);












 $statusviewdata = $this->db->query("SELECT b.uom FROM $tablename as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='".$_GET['order_id']."' AND  a.deleteid = '0' AND b.uom='Kg'");
 $statusviewdata = $statusviewdata->result();
    if(count($statusviewdata)>0)
    {
        $statusview=0;
    }
    else{
         $statusview=1;
    }               





        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            $production_assign = $valuedis->production_assign;
            $discount = $valuedis->discount;
            $order_no = $valuedis->order_no;
            $minisroundoff = $valuedis->roundoff;
            $roundoffstatus = $valuedis->roundoffstatus;
            $user_id = $valuedis->user_id;
            $user_id = $valuedis->user_id;
            $create_date = date('d/m/Y', strtotime($valuedis->create_date));
            $create_time = $valuedis->create_time;
            $reason = $valuedis->reason;
            $paricel_mode = $valuedis->paricel_mode;
            $order_base = $valuedis->order_base;
            $reason = $valuedis->reason;
           $customer_id = $valuedis->customer_id;

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
              $discountfulltotal = $roundoff - $discount;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='+'; 


        } 
        else 
        {
              $discountfulltotal = $roundoff - $discount ;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='-';

        }






            $tcs_status=0;
            $customers_data = $this->Main_model->where_names('customers', 'id', $customer_id);
            foreach ($customers_data as $csvalv) {
                $tcs_status = $csvalv->tcs_status;
               
            }



          $tcsamount=0;
          $orgtcsamount=0;
          $table = array("orders","orders_process", "orders_quotation","orders_process_return_temp");

          if (in_array($tablenamemain, $table))
          {

             if($tcs_status==1)
              {

                            $tcsamount=round($discountfulltotal*0.1/100);
                            $orgtcsamount=round($discountfulltotal_base*0.1/100);
                           // $tcsamount=0;

              }
              else
              {



                          $tcsamount=0;
                        // $resultset = $this->db->query("SELECT SUM(b.rate*b.qty) as totalamount FROM $tablenamemain as a JOIN $tablename as b ON a.id=b.order_id WHERE   a.id<'".$_GET['order_id']."'  AND  a.order_base = '1' AND b.deleteid = '0' AND a.deleteid = '0' AND a.customer_id='".$customer_id."'");
                        //  $resultset = $resultset->result();
                   
                        // foreach ($resultset as $set)
                        //      {
                              
                        //                   $tcsamountval=round($set->totalamount,2);
                        //                   $tcsamountvaldata=  $tcsamountval+$discountfulltotal;
                        //                   if($tcsamountvaldata>5000000)
                        //                   {
                        //                       $tcsamount=round($discountfulltotal*0.1/100);
                        //                   }

                        //                   $tcsamount=0;
                                
                               
                        //      }

             }


          }



                $discountfulltotal=$discountfulltotal+$tcsamount;
                $org_fulltotal=$discountfulltotal_base+$orgtcsamount;



                $amounttotalgst_roundoff=$discountfulltotal*0.18/2;
                $truncatedValue_gsts = floor($amounttotalgst_roundoff * 100) / 100;
                $amounttotalgst_roundoff_total = sprintf("%.2f", $truncatedValue_gsts);
    
 
    
                $discountfulltotal=$roundoff + $amounttotalgst_roundoff_total + $amounttotalgst_roundoff_total;
    




            $whole = floor($discountfulltotal); 
            $decimal1 = $discountfulltotal - $whole;
            $totalval= round($decimal1,3);


 
            $roundoffstatusval_data="";
            if($totalval!=0)
            {


                    if($totalval>0.5)
                    {
                           $getplusevalue=1-$totalval;
                           $discountfulltotal=$discountfulltotal+$getplusevalue;
                          
                           if($getplusevalue>0)
                           {
                             $roundoffstatusval_data=" (+) ".$getplusevalue;
                           }

                          


                    }   elseif($totalval == 0.5)
                    {
 
 
                           $getplusevalue=$totalval;
                           $discountfulltotal=$discountfulltotal+$getplusevalue;
                          
                           if($getplusevalue>0)
                           {
                             $roundoffstatusval_data=" (+) ".$getplusevalue;
                           
                           }
 
 
                    } else
                    {



                            $discountfulltotal=round($discountfulltotal-$totalval);

                           if($totalval>0)
                           {
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



            if($tcs_status == 1){
                $tcsamount_picked=round(($picked_amount_sub+$picked_amount_gst+$picked_amount_gst)*0.1/100);
                //$total_show_value=$picked_amount_sub+$picked_amount_gst+$picked_amount_gst+$tcsamount_picked+$minisroundoff;
            }else {
                $tcsamount_picked='0';
                //$total_show_value=$picked_amount_sub+$picked_amount_gst+$picked_amount_gst+$minisroundoff;
            }


            // gg changes check manual roundoff

                       // Fetch results based on order_id and deleteid
                                
            $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');

            $full_return_status = 1; // Assume full return status as 1 initially
            $roundoffstatus = 0;
            $minisroundoff = 0;

            // Loop through results and check condition
            foreach ($result as $value_full) {
                
                        $this->db->select('*');
                        $this->db->from('order_product_list_process');
                        $this->db->where('id', $value_full->order_process_product_id);
                        $check_full = $this->db->get();
                        $check_full_nos = $check_full->row();

                        if ($value_full->org_nos != $check_full_nos->nos) {

                            // Set full return status to 0 and break the loop on first mismatch
                            $full_return_status = 0;
                            break;


                        }

            }

            // Additional logic for roundoff if full_return_status is still 1
            if ($full_return_status == 1) {

                        $this->db->select('*');
                        $this->db->from('orders_process_return_temp');
                        $this->db->where('id', $_GET['order_id']);
                        $query3456 = $this->db->get();
                        $manual_roundoff = $query3456->row();

                        if ($manual_roundoff && $manual_roundoff->roundoffstatus == 1 && $manual_roundoff->roundoff > 0) {
                            $roundoffstatus = $manual_roundoff->roundoffstatus;
                            $minisroundoff = $manual_roundoff->roundoff;
                            $discountfulltotal = $discountfulltotal + $minisroundoff;
                        }
                        
            }




        $array = array('order_no_id' => $order_no,'tcsamount' => $tcsamount,'statusview'=>$statusview,'order_base'=>$order_base,'reason'=>$reason, 'user_id' => $user_id, 'salesphone' => $salesphone, 'salesphone2' => $salesphone2, 'salesname' => $salesname, 'reason' => $reason, 'paricel_mode' => $paricel_mode, 'production_assign' => $production_assign, 'create_date' => $create_date, 'create_time' => $create_time, 'minisroundoff' => $minisroundoff,'roundoff_val' => $roundoff_val,'roundoffstatusval_data' => $roundoffstatusval_data,'roundoffstatus' => $roundoffstatus,  'fulltotal' => round($picked_amount_sub,3), 'discountfulltotal' =>round($discountfulltotal,2),'org_fulltotal' =>round($org_fulltotal,2), 'totalitems' => count($result), 'gsttotal' =>$picked_amount_gst, 'discount' => round($discount),'tcs_status_amount'=>$tcsamount_picked,'tcs_status_picked'=>$tcs_status, 'commission' => round($commission,2), 'amounttotal_with_out_commission' => round($amounttotal_with_out_commission, 2), 'Meter_to_Sqr_feet' => round($Meter_to_Sqr_feet, 2), 'Sqr_feet_to_Meter' => round($Sqr_feet_to_Meter, 2), 'NOS' => round($nos, 2), 'UNIT' => round($unit, 2), 'FACT' => round($fact, 2), 'fullqty' => round($fullqty, 2));
        echo json_encode($array);
    }
    
        
    
    
    
    
        
    public function sales_return_to_order() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
           
           
           
            $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
            $data['layout_plan'] = $resultmain->result();
            
            
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
            $data['baseset'] = $_GET['baseset'];
            $data['enable_order'] = $_GET['order_id'];

             $data['order_status'] = $_GET['order_status'];
             
             
             
               $data['optionid']=1;
               if(isset($_GET['optionid']))
               {
                 $data['optionid'] = $_GET['optionid'];
                 
               }
               
             
             

            $neworder_id = base64_decode($_GET['order_id']);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['order_title'] = 'Order NO';
            $data['order_lable'] = 'Create Return Order';
            $data['missed'] = 'Order';
            $data['move'] = 'Finacle Verification ';
            $data['status_base'] = 6;
            $data['old_tablename'] = 'orders_process_return_temp';
            $data['old_tablename_sub'] = 'order_product_list_process_return_temp';
            $data['tablename'] = 'orders_process_return_temp';
            $data['tablename_sub'] = 'order_product_list_process_return_temp';
            $data['movetablename'] = 'orders_process_return_temp';
            $data['movetablename_sub'] = 'order_product_list_process_return_temp';
            $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
            if (count($resorder) > 0) {
                foreach ($resorder as $data_val) {
                    $order_no = $data_val->order_no;
                    $data['order_id'] = $neworder_id;
                    $data['order_no'] = $order_no;
                    $data['return_date'] = $data_val->return_date;
                    $data['remarks'] = $data_val->remarks;
                }
            } else {
                $data['order_id'] = $neworder_id;
                $data['order_no'] = strtoupper(date('M') . '/' . $neworder_id);
            }
            $data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['title'] = 'Order Add';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/return_order_product', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
   public function sales_return_data()
   {
       
       
                  date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                  $form_data = json_decode(file_get_contents("php://input"));
                
                                       
                         
                                    
                                       
                                        $customer_id=0;
                                        $result= $this->Main_model->where_names('orders_process_return_temp','id',$form_data->order_id);
                                        foreach ($result as  $value) {
                                                    
                                                    $create_date=$value->create_date;
                                                    $order_id=$value->id;
                                                    $order_no=$value->order_no;
                                                    $customer_id=$value->customer_id;

                                        }
                                        
                                        
                                        
                                       
                                        
                                        $company_name="";
                                        $resultvordervv= $this->Main_model->where_names('customers','id',$customer_id);
                                        foreach ($resultvordervv as  $value2) {
                                                    
                                                      $company_name=$value2->company_name;
                                                      $route=$value2->route;
                                                      $locality=$value2->locality;
                                                      $tcs_status=$value2->tcs_status;
                                                     
                                        }



                                        $route_id=0;
                                        $resultvordervvw= $this->Main_model->where_names('locality','id',$locality);
                                        foreach ($resultvordervvw as  $value2w) {
                                                    
                                                     
                                                      $route_id=$value2w->route_id;
                                                     
                                                     
                                        }
                                       
                                        
                                        
                                        $data['customer_id']=$company_name;
               
              
                                        $tablename='order_sales_return_complaints';
                                        
                                        $neworder_id = 1;
                                        $order_last_count = $this->Main_model->order_last_count_mounth_year($tablename);
                                        foreach ($order_last_count as $r) {
                                           $neworder_id = $r->id + 1;
                                        }
                                        
                                        //$data['product_id']="";
                                        $data['customer']=$customer_id;
                                        $data['order_id']=$order_id;
                                        $data['route_id']= $route_id;
                                        
                                        $data['month'] = date('M');
                                        $data['year'] = date('Y');
                                        $data['count'] = $neworder_id;
                                        $data['re_order_no']='RE-'.strtoupper(date('M') . '/' . $neworder_id); 
                                       
                                        $data['user_id']=$this->userid;
                                        //$data['bill_amount']= $form_data->billamount;
                                        
                                        $data['order_no']=$form_data->order_no;
                                        
                                        $data['update_date']= $form_data->arrival_date;
                                        $data['update_time']= $time;
                                        $data['admin_order']= 1;

                                        
                                        
                                        if($form_data->optionid==3)
                                        {
                                            
                                             $data['order_base']= 5;
                                             
                                        }

                                        if($form_data->optionid==1)
                                        {
                                            
                                             $data['order_base']= 2;
                                             
                                        }
                                        
                                        $data['invoice_date']= $create_date;
                                        $data['remarks']= $form_data->return_remarks;
                                        

$checkdata = $this->Main_model->where_names_three_order_by($tablename, 'id', $form_data->order_id, 'invoice_date', $create_date,'deleteid',0, 'id', 'ASC');
          
                                        




                                        $insert_id=$this->Main_model->insert_commen($data,$tablename);




                                        $purchase_order_product_id=explode('|', $form_data->order_product_id);
                                        
                                       
                                        
                                        $netweight=0;
                                        $totalamount=0;
                                        for ($i=0; $i <count($purchase_order_product_id) ; $i++) { 
                                       
                                           
                                           $resultgetprodut= $this->Main_model->where_names('order_product_list_process_return_temp','id',$purchase_order_product_id[$i]);
                                           foreach ($resultgetprodut as  $value) {
                                                    //$qty=$value->qty;
                                                    $product_name=$value->product_name;
                                                    $rate=$value->rate+$value->commission;
                                                    $product_id=$value->product_id;
                                                    $categories_id=$value->categories_id;
                                                    $oid=$value->order_process_product_id;

                                                    
                                                    if($value->org_order_id>0)
                                                    {

                                                     $order_id=$value->org_order_id;
                                                      
                                                    }
                                                    else
                                                    {
                                                       $order_id=$value->order_id;
                                               
                                                    }

                                                    $datadd['qty']=$value->qty;
                                                    $amount=$rate*$value->qty;
                                                    $datadd['org_qty']=$value->org_qty;
                                                    $datadd['org_nos']=$value->org_nos;
                                                    $datadd['edit_nos']=$value->nos;
                                                    $datadd['notes']=$value->return_complaint;
                                                    $order_process_product_id=$value->order_process_product_id;
                                                    
                                           }
                                           
                                           if($create_date > '2024-05-31')
                                           {
                                           
                                               $totalamount+=round($amount* 1.18,2);

                                           }
                                           else
                                           {
                                               $totalamount+=$amount;
                                           }
                                           $netweight+=$datadd['qty'];
                                          
                                           
                                           $datadd['rate']=$rate;
                                           $datadd['c_id']=$insert_id;
                                           $datadd['order_no']=$order_id;
                                           $datadd['product_name']=$product_name;
                                           $datadd['product_id']=$product_id;
                                           $datadd['categories_id']=$categories_id;
                                           $datadd['return_recived_status']=0;
                                           $datadd['order_process_product_id']=$oid;
                                           $datadd['purchase_order_product_id']=$oid;
// gg weight update
                                           $datadd['weight']=$value->qty;
$checkdata_p = $this->Main_model->where_names_three_order_by('sales_return_products', 'c_id', $insert_id, 'purchase_order_product_id',$purchase_order_product_id[$i],'deleteid', 0, 'id', 'ASC');

                                           if(count($checkdata_p)==0)
                                           {
                                           
                                           $insert_id_data=$this->Main_model->insert_commen($datadd,'sales_return_products');
                                           $this->db->query("UPDATE order_product_list_process_return_temp SET return_status=1,return_id='".$insert_id_data."' WHERE id='".$purchase_order_product_id[$i]."'");
                                           $this->db->query("UPDATE order_product_list_process SET return_status=1,picked_status=0,randam_id=NULL,return_id='".$insert_id_data."' WHERE id='".$order_process_product_id."'");

                                           }



                 


                                           
                                           
                                        }


                                           $result_order =$this->Main_model->where_names_two_order_by('orders_process', 'order_no', $order_no, 'deleteid', '0', 'id', 'ASC');
                                           foreach ($result_order as $orders) 
                                           {


                                               $order_no=$orders->order_no;


                                           }
                                                                        
                                        
                                        
                                        
                                        $old_amount=0;
                                        if($order_no!='')
                                        {

                                                $qty2=0;
                                                $totalamount_old=0;
                                                $old_amount=0;
                                                $resultgetprodutold= $this->Main_model->where_names_two_order_by('order_product_list_process', 'order_id', $order_id, 'deleteid', '0', 'id', 'ASC');
                                                $count2=count($resultgetprodutold);
                                                foreach ($resultgetprodutold as  $valueold)
                                                {
                                                          
                                                    $rate_old=$valueold->rate+$valueold->commission;
                                                    $amountold=$rate_old*$valueold->qty;
                                                    $totalamount_old+=round($amountold* 1.18,2);
                                                    $old_amount+=$valueold->amount;
                                                    $qty2+= round($valueold->qty);
                                                           
                                                            
                                                 }








                        $st=0;   
                        $qty1=0;         
                        $querycount = $this->db->query("SELECT a.id,b.qty FROM order_sales_return_complaints as a JOIN sales_return_products as b ON a.id=b.c_id  WHERE b.deleteid='0' AND a.id='".$insert_id."'   ORDER BY a.id DESC");
                        $resultcount = $querycount->result();
                        $count=count($resultcount);
                        foreach ($resultcount as $rc1) {
                           $qty1+= round($rc1->qty);
                        }
    



                                        }
                                        
                                        $bill_total=round($totalamount,2);  
                                      
                                        $re_order_no='RE-'.strtoupper(date('M') . '/' . $neworder_id); 
                                        
                                        
                                        
                                        
                       $this->db->query("UPDATE $tablename SET order_id='".$order_id."',qty='".$netweight."',bill_total='".$bill_total."',driver_return=2,delivery_date_status=1,tcs_status='".$tcs_status."' WHERE id='".$insert_id."'");





                                        if($form_data->optionid==3)
                                        {





                                             $reasons='Return To Extra Sheet';
                                             $randam_idset=rand(1000,9999);
        $this->db->query("UPDATE orders_process SET finance_status=10,assign_status=0,return_status=1,reason='Return To Re-Sale' WHERE order_no='".$order_no."'");

                                     if($count==$count2) 
                                    {
            
            
                                  
            
                                           if($qty1==$qty2) 
                                           {

                                            
$this->db->query("UPDATE order_delivery_order_status SET finance_status=10,assign_status=0,reason='Return To Re-Sale',return_id='".$insert_id."',return_status=1,return_base=1 WHERE order_id='".$order_id."' AND finance_status=2");


                                           }
                                           else
                                           {


$this->db->query("UPDATE order_delivery_order_status SET reason='Return To Re-Sale',return_id='".$insert_id."',return_base=1 WHERE order_id='".$order_id."' AND finance_status=2");




                                           }



                                       }
                                       else
                                       {


                                           $this->db->query("UPDATE order_delivery_order_status SET reason='Return To Re-Sale',return_id='".$insert_id."' WHERE order_id='".$order_id."' AND finance_status=2");

                                       }
        


                                             
                                        }
                                        else
                                        {

                                            $randam_idset=rand(1000,9999);



        $reasons='Return To Sale';
        $this->db->query("UPDATE orders_process SET return_status=1,return_id='".$insert_id."' WHERE order_no='".$order_no."'");
        $this->db->query("UPDATE order_delivery_order_status SET randam_id='".$randam_idset."',dispatch_status=1,delivery_date_status=1,finance_status=11,assign_status=0,reason='Return To Sale',return_id='".$insert_id."',return_status=1 WHERE order_id='".$order_id."' AND finance_status=2");


          $dil_status['dispatch_status'] = 0;
                              $dil_status['assign_status'] = 0;
                              $dil_status['order_id'] = $order_id;
                              $dil_status['order_no'] = $order_no;
                              $dil_status['finance_status'] = 2;


                                    if($count==$count2) 
                                    {
            
            
                                  
            
                                           if($qty1==$qty2) 
                                           {

                                              $dil_status['deleteid'] = 1002;
                                              $dil_status['collection_remarks_2'] = round($bill_total);
                                              $dil_status['total_picked_amount'] = round($bill_total);

                                           }
                                           else
                                           {
                                              $dil_status['deleteid'] = 0;
                                              $dil_status['collection_remarks_2'] = round($totalamount_old-$bill_total);
                                              $dil_status['total_picked_amount'] = round($totalamount_old-$bill_total);
                                           }



                                    }
                                    else
                                    {

                                          $dil_status['deleteid'] = 0;
                                          $dil_status['collection_remarks_2'] = round($totalamount_old-$bill_total);
                                          $dil_status['total_picked_amount'] = round($totalamount_old-$bill_total);

                                    }

                              

                              $dil_status['assign_status_0_date'] = $date;
                              $dil_status['assign_status_11_date'] = NULL;
                              // gg changes to comment for return values
                              $dil_status['return_id'] = $insert_id;
                              $dil_status['customer_id'] = $customer_id;
                             
                             
                             // $dil_status['return_amount'] = $totalamount;
                              $dil_status['reason'] = $reasons;
                              $dil_status['create_date'] = $create_date;
                              $dil_status['create_time'] = $time;
                              $dil_status['delivery_date'] =$date;
                              $dil_status['delivery_time'] =$time;
                              //$dil_status['assign_status_11_date'] =$date;

if($order_no!='')
{

                               $allcheck = $this->db->query("SELECT id FROM order_delivery_order_status  WHERE order_id='" . $order_id . "' AND finance_status=2 AND deleteid='0'");
                                            $allcheck = $allcheck->result();
                                            if(count($allcheck)==0)
                                            {

                   $this->Main_model->insert_commen($dil_status, 'order_delivery_order_status');


                                            }
                                            else
                                            {


$this->db->query("UPDATE order_delivery_order_status SET return_status=2,return_id='".$insert_id."',reason='".$reasons."',deleteid=0 WHERE  finance_status=2 AND deleteid='0' AND order_id='".$order_id."'"); 


           
                                            }


}






                                        

                                        }


                            

                     
                     

                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Material Return Created..');
                                       

                                       //$this->customer_balance_report_pass($customer_id);
                                       
                                        echo json_encode($array);
                                        
 
                   


   }


    




      
      
      
    public function sales_return_driver_push_data()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                                        
                          
                                     
                                        
                                         $customer_id=0;
                                         $result= $this->Main_model->where_names('orders_process','id',$form_data->order_id);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                     $order_no=$value->order_no;
                                                     $customer_id=$value->customer_id;
                                                     $user_id=$value->user_id;
                                         }
                                         
                                         
                                         
                                        
                                         
                                         $company_name="";
                                         $resultvordervv= $this->Main_model->where_names('customers','id',$customer_id);
                                         foreach ($resultvordervv as  $value2) {
                                                     
                                                       $company_name=$value2->company_name;
                                                       $route=$value2->route;
                                                       $locality=$value2->locality;
                                                      
                                         }



                                         $route_id=0;
                                         $resultvordervvw= $this->Main_model->where_names('locality','id',$locality);
                                         foreach ($resultvordervvw as  $value2w) {
                                                     
                                                      
                                                       $route_id=$value2w->route_id;
                                                      
                                                      
                                         }
                                        
                                         
                                         
                                         $data['customer_id']=$company_name;
                
               
                                         $tablename='order_sales_return_complaints';
                                         
                                          $neworder_id = 1;
                                         $order_last_count = $this->Main_model->order_last_count_mounth_year('orders_process_return_temp');
                                         foreach ($order_last_count as $r) {
                                            $neworder_id = $r->id + 1;
                                         }
                                         
                                         //$data['product_id']="";
                                         $data['customer']=$customer_id;
                                         $data['order_id']=$order_id;
                                         $data['route_id']= $route_id;
                                         
                                         $data['month'] = date('M');
                                         $data['year'] = date('Y');
                                         $data['count'] = $neworder_id;
                                        
                                         $data['user_id']=$this->userid;
                                         $data['order_no']=$order_no;
                                         
                                         $data['update_date']= $date;
                                         $data['update_time']= $time;
                                         $data['order_base']= 10;
                                         $data['driver_return']= 1;
                                         $data['sales_id']=$user_id;
                                         $data['invoice_date']= $create_date;
                                         $data['remarks']= 'Driver Return Created';
                                         
                                         //$insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         $purchase_order_product_id=explode('|', $form_data->order_product_id);
                                         
                                        
                                         
                                         $netweight=0;
                                         $totalamount=0;
                                         
                                        
                                            
                                            $resultgetprodut= $this->Main_model->where_names('order_product_list_process','order_id',$form_data->order_id);
                                            foreach ($resultgetprodut as  $value) {
                                                         //$qty=$value->qty;
                                                         $product_name=$value->product_name;
                                                         $rate=$value->rate;
                                                         $product_id=$value->product_id;
                                                         $datadd['qty']=$value->qty;
                                                         $datadd['org_qty']=$value->qty;
                                                         $datadd['org_nos']=$value->org_nos;
                                                         $datadd['notes']=$value->return_complaint;
                                                         $totalamount+=$datadd['qty']*$rate;
                                                         $netweight+=$datadd['qty'];
                                           
                                            
                                                            $datadd['rate']=$rate;
                                                            //$datadd['c_id']=$insert_id;
                                                            $datadd['product_name']=$product_name;
                                                            $datadd['product_id']=$product_id;
                                                            $datadd['return_recived_status']=1;
                                                        
                                                        $datadd['purchase_order_product_id']=$value->id;
                                                        
                                                        
                                                        //$insert_id_data=$this->Main_model->insert_commen($datadd,'sales_return_products');
                                                        
                                                        //$this->db->query("UPDATE order_product_list_process SET return_status=1,return_id='".$insert_id_data."' WHERE id='".$value->id."'");
                                                        
                                                     
                                            }
                                            
                                            
                                            
                                       
                                          
                                          
                                         $re_order_no='RE-'.strtoupper(date('M') . '/' . $neworder_id); 
                                         //$this->db->query("UPDATE $tablename SET qty='".$netweight."',re_order_no='".$re_order_no."' WHERE id='".$insert_id."'");
                                         $this->db->query("UPDATE orders_process SET return_status=0,finance_status=12,assign_status=3,reason='Re-Delivery',km_reading_end='".$form_data->km_reading_end."',trip_end_date='".$date."',trip_end_time='".$time."',return_id='".$insert_id."' WHERE id='".$form_data->order_id."'");
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Sales Return  Created..');
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         //$this->customer_balance_report_pass($customer_id);
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         echo json_encode($array);
                                         
  
                    


    }


  
    public function sales_return_data_remarks_update()
    {
        
        
                                         date_default_timezone_set("Asia/Kolkata"); 
                                         $date= date('Y-m-d');
                                         $time= date('h:i A');
                                         $form_data = json_decode(file_get_contents("php://input"));
                                         $extrasheet=$form_data->extrasheet;
                                         
                 
                                         $data['create_date']= $date;
                                         $data['create_time']= $time;
                                         $data['c_id']= $form_data->id;
                                         $data['user_id']= $this->userid;

                                         $ret_c_id = $form_data->id;
                                         $ret_orbase = $form_data->order_base;
                                       
                                         
                                         if($extrasheet==8)
                                         {
                                             $form_data->order_base=8;
                                         }
                                         
                                         if($form_data->order_base==0)
                                         {
                                             
                                             $data['order_base']= 11;
                                         }
                                         else
                                         {
                                             $data['order_base']= $form_data->order_base;
                                         }
                                         
                                         
                                         



                                         $data['remarks']= $form_data->remarks;
 $this->db->query("UPDATE all_ledgers SET deleteid='1',notes='Duplicate entry deleted Sales Return',deletemod='REDD-".$form_data->id."' WHERE deletemod='RE-".$form_data->id."' AND deleteid=0");
  $this->db->query("UPDATE all_ledgers SET deleteid='1',notes='Duplicate entry deleted Sales Return Driver Amount',deletemod='REPAYDD-".$form_data->id."' WHERE deletemod='REPAY-".$form_data->id."' AND deleteid=0");
                                         
                                        
                                        
                                        $resultmain = $this->db->query("SELECT a.customer as customer_id,a.id,a.tcs_status,a.bill_total,a.start_reading,a.km_reading_end,a.order_no,a.order_id,a.driver_return,a.re_order_no,a.driver_id,a.invoice_date FROM `order_sales_return_complaints` as a   WHERE a.deleteid=0  AND a.id='".$form_data->id."' ORDER BY a.id DESC");
                                        $getdata = $resultmain->result();
                                                  
                                        $driver_return=0;
                                        $km_reading_end=0;
                                        $start_reading=0;
                                        $bill_amount=0;
                                        foreach($getdata as $vl)
                                        {
                                                      $customer_id=$vl->customer_id;
                                                      $order_id=$vl->id;
                                                      $order_no=$vl->order_no;
                                                      $order_id_data=$vl->order_id;
                                                      $order_id_no=$vl->order_no;
                                                      $re_order_no=$vl->re_order_no;
                                                      $driver_return=$vl->driver_return;
                                                      $driver_id=$vl->driver_id;
                                                      $km_reading_end=$vl->km_reading_end;
                                                      $start_reading=$vl->start_reading;
                                                      $bill_amount=$vl->bill_total;
                                                      $tcs_status=$vl->tcs_status;
                                                      $createDateOrder=$vl->invoice_date;
                                        }
                                        
                                        
                                         $no=array('2','13','8');
                                         if(in_array($form_data->order_base, $no))
                                         {
                                             
                                             
                                                  $totalamount=0;
                                                  $resultmainre = $this->db->query("SELECT * FROM `sales_return_products`  WHERE c_id='".$form_data->id."' AND deleteid=0  ORDER BY id DESC");
                                                  $getdatare = $resultmainre->result();
                                                  foreach($getdatare as $vlre)
                                                  {
                                                      
                                                            
                                                          $purchase_order_product_id= $vlre->purchase_order_product_id;
                                                          $results= $this->Main_model->where_names('order_product_list_process_return_temp','order_process_product_id',$purchase_order_product_id);
                                                          if(count($results)==0)
                                                          {
                                    
                                    
                                                             $results= $this->Main_model->where_names('order_product_list_process','id',$purchase_order_product_id);
                                    
                                                          }
                                                          $nos=0;
                                                          foreach ($results as  $values) 
                                                          {
                                    
                                                              $nos=$values->nos;
                                    
                                                          }
                                                       //gst task
                                                      if($createDateOrder > '2024-05-31'){
                                                      $totalamount+=round(($vlre->qty*$vlre->rate) * 1.18);

                                                  }else{
                                                      $totalamount+=$vlre->qty*$vlre->rate;

                                                  }

                                                      if($vlre->return_recived_status==1)
                                                      {
                                                          
                                                         
                                                          if($form_data->order_base==2)
                                                          {
                                                              
                                                                    $product_id=$vlre->product_id;
                                                                    $inc['qty'] = $vlre->qty;
                                                                    $inc['nos'] = $nos;
                                                                    $inc['product_id'] = $product_id;
                                                                    $inc['rate'] = $vlre->rate;
                                                                    $inc['product_name'] = $vlre->product_name;
                                                                    $inc['rack_info'] = $vlre->rack_info;
                                                                    $inc['bin_info'] = $vlre->bin_info;
                                                                    $inc['order_id'] = $form_data->id;
                                                                    $this->Main_model->insert_commen($inc, 'return_to_re_sale_products');

                                                                    
                                                          }
                                                          
                                                          if($extrasheet==8)
                                                          {
                                                              
                                                                    $product_id=$vlre->product_id;
                                                                 
                                                                    $inc['qty'] = $vlre->qty;
                                                                    $inc['nos'] = $nos;
                                                                    $inc['product_id'] = $product_id;
                                                                    $inc['rate'] = $vlre->rate;
                                                                    $inc['product_name'] = $vlre->product_name;
                                                                    $inc['rack_info'] = $vlre->rack_info;
                                                                    $inc['bin_info'] = $vlre->bin_info;
                                                                    $inc['order_id'] = $form_data->id;
                                                                    $this->Main_model->insert_commen($inc, 'return_to_extra_sheet_sale_products');
                                                                    
                                                          }
                                                          
                                                          
                                                          
                                                          
                                                      }
                                                      
                                                      
                                                      
                                                      
                                                  }
                                                  
                                                  
                                                    
                                                    $tcsamount=0;
                                                    
                                                    $people = array("2","0");
                                                    if(in_array($driver_return, $people))
                                                    {
                                                        
                                                                    
                                                                    if($tcs_status==1)
                                                                    {
                                                    
                                                                                $tcsamount=round($totalamount*0.1/100);
                                                                              
                                                    
                                                                    }
                                                    
                                                    }
                                                     
                                                    
                                                    if($bill_amount>0)
                                                    {
                                                        $totalamount=$totalamount;
                                                    }
                                                    else
                                                    {
                                                        $totalamount=$totalamount;
                                                    }
                                                    
                                                  
                                                //gst task
                                                    $withGSTAmount = $totalamount;
                                                    $withoutGSTAmount = $totalamount / 1.18;
                                                
                                                
                                                    //$data_address['order_id'] = $order_id;
                                                    $data_address['order_id'] = 0;
                                                    $data_address['customer_id'] = $customer_id;
                                                    $data_address['user_id'] = $this->userid;
                                                    $data_address['notes'] = 'Sales Return';
                                                    $data_address['payment_mode'] = '';
                                                    $data_address['order_no'] = 'RE-'.$form_data->id;
                                                    $data_address['difference'] = 0;
                                                    $data_address['reference_no'] = $re_order_no;
                                                    
                                                    $data_address['amount'] = round($withGSTAmount,2);
                                                    $data_address['account_head_id'] = 68;
                                                    $data_address['account_heads_id_2'] = 2;
                                                    $data_address['order_trancation_status'] = 0;
                                                    $data_address['paid_status'] = 1;
                                                    $data_address['credits'] = round($withGSTAmount);
                                                    $data_address['balance'] = 0;
                                                    $data_address['collected_amount'] = round($withGSTAmount,2);
                                                    $data_address['payment_date'] = $date;
                                                    $data_address['process_by'] = 'Sales Return';
                                                    $data_address['payment_time'] = $time;
                                                    $data_address['party_type'] = 1;
                                                    $data_address['bank_id'] = 0;
                                                    $data_address['return_invoice_date'] = $createDateOrder;
                                                    
                                                    
                                                    
                                                    $data_address['deletemod'] = 'RE-'.$form_data->id;
                                                    
                                                    

                    $querycheck = $this->db->query("SELECT id FROM all_ledgers  WHERE order_no='".$data_address['order_no']."' AND party_type=1 AND deleteid='0'");
                                        $querycheck=$querycheck->result();
                                        if(count($querycheck)==0)
                                        {
                                                    if($driver_return=='0')
                                                    {
                                                         $this->Main_model->insert_commen($data_address, 'all_ledgers');
                                                    }
                                                    else
                                                    {
                                                        if($form_data->order_base!=0)
                                                        { 
                                                              
                                                               $this->Main_model->insert_commen($data_address, 'all_ledgers');
                                                            
                                                        }
                                                        
                                                    }

                                       }
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    $driver = $this->Main_model->where_names('driver', 'id', $driver_id);
                                                    foreach ($driver as $driver_v) 
                                                    {
                                                         $km_base_charge = $driver_v->km_base_charge;
                                                       
                                                    }

                                                    
                                                     $totalkm = $km_reading_end - $start_reading;
                                       
                                                    
                                                    $result_getfiexed = $this->db->query("SELECT * FROM `driver_charge_fixed` WHERE   `fixed_km_from` <= '".$totalkm."' AND fixed_km >= '".$totalkm."'");
                                                    $result_getfiexed = $result_getfiexed->result();
                                                    if(count($result_getfiexed)>0)
                                                    {
                                                                   $fixed_charge=0;
                                                                   foreach($result_getfiexed as $val)
                                                                   {
                                                                       $fixed_charge=$val->fixed_charge;
                                                                   }
                                                                
                                                                   $totalcharges=$fixed_charge;
                                                                   
                                                                   
                                                                   $km_base_charge='FIXED';
                                                       }
                                                       else
                                                       {
                                                           
                                                               
                                                                $totalcharges=$km_base_charge*$totalkm;
                                                             
                                                           
                                                       }
                                                    
                                                   
                                                    
                                                      if($totalkm<0)
                                                      {
                                                          $totalkm="No data";
                                                          $totalcharges=0;               
                                                      }
                                                    
                                                                                            
                                                    
                                                    
                                                  
                                                    
                                                    $totalamountdriver=$totalcharges;
                                                    
                                                    //$data_address['order_id'] = $order_id;
                                                    $data_address_driver['order_id'] = 0;
                                                    $data_address_driver['customer_id'] = $driver_id;
                                                    $data_address_driver['user_id'] = $this->userid;
                                                    $data_address_driver['notes'] = 'Sales Return Driver Trip';
                                                    $data_address_driver['driver_collection_status']=1;
                                                    $data_address_driver['payment_mode'] = '';
                                                    $data_address_driver['order_no'] = 'RE-'.$form_data->id;
                                                    $data_address_driver['difference'] = 0;
                                                    $data_address_driver['reference_no'] = $re_order_no;
                                                    $data_address_driver['amount'] = round($totalamountdriver,2);
                                                    $data_address_driver['account_head_id'] = 52;
                                                    $data_address_driver['account_heads_id_2'] = 104;
                                                    $data_address_driver['order_trancation_status'] = 1;
                                                    $data_address_driver['paid_status'] = 1;
                                                    $data_address_driver['debits'] = round($totalamountdriver);
                                                    $data_address_driver['credits'] = 0;
                                                    $data_address_driver['balance'] = 0;
                                                    $data_address_driver['collected_amount'] = round($totalamountdriver,2);
                                                    $data_address_driver['payment_date'] = $date;
                                                    $data_address_driver['process_by'] = 'Sales Return Driver Trip';
                                                    $data_address_driver['payment_time'] = $time;
                                                    $data_address_driver['party_type'] = 2;
                                                    $data_address_driver['bank_id'] = 0;
                                                    
                                                    
                                                    $data_address_driver['deletemod'] = 'REPAY-'.$form_data->id;
                                                    
                                                    
                                                    if($totalamountdriver>0)
                                                    {


                    $querycheck = $this->db->query("SELECT id FROM all_ledgers  WHERE order_no='".$data_address_driver['order_no']."' AND party_type=2 AND deleteid='0'");
                    $querycheck=$querycheck->result();
                                                                if(count($querycheck)==0)
                                                                {
                                                        
                                                                  //$this->Main_model->insert_commen($data_address_driver, 'all_ledgers');

                                                                }
                                                                
                                                    
                                                    }
                                                    
                                                   
                                                    //gst task
                                                     if(date('Y-m-d') > '2024-05-31'){

                $data_sGst['order_id'] = 0;
                $data_sGst['customer_id'] =585;
                $data_sGst['user_id'] = $this->userid;
                $data_sGst['notes'] = 'SGST - Order Process ' . $re_order_no;
                $data_sGst['deletemod'] = 'SGST OUT - '.$re_order_no;
                // $data_sGst['credits'] =   round($discountfulltotalRaw * 0.09, 2);
                $data_sGst['debits'] =   ($withGSTAmount - $withoutGSTAmount) / 2;
                $data_sGst['amount'] =   ($withGSTAmount - $withoutGSTAmount) / 2;
                $data_sGst['order_no'] = $data_address_driver['order_no'];
                $data_sGst['reference_no'] =  $re_order_no;
                $data_sGst['party_type'] = 5;
                $data_sGst['process_by'] = 'Sales Return SGST';
                $data_sGst['account_head_id'] = 142;
                $data_sGst['account_heads_id_2'] = 142;
                $data_sGst['payment_date'] =  $date;
                $data_sGst['payment_time'] = $time;
                //  if($payment_mode=='Cash')
                // {
                    $data_sGst['bank_id'] = 0;
                // }


              $ggs = $this->db->query("SELECT id FROM all_ledgers  WHERE order_no='".$data_sGst['order_no']."' AND party_type=5 AND deleteid='0' AND deletemod='".$data_sGst['deletemod']."'");
                    $ggs=$ggs->result();
              if(count($ggs)==0)
              {
                $this->Main_model->insert_commen($data_sGst , 'all_ledgers');
              }


            // }

                $data_cGst['order_id'] = 0;
                $data_cGst['customer_id'] =586;
                $data_cGst['user_id'] = $this->userid;
                $data_cGst['notes'] = 'CGST - Order Process ' .  $re_order_no;
                $data_cGst['deletemod'] = 'CGST OUT - '. $re_order_no;
                // $data_cGst['credits'] =   round($discountfulltotalRaw * 0.09,2);
                $data_cGst['debits'] =     ($withGSTAmount - $withoutGSTAmount) / 2;
                $data_cGst['amount'] =    ($withGSTAmount - $withoutGSTAmount) / 2;
                // $data_tcs['debitstoatal'] =  $minisroundoff;
                $data_cGst['order_no'] = $data_address_driver['order_no'];
                $data_cGst['reference_no'] =$re_order_no;
                $data_cGst['party_type'] = 5;
                $data_cGst['process_by'] = 'Sales Return CGST';

                $data_cGst['account_head_id'] = 142;
                $data_cGst['account_heads_id_2'] = 142;
                $data_cGst['payment_date'] = $date;
                $data_cGst['payment_time'] = $time;
                // if($payment_mode=='Cash')
                // {
                    $data_cGst['bank_id'] = 0;
                // }

              $ggsc = $this->db->query("SELECT id FROM all_ledgers  WHERE order_no='".$data_cGst['order_no']."' AND party_type=5 AND deleteid='0' AND deletemod='".$data_cGst['deletemod']."'");
              $ggsc=$ggsc->result();
              if(count($ggsc)==0)
              {
                
                $this->Main_model->insert_commen($data_cGst , 'all_ledgers');

              }




}     
                                                    
                                                    
                                                    
                                                    
                                                    
                                                   
                                                    
                                                                  
                                              
                                         }
                                         $insert_id=$this->Main_model->insert_commen($data,'sales_return_remarks');
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         if($driver_return=='0')
                                         {
                                             
                                                    if($form_data->order_base==2)
                                                     {
                                                           $remarks= 'Return To Re-Sale';
                                                           $order_base=5;
                                                     }
                                                     if($form_data->order_base==0)
                                                     {    
                                                     
                                                      $order_base=2;
                                                      $remarks='Return To Sale : '.$form_data->return_date_new;
                                                     }

                                                     if($form_data->order_base==8)
                                                     {
                                                         $order_base=8;
                                                         $remarks= 'Return To Extra Sheet';
                                                     }
                                                   
                                                     $this->db->query("UPDATE order_sales_return_complaints SET  order_base='".$order_base."',remarks='".$remarks."' WHERE id='".$form_data->id."'");
                                                
                                         }
                                         else
                                         {
                                                 if($form_data->order_base==0)
                                                 {    
                                                     
                                                      $order_base=2;
                                                      $remarks='Return To Sale : '.$form_data->return_date_new;
                                                      
                                                     
                                                 }
                                                 if($form_data->order_base==2)
                                                 {
                                                           $remarks= 'Return To Re-Sale';
                                                           $order_base=5;
                                                 }
                                                 if($form_data->order_base==8)
                                                 {
                                                         $order_base=8;
                                                         $remarks= 'Return To Extra Sheet';
                                                 }
                                                 $this->db->query("UPDATE order_sales_return_complaints SET   order_base='".$order_base."',remarks='".$remarks."' WHERE id='".$form_data->id."'");
                                         
                                         }
                                                 
                                       
                                      
                                         $people = array("2","0");
                                         if(in_array($driver_return, $people))
                                         {
                                             if($form_data->order_base==0)
                                             {
                                                $this->db->query("UPDATE orders_process SET finance_status=2,assign_status=0,return_status=1,reason='Return To sale',delivery_date='".$form_data->return_date_new."' WHERE order_no='".$order_id_no."'");
                                                $this->db->query("UPDATE order_product_list_process SET return_status=1 WHERE order_no='".$order_id_no."'");
                                             }
                                             
                                         }
                                         
                                      
                                         
                                         if($form_data->order_base==2)
                                         {
                                             
                                             

//$this->db->query("UPDATE orders_process SET finance_status=14,assign_status=0,return_status=1,reason='Return To Re-Sale',trip_id=0 WHERE order_no='".$order_id_no."'");
$this->db->query("UPDATE orders_process SET return_status=1,reason='Return To Re-Sale' WHERE order_no='".$order_id_no."'");



//$this->db->query("UPDATE order_delivery_order_status SET trip_id=NULL,return_status=1,reason='Return To Re-Sale' WHERE order_id='".$order_id_data."' AND deleteid IN ('0','1002') AND finance_status=2");


                                       
                                         }
                                         
                                         if($form_data->order_base==8)
                                         {

//$this->db->query("UPDATE orders_process SET finance_status=15,assign_status=0,return_status=1,reason='Material Return To Extra Sheet',trip_id=0 WHERE order_no='".$order_id_no."'");
$this->db->query("UPDATE orders_process SET return_status=1,reason='Return To Extra Sheet' WHERE order_no='".$order_id_no."'");




//$this->db->query("UPDATE order_delivery_order_status SET  trip_id=NULL,return_status=1,reason='Return To Extra Sheet' WHERE order_id='".$order_id_data."' AND deleteid IN ('0','1002') AND finance_status=2");   



                                         }


                                        if($ret_orbase==2 || $ret_orbase=="2")
                                         {

                                          //    AStockUpdate-live-01/07
                                                //return stock
                                            // echo $ret_c_id;
                                            // -- echo "SELECT * FROM sales_return_products WHERE c_id = '".$ret_c_id."' AND deleteid = 0 ORDER BY id DESC";
                                                $results_val = $this->db->query("SELECT * FROM sales_return_products WHERE c_id = '".$ret_c_id."' AND deleteid = 0 ORDER BY id DESC")->result();
                                                foreach($results_val as $valord)
                                                {
                                                    $product_id=$valord->product_id;                                
                                                    $sub_id=$valord->purchase_order_product_id;
                                                    $order_id=$valord->order_no;
                                                    $return_sub_id = $valord->id;                            
                                                    $complains_order_id = $valord->c_id;
                                                    $order_no=$return_sub_id ." Com>  ".$complains_order_id;
                                                    // echo "fun";
                                                    $this->date_stock_order_return($product_id,$return_sub_id,$complains_order_id,$sub_id,$order_id,$order_no,'return');
                                                    // echo "After function call";
                                                }
                                            //    AStockUpdate-live-01/07
                                            }
                                         
                                         
                                         
                                          $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Sales Return Remarks Updated..');
                                        
                                          //$this->customer_balance_report_pass($customer_id);

                                          echo json_encode($array);
  


    }



     public function production_print_log()
	{
                                         date_default_timezone_set("Asia/Kolkata"); 
                                         $date= date('Y-m-d');
                                         $time= date('h:i A');
                                         
                                         $order_no1=$_GET['order_no1'];
                                         $order_no2=$_GET['order_no2'];
                                         $order_ids=$_GET['order_ids'];
                                         $order_ids=explode(',',$order_ids);


                 
                                         $data['create_date']= $date;
                                         $data['create_time']= $time;
                                         $data['form_order']= $order_no1;
                                         $data['to_order']= $order_no2;
                                         $data['user_id']= $this->userid;
                                         
                                        if($order_no1>0 && $order_no2>0)
                                        {
                                            
                                        
                                            $this->Main_model->insert_commen($data,'production_print_log');
                                            $resultmain = $this->db->query("SELECT id FROM `orders_process` WHERE count BETWEEN '".$order_no1 ."' AND '".$order_no2 ."'");
                                            $res = $resultmain->result();
                                            foreach($res as $value)
                                            {
                                                $this->db->query("UPDATE orders_process SET print_status='1',print_date='".$date."',print_time='".$time."' WHERE id='" . $value->id . "'");
                                            }
                                        
                                        
                                        }


                        for ($i=0; $i <count($order_ids) ; $i++)
                        { 
                           

                           if($order_ids[$i]>0)
                           {

                            $this->db->query("UPDATE orders_process SET print_status='1',print_date='".$date."',print_time='".$time."' WHERE id='" . $order_ids[$i] . "'");

                           }
                                             
                        }

                             $data['form_order']= $_GET['order_ids'];
                             $data['to_order']= 0;
                             $this->Main_model->insert_commen($data,'production_print_log');
                 
                                        
                                        

    }
    public function fetch_data_stock_re_sale()
	{

                     $i=1;
                 	 $result= $this->Main_model->where_names('return_to_re_sale_products','deleteid','0');
                 	 foreach ($result as  $value) {
                 	     
                 	     
                          $re_order_no="";
                         $re= $this->Main_model->where_names('order_sales_return_complaints','id',$value->order_id);
                     	 foreach ($re as  $values) {
                     	     $re_order_no=$values->re_order_no;
                     	 }
                     	 
                     	 
                     	   $categories="";
                         $re= $this->Main_model->where_names('product_list','id',$value->product_id);
                     	 foreach ($re as  $valuess) {
                     	     $categories=$valuess->categories;
                     	 }

                 
                        
                 	 	$array[] = array(
                               
                               
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		'order_no'=>$re_order_no,
                 	 		'product_name' => $value->product_name, 
                 	 		'rate' => $value->rate, 
                 	 		'nos' => $value->nos, 
                 	 		'qty' => $value->qty, 
                 	 		'rack_info' => $value->rack_info, 
                 	 		'bin_info' => $value->bin_info,
                 	 		'categories' => $categories,

                 	 	);



                       $i++;
                 	 }

                    echo json_encode($array);

	}
	
	public function fetch_data_stock_extra_sheet()
	{

                     $i=1;
                 	 $result= $this->Main_model->where_names('return_to_extra_sheet_sale_products','deleteid','0');
                 	 foreach ($result as  $value) {
                 	     
                 	     
                          $re_order_no="";
                         $re= $this->Main_model->where_names('order_sales_return_complaints','id',$value->order_id);
                     	 foreach ($re as  $values) {
                     	     $re_order_no=$values->re_order_no;
                     	 }
                     	 
                     	 
                     	   $categories="";
                         $re= $this->Main_model->where_names('product_list','id',$value->product_id);
                     	 foreach ($re as  $valuess) {
                     	     $categories=$valuess->categories;
                     	 }

                 
                        
                 	 	$array[] = array(
                               
                               
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		'order_no'=>$re_order_no,
                 	 		'product_name' => $value->product_name, 
                 	 		'rate' => $value->rate, 
                 	 		'qty' => $value->qty, 
                 	 		'nos' => $value->nos, 
                 	 		'rack_info' => $value->rack_info, 
                 	 		'bin_info' => $value->bin_info,
                 	 		'categories' => $categories,

                 	 	);



                       $i++;
                 	 }

                    echo json_encode($array);

	}

    public function customer_balance_report_pass($customer_id)
    {


        



 
                          
$url = "https://erp.zaron.in/customer_balance_cron.php?customer_id=".$customer_id;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
curl_close($curl);

echo $response;






    }
     public function table_cust_transport()
    {


         $status=$_GET['status_id'];
         $val=$_GET['status_val'];
         $this->db->query("DELETE FROM table_cust_transport  WHERE user_id='".$this->userid."' AND label_id='".$val."'");

         $basedata['user_id'] = $this->userid;
         $basedata['label_id'] = $val;
         $basedata['status'] = $status;


         $this->Main_model->insert_commen($basedata, 'table_cust_transport');


    }
     public function setAllPicked()
   {


           $delivery_mode='Full';
        // Decode JSON data from the request
        $form_data = json_decode(file_get_contents("php://input"));

        // Extract orderId from the decoded JSON
        $orderId = $form_data->orderId;

              // gg changes for scope task

              $query_scope = $this->db->query("SELECT *  FROM order_delivery_order_status  WHERE  order_id='" . $orderId. "' AND dispatch_status=0 AND dispatch_load_status=0 AND deleteid=0 AND randam_id IS NULL ORDER BY id DESC LIMIT 1");
              $scope_changes = $query_scope->row(); 
              
              if($scope_changes->delivery_status == ''){
      
                          echo 'scope not defined';
                          exit;
      
              }

        // Update only those parts that are not picked yet
        $getParts = $this->db->query("
        SELECT SUM(oplp.picked_status) as picked 
        FROM orders_process op 
        LEFT JOIN order_product_list_process oplp 
        ON oplp.order_id = op.id 
        WHERE op.id = $orderId 
        AND oplp.deleteid = '0' 
        AND op.deleteid = '0' ")->row();

        // If no parts are found for the order, mark all parts as picked
        if($getParts->picked == 0)
        {
             $this->db->query("
                UPDATE order_product_list_process oplp 
                SET oplp.picked_status = 1
                WHERE oplp.order_id = $orderId 
                AND oplp.picked_status = 0");
              $this->db->query("UPDATE orders_process SET picked_status='1',reason='Order Confirm and Picked'  WHERE id='".$orderId."'");


            
        }


 $this->db->query("UPDATE sales_load_products SET randam_id=NULL WHERE randam_id IS NOT NULL AND loadstatus=0 AND dispatch_load='0' AND order_id='".$orderId."'"); 
 $this->db->query("UPDATE order_product_list_process SET dispatch_status=0,loadstatus=0  WHERE randam_id IS NULL AND order_id='".$orderId."'"); 
        
        $access="-1";

                         $status=1;
                         $randam_id=uniqid();

                      //  $resultcheck =$this->Main_model->where_names('sales_load_products', 'order_product_id', $id);

                         $resultcheck = $this->Main_model->where_names_order_by('sales_load_products', 'order_id', $orderId, 'id', 'ASC');  



                        if(count($resultcheck)==0)
                        {
                            
                          
                              //$this->db->query("DELETE FROM sales_load_products  WHERE order_id='" . $orderId . "' AND delivered_products=0");

                              $loadamount=0;
                              $resultmainss = $this->db->query("SELECT * FROM order_product_list_process  WHERE order_id='" . $orderId . "' AND deleteid=0  AND picked_status=1  AND dispatch_status=0 ORDER BY id DESC");
                              $resultcss = $resultmainss->result();
                              foreach($resultcss as $vl)
                              {


        //$this->db->query("UPDATE order_product_list_process SET randam_id='".$randam_id."' WHERE id='".$vl->id."' AND picked_status=1 AND dispatch_status=0");
        $this->db->query("UPDATE order_delivery_order_status SET delivery_mode='".$delivery_mode."',reason='Order Confirm and Picked',delivery_date_status='1',picked_status=1 WHERE order_id='".$vl->order_id."' AND dispatch_status=0  AND deleteid=0");

$access="1";
                                       $load['order_product_id'] = $vl->id;

                                       if($vl->modify_nos>0)
                                       {

                                                  $load['nos'] = $vl->modify_nos;

                                       }
                                       else
                                       {
                                                  $load['nos'] = $vl->nos;
                                       }
                                  
                                       if($vl->modify_qty>0)
                                       {

                                         $load['qty'] = $vl->modify_qty;
                                         $vl->qty=$vl->modify_qty;

                                       }
                                       else
                                       {
                                         $load['qty'] = $vl->qty;
                                       }

                                     
                                      $rate= $vl->rate+$vl->commission;
                                      $load['rate'] = $rate;
                                      //$load['randam_id'] = $randam_id;
                                      $load['pickedstatus'] = $status;
                                      $load['commission'] = $vl->commission;
                                      $load['order_id'] = $vl->order_id;
                                      $load['amount'] = round($rate*$vl->qty,2);

                                      $loadamount+= round($rate*$vl->qty);
                                      $this->Main_model->insert_commen($load, 'sales_load_products');



                              }
                             
                              //$this->db->query("UPDATE orders_process SET collection_remarks='".$loadamount."'  WHERE id='".$orderId."'");

                            
                        }
                        else
                        {

                        $loadamount=0;
                        $resultmainss = $this->db->query("SELECT * FROM order_product_list_process  WHERE order_id='" . $orderId . "' AND deleteid=0  AND picked_status=1  AND dispatch_status=0 ORDER BY id DESC");
                         $resultcss = $resultmainss->result();
                        foreach($resultcss as $vl)
                        {





//$this->db->query("UPDATE order_product_list_process SET randam_id='".$randam_id."' WHERE id='".$vl->id."' AND picked_status=1 AND dispatch_status=0");
$this->db->query("UPDATE order_delivery_order_status SET delivery_mode='".$delivery_mode."',delivery_date_status='1',reason='Order Date Confirmed and picked',picked_status=1 WHERE order_id='".$vl->order_id."' AND dispatch_status=0  AND deleteid=0");

$access="1";

                                       if($vl->modify_nos>0)
                                       {

                                                  $load['nos'] = $vl->modify_nos;

                                       }
                                       else
                                       {
                                                  $load['nos'] = $vl->nos;
                                       }

                                       if($vl->modify_qty>0)
                                       {

                                         $load['qty'] = $vl->modify_qty;

                                         $vl->qty=$vl->modify_qty;

                                       }
                                       else
                                       {
                                         $load['qty'] = $vl->qty;
                                       }

                                     
                                      $rate = $vl->rate+$vl->commission;
                                      $commission = $vl->commission;
                                      $amount = round($rate*$vl->qty,2);
                                      $order_id = $vl->order_id;
                                      $loadamount+= round($rate*$vl->qty);


$this->db->query("UPDATE sales_load_products SET nos='" . $load['nos'] . "',rate='" . $rate . "',amount='" . $amount . "',qty='" . $load['qty'] . "',order_id='" . $order_id . "',pickedstatus='" . $status . "' WHERE order_product_id='" . $vl->id . "' AND delivered_products=0 AND order_id='".$order_id."' AND randam_id IS NULL");

                                   



                              }
   
      

 
     //$this->db->query("UPDATE orders_process SET collection_remarks='".$loadamount."'  WHERE id='".$orderId."'");




                        }
                        


        $return_order = $this->Main_model->where_names('orders_process', 'id', $orderId);
        foreach ($return_order as  $dd) 
        {
 
               $bill_total= $dd->bill_total;
               $return_id= $dd->return_id;
               if($return_id=='0')
               {

//$this->db->query("UPDATE order_delivery_order_status SET collection_remarks='".$loadamount."' WHERE order_id='".$orderId."'  AND dispatch_status=0");

               }
               

        }

 $output=array('access'=>$access);
         echo json_encode($output);

   }
    
   public function fetch_data_table_delivery_notes() 
   {

     $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }

        $approved_status=0;
        if (isset($_GET['approved_status'])) {
            $approved_status = $_GET['approved_status'];
        }

        

        
     
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $order_base_val=$_GET['order_base'];
        $where = "";
        $where1 = "";
          


     
         $order_by=" a.id";  
        
        
        
        
        if($search == "")
        {
        
        
         if(isset($_GET['from_date'])) 
        {     
            if($_GET['from_date']!='')
            {
                  if($order_base==1 || $order_base==121)
                  {
                      $from_date = $_GET['from_date'];
                      $to_date = $_GET['to_date'];
                      $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";
                         
                            if($tablename=='orders_process')
                            {
                                $order_by=" a.count";
                            }


                   }
                
            }
            else
            {

                  if($order_base==1)
                  {

                  $from_date = date('Y-m-d');
                  $to_date = date('Y-m-d');
                  $where .= " AND a.create_date BETWEEN  '".$from_date."' AND '".$to_date."'";

                            if($tablename=='orders_process')
                            {
                                $order_by=" a.count";
                            }



                  
                  }

            }
             
        }

       }
        
        
        $sqls = "";
        $where .= " AND a.order_base > '0'";


        if($this->session->userdata['logged_in']['access'] == '8')
        {

                  $where .= " AND a.customer_id='" . $this->userid . "'";
                  $where1 .= " AND customer_id='" . $this->userid . "'";
                  if($search != "")
                  {

                           $where1 .= " AND order_no='" . $search . "'";
                  }

        }
        else
        {
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

                
        }



        if($approved_status==1)
        {
            $where .= " AND ds.pack_approved_status='".$approved_status."'";
        }
        else if($approved_status==2)
        {
            $where .= " AND ds.pack_approved_status='".$approved_status."'";
        }
        else
        {
            $where .= " AND ds.delivery_notes_status=1 AND  ds.randam_id IS NOT NULL";
        }
        
        
        $i = 1;
        $array = array();
        $JOIN=' JOIN order_delivery_order_status as ds ON a.id=ds.order_id';
        
        
        if($this->session->userdata['logged_in']['access'] == '17')
        {
                 
                 
                $sales_team_id = array($this->userid);
                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                foreach ($poin_to_member as $point) {
                    $sales_team_id[] = $point->id;
                }
                
                $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
                $userslog = ' AND  a.entry_user_id IN (' . $sales_team_id . ')';
                
                
                $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
                $resultcount = $querycount->result();
                $count=count($resultcount);
                
                
                $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
                $result = $query->result();
           
            
        }elseif ($this->session->userdata['logged_in']['access'] == '20') {
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  AND a.user_id='" . $this->userid . "' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
            
            if (count($result) == 0) {
                
                
                $querycount = $this->db->query("SELECT a.id FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY a.id DESC");
                $resultcount = $querycount->result();
                $count=count($resultcount);
                
                
                $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename  as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  AND a.entry_user_id='" . $this->userid . "' $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
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
            foreach ($poin_to_member as $point) 
            {
                $sales_team_id[] = $point->id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'   $userslog $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
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
           
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  $userslog $where ORDER BY a.id DESC ");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN WHERE a.deleteid='0'  $userslog $where ORDER BY $order_by DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        else
        {
            

            if($_GET['list'] && $_GET['list'] == 'delivery')
            {
                
                $whereNew = " ORDER BY a.id ";
                
            }
            else
            {
                $whereNew = " ORDER BY a.id ";

            }
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN  WHERE a.deleteid='0'  $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,ds.randam_id,ds.reason as reason_last,ds.delivery_confirm_date_time as delivery_date_time_last,c.name,b.company_name,b.email,b.phone,b.sales_team_id,b.sales_team_sub_id,b.address1,b.address2,b.landmark,b.zone,b.pincode,b.state FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id $JOIN  WHERE a.deleteid='0' $where $whereNew DESC LIMIT $offset, $pagesize");
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
$value->delivery_date_time=$value->delivery_date_time_last;

            $company_name = $value->company_name;
            $email = $value->email;
            $phone = $value->phone;
        
             $value->reason=$value->reason_last;
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
                $value->delivery_status = 'Zaron Scope';
             }

   
             $delivery_date_time="";

             if($tablename == 'orders_process') 
             {


                         $delivery_date_time=date('d-m-Y', strtotime($value->delivery_date));

                           
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


           
            
            
             if($value->delivery_date_status==1)
             {
                $delivery_date_status='Date confirmed';
             }
             else
             {
                $delivery_date_status='Date yet to be confirmed';
             }


          $commission=$value->commission_check+$value->commission_check_fact;


       
        
         $trip_id='';
            $vehicle_name = "";
                                    $driver_name="";
         if($tablename=='orders_process')
         {



              
                                   
                                    if($value->vehicle_id>0)
                                    {


                                            $vehicle = $this->Main_model->where_names(
                                                "vehicle",
                                                "id",
                                                $value->vehicle_id
                                            );
                                            foreach ($vehicle as $vehicle_v) {
                                                $vehicle_name = $vehicle_v->vehicle_name.' | '.$vehicle_v->vehicle_number;
                                                $vehicle_id = $vehicle_v->id;
                                            }

                                            $driver = $this->Main_model->where_names(
                                                "driver",
                                                "vehicle_id",
                                                $vehicle_id
                                            );
                                            foreach ($driver as $valuess) 
                                            {
                                                $driver_id = $valuess->id;
                                                $driver_name = $valuess->name.' | '.$valuess->phone;

                                            }

                                    }
                                        

                    

                                      $trip_id=$value->trip_id;
                 


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




             $colorcount=1;
             if($tablename=='orders_process')
             {

            $getcount = $this->db->query("SELECT count(order_no) as totcount FROM orders_process WHERE  order_no='".$value->order_no."' AND deleteid=0");
                     $getcount = $getcount->result();
                           
                          foreach($getcount as $st)
                          {
                                 $colorcount=$st->totcount;
                          }


             }


                if($value->deleteid==0)
                {


                    if($value->order_no=='APR/30')
                    {
                        $commision_value='4231';
                    }

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
            $array[] = array(
                'no' => $i,
                 'trip_id'=>$trip_id,
                 'vehicle_name'=>$vehicle_name,
                 'driver_name'=>$driver_name,
                 'randam_id' => $value->randam_id,
                 'delivery_confirm_person' => $value->delivery_confirm_person,'delivery_confirm_date_time' => $value->delivery_confirm_date_time,'finance_status' => $value->finance_status,'id' => $value->id,'colorcount' => $colorcount,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,
            'enquiry_date' => $enqDate,
            'quotation_date' => $quoteDate,
            'order_date' => $orderDate,
            'delivery_date' => $delivery_date_time,'delivery_date_status' => $delivery_date_status);
            }
        }else{
            $array[] = array(

                'no' => $i,
                'trip_id'=>$trip_id,
                'vehicle_name'=>$vehicle_name,
                 'driver_name'=>$driver_name,
                'delivery_confirm_person' => $value->delivery_confirm_person,
                'randam_id' => $value->randam_id,

                'delivery_confirm_date_time' => $value->delivery_confirm_date_time,'finance_status' => $value->finance_status,'id' => $value->id,'colorcount' => $colorcount,'pending_amount' => $pending_amount,'le_amount' => $le_amount,'payment_mode' => $value->payment_mode,'payment_mode_re' => $value->payment_mode_reconciliation, 'delivery_status' => $value->delivery_status, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no,'deleteid' => $value->deleteid, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commision_value), 'delivery_charge' => $value->delivery_charge, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time,
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


// AStockUpdate-live-01/07
     function date_stock_order_return($product_id,$return_sub_id,$complains_order_id,$sub_id,$order_id,$order_no,$type){
      // echo "Function called with parameters:";
    // echo "Product ID: $product_id, Return Sub ID: $return_sub_id, Complains Order ID: $complains_order_id, Sub ID: $sub_id, Order ID: $order_id, Order No: $order_no, Type: $type";
        $inward=0;
         if($product_id>0)
         {
             $result = $this->Main_model->where_names('product_list','id', $product_id);
 
             foreach ($result as $value) {
 
                 if(($value->uom === 'Nos' || $value->uom === 'nos')){
 
                     if($product_id == 20   ){
                         $select = 'nos';
                     }else{
                         $select = 'qty';
                     }
                 }else{
                     if( $product_id == 1068 || $product_id == 1017 || $product_id == 1067){
                         $select = 'nos';
                     }else{
                         $select = 'weight';
                     }
                 }
 
                 $query1 =  $this->db->query("SELECT $select as sales,weight as sales1,product_id,sub_product_id,tile_material_id,id FROM order_product_list_process WHERE order_id = '".$order_id."'  AND product_id = '".$product_id."' AND deleteid = 0 ORDER BY id DESC")->result();
 
                 // -- echo "SELECT $select as sales,weight as sales1,product_id,sub_product_id,tile_material_id,id FROM order_product_list_process WHERE order_id = '".$order_id."'  AND product_id = '".$product_id."' AND deleteid = 0 ORDER BY id DESC";
 
                
         
                 foreach ($query1 as $val1) {
                     if($val1->sub_product_id > 0 && $val1->sub_product_id != null){
                         $sub_id = $val1->id;
                         $product = $val1->sub_product_id;
                         $return_new = $val1->sales;
                     }else if($val1->tile_material_id > 0 && $val1->tile_material_id != null){
                         $sub_id = $val1->id;
                         $product = $val1->tile_material_id;
                         $return_new = $val1->sales;
                     }else{
                         $sub_id = $val1->id;
                         $product = $val1->product_id;
                         $return_new = $val1->sales;
                     }
                 
                 }
 
                 $resret = $this->db->query("SELECT * FROM sales_return_products WHERE id = '".$return_sub_id."'  ORDER BY id DESC LIMIT 1")->row();
                 $org_nos = $resret->org_nos;
                 $returned_nos= $resret->edit_nos;
 
                 
 
                 if($select == 'nos' || $select == 'qty'){
                     if($returned_nos >0){
                         $return_val = round($returned_nos,3);
                     }else{
                         $return_val = round($return_new,3);
                     }
                 }
                 else{
                     if($returned_nos >0 ){
                         $singlewei = $return_new/$org_nos;
                         $return_val = round(($singlewei * $returned_nos)/1000,3);
                     }else{
                         $return_val = round($return_new/1000,3);
                     }
                 }
 
                 $return = round($return_val,3);

                 // echo $return;
         
                 $from_date = date('Y-m-d');
 
                 if($return > 0 || $return < 0 ){
         
                     $res = $this->db->query("SELECT actual_closing FROM stockreport WHERE product_id = '".$product."'  ORDER BY id DESC LIMIT 1")->row();
 
                     $res_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product."' ORDER BY id DESC LIMIT 1")->row();
 
                     $today_open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product."' AND order_no = 'open' AND DATE(create_date) = '" . $from_date . "' ORDER BY id DESC LIMIT 1")->row();
 
                     $open = $this->db->query("SELECT * FROM stockreport WHERE product_id = '".$product."' AND order_no = 'open' ORDER BY id DESC LIMIT 1")->row();
 
                     if($res_open->actual_closing != 0){
                         $opening_stock = $res_open->actual_closing;    
                         if($today_open->opening_stock > 0){
                                     $opening_stock = $today_open->opening_stock;
                                 } 
                     }else{
                         $opening_stock = $open->opening_stock;    
                     }
                     $opening_stock = $opening_stock >0 ? $opening_stock : 0;
                     $actual_cloaing_stock = ($opening_stock + $inward) + ($return); 
                     
                     // echo $actual_cloaing_stock;
                 
                     $datastock['product_id']=$product;        
                     $datastock['sub_prod_id']=$sub_id;        
                     $datastock['order_id']=$order_id;
                     $datastock['order_no']=$return_sub_id ." M  ".$complains_order_id;
                     $datastock['user_id']=$this->userid;
                     $datastock['create_date']=date('Y-m-d H:i:s');
                     $datastock['opening_stock']=round($opening_stock,3);
                     $datastock['inward']=0;
                     $datastock['return_stock']= $return;
                     $datastock['billed_stock'] =0;
                     $datastock['actual_closing'] = round($actual_cloaing_stock,3);
 
                     $this->Main_model->insert_commen($datastock,'stockreport');
                 }
 
                 }
          }
  } 

  // AStockUpdate-live-01/07 

  // AStockUpdate-live-01/07

   public function singleWegUpdate(){
        $form_data = json_decode(file_get_contents("php://input"));
            
            $table = $form_data->tablename_sub;
            $id = $form_data->order_product_id;
            $single_we = $form_data->single_we;
            
            $res = $this->db->query("UPDATE `$table` 
            SET single_we = '$single_we'
            WHERE id = '$id' 
            AND deleteid = '0'");
    
        $res = ['msg' => 'sucess'];
        echo json_encode($res);
    
    }


     public function fetch_data_return_inward() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        
        $sql="";
        if(isset($_GET['attachment_status']))
        {
             $attachment_status = $_GET['attachment_status'];
        
                if($attachment_status==1)
                {
                    $sql=" AND reference_image!=''";
                }
        
        
        }
        
        $convert = $_GET['convert'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
            $base_check = $valuecs->base_check;
            $gst_check = $valuecs->gst_check;
        }
        $result = $this->db->query("SELECT * FROM $tablename_sub WHERE order_id='" . $_GET['order_id'] . "' AND return_id > 0 AND deleteid=0 AND product_id>0  $sql ORDER BY categories_id,sort_id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            $rate=$value->rate+$value->commission;
            $amountdata =  $rate * $value->qty;
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
                  $fact2 = $csval->formula2; // fact2 changes
                $fact1 = $csval->formula; // fact2 changes

                
                
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
                $og_formula = $csval->formula;
                $kg_formula2 = $csval->formula2;
                if ($categories_id == '1') {
                    $cate_status = 1;
                }elseif ($categories_id == '630') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 0;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 0;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                }
                elseif ($categories_id == '591' || $categories_id == '626' || $categories_id == '611' || $categories_id == '627' || $categories_id == '628') {
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
            if($tablename_sub=='order_product_list_process')
            {
                $profile_edit=$value->profile_edit;
                $crimp_edit=$value->crimp_edit;
                $fact_edit=$value->fact_edit;
                $nos_edit=$value->nos_edit;
                $qty_edit=$value->qty_edit;
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




           $edit_nos=0;
           $edit_qty=0;
       





            $rate=$value->rate+$value->commission;


            if($amount>0)
            {
               $disabled="0";
            }
            else
            {
                $disabled="1";
            }


            $create_date_check_gst= date('Y-m-d',strtotime($value->create_date));
            if($create_date_check_gst>'2024-02-20')
            {

             $base_rate=round($rate/1.18,4);


            }
            else
            {


              $base_rate=round($rate/1.18,3);



            }

           if($value->gst>0)
           {
                     $value->gst=$value->gst;
           }
           else
           {
            $value->gst=18;
           }



            $gst_price=0;
            $gstamount=0;
            if($gst_check==1)
            {


                    if($create_date_check_gst>'2024-02-20')
                    {

                      $gst_price=round($rate-$base_rate,4);


                    }
                    else
                    {


                     $gst_price=round($rate-$base_rate,3);



                    }
                    
                  $gstamount= $gst_price*$qty;



            }

               $sub_product_id_check='';
                if($value->sub_product_id>0)
                {
                     $sub_product_id_check= $value->sub_product_id.'-';
                }

                if($value->fact2 > 0){ // fact2 changes
                    $fact2 = $value->fact2;
                }

                 //decking roll sheet
            $fact_tab =$value->fact;
            if($value->categories_id == '626' && $value->sub_product_id > 0){
                $prod_li_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
                    foreach ($prod_li_sub as $sub)
                    {
                        $fact1=$sub->formula;
                        $fact2=$sub->formula2  ;
                    }
                    if($value->fact > 0){
                        $fact_tab = $value->fact;
                    }else{
                        $fact_tab = $fact1;
                    }

                     if($value->fact2 > 0){
                        $fact2 = $value->fact2;
                    }
                    
             }
            $prod_li = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($prod_li as $sub1)
            {
                if($sub1->uom == 'Kg'){
                    $activel_qty=$value->weight;
                }else{
                    $activel_qty=$value->weight;
                }
                
            }

            $return_values = $this->db->query("SELECT * FROM sales_return_products WHERE c_id ='" . $_GET['c_id'] . "' AND order_no ='" . $value->order_id . "' AND order_process_product_id='" . $value->id . "' AND deleteid=0")->row();

            
           


            $results= $this->Main_model->where_names_row('*','order_product_list_process','id',$return_values->order_process_product_id);
                       $proddetails= $this->Main_model->where_names_row('*','product_list','id',$return_values->product_id);

                       if(($proddetails->uom == 'Nos' || $proddetails->uom == 'nos') && $proddetails->categories_id != '1'){
                            $weight =  $return_values->qty * $proddetails->standard_weight;
                            $return_values->org_nos = $return_values->org_qty;
                            $return_values->edit_nos = $return_values->qty;

                             if($proddetails->categories_id === 599 || $proddetails->categories_id === "599"){
                                $pp= $this->Main_model->where_names_row('*','product_list','id',$results->tile_material_id);
                                $weight =  $return_values->qty * $pp->kg_rmtr_weight;
                                }
                       }
                       else{

                          if($return_values->edit_nos > 0 ){
                                if($results->single_we >0 || $results->single_we < '0' ){
                                      $weight = $results->single_we * $return_values->edit_nos;
                                  }else{
                                    $single_we = $results->weight/$results->nos;
                                    $weight = $single_we * $return_values->edit_nos;
                                  }
                          }else{
                                 $weight = $single_we * $return_values->edit_nos;
                          }

                          if($results->single_we >0 || $results->single_we < '0' ){
                              $weight = $results->single_we * $return_values->edit_nos;
                          }else{
                            $single_we = $results->weight/$results->nos;
                            $weight = $single_we * $return_values->edit_nos;
                          }
                      }
            $reorg_weight = round($weight,3);
            $reorg_orderid = $value->order_id;
            $reorg_cid = $_GET['c_id'];            
            $reorg_orderprodid = $value->id;
            $reorg_orgnos = $return_values->org_nos;
            $reorg_nos = $return_values->edit_nos;            
            $reorg_total = round($return_values->qty*$return_values->rate);
            $reorg_qty = round($return_values->qty,3);

          

            $array[] = array('no' => $count_id,
                            'profile_edit' => round($profile_edit,3),
                            'crimp_edit' => round($crimp_edit,3),
                            'fact_edit' => round($fact_edit,3),
                            'nos_edit' => round($nos_edit-$edit_nos,3),
                            'qty_edit' => round($qty_edit-$qty,3),
                            'id' => $value->id,
                            'oid' => $value->order_process_product_id,
                            'same' => $same,
                            'fact2'=> $fact2, // fact2 changes
                            'fact1'=> $fact1, // fact2 changes
                            'gst_price' => $gst_price,
                            'reorg_orderid' => $reorg_orderid,            
                            'reorg_cid' => $reorg_cid,              
                            'reorg_orderprodid' => $reorg_orderprodid,            
                            'reorg_orgnos' => $reorg_orgnos,            
                            'reorg_nos' => $reorg_nos,
                            'reorg_total' => $reorg_total,
                            'reorg_qty' => $reorg_qty,
                            'reorg_weight' => $reorg_weight,
                            'base_rate' => $base_rate,
                            'base_check' => $base_check,
                            'disabled' => $disabled,
                            'sorthide' => $sorthide, 
                            'imagestatus' => $imagestatus,
                            'order_id' => $value->order_id,
                            'activel_qty' => $activel_qty,
                            'weight' => round($value->weight,2),
                            'default_weight'=>round($weight,2),
                            'thickness'=>$thickness,
                            'sub_product_name_tab'=>$product_name_sub,
                            'purchase_request' => $value->purchase_request,
                            'purchase_id' => $value->purchase_id,
                            'product_name_tab' => $product_name,
                            'tile_material_name' => $value->tile_material_name,
                            'tile_material_id' => $value->tile_material_id,
                            'meterial_category' => $value->meterial_category,
                            'reference_image' => $value->reference_image,
                            'sub_product_id' => $value->sub_product_id, 
                            'remarks' => $value->remarks, 
                            'select_profile' => $value->select_profile,
                            'categories' => $categories,
                            'type' => $type,
                            'description' => $description, 
                            'product_id' => $value->product_id,
                            'return_complaint' => $value->return_complaint,
                            'sort_id' => $value->sort_id,
                            'count_id' => $value->count_id,
                            'return_status' => $value->return_status,
                            'rate_edit' => round($value->rate_edit,2), 
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
                            'nos_tab' => round($value->nos-$edit_nos,2),
                            'unit_tab' => $value->unit,
                            'return_status' => $value->return_status,
                            'fact_tab' => round($fact_tab,2), 
                            'uom' => $value->uom,
                            'base_id' => $value->base_id,
                            'stock' => $stock, 
                            'kg_price' => $kg_price, 
                            'og_price' => $og_price, 
                            'og_formula' => $og_formula,
                            'kg_formula2' => $kg_formula2, 
                            'billing_options' => $value->billing_options,
                            'commission_tab' => round($value->commission,2),
                            'cate_status' => $cate_status, 
                            'categories_id_get' => $categories_id,
                            'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 2),
                            'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 2),
                            'rate_tab' => round($rate,2), 
                            'cul' => $value->cul,
                            'qty_tab' => round($qty-$edit_qty,3), 
                            'amount_tab' => round($amount, 2));
            $i++;
        }
        echo json_encode($array);
 } 
   

 // check_picked_status_resale

 public function check_picked_status_resale()
 {
     date_default_timezone_set("Asia/Kolkata"); 
     $form_data = json_decode(file_get_contents("php://input"));
     $id = $form_data->id;
 
     $resultmainre = $this->db->query("SELECT * FROM `sales_return_products` WHERE c_id='" . $id . "' AND deleteid=0 ORDER BY id DESC");
     $getdatare = $resultmainre->result();
 
     $status = 0; // Default to allow resale (all picked_status = 0)
 
     foreach ($getdatare as $vlre) {
         $purchase_order_product_id = $vlre->purchase_order_product_id;
 
         // Get order_id from order_product_list_process
         $this->db->where('id', $purchase_order_product_id);
         $this->db->where('deleteid', 0);
         $order_ids = $this->db->get('order_product_list_process')->row();
 
         if ($order_ids) {
             $order_id = $order_ids->order_id;
 
             // Check if any row has picked_status = 1
             $this->db->where('order_id', $order_id);
             $this->db->where('picked_status', 1);
             $this->db->where('deleteid', 0);
             $has_packed = $this->db->get('order_product_list_process');
 
             if ($has_packed->num_rows() > 0) {
                 $status = 1; // Found a packed item
                 break; // No need to check further
             }
         }
     }
     $status = 0;
     $myData = [
         "status" => $status,
     ];
 
     echo json_encode($myData);
 }
 

    
}
