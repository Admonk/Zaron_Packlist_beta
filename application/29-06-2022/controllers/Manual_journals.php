<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '4400M');

class Manual_journals extends CI_Controller {

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
                                            
                                             $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Manual Journals';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('manual_journals/index.php',$data);


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
                                             $data['title']    = 'Manual Journals';
                                             
                                                $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','ASC');
                                            
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads_sub_group','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('manual_journals/add.php',$data);


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
                                             $data['title']    = 'Manual Journals Edit';
                                                $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','ASC');
                                            
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             
                                             $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads_sub_group','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('manual_journals/edit.php',$data);


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
                                             $data['title']    = 'Manual Journals Edit';
                                             
                                             
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             
                                             
                                             $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads_sub_group','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('manual_journals/invoice.php',$data);


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
                     
                     if($form_data->party_type!='' && $form_data->payment_mode!='')
                     {

                                       $tablename=$form_data->tablename;
                                                
                                                
                                                
                                                  if($form_data->payment_mode!='Cash')
                                                  {
                                                       $bankaccount=$form_data->bankaccount;
                                                  }
                                                  else
                                                  {
                                                       $bankaccount=0;
                                                  }
                                                
                                                
                                                
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');              
                                                foreach($additional_information as $vl)
                                                {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                }
                                                     $data['party_type']= $form_data->party_type; 
                                                  
                                                      $pp=explode('-', $form_data->get_users);
                                                      $form_data->get_users=$pp[0];
                                                      $data['get_users']= $form_data->get_users;
                                                      
                                                      
                                                      
                                                                    
                                                  
                                                  
                                                  
                                                       $tableleg="0";
                                                       if($form_data->party_type=='1')
                                                       {
                                                           $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                                                          
                                                           $tableleg="all_ledgers";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='2')
                                                       {
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0'  AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                       }
                                                       elseif($form_data->party_type=='3')
                                                       {
                                                           $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           
                                                       }
                                                       elseif($form_data->party_type=='4')
                                                       {
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,bank_name,account_heads_id,account_heads_id_2 as name FROM bankaccount  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY bank_name ASC");
                                                           $tableleg="bankaccount_manage";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='5')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                          // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                                                           //$tableleg="party_ledger";
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                       
                                                  
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                $company_name= $val->name;
                                                                $account_heads_id= $val->account_heads_id;
                                                                $account_heads_id_2= $val->account_heads_id_2;
                                                       }
                                                       
                                                       
                                                                    $reshh = $this->Main_model->where_names('accountheads_sub_group','id',$account_heads_id);
                                                                    
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                   
                                                                    $data['account_head_id']= $account_heads_id; 
                                                                    
                                                                    if($form_data->party_type=='5')
                                                                    {
                                                                        $data['account_heads_id_2']= $account_heads_id; 
                                                                    }
                                                                    else
                                                                    {
                                                                        $data['account_heads_id_2']= $account_heads_id_2; 
                                                                    }
                                                                    
                                                                    
                                                                    $data['account_head_name']= $names; 
                                                       
                                                      
                                                        
                                                         if($tableleg!="0")
                                                         {    
                                                             
                                                             if($form_data->party_type==4)
                                                             {
                                                                 
                                                                 
                                                                   
                                                                     $res =$this->Main_model->where_names_three_order_by($tableleg,'bank_account_id',$form_data->get_users,'party_type',4,'deleteid','0','id','ASC');
                                                            
                                                                     $balancetotal=0;
                                                                     $debitsamount=0;
                                                                     $creditsamount=0;
                                                                     foreach($res as $val)
                                                                     {
                                                                                     $payid=$val->id;
                                                                                     $customer_id=$val->bank_account_id;
                                                                                     $order_no=$val->order_no;
                                                                                     $amount=$val->amount;
                                                                                     $debitsamount+=$val->debit;
                                                                                     $creditsamount+=$val->credit;
                                                                                     $balancetotal+=$val->balance;
                                                                      }
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                                                                 
                                                                 
                                                             }
                                                             else
                                                             {
                                                                 
                                                                 
                                                                 
                                                                     $res =$this->Main_model->where_names_three_order_by($tableleg,'customer_id',$form_data->get_users,'party_type',$form_data->party_type,'deleteid','0','id','ASC');
                                      
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
                                                                      
                                                                 
                                                             }
                                                             
                                                                       
                                                                     
                                                         }
                                                       
                                                        
                                               
                                                       
                                                         
                                                       
                                                       
                                                       
                                                  
                                     
                                               $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                               
                                               
                                                   
                                               $credits_value_data=$form_data->credits_value_data;
                                               $accountshead_value_data=$credits_value_data;
                                               if($credits_value_data=='')
                                               {
                                                   $debits_value_data=$form_data->debits_value_data;
                                                   $accountshead_value_data=$debits_value_data;
                                               
                                               }
                                               
                                               
                                               
                                               
                                               if($accountshead_value_data!="")
                                               {
                                                 
                                                 $accountshead_value_data=explode('|', $accountshead_value_data);
                                                 $description=explode('|', $form_data->description_value_data);
                                                 $debits=explode('|', $form_data->debits_value_data);
                                                 $credits=explode('|', $form_data->credits_value_data);

                                                 for ($i=0; $i <count($accountshead_value_data) ; $i++) { 
                                                     
                                                     $sizedata['primary_id']=$insert_id;
                                                     
                                                     
                                                     
                                                                    
                                                          $sizedata['accountshead']=$names;
                                                          $sizedata['account_head_id']=$account_heads_id;

                                                     
                                                     
                                                     
                                                     
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
                                                                 $bank_name=$valb->bank_name.'|'.$valb->account_no;
                                                                 $account_no=$valb->account_no;
                                                                 $account_heads_by_bank=$valb->account_heads_id;
                                                             }
                                                             
                                                             
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
                                                                 
                                                                 
                                                                // $bankcreditsamount=$bankcreditsamount-$bankdebitsamount;
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']=$form_data->reference_no;
                                                                
                                                                
                                                                
                                                                 if($sizedata['credits']!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=$sizedata['credits'];
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal+$sizedata['credits'];
                                                                          }
                                                                  
                                                                 }
                                                                 
                                                                 if($sizedata['debits']!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']='-'.$sizedata['debits'];
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal-$sizedata['debits'];
                                                                          }
                                                                  
                                                                 }
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                $data_bank['debit']=$sizedata['debits'];
                                                                $data_bank['credit']=$sizedata['credits'];
                                                                
                                                                
                                                                
