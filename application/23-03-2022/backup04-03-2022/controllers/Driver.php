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
                                            
                                             $data['driver'] = $this->Main_model->where_names('driver','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
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
                                             $data['delivery_fixced']=$form_data->delivery_fixced;
                                             $data['km_base_charge']=$form_data->km_base_charge;
                                            
                     
                     
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='13';
                                             $datas['delivery_fixced']=$form_data->delivery_fixced;
                                             $datas['km_base_charge']=$form_data->km_base_charge;
                                             
                                            
                                      $result= $this->Main_model->where_names('admin_users','password',$datas['password']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'1','massage'=>'PIN already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                          
				                              $insertid=$this->Main_model->insert_commen($data,$tablename);
				                              $datas['define_driver_id']=$insertid;
				                      	      $this->Main_model->insert_commen($datas,'admin_users');
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

                 	 if($form_data->name!='' && $form_data->vehicle_id!=''  && $form_data->phone!='' && $form_data->pin!='')
                     {
                         $tablename=$form_data->tablename;
                         $data['get_id']=$form_data->id;
                         $data['name']=$form_data->name;
                         $data['vehicle_id']=$form_data->vehicle_id;
                         $data['phone']=$form_data->phone;
                         $data['pin']=$form_data->pin;
                         $data['status']=$form_data->status;
                         $data['delivery_fixced']=$form_data->delivery_fixced;
                         $data['km_base_charge']=$form_data->km_base_charge;
                 	     $this->Main_model->update_commen($data,$tablename);
                 	   
                 	   
                 	   
                 	   
                 	   
                 	                         $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='13';
                                             $datas['delivery_fixced']=$form_data->delivery_fixced;
                                             $datas['km_base_charge']=$form_data->km_base_charge;
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
                            'delivery_fixced' => $value->delivery_fixced, 
                            'km_base_charge' => $value->km_base_charge, 
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
                 	     
                 	     
                 	       if($value->balance!='')
                         {
                             $balance=$value->balance;
                         }
                         else
                         {
                             $balance=$value->amount;
                         }
                       
                      

                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->company_name, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'balance' => $balance,
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
                         
                          $result=$this->db->query("SELECT * FROM driver_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND order_no!=''  AND deleteid=0   ORDER BY id DESC");
                 	          $resultsub=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND order_no=''  AND deleteid=0 ORDER BY id DESC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND order_no!='' AND deleteid=0 ORDER BY id DESC");
                 	         $resultsub=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND order_no='' AND deleteid=0 ORDER BY id DESC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                         $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                       
                       
                                     $array2=array();
                                   foreach($resultsub as $val)
                                   { 
                                       
                                       if($value->id==$val->order_id)
                                       {
                                                 $balance=$val->balance;
                         
                                             	$array2[] = array(
                 	 	    
                 	 	    
                                     	 	    'no' => $i, 
                                                'id' => $val->id, 
                                                'order_id' => $val->order_id, 
                                     	 		'order_no' => $val->order_no, 
                                     	 		'payment_mode' => $val->payment_mode, 
                                     	 		'reference_no' => $val->reference_no, 
                                     	 		'notes' => $val->notes, 
                                     	 		'amount' => $val->amount, 
                                     	 		'paid_status' => $val->paid_status, 
                                     	 		'Payoff' => $val->payin, 
                                     	 		'Payout' => $val->payout,
                                     	 		'balance' => $balance,
                                     	 		'payment_date' => date('d-M-Y',strtotime($val->payment_date)), 
                                     	 		'payment_time' => $val->payment_time,
                                     	 		
                    
                                     	 	);
                                                                 
                                           
                                       }
                                          
                                       
                                   }
                       
                       
                     
                        $balance=$value->balance;
                         
                         
                         
                         
                         
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'credits' => $value->credits,
                            'debits' => $value->debits,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'resultsub'=>$array2
                 	 		

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
                        $output['delivery_fixced']= $value->delivery_fixced;
                        $output['km_base_charge']= $value->km_base_charge;
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
                     $payment_mode_payoff=$form_data->payment_mode_payoff;
                     $reference_no=$form_data->reference_no;
                     $notes=$form_data->notes;
                     $totalpending=$payamount-$enteramount;
                     $driver_id=$form_data->driver_id;
                     $bankaccount=$form_data->bankaccount;
                     
                     $res = $this->Main_model->where_names($tablename,'customer_id',$driver_id);
                     $balancetotal=0;
                     foreach($res as $val)
                     {
                         $payid=$val->id;
                         $customer_id=$val->customer_id;
                         $order_no=$val->order_no;
                         $amount=$val->amount;
                         $balancetotal+=$val->balance;
                         
                     }
                     
                     
                     
                     
                     
                                             $res = $this->Main_model->where_names('admin_users','id',$customer_id);
                                             foreach($res as $val)
                                             {
                                                    $company_name= $val->name;
                                             }
                     
                     
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
                                                         
                                                     }
                                                     
                                                        $data_bank['bank_account_id']=$bid;
                                                        $data_bank['ex_code']=$reference_no;
                                                        $data_bank['debit']=$enteramount;
                                                        $data_bank['credit']=0;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Driver Payment';
                                                        $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                          
                                              }
                                              
                                      
                                     
                     
                     
                     
                     
                     
                     
                     
                     
                              $data['get_id']=$driver_id;
                              $data['balance']=0;
                              $data['paid_status']='Paid';
                              $this->Main_model->update_commen_where($data,'customer_id','driver_ledger');
                 	         
                     
                     
                     
                    
                              $data_driver['order_id']=$payid;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              
                              if($payment_mode_payoff=='Cash')
                              {
                                $data_driver['reference_no']='';
                                $data_driver['order_no']='Cash Payment';  
                              }
                              else
                              {
                                  $data_driver['reference_no']=$reference_no;
                                  $data_driver['order_no']=$reference_no;
                              }
                              
                              
                              $data_driver['amount']=0;
                              
                              
                              if($balancetotal!='0')
                              {
                                  $data_driver['balance']=$balancetotal-$enteramount;
                              }
                              else
                              {
                                  $data_driver['balance']=0;
                              }
                              
                              
                              $data_driver['debits']=0;
                              $data_driver['credits']=$enteramount;
                              
                              $data_driver['notes']=$notes;
                              $data_driver['payout']=$enteramount;
                              $data_driver['paid_status']='Paid';
                              
                             
                      
                 	   
                              $data_driver['payment_date']=$date;
                              $data_driver['payment_time']=$time;
                              $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                              
                              
                              
                              


    }
    
    
    		public function fetch_data_get_ledger_view_total()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     
                     
                     if($formdate=='undefined')
                     {
                        
                        $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM driver_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	          
                 	       $result=$result->result();
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."'   AND deleteid=0   ORDER BY id DESC");
                 	          
                          }
                          else
                          {
                             $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."'  AND deleteid=0 ORDER BY id DESC");
                 	         
                          }
                         
                         
                         
                          $result=$result->result();
                        
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                     $output['totalpayment']= round($value->totaldebit);
                      $output['totalpaid']= round($value->totalpaid); 
                      $output['totaldebit']= round($value->totaldebit); 
                      $output['totalcridit']= round($value->totalcridit); 
                      $output['totalblance']= round($value->totalblance); 
                      $output['outstanding']= round($value->totalcridit-$value->totaldebit);  
                      
                 	 }

                    echo json_encode($output);

	}
	
	
	
	
	
      	public function fetch_data_get_ledger_view_export()
	{









  
           
                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     
                     
                     if($customer_id=='')
                     {
                         
                           $result=$this->db->query("SELECT * FROM driver_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND order_no!=''  AND deleteid=0   ORDER BY id DESC");
                 	          $resultsub=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND order_no=''  AND deleteid=0 ORDER BY id DESC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND order_no!='' AND deleteid=0 ORDER BY id DESC");
                 	         $resultsub=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."' AND paid_status='".$payment_status."' AND order_no='' AND deleteid=0 ORDER BY id DESC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('driver','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $vehicle_id= $valuess->vehicle_id;
                      $phone= $valuess->phone;
                     
                     
	                 	
                 	 }
                  
                         $filename=date('d-m-Y').'_'.$name."_ledger_driver"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8"><?php echo $name; ?></th></tr>
                              <tr><th colspan="8"><?php echo $phone; ?></th></tr>
                              
                             
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th>No</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Reference No</th>
                          <!--<th>PayRef</th>-->
                          <th>Amount</th>
                         
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                          <th>Payment Mode</th>
                          <th>Notes</th>
                         
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                      
                                     $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;     
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	     
                                             $balance=$value->balance;
                                             
                                             
                                                 $balancetoatal+=$balance;
                                          $payouttoatl+=$value->debits;
                                          $payouttoatlcredits+=$value->credits;
                                 	     
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $name; ?></td>
                                          <td><?php echo $value->payment_date; ?> <?php echo $value->payment_time; ?></td>
                                          <td><b><?php echo $value->order_no; ?></b></td>
                                          
                                           <td><?php echo $value->amount; ?></td>
                                           <td><?php echo $value->debits; ?></td>
                                          <td><?php echo $value->credits; ?></td>
                                           <td><?php echo $balance; ?></td>
                                           <td><?php echo $value->payment_mode; ?>  <?php if($value->reference_no!="") { ?>  <small> Reg NO :<?php echo $value->reference_no; ?></small> <?php } ?></td>
                                           <td><?php echo $value->notes ?></td>
                                          
                                            
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                                
                                
                                   <tr >
                          
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td><?php echo $payouttoatl; ?></td>
                                            <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo $balancetoatal; ?></td>
                                           <td></td>
                                           <td></td>
                                          
                                            
                                        </tr>
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}

	

}	
