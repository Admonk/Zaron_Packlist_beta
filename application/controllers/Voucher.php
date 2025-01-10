<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '4400M');

class Voucher extends CI_Controller {

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
                                            
                                             $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Voucher List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('voucher/index.php',$data);


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
                                             $data['title']    = 'voucher add';
                                             
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                               $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','DESC');
                                          
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('voucher/add.php',$data);


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
                                             $data['title']    = 'Voucher Edit';
                                                $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','DESC');
                                          
                                              $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');
                                           $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('voucher/edit.php',$data);


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
                                             $data['title']    = 'Voucher Invoice';
                                             
                                              $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');
                                           $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('voucher/invoice.php',$data);


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
                     
                     if($form_data->account_head_id!='' || $form_data->party_type!='' || $form_data->get_users!='')
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
                                                
                                                
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');              
                                                foreach($additional_information as $vl)
                                                {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                }
                                                      $data['party_type']= $form_data->party_type; 
                                                      $pp=explode('-', $form_data->get_users);
                                                      $form_data->get_users=$pp[0];
                                                      $data['get_users']= $form_data->get_users;
                                                      
                                                      
                                                      
                                                                     $reshh = $this->Main_model->where_names('accountheads','id',$form_data->account_head_id);
                                                                    
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                   
                                                                    $data['account_head_id']= $form_data->account_head_id; 
                                                                    $data['account_head_name']= $names; 
                                                  
                                                  
                                                  
                                     
                                     
