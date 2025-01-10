<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Mobileapi extends CI_Controller {

    function __construct() 
    {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');
             $this->load->model('Admin/Users_model');
             $this->load->model('Main_model');
             if(isset($this->session->userdata['logged_in']))
             {


	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;

			   
			}
          
    }

    public function customer_device_update()
    {

        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $post = $_REQUEST;
        $post = $this->security->xss_clean($post);
        $post=json_decode(file_get_contents("php://input"), true);
        echo "<pre>";print_r($post);
        exit;

    }
 
    public function bankstatement_get()
    {
        


                date_default_timezone_set("Asia/Kolkata");
                //$date = date('Y-m-d');
                $time = date('h:i A');

                                          $post=$_REQUEST;
                                          $post=json_decode(file_get_contents("php://input"), true);
//echo "w";
//exit;

                                          $GenericCorporateAlertRequest=$post['GenericCorporateAlertRequest'];

                                          $data['Alert_Sequence_No']=$GenericCorporateAlertRequest[0]['Alert Sequence No'];
                                          $data['Virtual_Account']=$GenericCorporateAlertRequest[0]['Virtual Account'];
                                          $data['Account_number']=$GenericCorporateAlertRequest[0]['Account number'];
                                          $data['Debit_Credit']=$GenericCorporateAlertRequest[0]['Debit Credit'];
                                          $data['Amount']=$GenericCorporateAlertRequest[0]['Amount'];
                                          $data['Remitter_Name']=$GenericCorporateAlertRequest[0]['Remitter Name'];
                                          $data['Remitter_Account']=$GenericCorporateAlertRequest[0]['Remitter Account'];
                                          $data['Remitter_Bank']=$GenericCorporateAlertRequest[0]['Remitter Bank'];
                                          $data['Remitter_IFSC']=$GenericCorporateAlertRequest[0]['Remitter IFSC'];
                                          $data['Cheque_No']=$GenericCorporateAlertRequest[0]['Cheque No'];
                                          $data['User_Reference_Number']=$GenericCorporateAlertRequest[0]['User Reference Number'];
                                          $data['Mnemonic_Code']=$GenericCorporateAlertRequest[0]['Mnemonic Code'];
                                          $data['Value_Date']=$GenericCorporateAlertRequest[0]['Value Date'];
                                          $date=$GenericCorporateAlertRequest[0]['Value Date'];
                                          $data['Transaction_Description']=$GenericCorporateAlertRequest[0]['Transaction Description'];
                                          $data['Transaction_Date']=$GenericCorporateAlertRequest[0]['Transaction Date'];
                                          
                                          

                                  $poin_to_member = $this->Main_model->where_names('bank_statment_hdfc','Alert_Sequence_No',$data['Alert_Sequence_No']);
                                     
                                     if(count($poin_to_member)==0)
                                     {

                                          $this->Main_model->insert_commen($data,'bank_statment_hdfc');
                                          $json['GenericCorporateAlertResponse'] = array(
                                          "errorCode"=>"0",
                                          "errorMessage"=>"Success",
                                          "domainReferenceNo"=>$data['Alert_Sequence_No']
                                          );


                                             $customer_id='23100';
                                             $company_name= 'Bank-ex';
                                             if($data['Virtual_Account']=='')
                                             {
                                                         $customer_id='23100';
                                                         $company_name= 'Bank-ex';
                                             }
                                             else
                                             {


                                                   $SS = $this->Main_model->where_names('customers','virtual_accountno',$data['Virtual_Account']);
                                                   if(count($SS)>0)
                                                   {


                                                        foreach ($SS as  $value) {
                                                         $company_name= $value->company_name;
                                                         $customer_id= $value->id;
                                                        }


                                                   }


                                             }

                                            
                                              





                                              $data_address['order_id'] = 0;
                                              $data_address['bank_id'] = 14;
                                              $data_address['customer_id'] = $customer_id;
                                              $data_address['user_id'] = 0;
                                              $data_address['process_by'] = $data['Remitter_Name'].' Recived Payment';
                                              $data_address['payment_mode'] = 'NEFT/RTGS';
                                              $data_address['payment_mode_payoff'] = 'NEFT/RTGS';
                                              $data_address['order_no'] = $data['Account_number'];
                                              $data_address['difference'] = 0;
                                              $data_address['reference_no'] = $data['Alert_Sequence_No'];
                                              $data_address['amount'] = $data['Amount'];
                                              $data_address['account_head_id'] = 68;
                                              $data_address['account_heads_id_2'] = 116;
                                              $data_address['order_trancation_status'] = 0;
                                              if($data['Debit_Credit'] == 'Credit') 
                                              {
                                                      $data_address['paid_status'] = 1;
                                                      $data_address['credits'] = $data['Amount'];
                                              } 
                                              else 
                                              {
                                                      $data_address['paid_status'] = 0;
                                                      $data_address['debits'] = $data['Amount'];
                                                 
                                              }
                                              $data_address['collected_amount'] = $data['Amount'];
                                              $data_address['payment_date'] = $date;
                                              $data_address['payment_time'] = $time;
                                              $data_address['party_type'] = 1;
                                              $data_address['notes'] = $data['Transaction_Description'];
                                              $data_address['deletemod'] = $data['Alert_Sequence_No'];


                                          
                                              $setchek1wwww = $this->Main_model->where_names('all_ledgers','deletemod',$data_address['deletemod']);
                                              if(count($setchek1wwww)==0)
                                              {

                                                    $this->Main_model->insert_commen($data_address, 'all_ledgers');

                                              }



                                                $data_bank12['bank_account_id'] = 14;
                                                $data_bank12['ex_code'] = $data['Account_number'].' '.$data['Remitter_Name'];
                                                $data_bank12['driver_id'] = 0;
                                                $data_bank12['order_status'] = 1;
                                                $data_bank12['debit'] = 0;

                                                $data_bank12['create_date'] = $date;
                                                $data_bank12['payment_status'] = 1;
                                                $data_bank12['credit'] = $data['Amount'];
                                                $data_bank12['name'] = $company_name;
                                                $data_bank12['create_date'] = $date;
                                                $data_bank12['user_id'] = 0;
                                                $data_bank12['status_by'] = $data['Transaction_Description'];
                                                $data_bank12['balance']=0;
                                                $data_bank12['account_head_id'] = 105;
                                                $data_bank12['deletemod'] = $data['Alert_Sequence_No'];
                                                $data_bank12['account_heads_id_2'] = 105;
                                                $data_bank12['party_type'] = 4;

                                                $setchekss = $this->Main_model->where_names('bankaccount_manage','deletemod',$data_bank12['deletemod']);
                                                if(count($setchekss)==0)
                                                {


                                                     $this->Main_model->insert_commen($data_bank12, 'bankaccount_manage');
                                                   
                                               
                                                }






                                     }
                                     else
                                     {


                                          $json['GenericCorporateAlertResponse'] = array(
                                          "errorCode"=>"0",
                                          "errorMessage"=>"Duplicate",
                                          "domainReferenceNo"=>$data['Alert_Sequence_No']
                                          );


                                     }

                                         

                                         

                                         



                                          
                                        



                                         
                                          $status=200;
                                          $this->output->set_status_header($status);
                                          header('Content-Type: application/json');
                                          echo json_encode($json);
                                                             


    }
  	public function userlogin()
    {


                                       
                                    $post=$_REQUEST;
                                    $post = $this->security->xss_clean($post);


                        
                        if($post['password']=='')
                    {
                            
                                                                                    $status = '400'; 
                                                                                    $json['result'] = 'Pin is required';
                                                                                    $json['status'] = 0;
                                 
                                   
                    }
                    else
                    {

                                             

                                           
                                        
                                              $res=$this->Auth->userlogin($post);
                                            if($res==true)
                                            {
                                               
                                                   $result = $this->Auth->read_user_information_pin($post['password']);
                                                   
                                                
                                                       $this->load->library('session');
                                                       
                                                       
                                                       
                                                       
                                                       if($result[0]->from_date==0)
                                                       {
                                                            $from_date=date("Y-m-01");
                                                       }
                                                       else
                                                       {
                                                           $from_date=$result[0]->from_date;
                                                       }
                                                       
                                                       
                                                         if($result[0]->to_date==0)
                                                       {
                                                           $to_date=date("Y-m-d");
                                                       }
                                                       else
                                                       {
                                                          $to_date=$result[0]->to_date;
                                                       }


                                                   $session_data = array(
                                                         'userid' => $result[0]->id,
                                                         'customer_id' => $result[0]->customer_and_executive_id,
                                             'username' => $result[0]->name,
                                             'email' => $result[0]->email,
                                             'access' => $result[0]->access,
                                             'define_saleshd_id' => $result[0]->define_saleshd_id,
                                             'define_salesteam_id' => $result[0]->define_salesteam_id,
                                             'define_driver_id' => $result[0]->define_driver_id,
                                             'customer_id' => $result[0]->customer_id,
                                             'from_date' => $from_date,
                                             'to_date' => $to_date,
                                             'sales_id' => $result[0]->sales_id,
                                       );

                                       if($result[0]->status==1)
                                       {

                                             if($result[0]->deleteid==0)
                                               {
                                                    $userid=$result[0]->id;
                                                    $result = $this->Auth->log_update($result[0]->id,1);
                                                $status = '200'; 
                                                                                          $json['result'] = 'success';
                                                                                          $json['status'] = 1;
                                                                                          $json['datas'] = $userid;
                                               
                                                   
                                               }
                                               else
                                               {
                                                   
                                                    $status = '400'; 
                                                                                          $json['result'] = BLOCK_ACCOUNT;
                                                                                          $json['status'] = 0;
                                                                                          $json['datas'] ='';
                                                     
                                                        
                                                   
                                               }
                                          

                                       }
                                       else
                                       {
                                              $status = '400'; 
                                                                                      $json['result'] = BLOCK_ACCOUNT;
                                                                                      $json['status'] = 0;
                                                                                      $json['datas'] ='';
                                       
                                       }

                                             }
                                             else
                                             {

                                 
                                                                                    $status = '400'; 
                                                                                    $json['result'] = 'Input Pin Wrong';
                                                                                    $json['status'] = 0;
                                                                                     $json['datas'] ='';
                                                                         
                                               
                                             
                                             }         


                    }


    
        $this->output->set_status_header($status);
    header('Content-Type: application/json');
    echo json_encode($json);
           
  
  }

  public function logout()
    {
                      // Removing session data
              
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
          $result = $this->Auth->log_update($post['userid'],0);
          $json['result'] = 'Logout Success';
                  $json['status'] = 1;
              $status=200;
          $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);


     }

    public function driver_order_list()
    {
                      // Removing session data
              
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
            

     
        
        
        
        $tablename = 'orders_process';
        $order_base = 1;
        $route_id = 0;
        $assigen_status = 12;
        $search = $_GET['search'];
        
        $wheresearch="";
        $orderby='ASC';
         
      
        
        $i = 1;
       
        $define_driver_id=0;
        $resultsales = $this->Main_model->where_names('admin_users', 'id', $post['id']);
        foreach ($resultsales as $valuesales) {
            $define_driver_id = $valuesales->define_driver_id;
        }
     

            $querycount = $this->db->query("SELECT a.id FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121') AND a.selforder=0 AND a.delivery_status=2  $wheresearch  GROUP BY a.trip_id ORDER BY a.assign_status  ASC ");
            $resultcount = $querycount->result();
            $count=count($resultcount);
           
            $query = $this->db->query("SELECT a.trip_id,a.vehicle_id FROM $tablename as a  WHERE a.deleteid='0' AND a.order_base IN ('1','120','121') AND a.selforder=0 AND a.delivery_status=2   $wheresearch  GROUP BY a.trip_id ORDER BY a.assign_status  ASC LIMIT 0, 10");
            $result = $query->result();
           
            
            
     



        $trip_id_array=array();
        $paricel_mode = 0;
        $weighttotal=0;
        foreach ($result as $values)
        {
            
            
           
           $array = array();
           $querys = $this->db->query("SELECT a.* FROM $tablename as a   WHERE a.deleteid='0' AND a.order_base IN ('1','120','121') AND a.selforder=0  AND a.trip_id='".$values->trip_id."' $wheresearch  ORDER BY a.sort_id ASC ");
           $results = $querys->result();        
            
           foreach ($results as $value)
           {  
         
            $denomination_total=$value->driver_recived_payment;    
            $paricel_mode = $value->paricel_mode;
            $tablename_sub = "order_product_list_process";
            $delivery_charge = $value->delivery_charge;
            $totalamount_total = 0;
            $commission_total = 0;
            $totalamountparciel = 0;
            $commissionparciel = 0;
            
           
            $lengeth=0;
            $weight=0;
            $lengeth_array=array(0);
            $query_profle_get = $this->db->query("SELECT profile as profile FROM $tablename_sub  WHERE order_id='".$value->id."' AND deleteid=0");
            $result_lengeth = $query_profle_get->result();
            foreach ($result_lengeth as $valuess) {
                $lengeth_array[] = $valuess->profile;
            }
            
            $lengeth=max($lengeth_array);
            $lengeth=round($lengeth,2);




            $weight=0;
            $query_weight_get = $this->db->query("SELECT SUM(weight) as totalweight FROM $tablename_sub  WHERE order_id='".$value->id."' AND deleteid=0");
            $result_totalweight = $query_weight_get->result();
            foreach ($result_totalweight as $we) 
            {
                        $weight = $we->totalweight;

                        $weighttotal += $we->totalweight;
            }
            
            



                $route_id_base = $value->route_id;
           
                $company_name_company = "";
                $email = "";
                $phone = "";
                $address = "";
                $customers = $this->Main_model->where_names('customers', 'id', $value->customer_id);
                foreach ($customers as $csval) {
                    $company_name_company = $csval->company_name;
                    $email = $csval->email;
                    $phone = $csval->phone;

                      $locality = $csval->locality;
                      $address = $csval->address1 . ' ' . $csval->address2 . ' ' . $csval->landmark . ' ' . $csval->zone . ' ' . $csval->pincode. ' ' . $csval->state;
                }
                
                
                $sales_name="";
                $sales_phone="";
                 $sales_person = $this->Main_model->where_names('admin_users', 'id', $value->user_id);
                foreach ($sales_person as $sales) {
                    $sales_name = $sales->name;
                    $sales_phone = $sales->phone;
                    
                }
                

                if($value->customer_address_id>0) 
                {
                    $customers_adddrss = $this->Main_model->where_names('customers_adddrss', 'id', $value->customer_address_id);
                    foreach ($customers_adddrss as $customers_adddrss_v) 
                    {
                          $locality = $customers_adddrss_v->locality;
                        $company_name = $customers_adddrss_v->name;
                        $phone = $customers_adddrss_v->phone;
                        $address = $customers_adddrss_v->address1 . ' ' . $customers_adddrss_v->address2 . ' ' . $customers_adddrss_v->landmark . ' ' . $customers_adddrss_v->zone . ' ' . $customers_adddrss_v->pincode. ' ' . $customers_adddrss_v->state;
                    }
                }


              


                
                if($value->shipping_address>0) 
                {
                    $customers_adddrss = $this->Main_model->where_names('customers_adddrss', 'id', $value->shipping_address);
                    foreach ($customers_adddrss as $customers_adddrss_v) 
                    {

                         $locality = $customers_adddrss_v->locality;
                         $company_name = $customers_adddrss_v->name;
                         $phone = $customers_adddrss_v->phone;
                         $address = $customers_adddrss_v->address1 . ' ' . $customers_adddrss_v->address2 . ' ' . $customers_adddrss_v->landmark . ' ' . $customers_adddrss_v->zone . ' ' . $customers_adddrss_v->pincode. ' ' . $customers_adddrss_v->state;
                    }
                }


                



               $loc_name = "";
           
              $loc_name_id = $this->Main_model->where_names('locality', 'id', $locality);
              foreach ($loc_name_id as $valc) {
              
                $loc_name = $valc->name;
                $route_id = $valc->route_id;

              }


                $route_name = "";
                $route = $this->Main_model->where_names('route', 'id', $route_id);
                foreach ($route as $route_v) {
                    $route_name = $route_v->name;
                }

               $discountfulltotal=$value->bill_total;
               $first_sort_id=0;
                 

                 $query_profle_gets = $this->db->query("SELECT sort_id FROM $tablename WHERE  assign_status=1 AND  driver_id='".$value->driver_id."' AND trip_id='".$value->trip_id."' AND order_base=1 ORDER BY sort_id ASC LIMIT 1");
                 $result_lengeths = $query_profle_gets->result();
                 foreach ($result_lengeths as $valuesss) {
                  
                      $first_sort_id=$valuesss->sort_id;
                      

                 }



                $last_sort_id=0;
                 

                 $query_profle_gets = $this->db->query("SELECT sort_id FROM $tablename WHERE   driver_id='".$value->driver_id."' AND trip_id='".$value->trip_id."' AND order_base=1  ORDER BY sort_id DESC LIMIT 1");
                 $result_lengeths = $query_profle_gets->result();
                 foreach ($result_lengeths as $valuesss) {
                  
                      $last_sort_id=$valuesss->sort_id;
                     

                 }

                  
                  $statuscolor='badge-soft-danger';
                  
                  if($value->assign_status=='12')
                  {
                      $statuscolor='badge-soft-danger';
                      $value->reason='Loading Pending';
                  }
                  
                  if($value->assign_status=='1')
                  {
                      $statuscolor='badge-soft-yellow';
                      
                  }

                  if($value->assign_status=='2')
                  {
                      $statuscolor='badge-soft-primary';
                      $value->reason='Trip Started';
                  }
                  
                  
                  if($value->assign_status=='3')
                  {
                      $statuscolor='badge-soft-success';
                      $value->reason='Trip Completed';
                  }
                  
             if($value->order_base>0)
            {

                    $array[] = array(
                        'no' => $value->sort_id,
                        'sales_id'=>$value->id,
                        'sales_phone'=>$sales_phone,
                        'loc_name'=>$loc_name,
                        'first_sort_id'=>$first_sort_id,
                        'last_sort_id'=>$last_sort_id,
                        'sales_name'=>$sales_name,
                        'denomination_total'=>$denomination_total,
                        'weight'=>round($weight),
                        'gate_status'=>$value->gate_status,
                        'end_reading_factory'=>$value->end_reading_factory,
                        'start_reading_factory'=>$value->start_reading_factory,
                        'start_reading'=>$value->start_reading,
                        'km_reading_end'=>$value->km_reading_end,
                        'gate_weight'=>$value->gate_weight,
                        'payment_mode'=>$value->payment_mode,
                        'id' => $value->id,
                        'base_id' => base64_encode($value->id),
                        'order_no' => $value->order_no, 
                        'lengeth' => $lengeth,
                        'rescheduling_delivery' => $value->rescheduling_delivery,
                        'rescheduling_date' => $value->rescheduling_date, 
                        'rescheduling_remarks' => $value->rescheduling_remarks,
                        'name' => $company_name,
                        'company_name' => $company_name_company,
                        'email' => $email,
                        'phone' => $phone,
                        'totalamount' => round($discountfulltotal,2),
                        'commission' => round($commission),
                        'delivery_charge' => $value->delivery_charge, 
                        'reason' => $value->reason, 
                        'sort_id' => $value->sort_id, 
                        'route_name' => $route_name,
                        'address' => $address,
                        'color'=>$statuscolor,
                        'assign_status' => $value->assign_status, 
                        'order_base' => $value->finance_status,
                        'delivery_date' => date('d-M-Y', strtotime($value->delivery_date)),
                        'create_date' => date('d-m-Y', strtotime($value->create_date)),
                        'trip_id' => $value->trip_id, 
                        'create_time' => $value->create_time);


             }



           }



               
                $vehicle_number = "";
                $vehicle = $this->Main_model->where_names('vehicle', 'id', $value->vehicle_id);
                foreach ($vehicle as $vehicle_v) {
                    $vehicle_number = $vehicle_v->vehicle_name.' | '.$vehicle_v->vehicle_number;
                    $vehicle_id = $vehicle_v->id;
                }
                
                $driver_name = "";
                $driver_phone = "";
                $driver = $this->Main_model->where_names('driver', 'vehicle_id', $vehicle_id);
                foreach ($driver as $driver_v) {
                    $driver_name = $driver_v->name;
                    $driver_phone = $driver_v->phone;
                }

                
                $st='';
                $sts='false';
                $collapsed='collapsed';
                if($i==1)
                {
                    $st='show';
                    $sts='true';
                    $collapsed='';
                }

            
               $trip_id_array[]=array(
                'subarray'=>$array,
                'no'=>$i,
                'sh'=>$st,
                'expended'=>$sts,
                'collapsed'=>$collapsed,
                'trip_id'=>$values->trip_id,
                'vehicle_id'=>$values->vehicle_id,
                'vehicle_number'=>$vehicle_number,
                'driver_name'=>$driver_name,
                'driver_phone'=>$driver_phone
                
                );


           
            $i++;
        }


        $trip_id_array_data=$trip_id_array;



        
            $myData = array('PortalActivity' => $trip_id_array_data, 'totalCount' => $count,'weighttotal'=>round($weighttotal,2));
      
        
        
   



              $json['result'] = $myData;
              $json['status'] = 1;
              $status=200;
              $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);



     }


     public function filesend()
    {
                      // Removing session data
              
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
               
               $filedata=str_replace(' ', '', $_FILES['filedata']['name']);
               $path = 'uploads/'.trim($filedata); 
               $res=$this->Main_model->where_names('audio_files', 'files', $path);
                            
                            if(count($res)==0)
                            {
                               if(move_uploaded_file($_FILES['filedata']['tmp_name'], $path))  
                               {  
            
                                        
                                            
                                        
                                           $format=$_FILES['filedata']['type'];
                                           $this->db->query("INSERT INTO audio_files  (`userid`,`files`,`format`,`calltype`)VALUES('".$post['userid']."','".$path."','".$format."','".$post['calltype']."')");
                                        
                                        
            
                              }
                   }
          $json['filepath'] = base_url().$path;
                  $json['status'] = 1;
                  $json['calltype'] = $post['calltype'];
              $status=200;
          $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);


     }

    public function customer_location_save()
    {
 
        $post=$_REQUEST;
        $postdata = $this->security->xss_clean($post);
              


            $point["get_id"] = $post['customer_id'];
            $point["map_address"]=$post['address'];
            $point["country_name"] =$post['country_name'];
            $point["latitude"] =$post['latitude'];
            $point["locality_map"] =$post['locality'];
            $point["longtitude"] =$post['longtitude'];

            if($post['customer_id']>0)
             {
            
            $this->Main_model->update_commen($point, 'customers');

             }


            $point1["customer_id"] = $post['customer_id'];
            $point1["map_address"]=$post['address'];
            $point1["country_name"] =$post['country_name'];
            $point1["latitude"] =$post['latitude'];
            $point1["locality_map"] =$post['locality'];
            $point1["longtitude"] =$post['longtitude'];
            $point1["user_id"] =$post['user_id'];


                          $path="";
                         // if(isset($_FILES['image']['name']))
                         //{


                         //$path = 'uploads/' .time(). $_FILES['image']['name']; 
                         //if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){}


                         // 


            //$point1["image"] =$post['image'];

             //$poin_to_member = $this->Main_model->where_names('customer_location_save','latitude',$point1['latitude']);

  $poin_to_member = $this->Main_model->where_names_three_order_by('customer_location_save','customer_id', $point1['customer_id'],'latitude', $point1['latitude'], 'user_id',$point1["user_id"], 'id', 'DESC');
                                     
            if(count($poin_to_member)==0)
            {

              if($post['customer_id']>0)
             {
                     $insertid=$this->Main_model->insert_commen($point1,'customer_location_save');
                     $json['message'] = "Success";

             }
             else
             {


              $json['message'] = "Please Select Customer to proper";

             }

              

            }
            else
            {
                   if($post['customer_id']>0)
                   {
                               $json['message'] = "Same Address Already Added";
                   }
                   else
                   {

                                $json['message'] = "Please Select Customer to proper";
                   }


            }

           


                         $json['status'] = true;
                         $json['customer_id'] = $post['customer_id'];
                         // $json['image'] = base_url().$path;
                         
                         if($insertid>0)
                         {
                           $json['id'] =  $insertid;
                         }
                         else
                         {
                           $json['id'] =  '0';
                         }

                        
                         $status=200;
              $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);
                       


    }


     public function customer_location_update()
    {
 
        $post=$_REQUEST;
        $postdata = $this->security->xss_clean($post);
              


            $point["get_id"] = $post['customer_id'];
            $point["map_address"]=$post['address'];
            $point["country_name"] =$post['country_name'];
            $point["latitude"] =$post['latitude'];
            $point["locality_map"] =$post['locality'];
            $point["longtitude"] =$post['longtitude'];
            if($post['customer_id']>0)
            {
            $this->Main_model->update_commen($point, 'customers');
            }

            $point1["get_id"] = $post['id'];
            $point1["customer_id"] = $post['customer_id'];
            $point1["map_address"]=$post['address'];
            $point1["country_name"] =$post['country_name'];
            $point1["latitude"] =$post['latitude'];
            $point1["locality_map"] =$post['locality'];
            $point1["longtitude"] =$post['longtitude'];
            $point1["edit_user_id"] =$post['user_id'];

                          $path="";
                          //if(isset($_FILES['image']['name']))
                         //{


                              //$path = 'uploads/' .time(). $_FILES['image']['name']; 
                             //if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){}


                         //} 


            //$point1["image"] =$post['image'];
             
             if($post['customer_id']>0)
             {
              $this->Main_model->update_commen($point1,'customer_location_save');
              $json['message'] = "Success";
             }
             else
             {
              $json['message'] = "Please select customer to proper";
             }
            

  

                         $json['status'] = true;
                         
                         $json['customer_id'] = $post['customer_id'];
                         // $json['image'] = base_url().$path;
                         $status=200;
                         if($post['id']>0)
                         {
                           $json['id'] =  $post['id'];
                         }
                         else
                         {
                           $json['id'] =  '0';
                         }
                        
                         $this->output->set_status_header($status);
                         header('Content-Type: application/json');
                         echo json_encode($json);
                                  


    }

       public function customer_search()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
             
              $array=array();
              $searchText= $post['search'];
              if($searchText!="")
              {

                    $whereClause = "WHERE deleteid = '0' AND (phone LIKE '%$searchText%' OR company_name LIKE '%$searchText%') AND (1=1)";
                    $query = $this->db->query(
                        "SELECT id, deleteid, company_name, phone, approved_status
                        FROM customers
                        $whereClause
                        ORDER BY LOWER(TRIM(company_name)) LIKE '$searchText%' DESC, LOWER(TRIM(company_name))
                        LIMIT 10"
                    );
            
                    $res = $query->num_rows();
                    $result = $query->result();


                    if(count($result)>0)
                    {



                           foreach ($result as  $value) {


                              $array[] = array(

                                  'id' => $value->id, 
                                  'name' => $value->company_name.' / '.$value->phone

                              );


                           }

                         $json['data'] = $array;
                         $json['status'] = true;
                         $json['message'] = "Success";
                         $status=200;

                      }
                      else
                      {

                         $json['data'] = $array;
                        $json['status'] = false;
                        $json['message'] = "Result Not Found";
                        $status=200;

                      }


                      

              }
              else
              {


                  $json['data'] = $array;
                  $json['status'] = false;
                  $json['message'] = "Result Not Found";
                  $status=200;


              }
                 
               $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);
                     


              

    }


     public function customer_get_address()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
             
               $array=array();
              $customer_id= $post['customer_id'];
              if($customer_id>0)
              {



                $whereClause = "WHERE customer_id = '".$customer_id."'";
                    $query = $this->db->query(
                        "SELECT *
                        FROM customer_location_save
                        $whereClause GROUP BY latitude ORDER BY id DESC"
                        
                    );
            
                    $res = $query->num_rows();
                    $result = $query->result();


                    if(count($result)>0)
                    {

                           $image=base_url(). $value->image;

                           foreach ($result as  $value) {


                              $array[] = array(

                                  'id' => $value->id, 
                                  'map_address' => $value->map_address,
                                  'country_name' => $value->country_name,
                                  'latitude' => $value->latitude,
                                  'longtitude' => $value->longtitude,
                                  'locality_map' => $value->locality_map,
                                  'create_date' => $value->create_date,
                                  'image' => $image
                                  
                              );


                           }

                         $json['data'] = $array;
                         $json['status'] = true;
                         $json['message'] = "Success";
                         $status=200;

                      }
                      else
                      {

                         $json['data'] = $array;
                        $json['status'] = false;
                        $json['message'] = "Result Not Found";
                        $status=200;

                      }


                      

              }
              else
              {


                  $json['data'] = $array;
                  $json['status'] = false;
                  $json['message'] = "Result Not Found";
                  $status=200;


              }
                 
               $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);
                     


              

    }


     public function customer_get_address_id()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
              $post=$_REQUEST;
              $post = $this->security->xss_clean($post);
             
               $array=array();
              $id= $post['id'];
              if($id>0)
              {

 

                $whereClause = "WHERE id = '".$id."'";
                    $query = $this->db->query(
                        "SELECT *
                        FROM customer_location_save
                        $whereClause"
                        
                    );
            
                    $res = $query->num_rows();
                    $result = $query->result();


                    if(count($result)>0)
                    {



                           foreach ($result as  $value) {


                              $array[] = array(

                                  'id' => $value->id, 
                                  'map_address' => $value->map_address,
                                  'country_name' => $value->country_name,
                                  'latitude' => $value->latitude,
                                  'longtitude' => $value->longtitude,
                                  'locality_map' => $value->locality_map,
                                  'create_date' => $value->create_date
                                  
                              );


                           }

                         $json['data'] = $array;
                         $json['status'] = true;
                         $json['message'] = "Success";
                         $status=200;

                      }
                      else
                      {

                         $json['data'] = $array;
                        $json['status'] = false;
                        $json['message'] = "Result Not Found";
                        $status=200;

                      }


                      

              }
              else
              {


                  $json['data'] = $array;
                  $json['status'] = false;
                  $json['message'] = "Result Not Found";
                  $status=200;


              }
                 
               $this->output->set_status_header($status);
              header('Content-Type: application/json');
              echo json_encode($json);
                     


              

    }
	
}
