<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankaccount extends CI_Controller {

    function __construct()
    {
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
   

    public function index()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Details';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/index.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    public function statement()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							                 $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/bankaccountstatement',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
   
   
   
   
   
   
   
   
    public function statement_delete_log()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							                 $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/statement_delete_log',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
   
   
   
   
   
   
    public function report_cash()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							                 $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/report_cash',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
    public function report_cash_beta()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
                                             $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/report_cash_beta',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
   
   
   
    public function non_report_cash()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');
							                 $data['bank_id']=$_GET['bank_id'];
                                             $data['name']=$_GET['name'];
                                             $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Bank Account Statement';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/non_report_cash',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
   
   
   
   
   
   
   
   
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              

                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->bank_name!='' || $form_data->account_no!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['type']=$form_data->type;
                     $data['bank_name']=$form_data->bank_name;
                     $data['account_no']=$form_data->account_no;
                     $data['ifsc_code']=$form_data->ifsc_code;
                     $data['current_amount']=$form_data->current_amount;
                      $data['opening_date']=date('Y-m-d',strtotime($form_data->op_date));
                     $data['payment_status']=$form_data->payment_status;
                    
                 	 
                     
                      $insertid=$this->Main_model->insert_commen($data,$tablename);
                     
                                                        $account_no="";
                                                       $bank_name="";
                                                       $bid="";
                                                       if($form_data->current_amount!='0' || $form_data->current_amount!='')
                                                       {
                                                          
                                                                 $resbankaccount = $this->Main_model->where_names('bankaccount','id',$insertid);
                                                     
                                                                 foreach($resbankaccount as $valb)
                                                                 {
                                                                     $bid=$valb->id;
                                                                     $bank_name=$valb->bank_name;
                                                                     $account_no=$valb->account_no;
                                                                     $account_heads_id_by_bank=$valb->account_heads_id;
                                                                 }
                                                                 
                                                                 
                                                                 $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bid,'deleteid','0','id','ASC');
                                                                 $balancetotal=0;
                                                                 $debitsamount=0;
                                                                 $creditsamount=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                     $payid=$val->id;
                                                                     $debitsamount+=$val->debit;
                                                                     $creditsamount+=$val->credit;
                                                                     $balancetotal=$val->balance;
                                                                 }
                                                                $balancetotal=0;
                                                           
                                                                                  
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']='OP-'.$bid;
                                                                
                                                                
                                                                if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']= abs($form_data->current_amount); 
                                                                    
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']=$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal+$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    
                                                                    
                                                                    
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=abs($form_data->current_amount); 
                                                                    
                                                                    
                                                                     if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']='-'.$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal-$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                    
                                                                }
                                                        
                                                                
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=date('Y-m-d',strtotime($form_data->op_date));
                                                                $data_bank['status_by']='Opening Balance';
                                                                $data_bank['opening_balance_status']='1';
                                                                $data_bank['party_type']= 4; 
                                                                
                                                                
                                                                
                                                                
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
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                   
                                                                   
                                                             
                                                                
                                                                
                                                                  
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

                   	 if($form_data->bank_name!='' || $form_data->account_no!='')
                     {
                         
                         $tablename=$form_data->tablename;
                         $data['type']=$form_data->type;
                         $data['bank_name']=$form_data->bank_name;
                         $data['account_no']=$form_data->account_no;
                         $data['ifsc_code']=$form_data->ifsc_code;
                         $data['current_amount']=$form_data->current_amount;
                          $data['opening_date']=date('Y-m-d',strtotime($form_data->op_date));
                         $data['payment_status']=$form_data->payment_status;
                         $data['get_id']=$form_data->id;
                         $this->Main_model->update_commen($data,$tablename);
                         
                         
                         
                                                       $account_no="";
                                                       $bank_name="";
                                                       $bid="";
                                                       if($form_data->current_amount!='0' || $form_data->current_amount!='')
                                                       {
                                                          
                                                                 $resbankaccount = $this->Main_model->where_names('bankaccount','id',$form_data->id);
                                                     
                                                                 foreach($resbankaccount as $valb)
                                                                 {
                                                                     $bid=$valb->id;
                                                                     $bank_name=$valb->bank_name;
                                                                     $account_no=$valb->account_no;
                                                                      $account_heads_id_by_bank=$valb->account_heads_id;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                 $this->db->query("DELETE FROM bankaccount_manage  WHERE bank_account_id='".$bid."'  AND opening_balance_status='1'");
                                                                 $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bid,'deleteid','0','id','ASC');  
                                                                
                                                                 $balancetotal=0;
                                                                 $debitsamount=0;
                                                                 $creditsamount=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                     $payid=$val->id;
                                                                     $debitsamount+=$val->debit;
                                                                     $creditsamount+=$val->credit;
                                                                     $balancetotal=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 $balancetotal=0;
                                                                        
                                                             
                                                                $data_bank['bank_account_id']=$bid;
                                                                $data_bank['ex_code']='OP-'.$bid;
                                                                
                                                                
                                                                if($form_data->payment_status==1)
                                                                {
                                                                    $data_bank['debit']=0;
                                                                    $data_bank['credit']=abs($form_data->current_amount); 
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']=$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal+$form_data->current_amount;
                                                                      }
                                                                    
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    $data_bank['credit']=0;
                                                                    $data_bank['debit']=abs($form_data->current_amount);
                                                                    
                                                                    
                                                                      if($balancetotal==0)
                                                                      {   
                                                                           $data_bank['balance']='-'.$form_data->current_amount;
                                                                      }
                                                                      else
                                                                      {
                                                                           
                                                                           $data_bank['balance']=$balancetotal-$form_data->current_amount;
                                                                      }
                                                                      
                                                                      
                                                                }
                                                        
                                                                
                                                                $data_bank['name']='';
                                                                $data_bank['create_date']=date('2023-09-30');
                                                                $data_bank['status_by']='Opening Balance';
                                                                $data_bank['opening_balance_status']='1';
                                                                $data_bank['party_type']= 4; 
                                                                
                                                                
                                                                
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
                                                                $this->Main_model->insert_commen($data_bank,'bankaccount_manage');


                                                                                     date_default_timezone_set("Asia/Kolkata"); 
                                                                                     $date= date('Y-m-d');
                                                                                     $time= date('h:i A');
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Bank Account Changes';
                                                                                     $day_log['table_name'] = 'bankaccount_manage';
                                                                                     $day_log['reference_no'] = $bid;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($data_bank);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');



                                                                
                                                                  
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
                     if($tablename=='bankaccount')
                     {
                         $this->db->query("UPDATE bankaccount_manage SET deleteid='1' WHERE bank_account_id='".$id."'");
                         
                     }
                     
                     if($tablename=='bankaccount_manage')
                     {
                         
                             
                             $result= $this->Main_model->where_names($tablename,'id',$id);
                         	 foreach ($result as  $value)
                         	 {
                         	     
                         	    $deleteval= $value->deletemod;
                         	    $this->db->query("UPDATE $tablename SET deleteid='1',deleted_by='".$this->userid."' WHERE id='".$id."'");
                                $this->db->query("UPDATE $tablename SET deleteid='1',deleted_by='".$this->userid."' WHERE deletemod='".$deleteval."'");

                         	    
                         	    if($deleteval!='')
                         	    {
                         	        if($deleteval!='0')
                         	        {
                         	           $this->db->query("UPDATE all_ledgers SET deleteid='1',deleted_by='".$this->userid."' WHERE deletemod='".$deleteval."'");
                         	        }
                         	    }
                         	     
                         	    
                         	    $deletelog['userid']=$this->userid; 
                         	    $deletelog['all_legers']=$id;
                         	    $deletelog['bank_legers']=$deleteval.' Bank Delete';
                         	    $this->Main_model->insert_commen($deletelog,'deleted_log');
                         	    
                         	 }
                     }
                     

                 }
                 
                 
                
                 if($form_data->action=='Deleterevart')
                 {
                     
                     $tablename=$form_data->tablename;
                 	 echo $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     if($tablename=='bankaccount')
                     {
                         $this->db->query("UPDATE bankaccount_manage SET deleteid='0' WHERE bank_account_id='".$id."'");
                         
                     }
                     
                     if($tablename=='bankaccount_manage')
                     {
                       
                             
                             $result= $this->Main_model->where_names($tablename,'id',$id);
                         	 foreach ($result as  $value)
                         	 {
                         	     
                         	    $deleteval= $value->deletemod;
                         	    $this->db->query("UPDATE $tablename SET deleteid='0',edited_by='".$this->userid."' WHERE id='".$id."'");
                               
                         	    
                         	    if($deleteval!='')
                         	    {
                         	        if($deleteval!='0')
                         	        {


                               $this->db->query("UPDATE $tablename SET deleteid='0',edited_by='".$this->userid."' WHERE deletemod='".$deleteval."'");
                         	   $this->db->query("UPDATE all_ledgers SET deleteid='0',edited_by='".$this->userid."' WHERE deletemod='".$deleteval."'");

                                       
                         	        }
                         	    }
                         	     
                         	    
                         	    $deletelog['userid']=$this->userid; 
                         	    $deletelog['all_legers']=$id;
                         	    $deletelog['bank_legers']=$deleteval.' Bank Revart';
                         	    $this->Main_model->insert_commen($deletelog,'deleted_log');
                         	    
                         	 }
                     }
                     

                 }
                
                


	}
	public function fetch_data()
	{


                 	 $result= $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE   a.bank_account_id='".$value->id."' AND a.deleteid='0' AND a.party_type NOT IN('1','2','3','5')");
                          $res=$result->result();
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          
                                                                              
                                                                          
                                                                          $debitsamount+=$val->debit;
                                                                          $creditsamount+=$val->credit;

                                                                          
                                                                          
                                                                          
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                                                                      
                                                                      if($balancetotal>0)
                                                                      {
                                                                          $payment_status='1';
                                                                      }
                                                                      else
                                                                      {
                                                                           $payment_status='2';
                                                                      }
                                                                      
                                                                      $balancetotal=abs($balancetotal);
                 	     
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		    'bank_name' => $value->bank_name, 
                 	 			'type' => $value->type,
                 	 			'account_no' => $value->account_no,
                 	 			'ifsc_code' => $value->ifsc_code,
                 	 			'current_amount' => round($balancetotal,2),
                 	 			'payment_status' => $payment_status,
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
	
		public function fetch_data_details()
	{


        // $query=$this->db->query("SELECT * FROM bankaccount_manage as a WHERE a.create_date BETWEEN '2023-08-22' AND '2023-08-22' AND a.bank_account_id='25' AND a.deleteid='0' AND a.opening_balance_status='0' ORDER BY `a`.`id` ASC");
        // $query= $query->result();

        // foreach($query as $val){
            
        //     $ORPAY = substr($val->deletemod, 0, 5);

        //     if($ORPAY == "ORPAY"){
        //         $filter_id = $val->id;
        //         $str = str_replace('ORPAY','',$val->deletemod);
        //         $query1=$this->db->query("SELECT orders_process.driver_id FROM orders_process  WHERE orders_process.order_no='".$str."'");
        //         $query1= $query1->result();
                
        //         foreach($query1 as $key =>  $val1){
        //             $driver_id = $val1->driver_id;
        //             try {
        //             $this->db->query("UPDATE bankaccount_manage 
        //             SET driver_id='".$driver_id."',order_status='1' 
        //              WHERE id='".$filter_id."' 
        //              AND bank_account_id='25'");

        //              $response = array(
        //                 'status' => 'success',
        //                 'message' => 'Driver changed successfully.'
        //                 );

        //             } catch (Exception $e) {
        //                 // Handle the exception
        //                 $response = array(
        //                     'status' => 'error',
        //                     'message' => 'Failed to insert data.'
        //                 );
        //             }
        //         }
                
        //     }     
        // }
        // echo json_encode($response);

        // exit;

                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $todate=$_GET['fromto'];
                     $data=array();
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."' AND a.opening_balance_status='0' AND a.party_type NOT IN('1','2','3','5') ORDER BY a.create_date,a.id ASC");
                 	     $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."'  ORDER BY a.create_date,a.id ASC");
                    
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."'  AND a.deleteid='".$deleteid."'  AND a.opening_balance_status='0' AND a.party_type NOT IN('1','2','3','5')  ORDER BY a.create_date,a.id ASC");
                 	      $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."'  AND a.party_type NOT IN('1','2','3','5') ORDER BY a.create_date,a.id ASC");
                    	
                     }
                     
                     
                     
                     
                     
                         $payment_date=date('d-m-Y',strtotime($formdate));
                         $resultopeing_new=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal,create_date FROM bankaccount_manage  WHERE  deleteid='".$deleteid."' AND bank_account_id='".$account_id."' AND opening_balance_status='1'  AND party_type NOT IN('1','2','3','5')  ORDER BY create_date ASC");
                 	     $resultopeing_new=$resultopeing_new->result();
                 	     $openingbalance_new=0;
                 	     $openingbalanceval_new=0;
                         foreach ($resultopeing_new as  $valuess_new)
                     	 {
                     	      $credits_new=$valuess_new->creditstotal;
                              $debits_new=$valuess_new->debitstotal;
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess_new->create_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }

                                if($payment_date <= '01-04-2022')
                                 {
                                     $payment_date=date('d-m-Y',strtotime($valuess_new->create_date));
                                 }



                              
                              
                     	      $openingbalance_new=$credits_new-$debits_new;
                     	      $openingbalanceval_new=$credits_new-$debits_new;
                     	        
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_set=1;
                                            }
                                            else
                                            {
                                                $getstatus1_set=0;
                                            }
                                            
                             $openingbalance_new=abs($openingbalance_new);
                     	 }
                 	     if($getstatus1_set==1)
                 	     {
                 	                $openingbalanced_new=$openingbalance_new;
                 	                $openingbalancec_new=0;
                 	     }
                 	     else
                 	     {
                 	                 $openingbalanced_new=0;
                 	                 $openingbalancec_new=$openingbalance_new;
                 	     }
                 	     
                 	     
                 	     
                     
                     
                     
                     
                     
                         $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND bank_account_id='".$account_id."' AND opening_balance_status=0  AND party_type NOT IN('1','2','3','5')  ORDER BY create_date ASC");
                 	     $resultopeing=$resultopeing->result();
                 	     $openingbalance=0;
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
                 	        'no' => 'OP1', 

                 	 		'id' => '', 
                	 		
                 	 		'name' => '',  
                 	 		'ex_code' => '', 
                 	 		'debit' => $debits_opening,
                            'credit' => $credits_opening,
                 	 		'totalrange' =>'', 
                 	 		'balance' => round($openingbalance,2), 
                 	 		'status_by' =>'', 
                 	 		'getstatus' => $getstatus1_new, 
                 	 		'getstatus1' => 0, 
                 	 		'getstatus2' => 0, 
                 	 		'totalbalance' =>0, 
                 	 		'totalbalancec' =>0, 
                 	 		'totalbalanced' => 0, 
                 	 		'create_date'=>$payment_date,
                 	     
                 	      );

                     
                   
                     
                     
                     
                     
                     
                    	
                    	
                    	
                    	$resultset=$resultcount->result();
                    	$total=0;
                    	$totald=0;
                    	$totalc=0;
                    	
                    	
                    	foreach($resultset as $set)
                    	{
                    	   $total=$set->credit-$set->debit;
                    	   $totald=$set->debit;
                    	   $totalc=$set->credit;
                    	}
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	$total_tot_range=0;
                    	$resultcount_tot=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."'  AND a.party_type NOT IN('1','2','3','5')  ORDER BY a.create_date ASC");
                    	$resultset_tot=$resultcount_tot->result();
                    	
                    	foreach($resultset_tot as $set_tot)
                    	{
                    	   $total_tot_range=$set_tot->credit-$set_tot->debit;
                    	   
                    	}
                     
                     
                     
                     
                 	  $result=$result->result();
                      $i=2;
                 	  $balanceold=array($openingbalance_data);
                      foreach ($result as  $value)
                      {
                     	      $credits=$value->credit;
                              $debits=$value->debit;
                     	      $balanceold[]=  $credits-$debits;
                     	     
                     }
                     foreach ($result as  $value) 
                     {
                 	     
                                            $driver_name="";
                                            $order_status = $value->order_status;
                                            $driver_id = $value->driver_id;


                                            if($driver_id>0)
                                            {


                                            
                                                $get=$this->db->query("SELECT  id,name as driver_name  FROM driver where id='".$driver_id."'");
                                                $get_result=$get->result();

                                                foreach($get_result as $val){
                                                    $driver_name = $val->driver_name;
                                                }


                                            }

                                     	     $addclass="";
                                     	     if($value->changes_status==1)
                                     	     {
                                     	         $addclass="bgcolorchange";
                                     	     }
                                     	     
                                 	        if($value->debit=='')
                                 	        {
                                 	            $value->debit=0;
                                 	        }
                                 	        
                                 	        if($value->credit=='')
                                 	        {
                                 	            $value->credit=0;
                                 	        }
                                 	 
                                 	 
                                            $seti=$i;
                         
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                                           
                                            $balancett=0;
                                            for($k=0;$k<$i;$k++)
                                            {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                            }
                         
                                            $valuesetbalance=$balancett;
                                            
                                            if($valuesetbalance<0)
                                            {
                                                $getstatus1=1;
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                            }
                                                   
                                                   
                                                $valuesetbalance=round($valuesetbalance,2);
                                                $valuesetbalance=abs($valuesetbalance);
                         
                                                
                                                if($total_tot_range>0)
                                                {
                                                    $getstatus2=1;
                                                }
                                                else
                                                {
                                                    $getstatus2=0;
                                                }
                                                $totalrange=abs($total_tot_range);
                                                
                                                

                                     $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }


                                       $username="";


                                      if($value->edited_by>0)
                                      {
                                        $value->user_id=$value->edited_by;
                                        $username='Transfer By ';
                                      }
   
                                       
                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                        $username='Deleted By ';
                                      }
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username.= $valuess->name; 
                                       }

                                        
                                        if($order_status > 0)
                                        {
                                           $name = $driver_name;

                                           if($driver_name=='')
                                           {
                                                $name = $value->name;
                                           }
                                           
                                        }
                                        else
                                        {
                                            $name = $value->name;
                                            
                                                   // $party_type=0;
                                                   //                  $name = $value->name;
                                                   //                  $allleg = $this->Main_model->where_names_two_order_by('all_ledgers', 'deletemod', $value->deletemod, 'deleteid', '0', 'id', 'ASC');
                                                   //                  foreach ($allleg as $sevalue) {
                                                   //                     $customer_id=$sevalue->customer_id;
                                                   //                     $party_type=$sevalue->party_type;
                                                   //                 }

                                                   //                 if($party_type=='1')
                                                   //                 {
                                                   //                      $sales_team_id1 = $this->Main_model->where_names('customers', 'id', $customer_id);
                                                   //                      foreach ($sales_team_id1 as $val1) {

                                                   //                          $name = $val1->company_name;

                                                   //                      }
                                                   //                 }
                                                   //                  if($party_type=='2')
                                                   //                 {
                                                   //                      $sales_team_id1 = $this->Main_model->where_names('driver', 'id', $customer_id);
                                                   //                      foreach ($sales_team_id1 as $val1) {

                                                   //                          $name = $val1->name;

                                                   //                      }
                                                   //                 }
                                                   //                  if($party_type=='3')
                                                   //                 {
                                                   //                      $sales_team_id1 = $this->Main_model->where_names('vendor', 'id', $customer_id);
                                                   //                      foreach ($sales_team_id1 as $val1) {

                                                   //                          $name = $val1->name;

                                                   //                      }
                                                   //                 }


                                                   //                  if($party_type=='5')
                                                   //                 {
                                                   //                      $sales_team_id1 = $this->Main_model->where_names('accountheads', 'id', $customer_id);
                                                   //                      foreach ($sales_team_id1 as $val1) {

                                                   //                          $name = $val1->name;

                                                   //                      }
                                                   //                 }

                                        }    



                                           
                                            
    

                                           if($name == 'Bank'){
                                                $name = 'Bank-ex';
                                            }
                                            

                                            if($name == 'Deposit & Withdrawal')
                                            {


                                                         $resultvvvv=$this->db->query("SELECT b.bank_name FROM bankaccount_manage as a JOIN bankaccount as b ON a.bank_account_id=b.id WHERE a.deletemod='".$value->deletemod."' AND a.bank_account_id!='".$value->bank_account_id."' AND a.deleteid=0");
                                                          $resultvvvv=$resultvvvv->result();
                                                         foreach ($resultvvvv as  $valuesss) 
                                                         {
                                                             
                                                                                $name=$valuesss->bank_name;
                                                                               

                                                         }

                                                        //  $value->ex_code='Contra';
                                               
                                            } 
                                             
                                            

                 
                                            $voucher_no="";      
                                            if($value->voucher_base == 'contra'){
                                              $voucher_no = "CONTRA";
                                            }
                                            elseif($value->voucher_base == 'journal'){
                                              $voucher_no = "JOURNAL";
                                            }
                                            elseif($value->voucher_base == 'payment'){
                                              $voucher_no = "PAYMENT";
                                            }
                                            elseif($value->voucher_base == 'receipt'){
                                              $voucher_no = "RECEIPT";
                                            }
                                                
                 	      
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $seti, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $name,
                 	 		'ex_code' => $value->ex_code,
                            'customer_id' => $value->bank_account_id,
                            'deletemod' => $value->deletemod,
                            'notes' => $value->notes,
                 	 		'debit' => round($value->debit,2),
                 	 		'credit' => round($value->credit,2),
                            'process_by' => trim($value->status_by),
                            'voucher_no' => $voucher_no .'-' .$value->voucher_no,
                            'voucher_base' => $value->voucher_base,
                 	 		'amount' => $value->amount,
                 	 		'username' => $username,
                            'username_base' => $username_base,
                 	 		'totalrange' => $totalrange,
                 	 		'balance' => $valuesetbalance,
                 	 		'status_by' => $value->status_by.' | '.$value->deletemod,
                 	 		'getstatus' => $getstatus,
                 	 		'getstatus1' => $getstatus1,
                 	 		'getstatus2' => $getstatus2,
                 	 		'addclass' => $addclass,
                 	 		'totalbalance' => round($total,2),
                 	 		'totalbalancec' => round($totalc,2),
                 	 		'totalbalanced' => round($totald,2),
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }



                    $totalarray=array_merge($array2,$data);
                    
                 
                    
                    echo json_encode($totalarray);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function export_bank_statement_full()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $data=array();
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=$this->from_date;
                         $todate=$this->to_date;
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."' AND a.opening_balance_status='0' AND a.party_type NOT IN('1','2','3','5') ORDER BY a.create_date,a.id ASC");
                 	     $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."'  AND a.party_type NOT IN('1','2','3','5')  ORDER BY a.create_date,a.id ASC");
                    
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."'  AND a.deleteid='".$deleteid."' AND a.opening_balance_status='0' AND a.party_type NOT IN('1','2','3','5') ORDER BY a.create_date,a.id ASC");
                 	      $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND a.deleteid='".$deleteid."'  AND a.party_type NOT IN('1','2','3','5')   ORDER BY a.create_date,a.id ASC");
                    	
                     }
                     
                     
                     
                     
                     
                         $payment_date=date('d-m-Y',strtotime($formdate));
                         $resultopeing_new=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal,create_date FROM bankaccount_manage  WHERE deleteid='".$deleteid."' AND bank_account_id='".$account_id."' AND opening_balance_status='1'  AND party_type NOT IN('1','2','3','5')  ORDER BY create_date ASC");
                 	     $resultopeing_new=$resultopeing_new->result();
                 	     $openingbalance_new=0;
                 	     $openingbalanceval_new=0;
                         foreach ($resultopeing_new as  $valuess_new)
                     	 {
                     	      $credits_new=$valuess_new->creditstotal;
                              $debits_new=$valuess_new->debitstotal;
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess_new->create_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }


                                if($payment_date <= '01-04-2022')
                                 {
                                     $payment_date=date('d-m-Y',strtotime($valuess_new->create_date));
                                 }

                              
                              
                     	      $openingbalance_new=$credits_new-$debits_new;
                     	      $openingbalanceval_new=$credits_new-$debits_new;
                     	        
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_set=1;
                                            }
                                            else
                                            {
                                                $getstatus1_set=0;
                                            }
                                            
                             $openingbalance_new=abs($openingbalance_new);
                     	 }
                 	     if($getstatus1_set==1)
                 	     {
                 	                $openingbalanced_new=$openingbalance_new;
                 	                $openingbalancec_new=0;
                 	     }
                 	     else
                 	     {
                 	                 $openingbalanced_new=0;
                 	                 $openingbalancec_new=$openingbalance_new;
                 	     }
                 	     
                 	     
                 	     
                     
                     
                     
                     
                     
                         $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND bank_account_id='".$account_id."' AND opening_balance_status=0 AND party_type NOT IN('1','2','3','5') ORDER BY create_date ASC");
                 	     $resultopeing=$resultopeing->result();
                 	     $openingbalance=0;
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
                 	        'no' => 'OP1', 

                 	 		'id' => '', 
                	 		
                 	 		'name' => '',  
                 	 		'ex_code' => '', 
                 	 		'debit' => $debits_opening,
                            'credit' => $credits_opening,
                 	 		'totalrange' =>'', 
                 	 		'balance' => round($openingbalance,2), 
                 	 		'status_by' =>'', 
                 	 		'getstatus' => $getstatus1_new, 
                 	 		'getstatus1' => 0, 
                 	 		'getstatus2' => 0, 
                 	 		'totalbalance' =>0, 
                 	 		'totalbalancec' =>0, 
                 	 		'totalbalanced' => 0, 
                 	 		'create_date'=>$payment_date,
                 	     
                 	      );

                     
                   
                     
                     
                     
                     
                     
                    	
                    	
                    	
                    	$resultset=$resultcount->result();
                    	$total=0;
                    	$totald=0;
                    	$totalc=0;
                    	
                    	
                    	foreach($resultset as $set)
                    	{
                    	   $total=$set->credit-$set->debit;
                    	   $totald=$set->debit;
                    	   $totalc=$set->credit;
                    	}
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	$total_tot_range=0;
                    	$resultcount_tot=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.bank_account_id='".$account_id."' AND deleteid='".$deleteid."' AND a.party_type NOT IN('1','2','3','5')   ORDER BY a.create_date ASC");
                    	$resultset_tot=$resultcount_tot->result();
                    	
                    	foreach($resultset_tot as $set_tot)
                    	{
                    	   $total_tot_range=$set_tot->credit-$set_tot->debit;
                    	   
                    	}
                     
                     
                     
                     
                 	  $result=$result->result();
                      $i=2;
                 	  $balanceold=array($openingbalance_data);
                      foreach ($result as  $value)
                      {
                     	      $credits=$value->credit;
                              $debits=$value->debit;
                     	      $balanceold[]=  $credits-$debits;
                     	     
                     }
                     foreach ($result as  $value) 
                     {
                 	     
                                            $driver_name="";
                                            $order_status = $value->order_status;
                                            $driver_id = $value->driver_id;


                                            if($driver_id>0)
                                            {


                                                
                                                $get=$this->db->query("SELECT  id,name as driver_name  FROM driver where id='".$driver_id."'");
                                                $get_result=$get->result();

                                                foreach($get_result as $val){
                                                    $driver_name = $val->driver_name;
                                                }


                                            }

                                     	     $addclass="";
                                     	     if($value->changes_status==1)
                                     	     {
                                     	         $addclass="bgcolorchange";
                                     	     }
                                     	     
                                 	        if($value->debit=='')
                                 	        {
                                 	            $value->debit=0;
                                 	        }
                                 	        
                                 	        if($value->credit=='')
                                 	        {
                                 	            $value->credit=0;
                                 	        }
                                 	 
                                 	 
                                            $seti=$i;
                         
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                                           
                                            $balancett=0;
                                            for($k=0;$k<$i;$k++)
                                            {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                            }
                         
                                            $valuesetbalance=$balancett;
                                            
                                            if($valuesetbalance<0)
                                            {
                                                $getstatus1=1;
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                            }
                                            
                                                //$valuesetbalance=str_replace('-', '', $valuesetbalance);
                         
                                                
                                                if($total_tot_range>0)
                                                {
                                                    $getstatus2=1;
                                                }
                                                else
                                                {
                                                    $getstatus2=0;
                                                }
                                                $totalrange=abs($total_tot_range);

                                 $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }


                                        if($order_status > 0){
                                           $name = $driver_name;

                                           if($driver_name=='')
                                           {
                                             $name = $value->name;
                                           }

                                           
                                        }else{
                                            $name = $value->name;
                                        }   

                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $seti, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $name,
                            'username_base' => $username_base, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => round($value->debit,2),
                 	 		'credit' => round($value->credit,2),
                 	 		'amount' => $value->amount,
                 	 		'totalrange' => $totalrange,
                 	 		'balance' => round($valuesetbalance,2),
                 	 		'status_by' => $value->status_by.' | '.$value->deletemod,
                 	 		'getstatus' => $getstatus,
                 	 		'getstatus1' => $getstatus1,
                 	 		'getstatus2' => $getstatus2,
                 	 		'addclass' => $addclass,
                 	 		'totalbalance' => round($total,2),
                 	 		'totalbalancec' => round($totalc,2),
                 	 		'totalbalanced' => round($totald,2),
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }


                      $result= $this->Main_model->where_names('bankaccount','id',$account_id);
                 	 foreach ($result as  $value)
                 	 {
                 	 	$bank_name = $value->bank_name;
                 	 	
                 	 	
                 	 }
                    $totalarray=array_merge($array2,$data);
                    
                         $filename=$bank_name.' Report '.date('d-m-Y',strtotime($formdate)).'-'.date('d-m-Y',strtotime($todate));
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                          
                         
                    
                    ?>
                    
                       <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                          
                                 
                          <tr><th colspan="8">Bank Statement Report <?php echo $bank_name; ?> <?php echo date('d-m-Y',strtotime($formdate)); ?> To  <?php echo date('d-m-Y',strtotime($todate)); ?> </th></tr>
                           
                           
                             
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                    
                                                        
                                                            <tbody><tr style="position: sticky;top: 0;background: #dfdfdf;">
                                                                  <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Date</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Particulars</h5>
                                                                    
                                                                </td>
                                                              
                                                                <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Chq/Ref.No</h5>
                                                                   
                                                                </td>
                                                                
                                                                  <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Debit</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                   <td style="width: 10%;text-align: left;">
                                                                    
                                                                        <h5 class="font-size-14 mb-0">Credit</h5>
                                                                    
                                                                </td>
                                                                
                                                                 <td style="width: 10%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Balance</h5>
                                                                    
                                                                </td>
                                                                
                                                                
                                                                 <td style="width: 15%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">Narration</h5>
                                                                    
                                                                </td>

                                                                   <td style="width: 15%;text-align: left;">
                                                                   
                                                                        <h5 class="font-size-14 mb-0">User</h5>
                                                                    
                                                                </td>
                                                               
                                                              
                                                            </tr>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                              
                                                                  
                                                            </tbody>
                                                            
                                                            
                                                            <?php
                                                            
                                                            foreach($totalarray as $vl)
                                                            {
                                                                
                                                                
                                                                if($vl['no']=='OP1')
                                                                {
                                                                    ?>
                                                                    
                                                                 
                                                                
                                                                   <tr  style="font-weight: 800;" class="ng-scope">
                                                               
                                                               
                                                               <td style="text-align: left;" class="ng-binding"><?php echo $vl['create_date']; ?></td>
                                                               <td style="text-align: left;"> <b>Opening Balance</b>  </td>
                                                               <td style="text-align: left;"> </td>
                                                                <td style="text-align: left;"> <span > <?php echo $vl['credit']; ?></span> </td>
                                                               <td style="text-align: left;"><span  ><?php echo $vl['debit']; ?></span></td>
                                                              
                                                               <td style="text-align: left;"><?php echo $vl['balance']; ?></td>
                                                               <td style="text-align: left;"></td>
                                                              
                                                                </tr>
                                                                
                                                                
                                                                <?php
                                                                }
                                                                
                                                                  if($vl['no']!='OP1')
                                                                {
                                                                    ?>
                                                                    
                                                                 
                                                                
                                                                   <tr  style="font-weight: 800;" class="ng-scope">
                                                               
                                                               
                                                               <td style="text-align: left;" class="ng-binding"><?php echo $vl['create_date']; ?></td>
                                                               <td style="text-align: left;"> <?php echo $vl['name']; ?> </td>
                                                               <td style="text-align: left;"> <?php echo $vl['ex_code']; ?></td>
                                                                <td style="text-align: left;"> <span > <?php echo $vl['credit']; ?></span> </td>
                                                               <td style="text-align: left;"><span  ><?php echo $vl['debit']; ?></span></td>
                                                              
                                                               <td style="text-align: left;"><?php echo $vl['balance']; ?></td>
                                                               <td style="text-align: left;"><?php echo $vl['status_by']; ?>
                                                               <?php
                                                                if($vl['amount']>0)
                                                                {
                                                                    
                                                                    ?>
                                                                    <br>
                                                                    Changes : <?php echo $vl['amount']; ?>
                                                                    <?php
                                                                }
                                                               
                                                               ?>
                                                               
                                                               
                                                               </td>
                                                               <td style="text-align: left;"><?php echo $vl['username_base']; ?></td>
                                                             
                                                                </tr>
                                                                
                                                                
                                                                <?php
                                                                }
                                                                
                                                            }
                                                            
                                                            
                                                            ?>
                                                           
                                                          
                                                                
                                                                
                                                            </tbody>
                                                            
                                                            
                                                           
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                          
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                        
                                                       
                                                    </tbody></table>
                    
                    <?php
                    
                    
                    
                    
                    
                    
                    
                 
                    
                   

	}
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_details_total()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $todate=$_GET['fromto'];
                     $data=array();
                     
                     $sql='';
                     if($formdate!='undefined')
                     {
                        $sql.=" AND create_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }
                     else
                     {  
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-d');
                         $sql.=" AND create_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }


                     $result=$this->db->query("SELECT SUM(credit-debit) as total FROM bankaccount_manage as a  WHERE    a.bank_account_id='".$account_id."' AND a.deleteid=0 AND a.create_date<='".$todate."' AND a.party_type NOT IN('1','2','3','5') ORDER BY a.create_date ASC");
                      $result=$result->result();
                     foreach ($result as  $value) 
                     {
                         
                                            $totals=$value->total;
                                            if($totals>0)
                                            {
                                                $cgetstatus=1;
                                            }
                                            else
                                            {
                                                $cgetstatus=0;
                                            }
                                            
                                            $totals=abs($totals);

                     }




                     $result=$this->db->query("SELECT SUM(credit-debit) as total FROM bankaccount_manage as a  WHERE  a.bank_account_id='".$account_id."' AND a.deleteid=0 AND create_date < '".$formdate."' AND a.party_type NOT IN('1','2','3','5')  ORDER BY a.create_date ASC");
                      $result=$result->result();
                     foreach ($result as  $value) 
                     {
                         
                                            $totals_opeing=$value->total;
                                            if($totals_opeing>0)
                                            {
                                                $opstatus=1;
                                            }
                                            else
                                            {
                                                $opstatus=0;
                                            }
                                            
                                            $totals_opeing=abs($totals_opeing);

                     }

                   
                     $result=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit,SUM(credit-debit) as total FROM bankaccount_manage as a  WHERE    a.bank_account_id='".$account_id."' AND a.deleteid=0 AND a.party_type NOT IN('1','2','3','5') $sql ORDER BY a.create_date ASC");
                 	  $result=$result->result();
                 	 foreach ($result as  $value) 
                     {
                 	     
                 	     
                                 	 
                                 	 
                                            $seti=$i;
                                            $total=$value->total;
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                 	 
                 	 		$data = array(
                 	 		    
                 	 		    
                 	 		 
                            'getstatus' => $getstatus,
                            'cgetstatus' => $cgetstatus,
                             'opstatus' => $opstatus,
                 	 		'totals_opeing' => round($totals_opeing,2),
                            'totalbalance' => round($total,2),
                            'ctotalbalance' => round($totals,2),
                 	 		'totalbalancec' => round($value->credit,2),
                 	 		'totalbalanced' => round($value->debit,2)

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

        
                    
                    echo json_encode($data);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_details_total_cash_only()
	{

                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $fromto=$_GET['fromto'];
                     $data=array();
                     
                     
                     
                     $where="";
                     $where1="";
                     if($account_id==25)
                     {
                          $where .="AND a.bank_account_id='".$account_id."'";
                          $where1 .="AND bank_account_id='".$account_id."'";
                     }
                     else
                     {
                          $where .="AND a.bank_account_id!='25'";
                          $where1 .="AND bank_account_id!='25'";
                     }
                     
                     
                     
                     
                     $openingbalance=0;
                     $getstatus1=0;
                     if($_GET['fromdate']=='undefined')
                     {
                        
                          $result=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE    a.deleteid=0  $where ORDER BY a.create_date ASC");
                 	  
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE   a.deleteid=0 AND a.create_date  BETWEEN '".$formdate."' AND '".$fromto."' $where ORDER BY a.create_date ASC");
                 	      $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid=0 $where1  ORDER BY create_date ASC");
                 	      $resultopeing=$resultopeing->result();
                 	      $openingbalance=0;
                          foreach ($resultopeing as  $valuess)
                     	  {
                     	      $credits=$valuess->creditstotal;
                              $debits=$valuess->debitstotal;
                     	      $openingbalance=  $credits-$debits;
                     	      $openingbalanceval=  $credits-$debits;
                     	        
                                            if($openingbalance>0)
                                            {
                                                $getstatus1=1;
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                            }
                                            
                                            $openingbalance=abs($openingbalance);
                     	 }
                 	 
                     }
                    
                 	 
                 	 
                 	  $result=$result->result();
                 	 foreach ($result as  $value) 
                     {
                 	     
                 	     
                                 	 
                                 	 
                                            $seti=$i;
                                            $total=$value->credit-$value->debit;
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                 	 
                 	 		$data = array(
                 	 		    
                 	 		    
                 	 		 
                            'getstatus' => $getstatus,
                            'getstatus1' => $getstatus1,
                 	 		'totalbalance' => round($total,2),
                 	 		'totalbalancec' => round($value->credit,2),
                 	 		'totalbalanced' => round($value->debit,2),
                 	 		'opeingbalance' => round($openingbalance,2)

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

        
                    
                    echo json_encode($data);

	}
	



































    
        public function fetch_data_details_total_cash_only_beta()
    {

                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $fromto=$_GET['fromto'];
                     $data=array();
                     
                     
                     
                     $where="";
                     $where1="";
                     if($account_id==25)
                     {
                          $where .="AND a.payment_mode='Cash'";
                          $where1 .="AND payment_mode='Cash'";
                     }
                     else
                     {
                          $where .="AND a.payment_mode IN ('NEFT/RTGS','Cheque','Bank Transfer')";
                          $where1 .="AND payment_mode IN ('NEFT/RTGS','Cheque','Bank Transfer')";
                     }
                     
                     
                     
                     
                     $openingbalance=0;
                     $getstatus1=0;
                     if($_GET['fromdate']=='undefined')
                     {
                        
        $result=$this->db->query("SELECT SUM(credits) as credit,SUM(debits) as debit FROM all_ledgers as a  WHERE    a.deleteid=0  $where ORDER BY a.create_date ASC");
                      
                     }
                     else
                     {




                         if($account_id==25)
                         {



                             $result=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE   a.deleteid=0 AND a.create_date  BETWEEN '".$formdate."' AND '".$fromto."' AND bank_account_id='25'  ORDER BY a.create_date ASC");
                         



                         }
                         else
                         {


                             $result=$this->db->query("SELECT SUM(credits) as credit,SUM(debits) as debit FROM all_ledgers as a  WHERE   a.deleteid=0 AND a.payment_date  BETWEEN '".$formdate."' AND '".$fromto."' $where ORDER BY a.payment_date ASC");
                         


                         }
                         
                         







                         $resultopeing=$this->db->query("SELECT SUM(credit-debit) as total FROM bankaccount_manage as a  WHERE  a.bank_account_id='".$account_id."' AND a.deleteid=0 AND create_date < '".$formdate."'  ORDER BY a.create_date ASC");
                        $resultopeing=$resultopeing->result();
                          $openingbalance=0;
                          foreach ($resultopeing as  $valuess)
                          {
                            
                                           $openingbalance=$valuess->total;
                                            if($openingbalance>0)
                                            {
                                                $getstatus1=1;
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                            }
                                            $openingbalance=abs($openingbalance);


                         }








                     
                     }
                    
                     
                     
                      $result=$result->result();
                     foreach ($result as  $value) 
                     {
                         
                         
                                     
                                     
                                            $seti=$i;
                                            $total=$value->credit-$value->debit;
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                     
                            $data = array(
                                
                                
                             
                            'getstatus' => $getstatus,
                            'getstatus1' => $getstatus1,
                            'totalbalance' => round($total,2),
                            'totalbalancec' => round($value->credit,2),
                            'totalbalanced' => round($value->debit,2),
                            'opeingbalance' => round($openingbalance,2)

                        );
                        
                        $i++;
                     }

        
                    
                    echo json_encode($data);

    }
    

    





        public function fetch_data_details_cash_only_beta()
    {


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $fromto=$_GET['fromto'];
                     $data=array();
                     $where="";
                     $where1="";
                      if($account_id==25)
                     {
                          $where .="AND a.payment_mode='Cash'";
                          $where1 .="AND payment_mode='Cash'";
                     }
                     else
                     {
                          $where .="AND a.payment_mode IN ('NEFT/RTGS','Cheque','Bank Transfer')";
                          $where1 .="AND payment_mode IN ('NEFT/RTGS','Cheque','Bank Transfer')";
                     }
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-d');
                         $fromto=date('Y-m-d');
                         
                         $result=$this->db->query("SELECT * FROM all_ledgers as a  WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$fromto."'  AND a.deleteid=0 AND a.opening_balance_status='0' $where ORDER BY a.payment_date  ASC");
                        
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT * FROM all_ledgers as a  WHERE  a.payment_date BETWEEN '".$formdate."' AND '".$fromto."'   AND a.deleteid=0  AND a.opening_balance_status='0' $where  ORDER BY a.payment_date  ASC");
                         
                        
                     }
                     
                     
                     
                      $result=$result->result();
                      $i=2;
                      
                     foreach ($result as  $value) 
                     {


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
                             
                         
                                             $addclass="";
                                             if($value->changes_status==1)
                                             {
                                                 $addclass="bgcolorchange";
                                             }



                                                
                                                 $bankname='';

                                                 if($value->bank_id!=25)
                                                 {

                                                 $resultsub=$this->db->query("SELECT * FROM bankaccount  WHERE id='".$value->bank_id."' AND deleteid=0  ORDER BY id ASC");
                                                 $resultsub=$resultsub->result();


                                                 foreach($resultsub as $val)
                                                 { 
                                                     $bankname=$val->bank_name;   
                                                 }   
                                         

                                                 }
                                                 
                                         if($value->reference_no=='')
                                         {
                                            $value->reference_no=$value->order_no;
                                         }
                                     
                                         $balance=0;
                                      $balance += $value->credits;      
                     
                            $data[] = array(
                                
                                    
                            'no' => 0, 

                            'id' => $value->id, 
                            
                            'name' => $party_name, 
                            'reference_no'=>$value->reference_no,
                            'payment_mode'=>$value->payment_mode,
                            'debit' => round($value->debits,2),
                            'credit' => round($value->credits,2),
                            'balance' =>round($balance,2),
                            'status_by' => $value->notes.' '.$bankname,
                            'create_date'=>date('d-m-Y',strtotime($value->payment_date)),

                        );
                        
                        $i++;
                     }












                     if($account_id==25)
                     {
                          $ssql=" AND bank_account_id=25";
                     }
                     else
                     {
                        $ssql=" AND bank_account_id!=25";
                     }

        $result6=$this->db->query("SELECT * FROM bankaccount_manage  WHERE  single_deposite='1' AND deleteid='0' AND  `create_date` BETWEEN '".$formdate."' AND '".$fromto."' $ssql  ORDER BY create_date DESC");

                             $result6=$result6->result();

                             foreach($result6 as $vl)
                             {



                                 $query = $this->db->query("SELECT id,bank_name FROM bankaccount  WHERE deleteid='0' AND id='".$vl->bank_account_id."' ORDER BY bank_name ASC");
                                 $res=$query->result();
                                 foreach($res as $partys)
                                 {
                                                            $bank_name=$partys->bank_name.' (Bank AC)';
                                                            $customer_id=$partys->id;
                                 }

                                 $url_bank='bankaccount/statement?bank_id='.$customer_id.'&name='.$bank_name.'&search_date='.$vl->create_date;
                                 if($customer_id==24 || $customer_id==25)
                                 {
                                     $payment_mode="Cash";
                                 }
                                 else
                                 {
                                     $payment_mode="Bank transfer";
                                 }
                                 

                                $data[] = array(
                                                                
                                                                
                                                            'no' => $seti, 

                                                            'id' => $vl->id, 
                                                            
                                                            'name' => $bank_name, 
                                                            'reference_no'=>$vl->reference_no,
                                                            'payment_mode'=>$payment_mode,
                                                            'debit' => round($vl->debit,2),
                                                            'credit' => round($vl->credit,2),
                                                            'status_by' => $vl->status_by,
                                                            'create_date'=>date('d-m-Y',strtotime($vl->create_date)),

                                  );


                              }  




                  
                              $payment_date=date('d-m-Y',strtotime($formdate));
                              $resultopeing_new=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal,create_date FROM bankaccount_manage  WHERE  deleteid='0' AND bank_account_id='".$account_id."' AND opening_balance_status='1' ORDER BY create_date ASC");
                               $resultopeing_new=$resultopeing_new->result();
                               $openingbalance_new=0;
                               $openingbalanceval_new=0;
                              foreach ($resultopeing_new as  $valuess_new)
                               {
                                    $credits_new=$valuess_new->creditstotal;
                                   $debits_new=$valuess_new->debitstotal;
                                   
                                   $payment_date_set=date('d-m-Y',strtotime($valuess_new->create_date));
                                   
                                   if($payment_date==$payment_date_set)
                                   {
                                       $payment_date=$payment_date_set;
                                   }
                                   
                                   if($payment_date_set=='01-Jan-1970')
                                   {
                                        $payment_date=date('d-m-Y',strtotime($formdate));
                                   }
     
                                     if($payment_date <= '01-04-2022')
                                      {
                                          $payment_date=date('d-m-Y',strtotime($valuess_new->create_date));
                                      }
     
                                    $openingbalance_new=$credits_new-$debits_new;
                                    $openingbalanceval_new=$credits_new-$debits_new;
                                      
                                                 if($openingbalance_new<0)
                                                 {
                                                     $getstatus1_set=1;
                                                 }
                                                 else
                                                 {
                                                     $getstatus1_set=0;
                                                 }
                                                 
                                  $openingbalance_new=abs($openingbalance_new);
                               }
                               if($getstatus1_set==1)
                               {
                                          $openingbalanced_new=$openingbalance_new;
                                          $openingbalancec_new=0;
                               }
                               else
                               {
                                           $openingbalanced_new=0;
                                           $openingbalancec_new=$openingbalance_new;
                               }
                               
     
                              $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid='0' AND bank_account_id='".$account_id."' AND opening_balance_status=0 ORDER BY create_date ASC");
                               $resultopeing=$resultopeing->result();
                               $openingbalance=0;
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
                                  'no' => 'OP1', 
                                   'id' => '', 
                                   'name' => '',  
                                   'ex_code' => '', 
                                   'debit' => $debits_opening,
                                    'credit' => $credits_opening,
                                   'totalrange' =>'', 
                                   'balance' => round($openingbalance,2), 
                                   'status_by' =>'', 
                                   'getstatus' => $getstatus1_new, 
                                   'getstatus1' => 0, 
                                   'getstatus2' => 0, 
                                   'totalbalance' =>0, 
                                   'totalbalancec' =>0, 
                                   'totalbalanced' => 0, 
                                   'create_date'=>$payment_date,
                               
                                );
                    
                          $totalarray=array_merge($array2,$data);
                    
                    echo json_encode($totalarray);

    }
    
	
	
	
	
	
		public function fetch_data_details_cash_only()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $fromto=$_GET['fromto'];
                     $data=array();
                     $where="";
                     $where1="";
                     if($account_id==25)
                     {
                          $where .="AND a.bank_account_id='".$account_id."'";
                          $where1 .="AND bank_account_id='".$account_id."'";
                     }
                     else
                     {
                          $where .="AND a.bank_account_id!='25'";
                          $where1 .="AND bank_account_id!='25'";
                     }
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-d');
                         $fromto=date('Y-m-d');
                         
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$fromto."'  AND a.deleteid=0 AND a.opening_balance_status='0' $where ORDER BY a.create_date ASC");
                 	     $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE   a.deleteid=0  $where ORDER BY a.create_date ASC");
                    
                     }
                     else
                     {
                         
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$fromto."'   AND a.deleteid=0  AND a.opening_balance_status='0' $where  ORDER BY a.create_date ASC");
                 	      $resultcount=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$fromto."'  AND a.deleteid=0  $where ORDER BY a.create_date ASC");
                    	
                     }
                     
                     
                     
                     
                     
                          $payment_date=date('d-m-Y');
                         $resultopeing_new=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal,create_date FROM bankaccount_manage  WHERE  deleteid=0  AND opening_balance_status='1' $where1 ORDER BY create_date ASC");
                 	     $resultopeing_new=$resultopeing_new->result();
                 	     $openingbalance_new=0;
                 	     $openingbalanceval_new=0;
                         foreach ($resultopeing_new as  $valuess_new)
                     	 {
                     	      $credits_new=$valuess_new->creditstotal;
                              $debits_new=$valuess_new->debitstotal;
                              
                              if($_GET['fromdate']!='undefined')
                              {
                                  
                                   $payment_date=date('d-m-Y',strtotime($_GET['fromdate']));
                                  
                              }
                             

                              
                              
                     	      $openingbalance_new=$credits_new-$debits_new;
                     	      $openingbalanceval_new=$credits_new-$debits_new;
                     	        
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_set=1;
                                            }
                                            else
                                            {
                                                $getstatus1_set=0;
                                            }
                                            
                             $openingbalance_new=abs($openingbalance_new);
                     	 }
                 	     if($getstatus1_set==1)
                 	     {
                 	                $openingbalanced_new=$openingbalance_new;
                 	                $openingbalancec_new=0;
                 	     }
                 	     else
                 	     {
                 	                 $openingbalanced_new=0;
                 	                 $openingbalancec_new=$openingbalance_new;
                 	     }
                 	     
                 	     
                 	     
                     
                     
                     
                     
                     
                         $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid=0  AND opening_balance_status=0 $where1 ORDER BY create_date ASC");
                 	     $resultopeing=$resultopeing->result();
                 	     $openingbalance=0;
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
                 	        'no' => 'OP1', 

                 	 		'id' => '', 
                	 		
                 	 		'name' => '',  
                 	 		'ex_code' => '', 
                 	 		'debit' => $debits_opening,
                            'credit' => $credits_opening,
                 	 		'totalrange' =>'', 
                 	 		'balance' => round($openingbalance,2), 
                 	 		'status_by' =>'', 
                 	 		'getstatus' => $getstatus1_new, 
                 	 		'getstatus1' => 0, 
                 	 		'getstatus2' => 0, 
                 	 		'totalbalance' =>0, 
                 	 		'totalbalancec' =>0, 
                 	 		'totalbalanced' => 0, 
                 	 		'create_date'=>$payment_date,
                 	     
                 	      );

                     
                   
                     
                     
                     
                     
                     
                    	
                    	
                    	
                    	$resultset=$resultcount->result();
                    	$total=0;
                    	$totald=0;
                    	$totalc=0;
                    	
                    	
                    	foreach($resultset as $set)
                    	{
                    	   $total=$set->credit-$set->debit;
                    	   $totald=$set->debit;
                    	   $totalc=$set->credit;
                    	}
                    	
                    	
                    	
                    	
                    	
                    	
                    	
                    	$total_tot_range=0;
                    	$resultcount_tot=$this->db->query("SELECT SUM(credit) as credit,SUM(debit) as debit FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$formdate."' AND a.bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.create_date ASC");
                    	$resultset_tot=$resultcount_tot->result();
                    	
                    	foreach($resultset_tot as $set_tot)
                    	{
                    	   $total_tot_range=$set_tot->credit-$set_tot->debit;
                    	   
                    	}
                     
                     
                     
                     
                 	  $result=$result->result();
                      $i=2;
                 	  $balanceold=array($openingbalance_data);
                      foreach ($result as  $value)
                      {
                     	      $credits=$value->credit;
                              $debits=$value->debit;
                     	      $balanceold[]=  $credits-$debits;
                     	     
                     }
                     foreach ($result as  $value) 
                     {
                 	     
                                     	     $addclass="";
                                     	     if($value->changes_status==1)
                                     	     {
                                     	         $addclass="bgcolorchange";
                                     	     }
                                     	     
                                 	        if($value->debit=='')
                                 	        {
                                 	            $value->debit=0;
                                 	        }
                                 	        
                                 	        if($value->credit=='')
                                 	        {
                                 	            $value->credit=0;
                                 	        }
                                 	 
                                 	 
                                            $seti=$i;
                         
                                            $valueset=$total;
                                            
                                            if($valueset>0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=abs($total);
                         
                                           
                                           
                                            $balancett=0;
                                            for($k=0;$k<$i;$k++)
                                            {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                            }
                         
                                            $valuesetbalance=$balancett;
                                            
                                            if($valuesetbalance<0)
                                            {
                                                $getstatus1=1;
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                            }
                                            
                                                //$valuesetbalance=str_replace('-', '', $valuesetbalance);
                         
                                                
                                                if($total_tot_range>0)
                                                {
                                                    $getstatus2=1;
                                                }
                                                else
                                                {
                                                    $getstatus2=0;
                                                }
                                                $totalrange=abs($total_tot_range);
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $seti, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => round($value->debit,2),
                 	 		'credit' => round($value->credit,2),
                 	 		'amount' => $value->amount,
                 	 		'totalrange' => $totalrange,
                 	 		'balance' => round($valuesetbalance,2),
                 	 		'status_by' => $value->status_by,
                 	 		'getstatus' => $getstatus,
                 	 		'getstatus1' => $getstatus1,
                 	 		'getstatus2' => $getstatus2,
                 	 		'addclass' => $addclass,
                 	 		'totalbalance' => round($total,2),
                 	 		'totalbalancec' => round($totalc,2),
                 	 		'totalbalanced' => round($totald,2),
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }



                    $totalarray=array_merge($array2,$data);
                    
                 
                    
                    echo json_encode($totalarray);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetch_data_details_by_opeing_balance()
	{


                     $account_id=$_GET['account_id'];
                     $formdate=$_GET['fromdate'];
                     $todate=$_GET['fromto'];
                     $data=array();
                     
                     
                     
                   
                     if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date("Y-m-01");
                         $todate=date("Y-m-d");
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date < '".$formdate."'  AND bank_account_id='".$account_id."' AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date < '".$formdate."'  AND bank_account_id='".$account_id."'  AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     
                     
                     
                 	  $result=$result->result();
                 
                 	 $i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	        if($value->debit=='')
                 	        {
                 	            $value->debit=0;
                 	        }
                 	        
                 	        if($value->credit=='')
                 	        {
                 	            $value->credit=0;
                 	        }
                 	 
                 	 
                         if($value->status_by=='Opening Balance')
                         {
                             $i='OP1';
                         }
                 	 
                 	 
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => round($value->debit,2),
                 	 		'credit' => round($value->credit,2),
                 	 		'balance' => $value->balance,
                 	 		'status_by' => $value->status_by,
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
    
    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $output=array();
                     
    	             $result= $this->Main_model->where_names('bankaccount','id',$id);
                 	 foreach ($result as  $value)
                 	 {
                 	 	$output['bank_name'] = $value->bank_name;
                 	 	$output['type'] = $value->type;
                 	 	$output['account_no'] = $value->account_no;
                 	 	$output['ifsc_code'] = $value->ifsc_code;
                 	 	$current_amount = $value->current_amount;
                 	 	
                 	 	                                              // $res = $this->Main_model->where_names('bankaccount_manage','bank_account_id',$id);
																		
												$res = $this->db->query("SELECT * FROM bankaccount_manage WHERE bank_account_id='".$id."' AND  party_type NOT IN('1','2','3','5') ")->result();
																			   

                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          if($val->deleteid==0)
                                                                          {
                                                                              
                                                                          
                                                                          $debitsamount+=$val->debit;
                                                                          $creditsamount+=$val->credit;
                                                                          
                                                                          
                                                                          
                                                                          }
                                                                          
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                 	 	
                 	 	
                 	 	$output['current_amount'] = round($balancetotal,2);
                 	 	
                 	 	$output['opeing_balance'] = round($current_amount,2);
                 	 	
                 	 	$output['op_date'] = $value->opening_date;
                 	 	$output['payment_status'] = $value->payment_status;
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
     
    public function fetch_single_data_by()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {
                 	 	$output['id'] = $value->id;
                 	 	$output['name'] = $value->name;
                 	 	$output['debit'] = round($value->debit,2);
                 	 	$output['credit'] = round($value->credit,2);
                 	 	$output['create_date'] = $value->create_date;
                 	 	
                 	 	
                 	 	                                              $res = $this->Main_model->where_names('bankaccount','id',$value->bank_account_id);
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          $output['bank_name']=$val->bank_name;
                                                                          
                                                                          
                                                                      }
                                                                      
                 	 	
                 	 	
                 	    $output['status_by'] = $value->status_by;
                 	    $output['ex_code'] = $value->ex_code;
                 	 	$output['bank_account_id'] = $value->bank_account_id;
                 	 	$output['account_head_id'] = $value->account_head_id;
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
	
	

	
      	public function export_bank_statement()
	{



                    
                    
                     $account_id=$_GET['account_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     
                     
                      $where="";
                     $where1="";
                     if($account_id==25)
                     {
                          $where .="AND a.bank_account_id='".$account_id."'";
                          $where1 .="AND bank_account_id='".$account_id."'";
                     }
                     else
                     {
                          $where .="AND a.bank_account_id!='25'";
                          $where1 .="AND bank_account_id!='25'";
                     }
                     
                     $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                     
                     
                    
                      if($_GET['fromdate']=='undefined')
                     {
                         
                         $formdate=date("Y-m-d", strtotime('monday this week'));
                         $todate=date("Y-m-d", strtotime('sunday this week'));
                         $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.deleteid=0  AND a.opening_balance_status='0' $where ORDER BY a.create_date  ASC");
                 	
                     }
                     else
                     {
                          $result=$this->db->query("SELECT * FROM bankaccount_manage as a  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'   AND a.deleteid=0  AND a.opening_balance_status='0'  $where ORDER BY a.create_date  ASC");
                 	
                     }
                 	
                 	$result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=2;
                 	  $array=array();
                 
                  
                        if($account_id==25)
                        {
                            
                         $filename='Cash_report_'.$formdate.'_TO_'.$todate; 
                        
                        }
                        else
                        {
                          $filename='Non_Cash_report_'.$formdate.'_TO_'.$todate; 
                         
                        }
                  
                        
                         
                         
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         $payment_date=date('01-m-Y');
                         $resultopeing_new=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal,create_date FROM bankaccount_manage  WHERE  deleteid=0  AND opening_balance_status='1' $where1 ORDER BY create_date ASC");
                 	     $resultopeing_new=$resultopeing_new->result();
                 	     $openingbalance_new=0;
                 	     $openingbalanceval_new=0;
                         foreach ($resultopeing_new as  $valuess_new)
                     	 {
                     	      $credits_new=$valuess_new->creditstotal;
                              $debits_new=$valuess_new->debitstotal;
                              $payment_date=date('d-m-Y',strtotime($valuess_new->create_date));
                              if($payment_date=='01-Jan-1970')
                              {
                                   $payment_date=date('01-m-Y');
                              }
                              
                              
                     	      $openingbalance_new=$credits_new-$debits_new;
                     	      $openingbalanceval_new=$credits_new-$debits_new;
                     	        
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_set=1;
                                            }
                                            else
                                            {
                                                $getstatus1_set=0;
                                            }
                                            
                             $openingbalance_new=abs($openingbalance_new);
                     	 }
                 	     if($getstatus1_set==1)
                 	     {
                 	                $openingbalanced_new=$openingbalance_new;
                 	                $openingbalancec_new=0;
                 	     }
                 	     else
                 	     {
                 	                 $openingbalanced_new=0;
                 	                 $openingbalancec_new=$openingbalance_new;
                 	     }








                         
                         
                         
                         
                         
                         
                                                     $resultopeing=$this->db->query("SELECT SUM(credit) as creditstotal,SUM(debit) as debitstotal FROM bankaccount_manage  WHERE `create_date` < '".$formdate."'   AND deleteid=0  AND opening_balance_status='0' $where1  ORDER BY create_date ASC");
                                             	     $resultopeing=$resultopeing->result();
                                             	     $openingbalance=0;
                                                     foreach ($resultopeing as  $valuess)
                                                 	 {
                                                 	      $credits=$valuess->creditstotal;
                                                          $debits=$valuess->debitstotal;
                                                 	      $openingbalance=  $credits-$debits;
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
                                                                             
                         
                         
                                                 $resultsub=$this->db->query("SELECT * FROM bankaccount  WHERE id='".$account_id."' AND deleteid=0  ORDER BY id ASC");
                 	                             $resultsub=$resultsub->result();
                                                 $bankname='';
                                                 foreach($resultsub as $val)
                                                 { 
                                                     $bankname=$val->bank_name;   
                                                 }   
                                 	     
                                 
                         
                         
                         
                         
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             <?php
                              if($account_id==25)
                             {
                                 ?>
                                 
                                  <tr><th colspan="7">Cash Report <?php echo $formdate; ?> To <?php echo $todate; ?> </th></tr>
                           
                                 <?php
                             }
                             else
                             {
                                  ?>
                                  <tr><th colspan="7">NON Cash Report <?php echo $formdate; ?> To <?php echo $todate; ?> </th></tr>
                           
                                 <?php
                             }
                             
                             ?>
                             
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>Date</th>
                          <th>Particulars</th>
                          <th>Chq/Ref.No</th>
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                         
                          <th>If Changes</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                     $totdebit=0;
                                     $credittot=0;
                                     
                                     
                                     
                                     
                                         $balanceold=array($openingbalance+$openingbalanceval_new);
                                     	 foreach ($result as  $value)
                                     	 {
                                     	      $credits=$value->credit;
                                              $debits=$value->debit;
                                     	      $balanceold[]=  $credits-$debits;
                                     	     
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
                       
                       
                                     
                                      ?>
                                      
                                        <tr style="background: #dfdfdf;">
                                         <td><?php echo $payment_date; ?></td>
                                          <td>Opening Balance</td>
                                          <td></td>
                                          <td><?php echo $debits_opening; ?></td>
                                          <td><?php echo $credits_opening; ?></td>
                                          <td><?php echo round($openingbalance+$openingbalanceval_new,2); ?></td>
                                         </tr>
                                      <?php
                                     
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	            $totdebit+=$value->debit;
                                 	            $credittot+=$value->credit;
                                 	            
                                 	               $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                                 	          $seti=$i;
                                 	           
                                 	               ?>
                                 	      <tr >
                                           <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php 
                                          
                                          if($value->name!="")
                                          {
                                              echo $value->name; 
                                          }
                                          
                                          
                                            if($value->status_by!="")
                                          {
                                              echo $value->status_by; 
                                          }
                                          
                                          
                                          ?> </td>
                                          
                                          <td><?php
                                            if($value->status_by=="Opening Balance")
                                          {
                                              echo "O00001"; 
                                          }
                                          else
                                          {
                                               echo $value->ex_code;
                                          }
                                         
                                          
                     	                  
                                          
                                          ?></td>
                                          <td><?php echo round($value->debit,2); ?></td>
                                          <td><?php echo round($value->credit,2); ?></td>
                                          <td><?php echo $balance; ?></td>
                                          <td><?php echo $value->amount; ?></td>
                                          
                                        </tr>
                                 	    
                                 	    <?php  
                                 	            
                                 	            
                            
                                 	   
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                            
                         
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	

}	
