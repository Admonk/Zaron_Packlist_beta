<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

    function __construct() {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');
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
   
	
    public function driverview()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/driver.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function driverpage()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/driverpage.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function driverpage_view()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/driverpage_view.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function ledger()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function ledger_view()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                              
                                              
                                             $data['driver_id']=$_GET['driver_id']; 
                                             $res = $this->Main_model->where_names('driver','id',$_GET['driver_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->name;
                                             }
                                             
                                             
                                             
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List View';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger_view.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
    
    
    
    
    
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 

                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->name!='' && $form_data->vehicle_id!='' && $form_data->phone!='' && $form_data->pin!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['name']=$form_data->name;
                     $data['vehicle_id']=$form_data->vehicle_id;
                     $data['phone']=$form_data->phone;
                     $data['pin']=$form_data->pin;
                     $data['status']=$form_data->status;

                     $insertid=$this->Main_model->insert_commen($data,$tablename);
                     
                     
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='D';
                                             $datas['define_driver_id']=$insertid;
                                             
                                             $this->Main_model->insert_commen($datas,'admin_users');
                     
                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	 if($form_data->name!='' && $form_data->vehicle_id!=''  && $form_data->phone!='' && $form_data->pin!='')
                     {
                         $tablename=$form_data->tablename;
                         $data['get_id']=$form_data->id;
                         $data['name']=$form_data->name;
                         $data['vehicle_id']=$form_data->vehicle_id;
                         $data['phone']=$form_data->phone;
                         $data['pin']=$form_data->pin;
                         $data['status']=$form_data->status;
                 	     $this->Main_model->update_commen($data,$tablename);
                 	   
                 	   
                 	   
                 	   
                 	   
                 	                         $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='D';
                                             $datas['define_driver_id']=$form_data->id;
                                             $datas['get_id']=$form_data->id;
                                        
                     
                 	                         
                 	                          $result= $this->Main_model->where_names('admin_users','define_driver_id',$form_data->id);
        				                      if(count($result)>0)
        				                      { 
        				                            $datas['get_id']=$form_data->id;
        				                            $this->Main_model->update_commen_where($datas,'define_driver_id','admin_users');

        				                      }
        				                      else
        				                      {     
        				                             unset($datas['get_id']);
        				                            $this->Main_model->insert_commen($datas,'define_driver_id');
        				                      }
                             
                 	   
                 	   
                 	   
                 	   
                 	   
                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     $this->Main_model->delete_where('admin_users','define_driver_id',$id);

                 }
                
                


	}
	

    public function fetch_data_sales_group()
    {

$i=1;
                     $result= $this->Main_model->where_names('driver','deleteid','0');
                     foreach ($result as  $value) {





                         $vehicle_name ='';
                        $user_group = $this->Main_model->where_names('vehicle','id',$value->vehicle_id);
                        foreach ($user_group as  $row) {
                            $vehicle_name=$row->vehicle_number;
                        }

                        if($value->status=='1')
                        {
                            $status='Active';
                        }
                        else
                        {
                            $status='InActive';
                        }


                        
                        if($value->status=='1')
                        {
                            $status='Active';
                        }
                        else
                        {
                            $status='InActive';
                        }


                        $array[] = array(

                            'id' => $value->id, 
                            'no' => $i,
                            'vehicle_id' => $vehicle_name, 
                            'phone' => $value->phone, 
                            'name' => $value->name, 
                            'pin' => $value->pin, 
                            'status' => $status 

                        );
                        
                        
                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    	public function fetch_data_get_ledger()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     
                     
                     
                    
                 	 $result= $this->Main_model->where_names_limit('driver_ledger','customer_id',$customer_id,$limit);
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($result as  $value) {
                       
                      

                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->company_name, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_get_ledger_view()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                        $result= $this->Main_model->where_names_limit('driver_ledger','customer_id',$customer_id,$limit);
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                         
                          $result=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND deleteid=0 ORDER BY id ASC");
                 	      $result=$result->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	 foreach ($result as  $value) {
                       
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->company_name, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
    
    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {
                 	 	$output['name'] = $value->name;
                        $output['vehicle_id']= $value->vehicle_id;
                        $output['phone']= $value->phone;
                        $output['status']= $value->status;
                        $output['pin']= $value->pin;
                        $output['id']= $value->id;
	                 	
                 	 }

                    echo json_encode($output);


    }
	public function save_to_pay()
    {
                      
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='driver_ledger';
                     
                     $enteramount=$form_data->enteramount;
                     $payamount=$form_data->payamount;
                     $totalpending=$payamount-$enteramount;
                     $payid=$form_data->payid;
                     
                     
                     $res = $this->Main_model->where_names($tablename,'id',$payid);
                     
                     foreach($res as $val)
                     {
                         $payid=$val->id;
                         $customer_id=$val->customer_id;
                         $order_no=$val->order_no;
                         $amount=$val->amount;
                     }
                     
                     
                     
                    
                              $data_driver['order_id']=$payid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']='Cash';
                              $data_driver['order_no']=$order_no;
                              $data_driver['amount']=0;
                              
                              
                              if($totalpending==0)
                              {  
                                   $data_driver['payin']=$totalpending;
                                   $data_driver['payout']=$enteramount;
                                   $data_driver['paid_status']='Paid';
                                   
                              }
                              else
                              {
                                   $data_driver['payout']=$enteramount;
                                   $data_driver['payin']=$totalpending;
                                   $data_driver['paid_status']='Un-Paid';
                                   
                                  
                              }
                      
                      
                      
                          $data['get_id']=$payid;
                          $data['payin']=0;
                          $data['paid_status']='Paid';
                 	      $this->Main_model->update_commen($data,$tablename);
                 	   
                          $data_driver['payment_date']=$date;
                          $data_driver['payment_time']=$time;
                          $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                     


    }



}	