                                                        $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                               
                                                       $tableleg="0";
                                                       if($form_data->party_type=='Customer')
                                                       {
                                                           $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                                                           $tableleg="customer_ledger";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='Driver')
                                                       {
                                                            $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0'  AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                          $tableleg="driver_ledger"; 
                                                       }
                                                       elseif($form_data->party_type=='Vendor')
                                                       {
                                                           $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="vendor_ledger";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='Employee')
                                                       {
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="employee_ledger";
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                           //$query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0' AND  id='".$form_data->get_users."' ORDER BY name ASC");
                                                           //$tableleg="party_ledger";
                                                           
                                                           $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="employee_ledger";
                                                           
                                                       }
                                       
                                                  
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                $company_name= $val->name;
                                                       }
                                                       
                                                       
                                                       
                                                       
                                                          if($tableleg!="0")
                                                         {
                                                             
                                                             
                                                                    
                                                                     $res = $this->Main_model->where_names_limit_base($tableleg,'customer_id',$form_data->get_users,1);
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
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']=$form_data->voucher_id;
                                                                
                                                                
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
                                                                
                                                                
                                                                $data_bank['name']=$company_name;
                                                                $data_bank['deletemod']='VI'.$insert_id;
                                                                $data_bank['create_date']=date('Y-m-d');
                                                                $data_bank['status_by']='Voucher '.$names;
                                                                $data_bank['account_head_id']=$form_data->account_head_id;
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                  
                                                          
                                                      if($tableleg!="0")
                                                      {
                                                             
                                                             
                                                             
                                                                               $data_driver['order_id']=0;
                                                                               $data_driver['user_id']=$this->userid;
                                                                               $data_driver['customer_id']=$form_data->get_users;
                                                                               $data_driver['payment_mode']=$form_data->payment_mode;
                                                                               $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                                             
                                                                               if($form_data->payment_mode=='Cash')
                                                                               {
                                                                                $data_driver['reference_no']='';
                                                                                $data_driver['order_no']='Cash Payment';  
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
                                                                                             
                                                                              
                                                                             
                                                                              
                                                                              $data_driver['debits']=$sizedata['debits'];
                                                                              $data_driver['credits']=$sizedata['credits'];
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Voucher';
                                                                              $data_driver['deletemod']='VI'.$insert_id;
                                                                              $data_driver['payment_date']=$date;
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['account_head_id']=$form_data->account_head_id;
                                                                              $this->Main_model->insert_commen($data_driver,$tableleg);
                                                                                     
                                                                                     
                                                             
                                                      }
                                                      
                                                      
                                                      
                                                      if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE voucher SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE voucher SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$insert_id."'");
                                                     
                                                     }
                                                      
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'voucher_sub');
                                            
                                                  }
                            
                                              }
                                              
                                              
                                            $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Voucher successfully Added..');
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
                     
                     
                   $date= $form_data->voucher_date;

                   	 if($form_data->account_head_id!='' || $form_data->party_type!='' || $form_data->get_users!='')
                     {                          
                         
                                               // $this->Main_model->delete_where_by('voucher_sub','primary_id',$form_data->id);
                                                  $idset='VI'.$form_data->id;
                                                $this->db->query("UPDATE voucher_sub SET deleteid='1' WHERE deleteid='0' AND primary_id='".$form_data->id."'");
                                                
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
                                                $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');              
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
                                                  
                                                  
                                                  
                                                        
                                                    $reshh = $this->Main_model->where_names('accountheads','id',$form_data->account_head_id);
                                                                    
                                                                     foreach($reshh as $valhh)
                                                                     {
                                                                         $names=$valhh->name;
                                                                     }
                                                    $data['account_head_id']= $form_data->account_head_id; 
                                                    $data['account_head_name']= $names;
                                                  
                                                  
                                                  
                                                  
                                                  
                                                   $tableleg="0";
                                                       if($form_data->party_type=='Customer')
                                                       {
                                                           $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY company_name ASC");
                                                           $tableleg="customer_ledger";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='Driver')
                                                       {
                                                            $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0'  AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                          $tableleg="driver_ledger"; 
                                                       }
                                                       elseif($form_data->party_type=='Vendor')
                                                       {
                                                           $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="vendor_ledger";
                                                      
                                                       }
                                                       elseif($form_data->party_type=='Employee')
                                                       {
                                                           
                                                           
                                                           $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="employee_ledger";
                                                           
                                                           
                                                       }
                                                       else
                                                       {
                                                          // $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0'  id='".$form_data->get_users."' ORDER BY name ASC");
                                                          // $tableleg="party_ledger";
                                                          
                                                            
                                                           $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$form_data->get_users."' ORDER BY name ASC");
                                                           $tableleg="employee_ledger";
                                                           
                                                          
                                                           
                                                       }
                                        $this->db->query("UPDATE $tableleg SET deleteid='1' WHERE deleteid='0' AND deletemod='".$idset."'");
                                                  
                                                  
                                                       $res=$query->result();
                                                       foreach($res as $val)
                                                       {
                                                                $company_name= $val->name;
                                                       }
                                                       
                                                       
                                                       
                                                       
                                                          if($tableleg!="0")
                                                         {
                                                             
                                                             
                                                                    
                                                                     $res = $this->Main_model->where_names_limit_base($tableleg,'customer_id',$form_data->get_users,1);
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
                                                     
                                                     
                                                     
                                                     
                                                                     $reshh = $this->Main_model->where_names('accountheads','id',$accountshead_value_data[$i]);
                                                                     $balancetotal=0;
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
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'voucher_sub');
                                                     
                                                     
                                                     
                                                     
                                                      
                                                      
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
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
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']=$form_data->voucher_id;
                                                                
                                                                
                                                                
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
                                                                $data_bank['name']=$company_name;
                                                                $data_bank['deletemod']='VI'.$form_data->id;
                                                                $data_bank['create_date']=$date;
                                                                $data_bank['status_by']='Voucher '.$names;
                                                                $data_bank['account_head_id']=$form_data->account_head_id;
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                  
                                                  
                                                  
                                                   
                                                  
                                                  
                                                     
                                                       if($sizedata['credits']!='0')
                                                     {
                                                         $this->db->query("UPDATE voucher SET amount='".$sizedata['credits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$form_data->id."'");
                                                     
                                                     }
                                                     
                                                     
                                                     if($sizedata['debits']!='0')
                                                     {
                                                         $this->db->query("UPDATE voucher SET amount='".$sizedata['debits']."',bank_account_id='".$bid."',bank_account_name='".$bank_name."' WHERE  id='".$form_data->id."'");
                                                     
                                                     }
                                                      
                                                      
                                                  
                                                          
                                                      if($tableleg!="0")
                                                      {
                                                             
                                                             
                                                             
                                                                               $data_driver['order_id']=0;
                                                                               $data_driver['user_id']=$this->userid;
                                                                               $data_driver['customer_id']=$form_data->get_users;
                                                                               $data_driver['payment_mode']=$form_data->payment_mode;
                                                                               $data_driver['payment_mode_payoff']=$form_data->payment_mode;
                                                                             
                                                                               if($form_data->payment_mode=='Cash')
                                                                               {
                                                                                $data_driver['reference_no']='';
                                                                                $data_driver['order_no']='Cash Payment';  
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
                                                                                             
                                                                              
                                                                             
                                                                              
                                                                              $data_driver['debits']=$sizedata['debits'];
                                                                              $data_driver['credits']=$sizedata['credits'];
                                                                              
                                                                              
                                                                              
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Voucher';
                                                                              $data_driver['deletemod']='VI'.$form_data->id;
                                                                              $data_driver['payment_date']=$date;
                                                                              $data_driver['payment_time']=$time;
                                                                               $data_driver['account_head_id']=$form_data->account_head_id;
                                                                              $this->Main_model->insert_commen($data_driver,$tableleg);
                                                                                     
                                                                                     
                                                             
                                                      }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                            
                                                  }
                            
                                              }
                                                
                                                $this->Main_model->update_commen($data,$tablename);
                                                
                                                
                          $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Voucher successfully Updated..');
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
                     $this->db->query("UPDATE voucher_sub SET deleteid='1' WHERE primary_id='".$id."'");
                     
                     $this->db->query("UPDATE bankaccount_manage SET deleteid='1' WHERE deletemod='VI".$id."'");
                     $this->db->query("UPDATE customer_ledger SET deleteid='1' WHERE deletemod='VI".$id."'");
                     $this->db->query("UPDATE vendor_ledger SET deleteid='1' WHERE deletemod='VI".$id."'");
                     $this->db->query("UPDATE driver_ledger SET deleteid='1' WHERE deletemod='VI".$id."'");
                     $this->db->query("UPDATE employee_ledger SET deleteid='1' WHERE deletemod='VI".$id."'");
                     

                 }
                
                


	}
	public function userget()
	{
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                 
                     $party_type=$form_data->party_type;
                     
                   
                     
                                    if($party_type=='Customer')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' ORDER BY company_name ASC");
                                   }
                                   elseif($party_type=='Driver')
                                   {
                                        $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0'  ORDER BY name ASC");
                                       
                                   }
                                   elseif($party_type=='Vendor')
                                   {
                                       $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' ORDER BY name ASC");
                                   }
                                   elseif($party_type=='Employee')
                                   {
                                       $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' ORDER BY name ASC");
                                   }
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name FROM partyusers  WHERE deleteid='0'  ORDER BY name ASC");
                                   }
                                   
                                   
                                  
                                  
                                   $res= $query->num_rows();
                                   $result=$query->result();
                     
                     
                                 	 $array=array();
                                 	 $i=1;
                                 	 
                                 	 
                                 	 if($party_type!='')
                                 	 {
                                 	            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	         
                                 	 	$array[] = array(
                                 	 	    
                                 	 	    
                                 	 	         'no' => $i, 
                                                'id' => $value->id, 
                                                'name' => $value->name 
                                               
                                                
                                                
                                 	     );
                                 	 	
                                 	 $i++;
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
                     
                     
	                 $query = $this->db->query("SELECT a.* FROM voucher as a  WHERE a.deleteid='0' $where ORDER BY a.id DESC LIMIT $offset, $pagesize ");
                     $result=$query->result();
                     

                     $result= $this->Main_model->where_names_order_by('voucher','deleteid','0','id','DESC');
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     
                 	      
                 	      
                 	    
                 	      
                 	      
                 	               if($value->party_type=='Customer')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                                   }
                                   elseif($value->party_type=='Driver')
                                   {
                                        $query = $this->db->query("SELECT id,name FROM driver  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                       
                                   }
                                   elseif($value->party_type=='Vendor')
                                   {
                                       $query = $this->db->query("SELECT id,name FROM vendor  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->name;
                 	                 }
                 	     
                 	         
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	        'no' => $i, 
                                'id' => $value->id, 
                                'type' => $value->party_type,
                                'name' => $partyname,
                                'amount' => $value->amount, 
                                'reference_no' => $value->reference_no, 
                                  'account_head_name' => $value->account_head_name, 
                                'voucher_id' => $value->voucher_id, 
                                'payment_mode' => $value->payment_mode, 
                                'notes' => $value->notes, 
                                'voucher_date' =>date('d-m-Y',strtotime($value->voucher_date)), 
                               
                                
                                
                 	     );
                 	 	
                 	 $i++;
                 	 }

                   $myData = array('PortalActivity' => $array, 'totalCount' => count($resultdd));
                     echo json_encode($myData);

	}
	
	
	public function fetch_data_sub()
	{
                     
                     
                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('voucher_sub','primary_id',$id,'id','ASC');
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
                 	 
                 	 	      $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','5','deleteid','0','id','ASC');              
                    
                 	          foreach($additional_information as $vl)
                              {
                                                        $label_name=strtolower($vl->label_name);
                                                        $output[$label_name]= $value->$label_name; 
                              }
                              
                              
                                   if($value->party_type=='Customer')
                                   {
                                       $query = $this->db->query("SELECT id,company_name as name,phone FROM customers  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY company_name ASC");
                                   }
                                   elseif($value->party_type=='Driver')
                                   {
                                        $query = $this->db->query("SELECT id,name,phone FROM driver  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                       
                                   }
                                   elseif($value->party_type=='Vendor')
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM vendor  WHERE deleteid='0' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name,phone FROM admin_users  WHERE deleteid='0' AND access!='13' AND id='".$value->get_users."' ORDER BY name ASC");
                                   }
                 	                
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	   $partyname= $valuess->name;
                                 	    $id= $valuess->id;
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
