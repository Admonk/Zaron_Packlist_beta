<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

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
        public function addressadd()
  {
      
      $form_data = json_decode(file_get_contents("php://input"));
      
                  
                         
                          if($form_data->name!='' && $form_data->phone!='')
                          {

                           $tablename=$form_data->tablename;
                         
                         

                              $result= $this->Main_model->where_names($tablename,'phone',$form_data->phone);
                              if(count($result)>0)
                              {

                                   $array=array('error'=>'3','massage'=>'Contact phone no  already exists');
                                             echo json_encode($array);

                              }
                              else
                              {
                                  
                                  
                                             $data_address['customer_id']=1;
                                             $data_address['name']=$form_data->name;
                                             $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             $data_address['locality']=$form_data->locality;
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $this->Main_model->insert_commen($data_address,$tablename);
                                    
                                    
                                    
                                            $array=array('error'=>'2','massage'=>'Address successfully Added..');
                                            echo json_encode($array);
                              }




                           

                     }
                          else
                          {
                             $array=array('error'=>'1');
                             echo json_encode($array);
                         }
                         
                         
                     
      
  }


     public function fetch_data_address()
  {
                        
                        
                   $order_id= $_GET['order_id'];



                  
                   $result= $this->Main_model->where_names('purchase_adddrss','deleteid','0');
                   $i=1;
                   $array=array();
                   foreach ($result as  $value) {
                       
                      
                    $resultss= $this->Main_model->where_names('purchase_orders_process','id',$order_id);
                     foreach ($resultss as  $address)
                     {

                       $address_id= $address->address_id;

                       if($address_id==$value->id)
                       {
                        $checked=1;
                       }
                       else
                       {
                        $checked=0;
                       }

                     }
                 
                   
                                    $array[] = array(
                                        
                                        
                                        'no' => $i, 
                                             'id' => $value->id, 
                                      'phone' => $value->phone, 
                                      'name' => $value->name, 
                                      'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->zone.'-'.$value->pincode.' '.$value->city.' '.$value->state,
                                      'city' => $value->city,
                                      'checked' => $checked, 
                                      'state' => $value->state,
                                      'google_map_link' => $value->google_map_link
                
                                    );
                                    
                   


                            $i++;

                   }

                    echo json_encode($array);

  }
    
    
     public function addresspoint()
    {
        $amounttotal = 0;
        $Meter_to_Sqr_feet = 0;
        $Sqr_feet_to_Meter = 0;
        $form_data = json_decode(file_get_contents("php://input"));
        $tablenamemain = $form_data->tablenamemain;
      
        $datass["get_id"] = $form_data->order_id;
        $datass["address_id"] = $form_data->address_id;
        $this->Main_model->update_commen($datass, $tablenamemain);
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
        $checkalready=0;
        $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($result as $value) {
            
            
           
            
            if($value->rate_edit!=0)
            {
                 $value->rate=$value->rate_edit;
                
            }
            
            if($value->qty_edit!=0)
            {
                  $value->qty=$value->qty_edit;
                
            }
            
           
             $amounttotal+= $value->rate * $value->qty;
            
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
        
        $po_number="";
        $invoice_no="";
        
            $liner_print = "";
            $tentative_delivery_date = "";
            $special_requests = "";
        
        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            $production_assign = $valuedis->production_assign;
            $discount = $valuedis->discount;
            $order_no = $valuedis->order_no;
            $checkalready=1;
            $po_number = $valuedis->po_number;
            $invoice_no = $valuedis->invoice_no;
            $invoice_id = $valuedis->invoice_id;
            $invoice_extra_unit_id = $valuedis->invoice_extra_unit_id;
            $liner_print = $valuedis->liner_print;
            $tentative_delivery_date = $valuedis->tentative_delivery_date;
            $special_requests = $valuedis->special_requests;
            
            $minisroundoff = $valuedis->roundoff;
            $roundoffstatus = $valuedis->roundoffstatus;
            $user_id = $valuedis->user_id;
            $create_date = date('d/m/Y', strtotime($valuedis->create_date));
            $create_time = $valuedis->create_time;
            $reason = $valuedis->reason;
            $paricel_mode = $valuedis->paricel_mode;
            $order_base = $valuedis->order_base;
            $reason = $valuedis->reason;
            $priority = $valuedis->priority;
            $mark_request_to_sales = $valuedis->mark_request_to_sales;
            $address_id = $valuedis->address_id;
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
        
        $qutation_orders_id=0;
        $qutation_orders = $this->Main_model->where_names('orders_quotation', 'order_no', $mark_request_to_sales);
        foreach ($qutation_orders as $val) 
        {
            $qutation_orders_id = base64_encode($val->id);
            
        }
        
        
        
        
        
        $totalextra=0;
        $selected_status=0;
        $vendor_id=0;
        $querysssss = $this->db->query("SELECT a.extra,a.vendor_id,a.selected_status,SUM(b.qty) as totalqty,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id WHERE a.order_id='".$_GET['order_id']."' AND b.deleteid=0 AND a.selected_status=1 GROUP BY a.vendor_id");
        $resultss = $querysssss->result();
        foreach ($resultss as  $valuess) {
                         
                        $totalextra=$valuess->totalqty*$valuess->extra;
                        //$totalextra=$valuess->extra;
                        
                        $vendor_id=$valuess->vendor_id;
                        
                        
        }
           
           
        $querysssss_venodr = $this->db->query("SELECT a.selected_status  FROM purchase_order_vendors as a  WHERE a.order_id='".$_GET['order_id']."'  AND a.selected_status=1");
        $resultss_vendor = $querysssss_venodr->result();
        foreach ($resultss_vendor as  $valuess_v)
        {
                         
                      $selected_status=$valuess_v->selected_status;
        }
                  
      
        
        $roundoff = $amounttotal;
        
        
        $totalamountgat= $roundoff*18/100;
        $discountfulltotal = round($roundoff+$totalamountgat,2);
        $subtotal = round($roundoff);
        
        $totaltds=0;
        if($discountfulltotal>5000000)
        {
                                     $totaltds= $discountfulltotal*5/100;
        }
                                
        $discountfulltotal=$discountfulltotal-$totaltds;
        $subtotal=$discountfulltotal;
        
        
        
        
        
        
                                 $tcs_status=0;
                                 $customers_data = $this->Main_model->where_names('vendor', 'id', $vendor_id);
                                 foreach ($customers_data as $csvalv) {
                                    $tcs_status = $csvalv->tcs_status;
                                   
                                 }
                                 
                                 if($tcs_status==1)
                                 {
                    
                                                $tcsamount=round($discountfulltotal*0.1/100);
                    
                                 }
                                 else
                                 {
                    
                    
                                                 $tcsamount=0;
                    
                    
                                 }
                                 
                               
                                 $discountfulltotal=$discountfulltotal+$tcsamount;









   $office_address = $this->Main_model->where_names_two_order_by('purchase_adddrss', 'id', $address_id, 'deleteid', '0', 'id', 'DESC');
        if(count($office_address)>0)
        {



                    foreach ($office_address as $customers_adddrss_v) 
                    {

                        $office_address_name=$customers_adddrss_v->name;
                        $office_address_phone=$customers_adddrss_v->phone;
                      
                         $office_address_address = $customers_adddrss_v->address1 .
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
        else
        {



             $office_address_name='Corporate Office';
             $office_address_phone='Ph: +91 98654 18338';
             $office_address_address =' 4/333/7, N.H Bye Pass       
                                            Road. Kaikattipudhur,       
                                            Avinashi, Tirupur, Tamilnadu        
                                            641 654.';



                   
                    

        }




                                 
        
        
         
        $array = array('checkalready' => $checkalready,'office_address_name' => $office_address_name,'office_address_phone' => $office_address_phone,'office_address_address' => $office_address_address,'order_no_id' => $order_no,'tcsamount' => $tcsamount,'subtotal' => $amounttotal,'qutation_orders_id' => $qutation_orders_id,'mark_request_to_sales' => $mark_request_to_sales,'totalamounttds'=>round($totaltds,2),'selected_status'=>$selected_status,'invoice_extra_unit_id'=>$invoice_extra_unit_id,'invoice_id'=>$invoice_id,'po_number' => $po_number,'totalextra' => $totalextra,'invoice_no' => $invoice_no,'liner_print' => $liner_print,'tentative_delivery_date' => $tentative_delivery_date,'special_requests' => $special_requests,'invoice_no' => $invoice_no,'order_base'=>$order_base,'totalamountgat'=>round($totalamountgat),'priority'=>$priority,'reason'=>$reason, 'user_id' => $user_id, 'salesphone' => $salesphone, 'salesphone2' => $salesphone2, 'salesname' => $salesname, 'reason' => $reason, 'paricel_mode' => $paricel_mode, 'production_assign' => $production_assign, 'create_date' => $create_date, 'create_time' => $create_time, 'minisroundoff' => $minisroundoff, 'fulltotal' => round($amounttotal), 'discountfulltotal' => round($discountfulltotal), 'totalitems' => count($result), 'gsttotal' => round($amounttotalgst), 'discount' => round($discount), 'commission' => round($commission), 'amounttotal_with_out_commission' => round($amounttotal_with_out_commission), 'Meter_to_Sqr_feet' => round($Meter_to_Sqr_feet, 3), 'Sqr_feet_to_Meter' => round($Sqr_feet_to_Meter, 2), 'NOS' => round($nos, 2), 'UNIT' => round($unit, 2), 'FACT' => round($fact, 2), 'fullqty' => round($fullqty, 2));
        echo json_encode($array);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function fetch_invoice_order() {
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
        $resultdis = $this->Main_model->where_names_two_order_by('purchase_invoice', 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            
            $po_number = $valuedis->po_number;
            $invoice_no = $valuedis->invoice_no;
            $payout_date =date('d-m-Y', strtotime($valuedis->payout_date));
            $vendor_base_id = $valuedis->vendor_base_id;
            
           
        }
        
        $resultsales = $this->Main_model->where_names('vendor', 'id', $vendor_base_id);
        foreach ($resultsales as $valuesales)
        {
            $vendorphone = $valuesales->phone;
            $vendorname = $valuesales->name;
            $gst = $valuesales->gst;
            $address=$valuesales->address1.' '.$valuesales->address2.' '.$valuesales->pincode.' '.$valuesales->landmark.' '.$valuesales->city.' '.$valuesales->state;
        }
        
        
        
        
        
        $array = array('order_no_id' => $order_no,
        'po_number' => $po_number,
        'invoice_no' => $invoice_no,
        'create_date' => $payout_date,
        'name' => $vendorname,
        'gst' => $gst,
        'address' => $address,
        'phone' => $vendorphone
        );
        echo json_encode($array);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function purchase_list()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             
                                                $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);



                                              $formdate=date('Y-m-d');
                                              $todate=date('Y-m-d');
                                                  $lastmonthfrom= date('Y-m-d', strtotime("-1 days"));
                                              $lastmonthto=date('Y-m-d', strtotime("-1 days"));
                                              


                                              $data['totalcount']=0;
                                              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base IN ('0','1')");
                                              $resulttotalcount=$resulttotalcount->result();
                                              foreach($resulttotalcount as $totcount)
                                              {
                                                   $data['totalcount']=$totcount->totalcount;
                                              }




                                              $data['totalcountp']=0;
                                              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.order_base IN ('2')");
                                              $resulttotalcount=$resulttotalcount->result();
                                              foreach($resulttotalcount as $totcount)
                                              {
                                                   $data['totalcountp']=$totcount->totalcount;
                                              }


                                              $data['totalcountlastmonthp']=0;
                                              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base IN ('2')");
                                              $resulttotalcountlm=$resulttotalcountlm->result();
                                              foreach($resulttotalcountlm as $totcountm)
                                              {
                                                   $data['totalcountlastmonthp']=$totcountm->totalcount;
                                              }


                                             
                                              $data['totalcountlastmonth']=0;
                                              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base IN ('0','1')");
                                              $resulttotalcountlm=$resulttotalcountlm->result();
                                              foreach($resulttotalcountlm as $totcountm)
                                              {
                                                   $data['totalcountlastmonth']=$totcountm->totalcount;
                                              }
                                              
                                           

                                                 $data['totalcountdd']=0;
                                              $resulttotalcount=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND a.order_base IN ('10')");
                                              $resulttotalcount=$resulttotalcount->result();
                                              foreach($resulttotalcount as $totcount)
                                              {
                                                   $data['totalcountdd']=$totcount->totalcount;
                                              }
                                             
                                             
                                             
                                              $data['totalcountlastmonthdd']=0;
                                              $resulttotalcountlm=$this->db->query("SELECT COUNT(a.id) as totalcount FROM purchase_orders_process as a WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."'  AND a.deleteid=0 AND a.order_base IN ('10')");
                                              $resulttotalcountlm=$resulttotalcountlm->result();
                                              foreach($resulttotalcountlm as $totcountm)
                                              {
                                                   $data['totalcountlastmonthdd']=$totcountm->totalcount;
                                              }
                                             
                                             
                                             
                                             







           $querysssss = $this->db->query("SELECT a.extra,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id JOIN purchase_orders_process as c ON a.order_id=c.id WHERE c.create_date BETWEEN '".$formdate."' AND '".$todate."' AND b.deleteid=0 AND a.selected_status=1 AND c.order_base IN ('2')");
            $resultss = $querysssss->result();
            foreach ($resultss as  $valuess) {
                             
                             if($valuess->totalqty=='')
                             {
                                 $valuess->totalqty=0;
                             }
                             
                               if($valuess->extra=='')
                             {
                                 $valuess->extra=0;
                             }
                             
                             $totalextra=$valuess->totalqty*$valuess->extra;
                             $totalextra_unit=$valuess->extra;
                             $totalamount=$valuess->totalamount;
            }
                     
            $totalamount=$totalamount;
            $totalamountgat= $totalamount*18/100;
            $data['toatalvalue'] = round($totalamount+$totalamountgat,2);
            



  $querysssss = $this->db->query("SELECT a.extra,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id JOIN purchase_orders_process as c ON a.order_id=c.id WHERE c.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND b.deleteid=0 AND a.selected_status=1 AND c.order_base IN ('2')");
            $resultss = $querysssss->result();
            foreach ($resultss as  $valuess) {
                             
                             if($valuess->totalqty=='')
                             {
                                 $valuess->totalqty=0;
                             }
                             
                               if($valuess->extra=='')
                             {
                                 $valuess->extra=0;
                             }
                             
                             $totalextra=$valuess->totalqty*$valuess->extra;
                             $totalextra_unit=$valuess->extra;
                             $totalamount=$valuess->totalamount;
            }
                     
            $totalamount=$totalamount;
            $totalamountgat= $totalamount*18/100;
            $data['toatalvaluels'] = round($totalamount+$totalamountgat,2);
            





           $querysssss = $this->db->query("SELECT a.extra,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id JOIN purchase_orders_process as c ON a.order_id=c.id WHERE c.create_date BETWEEN '".$formdate."' AND '".$todate."' AND b.deleteid=0 AND a.selected_status=1 AND c.order_base IN ('10')");
            $resultss = $querysssss->result();
            foreach ($resultss as  $valuess) {
                             
                             if($valuess->totalqty=='')
                             {
                                 $valuess->totalqty=0;
                             }
                             
                               if($valuess->extra=='')
                             {
                                 $valuess->extra=0;
                             }
                             
                             $totalextra=$valuess->totalqty*$valuess->extra;
                             $totalextra_unit=$valuess->extra;
                             $totalamount=$valuess->totalamount;
            }
                     
            $totalamount=$totalamount;
            $totalamountgat= $totalamount*18/100;
            $data['toatalvaluedd'] = round($totalamount+$totalamountgat,2);
            



  $querysssss = $this->db->query("SELECT a.extra,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id JOIN purchase_orders_process as c ON a.order_id=c.id WHERE c.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND b.deleteid=0 AND a.selected_status=1 AND c.order_base IN ('10')");
            $resultss = $querysssss->result();
            foreach ($resultss as  $valuess) {
                             
                             if($valuess->totalqty=='')
                             {
                                 $valuess->totalqty=0;
                             }
                             
                               if($valuess->extra=='')
                             {
                                 $valuess->extra=0;
                             }
                             
                             $totalextra=$valuess->totalqty*$valuess->extra;
                             $totalextra_unit=$valuess->extra;
                             $totalamount=$valuess->totalamount;
            }
                     
            $totalamount=$totalamount;
            $totalamountgat= $totalamount*18/100;
            $data['toatalvaluelsdd'] = round($totalamount+$totalamountgat,2);
            


                                             $this->load->view('purchase/purchase_list',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
     public function fetch_product_get() {
        $form_data = json_decode(file_get_contents("php://input"));
        $search = $form_data->search;
        $sql="";
        if($search!='')
        {
          $sql=' AND product_name LIKE "%'.$search.'%"';
          
        }
        
        $array = array();
        $query = $this->db->query("SELECT product_name FROM product_list  WHERE deleteid='0' $sql ORDER BY product_name  ASC");
        $result=$query->result();                       
        foreach ($result as $value) {
            $array[] = trim($value->product_name);
        }
        echo json_encode($array);
    }
     public function fetch_product_get_vendor() {
        $form_data = json_decode(file_get_contents("php://input"));
        $search = $form_data->search;
        $sql="";
        if($search!='')
        {
          $sql=' AND a.name LIKE "%'.$search.'%"';
          
        }
        
        $array = array();
        $query = $this->db->query("SELECT a.name,a.id FROM vendor as a JOIN purchase_order_vendors as b ON a.id=b.vendor_id WHERE a.deleteid='0' AND b.selected_status=1 $sql GROUP BY a.id ORDER BY a.name  ASC");
        $result=$query->result();                       
        foreach ($result as $value) {
            $array[] = trim($value->id.'-'.$value->name);
        }
        echo json_encode($array);
    }
    
    
    
    
     public function fetch_product_get_vendor_order_no() {
        $form_data = json_decode(file_get_contents("php://input"));
        $search = $_GET['search'];
        
        $sql=' WHERE a.vendor_id=0';
        if($search!='')
        {
           $search=explode('-', $search);
           $sql=' WHERE a.vendor_id="'.$search[0].'"';
          
          
        }
        
        $array = array();
        $query = $this->db->query("SELECT a.invoice_no as invoice_no FROM  purchase_order as a $sql GROUP BY a.vendor_id AND a.deleteid='0'");
        $result=$query->result();                       
        foreach ($result as $value)
        {   if($value->invoice_no!='')
            {
                
            $array[] = array('order_no'=>$value->invoice_no);
            
            }
            
        }
        echo json_encode($array);
    }
    
    
    
         public function fetch_product_get_vendor_po_no() {
        $form_data = json_decode(file_get_contents("php://input"));
        $search = $_GET['search'];
        
        $sql=' AND a.id=0';
        if($search!='')
        {
           $search=explode('-', $search);
           $sql=' AND a.id="'.$search[0].'"';
          
          
        }
        
        $array = array();
        $query = $this->db->query("SELECT d.po_number as order_no,d.id FROM vendor as a JOIN purchase_order_vendors as b ON a.id=b.vendor_id JOIN purchase_orders_process as d ON d.id=b.order_id WHERE a.deleteid='0' AND b.selected_status=1  $sql GROUP BY d.id ORDER BY d.po_number ASC");
        $result=$query->result();                       
        foreach ($result as $value) {
            
            if($value->order_no!='')
            {
                 $array[] = array('id'=>$value->id,'order_no'=>$value->order_no);
            }
           
        }
        echo json_encode($array);
    }
    
     public function fetch_po_get() {
        $form_data = json_decode(file_get_contents("php://input"));
        $search = $form_data->search;
        $sql="";
        if($search!='')
        {
          $sql=' AND order_no LIKE "%'.$search.'%"';
          
        }
        
        $array = array();
        $query = $this->db->query("SELECT order_no FROM purchase_orders_process  WHERE deleteid='0' $sql ORDER BY order_no  ASC");
        $result=$query->result();                       
        foreach ($result as $value) {
            $array[] = trim($value->order_no);
        }
        echo json_encode($array);
    }
    
        public function purchase_complaints()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             
                                                $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase Complaints List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_complaints_list',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    
    
    
    
    
    
    
    
    
    
        public function purchase_invoice()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             
                                                $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
                                               $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount', 'deleteid', '0', 'id', 'ASC');
           
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase Invoice List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_invoice_list',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    
    
    
    public function purchase_list_po()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             
                                                $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_list_po',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    public function purchase_list_inward()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             
                                                $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_list_inward',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
      public function purchase_ordercreate_product() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
             $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
            
            $data['vendor'] = $this->Main_model->where_names_order_by('vendor', 'deleteid', '0', 'id', 'ASC');
            $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount', 'deleteid', '0', 'id', 'ASC');
            
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '8', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            if ($this->session->userdata['logged_in']['access'] == '11') {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'define_saleshd_id', $this->userid, 'id', 'ASC');
            } else {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            }
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);
            $data['old_tablename'] = '0';
            $data['old_tablename_sub'] = '0';
            $data['tablename'] = 'purchase_orders_process';
            $data['tablename_sub'] = 'purchase_product_list_process';
            $data['movetablename'] = 'purchase_orders_process';
            $data['movetablename_sub'] = 'purchase_product_list_process';
            $data['order_title'] = 'Requisition NO';
            $data['order_lable'] = 'Requisition Create';
            $data['missed'] = 'Requisition';
            $data['move'] = 'Enquiry';
            $data['status_base'] = 0;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('purchase_orders_process', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '0' . $neworder_quotation_id;
            }
            
            
            
             $neworder_id_set = 1;
             $order_last_count = $this->Main_model->order_last_count_mounth_year('purchase_orders_process');
             foreach ($order_last_count as $r)
             {
                                                  
                $neworder_id_set = $r->id + 1;
             
             }




            
             $viewbase=1;
             if(isset($_GET['sales_request'])) 
             {
                           
                           $viewbase=0;

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
                    //$resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
                    if (count($resorder) > 0)
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
                        
                     
                        $order_last_count = $this->Main_model->order_last_count($data['tablename']);
                        foreach ($order_last_count as $r) {
                            $neworder_id = $r->id + 1;
                        }
                        $data['order_id'] = $neworder_id;
                        $data['count_id'] = $neworder_quotation_id;
                        $data['order_no'] = $neworder_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
                        
                    }
            
                
                
                
            }
                
        
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            $data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Requisition  Add';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/purchase_order_create', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    public function vendorupdate() {
        
        
        
       
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
     
        
        $tablename = $form_data->tablenamemain;
        $insertid = $form_data->order_id;
        $basedata['id'] = $form_data->order_id;
        $basedata['order_no'] = $form_data->order_no;
        $basedata['count_id'] = $form_data->count_id;
        $basedata['create_date'] = $date;
        $basedata['create_time'] = $time;
        $basedata['user_id'] = $this->userid;
        $basedata['entry_user_id'] = $this->userid;
        $resultmain = $this->db->query("SELECT * FROM $tablename  WHERE id='" . $form_data->order_id . "'");
        $resultcs = $resultmain->result();
        if(count($resultcs) > 0) 
        {
            
        } 
        else 
        {
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users($tablename, $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count($tablename);
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            
            $neworder_id_set = 1;
            $order_last_count = $this->Main_model->order_last_count_mounth_year('purchase_orders_process');
            foreach ($order_last_count as $r)
            {
                                                  
                $neworder_id_set = $r->id + 1;
             
            }
            
            $basedata['id'] = $neworder_id;
            if ($tablename == 'orders_process') {
                $basedata['order_no'] = strtoupper(date('M') . '/' . $neworder_id);
            } 
            else 
            {
                $basedata['order_no'] = $neworder_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
               
            }
            
             $basedata['month'] = date('M');
             $basedata['year'] = date('Y');
             $basedata['count'] = $neworder_id_set;
             $insertid = $this->Main_model->insert_commen($basedata, $tablename);
        }
        
        
        
        $vendor_ids = $form_data->vendor_ids;
        
        $this->db->query("DELETE FROM purchase_order_vendors  WHERE order_id='".$insertid."'");
        for($i=0;$i<count($vendor_ids);$i++)
        {
             $basedatavendor_id['vendor_id']=$vendor_ids[$i];
             $basedatavendor_id['order_id']=$insertid;
             if($vendor_ids[$i]!='')
             {
                 $this->Main_model->insert_commen($basedatavendor_id, 'purchase_order_vendors');
             }
             
        }
        
        
        
        
        
        
        $array = array('error' => '2','checkid' => $insertid,'checkid1' => $form_data->order_id, 'id' => base64_encode($insertid), 'base_id' => $insertid);
        echo json_encode($array);
        exit;
    }
    
    
    
    
    
    
        
    public function vendorupdateinsert() {
        
        
        
       
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
     
        
        $tablename = $form_data->tablenamemain;
        $insertid = $form_data->order_id;
        $basedata['id'] = $form_data->order_id;
        $basedata['order_no'] = $form_data->order_no;
        $basedata['count_id'] = $form_data->count_id;
        $basedata['create_date'] = $date;
        $basedata['create_time'] = $time;
        $basedata['user_id'] = $this->userid;
        $basedata['entry_user_id'] = $this->userid;
        $resultmain = $this->db->query("SELECT * FROM $tablename  WHERE id='0'");
        $resultcs = $resultmain->result();
        if(count($resultcs) > 0) 
        {
            
        } 
        else 
        {
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users($tablename, $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count($tablename);
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            
            $neworder_id_set = 1;
            $order_last_count = $this->Main_model->order_last_count_mounth_year('purchase_orders_process');
            foreach ($order_last_count as $r)
            {
                                                  
                $neworder_id_set = $r->id + 1;
             
            }
            
            $basedata['id'] = $neworder_id;
            if ($tablename == 'orders_process') {
                $basedata['order_no'] = strtoupper(date('M') . '/' . $neworder_id);
            } 
            else 
            {
                $basedata['order_no'] = $neworder_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
               
            }
            
             $basedata['month'] = date('M');
             $basedata['year'] = date('Y');
             $basedata['count'] = $neworder_id_set;
             $insertid = $this->Main_model->insert_commen($basedata, $tablename);
        }
        
        
        
        $vendor_ids = $form_data->vendor_ids;
        
        $this->db->query("DELETE FROM purchase_order_vendors  WHERE order_id='".$insertid."'");
        for($i=0;$i<count($vendor_ids);$i++)
        {
             $basedatavendor_id['vendor_id']=$vendor_ids[$i];
             $basedatavendor_id['order_id']=$insertid;
             if($vendor_ids[$i]!='')
             {
                 $this->Main_model->insert_commen($basedatavendor_id, 'purchase_order_vendors');
             }
             
        }
        
        
        
        
        
        
        $array = array('error' => '2','checkid' => $insertid,'checkid1' => $form_data->order_id, 'id' => base64_encode($insertid), 'base_id' => $insertid);
        echo json_encode($array);
        exit;
    }
    
    
    
    
    
    
    
        public function fetchDatavendorsdata()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     
                     $i=1;
                     
                     $array=array();
                    
                     $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                     foreach ($result as  $value) {
                         
                          $name="";
                           $email="";
                            $phone="";
                             $gst="";
                              $address="";
                               
                          $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                          foreach ($resultp as  $valuep) {
                             
                             $name=$valuep->name;
                             $email=$valuep->email;
                             $phone=$valuep->phone;
                             $gst=$valuep->gst;
                             $rateings=$valuep->feedback1;
                             
                             $address=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                          }
                          
                          
                          if($rateings=='')
                          {
                              $rateings='10%';
                          }
                          
                          if($rateings=='1')
                          {
                              $rateings='20%';
                          }
                          
                          if($rateings=='2')
                          {
                              $rateings='40%';
                          }
                          
                           if($rateings=='3')
                          {
                              $rateings='60%';
                          }
                          
                          if($rateings=='4')
                          {
                              $rateings='90%';
                          }
                          
                          if($rateings=='5')
                          {
                              $rateings='98%';
                          }


                        $array[] = array(
                            
                            'no' => $i, 
      
                            'id' => $value->id,
                            'order_id' => $value->order_id, 
                            'vendor_id' => $value->vendor_id,
                            'link' => $value->link,
                            'name' => $name, 
                            'cap'=>$name[0],
                            'vendor_name' => $vendor_name, 
                            'email' => $email, 
                            'phone' => $phone,
                            'gst'=>$gst,
                            'gst'=>$gst,
                            'rateings'=>$rateings,
                            'venodrcount'=>count($result),
                            

                        );
                        
                     
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetchcomapredata()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                     $result= $this->Main_model->where_names('purchase_order_quotation','order_id',$order_id);
                     foreach ($result as  $value) {
                         
                            $name="";
                            $email="";
                            $phone="";
                            
                            $uom="";
                            $resultpss= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_product_list_id);
                             foreach ($resultpss as  $valuepss) {
                                         
                                         $qty=$valuepss->qty;
                                         $product_name=$valuepss->product_name;
                                         $specifications=$valuepss->specifications;
                                         $uom=$valuepss->uom;
                                         
                                         
                                       
                                         
                                        
                                        
                             
                              }
                              
                                                      
                                                      
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  } 
                               
                               
                               
                             $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                             foreach ($resultp as  $valuep) {
                             
                             $name=$valuep->name;
                             $email=$valuep->email;
                             $phone=$valuep->phone;
                             
                              }
                               
                               $attachement='';
                               if($value->attachement!='')
                               {
                                   $attachement=base_url().$value->attachement;
                               }
    
                                $array[] = array(
                                
                                'no' => $i, 
          
                                'id' => $value->id,
                                'order_id' => $value->order_id, 
                                'vendor_id' => $value->vendor_id,
                                'remarks' => $value->remarks,
                                'timeline' => $value->timeline,
                                'extra_included' => $value->extra_included,
                                'payment_terms' => $value->payment_terms,
                                'due_date' => $value->due_date,
                                'specifications' => $specifications,
                                'extra' => $value->extra,
                                'price' => $value->price,
                                'total' => round($qty*$value->price,2),
                                'selected_status' => $value->selected_status,
                                'attachement' => $attachement,
                                'product_name' => $product_name,
                                'uom' => $uom,
                                'qty' => round($qty,2),
                                'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                'name' => $name, 
                                'vendor_name' => $name, 
                                'email' => $email, 
                                'phone' => $phone,
                                'gst'=>$gst
                                
    
                            );
                        
                     
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    public function fetchcomapredata_selected()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result  =$this->Main_model->where_names_two_order_by('purchase_order_quotation', 'order_id', $order_id, 'selected_status', '1', 'id', 'DESC');
                                           
                 
                     foreach ($result as  $value) {
                         
                            $name="";
                            $email="";
                            $phone="";
                            
                            $uom="";
                            $resultpss= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_product_list_id);
                             foreach ($resultpss as  $valuepss) {
                                         
                                         $qty=$valuepss->qty;
                                         $product_name=$valuepss->product_name;
                                         $specifications=$valuepss->specifications;
                                         $uom=$valuepss->uom;
                                         
                                         
                                       
                                         
                                        
                                        
                             
                              }
                              
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  } 
                               
                               
                               
                             $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                             foreach ($resultp as  $valuep) {
                             
                             $name=$valuep->name;
                             $email=$valuep->email;
                             $phone=$valuep->phone;
                             
                              }
                              
                              
                               $attachement='';
                               if($value->attachement!='')
                               {
                                   $attachement=base_url().$value->attachement;
                               }
                              
    
                                $array[] = array(
                                
                                'no' => $i, 
          
                                'id' => $value->id,
                                'order_id' => $value->order_id, 
                                'vendor_id' => $value->vendor_id,
                                'remarks' => $value->remarks,
                                'timeline' => $value->timeline,
                                'extra_included' => $value->extra_included,
                                'payment_terms' => $value->payment_terms,
                                'due_date' => $value->due_date,
                                'specifications' => $specifications,
                                'extra' => $value->extra,
                                'price' => $value->price,
                                'total' => $value->price+$value->extra,
                                'selected_status' => $value->selected_status,
                                'attachement' => $attachement,
                                'product_name' => $product_name,
                                'uom' => $uom,
                                'qty' => $qty,
                                'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                'name' => $name, 
                                'vendor_name' => $name, 
                                'email' => $email, 
                                'phone' => $phone,
                                'gst'=>$gst
                                
    
                            );
                        
                     
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function fetchcomapredata_unic_vendor()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                     $queryss = $this->db->query("SELECT a.*,SUM(b.qty) as totalqty,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id WHERE a.order_id='".$order_id."' AND b.deleteid=0 GROUP BY a.vendor_id ORDER BY a.id ASC");
                     $result = $queryss->result();
                     foreach ($result as  $value) {
                         
                           
                               
                                
                                 $totalextra=$value->totalqty*$value->extra;
                                
                                 //$totalextra=$value->extra;
                                 
                                 
                                 
                                 
                                 
                                 
                                 $totalextragst= $totalextra*18/100;
                                 $extratotal=round($totalextra+$totalextragst,2);
                                
                                
                                 $value->totalamount=$value->totalamount;
                                 $totalamountgst= $value->totalamount*18/100;
                                 
                                 
                                
                                $attachement='';
                               if($value->attachement!='')
                               {
                                   $attachement=base_url().$value->attachement;
                               }
                               
                               
                                $totalgst=round($totalamountgst+$value->totalamount,2);
                                $totaltds=0;
                                if($totalgst>5000000)
                                {
                                     $totaltds= $totalgst*5/100;
                                }
                                
                                
                                
                                
                                
                                $totalamount=$totalgst-$totaltds;
                                
                                
                                
                                
                                
                                
                                 $tcs_status=0;
                                 $customers_data = $this->Main_model->where_names('vendor', 'id', $value->vendor_id);
                                 foreach ($customers_data as $csvalv) {
                                    $tcs_status = $csvalv->tcs_status;
                                   
                                 }
                                 
                                 if($tcs_status==1)
                                 {
                    
                                                $tcsamount=round($totalamount*0.1/100);
                    
                                 }
                                 else
                                 {
                    
                    
                                                 $tcsamount=0;
                    
                    
                                 }
                                
                                
                                
                                $totalamount=$totalamount+$tcsamount;
                                
                                
                                
                                
                                
                                $array[] = array(
                                
                                'no' => $i, 
          
                                'id' => $value->id,
                                'order_id' => $value->order_id, 
                                'vendor_id' => $value->vendor_id,
                                'remarks' => $value->remarks,
                                'timeline' => $value->timeline,
                                'extra_included' => $value->extra_included,
                                'payment_terms' => $value->payment_terms,
                                'due_date' => date('d-m-Y',strtotime($value->due_date)),
                                'extra_unit' => $value->extra,
                                'extra' => $totalextra,
                                'extra_gst' => round($totalextragst),
                                'extra_total' => $extratotal,
                                'price' => $value->price,
                                'totalamount' => round($value->totalamount),
                                'gstamount' => round($totalamountgst),
                                'totaltds' => round($totaltds),
                                'tcsamount' => round($tcsamount),
                                'totalgst' => round($totalamount),
                                'selected_status' => $value->selected_status,
                                'attachement' => $attachement,
                                'create_date' => date('d-m-Y',strtotime($value->create_date))
                                
                                
    
                            );
                        
                     
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function fetchcomapredata_vendor()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                 
                     
                     $queryss = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE  order_id='" . $order_id . "'  GROUP BY vendor_id ORDER BY id ASC");
                     $result = $queryss->result();
                     
                     
                     
                     foreach ($result as  $value) {
                         
                         
                             $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                             foreach ($resultp as  $valuep)
                             {
                             
                             $name=$valuep->name;
                             $email=$valuep->email;
                             $phone=$valuep->phone;
                             
                             }
    
                         
                           
                                $array[] = array(
                                
                                'no' => $i, 
                                'id' => $value->id,
                                'order_id' => $value->order_id, 
                                'vendor_id' => $value->vendor_id,
                                'vendor_name' => $name
                                
    
                             );
                        
                     
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function fetchDatavendorsdataseletet()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                     $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                     foreach ($result as  $value) {
                         
                          $name="";
                           $email="";
                            $phone="";
                             $gst="";
                              $address="";
                              
                          if($vendorid==$value->vendor_id)    
                          {
                              
                         
                               
                            $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                            foreach ($resultp as  $valuep) {
                             
                             $name=$valuep->name;
                             $email=$valuep->email;
                             $phone=$valuep->phone;
                             $gst=$valuep->gst;
                             $address=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                          }
                          

                            $array[] = array(
                            
                            'no' => $i, 
      
                            'id' => $value->id,
                            'order_id' => $value->order_id, 
                            'vendor_id' => $value->vendor_id,
                            'reason_for_choosing_suppliers' => $value->reason_for_choosing_suppliers,
                            'name' => $name, 
                            'cap'=>$name[0],
                            'vendor_name' => $name, 
                            'email' => $email, 
                            'phone' => $phone,
                            'gst'=>$gst,
                            'address'=>$address,
                            'venodrcount'=>count($result),
                            

                        );
                        
                     
                          }

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    public function clinet_inward_list()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Clinet Inward List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/clinet_inward_list',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    
    
    public function vendor_page()
    {
        
                                      


                                        
                                            
                                            
                                             $data['order_id']=base64_decode($_GET['order_id']);
                                             $data['vendor_id']=base64_decode($_GET['vendor_id']);
                                             
                                             
                                             $data['vendor'] = $this->Main_model->where_names('vendor','id',$data['vendor_id']);
                                             
                                             
                                             $purchase_orders_process = $this->Main_model->where_names('purchase_orders_process','id',$data['order_id']);
                                             
                                             $staatusby=0;
                                             foreach($purchase_orders_process as $vl)
                                             {
                                                 if($vl->order_base>1)
                                                 {
                                                     $staatusby=1;
                                                 }
                                             }
                                             
                                             
                                             $data['staatusby']=$staatusby;
                                             $data['purchase_orders_process'] =$this->Main_model->where_names_two_order_by('purchase_product_list_process', 'order_id', $data['order_id'], 'deleteid', '0', 'id', 'DESC');
                                           
                                             
                                             $data['purchase_product_list_process'] =$this->Main_model->where_names_two_order_by('purchase_product_list_process', 'order_id', $data['order_id'], 'deleteid', '0', 'id', 'DESC');
                                           
                                            
                                            
                                             $data['purchase_order_quotation'] =$this->Main_model->where_names_two_order_by('purchase_order_quotation', 'order_id', $data['order_id'], 'vendor_id',  $data['vendor_id'], 'id', 'ASC');
                                                
                                                 $data['timeline']="";
                                                 $data['attachement']="";
                                                 $data['remarks']="";
                                                 $data['extra_included']="Included";
                                                 $data['extra']=0;
                                                 $data['payment_terms']="Advance";
                                           
                                                 foreach($data['purchase_order_quotation'] as $ss)
                                                 {
                                                     $data['timeline']=$ss->timeline;
                                                     $data['attachement']=$ss->attachement;
                                                     $data['remarks']=$ss->remarks;
                                                     $data['extra_included']=$ss->extra_included;
                                                     $data['extra']=$ss->extra;
                                                     $data['payment_terms']=$ss->payment_terms;
                                                     
                                                 }
                                           
                                           
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Clinet Inward List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/vendor_page',$data);
                                        
                                    

    }
    
    
        public function purchase_inward_list()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                        
                                        
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
                                             
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase Inward List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_inward',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    
    
    
        public function purchase_return_list()
    {
        
                                      


                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                            
                                             
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
                                        
                                        
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             
                                             $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
                                             
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Purchase Return';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('purchase/purchase_return_list',$data);
                                        
                                        
                                        }
                                        else
                                        {
                                             $this->load->view('admin/index');
                                        }
         

    }
    
    
    public function insertandupdate()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                 $form_data = json_decode(file_get_contents("php://input"));
           
                 $label1=$form_data->label1;
                 $lab_option1=$form_data->lab_option1;
               


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->product_id!='' && $form_data->price!='' && $form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                     $tablename=$form_data->tablename;
                               
                                     $data['product_id']=$form_data->product_id;
                                     $data['price']=$form_data->price;
                                     $data['vendor_id']=$form_data->vendor_id;
                                     $data['qty']=$form_data->qty;
                                     $data['total_amount']=$form_data->total_amount;
                                     $data['coil_no']=$form_data->coil_no;
                                     $data['po_number']=$form_data->po_number;
                                     $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));
                                    
                                     

                                     $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                     $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase successfully Added..');
                                     echo json_encode($array);




                                 

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                     if($form_data->product_id!='' && $form_data->price!='' && $form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                          $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                      
                                         $data['product_id']=$form_data->product_id;
                                         $data['price']=$form_data->price;
                                         $data['vendor_id']=$form_data->vendor_id;
                                         $data['qty']=$form_data->qty;
                                          $data['total_amount']=$form_data->total_amount;
                                         $data['coil_no']=$form_data->coil_no;
                                         $data['po_number']=$form_data->po_number;
                                        
                                        $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));

                                        $this->Main_model->update_commen($data,$tablename);
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                      
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Purchase successfully Updated..');
                                       echo json_encode($array);
  
                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                  if($form_data->action=='updatefeedback')
                 {
                     $tablename=$form_data->tablename;
                     $data['get_id']=$form_data->id;
                     $data[$form_data->name]=$form_data->value;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 
                if($form_data->action == "InputUpdate") {
                    
                 
                        $tablename = $form_data->tablename_sub;
                        $tablenamemain = $form_data->tablenamemain;
                    
                     
                    if ($form_data->values != '' || $form_data->values == '0') {
                        $categories = "";
                        
                        if ($form_data->inputname == 'product_name') {
                            $data[$form_data->inputname] = $form_data->values;
                            $result = $this->Main_model->where_names('product_list', 'product_name', $form_data->values);
                            foreach ($result as $product) {
                                $data['product_name'] = $product->product_name;
                                $data['product_id'] = $product->id;
                                $data['categories_id'] = $product->categories_id;
                                $data['categories_name'] = $product->categories;
                                $data['rate'] = $product->price;
                                $data['fact'] = $product->formula;
                                $uom = $product->uom;
                                $formula = $product->formula;
                                $priceset = $product->price;
                                $kg_priceset = $product->kg_price;
                                $categories = $product->categories;
                            }
                        }
                        else
                        {
                             $data[$form_data->inputname] = $form_data->values;
                        }
                        
                        
                        $data['get_id']=$form_data->id;
                        
                        
                        
                       
                        
                        
                        $this->Main_model->update_commen($data, $tablename);
                        $array = array('error' => '2', 'massage' => 'successfully Updated..');
                     
                        echo json_encode($array);
                    } 
                }
                
                
                
                
                
                
                
                  if($form_data->action == "inwardupdate_data") {
                    
                 
                        $tablename = $form_data->tablename_sub;
                        $tablenamemain = $form_data->tablenamemain;
                    
                     
                    if ($form_data->values != '' || $form_data->values == '0') 
                    {
                        $categories = "";
                        
                        
                        if($form_data->inputname=='modify_qty')
                        {
                              $qty = $form_data->values;
                              //$this->db->query("UPDATE $tablename SET modify_qty=modify_qty+'".$qty."' WHERE id='".$form_data->id."'");
                       
                        }
                        else
                        {
                             $data[$form_data->inputname] = $form_data->values;
                             $data['get_id']=$form_data->id;
                             $this->Main_model->update_commen($data, $tablename);
                        }
                        
                          
                        $array = array('error' => '2', 'massage' => 'successfully Updated..');
                     
                        echo json_encode($array);
                    } 
                }
                
                


                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     
                     
                     if($tablename=='purchase_order_remarks')
                     {
                         
                     
                        $this->db->query("UPDATE purchase_order SET deleteid='1' WHERE remarks_id='".$id."'");
                     
                        
                        
                        
                        $resultmain = $this->db->query("SELECT * FROM purchase_order  WHERE remarks_id='" . $id . "'  ORDER BY id ASC");
                        $resultcs = $resultmain->result();
                        foreach ($resultcs as $valuecs) {
                            $stock_id = $valuecs->stock_id;
                            $qty = $valuecs->inward_qty;
                        }
                        
                        $this->db->query("UPDATE purchase_product_list_process SET modify_qty=modify_qty-'".$qty."' WHERE id='".$stock_id."'");
                   

                      
                     }
                     
                     
                     if($tablename=='purchase_order')
                     {
                         
                     
                        $resultmain = $this->db->query("SELECT * FROM purchase_order  WHERE id='" . $id . "' ORDER BY id ASC");
                        $resultcs = $resultmain->result();
                        foreach ($resultcs as $valuecs) {
                            $stock_id = $valuecs->stock_id;
                            $qty = $valuecs->inward_qty;
                        }
                        
                        $this->db->query("UPDATE purchase_product_list_process SET modify_qty=modify_qty-'".$qty."' WHERE id='".$stock_id."'");
                   
                      
                     }
                     
                    
                     
                     if($tablename=='purchase_invoice')
                     {
                             $result= $this->Main_model->where_names($tablename,'id',$id);
                             foreach ($result as  $value) {
                                 $deleteval= $value->deletemod;
                                if($deleteval!='')
                                {
                                   
                                   if($deleteval!='0')
                                   {

                                     

                    $this->db->query("UPDATE all_ledgers SET deleteid='1',deleted_by='".$this->userid."',notes='Purchase Invoice Deleted' WHERE deletemod='".$deleteval."' AND party_type=3");
                    $invoice_id=str_replace('PC','',$deleteval);
                    $this->db->query("UPDATE purchase_order SET payment_status='0' WHERE invoice_id='".$invoice_id."'");


                                    

                                   }
                                   
                                }
                                
                             }
                     }

                 }
                 
                 
                  if($form_data->action=='updatevalue')
                 {
                      $tablename=$form_data->tablename;
                      $data[$form_data->name] = $form_data->value;
                      $data['get_id']=$form_data->id;
                      $this->Main_model->update_commen($data, $tablename);
                      
                      
                      if($tablename=='purchase_order')
                      {
                          
                          if($form_data->name=='inward_qty')
                          {         
                              
                            
                                 $resultmains = $this->db->query("SELECT * FROM purchase_order  WHERE id='" . $form_data->id . "' AND deleteid=0  ORDER BY id ASC");
                                 $resultcss = $resultmains->result();
                                 foreach ($resultcss as $valuecss) {
                                    $stock_id = $valuecss->stock_id;
                                    
                                 }
                              
                                 $qty=0;
                                 $resultmain = $this->db->query("SELECT * FROM purchase_order  WHERE stock_id='" .$stock_id . "' AND deleteid=0 ORDER BY id ASC");
                                 $resultcs = $resultmain->result();
                                 foreach ($resultcs as $valuecs) {
                                    $stock_id = $valuecs->stock_id;
                                    $qty+= $valuecs->inward_qty;
                                 }
                                
                                $this->db->query("UPDATE purchase_product_list_process SET modify_qty='".$qty."' WHERE id='".$stock_id."'");
                           
                                      
                          }
                          
                      }
                     
                       
                 }
                      if($form_data->action=='Deletepurchase_invoice')
                 {
                     
                     
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     $this->db->query("UPDATE $tablename SET user_id='".$this->userid."' WHERE id='".$id."'");
                     
                     $result= $this->Main_model->where_names($tablename,'id',$id);
                     foreach ($result as  $value) {
                     $deleteval= $value->deletemod;
                     if($deleteval!='')
                     {
                                   if($deleteval!='0')
                                   {
                                       $this->db->query("UPDATE purchase_invoice SET deleteid='1' WHERE deletemod='".$deleteval."'");
                                       $this->db->query("UPDATE bankaccount_manage SET deleteid='1',user_id='".$this->userid."' WHERE deletemod='".$deleteval."'");
                                   }
                                }
                                
                    }
                    
                    
                    
                       $deletelog['userid']=$this->userid; 
                       $deletelog['all_legers']=$id;
                       $deletelog['bank_legers']='Vendor '.$deleteval;
                       $this->Main_model->insert_commen($deletelog,'deleted_log');
                    
                    
                    
                    
                     
                     

                 }
                
                
                


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function purchase_return_data()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                
           
                                         $label1=$form_data->label1;
                                         $lab_option1=$form_data->lab_option1;
               
                                         $tablename=$form_data->tablename;
                                         $product_id=$form_data->product_id;
                                         $data['return_qty']=$form_data->qty;
                                         $data['product_id']=$product_id;
                                         $data['stock_id']=$form_data->id;
                                         $data['vendor_id']=$form_data->vendor_id;
                                         $data['user_id']=$this->userid;
                                         $data['po_number']=$form_data->po_number;
                                         $data['total_amount']=$form_data->total_amount;
                                         $data['return_date']= $form_data->return_date;
                                         $data['remarks']= $form_data->remarks;
                                         
                                         $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         
                                         
                                         
                                         

                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                $data_driver['order_id']='PR-'.$insert_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='Cash';
                                                                $data_driver['notes']='Purchase Return';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->po_number;
                                                                $data_driver['amount']=$form_data->total_amount;
                                                                $data_driver['reference_no']=$form_data->po_number;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=$form_data->total_amount;
                                                                $data_driver['credits']=0;
                                                                $data_driver['balance']=0;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $data_driver['account_head_id']=104;
                                                                $data_driver['account_heads_id_2']=120;
                                                                $data_driver['bank_id'] = 25;
                                                                $data_driver['order_trancation_status'] = 2;
                                                                $data_driver['deletemod']='PR-'.$insert_id;
                                                                
                                                                $this->Main_model->insert_commen($data_driver,'all_ledgers');
                                                                 
                                                                 
                                         $datass['get_id']=$form_data->id;   
                                         $datass['return_status']=1;
                                         $this->Main_model->update_commen($datass,'purchase_order');
                                          


                                         
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Return Success');
                                         echo json_encode($array);
  
                    


    }
    
    
    
    
    
    
    
    
    
    
    
        public function purchase_invoice_data()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                      
                                         
                                         $result= $this->Main_model->where_names('purchase_orders_process','id',$form_data->order_id);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                     $po_number=$value->po_number;
                                                    
                                         }
                                         
                                         $vendor_id=0;
                                         $resultvorder= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                                         foreach ($resultvorder as  $value1) {
                                                     
                                                     if($value1->selected_status==1)
                                                     {
                                                       $vendor_id=$value1->vendor_id;
                                                      
                                                     }
                                                     
                                         }
                                         
                                        
                                         
                                         $vendor_name="";
                                         $resultvordervv= $this->Main_model->where_names('vendor','id',$vendor_id);
                                         foreach ($resultvordervv as  $value2) {
                                                     
                                                       $vendor_name=$value2->name;
                                                      
                                         }
                                         
                                         
                                         
                     $extra=0;  
                     $queryss = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE vendor_id='$vendor_id' AND extra!='' AND selected_status=1 AND order_id='".$order_id."'");
                     $result = $queryss->result();
                     foreach ($result as  $value) {
                         $extra=$value->extra;
                     }
                                         
                                         
                                         $data['vendor_id']=$vendor_name;
                                         $data['vendor_base_id']=$vendor_id;
               
                                         $tablename=$form_data->tablename;
                                         
                                         $data['product_id']="";
                                       
                                         $data['order_id']=$order_id;
                                         $data['user_id']=$this->userid;
                                         $data['invoice_no']=$form_data->inovice_no;
                                         $data['gst_amount']=$form_data->gst_amount;
                                         $data['po_number']=$po_number;
                                         $data['update_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['invoice_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['remarks']= $form_data->remarks;
                                         $data['loading_charges']= $form_data->loading_charges;
                                          $data['roundoff']= $form_data->roundoff;
                                         $data['convert_status']= $form_data->convert;
                                         
                                         $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         
                                         
                                         $purchase_order_product_id=explode('|', $form_data->purchase_order_product_id);
                                         
                                         $inward_ids=explode('|', $form_data->inward_ids);
                                         $stock_ids=explode('|', $form_data->stock_ids);
                                         $purchase_price_data=explode('|', $form_data->purchase_price_data);
                                         $purchase_qty_data=explode('|', $form_data->purchase_qty_data);
                                         
                                        
                                         
                                         $netweight=0;
                                         $netamount=0;
                                         for ($i=0; $i <count($purchase_order_product_id) ; $i++) { 
                                        
                                        
                                           
                                            
                                            $resultgetprodut= $this->Main_model->where_names('purchase_product_list_process','id',$stock_ids[$i]);
                                            foreach ($resultgetprodut as  $value) {
                                                     //$qty=$value->qty;
                                                      $order_id=$value->order_id;
                                                      $product_name=$value->product_name;
                                                      $product_id=$value->product_id;
                                            }
                                            
                                            
                                            
                                             $q_id=0;                       
                                             $queryssset = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE vendor_id='$vendor_id' AND selected_status=1 AND purchase_product_list_id='".$purchase_order_product_id[$i]."' AND order_id='".$order_id."' ");
                                             $resultssss = $queryssset->result();
                                             foreach ($resultssss as  $valuess) {
                                                 $q_id=$value->id;
                                             }
                                            
                                            
                                            
                                            $datadd['qty']=$purchase_qty_data[$i];
                                            $datadd['c_id']=$insert_id;
                                            $datadd['product_name']=$product_name;
                                            $datadd['product_id']=$product_id;
                                            $datadd['price']=$purchase_price_data[$i];
                                            $datadd['purchase_order_product_id']=$stock_ids[$i];
                                            $datadd['batch_no']=0;
                                            $datadd['extra']=$extra;
                                            $datadd['purchase_order_quotation_id']=$q_id;
                                            
                                            if($datadd['qty']>0)
                                            {
                                                
                                                $netweight+=$purchase_qty_data[$i];
                                                $netamount+=$purchase_qty_data[$i]*$purchase_price_data[$i];
                                                $insert_id_data=$this->Main_model->insert_commen($datadd,'purchase_invoice_products');
                                                
                                                
                                                $this->db->query("UPDATE purchase_order SET payment_status='1',invoice_no='".$form_data->inovice_no."',invoice_id='".$insert_id."'  WHERE id='".$purchase_order_product_id[$i]."'");
                                        
                                                
                                                
                                            }
                                            
                                        
                                            
                                         }
                                         
                                         
                                         $reason='Invoice Generated';
                                                  
                                        
                                        
                                        
                                        if($form_data->loading_charges>0)
                                        {
                                            $loading_charges=$form_data->loading_charges;
                                        }
                                        else
                                        {
                                            $loading_charges=0;
                                        }

                                          $netamount=$form_data->invoice_amount; 
                                          
                                         
                                         if($form_data->roundoff>0)
                                         {

                                                     if($form_data->convert==1)
                                                     {
                                                        $netamount=$netamount+$form_data->roundoff;
                                                     }
                                                     else
                                                     {
                                                         $netamount=$netamount-$form_data->roundoff;
                                                     }      

                                         }

                                         $this->db->query("UPDATE purchase_orders_process SET reason='".$reason."',order_base='10',invoice_id='".$insert_id."',invoice_no='".$form_data->inovice_no."' WHERE id='".$order_id."'");
                                         $this->db->query("UPDATE $tablename SET qty='".$netweight."',invoice_amount='".$netamount."',deletemod='PC".$insert_id."' WHERE id='".$insert_id."'");
                                                                 
                                                                 
                                                                 
                                                                 
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
                                                                  
                                                                  
                                                                  
                                                                  
                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                
                                                                
                                                              
                                                                
                                                                $data_driver['order_id']=$insert_id;
                                                                $data_driver['customer_id']=$vendor_id;
                                                                $data_driver['payment_mode']='0';
                                                                $data_driver['notes']='Purchase Invoice Create';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->inovice_no;
                                                                $data_driver['reference_no']=$form_data->inovice_no;
                                                                $data_driver['amount']=$netamount+$loading_charges;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=0;
                                                                $data_driver['deletemod']='PC'.$insert_id;
                                                                $data_driver['credits']=$netamount+$loading_charges;
                                                                $data_driver['balance']=0;
                                                                $data_driver['bank_id'] = 25;
                                                                
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$form_data->create_date;
                                                                $data_driver['payment_time']=$time;
                                                                
                                                                
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $data_driver['order_trancation_status'] = 3;


                                                                 $setchek = $this->Main_model->where_names('all_ledgers','deletemod',$data_driver['deletemod']);
                                                                if(count($setchek)==0)
                                                                {




                                                                $this->Main_model->insert_commen($data_driver,'all_ledgers');

                                                                }
                                                                
                                                                
                                        
                                        
                                        
                                        
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Invoice Created..');
                                         echo json_encode($array);
  
                    


    }
    
    
    
        public function purchase_invoice_data_extra()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                                        
                                     
                                         
                                         $result= $this->Main_model->where_names('purchase_orders_process','po_number',$form_data->po_number);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                    
                                         }
                                         
                                         $vendor_id=0;
                                         $resultvorder= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                                         foreach ($resultvorder as  $value1) {
                                                     
                                                     if($value1->selected_status==1)
                                                     {
                                                       $vendor_id=$value1->vendor_id;
                                                      
                                                     }
                                                     
                                         }
                                         
                                        
                                         
                                         $vendor_name="";
                                         $resultvordervv= $this->Main_model->where_names('vendor','id',$vendor_id);
                                         foreach ($resultvordervv as  $value2) {
                                                     
                                                       $vendor_name=$value2->name;
                                                      
                                         }
                                         
                                         
                                         
                                         $extra=0;  
                                         $queryss = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE vendor_id='$vendor_id' AND extra!='' AND selected_status=1 AND order_id='".$order_id."'");
                                         $result = $queryss->result();
                                         foreach ($result as  $value) {
                                             $extra=$value->extra;
                                         }
                                         
                                         
                                         $data['vendor_id']=$vendor_name;
                                         $data['vendor_base_id']=$vendor_id;
                                         $tablename=$form_data->tablename;
                                         $data['product_id']="";
                                         $data['order_id']=$order_id;
                                         $data['extra_invoice_status']=1;
                                         $data['user_id']=$this->userid;
                                         $data['invoice_amount']=$form_data->invoice_amount;
                                         $data['gst_amount']=$form_data->gst_amount;
                                         $data['invoice_no']=$form_data->inovice_no;
                                         $data['po_number']=$form_data->po_number;
                                         $data['update_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['invoice_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['remarks']= $form_data->remarks.' '.$form_data->vehicle_no;
                                         $data['vehicle_no']= $form_data->vehicle_no;
                                         $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         $reason='Invoice Generated #'.$form_data->inovice_no;
                                         $netamount=$form_data->invoice_amount;       
                                                                 
                                                                                             
                                                                  $this->db->query("UPDATE purchase_orders_process SET invoice_extra_unit_id='".$insert_id."' WHERE id='".$order_id."'");
                                                                  $this->db->query("UPDATE $tablename SET deletemod='PC".$insert_id."' WHERE id='".$insert_id."'");
                                                                                      
                                                                 
                                                                 
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
                                                                  
                                                                  
                                                                  
                                                                  
                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                
                                                                
                                                              
                                                                
                                                                $data_driver['order_id']=$insert_id;
                                                                $data_driver['customer_id']=$vendor_id;
                                                                $data_driver['payment_mode']='0';
                                                                $data_driver['notes']='Purchase Invoice Create';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->inovice_no;
                                                                $data_driver['reference_no']=$form_data->inovice_no;
                                                                $data_driver['amount']=$netamount;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=0;
                                                                $data_driver['deletemod']='PC'.$insert_id;
                                                                $data_driver['credits']=$netamount;
                                                                $data_driver['balance']=0;
                                                                $data_driver['bank_id'] = 25;
                                                                
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$form_data->create_date;
                                                                $data_driver['payment_time']=$time;
                                                                
                                                                
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $data_driver['order_trancation_status'] = 3;

                                                            $setchek = $this->Main_model->where_names('all_ledgers','deletemod',$data_driver['deletemod']);
                                                            if(count($setchek)==0)
                                                            {


                                                                $this->Main_model->insert_commen($data_driver,'all_ledgers');

                                                            }
                                                                
                                                                
                                        
                                        
                                        
                                        
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Invoice Extra Unit Created..');
                                         echo json_encode($array);
  
                    


    }
    
    
    
    
            public function purchase_invoice_payout()
    {
        
        
                                         date_default_timezone_set("Asia/Kolkata"); 
                                         $date= date('Y-m-d');
                                         $time= date('h:i A');
                                         $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                                         
                                         $result= $this->Main_model->where_names('purchase_invoice','id',$form_data->id);
                                         foreach ($result as  $value) {
                                                     $po_number=$value->po_number;
                                                     $invoice_no=$value->invoice_no;
                                                     $vendor_id=$value->vendor_base_id;
                                         }
                                         
                                         $data['order_base']= 0;
                                         if($form_data->payment_type=='Full')
                                         {
                                              $data['order_base']= 1;
                                         }
                                         
                                         if($form_data->payment_type=='Partial')
                                         {
                                              $data['order_base']= 4;
                                         }
                                        
                                         if($form_data->payment_type=='Schedule Payment')
                                         {
                                              $data['order_base']= 2;
                                         }
                                         
                                         
                                         $data['get_id'] = $form_data->id;
                                         $data['remarks_payout']= $form_data->notes;
                                         $payout_amount= $form_data->invoice_amount;
                                         $data['payment_type']= $form_data->payment_type;
                                         $data['schedule_date']= date('Y-m-d',strtotime($form_data->schedule_date));
                                         $data['payment_mode_payoff']= $form_data->payment_mode_payoff;
                                         $data['bankaccount']= $form_data->bankaccount;
                                         $data['delivery_status']= $form_data->delivery_status;
                                         $data['payout_date']= date('Y-m-d',strtotime($form_data->payout_date));
                                         $this->Main_model->update_commen($data, 'purchase_invoice');
                                         $this->db->query("UPDATE purchase_invoice_products SET payment_status='1' WHERE c_id='".$form_data->id."'");
                                        
                                             if($form_data->payment_type!='Schedule Payment')
                                             {
                                             $this->db->query("UPDATE purchase_invoice SET payout_amount=payout_amount+'".$form_data->invoice_amount."' WHERE id='".$form_data->id."'");
                                             }
                                         
                                         
                                            if($form_data->delivery_status==3)
                                            {
                                                $delivery_status="Partial Dispatch";
                                            }
                                            
                                            if($form_data->delivery_status==5)
                                            {
                                                $delivery_status="Full Dispatched";
                                            }
                                            if($form_data->delivery_status==6)
                                            {
                                                $delivery_status="Delivered";
                                            }
                                       
                                         
                                         
                                         if($form_data->payment_type=='Schedule Payment')
                                         {
                                             
                                            $this->db->query("UPDATE purchase_orders_process SET order_base='9',reason='".$delivery_status."' WHERE po_number='".$po_number."'");
                                         
                                         }
                                         else
                                         {
                                             $this->db->query("UPDATE purchase_orders_process SET order_base='".$form_data->delivery_status."',reason='".$delivery_status."' WHERE po_number='".$po_number."'");
                                         
                                         }
                                         
                                         
                                          if($form_data->payment_type!='Schedule Payment')
                                         {
                                             
                                                                  
                                             
                                         
                                         
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
            
            
                                                                 $tablename_driver_ledger='all_ledgers';
                                         
                                         
                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                  $bankaccount=$form_data->bankaccount;            
                                                                  $account_no="";
                                                                  $bank_name="";
                                                                  $bid="";
                                                                  if($bankaccount!='0')
                                                                  {
                                                                      
                                                                      
                                                                      
                                                                                             $resbankaccount = $this->Main_model->where_names('bankaccount','id',$bankaccount);
                                                                                             foreach($resbankaccount as $valb)
                                                                                             {
                                                                                                  $bid=$valb->id;
                                                                                                  $bank_name=$valb->bank_name;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_heads_id_by_bank=$valb->account_heads_id;
                                                                                                  $account_heads_id_by_bank_2=$valb->account_heads_id_2;
                                                                                             }
                                                                         
                                                                                             $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bankaccount,'deleteid','0','id','ASC');
                                                                                           
                                                                                             $bankbalancetotal=0;
                                                                                             $bankdebitsamount=0;
                                                                                             $bankcreditsamount=0;
                                                                                             foreach($res as $val)
                                                                                             {
                                                                                                 $bankpayid=$val->id;
                                                                                                 $bankdebitsamount+=$val->debit;
                                                                                                 $bankcreditsamount+=$val->credit;
                                                                                                 $bankbalancetotal=$val->balance;
                                                                                             }
                                                                                             
                                                                                     
                                                                                            $bankbalancetotal=$bankcreditsamount-$bankdebitsamount;
                                                                         
                                                                                            $data_bank['bank_account_id']=$bid;
                                                                                            $data_bank['ex_code']=$invoice_no;
                                                                            
                                                                                            if($bankbalancetotal==0)
                                                                                            {   
                                                                                                       $data_bank['balance']='-'.$payout_amount;
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                       
                                                                                                       $data_bank['balance']=$bankbalancetotal-$payout_amount;
                                                                                            }
                                                                            
                                                                            
                                                                            
                                                                                            $data_bank['debit']=$payout_amount;
                                                                                            $data_bank['credit']=0;
                                                                                            $data_bank['name']=$company_name;
                                                                                            $data_bank['create_date']=$data['payout_date'];
                                                                                            $data_bank['deletemod']='PYO'.$form_data->id;
                                                                                            $data_bank['status_by']='Purchase Payout';
                                                                                            
                                                                                            
                                                                                            if($bid==24)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=106;
                                                                                                 $data_bank['account_heads_id_2']=106;
                                                                                            }
                                                                                            elseif($bid==25)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=105;
                                                                                                 $data_bank['account_heads_id_2']=105;
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                
                                                                                                 $data_bank['account_head_id']=107;
                                                                                                 $data_bank['account_heads_id_2']=107;
                                                                                                
                                                                                            }
                                                                                            
                                                                                            
                                                                                            $data_bank['party_type'] = 4;
                                                                                            $insertbank=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                              
                                                                  }
                                                                  
                                                                  
                                                                  
                                                                  
                                                                      
                                                                $data_driver['order_id']=0;
                                                                $data_driver['customer_id']=$vendor_id;
                                                                $data_driver['payment_mode']=$form_data->payment_mode_payoff;
                                                                $data_driver['notes']=$data['remarks_payout'];
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$invoice_no;
                                                                $data_driver['amount']=$payout_amount;
                                                                $data_driver['reference_no']=$invoice_no;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['deletemod']='PYO'.$insertbank;
                                                                $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");
                                                                
                                                                
                                                                
                                                                $data_driver['debits']=$payout_amount;
                                                                $data_driver['credits']=0;
                                                                $data_driver['balance']=0;
                                                                $data_driver['paid_status']='Paid';
                                                                $data_driver['payment_date']=$data['payout_date'];
                                                                $data_driver['payment_time']=$time;
                                                                $data_driver['bank_id']=$form_data->bankaccount;
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $data_driver['order_trancation_status'] = 0;
                                                                
                                                                if($bankaccount!='0')
                                                                {
                                                                    
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                                                                
                                                                }
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                 
                                                                
                                                                
                                         
                                         
                                         
                                         }
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                              
                                         
                                         
                                                 $resulttotal = $this->Main_model->where_names_two_order_by('purchase_invoice', 'id', $form_data->id, 'deleteid', '0', 'id', 'DESC');
                                                 foreach ($resulttotal as $tot) {
                                                  
                                                    $vendor_id=  $tot->vendor_base_id;
                                                    $invoice_no=  $tot->invoice_no;
                                                    $po_number=  $tot->po_number;
                                                    $invoice_amount=$tot->invoice_amount;
                                                 }
                                                 
                                         
                                         
                                                 
                                               
                                                 $data_inward['vendor_id']=$vendor_id;
                                                 $data_inward['po_number']=$po_number;
                                                 $data_inward['invoice_no']=$invoice_no;
                                                 $data_inward['user_id'] = $this->userid;
                                                 $data_inward['inward_date']= $date;
                                                 $data_inward['rack_info']= 0;
                                                 $data_inward['bin_info']= 0;
                                                 
                                                 $data_inward['coil_no']= $form_data->coil_no;
                                                 
                                                 
                                                  
                                                 $result= $this->Main_model->where_names('purchase_invoice_products','c_id',$form_data->id);
                                                 foreach ($result as  $value)
                                                 {
                                                         $product_id=$value->product_id;
                                                         $c_id=$value->c_id;
                                                         $price=$value->price;
                                                         $qty=$value->qty;
                                                         $amount=round($value->price*$value->qty,2);
                                                         
                                                         
                                                         $stockid=$value->purchase_order_product_id;
                                                     
                                                         //$this->db->query("UPDATE product_list SET stock=stock+'".$qty."' WHERE id='".$product_id."'");
                                                
                                                         $data_inward['product_id']=$product_id; 
                                                         $data_inward['price']=$price;
                                                         $data_inward['qty']=$qty;
                                                         $data_inward['total_amount']=$invoice_amount;
                                                         $data_inward['order_id']=$c_id;
                                                         $data_inward['stock_id']=$stockid;
                                                        
                                                         //$res_id=$this->Main_model->insert_commen($data_inward,'purchase_order');
                                                 
                                                 } 
                                                 
                                         
                                                 
                                         
                                         $array=array('error'=>'2','insert_id'=>$form_data->id,'massage'=>'Purchase Payout Success..');
                                         echo json_encode($array);
  
                    


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function purchase_complaints_data()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                                        
                                        
                                      
                                     
                                        
                                         $vendor_id=0;
                                         $result= $this->Main_model->where_names('purchase_invoice','invoice_no',$form_data->po_number);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->invoice_date;
                                                     $vendor_id=$value->vendor_base_id;
                                                     $vendor_name=$value->vendor_id;
                                                     $po_number=$value->po_number;
                                                    
                                         }
                                         
                                         
                                         $result= $this->Main_model->where_names('purchase_orders_process','po_number',$po_number);
                                         foreach ($result as  $value) {
                                                     
                                                  
                                                     $order_id=$value->id;
                                                    
                                         }
                                         
                                         
                                         
                                        
                                         $data['vendor_id']=$vendor_name;
                                         $tablename=$form_data->tablename;
                                         
                                         $data['product_id']="";
                                       
                                        
                                         $data['user_id']=$this->userid;
                                         $data['po_number']=$form_data->po_number;
                                         
                                         $data['update_date']= $form_data->create_date;
                                         
                                         
                                         $data['invoice_date']= $create_date;
                                         $data['remarks']= $form_data->remarks;
                                         
                                         $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         $purchase_order_product_id=explode('|', $form_data->purchase_order_product_id);
                                         $purchase_notes_data=explode('|', $form_data->purchase_notes_data);
                                         $purchase_qty_data=explode('|', $form_data->purchase_qty_data);
                                         
                                        
                                         
                                         $netweight=0;
                                         for ($i=0; $i <count($purchase_order_product_id) ; $i++) { 
                                               
                                               
                                               
                                               $order_product_id=explode("_",$purchase_order_product_id[$i]);
                                            
                                            $resultgetprodut= $this->Main_model->where_names('purchase_product_list_process','id',$order_product_id[0]);
                                            foreach ($resultgetprodut as  $value) {
                                                     //$qty=$value->qty;
                                                     $product_name=$value->product_name;
                                                    
                                            }
                                            $netweight+=$purchase_qty_data[$i];
                                            $datadd['qty']=$purchase_qty_data[$i];
                                            $datadd['c_id']=$insert_id;
                                            $datadd['product_name']=$product_name;
                                            $datadd['notes']=$purchase_notes_data[$i];
                                            $datadd['purchase_order_product_id']=$purchase_order_product_id[$i];
                                            
                                            
                                            
                                             $batch_no=0;
                                             $resultbatchno= $this->Main_model->where_names('purchase_order','id',$order_product_id[1]);
                                             foreach ($resultbatchno as  $batch1) {
                                                         
                                                           $batch_no=$batch1->coil_no;
                                                         
                                                         
                                             }
                                           
                                            $datadd['batch_no']=$batch_no;
                                            $insert_id_data=$this->Main_model->insert_commen($datadd,'purchase_complient_products');
                                            
                                            
                                         }

                                         $this->db->query("UPDATE $tablename SET qty='".$netweight."' WHERE id='".$insert_id."'");
                                         
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Complaints Created..');
                                         echo json_encode($array);
  
                    


    }
    
    
    
            public function purchase_complaints_data_remarks_update()
    {
        
        
                                         date_default_timezone_set("Asia/Kolkata"); 
                                         $date= date('Y-m-d');
                                         $time= date('h:i A');
                                         $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                                         $data['create_date']= $date;
                                         $data['create_time']= $time;
                                         $data['c_id']= $form_data->id;
                                         $data['order_base']= $form_data->order_base;
                                         $data['remarks']= $form_data->remarks;
                                         
                                         $insert_id=$this->Main_model->insert_commen($data,'purchase_complaints_remarks');
                                         $this->db->query("UPDATE purchase_complaints SET order_base='".$form_data->order_base."' WHERE id='".$form_data->id."'");
                                         
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Complaints Remarks Updated..');
                                         echo json_encode($array);
  
                    


    }
    
    
    
    
    
    
    
    public function insertandupdateinward()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                
           
                 $label1=$form_data->label1;
                 $lab_option1=$form_data->lab_option1;
               


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                     $tablename=$form_data->tablename;
                               
                                     $data['product_id']=$form_data->product_id;
                                     $data['price']=$form_data->price;
                                     $data['vendor_id']=$form_data->vendor_id;
                                     $data['qty']=$form_data->qty;
                                     $data['type']=1;
                                     $data['total_amount']=$form_data->total_amount;
                                     $data['coil_no']=$form_data->coil_no;
                                     $data['po_number']=$form_data->po_number;
                                     $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));
                                    
                                    
                                     
                                     $this->db->query("UPDATE product_list SET stock=stock+'".$form_data->qty."' WHERE id='".$form_data->product_id."'");

                                     $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                     $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Inward successfully Added..');
                                     echo json_encode($array);




                                 

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                     if($form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                          $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                      
                                         $data['product_id']=$form_data->product_id;
                                         $data['price']=$form_data->price;
                                         $data['vendor_id']=$form_data->vendor_id;
                                         $data['qty']=$form_data->qty;
                                         $data['type']=1;
                                          $data['total_amount']=$form_data->total_amount;
                                         $data['coil_no']=$form_data->coil_no;
                                         $data['po_number']=$form_data->po_number;
                                        
                                        $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));

                                        $this->Main_model->update_commen($data,$tablename);
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                      
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Inward successfully Updated..');
                                       echo json_encode($array);
  
                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                 if($form_data->action=="Inward")
                 {
                     
                                 
                                         $result= $this->Main_model->where_names('purchase_order','id',$form_data->id);
                                         foreach ($result as  $value) {
                                                 
                                                 $product_id=$value->product_id;
                                         }
                     
                                         $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                                         
                                         $data['inward_qty']=$form_data->qty;
                                         $data['coil_no']=$form_data->coil_no;
                                         $data['total_amount']=$form_data->total_amount;
                                         $data['rack_info']=$form_data->rack_info;
                                         $data['bin_info']=$form_data->bin_info;
                                         $data['vehicle_no']=$form_data->vehicle_no;
                                         $data['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                         
                                         $dataval['stock_id']=$form_data->id;
                                         $dataval['price']=$form_data->price;
                                         $dataval['user_id']=$this->userid;
                                         $dataval['total_amount']=$form_data->total_amount;
                                         $dataval['vendor_id']=$form_data->vendor_id;
                                         $dataval['inward_qty']=$form_data->qty;
                                         $dataval['po_number']=$form_data->po_number;
                                         $dataval['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                         
                                         
                                         
                                         //$this->db->query("UPDATE product_list SET stock=stock+'".$form_data->qty."' WHERE id='".$product_id."'");
                                        
                                         $result= $this->Main_model->where_names('stock_history','stock_id',$form_data->id);
                                         if(count($result)==0)
                                         {
                                               
                                                  $this->Main_model->insert_commen($dataval,'stock_history');
                                              
                                         }
                                             
                                         
                                         $this->Main_model->update_commen($data,$tablename);
                                         $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Purchase Product Inward..');
                                         echo json_encode($array);
  
                    

                 }
                 
                 if($form_data->action=="Inwardinsert")
                 {
                     
                                  
                                  
                                         
                                                 $resulttotal = $this->Main_model->where_names_two_order_by('purchase_invoice', 'id', $form_data->id, 'deleteid', '0', 'id', 'DESC');
                                                 foreach ($resulttotal as $tot) {
                                                          
                                                            $vendor_id=  $tot->vendor_base_id;
                                                            $invoice_no=  $tot->invoice_no;
                                                            $po_number=  $tot->po_number;
                                                            $id=  $tot->id;
                                                            $invoice_amount=$tot->invoice_amount;
                                                 }
                                          
                                          
                                                 $data_inward['vendor_id']=$vendor_id;
                                                 $data_inward['po_number']=$po_number;
                                                 $data_inward['invoice_no']=$invoice_no;
                                                 $data_inward['invoice_id']=$id;
                                                 $data_inward['user_id'] = $this->userid;
                                                 $data_inward['inward_date']= $date;
                                                 $data_inward['rack_info']= $form_data->rack_info;
                                                 $data_inward['bin_info']= $form_data->bin_info;
                                                 $data_inward['vehicle_no']= $form_data->vehicle_no;
                     
                                        
                                      
                                                
                                                 $result= $this->Main_model->where_names('purchase_invoice_products','purchase_order_product_id',$form_data->product_purcahse_id);
                                                 foreach ($result as  $value)
                                                 {
                                                         $product_id=$value->product_id;
                                                         $c_id=$value->c_id;
                                                         $price=$value->price;
                                                         $qty=$value->qty;
                                                         $amount=round($value->price*$value->qty,2);
                                                         
                                                         
                                                         $stockid=$value->purchase_order_product_id;
                                                     
                                                         $this->db->query("UPDATE product_list SET stock=stock+'".$qty."' WHERE id='".$product_id."'");
                                                
                                                         $data_inward['product_id']=$product_id; 
                                                         $data_inward['price']=$price;
                                                         $data_inward['qty']=$qty;
                                                         $data_inward['coil_no']=$form_data->coil_no;
                                                         $data_inward['inward_qty']=$form_data->qty;
                                                         $data_inward['total_amount']=$invoice_amount;
                                                         $data_inward['order_id']=$c_id;
                                                         $data_inward['stock_id']=$stockid;
                                                        
                                                         $res_id=$this->Main_model->insert_commen($data_inward,'purchase_order');
                                                 
                                                 } 
                                                 
                                         
                                         
                                         $array=array('error'=>'2','insert_id'=>1,'massage'=>'Purchase Product Inward..');
                                         echo json_encode($array);
  
                    

                 }


                 if($form_data->action=='Delete')
                 {
                     
                     
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     
                     if($tablename=='purchase_invoice')
                     {
                             $result= $this->Main_model->where_names($tablename,'id',$id);
                             foreach ($result as  $value) {
                                $deleteval= $value->deletemod;
                                if($deleteval!='')
                                {
                                   if($deleteval!='0')
                                   {
                                       $this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE deletemod='".$deleteval."' AND party_type=3");
                                   }
                                }
                                
                             }
                     }
                     

                 }
                 
                 
              
                
                


    }
    
    
    
    
    
    
        public function insertandupdateinward_by_purchase()
    {
        
        
                                                  date_default_timezone_set("Asia/Kolkata"); 
                                                  $date= date('Y-m-d');
                                                  $time= date('h:i A');
                                                  $form_data = json_decode(file_get_contents("php://input"));
                                                  $id=$form_data->id;
                                                 
                                              
                                                     
                                            
                                                 $data['stock_id']=$form_data->id;
                                             
                                                 $result= $this->Main_model->where_names('purchase_invoice_products','id',$id);
                                                 foreach ($result as  $value) {
                                                     $product_id=$value->product_id;
                                                     $c_id=$value->c_id;
                                                     $price=$value->price;
                                                     $qty=$value->qty;
                                                     $amount=round($value->price*$value->qty,2);
                                                   
                                                 }
                                                 
                                                 
                                                 
                                                 $resulttotal = $this->Main_model->where_names_two_order_by('purchase_invoice', 'id', $c_id, 'deleteid', '0', 'id', 'DESC');
                                                 foreach ($resulttotal as $tot) {
                                                  
                                                    $vendor_id=  $tot->vendor_base_id;
                                                    $invoice_no=  $tot->invoice_no;
                                                    $po_number=  $tot->po_number;
                                                 }
                                                 
                                                 
                                                
                                         
                                                 $data['product_id']=$product_id;
                                                 $data['vendor_id']=$vendor_id;
                                                 $data['po_number']=$po_number;
                                                 $data['invoice_no']=$invoice_no;
                                                 $data['user_id'] = $this->userid;
                                                 
                                                 $data['price']=$price;
                                                 $data['qty']=$qty;
                                                 $data['total_amount']=$amount;
                                                 $data['order_id']=$c_id;
                                                 
                                                 
                                                 $data['inward_date']= $date;
                                                 $data['rack_info']= $form_data->rack_info;
                                                 $data['bin_info']= $form_data->bin_info;
                                                 
                                                 
                                                 $result= $this->Main_model->where_names('purchase_order','stock_id',$form_data->id);
                                                 if(count($result)==0)
                                                 {
                                                     
                                                          $this->db->query("UPDATE product_list SET stock=stock+'".$qty."' WHERE id='".$product_id."'");
                                                          $res_id=$this->Main_model->insert_commen($data,'purchase_order');
                                                          $this->db->query("UPDATE purchase_invoice_products SET checked='1',rack_info='". $form_data->rack_info."',bin_info='". $form_data->bin_info."' WHERE id='".$id."'"); 
                                                          
                                                 }
                                                 else
                                                 {         
                                                          $res_id=$form_data->id;
                                                          $data['get_id']=$form_data->id;
                                                          $this->Main_model->update_commen_where($data,'stock_id','purchase_order');
                                                          $this->db->query("UPDATE purchase_invoice_products SET checked='1',rack_info='". $form_data->rack_info."',bin_info='". $form_data->bin_info."' WHERE id='".$id."'"); 
                                                          
                                                 }
                                                     
                                                 $this->db->query("UPDATE purchase_orders_process SET reason='Inwarded' WHERE id='".$order_id."'"); 
                                                 $this->db->query("UPDATE purchase_invoice SET order_base='3',remarks='Inwarded' WHERE id='".$c_id."'"); 
                                                          
                                              
                                                 $array=array('error'=>'2','insert_id'=>1,'massage'=>'Purchase Product Inward..');
                                                 echo json_encode($array);
          
                            
        
                      


                
                


    }
    
    
    
    
    
    
    
        public function purchase_fetch_return()
    {
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                      $array=array();
                     $result= $this->Main_model->where_names('purchase_order_return','stock_id',$id);
                     foreach ($result as  $value) {
                         
                          $product_name="";
                          $resultp= $this->Main_model->where_names('product_list','id',$value->product_id);
                          foreach ($resultp as  $valuep) {
                             
                             $product_name=$valuep->product_name;
                             
                             if($valuep->purchase_name!='')
                             {
                                                          $product_name = $valuep->purchase_name;
                             }
                             
                          }
                          
                          
                          $vendor_name="";
                          $resultv= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                          foreach ($resultv as  $valuev) {
                             
                             $vendor_name=$valuev->name;
                          }
                       
                        

                        
                      

                        $array[] = array(
                            
                            'no' => $i, 
      
                            'id' => $value->id, 
                            
                            'product_name' => $product_name, 
                            'vendor_name' => $vendor_name, 
                            'po_number' => $value->po_number, 
                            'qty'=>$value->qty,
                            'total_amount'=>$value->total_amount,
                            'return_qty'=>$value->return_qty,
                            'remarks'=>$value->remarks,
                            'return_date' =>  date('d-m-Y', strtotime($value->return_date)),
                            

                        );
                        
                        
                      
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
        
        public function purchase_fetch_cp_remarks_fetch()
    {
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                      $array=array();
                     $result= $this->Main_model->where_names('purchase_complaints_remarks','c_id',$id);
                     foreach ($result as  $value) {
                         
                          $po_number="";
                          $resultp= $this->Main_model->where_names('purchase_complaints','id',$id);
                          foreach ($resultp as  $valuep) {
                             
                             $po_number=$valuep->po_number;
                          }
                          
                        if($value->order_base==1)
                        {
                            $value->order_base='FOLLOW UP';
                        }
                        else
                        {
                            $value->order_base='CLOSED';
                        }

                     $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'po_number' => $po_number, 
                            'order_base'=>$value->order_base,
                            'remarks'=>$value->remarks,
                            'create_date' =>  date('d-m-Y', strtotime($value->create_date)),
                            'create_time' =>  $value->create_time,
                            

                        );
                        
                        
                      
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
        public function purchase_fetch_cp_invoice_product()
    {
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                      $array=array();
                     $result= $this->Main_model->where_names('purchase_invoice_products','c_id',$id);
                     foreach ($result as  $value) {
                         
                          $po_number="";
                          $resultp= $this->Main_model->where_names('purchase_invoice','id',$id);
                          foreach ($resultp as  $valuep) {
                             
                             $po_number=$valuep->po_number;
                          }
                          
                                          $unit="";
                                          $resultps= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_order_product_id);
                                          foreach ($resultps as  $values) {
                                             
                                                 
                                                      $uom=$values->uom;
                                                      
                                                      
                                                      
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  } 
                                                  
                                                  
                                          }
                          
                                         $product_list= $this->Main_model->where_names('product_list','id',$value->product_id);
                                         foreach ($product_list as  $list) {
                                                     
                                                     $product_name=$list->product_name;
                                                     if($list->purchase_name!='')
                                                     {
                                                       $product_name=$list->purchase_name;
                                                      
                                                     }
                                                     
                                         }


                         $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'unit' => $uom, 
                            'product_name' => $product_name, 
                            'qty'=>$value->qty,
                            'price' =>  $value->price,
                            'row_total' =>  round($value->price*$value->qty)
                            

                      );
                        
                        
                      
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    public function getpurchaseorerinvoice()
    {
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                     $array=array();
                      
                      
                     $status=array('0','2','1','4'); 
                     $result = $this->Main_model->where_names_three_thried_where_in_order_by('purchase_invoice', 'order_id', $id,  'deleteid', '0','order_base', $status, 'id', 'DESC');
           
                      
                    
                     foreach ($result as  $value) 
                     {
                                                             $schedule_date='';
                                                             if($value->order_base==2)
                                                             {
                                                                 $status_data="RE-SCHEDULE";
                                                                 
                                                                 $schedule_date=date('d-m-Y',strtotime($value->schedule_date));
                               
                             
                                                                 
                                                             }
                                                             
                                                             if($value->order_base==0)
                                                             {
                                                                 $status_data="PENDING";
                                                             }
                                                             
                                                             if($value->order_base==1)
                                                             {
                                                                 $status_data="PAID";
                                                             }
                                                             
                                                             if($value->order_base==4)
                                                             {
                                                                 $status_data="PARTIAL PAID";
                                                             }
                                                             
                                                             
                                                             if($value->loading_charges>0)
                                                             {
                                                                 $loading_charges=$value->loading_charges;
                                                             }
                                                             else
                                                             {
                                                                 $loading_charges=0;
                                                             }
                                                             
                                                               $invoice_amount= $value->invoice_amount+$loading_charges;
                                  
                                                             $array[] = array(
                                                                
                                                                'no' => $i, 
                                                                'id' => $value->id,
                                                                'base_id' => base64_encode($value->id),
                                                                'invoice_no' => $value->invoice_no, 
                                                                'vendor_name' => $value->vendor_id, 
                                                                'vendor_id'=>$value->vendor_base_id,
                                                                'po_number' =>  $value->po_number,
                                                                'qty' =>  $value->qty,
                                                                'extra_invoice_status' =>  $value->extra_invoice_status,
                                                                'invoice_amount' =>  $invoice_amount,
                                                                'payout_amount' =>  $value->payout_amount,
                                                                'pending_amount' =>  round($invoice_amount-$value->payout_amount,2),
                                                                'remarks' =>  $value->remarks,
                                                                'status_data' =>  $status_data,
                                                                'schedule_date_value' =>  $schedule_date,
                                                                'attachment' =>  base_url().$value->attachment,
                                                                'invoice_date' =>  date('d-m-Y',strtotime($value->invoice_date))
                                                                
                                    
                                                            );
                        
                        
                                           
                        
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    

    public function purchase_invoice_data_update()
    {
        
        
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                      
                                      
                                         
                     
                                         $id=$form_data->order_id;
                                         $insert_id=$form_data->order_id;
               
                                         $tablename=$form_data->tablename;
                                         
                                         $data['user_id']=$this->userid;
                                         $data['invoice_no']=$form_data->inovice_no;
                                         $data['gst_amount']=$form_data->gst_amount;
                                         $data['update_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['invoice_date']= date('Y-m-d',strtotime($form_data->create_date));
                                         $data['remarks']= $form_data->remarks;
                                         $data['loading_charges']= $form_data->loading_charges;
                                         $data['roundoff']= $form_data->roundoff;
                                         $data['convert_status']= $form_data->convert;

                                         $data['get_id']= $id;
                                         $this->Main_model->update_commen($data, $tablename);
                                        
                                         
                                         $purchase_order_product_id=explode('|', $form_data->purchase_order_product_id);
                                         $purchase_price_data=explode('|', $form_data->purchase_price_data);
                                         $purchase_qty_data=explode('|', $form_data->purchase_qty_data);
                                         
                                         $netweight=0;
                                         $netamount=0;
                                         for ($i=0; $i <count($purchase_order_product_id) ; $i++) { 
                                        
                                        
                                           
                                            
                                            
                                            
                                            $datadd['qty']=$purchase_qty_data[$i];
                                            $datadd['price']=$purchase_price_data[$i];
                                            $datadd['get_id']= $purchase_order_product_id[$i];
                                       
                                            
                                            if($datadd['qty']>0)
                                            {
                                                
                                                $netweight+=$purchase_qty_data[$i];
                                                $netamount+=$purchase_qty_data[$i]*$purchase_price_data[$i];
                                                $this->Main_model->update_commen($datadd, 'purchase_invoice_products');
                                                
                                                
                                            }
                                            
                                        
                                            
                                         }
                                         
                                         
                                         $reason='Purchase Invoice Updated';
                                                  
                                         
                                        
                                        
                                        if($form_data->loading_charges>0)
                                        {
                                            $loading_charges=$form_data->loading_charges;
                                        }
                                        else
                                        {
                                            $loading_charges=0;
                                        }



                                        $netamount=$form_data->sub_total+$form_data->gst_amount; 
                                          

                                         
                                         if($form_data->roundoff>0)
                                         {

                                                     if($form_data->convert==1)
                                                     {
                                                        $netamount=$netamount+$form_data->roundoff;
                                                     }
                                                     else
                                                     {
                                                         $netamount=$netamount-$form_data->roundoff;
                                                     }      

                                         }


    $this->db->query("UPDATE $tablename SET qty='".$netweight."',invoice_amount='".$netamount."' WHERE id='".$insert_id."'");



   
    $deletemod='PC'.$insert_id;


 $netamount_total=$netamount+$loading_charges;

$this->db->query("UPDATE all_ledgers SET credits='".$netamount_total."',notes='".$reason."'  WHERE deletemod='".$deletemod."' AND order_id='".$insert_id."' AND party_type=3");
    //$this->Main_model->update_commen_where($data_driver,'deletemod','all_ledgers');
                                                                
                                                                
    $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Invoice Created..');
    echo json_encode($array);
  
                    


    }
    
    
    
    public function fetch_invoicetotal()
    {
                     
                     $id=$_GET['id'];
                     $array=array();
                     $result= $this->Main_model->where_names('purchase_invoice_products','c_id',$id);
                     $totalamount=0;
                     $totalextra=0;
                     foreach ($result as  $value) 
                     {
                            $totalamount+=$value->qty*$value->price;
                            
                            if($value->extra!='')
                            {
                                 $totalextra+=$value->qty*$value->extra;
                            }
                           
                               
                     }
                     
                      $loading_charges=0;
                      $vendor_id=0;
                     $resultg= $this->Main_model->where_names('purchase_invoice','id',$id);
                        $schedule_date='';
                     foreach ($resultg as  $values) 
                     {
                         $invoice_no=$values->invoice_no;
                         $invoice_date=$values->invoice_date;
                         $vendor_id=$values->vendor_base_id;
                         
                           $attachment=$values->attachment;
                         $order_base=$values->order_base;
                         
                         if($order_base==0)
                         {
                             $payment_status='PENDING';
                         }
                         
                         if($order_base==1)
                         {
                             $payment_status='PAID';
                         }
                         
                         if($order_base==2)
                         {
                             $payment_status='RE-SCHEDULE';
                              $schedule_date=date('d-m-Y',strtotime($values->schedule_date));
                         }
                         if($order_base==4)
                         {
                             $payment_status='PARTIAL PAYOUT';
                         }
                         
                         $payout_amount=$values->payout_amount;
                         $invoice_amount=$values->invoice_amount;


                          $roundoff=$values->roundoff;
                          $convert=$values->convert_status;
                         
                         
                         if($values->loading_charges>0)
                         {
                              $loading_charges=$values->loading_charges;
                         }
                         else
                         {
                             $loading_charges=0;
                         }
                         
                         
                         $invoice_amountdata=$invoice_amount-$payout_amount;
                     }
                     
                     $array['invoice_totalextra']=$totalextra;
                     $array['payment_status']=$payment_status;
                     $array['schedule_date']=$schedule_date;
                     $array['loading_charges']=$loading_charges;
                     $array['attachment']=$attachment;
                     $totalamount=$totalamount;
                     
                     $array['invoice_no']=$invoice_no;
                     $array['invoice_date']=date('d-m-Y',strtotime($invoice_date));
                     $array['invoice_totalamount']=round($totalamount);
                     $array['invoice_gstamount']=round($totalamount*18/100);
                     $gstamount=round($totalamount*18/100);
                     
                     $totalamount=$totalamount+$loading_charges+$gstamount;


                                         if($roundoff>0)
                                         {

                                                     if($convert==1)
                                                     {
                                                        $totalamount=$totalamount+$roundoff;
                                                        $convert_status='(+)';
                                                     }
                                                     else
                                                     {
                                                         $totalamount=$totalamount-$roundoff;
                                                         $convert_status='(-)';
                                                     }      

                                         }
                                      

                     
                     
                                    $tcs_status=0;
                                 $customers_data = $this->Main_model->where_names('vendor', 'id', $vendor_id);
                                 foreach ($customers_data as $csvalv) {
                                    $tcs_status = $csvalv->tcs_status;
                                   
                                 }
                                 
                                 if($tcs_status==1)
                                 {
                    
                                                $tcsamount=round($totalamount*0.1/100);
                    
                                 }
                                 else
                                 {
                    
                    
                                                 $tcsamount=0;
                    
                    
                                 }
                                
                                
                                
                                $totalamount=$totalamount+$tcsamount;
                     
                     $array['invoice_fulltotal']=round($totalamount);
                     $array['tcsamount']=round($tcsamount);

                     $array['roundoffset']=$roundoff;
                             $array['convert_status']=$convert_status;
                     
                     $invoice_amountdata=$invoice_amountdata+$loading_charges;
                     $array['invoice_amount']=round($invoice_amountdata);
                     
                     
                     
                     
                     
                     
                     
   // $this->db->query("UPDATE all_ledgers SET credits='".$array['invoice_fulltotal']."' WHERE order_id='".$id."' AND order_no='".$invoice_no."' AND party_type=3 AND deleteid=0");
                 
                     
                     
                     
                     

                    echo json_encode($array);

    }
    
    
    public function fetch_invoicetotal_get()
    {
                     
                     $id=$_GET['id'];
                    
                     $array=array();
                    
                     
                     
                     $resultg= $this->Main_model->where_names('purchase_invoice','id',$id);
                        $schedule_date='';
                     foreach ($resultg as  $values) 
                     {
                         $invoice_no=$values->invoice_no;
                         $invoice_date=$values->invoice_date;
                         $invoice_amount=$values->invoice_amount;
                         $gst_amount=$values->gst_amount;
                         $subtotal=$invoice_amount-$gst_amount;
                         $payout_amount=$values->payout_amount;
                         
                         
                            $order_base=$values->order_base;
                         
                         if($order_base==0)
                         {
                             $payment_status='PENDING';
                         }
                         
                         if($order_base==1)
                         {
                             $payment_status='PAID';
                         }
                         
                         if($order_base==2)
                         {
                             $payment_status='RE-SCHEDULE';
                              $schedule_date=date('d-m-Y',strtotime($values->schedule_date));
                         }
                         if($order_base==4)
                         {
                             $payment_status='PARTIAL PAYOUT';
                         }
                         
                         
                         $invoice_amountdata=$invoice_amount-$payout_amount;
                         
                     }
                     
                     $array['invoice_totalextra']=$subtotal;
                     $array['invoice_no']=$invoice_no;
                     $array['invoice_date']=$invoice_date;
                      $array['payment_status']=$payment_status;
                      $array['schedule_date']=$schedule_date;
                     $array['invoice_gstamount']=round($gst_amount,2);
                     $array['invoice_fulltotal']=round($invoice_amount,2);

                     $array['invoice_amount']=round($invoice_amountdata,2);

                      
                    echo json_encode($array);

    }
    
    
    
    
    
        public function purchase_fetch_cp_products()
    {
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                     $array=array();
                     $result= $this->Main_model->where_names('purchase_complient_products','c_id',$id);
                     foreach ($result as  $value) {
                         
                         
                     
                     $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'product_name'=>$value->product_name,
                            'notes'=>$value->notes,
                            'qty' =>  $value->qty,
                            'batch_no' =>  $value->batch_no,
                            

                        );
                        
                        
                      
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    public function get_purchase_product_list()
    {
                     
                     
                     $i=1;
                     
                     
                     $po_no=$_GET['po_no'];
                     $array=array();
                     $queryss = $this->db->query("SELECT a.*,b.id as baseid,b.qty as inwardqty,b.price as inwardprice,b.coil_no  FROM purchase_product_list_process as a JOIN purchase_order as b ON a.id=b.stock_id WHERE a.deleteid='0' AND b.deleteid='0' AND b.invoice_no='" . $po_no . "' GROUP BY b.product_id,b.coil_no  ORDER BY a.id ASC");
                     $result = $queryss->result();
                     foreach ($result as  $value) {
                         
                         
                         
                         
                                         $product_list= $this->Main_model->where_names('product_list','id',$value->product_id);
                                         foreach ($product_list as  $list) {
                                                     
                                                     $product_name=$list->product_name;
                                                     if($list->purchase_name!='')
                                                     {
                                                       $product_name=$list->purchase_name;
                                                      
                                                     }
                                                     
                                         }
                         
                      

                     $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'baseid' => $value->baseid, 
                            'product_name' => $product_name,
                            'coil_no'=>$value->coil_no,
                            'qty'=>$value->inwardqty,
                            'rate'=>$value->inwardprice
                            
                        );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
        
        
        
        
        
        
        
        
        
        
        
            public function get_purchase_product_list_po_number_get_vendor()
    {
                     
                     
                                         $i=1;
                     
                     
                     
                                         $po_no=$_GET['po_no'];
                                         $id=$_GET['order_id'];
                                        
                                         $result= $this->Main_model->where_names('purchase_orders_process','id',$id);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                    
                                         }
                                         
                                         $vendor_id=0;
                                         $resultvorder= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                                         foreach ($resultvorder as  $value1) {
                                                     
                                                     if($value1->selected_status==1)
                                                     {
                                                       $vendor_id=$value1->vendor_id;
                                                      
                                                     }
                                                     
                                         }
                                         
                                         if(isset($_GET['vendor_id_fix']))
                                         {
                                            $vendor_id=$_GET['vendor_id_fix'];
                                           
                                         }
                                         
                                          
                     
                     
                    
                     $array=array();
                     $queryss = $this->db->query("SELECT a.*,c.price as updateprice  FROM purchase_product_list_process as a JOIN   purchase_order_quotation as c ON a.id=c.purchase_product_list_id  WHERE a.deleteid='0' AND a.order_id='" . $order_id . "' AND c.vendor_id='".$vendor_id."' AND c.selected_status=1   ORDER BY a.id ASC");
                     $result = $queryss->result();
                     
                     
                  
                     
                     foreach ($result as  $value)
                     {
                         
                         
                         
                                                      $uom=$value->uom;
                                                     
                                                     
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  } 
                          
                          
                         
                                         $product_list= $this->Main_model->where_names('product_list','id',$value->product_id);
                                         foreach ($product_list as  $list) {
                                                     
                                                      $product_name=$list->product_name;

                                                      if($list->purchase_name!='')
                                                     {
                                                       $product_name=$list->purchase_name;
                                                      
                                                     }

                                                     
                                         }
                                         
                                         
                                         if($value->modify_qty>0)
                                         {
                                              $totalqty=$value->modify_qty;
                                         }
                                         else
                                         {
                                              $totalqty=$value->qty;
                                         }
                                         
                                         
                                         
                                       
                                         $array[] = array(
                                                
                                                'no' => $i, 
                                                'id' => $value->id, 
                                                'unit' => $uom, 
                                                'product_name' => $product_name, 
                                                'vendor_id' => $vendor_id,
                                                'qty'=>$value->qty,
                                                'rate'=>$value->updateprice,
                                                'vehicle_no'=>$value->vehicle_no,
                                                'dispath_date'=>date('d-m-Y',strtotime($value->dispath_date)),
                                                'modify_qty'=>$value->modify_qty,
                                                'totalqty'=>$totalqty,
                                                'inward_id'=>$value->inward_id,
                                                'char_value'=>$value->char_value,
                                                'description'=>$value->description,
                                                'remarks_data'=>$value->remarks_data,
                                                'rowtotal'=>round($totalqty*$value->updateprice),
                                                'specifications'=>$value->specifications
                                                
                    
                                            );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
        
        
        
        
        
        
        
        
        
        
        
        public function get_purchase_product_list_po_number()
    {
                     
                     
                                         $i=1;
                     
                     
                                          
                                         $order_id=$_GET['order_id'];   
                                         
                                        
                                         $result= $this->Main_model->where_names('purchase_orders_process','id',$order_id);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                    
                                         }
                                         
                                         $vendor_id=0;
                                         $resultvorder= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                                         foreach ($resultvorder as  $value1) {
                                                     
                                                     if($value1->selected_status==1)
                                                     {
                                                     $vendor_id=$value1->vendor_id;
                                                      
                                                     }
                                                     
                                         }
                                         
                                         if(isset($_GET['vendor_id_fix']))
                                         {
                                            $vendor_id=$_GET['vendor_id_fix'];
                                           
                                         }
                                         
                                          
                     
                  
                    
                     $array=array();
                     $queryss = $this->db->query("SELECT pp.id as inward_id,pp.inward_qty as inward_qty,a.*,c.price as updateprice  FROM purchase_product_list_process as a JOIN   purchase_order_quotation as c ON a.id=c.purchase_product_list_id JOIN purchase_order as pp ON a.id=pp.stock_id WHERE a.deleteid='0' AND pp.deleteid='0' AND a.order_id='" . $order_id . "' AND c.vendor_id='".$vendor_id."' AND c.selected_status=1 AND pp.payment_status=0  ORDER BY a.id ASC");
                     $result = $queryss->result();
                     
                     
                  
                     
                     foreach ($result as  $value)
                     {
                         
                         
                         
                                                       $uom=$value->uom;
                                                       
                                                       
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  }  
                          
                         
                                         $product_list= $this->Main_model->where_names('product_list','id',$value->product_id);
                                         foreach ($product_list as  $list) {
                                                     
                                                      $product_name=$list->product_name;

                                                      if($list->purchase_name!='')
                                                     {
                                                       $product_name=$list->purchase_name;
                                                      
                                                     }

                                                     
                                         }
                                         
                                         
                                         if($value->inward_qty>0)
                                         {
                                              $totalqty=$value->inward_qty;
                                         }
                                         else
                                         {
                                              $totalqty=$value->qty;
                                         }
                                         
                                         
                                         
                                       
                                         $array[] = array(
                                                
                                                'no' => $i, 
                                                'id' => $value->id, 
                                                'unit' => $uom, 
                                                'product_name' => $product_name, 
                                                'vendor_id' => $vendor_id,
                                                'qty'=>$value->qty,
                                                'rate'=>$value->updateprice,
                                                'vehicle_no'=>$value->vehicle_no,
                                                'dispath_date'=>date('d-m-Y',strtotime($value->dispath_date)),
                                                'modify_qty'=>$value->modify_qty,
                                                'totalqty'=>$totalqty,
                                                'inward_id'=>$value->inward_id,
                                                'char_value'=>$value->char_value,
                                                'description'=>$value->description,
                                                'remarks_data'=>$value->remarks_data,
                                                'rowtotal'=>round($totalqty*$value->updateprice),
                                                'specifications'=>$value->specifications
                                                
                    
                                            );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function get_purchase_product_list_po_number_gst_total()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                                         
                     $array=array();
                     $queryss = $this->db->query("SELECT c.vendor_id,pp.inward_qty,a.qty,a.modify_qty,c.price as updateprice,c.extra  FROM purchase_product_list_process as a JOIN purchase_orders_process as b ON a.order_id=b.id JOIN purchase_order_quotation as c ON a.id=c.purchase_product_list_id JOIN purchase_order as pp ON a.id=pp.stock_id WHERE a.deleteid='0' AND pp.deleteid='0' AND b.id='" . $order_id . "'  AND c.selected_status=1  AND pp.payment_status=0 ORDER BY a.id ASC");
                     $result = $queryss->result();
                     
                     
                  
                     $totalamount=0;
                     $vendor_id=0;
                     foreach ($result as  $value) 
                     {
                                  $vendor_id=$value->vendor_id;
                                  if($value->extra=='')
                                   {
                                       $value->extra=0;
                                   }
                         
                                  $totalextra=$value->qty*$value->extra;
                                  $totalextra_unit=$value->extra;
                                   
                                         if($value->inward_qty>0)
                                         {
                                             $totalqty=$value->inward_qty;
                                         }
                                         else
                                         {
                                              $totalqty=$value->qty;
                                         }
                                         
                                   
                                   $totalamount+=$totalqty*$value->updateprice;
                                  
                               


                     }
                     
                     
                                   $totalamount=$totalamount;
                                   $array['totalextra']=$totalextra;
                                   $array['totalamount']=round($totalamount);
                                   $array['gstamount']=round($totalamount*18/100);
                                   $gstamount=round($totalamount*18/100);
                                   $fulltotal=$totalamount+$gstamount;
                                   
                                   
                                   
                                   
                                  $tcs_status=0;
                                 $customers_data = $this->Main_model->where_names('vendor', 'id', $vendor_id);
                                 foreach ($customers_data as $csvalv) {
                                    $tcs_status = $csvalv->tcs_status;
                                   
                                 }
                                 
                                 if($tcs_status==1)
                                 {
                    
                                                $tcsamount=round($fulltotal*0.1/100);
                    
                                 }
                                 else
                                 {
                    
                    
                                                 $tcsamount=0;
                    
                    
                                 }
                                   
                                   $totalamount=$fulltotal+$tcsamount;
                                   
                                   
                                   $array['tcsamount']=round($tcsamount);
                                   $array['fulltotal']=round($totalamount);
                                   $array['extra_unit']=$totalextra_unit;
                         
                                   $array['gstamount_extra']=round($totalextra*18/100);
                                   $gstamount_extra=round($totalextra*18/100);
                                   $array['fulltotal_extra']=round($totalextra+$gstamount_extra);

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function get_purchase_product_list_po_number_extra()
    {
                     
                     
                                         $i=1;
                     
                     
                     
                                         $po_no=$_GET['po_no'];
                                         $order_id=$_GET['order_id'];
                                        
                                         $result= $this->Main_model->where_names('purchase_orders_process','id',$order_id);
                                         foreach ($result as  $value) {
                                                     
                                                     $create_date=$value->create_date;
                                                     $order_id=$value->id;
                                                    
                                         }
                                         
                                         $vendor_id=0;
                                         $resultvorder= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                                         foreach ($resultvorder as  $value1) {
                                                     
                                                     if($value1->selected_status==1)
                                                     {
                                                       $vendor_id=$value1->vendor_id;
                                                      
                                                     }
                                                     
                                         }
                                         
                                         if(isset($_GET['vendor_id_fix']))
                                         {
                                            $vendor_id=$_GET['vendor_id_fix'];
                                           
                                         }
                                         
                                          
                     
                     
                    
                     $array=array();
                     $queryss = $this->db->query("SELECT a.*,c.price as updateprice  FROM purchase_product_list_process as a JOIN   purchase_order_quotation as c ON a.id=c.purchase_product_list_id  WHERE a.deleteid='0' AND a.order_id='" . $order_id . "' AND c.vendor_id='".$vendor_id."' AND c.selected_status=1   ORDER BY a.id ASC");
                     $result = $queryss->result();
                     
                     
                  
                     
                     foreach ($result as  $value)
                     {
                         
                         
                         
                                         
                                          
                                                      $uom=$value->uom;
                                                      
                                                      
                                                      if($uom=='1'){ $uom='TON';  } 
                                                      if($uom=='2'){ $uom='SQ.MTR';  } 
                                                      if($uom=='3'){ $uom='FEET';  } 
                                                      if($uom=='4'){ $uom='MM';  } 
                                                      if($uom=='5'){ $uom='MTR';  } 
                                                      if($uom=='6'){ $uom='INCH';  } 
                                                      if($uom=='7'){ $uom='KG';  } 
                                                      if($uom=='8'){ $uom='SQ.FT';  } 
                                                      if($uom=='9'){ $uom='NOS';  } 
                          
                         
                                         $product_list= $this->Main_model->where_names('product_list','id',$value->product_id);
                                         foreach ($product_list as  $list) {
                                                     
                                                      $product_name=$list->product_name;

                                                      if($list->purchase_name!='')
                                                     {
                                                       $product_name=$list->purchase_name;
                                                      
                                                     }

                                                     
                                         }
                                         
                                         $totalqty=$value->qty;
                                         
                                         
                                         
                                       
                                         $array[] = array(
                                                
                                                'no' => $i, 
                                                'id' => $value->id, 
                                                'unit' => $uom, 
                                                'product_name' => $product_name, 
                                                'vendor_id' => $vendor_id,
                                                'qty'=>$value->qty,
                                                'rate'=>$value->updateprice,
                                                'vehicle_no'=>$value->vehicle_no,
                                                'dispath_date'=>date('d-m-Y',strtotime($value->dispath_date)),
                                                'modify_qty'=>$value->modify_qty,
                                                'totalqty'=>$totalqty,
                                                'inward_id'=>$value->inward_id,
                                                'char_value'=>$value->char_value,
                                                'description'=>$value->description,
                                                'remarks_data'=>$value->remarks_data,
                                                'rowtotal'=>round($totalqty*$value->updateprice),
                                                'specifications'=>$value->specifications
                                                
                    
                                            );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function get_purchase_product_list_po_number_gst_total_extra()
    {
                     
                     
                     $po_no=$_GET['po_no'];
                     $order_id=$_GET['order_id'];
                     $array=array();
                     $queryss = $this->db->query("SELECT a.qty,a.modify_qty,c.price as updateprice,c.extra  FROM purchase_product_list_process as a JOIN purchase_orders_process as b ON a.order_id=b.id JOIN purchase_order_quotation as c ON a.id=c.purchase_product_list_id  WHERE a.deleteid='0' AND b.id='" . $order_id . "'  AND c.selected_status=1   ORDER BY a.id ASC");
                     $result = $queryss->result();
                     
                     
                  
                     $totalamount=0;
                     $totalextra=0;
                     foreach ($result as  $value) 
                     {
                         
                                  if($value->extra=='')
                                   {
                                       $value->extra=0;
                                   }
                         
                                   $totalextra+=$value->qty*$value->extra;
                                   $totalextra_unit=$value->extra;
                                   $totalqty=$value->qty;
                                   
                                   $totalamount+=$totalqty*$value->updateprice;
                                  
                               


                     }
                     
                     
                                   $totalamount=$totalamount;
                                   $array['totalextra']=$totalextra;
                                   $array['totalamount']=round($totalamount);
                                   $array['gstamount']=round($totalamount*18/100);
                                   $gstamount=round($totalamount*18/100);
                                   $fulltotal=$totalamount+$gstamount;
                                   $array['fulltotal']=round($fulltotal);
                                   $array['extra_unit']=$totalextra_unit;
                              
                              
                              
                              $array['gstamount_extra']=round($totalextra*18/100);
                               $gstamount_extra=round($totalextra*18/100);
                              $array['fulltotal_extra']=round($totalextra+$gstamount_extra);

                    echo json_encode($array);

    }
    
    
    
    
    
    public function fetch_data()
    {
                     
                     
                     $i=1;
                    
                     $result= $this->Main_model->where_names('purchase_order','deleteid','0');
                     foreach ($result as  $value) {
                         
                          $product_name="";
                          $resultp= $this->Main_model->where_names('product_list','id',$value->product_id);
                          foreach ($resultp as  $valuep) {
                             
                             $product_name=$valuep->product_name;
                             if($valuep->purchase_name!='')
                             {
                                $product_name = $valuep->purchase_name;
                             }
                          }
                          
                          
                          $vendor_name="";
                          $resultv= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                          foreach ($resultv as  $valuev) {
                             
                             $vendor_name=$valuev->name;
                          }
                          
                        

                      if($value->type==0)
                      {
                          
                      

                        $array[] = array(
                            
                            'no' => $i, 
      
                            'id' => $value->id, 
                            'product_id' => $value->product_id, 
                            'product_name' => $product_name, 
                            'vendor_name' => $vendor_name, 
                            'po_number' => $value->po_number, 
                            'invoice_no' => $value->invoice_no,
                            'price' => $value->price,
                            'coil_no'=>$value->coil_no,
                            'vehicle_no'=>$value->vehicle_no,
                            'qty'=>$value->qty,
                            'total_amount'=>$value->total_amount,
                            'rack_info'=>$value->rack_info,
                            'bin_info'=>$value->bin_info,
                            'return_status'=>$value->return_status,
                            'inward_qty'=>$value->inward_qty,
                            'order_date' =>  date('d-m-Y', strtotime($value->order_date)),
                            'inward_date' =>  date('d-m-Y', strtotime($value->inward_date)),
                            

                        );
                        
                        
                      }
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    public function fetch_data_inward()
    {
                     
                     
                     $i=1;
                    
                     $result= $this->Main_model->where_names('purchase_order','deleteid','0');
                     foreach ($result as  $value) {
                         
                          $product_name="";
                          $resultp= $this->Main_model->where_names('product_list','id',$value->product_id);
                          foreach ($resultp as  $valuep) {
                             
                              $product_name=$valuep->product_name;
                             if($valuep->purchase_name!='')
                             {
                                $product_name = $valuep->purchase_name;
                             }
                          }
                          
                          
                          $vendor_name="";
                          $resultv= $this->Main_model->where_names('customers','id',$value->vendor_id);
                          foreach ($resultv as  $valuev) {
                             
                             $vendor_name=$valuev->company_name;
                          }
                       
                        

                      if($value->type==1)
                      {
                          
                      

                        $array[] = array(
                            
                            'no' => $i, 
      
                            'id' => $value->id, 
                            
                            'product_name' => $product_name, 
                            'vendor_name' => $vendor_name, 
                            'po_number' => $value->po_number, 
                            'price' => $value->price,
                            'coil_no'=>$value->coil_no,
                            'qty'=>$value->qty,
                            'total_amount'=>$value->total_amount,
                            'rack_info'=>$value->rack_info,
                            'bin_info'=>$value->bin_info,
                            'inward_qty'=>$value->inward_qty,
                            'order_date' =>  date('d-m-Y', strtotime($value->order_date)),
                            'inward_date' =>  date('d-m-Y', strtotime($value->inward_date)),
                            

                        );
                        
                        
                      }
                        

                       $i++;


                     }

                    echo json_encode($array);

    }

    public function fetch_single_data()
    {
                        $output=array();
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $result= $this->Main_model->where_names($tablename,'id',$id);
                     foreach ($result as  $value) {

                      $output['id']= $value->id; 
                      $output['product_id']= $value->product_id; 
                      $output['vendor_id']= $value->vendor_id;
                      $output['po_number']= $value->po_number;
                      $output['price']= $value->price;
                      $output['coil_no']= $value->coil_no;
                      $output['vehicle_no']= $value->vehicle_no;
                     
                     if($value->inward_qty>0)
                     {
                         $output['qty']= $value->inward_qty;
                     }
                     else
                     {
                         $output['qty']= $value->qty;
                     }
                     
                      
                      
                      
                      $output['order_date']= $value->order_date;
                      $output['inward_date']= $value->inward_date;
                      $output['total_amount']= $value->total_amount;
                      $output['rack_info']= $value->rack_info;
                      $output['bin_info']= $value->bin_info;
                     
                        
                     }

                    echo json_encode($output);


    }
    
    
     public function fetch_single_data_product_burchase_base()
    {
                     $output=array();
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                    
                     
                     $queryss = $this->db->query("SELECT SUM(inward_qty) as inward_qty,qty FROM $tablename  WHERE stock_id='$id'");
                     $result = $queryss->result();
                     
                     
                     
                             foreach ($result as  $value) {
                                  
                                  
                                if($value->qty!='')
                                {
                                    $output['qty']= $value->qty-$value->inward_qty;
                          
                                }
                                else
                                {
                                    $output=array('qty'=>'');
                                }
                          
                               
                            
                              }
                     
                     
                     

                    echo json_encode($output);


    }
    
    
     public function fetch_data_purchase_details()
    {
                      
                     $output=array();
                     $id=$_GET['order_id'];
                     $result= $this->Main_model->where_names('purchase_orders_process','id',$id);
                     foreach ($result as  $value) {

                      $output['id']= $value->id; 
                      $output['arrival_date']= date('d-m-Y',strtotime($value->arrival_date)); 
                      $output['arrival_date1']= $value->arrival_date; 
                      $output['price_details']= $value->price_details;
                      $output['availability']= $value->availability;
                      
                      if($value->invoice_attachment=='0')
                      {
                           $output['invoice']=0;
                        
                      }
                      else
                      {
                         $output['invoice']= base_url().$value->invoice_attachment;
                        
                      }
                      
                      $company_name="";
                      $phone="";
                      $results= $this->Main_model->where_names('customers','id',$value->customer_id);
                      foreach ($results as  $values) {
                          $company_name=$values->company_name;
                          $phone=$values->phone;
                      }
                     
                       $output['company_name']= $company_name;
                       $output['phone']= $phone;
                        
                     }

                    echo json_encode($output);


    }
    
    
    
    
     public function fetch_data_purchase_details_by_sales()
    {
                      
                     $output=array();
                     $id=$_GET['product_order_id'];
                     $result= $this->Main_model->where_names('purchase_product_list_process','sale_purchase_op_id',$id);
                     foreach ($result as  $value) {

                      $output['id']= $value->id; 
                      $output['arrival_date']= date('d-m-Y',strtotime($value->arrival_date)); 
                      $output['arrival_date1']= $value->arrival_date; 
                      $output['price_details']= $value->rate;
                      $output['availability']= $value->availability;
                      
                        
                     }

                      echo json_encode($output);


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
    
    
    
    
    
    
    
    
    public function fileuplaod()
    {



        
        if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']) ; $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                         $ticket_id=$_GET['id'];
                      

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         
                         $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                         
                         if($imageFileType!='exe')
                         {
                             
                         
                         
                                     if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                                     {  
            
                                        
            
                                        $this->db->query("INSERT INTO product_attachemnt  (`product_id`,`attachment`)VALUES('".$ticket_id."','".$path."')");
            
                                     }
                         
                         
                         }


                   }
                   
            }
             
            

             
 
         }
         
             $output=array('1');
             echo json_encode($output);


    }
    
    
        public function fileuplaodtosaveimage()
    {
        
        
                                $form_data = json_decode(file_get_contents("php://input"));
                                
                                $product_id=$form_data->id;
                                $img = $form_data->imgeurl;

                           
                                if($img!="")
                                {
                               
                           

                                        
                                        define('UPLOAD_DIR', 'uploads/');
                                    
                                        $img = str_replace('data:image/png;base64,', '', $img);
                                        $img = str_replace(' ', '+', $img);
                                        $data = base64_decode($img);
                                        $file = UPLOAD_DIR . uniqid() . '.png';
                                        $success = file_put_contents($file, $data);
                                        print $success ? $file : 'Unable to save the file.';
                                        $this->db->query("INSERT INTO product_images  (`product_id`,`product_image`)VALUES('".$product_id."','".$file."')");
                                        
                            
                              }


    }
    
        public function productimagesave()
    {
        
            define('UPLOAD_DIR', 'uploads/');
            $img = $_POST['imgBase64'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . uniqid() . '.png';
            $success = file_put_contents($file, $data);
            print $success ? $file : 'Unable to save the file.';
        
    }
    
    
    public function fetch_data_table() {
        
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
        if ($search != "")
        {
            $where = " AND a.order_base='" . $order_base . "'  AND a.order_no LIKE '%" . $search . "%' OR b.name LIKE '%" . $search . "%' OR a.invoice_no LIKE '%" . $search . "%' OR a.po_number LIKE '%" . $search . "%' OR a.mark_request_to_sales LIKE '%" . $search . "%' OR v.name LIKE '%" . $search . "%'";
        }
        else
        {
            $where=" AND a.order_base='" . $order_base . "'";
        }


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
        
        


        $i = 1;
        $array = array();
      
      
      
      
           
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a LEFT JOIN admin_users as b ON a.user_id=b.id LEFT JOIN purchase_order_vendors as c ON a.id=c.order_id LEFT JOIN vendor as v ON v.id=c.vendor_id  WHERE a.deleteid='0'  $where GROUP BY a.id ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            $query = $this->db->query("SELECT a.* FROM $tablename as a LEFT JOIN admin_users as b ON a.user_id=b.id LEFT JOIN purchase_order_vendors as c ON a.id=c.order_id LEFT JOIN vendor as v ON v.id=c.vendor_id  WHERE a.deleteid='0'  $where GROUP BY a.id ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        
        
        
        $tablename_sub = "purchase_product_list_process";
        foreach ($result as $value) {
            $minisroundoff = $value->roundoff;
            $roundoffstatus = $value->roundoffstatus;
            $discount = $value->discount;
            $order_base = $value->order_base;
            
            $totalamount = 0;
            $commission = 0;
            $qtys=0;
            
            $counsget = $this->Main_model->where_names_two_order_by('purchase_order_quotation', 'order_id', $value->id, 'deleteid', '0', 'id', 'DESC');
            
            
            $counsgetquery = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE deleteid='0' AND order_id='" . $value->id . "'  GROUP BY vendor_id");
            $counsget = $counsgetquery->result();
            
            
            $resulttotal = $this->Main_model->where_names_two_order_by($tablename_sub, 'order_id', $value->id, 'deleteid', '0', 'id', 'DESC');
            
            
           $create_time= $value->create_time;
           
           
          $d1 = strtotime($create_time);
          $currenttime=date('h:i A');
          $d2 = strtotime($currenttime);
          $totalSecondsDiff = abs($d1-$d2);
          $totalHoursDiff   = $totalSecondsDiff/60/60;
          $totalmimis=$totalHoursDiff*60;


            
            foreach ($resulttotal as $tot) {
                
                
                 if($tot->rate_edit!=0)
                {
                     $tot->rate=$tot->rate_edit;
                    
                }
                
                if($tot->qty_edit!=0)
                {
                      $tot->qty=$tot->qty_edit;
                    
                }
                
                $totalamount+= $tot->qty*$tot->rate; 
                $qtys+=  round($tot->qty,2);
                
                
                
                
            }
            
            
            
           $totalextra=0;
            $querysssss = $this->db->query("SELECT a.extra,SUM(b.qty) as totalqty,SUM(a.price*b.qty) as totalamount FROM purchase_order_quotation as a JOIN purchase_product_list_process as b ON a.purchase_product_list_id=b.id WHERE a.order_id='".$value->id."' AND b.deleteid=0 AND a.selected_status=1 GROUP BY a.vendor_id");
            $resultss = $querysssss->result();
            foreach ($resultss as  $valuess) {
                             
                             if($valuess->totalqty=='')
                             {
                                 $valuess->totalqty=0;
                             }
                             
                               if($valuess->extra=='')
                             {
                                 $valuess->extra=0;
                             }
                             
                             $totalextra=$valuess->totalqty*$valuess->extra;
                             $totalextra_unit=$valuess->extra;
            }
                     
            $totalamount=$totalamount;
            $totalamountgat= $totalamount*18/100;
            $discountfulltotal = round($totalamount+$totalamountgat,2);
            
            
            
            
            
            
            
            
            
            
            
            
            
            
                           
            
            
            
            
            
            
            
            $order_by = "";
            $orderby = $this->Main_model->where_names_two_order_by('admin_users', 'id', $value->user_id, 'deleteid', '0', 'id', 'DESC');
            foreach ($orderby as $orderbyval) {
                $order_by = $orderbyval->name;
            }
            
             $vendorsname=array();
             $orderbyv = $this->Main_model->where_names('purchase_order_vendors', 'order_id', $value->id);
             foreach ($orderbyv as $orderbyvalv) {
                $vendor_id = $orderbyvalv->vendor_id;
                          
                           $tcs_status=0;
                           $vvs = $this->Main_model->where_names('vendor', 'id', $vendor_id);
                           
                           
                             foreach ($vvs as $vendor) {
                                  $tcs_status = $vendor->tcs_status;
                                 
                                           if($order_base>=2)
                                           {
                                               
                                               
                                               if($orderbyvalv->selected_status==1)
                                               {
                                                  
                                                   $vendorsname[]=$vendor->name;
                                                 
                                               }
                                               
                                           }
                                           else
                                           {
                                               
                                                    $vendorsname[]=$vendor->name;
                                                    
                                                 
                                           }
                                           
                              }
                         
                          
                           
                
            }
            
        
        
             
                                 
                                 if($tcs_status==1)
                                 {
                    
                                                $tcsamount=round($discountfulltotal*0.1/100);
                    
                                 }
                                 else
                                 {
                    
                    
                                                 $tcsamount=0;
                    
                    
                                 }
                                
                                
                                
                                $discountfulltotal=$discountfulltotal+$tcsamount;
        
        
            
            $vendors_names=implode(',', $vendorsname);
            
            $company_name = "";
            $email = "";
            $phone = "";
            $address = "";
            
            
           
           
           if($value->invoice_attachment=='0')
           {
                $invoice=0;
           }
           else
           {
               $invoice=base_url().$value->invoice_attachment;
           }
            
            
            
            if($value->order_base==9)
            {
                $value->create_date=$value->schedule_date;
                $value->create_time="";
            }
            
            
            
            if($order_base<=1)
            {
                
                $value->order_no=$value->order_no;
            }
            
            if($order_base>=2)
            {
                if($value->invoice_no!='')
                {
                    $value->order_no=$value->po_number;
                }
                else
                {
                    $value->order_no=$value->po_number;
                }
                
                
            }
            
            
            
           
            if($value->deleteid==0)
            {
                
            
            $array[] = array('no' => $i, 'invoice_id' => $value->invoice_id,'invoice_extra_unit_id' => $value->invoice_extra_unit_id,'invoice_no' => $value->invoice_no,'id' => $value->id,'mark_request_to_sales' => $value->mark_request_to_sales,'totalmimis'=>round($totalmimis),'totalmimishrs'=>round($totalmimis/60,2),'requestcount'=>count($counsget),'totalqty'=>round($qtys,2),'vendors_names'=>$vendors_names,'invoice' => $invoice, 'base_id' => base64_encode($value->id), 'priority' => $value->priority,'order_no' => $value->order_no, 'po_number' => $value->po_number,'invoice_no' => $value->invoice_no,'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal), 'commission' => round($commission), 'delivery_charge' => $value->delivery_charge, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time);
             $i++;
                
            }
           
            
            
            
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
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
       
        
        if ($search != "") {
            $where = " AND  a.po_number LIKE '%" . $search . "%' OR b.name LIKE '%" . $search . "%' OR a.vendor_id LIKE '%" . $search . "%' OR a.invoice_date LIKE '%" . $search . "%' OR a.create_date LIKE '%" . $search . "%'";
        }
        
        if($this->session->userdata['logged_in']['access'] !=1)
        {
             $sqls = " AND a.user_id='".$this->userid."'";
             $sqls1 = " AND user_id='".$this->userid."'";
        }
        
            $i = 1;
            $array = array();
            
          
            
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            $query = $this->db->query("SELECT a.*,b.name FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
           
        
        
        
        foreach ($result as $value) {
         
           
            
            $array[] = array('no' => $i, 'id' => $value->id,'order_by' => $value->name,'qty'=>$value->qty,'vendor_id'=>$value->vendor_id,'po_number' => $value->po_number, 'remarks' => $value->remarks, 'product_id' => $value->product_id,'create_date' => date('d-m-Y', strtotime($value->create_date)),'invoice_date' => date('d-m-Y', strtotime($value->invoice_date)),'update_date' => date('d-m-Y', strtotime($value->update_date)));
            $i++;
            
            
            
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
       
    public function fetch_data_invoice_table() {
        
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
       
        
        if ($search != "") {
            $where = " AND  a.invoice_no LIKE '%" . $search . "%' OR b.name LIKE '%" . $search . "%' OR a.po_number LIKE '%" . $search . "%' OR a.vendor_id LIKE '%" . $search . "%' OR a.invoice_date LIKE '%" . $search . "%' OR a.create_date LIKE '%" . $search . "%'";
        }
        
        if($this->session->userdata['logged_in']['access'] !=1)
        {
            $sqls = " AND a.user_id='".$this->userid."'";
             $sqls1 = " AND user_id='".$this->userid."'";
        }
        
            $i = 1;
            $array = array();
            
        
            
            $querycount = $this->db->query("SELECT a.id FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC");
            $resultcount = $querycount->result();
            $count=count($resultcount);
            
            
            
            $query = $this->db->query("SELECT a.*,b.name FROM $tablename as a JOIN admin_users as b ON a.user_id=b.id  WHERE a.deleteid='0' AND a.order_base='" . $order_base . "' $sqls $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
           
        
        
        
        foreach ($result as $value) {
         
           
             if($value->deleteid=='0')
             {
                 
            
           if($value->attachment=='0')
           {
               $value->attachment='#';
           }
           else
           {
               $value->attachment=base_url().$value->attachment;
           }
           
            $queryss = $this->db->query("SELECT SUM(qty) as qtyqty  FROM purchase_invoice_products  WHERE  c_id='" . $value->id . "' AND deleteid=0 ");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $value->qty = round($cc->qtyqty,2);
            }
            
            if($value->delivery_status==3)
            {
                $delivery_status="Partial Dispatch";
            }
            
            if($value->delivery_status==5)
            {
                $delivery_status="Full Dispatched";
            }
            if($value->delivery_status==6)
            {
                $delivery_status="Delivered";
            }
           
            $pendingamount=0;
            
            if($value->loading_charges>0)
            {
              $loading_charges=$value->loading_charges;
            }
            else
            {
              $loading_charges=0;
            }
            
            $invoice_amount= $value->invoice_amount+$loading_charges;
            if($value->payout_amount!='0')
            {
               $pendingamount= $invoice_amount-$value->payout_amount;
               
               //$invoice_amount= $invoice_amount-$value->payout_amount;
            }
            
            if($value->deleteid==0)
            {


if($value->invoice_no!='')
{



$this->db->query("UPDATE all_ledgers SET credits='".$invoice_amount."'  WHERE order_no='" .$value->invoice_no . "' AND party_type=3 AND notes='Purchase Invoice Create'");


}

            $array[] = array('no' => $i, 'id' => $value->id,'gst_amount' => $value->gst_amount,'extra_invoice_status' => $value->extra_invoice_status,'order_id' => base64_encode($value->order_id),'pending_amount' => round($pendingamount),'payout_amount' => $value->payout_amount,'delivery_status' => $value->delivery_status,'delivery_status_row' => $delivery_status,'invoice_no' => $value->invoice_no,'order_base' => $value->order_base,'invoice_amount' => $invoice_amount,'invoice_amount_data' => round($invoice_amount),'loading_charges' => $loading_charges,'attachment' => $value->attachment,'order_by' => $value->name,'qty'=>$value->qty,'vendor_id'=>$value->vendor_id,'po_number' => $value->po_number, 'remarks' => $value->remarks, 'product_id' => $value->product_id,'create_date' => date('d-m-Y', strtotime($value->create_date)),'invoice_date' => date('d-m-Y', strtotime($value->invoice_date)),'update_date' => date('d-m-Y', strtotime($value->update_date)));
            
            $i++;
            
            }
             }
            
            
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }
    
    
    
    
    
    
      public function getcount() {
        $tablename = $_GET['tablename'];
        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12')
        {
            $sales_team_id = array($this->userid);
            $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            
            
            $resultpending = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '0',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '1',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-1',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '2',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '3',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor_f = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '4',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor_res = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '9',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
         
         $payment_vendor_invoice = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '10',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
         
         
            $dispath = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '5',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '6',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC');
            $inward= $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '8',  'deleteid', '0', 'user_id', $sales_team_id,'id', 'DESC');
            $archive = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-3',  'deleteid', '0','user_id', $sales_team_id, 'id', 'DESC'); 
            
            
            
        }
        else
        {
            
              $resultpending = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor_f = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '4', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor_res = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '9', 'deleteid', '0', 'id', 'DESC');
            
            
            $payment_vendor_invoice = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '10', 'deleteid', '0', 'id', 'DESC');
            
            
            $dispath = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '5', 'deleteid', '0', 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '6', 'deleteid', '0', 'id', 'DESC');
            $inward = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '8', 'deleteid', '0', 'id', 'DESC');
            $archive = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'id', 'DESC');
            
        }
        $array = array('pending' => count($resultpending),'payment_vendor_invoice' => count($payment_vendor_invoice),'payment_vendor_res' => count($payment_vendor_res),'dispath' => count($dispath),'inward' => count($inward),'deliverd' => count($deliverd), 'payment_vendor_f' => count($payment_vendor_f),'proceed' => count($resultprocessed), 'cancel' => count($resultcancel), 'po' => count($resultrequestpo), 'payment_vendor' => count($payment_vendor),'archive' => count($archive));
        echo json_encode($array);
    }
    
    
    public function getcount_return() {
        $tablename = $_GET['tablename'];
        if ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12')
        {
            $sales_team_id = array($this->userid);
            $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            
            $resultpending = $this->db
                ->select('*')
                ->from($tablename)
                ->where_in('order_base', [0, 12])
                ->where('deleteid', 0)
                ->where('sales_id', $sales_team_id)
                ->order_by('id', 'DESC')
                ->get()
                ->result();

            // $resultpending = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '0,12',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '1',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-1',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '2',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '3',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor_f = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '4',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor_res = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '9',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
         
            $payment_vendor_invoice = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '10',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
         
         
            $dispath = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '5',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '6',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $inward= $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '8',  'deleteid', '0', 'sales_id', $sales_team_id,'id', 'DESC');
            $archive = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-3',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC'); 
            
            $resulttlapproval = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '11',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $resulttlapproved = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '12',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            $resultreturntoresale = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '13',  'deleteid', '0','sales_id', $sales_team_id, 'id', 'DESC');
            
            
        }
        else
        {
            $resultpending = $this->db
                ->select('*')
                ->from($tablename)
                ->where_in('order_base', [0, 12])
                ->where('deleteid', 0)
                ->order_by('id', 'DESC')
                ->get()
                ->result();
            //   $resultpending = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor_f = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '4', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor_res = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '9', 'deleteid', '0', 'id', 'DESC');
            
            
            $payment_vendor_invoice = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '10', 'deleteid', '0', 'id', 'DESC');
            
            
            $dispath = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '5', 'deleteid', '0', 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '6', 'deleteid', '0', 'id', 'DESC');
            $inward = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '8', 'deleteid', '0', 'id', 'DESC');
            $archive = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'id', 'DESC');

            $resulttlapproval = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '11', 'deleteid', '0', 'id', 'DESC');
            $resulttlapproved = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '12', 'deleteid', '0', 'id', 'DESC');
            $resultreturntoresale = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '13', 'deleteid', '0', 'id', 'DESC');
            
        }
        $array = array('pending' => count($resultpending),'payment_vendor_invoice' => count($payment_vendor_invoice),'payment_vendor_res' => count($payment_vendor_res),'dispath' => count($dispath),'inward' => count($inward),'deliverd' => count($deliverd), 'payment_vendor_f' => count($payment_vendor_f),'proceed' => count($resultprocessed), 'cancel' => count($resultcancel), 'po' => count($resultrequestpo), 'payment_vendor' => count($payment_vendor),'pending_tl_approval' => count($resulttlapproval),'tl_approved' => count($resulttlapproved),'request_return_resale' => count($resultreturntoresale),'archive' => count($archive));
        echo json_encode($array);
    }


    public function callbacksave() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        if ($form_data->remarks != '') {
            
            
            
            $tablenamemain = $form_data->tablenamemain;
            $findp['remarks'] = $form_data->remarks;
            
            
            
            $findp['filetype'] = $form_data->filetype;
            $findp['order_id'] = $form_data->order_id;
            $findp['user_id'] = $this->userid;
            $findp['vendor_id'] = $form_data->vendor_id;
            $insert_id = $this->Main_model->insert_commen($findp, $tablenamemain);
            
            
                                                      $results= $this->Main_model->where_names('purchase_orders_process','id',$form_data->order_id);
                                                      foreach ($results as  $values)
                                                      {
                                                         
                                                        $po_number= $values->po_number;
                                                         
                                                      }
            
            
                                                    $qtys=explode('|', $form_data->qty);
                                                    $product_ids_value=explode('|', $form_data->product_ids_value);
                                                    $vehicle_no_make_value=explode('|', $form_data->vehicle_no_make_value);
                                                    $dispath_date_make_value=explode('|', $form_data->dispath_date_make_value);
                                                    $char_value_make_value=explode('|', $form_data->char_value_make_value);
                                                    $description_make_value=explode('|', $form_data->description_make_value);
                                                    $remarks_data_make_value=explode('|', $form_data->remarks_data_make_value);
                                                    
                                                    
                                                    for($i=0;$i<count($qtys);$i++)
                                                    {
                                                        
                                                             $data_inward['vendor_id']=$form_data->vendor_id;
                                                             $data_inward['po_number']=$po_number;
                                                             $data_inward['user_id'] = $this->userid;
                                                             $data_inward['inward_date']= $dispath_date_make_value[$i];
                                                             $data_inward['vehicle_no']= $vehicle_no_make_value[$i];
                                                             $data_inward['char_value_make']= $char_value_make_value[$i];
                                                             $data_inward['description']= $description_make_value[$i];
                                                             $data_inward['remarks']= $remarks_data_make_value[$i];
                                                             $data_inward['remarks_id']= $insert_id;
                                                             
                                                             
                                                             
                                                             $result= $this->Main_model->where_names('purchase_product_list_process','id',$product_ids_value[$i]);
                                                             foreach ($result as  $value)
                                                             {
                                                                 
                                                                     $product_id=$value->product_id;
                                                                     $price=$value->rate;
                                                                     $qty=$value->qty;
                                                                     $amount=round($value->rate*$qtys[$i],2);
                                                                     
                                                                     
                                                                     $stockid=$value->purchase_order_product_id;
                                                                 
                                                                    
                                                            
                                                                     $data_inward['product_id']=$product_id; 
                                                                     $data_inward['price']=$price;
                                                                     $data_inward['qty']=$qty;
                                                                     $data_inward['inward_qty']=$qtys[$i];
                                                                     $data_inward['total_amount']=$amount;
                                                                     
                                                                     $data_inward['order_id']=$form_data->order_id;
                                                                     $data_inward['stock_id']=$product_ids_value[$i];
                                                                    
                                                                     if($qtys[$i]>0)
                                                                     {
                                                                         
                                                                    
                                                                     $this->db->query("UPDATE purchase_product_list_process SET modify_qty=modify_qty+'".$qtys[$i]."' WHERE id='".$product_ids_value[$i]."'");
                                                                     $res_id=$this->Main_model->insert_commen($data_inward,'purchase_order');
                                                                     
                                                                     
                                                                     }
                                                                             
                                                                 
                                                             }
            
                                                        
                                                        
                                                    }
                                                           
            
                                                
            
            
            
            
            
            
            $array = array('error' => '2', 'insert_id' => $insert_id, 'massage' => 'Remarks submitted');
            
            
            
            
            echo json_encode($array);
        } else {
            $array = array('error' => '1');
            echo json_encode($array);
        }
    }
    
    public function fileuplaodbyorder() {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            $filetype = $_GET['filetype'];
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
              $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                         
                         if($imageFileType!='exe')
                         {
            
                            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                                $point['get_id'] = $ticket_id;
                                $point['attachement'] = $path;
                                $point['filetype'] = $filetype;
                                $this->Main_model->update_commen($point, 'purchase_order_remarks');
                            }
                            
                         }
        }
        
        
        
        
        
    }
    
    
    
      public function fileuplaodbyorder_invoice() 
      {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            
           
                   $path = 'uploads/' . time() . $_FILES['file']['name'];
                   $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                      
                         if($imageFileType!='exe')
                         {
            
                                        if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                                            $point['get_id'] = $ticket_id;
                                            //$point['invoice_no'] = $invoiceno;
                                            $point['attachment'] = $path;
                                            $this->Main_model->update_commen($point, 'purchase_invoice');
                                        }
                                        
            
                         }
        }
        
        
        
        
        
    }
    
    
    
    public function fileuplaodbyorder_set() {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            $filetype = $_GET['filetype'];
            $ticket_id=explode('|', $ticket_id);
            
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
            
            $imageFileType = strtolower(pathinfo($path,PATHINFO_EXTENSION));
                         
                         if($imageFileType!='exe')
                         {
            
                                if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                                    
                                    
                                    for($i=0;$i<count($ticket_id);$i++)
                                    {
                                             $point['get_id'] = $ticket_id[$i];
                                             $point['attachement'] = $path;
                                             $this->Main_model->update_commen($point, 'purchase_order_quotation');
                                    
                                    }
                                    
                                  
                                }
            
            
                         }
        }
        
        
        
        
        
    }
    
    
    
    public function purchase_order_remarks_history()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_order_remarks', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                    
                     foreach ($result as  $value) {
                         
                           $name="";
                           $email="";
                           $phone="";
                           $gst="";
                           $address="";
                              
                              if($vendorid==$value->vendor_id)    
                              {
                                           $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                                            foreach ($resultp as  $valuep) {
                                             
                                             $name=$valuep->name;
                                             $email=$valuep->email;
                                             $phone=$valuep->phone;
                                             $gst=$valuep->gst;
                                             
                                          }
                                          
                               
                                           $attachement='';
                                           if($value->attachement!='')
                                           {
                                               $attachement=base_url().$value->attachement;
                                           }
                                           
                                            $subarray=array();
                                            //$resultpf= $this->Main_model->where_names('purchase_order','remarks_id',$value->id);
                                            
                                            
                                            $resultpf =$this->Main_model->where_names_two_order_by('purchase_order', 'remarks_id', $value->id, 'deleteid', 0, 'id', 'DESC');
                                             $payment_status_id=0;
                                            foreach ($resultpf as  $valuepf)
                                            {
                                             
                                                     $payment_status='Invoice Created';
                                                     if($valuepf->payment_status=='0')
                                                     {
                                                         $payment_status='Invoice Not Created';
                                                     }
                                             $payment_status_id=$valuepf->payment_status;
                                             
                                                $pro= $this->Main_model->where_names('purchase_product_list_process','id',$valuepf->stock_id);
                                                foreach ($pro as  $set)
                                                {
                                                    $product_name=$set->product_name;
                                                }
                                             
                                               $subarray[]=array(
                                                   
                                                   'product_name'=>$product_name,
                                                   'inward_qty'=>$valuepf->inward_qty,
                                                   'qty'=>$valuepf->qty,
                                                   'id'=>$valuepf->id,
                                                   'no'=>'',
                                                   'inward_date'=>date('d-m-Y',strtotime($valuepf->inward_date)),
                                                   'order_date'=>date('d-m-Y',strtotime($valuepf->order_date)),
                                                   'char_value_make'=>$valuepf->char_value_make,
                                                   'description'=>$valuepf->description,
                                                   'remarks'=>$valuepf->remarks,
                                                   'payment_status'=>$payment_status,
                                                   'payment_status_id'=>$valuepf->payment_status,
                                                   
                                                   
                                               );
                                             
                                          }
                                          
                                           
                                           
                                           
                                           
                                            $array[] = array(
                                            
                                            'no' => $i, 
                                            'id' => $value->id,
                                            'order_id' => $value->order_id, 
                                            'vendor_id' => $value->vendor_id,
                                            'remarks' => $value->remarks, 
                                            'attachement' => $attachement, 
                                            'filetype' => $value->filetype,
                                            'payment_status_id' => $payment_status_id,
                                            'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                            'subarray' => $subarray,
                                            );
                        
                          }

                       $i++;


                     }

                    echo json_encode($array);

    }
    public function genratelink()
    {
        
        
                            $form_data = json_decode(file_get_contents("php://input"));
                            $order_id= $form_data->order_id;
        
                             $resultp= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                             foreach ($resultp as  $valuep) {
                             $vendor_id=$valuep->vendor_id;
                             
                             
                                 $link="index.php/purchase/vendor_page?order_id=".base64_encode($order_id)."&vendor_id=".base64_encode($vendor_id);
                                 $query = $this->db->query("UPDATE  `purchase_order_vendors` SET link='".$link."'  WHERE order_id='" . $order_id . "' AND vendor_id='".$vendor_id."'");
                             
                             
                             }
        
        
        
    }
    
    public function vendorpriceupdate() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
        
        
     
        
        $price=explode('|', $form_data->price);
        $purchase_product_list_ids=explode('|', $form_data->purchase_product_list_ids);
        
        
        
        
        if ($form_data->price != '') {
            
            
            
            $tablenamemain = $form_data->tablename;
            
            $insert_id=array();
            for($i=0;$i<count($purchase_product_list_ids);$i++)
            {        
                
                
                       if($price[$i]!='')
                       {
                        
                        $attachement="";   
                        $qt =$this->Main_model->where_names_two_order_by($tablenamemain, 'order_id', $form_data->order_id, 'vendor_id', $form_data->vendor_id, 'id', 'DESC');
                        foreach($qt as $datas)
                        {
                            $attachement=$datas->attachement;
                        }
                   
                        $this->db->query("DELETE FROM $tablenamemain  WHERE order_id='".$form_data->order_id."' AND vendor_id='".$form_data->vendor_id."' AND purchase_product_list_id='".$purchase_product_list_ids[$i]."'");
                        
                        $findp['remarks'] = $form_data->remarks;
                        $findp['price'] = $price[$i];
                        $findp['extra_included'] = $form_data->extra_included;
                        $findp['timeline'] = $form_data->timeline;
                        $findp['payment_terms'] = $form_data->payment_terms;
                        $findp['attachement'] = $attachement;
                        $findp['due_date'] = $form_data->due_date;
                        $findp['extra'] = $form_data->extra;
                        $findp['order_id'] = $form_data->order_id;
                        $findp['vendor_id'] = $form_data->vendor_id;
                        $findp['purchase_product_list_id'] = $purchase_product_list_ids[$i];
                        $insert_id[] = $this->Main_model->insert_commen($findp, $tablenamemain);
                        
                        
                        
                        $this->Main_model->insert_commen($findp, 'purchase_order_quotation_vendor_history');
                        
                        
                       }
                        
            
            }
             
             $iddata=implode('|',$insert_id);
             
            
            $array = array('error' => '2', 'insert_id' => $iddata, 'massage' => 'Price Quotation Submitted');
            echo json_encode($array);
        } else {
            $array = array('error' => '1');
            echo json_encode($array);
        }
    }
    
    
    
        public function order_quotation_request_select() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
          
            $this->db->query("UPDATE   purchase_order_vendors SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            $this->db->query("UPDATE   purchase_order_quotation SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            
            
            $this->db->query("UPDATE   purchase_order_quotation SET selected_status=1 WHERE vendor_id='".$form_data->vendor_id."' AND order_id='".$form_data->order_id."'");
            $this->db->query("UPDATE   purchase_order_vendors SET selected_status=1  WHERE vendor_id='".$form_data->vendor_id."' AND order_id='".$form_data->order_id."'");
            
            
            
       $reswgetpriceupdate =$this->Main_model->where_names_two_order_by('purchase_order_quotation','order_id',$form_data->order_id,'vendor_id',$form_data->vendor_id,'id','ASC');
       foreach($reswgetpriceupdate as $vals)
       {
                
                  $purchase_product_list_id=$vals->purchase_product_list_id;
                  $price=$vals->price;
                  $this->db->query("UPDATE   purchase_product_list_process SET rate='".$price."' WHERE  id='".$purchase_product_list_id."'");
            
                                                                  
       }
            
            
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$form_data->vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
            
            
                                                                 $tablename_driver_ledger='all_ledgers';
                                                                 $this->db->query("DELETE FROM $tablename_driver_ledger  WHERE order_id='".$form_data->order_id."' AND party_type='3'");
                                                                
                                                                
                                                                
                                                                
                                                                 $resw = $this->Main_model->where_names('purchase_product_list_process','order_id',$form_data->order_id);
                                                                 $valsqtyprice=0;
                                                                 foreach($resw as $vals)
                                                                 {
                                                                       $order_no=$vals->order_no;
                                                                       $valsqtyprice+=$vals->qty*$vals->rate;
                                                                 }
                                                                 
                                                                 
                                                                 $valsqtyprice=$form_data->amount;
            
                                                              
                                                                 
                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                 
                                                                
                                                                
                                                                $data_driver['order_id']=$form_data->order_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='Cash';
                                                                $data_driver['notes']='Purchase Request';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$order_no;
                                                                $data_driver['amount']=$valsqtyprice;
                                                                $data_driver['reference_no']=$order_no;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=0;
                                                                $data_driver['credits']=$valsqtyprice;
                                                                $data_driver['balance']=$balancetotal+$valsqtyprice;
                                                                $data_driver['bank_id'] = 25;
                                                                
                                                                
                                                                
                                                                
                                                              
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                
                                                                
                                                                
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $data_driver['order_trancation_status'] = 3;
                                                                //$this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
            
            
            
            
            
            
            
            
           
           
            $array = array('error' => '2', 'insert_id' => 1, 'massage' => 'Price Quotation Seletced');
            echo json_encode($array);
        
    }
    
    
    
    
    
    
    
    
    
        public function purchase_order_payment_history()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_payout', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                    
                     foreach ($result as  $value) {
                         
                             $bankname="";
                             $resultp= $this->Main_model->where_names('bankaccount','id',$value->bankaccount);
                             foreach ($resultp as  $valuep) {
                             $bankname=$valuep->bankname;
                             }
                             
                             
                             
                             
                             if($value->payment_type=='Schedule Payment')
                             {
                                 $schedule_date=date('d-m-Y',strtotime($value->schedule_date));
                             }
                             else
                             {
                                 $schedule_date="";
                             }
                             
                             
                            
                            $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id,
                            'order_id' => $value->order_id, 
                            'vendor_id' => $value->vendor_id,
                            'notes' => $value->notes, 
                            'amount' => $value->amount,
                            'delivery_status' => $value->delivery_status,
                            'partial_qty' => $value->partial_qty,
                            'payment_type' => $value->payment_type,
                            'payment_mode' => $value->payment_mode,
                            'bankname' => $bankname,
                            'schedule_date' => $schedule_date,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)),
                            'create_date' => date('d-m-Y',strtotime($value->create_date))
                            );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
        public function purchase_order_delevery_history()
    {
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_delivery_history', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                    
                     foreach ($result as  $value) {
                         
                            $array[] = array(
                            
                            'no' => $i, 
                            'id' => $value->id,
                            'order_id' => $value->order_id, 
                            'vendor_id' => $value->vendor_id,
                            'notes' => $value->notes, 
                            'status' => $value->status_name, 
                             'create_date' => date('d-m-Y',strtotime($value->update_date))
                            );
                        
                        

                       $i++;


                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
        public function payment_save() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
        
        
        
        
                                                                       if($form_data->payment_type=='Full')
                                                                       {
                                                                            
                                                                            $this->db->query("UPDATE purchase_orders_process SET order_base=4,reason='Full Payout' WHERE id='".$form_data->order_id."'");
                                                                           
                                                                       }
                                                                       elseif($form_data->payment_type=='Schedule Payment')
                                                                       {
                                                                            
                                                                            $this->db->query("UPDATE purchase_orders_process SET order_base=9,reason='Schedule Payment',schedule_date='".$form_data->schedule_date."' WHERE id='".$form_data->order_id."'");
                                                                           
                                                                       }
                                                                       else
                                                                       {
                                                                           $this->db->query("UPDATE purchase_orders_process SET order_base=3,reason='Partial Payout & Dispatch' WHERE id='".$form_data->order_id."'");
                                                                         
                                                                       }
                                                                       
                                                                       
                                                                       
                                                                       if($form_data->delivery_status==5)
                                                                       {
                                                                           //$this->db->query("UPDATE purchase_orders_process SET order_base=5,reason='Full Dispatched' WHERE id='".$form_data->order_id."'");
                                                                         
                                                                       }
                                                                       
                                                                       if($form_data->delivery_status==6)
                                                                       {
                                                                          // $this->db->query("UPDATE purchase_orders_process SET order_base=6,reason='Full Delivered' WHERE id='".$form_data->order_id."'");
                                                                         
                                                                       }
                                                                       
                                                                   
                                                                   
                                                                        $payout['order_id']=$form_data->order_id;
                                                                        $payout['user_id']=$this->userid;
                                                                        $payout['notes']=$form_data->notes;
                                                                        $payout['payment_mode']=$form_data->payment_mode_payoff;
                                                                        $payout['payment_type']=$form_data->payment_type;
                                                                        $payout['amount']=$form_data->amount;
                                                                        $payout['bankaccount']=$form_data->bankaccount;
                                                                        $payout['vendor_id']=$form_data->vendor_id;
                                                                        $payout['schedule_date']=$form_data->schedule_date;
                                                                        
                                                                        $payout['partial_qty']=$form_data->partial_qty;
                                                                        $payout['payment_date']=$form_data->payment_date;
                                                                        $payout['delivery_status']=$form_data->delivery_status;
                                                                        
                                                                        $insertid=$this->Main_model->insert_commen($payout,'purchase_payout');
            
            
            
          
           
           
           
           
           
           
           
           
           
           
           
           
            
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$form_data->vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
            
            
                                                                 $tablename_driver_ledger='all_ledgers';
                                                            
            
                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                
                                                                
                                                                
                                                                  $bankaccount=$form_data->bankaccount;            
                                                                  $account_no="";
                                                                  $bank_name="";
                                                                  $bid="";
                                                                  if($bankaccount!='0')
                                                                  {
                                                                      
                                                                      
                                                                      
                                                                                             $resbankaccount = $this->Main_model->where_names('bankaccount','id',$bankaccount);
                                                                                             foreach($resbankaccount as $valb)
                                                                                             {
                                                                                                  $bid=$valb->id;
                                                                                                  $bank_name=$valb->bank_name;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_heads_id_by_bank=$valb->account_heads_id;
                                                                                                  $account_heads_id_by_bank_2=$valb->account_heads_id_2;
                                                                                             }
                                                                         
                                                                                             $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bankaccount,'deleteid','0','id','ASC');
                                                                                           
                                                                                             $bankbalancetotal=0;
                                                                                             $bankdebitsamount=0;
                                                                                             $bankcreditsamount=0;
                                                                                             foreach($res as $val)
                                                                                             {
                                                                                                 $bankpayid=$val->id;
                                                                                                 $bankdebitsamount+=$val->debit;
                                                                                                 $bankcreditsamount+=$val->credit;
                                                                                                 $bankbalancetotal=$val->balance;
                                                                                             }
                                                                                             
                                                                                     
                                                                                            $bankbalancetotal=$bankcreditsamount-$bankdebitsamount;
                                                                         
                                                                                            $data_bank['bank_account_id']=$bid;
                                                                                            $data_bank['ex_code']=$form_data->notes;
                                                                            
                                                                                            if($bankbalancetotal==0)
                                                                                             {   
                                                                                                       $data_bank['balance']='-'.$form_data->amount;
                                                                                             }
                                                                                             else
                                                                                             {
                                                                                                       
                                                                                                       $data_bank['balance']=$bankbalancetotal-$form_data->amount;
                                                                                              }
                                                                            
                                                                            
                                                                            
                                                                                            $data_bank['debit']=$form_data->amount;
                                                                                            $data_bank['credit']=0;
                                                                                            $data_bank['name']=$company_name;
                                                                                            $data_bank['create_date']=$form_data->payment_date;
                                                                                            $data_bank['deletemod']='PY'.$insertid;
                                                                                            $data_bank['status_by']='Purchase Payout';
                                                                                            
                                                                                            
                                                                                             if($bid==24)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=106;
                                                                                                 $data_bank['account_heads_id_2']=106;
                                                                                            }
                                                                                            elseif($bid==25)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=105;
                                                                                                 $data_bank['account_heads_id_2']=105;
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                
                                                                                                 $data_bank['account_head_id']=107;
                                                                                                 $data_bank['account_heads_id_2']=107;
                                                                                                
                                                                                            }
                                                                                            
                                                                                            
                                                                                            $data_bank['party_type'] = 4;
                                                                                            $insertbank=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                              
                                                                  }
                                                                  
                                                                 
                                                                
                                                                
                                                                
                                                             
            
                                                                
                                                                $data_driver['order_id']=$form_data->order_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']=$form_data->payment_mode_payoff;
                                                                $data_driver['notes']=$form_data->notes;
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->order_no;
                                                                $data_driver['amount']=$form_data->amount;
                                                                $data_driver['reference_no']=$form_data->order_no;
                                                                $data_driver['party_type']=3;
                                                                //$data_driver['deletemod']='PY'.$insertid;
                                                                $data_driver['deletemod']='PY'.$insertbank;
                                                                $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");
                                                                
                                                                
                                                                
                                                                $data_driver['debits']=$form_data->amount;
                                                                $data_driver['credits']=0;
                                                                $data_driver['balance']=0;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$form_data->payment_date;
                                                                $data_driver['payment_time']=$time;
                                                                $data_driver['bank_id']=$form_data->bankaccount;
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $data_driver['order_trancation_status'] = 3;
                                                                
                                                                if($bankaccount!='0')
                                                                {
                                                                    
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                                                                
                                                                }
                                                                
                                                                
                                                                
                                                                
            
            
            
           
            $array = array('error' => '2', 'insert_id' => $insertid, 'massage' => 'Payout Success');
            echo json_encode($array);
        
    }
    
    
    
    
        public function delivery_save() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
        
        if($form_data->delivery_status==5)
        {
            $rs=$form_data->notes." Dispatched";
            $rs1="Dispatched";
        }
        elseif($form_data->delivery_status==3)
        {
            $rs=$form_data->notes." Partial Payout & Dispatched";
            $rs1="Partial Payout & Dispatched";
        }
        else
        {
            $rs=$form_data->notes." Delivered";
            $rs1="Delivered";
        }
        
        
        
          $payout['order_id']=$form_data->order_id;
          $payout['user_id']=$this->userid;
          $payout['notes']=$form_data->notes;
          $payout['status']=$form_data->delivery_status;
          $payout['status_name']=$rs1;
          $payout['update_date']=$form_data->delivery_date;
          $payout['vendor_id']=$form_data->vendor_id;
          $insertid=$this->Main_model->insert_commen($payout,'purchase_delivery_history');
            
        
        
        
        
        $this->db->query("UPDATE purchase_orders_process SET order_base='".$form_data->delivery_status."',reason='".$rs1."' WHERE id='".$form_data->order_id."'");
          
        $array = array('error' => '2', 'insert_id' => 1, 'massage' => 'Status Updated');
        echo json_encode($array);
        
    }
    
    
   public function fetch_data_purchase_details_save() 
   {
      
       
       $name= $_GET['name'];
       $value= $_GET['value'];
       $order_id= $_GET['order_id'];
       
       $sql= "UPDATE purchase_orders_process SET $name='".$value."' WHERE id='".$order_id."'";
       
       $this->db->query($sql);
       
       
       $sql1= "UPDATE purchase_product_list_process SET $name='".$value."' WHERE order_id='".$order_id."'";
       
       $this->db->query($sql1);
                                    
       
   }
   
   
    public function saveresonchosevendor() 
   {
      
       
       $vendor_id= $_GET['vendor_id'];
       $value= $_GET['value'];
       $order_id= $_GET['order_id'];
       $sql1= "UPDATE purchase_order_vendors SET reason_for_choosing_suppliers='".$value."' WHERE order_id='".$order_id."' AND vendor_id='".$vendor_id."'";
       $this->db->query($sql1);
                                    
       
   }
    
   public function purchase_order_request() 
   {
            
                date_default_timezone_set("Asia/Kolkata");
                $date = date('Y-m-d');
                $time = date('h:i A');
                $form_data = json_decode(file_get_contents("php://input"));
              
                $order_product_id=$form_data->order_product_id;
                $order_product_id=explode('|',$order_product_id);
                
                
                                        $resultpss= $this->Main_model->where_names($form_data->tablenamemain,'id',$form_data->order_id);
                                        foreach ($resultpss as  $valuepss) {
                                            
                                            $customer_id=$valuepss->customer_id;
                                        }
                            
                
                                        $tablename = 'purchase_orders_process';
                                        $basedata['count_id'] = 1;
                                        $basedata['create_date'] = $date;
                                        $basedata['create_time'] = $time;
                                        $basedata['user_id'] = $this->userid;
                                        $basedata['entry_user_id'] = $this->userid;
                                        
                                        $basedata['arrival_date'] = $form_data->arrival_date;
                                        $basedata['price_details'] = $form_data->price_details;
                                        $basedata['availability'] = $form_data->availability;
                                        $basedata['customer_id'] = $customer_id;
                                        
                                        
                                        
                                        
                                    
                                        $neworder_quotation_id = 1;
                                        $order_last_count = $this->Main_model->order_last_count_users($tablename, $this->userid);
                                        foreach ($order_last_count as $r) {
                                            $neworder_quotation_id = $r->count_id + 1;
                                        }
                                        $neworder_id = 1;
                                        $order_last_count = $this->Main_model->order_last_count($tablename);
                                        foreach ($order_last_count as $r) {
                                            $neworder_id = $r->id + 1;
                                        }
                                        
                                        $neworder_id_set = 1;
                                        $order_last_count = $this->Main_model->order_last_count_mounth_year('purchase_orders_process');
                                        foreach ($order_last_count as $r)
                                        {
                                                                              
                                            $neworder_id_set = $r->id + 1;
                                         
                                        }
                                        
                                        
                                        //$basedata['id'] = $neworder_id;
                                        if ($tablename == 'orders_process') 
                                        {
                                            $order_no = $neworder_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
                                            
                                            
                                        } 
                                        else 
                                        {
                                            $order_no = $neworder_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
                                           
                                            
                                        }
                                        
                                        $basedata['month'] = date('M');
                                        $basedata['year'] = date('Y');
                                        $basedata['order_no'] = $order_no;
                                        $basedata['count'] = $neworder_id_set;
                                        $basedata['mark_request_to_sales'] = $form_data->order_no;
                                        
                                       

                                        
                                        
                                        
                                         $reviworder = $this->Main_model->where_names_two_order_by($tablename, 'mark_request_to_sales', $form_data->order_no, 'order_base!=', '-1', 'id', 'ASC');
                                         if(count($reviworder)==0)
                                         {
                                             
                                               $insertid = $this->Main_model->insert_commen($basedata, $tablename);
                
                                             
                                         }
                                         else
                                         {
                                             foreach($reviworder as $val)
                                             {
                                                 $insertid=$val->id;
                                             }
                                         }
                                        
                                       
                
                
                                        
                
                for($i=0;$i<count($order_product_id);$i++)
                {
                    
               
                
                
               
                            $resultp= $this->Main_model->where_names($form_data->tablename_sub,'id',$order_product_id[$i]);
                            foreach ($resultp as  $valuep) {
                                        
                                        
                                         $order_id=$valuep->order_id;
                                         $product_id=$valuep->product_id;
                                         $product_name=$valuep->product_name;
                                         $categories_name=$valuep->categories_name;
                                         $categories_id=$valuep->categories_id;
                                         $qty=$valuep->qty;
                                         $rate=$valuep->rate;
                                         $unit_p=$valuep->uom;
                                       
                                         
                                         
                                        
                            }
                            
                           
                            
                                                  $product_uom='';
                                                  $product = $this->Main_model->where_names('product_list', 'id', $product_id);
                                                  foreach ($product as $products) {

                                                                $product_uom=$products->uom;
                                                  }

                                        
                            
                            
                            $tablename_sub=$form_data->tablename_sub;
                            $tablenamemain=$form_data->tablenamemain;
                            
                            
                     $purchase_product_list_process = $this->Main_model->where_names_three_order_by('purchase_product_list_process', 'sale_purchase_op_id', $order_product_id[$i],'product_id', $product_id, 'sale_purchase_o_no', $form_data->order_no, 'id', 'ASC');
                     if(count($purchase_product_list_process)==0)
                     {
                               
                                     
                            
                      
                                        $basedataproduct['sale_purchase_op_id'] = $order_product_id[$i];
                                        $basedataproduct['sale_purchase_o_no'] = $form_data->order_no;
                                        $basedataproduct['order_no'] = $order_no;
                                        $basedataproduct['order_id'] = $insertid;
                                        $basedataproduct['product_id'] = $product_id;
                                        $basedataproduct['product_name'] = $product_name;
                                        $basedataproduct['categories_name'] = $categories_name;
                                        $basedataproduct['categories_id'] = $categories_id;
                                        
                                            if($product_uom=='Nos')
                                            {

                                                                
                                                            $basedataproduct['uom'] = 9;
                                                            $basedataproduct['unit'] = 9;

                                            }
                                            else
                                            {


                                                            $basedataproduct['uom'] = $unit_p;
                                                            $basedataproduct['unit'] = $unit_p;

                                            }
                                                            
                                       
                                        
                                        
                                        $basedataproduct['qty'] = $qty;
                                        $basedataproduct['rate'] = 0;
                                        $this->Main_model->insert_commen($basedataproduct, 'purchase_product_list_process');
                                        
                                        
                                        $this->db->query("UPDATE $tablename_sub SET purchase_request=1,purchase_id='".$insertid."' WHERE id='".$order_product_id[$i]."'");
                                        $this->db->query("UPDATE $tablenamemain SET purchase_request=1,purchase_id='".$insertid."' WHERE id='".$order_id."'");
                                       // $this->db->query("UPDATE purchase_orders_process SET customer_id='".$customer_id."' WHERE id='".$insertid."'");
                                    
                            
                        }    
                            
                            
                            
                            
                }           
                            
                
               
                
            
   }
    
    
    
    public function order_quotation_request_po() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
                     $order_base=0;
                     $setvv=$this->Main_model->where_names('purchase_orders_process', 'id', $form_data->order_id);
                     foreach($setvv as $vl)
                     {
                            $order_base=$vl->order_base;
                            $count=$vl->count;
                            if($count=='')
                            {
                                $count=$vl->id;
                            }
                            
                     }
                     $vendor_id='0';
                     $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$form_data->order_id);
                     foreach ($result as  $value)
                     {
                          if($value->selected_status==1)
                          {
                             $vendor_id= $value->vendor_id; 
                                  
                          }
                     }
                     $po_number='';
                     $resultss= $this->Main_model->where_names('vendor','id',$vendor_id);
                     foreach ($resultss as  $valuep)
                     {
                           $firstletter = substr($valuep->name, 0, 3);
                           $firstletter = trim($firstletter);
                           $firstletter=str_replace(" ", "", $firstletter);

                           $po_number=$firstletter.'/'.$count.'/' . strtoupper(date('M')).'/' . date('Y');
                         
                     }
            
            
            
            
            if($order_base=='1')
            {
                 $this->db->query("UPDATE   purchase_orders_process SET order_base=2,reason='PO Generated',priority='".$form_data->priority."',po_number='".$po_number."' WHERE id='".$form_data->order_id."'");
                 
            }
            else
            {
                 $this->db->query("UPDATE   purchase_orders_process SET priority='".$form_data->priority."',po_number='".$po_number."' WHERE id='".$form_data->order_id."'");
                 
            
            }
            
            $this->db->query("UPDATE   purchase_invoice SET po_number='".$po_number."' WHERE order_id='".$form_data->order_id."'");
            
            $array = array('error' => '2', 'insert_id' => $form_data->order_id, 'massage' => 'PO Generated');
            echo json_encode($array);
        
    }
    
    
    
    
    
    
    
    
    
      public function po() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
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
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '0' . $neworder_quotation_id;
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
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $data['order_id'], 'id', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'PO ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/po', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
     public function invoice() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
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
            $data['order_title'] = 'Purchase Invoice';
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
                $neworder_quotation_id = '0' . $neworder_quotation_id;
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
            
            
            
            $data['invoice_id']=$_GET['invoice_id'];
            $data['invoice_no']=$_GET['invoice_no'];
            
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $data['order_id'], 'id', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Purchase Invoice ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/invoive', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    public function invoice_extra() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
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
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '0' . $neworder_quotation_id;
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
            
            
            
            $data['invoice_id']=$_GET['invoice_id'];
            $data['invoice_no']=$_GET['invoice_no'];
            
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $data['order_id'], 'id', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/invoive_extra', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    public function dc() {
        if (isset($this->session->userdata['logged_in'])) {
            
            $dc_id=$_GET['dc_id'];
            
           
            $data['purchase_order_return'] = $this->Main_model->where_names_order_by('purchase_order_return', 'id', $dc_id, 'id', 'ASC');
           
            $data['vendor'] = $this->Main_model->where_names_order_by('vendor', 'deleteid', 0, 'id', 'ASC');
            
            $data['product_list'] = $this->Main_model->where_names_order_by('product_list', 'deleteid', 0, 'id', 'ASC');
            
            $data['active'] = 'customer_1';
            $data['title'] = 'DC ';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/dc', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
      public function po_edit() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
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
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '0' . $neworder_quotation_id;
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
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $data['order_id'], 'id', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/po_edit', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
      public function po_inward() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
            $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            
            $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
            
            $data['enable_order'] = $_GET['order_id'];
          
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
            $data['order_id'] = $_GET['order_id'];
          
            
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/po_inward', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      public function fetchVendor()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $id=$form_data->order_id;
                     $output=array();
                     $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$id);
                     foreach ($result as  $value) {
                          
                          
                          
                                 if($value->selected_status==1)
                                 {
                                     
                               
                                 $vendor_id= $value->vendor_id; 
                                  
                                 }
                                 
                                 
                     
                        
                     }
                     
                     $resultss= $this->Main_model->where_names('vendor','id',$vendor_id);
                     foreach ($resultss as  $valuep)
                     {
                           $output['name']=$valuep->name;
                           $output['vendor_id']=$vendor_id;
                           $output['phone']=$valuep->phone;
                           $output['email']=$valuep->email;
                           $output['gst']=$valuep->gst;
                           $output['address']=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                         
                     }

                    echo json_encode($output);


    }
    
    
    public function fetch_data_purchase() {
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
        }
        $result = $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0  ORDER BY sort_id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            $amountdata = $value->rate * $value->qty;
            $amount = $amountdata + $value->commission;
            $amountdata_edit = $value->rate_edit * $value->qty_edit;
            
            if($amountdata_edit==0)
            {
                $amountdata_edit=$amount;
            }
           
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
                if($csval->purchase_name!='')
                {
                  $product_name = $csval->purchase_name;
                }
                
               
                
                
                
                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                $kg_price = $csval->kg_price;
                $og_price = $csval->price;
                $stock = round($csval->stock, 3);
                $og_formula = $csval->formula;
                $kg_formula2 = $csval->formula2;
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '26') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 1;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                } else {
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
            $qty = round($value->qty, 2);
            if ($convert == 1) {
                $qty = round($value->qty, 3);
            }
            if ($convert == 2) {
                $qty = round($value->qty * 10.764, 2);
            }
            if ($convert == 'undefined') {
                $qty = round($value->qty, 2);
            }
            $profile = $value->profile;
            $crimp = $value->crimp;
            if ($value->base_id == "") {
                $value->base_id = 1;
            }
            $imagestatus = 1;
            if ($value->reference_image == '') {
                $imagestatus = 0;
            }
            if ($value->gst == '') {
                $value->gst = $gst;
            }
            if ($value->count_id != '') {
                $count_id = $value->count_id;
            } else {
                $count_id = $i;
            }
            
            
            
            if($value->rack_info=='0')
            {
                $value->rack_info='Select';
            }
            
            if($value->bin_info=='0')
            {
                $value->bin_info='Select';
            }
            
            if($value->qty_edit==0)
            {
                $value->qty_edit=$value->qty;
            }
            
             if($value->rate_edit==0)
            {
                $value->rate_edit=$value->rate;
            }
            
            $array[] = array('no' => $count_id, 'id' => $value->id, 'same' => $same, 'imagestatus' => $imagestatus, 'order_id' => $value->order_id,'rack_info' => $value->rack_info,'bin_info' => $value->bin_info,'purchase_request' => $value->purchase_request,'purchase_id' => $value->purchase_id, 'product_name_tab' => $product_name, 'tile_material_name' => $value->tile_material_name, 'tile_material_id' => $value->tile_material_id, 'categories' => $categories, 'type' => $type, 'description' => $description, 'product_id' => $value->product_id, 'qty_edit' => $value->qty_edit,'rate_edit' => $value->rate_edit, 'categories_id' => $value->categories_id, 'specifications' => $value->specifications, 'profile_tab' => $profile, 'crimp_tab' => $crimp, 'checked' => $value->checked, 'dim_two' => $value->dim_two, 'dim_one' => $value->dim_one, 'dim_three' => $value->dim_three, 'image_length' => $value->image_length, 'gst' => $value->gst, 'gst_check' => $value->gst_check, 'extra_crimp' => $value->extra_crimp, 'back_crimp' => $value->back_crimp, 'proudtcion_no' => $value->proudtcion_no, 'nos_tab' => $value->nos, 'unit_tab' => $value->unit, 'return_status' => $value->return_status, 'fact_tab' => $value->fact, 'uom' => $value->uom, 'base_id' => $value->base_id, 'stock' => $stock, 'kg_price' => $kg_price, 'og_price' => $og_price, 'og_formula' => $og_formula, 'kg_formula2' => $kg_formula2, 'billing_options' => $value->billing_options, 'commission_tab' => $value->commission, 'cate_status' => $cate_status, 'categories_id_get' => $categories_id, 'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 3), 'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 3), 'rate_tab' => $value->rate, 'cul' => $value->cul, 'qty_tab' => $qty, 'amountdata_edit' => round($amountdata_edit, 2),'amount_tab' => round($amount, 2));
            $i++;
        }
        echo json_encode($array);
    }
    
    
    
    
    
    
    
    
    
    public function fetch_data_purchase_invoiced() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $customer_id = 0;
        
        $result = $this->db->query("SELECT * FROM purchase_invoice_products  WHERE c_id='" . $_GET['order_id'] . "' AND payment_status=1  ORDER BY id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            $amountdata = $value->price * $value->qty;
            if($value->rack_info=='0')
            {
                $value->rack_info='Select';
            }
            
            if($value->bin_info=='0')
            {
                $value->bin_info='Select';
            }
            
           
        
                
            
            $array[] = array(
                'no' => $i,
                'id' => $value->id,
                'purchase_order_product_id'=>$value->purchase_order_product_id,
                'qty' => $value->qty,
                'rack_info' => $value->rack_info,
                'bin_info' => $value->bin_info,
                'rate' => $value->price,
                'checked' => $value->checked,
                'row_total' => round($amountdata),
                'product_name_tab' => $value->product_name, 
              );
            $i++;
           }
        echo json_encode($array);
    }
    
    
    
    
 public function fetchCustomerororderhistroy_vendor()
 {
            $form_data = json_decode(file_get_contents("php://input"));
            $tablenamemain = $form_data->tablenamemain;
            $order_id = $form_data->order_id;
            $result_c = $this->Main_model->where_names($tablenamemain, 'id', $order_id);
            foreach ($result_c as $orders_c) {
                $customer_id = $orders_c->customer_id;
            }
            $resultorder = $this->Main_model->where_names_order_by($tablenamemain, 'id', $order_id, 'id', 'DESC');
            $i = 1;
            $array = array();
            foreach ($resultorder as $value) {
                $result_order_product = $this->Main_model->where_names('admin_users', 'id', $value->user_id);
                foreach ($result_order_product as $orders_product) {
                    $name = $orders_product->name;
                }
                      
                      
                       
                      
                      
                        $array[] = array(
                        'no' => $i,
                        'id' => $value->id,
                        'base_id' => base64_encode($value->id),
                        'order_no' => $value->order_no,
                        'user_name' => $name,
                        'lab' => 'Created By',
                        'status' => 'Requisition Created',
                        'create_date' => date('d-m-Y',strtotime($value->create_date)),
                        'create_time' => $value->create_time
                        );
                        
                      
                        
                
                $i++;
                }
                
                
            $resultorder = $this->Main_model->where_names_order_by('purchase_process_history', 'order_id', $order_id, 'order_process', 'ASC');
            $i = 1;
            $array2 = array();
            foreach ($resultorder as $value) {
                $result_order_product = $this->Main_model->where_names('admin_users', 'id', $value->userid);
                foreach ($result_order_product as $orders_product) {
                    $name = $orders_product->name;
                }
                      
                      
                       
                      
                      
                        $array2[] = array(
                        'no' => $i,
                        'id' => $value->id,
                        'base_id' => base64_encode($value->id),
                        'order_no' => $value->order_no,
                        'user_name' => $name,
                        'lab' => 'Process By',
                        'status' => $value->processtext,
                        'create_date' => date('d-m-Y',strtotime($value->create_date)),
                        'create_time' => $value->create_time
                        );
                        
                      
                        
                
                $i++;
                }
                 
                
                $arrayset=array_merge($array,$array2);
           echo json_encode($arrayset);
    }
     public function order_process_history()
     {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        $findp['order_id']=$form_data->order_id;
        $findp['vendor_id']=$form_data->vendor_id;
        $findp['processtext']=$form_data->processtext;
        $findp['order_process']=$form_data->order_process;
        $findp['userid']=$this->userid;
        $findp['create_date']=$date;
        $findp['create_time']=$time;
        
        
         $resulttotal = $this->Main_model->where_names_two_order_by('purchase_process_history', 'order_id', $form_data->order_id, 'order_process', $form_data->order_process, 'id', 'DESC');
         
         if(count($resulttotal)==0)
         {
            $insert_id = $this->Main_model->insert_commen($findp, 'purchase_process_history');
         
         }
        
        
        
        
    }

}
