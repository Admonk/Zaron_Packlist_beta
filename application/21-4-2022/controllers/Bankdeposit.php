<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankdeposit extends CI_Controller {

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
                                            
                                             $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Deposit List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankdeposit/index.php',$data);


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
                                             $data['title']    = 'Bank Deposit add';
                                             
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                               $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','DESC');
                                          
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');
                                           
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankdeposit/add.php',$data);


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
                                             $data['title']    = 'Bank Deposit Edit';
                                                $data['partytype'] = $this->Main_model->where_names_order_by('partytype','deleteid','0','id','DESC');
                                          
                                             $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankdeposit/edit.php',$data);


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
                                             $data['title']    = 'Bank Deposit Invoice';
                                             
                                              $data['id']       = $id;
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							               	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							               	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');
                                           $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                            
                                             
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankdeposit/invoice.php',$data);


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
                     
                     if($form_data->bankaccount!='' || $form_data->amount!='' || $form_data->deposit_date!='')
                     {

                                                 $tablename=$form_data->tablename;
                                                 $bankaccount=$form_data->bankaccount;
                                                 $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');              
                                                 foreach($additional_information as $vl)
                                                 {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                        if($label_name=='deposit_date')
                                                        {
                                                           $data[$label_name]= date('d-m-Y',strtotime($form_data->$label_name));  
                                                        }
                                                 }
                                                
                                                
                                                  $data['user_id']= $this->userid; 
                                                  $data['bankaccount']= $form_data->bankaccount;
                                                   $data['payment_status']= $form_data->payment_status;
                                                  $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                               
                                                       
                                                       
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
                                                                $data_bank['ex_code']='DE-'.$insert_id;
                                                                
                                                                $data_bank['payment_status']=$form_data->payment_status;
                                                                if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']=$form_data->amount; 
                                                                }
                                                                else
                                                                {
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=$form_data->amount; 
                                                                }
                                                                
                                                               
                                                                
                                                                
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=date('Y-m-d',strtotime($form_data->deposit_date));
                                                                $data_bank['status_by']='Bank Deposit';
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                  
                                              
                                            $array=array('error'=>'2','massage'=>'Bank Deposit successfully Added..');
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
                     
                     
                  

                   	 if($form_data->bankaccount!='' || $form_data->amount!='' || $form_data->deposit_date!='')
                     {                           
                         
                                                 $ids='DE-'.$form_data->id;
                                                 $this->Main_model->delete_where_by('bankaccount_manage','ex_code',$ids);

                                                 $tablename=$form_data->tablename;
                                                 $bankaccount=$form_data->bankaccount;
                                                 $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');              
                                                 foreach($additional_information as $vl)
                                                 {
                                                        $label_name=strtolower($vl->label_name);
                                                        $data[$label_name]= $form_data->$label_name; 
                                                        if($label_name=='deposit_date')
                                                        {
                                                           $data[$label_name]= date('d-m-Y',strtotime($form_data->$label_name));  
                                                        }
                                                        
                                                        
                                                 }
                                                
                                                  $data['get_id']=$form_data->id;
                                                  $data['user_id']= $this->userid; 
                                                  $data['bankaccount']= $form_data->bankaccount;
                                                  $data['payment_status']= $form_data->payment_status;
                                                  $this->Main_model->update_commen($data,$tablename);
                                                  
                                                  
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
                                                                $data_bank['ex_code']='DE-'.$form_data->id;
                                                                $data_bank['payment_status']=$form_data->payment_status;
                                                                 if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']=$form_data->amount; 
                                                                }
                                                                else
                                                                {
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=$form_data->amount; 
                                                                }
                                                                
                                                               
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=date('Y-m-d',strtotime($form_data->deposit_date));
                                                                $data_bank['status_by']='Bank Deposit';
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                  
                                                      }
                                                
                                            $array=array('error'=>'2','massage'=>'Bank Deposit successfully Updated..');
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
                 	 
                 	 $ids='DE-'.$form_data->id;
                     $this->Main_model->delete_where_by('bankaccount_manage','ex_code',$ids);
                 	 
                     $this->Main_model->deleteupdate($id,$tablename);

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
                                   else
                                   {
                                       $query = $this->db->query("SELECT id,name FROM admin_users  WHERE deleteid='0' AND access!='13' ORDER BY name ASC");
                                   }
                                   
                                  
                                  
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

                     $result= $this->Main_model->where_names_order_by('bank_deposit','deleteid','0','id','DESC');
                 	 $array=array();
                 	 $i=1;
                 	            
                 	 foreach ($result as  $value) {
                 	     
                 	       
                 	                $query = $this->db->query("SELECT id,bank_name FROM bankaccount  WHERE deleteid='0' AND id='".$value->bankaccount."' ");
                 	                 $resultss=$query->result();
                 	                 foreach ($resultss as  $valuess) {
                                 	    $partyname= $valuess->bank_name;
                 	                 }
                 	     
                 	         
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	        'no' => $i, 
                                'id' => $value->id, 
                                'name' => $partyname,
                                'payment_status' => $value->payment_status, 
                                'amount' => $value->amount,
                                'notes' => $value->notes, 
                                'deposit_date' =>date('d-m-Y',strtotime($value->deposit_date)), 
                               
                                
                                
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
                 	 
                 	 	      $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','7','deleteid','0','id','ASC');              
                    
                 	          foreach($additional_information as $vl)
                              {
                                                        $label_name=strtolower($vl->label_name);
                                                        $output[$label_name]= $value->$label_name; 
                              }
                              
                              
                 	     $output['bankaccount']= $value->bankaccount;
                 	     $output['payment_status']= $value->payment_status; 
                 	     $output['id']= $value->id;
	                 	      
                 	 }

                    echo json_encode($output);


    }
	



}	
