<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct() {


error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Users_model');
             if(isset($this->session->userdata['logged_in'])){
	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;
			   profile($this->user_mail);
			}


      
    }
	public function vendor_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Vendor Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('vendor/vendor_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function vendor_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Vendor  Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('vendor/vendor_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	 public function ledger()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vendor ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('vendor/ledger.php',$data);


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
                                              
                                              
                                             $data['vendor_id']=$_GET['vendor_id']; 
                                             $res = $this->Main_model->where_names('vendor','id',$_GET['vendor_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->name;
                                             }
                                             
                                             
                                             
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vendor ledger List View';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('vendor/ledger_view.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
	
	public function vendor_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Vendor List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('vendor/vendor_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->name!='' && $form_data->gst!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 $data['address2']=$form_data->address2;


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;

			                   
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     $data['name']=$form_data->name;
                                 $data['landline']=$form_data->landline;
                               



                                      $result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Vendor phone no already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                      	    $this->Main_model->insert_commen($data,$tablename);
				                      	    $array=array('error'=>'2','massage'=>'Vendor successfully Added..');
                                            echo json_encode($array);
				                      }




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	 if($form_data->name!='')
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                      
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 $data['address2']=$form_data->address2;


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;

			                   
			                     
			                     $data['gst']=$form_data->gst;
			                     $data['name']=$form_data->name;
                                 $data['landline']=$form_data->landline;
                                

                 	   $this->Main_model->update_commen($data,$tablename);
                       $array=array('error'=>'2','massage'=>'Vendor successfully Updated..');
                       echo json_encode($array);

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

                 }
                
                


	}
	public function fetch_data()
	{

                    
                 	 $result= $this->Main_model->where_names('vendor','deleteid','0');
                 	 $i=1;
                 	 foreach ($result as  $value) {
                       
                        

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Active';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='InActive';
                 	 	}


                 	 	$array[] = array(
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		
                 	 		'email' => $value->email, 
                 	 		'phone' => $value->phone, 
                 	 		'name' => $value->name, 
                 	 		'pin' => $value->pin, 
                 	 		'gst' => $value->gst, 
                 	 		'address' => $value->address1.''.$value->address2.''.$value->landmark.''.$value->pincode,
                 	 		'city' => $value->city, 
                 	 		'state' => $value->state, 
                 	 		'status' => $status 

                 	 	);



$i++;
                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
		public function fetch_data_get_ledger()
	{

                    
                     $customer_id=$_GET['customer_id'];
                    
                 	 $result= $this->Main_model->where_names('vendor_ledger','customer_id',$customer_id);
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
                         
                        $result= $this->Main_model->where_names_limit('vendor_ledger','customer_id',$customer_id,$limit);
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                             $result=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."'  AND deleteid=0 ORDER BY id ASC");
                 	       
                          }
                          else
                          {
                               $result=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND deleteid=0 ORDER BY id ASC");
                 	     
                          }
                         
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

                 	  $output['id']= $value->id; 
                      $output['name']= $value->name; 
                      $output['company_name']= $value->company_name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['gst']= $value->gst;
                      $output['pin']= $value->pin;
                      $output['fulladdress']= $value->address1.$value->landmark.$value->pincode.','.$value->city.','.$value->state;
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      $output['city']= $value->city;
                      $output['state']= $value->state;
                      $output['status']= $value->status;
                      $output['landline']= $value->landline;

                     
	                 	
                 	 }

                    echo json_encode($output);


    }
		public function save_to_pay()
    {
                      
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='vendor_ledger';
                     
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
