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
							                
  $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                                            

							                 $query = $this->db->query("SELECT id,company_name FROM `customers`  WHERE deleteid='0' ORDER BY company_name ASC");
                                             $data['customers']=$query->result();
                                                                                 
                                           
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
							                
							                
							                
  $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                                            

							                 $query = $this->db->query("SELECT id,company_name FROM `customers`  WHERE deleteid='0' ORDER BY company_name ASC");
                                             $data['customers']=$query->result();
                                              
							                
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
                                              $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                              $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
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
    
    
    	 public function ledger_find()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                              $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                             $data['customer_id']=$_GET['vendor_id'];
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vendor ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('vendor/ledger_find.php',$data);


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
                                     
                                     
                                     $data['warehouse_address']=$form_data->warehouse_address;
                                     $data['accounts_person_contact']=$form_data->accounts_person_contact;
                                     $data['account_details']=$form_data->account_details;
                                     $data['communication_mode']=$form_data->communication_mode;
                                     $data['referred_by']=$form_data->referred_by;
                                     $data['feedback1']=$form_data->feedback1;
                                     

			                   
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     $data['name']=$form_data->name;
                                 $data['landline']=$form_data->landline;
                                 $data['account_heads_id']=104;
                                 $data['account_heads_id_2']=119;
                               



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
                                     
                                     
                                      $data['warehouse_address']=$form_data->warehouse_address;
                                     $data['accounts_person_contact']=$form_data->accounts_person_contact;
                                     $data['account_details']=$form_data->account_details;
                                     $data['communication_mode']=$form_data->communication_mode;
                                     $data['referred_by']=$form_data->referred_by;
                                     $data['feedback1']=$form_data->feedback1;

			                     $data['account_heads_id']=104;
                                 $data['account_heads_id_2']=119;
                               
			                     
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
                 	 		'account_heads_id' => $value->account_heads_id,
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
                    
                 
                 	 $result= $this->Main_model->where_three_names_limit('all_ledgers','customer_id',$customer_id,'party_type',3,'deleteid',0,$limit);
                 	
                 	 
                 	 
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
                 	 		'order_id' => $value->order_id, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->company_name, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'customer_id' => $value->customer_id, 
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
                     
                    
                       $sql="";
                     if($customer_id!='0')
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                         
                              $formdate=date("Y-m-d", strtotime('monday this week'));
                              $todate=date("Y-m-d", strtotime('sunday this week'));  
                           
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type=3 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql  ORDER BY id ASC");
                 	          
                              
                 	       
                 	       
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          $sql="";
                           if($customer_id!='')
                          {
                         
                              $sql=" AND customer_id='".$customer_id."'";
                           }
                        
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND party_type=3 $sql  ORDER BY id ASC");
                 	          $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	         $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                           $party_name="";
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                           
                           
                           
                                          $bank_name="";
                                     	 $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                     	 foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                     	 }
                       
                       
                                     $array2=array();
                                   foreach($resultsub as $val)
                                   { 
                                       
                                       if($value->id==$val->order_id)
                                       {
                                             if($val->balance!='')
                                             {
                                                 $balance=$val->balance;
                                             }
                                             else
                                             {
                                                 $balance=$val->amount;
                                             }
                                             
                                             	$array2[] = array(
                 	 	    
                 	 	    
                                     	 	    'no' => $i, 
                                                'id' => $val->id, 
                                                'order_id' => $val->order_id, 
                                     	 		'order_no' => $val->order_no, 
                                     	 		'payment_mode' => $val->payment_mode, 
                                     	 		'reference_no' => $val->reference_no, 
                                     	 		'customer_id' => $val->customer_id, 
                                     	 		'notes' => $val->notes, 
                                     	 		'amount' => $val->amount, 
                                     	 		'credits' => $val->credits,
                                     	 		'debits' => $val->debits,
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
                 	 		'customer_id' => $value->customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'credits' => $value->credits,
                            'debits' => $value->debits,
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'balance' => $balance,
                 	 		'bank_name'=>$bank_name,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'resultsub'=>$array2
                 	 		

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
		public function fetch_data_get_ledger_view_total()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                       $sql="";
                      if($customer_id!='0')
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                     
                     if($formdate=='undefined')
                     {
                        
                              $formdate=date("Y-m-d", strtotime('monday this week'));
                              $todate=date("Y-m-d", strtotime('sunday this week')); 
                         
                        
                               $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE  deleteid=0 AND party_type=3 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql   ORDER BY id DESC");
                 	     
                             
                           
                        
                             
                 	       $result=$result->result();
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          $sql="";
                           if($customer_id!='')
                          {
                         
                              $sql=" AND customer_id='".$customer_id."'";
                           }
                          
                          if($payment_status=='All')
                          {
                              
                             
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND party_type=3  $sql ORDER BY id DESC");
                 	          
                          }
                          else
                          {
                             $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid=0 AND party_type=3 $sql ORDER BY id DESC");
                 	         
                          }
                         
                         
                         
                          $result=$result->result();
                        
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                      $output['totalpayment']= round($value->totaldebit);
                      $output['totalpaid']=  round($value->totalpaid); 
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
                       $sql="";
                     if($customer_id!='')
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                    
                     
                     
                     if($customer_id=='')
                     {
                         
                           $formdate=date("Y-m-d", strtotime('monday this week'));
                           $todate=date("Y-m-d", strtotime('sunday this week')); 
                              
                           $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type=3 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  $sql  ORDER BY id ASC");
                 	       $result=$result->result(); 
                 	       
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                         
                          $sql="";
                          if($customer_id!='')
                          {
                         
                              $sql=" AND customer_id='".$customer_id."'";
                           }
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type=3 $sql  ORDER BY id ASC");
                 	          $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	         $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid=0 AND party_type=3 $sql ORDER BY id ASC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('vendor','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $email= $valuess->email;
                      $phone= $valuess->phone;
                      $gst= $valuess->gst;
                      $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->city.','.$valuess->state;
                      
	                 	
                 	 }
                  
                         $filename=date('d-m-Y').'_'.$name."_ledger_vendor"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                          if($phone!='')
                         {
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="9"><?php echo $name; ?></th></tr>
                              <tr><th colspan="9"><?php echo $phone; ?></th></tr>
                              <tr><th colspan="9"><?php echo $gst; ?></th></tr>
                              <tr><th colspan="9"><?php echo $fulladdress; ?></th></tr>
                          
                         </thead> 
                         
                    </table>
                     <?php
                         }
                    ?>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th> No</th>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Chq/Ref.No</th>
                          <th>Amount</th>
                          <th>Debit</th>
                          <th>Credit</th>
                         
                          <th>Payment Mode</th>
                          <th>Notes</th>
                          
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                         
                                    
                                     $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;
                                      $i=1;
                                         
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	                $resultventb= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                                      foreach ($resultventb as  $bb) {
                                                          $bank_name= $bb->bank_name; 
                                                      }
                                                  
                                          
                                                     $resultvent= $this->Main_model->where_names('vendor','id',$value->customer_id);
                                                 	 foreach ($resultvent as  $valuess) {
                                                      
                                                      $name= $valuess->name;
                                                     }
                                         	 
                                             
                                             
                                                 $balancetoatal+=$balance;
                                          $payouttoatl+=$value->debits;
                                          $payouttoatlcredits+=$value->credits;
                                             
                         
                                 	     
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><b><?php echo $name; ?></b></td>
                                          <td><?php echo $value->payment_date; ?> <?php echo $value->payment_time; ?></td>
                                            <td><b><?php echo $value->reference_no; ?></b></td>
                                          
                                           <td><?php echo $value->amount; ?></td>
                                          <td><?php echo $value->debits; ?></td>
                                          <td><?php echo $value->credits; ?></td>
                                           
                                           <td>
                                               
                                               <?php
                                               
                                                      if($value->payment_mode!='Cash')
                                                      {
                                                          echo $value->payment_mode;
                                                          echo "<br>";
                                                          echo  $bank_name;
                                                      }
                                                      else
                                                      {
                                                          echo $value->payment_mode;
                                                         
                                                      }
                                                      
                                               ?>
                                               
                                           </td>
                                           
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
                                           
                                            
                                        </tr>
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

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
                      $output['name']= $value->name; 
                      $output['company_name']= $value->company_name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['gst']= $value->gst;
                      $output['pin']= $value->pin;
                      $output['account_heads_id']= $value->account_heads_id;
                      $output['fulladdress']= $value->address1.$value->landmark.$value->pincode.','.$value->city.','.$value->state;
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      
                      
                      $output['warehouse_address']= $value->warehouse_address;
                      $output['accounts_person_contact']= $value->accounts_person_contact;
                      $output['account_details']= $value->account_details;
                      $output['communication_mode']= $value->communication_mode;
                      $output['referred_by']= $value->referred_by;
                      $output['feedback1']= $value->feedback1;
                      
                      
                      
                      $output['city']= $value->city;
                      $output['state']= $value->state;
                      $output['status']= $value->status;
                      $output['landline']= $value->landline;

                     
	                 	
                 	 }

                    echo json_encode($output);


    }
    
      public function fetch_single_data_customer()
    {
        
                     $output=array();
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $id=$form_data->id;
                     
                     $pp=explode('-', $id);
                     $id=$pp[0];
                     
                     
    	             $result= $this->Main_model->where_names('customers','id',$id);
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['name']= $value->company_name; 
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
                     
                 
                     
                     $tablename='all_ledgers';
                     
                     $enteramount=$form_data->enteramount;
                     $notes=$form_data->notes;
                     $payamount=$form_data->payamount;
                     $payment_mode_payoff=$form_data->payment_mode_payoff;
                     $reference_no=$form_data->reference_no;
                     $totalpending=$payamount-$enteramount;
                     $vendor_id=$form_data->vendor_id;
                     $bankaccount=$form_data->bankaccount;
                     $bankaccount=$form_data->bankaccount;
                     
                     
                     
                     $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$vendor_id,'party_type',3,'deleteid','0','id','ASC');
                     
                      $balancetotal=0;
                      $balancetotalddtotal=0;
                      $debitsdd=0;
                      $creditsdd=0;
                     foreach($res as $val)
                     {
                         $payid=$val->id;
                        
                         $order_no=$val->order_no;
                         $amount=$val->amount;
                          $debitsdd+=$val->debits;
                          $creditsdd+=$val->credits;
                          $balancetotal+=$val->balance; 
                     }
                     
                     
                            
                                               $balancetotal=$creditsdd-$debitsdd;
                                                                                                  
                     
                     
                                              $account_head_id=0;
                                              $res = $this->Main_model->where_names('vendor','id',$vendor_id);
                                              foreach($res as $val)
                                              {
                                                    $company_name= $val->name;
                                                    $account_head_id= $val->account_heads_id;
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
                                                          $account_no=$valb->account_no;
                                                          $account_heads_id_by_bank=$valb->account_heads_id;
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
                                                        $data_bank['ex_code']=$reference_no;
                                                        
                                                        
                                                        
                                                        
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']='-'.$enteramount;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal-$enteramount;
                                                                         }
                                                        
                                                        
                                                        
                                                        $data_bank['debit']=$enteramount;
                                                        
                                                        
                                                        
                                                        $data_bank['credit']=0;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Purchase Payment';
                                                        
                                                        
                                                        
                                                        
                                                        
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
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        $data_bank['user_id']=$this->userid;
                                                        $data_bank['party_type'] = 4;
                                                        $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                          
                                              }
                                              
                                      
                                     
                     
                     
                     
                     
                     
                          
                    
                              $data_driver['order_id']=$payid;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$vendor_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['process_by']='Payment received By Vendor Ledger';
                              
                              $data_driver['party_type'] = 3;
                              if($payment_mode_payoff=='Cash')
                              {
                                        $data_driver['reference_no']='00000';
                                        $data_driver['order_no']='Cash Payment'; 
                                        $data_driver['cash_trasfer_status']=0;
                              }
                              else
                              {
                                       $data_driver['reference_no']=$reference_no;
                                       $data_driver['order_no']=$reference_no;
                                       $data_driver['cash_trasfer_status']=1;
                              }
                              
                              
                              
                              $data_driver['amount']=0;
                              
                             
                                if($balancetotal==0)
                               {   
                                                                   $data_driver['balance']=$enteramount;
                               }
                               else
                               {
                                                                   
                                                                   $data_driver['balance']=$balancetotal-$enteramount;
                                }
                                
                                                          
                              
                              $data_driver['debits']=$enteramount;
                              $data_driver['credits']=0;
                              
                              
                             
                              $data_driver['notes']=$notes;
                              $data_driver['payout']=$enteramount;
                              $data_driver['paid_status']='Paid';
                              $data_driver['bank_id']=$bankaccount;
                              
                              
                              $data_driver['account_head_id']=104;
                              $data_driver['account_heads_id_2']=119;
                 	   
                              $data_driver['payment_date']=$date;
                              $data_driver['payment_time']=$time;
                              $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                     


    }
	


}

