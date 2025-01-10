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
    












    public function driver_orders_list_trip_base() 
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
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Driver Panel Trip view';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
           



           $vehicle_id = $_GET['vehicle_id'];

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
        

            $result = $this->db->query("SELECT a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status>=3 AND b.assign_status NOT IN ('0','11')  AND b.order_base=1  AND b.md_approved_status IN ('1','0') AND a.deleteid=0 AND b.vehicle_id='".$vehicle_id."' $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

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
           $data['trip_id'] = $_GET['trip_id'];

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
        

            $result = $this->db->query("SELECT a.vehicle_number as vehicle_number,a.vehicle_name,a.vehicle_type,b.vehicle_id,count(b.id) as countnumber FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id  JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status>=3 AND b.assign_status NOT IN ('0','11')  AND b.order_base=1  AND b.md_approved_status IN ('1','0') AND a.deleteid=0 AND b.vehicle_id='".$vehicle_id."' $sql GROUP BY b.vehicle_id   ORDER BY countnumber DESC");

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


        $wheresearch = "";
       
         
        if($search != "") 
        {
            
                   
                             $wheresearch .= " AND  (a.order_no='" .  $search . "' OR  a.trip_id='" .$search .  "')";
            
        }
        else
        {

                                    if($from_date!='')
                                    {


                                          
                                              $wheresearch .= ' AND a.assign_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                                              $wheresearch .= " AND a.finance_status IN ('3','10','4','5','6') AND a.assign_status NOT IN ('0','11')";

                                    }
                                    else
                                    {



                                        $from_date=date('Y-m-d');
                                        $to_date=date('Y-m-d');
                                        //$wheresearch .= ' AND a.assign_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';
                                        $wheresearch .= " AND a.finance_status IN ('3','10','4') AND a.assign_status NOT IN ('0','11')";

                                       

                                    }


                                   if($vehicle_id > 0)
                                  {

                                   
                                    $wheresearch .= " AND  a.vehicle_id='" . $vehicle_id . "'";


                                  }


                            
                           
        }

         if(isset($_GET["trip_id"]))
         {

                 //$trip_id = $_GET["trip_id"];
                 //$wheresearch .= " AND  a.trip_id='".$trip_id."'";
         
         }  
        
        
        if($vehicle_id>0)
        {

             $GROUPBY='GROUP BY a.trip_id';
          
        }
        else
        {

             $GROUPBY='GROUP BY a.vehicle_id';
            
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
        
        foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
        }

        if ($this->session->userdata["logged_in"]["access"] != "13")
        {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status=2  $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT a.trip_id,a.vehicle_id,a.assign_date,a.start_reading,a.km_reading_end,a.bill_total FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status=2   $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $result = $query->result();

        } else {
            $querycount = $this->db->query(
                "SELECT a.id FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0 AND a.delivery_status=2  AND a.driver_id='" .
                    $define_driver_id .
                    "' $wheresearch  $GROUPBY ORDER BY `a`.`assign_date` DESC"
            );
            $resultcount = $querycount->result();
            $count = count($resultcount);

            $query = $this->db->query(
                "SELECT a.trip_id,a.vehicle_id,a.assign_date,a.start_reading,a.km_reading_end,a.bill_total FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21','12','11') AND a.selforder=0  AND a.delivery_status=2 AND a.driver_id='" .
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
            $lengeth_total=0;
            $trip_status="Pending";
            $re_status="Pending";
            $array = [];



$querys_trip_status = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND a.trip_id='" . $values->trip_id . "' AND a.assign_status IN ('2','3')  ORDER BY a.sort_id ASC");    
 $querys_trip_status = $querys_trip_status->result();
 foreach ($querys_trip_status as $tripvalue) 
 {
 

    if($tripvalue->total_re>0)
    {


        $trip_status='Started ('.$tripvalue->total_re.')';

    }


 }



$querys_re_status = $this->db->query("SELECT a.finance_status,a.reason,count(a.id) as total_re FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base>0 AND a.selforder=0  AND a.trip_id='" . $values->trip_id . "' AND a.finance_status IN ('5','6')   ORDER BY a.sort_id ASC");    
 $querys_re_status = $querys_re_status->result();
 foreach ($querys_re_status as $revalue) 
 {

    if($revalue->total_re>0)
    {


        $re_status='Completed ('.$revalue->total_re.')';

    }

 }



            $querys = $this->db->query(
                "SELECT a.* FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121','21') AND a.selforder=0  AND a.trip_id='" .
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

                $lengeth = 0;
                $weight = 0;
                $lengeth_total =0;
                $query_profle_get = $this->db->query("SELECT MAX(profile) as profile FROM $tablename_sub  WHERE order_id='" .$value->id ."' AND deleteid=0 AND profile>0"); 
              
                $result_lengeth = $query_profle_get->result();
                foreach ($result_lengeth as $valuess) {
                    $lengeth = $valuess->profile;
                    $lengeth_array[] = $valuess->profile;
                }


                $lengeth = round($lengeth, 2);
                $lengeth_total= max($lengeth_array);

                $weight = 0;
                $query_weight_get = $this->db->query(
                    "SELECT SUM(weight) as totalweight FROM $tablename_sub  WHERE order_id='" .
                        $value->id .
                        "' AND deleteid=0"
                );
                $result_totalweight = $query_weight_get->result();
                foreach ($result_totalweight as $we) {
                    $weight = $we->totalweight;
                    $weighttotal += $we->totalweight;
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

                $discountfulltotal = $value->bill_total;
                $first_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT sort_id FROM $tablename WHERE  assign_status=1 AND  driver_id='" .
                        $value->driver_id .
                        "' AND trip_id='" .
                        $value->trip_id .
                        "' AND order_base>0 ORDER BY sort_id ASC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $first_sort_id = $valuesss->sort_id;
                }

                $last_sort_id = 1;

                $query_profle_gets = $this->db->query(
                    "SELECT sort_id FROM $tablename WHERE   driver_id='" .
                        $value->driver_id .
                        "' AND trip_id='" .
                        $value->trip_id .
                        "' AND order_base>0  ORDER BY sort_id DESC LIMIT 1"
                );
                $result_lengeths = $query_profle_gets->result();
                foreach ($result_lengeths as $valuesss) {
                    $last_sort_id = $valuesss->sort_id;
                }

                $statuscolor = "badge-soft-danger";

                if ($value->assign_status == "12") 
                {
                    $statuscolor = "badge-soft-danger";
                    $value->reason = "Loading Pending";
                }

                if ($value->assign_status == "1") {
                    $statuscolor = "badge-soft-yellow";
                }

                if ($value->assign_status == "2") {
                    $statuscolor = "badge-soft-primary";
                    $value->reason = "Trip Started";
                }

                if ($value->assign_status == "3") {
                    $statuscolor = "badge-soft-success";
                   
                }

                if ($value->finance_status == "10") {
                    $statuscolor = "badge-soft-danger";
                    $value->assign_status=8;
                }

                if ($value->order_base > 0) {


                    if($value->payment_mode=='Cash')
                    {
                        $bill_total_collectable+=$value->bill_total;
                    }

                    
                    if($value->loading_status=='1')
                    {
                        $delivery_mode='PART';
                    }
                    else{
                         $delivery_mode='FULL';
                    }
                  
                   $diff= $value->bill_total-$value->driver_recived_payment;
                   if($diff<0)
                   {
                      $diff="";
                   }
                   $totkm= $value->km_reading_end-$value->start_reading;
                   if($totkm<0)
                   {
                      $totkm="";
                   }
                    $array[] = [
                        "no" => $value->sort_id,
                        "sales_id" => $value->id,
                        "totkm" => $totkm,
                        "bill_amount" => $value->bill_total,
                        "driver_recived_payment" => $value->driver_recived_payment,
                        "sales_phone" => $sales_phone,
                        "diff" => $diff,
                        "loc_name" => $loc_name,
                        "delivery_mode" => $delivery_mode,
                        "first_sort_id" => $first_sort_id,
                        "last_sort_id" => $last_sort_id,
                        "sales_name" => $sales_name,
                        "denomination_total" => $denomination_total,
                        "weight" => round($weight),
                        "gate_status" => $value->gate_status,
                        "end_reading_factory" => $value->end_reading_factory,
                        "start_reading_factory" =>$value->start_reading_factory,
                        "start_reading" => $value->start_reading,
                        "km_reading_end" => $value->km_reading_end,
                        "gate_weight" => $value->gate_weight,
                        "payment_mode" => $value->payment_mode,
                        "id" => $value->id,
                        "base_id" => base64_encode($value->id),
                        "order_no" => $value->order_no,
                        "lengeth" => $lengeth,
                        "rescheduling_delivery" =>
                            $value->rescheduling_delivery,
                        "rescheduling_date" => $value->rescheduling_date,
                        "rescheduling_remarks" => $value->rescheduling_remarks,
                        "name" => $company_name,
                        "company_name" => $company_name_company,
                        "email" => $email,
                        "phone" => $phone,
                        "totalamount" => round($discountfulltotal, 2),
                        "commission" => round($commission),
                        "delivery_charge" => $value->delivery_charge,
                        "reason" => $value->reason,
                        "sort_id" => $value->sort_id,
                        "route_name" => $route_name,
                        "address" => $address,
                        "color" => $statuscolor,
                        "loadamount"=>round($loadamount,2),
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
           $diff_amt=$bill_total_collectable-$collected_amount;

                  if($diff_amt<0)
                   {
                      $diff_amt="";
                   }
                  
                   if($totalkm<0)
                   {
                      $totalkm="";
                   }

            $trip_id_array[] = [
                "subarray" => $array,
                "no" => $i,
                "sh" => $st,
                "expended" => $sts,
                "collapsed" => $collapsed,
                "trip_id" => $values->trip_id,
                "collectable_amount_tot" => $bill_total_collectable,
                'assign_date'=>date('d-m-Y',strtotime($values->assign_date)),
                "vehicle_id" => $values->vehicle_id,
                "start_reading" => $values->start_reading,
                "km_reading_end" => $values->km_reading_end,
                "totalkm" => $totalkm,
                "lengeth_total"=>round($lengeth_total,2),
                "weighttotal"=>round($weighttotal),
                "bill_total"=>$bill_total,
                "load_amt"=>round($load_amt,2),
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
        
       
        
        $sql="";
        
        $newArray=array();
        $convert = $_GET['convert'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
        }
        $result = $this->db->query("SELECT a.*,b.color FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0  AND a.product_id>0 $sql ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
        $result = $result->result();
        foreach ($result as $value)
        {




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





                 $rowprofile=0;
                 $statusviewdata = $this->db->query("SELECT SUM(a.nos) as rowprofile,b.color FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='".$_GET['order_id']."' AND  a.deleteid = '0' AND  b.color = '".$value->color."' AND  a.categories_id = '".$value->categories_id."' GROUP BY b.color");
                   $statusviewdata = $statusviewdata->result();
              
                   foreach($statusviewdata as $r)
                   {     
                           
                         $rowprofile=round($r->rowprofile,2);
                   }
              
                       

     $found=0;//If no duplicate found then it will be zero
      foreach ($newArray as $v) {
        if($v==$value->color){
            // Duplicate Exist
            $found=1;

        }
    }

    if(!$found)
    {    //No duplicate found in $newArray
        if($value->color!='')
        {
            $newArray[]=$value->color;
        }
        
     }    











            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;
                $product_name = $csval->product_name;
                $weight = $csval->weight;
                $thickness= $csval->thickness;

                
                
                       if($tablenamemain=='purchase_orders_process')
                        {    
                             if($csval->purchase_name!='')
                             {
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
                    $cate_status = 1;
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
                $value->reference_image=0;
            }
            else
            {
                $value->reference_image=base_url().$value->reference_image;
            }
            
            if ($value->gst == '') {
                $value->gst = $gst;
            }
           
            
            
              
           $sort_id= $value->sort_id;
           $sorthide=0;
       



            $product_name_sub="";
            if($value->sub_product_id>0)
            {


           $product_list_sub = $this->Main_model->where_names('product_list', 'id', $value->sub_product_id);
            foreach ($product_list_sub as $csval_sub)
            {

                $product_name_sub=$csval_sub->product_name;
            }


            }




            $rate=$value->rate+$value->commission;

              $remarks= $value->remarks;
            $value->remarks='';
            if($value->select_profile=='Tata Profile')
            {
                $value->remarks.='Tata Profile';
            }
            

            if($remarks!='')
            {
                $value->remarks.=$remarks;
            }

            if($value->print!='')
            {

                if($value->print=='Yes')
               {
                          $value->remarks.=' | YP';
               }

            }

            if($value->reverse_color!='')
            {
                    
               if($value->reverse_color=='Yes')
               {
                          $value->remarks.=' | Rev Color';
               }

               
            }

             if($value->combination!='')
            {

               if($value->combination=='Yes')
               {
                          $value->remarks.=' | Combi lot';
               }
                
            }

            
            if($value->film_guard!='')
            {

             
                          $value->remarks.=' | '.$value->film_guard;
               
                
            }


            if($value->packaging!='')
            {
                if($value->packaging=='Premium')  
                {
                  $value->packaging='P - Packing';
                }
                 if($value->packaging=='Normal')  
                {
                  $value->packaging='N - Packing';
                }

                if($value->packaging=='Courier')  
                {
                  $value->packaging='C - Packing';
                }
                $value->remarks.=' | '.$value->packaging;
            }


            if($value->uom=='3')
            {
                $profile_tab_convert=round($profile,3);
                $crimp_tab_convert=round($crimp,3);
            }


            if($value->uom=='4')
            {
                $profile_set=$profile/304.8;
                $crimp_set=$crimp/304.8;
                $profile_tab_convert=round($profile_set,3);
                $crimp_tab_convert=round($crimp_set,3);
            }

            if($value->uom=='5')
            {
                $profile_set=$profile*3.281;
                $crimp_set=$crimp*3.281;
                $profile_tab_convert=round($profile_set,3);
                $crimp_tab_convert=round($crimp_set,3);
            }


             if($value->uom=='6')
            {
                $profile_set=$profile/12;
                $crimp_set=$crimp/12;
                $profile_tab_convert=round($profile_set,3);
                $crimp_tab_convert=round($crimp_set,3);
            }

            if($value->uom=='2')
            {
                $profile_set=$profile*10.764;
                $crimp_set=$crimp*10.764;
                $profile_tab_convert=round($profile_set,3);
                $crimp_tab_convert=round($crimp_set,3);
            }
            

           
            $array[] = array(
            'no' => $i,
            'id' => $value->id,
            'found'=>$found,
            'rowprofile' => $rowprofile,
            'profile_tab_convert' => $profile_tab_convert,
            'crimp_tab_convert' => $crimp_tab_convert,
             'same' => $same,
             'default_uom'=>$default_uom,
             'sorthide' => $sorthide, 
             'imagestatus' => $imagestatus,
              'order_id' => $value->order_id,
              'activel_qty' => $value->activel_qty,
              'select_profile' => $value->select_profile,
              'remarks' => $value->remarks,
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
                 'remarks' => $value->remarks, 
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
                              'nos_tab' => round($value->nos,2),
                               'unit_tab' => $value->unit,
                                'return_status' => $value->return_status,
                                 'fact_tab' => round($value->fact,2), 
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
                                          'qty_tab' => round($qty,3), 
                                          'amount_tab' => round($amount, 2));
            $i++;
        }

      
        echo json_encode($array);
    }
    









  public function fetchDataCategorybase_delevery_notes() {
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
        
        
        
        
        $convert = $_GET['convert'];
        $result = $this->db->query("SELECT b.type,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.product_id,a.sort_id,b.color ASC");
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
                    $lablenos = 'Full Roll';
                    $lablefact1 = 'Partial Roll';
                    $lablefact2 = '';
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
                
                
                $categories_id=$value->categories_id;
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 1;
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
 
              


                $activel_qty_total_set_overall=$value->activel_qty_total_set;
                $activel_qty_total_set=$qty;
            
            
            $array[] = array('no' => $i, 'id' => $value->id, 'categories_id' => $value->categories_id,'activel_qty_total_set_overall' => round($activel_qty_total_set_overall,3),'activel_qty_total_set' => round($activel_qty_total_set,3),'cate_status' => $cate_status, 'type' => $value->type, 'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype,'activel_qty_total'=>$activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total,2), 'nos_total' => round($value->nos_total,2), 'fact_total' => round($value->fact_total,2), 'qty_total' => round($qty,3),
             'amount_total' => round($value->amount_total,2));
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
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            
            
            
            $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
            $data['layout_plan'] = $resultmain->result();
            
            
            $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            
            
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
        
        
        
        
        $convert = $_GET['convert'];
        $result = $this->db->query("SELECT b.type,a.categories_id,a.billing_options,a.product_id,b.uom,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.activel_qty) as activel_qty_total_set,a.activel_qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='" . $_GET['order_id'] . "' AND a.deleteid=0 $sql GROUP BY a.categories_id,b.type ORDER BY a.categories_id,a.sort_id,a.count_id ASC");
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
                    $lablenos = 'Full Roll';
                    $lablefact1 = 'Partial Roll';
                    $lablefact2 = '';
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
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 1;
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
 
              


           $edit_nos=0;
           $edit_qty=0;


                $activel_qty_total_set_overall=$value->activel_qty_total_set;
                $activel_qty_total_set=$qty;
            
            
            $array[] = array('no' => $i, 'id' => $value->id, 'categories_id' => $value->categories_id,'activel_qty_total_set_overall' => round($activel_qty_total_set_overall,3),'activel_qty_total_set' => round($activel_qty_total_set,3),'cate_status' => $cate_status, 'type' => $value->type, 'lable' => $lable, 'lable2' => $lable2, 'lablenos' => $lablenos, 'labletype' => $labletype,'activel_qty_total'=>$activel_qty_total, 'lablefact1' => $lablefact1, 'lablefact2' => $lablefact2, 'categories_name' => $value->categories_name, 'uom' => $value->uom, 'commission_total' => round($value->commission_total,2), 'nos_total' => round($value->nos_total,2), 'fact_total' => round($value->fact_total,2), 'qty_total' => round($qty,3),
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
                } elseif ($categories_id == '2622') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 1;
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
           $base_rate=round($rate/1.18,3);

           if($value->gst>0)
           {
                     $value->gst=$value->gst;
           }
           else
           {
            $value->gst=18;
           }

            $array[] = array('no' => $count_id,
            'profile_edit' => round($profile_edit,3),
            'crimp_edit' => round($crimp_edit,3),
            'fact_edit' => round($fact_edit,3),
            'nos_edit' => round($nos_edit-$edit_nos,3),
            'qty_edit' => round($qty_edit-$qty,3),
            'id' => $value->id,
             'same' => $same,
             'base_rate' => $base_rate,
             'base_check' => $base_check,
             'disabled' => $disabled,
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
                                 'fact_tab' => round($value->fact,2), 
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
            $result_order = $this->Main_model->where_names($tablenamemain, 'order_no', $order_no);
            foreach ($result_order as $orders) {
               
                $find['order_no']=$orders->order_no;
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
                    $datass['remarks'] = $remarks;
                    $datass['return_date'] = $create_date;
                    $datass['finance_status'] = 2;
                    $datass['roundoff'] = $orders->roundoff;
                    $datass['roundoffstatus'] = $orders->roundoffstatus;
                    $datass['deleteid'] = $deleteid;
                    $this->Main_model->update_commen_where($datass, 'order_no', 'orders_process_return_temp');
                }
                
              
                $this->Main_model->delete_where_new('order_product_list_process_return_temp', 'order_id', $insertid);
                $result_order_product = $this->Main_model->where_names_two_order_by('order_product_list_process', 'order_no', $form_data->order_no, 'deleteid', '0', 'id', 'ASC');
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



                  
                    $findp['weight'] = $orders_product->weight;
                    $findp['uom'] = $orders_product->uom;
                    $findp['billing_options'] = $orders_product->billing_options;
                    $findp['unit'] = $orders_product->unit;
                    $findp['fact'] = $orders_product->fact;
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
                    $findp['amount'] = $orders_product->amount;
                    $findp['deleteid'] = $orders_product->deleteid;
                    $findp['create_date'] = $orders_product->create_date;


                      

              $edit_nos=0;
              $edit_qty=0;
            $resultmaincountset = $this->db->query("SELECT SUM(qty) as qty,SUM(edit_nos) as edit_nos FROM sales_return_products  WHERE product_id='" .$orders_product->product_id . "' AND order_no='".$orders_product->order_id."' AND deleteid=0 ORDER BY id ASC");
           $resultcsset = $resultmaincountset->result();
          foreach($resultcsset as $vl)
          {

             $edit_qty=$vl->qty;
             $edit_nos=$vl->edit_nos;

          }



                      $findp['nos'] = $orders_product->nos-$edit_nos;
                      $findp['qty'] = $orders_product->qty-$edit_qty;




                    $findp['org_order_id'] = $orders_product->order_id;
                    $findp['org_qty'] = $orders_product->qty;
                    $findp['org_nos'] = $orders_product->nos;
                    $totalamount+= $orders_product->rate * $orders_product->qty;
                    $this->Main_model->insert_commen($findp, 'order_product_list_process_return_temp');
                }
            }
           
            
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
            $amounttotal+= $rate * $value->qty;
            
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
              $discountfulltotal = $roundoff - $discount + $minisroundoff;
              $discountfulltotal_base = $roundoff - $discount;
              $roundoff_val='+'; 


        } 
        else 
        {
              $discountfulltotal = $roundoff - $discount - $minisroundoff;
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




                        $resultset = $this->db->query("SELECT SUM(b.rate*b.qty) as totalamount FROM $tablenamemain as a JOIN $tablename as b ON a.id=b.order_id WHERE   a.id<'".$_GET['order_id']."'  AND  a.order_base = '1' AND b.deleteid = '0' AND a.deleteid = '0' AND a.customer_id='".$customer_id."'");
                         $resultset = $resultset->result();
                   
                        foreach ($resultset as $set)
                             {
                              
                                          $tcsamountval=round($set->totalamount,2);
                                          $tcsamountvaldata=  $tcsamountval+$discountfulltotal;
                                          if($tcsamountvaldata>5000000)
                                          {
                                              $tcsamount=round($discountfulltotal*0.1/100);
                                          }

                                          $tcsamount=0;
                                
                               
                             }

             }


          }



                $discountfulltotal=$discountfulltotal+$tcsamount;
                $org_fulltotal=$discountfulltotal_base+$orgtcsamount;




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

                          


                    }
                    else
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









        $array = array('order_no_id' => $order_no,'tcsamount' => $tcsamount,'statusview'=>$statusview,'order_base'=>$order_base,'reason'=>$reason, 'user_id' => $user_id, 'salesphone' => $salesphone, 'salesphone2' => $salesphone2, 'salesname' => $salesname, 'reason' => $reason, 'paricel_mode' => $paricel_mode, 'production_assign' => $production_assign, 'create_date' => $create_date, 'create_time' => $create_time, 'minisroundoff' => $minisroundoff,'roundoff_val' => $roundoff_val,'roundoffstatusval_data' => $roundoffstatusval_data,  'fulltotal' => round($discountfulltotal_base, 2), 'discountfulltotal' =>round($discountfulltotal,2),'org_fulltotal' =>round($org_fulltotal,2), 'totalitems' => count($result), 'gsttotal' => round($amounttotalgst,2), 'discount' => round($discount), 'commission' => round($commission,2), 'amounttotal_with_out_commission' => round($amounttotal_with_out_commission, 2), 'Meter_to_Sqr_feet' => round($Meter_to_Sqr_feet, 2), 'Sqr_feet_to_Meter' => round($Sqr_feet_to_Meter, 2), 'NOS' => round($nos, 2), 'UNIT' => round($unit, 2), 'FACT' => round($fact, 2), 'fullqty' => round($fullqty, 2));
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
                                         
                                         if($form_data->optionid==3)
                                         {
                                             
                                              $data['order_base']= 5;
                                              
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
                                                     
                                                     if($value->org_order_id>0)
                                                     {

                                                      $order_id=$value->org_order_id;
                                                       
                                                     }
                                                     else
                                                     {
                                                        $order_id=$value->order_id;
                                                
                                                     }
                                                      $datadd['qty']=$value->qty;
                                                     $amount=$value->amount;
                                                     $datadd['org_qty']=$value->org_qty;
                                                     $datadd['org_nos']=$value->org_nos;
                                                     $datadd['edit_nos']=$value->nos;
                                                     $datadd['notes']=$value->return_complaint;
                                                     $order_process_product_id=$value->order_process_product_id;
                                                     
                                            }
                                            
                                            $totalamount+=$amount;
                                            $netweight+=$datadd['qty'];
                                           
                                            
                                            $datadd['rate']=$rate;
                                            $datadd['c_id']=$insert_id;
                                            $datadd['order_no']=$order_id;
                                            $datadd['product_name']=$product_name;
                                            $datadd['product_id']=$product_id;
                                            $datadd['categories_id']=$categories_id;
                                            $datadd['return_recived_status']=0;

                                            
                                            $datadd['purchase_order_product_id']=$purchase_order_product_id[$i];


$checkdata_p = $this->Main_model->where_names_three_order_by('sales_return_products', 'c_id', $insert_id, 'purchase_order_product_id',$purchase_order_product_id[$i],'deleteid', 0, 'id', 'ASC');

                                            if(count($checkdata_p)==0)
                                            {
                                            
                                            $insert_id_data=$this->Main_model->insert_commen($datadd,'sales_return_products');
                                            $this->db->query("UPDATE order_product_list_process_return_temp SET return_status=1,return_id='".$insert_id_data."' WHERE id='".$purchase_order_product_id[$i]."'");
                                            $this->db->query("UPDATE order_product_list_process SET return_status=1,return_id='".$insert_id_data."' WHERE id='".$order_process_product_id."'");

                                            }






                                            
                                            
                                         }
                                         
                                         
                                         
                                         
                                         $old_amount=0;
                                         if($order_no!='')
                                         {


                                         $resultgetprodutold= $this->Main_model->where_names('order_product_list_process','order_no',$order_no);
                                         foreach ($resultgetprodutold as  $valueold) {
                                                   
                                               $old_amount+=$valueold->amount;
                                                    
                                                     
                                         }

                                         }
                                         
                                         $bill_total=round($totalamount);  
                                         $old_amount=round($old_amount);
                                         if($bill_total==$old_amount)
                                         {
                                             $bill_total=$form_data->billamount;
                                         }
                                          
                                       
                                         
                                         $re_order_no='RE-'.strtoupper(date('M') . '/' . $neworder_id); 
                                         
                                         
                                         
                                         
                        $this->db->query("UPDATE $tablename SET qty='".$netweight."',bill_total='".$bill_total."',tcs_status='".$tcs_status."' WHERE id='".$insert_id."'");





                                         if($form_data->optionid==3)
                                         {
                                               $this->db->query("UPDATE orders_process SET finance_status=10,assign_status=0,return_status=1,reason='Return To Extra Sheet' WHERE order_no='".$order_no."'");
                                         }
                                         else
                                         {
                                             $this->db->query("UPDATE orders_process SET return_status=1,return_id='".$insert_id."' WHERE order_no='".$order_no."'");
                                         
                                         }
                                          $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Sales Return  Created..');
                                        

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
                                         $this->db->query("UPDATE orders_process SET return_status=0,finance_status=10,assign_status=3,reason='Re-Delivery',km_reading_end='".$form_data->km_reading_end."',trip_end_date='".$date."',trip_end_time='".$time."',return_id='".$insert_id."' WHERE id='".$form_data->order_id."'");
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
                                         
                                        
                                        
                                        $resultmain = $this->db->query("SELECT a.customer as customer_id,a.id,a.tcs_status,a.bill_total,a.start_reading,a.km_reading_end,a.order_no,a.order_id,a.driver_return,a.re_order_no,a.driver_id FROM `order_sales_return_complaints` as a   WHERE a.deleteid=0  AND a.id='".$form_data->id."' ORDER BY a.id DESC");
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
                                                      $totalamount+=$vlre->qty*$vlre->rate;
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
                                                    
                                                  
                                              
                                                
                                                
                                                    //$data_address['order_id'] = $order_id;
                                                    $data_address['order_id'] = 0;
                                                    $data_address['customer_id'] = $customer_id;
                                                    $data_address['user_id'] = $this->userid;
                                                    $data_address['notes'] = 'Sales Return';
                                                    $data_address['payment_mode'] = '';
                                                    $data_address['order_no'] = 'RE-'.$form_data->id;
                                                    $data_address['difference'] = 0;
                                                    $data_address['reference_no'] = $re_order_no;
                                                    
                                                    $data_address['amount'] = round($totalamount,2);
                                                    $data_address['account_head_id'] = 68;
                                                    $data_address['account_heads_id_2'] = 2;
                                                    $data_address['order_trancation_status'] = 0;
                                                    $data_address['paid_status'] = 1;
                                                    $data_address['credits'] = round($totalamount);
                                                    $data_address['balance'] = 0;
                                                    $data_address['collected_amount'] = round($totalamount,2);
                                                    $data_address['payment_date'] = $date;
                                                    $data_address['process_by'] = 'Sales Return';
                                                    $data_address['payment_time'] = $time;
                                                    $data_address['party_type'] = 1;
                                                    $data_address['bank_id'] = 0;
                                                    
                                                    
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
                                                        
                                                                  $this->Main_model->insert_commen($data_address_driver, 'all_ledgers');

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
                                             $this->db->query("UPDATE orders_process SET finance_status=10,assign_status=0,return_status=1,reason='Return To Re-Sale' WHERE order_no='".$order_id_no."'");
                                         }
                                         
                                         if($form_data->order_base==8)
                                         {
                                             $this->db->query("UPDATE orders_process SET finance_status=10,assign_status=0,return_status=1,reason='Return To Extra Sheet' WHERE order_no='".$order_id_no."'");
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
                                                $this->db->query("UPDATE orders_process SET print_status='1' WHERE id='" . $value->id . "'");
                                            }
                                        
                                        
                                        }


                        for ($i=0; $i <count($order_ids) ; $i++)
                        { 
                           

                           if($order_ids[$i]>0)
                           {

                            $this->db->query("UPDATE orders_process SET print_status='1' WHERE id='" . $order_ids[$i] . "'");

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
    


    
}
