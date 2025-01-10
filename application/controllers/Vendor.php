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
			   $from_date=$sess_array['from_date'];
			   $to_date=$sess_array['to_date'];
			   $this->from_date=$from_date;
			   $this->to_date=$to_date;

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

                                            $data['vendor'] = $this->Main_model->where_names_order_by('vendor','deleteid','0','id','ASC');



                                   //$data['vendor'] =$this->Main_model->where_names_two_order_by('vendor','mark_customer_id','0','deleteid','0','id','ASC');

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
    
    
    
    
    	 public function ledger_find_delete_log()
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
                                             $this->load->view('vendor/ledger_find_delete_log.php',$data);


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
                     
                     if($form_data->phone!='' && $form_data->name!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 $data['address2']=$form_data->address2;



     $data['mark_customer_id']=$form_data->mark_customer_id;




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
			                     $data['gst_status']=$form_data->gst_status;
			                     
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
				                      	    $addressid=$this->Main_model->insert_commen($data,$tablename);
				                      	    
                                            $this->db->query("UPDATE customers SET mark_vendor_id='".$addressid."',active_value='".$addressid."' WHERE id='". $data['mark_customer_id']."'");



                                   if($form_data->mark_customer_id>0)
                                   {



                                    $active_value=0;  
                                    $vendor_id=$addressid;
                                    $customer_id=$form_data->mark_customer_id;
                                    $getactive_vendor_id = $this->Main_model->where_names($tablename,'id',$addressid);
                                    foreach($getactive_vendor_id as $vals)
                                    {
                                             $active_value=$vals->mark_customer_id;
                                             $customer_id=$vals->mark_customer_id;
                                    }
                                    
                             
                                    if($form_data->active=='0')
                                    {
                                        
                                        $data['mark_customer_id']=0;
                                        if($form_data->mark_customer_id>0)
                                        {
                                            $customer_id=$form_data->mark_customer_id;
                                        }
                                        else
                                        {
                                            $customer_id=$active_value;
                                        }
                                        
                                       
                                    $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
                                    $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
                         $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
                         $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1'");	


                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                         $data['mark_customer_id']=-1;
                                         if($form_data->mark_customer_id>0)
                                         {
                                            $customer_id=$form_data->mark_customer_id;
                                         }
                                         else
                                         {
                                            $customer_id=$active_value;
                                         }
                                        
                                         
                    $this->db->query("UPDATE customers SET deleteid='1' WHERE id='". $customer_id."'");
                    $this->db->query("UPDATE vendor SET deleteid='0',mark_customer_id=-1 WHERE id='". $vendor_id."'");
                    $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
                    $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1'");



                                    }
                                    else
                                    {
                                        
                                        
                                       
                                        
                                        if($form_data->mark_customer_id>0)
                                        {
                                            
                                            $data['mark_customer_id']=$form_data->mark_customer_id;
                                            
                                            
                                        }
                                        else
                                        {
                                              if($form_data->active>0)
                                              {
                                                
                                                 $data['mark_customer_id']=$form_data->mark_customer_id;
                                                
                                              }
                                              else
                                              {
                                                 $data['mark_customer_id']=0;
                                                
                                              }
                                       }
                                        
                                       
  $this->db->query("UPDATE vendor SET mark_customer_id='".$customer_id."',deleteid='0' WHERE id='". $vendor_id."'");
  $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
  $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status=1"); 
  $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status=1"); 
                                    
                                        
                                        
                                    }


                                    }

				                      	    
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
                                     $data['mark_customer_id']=$form_data->mark_customer_id;
                                     
                                      $data['warehouse_address']=$form_data->warehouse_address;
                                     $data['accounts_person_contact']=$form_data->accounts_person_contact;
                                     $data['account_details']=$form_data->account_details;
                                     $data['communication_mode']=$form_data->communication_mode;
                                     $data['referred_by']=$form_data->referred_by;
                                     $data['feedback1']=$form_data->feedback1;

			                     $data['account_heads_id']=104;
                                 $data['account_heads_id_2']=119;
                               
			                     
			                     $data['gst']=$form_data->gst;
			                     $data['gst_status']=$form_data->gst_status;
			                     $data['name']=$form_data->name;
                                 $data['landline']=$form_data->landline;
                                

                 	   $this->Main_model->update_commen($data,$tablename);
                 	   
               $this->db->query("UPDATE customers SET mark_vendor_id='".$data['get_id']."',active_value='".$data['get_id']."' WHERE id='". $data['mark_customer_id']."'");




                                    $active_value=0;  
                                    $vendor_id=$form_data->id;
                                    $getactive_vendor_id = $this->Main_model->where_names($tablename,'id',$form_data->id);
                                    foreach($getactive_vendor_id as $vals)
                                    {
                                             $active_value=$vals->mark_customer_id;
                                             $customer_id=$vals->mark_customer_id;
                                    }

                                     $getactive_vendor_ids = $this->Main_model->where_names('customers','mark_vendor_id',$form_data->id);
                                    foreach($getactive_vendor_ids as $valss)
                                    {
                                             $customer_id=$valss->id;
                                             
                                    }
                                    
                             
                                      if($form_data->active=='0')
                                    {
                                        
                                       
                                        
                                       
                                    $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
                                    $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
                                    $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
                                    $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1'");   


                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                        
                                        
                                         
                    $this->db->query("UPDATE customers SET deleteid='1' WHERE id='". $customer_id."'");
                    $this->db->query("UPDATE vendor SET deleteid='0',mark_customer_id=-1 WHERE id='". $vendor_id."'");
                    $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
                    $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1'");



                                    }
                                    else
                                    {
                                        
                                        
                       
                                      
                                        
                                       
  $this->db->query("UPDATE vendor SET mark_customer_id='".$customer_id."',deleteid='0' WHERE id='". $vendor_id."'");
  $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
  $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status=1"); 
  $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status=1"); 
                                    
                                        
                                        
                                    }

                                    

                 	   
                       $array=array('error'=>'2','massage'=>'Vendor successfully Updated..');
                       echo json_encode($array);

                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                    if($form_data->action=='updatevalue')
                 {
                     
                       date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('Y-m-d');
                       $time= date('h:i A');
                   

                      $tablename=$form_data->tablename;
                      $lab=$form_data->lab;
                      
                      if($lab=='payment_status')
                      {
                          $obalance=$form_data->obalance;
                          $data['opening_balance']=$obalance;
                          $data['op']=$obalance;
                          $data['op_status']=$form_data->val;
                          $data_driver['order_id']=0;
                          $data_driver['user_id']=$this->userid;
                          $data_driver['customer_id']=$form_data->id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          
                          
                          
                          
                                                                     // $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='3' AND opening_balance_status='1'");
                                                                    
                          
                          
                                                                             
                                                                              if($form_data->val=='1')
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                             
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance';
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                              
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['bank_id']='25';
                                                                              $data_driver['payment_date']=date('Y-06-30');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=3;
                                                                              $data_driver['deletemod']='OP3-'.$form_data->id;
                                                                              $data_driver['account_head_id']=104;
                                                                              $data_driver['account_heads_id_2']=119;
                                                                              
                                                                              
   $querycheck = $this->db->query("SELECT id FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='3' AND opening_balance_status='1'");
  $querycheck=$querycheck->result();
  if(count($querycheck)==0)
  {
    
                                                                            
                                                                             $this->Main_model->insert_commen($data_driver,'all_ledgers');
                                                                              
                          
  }
  else
  {

  	$this->db->query("UPDATE all_ledgers SET debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='3' AND opening_balance_status='1'");

                 
  }
                                                                                  
                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $form_data->id; 
                                 $datas_log['data_fetch']= json_encode($data_driver); 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');   




                                                                                     date_default_timezone_set("Asia/Kolkata"); 
                                                                                     $date= date('Y-m-d');
                                                                                     $time= date('h:i A');
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Vendor Account Changes';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($form_data);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');

                                                                
                          
                          
                          
                      }
                      
                      
                      $data['get_id']=$form_data->id;
                      $data[$lab]=$form_data->val;
                      $this->Main_model->update_commen($data,$tablename);

                 }

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);




                     
                     //$this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE customer_id='".$id."' AND party_type=3");

                             $result = $this->Main_model->where_names_two_order_by('all_ledgers', 'customer_id', $id, 'party_type', '3', 'id', 'DESC');

                     
                             foreach ($result as  $value)
                             {
                                 
                                $deleteval= $value->deletemod;
                               

                                  if($deleteval!='')
                                {
                                     if($deleteval!='0')
                                     {
                                
                                            

                                            // $this->db->query("UPDATE bankaccount_manage SET deleteid='1',user_id='".$this->userid."' WHERE deletemod='".$deleteval."'");
                                        
                                        
                                        
                                     }
                                        
                                }


                             }



                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $id; 
                                 $datas_log['data_fetch']= 'Vendor Deleted'; 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');
                     

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


                 	 


                                      




                    if($value->op>0)
                    {

                          $value->opening_balance=$value->op;
                          $value->payment_status=$value->op_status;

                    }
                    else
                    {

                        $update_date=date('Y-m-d',strtotime($value->update_date));
                        if($update_date>'2023-05-19')
                        {


                                 $value->opening_balance=$value->op;
                                  $value->payment_status=$value->op_status;


                        }
                        else
                        {

                              $value->opening_balance=$value->op;
                              $value->payment_status=$value->op_status;
                          

                        }



                    }


                      
 	     




                 	 	$array[] = array(
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		
                 	 		'email' => $value->email, 
                 	 		'phone' => $value->phone, 
                 	 		'name' => $value->name, 
                 	 		'pin' => $value->pin, 
                 	 		'gst' => $value->gst, 
                 	 		'tcs_status' => $value->tcs_status, 
                 	 		'gst_status' => $value->gst_status, 
                 	 		'address' => $value->address1.''.$value->address2.''.$value->landmark.''.$value->pincode,
                 	 		'city' => $value->city,
                 	 		'account_heads_id' => $value->account_heads_id,
                 	 		'state' => $value->state,
                 	 		'opening_balance' => $value->opening_balance,
                 	 		'payment_status' => $value->payment_status,
                 	 		'mark_customer_id' => $value->mark_customer_id,
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
                       if($customer_id>0)
                     {
                         
                         
                              $sql=" AND customer_id='".$customer_id."'";
                        
                        
                     }
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                         
                              $formdate=$this->from_date;
                              $todate=$this->to_date;  
                           
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=3 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND opening_balance_status='0' $sql  ORDER BY payment_date ASC");
                 	          
                              
                 	       
                 	       
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          $sql="";
                           if($customer_id>0)
                          {
                         
                              $sql=" AND customer_id='".$customer_id."'";
                           }
                        
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='0' $sql  ORDER BY payment_date ASC");
                 	         
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='0' $sql ORDER BY payment_date ASC");
                 	        
                          }
                         
                         
                         
                          $result=$result->result();
                         
                         
                     }




























                    
                     
                    $payment_date=date('d-M-Y',strtotime($formdate));
                     $resultopeing_new=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='1' $sql ORDER BY payment_date ASC");
                     $resultopeing_new=$resultopeing_new->result();
                     $openingbalance_new=0;
                     $openingbalancec_new=0;
                     $openingbalanced_new=0;
                     $openingbalanceval_new=0;
                     foreach ($resultopeing_new as  $valuess)
                         {
                              $credits_new=$valuess->creditstotal;
                              $debits_new=$valuess->debitstotal;
                             
                             
                            
                              $payment_date_set=date('d-M-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-M-Y',strtotime($formdate));
                              }
                              

                              
                              $openingbalance_new=  $credits_new-$debits_new;
                              $openingbalanceval_new=  $credits_new-$debits_new;
                                
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                         }
                     
                                
                                
                                if($getstatus1_new==1)
                                {
                                    $openingbalanced_new=$openingbalance_new;
                                    $openingbalancec_new=0;
                                }
                                else
                                {
                                     $openingbalanced_new=0;
                                     $openingbalancec_new=$openingbalance_new;
                                }




























                    
                 	 
                 	  	 
                 	 $resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='0' $sql ORDER BY payment_date ASC");
                 	 $resultopeing=$resultopeing->result();
                 	 $openingbalance=0;
                 	 $openingbalancec=0;
                 	 $openingbalanced=0;
                 	 $openingbalanceval=0;
                     foreach ($resultopeing as  $valuess)
                     	 {
                     	      $credits=$valuess->creditstotal;
                              $debits=$valuess->debitstotal;
                     	      $openingbalance=  $credits-$debits;
                     	      $openingbalanceval=  $credits-$debits;
                     	        
                                            if($openingbalance<0)
                                            {
                                                $getstatus1=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                                
                                            }
                                            
                              $openingbalance=abs($openingbalance);
                              
                     	 }
                 	 
                 	            
                 	            
                 	            if($getstatus1==1)
                 	            {
                 	                $openingbalanced=$openingbalance;
                 	                $openingbalancec=0;
                 	            }
                 	            else
                 	            {
                 	                 $openingbalanced=0;
                 	                 $openingbalancec=$openingbalance;
                 	            }




















                        $opdebits= $openingbalanced+$openingbalanced_new;
                        $opcredits= $openingbalancec+$openingbalancec_new;
                        $openingbalance= $opcredits-$opdebits;
                        $openingbalance=abs($openingbalance);
                        
                        $openingbalance_data= $opcredits-$opdebits;
                        
                        if($openingbalance_data<0)
                        {
                                                    $getstatus1_new=1;
                                                    
                        }
                        else
                        {
                                                    $getstatus1_new=0;
                                                    
                        }
                        

                     
                     
                       $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                           $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                           $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                           
                             if($totalvalopeingbalance>0)
                       {
                             $credits_opening=$totalvalopeingbalance;
                             $debits_opening=0;
                       }
                       else
                       {     
                            $debits_opening=str_replace("-","",$totalvalopeingbalance);
                            $credits_opening=0;
                       }
                 	 
                 	 $array2[]=array(
                 	        'no' => '#', 
                            'id' => 0, 
                            'name' => '', 
                            'order_id' => '', 
                 	 		'order_no' => '', 
                 	 		'payment_mode' => '', 
                 	 		'reference_no' => '',
                 	 		'customer_id' => '',
                 	 		'notes' => '',
                 	 		'amount' => '',
                 	 		'paid_status' =>'',
                 	 		'Payoff' => '',
                 	 		'Payout' => '',
                 	 		'debits' => $debits_opening,
                            'credits' => $credits_opening,
                 	 		'balance' => round($openingbalance,2),
                 	 		'getstatus' => $getstatus1_new,
                 	 		'bank_name'=>'',
                 	 		'payment_date' =>$payment_date, 
                 	 		'payment_time' => ''
                 	     
                 	     );
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=2;
                 	 $j=1;
                 	  $array=array();
                 	  
                 	  
                 	     $balanceold=array($openingbalance_data);
                     	 foreach ($result as  $value)
                     	 {
                     	      $credits=$value->credits;
                              $debits=$value->debits;
                     	      $balanceold[]=  $credits-$debits;
                     	     
                     	 }
                 	  
                 	 foreach ($result as  $value) {
                       
                         $account_head_idname="";

                    $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                    $result_account_head_text=$result_account_head->result();
                    
                   foreach($result_account_head_text as $ass)
                   {
                                              $account_head_idname=$ass->name;
                                             
                   }

                     $voucher_name='';
                         if($value->voucher_base){
                          if($value->voucher_base=='journal'){
                            $voucher_name = 'JOURNAL';
                          }
                          elseif($value->voucher_base=='payment'){
                            $voucher_name = 'PAYMENT';
                          }
                          elseif($value->voucher_base=='receipt'){
                            $voucher_name = 'RECEIPT';
                          }
                          
                          $account_head_idname=$voucher_name;
                         }

                           $party_name="";
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                           
                           
                           
                           
                           
                           
                                                        $addclass="";
                 	     if($value->changes_status==1)
                 	     {
                 	         $addclass="bgcolorchange";
                 	         
                 	     }
                           
                           
                           
                                          $bank_name="";
                                     	 $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                     	 foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                     	 }
                                    if($value->bank_id > 0)
                                    {
                                             if($value->bank_id==25 && $value->account_heads_id_2==119)
                                            {        
                                                    if($value->process_by=='Purchase Invoice Create')
                                                    {
                                                        $account_head_idname = 'PURCHASE ACCOUNT';
                                                    }
                                                    
                                            }
                                            else
                                            {
                                                    $account_head_idname = $bank_name;
                                            }
                                     }



                        $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
                       
                                   
                         $username="";


                                      if($value->edited_by>0)
                                      {
                                        $value->user_id=$value->edited_by;
                                        $username='Changed BY :';
                                      }

                         
                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                        $username='Deleted By :';
                                      }
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username.= $valuess->name; 
                                          
                                         
                                       }
                     
                        
                     	                       $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                          
                                         $seti=$j;
                                         
                         
                                         $link="#";
                                     	 $resultorder= $this->Main_model->where_names('purchase_invoice','id',$value->order_id);
                                     	 
                                     	 if(count($resultorder)>0)
                                     	 {
                                     	     
                                     	        foreach ($resultorder as  $valueorder) 
                                     	        {
                                                 
                                                  $order_id= $valueorder->id; 
                                                  
                                                 
                                             	}
                                     	      $link=base64_encode($order_id);
                                     	 }
                                     	    
                                     	    
                                     	      $edit_status=0;
                                     	    if($link=='#')
                                     	    {
                                     	        $edit_status=1;
                                     	    }
                     
                                          $valueset=$balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=round($valueset,2); 
                                            $total=str_replace('-','', $total);

                                               if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $seti, 
                            'id' => $value->id,
                            'name' => $party_name, 
                            'order_id' => $link, 
                            'addclass' => $addclass,
                            'username_base' => $username_base, 
                            'bank_name' => $bank_name,
                            'username' => $username,
                 	 		'order_no' => $value->order_no, 
                 	 		'edit_status' => $edit_status, 
                 	 		'order_base_id' => $value->order_id,
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'customer_id' => $value->customer_id, 
                 	 		'org_amount' => $value->org_amount, 
                 	 		'notes' => $value->notes.' | '.$value->deletemod,
                            'deletemod' => $value->deletemod,
                 	 		'amount' => $value->amount, 
                 	 		'credits' => round($value->credits,2),
                            'debits' => round($value->debits,2),
                 	 		'paid_status' => $value->paid_status, 
                            'dummy_customer_id' => $value->dummy_customer_id,
                            'dummy_customer_name' =>$value->dummy_customer_name,
                            'dummy_party_type' => $value->dummy_party_type,
                            'dummy_amount' => $value->dummy_amount,  
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'balance' => $total,
                 	 		'getstatus'=>$getstatus,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'update_date' => date('d-m-Y g:i A',strtotime($value->update_date)), 
                 	 		'payment_time' => $value->payment_time,
                            'account_head_name'=>$account_head_idname
                 	 		
                 	 		

                 	 	);


                        $i++;
                        $j++;

                 	 }

                  $totalarray=array_merge($array2,$array);
                  echo json_encode($totalarray);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_get_ledger_view_group()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                       $sql="";
                      if($customer_id>0)
                     {
                         
                         
                          $sql.=" AND a.customer_id='".$customer_id."'";
                        
                         
                        
                     }


                     $todate=$_GET['todate'];


                      if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";

                        
                     }
                     
                    
                      
                         
                          
                      $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=3  $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                 	  $result=$result->result();
                         
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                          
                           
                           
                                         $bank_name="";
                                     	 $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                     	 foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                     	 }
                       
                       
                                   
                       
                     
                     
                         
                         $seti=$i;
                         
                                   $payment_status="";
                                    if($value->op_status==1)
                                    {
                                        $payment_status='CR';
                                    }
                                     if($value->op_status==2)
                                    {
                                        $payment_status='DR';   
                                    }
                                    
                                    
                                    
                                          $valueset=$value->creditstotal-$value->debitstoatal;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=round($valueset,2); 
