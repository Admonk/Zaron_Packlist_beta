<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
               $from_date=$sess_array['from_date'];
			   $to_date=$sess_array['to_date'];
			   $this->from_date=$from_date;
			   $this->to_date=$to_date;
               $this->userid=$userid;
               $this->user_mail=$email;

               
            }
          
    }
    public function product_stock_report()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products Stock Report';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('report/product_stock_report',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
     public function updaterecord()
    {
        
        
        
        
        
        
                        $form_data = json_decode(file_get_contents("php://input"));
                         
                         
                         
                            $customer_id_old=$form_data->customer_id;
                            $customerdata=$form_data->customerdata;
                            $customer=explode("-",$customerdata);
                            $customer_id=$customer[0];
                            $customer_name=$customer[1];
                            
                            $bankaccount=$form_data->bankaccount;
                            $payment_mode_payoff=$form_data->payment_mode_payoff;
                            $party_type=$form_data->party_type_data;
                            
                            $bank_id_old=0;
                            $result= $this->Main_model->where_names('all_ledgers','id',$form_data->id);
                         	foreach ($result as  $value)
                         	{
                         	     
                         	     if($value->bank_id!='')
                         	     {
                         	         $bank_id_old=$value->bank_id;
                         	     }
                         	     
                         	     $deletemod=$value->deletemod;
                         	     
                         	 }
                         	 
                         	$data['user_id']=$this->userid;
                            $data['bank_id']=$bankaccount;  
                            $data['payment_mode']=$payment_mode_payoff; 
                            $data['party_type']=$party_type; 
                           
                            
                            $data['debits']=$form_data->debit;
                            $data['credits']=$form_data->credit;
                            if($form_data->notes!='')
                            {
                                 $data['notes']=$form_data->notes;
                            }
                                                                 
                            $data['payment_date']=$form_data->create_date;
                            
                            $data['data_edited']=1;
                            
                            if($customer_id_old==$customer_id)
                            {
                                $data['get_id']=$form_data->id;
                                $data['balance']=0; 
                                $this->Main_model->update_commen($data,'all_ledgers');
                         	    $deletemodinsertr='ED'.$deletemod; 
                         	    $this->db->query("UPDATE all_ledgers SET deletemod='".$deletemodinsertr."' WHERE id='".$form_data->id."'");
                            }
                            else
                            {
                                 $this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE id='".$form_data->id."'");
                                 
                                 
                                 
                                 
                                                                     $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',$party_type,'deleteid','0','id','ASC');
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
                                                                      $balancetotal=$creditsamount-$debitsamount;
                                 
                                 
                                                                  if($form_data->credit>0)
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data['balance']=$form_data->credit;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data['balance']=$bankbalancetotal+$form_data->credit;
                                                                          }
                                                                  
                                                                 }
                                                                 
                                                                 if($form_data->debit!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data['balance']='-'.$form_data->debit;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data['balance']=$bankbalancetotal-$form_data->debit;
                                                                          }
                                                                  
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                   if($party_type=='1')
                                                                   {
                                                                       $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY company_name ASC");
                                                                      
                                                                       
                                                                  
                                                                   }
                                                                   elseif($party_type=='2')
                                                                   {
                                                                        $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0'  AND id='".$customer_id."' ORDER BY name ASC");
                                                                        
                                                                   }
                                                                   elseif($party_type=='3')
                                                                   {
                                                                       $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY name ASC");
                                                                       
                                                                       
                                                                   }
                                                                   elseif($party_type=='5')
                                                                   {
                                                                       
                                                                        $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY name ASC");
                                                                        
                                                                       
                                                                   }
                                                                   elseif($party_type=='6')
                                                                   {
                                                                       
                                                                       
                                                                        $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY name ASC");
                                                                       
                                                                       
                                                                       
                                                                   }
                                                                   elseif($party_type=='7')
                                                                   {
                                                                       
                                                                       
                                                                        $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY name ASC");
                                                                        
                                                                       
                                                                   }
                                                                   elseif($party_type=='8')
                                                                   {
                                                                       
                                                                       
                                                                        $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY name ASC");
                                                                        
                                                                       
                                                                   }
                                                                   else
                                                                   {
                                                                       $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$customer_id."' ORDER BY name ASC");
                                                                     
                                                                       
                                                                   }
                                                                                
                                                                     
                                                                 
                                                                 
                                                                                    $res=$query->result();
                                                                                    foreach($res as $val)
                                                                                    {
                                                                                            $company_name= $val->name;
                                                                                            $account_heads_id= $val->account_heads_id;
                                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                                    }
                                                                                    
                                                                                    
                                                                                   
                                                                                 
                                                                                 
                                                                 
                                                                 
                                                                                      if($party_type==1)
                                                                                      {
                                                                                          $data['account_heads_id_2']= 123; 
                                                                                          $data['account_head_id']=68;
                                                                                      
                                                                                      }
                                                                                      elseif($party_type==5)
                                                                                      {  
                                                                                          $data['account_heads_id_2']= $customer_id; 
                                                                                          $data['account_head_id']=$customer_id;  
                                                                                          
                                                                                      }
                                                                                      elseif($party_type==7)
                                                                                      {
                                                                                          $data['account_head_id']=$account_heads_id;
                                                                                          $data['account_heads_id_2']= $form_data->expense_head; 
                                                                                         
                                                                                      
                                                                                      }
                                                                                      elseif($party_type==8)
                                                                                      {
                                                                                            $data['account_head_id']= 8;
                                                                                            $data['account_heads_id_2']= 8;
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data['account_heads_id_2']= $account_heads_id_2; 
                                                                                          $data['account_head_id']=$account_heads_id;
                                                                                        
                                                                                      }
                                                                 
                                                                 
                                                                 
                                                                 
                                                                
                                                                 
                                                                 $data['process_by']='Ledger change Party';
                                                                 $data['customer_id']=$customer_id;
                                                                 $insertid=$this->Main_model->insert_commen($data,'all_ledgers');
                                                         	     $deletemodinsertr='ED'.$insertid; 
                                                         	     $this->db->query("UPDATE all_ledgers SET deletemod='".$deletemodinsertr."' WHERE id='".$insertid."'");
                            }
                            
                             
                            
                                 
                                 
                                 
                                 
                                 
                                 
                                                                    
                                                                        
                                                                   
                                                                    //$this->db->query("UPDATE bankaccount_manage SET deleteid='1' WHERE deletemod='".$deletemod."'");
                                                                    
                                                                    
                                                                    $res = $this->Main_model->where_names_limit_base('bankaccount_manage','bank_account_id',$bankaccount,1);
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
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                 
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                     
                                                                        
                                                                    $data_bank['bank_account_id']=$bankaccount;
                                                                    if($form_data->credit>0)
                                                                    {
                                                                         
                                                                             if($bankbalancetotal==0)
                                                                             {   
                                                                                       $data_bank['balance']=$form_data->credit;
                                                                             }
                                                                             else
                                                                             {
                                                                                       
                                                                                       $data_bank['balance']=$bankbalancetotal+$form_data->credit;
                                                                              }
                                                                      
                                                                     }
                                                                     
                                                                     if($form_data->debit>0)
                                                                     {
                                                                         
                                                                             if($bankbalancetotal==0)
                                                                             {   
                                                                                       $data_bank['balance']='-'.$form_data->debit;
                                                                             }
                                                                             else
                                                                             {
                                                                                       
                                                                                       $data_bank['balance']=$bankbalancetotal-$form_data->debit;
                                                                              }
                                                                      
                                                                     }
                                                                        
                                                                        
                                                                    
                                                                $data_bank['debit']=$form_data->debit;
                                                                $data_bank['credit']=$form_data->credit; 
                                                                $data_bank['status_by']=$form_data->notes;
                                                                $data_bank['deletemod']=$deletemodinsertr;
                                                                $data_bank['user_id']=$this->userid;
                                                                $data_bank['name']=$customer_name;
                                                                
                                                                
                                                                $data_bank['create_date']=date('Y-m-d',strtotime($form_data->create_date));
                                                               
                                                                
                                                                if($bankaccount==24)
                                                                {
                                                                     $data_bank['account_head_id']=106;
                                                                     $data_bank['account_heads_id_2']=106;
                                                                }
                                                                elseif($bankaccount==25)
                                                                {
                                                                     $data_bank['account_head_id']=105;
                                                                     $data_bank['account_heads_id_2']=105;
                                                                }
                                                                else
                                                                {
                                                                    
                                                                     $data_bank['account_head_id']=107;
                                                                     $data_bank['account_heads_id_2']=107;
                                                                    
                                                                }
                                                                $data_bank['party_type']=4;
                                                                
                                                                
                                                                if($bank_id_old!=0)
                                                                {
                                                                    
                                                                    // $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                    
                                                                }
                                                                
                                                                
                                                                
                                                                
                                                                
                            
                         
                         
                         
                                                           
                                             
                  
                  
                  
                  
                  
                  
                  
                  
        
    }
        
    public function fetch_single_data_by()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {
                 	 
                 	 	$output['id'] = $value->id;
                 	 	$customer_id = $value->customer_id;
                 	 	$output['debit'] = $value->debits;
                 	 	$output['credit'] = $value->credits;
                 	 	$output['party_type'] = $value->party_type;
                 	 	$output['create_date'] = $value->payment_date;
                 	 	$output['payment_mode'] = $value->payment_mode;
                 	 	$output['bank_id'] = $value->bank_id;
                 	 	$output['notes'] = $value->notes;
                 	 	
                 	 	    if($value->party_type==1)
                            {
                               $output['lable'] = 'Customers';
                               $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");
                                        
                            }
                            if($value->party_type==2)
                            {
                                
                                 $output['lable'] = 'Drivers';
                                $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                        
                            }
                             if($value->party_type==3)
                            {
                                
                                $output['lable'] = 'Venodrs';
                                $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                            }
                            
                            if($value->party_type==5)
                            {
                                        $output['lable'] = 'Others Ledgers';
                                        $query = $this->db->query("SELECT id,name FROM accountheads  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==6)
                            {
                                       
                                       
                                        $output['lable'] = 'Expense Heads';
                                        $query = $this->db->query("SELECT id,name FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==7)
                            {
                                
                                       $output['lable'] = 'Others Ledgers';
                                       $query = $this->db->query("SELECT id,name FROM accountheads  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                   
                            }
                            
                            if($value->party_type==8)
                            {
                                
                                       $output['lable'] = 'Internal Users';
                                       $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                             $party_name="";
                             $res=$query->result();
                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }
                                                                      
                 	 	
                 	 	$output['party_name'] = $customer_id.'-'.$party_name;
                 	 	$output['customer_id'] = $customer_id;
                 	    
                 	 
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
	
    
    public function table_customize()
    {
        
        
         $status=$_GET['status_id'];
         $val=$_GET['status_val'];
         $this->db->query("DELETE FROM table_customize  WHERE user_id='".$this->userid."' AND label_id='".$val."'");
         
         $basedata['user_id'] = $this->userid;
         $basedata['label_id'] = $val;
         $basedata['status'] = $status;
         
         
         $this->Main_model->insert_commen($basedata, 'table_customize');
         
         
    }
  
     public function salesreport()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salesreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
     public function order_balance_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Order Balance Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/order_balance_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
     public function customer_balance_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['customers'] = $this->Main_model->where_names('admin_users','access','12');
                                             
                                             
                                             $data['table_customize'] = $this->Main_model->where_names('table_customize','user_id',$this->userid);
                                             
                                             
                                             
                                             
                                             
                                             $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                           
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Order Balance Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/customer_balance_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
    
    
    
    
      public function profit_and_loss()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Profit And Loss Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/profit_and_loss.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
      public function trial_balance()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Balance Sheet Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function trial_balance_full()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance_full.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function salse_group_order_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['sales_head'] = $this->Main_model->where_names_two_order_by('admin_users','access',11,'deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salse_group_order_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
         public function enquiry_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['table_customize'] = $this->Main_model->where_names('table_customize','user_id',$this->userid);
                                             
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['sales_head'] = $this->Main_model->where_names_two_order_by('admin_users','access',11,'deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Enquiry Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/enquiry_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
      public function salse_team_order_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['sales_head'] = $this->Main_model->where_names_two_order_by('admin_users','access',11,'deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Team Order Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salse_team_order_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
       public function api_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['sales_head'] = $this->Main_model->where_names_two_order_by('admin_users','access',11,'deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'API Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/api_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function sales_product_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Product Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salesproductreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
     
      public function vendor_purchase_product_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Purchase Product Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/vendor_purchase_product_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function customer_order_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Customer Order Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/customer_order_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function customer_yes_or_no_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Customer Order Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/customer_yes_or_no_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function vendor_purchase_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Purchase Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/vendor_purchase_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
       public function balancereport()
    {
                  

                                         ini_set('memory_limit', '4400M');
 
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                              $data['partytype'] = $this->Main_model->where_names('partytype','deleteid','0');
                                              $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                              $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                              $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                              $data['active_base']='customer_1';
                                              $data['active']='customer_1';
                                              $data['title']    = 'Balance Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/balancereport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function balancereport_base_ledger()
    {
                  

                                         ini_set('memory_limit', '4400M');
 
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['partytype'] = $this->Main_model->where_names('partytype','deleteid','0');
                                             $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             
                                             
                                             $data['data_title']="";
                                             if(isset($_GET['accountshead']))
                                             {
                                                  $accountshead = $this->Main_model->where_names('accountheads_sub_group','id',$_GET['accountshead']);
                                                  foreach($accountshead as $val)
                                                  {
                                                     $data['data_title']= $val->name;
                                                  }
                                             }
                                             
                                             
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Recent Ledger Transaction';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/balancereport_base_ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function accountsreport()
    {
                  

                      ini_set('memory_limit', '4400M');
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                                             $data['active']='customer_1';
                                             $data['title']    = 'Accounts Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/accountsreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
        public function fetch_data_get_ledger_view()
    {

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }   
                     
                     $search='';
                     if($cateid!='ALL') 
                     {
                         $stat.=' AND b.categories_id="'.$cateid.'"';
                     }
                     
                     if($productid!='ALL') 
                     {
                         $stat.=' AND b.product_id="'.$productid.'"';
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     $userslog="";
                  
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                     if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                           $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                           $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                     
                     
                     
                     
                     
                     
                     
                    
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  b.deleteid=0 AND a.order_base='1' $userslog GROUP BY b.product_id ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND b.deleteid=0 AND a.order_base='1' $stat $userslog  GROUP BY b.product_id ORDER BY a.id DESC");
                    
                     }
                     
                     
                    
                     $result=$result->result();
                   
                     $i=1;
                      $array=array();
                      
                     foreach ($result as  $value) {
                       
                       
                                    
                         
                                                $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                    'id' => $value->id, 
                                                    'order_id' => $value->order_id, 
                                                    'order_no' => $value->order_no, 
                                                    'product_name' => $value->product_name,
                                                    'rate' => $value->rate,
                                                    'qty' =>  round($value->qty,2),
                                                    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                                                    'total' => round($value->total,2)
                                                    
                                                    
                        
                                                );
                                                
                                   


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function fetch_data_get_ledger_view_export()
    {









  
           
                    
                    $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }   
                     
                     
                    
                      $search='';
                     if($cateid!='ALL') 
                     {
                         $stat.=' AND b.categories_id="'.$cateid.'"';
                     }
                     
                     if($productid!='ALL') 
                     {
                         $stat.=' AND b.product_id="'.$productid.'"';
                     }
                    
                     
                     
                     
                     $userslog="";
                    if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                           $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                         $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  b.deleteid=0 AND a.order_base='1' $userslog GROUP BY b.product_id ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND b.deleteid=0 AND a.order_base='1' $stat $userslog  GROUP BY b.product_id ORDER BY a.id DESC");
                    
                     }
                    
                    
                    $result=$result->result();
                     
                     
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                    
                  
                         $filename='Sales_product_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="7">Sales Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                           <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>QTY</th>
                          <th>Amount</th>
                        
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                     foreach ($result as  $value) {
                                         
                                            
                                         
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->product_name; ?></td>
                                          <td><?php echo $value->rate; ?></td>
                                          <td><?php echo round($value->qty,2); ?></td>
                                          <td><?php echo round($value->total,2); ?></td>
                                          
                                        </tr>
                                        
                                      
                                       
                                        <?php
                                        
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
        public function fetch_data_sales_report()
    {

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $customer_id=$_GET['customer_id'];
                     
                     $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }
                     
                     
                     
                    if(isset($_GET['sales_group']))
                    {
                         if($_GET['sales_group']!='ALL') 
                         {
                              $stat.=' AND sg.sales_group_id="'.$_GET['sales_group'].'"';
                         } 
                         else
                         {
                             $stat.='';
                         }
                        
                       
                    }
                    
                    
                    if($customer_id!=0) 
                     {
                          $stat.=' AND a.customer_id="'.$customer_id.'"';
                     }   
                     
                    
                    $userslog="";
                   
                    
                    if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                                        
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  sg.sales_group_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                    
                  
                     
                     
                    
                         
                     $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY a.id ORDER BY a.id DESC");
                     
                     $result=$result->result();
                     
                 
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value)
                     {
                       
                       
                       
                                     $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                                     $resultsub=$resultsub->result();
                                     $total=0;
                                     foreach($resultsub as $val)
                                     { 
                                       
                                      
                                                 $total+=round($val->qty*$val->rate,2);
                         
                                    }
                                    
                                    
                                    
                                $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                     
                                    
                                
                                     
                                        $sales_group_data=explode('|', $value->sales_group);
                                        

                                     $sales_group_name=array();
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id IN ('".implode("','", $sales_group_data)."') ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group_name[]=$val->name;
                         
                                    }
                                    
                                     $sales_group=implode(",", $sales_group_name);
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                                $define_saleshd_id=$val->define_saleshd_id;
                         
                                    }
                                    
                                   
                                    
                                     $define_saleshd_id=explode('|', $define_saleshd_id);
                                    
                                     $sales_head_name=array();
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id IN ('".implode("','", $define_saleshd_id)."') ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                             $sales_head_name[]=$val->name;
                         
                                    }
                                    
                                     $sales_head=implode(",", $sales_head_name);
                                    
                                    
                       
                       
                         $status="Order Completed";
                         if($value->finance_status=='3')
                         {
                             $status='Finance Approved';
                         }
                         
                         if($value->finance_status=='4')
                         {
                             $status='Delivered';
                         }
                         
                         if($value->finance_status=='5')
                         {
                             $status='Reconciliation Completed';
                         }
                         
                         
                     
                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no,
                            'sales_group' => $sales_group,
                            'sales_head' => $sales_head,
                            'sales_team' => $sales_team,
                            'customername' => $value->company_name,
                            'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                            'total' => round($total,2),
                            'status' => $status
                            

                        );


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
     public function fetch_data_sales_team_report()
    {

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $customer_id=$_GET['customer_id'];
                     
                     $stat="";
                    
                      $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }
                     
                     
                     
                    if(isset($_GET['sales_group']))
                    {
                         if($_GET['sales_group']!='ALL') 
                         {
                              $stat.=' AND b.sales_team_id="'.$_GET['sales_group'].'"';
                         } 
                         else
                         {
                             $stat.='';
                         }
                        
                       
                    }
                    
                    
                    if($customer_id!=0) 
                     {
                          $stat.=' AND a.customer_id="'.$customer_id.'"';
                     }   
                     
                    
                    $userslog="";
                   
                    
                    if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                                        
                            $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                     
                    
                         
                     $result=$this->db->query("SELECT a.*,SUM(c.qty*c.rate) as total,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  JOIN order_product_list_process as c ON a.id=c.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY b.sales_team_id ORDER BY a.id DESC");
                     
                     $result=$result->result();
                     
                 
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value)
                     {
                       
                       
                       
                                   
                                    
                                    
                                $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$value->total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$value->total-$discount-$minisroundoff;
                                 }
                     
                                    
                                
                                     
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT target,name,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                               $define_saleshd_id=$val->define_saleshd_id;
                                               $target=$val->target;
                         
                                    }
                                    
                                    
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$define_saleshd_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                    
                                    
                                    
                                    
                       
                       
                         $status="Order Completed";
                         if($value->finance_status=='3')
                         {
                             $status='Finance Approved';
                         }
                         
                         if($value->finance_status=='4')
                         {
                             $status='Delivered';
                         }
                         
                         if($value->finance_status=='5')
                         {
                             $status='Reconciliation Completed';
                         }
                         
                         
                     
                           
                        $achieved= $target-$total;
                        
                        
                        if($achieved>0)
                        {
                            $getstatus=0;
                        }
                        else
                        {
                            $getstatus=1;
                        }
                        
                        
                        $achieved=str_replace("-","",$achieved);
                     
                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no,
                            'sales_group' => $sales_group,
                            'sales_head' => $sales_head,
                            'sales_team' => $sales_team,
                            'target'=>$target,
                            'customername' => $value->company_name,
                            'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                            'total' => round($total,2),
                            'achieved' => round($achieved,2),
                            'getstatus' => $getstatus,
                            'status' => $status
                            

                        );


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      public function api_report_fetch()
    {

                    
                    
                    
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api-lb-ext.unolo.com/unprotected/login',
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                      CURLOPT_HTTPHEADER => array(
                        'id: 9428',
                        'password: gNRua3sc9ewy1Lx7'
                      ),
                    ));
                    
                    $response = curl_exec($curl);
                   
                    $response= json_decode($response);
                    $token=$response->token;
                                         
                      curl_setopt_array($curl, array(
                      CURLOPT_URL => 'https://api-lb-ext.unolo.com/api/protected/dslDetail?start='.$formdate.'&end='.$todate,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => '',
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 0,
                      CURLOPT_FOLLOWLOCATION => true,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => 'GET',
                      CURLOPT_HTTPHEADER => array(
                        'id: 9428',
                        'token: '.$token
                      ),
                    ));
                    
                    $responsedata = curl_exec($curl);
                    curl_close($curl);
                    $responsedata= json_decode($responsedata);
                    
                 
           
                     $i=1;
                     $array=array();
                      
                     foreach ($responsedata as  $value) {
                       
                       
                       $status="";
                                    
                                    if($value->type==0)
                                    {
                                        $status='Visited';
                                    }
                                     if($value->type==1)
                                    {
                                        $status='Subsequent Visited';
                                    }
                                    
                                    
                     
                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->employeeID,
                            'name'=>$value->firstName.' '.$value->lastName,
                            'address' => $value->addressDescription,
                            'startTime' => $value->startTime,
                            'endTime' => $value->endTime,
                            'status' => $status,
                            'internalEmpID' => $value->internalEmpID
                            
                            

                        );


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
        public function trial_balance_report_full()
    {

                    
                       $formdate=$_GET['formdate'];
                       $todate=$_GET['fromto'];
                 
                    
                        $resultaset=$this->trial_balance_report1_sub($formdate,$todate);
                
                        $resulta=json_decode($resultaset);
                   
                      
                
                        $a=0;
                        foreach($resulta as $vl)
                        {
                            $a+=$vl->credit;
                        }
                        
                      
                        
                        $resultb=$this->trial_balance_report_sub($formdate,$todate);
                        
                        $resultb=json_decode($resultb);
                            
                            
                        $b=0;
                        foreach($resultb as $vl)
                        {
                            $b+=$vl->credit;
                        }
                           
                         
                      
                        $total=$a-$b;
                       
                        $total=str_replace('-', '', $total);
                    

                      
                    
                     
                
                  $resulth=$this->db->query("SELECT b.id as account_type_id,b.name as account_type_name  FROM accountheads_sub_group as a JOIN accounttype as b ON a.account_type=b.id WHERE b.deleteid=0 AND a.trail_balance_view='1'  GROUP BY b.id ORDER BY b.sort_order ASC");
                  $resulth=$resulth->result();
                   
                  $arrayhead=array(); 
                   
                  foreach ($resulth as  $valuevv)
                  {
                     
                     
                     
                     $result=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND trail_balance_view='1' AND account_type='".$valuevv->account_type_id."'   ORDER BY trail_balance_sort ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $credits1total=0;
                      $debit1total=0;
                     foreach ($result as  $value) {
                         
                         
                                        
                                         $credits1=0;
                                         $debit1=0;
                                         $balance1=0;
                                         $set=0;
                                         
                                         
                                         
                                         if($value->id==104){
                                              $result=$this->db->query("SELECT SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                         
                                         }
                                         elseif($value->id==68){
                                              $result=$this->db->query("SELECT SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                         
                                         }
                                         else
                                         {
                                              $result=$this->db->query("SELECT SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                         
                                         }
                                         
                                        
                                         
                                         
                                         $result=$result->result();
                                         foreach($result as $partys1ss)
                                         { 
                                             
                                                  if($value->trail_view_status==0)
                                                  {  
                                                     
                                                     if($partys1ss->totaldebit!='')
                                                     {  
                                                          
                                                          if($value->id==116)
                                                          {
                                                              $credits1=$partys1ss->totaldebit;
                                                          }
                                                          else
                                                          {
                                                               $credits1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                     }
                                                     else
                                                     {
                                                          $credits1=0;
                                                     }
                                                    
                                                     $credits1=str_replace('-', '', $credits1);
                                                     $set=1;
                                                     $creditssell=$credits1;
                                                   
                                                  }
                                                  if($value->trail_view_status==1)
                                                  {
                                                      if($partys1ss->totalcridit!='')
                                                      {
                                                          
                                                          if($value->id==119)
                                                          {
                                                              $debit1=$partys1ss->totalcridit;
                                                          }
                                                          else
                                                          {
                                                              $debit1=$partys1ss->totalcridit-$partys1ss->totaldebit;
                                                          }
                                                          
                                                      }
                                                      else
                                                      {
                                                          $debit1=0;
                                                      } 
                                                      
                                                      $debit1=str_replace('-', '', $debit1);
                                                      $creditssell=$debit1;
                                                   
                                                  }
                                                  
                                                  
                                                
                                                  
                                         }
                                          
                                       
                                     
                                  
                       $credits1total+=$credits1;
                       $debit1total+=$debit1;
                     
                                        $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->name, 
                                            'account_type' => $value->account_type,
                                            'trail_view_status' => $value->trail_view_status,
                                            'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id,
                                            'credit' => round($credits1,2),
                                            'debit' => round($debit1,2),
                                            'set' => round($credits1+$debit1)
                
                                        );
                            
                            

                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     $resultbank=$this->db->query("SELECT a.* FROM bankaccount as a JOIN  bankaccount_manage  as b ON a.id=b.bank_account_id WHERE a.deleteid=0 AND b.deleteid=0  AND  account_type='".$valuevv->account_type_id."' AND b.create_date BETWEEN '".$formdate."' AND '".$todate."' GROUP BY a.id ORDER BY a.id ASC");
                     $resultbank=$resultbank->result();
                     
                     
                     $credits1totalbank=0;
                     $debit1totalbank=0;
                     foreach ($resultbank as  $valueb) {
                         
                         
                            
                            
                                         $setbank=0;
                                         $resultb=$this->db->query("SELECT SUM(credit) as totalcridit,SUM(debit) as totaldebit FROM bankaccount_manage WHERE deleteid=0 AND bank_account_id='".$valueb->id."' AND create_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                         $resultb=$resultb->result();
                                         foreach($resultb as $partys1sss)
                                         {
                                             
                                             
                                                     $creditsbank1=0;
                                                     $creditsbank1=0;
                                                    
                                                 
                                                     $debitbank1=$partys1sss->totalcridit-$partys1sss->totaldebit;
                                                     $debitbank1=str_replace('-', '', $debitbank1);
                                                     $setbank=1;
                                                
                                         }
                             
                                       
                                       
                                      
                                      
                                     $credits1totalbank+=$creditsbank1;
                       $debit1totalbank+=$debitbank1;  
                                     
                                        $array1[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $valueb->id, 
                                            'account_type' => 25,
                                            'name' => $valueb->bank_name, 
                                            'trail_view_status' => 1,
                                            'url'=>base_url().'index.php/bankaccount/statement?bank_id='.$valueb->id.'&name='.$valueb->bank_name,
                                            'credit' => round($creditsbank1,2),
                                            'debit' => round($debitbank1,2),
                                            'set' => round($creditsbank1+$debitbank1)
                
                                        );


                                   
                                    
                        
                        
                       


                        $i++;

                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     $arrayval=array_merge($array,$array1);
                     
                     
                     $totalset=$credits1total+$debit1total;
                      $totalsetbank=$credits1totalbank+$debit1totalbank;
                     
                     if($valuevv->account_type_id==25)
                     {
                         
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>round($debit1totalbank,2),
                         'credit'=>round($credits1totalbank,2),
                         'set'=>round($totalsetbank,2),
                         'sub'=>$arrayval
                         
                         
                         );
                         
                     }
                     else
                     {
                         $arrayhead[]=array(
                           
                         'id'=>$valuevv->account_type_id,
                         'account_type_name'=>$valuevv->account_type_name,
                         'debit'=>round($debit1total,2),
                         'credit'=>round($credits1total,2),
                         'set'=>round($totalset,2),
                         'sub'=>$arrayval
                         
                         
                         );
                     }
                     
                       
                     
                     
                     
                     
                  }
                    
                    
                    
               
                    
                  echo json_encode($arrayhead);

    }
    
    
    
    
    
    
    
    
    
    
    
            public function trial_balance_report_balance1()
    {


                        $formdate=$_GET['formdate'];
                        $todate=$_GET['fromto'];
                     
                         $resultaset=$this->trial_balance_report1_sub($formdate,$todate);
                
                        $resulta=json_decode($resultaset);
                   
                      
                
                        $a=0;
                        foreach($resulta as $vl)
                        {
                            $a+=$vl->credit;
                        }
                        
                      
                        
                        $resultb=$this->trial_balance_report_sub($formdate,$todate);
                        
                        $resultb=json_decode($resultb);
                            
                            
                        $b=0;
                        foreach($resultb as $vl)
                        {
                            $b+=$vl->credit;
                        }
                           
                         
                      
                        $total=$a-$b;
                       
                        $total=str_replace('-', '', $total);
                    
                    

                    
                     $creditspayable=0;
                     $resultb=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a JOIN accountheads_sub_group as b On a.account_head_id=b.id WHERE a.deleteid=0 AND payment_date BETWEEN '".$formdate."' AND '".$todate."' AND b.account_type IN ('12','10','8','7','6')");
                     $resultb=$resultb->result();
                     foreach($resultb as $partys1pay)
                     {
                                                             
                         $creditspayable=$partys1pay->debits-$partys1pay->credits;
                                                           
                                                           
                     }
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND balance_sheet='1' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                        
                         
                            
                             $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                        
                             
                             
                          
                       
                             $array2=array();
                             $creditsfull=0;
                             $creditstest=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                        if($value->id==$valuess->account_type)
                                       {
                                           
                                             
                                             
                                                          $debitsrr=0;
                                                          $result1rr=$this->db->query("SELECT SUM(debits) as debits FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$valuess->id."' AND account_heads_id_2='120' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY id DESC");
                                                          $party1rr=$result1rr->result();
                                                          foreach($party1rr as $partys1rr)
                                                          {
                                                             
                                                          
                                                            $debitsrr=$partys1rr->debits;
                                                           
                                                          }
                                                       
                                                                     
                                                         
                                                         
                                                      
                                                          $credits=0;
                                                          $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$valuess->id."'  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                                          $party1=$result1->result();
                                                          foreach($party1 as $partys1)
                                                          {
                                                             
                                                            $credits=$partys1->credits-$partys1->debits;
                                                           
                                                           
                                                          }
                                                          
                                                          
                                              
                                                         
                                                          $viewststi="1";
                                                         
                                                         
                                                         if($valuess->id=='72')
                                                         {
                                                                $credits=$creditspayable; 
                                                         }
                                                         
                                                         if($valuess->id=='126')
                                                         {
                                                                if($a<$b)
                                                                {
                                                                    $profileset=$credits+$total; 
                                                                    
                                                                }
                                                                
                                                                if($a>$b)
                                                                {
                                                                    $profileset=$credits-$total; 
                                                                    
                                                                }
                                                                 $creditstest=$credits; 
                                                                
                                                         }
                                                         
                                                       
                                                         
                                                         if($valuess->id=='127')
                                                         {       
                                                                if($a<$b)
                                                                {
                                                                    $credits=$profileset; 
                                                                    $creditstest=$total;
                                                                    $creditstest=0;
                                                                }
                                                               
                                                                
                                                         }
                                                         
                                                         
                                                         if($valuess->id=='128')
                                                         {       
                                                               
                                                                if($a>$b)
                                                                {
                                                                    $credits=$profileset; 
                                                                    $creditstest=$total; 
                                                                }
                                                                
                                                         }
                                                         
                                                            if($valuess->id=='125')
                                                            {
                                                                
                                                                //$creditstest=str_replace('-', '', $credits); 
                                                                
                                                            }
                                                         
                                                          
                                                            if($valuess->id=='125')
                                                            { 
                                                                     //$credits=$profileset-$creditstest;
                                                            }
                                                            
                                                            if($credits!=0)
                                                            {
                                                                 if($valuess->id=='126'  || $valuess->id=='128')
                                                                 { 
                                                                     $credits=0;
                                                                 }
                                                                 
                                                                
                                                                
                                                                
                                                          
                                                              
                                                                 $array2[] = array(
                                                
                                                
                                                                    'no' => $i, 
                                                                    'id' => $valuess->id, 
                                                                    'name' => $valuess->name, 
                                                                    'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                    'viewstatus' => $viewststi,
                                                                    'creditstest' => round($creditstest,2),
                                                                    'credit' => round($credits,2),
                                                                    
                                                                 );
                                                                 
                                                           }
                                                             
                                                             
                                                          
                                             $creditsfull+=$credits;
                                               
                                           
                                       }
                                 
                             }
                     
                     
                     
                                              
                                                
                                                
                                                     if($creditsfull!=0)
                                                     {
                                                         
                                                     
                                                 
                                                                $array[] = array(
                                                                    
                                                                    
                                                                    'no' => $i, 
                                                                    'id' => $value->id, 
                                                                    'name' => $value->name, 
                                                                    'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                    'credit' => round($creditsfull,2),
                                                                    'resultsub'=>$array2
                                        
                                                              );
                                                  
                                                     }
                                                  
                                              
                                                  
                                               
                                                     
                         
                         
                         
                         


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
            public function trial_balance_report_balance2()
    {

                    
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['fromto'];
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND balance_sheet='2' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                      
                         
                         
                             $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                             
                          
                       
                             $array2=array();
                             foreach ($result_sub as  $valuess) 
                             {
                                       if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                                              $debits=0;
                                                              $credits=0;
                                                              $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_head_id='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                                              $party1=$result1->result();
                                                              foreach($party1 as $partys1)
                                                              {
                                                                 
                                                              
                                                                $credits=$partys1->debits-$partys1->credits;
                                                               
                                                              }
                                                              
                                                              
                                                              
                                                              
                                                              $credits2=0;
                                                              $result1=$this->db->query("SELECT SUM(debit) as debits,SUM(credit) as credits FROM bankaccount_manage WHERE deleteid=0 AND account_head_id='".$valuess->id."' AND create_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                                              $party1=$result1->result();
                                                              foreach($party1 as $partys1)
                                                              {
                                                                         
                                                                      
                                                                        $credits2=$partys1->credits-$partys1->debits;
                                                                       
                                                              }
                                                                  
                                                                  
                                                              
                                                            
                                                            
                                                             $credits=$credits+$credits2;
                                           
                                             
                                                             if($valuess->id=='105' || $valuess->id=='106' || $valuess->id=='107' )
                                                             {
                                                                 $viewststi="0";
                                                             }
                                                             else
                                                             {
                                                                  $viewststi="0";
                                                             }
                                             
                                             
                                                             
                                                                if($valuess->id==107)
                                                                {
                                                                   $url=base_url().'index.php/bankaccount';
                                                              
                                                                }
                                                                else
                                                                {
                                                                    $url=base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id;
                                                             
                                                                }
                                                            
                                                            
                                                            if($credits!=0)
                                                            {
                                                                
                                                            
                                                               
                                                            $array2[] = array(
                                            
                                            
                                                                'no' => $i, 
                                                                'id' => $valuess->id, 
                                                                'name' => $valuess->name, 
                                                                'url'=>$url,
                                                                'viewstatus' => $viewststi,
                                                                'credit' => round($credits,2),
                                                                
                                                             );
                                                             
                                                            }
                                             
                                               
                                           
                                       }
                                 
                             }
                     
                     
                     
                                                              $creditsfull=0;
                                                              $resultfull=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a JOIN accountheads_sub_group as b On a.account_head_id=b.id WHERE a.deleteid=0 AND b.account_type='".$value->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."'");
                                                              $partyfull=$resultfull->result();
                                                              foreach($partyfull as $ssdata)
                                                              {
                                                                                     
                                                                            
                                                                  $creditsfull=$ssdata->debits-$ssdata->credits;
                                                                                   
                                                              }
                                                              
                                                              
                                                              $creditsfull2=0;
                                                              $resultfull=$this->db->query("SELECT SUM(a.debit) as debits,SUM(a.credit) as credits FROM bankaccount_manage as a JOIN accountheads_sub_group as b On a.account_head_id=b.id WHERE a.deleteid=0 AND b.account_type='".$value->id."' AND create_date BETWEEN '".$formdate."' AND '".$todate."'");
                                                              $partyfull=$resultfull->result();
                                                              foreach($partyfull as $ssdata)
                                                              {
                                                                                     
                                                                            
                                                                  $creditsfull2=$ssdata->credits-$ssdata->debits;
                                                                                   
                                                              }
                                                              
                                                              
                                                              
                                                              $creditsfull=$creditsfull+$creditsfull2;
                                                               
                                                   
                                                               
                                                                    
                                                                if($creditsfull!=0)
                                                                {
                                                                    
                                                                
                                                                 $array[] = array(
                                                                    
                                                                    
                                                                    'no' => $i, 
                                                                    'id' => $value->id, 
                                                                    'name' => $value->name, 
                                                                    'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                    'credit' => round($creditsfull,2),
                                                                    'resultsub'=>$array2
                                        
                                                                 );
                                                             
                                                                }
                                                          
                         
                         
                                                
                         


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
            public function trial_balance_report2()
    {

                    
                      $formdate=$_GET['formdate'];
                      $todate=$_GET['fromto'];
                 
                   
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND trading='2' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                              $result_sub=$result_sub->result();
                          
                       
                             $array2=array();
                             $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           
                                            $debits=0;
                                            $credits=0;
                                            $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."'  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                            $party1=$result1->result();
                                            foreach($party1 as $partys1)
                                            {
                                                $credits=$partys1->debits;
                                                $debits=$partys1->credits;
                                            }

                                           
                                           
                                           
                                           
                                           
                                                                  
                                             
                                                                             if($valuess->id=='119')
                                                                             {
                                                                                 $viewststi="1";
                                                                                 $credits= $debits;
                                                                                 $getval1= $debits;
                                                                                 
                                                                             }
                                                                             elseif($valuess->id=='120')
                                                                             {
                                                                                  $credits=$credits;
                                                                                  $viewststi="1";
                                                                                  $getval2= $debits;
                                                                                 
                                                                             }
                                                                             else
                                                                             {
                                                                                   $viewststi="0";
                                                                                   if($credits==0)
                                                                                   {
                                                                                      
                                                                                       $credits= $debits;
                                                                                   }
                                                                                   
                                                                             }
                                                                             
                                             
                                                                    
                                            
                                                                           
                                                                    
                                                                         
                                                                           if($credits!='')
                                                                           {
                                                                              if($valuess->id!='120')
                                                                              {
                                                                                  
                                                                              
                                                                               $array2[] = array(
                                                            
                                                            
                                                                                'no' => $i, 
                                                                                'id' => $valuess->id, 
                                                                                'name' => $valuess->name, 
                                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                                'viewstatus' => $viewststi,
                                                                                'credit' => round($credits,2),
                                                                                'vll' => 0,
                                                                                'credittot' =>round($credits,2),
                                                                                
                                                                                );
                                                                                
                                                                              }
                                                                             
                                                                      
                                                                           }
                                                                           
                                                                           
                                                                            if($valuess->id=='120')
                                                                            {
                                                                               $array2[] = array(
                                                            
                                                            
                                                                                'no' => $i, 
                                                                                'id' => $valuess->id, 
                                                                                'name' => $valuess->name, 
                                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                                'viewstatus' => $viewststi,
                                                                                'credit' => round($credits,2),
                                                                                'vll' => round($credits,2),
                                                                                'credittot' => str_replace('-','',round($getval1-$credits,2))
                                                                                
                                                                                );
                                                                                
                                                                             }
                                                                             
                                                                      
                                                                          
                                                                           
                                                                     
                                                                     
                                                                    
                                                                   
                                           
                                       }
                                 
                             }
                     
                     
                     
                                                                    $credittot=0;
                                                                    foreach($array2 as $vvl)
                                                                    {
                                                                        
                                                                        
                                                                       if($vvl['id']!=119)
                                                                       {
                                                                            $credittot+=$vvl['credittot'];
                                                                       }
                                                                       
                                                                       
                                                                        
                                                                    }
                                                                  
                                                                  
                             
                                                                    if($credittot!=0)
                                                                    {
                                                                         $array[] = array(
                                                                        
                                                                        
                                                                        'no' => $i, 
                                                                        'id' => $value->id, 
                                                                        'name' => $value->name, 
                                                                        'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                        'credit' => round($credittot,2),
                                                                        'resultsub'=>$array2
                                            
                                                                         );
                                                             
                                                                    }
                                                                    
                                                        
                         
                         


                        $i++;

                     }
                     
                

                    echo json_encode($array);
                    
                    
                    
                    

    }
    
    
    
            public function trial_balance_report2_sub($formdate,$todate)
    {

                    
                    
                 
                   
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND trading='2' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                              $result_sub=$result_sub->result();
                          
                       
                             $array2=array();
                             $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           
                                            $debits=0;
                                            $credits=0;
                                            $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                            $party1=$result1->result();
                                            foreach($party1 as $partys1)
                                            {
                                                $credits=$partys1->debits;
                                                $debits=$partys1->credits;
                                            }

                                           
                                           
                                           
                                           
                                           
                                                                  
                                             
                                                                             if($valuess->id=='119')
                                                                             {
                                                                                 $viewststi="1";
                                                                                 $credits= $debits;
                                                                                 $getval1= $debits;
                                                                                 
                                                                             }
                                                                             elseif($valuess->id=='120')
                                                                             {
                                                                                  $credits=$credits;
                                                                                  $viewststi="1";
                                                                                  $getval2= $debits;
                                                                                 
                                                                             }
                                                                             else
                                                                             {
                                                                                   $viewststi="0";
                                                                                   if($credits==0)
                                                                                   {
                                                                                      
                                                                                       $credits= $debits;
                                                                                   }
                                                                                   
                                                                             }
                                                                             
                                             
                                                                    
                                            
                                                                           
                                                                    
                                                                         
                                                                           if($credits!='')
                                                                           {
                                                                              if($valuess->id!='120')
                                                                              {
                                                                                  
                                                                              
                                                                               $array2[] = array(
                                                            
                                                            
                                                                                'no' => $i, 
                                                                                'id' => $valuess->id, 
                                                                                'name' => $valuess->name, 
                                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                                'viewstatus' => $viewststi,
                                                                                'credit' => round($credits,2),
                                                                                'vll' => 0,
                                                                                'credittot' =>round($credits,2),
                                                                                
                                                                                );
                                                                                
                                                                              }
                                                                             
                                                                      
                                                                           }
                                                                           
                                                                           
                                                                            if($valuess->id=='120')
                                                                            {
                                                                               $array2[] = array(
                                                            
                                                            
                                                                                'no' => $i, 
                                                                                'id' => $valuess->id, 
                                                                                'name' => $valuess->name, 
                                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                                'viewstatus' => $viewststi,
                                                                                'credit' => round($credits,2),
                                                                                'vll' => round($credits,2),
                                                                                'credittot' => str_replace('-','',round($getval1-$credits,2))
                                                                                
                                                                                );
                                                                                
                                                                             }
                                                                             
                                                                      
                                                                          
                                                                           
                                                                     
                                                                     
                                                                    
                                                                   
                                           
                                       }
                                 
                             }
                     
                     
                     
                                                                    $credittot=0;
                                                                    foreach($array2 as $vvl)
                                                                    {
                                                                        
                                                                        
                                                                       if($vvl['id']!=119)
                                                                       {
                                                                            $credittot+=$vvl['credittot'];
                                                                       }
                                                                       
                                                                       
                                                                        
                                                                    }
                                                                  
                                                                  
                             
                                                                    if($credittot!=0)
                                                                    {
                                                                         $array[] = array(
                                                                        
                                                                        
                                                                        'no' => $i, 
                                                                        'id' => $value->id, 
                                                                        'name' => $value->name, 
                                                                        'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                        'credit' => round($credittot,2),
                                                                        'resultsub'=>$array2
                                            
                                                                         );
                                                             
                                                                    }
                                                                    
                                                        
                         
                         


                        $i++;

                     }
                     
                

                    return json_encode($array);
                    
                    
                    
                    

    }
    
            public function trial_balance_report3()
    {

                    
                    $formdate=$_GET['formdate'];
                    $todate=$_GET['fromto'];
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND trading='1' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                          
                       
                             $array2=array();
                             $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           
                                            $debits=0;
                                            $credits=0;
                                            $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."'  AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                            $party1=$result1->result();
                                            foreach($party1 as $partys1)
                                            {
                                                 
                                              
                                                $credits=$partys1->debits;
                                                $debits=$partys1->credits;
                                            }

                                           
                                           
                                           
                                           
                                           
                                                                  
                                             
                                                                      if($valuess->id=='116')
                                                                     {
                                                                         $viewststi="1";
                                                                         
                                                                         $getval1= $credits;
                                                                         
                                                                        
                                                                         
                                                                     }
                                                                     elseif($valuess->id=='2')
                                                                     {
                                                                        
                                                                          $credits=$debits;
                                                                          $viewststi="1";
                                                                          $getval2= $debits;
                                                                         
                                                                         
                                                                         
                                                                     }
                                                                     else
                                                                     {
                                                                         
                                                                                   $viewststi="0";
                                                                           
                                                                                   if($credits==0)
                                                                                   {
                                                                                      
                                                                                       $credits= $debits;
                                                                                   }
                                                                           
                                                                           
                                                                     }
                                                                     
                                             
                                             
                                            
                                                
                                                                 if($valuess->id==2)
                                                                 {
                                                                     
                                                                     $array2[] = array(
                                                    
                                                    
                                                                        'no' => $i, 
                                                                        'id' => $valuess->id, 
                                                                        'name' => $valuess->name, 
                                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                        'viewstatus' => $viewststi,
                                                                        'credit' => round($credits,2),
                                                                        'credittot' => str_replace('-','',round($getval1-$getval2,2))
                                                                        
                                                                     );
                                                                     
                                                                     
                                                                 }
                                                                 
                                                                 if($valuess->id!=2)
                                                                 {
                                                                     
                                                                     $array2[] = array(
                                                    
                                                    
                                                                        'no' => $i, 
                                                                        'id' => $valuess->id, 
                                                                        'name' => $valuess->name, 
                                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                        'viewstatus' => $viewststi,
                                                                        'credit' => round($credits,2),
                                                                        'credittot' => round($credits,2)
                                                                        
                                                                     );
                                                                     
                                                                 }
                                                                 
                                                                     
                                                                    
                                                                    
                                                                     
                                                                    
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                                                                    $credittot=0;
                                                                    foreach($array2 as $vvl)
                                                                    {
                                                                        
                                                                           
                                                                           if($vvl['id']!=116)
                                                                           {
                                                                                $credittot+=$vvl['credittot'];
                                                                       
                                                                           }
                                                                       
                                                                           
                                                                       
                                                                       
                                                                        
                                                                    }
                             
                                                                    if($credittot!=0)
                                                                    {
                                                                         $array[] = array(
                                                                        
                                                                        
                                                                        'no' => $i, 
                                                                        'id' => $value->id, 
                                                                        'name' => $value->name, 
                                                                        'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                        'credit' => round($credittot,2),
                                                                        'resultsub'=>$array2
                                                                         );
                                                             
                                                                    }
                                                                    
                                                             
                                                           
                         
                         
                                               
                         
                         
                         
                         
                         


                        $i++;

                     }
                     
                     
             
              
                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
            public function trial_balance_report3_sub($formdate,$todate)
    {

                    
                    
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0  AND trading='1' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                          
                       
                             $array2=array();
                             $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           
                                            $debits=0;
                                            $credits=0;
                                            $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                            $party1=$result1->result();
                                            foreach($party1 as $partys1)
                                            {
                                                 
                                              
                                                $credits=$partys1->debits;
                                                $debits=$partys1->credits;
                                            }

                                           
                                           
                                           
                                           
                                           
                                                                  
                                             
                                                                      if($valuess->id=='116')
                                                                     {
                                                                         $viewststi="1";
                                                                         
                                                                         $getval1= $credits;
                                                                         
                                                                        
                                                                         
                                                                     }
                                                                     elseif($valuess->id=='2')
                                                                     {
                                                                        
                                                                          $credits=$debits;
                                                                          $viewststi="1";
                                                                          $getval2= $debits;
                                                                         
                                                                         
                                                                         
                                                                     }
                                                                     else
                                                                     {
                                                                         
                                                                                   $viewststi="0";
                                                                           
                                                                                   if($credits==0)
                                                                                   {
                                                                                      
                                                                                       $credits= $debits;
                                                                                   }
                                                                           
                                                                           
                                                                     }
                                                                     
                                             
                                             
                                            
                                                
                                                                 if($valuess->id==2)
                                                                 {
                                                                     
                                                                     $array2[] = array(
                                                    
                                                    
                                                                        'no' => $i, 
                                                                        'id' => $valuess->id, 
                                                                        'name' => $valuess->name, 
                                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                        'viewstatus' => $viewststi,
                                                                        'credit' => round($credits,2),
                                                                        'credittot' => str_replace('-','',round($getval1-$getval2,2))
                                                                        
                                                                     );
                                                                     
                                                                     
                                                                 }
                                                                 
                                                                 if($valuess->id!=2)
                                                                 {
                                                                     
                                                                     $array2[] = array(
                                                    
                                                    
                                                                        'no' => $i, 
                                                                        'id' => $valuess->id, 
                                                                        'name' => $valuess->name, 
                                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                        'viewstatus' => $viewststi,
                                                                        'credit' => round($credits,2),
                                                                        'credittot' => round($credits,2)
                                                                        
                                                                     );
                                                                     
                                                                 }
                                                                 
                                                                     
                                                                    
                                                                    
                                                                     
                                                                    
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                                                                    $credittot=0;
                                                                    foreach($array2 as $vvl)
                                                                    {
                                                                        
                                                                           
                                                                           if($vvl['id']!=116)
                                                                           {
                                                                                $credittot+=$vvl['credittot'];
                                                                       
                                                                           }
                                                                       
                                                                           
                                                                       
                                                                       
                                                                        
                                                                    }
                             
                                                                    if($credittot!=0)
                                                                    {
                                                                         $array[] = array(
                                                                        
                                                                        
                                                                        'no' => $i, 
                                                                        'id' => $value->id, 
                                                                        'name' => $value->name, 
                                                                        'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                        'credit' => round($credittot,2),
                                                                        'resultsub'=>$array2
                                                                         );
                                                             
                                                                    }
                                                                    
                                                             
                                                           
                         
                         
                                               
                         
                         
                         
                         
                         


                        $i++;

                     }
                     
                     
             
              
                    return json_encode($array);

    }
    
    
    
    
    
    
    
    
        public function trial_balance_report()
    {

                       $formdate=$_GET['formdate'];
                       $todate=$_GET['fromto'];




                       $resultaset=$this->trial_balance_report2_sub($formdate,$todate);
                       $resulta=json_decode($resultaset);
                           
                              
                        
                        $a=0;
                        foreach($resulta as $vl)
                        {
                            $a+=$vl->credit;
                        }
                        
                      
                        
                        $resultb=$this->trial_balance_report3_sub($formdate,$todate);
                        
                        $resultb=json_decode($resultb);
                            
                            
                        $b=0;
                        foreach($resultb as $vl)
                        {
                            $b+=$vl->credit;
                        }
                           
                         
                        $total=0;
                        if($a<$b)
                        {
                            $total=$b-$a;
                        }
                    
                    
                       
                 
                         $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND showno=0 AND spilt_status='1' AND trading='0' ORDER BY sort_order ASC");
                         $result=$result->result();
                         
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                             
                          
                       
                             $array2=array();
                              $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                              $debits=0;
                                              $credits=0;
                                              $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                              $party1=$result1->result();
                                              foreach($party1 as $partys1)
                                              {
                                                 
                                              
                                                $credits=$partys1->credits;
                                               
                                              }

                                                         
                                                         if($credits!=0)
                                                         {
                                                             
                                                         

                                                            $array2[] = array(
                                            
                                            
                                                                'no' => $i, 
                                                                'id' => $valuess->id, 
                                                                'name' => $valuess->name, 
                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                'credit' => round($credits,2)
                                                                
                                                             );
                                                             
                                                         }
                                             
                                               $creditsfull+=$credits;
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                     
                                                 
                                                
                                                   
                                                   
                                                            if($creditsfull==0)
                                                            {
                                                                
                                                           
                                                            
                                                                 $array[] = array(
                                                                    
                                                                    
                                                                    'no' => $i, 
                                                                    'id' => $value->id, 
                                                                    'name' => '0', 
                                                                    'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                    'credit' => round($creditsfull+$total,2),
                                                                    'resultsub'=>$array2
                                        
                                                                 );
                                                             
                                                             
                                                            }
                                                            
                                                            if($creditsfull!=0)
                                                            {
                                                                
                                                           
                                                            
                                                                 $array[] = array(
                                                                    
                                                                    
                                                                    'no' => $i, 
                                                                    'id' => $value->id, 
                                                                    'name' => $value->name, 
                                                                    'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                    'credit' => round($creditsfull+$total,2),
                                                                    'resultsub'=>$array2
                                        
                                                                 );
                                                             
                                                             
                                                            }
                         
                         
                                                
                         
                         
                         
                         
                         


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
            public function trial_balance_report_sub($formdate,$todate)
    {

                       $resultaset=$this->trial_balance_report2_sub($formdate,$todate);
                
                        $resulta=json_decode($resultaset);
                           
                              
                        
                        $a=0;
                        foreach($resulta as $vl)
                        {
                            $a+=$vl->credit;
                        }
                        
                      
                        
                        $resultb=$this->trial_balance_report3_sub($formdate,$todate);
                        
                        $resultb=json_decode($resultb);
                            
                            
                        $b=0;
                        foreach($resultb as $vl)
                        {
                            $b+=$vl->credit;
                        }
                           
                         
                        $total=0;
                        if($a<$b)
                        {
                            $total=$b-$a;
                        }
                    
                    
                    
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND showno=0 AND spilt_status='1' AND trading='0' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                              $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                             
                          
                       
                             $array2=array();
                              $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                      if($value->id==$valuess->account_type)
                                       {
                                              $debits=0;
                                              $credits=0;
                                              $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                              $party1=$result1->result();
                                              foreach($party1 as $partys1)
                                              {
                                                 
                                              
                                                $credits=$partys1->credits;
                                               
                                              }

                                                         
                                                         if($credits!=0)
                                                         {
                                                             
                                                         

                                                            $array2[] = array(
                                            
                                            
                                                                'no' => $i, 
                                                                'id' => $valuess->id, 
                                                                'name' => $valuess->name, 
                                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                                'credit' => round($credits,2)
                                                                
                                                             );
                                                             
                                                         }
                                             
                                               $creditsfull+=$credits;
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                     
                                                 
                                                
                                                   
                                                   
                                                            if($total!=0)
                                                            {
                                                                
                                                           
                                                            
                                                             $array[] = array(
                                                                
                                                                
                                                                'no' => $i, 
                                                                'id' => $value->id, 
                                                                'name' => $value->name, 
                                                                'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                'credit' => round($creditsfull+$total,2),
                                                                'resultsub'=>$array2
                                    
                                                             );
                                                             
                                                             
                                                            }
                         
                         
                                                
                         
                         
                         
                         
                         


                        $i++;

                     }

                    return json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
        public function trial_balance_report1()
    {

                    
                    
                $formdate=$_GET['formdate'];
                $todate=$_GET['fromto'];
                    
                    
                    
                $resultaset=$this->trial_balance_report2_sub($formdate,$todate);
                
                $resulta=json_decode($resultaset);
                   
                      
                
                $a=0;
                foreach($resulta as $vl)
                {
                    $a+=$vl->credit;
                }
                
              
                
                $resultb=$this->trial_balance_report3_sub($formdate,$todate);
                
                $resultb=json_decode($resultb);
                    
                    
                $b=0;
                foreach($resultb as $vl)
                {
                    $b+=$vl->credit;
                }
                   
                 
                $total=0;
                if($a>$b)
                {
                    $total=$a-$b;
                }
                    
                    
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                   
                    
                    
                    
                    
                    
                    
                    
                    
                     
                  $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND showno=0 AND spilt_status='0' AND trading='0' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                          
                             $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                        
                           
                       
                             $array2=array();
                                $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                 
                                 
                                  
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                                      $debits=0;
                                                      $credits=0;
                                           
                                           
                                     
                                                   
                                                      $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                                      $party1=$result1->result();
                                                      foreach($party1 as $partys1)
                                                      {
                                                         
                                                      
                                                        $credits=$partys1->debits;
                                                       
                                                      }
                             
                                           
                                               
                                                    if($credits!=0)
                                                    {
                                                        
                                                   
                                               
                                                     $array2[] = array(
                                    
                                    
                                                        'no' => $i, 
                                                        'id' => $valuess->id, 
                                                        'name' => $valuess->name, 
                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                        'credit' => round($credits,2)
                                                        
                                                     );
                                                 
                                                    } 
                                               $creditsfull+=$credits;
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                     
                    
                                                         
                                                         
                                                          if($creditsfull==0)
                                                          {
                                                              
                                                         
                     
                                                             $array[] = array(
                                                                
                                                                
                                                                'no' => $i, 
                                                                'id' => $value->id, 
                                                                'name' => '0', 
                                                                'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                'credit' => round($creditsfull+$total,2),
                                                                'resultsub'=>$array2
                                    
                                                             );
                                                             
                                                             
                                                          }
                                                             
                                                         
                                                          if($creditsfull!=0)
                                                          {
                                                              
                                                         
                     
                                                             $array[] = array(
                                                                
                                                                
                                                                'no' => $i, 
                                                                'id' => $value->id, 
                                                                'name' => $value->name, 
                                                                'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                'credit' => round($creditsfull+$total,2),
                                                                'resultsub'=>$array2
                                    
                                                             );
                                                             
                                                             
                                                          }
                                                             
                         
                         
                                                
                         
                         
                         
                         
                         


                        $i++;

                     }
                   
                    
                   
                    echo json_encode($array);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function trial_balance_report1_sub($formdate,$todate)
    {

                    
                    
                $resultaset=$this->trial_balance_report2_sub($formdate,$todate);
                
                $resulta=json_decode($resultaset);
                   
                      
                
                $a=0;
                foreach($resulta as $vl)
                {
                    $a+=$vl->credit;
                }
                
              
                
                $resultb=$this->trial_balance_report3_sub($formdate,$todate);
                
                $resultb=json_decode($resultb);
                    
                    
                $b=0;
                foreach($resultb as $vl)
                {
                    $b+=$vl->credit;
                }
                   
                 
                $total=0;
                if($a>$b)
                {
                    $total=$a-$b;
                }
                    
                    
                
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     
                  $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND showno=0 AND spilt_status='0' AND trading='0' ORDER BY sort_order ASC");
                     $result=$result->result();
                     
                 
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                          
                             $result_sub=$this->db->query("SELECT * FROM accountheads_sub_group WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY sort_order ASC");
                             $result_sub=$result_sub->result();
                        
                           
                       
                             $array2=array();
                                $creditsfull=0;
                             foreach ($result_sub as  $valuess) 
                             {
                                 
                                 
                                  
                                      if($value->id==$valuess->account_type)
                                       {
                                           
                                                      $debits=0;
                                                      $credits=0;
                                           
                                           
                                     
                                                   
                                                      $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM all_ledgers WHERE deleteid=0 AND account_heads_id_2='".$valuess->id."' AND payment_date BETWEEN '".$formdate."' AND '".$todate."' ORDER BY id DESC");
                                                      $party1=$result1->result();
                                                      foreach($party1 as $partys1)
                                                      {
                                                         
                                                      
                                                        $credits=$partys1->debits;
                                                       
                                                      }
                             
                                           
                                               
                                                    if($credits!=0)
                                                    {
                                                        
                                                   
                                               
                                                     $array2[] = array(
                                    
                                    
                                                        'no' => $i, 
                                                        'id' => $valuess->id, 
                                                        'name' => $valuess->name, 
                                                        'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                                        'credit' => round($credits,2)
                                                        
                                                     );
                                                 
                                                    } 
                                               $creditsfull+=$credits;
                                           
                                       }
                                 
                             }
                     
                     
                     
                     
                     
                     
                    
                                                         
                                                         
                                                          if($total!=0)
                                                          {
                                                              
                                                         
                     
                                                             $array[] = array(
                                                                
                                                                
                                                                'no' => $i, 
                                                                'id' => $value->id, 
                                                                'name' => $value->name, 
                                                                'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                                                                'credit' => round($creditsfull+$total,2),
                                                                'resultsub'=>$array2
                                    
                                                             );
                                                             
                                                             
                                                          }
                                                             
                         
                         
                                                
                         
                         
                         
                         
                         


                        $i++;

                     }
                   
                    
                   
                    return  json_encode($array);
    }
    
    
    
        public function fetch_data_sales_balance_report()
    {

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $payment_mode=$_GET['payment_mode'];
                     
                     
                    
                 
                     $stat=' ';
                     
                     if($payment_mode!='undefined') 
                     {   
                         if($payment_mode!='ALL') 
                         {
                             $stat.=' AND a.payment_mode="'.$payment_mode.'"';
                         }
                         
                         
                     }
                     
                     if($order_status=='undefined') 
                     {
                         
                     
                      $stat.=' AND a.finance_status IN ("3","4")';
                      
                      $stat.=' AND a.assign_status IN ("1","2","3","11","12")';
                      
                     }
                     else
                     {
                         
                         if($order_status=='ALL')
                         {
                              $stat.=' AND a.finance_status IN ("3","4")';
                              $stat.=' AND a.assign_status IN ("1","2","3","11","12")';
                         }
                         else
                         {
                             
                              $order_status=explode(',', $order_status);
                              $order_status=implode("','", $order_status);
                              $stat.=' AND a.finance_status IN ("3","4")';
                              $stat.=" AND a.assign_status IN ('$order_status')";
                            
                             
                         }
                        
                     }
                      
                    
                      
                      
                    $userslog="";
                  
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                         $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                      
                      
                     
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                     
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                       
                     }
                     
                    
                    //echo "SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat ORDER BY a.id DESC";
                    //exit;
                    
                     $result=$result->result();
                     
                 
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                       
                       
                       
                                     $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                                     $resultsub=$resultsub->result();
                                     $total=0;
                                     foreach($resultsub as $val)
                                     { 
                                       
                                      
                                                 $total+=round($val->qty*$val->rate,2);
                         
                                    }
                                    
                                    
                                      $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                                    
                                     
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                         
                                    }
                                    
                                    
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$value->sales_head."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                    
                                    
                                    
                                    
                       
                       
                         $status="Order Completed";
                         if($value->assign_status=='11')
                         {
                             $status='UN Dispatched / Sheet In Factory';
                         }
                         
                         if($value->assign_status=='12')
                         {
                             $status='Driver UN-Picked';
                         }
                         
                         if($value->assign_status=='1')
                         {
                             $status='Trip Not Started';
                         }
                         
                         
                         if($value->assign_status=='2')
                         {
                             $status='Trip Started & Un-Delivered';
                         }
                         
                         if($value->assign_status=='3' && $value->finance_status=='4')
                         {
                             $status='Delivered & Pending collection';
                         }
                         if($value->assign_status=='3' && $value->finance_status=='4')
                                                 {
                                                    
                                                     $payment_status='Pending';
                                                 }
                                                 else
                                                 {
                                                     $payment_status='Pending';
                                                 }
                                                  
                         
                         
                         if($value->pending_amount=='')
                         {
                              $value->pending_amount=0;
                         }
                         
                         if($value->collectamount=='')
                         {
                              $value->collectamount=0;
                         }
                         
                     
                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no,
                            'sales_group' => $sales_group,
                            'sales_head' => $sales_head,
                            'sales_team' => $sales_team,
                            'customername' => $value->company_name,
                            'payment_mode' => $value->payment_mode,
                            'collectamount' => $value->collectamount,
                            'pending_amount' => $value->pending_amount,
                            'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                            'total' => round($total,2),
                            'status' => $status,
                            'payment_status' => $payment_status
                            

                        );


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_customer_balance_report()
    {

                    
                    
                    

                     $customer_id=$_GET['customer_id'];
                     $cateid=$_GET['order_status'];
                     //$sales_group=$_GET['sales_group'];
                     $sales_group=35;
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $payment_mode=$_GET['payment_mode'];
                     
                     $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     
                     
                    
                 
                     $stat=' ';
                     $userslog="";
                    $usersgroup="";
                    if($cateid!='ALL')
                    {
                         $userslog.=' AND b.sales_team_id="'.$cateid.'"';       
                    } 
                    
                    
                    
                    if($customer_id!='0')
                    {
                         $userslog.=' AND b.id="'.$customer_id.'"';       
                    } 
                     
                    
                    if($sales_group!='ALL')
                    {
                         $usersgroup=' AND ss.id="'.$sales_group.'"';       
                    } 
                      
                      
                   
                  
                    
                    if($this->session->userdata['logged_in']['access']=='17')
                    {
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_head=$values->define_saleshd_id;
                              
                          }
                          
                          $userslog.=' AND b.sales_team_id="'.$sales_team_head.'"';        
                                 
                    }
                     
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                                 $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  b.sales_team_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                  
                      
                     $search = $_GET['search'];
                     $searchsql="";
                     $searchsql2="";
                     if($search!="")
                     {
                         //$searchsql=" AND  ss.name LIKE'%".$search."%'";
                         $searchsql2=" AND b.company_name LIKE'%".$search."%' OR b.phone LIKE'%".$search."%'";
                     }
                     
                     
                         
                     $result=$this->db->query("SELECT ss.id as sales_group_id,ss.name as sales_group_name  FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  JOIN sales_member_group as ssg ON b.sales_team_id=ssg.sales_member_id JOIN sales_group as ss ON ssg.sales_group_id=ss.id WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0   AND a.party_type='1'    $stat $userslog $usersgroup $searchsql $searchsql2 GROUP BY ss.id  ORDER BY ss.name ASC");
                     $result=$result->result();
                     
                 
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $valuessg) 
                     {
                       
                       
                       
                       
                       
                         $get_sales_person=$this->db->query("SELECT aa.id as sales_team_id,aa.username as sales_person_name FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id JOIN sales_member_group as ssg ON b.sales_team_id=ssg.sales_member_id JOIN sales_group as ss ON ssg.sales_group_id=ss.id JOIN admin_users as aa ON aa.id=ssg.sales_member_id WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.party_type='1' $stat $userslog $searchsql2 GROUP BY aa.id ORDER BY aa.username ASC");
                         $get_sales_person=$get_sales_person->result();
                         foreach ($get_sales_person as  $value) 
                         {
                             
                             
                         }
                       
                       
                       
                       
                       
                                     $resultsubdata=$this->db->query("SELECT b.id,b.sales_group,b.locality,b.feedback_details,b.phone,SUM(a.debits) as debits,SUM(a.credits) as credits,b.opening_balance,b.company_name,b.payment_status  FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id   WHERE   a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.party_type='1' AND b.sales_group!=''  $stat $userslog $searchsql2 GROUP BY a.customer_id ORDER BY b.company_name ASC");
                                     $resultsubdata=$resultsubdata->result();
                                     $subresult=array();
                                     
                                     $debitssettotal=0;
                                     $creditssettotal=0;
                                     $closeingtotal=0;
                                     $sheet_in_factory_val=0;
                                     $transit=0;
                                     $balancetoatal=0;
                                    
                                     $Tran_Dr=0;
                                     $Tran_Cr=0;
                                     $Tot_Dr=0;
                                     $Tot_Cr=0;
                                     $Open_Dr=0;
                                     $Open_Cr=0;
                                     $Open_Bal=0;
                                     
                                     foreach ($resultsubdata as  $value) 
                                     {
                                         
                                      $sales_group=$value->sales_group;
                                      $sales_groupexe=explode('|', $sales_group);
                                      
                                      
                                      
                                      
                                       
                                       
                                        
                                       if(in_array($valuessg->sales_group_id, $sales_groupexe))
                                       {
                                          
                                      
      
      

                                   
                                                               $route_name="";
                                                               $result_account_head=$this->db->query("SELECT r.name FROM locality as a JOIN route as r ON a.route_id=r.id WHERE  a.id='".$value->locality."'");
                                                               $result_account_head_text=$result_account_head->result();
                                                              
                                                               foreach($result_account_head_text as $ass)
                                                               {
                                                                                        $route_name=$ass->name;
                                                                                       
                                                               }
                                                                
                                                               
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$value->id."' AND b.assign_status IN ('11','12','1')  AND a.return_status=0  ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total+=round($val->qty*$val->rate,2);
                                                     
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM sales_return_products as a JOIN order_sales_return_complaints as b  ON a.c_id=b.id WHERE b.deleteid=0 AND b.customer='".$value->id."' ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total_return=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total_return+=round($val->qty*$val->rate,2);
                                                     
                                                                 }
                            
                                                               
                                                               
                                                               
                                                               
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$value->id."' AND b.assign_status IN ('2')  AND a.return_status=0  ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total_transit=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total_transit+=round($val->qty*$val->rate,2);
                                                     
                                                                }

                                   
                                            $opening_balance=0;
                                            $resultDRss=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date < '".$formdate."'  AND a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                            $resultDRss=$resultDRss->result();
                                             
                                             
                                             
                                             
                                            $resultDRsscurrentdate=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no='Opening Balance'  AND a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                            $resultDRsscurrentdate=$resultDRsscurrentdate->result(); 
                                            $Checkres=$resultDRsscurrentdate[0]->debits+$resultDRsscurrentdate[0]->credits;
                                             
                                             
                                            if($Checkres>0)
                                            {
                                                 
                                                    foreach($resultDRsscurrentdate as $valdss)
                                                    { 
                                                       $opening_balance_val=$valdss->credits-$valdss->debits;
                                                       $opening_balance=str_replace('-', '', $opening_balance_val);
                                                    }
                                                 
                                             }
                                             else
                                             {
                                                 
                                                   foreach($resultDRss as $valdss)
                                                    { 
                                                       $opening_balance_val=$valdss->credits-$valdss->debits;
                                                       $opening_balance=str_replace('-', '', $opening_balance_val);
                                                    }
                                                 
                                             }
                                             
                                             
                                           
                                         
                                    
                                    
                                            $payment_status="";
                                            $opening_balance_cr=0;
                                            $opening_balance_dr=0;
                                            if($opening_balance_val>0)
                                            {
                                                $payment_status='CR';
                                                $opening_balance_cr=$opening_balance;
                                            }
                                             else
                                            {
                                               $payment_status='DR';  
                                               $opening_balance_dr=$opening_balance;
                                            }
                               
                                             
                                     
                                     
                                     
                                      
                         
                                         
                                         
                                         
                                          
                                         
                                          
                                        
                                          
                                          $sheet_in_factory=round($total+$total_return,2);
                                          
                                          
                                          
                                          
                                         
                                         $resultDR=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.party_type='1' AND a.order_no!='Opening Balance'  AND a.customer_id='".$value->id."'");
                                         $resultDR=$resultDR->result();
                                         
                                         foreach($resultDR as $vald)
                                         { 
                                             $trnDr=$vald->debits;
                                             $trnCr=$vald->credits;
                                         }
                                         
                                         $resultoverall=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE   a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                         $resultoverall=$resultoverall->result();
                                         
                                         foreach($resultoverall as $valdoo)
                                         { 
                                             $overallDr=$valdoo->debits;
                                             $overallCr=$valdoo->credits;
                                             $overallresult=$overallCr-$overallDr;
                                         }
                                         
                                         
                                          $creditsset=0;
                                          $debitsset=0;
                                          $Toatbalance=0;
                                          $closeing=0;
                                          $Total_trn_dr=0;
                                          $Total_trn_cr=0;
                                          $payment_status_bu_closeing="";
                                          
                                          $TotalDr=$opening_balance_dr;
                                          $TotalCr=$opening_balance_cr;
                                          $totbalance=  $trnCr-$trnDr;
                                          
                                          $Total_trn_dr=$opening_balance_dr+$trnDr;
                                          $Total_trn_cr=$opening_balance_cr+$trnCr;
                                         
                                          
                                          
                                          if($Total_trn_dr<$Total_trn_cr)
                                          {
                                              $creditsset=$Total_trn_dr-$Total_trn_cr;
                                              $creditsset=str_replace('-', '', $creditsset);
                                              $payment_status_bu_closeing='CR';
                                              $closeing= $creditsset;
                                              
                                          }
                                          else
                                          {
                                              
                                              $debitsset=$Total_trn_cr-$Total_trn_dr;   
                                              $debitsset=str_replace('-', '', $debitsset);
                                              $payment_status_bu_closeing='DR';
                                              $closeing= $debitsset;
                                              
                                          }
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                         
                                         
                                         if($payment_status_bu_closeing=='DR')
                                         {
                                             $Totaltranspot= $sheet_in_factory-$total_transit;
                                             $Totaltranspotval= $closeing-$Totaltranspot;
                                             $Totaltranspotval=str_replace('-', '', $Totaltranspotval);
                                             
                                             if($closeing<$Totaltranspot)
                                             {
                                                 $getstatus=1;
                                             }
                                             else
                                             {
                                                 $getstatus=0;
                                             }
                                             
                                             
                                             
                                             
                                         }
                                          if($payment_status_bu_closeing=='CR')
                                         {
                                             
                                             $Totaltranspot= $sheet_in_factory+$total_transit;
                                             $Totaltranspotval= $closeing+$Totaltranspot;
                                             $getstatus=1;
                                             
                                             
                                         }
                                         
                                         
                                         
                                          
                                         
                                         $debitssettotal+=$debitsset;
                                         $creditssettotal+=$creditsset;
                                         $closeingtotal+=$closeing;
                                         
                                         
                                         
                                         $sheet_in_factory_val+=round($total+$total_return,2);
                                         $transit+=round($total_transit,2);
                                         $balancetoatal+=round($Totaltranspotval,2);
                                         
                                         $Tran_Dr+=round($trnDr,2);
                                         $Tran_Cr+=round($trnCr,2);
                                         
                                         
                                         $Tot_Dr+=round($Total_trn_dr,2);
                                         $Tot_Cr+=round($Total_trn_cr,2);
                                         
                                         
                                         $Open_Dr+=round($opening_balance_dr,2);
                                         $Open_Cr+=round($opening_balance_cr,2);
                                         $Open_Bal+=round($opening_balance,2);
                                         
                                         
                                         if($getstatus==0)
                                         { 
                                             
                                            $totalcheck=round($total+$total_return+$total_transit+$Totaltranspotval);
                                          
                                         }
                                         else
                                         {
                                            $totalcheck=round($total+$total_return+$total_transit);
                                         
                                         }
                                      
                                      
                                      
                                     
                                          
                                          if($totalcheck>0)
                                          {
                                              $hidestatus="";
                                          }
                                          else
                                          {
                                             $hidestatus="shownullvalue getview";
                                          }
                                         
                                         $subresult[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'payment_status' => $payment_status, 
                                            'route_name'=>$route_name,
                                            'customername' => $value->company_name, 
                                            'customerphone' => $value->phone,
                                            'opening_balance_dr' => $opening_balance_dr,
                                            'opening_balance_cr' => $opening_balance_cr,
                                            'opening_balance' => round($opening_balance),
                                            'trnDr' => round($trnDr,2),
                                            'trnCr' => round($trnCr,2),
                                            'trnDrtotal' => $Total_trn_dr,
                                            'trnCrtotal' => $Total_trn_cr,
                                            'debit' => round($debitsset,2),
                                            'credit' => round($creditsset,2),
                                            'closeing' => round($closeing,2),
                                            'payment_status_bu_closeing' => $payment_status_bu_closeing,
                                            'sheet_in_factory' => round($total+$total_return,2),
                                            'transit'=>round($total_transit,2),
                                            'getstatus'=>$getstatus,
                                            'balance' => round($Totaltranspotval,2),
                                            'feedback_details' => $value->feedback_details, 
                                            'phone' => $value->phone,
                                            'hidestatus' => $hidestatus
                
                                        );
                                        
                                       }
                                        
                                        
                                        
                                        
                                      }
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                     $totalcloseing= round($debitssettotal-$creditssettotal,2);
                                     $totalcloseing=str_replace('-', '', $totalcloseing);
                                     
                                     
                                     $balancetoatal=str_replace('-', '', $balancetoatal);
                                     
                                     
                                     
                                     
                                     
                                        
                                      $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $valuessg->id, 
                                            'sales_group_name' => $valuessg->sales_group_name, 
                                            'debit' => round($debitssettotal,2),
                                            'credit' => round($creditssettotal,2),
                                            'closeing' =>  round($totalcloseing,2),
                                            'sheet_in_factory'=>round($sheet_in_factory_val),
                                            'transit'=>round($transit),
                                            'net_balance'=>round($balancetoatal),
                                            'Tran_Dr'=>round($Tran_Dr),
                                            'Tran_Cr'=>round($Tran_Cr),
                                            'Tot_Dr'=>round($Tot_Dr),
                                            'Tot_Cr'=>round($Tot_Cr),
                                            'Open_Dr'=>round($Open_Dr),
                                            'Open_Cr'=>round($Open_Cr),
                                            'Open_Bal'=>round($Open_Bal),
                                            'subarray'=>$subresult,
                
                                        );   
                                        
                       
                        $i++;

                     }
                     
                     
                  
                    

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function fetch_data_enquiry_report()
    {

                    
                    
                    

                     $customer_id=$_GET['customer_id'];
                     $cateid=$_GET['order_status'];
                     $sales_group=$_GET['sales_group'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $payment_mode=$_GET['payment_mode'];
                     
                     $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     
                     
                    
                 
                     $stat=' ';
                     $userslog="";
                    $usersgroup="";
                    if($cateid!='ALL')
                    {
                         $userslog.=' AND b.sales_team_id="'.$cateid.'"';       
                    } 
                    
                    
                    if($sales_group!='ALL')
                    {
                         $usersgroup=' AND a.id="'.$sales_group.'"';       
                    } 
                      
                      
                   
                  
                    
                    
                    
                  
                      
                     $search = $_GET['search'];
                     $searchsql="";
                     $searchsql2="";
                     if($search!="")
                     {
                         //$searchsql=" AND  ss.name LIKE'%".$search."%'";
                         $searchsql2=" AND b.name LIKE'%".$search."%' OR b.phone LIKE'%".$search."%'";
                     }
                     
                     
                         
                     $result=$this->db->query("SELECT a.name as sales_group_name,a.id as sales_group_id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.access=12 $userslog $usersgroup $searchsql2 GROUP BY a.id ORDER BY a.name ASC");
                     $result=$result->result();
                     
                 
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $valuessg) 
                     {
                       
                       
                                    
                                     $resultsubdata=$this->db->query("SELECT aa.username,aa.id FROM  sales_group as a JOIN sales_member_group as b ON a.id=b.sales_group_id JOIN admin_users as aa ON b.sales_member_id=aa.id WHERE  a.deleteid=0 AND aa.access=12 AND a.id='".$valuessg->sales_group_id."' $userslog $searchsql2 GROUP BY aa.id ORDER BY aa.name ASC");
                                     $resultsubdata=$resultsubdata->result();
                                     $subresult=array();
                                     foreach ($resultsubdata as  $val) 
                                     {
                                         
                                         
                                         
                                         $resultoverall=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders  WHERE user_id='".$val->id."' AND create_date < '".$formdate."'");
                                         $resultoverall=$resultoverall->result();
                                         foreach($resultoverall as $valdoo)
                                         { 
                                             $totalcount=$valdoo->totalcount;
                                             
                                         }
                                         
                                         
                                         $convetedtotal=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_process  WHERE user_id='".$val->id."' AND create_date <'".$formdate."'");
                                         $convetedtotal=$convetedtotal->result();
                                         foreach($convetedtotal as $con)
                                         { 
                                             $totalconvert=$con->totalcount;
                                             
                                         }
                                         
                                         
                                         $billingtotal=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_process  WHERE user_id='".$val->id."' AND order_base=1 AND finance_status=5 AND create_date <'".$formdate."'");
                                         $billingtotal=$billingtotal->result();
                                         foreach($billingtotal as $bill)
                                         { 
                                             $totalbilling=$bill->totalcount;
                                             
                                         }
                                         
                                         
                                          $totalmissing=$totalcount-$totalconvert;
                                          $totalbillingpending=$totalconvert-$totalbilling;
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                          
                                         $today_resultoverall=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders  WHERE user_id='".$val->id."' AND create_date='".$formdate."' ");
                                         $today_resultoverall=$today_resultoverall->result();
                                         foreach($today_resultoverall as $today_valdoo)
                                         { 
                                             $today_totalcount=$today_valdoo->totalcount;
                                             
                                         }
                                         
                                         
                                         $today_convetedtotal=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_process  WHERE user_id='".$val->id."' AND create_date='".$formdate."' ");
                                         $today_convetedtotal=$today_convetedtotal->result();
                                         foreach($today_convetedtotal as $today_con)
                                         { 
                                             $today_totalconvert=$today_con->totalcount;
                                             
                                         }
                                         
                                         
                                         $today_billingtotal=$this->db->query("SELECT COUNT(id) as totalcount  FROM orders_process  WHERE user_id='".$val->id."' AND create_date='".$formdate."' AND order_base=1 AND finance_status=5");
                                         $today_billingtotal=$today_billingtotal->result();
                                         foreach($today_billingtotal as $today_bill)
                                         { 
                                             $today_totalbilling=$today_bill->totalcount;
                                             
                                         }
                                         
                                         
                                          $today_totalmissing=$today_totalcount-$today_totalconvert;
                                          $today_totalbillingpending=$today_totalconvert-$today_totalbilling;
                                          
                                          
                                          
                                          
                                          
                                         $overalltotalcount= $totalcount+$today_totalcount;
                                         $overalltotalconvert= $totalconvert+$today_totalconvert;
                                         $overalltotalmissing= $totalmissing+$today_totalmissing;
                                         $overalltotalbilling= $totalbilling+$today_totalbilling;
                                         $overalltotalbillingpending= $totalbillingpending+$today_totalbillingpending;
                                         
                                          
                                          
                                          
                                          $convertion=0;
                                          $missed=0;
                                          $pending=0;
                                          $billing=0;
                                          
                                          
                                          
                                          if($overalltotalcount!=0 && $overalltotalconvert!=0)
                                          {
                                              
                                              
                                               $convertion=round($overalltotalcount/$overalltotalconvert*100,1);
                                          
                                              
                                          }
                                          
                                          if($overalltotalmissing!=0 && $overalltotalcount!=0)
                                          {
                                            
                                            $missed=round($overalltotalmissing/$overalltotalcount*100,1);
                                            
                                          }
                                          if($overalltotalbillingpending!=0 && $overalltotalcount!=0)
                                          {
                                            
                                           $pending=round($overalltotalbillingpending/$overalltotalcount*100,1);
                                          }
                                         
                                          if($overalltotalbilling!=0 && $overalltotalcount!=0)
                                          {
                                            
                                           $billing=round($overalltotalbilling/$overalltotalcount*100,1);
                                          }
                                         
                                         
                                          
                                         
                                          $subresult[] = array(
                                            
                                            
                                             
                                            'id' => $val->id, 
                                            'sales_team' => $val->username,
                                            
                                            'totalcount'=>$totalcount,
                                            'totalconvert'=>$totalconvert,
                                            'totalmissing'=>$totalmissing,
                                            'totalbilling'=>$totalbilling,
                                            'totalbillingpending'=>$totalbillingpending,
                                            
                                            
                                            'today_totalcount'=>$today_totalcount,
                                            'today_totalconvert'=>$today_totalconvert,
                                            'today_totalmissing'=>$today_totalmissing,
                                            'today_totalbilling'=>$today_totalbilling,
                                            'today_totalbillingpending'=>$today_totalbillingpending,
                                            
                                            
                                            'total_totalcount'=>$overalltotalcount,
                                            'total_totalconvert'=>$overalltotalconvert,
                                            'total_totalmissing'=>$overalltotalmissing,
                                            'total_totalbilling'=>$overalltotalbilling,
                                            'total_totalbillingpending'=>$overalltotalbillingpending,
                                            
                                            'convertion'=>$convertion,
                                            'missed'=>$missed,
                                            'pending'=>$pending,
                                            'billing'=>$billing
                                            
                
                                          );   
                                     }
                                      
                                        
                                        
                                      $array[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $valuessg->sales_group_id, 
                                            'sales_group_name' => $valuessg->sales_group_name, 
                                            'subarray'=>$subresult
                
                                        );   
                                        
                       
                        $i++;

                     }
                     
                     //echo "<pre>";print_r($array);
                     //exit;
                  

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_customer_balance_report_export()
    {

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $customer_id=$_GET['customer_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $payment_mode=$_GET['payment_mode'];
                     $sales_group=$_GET['sales_group'];
                     
                    
                 
                    
                     $stat=' ';
                     $userslog="";
                    $usersgroup="";
                    if($cateid!='ALL')
                    {
                         $userslog.=' AND b.sales_team_id="'.$cateid.'"';       
                    } 
                    
                    
                    if($customer_id!='0')
                    {
                         $userslog.=' AND b.id="'.$customer_id.'"';       
                    } 
                    
                    
                    if($sales_group!='ALL')
                    {
                         $usersgroup=' AND ss.id="'.$sales_group.'"';       
                    } 
                      
                      
                   
                  
                    
                    if($this->session->userdata['logged_in']['access']=='17')
                    {
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_head=$values->define_saleshd_id;
                              
                          }
                          
                          $userslog.=' AND b.sales_team_id="'.$sales_team_head.'"';        
                                 
                    }
                     
                    
                  
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  b.sales_team_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                   
                    
                     
                     $result=$this->db->query("SELECT ss.id as sales_group_id,ss.name as sales_group_name,b.id,b.locality,b.feedback_details,b.phone,SUM(a.debits) as debits,SUM(a.credits) as credits,b.opening_balance,b.company_name,b.payment_status  FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  JOIN sales_group as ss ON b.sales_group=ss.id WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0   AND a.party_type='1' AND b.sales_group!=''  $stat $userslog $usersgroup $searchsql GROUP BY ss.id  ORDER BY ss.name ASC");
                     $result=$result->result();
                    
                   
                   
                     
                 
                        $filename='Customer_balance_report_'.$formdate.'_TO_'.$todate; 
                        header("Content-Type: application/xls");    
                        header("Content-Disposition: attachment; filename=$filename.xls");  
                        header("Pragma: no-cache"); 
                        header("Expires: 0");
                     
                        ?>
                        


                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                             <thead>
                                 
                                 
                                  <tr><th colspan="16"><h3>Customer Balance Report <?php echo $formdate; ?> To <?php echo $todate; ?></h3></th></tr>
                                  
                                  <?php
                                  if($cateid!='ALL')
                                   {
                                       
                                       
                                       $sales_person_name="";
                                       $sales_person_phone="";
                                       $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$cateid."'");
                                       $resultsales_team=$query->result();
                                       foreach ($resultsales_team as  $values) {
                                          
                                           $sales_person_name=$values->name;
                                           $sales_person_phone=$values->phone;
                                          
                                       }
                                      

                                  ?>
                                   <tr><th colspan="16"><h3>Sales Person : <?php echo $sales_person_name; ?></h3></th></tr>
                                   <tr><th colspan="16"> <h3><?php echo $sales_person_phone; ?></h3></th></tr>
                                  <?php
                                   }
                                  ?>
    
                              
                             </thead> 
                             
                        </table>
                        
                    
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;background: #dfdfdf;">

                          <th>No</th>
                          <th >Customer_Name</th>
                          <th >Area</th>
                          <th >Open Dr</th>
                          <th >Open Cr</th>
                          <th >Open Bal</th>
                          <th >Tran Dr</th>
                          <th >Tot Dr</th>
                          <th >Tran Cr</th>
                          <th >Tot Cr</th>
                          <th >Debit</th>
                          <th >Credit</th>
                          <th >Closing</th>
                          <th >Sheet_in_Factory</th>
                          <th >Transit</th>
                          <th >Net_Balance</th>
                          <th >Remarks</th>
                          <th >Phone No</th>
                         
            
                        </tr>
                      </thead>
                        <tbody>
                        
                        <?php
                     
                     $i=1;
                     $array=array();
                          
                          $debitstotal=0;
                          $total_transittotal=0;
                          $total_total=0;
                          $total_credits=0;
                          $debitsopening_balance=0;
                          $ttToatbalance=0;
                        
                        
                         foreach ($result as  $valuessg)
                        {
                       
                           ?>
                            <tr  class="trpoint">
                          
                           <td><?php echo $i; ?></td>
                           <td><b><?php echo $valuessg->sales_group_name; ?></b></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           
                           
                           <td></td>
                           <td></td>
                           <td></td>
                           
                           
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                        </tr>
                           
                           <?php
                       
                                     $resultsubdata=$this->db->query("SELECT b.id,b.sales_group,b.locality,b.feedback_details,b.phone,SUM(a.debits) as debits,SUM(a.credits) as credits,b.opening_balance,b.company_name,b.payment_status  FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id   WHERE   a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.party_type='1' AND b.sales_group!=''  $stat $userslog $searchsql2 GROUP BY a.customer_id ORDER BY b.company_name ASC");
                                     $resultsubdata=$resultsubdata->result();
                                     $subresult=array();
                                     
                                     $debitssettotal=0;
                                     $creditssettotal=0;
                                     $closeingtotal=0;
                                     
                                     $sheet_in_factory_val=0;
                                     $transit=0;
                                     $balancetoatal=0;
                                     
                                     $Tran_Dr=0;
                                     $Tran_Cr=0;
                                     $Tot_Dr=0;
                                     $Tot_Cr=0;
                                     $Open_Dr=0;
                                     $Open_Cr=0;
                                     $Open_Bal=0;
                                     
                                     foreach ($resultsubdata as  $value){
                                         
                                          $sales_group=$value->sales_group;
                                          $sales_group=explode('|', $sales_group);
                                         if(in_array($valuessg->sales_group_id, $sales_group))
                                         {
                                         
                                         
                                                              $route_name="";
                                                              $result_account_head=$this->db->query("SELECT r.name FROM locality as a JOIN route as r ON a.route_id=r.id WHERE  a.id='".$value->locality."'");
                                                              $result_account_head_text=$result_account_head->result();
                                                              
                                                              foreach($result_account_head_text as $ass)
                                                              {
                                                                                        $route_name=$ass->name;
                                                                                       
                                                             }
                                                                
                                                               
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$value->id."' AND b.assign_status IN ('11','12','1')  AND a.return_status=0  ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total+=round($val->qty*$val->rate,2);
                                                     
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM sales_return_products as a JOIN order_sales_return_complaints as b  ON a.c_id=b.id WHERE b.deleteid=0 AND b.customer='".$value->id."' ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total_return=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total_return+=round($val->qty*$val->rate,2);
                                                     
                                                                 }
                            
                                                               
                                                               
                                                               
                                                               
                                                                 $resultsub=$this->db->query("SELECT a.qty,a.rate FROM sales_return_products as a JOIN order_sales_return_complaints as b  ON a.c_id=b.id WHERE b.deleteid=0 AND b.customer='".$value->id."' ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total_return=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total_return+=round($val->qty*$val->rate,2);
                                                     
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                  $resultsub=$this->db->query("SELECT a.qty,a.rate FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$value->id."' AND b.assign_status IN ('2')  AND a.return_status=0  ORDER BY a.id DESC");
                                                                 $resultsub=$resultsub->result();
                                                                 $total_transit=0;
                                                                 foreach($resultsub as $val)
                                                                 { 
                                                                   
                                                                  
                                                                             $total_transit+=round($val->qty*$val->rate,2);
                                                     
                                                                }
                            

                                   
                                            $opening_balance=0;
                                            $resultDRss=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date < '".$formdate."'  AND a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                            $resultDRss=$resultDRss->result();
                                             
                                             
                                             
                                             
                                            $resultDRsscurrentdate=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no='Opening Balance'  AND a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                            $resultDRsscurrentdate=$resultDRsscurrentdate->result(); 
                                            $Checkres=$resultDRsscurrentdate[0]->debits+$resultDRsscurrentdate[0]->credits;
                                             
                                             
                                             if($Checkres>0)
                                            {
                                                 
                                                    foreach($resultDRsscurrentdate as $valdss)
                                                    { 
                                                       $opening_balance_val=$valdss->credits-$valdss->debits;
                                                       $opening_balance=str_replace('-', '', $opening_balance_val);
                                                    }
                                                 
                                             }
                                             else
                                             {
                                                 
                                                   foreach($resultDRss as $valdss)
                                                    { 
                                                       $opening_balance_val=$valdss->credits-$valdss->debits;
                                                       $opening_balance=str_replace('-', '', $opening_balance_val);
                                                    }
                                                 
                                             }
                                         
                                    
                                    
                                          
                                            $payment_status="";
                                            $opening_balance_cr=0;
                                            $opening_balance_dr=0;
                                            if($opening_balance_val>0)
                                            {
                                                $payment_status='CR';
                                                $opening_balance_cr=$opening_balance;
                                            }
                                             else
                                            {
                                               $payment_status='DR';  
                                               $opening_balance_dr=$opening_balance;
                                            }
                               
                                             
                                     
                                     
                                      
                         
                                         
                                          
                                         
                                          
                                        
                                          
                                          $sheet_in_factory=round($total+$total_return,2);
                                          
                                          
                                          
                                          
                                         
                                         $resultDR=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.deleteid=0 AND a.party_type='1' AND a.order_no!='Opening Balance'  AND a.customer_id='".$value->id."'");
                                         $resultDR=$resultDR->result();
                                         
                                         foreach($resultDR as $vald)
                                         { 
                                             $trnDr=$vald->debits;
                                             $trnCr=$vald->credits;
                                         }
                                         
                                         
                                           $resultoverall=$this->db->query("SELECT SUM(a.debits) as debits,SUM(a.credits) as credits FROM all_ledgers as a   WHERE   a.deleteid=0 AND a.party_type='1'   AND a.customer_id='".$value->id."'");
                                         $resultoverall=$resultoverall->result();
                                         
                                         foreach($resultoverall as $valdoo)
                                         { 
                                             $overallDr=$valdoo->debits;
                                             $overallCr=$valdoo->credits;
                                             $overallresult=$overallCr-$overallDr;
                                         }
                                         
                                         
                                         
                                         
                                          $creditsset=0;
                                          $debitsset=0;
                                          $Toatbalance=0;
                                          $closeing=0;
                                          $Total_trn_dr=0;
                                          $Total_trn_cr=0;
                                          $payment_status_bu_closeing="";
                                          
                                          $TotalDr=$opening_balance_dr;
                                          $TotalCr=$opening_balance_cr;
                                          $totbalance=  $trnCr-$trnDr;
                                          
                                          $Total_trn_dr=$opening_balance_dr+$trnDr;
                                          $Total_trn_cr=$opening_balance_cr+$trnCr;
                                          
                                           if($Total_trn_dr<$Total_trn_cr)
                                          {
                                              $creditsset=$Total_trn_dr-$Total_trn_cr;
                                              $creditsset=str_replace('-', '', $creditsset);
                                              $payment_status_bu_closeing='CR';
                                              $closeing= $creditsset;
                                              
                                          }
                                          else
                                          {
                                              
                                              $debitsset=$Total_trn_cr-$Total_trn_dr;   
                                              $debitsset=str_replace('-', '', $debitsset);
                                              $payment_status_bu_closeing='DR';
                                              $closeing= $debitsset;
                                              
                                          }
                                          
                                          
                                          
                                          
                                         
                                         
                                             
                                         if($payment_status_bu_closeing=='DR')
                                         {
                                             $Totaltranspot= $sheet_in_factory-$total_transit;
                                             $Totaltranspotval= $closeing-$Totaltranspot;
                                             $Totaltranspotval=str_replace('-', '', $Totaltranspotval);
                                             
                                             if($closeing<$Totaltranspot)
                                             {
                                                 $getstatus=1;
                                             }
                                             else
                                             {
                                                 $getstatus=0;
                                             }
                                             
                                             
                                             
                                             
                                         }
                                          if($payment_status_bu_closeing=='CR')
                                         {
                                             
                                             $Totaltranspot= $sheet_in_factory+$total_transit;
                                             $Totaltranspotval= $closeing+$Totaltranspot;
                                             $getstatus=1;
                                             
                                             
                                         }
                                         
                                         
                                          
                                         
                                         $debitssettotal+=$debitsset;
                                         $creditssettotal+=$creditsset;
                                         $closeingtotal+=$closeing;
                                         
                                           $sheet_in_factory_val+=round($total+$total_return,2);
                                         $transit+=round($total_transit,2);
                                         $balancetoatal+=round($Totaltranspotval,2);
                                         
                                         $Tran_Dr+=round($trnDr,2);
                                         $Tran_Cr+=round($trnCr,2);
                                         
                                         
                                         $Tot_Dr+=round($Total_trn_dr,2);
                                         $Tot_Cr+=round($Total_trn_cr,2);
                                         
                                         
                                         $Open_Dr+=round($opening_balance_dr,2);
                                         $Open_Cr+=round($opening_balance_cr,2);
                                         $Open_Bal+=round($opening_balance,2);
                                         
                                         
                                          
                                     ?>
                                     
                                     
                                        <tr  class="trpoint">
                          
                                           <td></td>
                                           <td><?php echo $value->company_name; ?></td>
                                           <td><?php echo $route_name; ?></td>
                                           <td>
                                               
                                                <?php if($opening_balance_dr!=0) {
                                                ?>
                                                <?php echo round($opening_balance_dr,2) ?>
                                                <?php
                                                } ?>
                                               
                                               
                                               
                                               </td>
                                           <td>
                                               
                                                <?php if($opening_balance_cr!=0) {
                                                ?>
                                                <?php echo round($opening_balance_cr,2) ?>
                                                <?php
                                                } ?>
                                              
                                               
                                               
                                               </td>
                                           <td>
                                               
                                               <?php if($opening_balance!=0) {
                                                ?>
                                                  <?php echo round($opening_balance); ?> <?php echo $payment_status; ?>
                                                <?php
                                                } ?>
                                              
                                             
                                               
                                               
                                               </td>
                                           <td>
                                               
                                                <?php if($trnDr!=0) 
                                                {
                                                   echo  round($trnDr,2); 
                                                }
                                                ?>
                                              
                                               
                                               
                                               </td>
                                           <td>
                                               <?php 
                                                 $toDr=  round($Total_trn_dr); 
                                                 if($toDr!=0) 
                                                 {
                                                    
                                                     echo  $toDr;
                                                
                                                 } 
                                                 ?>
                                             
                                               
                                               </td>
                                           <td>
                                               <?php if($trnCr!=0) 
                                                {
                                                   echo  round($trnCr,2); 
                                                }
                                                ?>
                                               
                                              </td>
                                           <td>
                                                <?php 
                                                 $toCr=  round($Total_trn_cr); 
                                                 if($toCr!=0) 
                                                 {
                                                    
                                                     echo  $toCr;
                                                
                                                 } 
                                                 ?>
                                             
                                               
                                            </td>
                                           <td>
                                                <?php if($debitsset!=0) 
                                                {
                                                   echo  round($debitsset,2); 
                                                }
                                                ?>
                                              
                                               
                                               </td>
                                           <td>
                                                 <?php 
                                                 if($creditsset!=0) 
                                                {
                                                   echo  round($creditsset,2); 
                                                }
                                                ?>
                                              
                                               
                                               </td>
                                          
                                           <td>
                                                 <?php
                                                 if($closeing!=0) 
                                                 {
                                                     
                                                     ?>
                                                     <?php echo  round($closeing,2); ?> <?php echo $payment_status_bu_closeing; ?>
                                               
                                                     <?php
                                                   
                                                 }
                                                ?>
                                              
                                               
                                               
                                               </td>
                                           <td>
                                               
                                               <?php 
                                                 $tottr=  round($total+$total_return); 
                                                 if($tottr!=0) 
                                                 {
                                                    
                                                     echo  $tottr;
                                                
                                                 } 
                                                 ?>
                                              
                                               
                                               </td>
                                           <td>
                                               <?php 
                                                 if($total_transit!=0) 
                                                {
                                                   echo  round($total_transit,2); 
                                                }
                                                ?>
                                              
                                               
                                               </td>
                                           <td>
                                               <?php 
                                                 if($Totaltranspotval!=0) 
                                                {
                                                   echo  round($Totaltranspotval,2); 
                                                }
                                                ?>
                                              
                                               
                                               </td>
                                           <td><?php echo $value->feedback_details; ?></td>
                                           <td>
                                                <?php 
                                                if($value->phone!=0) 
                                                {
                                                   echo  $value->phone; 
                                                }
                                                ?>
                                              
                                               </td>
                                        </tr>
                                     
                                     
                                     <?php
                                     
                                         }
                                          
                                          
                                     }
                      
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                         $totalcloseing= round($debitssettotal-$creditssettotal,2);
                         $totalcloseing=str_replace('-', '', $totalcloseing);
                        ?>
                        
                        
                         <tr  class="trpoint">
                             
                              <td></td>
                           <td></td>
                           <td></td>
                          
                           <td>
                               
                                <?php if($Open_Dr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Open_Dr,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                           <td>
                               
                                <?php if($Open_Cr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Open_Cr,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                           <td>
                               
                                  <?php if($Open_Bal!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Open_Bal,2); ?></b>
                                <?php
                                } ?>
                                
                           </td>
                           <td>
                                <?php if($Tran_Dr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Tran_Dr,2); ?></b>
                                <?php
                                } ?>
                                
                               
                           </td>
                           <td>
                                <?php if($Tot_Dr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Tot_Dr,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                           <td>
                               <?php if($Tran_Cr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Tran_Cr,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                           <td>
                               <?php if($Tot_Cr!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Tot_Cr,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                          
                           
                           
                           <td>
                                <?php if($debitssettotal!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($debitssettotal,2); ?></b>
                                <?php
                                } ?>
                               
                               </td>
                           <td>
                               
                                 <?php if($creditssettotal!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($creditssettotal,2); ?></b>
                                <?php
                                } ?>
                              
                               
                               </td>
                           <td>
                              
                               <?php if($totalcloseing!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($totalcloseing,2); ?></b>
                                <?php
                                } ?>
                               </td>
                           
                           
                           <td>
                               <?php if($sheet_in_factory_val!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($sheet_in_factory_val,2); ?></b>
                                <?php
                                } ?>
                               
                           </td>
                           <td>
                                <?php if($Transit!=0) {
                                ?>
                                <b style="color:#ff5e14;font-weight:800;"><?php echo round($Transit,2); ?></b>
                                <?php
                                } ?>
                           </td>
                           <td></td>
                            <td></td>
                           <td></td>
                        </tr>
                        
                        
                        
                     
                        <?php
                        
                       
                        


                        $i++;

                     }

                        ?>
                           
                           
                      </tbody>
                    </table>
                 
                    <?php

                
                

    }
    
    
    
    public function fetch_data_sales_balance_report_export()
    {


           
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                   
                      $payment_mode=$_GET['payment_mode'];
                     
                     $stat=' ';
                     
                     if($payment_mode!='undefined') 
                     {   
                         if($payment_mode!='ALL') 
                         {
                             $stat.=' AND a.payment_mode="'.$payment_mode.'"';
                         }
                         
                         
                     }
                     
                     if($order_status=='undefined') 
                     {
                         
                     
                      $stat.=' AND a.finance_status IN ("3","4")';
                      
                      $stat.=' AND a.assign_status IN ("1","2","3","11","12")';
                      
                     }
                     else
                     {
                         
                         if($order_status=='ALL')
                         {
                              $stat.=' AND a.finance_status IN ("3","4")';
                              $stat.=' AND a.assign_status IN ("1","2","3","11","12")';
                         }
                         else
                         {
                             
                              $order_status=explode(',', $order_status);
                              $order_status=implode("','", $order_status);
                              $stat.=' AND a.finance_status IN ("3","4")';
                              $stat.=" AND a.assign_status IN ('$order_status')";
                            
                             
                         }
                        
                     }
                     
                     
                     
                     $userslog="";
                  
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                              $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                         $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                      if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                     
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                       
                     }
                    
                     $result=$result->result();
                     
                     
                     
                 
                     
                     
                     $i=1;
                    
                 
                  
                   
                  
                         $filename='Sales_order_balance_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Sales Balance Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Customer Name</th>
                          <th>Bill Amount</th>
                          <th>Collection</th>
                          <th>Pending Amount</th>
                          <th>Status</th>
                          <th>Payment Mode</th>
                          <!--<th>Payment Status</th>-->
                         
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                                   $pending_amounttotal=0;
                                                   $collectamounttotal=0;
                                      $overalltotal=0;
                                     foreach ($result as  $value) {
                                         
                                         
                                             $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                                             $resultsub=$resultsub->result();
                                             $total=0;
                                             foreach($resultsub as $val)
                                             { 
                                               
                                              
                                                         $total+=round($val->qty*$val->rate,2);
                                 
                                            }
                                            
                                            
                                              $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                                            
                                            
                                             
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                         
                                    }
                                   
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$value->sales_head."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                         
                                         
                                                                         $status="Order Completed";
                                                 if($value->assign_status=='11')
                                                 {
                                                     $status='UN Dispatched / Sheet In Factory';
                                                 }
                                                 
                                                 if($value->assign_status=='12')
                                                 {
                                                     $status='Driver UN-Picked';
                                                 }
                                                 
                                                 if($value->assign_status=='1')
                                                 {
                                                     $status='Trip Not Started';
                                                 }
                                                 
                                                 
                                                 if($value->assign_status=='2')
                                                 {
                                                     $status='Trip Started & Un-Delivered';
                                                 }
                                                 
                                                 if($value->assign_status=='3' && $value->finance_status=='4')
                                                 {
                                                     $status='Delivered & Pending collection';
                                                 }
                                                 
                                                 if($value->assign_status=='3' && $value->finance_status=='4')
                                                 {
                                                    $payment_status='Pending';
                                                 }
                                                 else
                                                 {
                                                     $payment_status='Pending';
                                                 }
                                                                         
                                                 $overalltotal+=$total;
                                                 
                                                 
                                                  $overalltotal+=$total;
                                                   $pending_amounttotal+=$value->pending_amount;
                                                   $collectamounttotal+=$value->collectamount;
                            
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->company_name; ?></td>
                                          
                                          <td><?php echo $total; ?></td>
                                          
                                          <td><?php echo $value->collectamount; ?></td>
                                          <td><?php echo $value->pending_amount; ?></td>
                                          
                                          <td><?php echo $status; ?></td>
                                          <td><?php echo $value->payment_mode; ?></td>
                                          <!--<td><?php echo $payment_status; ?></td>-->
                                         
                          
                                            
                                        </tr>
                                        <?php
                                        
                                        
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                                
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><b><?php echo  round($overalltotal,2); ?></b></td>
                                          <td><b><?php echo  round($collectamounttotal,2); ?></b></td>
                                          <td><b><?php echo  round($pending_amounttotal,2); ?></b></td>
                                          <td></td>
                     
                      
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
    
     public function fetch_data_sales_team_report_export()
    {









  
           
                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                    $stat="";
                    
                      $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }
                     
                     
                    if(isset($_GET['sales_group']))
                    {
                         if($_GET['sales_group']!='ALL') 
                         {
                              $stat.=' AND b.sales_team_id="'.$_GET['sales_group'].'"';
                         } 
                         else
                         {
                             $stat.='';
                         }
                        
                       
                    }
                    
                    
                    
                    
                    
                    
                    $userslog="";
                   
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                     if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                   
                    
                    
                    
                    
                    
                    
                    
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                                 
                       $result=$this->db->query("SELECT a.*,SUM(c.qty*c.rate) as total,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  JOIN order_product_list_process as c ON a.id=c.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY b.sales_team_id ORDER BY a.id DESC");
                  
                     }
                     else
                     {
                         
                              
                     $result=$this->db->query("SELECT a.*,SUM(c.qty*c.rate) as total,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  JOIN order_product_list_process as c ON a.id=c.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY b.sales_team_id ORDER BY a.id DESC");
                  
                     }
                     
                    
                     $result=$result->result();
                     
                     
                     
                 
                     
                     
                     $i=1;
                    
                 
                  
                   
                  
                         $filename='Sales_Team_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="5">Sales Team Target  Sheet <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th>No</th>
                          <th>Sales Team</th>
                          <th>Traget</th>
                          <th>Net Amount</th>
                          <th>Difference</th>
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                      $overalltotal=0;
                                     foreach ($result as  $value) {
                                         
                                         
                                            
                                            
                                        $minisroundoff= $value->roundoff;
                                        $roundoffstatus= $value->roundoffstatus;
                                        $discount= $value->discount;
        
        
                                        if($roundoffstatus==1)
                                         {
                                             $total=$value->total-$discount+$minisroundoff;
                                         }
                                         else
                                         {
                                             $total=$value->total-$discount-$minisroundoff;
                                         }
                                                    
                                            
                                             
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name,target,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                               $define_saleshd_id=$val->define_saleshd_id;
                                               $target=$val->target;
                         
                                    }
                                   
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$define_saleshd_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                         
                                         
                                       $achieved= $target-$total;
                        
                        
                        if($achieved>0)
                        {
                            $getstatus=0;
                        }
                        else
                        {
                            $getstatus=1;
                        }
                        
                        
                    
                            
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          
                                          <td><?php echo $sales_team; ?></td>
                                         
                                          <td><?php echo $target; ?></td>
                                          <td><?php echo $total; ?></td>
                                          <td><?php echo $achieved; ?></td>
                          
                                            
                                        </tr>
                                        <?php
                                        
                                        
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                                
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
        public function fetch_data_sales_report_export()
    {









  
           
                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                    $stat="";
                     if($order_status!='ALL') 
                     {
                          $stat=' AND a.finance_status="'.$order_status.'"';
                     }   
                     if(isset($_GET['sales_group']))
                    {
                        if($_GET['sales_group']!='ALL') 
                         {
                              $stat.=' AND sg.sales_group_id="'.$_GET['sales_group'].'"';
                         } 
                         else
                         {
                             $stat.='';
                         }
                    }
                    
                    
                    
                    
                    
                    
                    
                    $userslog="";
                   
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                                 
                         $userslog.=' AND a.entry_user_id="'.$this->userid.'"';        
                                 
                    }
                    
                     if($this->session->userdata['logged_in']['access']=='20')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                         $sales_team_id = array($this->userid);
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  sg.sales_group_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY a.id ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id JOIN sales_member_group as sg ON b.sales_team_id=sg.sales_member_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog GROUP BY a.id ORDER BY a.id DESC");
                    
                     }
                     
                    
                       $result=$result->result();
                     
                     
                     
                 
                     
                     
                     $i=1;
                    
                 
                  
                   
                  
                         $filename='Sales_Group_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                        header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Sales Day Book <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th> No</th>
                          <th>Date</th>
                          <th>Invoice No</th>
                          <th>Customer Name</th>
                          <th>Net Amount</th>
                          <!--<th>GST</th>
                          <th>Gross</th>-->
                          <th>Sales Group</th>
                          <th>Sales Head</th>
                          <th>Sales Team</th>
                          <th>Status</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                      $overalltotal=0;
                                     foreach ($result as  $value) {
                                         
                                         
                                             $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                                             $resultsub=$resultsub->result();
                                             $total=0;
                                             foreach($resultsub as $val)
                                             { 
                                               
                                              
                                                         $total+=round($val->qty*$val->rate,2);
                                 
                                            }
                                            
                                            
                                        $minisroundoff= $value->roundoff;
                                        $roundoffstatus= $value->roundoffstatus;
                                        $discount= $value->discount;
        
        
                                        if($roundoffstatus==1)
                                         {
                                             $total=$total-$discount+$minisroundoff;
                                         }
                                         else
                                         {
                                             $total=$total-$discount-$minisroundoff;
                                         }
                                                    
                                            
                                             
                                     $sales_group_data=explode('|', $value->sales_group);
                                        

                                     $sales_group_name=array();
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id IN ('".implode("','", $sales_group_data)."') ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group_name[]=$val->name;
                         
                                    }
                                    $sales_group=implode(",", $sales_group_name);
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                                     $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                               $define_saleshd_id=$val->define_saleshd_id;
                         
                                    }
                                   
                                           $define_saleshd_id=explode('|', $define_saleshd_id);
                                    
                                             $sales_head_name=array();
                                             $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id IN ('".implode("','", $define_saleshd_id)."') ORDER BY id DESC");
                                             $sales_group_ss=$sales_group_s->result();
                                            
                                             foreach($sales_group_ss as $val)
                                             { 
                                               
                                              
                                                     $sales_head_name[]=$val->name;
                                 
                                            }
                                            
                                             $sales_head=implode(",", $sales_head_name);
                                         
                                         
                                                 $status="Order Completed";
                                                 if($value->finance_status=='3')
                                                 {
                                                     $status='Finance Approved';
                                                 }
                                                 if($value->finance_status=='4')
                                                 {
                                                     $status='Delivered';
                                                 }
                                                 if($value->finance_status=='5')
                                                 {
                                                     $status='Reconciliation Completed';
                                                 }
                                                 
                                                 $overalltotal+=$total;
                            
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->company_name; ?></td>
                                          <td><?php echo $total; ?></td>
                                         <!-- <td>18 %</td>
                                          <td><?php echo $total; ?></td>-->
                                          <td><?php echo $sales_group; ?></td>
                                          <td><?php echo $sales_head; ?></td>
                                          <td><?php echo $sales_team; ?></td>
                                          
                                          <td><?php echo $status; ?></td>
                                          
                                       
                          
                                            
                                        </tr>
                                        <?php
                                        
                                        
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                                
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><b><?php echo  round($overalltotal,2); ?></b></td>
                                          <td></td>
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function productlist()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                      
                      
                      $cate_id= $form_data->cate_id;
                
                     if($cate_id!=0)
                     {
                         
                     
                     $resultpending= $this->Main_model->where_names_two_order_by('product_list','deleteid',0,'categories_id',$cate_id,'product_name','ASC');
                     
                     foreach ($resultpending as  $value) {
                         
                           
                            $array[] = array(
                                'id'=>trim($value->id),
                                'product_name'=>$value->product_name
                               );
                         
                            


                     }
                     
                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_all_base_by()
    {

                    
                    $accountshead=0;
                    if(isset($_GET['accountshead']))
                    {
                         $accountshead=$_GET['accountshead'];
                     
                    }
                   
                     
                     
                     $qq="";
                     $St="";
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }
                     
                     if($accountshead=='116')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }
                     
                     if($accountshead=='119')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $party_type=$_GET['party_type'];
                     
                     
                     if($accountshead==107 || $accountshead==106 || $accountshead==105)
                     {
                         //$party_type=4;
                         
                     }
                     
                     
                     
                     $Stl="";
                     if(isset($_GET['payment_status']))
                     {
                              $payment_status=$_GET['payment_status'];
                              
                              if($payment_status!='')
                              {
                                      if($payment_status=='1')
                                      {
                                          //$Stl=' AND account_head_id IN ("105","106","107")';
                                          
                                          
                                          $banksteup1=" AND payment_mode='Cash' AND bank_id IN ('25','24') ";
                                          
                                      }
                                      else
                                      {
                                        // $Stl=' AND account_head_id  NOT IN ("105","106","107")';
                                         $banksteup1=" AND bank_id NOT IN ('0','25','24')";
                                      } 
                                  
                              }
                              
                         
                         
                     }
                     
                     
                     
                   
                    
                                  if($party_type=='All')
                                  {
                                      $St=' ';
                                  }
                                  else
                                  {
                                      $St=' AND party_type='.$party_type;
                                  }
                          
                         
                            if($accountshead!='0')
                            {
                                
                                
                                
                                
                               
                                 $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE  `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND  deleteid=0 $banksteup1  $St $qq $Stl ORDER BY payment_date ASC");
                                 
                                
                                
                            }
                            else
                            {
                               
                                 $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $banksteup1 $St $qq $Stl ORDER BY id DESC");
                                
                                
                                 
                                
                            }
                              
                             
                            $result4=$result4->result();
                           
                          
                     
                     $array3=array();
                     $array5=array();
                      
                    
                 
                     
                         
                     $l=1;
                     foreach ($result4 as  $value)
                     {
                       
                       
                            $account_head_idname="";
                            
                            
                              $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_head_id."'  ORDER BY sort_order ASC");
                              $result_account_head_text=$result_account_head->result();
                              
                             foreach($result_account_head_text as $ass)
                             {
                                                        $account_head_idname=$ass->name;
                                                       
                             }
                             
                             
                             
                             
                             
                           
                             if($value->debits==''){ $value->debits=0; }
                             if($value->credits==''){ $value->credits=0; }
                         
                            if($value->party_type==1)
                            {
                                $table='customers';
                                $traget='customer';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");
                                        
                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                        
                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                            }
                            
                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                             if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                              $party_name="";
                             $res=$query->result();
                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }
                             
                             
                             
                            $url=$traget.'/ledger_find?'.$traget2.'='.$customer_id.'&party_type='.$value->party_type;
                            
                            
                            
                            $order_no=$value->order_no;
                             if (strpos($order_no, 'JE-') !== false) {
                                $stinc= '1';
                            }
                            else
                            {
                                $stinc=  '0';
                            }
                                                        
                            
                            if($stinc==1)
                            {
                                $val= explode('JE-', $order_no);
                                $invoice_link=base_url().'index.php/manual_journals/invoice/'.$val[1];
                                
                            }
                            else
                            {
                                
                                $invoice_link=0;
                            }
                            
                             
                             
                           $bank_name="";
                           $bank_name_dd= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                           foreach($bank_name_dd as $bb)
                           {
                               $bank_name=$bb->bank_name;
                              
                           }
                             
                         
                              $valueset=$value->balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                             $total=str_replace('-', '', $valueset);
                         
                         
                            $array3[] = array(
                            
                            
                            'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'table'=>"all_ledgers",
                            'link' => $url,
                            'invoice_link' => $invoice_link,
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                            'balance' => $total,
                            'getstatus' => $getstatus,
                            'bank_name'=>$bank_name,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                            'accounthead'=>$account_head_idname
                        
                            

                        );


                        $l++;

                     }
                     
                     
                     
                     
                  
                     
                     
                     
                     
                  

                     echo json_encode($array3);
                     
                     
                     

    }
    
    

    
  
        public function fetch_data_get_ledger_view_all_accounts()
    {

                    
                              
                               $result2=$this->db->query("SELECT b.bank_name,b.id FROM  bankaccount as b WHERE b.deleteid=0");
                              
                                
                              
                               
                               $result2=$result2->result();
                              
                                  
                        
                     
                 
                     
                     
                     $i=1;
                 
                     $array1=array();
                    
                      
                        
                     
                     
                     
                         $j=$i;
                         foreach ($result2 as  $value) {
                       
                         
                         
                         
                                      $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");
                                         $resultcheck=$result_balance->result(); 
                                       foreach ($resultcheck as  $valuess) {
                                           
                                           $total_debit=$valuess->total_debit;
                                           $total_credit=$valuess->total_credit;
                                       }
                         
                         
                                        $array1[] = array(
                                            
                                            
                                            'no' => $i, 
                                            'id' => $value->id, 
                                            'name' => $value->bank_name, 
                                            'total_debit'  => $total_debit, 
                                            'total_credit' => $total_credit, 
                                            'balance' => round($total_credit-$total_debit,2),
                                            'ss' => base_url().'index.php/bankaccount/statement?bank_id='.$value->id.'&name='.$value->bank_name,
                                        
                                            
                
                                        );


                        $j++;

                     }
                     
                     
                     
                 

                     echo json_encode($array1);

    }
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_total_all_by_base()
    {

                    
                    $accountshead=0;
                    if(isset($_GET['accountshead']))
                    {
                         $accountshead=$_GET['accountshead'];
                     
                    }
                     
                     $qq="";
                     $St="";
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }
                     
                     
                             $limit=$_GET['limit'];
                             $formdate=$_GET['formdate'];
                             $party_type=$_GET['party_type'];
                             $todate=$_GET['todate'];
                                    
                                     
                                  
                          
                         
                         
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0  $St $qq ORDER BY id DESC");
                              $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq ORDER BY id DESC");
                              $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq ORDER BY id DESC");
                              $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0  $St $qq ORDER BY id DESC");
                             
                             
                         
                               
                                  
                                  
                                  
                                  if($party_type=='All')
                                  {
                                                          
                                                        
                                                          $result3=$result3->result(); 
                                                          $result2=$result2->result(); 
                                                          $result1=$result1->result();
                                                          $result=$result->result();
                                      
                                  }
                                  else
                                  {
                                      
                                                  if($party_type=='Customer')
                                                  {
                                                        $result=$result->result();
                                                  }
                                                  else
                                                  {
                                                      $result=array();
                                                  }
                                                  
                                                  if($party_type=='Vendor')
                                                  {
                                                       $result2=$result2->result(); 
                                                  }
                                                  else
                                                  {
                                                       $result2=array();
                                                  }
                                                  
                                                   if($party_type=='Driver')
                                                  {
                                                       $result1=$result1->result();
                                                  }
                                                  else
                                                  {
                                                      $result1=array();
                                                  }
                                                  
                                                   if($party_type=='Employee')
                                                  {
                                                        $result3=$result3->result(); 
                                                  }
                                                  else
                                                  {
                                                       $result3=$result3->result(); 
                                                  }
                                    
                                      
                                  }
                          
                         
                       
                
                 
                     
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                     $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     $totalpayment4=0;
                    
                      
                     foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                     }
                     
                    
                     
                     
                     
                     foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                     }
                     
                     
                      foreach ($result2 as  $value2) {
                          
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                     }
                     
                     
                       foreach ($result3 as  $value3) {
                          
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                     }
                     
                     
                     
                     
                     
                    $output=array('totaldebit'=>$totaldebit+$totaldebit1+$totaldebit2+$totaldebit3,'totalcridit'=>$totalcridit+$totalcridit1+$totalcridit2+$totalcridit3,'totalblance'=>0,'totalpaid'=>0,'outstanding'=>0);

                    echo json_encode($output);

    }
    
    
    
    
    
        public function fetch_data_get_ledger_view_total_all()
    {

                    
                      $customer_id=$_GET['customer_id'];
                     
                     $qq="";
                      $St="";
                     if($customer_id!='0')
                     {
                         $qq=' AND customer_id='.$customer_id;
                     }
                     
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $party_type=$_GET['party_type'];
                     $payment_status=$_GET['payment_status'];
                     
                     
                    
                             $todate=$_GET['todate'];
                             $payment_status=$_GET['payment_status'];
                          
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                          
                          
                          
                         
                         
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0'  $St $qq ORDER BY id DESC");
                              $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                              $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                              $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                              $result4=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND payment_mode='Cash'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                             
                             
                         
                               
                                  $result4=$result4->result();
                                  
                                  
                                  
                                  
                                  if($party_type=='All')
                                  {
                                      
                                                          $result3=$result3->result(); 
                                                          $result2=$result2->result(); 
                                                          $result1=$result1->result();
                                                          $result=$result->result();
                                      
                                  }
                                  else
                                  {
                                      
                                                  if($party_type=='Customer')
                                                  {
                                                        $result=$result->result();
                                                  }
                                                  else
                                                  {
                                                      $result=array();
                                                  }
                                                  
                                                  if($party_type=='Vendor')
                                                  {
                                                       $result2=$result2->result(); 
                                                  }
                                                  else
                                                  {
                                                       $result2=array();
                                                  }
                                                  
                                                   if($party_type=='Driver')
                                                  {
                                                       $result1=$result1->result();
                                                  }
                                                  else
                                                  {
                                                      $result1=array();
                                                  }
                                                  
                                                   if($party_type=='Employee')
                                                  {
                                                        $result3=$result3->result(); 
                                                  }
                                                  else
                                                  {
                                                        $result3=array();
                                                  }
                                    
                                      
                                  }
                          
                         
                       
                
                 
                     
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                     $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     $totalpayment4=0;
                    
                      
                     foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                     }
                     
                     foreach ($result4 as  $value4) {
                     
                     
                   
                      $totalpayment4= round($value4->totalcridit-$value4->totaldebit);
                    
                      
                     }
                     
                     
                     
                     
                     foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                     }
                     
                     
                      foreach ($result2 as  $value2) {
                          
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                     }
                     
                     
                       foreach ($result3 as  $value3) {
                          
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                     }
                     
                     
                     
                     
                     
                    $output=array('totalpayment'=>$totalpayment4,'totaldebit'=>$totaldebit+$totaldebit1+$totaldebit2+$totaldebit3,'totalcridit'=>$totalcridit+$totalcridit1+$totalcridit2+$totalcridit3,'totalblance'=>0,'totalpaid'=>0,'outstanding'=>0);

                    echo json_encode($output);

    }
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_export_all()
    {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                       $payment_status=$_GET['payment_status'];
                       
                       
                         $qq="";
                          $St="";
                     if($customer_id!='0')
                     {
                         $qq=' AND customer_id='.$customer_id;
                     }
                     
                       $party_type=$_GET['party_type'];
                     
                        $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                        
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                          
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                            
                            
                             $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                            
                             $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                             $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                         
                         
                         
                         
                                   if($party_type=='All')
                                  {
                                      
                                                      $result=$result->result();
                                                      $result2=$result2->result();
                                                      $result3=$result3->result();
                                                      $result4=$result4->result();
                                      
                                  }
                                  else
                                  {
                                      
                                                  if($party_type=='Customer')
                                                  {
                                                        $result=$result->result();
                                                  }
                                                  else
                                                  {
                                                      $result=array();
                                                  }
                                                  
                                                  if($party_type=='Vendor')
                                                  {
                                                       $result3=$result3->result(); 
                                                  }
                                                  else
                                                  {
                                                      $result3=array();
                                                  }
                                                  
                                                   if($party_type=='Driver')
                                                  {
                                                       $result2=$result2->result();
                                                  }
                                                  else
                                                  {
                                                      $result2=array();
                                                  }
                                                  
                                                   if($party_type=='Employee')
                                                  {
                                                        $result4=$result4->result(); 
                                                  }
                                                  else
                                                  {
                                                      $result4=array();
                                                  }
                                    
                                      
                                  }
                         
                   
                     
                     
                 
                     
                     
                     $i=1;
                     $array=array();
                     $array1=array();
                     $array2=array();
                     $array3=array();
                      
                     foreach ($result as  $value) {
                       
                           $party= $this->Main_model->where_names('customers','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->company_name;
                               
                           }
                         
                     
                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                            'balance' => $balance,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                        
                            

                        );


                        $i++;

                     }
                     
                     
                     
                     
                     $j=$i;
                         foreach ($result2 as  $value) {
                       
                          $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Driver)';
                               
                           }
                         
                     
                        $array1[] = array(
                            
                            
                            'no' => $j, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                            'balance' => $balance,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                        
                            

                        );


                        $j++;

                     }
                     
                     
                     
                     
                     
                     $k=$j;
                         foreach ($result3 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Vendor)';
                               
                           }
                           
                     
                        $array2[] = array(
                            
                            
                            'no' => $k, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                            'balance' => $balance,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                        
                            

                        );


                        $k++;

                     }
                     
                     
                     
                         
                     $l=$k;
                         foreach ($result4 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('admin_users','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Employee)';
                               
                           }
                           
                     
                        $array3[] = array(
                            
                            
                            'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                            'balance' => $balance,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                        
                            

                        );


                        $l++;

                     }
                     
                     
                     $arrayval=array_merge($array,$array1,$array2,$array3);
                     
                     $arrayval=json_decode(json_encode($arrayval));
                    
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          
                              
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                             
                             
                              $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                             
                              $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                             
                              $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                             
                             
                         
                         
                               
                               
                                  if($party_type=='All')
                                  {
                                      
                                                          $result3=$result3->result(); 
                                                          $result2=$result2->result(); 
                                                          $result1=$result1->result();
                                                          $result=$result->result();
                                      
                                  }
                                  else
                                  {
                                      
                                                  if($party_type=='Customer')
                                                  {
                                                        $result=$result->result();
                                                  }
                                                  else
                                                  {
                                                      $result=array();
                                                  }
                                                  
                                                  if($party_type=='Vendor')
                                                  {
                                                       $result2=$result2->result(); 
                                                  }
                                                  else
                                                  {
                                                       $result2=array();
                                                  }
                                                  
                                                   if($party_type=='Driver')
                                                  {
                                                       $result1=$result1->result();
                                                  }
                                                  else
                                                  {
                                                      $result1=array();
                                                  }
                                                  
                                                   if($party_type=='Employee')
                                                  {
                                                        $result3=$result3->result(); 
                                                  }
                                                  else
                                                  {
                                                        $result3=array();
                                                  }
                                    
                                      
                                  }
                          
                         
                         
                  
                     
                     
                 
                     
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                      $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     
                     
                    
                      
                     foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                     }
                     
                     
                     foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                     }
                     
                     
                     foreach ($result2 as  $value2) {
                          
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                     }
                     
                     
                     foreach ($result3 as  $value3) {
                          
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                     }
                     
                     
                     
                     
                         $filename=date('d-m-Y').'_'.$name."_Balance_report"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  
                   ?>
                   
                      <table  id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"  style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Party Name </th>
                          <th>Reference No </th>
                          <th>Bill Amount</th>
                          
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         <th>Payment Mode</th>
                          
                         <th>Process By</th>
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                        <?php
                        foreach($arrayval as $names)
                        {
                            ?>
                            
                             <tr  class="trpoint" >
                          
                           <td><?php echo $names->no; ?></td>
                           <td><?php echo $names->payment_date; ?> </td>
                           <td><?php echo $names->party_name; ?></td>
                           <td><?php echo $names->reference_no; ?></td>
                           <td><?php echo $names->amount; ?></td>
                           
                           <td style="font-weight:800;text-align: right;"> <?php echo $names->credits; ?></td>
                           <td><?php echo $names->payment_mode; ?></td>
                           <td><?php echo $names->process_by; ?></td>
                           </tr>
                        
                            
                            <?php
                            
                            
                        }
                        
                        ?>
                       
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;"><?php echo $totaldebit+$totaldebit1+$totaldebit2+$totaldebit3; ?></td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;"><?php echo $totalcridit+$totalcridit1+$totalcridit2+$totalcridit3 ?></td>
                                                                  <td></td>
                                                                
                        </tr>
                      
                      
                      
                      
                      
                      
                      
                      
                    </table>
                   <?php

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_export_all_base_by()
    {

                    
                       
                      $accountshead=0;
                    if(isset($_GET['accountshead']))
                    {
                         $accountshead=$_GET['accountshead'];
                     
                    }
                     
                     
                     $qq="";
                     $St="";
                     
                     
                     
                     
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }
                     
                     if($accountshead=='116')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }
                     
                     if($accountshead=='119')
                     {
                         $qq=' AND account_heads_id_2='.$accountshead;
                     }
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $party_type=$_GET['party_type'];
                     
                     
                     $Stl="";
                     if(isset($_GET['payment_status']))
                     {
                              $payment_status=$_GET['payment_status'];
                              
                              if($payment_status!='')
                              {
                                      if($payment_status=='1')
                                      {
                                          //$Stl=' AND account_head_id IN ("105","106","107")';
                                          
                                          
                                          $banksteup1=" AND payment_mode='Cash' AND bank_id IN ('25','24') ";
                                          
                                      }
                                      else
                                      {
                                        // $Stl=' AND account_head_id  NOT IN ("105","106","107")';
                                         $banksteup1=" AND bank_id NOT IN ('0','25','24')";
                                      } 
                                  
                              }
                              
                         
                         
                     }
                     
                     
                     
                   
                    
                                  if($party_type=='All')
                                  {
                                      $St=' ';
                                  }
                                  else
                                  {
                                      $St=' AND party_type='.$party_type;
                                  }
                          
                         
                            if($accountshead!='0')
                            {
                               
                                 $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $banksteup1 $St $qq $Stl ORDER BY payment_date ASC");
                                 
                                 
                                
                            }
                            else
                            {
                               
                                 $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $banksteup1 $St $qq $Stl ORDER BY payment_date ASC");
                                
                                
                                
                            }
                              
                             
                            $result4=$result4->result();
                           
                          
                     
                     $array3=array();
                     $array5=array();
                      
                    
                 
                     
                         
                     $l=1;
                     foreach ($result4 as  $value) {
                       
                       
                        $account_head_idname="";
                           
                           
                              $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_head_id."'  ORDER BY sort_order ASC");
                              $result_account_head_text=$result_account_head->result();
                              
                             foreach($result_account_head_text as $ass)
                             {
                                                         $account_head_idname=$ass->name;
                                                       
                             }
                            
                           
                         if($value->debits==''){ $value->debits=0; }
                         if($value->credits==''){ $value->credits=0; }
                         
                            if($value->party_type==1)
                            {
                                $table='customers';
                                $traget='customer';
                                  $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");
                                        
                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                  $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                        
                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='customer_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                            }
                            
                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            if($value->party_type==6)
                            {
                                        $table='accountheads_sub_group';
                                        $traget='accountheads_sub_group';
                                        $traget2='customer_id';
                                        $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            if($value->party_type==7)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                             if($value->party_type==8)
                            {
                                        $table='admin_users';
                                        $traget='admin_users';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            $party_name="";
                             $res=$query->result();
                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }
                             
                             
                             
                            $url=$traget.'/ledger_find?'.$traget2.'='.$customer_id.'&party_type='.$value->party_type;
                             
                             
                            $bank_name="";
                            $bank_name_dd= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                            foreach($bank_name_dd as $bb)
                            {
                               $bank_name=$bb->bank_name;
                              
                            }
                             
                         
                            $array3[] = array(
                            
                            
                            'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'table'=>"all_ledgers",
                            'link' => $url, 
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                            'balance' => $value->balance,
                            'bank_name'=>$bank_name,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time,
                            'accounthead'=>$account_head_idname
                        
                            

                        );


                        $l++;

                     }
                     
                     
                     
                     
               
                     
                     
                     
                     $arrayval=array_merge($array3);

                   
                 
                     
                            $filename=date('d-m-Y').'_'.$name."_Recent_Ledger_Transaction"; 
                            header("Content-Type: application/xls");    
                            header("Content-Disposition: attachment; filename=$filename.xls");  
                            header("Pragma: no-cache"); 
                            header("Expires: 0");
                  
                   ?>
                   
                      <table  id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"  style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Party Name </th>
                          <th>Particulars</th>
                          <th>Reference No </th>
                         
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         
                          <?php
                          
                          if($Stl=='')
                          {
                              ?>
                             <th>Payment Mode</th>
                            
                              <?php
                          }
                          ?>
                         
                          
                          <th>Account Head</th>
                          <th>Narration</th>
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                        <?php
                        foreach($arrayval as $names)
                        {
                            ?>
                            
                             <tr  class="trpoint" >
                          
                           <td><?php echo $names['no']; ?></td>
                           <td><?php echo $names['payment_date']; ?> </td>
                           <td><?php echo $names['party_name']; ?></td>
                           <td><?php echo $names['reference_no']; ?></td>
                            <td><?php echo $names['process_by']; ?></td>
                           <td style="font-weight:800;text-align: right;"> <?php echo $names['debits']; ?></td>
                           <td style="font-weight:800;text-align: right;"> <?php echo $names['credits']; ?></td>
                          
                           
                              <?php
                              
                              if($Stl=='')
                              {
                                  ?>
                                  <td><?php echo $names['payment_mode']; ?></td>
                              
                                  <?php
                              }
                              ?>
                         
                         
                           <td><?php echo $names['accounthead']; ?></td>
                           <td><?php echo $names['notes']; ?></td>
                           </tr>
                        
                            
                            <?php
                            
                            
                        }
                        
                        ?>
                       
                      
                      </tbody>
                      
                      
                      
                      
                     
                      
                      
                      
                      
                    </table>
                   <?php

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_customer_order_report()
    {

                    
                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  GROUP BY b.id  ORDER BY no_of_orders DESC");
                      
                         
                           
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND a.customer_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY no_of_orders DESC");
                            
                          
                     }
                     
                    
                     $result=$result->result();
                   
                         
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                       
                                       
                                       
                                        $sql="SELECT SUM(b.qty*b.rate) as totalvalue FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                          
                          
                      
                                       $resultsub=$this->db->query($sql);
                                       $resultsub=$resultsub->result();
                                       
                                     
                                       foreach($resultsub as $val)
                                       { 
                                            $totalvalue= $val->totalvalue;
                                                     
                                       }
                                      
                                      
                                      if($totalvalue=='')
                                      {
                                          $totalvalue=0;
                                      }
                                         
                                                $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                     
                                                    'no_of_orders' => $value->no_of_orders, 
                                                    'customername' => $value->company_name,
                                                    'totalvalue' =>round($totalvalue,2)
                                                    
                                                    
                        
                                                );
                                            
                                   


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_customer_yes_no_order_report()
    {

                    
                    $now = time(); // or your date as well
                    $datey=date('Y');
                    $your_date = strtotime($datey."-04-01");
                    $datediff = $now - $your_date;
                    
                    $no_of_days= round($datediff / (60 * 60 * 24));


                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                     
                     
                     $months = array(
                        
                        'April',
                        'May',
                        'June',
                        'July ',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                        'January',
                        'February',
                        'March'
                    );
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    $userslog="";
                   
                    
                   
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                         $query = $this->db->query("SELECT id FROM `admin_users`  WHERE id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_head=$values->define_saleshd_id;
                              
                          }
                          
                         $userslog.=' AND b.sales_team_id="'.$sales_team_head.'"';        
                                 
                    }
                    
                    
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  b.sales_team_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                    
                     
                  
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND b.sales_team_id="'.$cateid.'"';
                             $result=$this->db->query("SELECT b.factory_workshop,b.competitor,b.locality,b.phone,b.ratings as cc,b.price_rateings as pp,b.delivery_time_rateings as dd,b.quality_rateings as qq,b.response_commission as rr,b.id as customer_id,b.company_name,b.sales_team_id FROM customers as b   WHERE    b.deleteid=0 $stat ORDER BY b.company_name DESC");
                     
                         }
                         else
                         {
                              $result=$this->db->query("SELECT b.factory_workshop,b.competitor,b.locality,b.phone,b.ratings as cc,b.price_rateings as pp,b.delivery_time_rateings as dd,b.quality_rateings as qq,b.response_commission as rr,b.id as customer_id,b.company_name,b.sales_team_id FROM customers as b   WHERE    b.deleteid='ALL' $stat  $userslog  ORDER BY b.company_name DESC LIMIT 0,10");
                          }
                             
                    
                     
                    
                     
                     $result=$result->result();
                   
                         
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                       
                       
                              $monthvales=array();
                            for ($j=0; $j <count($months) ; $j++) 
                            { 
                                
                                
                               
                				$aug=$this->db->query("SELECT count(id) as nos,MONTHNAME(create_date) as month FROM orders_process   WHERE  deleteid=0 AND customer_id='".$value->customer_id."' GROUP BY customer_id HAVING month='".$months[$j]."'");
                			    $resultaug=$aug->result();
                			    
                			    $Setup='';
                			    if($resultaug[0]->nos!='')
                			    {
                			        $Setup='YES('.$resultaug[0]->nos.')';
                			    }
                			    
                                $monthvales[]= array('monthsvalue'=>$Setup,'months'=>$months[$j]);
                                
                                
                                
                            }
                            
                          $totalsa=0;
                          $totalba=0;
                                $aug_as=$this->db->query("SELECT count(a.id) as nos,SUM(b.qty*b.rate) as totalamount  FROM orders_process as a JOIN order_product_list_process as b  ON a.id=b.order_id WHERE  b.deleteid=0 AND a.order_base=1 AND a.customer_id='".$value->customer_id."' GROUP BY a.id ");
                			    $resultaug_as=$aug_as->result();
                			    foreach($resultaug_as as $as)
                                {
                                                       $nos=1;
                                                       if($as->nos!='')
                                                       {
                                                          $nos=$as->nos;
                                                       }
                                                       
                                                       $totalamount=1;
                                                       if($as->totalamount!='')
                                                       {
                                                           $totalamount=round($as->totalamount);
                                                       }

                                                       
                                                      $totalsa=$totalamount/$no_of_days;
                                                      $totalba=$nos/$no_of_days;
                                }
                                
                                
                               
                			    
                                       
                                                $sales_team_id = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                                                foreach($sales_team_id as $vv)
                                                {
                                                       $sales_member=$vv->name;
                                                }
                                                
                                                $route_name="";
                                                $result_account_head=$this->db->query("SELECT r.name FROM locality as a JOIN route as r ON a.route_id=r.id WHERE  a.id='".$value->locality."'");
                                                $result_account_head_text=$result_account_head->result();
                                                foreach($result_account_head_text as $ass)
                                                {
                                                                                        $route_name=$ass->name;
                                                                                       
                                                }
                                         
                                                $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                    'sales_member' => $sales_member, 
                                                    'customer_id' => $value->customer_id,
                                                    'customername' => $value->company_name,
                                                    'customerphone' => $value->phone,
                                                    'area' => $route_name,
                                                    'competitor' => $value->competitor,
                                                    'factory_workshop' => $value->factory_workshop,
                                                    'cc' => $value->cc,
                                                    'pp' => $value->pp,
                                                    'dd' => $value->dd,
                                                    'qq' => $value->qq,
                                                    'rr' => $value->rr,
                                                    'sa' => substr($totalsa,0,3),
                                                    'ba' => substr($totalba,0,3),
                                                    'months'=>$monthvales
                                                    
                        
                                                );
                                            
                                  


                        $i++;

                     }
                     
              

                    echo json_encode($array);

    }
    
    
    
    
        public function fetch_data_get_customer_yes_no_order_report_export()
    {







$now = time(); // or your date as well
                    $datey=date('Y');
                    $your_date = strtotime($datey."-04-01");
                    $datediff = $now - $your_date;
                    
                    $no_of_days= round($datediff / (60 * 60 * 24));

  
           
                    
                      $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                     
                     
                     
                    $userslog="";
                    $months = array(
                        
                        'April',
                        'May',
                        'June',
                        'July ',
                        'August',
                        'September',
                        'October',
                        'November',
                        'December',
                        'January',
                        'February',
                        'March'
                    );
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    $userslog="";
                    
                    
                     if($this->session->userdata['logged_in']['access']=='17')
                    {
                         $query = $this->db->query("SELECT id FROM `admin_users`  WHERE id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_head=$values->define_saleshd_id;
                              
                          }
                          
                         $userslog.=' AND b.sales_team_id="'.$sales_team_head.'"';        
                                 
                    }
                    
                    
                    
                    
                    if($this->session->userdata['logged_in']['access']=='11' || $this->session->userdata['logged_in']['access']=='12')
                    {
                        
                        
                        
                             $sales_team_id = array($this->userid);
                            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                            foreach ($resultsales_team as $values) {
                                $sales_team_id[] = $values->sales_member_id;
                            }
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  b.sales_team_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                     
                  
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND b.sales_team_id="'.$cateid.'"';
                             $result=$this->db->query("SELECT b.factory_workshop,b.competitor,b.locality,b.phone,b.ratings as cc,b.price_rateings as pp,b.delivery_time_rateings as dd,b.quality_rateings as qq,b.response_commission as rr,b.id as customer_id,b.company_name,b.sales_team_id FROM customers as b   WHERE    b.deleteid=0  $stat ORDER BY b.company_name DESC");
                     
                         }
                         else
                         {
                              $result=$this->db->query("SELECT b.factory_workshop,b.competitor,b.locality,b.phone,b.ratings as cc,b.price_rateings as pp,b.delivery_time_rateings as dd,b.quality_rateings as qq,b.response_commission as rr,b.id as customer_id,b.company_name,b.sales_team_id FROM customers as b   WHERE    b.deleteid=0   $stat  $userslog  ORDER BY b.company_name DESC LIMIT 0,150");
                          }
                             
                     
                    
                     $result=$result->result();
                     
                     
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                    
                  
                        $filename='Customer_yes_or_no_status_report_'.$formdate.'_TO_'.$todate; 
                        header("Content-Type: application/xls");    
                       header("Content-Disposition: attachment; filename=$filename.xls");  
                        header("Pragma: no-cache"); 
                        header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="4">Customer Yes Or No Report </th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Sales Member</th>
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Area</th>
                          <th>Competitor</th>
                          <th>OPEN/CLOSE</th>
                          <th>C</th>
                          <th>Q</th>
                          <th>P</th>
                          <th>S</th>
                          <th>F</th>
                          
                          <th>MAR</th>
                          <th>APR</th>
                          <th>MAY</th>
                          <th>JUN</th>
                          <th>JUL</th>
                          <th>AUG</th>
                          <th>SEP</th>
                          <th>OCT</th>
                          <th>NOV</th>
                          <th>DEC</th>
                          <th>JAN</th>
                          <th>FEB</th>
                          <th>S.A</th>
                          <th>B.A</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            <?php
                              $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                       
                       
                              $monthvales=array();
                            for ($j=0; $j <count($months) ; $j++) 
                            { 
                                
                                
                               
                				$aug=$this->db->query("SELECT count(id) as nos,MONTHNAME(create_date) as month FROM orders_process   WHERE  deleteid=0 AND customer_id='".$value->customer_id."' GROUP BY customer_id HAVING month='".$months[$j]."'");
                			    $resultaug=$aug->result();
                			    
                			    $Setup='';
                			    if($resultaug[0]->nos!='')
                			    {
                			        $Setup='YES('.$resultaug[0]->nos.')';
                			    }
                			    
                                $monthvales[]= array('monthsvalue'=>$Setup);
                                
                                
                                
                            }
                            
                          
                          $totalsa=0;
                          $totalba=0;
                          $totalamount=1;
                          $nos=1;
                                $aug_as=$this->db->query("SELECT count(a.id) as nos,SUM(b.qty*b.rate) as totalamount  FROM orders_process as a JOIN order_product_list_process as b  ON a.id=b.order_id WHERE  b.deleteid=0 AND a.order_base=1 AND a.customer_id='".$value->customer_id."' GROUP BY a.id ");
                			    $resultaug_as=$aug_as->result();
                			    foreach($resultaug_as as $as)
                                {
                                                      
                                                       if($as->nos!='')
                                                       {
                                                          $nos=$as->nos;
                                                       }
                                                       
                                                      
                                                       if($as->totalamount!='')
                                                       {
                                                           $totalamount=round($as->totalamount,2);
                                                       }

                                                       
                                                      $totalsa=$totalamount/$no_of_days;
                                                      $totalba=$nos/$no_of_days;
                                }
                                
                                
                                


                       
                                       
                                                $sales_team_id = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                                                foreach($sales_team_id as $vv)
                                                {
                                                       $sales_member=$vv->name;
                                                }
                                                    
                                                $route_name="";
                                                $result_account_head=$this->db->query("SELECT r.name FROM locality as a JOIN route as r ON a.route_id=r.id WHERE  a.id='".$value->locality."'");
                                                $result_account_head_text=$result_account_head->result();
                                                foreach($result_account_head_text as $ass)
                                                {
                                                                                        $route_name=$ass->name;
                                                                                       
                                                }
                                                    
                                                $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                    'sales_member' => $sales_member, 
                                                    'customername' => $value->company_name,
                                                    'customerphone' => $value->phone,
                                                    'area' => $route_name,
                                                    'competitor' => $value->competitor,
                                                    'factory_workshop'=>$value->factory_workshop,
                                                    'cc' => $value->cc,
                                                    'pp' => $value->pp,
                                                    'dd' => $value->dd,
                                                    'qq' => $value->qq,
                                                    'rr' => $value->rr,
                                                    'sa' => substr($totalsa,0,3),
                                                    'ba' => substr($totalba,0,3),
                                                    'months'=>$monthvales
                                                    
                        
                                                );
                                            
                                   


                        $i++;

                     }
                        
                        
                      ?>
                      
                          <?php
                   
                          
                          foreach($array as $val)
                          {
                              ?>
                              
                                         <tr >
                          
                                          <td><?php echo $val['no']; ?></td>
                                          <td><?php echo $val['sales_member']; ?></td>
                                          <td><?php echo $val['customername']; ?></td>
                                          <td><?php echo $val['customerphone']; ?></td>
                                          <td><?php echo $val['area']; ?></td>
                                          <td><?php echo $val['competitor']; ?></td>
                                           <td><?php echo $val['factory_workshop']; ?></td>
                                              <td><?php echo $val['cc']; ?></td>
                                              <td><?php echo $val['pp']; ?></td>
                                              <td><?php echo $val['dd']; ?></td>
                                              <td><?php echo $val['qq']; ?></td>
                                              <td><?php echo $val['rr']; ?></td>
                                              
                                              <?php
                          
                                          for ($k=0; $k <count($val['months']) ; $k++) { 
			
                                              ?>
                                               <td><?php echo $val['months'][$k]['monthsvalue']; ?></td>
                                               <?php
                                          }
                                          
                                          ?>  
                                          
                                          <td><?php echo $val['sa']; ?></td>
                                          <td><?php echo $val['ba']; ?></td>
                                              
                                          
                                        </tr>
                              <?php
                          }
                          
                          ?>
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
        public function fetch_data_get_customer_order_report_export()
    {









  
           
                    
                      $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  GROUP BY b.id  ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND customer|_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY a.id DESC");
                    
                     }
                     
                    
                     $result=$result->result();
                     
                     
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                    
                  
                         $filename='Customer_order_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="4">Customer Order Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Customer Name</th>
                          <th>NO Of Orders</th>
                          <th>Orders Value</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                     foreach ($result as  $value) {
                                         
                                         
                                         
                                                   $sql="SELECT SUM(b.qty*b.rate) as totalvalue FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                          
                          
                      
                                                   $resultsub=$this->db->query($sql);
                                                   $resultsub=$resultsub->result();
                                                   
                                                 
                                                   foreach($resultsub as $val)
                                                   { 
                                                        $totalvalue= $val->totalvalue;
                                                                 
                                                   }
                                                  
                                                  
                                                  if($totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                                             
                                            
                            
                                        ?>
                                          <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo $value->company_name; ?></b></td>
                                          <td><b><?php echo $value->no_of_orders; ?></b></td>
                                          <td><b><?php echo $totalvalue; ?></b></td>
                                          
                                        </tr>
                                        
                                        <?php
                                        
                                         
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
    
    
    
    
            public function fetch_data_get_vendor_purchase_report()
    {

                    
                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_base=$_GET['order_base'];
                    
                     $stat="";
                    
                    
                    
                     if($order_base!='ALL')
                     {
                             $stat.=' AND a.order_base="'.$order_base.'"';
                             
                             
                             if($order_base>=2)
                             {
                                 $stat.=' AND c.selected_status="1"';
                             }
                             
                     }
                         
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT a.create_date as order_date,a.order_base,GROUP_CONCAT(c.vendor_id) as vendor_id,a.order_no,c.order_id FROM purchase_orders_process as a JOIN purchase_order_vendors as c ON a.id=c.order_id WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 $stat GROUP BY c.order_id ORDER BY a.id DESC");
                      
                         
                           
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat.=' AND c.vendor_id="'.$cateid.'"';
                         }
                         
                         
                          $result=$this->db->query("SELECT a.create_date as order_date,a.order_base,GROUP_CONCAT(c.vendor_id) as vendor_id,a.order_no,c.order_id FROM purchase_orders_process as a JOIN purchase_order_vendors as c ON a.id=c.order_id WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 $stat GROUP BY c.order_id ORDER BY a.id DESC");
                         
                     }
                     
                    
                     $result=$result->result();
                   
                         
                    
                     
                     
                     $i=1;
                     $array=array();
                      
                     foreach ($result as  $value) {
                       
                                                  
                                                   $sst=explode(',', $value->vendor_id);
                                                   $venodr_name=array();
                                                   $sql1="SELECT name FROM vendor as a  WHERE a.id IN ('".implode("','", $sst)."')";      
                                                   $resultsub1=$this->db->query($sql1);
                                                   $resultsub1=$resultsub1->result();
                                                   foreach($resultsub1 as $val1)
                                                   {  
                                                       $venodr_name[]= $val1->name;
                                                       
                                                   }
                                                   
                                                   $venodr_name_by=implode(',', $venodr_name);
                                       
                                                   $totalvalue=0;
                                                   $sql="SELECT SUM(qty*rate) as totalvalue FROM  purchase_product_list_process  WHERE  deleteid=0 AND order_id='".$value->order_id."'";      
                                                   $resultsub=$this->db->query($sql);
                                                   $resultsub=$resultsub->result();
                                                   
                                                 
                                                   foreach($resultsub as $val)
                                                   { 
                                                        $totalvalue= $val->totalvalue;
                                                                 
                                                   }
                                                   
                                                   
                                                   if($value->order_base==0)
                                                   {
                                                       $status="Open Requisition";
                                                   }
                                                   
                                                   if($value->order_base==1)
                                                   {
                                                       $status="Enquiry  Requested";
                                                   }
                                                   
                                                    if($value->order_base==2)
                                                   {
                                                       $status="PO";
                                                   }
                                       
                                                   if($value->order_base==9)
                                                   {
                                                       $status="Schedule Payment";
                                                   }
                                                   if($value->order_base==3)
                                                   {
                                                       $status="Partial Payout";
                                                   }
                                                   
                                                   if($value->order_base==4)
                                                   {
                                                       $status="Full Payout";
                                                   }
                                                   
                                                   if($value->order_base==5)
                                                   {
                                                       $status="Dispatched";
                                                   }
                                                   
                                                   if($value->order_base==6)
                                                   {
                                                       $status="Delivered";
                                                   }
                                                   
                                                   if($value->order_base==8)
                                                   {
                                                       $status="Inward Complated";
                                                   }
                                                   
                                                   if($value->order_base==-1)
                                                   {
                                                       $status="Cancelled";
                                                   }
                                      
                                      
                                      
                                                
                                                           
                                                          
                                                           
                                                   $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                    'order_no' => $value->order_no,  
                                                    'customername' => $venodr_name_by,
                                                    'order_date' =>date('d-m-Y',strtotime($value->order_date)),
                                                    'totalvalue' =>round($totalvalue,2),
                                                    'status' =>$status,
                                                    
                                                    
                        
                                                    );
                                            
                                   


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function fetch_data_get_customer_vendor_purchase_export()
    {









  
           
                    
                      $cateid=$_GET['cate_id'];
                      $limit=$_GET['limit'];
                      $formdate=$_GET['formdate'];
                      $todate=$_GET['todate'];
                      $order_base=$_GET['order_base'];
                      $stat="";
                    
                    
                    
                    
                     if($order_base!='ALL')
                     {
                             $stat.=' AND a.order_base="'.$order_base.'"';
                             
                             
                             if($order_base>=2)
                             {
                                 $stat.=' AND c.selected_status="1"';
                             }
                             
                     }
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.create_date as order_date,a.order_base,GROUP_CONCAT(c.vendor_id) as vendor_id,a.order_no,c.order_id FROM purchase_orders_process as a JOIN purchase_order_vendors as c ON a.id=c.order_id WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  GROUP BY c.order_id ORDER BY a.id DESC");
                      
                         
                           
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat.=' AND c.vendor_id="'.$cateid.'"';
                         }
                         
                          $result=$this->db->query("SELECT a.create_date as order_date,a.order_base,GROUP_CONCAT(c.vendor_id) as vendor_id,a.order_no,c.order_id FROM purchase_orders_process as a JOIN purchase_order_vendors as c ON a.id=c.order_id WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 $stat GROUP BY c.order_id ORDER BY a.id DESC");
                         
                     }
                    
                     $result=$result->result();
                     
                     
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                    
                  
                         $filename='Purchase_day_book_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="5">Purchase Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Vendor Name</th>
                          <th>Purchase Value</th>
             <th>Status</th>
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                     foreach ($result as  $value) {
                                         
                                         
                                         
                                                 
                                                  $sst=explode(',', $value->vendor_id);
                                                   $venodr_name=array();
                                                   $sql1="SELECT name FROM vendor as a  WHERE a.id IN ('".implode("','", $sst)."')";      
                                                   $resultsub1=$this->db->query($sql1);
                                                   $resultsub1=$resultsub1->result();
                                                   foreach($resultsub1 as $val1)
                                                   {  
                                                       $venodr_name[]= $val1->name;
                                                       
                                                   }
                                                   
                                                   $venodr_name_by=implode(',', $venodr_name);
                                       
                                                   $totalvalue=0;
                                                   $sql="SELECT SUM(qty*rate) as totalvalue FROM  purchase_product_list_process  WHERE  deleteid=0 AND order_id='".$value->order_id."'";      
                                                   $resultsub=$this->db->query($sql);
                                                   $resultsub=$resultsub->result();
                                                   
                                                 
                                                   foreach($resultsub as $val)
                                                   { 
                                                        $totalvalue= $val->totalvalue;
                                                                 
                                                   }
                                                   
                                                     if($value->order_base==0)
                                                   {
                                                       $status="Open Requisition";
                                                   }
                                                   
                                                   if($value->order_base==1)
                                                   {
                                                       $status="Enquiry  Requested";
                                                   }
                                                   
                                                    if($value->order_base==2)
                                                   {
                                                       $status="PO";
                                                   }
                                       
                                                   if($value->order_base==9)
                                                   {
                                                       $status="Schedule Payment";
                                                   }
                                                   if($value->order_base==3)
                                                   {
                                                       $status="Partial Payout";
                                                   }
                                                   
                                                   if($value->order_base==4)
                                                   {
                                                       $status="Full Payout";
                                                   }
                                                   
                                                   if($value->order_base==5)
                                                   {
                                                       $status="Dispatched";
                                                   }
                                                   
                                                   if($value->order_base==6)
                                                   {
                                                       $status="Delivered";
                                                   }
                                                   
                                                   if($value->order_base==8)
                                                   {
                                                       $status="Inward Complated";
                                                   }
                                                   
                                                   if($value->order_base==-1)
                                                   {
                                                       $status="Cancelled";
                                                   }
                                      
                                                             
                                            
                            
                                        ?>
                                          <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo date('d-m-Y',strtotime($value->order_date)); ?></b></td>
                                          <td><b><?php echo $value->order_no; ?></b></td>
                                          <td><b><?php echo $venodr_name_by; ?></b></td>
                                         
                                          <td><b><?php echo $totalvalue; ?></b></td>
                                          <td><b><?php echo $status; ?></b></td>
                                        </tr>
                                        
                                        <?php
                                        
                                         
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_vendor_purchase_product_view()
    {

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     $order_base=$_GET['order_base'];
                     
                     $search="";
                     
                     
                     
                     if($productid!='ALL') 
                     {
                         $search.=' AND b.product_id="'.$productid.'"';
                     }
                       
                     if($order_base!='ALL')
                     {
                             $search.=' AND a.order_base="'.$order_base.'"';
                           
                     }
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                          $formdate=date('Y-m-01');
                          $todate=date('Y-m-t');
                          $result=$this->db->query("SELECT a.order_no,b.order_id,a.order_base,a.create_date,b.qty,b.rate,b.product_name FROM purchase_orders_process as a JOIN purchase_product_list_process as b ON a.id=b.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND b.product_id!='0' $search  ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                         
                         
                         
                          $result=$this->db->query("SELECT a.order_no,b.order_id,a.order_base,a.create_date,b.qty,b.rate,b.product_name FROM purchase_orders_process as a JOIN purchase_product_list_process as b ON a.id=b.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND b.product_id!='0'  $search  ORDER BY a.id DESC");
                    
                     }
                     
                    
                     
                    
                    
                    
                    
                       
                         
                     $result=$result->result();
                   
                         
                    
                     
                     
                     $i=1;
                      $array=array();
                      
                     foreach ($result as  $value) {
                         
                         
                         
                                                  
                                                   $sql1="SELECT order_base FROM purchase_orders_process as a  WHERE a.id ='".$value->order_id."'";      
                                                   $resultsub1=$this->db->query($sql1);
                                                   $resultsub1=$resultsub1->result();
                                                   foreach($resultsub1 as $val1)
                                                   {  
                                                       $order_base= $val1->order_base;
                                                       
                                                   }
                       
                       
                                                   if($order_base==0)
                                                   {
                                                       $status="Open Requisition";
                                                   }
                                                   
                                                   if($order_base==1)
                                                   {
                                                       $status="Enquiry  Requested";
                                                   }
                                                   
                                                    if($order_base==2)
                                                   {
                                                       $status="PO";
                                                   }
                                       
                                                   if($order_base==9)
                                                   {
                                                       $status="Schedule Payment";
                                                   }
                                                   if($order_base==3)
                                                   {
                                                       $status="Partial Payout";
                                                   }
                                                   
                                                   if($order_base==4)
                                                   {
                                                       $status="Full Payout";
                                                   }
                                                   
                                                   if($order_base==5)
                                                   {
                                                       $status="Dispatched";
                                                   }
                                                   
                                                   if($order_base==6)
                                                   {
                                                       $status="Delivered";
                                                   }
                                                   
                                                   if($order_base==8)
                                                   {
                                                       $status="Inward Complated";
                                                   }
                                                   
                                                   if($order_base==-1)
                                                   {
                                                       $status="Cancelled";
                                                   }
                                     
                                                $array[] = array(
                                                    
                                                    
                                                    'no' => $i, 
                                                    'id' => $value->id, 
                                                    'order_id' => $value->id, 
                                                    'order_no' => $value->order_no, 
                                                    'product_name' => $value->product_name,
                                                    'qty' => $value->qty, 
                                                    'rate' => $value->rate, 
                                                    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                                                    'totalamount' => round($value->qty*$value->rate,2),
                                                    'status' => $status, 
                                                    
                        
                                                );
                                       


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
        public function fetch_data_vendor_purchase_product_export()
    {









  
           
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     $order_base=$_GET['order_base'];
                     
                     $search="";
                     
                     
                     
                     if($productid!='ALL') 
                     {
                         $search.=' AND b.product_id="'.$productid.'"';
                     }
                       
                     if($order_base!='ALL')
                     {
                             $search.=' AND a.order_base="'.$order_base.'"';
                           
                     }
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                          $formdate=date('Y-m-01');
                          $todate=date('Y-m-t');
                          $result=$this->db->query("SELECT a.order_no,b.order_id,a.order_base,a.create_date,b.qty,b.rate,b.product_name FROM purchase_orders_process as a JOIN purchase_product_list_process as b ON a.id=b.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND b.product_id!='0' $search  ORDER BY a.id DESC");
                    
                     }
                     else
                     {
                         
                         
                         
                         
                          $result=$this->db->query("SELECT a.order_no,b.order_id,a.order_base,a.create_date,b.qty,b.rate,b.product_name FROM purchase_orders_process as a JOIN purchase_product_list_process as b ON a.id=b.order_id WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0 AND b.product_id!='0'  $search  ORDER BY a.id DESC");
                    
                     }
                     
                    
                    
                    
                    
                       
                         
                     $result=$result->result();
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                    
                  
                         $filename='purchase_product_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Purchase Product Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                         
                          <th>No</th>
                          <th>Date</th>
                          <th>PO No</th>
                          <th>Product name</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>Total Amount</th>
                          <th>Status</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                     
                                     $Totalval=0;
                                     foreach ($result as  $value) {
                                         
                                          $Totalval+= round($value->qty*$value->rate,2);
                                          
                                          
                                                   $sql1="SELECT order_base FROM purchase_orders_process as a  WHERE a.id ='".$value->order_id."'";      
                                                   $resultsub1=$this->db->query($sql1);
                                                   $resultsub1=$resultsub1->result();
                                                   foreach($resultsub1 as $val1)
                                                   {  
                                                       $order_base= $val1->order_base;
                                                       
                                                   }
                       
                       
                                                   if($order_base==0)
                                                   {
                                                       $status="Open Requisition";
                                                   }
                                                   
                                                   if($order_base==1)
                                                   {
                                                       $status="Enquiry  Requested";
                                                   }
                                                   
                                                    if($order_base==2)
                                                   {
                                                       $status="PO";
                                                   }
                                       
                                                   if($order_base==9)
                                                   {
                                                       $status="Schedule Payment";
                                                   }
                                                   if($order_base==3)
                                                   {
                                                       $status="Partial Payout";
                                                   }
                                                   
                                                   if($order_base==4)
                                                   {
                                                       $status="Full Payout";
                                                   }
                                                   
                                                   if($order_base==5)
                                                   {
                                                       $status="Dispatched";
                                                   }
                                                   
                                                   if($order_base==6)
                                                   {
                                                       $status="Delivered";
                                                   }
                                                   
                                                   if($order_base==8)
                                                   {
                                                       $status="Inward Complated";
                                                   }
                                                   
                                                   if($order_base==-1)
                                                   {
                                                       $status="Cancelled";
                                                   }
                                          
                            
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->product_name; ?></td>
                                          <td><?php echo $value->qty; ?></td>
                                          <td><?php echo $value->rate; ?></td>
                                          <td><?php echo round($value->qty*$value->rate,2); ?></td>
                                          <td><?php echo $status; ?></td>
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
                                          <td></td>
                                          <td><?php echo $Totalval; ?></td>
                                          <td></td>
                                        </tr>
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    

}   
