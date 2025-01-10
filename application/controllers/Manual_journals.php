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
    
    
    public function newcreate_excess()
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
                                             $this->load->view('manual_journals/add_excess.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
     public function discount_allowed()
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
                                             $this->load->view('manual_journals/discount_allowed.php',$data);


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

                   if($form_data->journal_date=='1970-01-01')
                   {
                       $date= date('Y-m-d');
                   }
                   else
                   {
                       $date= $form_data->journal_date;
                   } 
                   
                   $time= date('h:i:s A');
                

                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->party_type==7)
                     {
                         $form_data->payment_mode=1;
                     }
                     
                     if($form_data->party_type!='' && $form_data->payment_mode!='')
                     {

                                                $tablename=$form_data->tablename;
                                                $bankaccount=$form_data->bankaccount;
                                                
                                                
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
                                                       elseif($form_data->party_type=='6')
                                                       {
                                                           
                                                           
                                                            // $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                            $form_data->party_type=5;
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='7')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                            $form_data->party_type=5;
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='8')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                            $form_data->party_type=8;
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                          // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                                                           //$tableleg="party_ledger";
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           $form_data->party_type=8;
                                                           
                                                           
                                                       }
                                       
                                                  
                                                                    $res=$query->result();
                                                                    foreach($res as $val)
                                                                    {
                                                                            $company_name= $val->name;
                                                                            $account_heads_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                    }
                                                                    
                                                                    
                                                                    if($form_data->party_type==8)
                                                                    {
                                                                            $account_heads_id= 8;
                                                                            $account_heads_id_2= 8;
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

                                                     
                                                     
                                                     
                                                     
                                                         $sizedata['description']=$form_data->notes;
                                                     
                                                     
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
                                                                                   $data_bank['balance']=0;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=0;
                                                                          }
                                                                  
                                                                 }
                                                                 
                                                                 if($sizedata['debits']!='0')
                                                                 {
                                                                     
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=0;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=0;
                                                                          }
                                                                  
                                                                 }
                                                                
                                                                
                                                                
                                                               
                                                                
                                                                $data_bank['debit']=$sizedata['debits'];
                                                                $data_bank['credit']=$sizedata['credits'];
                                                                
                                                                
                                                                
                                                                $data_bank['user_id']=$this->userid;
                                                                
                                                                $data_bank['name']=$company_name;
                                                                


                                                                                     $create_date=date('Y-m-d',strtotime($form_data->journal_date));
                                                                                      
                                                                                      
                                                                                      if($create_date=='1970-01-01')
                                                                                      {
                                                                                          $data_bank['create_date']=date('Y-m-d');
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_bank['create_date']=$create_date;
                                                                                      }


                                                                                       $data_bank['create_time']=$time;




                                                              
                                                                
                                                                
                                                                if($form_data->party_type==4)
                                                                {
                                                                    
                                                                      
                                                                        $data_bank['internal_payment_status']=1;
                                                                        
                                                                      
                                                                 
                                                                }
                                                                
                                                                
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
                                                                //$data_bank['name']=$form_data->notes;
                                                                
                                                                
                                                                
                                                                if($form_data->party_type!=7)
                                                                {

                                                                       if($form_data->party_type==4)
                                                                      {


                                                                        if($bid>0)
                                                                        {


                                                                             $data_bank['deletemod']='JE'.time();
                                                                             $data_bank['name']='Deposit & Withdrawal';
                                                                             $data_bank['single_deposite']=1;
                                                                             $data_bank['status_by']='Manual Journals '.$form_data->notes;
                                                                            
$bankquerycheck = $this->db->query("SELECT id FROM bankaccount_manage  WHERE create_date='".$data_bank['create_date']."' AND create_time='".$data_bank['create_time']."' AND   user_id='".$this->userid."'  AND  debit='".$data_bank['debit']."' AND  credit='".$data_bank['credit']."' AND name='".$data_bank['name']."' AND bank_account_id='".$bid."'");
  $bankquerycheck=$bankquerycheck->result();
    if(count($bankquerycheck)==0)
  {

                                                                             $this->Main_model->insert_commen($data_bank,'bankaccount_manage');

  }





                                                                         }

                                                                      }
                                                                      else
                                                                      {



                                                                      if($form_data->get_users>0)
                                                                      {

                                                                        $data_bank['deletemod']='JE'.$insert_id;
                                                                        $data_bank['status_by']='Manual Journals '.$form_data->notes;
                                                                      
 $bankquerycheck = $this->db->query("SELECT id FROM bankaccount_manage  WHERE create_date='".$data_bank['create_date']."' AND create_time='".$data_bank['create_time']."' AND user_id='".$this->userid."'  AND  debit='".$data_bank['debit']."' AND  credit='".$data_bank['credit']."' AND name='".$data_bank['name']."' AND bank_account_id='".$bid."'");
  $bankquerycheck=$bankquerycheck->result();
   if(count($bankquerycheck)==0)
  {


                                                                        $this->Main_model->insert_commen($data_bank,'bankaccount_manage');

}



                                                                      }



                                                                      }
                                                                     
                                                                }
                                                                
                                                               
                                                                  
                                                      }
                                                      
                                                      
                                                      
                                                      
                                                      if($form_data->get_users>0)
                                                     {
                                                       
                                                     if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }

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
                                                                                       
                                                                                        if($form_data->payment_mode == 'Cash'){
                                                                                        $data_driver['payment_mode']=0;
                                                                                       }else{
                                                                                        $data_driver['payment_mode']=$form_data->payment_mode;
                                                                                       }
                                                                                       
                                                                                       $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                                                       
                                                                                      
                                                                                      if($form_data->party_type==7)
                                                                                      {
                                                                                            $data_driver['reference_no']=$form_data->bill_no;
                                                                                            $data_driver['order_no']='JE-'.$insert_id; 
                                                                                            $data_driver['cash_trasfer_status']=0;
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          
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
                                                                                      
                                                                                          
                                                                                      }
                                                                                       
                                                                                       
                                                                                      
                                                                                      
                                                                                       $data_driver['amount']=0;
                                                                                       $data_driver['balance']=0;
                                                                                       $data_driver['notes']=$form_data->notes;
                                                                                       if($sizedata['credits']!='')
                                                                                       {
                                                                                                
                                                                                                 if($sizedata['credits']!=0)
                                                                                              {
                                                                                                      if($balancetotal==0)
                                                                                                      {   
                                                                                                           $data_driver['balance']=0;
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                           
                                                                                                            $data_driver['balance']=0;
                                                                                                      }
                                                                                                      
                                                                                                      
                                                                                                      
                                                                                              }
                                                                                                      
                                                                                                      
                                                                                                   
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']!='')
                                                                                        { 
                                                                                            
                                                                                              if($sizedata['debits']!=0)
                                                                                              {
                                                                                                  
                                                                                              
                                                                                                if($balancetotal==0)
                                                                                                 {
                                                                                                      $data_driver['balance']=0;
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                                              
                                                                                                       
                                                                                                      $data_driver['balance']=0;
                                                                                                 } 
                                                                                                 
                                                                                              } 
                                                                                                 
                                                                                                  
                                                                                        }
                                                                                     
                                                                           
                                                                
                                                                                      
                                                                                      $data_driver['payout']=$sizedata['credits'];
                                                                                      $data_driver['debits']=$sizedata['debits'];
                                                                                      $data_driver['credits']=$sizedata['credits'];
                                                                                      $data_driver['paid_status']='1';
                                                                                      $data_driver['process_by']='Manual Journals';
                                                                                      $data_driver['deletemod']='JE'.$insert_id;


                                                                                      $payment_date=date('Y-m-d',strtotime($form_data->journal_date));
                                                                                      
                                                                                      
                                                                                      if($payment_date=='1970-01-01')
                                                                                      {
                                                                                          $data_driver['payment_date']=date('Y-m-d');
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_driver['payment_date']=$payment_date;
                                                                                      }
                                                                                                                                                                           





                                                                                      $data_driver['payment_time']=$time;
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      if($form_data->party_type==1)
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= 123; 
                                                                                          $data_driver['account_head_id']=68;
                                                                                      
                                                                                      }
                                                                                      elseif($form_data->party_type==5)
                                                                                      {  
                                                                                          if($form_data->expense_head==0)
                                                                                          {
                                                                                               $data_driver['account_heads_id_2']= $account_heads_id; 
                                                                                               $data_driver['account_head_id']=$account_heads_id;   
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                                $data_driver['account_heads_id_2']= $form_data->expense_head; 
                                                                                                $data_driver['account_head_id']=$form_data->expense_head;
                                                                                              
                                                                                          }
                                                                                          
                                                                                      
                                                                                      }
                                                                                      elseif($form_data->party_type==7)
                                                                                      {
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                          $data_driver['account_heads_id_2']= $form_data->expense_head; 
                                                                                         
                                                                                      
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= $account_heads_id_2; 
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                        
                                                                                      }
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      $data_driver['bank_id']=$bankaccount;
                                                                                      
                                                                                      
                                                                                      if($form_data->get_users>0)
                                                                                      {


$querycheck = $this->db->query("SELECT id FROM $tableleg  WHERE party_type='".$form_data->party_type."' AND bank_id='".$data_driver['bank_id']."' AND customer_id='".$form_data->get_users."' AND  user_id='".$this->userid."' AND  payment_date='".$data_driver['payment_date']."' AND payment_time='".$data_driver['payment_time']."' AND  debits='".$data_driver['debits']."' AND  credits='".$data_driver['credits']."'");
  $querycheck=$querycheck->result();
   if(count($querycheck)==0)
  {


                                         if(isset($form_data->type))
                                        {
                                            
                                            if($form_data->party_type==2)
                                            {


                                                $data_driver['driver_collection_status']= $form_data->type;
                                            

                                            }       
                                        
                                        }


                                                                         $this->Main_model->insert_commen($data_driver,$tableleg);

  }



                                                                                      }
                                                                                     
                                                                               
                                                                              
                                                                                   
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
                 
                 
                 
                 
                 
                 
                   if($form_data->action=='Creatediscount')
                 {
                     
                     if($form_data->party_type==7)
                     {
                         $form_data->payment_mode=1;
                     }
                     
                     if($form_data->party_type!='')
                     {

                                                $tablename=$form_data->tablename;
                                                $bankaccount=$form_data->bankaccount;
                                                
                                                
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
                                                       elseif($form_data->party_type=='6')
                                                       {
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='7')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='8')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
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
                                                                    
                                                                    
                                                                    if($form_data->party_type==8)
                                                                    {
                                                                            $account_heads_id= 8;
                                                                            $account_heads_id_2= 8;
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
                                                       
                                                        
                                               
                                                       
                                                         
                                                 
                                                       
                                                  
                                               if($form_data->get_users>0)
                                               {


                                               $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                               
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
                                                     
                                                     $sizedata['primary_id']=$insert_id;
                                                     
                                                     
                                                     
                                                                    
                                                          $sizedata['accountshead']=$names;
                                                          $sizedata['account_head_id']=$account_heads_id;

                                                     
                                                     
                                                     
                                                     
                                                         $sizedata['description']=$form_data->notes;
                                                     
                                                     
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

                                                     if($form_data->get_users>0)
                                                    {   
                                                  
                                                     if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE manual_journals SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }

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
                                                                                       
                                                                                      
                                                                                      if($form_data->party_type==7)
                                                                                      {
                                                                                            $data_driver['reference_no']=$form_data->bill_no;
                                                                                            $data_driver['order_no']='JE-'.$insert_id; 
                                                                                            $data_driver['cash_trasfer_status']=0;
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          
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
                                                                                      
                                                                                          
                                                                                      }
                                                                                       
                                                                                       
                                                                                      
                                                                                      
                                                                                       $data_driver['amount']=0;
                                                                                       $data_driver['balance']=0;
                                                                                       $data_driver['notes']=$form_data->notes;
                                                                                       if($sizedata['credits']!='')
                                                                                       {
                                                                                                
                                                                                                 if($sizedata['credits']!=0)
                                                                                              {
                                                                                                      if($balancetotal==0)
                                                                                                      {   
                                                                                                           $data_driver['balance']=0;
                                                                                                      }
                                                                                                      else
                                                                                                      {
                                                                                                           
                                                                                                            $data_driver['balance']=0;
                                                                                                      }
                                                                                                      
                                                                                                      
                                                                                                      
                                                                                              }
                                                                                                      
                                                                                                      
                                                                                                   
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']!='')
                                                                                        { 
                                                                                            
                                                                                              if($sizedata['debits']!=0)
                                                                                              {
                                                                                                  
                                                                                              
                                                                                                if($balancetotal==0)
                                                                                                 {
                                                                                                      $data_driver['balance']=0;
                                                                                                 }
                                                                                                 else
                                                                                                 {
                                                                                                                              
                                                                                                       
                                                                                                      $data_driver['balance']=0;
                                                                                                 } 
                                                                                                 
                                                                                              } 
                                                                                                 
                                                                                                  
                                                                                        }
                                                                                     
                                                                           
                                                                
                                                                                      
                                                                                      $data_driver['payout']=$sizedata['credits'];
                                                                                      $data_driver['debits']=$sizedata['debits'];
                                                                                      $data_driver['credits']=$sizedata['credits'];
                                                                                      $data_driver['paid_status']='1';
                                                                                      $data_driver['reference_no']='Manual Journals Discount';
                                                                                      $data_driver['process_by']='Manual Journals';
                                                                                      $data_driver['deletemod']='JE'.$insert_id;
                                                                                      



                                                                                      $payment_date=date('Y-m-d',strtotime($form_data->journal_date));
                                                                                      if($payment_date=='1970-01-01')
                                                                                      {
                                                                                          $data_driver['payment_date']=date('Y-m-d');
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_driver['payment_date']=$payment_date;
                                                                                      }                                                                                      

                                                                                            $data_driver['payment_time']=$time;
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      if($form_data->party_type==1)
                                                                                      {

                                                                                        
                                                                                          $data_driver['account_heads_id_2']= 147; 
                                                                                          $data_driver['account_head_id']=147;
                                                                                      
                                                                                      }
                                                                                      elseif($form_data->party_type==5)
                                                                                      {  
                                                                                          if($form_data->expense_head==0)
                                                                                          {
                                                                                               $data_driver['account_heads_id_2']= $account_heads_id; 
                                                                                               $data_driver['account_head_id']=$account_heads_id;   
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                                $data_driver['account_heads_id_2']= $form_data->expense_head; 
                                                                                                $data_driver['account_head_id']=$form_data->expense_head;
                                                                                              
                                                                                          }
                                                                                          
                                                                                      
                                                                                      }
                                                                                      elseif($form_data->party_type==7)
                                                                                      {
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                          $data_driver['account_heads_id_2']= $form_data->expense_head; 
                                                                                         
                                                                                      
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $data_driver['account_heads_id_2']= $account_heads_id_2; 
                                                                                          $data_driver['account_head_id']=$account_heads_id;
                                                                                        
                                                                                      }
                                                                                      
                                                                                      
                                                                                      
                                                                                      
                                                                                      $data_driver['bank_id']=$bankaccount;
                                                                                      
                                                                                      
                                                                                     if($form_data->get_users>0)
                                                                                     {


$querycheck = $this->db->query("SELECT id FROM $tableleg  WHERE party_type='".$form_data->party_type."' AND bank_id='".$data_driver['bank_id']."' AND customer_id='".$form_data->get_users."' AND  user_id='".$this->userid."' AND  payment_date='".$data_driver['payment_date']."' AND payment_time='".$data_driver['payment_time']."' AND  debits='".$data_driver['debits']."' AND  credits='".$data_driver['credits']."'");
  $querycheck=$querycheck->result();
   if(count($querycheck)==0)
  {


                                                                                       $this->Main_model->insert_commen($data_driver,$tableleg);


   }

                                                                                       $data_driver['customer_id']=220;
                                                                                       $data_driver['notes']=$form_data->notes.' '.$company_name;


                                                                                        if($sizedata['credits']>0)
                                                                                        {
                                                                                                
                                                                                                $data_driver['debits']=$sizedata['credits'];  
                                                                                                $data_driver['credits']=0;
                                                                                                   
                                                                                              
                                                                                        }
                                                                                        if($sizedata['debits']>0)
                                                                                        { 
                                                                                            

                                                                                                 $data_driver['credits']=$sizedata['debits']; 
                                                                                                 $data_driver['debits']=0;

                                                                                             
                                                                                                  
                                                                                        }



                                                                                       $data_driver['account_heads_id_2']= 151; 
                                                                                       $data_driver['account_head_id']=151;
                                                                                       $data_driver['party_type']=5;

$querycheck = $this->db->query("SELECT id FROM $tableleg  WHERE party_type='5' AND bank_id='".$data_driver['bank_id']."' AND customer_id='220' AND  user_id='".$this->userid."' AND  payment_date='".$data_driver['payment_date']."' AND payment_time='".$data_driver['payment_time']."' AND  debits='".$data_driver['debits']."' AND  credits='".$data_driver['credits']."'");
  $querycheck=$querycheck->result();
   if(count($querycheck)==0)
  {

                                                                                       $this->Main_model->insert_commen($data_driver,$tableleg);

  }


                                                                                     }
                                                                                     
                                                                               
                                                                              
                                                                                   
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



                  if($form_data->action=='discount_request')
                 {
                     
                     
                     if($form_data->party_type!='')
                     {


                        $credits_value_data=$form_data->credits_value_data;

                                               
                                              
                                                  
                 $tableleg="0";
                                                      
                 $query = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                 $tableleg="all_ledgers";
                                                      
                                                       
                                                      
                                       
                                                  
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                            $company_name= $val->name;
                                                                            $account_heads_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                       }
                                                                    
                                                                 
                                                       
                                          
                                               
                              $data_driver['party_type']=$form_data->party_type;
                              $data_driver['order_id']=0;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$form_data->get_users;
                              $data_driver['payment_mode']=0;
                              $data_driver['payment_mode_payoff']=0;
                             
                              $data_driver['cash_trasfer_status']=0;
                              $data_driver['order_no']='DISCOUNT';
                              $data_driver['amount']=$form_data->closeing;
                              $data_driver['balance']=0;
                              $data_driver['notes']=$form_data->notes;
                              $data_driver['payout']=$credits_value_data;
                              $data_driver['debits']=0;
                              $data_driver['credits']=$credits_value_data;
                              $data_driver['paid_status']='1';
                              $data_driver['reference_no']='Discount Requested';
                              $data_driver['process_by']='Discount Requested';
                              
                              $data_driver['payment_date']=date('Y-m-d');
                              $data_driver['payment_time']=$time;
                              $data_driver['account_heads_id_2']= 147; 
                              $data_driver['account_head_id']=147;
                              $data_driver['bank_id']=0;
                              $data_driver['deleteid']=147;
                              $data_driver['md_verification']=147;

                              
                                                                                      
                                                                                      
                             if($form_data->get_users>0)
                             {


$querycheck = $this->db->query("SELECT id FROM $tableleg  WHERE party_type='".$form_data->party_type."' AND bank_id='".$data_driver['bank_id']."' AND customer_id='".$form_data->get_users."' AND  user_id='".$this->userid."' AND  payment_date='".$data_driver['payment_date']."' AND payment_time='".$data_driver['payment_time']."' AND  debits='".$data_driver['debits']."' AND  credits='".$data_driver['credits']."'");
  $querycheck=$querycheck->result();
   if(count($querycheck)==0)
  {

     $insert_id=$this->Main_model->insert_commen($data_driver,$tableleg);
     $data_driver['deletemod']='CBR'.$insert_id;
     $this->db->query("UPDATE $tableleg SET deletemod='".$data_driver['deletemod']."' WHERE  id='".$insert_id."'");

   }

                                                                $data_driver['customer_id']=220;
                                                                $data_driver['notes']=$form_data->notes.' '.$company_name;
                                                                $data_driver['debits']=$data_driver['credits'];  
                                                                $data_driver['credits']=0;
                                                                $data_driver['account_heads_id_2']= 151; 
                                                                $data_driver['account_head_id']=151;
                                                                $data_driver['party_type']=5;

$querycheck = $this->db->query("SELECT id FROM $tableleg  WHERE party_type='5' AND bank_id='".$data_driver['bank_id']."' AND customer_id='220' AND  user_id='".$this->userid."' AND  payment_date='".$data_driver['payment_date']."' AND payment_time='".$data_driver['payment_time']."' AND  debits='".$data_driver['debits']."' AND  credits='".$data_driver['credits']."'");
  $querycheck=$querycheck->result();
   if(count($querycheck)==0)
  {

     $this->Main_model->insert_commen($data_driver,$tableleg);

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
                     
                     
                                                                                      $date=date('Y-m-d',strtotime($form_data->journal_date));
                                                                                      if($date=='1970-01-01')
                                                                                      {
                                                                                          $date=date('Y-m-d');
                                                                                      }
                                                                                      else
                                                                                      {
                                                                                          $date=$date;
                                                                                      }
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
                                          if($party_type=='9')
                                          {
                                              $sql=' AND bank_name LIKE "%'.$search.'%" OR account_no LIKE "%'.$search.'%"';
                                              
                                          }
                                          if($party_type=='6')
                                          {
                                              $sql=' AND name LIKE "%'.$search.'%"';
                                              
                                          }
                                         
                                     }
                     
                                   if($party_type=='1')
                                   {
                                       $query = $this->db->query("SELECT id,deleteid,company_name as name,phone FROM customers  WHERE deleteid='0' AND approved_status>0 $sql ORDER BY company_name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='2')
                                   {
                                        $query = $this->db->query("SELECT id,deleteid,name,phone FROM driver  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='3')
                                   {
                                        $query = $this->db->query("SELECT id,deleteid,name,phone FROM vendor  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='4')
                                   {
                                       $query = $this->db->query("SELECT id,deleteid,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='9')
                                   {
                                       $query = $this->db->query("SELECT id,deleteid,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' AND id=25 $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='5')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                               
                                   }
                                   elseif($party_type=='6')
                                   {
                                      // $query = $this->db->query("SELECT id,deleteid,name FROM accountheads_sub_group  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");

                                     $query = $this->db->query("SELECT id,deleteid,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                               
                                   }
                                   elseif($party_type=='7')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='8')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM admin_users  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   else
                                   {
                                   
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM partyusers  WHERE deleteid='0'  $sql ORDER BY name ASC");
                                      
                                   }
                                   
                                  
                                  
                                   $res= $query->num_rows();
                                   $result=$query->result();
                     
                     
                                 	 $array=array();
                                 	 $i=1;
                                 	 
                                 	 if($party_type!='')
                                 	 {
                                 	     
                                 	 
                                 	            if($party_type==6)
                                 	            {
                                 	                
                                 	                
                                         	                foreach ($result as  $value) 
                                         	                {
                                                     	     
                                                                     	    if($value->deleteid=='0')
                                                                     	    {
                                                     	        
                                                     	    
                                                                     	    if($value->id!='2' && $value->id!='120') 
                                                                     	    {
                                                                     	        
                                                                     	   
                                                                     	     
                                                                     	    $array[] = $value->id.'-'.$value->name;
                                                                     	    
                                                                     	    }
                                                                     	    
                                                                     	    
                                                     	                     }
                                                     	    
                                                     	 	
                                                     	    } 
                                             	    
                                             	    
                                 	            }
                                 	            else
                                 	            {
                                 	                
                                 	                
                                 	                foreach ($result as  $value)
                                 	                {
                                 	                     if($value->deleteid=='0')
                                                         {

                                                              if($party_type==2)
                                                              {


                                                                if(isset($form_data->type))
                                                                {




                                                                        if($form_data->type==1)
                                                                        {
                                                                           
                                                                             $value->name='RENT '.$value->name;
                                                                           
                                                                        }
                                                                        else
                                                                        {
                                                                            $value->name='COLLECTION '.$value->name;
                                                                        }


                                                                }



                                                             }
                                             	     
                                             	    $array[] = $value->id.'-'.$value->name.'-'.$value->phone;
                                             	    
                                                         }
                                             	 	
                                             	    } 
                                             	    
                                             	    
                                 	            }
                                             	 
                                             	 
                                 	 
                                 	 
                                 	 
                                 	 }

                    echo json_encode($array);

	}
	
	
	public function userget_commen()
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
                                          if($party_type=='6')
                                          {
                                              $sql=' AND name LIKE "%'.$search.'%"';
                                              
                                          }
                                         
                                     }
                     
                                   if($party_type=='1')
                                   {
                                       $query = $this->db->query("SELECT id,deleteid,company_name as name,phone FROM customers  WHERE deleteid='0' AND mark_vendor_id>0  ORDER BY company_name ASC");
                                   }
                                   elseif($party_type=='2')
                                   {
                                        $query = $this->db->query("SELECT id,deleteid,name,phone FROM driver  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='3')
                                   {
                                        $query = $this->db->query("SELECT id,deleteid,name,phone FROM vendor  WHERE deleteid='0' AND mark_customer_id>0 $sql ORDER BY name ASC LIMIT 0,50");
                                       
                                   }
                                   elseif($party_type=='4')
                                   {
                                       $query = $this->db->query("SELECT id,deleteid,bank_name as name,account_no as phone FROM bankaccount  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='5')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                               
                                   }
                                   elseif($party_type=='6')
                                   {
                                      
                                      $query = $this->db->query("SELECT id,deleteid,name FROM accountheads_sub_group  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                      
                               
                                   }
                                   elseif($party_type=='7')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM accountheads  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   elseif($party_type=='8')
                                   {
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM admin_users  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                                   }
                                   else
                                   {
                                   
                                      $query = $this->db->query("SELECT id,deleteid,name,phone FROM partyusers  WHERE deleteid='0'  $sql ORDER BY name ASC");
                                      
                                   }
                                   
                                  
                                  
                                   $res= $query->num_rows();
                                   $result=$query->result();
                     
                     
                                 	 $array=array();
                                 	 $i=1;
                                 	 
                                 	 if($party_type!='')
                                 	 {
                                 	     
                                 	 
                                 	            if($party_type==6)
                                 	            {
                                 	                
                                 	                
                                         	                foreach ($result as  $value) 
                                         	                {
                                                     	     
                                                                     	    if($value->deleteid=='0')
                                                                     	    {
                                                     	        
                                                     	    
                                                                     	    if($value->id!='2' && $value->id!='120') 
                                                                     	    {
                                                                     	        
                                                                     	   
                                                                     	     
                                                                     	    $array[] = $value->id.'-'.$value->name;
                                                                     	    
                                                                     	    }
                                                                     	    
                                                                     	    
                                                     	                     }
                                                     	    
                                                     	 	
                                                     	    } 
                                             	    
                                             	    
                                 	            }
                                 	            else
                                 	            {
                                 	                
                                 	                
                                 	                foreach ($result as  $value)
                                 	                {
                                 	                     if($value->deleteid=='0')
                                                         {
                                             	     
                                             	    $array[] = $value->id.'-'.$value->name.'-'.$value->phone;
                                             	    
                                                         }
                                             	 	
                                             	    } 
                                             	    
                                             	    
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
	
	
	
	
	
		public function fetch_get_accounthead()
	{
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     
                   
                   
                     
                     $tablename=$form_data->tablename;
                     $id=$form_data->id; 
                     $pp=explode('-', $id);
                     $id=$pp[0];
                      $account_heads_id_multipel_array=array();
                      $resultaccountheads= $this->Main_model->where_names_order_by('accountheads','id',$id,'id','ASC');
                      foreach($resultaccountheads as $val)
                      {
                          $account_heads_id_multipel=$val->account_heads_id_multipel;
                          $account_heads_id=$val->account_heads_id;
                          
                          if($account_heads_id_multipel!=0)
                          {
                              $account_heads_id_multipel_array=explode('|', $account_heads_id_multipel);
                          }
                          else
                          {
                              $account_heads_id_multipel_array=explode('|', $account_heads_id);
                          }
                          
                      }
                   
                     $result= $this->Main_model->where_names_order_by('accountheads_sub_group','deleteid',0,'id','ASC');
                 	 $array=array();
                 	 $i=1;
                 	 $ex=array(10,8,7,6,3,12);           
                 	 foreach ($result as  $value) {
                 	    
                 	                    
                 	                    
                 	                    if($tablename==5)
                 	                    {
                 	                        
                 	                                if(in_array($value->id,$account_heads_id_multipel_array))
                                                    {
                                                                           
                                                         	 	$array[] = array(
                                                         	 	    
                                                         	 	      
                                                         	 	        'id' => $value->id, 
                                                                        'name' => $value->name
                                                         	 	      
                                                         	     );
                                             	     
                                                    }
                 	                        
                 	                    }
                 	                    else
                 	                    {
                 	                        
                         	                        if(in_array($value->account_type,$ex))
                                                    {
                                                                           
                                                         	 	$array[] = array(
                                                         	 	    
                                                         	 	      
                                                         	 	        'id' => $value->id, 
                                                                        'name' => $value->name
                                                         	 	      
                                                         	     );
                                             	     
                                                    }
                 	                        
                 	                    }
                 	                         
                                            
                 	     
                 	 	       
                 	 	
                 	 $i++;
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	                                   $tableleg="0";
                 	                                   $form_data->party_type=$tablename;
                 	                                   $form_data->get_users=$id;
                 	                                  
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
                                                       elseif($form_data->party_type=='6')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='7')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       elseif($form_data->party_type=='8')
                                                       {
                                                           
                                                           
                                                            $query = $this->db->query("SELECT id,name,id as account_heads_id,id as account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                            $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                          // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                                                           //$tableleg="party_ledger";
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="all_ledgers";
                                                           
                                                           
                                                       }
                                       
                                                                    $status=0;
                                                                    $res=$query->result();
                                                                    
                                                                    
                                                                    
                                                                    if(count($res)>0)
                                                                    {
                                                                        
                                                                    
                                                                            foreach($res as $val)
                                                                            {
                                                                                    $userid= $val->id;
                                                                                   
                                                                            }
                                                                            $status=1;
                                                                    }
                                                                  
                 	 
                 	                               
                 	              
                 	 if($status==0)
                 	 {
                 	       $array=array('error'=>'0','massage'=>'User Not Found');
                           echo json_encode($array);
                 	 }
                 	 else
                 	 {
                 	       echo json_encode($array);
                 	 }
                 	   
          
                   
                    
                    
                    
                    
                    
                    
                    
                    

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
                                   elseif($value->party_type=='6')
                                   {
                                       $query = $this->db->query("SELECT id,name,balance as phone FROM accountheads_sub_group  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
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