$total=str_replace('-','', $total);
                                    
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'customer_id' => $value->customer_id, 
                            'order_id' => $link, 
                            'payment_status' => $payment_status,
                            'opening_balance' => round($value->op,2),
                 	 		'debits' => round($value->debitstoatal,2),
                            'credits' => round($value->creditstotal,2),
                            'getstatus' => $getstatus,
                 	 		'balance' => $total
                 	 		
                 	 		

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
                       $todate=$_GET['todate'];
                     
                    
                           $sql="";
                      $sql2="";
                     $sql3="";
                     
                          if($customer_id>0)
                         {
                             
                             
                                  $sql.=" AND a.customer_id='".$customer_id."'";
                              $sql2.=" AND a.customer_id='".$customer_id."'";
                                $sql3.=" AND a.customer_id='".$customer_id."'";
                             
                            
                         }

                     if($formdate!='undefined')
                     {
                        $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";

                        $sql2.=" AND a.payment_date < '".$formdate."'";
                     }
                         
                         if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                     
                     
                      
                          $todate=$_GET['todate'];










                      $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=3   $sql2   ORDER BY a.id DESC");
                     $resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


  $openingbalance=  $set->totalopeingbalance;

  if($openingbalance>0)
  {
    $opstatus=0;
  }
  else
  {
    $opstatus=1;
  }
  $openingbalance=abs($openingbalance);

}



 $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=3   $sql3   ORDER BY a.id DESC");
                     $resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


          $balance=  $set->totalopeingbalance;

          if($balance>0)
          {
            $getstatus=0;
          }
          else
          {
            $getstatus=1;
          }
          $balance=abs($balance);

}









                          $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=3 AND b.deleteid=0 $sql ORDER BY a.id DESC");
                 	         
                          $result=$result->result();
                 	     
                       
                    
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	
                        $output['totalpayment']= round($value->totaldebit,2);
                        $output['totalpaid']=  round($value->totalpaid,2); 
                        $output['totaldebit']= round($value->totaldebit,2); 
                        $output['totalcridit']= round($value->totalcridit,2); 
                        $output['totalblance']= $balance;
                        $output['getstatus']= $getstatus; 
                        $output['getstatus1']= $getstatus; 
                        $output['outstanding']= round($balance,2); 

                       $output['opstatus']= round($opstatus,2);
                       $output['openingbalance']= round($openingbalance,2);
                      
                 	 }

                    echo json_encode($output);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_get_ledger_view_export()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                       $sql="";
                      if($customer_id>0)
                     {
                         
                         if($customer_id>0)
                         {
                              $sql=" AND customer_id='".$customer_id."'";
                         }
                         
                        
                     }
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                         
                              $formdate=$this->from_date;
                              $todate=$this->to_date;  
                           
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=3 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND opening_balance_status='0' $sql  ORDER BY payment_date ASC");
                 	          
                              
                 	       
                 	       
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          $sql="";
                           if($customer_id>0)
                          {
                         
                              $sql=" AND customer_id='".$customer_id."'";
                           }
                        
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='0' $sql  ORDER BY payment_date ASC");
                 	         
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='0' $sql ORDER BY payment_date ASC");
                 	        
                          }
                         
                         
                         
                          $result=$result->result();
                         
                         
                     }




























                    
                     
                      $payment_date=date('d-M-Y',strtotime($formdate)); 
                     $resultopeing_new=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=3 AND opening_balance_status='1' $sql ORDER BY payment_date ASC");
                     $resultopeing_new=$resultopeing_new->result();
                     $openingbalance_new=0;
                     $openingbalancec_new=0;
                     $openingbalanced_new=0;
                     $openingbalanceval_new=0;
                     foreach ($resultopeing_new as  $valuess)
                         {
                              $credits_new=$valuess->creditstotal;
                              $debits_new=$valuess->debitstotal;
                              
                              
                              
                              $payment_date_set=date('d-M-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-M-Y',strtotime($formdate));
                              }

                              
                              
                              $openingbalance_new=  $credits_new-$debits_new;
                              $openingbalanceval_new=  $credits_new-$debits_new;
                                
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                         }
                     
                                
                                
                                if($getstatus1_new==1)
                                {
                                    $openingbalanced_new=$openingbalance_new;
                                    $openingbalancec_new=0;
                                }
                                else
                                {
                                     $openingbalanced_new=0;
                                     $openingbalancec_new=$openingbalance_new;
                                }




























                    
                 	 
                 	  	 
                 	 $resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=3  AND opening_balance_status='0' $sql ORDER BY payment_date ASC");
                 	 $resultopeing=$resultopeing->result();
                 	 $openingbalance=0;
                 	 $openingbalancec=0;
                 	 $openingbalanced=0;
                 	 $openingbalanceval=0;
                     foreach ($resultopeing as  $valuess)
                     	 {
                     	      $credits=$valuess->creditstotal;
                              $debits=$valuess->debitstotal;
                     	      $openingbalance=  $credits-$debits;
                     	      $openingbalanceval=  $credits-$debits;
                     	        
                                            if($openingbalance<0)
                                            {
                                                $getstatus1=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                                
                                            }
                                            
                              $openingbalance=abs($openingbalance);
                              
                     	 }
                 	 
                 	            
                 	            
                 	            if($getstatus1==1)
                 	            {
                 	                $openingbalanced=$openingbalance;
                 	                $openingbalancec=0;
                 	            }
                 	            else
                 	            {
                 	                 $openingbalanced=0;
                 	                 $openingbalancec=$openingbalance;
                 	            }


















                        $opdebits= $openingbalanced+$openingbalanced_new;
                        $opcredits= $openingbalancec+$openingbalancec_new;
                        $openingbalance= $opcredits-$opdebits;
                        $openingbalance=abs($openingbalance);
                        
                        $openingbalance_data= $opcredits-$opdebits;
                        
                        if($openingbalance_data<0)
                        {
                                                    $getstatus1_new=1;
                                                    
                        }
                        else
                        {
                                                    $getstatus1_new=0;
                                                    
                        }

                           
                           
                             $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                           $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                           $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                           
                             if($totalvalopeingbalance>0)
                       {
                             $credits_opening=$totalvalopeingbalance;
                             $debits_opening=0;
                       }
                       else
                       {     
                            $debits_opening=str_replace("-","",$totalvalopeingbalance);
                            $credits_opening=0;
                       }
                       
                       
                       
                 	 
                 	 $array2[]=array(
                 	        'no' => '#', 
                            'id' => 0, 
                            'name' => 'Opening Balance', 
                            'order_id' => '', 
                 	 		'order_no' => '', 
                 	 		'payment_mode' => '', 
                 	 		'reference_no' => '',
                 	 		'customer_id' => '',
                 	 		'notes' => '',
                 	 		'amount' => '',
                 	 		'paid_status' =>'',
                 	 		'Payoff' => '',
                 	 		'Payout' => '',
                 	 		'debits' => $debits_opening,
                            'credits' => $credits_opening,
                 	 		'balance' => round($openingbalance,2),
                 	 		'getstatus' => $getstatus1_new,
                 	 		'bank_name'=>'',
                 	 		'payment_date' =>$payment_date, 
                 	 		'payment_time' => ''
                 	     
                 	     );
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=2;
                 	 $j=1;
                 	  $array=array();
                 	  
                 	  
                 	     $balanceold=array($openingbalance_data);
                     	 foreach ($result as  $value)
                     	 {
                     	      $credits=$value->credits;
                              $debits=$value->debits;
                     	      $balanceold[]=  $credits-$debits;
                     	     
                     	 }
                 	  
                 	 foreach ($result as  $value) {
                       
                               $account_head_idname="";

                                            $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                                            $result_account_head_text=$result_account_head->result();
                                            
                                           foreach($result_account_head_text as $ass)
                                           {
                                                                      $account_head_idname=$ass->name;
                                                                     
                                           }


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

                                    if($value->bank_id > 0)
                                    {
                                             if($value->bank_id==25 && $value->account_heads_id_2==119)
                                            {

                                                    if($value->process_by=='Purchase Invoice Create')
                                                    {
                                                        $account_head_idname = 'PURCHASE ACCOUNT';
                                                    }

                                            }
                                            else
                                            {
                                               $account_head_idname = $bank_name;
                                            }
                                     }
                                          


                                     $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
                       
                       
                                   
                       
                     
                        
                     	                       $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                          
                                         $seti=$j;
                                         
                         
                                         $link="#";
                                     	 $resultorder= $this->Main_model->where_names('purchase_orders_process','order_no',$value->order_no);
                                     	 
                                     	 if(count($resultorder)>0)
                                     	 {
                                     	     
                                     	        foreach ($resultorder as  $valueorder) 
                                     	        {
                                                 
                                                  $order_id= $valueorder->id; 
                                                  
                                                 
                                             	}
                                     	      $link=base64_encode($order_id);
                                     	 }
                                     	

                     
                                          $valueset=$balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=round($valueset,2); 
$total=str_replace('-','', $total);

                                        if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $seti, 
                            'id' => $value->id,
                            'name' => $account_head_idname, 
                            'order_id' => $link, 
                            'bank_name' => $bank_name,
                            'username_base' => $username_base, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'customer_id' => $value->customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'credits' => round($value->credits,2),
                            'debits' => round($value->debits,2),
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'org_amount' => $value->org_amount,
                 	 		'balance' => $total,
                 	 		'getstatus'=>$getstatus,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                            'account_head_name'=>$account_head_idname
                 	 		
                 	 		

                 	 	);


                        $i++;
                        $j++;

                 	 }

                  $totalarray=array_merge($array2,$array);
               
                   $resultvent= $this->Main_model->where_names('vendor','id',$customer_id);
                     foreach ($resultvent as  $valuess) 
                     {
                         
                         
                              $name= $valuess->name; 
                              $email= $valuess->email;
                              $phone= $valuess->phone;
                              $gst= $valuess->gst;
                              $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                    }
                 
                   $filename=date('d-m-Y').'_Vendor_ledger'; 
                        header("Content-Type: application/xls");    
                        header("Content-Disposition: attachment; filename=$filename.xls");  
                        header("Pragma: no-cache"); 
                        header("Expires: 0");
                              if($name!='')
                         {
                             
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="10"><?php echo $name; ?></th></tr>
                              <tr><th colspan="10"><?php echo $phone; ?></th></tr>
                              
                          
                         </thead> 
                         
                    </table>
                    
                    <?php
                         }
                    ?>
                         
                           <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th> No</th>
                          <th>Particular</th>
                          <th>Date</th>
                          <th>Chq/Ref.No</th>
                          
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                          <th>Payment Mode</th>
                          <th>Notes</th>
                           <th>User</th>
                         
            
                        </tr>
                      </thead>
                      <tbody>
                          
                          <?php
                          foreach($totalarray as $vl)
                          {
                              
                              
                              if($vl['getstatus']==1)
                              {
                                 $color="red"; 
                              }
                              else
                              {
                                  $color="green"; 
                              }
                              
                              $balance=$vl['balance'];
                              ?>
                            
                          <tr>
                              
                         
                           <td> <?php echo $vl['no']; ?></td>
                          <td><?php echo $vl['name']; ?></td>
                          <td><?php echo $vl['payment_date']; ?></td>
                          <td><?php echo $vl['reference_no']; ?></td>
                          
                          <td><?php echo $vl['debits']; ?></td>
                          <td><?php echo $vl['credits']; ?></td>
                          <td style="color:<?php echo $color; ?>"><?php echo $balance; ?></td>
                          <td><?php echo $vl['payment_mode']; ?> <br> <?php echo $vl['bank_name']; ?></td>
                          <td><?php echo $vl['notes']; ?></td>
                          <td><?php echo $vl['username_base']; ?></td>
                         
                           </tr>
                            <?php
                          }
                          ?>
                            
                         
                     <tbody>
                         </table>
                         <?php
                 
                 
                 
                 
                 
                 
                 
                 
                 

	}
	
	
	
	
			public function fetch_data_get_ledger_view_export_group()
	{









  
           
                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate='2022-04-01';
                     $todate=$_GET['todate'];
                     
                     $sql="";
                       
                    if($customer_id>0)
                     {
                         
                        
                              $sql.=" AND a.customer_id='".$customer_id."'";
                        
                         
                        
                     }



                     if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";

                       
                     }
                    
                     
                    $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a LEFT JOIN vendor as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND a.party_type=3    $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                 	$result=$result->result();
                    
                 	 
                 	 
                 	 
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
                  
                        
                         $filename=date('d-m-Y').'_vendor_ledger_group'; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                          header("Expires: 0");
                          if($phone!='')
                         {
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="6"><?php echo $name; ?></th></tr>
                              <tr><th colspan="6"><?php echo $phone; ?></th></tr>
                              <tr><th colspan="6"><?php echo $gst; ?></th></tr>
                              <tr><th colspan="6"><?php echo $fulladdress; ?></th></tr>
                          
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
                          <th>Opening Balance</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                          
            
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
                                         	 
                                                $payment_status="";
                                                if($value->op_status==1)
                                                {
                                                    $payment_status='CR';
                                                }
                                                 if($value->op_status==2)
                                                {
                                                  $payment_status='DR';   
                                                }
                                    
                                             
                                          $balancetoatal+=round($value->creditstotal-$value->debitstoatal,2);
                                          $payouttoatl+=$value->debitstoatal;
                                          $payouttoatlcredits+=$value->creditstotal;
                                             
                         
                                 	     
                                 	    ?>
                                 	      <tr >
                          
                                            <td><?php echo $i; ?></td>
                                          <td><?php echo $name; ?></td>
                                          
                                           <td><?php echo round($value->op,2); ?> <?php echo $payment_status; ?></td>
                                         
                                          <td><?php echo round($value->debitstoatal,2); ?></td>
                                          <td><?php echo round($value->creditstotal,2); ?></td>
                                          <td><?php echo round($value->creditstotal-$value->debitstoatal,2); ?></td>
                                            
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        <tr >
                          
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                            <td><?php echo $payouttoatl; ?></td>
                                            <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo $balancetoatal; ?></td>
                                          
                                           
                                            
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
                      $output['gst_status']= $value->gst_status;
                      $output['pin']= $value->pin;
                      $output['account_heads_id']= $value->account_heads_id;
                      $output['fulladdress']= $value->address1.$value->landmark.$value->pincode.','.$value->city.','.$value->state;
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      
                      
                      $output['mark_customer_id']= $value->mark_customer_id;
                      
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
                     
                 
                      $date=$form_data->payment_date;
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
                                                                                   $data_bank['balance']=0;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=0;
                                                                         }
                                                        
                                                        
                                                        
                                                        $data_bank['debit']=$enteramount;
                                                        
                                                        
                                                        
                                                        $data_bank['credit']=0;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Purchase Payment';
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        if($bid==24)
                                                         {
                                                                     $data_bank['account_head_id']=104;
                                                                     $data_bank['account_heads_id_2']=106;
                                                         }
                                                         elseif($bid==25)
                                                         {
                                                                     $data_bank['account_head_id']=104;
                                                                     $data_bank['account_heads_id_2']=105;
                                                         }
                                                         else
                                                         {
                                                                    
                                                                     $data_bank['account_head_id']=104;
                                                                     $data_bank['account_heads_id_2']=107;
                                                                    
                                                         }
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        $data_bank['user_id']=$this->userid;
                                                        $data_bank['party_type'] = 4;


                                                         if($bid>0)
                                                         {


                                                        $insertbank=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');

                                                          }




                                                          
                                              }
                                              
                                      
                                     
                     
                     
                     
                     
                     
                          
                    
                              $data_driver['order_id']=0;
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


                               if($bid>0)
                              {

                              
                               $data_driver['deletemod']='PE'.$insertbank;
                               $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");
                               

                              }
                              
                              $data_driver['amount']=0;
                              
                             
                                if($balancetotal==0)
                               {   
                                                                   $data_driver['balance']=0;
                               }
                               else
                               {
                                                                   
                                                                   $data_driver['balance']=0;
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

                                      if($vendor_id>0)
                                      {

                                                    $this->Main_model->insert_commen($data_driver,$tablename);

                                      }
                                         	      
                     
                     


    }
	


}

