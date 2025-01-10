<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_received extends CI_Controller {

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
   

    public function index()
    {
                  
         
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Payment Received List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('payment_received/index.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    public function newcreate()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Payment Received add';
                                             
                                              $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                               $data['customers'] = $this->Main_model->where_names_order_by('customers','deleteid','0','id','ASC');
                                            
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('payment_received/add.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    public function edit($id)
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Payment Received Edit';
                                              $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['customers'] = $this->Main_model->where_names_order_by('customers','deleteid','0','id','ASC');
                                              $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('payment_received/edit.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    public function invoice($id)
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Payment Received Invoice';
                                              $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                              $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('payment_received/invoice.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                 
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                 
                

                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->accountshead_value_data!=''  || $form_data->get_users!='')
                     {

                                                $tablename=$form_data->tablename;
                                                $bankaccount=$form_data->bankaccount;
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');              
                                                foreach($additional_information as $vl)
                                                {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                }
                                                 
                                                  $data['get_users']= $form_data->get_users; 
                                                  $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                               
                                               
                                               
                                                       $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                $company_name= $val->name;
                                                       }
                                                       
                                                       
                                                         $res = $this->Main_model->where_names('customer_ledger','customer_id',$form_data->get_users);
                                                         $balancetotal=0;
                                                           $debitsamount=0;
                                                                     $creditsamount=0;
                                                         foreach($res as $val)
                                                         {
                                                             $payid=$val->id;
                                                             $customer_id=$val->customer_id;
                                                             $order_no=$val->order_no;
                                                             $amount=$val->amount;
                                                             
                                                              $debitsamount+=$val->debits;
                                                                          $creditsamount+=$val->credits;
                                                                          
                                                             $balancetotal+=$val->balance;
                                                         }
                                               
                                               
                                               
                                               
                                               
                                               
                                                 $balancetotal=$debitsamount-$creditsamount;
                                               
                                               
                                               
                                               
                                               $accountshead_value_data=$form_data->accountshead_value_data;
                                               if($accountshead_value_data!="")
                                               {
                                                 
                                                 $accountshead_value_data=explode('|', $accountshead_value_data);
                                                 $description=explode('|', $form_data->description_value_data);
                                                 $debits=explode('|', $form_data->debits_value_data);
                                                 $credits=explode('|', $form_data->credits_value_data);

                                                 for ($i=0; $i <count($accountshead_value_data) ; $i++) { 
                                                     
                                                     $sizedata['primary_id']=$insert_id;
                                                     
                                                     
                                                     
                                                    
                                                                     $reshh = $this->Main_model->where_names('accountheads','id',$accountshead_value_data[$i]);
                                                                    
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                                     $sizedata['accountshead']=$names;
                                                                     $sizedata['account_head_id']=$accountshead_value_data[$i];


                                                     
                                                     
                                                     
                                                     $sizedata['description']=$description[$i];
                                                     
                                                     
                                                  
                                                     
                                                     if($debits[$i]=="")
                                                     {
                                                         $sizedata['debits']=0;
                                                     }
                                                     else
                                                     {
                                                         $sizedata['debits']=$debits[$i];
                                                     }
                                                     
                                                     if($credits[$i]=="")
                                                     {
                                                         $sizedata['credits']=0;
                                                     }
                                                     else
                                                     {
                                                         $sizedata['credits']=$credits[$i];
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
                                                                $data_bank['ex_code']=$form_data->reference_no;
                                                                $data_bank['debit']=$sizedata['debits'];
                                                                $data_bank['credit']=$sizedata['credits'];
                                                                $data_bank['name']=$company_name;
                                                                $data_bank['create_date']=date('Y-m-d');
                                                                $data_bank['status_by']=$sizedata['accountshead'];
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                      
                                                      
                                                      
                                                      
                                                      
                                                       $data_driver['order_id']=0;
                                                       $data_driver['user_id']=$this->userid;
                                                       $data_driver['customer_id']=$form_data->get_users;
                                                       $data_driver['payment_mode']=$form_data->payment_mode;
                                                       $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                     
                                                        if($form_data->payment_mode=='Cash')
                                                       {
                                                        $data_driver['reference_no']='';
                                                        $data_driver['order_no']=$form_data->payment_type;  
                                                       }
                                                       else
                                                       {
                                                          $data_driver['reference_no']=$form_data->reference_no;
                                                          $data_driver['order_no']=$form_data->reference_no;
                                                       }
                                                      
                                                      $data_driver['amount']=0;
                                                      
                                                      $data_driver['notes']=$sizedata['accountshead'];
                                                      
                                                      
                                                    
                                                     if($sizedata['credits']!='0' || $sizedata['credits']!='')
                                                     {
                                                         
                                                              if($balancetotal==0)
                                                              {   
                                                                   $data_driver['balance']=$sizedata['credits'];
                                                              }
                                                              else
                                                              {
                                                                   $this->db->query("UPDATE customer_ledger SET balance='0' WHERE customer_id='".$form_data->get_users."'");
                                                                   $data_driver['balance']=$balancetotal-$sizedata['credits'];
                                                              }
                                                      
                                                     }
                                                      
                                                      
                                                     if($sizedata['debits']!='0' || $sizedata['debits']!='')
                                                     { 
                                                                 if($balancetotal==0)
                                                                 {
                                                                                               $data_driver['balance']=0;
                                                                 }
                                                                 else
                                                                 {
                                                                                                                      
                                                                                               $this->db->query("UPDATE customer_ledger SET balance='0' WHERE customer_id='".$form_data->get_users."'");
                                                                                               $data_driver['balance']=$balancetotal+$sizedata['debits'];
                                                                 } 
                                                     }
                                                                                         
                                                      
                                                      
                                                      
                                                      
                                                   
                                                      $data_driver['balance']=str_replace('-','', $data_driver['balance']);
                                                      $data_driver['payout']=$sizedata['credits'];
                                                      $data_driver['debits']=$sizedata['debits'];
                                                      $data_driver['credits']=$sizedata['credits'];
                                                      $data_driver['paid_status']='Paid';
                                                      $data_driver['payment_date']=$date;
                                                      $data_driver['payment_time']=$time;
                                                      
                                                      
                                                      
                                                      
                                                      $this->Main_model->insert_commen($data_driver,'customer_ledger');
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                      
                                                  
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'payment_received_sub');
                                            
                                                  }
                            
                                              }
                                              
                                              
                                            $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Payment Received successfully Added..');
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
                     
                     
                  

                   	 if($form_data->accountshead_value_data!=''  || $form_data->get_users!='')
                     {                          
                         
                                                $this->Main_model->delete_where_by('payment_received_sub','primary_id',$form_data->id);
                                                
                                                $tablename=$form_data->tablename;
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');              
                                                foreach($additional_information as $vl)
                                                {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                }
                                                $data['get_id']=$form_data->id;
                                               
                                                $data['get_users']= $form_data->get_users; 
                                     
                                                
                                                
                                               $accountshead_value_data=$form_data->accountshead_value_data;
                                               if($accountshead_value_data!="")
                                               {
                                                 
                                                 $accountshead_value_data=explode('|', $accountshead_value_data);
                                                 $description=explode('|', $form_data->description_value_data);
                                                 $debits=explode('|', $form_data->debits_value_data);
                                                 $credits=explode('|', $form_data->credits_value_data);

                                                 for ($i=0; $i <count($accountshead_value_data) ; $i++) { 
                                                     
                                                     $sizedata['primary_id']=$form_data->id;
                                                    
                                                                     $reshh = $this->Main_model->where_names('accountheads','id',$accountshead_value_data[$i]);
                                                                   
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                                     $sizedata['accountshead']=$names;
                                                                     $sizedata['account_head_id']=$accountshead_value_data[$i];


                                                     $sizedata['description']=$description[$i];
                                                     
                                                      if($debits[$i]=="")
                                                     {
                                                         $sizedata['debits']=0;
                                                     }
                                                     else
                                                     {
                                                         $sizedata['debits']=$debits[$i];
                                                     }
                                                     
                                                     if($credits[$i]=="")
                                                     {
                                                         $sizedata['credits']=0;
                                                     }
                                                     else
                                                     {
                                                         $sizedata['credits']=$credits[$i];
                                                     }
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'payment_received_sub');
                                            
                                                  }
                            
                                              }
                                                
                                                $this->Main_model->update_commen($data,$tablename);
                                                
                                                
                          $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Payment Received successfully Updated..');
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
                     $this->db->query("UPDATE payment_received_sub SET deleteid='1' WHERE primary_id='".$id."'");
                 }
                
                


	}
	public function userget()
	{
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                 
                     $party_type=$form_data->party_type;
                     
                   
                     
                                   $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' ORDER BY company_name ASC");
                                  
                                  
                                   $res= $query->num_rows();
                                   $result=$query->result();
                     
                     
                                 	 $array=array();
                                 	 $i=1;
                                 	            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	         
                                 	 	$array[] = array(
                                 	 	    
                                 	 	    
                                 	 	         'no' => $i, 
                                                'id' => $value->id, 
                                                'name' => $value->name 
                                               
                                                
                                                
                                 	     );
                                 	 	
                                 	 $i++;
                                 	 }

                    echo json_encode($array);

	}
	
	public function fetch_data()
	{

                     $result= $this->Main_model->where_names_order_by('payment_received','deleteid','0','id','DESC');
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     
                 	      
                 	      
                 	    
                 	      
                 	              $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->name;
                 	                 }
                 	     
                 	         
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	        'no' => $i, 
                                'id' => $value->id, 
                                
                                'name' => $partyname,
                                'payment_type' => $value->payment_type, 
                                'amount' => $value->amount,
                                'notes' => $value->notes, 
                                'payment_date' =>date('d-m-Y',strtotime($value->payment_date)), 
                               
                                
                                
                 	     );
                 	 	
                 	 $i++;
                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_data_sub()
	{
                     
                     
                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('payment_received_sub','primary_id',$id,'id','ASC');
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     
                 	         
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	        
                                'accountshead' => $value->accountshead, 
                                'description' => $value->description, 
                                'debits' => $value->debits, 
                                'credits' => $value->credits,
                               
                                
                                
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
                 	 
                 	 	      $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','6','deleteid','0','id','ASC');              
                    
                 	          foreach($additional_information as $vl)
                              {
                                                        $label_name=strtolower($vl->label_name);
                                                        $output[$label_name]= $value->$label_name; 
                              }
                              
                              
                                    $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->name;
                 	                 }
                 	     
                              
                              
	                 	      
	                 	      $output['get_users']= $value->get_users; 
	                 	      $output['partyname']= $partyname; 
                 	 }

                    echo json_encode($output);


    }
	



}	