                                                                $data_bank['user_id']=$this->userid;
                                                                
                                                                $data_bank['name']=$company_name;
                                                                $data_bank['deletemod']='JE'.$insert_id;
                                                                $data_bank['create_date']=$form_data->journal_date;
                                                                $data_bank['status_by']=$form_data->notes;
                                                                
                                                                
                                                                
                                                                
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
                                                                
                                                               
                                                                
                                                                
                                                                $data_bank['party_type']=4;
                                                                
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                      
                                                      
                                                      
                                                      
                                                      
                                                       
                                                     if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                      
                                                    




                                                      
                                                    
                                                      if($tableleg!="0")
                                                      {
                                                             
                                                             
                                                             
                                                             
                                                             
                                                                               if($form_data->party_type==4)
                                                                               {
                                                                                   
                                                                                   
                                                                                    
                                                                                     
                                                                                   
                                                                                   
                                                                               }
                                                                               else
                                                                               {
                                                                                   
                                                                                       $data_driver['party_type']=$form_data->party_type;
                                                                                       $data_driver['order_id']=0;
                                                                                       $data_driver['user_id']=$this->userid;
                                                                                       $data_driver['customer_id']=$form_data->get_users;
                                                                                       $data_driver['payment_mode']=$form_data->payment_mode;
                                                                                       $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                                                       if($form_data->payment_mode=='Cash')
                                                                                       {
                                                                                        $data_driver['reference_no']='00000';
                                                                                        $data_driver['order_no']='JE-'.$insert_id; 
                                                                                        $data_driver['cash_trasfer_status']=0;
                                                                                       }
                                                                                       else
                                                                                       {
                                                                                          $data_driver['reference_no']=$form_data->reference_no;
                                                                                          $data_driver['order_no']='JE-'.$insert_id; 
                                                                                          $data_driver['cash_trasfer_status']=1;
                                                                                       }
                                                                                      
                                                                                       $data_driver['amount']=0;
                                                                                       $data_driver['notes']=$form_data->notes;
                                                                                       if($sizedata['credits']!='0' || $sizedata['credits']!='')
                                                                                       {
                                                                                                 
                                                                                                      if($balancetotal==0)
                                                                                                      {   
                                                                                                           $data_driver['balance']=$sizedata['credits'];
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                           
                                                                                                            $data_driver['balance']=$balancetotal+$sizedata['credits'];
                                                                                                      }
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']!='0' || $sizedata['debits']!='')
                                                                                        { 
                                                                                                if($balancetotal==0)
                                                                                                 {
                                                                                                      $data_driver['balance']='-'.$sizedata['debits'];
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                                              
                                                                                                       
                                                                                                      $data_driver['balance']=$balancetotal-$sizedata['debits'];
                                                                                                 } 
                                                                                                 
                                                                                                 
                                                                                        }
                                                                                            
                                                                                                                 
                                                                                    
                                                                                      
                                                                                      $data_driver['payout']=$sizedata['credits'];
                                                                                      $data_driver['debits']=$sizedata['debits'];
                                                                                      $data_driver['credits']=$sizedata['credits'];
                                                                                      $data_driver['paid_status']='1';
                                                                                      $data_driver['process_by']='Manual Journals';
                                                                                      $data_driver['deletemod']='JE'.$insert_id;
                                                                                      $data_driver['payment_date']=$date;
                                                                                      $data_driver['payment_time']=$time;
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      if($form_data->party_type==1)
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= 123; 
                                                                                          $data_driver['account_head_id']=123;
                                                                                      
                                                                                      }
                                                                                      elseif($form_data->party_type==5)
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= $account_heads_id; 
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                      
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= $account_heads_id_2; 
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                        
                                                                                      }
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      $data_driver['bank_id']=$bankaccount;
                                                                                      
                                                                                      
                                                                                      
                                                                                      $this->Main_model->insert_commen($data_driver,$tableleg);
                                                                                     
                                                                               
                                                                              
                                                                                   
                                                                               }
                                                                             
                                                                                               
                                                                              
                                                                        
                                                                                  
                                                             
                                                      }
                                                      
                                                      
                                                    
                                                  
                                                     
                                                     $this->Main_model->insert_commen($sizedata,'manual_journals_sub');
                                                     
                                                     
                                                     
                                            
                                                  }
                            
                                              }
                                              
                                              
                                  $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Manual journal successfully Added..');
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
                     
                     
                      $date= $form_data->journal_date;

                   	 if($form_data->account_head_id!='' || $form_data->party_type!='' || $form_data->get_users!='')
                     {                          
                         
                                               // $this->Main_model->delete_where_by('manual_journals_sub','primary_id',$form_data->id);
                                                
                                                //$this->Main_model->delete_where_by('payment_received_sub','primary_id',$form_data->id);
                                                
                                                $idset='JE'.$form_data->id;
                                                //$this->Main_model->delete_where_by('customer_ledger','deletemod',$idset);
                                                //$this->Main_model->delete_where_by('bankaccount_manage','deletemod',$idset);
                                                $this->db->query("UPDATE manual_journals_sub SET deleteid='1' WHERE deleteid='0' AND primary_id='".$form_data->id."'");
                                                $this->db->query("UPDATE bankaccount_manage SET deleteid='1' WHERE deleteid='0' AND deletemod='".$idset."'");
                                                
                                                
                                                if($form_data->payment_mode!='Cash')
                                                {
                                                       $bankaccount=$form_data->bankaccount;
                                                }
                                                else
                                                {
                                                       $bankaccount=0;
                                                }
                                                
                                                
                                                $tablename=$form_data->tablename;
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');              
                                                foreach($additional_information as $vl)
                                                {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                }
                                                $data['get_id']=$form_data->id;
                                                 $data['party_type']= $form_data->party_type; 
                                                  
                                                      $pp=explode('-', $form_data->get_users);
                                                      $form_data->get_users=$pp[0];
                                                      $data['get_users']= $form_data->get_users;
                                                      
                                                      
                                                       
                                                    $reshh = $this->Main_model->where_names('accountheads_sub_group','id',$form_data->account_head_id);
                                                                    
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                    $data['account_head_id']= $form_data->account_head_id; 
                                                    $data['account_head_name']= $names;
                                                   
                                                  
                                                  
                                                  
                                                      $tableleg="0";
                                                      $tableleg="0";
                                                      if($form_data->party_type=='1')
                                                       {
                                                           $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                                                          
                                                           $tableleg="all_ledgers";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='2')
                                                       {
                                                            $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0'  AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                       }
                                                       elseif($form_data->party_type=='3')
                                                       {
                                                           $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           
                                                       }
                                                       elseif($form_data->party_type=='4')
                                                       {
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,bank_name as name FROM bankaccount  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY bank_name ASC");
                                                           $tableleg="bankaccount_manage";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='5')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                          // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                                                           //$tableleg="party_ledger";
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       $this->db->query("UPDATE $tableleg SET deleteid='1' WHERE deleteid='0' AND deletemod='".$idset."'");
                                                  
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                $company_name= $val->name;
                                                       }
                                                       
                                                       
                                                        
                                                       
                                                      
                                                        
                                                           
                                                         if($tableleg!="0")
                                                         {    
                                                             
                                                             if($form_data->party_type==4)
                                                             {
                                                                 
                                                                 
                                                                   
                                                                     $res =$this->Main_model->where_names_three_order_by($tableleg,'bank_account_id',$form_data->get_users,'party_type',4,'deleteid','0','id','ASC');
                                                            
                                                                     $balancetotal=0;
                                                                     $debitsamount=0;
                                                                     $creditsamount=0;
                                                                     foreach($res as $val)
                                                                     {
                                                                                     $payid=$val->id;
                                                                                     $customer_id=$val->bank_account_id;
                                                                                     $order_no=$val->order_no;
                                                                                     $amount=$val->amount;
                                                                                     $debitsamount+=$val->debit;
                                                                                     $creditsamount+=$val->credit;
                                                                                     $balancetotal+=$val->balance;
                                                                      }
                                                                      
                                                                 
                                                                  $balancetotal=$creditsamount-$debitsamount;
                                                                 
                                                             }
                                                             else
                                                             {
                                                                 
                                                                 
                                                                 
                                                                     $res =$this->Main_model->where_names_three_order_by($tableleg,'customer_id',$form_data->get_users,'party_type',$form_data->party_type,'deleteid','0','id','ASC');
                                      
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
                                                                 
                                                             }
                                                             
                                                                       
                                                                     
                                                         }
                                                       
                                                        
                                                       
                                                        
                                               
                                                       
                                     
                                                
                                                
                                                 $credits_value_data=$form_data->credits_value_data;
                                               $accountshead_value_data=$credits_value_data;
                                               if($credits_value_data=='')
                                               {
                                                   $debits_value_data=$form_data->debits_value_data;
                                                   $accountshead_value_data=$debits_value_data;
                                               
                                               }
                                               if($accountshead_value_data!="")
                                               {
                                                 
                                                 $accountshead_value_data=explode('|', $accountshead_value_data);
                                                 $description=explode('|', $form_data->description_value_data);
                                                 $debits=explode('|', $form_data->debits_value_data);
                                                 $credits=explode('|', $form_data->credits_value_data);

                                                 for ($i=0; $i <count($accountshead_value_data) ; $i++) { 
                                                     
                                                     $sizedata['primary_id']=$form_data->id;
                                                     
                                                     
                                                     
                                                                   
                                                                      $sizedata['accountshead']=$names;
                                                                     $sizedata['account_head_id']=$form_data->account_head_id;

                                                     
                                                     
                                                     
                                                     
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
                                                                 $bank_name=$valb->bank_name.'|'.$valb->account_no;
                                                                 $account_no=$valb->account_no;
                                                                 
                                                             }
                                                             
                                                             
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
                                                             
                                                              //$bankbalancetotal=$bankcreditsamount-$bankdebitsamount;
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']=$form_data->journal_id;
                                                                
                                                                
                                                                
                                                                  if($sizedata['credits']!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=$sizedata['credits'];
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal+$sizedata['credits'];
                                                                          }
                                                                  
                                                                 }
                                                                 
                                                                 if($sizedata['debits']!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']='-'.$sizedata['debits'];
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal-$sizedata['debits'];
                                                                          }
                                                                  
                                                                 }
                                                                
                                                                
                                                                
                                                                $data_bank['debit']=$sizedata['debits'];
                                                                $data_bank['credit']=$sizedata['credits'];
                                                                
                                                                
                                                                 $data_bank['user_id']=$this->userid;
                                                                $data_bank['name']=$company_name;
                                                                $data_bank['deletemod']='JE'.$form_data->id;
                                                                $data_bank['create_date']=$date;
                                                                $data_bank['status_by']='Manual Journals '.$names;
                                                                $data_bank['account_head_id']=107;
                                                                $data_bank['account_heads_id_2']=107;
                                                                  $data_bank['party_type']=4;
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                      
                                                      
                                                      
                                                      
                                                      
                                                       
                                                       if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$form_data->id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$form_data->id."'");
                                                     
                                                     }
                                                      
                                                      
                                                    
                                                      if($tableleg!="0")
                                                      {
                                                             
                                                             
                                                             
                                                                                 if($form_data->party_type==4)
                                                                               {
                                                                                   
                                                                                   
                                                                                   
                                                                                      
                                                                                       $data_driver['user_id']=$this->userid;
                                                                                       $data_driver['bank_account_id']=$form_data->get_users;
                                                                                       $data_driver['payment_status']=1;
                                                                                       if($sizedata['credits']!='0' || $sizedata['credits']!='')
                                                                                       {
                                                                                                 
                                                                                                      if($balancetotal==0)
                                                                                                      {   
                                                                                                           $data_driver['balance']=$sizedata['credits'];
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                           
                                                                                                            $data_driver['balance']=$balancetotal+$sizedata['credits'];
                                                                                                      }
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']!='0' || $sizedata['debits']!='')
                                                                                        { 
                                                                                               if($balancetotal==0)
                                                                                                 {
                                                                                                      $data_driver['balance']='-'.$sizedata['debits'];
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                                              
                                                                                                       
                                                                                                      $data_driver['balance']=$balancetotal-$sizedata['debits'];
                                                                                                 } 
                                                                                                 
                                                                                                 
                                                                                        }
                                                                                            
                                                                                       
                                                                                      $data_driver['debit']=$sizedata['debits'];
                                                                                      $data_driver['credit']=$sizedata['credits'];
                                                                                      $data_driver['status_by']='Manual Journals';
                                                                                      $data_driver['deletemod']='JE'.$insert_id;
                                                                                      $data_driver['create_date']=$date;
                                                                                      $data_driver['account_head_id']=11;
                                                                                      $data_driver['party_type']=$form_data->party_type;
                                                                                      
                                                                                   
                                                                                   
                                                                                   
                                                                                   
                                                                               }
                                                                               else
                                                                               {
                                                                                   
                                                                                       $data_driver['party_type']=$form_data->party_type;
                                                                                       $data_driver['order_id']=0;
                                                                                       $data_driver['user_id']=$this->userid;
                                                                                       $data_driver['customer_id']=$form_data->get_users;
                                                                                       $data_driver['payment_mode']=$form_data->payment_mode;
                                                                                       $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                                                       if($form_data->payment_mode=='Cash')
                                                                                       {
                                                                                        $data_driver['reference_no']='00000';
                                                                                        $data_driver['order_no']='Cash Payment';  
                                                                                        $data_driver['cash_trasfer_status']=0;
                                                                                       }
                                                                                       else
                                                                                       {
                                                                                          $data_driver['reference_no']=$form_data->reference_no;
                                                                                          $data_driver['order_no']=$form_data->reference_no;
                                                                                          $data_driver['cash_trasfer_status']=1;
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
                                                                                                           
                                                                                                            $data_driver['balance']=$balancetotal+$sizedata['credits'];
                                                                                                      }
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']!='0' || $sizedata['debits']!='')
                                                                                        { 
                                                                                               if($balancetotal==0)
                                                                                                 {
                                                                                                      $data_driver['balance']='-'.$sizedata['debits'];
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                                              
                                                                                                       
                                                                                                      $data_driver['balance']=$balancetotal-$sizedata['debits'];
                                                                                                 } 
                                                                                                 
                                                                                                 
                                                                                        }
                                                                                            
                                                                                                                 
                                                                                    
                                                                                      
                                                                                      $data_driver['payout']=$sizedata['credits'];
                                                                                      $data_driver['debits']=$sizedata['debits'];
                                                                                      $data_driver['credits']=$sizedata['credits'];
                                                                                      $data_driver['paid_status']='1';
                                                                                      $data_driver['process_by']='Manual Journals';
                                                                                      $data_driver['deletemod']='JE'.$insert_id;
                                                                                      $data_driver['payment_date']=$date;
                                                                                      $data_driver['payment_time']=$time;
                                                                                      $data_driver['account_head_id']=$form_data->account_head_id;
                                                                                      
                                                                                      
                                                                              
                                                                                   
                                                                               }
                                                                             
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              $this->Main_model->insert_commen($data_driver,$tableleg);
                                                                                     
                                                                                     
                                                             
                                                      }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'manual_journals_sub');
                                            
                                                  }
                            
                                              }
                                                
                                                $this->Main_model->update_commen($data,$tablename);
                                                
                                                
                                            $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Manual journal successfully Updated..');
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
                     $this->db->query("UPDATE manual_journals_sub SET deleteid='1' WHERE primary_id='".$id."'");
                     
                     $this->db->query("UPDATE bankaccount_manage SET deleteid='1' WHERE deletemod='JE".$id."'");
                     $this->db->query("UPDATE customer_ledger SET deleteid='1' WHERE deletemod='JE".$id."'");
                     $this->db->query("UPDATE vendor_ledger SET deleteid='1' WHERE deletemod='JE".$id."'");
                     $this->db->query("UPDATE driver_ledger SET deleteid='1' WHERE deletemod='JE".$id."'");
                     $this->db->query("UPDATE employee_ledger SET deleteid='1' WHERE deletemod='JE".$id."'");
                     

                 }
                
                


	}
	public function userget()
	{
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     
                 
                     $party_type=$form_data->party_type;
                     
                                     $search=$form_data->search;
                                     
                                     if($search!='')
                                     { 
                                         
                                          $sql=' AND name LIKE "%'.$search.'%" OR phone LIKE "%'.$search.'%"';
                                          if($party_type=='1')
                                          {
                                              $sql=' AND company_name LIKE "%'.$search.'%" OR phone LIKE "%'.$search.'%"';
                                              
                                          }
                                          if($party_type=='4')
                                          {
                                              $sql=' AND bank_name LIKE "%'.$search.'%" OR account_no LIKE "%'.$search.'%"';
                                              
                                          }
                                        
                                         
                                     }
                     
                                   if($party_type=='1')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name,phone FROM customers  WHERE deleteid='0' $sql ORDER BY company_name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='2')
                                   {
                                        $query = $this->db->query("SELECT id,name,phone FROM driver  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='3')
                                   {
                                        $query = $this->db->query("SELECT id,name,phone FROM vendor  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='4')
                                   {
                                       $query = $this->db->query("SELECT id,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='5')
                                   {
                                      $query = $this->db->query("SELECT id,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                               
                                   }
                                   else
                                   {
                                   
                                      $query = $this->db->query("SELECT id,name,phone FROM partyusers  WHERE deleteid='0' AND access='0' $sql ORDER BY name ASC");
                                      // $query = $this->db->query("SELECT id,name,phone FROM admin_users  WHERE deleteid='0' AND access!='13' $sql ORDER BY name ASC LIMIT 0,50");
                                      
                                   }
                                   
                                  
                                  
                                   $res= $query->num_rows();
                                   $result=$query->result();
                     
                     
                                 	 $array=array();
                                 	 $i=1;
                                 	 
                                 	 if($party_type!='')
                                 	 {
                                 	     
                                 	 
                                 	            
                                             	 foreach ($result as  $value) {
                                             	     
                                             	    $array[] = $value->id.'-'.$value->name.'-'.$value->phone;
                                             	 	
                                             	
                                             	 }
                                             	 
                                 	 
                                 	 
                                 	 
                                 	 }

                    echo json_encode($array);

	}
	
	public function fetch_data()
	{
	    
	                 $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     $search = $_GET['search'];
                     $searchsales = $_GET['searchsales'];
                     
                     
                     
                     if(isset($_GET['page_next']))
                     {
                         $offset = $_GET['page_next'];
                     }
                     
                     $where="";
                     $sqls="";
                     if ($search != "")
                     {
                        
                           $where = " AND a.account_head_name LIKE '%" . $search . "%' OR a.journal_date LIKE '%" . $search . "%' OR a.amount LIKE '%" . $search . "%' OR a.journal_id LIKE '%" . $search . "%' OR a.party_type LIKE '%" . $search . "%' OR a.payment_mode LIKE '%" . $search . "%'";
                        
                     }
                     
                     
	                 $query = $this->db->query("SELECT a.* FROM manual_journals as a  WHERE a.deleteid='0' $where ORDER BY a.id DESC LIMIT $offset, $pagesize ");
                     $result=$query->result();
	    
	    

                     $resultdd= $this->Main_model->where_names_order_by('manual_journals','deleteid','0','id','DESC');
                     
                     
                     
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     
                 	      
                 	      
                 	    
                 	      
                 	      
                 	               if($value->party_type=='1')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name,phone FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                                   }
                                   elseif($value->party_type=='2')
                                   {
                                        $query = $this->db->query("SELECT id,name,phone FROM driver  WHERE deleteid='0'  AND id='".$value->get_users."' ORDER BY name ASC");
                                       
                                   }
                                   elseif($value->party_type=='3')
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM vendor  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   elseif($value->party_type=='4')
                                   {
                                       $query = $this->db->query("SELECT id,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY bank_name ASC");
                                   }
                                   elseif($value->party_type=='5')
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM accountheads  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->name;
                                 	    $phone= $valuess->phone;
                 	                 }
                 	     
                 	     
                 	     
                 	         $resultd= $this->Main_model->where_names_order_by('partytype','id',$value->party_type,'id','ASC');
                 	
                 	         foreach ($resultd as  $values) {
                         	     
                         	     $party_name=$values->name;
                         	     
                         	 }
                 	         
                 	     	 $array[] = array(
                 	 	    
                 	 	    
                 	 	        'no' => $i, 
                                'id' => $value->id, 
                                'type' => $party_name,
                                'name' => $partyname.' | '.$phone,
                                'reference_no' => $value->reference_no, 
                                'amount' => $value->amount, 
                                 'account_head_name' => $value->account_head_name, 
                                'journal_id' => $value->journal_id, 
                                 'payment_mode' => $value->payment_mode, 
                                'notes' => $value->notes, 
                                'journal_date' =>date('d-m-Y',strtotime($value->journal_date)), 
                               
                                
                                
                 	     );
                 	 	
                 	 $i++;
                 	 }

                     $myData = array('PortalActivity' => $array, 'totalCount' => count($resultdd));
                     echo json_encode($myData);

	}
	
	
	public function fetch_data_sub()
	{
                     
                     
                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('manual_journals_sub','primary_id',$id,'id','ASC');
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     if($value->deleteid==0)
                 	 	       {
                 	 	          
                 	         
                                     	 	$array[] = array(
                                     	 	    
                                     	 	      
                                     	 	      
                                     	 	        
                                     	 	       
                                     	 	        'account_head_id' => $value->account_head_id, 
                                                    'accountshead' => $value->accountshead, 
                                                    'description' => $value->description, 
                                                    'debits' => $value->debits, 
                                                    'credits' => $value->credits,
                                     	 	      
                                                    
                                                    
                                     	     );
                 	     
                 	 	       }
                 	 	
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
                 	 
                 	 	      $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','4','deleteid','0','id','ASC');              
                    
                 	          foreach($additional_information as $vl)
                              {
                                                        $label_name=strtolower($vl->label_name);
                                                        $output[$label_name]= $value->$label_name; 
                              }
                              
                              
                                   
                 	               if($value->party_type=='1')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name,phone FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                                   }
                                   elseif($value->party_type=='2')
                                   {
                                        $query = $this->db->query("SELECT id,name,phone FROM driver  WHERE deleteid='0'  AND id='".$value->get_users."' ORDER BY name ASC");
                                       
                                   }
                                   elseif($value->party_type=='3')
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM vendor  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   elseif($value->party_type=='4')
                                   {
                                       $query = $this->db->query("SELECT id,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY bank_name ASC");
                                   }
                                   elseif($value->party_type=='5')
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM accountheads  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->name;
                                 	    $phone= $valuess->phone;
                 	                 }
                 	     
                 	     
                              
                              
	                 	       $output['get_users']= $id.'-'.$partyname.'-'.$phone; 
	                 	      //$output['get_users']= $value->get_users; 
	                 	       $output['partyname']= $partyname; 
	                 	       $output['party_type']= $value->party_type; 
	                 	       $output['account_head_id']= $value->account_head_id; 
	                 	       $output['bank_account_id']= $value->bank_account_id; 
	                 	       
                 	 }

                    echo json_encode($output);


    }
	



}	
