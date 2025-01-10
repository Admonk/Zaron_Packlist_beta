<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('memory_limit', '4400M');

class Accountheads extends CI_Controller {

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
    
     public function ToObject($Array) {
     
    // Create new stdClass object
    $object = new stdClass();
     
    // Use loop to convert array into
    // stdClass object
    foreach ($Array as $key => $value) {
        if (is_array($value)) {
            $value = ToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
    }
    




    public function statusupdate_discount()
	{


                       date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('Y-m-d');
                       $time= date('h:i A');

                           $form_data = json_decode(file_get_contents("php://input"));
                           $id=$form_data->id;
                           $status=$form_data->status;
                           $statusname=$form_data->statusname;
                           $amount_set=$form_data->amount_set;
		                       



                                       $resultventss= $this->Main_model->where_names('admin_users','id',$this->userid);
                                       foreach ($resultventss as  $valuesss) 
                                       {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
 
  
                       if($id>0)
                       {

                       	

	if($status==0)
	{
		$viewstatus='147';
		
	}
	else
	{
		$viewstatus='148';
	}
	
	$this->db->query("UPDATE all_ledgers SET  approved_md_time='".$time."',approved_md_date='".$date."',credits='".$amount_set."',md_verification='".$viewstatus."',reference_no='".$statusname."',approved_by='".$username_base."',deleteid='".$status."' WHERE id='".$id."' AND party_type=1");

	$this->db->query("UPDATE all_ledgers SET  debits='".$amount_set."',md_verification='".$viewstatus."',reference_no='".$statusname."',approved_by='".$username_base."',deleteid='".$status."' WHERE deletemod='CBR".$id."' AND party_type=5");






                        $datas_log['user_id']= $this->userid; 
                        $datas_log['customer_id']= $form_data->id; 
                        $datas_log['data_fetch']= json_encode($form_data);   
                        $this->Main_model->insert_commen($datas_log,'ledgers_approved_log');

                        }


	}
    
	public function accountheads_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 
							            	 $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
							            	 
							            	 
							            	 $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
							            	 
							            	 
							            	 $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
											
										    if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                  	
                                                  	 $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     
                                                  	   if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                  	     
                                                  	      if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	     
                                                  	     
                                                       }
                                                       
                                                  	     
                                                  	     
                                                  	 }
											 
                                              }
                                              else
                                              {
                                                 	 $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	 }
											  
                                              }
							            	 
							            	 
							            	 
							            	 
							            
							                 
							                 
							                 
							                 
							            	 $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							            	 //$data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','15','deleteid','0','id','ASC');
                                             $data['additional_information'] =array();
							            	 
							            	 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Ledger Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('accountheads/accountheads_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function accountheads_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                                             $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['accountheads'] = $this->Main_model->where_names('accountheads','id',$id);
							            	 
                                             $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                                             
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
											
										    if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                  	
                                                  	 $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     
                                                  	   if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                  	     
                                                  	      if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	     
                                                  	     
                                                       }
                                                       
                                                  	     
                                                  	     
                                                  	 }
											 
                                              }
                                              elseif($this->session->userdata['logged_in']['access']=='12')
                                              {
                                                  
                                                      $sales_head = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                   	  foreach($sales_head as $value)
                                                  	  {
                                                  	     if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	  }
                                                  	  
                                              }
                                              else
                                              {
                                                 	 $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	 }
											  
                                              }
							            	 
							            	 
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                              $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							            	 // $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','15','deleteid','0','id','ASC');
                                              $data['additional_information'] =array();
                                             
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Ledger Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('accountheads/accountheads_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function index()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                 $data['option']='';
							                 $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
							                 
							                 foreach($additional_information as $val)
							                 {
							                     $data['option']=explode(',', $val->option);
							                 }
							                 
							                 
							                 
							                 
							                 
							                 
							                 
							                 
							                 
							                 
							                         $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	 }
                                                  	 
                                                  	 
                                                  	 
                                                  	 
                                                  	 
                                                	 
                                           
                                             $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Others Ledger';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('accountheads/accountheads_list',$data);
										
										
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


                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	
							            	 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Customer Ledger';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('customer/ledger',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function ledger_find()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                             $data['customer_id']=$_GET['customer_id'];
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
							            	 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Customer Ledger';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('accountheads/ledger_find',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function ledger_view()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                 $data['customer_id']=$_GET['customer_id']; 
                                             $res = $this->Main_model->where_names('accountheads','id',$_GET['customer_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->name;
                                             }
                                             
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Customer Ledger View';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('customer/ledger_view',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}

	public function update_commission_data()
	{




                       $form_data = json_decode(file_get_contents("php://input"));
                       $id=$form_data->id;
                       $payment_date=$form_data->payment_date;
                       $party_type3=$form_data->party_type3;
                       $party_type4=$form_data->party_type4;
                       $party_type1=$form_data->party_type1;
                       $party_type2=$form_data->party_type2;
                       $value1=$form_data->value1;
                       $value2=$form_data->value2;
                       $value3=$form_data->value3;
                       $value4=$form_data->value4;
                       $remarks1=$form_data->remarks1;
                       $remarks2=$form_data->remarks2;
                       $remarks3=$form_data->remarks3;
                       $remarks4=$form_data->remarks4;
                       $totalsum=$form_data->totalsum;
                       $consider_gst=$form_data->consider_gst;

$gstamount=$form_data->gst;





                                      $md_verification=0;
                                      $result= $this->Main_model->where_names('all_ledgers','id',$id);
				                      if(count($result)>0)
				                      {




                                               foreach($result as $ss)
                                               {

                                               	     $md_verification=$ss->md_verification;

                                               }






				                      }




if($md_verification==0)
{


	 $resultventss= $this->Main_model->where_names('admin_users','id',$this->userid);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }

$notes='Verification Request'; 

$this->db->query("UPDATE all_ledgers SET  consider_gst='".$consider_gst."',gstamount='".$gstamount."',party_type4='".$party_type4."', party_type3='".$party_type3."', party_type1='".$party_type1."', party_type2='".$party_type2."', value1='".$value1."', value2='".$value2."', value3='".$value3."', value4='".$value4."', remarks1='".$remarks1."', remarks2='".$remarks2."', remarks3='".$remarks3."', remarks4='".$remarks4."', totalsum='".$totalsum."',c_payment_date='".$payment_date."',notes='".$notes."',md_verification=1,request_by='".$username_base."' WHERE id='".$id."'");



                        $datas_log['user_id']= $this->userid; 
                        $datas_log['customer_id']= $form_data->id; 
                        $datas_log['data_fetch']= json_encode($form_data);   
                        $this->Main_model->insert_commen($datas_log,'ledgers_approved_log');


}








	}
	



	public function payment_transfer_by_commsison()
	{

date_default_timezone_set("Asia/Kolkata");
 $time = date('h:i A');

                       $form_data = json_decode(file_get_contents("php://input"));
                       $id=$form_data->id;



                         $party_type4=0;
                         $query = $this->db->query("SELECT * FROM all_ledgers  WHERE  id='".$id."'");
                         $res=$query->result();
                         foreach($res as $form_data_set)
                        {
                                                                              
                                                                       
		                       $payment_date=$form_data_set->payment_date;
		                       $order_no_set=$form_data_set->order_no;
		                       $party_type3=$form_data_set->party_type3;
		                       $party_type4=$form_data_set->party_type4;
		                       $party_type1=$form_data_set->party_type1;
		                       $party_type2=$form_data_set->party_type2;
		                       $value1=$form_data_set->value1;
		                       $value2=$form_data_set->value2;
		                       $value3=$form_data_set->value3;
		                       $value4=$form_data_set->value4;
		                       $remarks1=$form_data_set->remarks1;
		                       $remarks2=$form_data_set->remarks2;
		                       $remarks3=$form_data_set->remarks3;
		                       $remarks4=$form_data_set->remarks4;
		                       $totalsum=$form_data_set->totalsum;


		                       $payment_date=$form_data->payment_date;
		                       $payment_date=date('Y-m-d');

		                       
		                       $party_type3=$form_data->party_type3;
		                       $party_type4=$form_data->party_type4;
		                       $party_type1=$form_data->party_type1;
		                       $party_type2=$form_data->party_type2;
		                       $value1=$form_data->value1;
		                       $value2=$form_data->value2;
		                       $value3=$form_data->value3;
		                       $value4=$form_data->value4;
		                       $remarks1=$form_data->remarks1;
		                       $remarks2=$form_data->remarks2;
		                       $remarks3=$form_data->remarks3;
		                       $remarks4=$form_data->remarks4;
		                       $totalsum=$form_data->totalsum;
		                       $consider_gst=$form_data->consider_gst;

                             $gstamount=$form_data->gst;
		                      
 $totalval=$value1+$value2+$value3+$value4+$gstamount;


		                

                           if($value1>0)
                           {

                            
					                    


					                               $customers=explode('-',$remarks1);
                                         $account_head_id=0;
                                         $customer_id=$customers[0];


                                                                    if($party_type1=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type1=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     if($party_type1=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type1=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     $res=$res->result();  
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }

					                              $discount_data_base2['order_id'] = 0;
                                        $discount_data_base2['customer_id'] = $customers[0];
                                        $discount_data_base2['user_id'] = $this->userid;
                                        $discount_data_base2['notes'] = 'Commission Payment Cash';
                                        $discount_data_base2['payment_mode'] = 'Cash';
                                        $discount_data_base2['difference'] = 0;
                                        $discount_data_base2['reference_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['amount'] = round($value1);
                                        $discount_data_base2['account_head_id'] = $account_head_id;
                                        $discount_data_base2['account_heads_id_2'] = $account_heads_id_2;
                                        $discount_data_base2['order_trancation_status'] = 0;
                                        $discount_data_base2['order_no'] = '#'.$id;
                                        $discount_data_base2['bank_id'] = 25;
                                        $discount_data_base2['paid_status'] = 1;
                                        $discount_data_base2['debits'] = 0;
                                        $discount_data_base2['credits'] = round($value1,2);
                                        $discount_data_base2['collected_amount'] = $value1;
                                        $discount_data_base2['payment_date'] = $payment_date;
                                        $discount_data_base2['process_by'] = 'Commission Payment Cash';
                                        $discount_data_base2['payment_time'] = $time;
                                        $discount_data_base2['party_type'] = $party_type1;
                                        $discount_data_base2['deletemod'] = 'CC'.$id;
                                        //$this->Main_model->insert_commen($discount_data_base2, 'all_ledgers');

                                        $data_bank1['bank_account_id'] = 25;
										                    $data_bank1['ex_code'] =' Ref : #' . $id.'-'.$order_no_set;
										                    $data_bank1['debit'] = $value1;
										                    $data_bank1['payment_status'] = 1;
										                    $data_bank1['credit'] = 0;
										                    $data_bank1['name'] = $customers[1];
										                    $data_bank1['create_date'] = $payment_date;
										                    $data_bank1['user_id'] = $this->userid;
										                    $data_bank1['status_by'] = 'Commission Cash '.$remarks1;
										                    $data_bank1['balance']=0;
										                    $data_bank1['account_head_id'] = 105;
										                    $data_bank1['deletemod'] = 'CHS'.$id;
										                    $data_bank1['account_heads_id_2'] = 105;
										                    $data_bank1['party_type'] = 4;
										                    $data_bank1['single_deposite'] = 1;

										                    $result= $this->Main_model->where_names('bankaccount_manage','deletemod',$data_bank1['deletemod']);
													              if(count($result)==0)
													              {

										                    $insertbank=$this->Main_model->insert_commen($data_bank1, 'bankaccount_manage');

										                    }

                


                           }


                           if($value2>0)
                           {


                            
                           

                                         $customers=explode('-',$remarks2);
                                         $account_head_id=0;
                                         $customer_id=$customers[0];


                                                                    if($party_type2=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type2=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     if($party_type2=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type2=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     $res=$res->result();  
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }

					                              $discount_data_base2['order_id'] = 0;
                                        $discount_data_base2['customer_id'] = $customers[0];
                                        $discount_data_base2['user_id'] = $this->userid;
                                        $discount_data_base2['notes'] = 'Commission Payment Cash Deposit';
                                        $discount_data_base2['payment_mode'] = '0';
                                        $discount_data_base2['difference'] = 0;
                                        $discount_data_base2['reference_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['amount'] = round($value2);
                                        $discount_data_base2['account_head_id'] = $account_head_id;
                                        $discount_data_base2['account_heads_id_2'] = $account_heads_id_2;
                                        $discount_data_base2['order_trancation_status'] = 0;
                                        $discount_data_base2['order_no'] = '#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['bank_id'] = 25;
                                        $discount_data_base2['paid_status'] = 1;
                                        $discount_data_base2['debits'] = 0;
                                        $discount_data_base2['credits'] = round($value2,2);
                                        $discount_data_base2['collected_amount'] = $value2;
                                        $discount_data_base2['payment_date'] = $payment_date;
                                        $discount_data_base2['process_by'] = 'Commission Payment Cash Deposit';
                                        $discount_data_base2['payment_time'] = $time;
                                        $discount_data_base2['party_type'] = $party_type2;
                                        $discount_data_base2['deletemod'] = 'DD'.$id;
                                        //$this->Main_model->insert_commen($discount_data_base2, 'all_ledgers');


                                        	  $data_bank1['bank_account_id'] = 25;
												                    $data_bank1['ex_code'] =' Ref : #' . $id.'-'.$order_no_set;
												                    $data_bank1['debit'] = $value2;
												                    $data_bank1['payment_status'] = 1;
												                    $data_bank1['credit'] = 0;
												                    $data_bank1['name'] = $customers[1];
												                    $data_bank1['create_date'] = $payment_date;
												                    $data_bank1['user_id'] = $this->userid;
												                    $data_bank1['status_by'] = 'Commission Cash Deposit '.$remarks2;
												                    $data_bank1['balance']=0;
												                    $data_bank1['account_head_id'] = 105;
												                    $data_bank1['deletemod'] = 'CHD'.$id;
												                    $data_bank1['account_heads_id_2'] = 105;
												                    $data_bank1['party_type'] = 4;
												                    $data_bank1['single_deposite'] = 1;

												                            $result= $this->Main_model->where_names('bankaccount_manage','deletemod',$data_bank1['deletemod']);
															                      if(count($result)==0)
															                      {

												                                  $insertbank=$this->Main_model->insert_commen($data_bank1, 'bankaccount_manage');

												                            }
                                         
                



                           }

                           if($value3>0)
                           {












                                                                  $customers=explode('-',$remarks3);
																		                           	  $data_bank1['bank_account_id'] = 25;
																							                    $data_bank1['ex_code'] =' Ref : #' . $id.'-'.$order_no_set;
																							                    $data_bank1['debit'] = $value3;
																							                    $data_bank1['payment_status'] = 1;
																							                    $data_bank1['credit'] = 0;
																							                    $data_bank1['name'] = $customers[1];
																							                    $data_bank1['create_date'] = $payment_date;
																							                    $data_bank1['user_id'] = $this->userid;
																							                    $data_bank1['status_by'] = 'Commission Payment '.$remarks3;
																							                    $data_bank1['balance']=0;
																							                    $data_bank1['account_head_id'] = 105;
																							                    $data_bank1['deletemod'] = 'CHD'.$id;
																							                    $data_bank1['account_heads_id_2'] = 105;
																							                    $data_bank1['party_type'] = 4;
																							                    //$insertbank=$this->Main_model->insert_commen($data_bank1, 'bankaccount_manage');
																		                                         



                                                                     $customers=explode('-',$remarks3);
                                                                   	 $account_head_id=0;
                                                                   	 $customer_id=$customers[0];

                                                                 

                                                                     if($party_type3=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type3=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     if($party_type3=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type3=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     $res=$res->result();  
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }




                           	            $discount_data_base2['order_id'] = 0;
                                        $discount_data_base2['customer_id'] = $customers[0];
                                        $discount_data_base2['user_id'] = $this->userid;
                                        $discount_data_base2['notes'] = 'Commission Payment LEDGER';
                                        $discount_data_base2['payment_mode'] = 0;
                                        $discount_data_base2['difference'] = 0;
                                        $discount_data_base2['reference_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['amount'] = round($value3);
                                        $discount_data_base2['account_head_id'] = $account_head_id;
                                        $discount_data_base2['account_heads_id_2'] = $account_heads_id_2;
                                        $discount_data_base2['order_trancation_status'] = 0;
                                        $discount_data_base2['order_no'] = '#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['bank_id'] = 25;
                                        $discount_data_base2['paid_status'] = 1;
                                        $discount_data_base2['debits'] = 0;
                                        $discount_data_base2['credits'] = round($value3,2);
                                        $discount_data_base2['collected_amount'] = $value3;
                                        $discount_data_base2['payment_date'] = $payment_date;
                                        $discount_data_base2['process_by'] = 'Commission Payment LEDGER';
                                        $discount_data_base2['payment_time'] = $time;
                                        $discount_data_base2['party_type'] = $party_type3;
                                        $discount_data_base2['deletemod'] = 'LL'.$id;

                                          
                                      $result= $this->Main_model->where_names('all_ledgers','deletemod',$discount_data_base2['deletemod']);
								                      if(count($result)==0)
								                      {


                                        $this->Main_model->insert_commen($discount_data_base2, 'all_ledgers');


                                      }






                           }






                           if($value4>0)
                           {







                                                                     $customers=explode('-',$remarks4);
                                                                   	 $account_head_id=0;
                                                                   	 $customer_id=$customers[0];

                                                                  


                                                                   


                                                                     if($party_type4=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type4=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     if($party_type4=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type4=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     $res=$res->result();  
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }



                                                                                                        $discount_data_base2['order_id'] = 0;
																                                        $discount_data_base2['customer_id'] = $customers[0];
																                                        $discount_data_base2['user_id'] = $this->userid;
																                                        $discount_data_base2['notes'] = 'Commission Payment CNN';
																                                        $discount_data_base2['payment_mode'] = 0;
																                                        $discount_data_base2['difference'] = 0;
																                                        $discount_data_base2['reference_no'] ='#'.$id.'-'.$order_no_set;
																                                        $discount_data_base2['amount'] = round($value4);
																                                        $discount_data_base2['account_head_id'] = $account_head_id;
																                                        $discount_data_base2['account_heads_id_2'] = $account_heads_id_2;
																                                        $discount_data_base2['order_trancation_status'] = 0;
																                                        $discount_data_base2['order_no'] = '#'.$id.'-'.$order_no_set;
																                                        $discount_data_base2['bank_id'] = 0;
																                                        $discount_data_base2['paid_status'] = 1;
																                                        $discount_data_base2['debits'] = 0;
																                                        $discount_data_base2['credits'] = round($value4,2);
																                                        $discount_data_base2['collected_amount'] = $value4;
																                                        $discount_data_base2['payment_date'] = $payment_date;
																                                        $discount_data_base2['process_by'] = 'Commission Payment CNN';
																                                        $discount_data_base2['payment_time'] = $time;
																                                        $discount_data_base2['party_type'] = $party_type4;
																                                        $discount_data_base2['deletemod'] = 'CNN-CS'.$id;
																                                        //$this->Main_model->insert_commen($discount_data_base2, 'all_ledgers');








                       $res_cnn = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='330' ORDER BY id ASC");
                       $res_cnn=$res_cnn->result();  
                                                                     foreach($res_cnn as $valcnn)
                                                                     {
                                                                            
                                                                            $account_head_id= $valcnn->account_heads_id;
                                                                            $account_heads_id_2= $valcnn->account_heads_id_2;
                                                                     }

                                                    $discount_data_base21['order_id'] = 0;
			                                        $discount_data_base21['customer_id'] = 330;
			                                        $discount_data_base21['user_id'] = $this->userid;
			                                        $discount_data_base21['notes'] = 'CNN Payment '.$company_name;
			                                        $discount_data_base21['payment_mode'] = '0';
			                                        $discount_data_base21['difference'] = 0;
			                                        $discount_data_base21['reference_no'] ='#'.$id.'-'.$order_no_set;
			                                        $discount_data_base21['amount'] = round($value4);
			                                        $discount_data_base21['account_head_id'] = $account_head_id;
			                                        $discount_data_base21['account_heads_id_2'] = $account_heads_id_2;
			                                        $discount_data_base21['order_trancation_status'] = 0;
			                                        $discount_data_base21['order_no'] = '#'.$id.'-'.$order_no_set;
			                                        $discount_data_base21['bank_id'] = 0;
			                                        $discount_data_base21['paid_status'] = 1;
			                                        $discount_data_base21['debits'] = 0;
			                                        $discount_data_base21['credits'] = round($value4,2);
			                                        $discount_data_base21['collected_amount'] = $value4;
			                                        $discount_data_base21['payment_date'] = $payment_date;
			                                        $discount_data_base21['process_by'] = 'CNN Payment '.$company_name;
			                                        $discount_data_base21['payment_time'] = $time;
			                                        $discount_data_base21['party_type'] = 5;
			                                        $discount_data_base21['deletemod'] = 'CNN'.$id;


			                                        $result= $this->Main_model->where_names('all_ledgers','deletemod',$discount_data_base21['deletemod']);
													if(count($result)==0)
													{

			                                        $this->Main_model->insert_commen($discount_data_base21, 'all_ledgers');

			                                        }






                           }







                            if($gstamount>0)
                           {






                           	            $discount_data_base2['order_id'] = 0;
                                        $discount_data_base2['customer_id'] = 328;
                                        $discount_data_base2['user_id'] = $this->userid;
                                        $discount_data_base2['notes'] = 'Commission Payment GST';
                                        $discount_data_base2['payment_mode'] = 0;
                                        $discount_data_base2['difference'] = 0;
                                        $discount_data_base2['reference_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['amount'] = round($gstamount);
                                        $discount_data_base2['account_head_id'] = 17;
                                        $discount_data_base2['account_heads_id_2'] = 17;
                                        $discount_data_base2['order_trancation_status'] = 0;
                                        $discount_data_base2['order_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_data_base2['bank_id'] = 25;
                                        $discount_data_base2['paid_status'] = 1;
                                        $discount_data_base2['debits'] = 0;
                                        $discount_data_base2['credits'] = round($gstamount,2);
                                        $discount_data_base2['collected_amount'] = $gstamount;
                                        $discount_data_base2['payment_date'] = $payment_date;
                                        $discount_data_base2['process_by'] = 'Commission Payment GST';
                                        $discount_data_base2['payment_time'] = $time;
                                        $discount_data_base2['party_type'] = 5;
                                        $discount_data_base2['deletemod'] = 'SS'.$id;

                                       $result= $this->Main_model->where_names('all_ledgers','deletemod',$discount_data_base2['deletemod']);
																       if(count($result)==0)
																       {


                                        $this->Main_model->insert_commen($discount_data_base2, 'all_ledgers');


                                       }






                           }



                                        $discount_ss['order_id'] = 0;
                                        $discount_ss['customer_id'] = 252;
                                        $discount_ss['user_id'] = $this->userid;
                                        $discount_ss['notes'] = 'Commission Payment Debit '.$company_name;
                                        $discount_ss['payment_mode'] = '0';
                                        $discount_ss['difference'] = 0;
                                        $discount_ss['reference_no'] ='#'.$id.'-'.$order_no_set;
                                        $discount_ss['amount'] = round($totalval);
                                        $discount_ss['account_head_id'] = 48;
                                        $discount_ss['account_heads_id_2'] = 48;
                                        $discount_ss['order_trancation_status'] = 0;
                                        $discount_ss['order_no'] = '#'.$id.'-'.$order_no_set;
                                        $discount_ss['bank_id'] = 25;
                                        $discount_ss['paid_status'] = 1;
                                        $discount_ss['debits'] = round($totalval,2);
                                        $discount_ss['credits'] = 0;
                                        $discount_ss['collected_amount'] = $totalval;
                                        $discount_ss['payment_date'] = $payment_date;
                                        $discount_ss['process_by'] = 'Commission Payment Debit '.$company_name;
                                        $discount_ss['payment_time'] = $time;
                                        $discount_ss['party_type'] = 5;
                                        $discount_ss['deletemod'] = 'DPAY_SET'.$id;
                                        $discount_ss['comission_transfered'] = 1;

                                          
                                        $result= $this->Main_model->where_names('all_ledgers','deletemod',$discount_ss['deletemod']);
								        if(count($result)==0)
								        {


                                             $this->Main_model->insert_commen($discount_ss, 'all_ledgers');


                                        }








                                       $resultventss= $this->Main_model->where_names('admin_users','id',$this->userid);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }

$notes='Payment Transferred';
                         
$this->db->query("UPDATE all_ledgers SET  party_type4='".$party_type4."',  gstamount='".$gstamount."',consider_gst='".$consider_gst."',party_type3='".$party_type3."', party_type1='".$party_type1."', party_type2='".$party_type2."', value1='".$value1."', value2='".$value2."', value3='".$value3."', value4='".$value4."', remarks1='".$remarks1."', remarks2='".$remarks2."', remarks3='".$remarks3."', remarks4='".$remarks4."', totalsum='".$totalsum."',c_payment_date='".$payment_date."',notes='".$notes."',md_verification='3',deleteid=0,payment_trasfered_by='".$username_base."' WHERE id='".$id."'");


                   



                       }









                        $datas_log['user_id']= $this->userid; 
                        $datas_log['customer_id']= $form_data->id; 
                        $datas_log['data_fetch']= json_encode($form_data);   
                        $this->Main_model->insert_commen($datas_log,'ledgers_approved_log');

	}
	



	public function statusupdate()
	{




                           $form_data = json_decode(file_get_contents("php://input"));
                           $id=$form_data->id;
                           $payment_date=$form_data->payment_date;
		                       $party_type3=$form_data->party_type3;
		                       $party_type4=$form_data->party_type4;
		                       $party_type1=$form_data->party_type1;
		                       $party_type2=$form_data->party_type2;
		                       $value1=$form_data->value1;
		                       $value2=$form_data->value2;
		                       $value3=$form_data->value3;
		                       $value4=$form_data->value4;
		                       $remarks1=$form_data->remarks1;
		                       $remarks2=$form_data->remarks2;
		                       $remarks3=$form_data->remarks3;
		                       $remarks4=$form_data->remarks4;
		                       $totalsum=$form_data->totalsum;
		                       $consider_gst=$form_data->consider_gst;
                           $gstamount=$form_data->gst;



                                       $resultventss= $this->Main_model->where_names('admin_users','id',$this->userid);
                                       foreach ($resultventss as  $valuesss) 
                                       {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
 
              $notes=$form_data->statusname;
                      
$this->db->query("UPDATE all_ledgers SET  party_type4='".$party_type4."',consider_gst='".$consider_gst."',gstamount='".$gstamount."', party_type3='".$party_type3."', party_type1='".$party_type1."', party_type2='".$party_type2."', value1='".$value1."', value2='".$value2."', value3='".$value3."', value4='".$value4."', remarks1='".$remarks1."', remarks2='".$remarks2."', remarks3='".$remarks3."', remarks4='".$remarks4."', totalsum='".$totalsum."',c_payment_date='".$payment_date."',notes='".$notes."',md_verification='".$form_data->status."',approved_by='".$username_base."' WHERE id='".$id."'");



                        $datas_log['user_id']= $this->userid; 
                        $datas_log['customer_id']= $form_data->id; 
                        $datas_log['data_fetch']= json_encode($form_data);   
                        $this->Main_model->insert_commen($datas_log,'ledgers_approved_log');


	}
	
		public function addressadd()
	{
	    
	    $form_data = json_decode(file_get_contents("php://input"));
	    
	                
                         
                          if($form_data->name!='' && $form_data->phone!='')
                          {

			                     $tablename=$form_data->tablename;
			                   
			                   

                                      $result= $this->Main_model->where_names($tablename,'phone',$form_data->phone);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Contact phone no  already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                          
				                          
				                      	     $data_address['customer_id']=$form_data->id;
				                      	     $data_address['name']=$form_data->name;
            			                     $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             $data_address['locality']=$form_data->locality;
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $this->Main_model->insert_commen($data_address,$tablename);
				                      	    
				                      	    
				                      	    
				                      	    $array=array('error'=>'2','massage'=>'Address successfully Added..');
                                            echo json_encode($array);
				                      }




			                     

                     }
                          else
                          {
                             $array=array('error'=>'1');
                             echo json_encode($array);
                         }
                         
                         
                     
	    
	}
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                    date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('Y-m-d');
                       $time= date('h:i A');

                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->company_name!='')
                     {

			                     $tablename=$form_data->tablename;
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 
                                     $data['gst_status']=$form_data->gst_status;
                                     $account_heads_id=$form_data->account_heads_id;
                                     $account_heads_id_multipel=implode('|', $account_heads_id);
                                     $data['account_heads_id']=$account_heads_id[0];
                                     $data['account_heads_id_multipel']=$account_heads_id_multipel;
                                 
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','15','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                                $label_name=strtolower($vl->label_name);
                                                //$data[$label_name]= $form_data->$label_name; 
                                     }
                                     

                                      
                                     $data['zone']=$form_data->zone;
                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     
                                     $data['opening_balance']=$form_data->opening_balance;
                                     $data['payment_status']=$form_data->payment_status;
                                    
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     if($form_data->gst_status==2)
                                 {
                                     $data['gst']=0; 
                                 }
            			                     
			                     
			                     $data['name']=$form_data->company_name;
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
			                     
                             
                                


                                      //$result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
				                      //if(count($result)>0)
				                      //{

				                        	 //$array=array('error'=>'3','massage'=>'Customer phone no  already exists');
                                             //echo json_encode($array);

				                      //}
				                      //else
				                      //{
				                          
				                          
				                      	                           $customer_id=$this->Main_model->insert_commen($data,$tablename);
				                      	                        
				                      	                        
				                      	                        
				                      	                           $obalance=$form_data->opening_balance;
                                  
                                                                   $query = $this->db->query("SELECT id,name,account_heads_id FROM accountheads  WHERE deleteid='0'  AND id='".$customer_id."' ORDER BY name ASC");
                                                                   $res=$query->result();
                                                                   foreach($res as $val)
                                                                   {
                                                                                $company_name= $val->name;
                                                                                $account_heads_id= $val->account_heads_id;
                                                                   }
                                                                       
                          
                          
                                                                   $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$customer_id."' AND party_type='5' AND opening_balance_status='1'");
                                                                   $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',5,'deleteid','0','id','ASC');    
                                                                     
				                      	                           

                                                                      
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          $debitsamount+=$val->debits;
                                                                          $creditsamount+=$val->credits;
                                                                          $balancetotal+=$val->balance;
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                                                                      
                                                                      
                                                                      
                                                                              if($form_data->payment_status=='1')
                                                                              {
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance';  
                                                                                                              $data_driver['opening_balance_status']='1';
                                                                                                              
                                                                                                              if($balancetotal==0)
                                                                                                              {   
                                                                                                                   $data_driver['balance']=$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                   
                                                                                                                   $data_driver['balance']=$balancetotal+$obalance;
                                                                                                                   
                                                                                                              }
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                              if($balancetotal==0)
                                                                                                              {
                                                                                                                    $data_driver['balance']='-'.$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                  
                                                                                                                    $data_driver['balance']=$balancetotal-$obalance;
                                                                                                                   
                                                                                                                    
                                                                                                              }
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('Y-06-30');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['customer_id']=$customer_id;
                                                                              $data_driver['bank_id']=25;
                                                                              $data_driver['deletemod']=$customer_id.'OP5';
                                                                              $data_driver['party_type']=5;
                                                                              $data_driver['order_id']=0;
                                                                              $data_driver['user_id']=$this->userid;
                                                                              $data_driver['account_head_id']=$account_heads_id;
                                                                              $data_driver['account_heads_id_2']=$account_heads_id;
                                                                              $this->Main_model->insert_commen($data_driver,'all_ledgers');
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Other Ledger successfully Added..');
                                             echo json_encode($array);
				                     // }




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	 if($form_data->company_name!='')
                     {

                                    $tablename=$form_data->tablename;
                                    $data['get_id']=$form_data->id;
                                    $customer_id=$form_data->id;
			                        $data['email']=$form_data->email;
			                        $data['phone']=$form_data->phone;
			                        $data['address1']=$form_data->address1;
                                    $data['gst_status']=$form_data->gst_status;


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                   
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     
                                     
                                     $account_heads_id=$form_data->account_heads_id;
                                     $account_heads_id_multipel=implode('|', $account_heads_id);
                                     $data['account_heads_id']=$account_heads_id[0];
                                     $data['account_heads_id_multipel']=$account_heads_id_multipel;
                                 
                                     
                                     $data['opening_balance']=$form_data->opening_balance;
                                     $data['payment_status']=$form_data->payment_status;
                                    
                                     
                                     
                                     $data['zone']=$form_data->zone;
                                     
                                     
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','15','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            //$data[$label_name]= $form_data->$label_name; 
                                     }
                                     
                                     
                                      
                                   
                                             

			                   
			                     
			                     $data['gst']=$form_data->gst;
			                     
			                     
			                      if($form_data->gst_status==2)
                                  {
                                     $data['gst']=0; 
                                  }
			                     
			                      $data['name']=$form_data->company_name;
                                  $data['landline']=$form_data->landline;
                                 

                             	   $this->Main_model->update_commen($data,$tablename);
                             	   
                             	   
                             	   
                             	   
        $this->db->query("UPDATE  all_ledgers SET account_head_id='".$data['account_heads_id']."',account_heads_id_2='".$data['account_heads_id']."' WHERE customer_id='".$customer_id."' AND party_type='5'");
                             	   
                             	   
                             	   
                             	   
                             	                                     $obalance=$form_data->opening_balance;
                                  
                                                                   $query = $this->db->query("SELECT id,name,account_heads_id FROM accountheads  WHERE deleteid='0'  AND id='".$customer_id."' ORDER BY name ASC");
                                                                   $res=$query->result();
                                                                   foreach($res as $val)
                                                                   {
                                                                                $company_name= $val->name;
                                                                                $account_heads_id= $val->account_heads_id;
                                                                   }
                                                                       
                          
                          
                                                                   $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$customer_id."' AND party_type='5' AND opening_balance_status='1'");
                                                                   $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',5,'deleteid','0','id','ASC');    
                                                                     
				                      	                           

                                                                      
                                                                      $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;
                                                                      foreach($res as $val)
                                                                      {
                                                                          $debitsamount+=$val->debits;
                                                                          $creditsamount+=$val->credits;
                                                                          $balancetotal+=$val->balance;
                                                                      }
                                                                      
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;
                                                                      
                                                                      
                                                                      
                                                                              if($form_data->payment_status=='1')
                                                                              {
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance';
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                              if($balancetotal==0)
                                                                                                              {   
                                                                                                                   $data_driver['balance']=$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                   
                                                                                                                   $data_driver['balance']=$balancetotal+$obalance;
                                                                                                                   
                                                                                                              }
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                              if($balancetotal==0)
                                                                                                              {
                                                                                                                    $data_driver['balance']='-'.$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                  
                                                                                                                    $data_driver['balance']=$balancetotal-$obalance;
                                                                                                                   
                                                                                                                    
                                                                                                              }
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('Y-06-30');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=5;
                                                                              $data_driver['order_id']=0;
                                                                              $data_driver['deletemod']=$customer_id.'OP5';
                                                                              $data_driver['user_id']=$this->userid;
                                                                              $data_driver['customer_id']=$customer_id;
                                                                              $data_driver['account_head_id']=$account_heads_id;
                                                                              $data_driver['account_heads_id_2']=$account_heads_id;
                                                                              $this->Main_model->insert_commen($data_driver,'all_ledgers');
				                      	     
				                      	     
				                      	     
 //$this->db->query("UPDATE all_ledgers SET account_head_id='".$account_heads_id."',account_heads_id_2='".$account_heads_id."' WHERE party_type='5' AND customer_id='".$customer_id."'");
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                             	   
                                   $array=array('error'=>'2','massage'=>'Other Ledger successfully Updated..');
                                   echo json_encode($array);
                       
                       
                       
                       

                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                 
                if($form_data->action=='updatelocality')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 
                 	 
                 	         $result= $this->Main_model->where_names('locality','name',$form_data->locality);
                             foreach ($result as  $value) {

                                $data['locality']=$value->id;

                             }
                 	 
                 	 
                 	 
                 	 
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 if($form_data->action=='updatefeedback')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['feedback_details']=$form_data->feedback;
                     $this->Main_model->update_commen($data,$tablename);

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
                          
                          
                          
                          
                                                                       $query = $this->db->query("SELECT id,name,account_heads_id FROM accountheads  WHERE deleteid='0'  AND id='".$form_data->id."' ORDER BY name ASC");
                                                                       $res=$query->result();
                                                                       foreach($res as $val)
                                                                       {
                                                                                $company_name= $val->name;
                                                                                $account_heads_id= $val->account_heads_id;
                                                                       }
                                                                       
                          
                          
                                                                  // $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='5' AND opening_balance_status='1'");
                                                                  
                          
                          
                                                                             
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
                                                                              $data_driver['payment_date']=date('Y-06-30');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['deletemod']=$customer_id.'OP';
                                                                              $data_driver['party_type']=5;
                                                                              $data_driver['account_head_id']=$account_heads_id;
                                                                              $data_driver['account_heads_id_2']=$account_heads_id;
                                                                             
  $querycheck = $this->db->query("SELECT id FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='5' AND opening_balance_status='1'");
  $querycheck=$querycheck->result();
  if(count($querycheck)==0)
  {

                                                                              $this->Main_model->insert_commen($data_driver,'all_ledgers');


   }
   else
   {


$this->db->query("UPDATE all_ledgers SET debits='".$data_driver['debits']."',account_heads_id_2='".$account_heads_id."',account_head_id='".$account_heads_id."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='5' AND opening_balance_status='1'");       

   }

                          
                          
                          
                      }
                      
                      
                      $data['get_id']=$form_data->id;
                      $data[$lab]=$form_data->val;
                      
                      $this->Main_model->update_commen($data,$tablename);


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
                                                                                     $day_log['changes'] = 'Accountheads Account Changes';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($form_data);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');




                 }
                 
                   if($form_data->action=='updateratings')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['ratings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 
                 
                 
                 
                  if($form_data->action=='updateratings_a')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['price_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_b')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['delivery_time_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_c')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['quality_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_d')
                 {
                     $tablename=$form_data->tablename;
                 	 $data['get_id']=$form_data->id;
                 	 $data['response_commission']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     //$this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE customer_id='".$id."' AND party_type=5");




                        $result = $this->Main_model->where_names_two_order_by('all_ledgers', 'customer_id', $id, 'party_type', '5', 'id', 'DESC');

                     
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
                                 $datas_log['data_fetch']= 'Other Deleted'; 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');


                 }
                
                


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
                        
                         $where = " AND name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR gst LIKE '%" . $search . "%'";
                        
                     }
                     
                   
                     
                     
                    	                                         

                     
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `accountheads`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                     $query = $this->db->query("SELECT op,op_status,account_heads_id_multipel,account_heads_id,id,email,phone,company_name,name,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `accountheads`  WHERE deleteid='0' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                     $result=$query->result();
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($result as  $value)
                 	 {
                 	     
                 	     


                     


                                    

                 	      
                 	     

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Active';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='InActive';
                 	 	}
                 	 	
                 	 	
                 	 	 $account_heads_id_multipel_set=$value->account_heads_id_multipel;
                         $account_heads_id=$value->account_heads_id;
                         
                 	 	 $accountheads = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                         
                            $headval=array();
                            foreach($accountheads as $head)
                            {
                                
                                if($account_heads_id_multipel_set!=0)
                                {
                                                                  $valss= explode('|', $account_heads_id_multipel_set);
                                                                  if(in_array($head->id, $valss))
                                                                  {
                                                                      $headval[]=$head->name;
                                                                  }
                                }
                                else
                                {
                                                                  $valss= explode('|', $account_heads_id);
                                                                  if(in_array($head->id, $valss))
                                                                  {
                                                                      $headval[]=$head->name;
                                                                  }
                                                                  
                                }
                                
                                
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

 
   	 
                                                      
                 	 	
                 	 	$headval=implode('|', $headval);
                 	  	$array[] = array(
                             	 	    
                             	 	    
                             	 	    'no' => $i, 
             
                             	 		'id' => $value->id, 
                             	 		
                             	 		'email' => $value->email, 
                             	 		'phone' => $value->phone, 
                             	 		'company_name' => $value->name, 
                             	 		'pin' => $value->pin, 
                             	 		'route' => $route_name, 
                             	 		'locality' => $value->locality, 
                             	 		'locality_name' => $locality_name, 
                             	 		'gst' => $value->gst, 
                             	 		'gst_status' => $value->gst_status, 
                             	 		'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                             	 		'city' => $value->city, 
                             	 		'state' => $value->state, 
                             	 		'accountheads' => $headval, 
                             	 		'opening_balance'=>$value->opening_balance,
                             	 		'payment_status'=>$value->payment_status,
                             	 		'status' => $status
                             	 	
            
                             	 	  );
                             	 	
                                      $i++;
                        
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         

                 	 }
                 	 
                 	 
                    $myData = array('PortalActivity' => $array, 'totalCount' => $count);
                    echo json_encode($myData);

	}
	
	
	
	
	
	
	
	
	
	public function fetch_data_get_ledger()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     
                     $result= $this->Main_model->where_three_names_limit('all_ledgers','customer_id',$customer_id,'party_type',5,'deleteid',0,$limit);
                 	 
                 	  $i=1;
                 	  $array=array();
                 	  foreach ($result as  $value) {
                       
                     

                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->name, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'customer_id' => $value->customer_id,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'collected_amount' => $value->collected_amount, 
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time

                 	 	);


$i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	public function fetch_data_get_ledger_view()
	{

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $party_type=$_GET['party_type'];
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                    if($customer_id>0)
                     {
                         
                         
                              $sql=" AND customer_id='".$customer_id."'";
                         
                         
                        
                     }
                     
                   
                     
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                              $formdate=date("Y-04-d");
                              $todate=date("Y-m-d"); 
                               
                                
                                
                                
                                
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type='".$party_type."' AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql ORDER BY id DESC");
                 	            
                 	          
                 	          $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                         
                          
                          $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type='".$party_type."' $sql   ORDER BY id DESC");
                 	      $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type='".$party_type."' $sql ORDER BY id DESC");
                 	     
                         
                         
                          $result=$result->result();
                          
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                         // $voucher_name='';
                         // if($value->voucher_base){
                         //  if($value->voucher_base=='journal'){
                         //    $voucher_name = 'JOURNAL';
                         //  }
                         //  elseif($value->voucher_base=='payment'){
                         //    $voucher_name = 'PAYMENT';
                         //  }
                         //  elseif($value->voucher_base=='receipt'){
                         //    $voucher_name = 'RECEIPT';
                         //  }
                          
                         //  $account_head_idname=$voucher_name;
                         // }
                       
                              $resultvent= $this->Main_model->where_names('accountheads','id',$value->customer_id);
                         	 foreach ($resultvent as  $valuess) {
                              $name= $valuess->name; 
                              
                         	 }
                               
                       
                       
                     
                         $balance=$value->balance;
                         
                         if($value->reference_no=='Opening Balance')
                         {
                             $seti='#';
                         }
                         else
                         {
                             $seti=$i;
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
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	   'no' => $seti, 
                            'id' => $value->id, 
                            'name' => $name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'customer_id' => $value->customer_id,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                      'deletemod' => $value->deletemod,
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => round($value->debits,2),
                            'credits' => round($value->credits,2),
                 	 		'balance' => $total,
                 	 		'getstatus' => $getstatus,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time
                 	 		

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
		public function fetch_data_get_ledger_view_total()
	{

                    
                     $customer_id_data=$_GET['customer_id'];
                     $party_type=$_GET['party_type'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                      if($customer_id>0)
                     {
                         
                         
                              $sql=" AND customer_id='".$customer_id."'";
                         
                         
                        
                     }
                     
                     
                     if($formdate=='undefined')
                     {
                         
                         
                              $formdate=date("Y-04-d");
                              $todate=date("Y-m-d"); 
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE  deleteid=0 AND party_type='".$party_type."' AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql   ORDER BY id DESC");
                 	          $result=$result->result();
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type='".$party_type."' $sql   ORDER BY id DESC");
                 	      $result=$result->result();
                        
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	        $valueset=$value->totalcridit-$value->totaldebit;
                                                
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
                 	     
                      $output['totalpayment']= round($value->amount,2);
                      $output['totalpaid']= round($value->totalpaid,2); 
                      $output['totaldebit']= round($value->totaldebit,2); 
                      $output['totalcridit']= round($value->totalcridit,2); 
                      $output['totalblance']= round($value->totalblance,2); 
                      $output['getstatus']= $getstatus; 
                      $output['outstanding']= $total; 
                      
                 	 }

                    echo json_encode($output);

	}
	
	
	
	
    public function fetch_balance()
    {
               
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;  
                     
                         $pp=explode('-', $id);
                         $id=$pp[0];
                   
    	                 $output=array();
    	             
    	             
        	             $res= $this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',5,'deleteid',0);
                 	 
                         $balancetotal=0;
                         $debitsamount=0;
                         $creditsamount=0;
                         
                         if($id!='')
                         {
                             
                         
                                     foreach($res as $val)
                                     {
                                         $payid=$val->id;
                                         $customer_id=$val->customer_id;
                                         $order_no=$val->order_no;
                                         $amount=$val->amount;
                                         $debitsamount+=$val->debits;
                                         $creditsamount+=$val->credits;
                                         
                                     }
                         
                         }
        	             
        	             $balancetotal=$creditsamount-$debitsamount;
        	             $output['opening_balance']= round($balancetotal,2);
                          
                     
                         echo json_encode($output);

                     
    }
    
    
   

    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     
                     $pp=explode('-', $id);
                     $id=$pp[0];
                     
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
    	             
    	             $output=array();
    	             
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['name']= $value->name; 
                      $output['company_name']= $value->name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['gst']= $value->gst;
                      $output['gst_status']= $value->gst_status;
                      
                      $output['opening_balance']= $value->opening_balance;
                      $output['payment_status']= $value->payment_status;
                      
                       $output['account_heads_id']= $value->account_heads_id;
                      
                      
                      $output['pin']= $value->pin;
                      $output['fulladdress']= $value->address1.','.$value->landmark.$value->state; 
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      
                      
                       $localityname="";
                       $resultlocality= $this->Main_model->where_names('locality','id',$value->locality);
                       foreach($resultlocality as $vl)
                       {
                           
                           $localityname=$vl->name;
                       }
                       
                      
                      
                      
                      $output['locality']= $value->locality.'-'.$localityname;
                      
                      
                      
                      $output['city']= $value->city;
                      $output['state']= $value->state;
                      $output['google_map_link']= $value->google_map_link;
                      $output['sales_group']= $value->sales_group;
                      $output['sales_team_id']= $value->sales_team_id;
                      $output['landline']= $value->landline;
                      
                      
                      
                         
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','15','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            //$output[$label_name]= $value->$label_name; 
                                     }
                                     
                      
                      
                      
                      
                       $localityname="";
                       $resultlocality= $this->Main_model->where_names('locality','id',$value->locality);
                       foreach($resultlocality as $vl)
                       {
                           
                           $localityname=$vl->name;
                       }
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
                        }
                       
                       
                      
                      $output['address']= $value->address1.' '.$value->address2.' '.$value->landmark.'  '.$value->zone.' '.$value->pincode.' '.$value->city.' '.$value->state;
                      
                      $output['sales_group_name']= $user_group_name;
                      $output['zone']= $value->zone;
                      $output['feedback_details']= $value->feedback_details;
                      $output['credit_limit']= $value->credit_limit;
                      $output['credit_period']= $value->credit_period;
                      
                        $output['ratings']= $value->ratings;
                           $output['price_rateings']= $value->price_rateings;
                              $output['delivery_time_rateings']= $value->delivery_time_rateings;
                                 $output['quality_rateings']= $value->quality_rateings;
                                    $output['response_commission']= $value->response_commission;
                      
                      
                      $output['feedback_sub']= $value->feedback_sub;
                      

                     
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
    
    
    
    
    
    
    
    
    
    public function fetch_data_address()
	{
                        
                        
                     $customer_id= $_GET['id'];
                  
                 	 $result= $this->Main_model->where_names('customers_adddrss','customer_id',$customer_id);
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($result as  $value) {
                       
                      
                 	 
                 	 if($value->deleteid==0)	
                 	 {
                 	     
                 	 
                                 	 	$array[] = array(
                                 	 	    
                                 	 	    
                                 	 	    'no' => $i, 
                                             'id' => $value->id, 
                                 	 		'phone' => $value->phone, 
                                 	 		'name' => $value->name, 
                                 	 		'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->zone.'-'.$value->pincode.' '.$value->city.' '.$value->state,
                                 	 		'city' => $value->city, 
                                 	 		'state' => $value->state,
                                 	 		'google_map_link' => $value->google_map_link
                
                                 	 	);
                                 	 	
                 	 }


                            $i++;

                 	 }

                    echo json_encode($array);

	}
    
    
    
    
    
    
    
    
    
    
    
    public function pincode()
    {
        
         $form_data = json_decode(file_get_contents("php://input"));
         
     
         $pincode=$form_data->pincode;
         
         
         
         
         $output=array();
         $getres=file_get_contents("http://www.postalpincode.in/api/pincode/".$pincode);
         $data=json_decode($getres);
         if(isset($data->PostOffice[0]))
         {
                $output['city']=$data->PostOffice[0]->District;
                $output['state']=$data->PostOffice[0]->State;
                $output['locality']=$data->PostOffice[0]->Taluk;
                
         }
         
         echo json_encode($output);
        
    }
    
      public function customer_search()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

              $searchText= $_POST['search'];
              if($searchText!="")
              {

                     $result= $this->Main_model->where_id_like_and_where('accountheads','phone',$searchText,'deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = array(

                            'id' => $value->id, 
                            'label' => $value->name.'/'.$value->phone.' '

                        );


                     }

              }
             echo json_encode($array);
                     


              

    }
    
    
    
     public function customer_search_full()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('customers','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->name.'/'.$value->phone.'/'.$value->id;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
    
     public function customer_search_full_id()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('customers','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->id.'-'.$value->name.'-'.$value->phone;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
       public function customer_search_full_locality()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('locality','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->id.'-'.$value->name;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
    
    public function phone_no_find()
    {
        
                    $form_data= json_decode(file_get_contents("php://input"));
                    $array =array();
                    $result= $this->Main_model->where_names('customers','phone',$form_data->phone);
                    
                    if(count($result)>0)
                    {
                          $array=array('error'=>'1');
                         
                    }
                    else
                    {
                        $array=array('error'=>'0');
                    }
                    
         echo json_encode($array); 
    }
    
    
    
     
     public function customer_search_full_by_single()
    {
                 $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                
                                     $search=$form_data->search;
                                     $sql="";
                                     if($search!='')
                                     { 
                                         
                                         
                                              $sql=' AND name LIKE "%'.$search.'%" OR phone LIKE "%'.$search.'%"';
                                          
                                         
                                     }

             

                     $query = $this->db->query("SELECT id,name,phone FROM customers  WHERE deleteid='0' $sql ORDER BY name ASC LIMIT 0,50");
                     $res= $query->num_rows();
                     $result=$query->result();
                     foreach ($result as  $value) {


                        $array[] = $value->name.'/'.$value->phone.'/'.$value->id;

                     }
                     
                   
                 echo json_encode($array);
          

    }
    
    	
		public function fetch_data_get_ledger_view_export()
	{









  
           
                    
                     $customer_id_data=$_GET['customer_id'];
                     $party_type=$_GET['party_type'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     $sql="";
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql=" AND customer_id='".$customer_id."'";
                         
                     }
                     
                     
                     if($customer_id_data=='')
                     {
                         
                              $formdate=date("Y-04-d");
                              $todate=date("Y-m-d"); 
                         
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type='".$party_type."' AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql  ORDER BY id DESC");
                 	          $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0 AND party_type='".$party_type."' $sql  ORDER BY id DESC");
                 	          $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no=''  AND deleteid=0 AND party_type='".$party_type."' $sql ORDER BY id DESC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no!='' AND deleteid=0 AND party_type='".$party_type."' $sql ORDER BY id DESC");
                 	         $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no='' AND deleteid=0 AND party_type='".$party_type."' $sql ORDER BY id DESC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('accountheads','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      $name= $valuess->name;
                      $email= $valuess->email;
                      $phone= $valuess->phone;
                      $gst= $valuess->gst;
                     
                      $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
	                 	
                 	 }
                  
                       
                         $filename=date('d-m-Y').'other_ledger'; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8"><?php echo $name; ?></th></tr>
                              <tr><th colspan="8"><?php echo $phone; ?></th></tr>
                              <tr><th colspan="8"><?php echo $gst; ?></th></tr>
                              <tr><th colspan="8"><?php echo $fulladdress; ?></th></tr>
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th> No</th>
                          
                          <th>Date</th>
                          <th>Name</th>
                          <th>Reference</th>
                         
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
                                          
                                          <td><?php echo $value->payment_date; ?> </td>
                                           <td><?php echo $name; ?></td>
                                          <td><b><?php echo $value->reference_no; ?></b></td>
                                          
                                          <td><?php echo $value->debits; ?></td>
                                          <td><?php echo $value->credits; ?></td>
                                          <td><?php echo $balance; ?></td>
                                          <td><?php echo $value->payment_mode; ?></td>
                                          <td><?php echo $value->process_by ?></td>
                                          
                                            
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



















	
		public function save_to_pay()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     $date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     
                     $enteramount=$form_data->enteramount;
                     $payamount=$form_data->payamount;
                     $payment_mode_payoff=$form_data->payment_mode_payoff;
                     $reference_no=$form_data->reference_no;
                     $totalpending=$payamount-$enteramount;
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                     
                     
                     $notes=$form_data->notes;
                     $writeoff=$form_data->writeoff;
                     $bankaccount=$form_data->bankaccount;
                      
                      
                      $payment_type=$form_data->payment_type;
                      
                      
                     
                    
                      
                      
                     
                    
                                             $res = $this->Main_model->where_names_limit_base($tablename,'customer_id',$customer_id,1);
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
                                             
                     
                                                                   
                     
                     
                                             $res = $this->Main_model->where_names('accountheads','id',$customer_id);
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
                                                        $data_bank['ex_code']=$reference_no.' '.$order_no;
                                                        $data_bank['debit']=0;
                                                        
                                                        
                                                        
                                                        
                                                                          if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=$enteramount;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal+$enteramount;
                                                                          }
                                                        
                                                        $data_bank['credit']=$enteramount;
                                                        
                                                        
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']=' Order Payment';
                                                        $data_bank['account_head_id']=$form_data->account_head_id;
                                                        
                                                        $data_bank['party_type']=4;
                                                        $insertbank=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                          
                                              }
                              
                      
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    
                              $data_driver['order_id']=$payid;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']=0;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['party_type']=5;
                              $data_driver['bank_id'] = $bankaccount;
                              
                              
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
                              $data_driver['notes']=$notes;
                              if($writeoff==1)
                              {
                                  $data_driver['notes']=$notes.' Warite Off Rs '.$enteramount;
                              }
                              
                              
                                                         if($payment_type=='Credit')
                                                         {
                                                             
                                                             
                                                              
                                                                      if($balancetotal!='0')
                                                                      {
                                                                          $data_driver['balance']=$balancetotal+$enteramount;
                                                                      }
                                                                      else
                                                                      {
                                                                          $data_driver['balance']=$enteramount;
                                                                          
                                                                      }  
                                                                      
                                 
                                                          
                                                         }
                                                          
                                                          
                                                        $data_driver['credits']=$enteramount;
                                                        $data_driver['debits']=0;
                              
                              
                              
                              
                              
                                  $data_driver['paid_status']='1';
                                  $data_driver['process_by']='Payment received By Account Head Ledger';
                                  $data_driver['account_head_id']=$form_data->account_head_id;
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $data_driver['deletemod']='AC'.$insertbank;
                                  $this->Main_model->insert_commen($data_driver,$tablename);
                                  $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");

    
                     
                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

	
		public function save_to_pay_transfer()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     $date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     
                     $enteramount=$form_data->enteramount;
                   
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                   
                   
                   
                       $customer_id2=$form_data->customer_id2;
                     $pp2=explode('-', $customer_id2);
                     $customer_id2=$pp[0];
                      $customer_name2=$pp[1];
                     
                     
                     
                     
                     $notes=$form_data->notes;
                   
                     
                    $account_head_id=$form_data->account_head_id;
                      
                      
                     $res = $this->Main_model->where_names_limit_base($tablename,'customer_id',$customer_id,1);
                                                         
                   
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
                     
                     
                                                                       
                     
                     
                                                                     $res = $this->Main_model->where_names('accountheads','id',$customer_id);
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                     }
                                             
                     
                                        
                     
                     
                    
                              $data_driver['order_id']='TR';
                              $data_driver['user_id']=$this->userid;
                              $data_driver['account_head_id']=$this->account_head_id;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']='internal';
                              $data_driver['payment_mode_payoff']='0';
                             
                              $data_driver['reference_no']=$customer_name2;
                              $data_driver['order_no']='Party Transfer To';
                              $data_driver['process_by']='Party Transfer';

                              $data_driver['amount']=0;
                              $data_driver['notes']=$notes;
                           
                              
                                                          
                                                             
                                                               if($balancetotal==0)
                                                              {   
                                                                   $data_driver['balance']='-'.$enteramount;
                                                              }
                                                              else
                                                              {
                                                                   
                                                                   $data_driver['balance']=$balancetotal-$enteramount;
                                                              }
                                                      
                                                                
                                                        
                                                          
                                                        $data_driver['debits']=$enteramount;
                                                        $data_driver['credits']=0;
                              
                              
                              
                              
                              
                                   $data_driver['paid_status']='1';
                              $data_driver['party_type']=5;
                              
                          
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
		public function save_to_pay_transfer1()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     $date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     
                     $enteramount=$form_data->enteramount;
                   
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                   
                   
                   
                       $customer_id2=$form_data->customer_id2;
                     $pp2=explode('-', $customer_id2);
                     $customer_id2=$pp[0];
                      $customer_name2=$pp[1];
                     
                     
                     
                     
                     $notes=$form_data->notes;
                   
                     
                    
                      
                     $res = $this->Main_model->where_names_limit_base($tablename,'customer_id',$customer_id,1);
                                                        
                     
                    
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
                     
                     
                                                                      
                     
                     
                                                                     $res = $this->Main_model->where_names('accountheads','id',$customer_id);
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                     }
                                             
                     
                                        
                                                             
                                                             
                                                                  
                                                             
                                                             
                     
                     
                    
                              $data_driver['order_id']='TR';
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']='internal';
                              $data_driver['payment_mode_payoff']='0';
                              $data_driver['account_head_id']=$this->account_head_id;
                              $data_driver['reference_no']=$customer_name2;
                              $data_driver['order_no']='Party Transfer From';
                              $data_driver['process_by']='Party Transfer';

                              $data_driver['amount']=0;
                              $data_driver['notes']=$notes;
                           
                              $data_driver['party_type']=5;
                                                          
                                                             
                                                                
                                                               if($balancetotal==0)
                                                              {   
                                                                   $data_driver['balance']=$enteramount;
                                                              }
                                                              else
                                                              {
                                                                   
                                                                   $data_driver['balance']=$balancetotal+$enteramount;
                                                              }
                                                      
                                                                
                                                                      
                                 
                                                          
                                                        
                                                          
                                                        $data_driver['credits']=$enteramount;
                                                        $data_driver['debits']=0;
                              
                              
                              
                              
                              
                                   $data_driver['paid_status']='1';
                              
                              
                          
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
	
	   public function locality_list()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

                     $result= $this->Main_model->where_names('locality','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = trim($value->name);


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
    
    
    
    
    
    
    
     public function other_ledger()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {

                                           

                                            if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                  $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','id','252   ','id','ASC');


                                            }
                                            else
                                            {

                                                   $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                            }





                                             $data['vendor'] = $this->Main_model->where_names('accountheads','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Other ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads/other_ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    		public function fetch_data_get_ledger_view_group()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                          $sql="";

                       

                                            if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                          $sql.=" AND a.sales_team_id='".$this->userid."'";

                                            }

                          if($customer_id>0)
                         {
                             
                            
                                  $sql.=" AND a.customer_id='".$customer_id."'";
                             
                          }



                     
                          $formdate=$_GET['formdate'];
                          $todate=$_GET['todate'];


                     if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";

                        
                     }
                          
                          $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=5  AND a.comission_transfered NOT IN ('5') $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
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




                    if($value->op==0)
                    {
                       $payment_status="";
                    }


                     
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
		public function fetch_data_get_ledger_view_total_new1()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                      $todate=$_GET['todate'];
                    
                       $sql="";



                      if($this->session->userdata['logged_in']['access']=='12')
                      {
                                                  	

                                                           $sql.=" AND a.sales_team_id='".$this->userid."'";
                       }

                       if($customer_id>0)
                       {
                         
                         
                              $sql.=" AND a.customer_id='".$customer_id."'";
                         
                        
                      }
                     
                     if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }
                          
                          
                         
                          
                         
                         
                          $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=5 AND a.comission_transfered NOT IN ('5') $sql ORDER BY a.id DESC");
                 	      $result=$result->result();
                         
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	  foreach ($result as  $value)
                 	  {
                 	     
                 	     
                 	                 $valueset=$value->totalcridit-$value->totaldebit;
                                                
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
                 	     
                                      $output['totalpayment']= round($value->totaldebit,2);
                                      $output['totalpaid']=  round($value->totalpaid,2); 
                                      $output['totaldebit']= round($value->totaldebit,2); 
                                      $output['totalcridit']= round($value->totalcridit,2); 
                                      $output['totalblance']= $total;
                                      $output['getstatus']= $getstatus; 
                                      $output['getstatus1']= $getstatus; 
                                      $output['outstanding']= $total; 
                                      
                 	 }

                    echo json_encode($output);

	}
	
		 public function others_ledger_find()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                              if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                  $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','id','252   ','id','ASC');


                                            }
                                            else
                                            {

                                                   $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                            }

                                             $data['customer_id']=$_GET['vendor_id'];
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Others ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads/others_ledger_find.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }



     public function commission_amount_verification_list()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                              $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                            
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Commission ledger verification List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads/commission_amount_verification_list.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }









     public function commission_amount_verification_list_md()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                              $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                            
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Commission ledger verification List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads/commission_amount_verification_list_md.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }





    		 public function others_ledger_find_delete_log()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            


                                            if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                  $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','id','252   ','id','ASC');


                                            }
                                            else
                                            {

                                                   $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                            }

                                             $data['customer_id']=$_GET['vendor_id'];
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Others ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads/others_ledger_find_delete_log.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    	public function fetch_data_get_ledger_view_export_group()
	{







 
           
                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate='2022-04-01';
                     $sql="";
                       
                     if($customer_id>0)
                     {
                         
                         
                              $sql=" AND customer_id='".$customer_id."'";
                        
                        
                     }
                    
                     
                     
                    
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                         
                          $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND a.party_type=5  AND b.deleteid=0 $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                 	          
                          $result=$result->result();
                         
                   
                    
                 	 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('accountheads','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $email= $valuess->email;
                      $phone= $valuess->phone;
                      $gst= $valuess->gst;
                      $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->city.','.$valuess->state;
                      
	                 	
                 	 }
                  
                        
                         $filename=date('d-m-Y').'others_ledger_group'; 
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
                          <th>Opening Balance DR</th>
                          <th>Opening Balance CR</th>
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
                                                  
                                          
                                                     $resultvent= $this->Main_model->where_names('accountheads','id',$value->customer_id);
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
                                          
                                           <td>

                                           	<?php
                                            if($payment_status=='DR')
                                            {
                                            	?>

                                            		<?php echo round($value->op,2); ?>
                                           		

                                            	<?php
                                            }
                                           	?>

                                           

                                           	</td>
                                           <td>

                                           	 	<?php
                                            if($payment_status=='CR')
                                            {
                                            	?>

                                            	<?php echo round($value->op,2); ?>
                                           	

                                            	<?php
                                            }
                                           	?>

                                           	


                                           </td>
                                         
                                         
                                          <td><?php echo $value->debitstoatal; ?></td>
                                          <td><?php echo $value->creditstotal; ?></td>
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
                                            <td></td>
                                             <td></td>
                                            <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo $balancetoatal; ?></td>
                                          
                                           
                                            
                                        </tr>
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
    	public function fetch_data_get_ledger_view_export_new()
	{









  
           
             $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     $sql="";
                     if($customer_id>0)
                     {


                     	 if($customer_id!=346)
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
                           
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=5 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND opening_balance_status='0' $sql  ORDER BY id,payment_date ASC");
                 	          
                              
                 	       
                 	       
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                             if($customer_id==346)
		                     { 
		                         
		                         $result=$this->db->query("SELECT *,debits as credits_check,credits as debits_check FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='0' AND driver_collection_status=1 $sql  ORDER BY id,payment_date ASC");

		                     }
		                     else
		                     {

		                    $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='0' AND comission_transfered NOT IN ('5') $sql  ORDER BY id,payment_date ASC");


                         

		                     }
                 	         
                        
                        
                         
                          $result=$result->result();
                         
                         
                     }




























                    
                     
                      $payment_date=date('d-m-Y',strtotime($formdate));
                     
                    if($customer_id==346)
                     {


  $resultopeing_new=$this->db->query("SELECT SUM(credits) as  debitstotal,SUM(debits) as  creditstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='1' AND driver_collection_status=1 $sql ORDER BY payment_date ASC");


                     }
                     else
                     {

                     	$resultopeing_new=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='1' $sql ORDER BY payment_date ASC");


                     }
                     


                     $resultopeing_new=$resultopeing_new->result();
                     $openingbalance_new=0;
                     $openingbalancec_new=0;
                     $openingbalanced_new=0;
                     $openingbalanceval_new=0;
                     foreach ($resultopeing_new as  $valuess)
                         {
                              $credits_new=$valuess->creditstotal;
                              $debits_new=$valuess->debitstotal;
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }
                                            
                                 if($payment_date == '01-04-2022')
                                 {
                                     $payment_date=date('d-m-Y',strtotime($valuess->payment_date));
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


























            
                    
                 	 if($customer_id==346)
                     {
                 	  	 
                 	   $resultopeing=$this->db->query("SELECT SUM(credits) as debitstotal,SUM(debits) as  creditstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='0' AND driver_collection_status=1 $sql ORDER BY payment_date ASC");
                     }
                     else
                     {


                     	$resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='0' AND comission_transfered NOT IN ('5') $sql ORDER BY payment_date ASC");


                     }


                    
                 	 
                 	


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
                     	      if($customer_id==346)
                              {


                              	 $credits=$value->debits;
                                 $debits=$value->credits;
                              

                              }
                              else
                              {


                              	 $credits=$value->credits;
                                 $debits=$value->debits;
                              

                              }
                     	     
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

                          if($customer_id==346)
                         {

                         	   $party_name="";
	                           $party= $this->Main_model->where_names('driver','id',$value->customer_id);
	                           foreach($party as $partys)
	                           {
	                              $account_head_idname=$partys->name;

	                          }

	                          $value->debits=$value->debits_check;
	                          $value->credits=$value->credits_check;
	                               

                         }
                         else
                         {

                         	 $party_name="";
	                           $party= $this->Main_model->where_names('accountheads','id',$value->customer_id);
	                           foreach($party as $partys)
	                           {
	                              $party_name=$partys->name;
	                               
	                           }
                           

                         }



                            $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }

                           
                           
                           
                                          $bank_name="";
                                     	 $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                     	 foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                     	 }
                       
                       
                                   	if($value->bank_id > 0)
                                    {
                                             if($value->bank_id==25 && $value->account_heads_id_2==48)
                                            {

                                            	 

                                            }
                                            else
                                            {

                                                 $account_head_idname = $bank_name;
                                                 if($value->process_by=='Collection Verified By MD')
                                                  {
                                                    $account_head_idname = 'COLLECTION VERIFICATION DISCOUNT';
                                                  }
                                            }
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
                            'org_amount' => $value->org_amount, 
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
                 	 		'balance' => $total,
                 	 		'getstatus'=>$getstatus,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		
                 	 		

                 	 	);


                        $i++;
                        $j++;

                 	 }

                  $totalarray=array_merge($array2,$array);
                  
                  
                  
                    $resultvent= $this->Main_model->where_names('accountheads','id',$customer_id);
                     foreach ($resultvent as  $valuess) 
                     {
                         
                         
                              $name= $valuess->name; 
                              $email= $valuess->email;
                              $phone= $valuess->phone;
                              $gst= $valuess->gst;
                              $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                    }
                  
                        $filename=date('d-m-Y').'_others_ledger'; 
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
                          <td><?php echo $vl['payment_mode']; ?></td>
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

    	public function fetch_data_get_ledger_view_total_new()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                       $todate=$_GET['todate'];
                    
                        $sql="";
                        $sql2="";


                                           if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                           $sql.=" AND a.sales_team_id='".$this->userid."'";

                                            }


                         
                        if($customer_id>0)
                         {


                         	   if($customer_id!=346)
                               {
                             
                             
                                  $sql.=" AND a.customer_id='".$customer_id."'";
                                  $sql2.=" AND a.customer_id='".$customer_id."'";


                              }
                            
                            
                         }


                     if($formdate!='undefined')
                     {
                        $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }


                         
                         if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     
                    
                        
                          $payment_status=$_GET['payment_status'];
                          
                         if($customer_id==346)
                         {


             $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as  totaldebit,SUM(a.debits) as totalcridit,SUM(a.balance) as totalblance FROM all_ledgers as a  WHERE    a.deleteid='".$deleteid."' AND a.party_type=2 AND a.driver_collection_status=1  $sql ORDER BY a.id DESC");
                 	         
                         
                         
                          $result=$result->result();
             $resultoveall=$this->db->query("SELECT SUM(a.debits-a.credits) as valuesetss FROM all_ledgers as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=2  AND a.driver_collection_status=1 $sql2 ORDER BY a.id DESC");




                         }
                         else
                         {


                          
                          $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE    a.deleteid='".$deleteid."' AND a.party_type=5 AND a.comission_transfered NOT IN ('5') $sql ORDER BY a.id DESC");
                 	         
                         
                         
                          $result=$result->result();
                          $resultoveall=$this->db->query("SELECT SUM(a.credits-a.debits) as valuesetss FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=5  AND a.comission_transfered NOT IN ('5')  $sql2   ORDER BY a.id DESC");


                          }
                 	     
                 	 
                    
                 	     $totaloverall=0;
                 	     $totalcridit=0;
                 	     $totaldebit=0;
                 	     
                 	     
                 	     $resultoveall=$resultoveall->result();
                         foreach ($resultoveall as  $valuess)
                 	     {     
                 	                          
                 	                            $valuesetssbase=$valuess->valuesetss;
                                                
                                                if($valuesetssbase<0)
                                                {
                                                    $getstatus1=1;
                                                }
                                                else
                                                {
                                                    $getstatus1=0;
                                                }
                                                
                                                $balance=abs($valuesetssbase);
                 	        
                 	     }





                        if($customer_id==346)
                         {


                 	       $resultoveall=$this->db->query("SELECT SUM(a.debits-a.credits) as valuesetss FROM all_ledgers as a  WHERE  a.deleteid='".$deleteid."'  AND a.payment_date < '".$formdate."' AND a.party_type=2 AND a.driver_collection_status=1 $sql2   ORDER BY a.id DESC");

                 	     }
                 	     else
                 	     {


                         $resultoveall=$this->db->query("SELECT SUM(a.credits-a.debits) as valuesetss FROM all_ledgers as a LEFT JOIN accountheads as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=5 AND a.payment_date < '".$formdate."' AND a.comission_transfered NOT IN ('5')  $sql2  ORDER BY a.id DESC");


                 	     }




                 	     
                 	 
                    
                 	     $totaloverall=0;
                 	     $totalcridit=0;
                 	     $totaldebit=0;
                 	     
                 	     
                 	     $resultoveall=$resultoveall->result();
                         foreach ($resultoveall as  $valuess)
                 	     {     
                 	                          
                 	                            $opbalance=$valuess->valuesetss;
                                                
                                                if($opbalance<0)
                                                {
                                                    $opstatus=1;
                                                }
                                                else
                                                {
                                                    $opstatus=0;
                                                }
                                                
                                                $opbalance=abs($opbalance);
                 	        
                 	     }
                 
                 	 
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      $valueset=$value->totalcridit-$value->totaldebit;
                                                
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
                 	     
                      $output['totalpayment']= round($value->totaldebit,2);
                      $output['totalpaid']=  round($value->totalpaid,2); 
                      $output['totaldebit']= round($value->totaldebit,2); 
                      $output['totalcridit']= round($value->totalcridit,2); 
                      $output['totalblance']= $total;
                      $output['getstatus']= $getstatus; 
                      $output['getstatus1']= $getstatus1; 
                      $output['outstanding']= round($balance); 


                      $output['opstatus']= $opstatus; 
                      $output['opbalance']= round($opbalance); 

                      
                 	 }

                    echo json_encode($output);

	}
	
	
		public function fetch_data_get_ledger_view_new()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                         $sql="";

                         

                                            if($this->session->userdata['logged_in']['access']=='12')
                                            {
                                                  	

                                                $sql.=" AND sales_team_id='".$this->userid."'";


                                            }

                         if($customer_id>0)
                         {
                                   

                                  if($customer_id!=346)
                                  { 
                            
                                    $sql.=" AND customer_id='".$customer_id."'";

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
                           
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=5 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND opening_balance_status='0' AND comission_transfered NOT IN ('5') $sql  ORDER BY id,payment_date ASC");
                 	          
                              
                 	       
                 	       
                 	       $result=$result->result();  
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
		                          
		                     if($customer_id==346)
		                     { 
		                         
		                         $result=$this->db->query("SELECT *,debits as credits_check,credits as debits_check FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='0' AND driver_collection_status=1 $sql  ORDER BY id,payment_date ASC");

		                     }
		                     else
		                     {

		                     	  $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='0' AND comission_transfered NOT IN ('5') $sql  ORDER BY id,payment_date ASC");


		                     }
                 	         
                         
                         
                         
                          $result=$result->result();
                         
                         
                     }




























                    
                     
                        $payment_date=date('d-m-Y',strtotime($formdate));


                     if($customer_id==346)
                     {


  $resultopeing_new=$this->db->query("SELECT SUM(credits) as  debitstotal,SUM(debits) as  creditstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='1' AND driver_collection_status=1 $sql ORDER BY payment_date ASC");


                     }
                     else
                     {

                     	  $resultopeing_new=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal,payment_date FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='1' $sql ORDER BY payment_date ASC");


                     }

                   



                     $resultopeing_new=$resultopeing_new->result();
                     $openingbalance_new=0;
                     $openingbalancec_new=0;
                     $openingbalanced_new=0;
                     $openingbalanceval_new=0;
                     foreach ($resultopeing_new as  $valuess)
                         {
                              $credits_new=$valuess->creditstotal;
                              $debits_new=$valuess->debitstotal;
                              
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }

                                 if($payment_date == '01-04-2022')
                                 {
                                     $payment_date=date('d-m-Y',strtotime($valuess->payment_date));
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




























                    
                 	 if($customer_id==346)
                     {
                 	  	 
                 	$resultopeing=$this->db->query("SELECT SUM(credits) as debitstotal,SUM(debits) as  creditstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=2 AND opening_balance_status='0' AND driver_collection_status=1 $sql ORDER BY payment_date ASC");
                     }
                     else
                     {


                     	$resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=5 AND opening_balance_status='0' AND comission_transfered NOT IN ('5') $sql ORDER BY payment_date ASC");


                     }





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
                 	     	'debits' => round($debits_opening,2),
                            'credits' => round($credits_opening,2),
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

                              if($customer_id==346)
                              {


                              	 $credits=$value->debits;
                                 $debits=$value->credits;
                              

                              }
                              else
                              {


                              	 $credits=$value->credits;
                                 $debits=$value->debits;
                              

                              }
                     	     


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

		                 if($customer_id==346)
                         {

                         	   $party_name="";
	                           $party= $this->Main_model->where_names('driver','id',$value->customer_id);
	                           foreach($party as $partys)
	                           {
	                              $account_head_idname=$partys->name;

	                          }

	                          $value->debits=$value->debits_check;
	                          $value->credits=$value->credits_check;
	                               

                         }
                         else
                         {

                         	 $party_name="";
	                           $party= $this->Main_model->where_names('accountheads','id',$value->customer_id);
	                           foreach($party as $partys)
	                           {
	                              $party_name=$partys->name;
	                               
	                           }
                           

                         }

                          
                           $cname="";
                           

                      $sales_team_id=0;
                      $partys=$this->db->query("SELECT b.company_name,b.sales_team_id FROM orders_process as a  JOIN customers as b ON a.customer_id=b.id WHERE  a.order_no='".$value->reference_no."'");
                 	    $partys=$partys->result();

                           foreach($partys as $partyss)
                           {
                              $cname=$partyss->company_name;
                              $sales_team_id=$partyss->sales_team_id;
                              //$this->db->query("UPDATE all_ledgers SET sales_team_id='".$sales_team_id."' WHERE id='".$value->id."'");
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
                                            
                                            if($value->bank_id==25 && $value->account_heads_id_2==48)
                                            {

                                            	  if($value->process_by=='Collection Verified By MD')
                                                  {
                                                    $account_head_idname = 'COLLECTION VERIFICATION DISCOUNT';
                                                  }

                                            }
                                            else
                                            {
                                                  $account_head_idname = $bank_name;
                                                  if($value->process_by=='Collection Verified By MD')
                                                  {
                                                    $account_head_idname = 'COLLECTION VERIFICATION DISCOUNT';
                                                  }
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
                                        $username='Changed By ';
                                      }

                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                         $username='Deleted By ';
                                      }
                                      
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) 
                                       {
                                       	
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
                     







                    $rs="";
                    $tr="";
                    $ss="";
                    $bgcolorchange_process='';
                    if($value->md_verification==0)
                    {
                    	 $bgcolorchange_process='bgcolorchange_process';
                    }

                    if($value->commission_customer==0)
                    {
                    	  $bgcolorchange_process='';
                    }


                   


             $valname3="";   
             if($value->notes=='Payment Transferred')
                    {         
     $result_ss=$this->db->query("SELECT a.id,b.name,a.data_fetch FROM `ledgers_approved_log` as a JOIN admin_users as b ON a.user_id=b.id WHERE a.customer_id='".$value->id."' ORDER BY `a`.`id` DESC LIMIT 1");
                          $result_ss=$result_ss->result();
                          foreach($result_ss as $ff)
                          {
                          	$valname3=$ff->name;
                          }


                          

                           $tr= $valname3;

                     }

                   



               

      $valname2="";


      if($value->notes!='Verification Request')
                    {
                         
     $result_ss=$this->db->query("SELECT a.id,b.name,a.data_fetch FROM `ledgers_approved_log` as a JOIN admin_users as b ON a.user_id=b.id WHERE a.customer_id='".$value->id."' ORDER BY `a`.`id` ASC LIMIT 0,2");
                          $result_ss=$result_ss->result();
                          foreach($result_ss as $ff)
                          {
                          	$valname2=$ff->name;
                          }


                        }

                        
                        
                          $ap= $valname2; 
                   



                  


$valname1="";
                         
     $result_ss=$this->db->query("SELECT a.id,b.name,a.data_fetch FROM `ledgers_approved_log` as a JOIN admin_users as b ON a.user_id=b.id WHERE a.customer_id='".$value->id."' ORDER BY `a`.`id` ASC LIMIT 1");
                          $result_ss=$result_ss->result();
                          foreach($result_ss as $ff)
                          {
                          	$valname1=$ff->name;
                          }

                          
                         
                        
                        $vr= $valname1; 



  if($value->request_by!='')
  {
  	$vr=$value->request_by;
  }
  if($value->approved_by!='')
  {
  $ap=$value->approved_by;	
  }	

  if($value->payment_trasfered_by!='')
  {	      
	$tr=$value->payment_trasfered_by;		
	}      



                    $value->reference_no=str_replace('Bad Debts', '', $value->reference_no);

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
                            'bank_name' => $bank_name, 
                            'username_base' => $username_base,
                            'tr' => $tr,
                            'ap' => $ap,
                            'vr' => $vr,
                           
                 	 		'order_no' => $value->order_no, 
                 	 		'org_amount' => $value->org_amount, 
                 	 		'username' => $username, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'customer_id' => $value->customer_id,
                 	 		'cname' => $cname,
                      'deletemod' => $value->deletemod,
                 	 		'dummy_customer_id' => $value->dummy_customer_id,
                            'dummy_customer_name' =>$value->dummy_customer_name,
                            'dummy_party_type' => $value->dummy_party_type,
                            'dummy_amount' => $value->dummy_amount,
                 	 		'commission_customer' => $value->commission_customer,
                 	 		'notes' => $value->notes.' | '.$value->deletemod,
                 	 		'amount' => $value->amount, 
                 	 		'credits' => round($value->credits,2),
                            'debits' => round($value->debits,2),
                 	 		'paid_status' => $value->paid_status,
                 	 		'md_verification' => $bgcolorchange_process, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'balance' => round($total,2),
                 	 		'getstatus'=>$getstatus,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'update_date' => date('d-m-Y g:i A',strtotime($value->update_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'party_type3' => $value->party_type3,
                 	 		'party_type4' => $value->party_type4,
                 	 		'party_type1' => $value->party_type1,
                 	 		'party_type2' => $value->party_type2,
                 	 		'value1' => $value->value1,
                 	 		'value2' => $value->value2,
                 	 		'value3' => $value->value3,
                 	 		'value4' => $value->value4,
                 	 		'remarks1' => $value->remarks1,
                 	 		'remarks2' => $value->remarks2,
                 	 		'remarks3' => $value->remarks3,
                 	 		'remarks4' => $value->remarks4,
                 	 		'totalsum' => $value->totalsum,
                 	 		'account_head_name'=>$account_head_idname
                 	 		
                 	 		

                 	 	);





                        $i++;
                        $j++;

                 	 }

                  $totalarray=array_merge($array2,$array);
                  echo json_encode($totalarray);

	}
	
			public function fetch_data_get_ledger_view_new_verification()
	{

                    
                     $status=$_GET['customer_id'];
                  
                     
                    
                 
                 
                          
                         
                         
     $result=$this->db->query("SELECT * FROM all_ledgers  WHERE   deleteid='0' AND md_verification='".$status."'   ORDER BY payment_date ASC");
                          $result=$result->result();
                         
                         
                    




                 	 
                 	 
                 	 $i=2;
                 	 $j=1;
                 	  $array=array();
                 	  
                 	  
                 	         foreach ($result as  $value)
                 	         {
                       
                           $party_name="";
                           $party= $this->Main_model->where_names('accountheads','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                           
                           $cname="";
                           


                 	 $partys=$this->db->query("SELECT b.company_name,b.id FROM orders_process as a  JOIN customers as b ON a.customer_id=b.id WHERE  a.order_no='".$value->reference_no."'");
                 	 $partys=$partys->result();

                           foreach($partys as $partyss)
                           {
                               $cname=$partyss->company_name;
                               $customer_id=$partyss->id;
                               
                           }

                                                                      $addclass="";
                 	     if($value->changes_status==1)
                 	     {
                 	         $addclass="bgcolorchange";
                 	         
                 	     }
                           
                                          $bank_name="";
                                     	 //$resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                     	 //foreach ($resultvent as  $valuess) {
                                          //$bank_name= $valuess->bank_name; 
                                          
                                         
                                     	 //}
                       
                                        $username="";
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username= $valuess->name; 
                                          
                                         
                                       }
                     
                                   
                       
                     
                        
                     	                       $balancett=0;
                                            
                                         $seti=$j;
                                         
                         
                                         $link="#";
                                     	
                                     	
                     
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



  $balancetotal=0;
                                                                      $debitsamount=0;
                                                                      $creditsamount=0;

if($status==1)
{



                            
$res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid','0','id','ASC');
                                                                      
                                                                    
                                                                      foreach($res as $val)
                                                                      {
                                                                          $debitsamount+=$val->debits;
                                                                          $creditsamount+=$val->credits;
                                                                          $balancetotal+=$val->balance;
                                                                      }
                                                                      
                                                                      $balancetotal=$creditsamount-$debitsamount;

                                                                      if($balancetotal>0)
                                                                      {

                                                                        $getstatus1=1;
                                                                      }
                                                                      else
                                                                      {
                                                                            $getstatus1=0;
                                                                      }


                                                                     $net_balance= abs($balancetotal);

}


                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $seti, 
                            'id' => $value->id,
                             'url'=>base_url().'index.php/customer/ledger_find?customer_id='.$customer_id,
                            'getstatus1' => $getstatus1,
                            'net_balance' => $net_balance,
                            'name' => $party_name, 
                            'order_id' => $link, 
                            'addclass' => $addclass,
                            'bank_name' => $bank_name, 
                 	 		'order_no' => $value->order_no, 
                 	 		'org_amount' => $value->org_amount, 
                 	 		'username' => $username, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no, 
                 	 		'customer_id' => $value->customer_id,
                 	 		'cname' => $cname,
                 	 		'commission_customer' => $value->commission_customer,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'credits' => $value->credits,
                            'debits' => $value->debits,
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'balance' => $total,
                 	 		'getstatus'=>$getstatus,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'update_date' => date('d-m-Y g:i A',strtotime($value->update_date)), 
                 	 		'party_type4' => $value->party_type4,
                 	 		'party_type3' => $value->party_type3,
                 	 		'party_type1' => $value->party_type1,
                 	 		'party_type2' => $value->party_type2,
                 	 		'value1' => $value->value1,
                 	 		'value2' => $value->value2,
                 	 		'value3' => $value->value3,
                 	 		'value4' => $value->value4,
                 	 		'remarks1' => $value->remarks1,
                 	 		'remarks2' => $value->remarks2,
                 	 		'remarks3' => $value->remarks3,
                 	 		'remarks4' => $value->remarks4,
                 	 		'totalsum' => $value->totalsum

                 	 		
                 	 		

                 	 	);


                        $i++;
                        $j++;

                 	 }

                  
                  echo json_encode($array);

	}
	
    


}




