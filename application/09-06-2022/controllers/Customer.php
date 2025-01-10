<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '4400M');

class Customer extends CI_Controller {

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
    
    
	public function customer_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 
							            	 $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
							            	 
							            	 
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
							            	 $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','id','ASC');
                                           
							            	 
							            	 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Customer Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('customer/customer_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function customer_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                                             $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                              $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
							            	 
                                             
                                             
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
							            	  $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','id','ASC');
                                           
                                             
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Customer  Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('customer/customer_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function customer_list()
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
								             $data['title']    = 'Customer List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('customer/customer_list',$data);
										
										
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
									         $this->load->view('customer/ledger_find',$data);
										
										
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
                                             $res = $this->Main_model->where_names('customers','id',$_GET['customer_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->company_name;
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
                 

                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->company_name!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 $data['address2']=$form_data->address2;
                                 
                                  $ppl=explode('-', $form_data->locality);
                                  $data['locality']=$ppl[0];
                                 
                               
                                 
                                 
                                 $data['gst_status']=$form_data->gst_status;
                                 
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $data[$label_name]= $form_data->$label_name; 
                                     }
                                     

                                      
                                     $data['zone']=$form_data->zone;
                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['google_map_link']=$form_data->google_map_link;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     $data['sales_team_id']=$form_data->sales_team_id;


                                        $data['feedback_sub']=$form_data->feedback;
                                        $data['feedback_details']=$form_data->feedback_details;
                                        $data['credit_limit']=$form_data->credit_limit;
                                        $data['credit_period']=$form_data->credit_period;
                                        
                                        
                                        $data['ratings']=$form_data->ratings;
                                        $data['price_rateings']=$form_data->price_rateings;
                                        $data['delivery_time_rateings']=$form_data->delivery_time_rateings;
                                        $data['quality_rateings']=$form_data->quality_rateings;
                                        $data['response_commission']=$form_data->response_commission;
                                        
                                        
                                       

			                   
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     
			                     
			                      if($form_data->gst_status==2)
                                  {
                                     $data['gst']=0; 
                                  }
            			                     
			                     
			                     
			                     
			                     $data['company_name']=$form_data->company_name;
                                 $data['landline']=$form_data->landline;
                                 $data['sales_group']=$form_data->sales_group;
                                 
                                  $sales_team_id = $this->Main_model->where_names('admin_users','id',$form_data->sales_team_id);
			                      foreach($sales_team_id as $val)
			                      {
			                          $define_saleshd_id=$val->define_saleshd_id;
			                      }
			                      
			                      
			                      $sales_head_id = $this->Main_model->where_names('admin_users','id',$define_saleshd_id);
			                      foreach($sales_head_id as $val)
			                      {
			                           $data['sales_group']=$val->sales_group_id;
			                      }
                                 
                                  $data['sales_head']=$define_saleshd_id;


                                      $result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Customer phone no  already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                          
				                          
				                      	     $customer_id=$this->Main_model->insert_commen($data,$tablename);
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     $datas['name']=$form_data->company_name;
                                             $datas['username']=$form_data->company_name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($data['pin']);
                                             $datas['org_password']=$data['pin'];
                                             $datas['status']=1;
                                             $datas['access']='C';
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             $datas['customer_id']=$customer_id;
                                             
                                             
                                            // $this->Main_model->insert_commen($datas,'admin_users');
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	     
				                      	    
				                      	     $data_address['customer_id']=$customer_id;
				                      	     $data_address['name']=$form_data->company_name;
            			                     $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             
                                             $ppl=explode('-', $form_data->locality);
                                             $data_address['locality']=$ppl[0];
                                 
                                             
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $addressid=$this->Main_model->insert_commen($data_address,'customers_adddrss');
                                             
                                             
                                             $data_addressid['get_id']=$customer_id;
                                             $data_addressid['address_id']=$addressid;
                                             $this->Main_model->update_commen($data_addressid,$tablename);
				                      	    
				                      	    
				                      	    
				                      	    $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Customer successfully Added..');
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

                 	 if($form_data->company_name!='')
                     {

                                    $tablename=$form_data->tablename;
                                    $data['get_id']=$form_data->id;
                      
			                        $data['email']=$form_data->email;
			                        $data['phone']=$form_data->phone;
			                        $data['address1']=$form_data->address1;
                                    $data['address2']=$form_data->address2;
                                    $data['gst_status']=$form_data->gst_status;


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['google_map_link']=$form_data->google_map_link;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     
                                     
                                       $ppl=explode('-', $form_data->locality);
                                      $data['locality']=$ppl[0];
                                 
                               
                                     
                                     
                                     
                                     $data['zone']=$form_data->zone;
                                     $data['sales_team_id']=$form_data->sales_team_id;
                                     
                                     
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $data[$label_name]= $form_data->$label_name; 
                                     }
                                     
                                     
                                      
                                        $data['feedback_sub']=$form_data->feedback;
                                        $data['feedback_details']=$form_data->feedback_details;
                                        $data['credit_limit']=$form_data->credit_limit;
                                        $data['credit_period']=$form_data->credit_period;
                                        
                                        
                                        
                                        $data['ratings']=$form_data->ratings;
                                        $data['price_rateings']=$form_data->price_rateings;
                                        $data['delivery_time_rateings']=$form_data->delivery_time_rateings;
                                        $data['quality_rateings']=$form_data->quality_rateings;
                                        $data['response_commission']=$form_data->response_commission;
                                        
                                        
                                        
                                        
                                        
                                        
                                                $address_id=0;
                                                $user_group = $this->Main_model->where_names($tablename,'id',$form_data->id);
                                                foreach ($user_group as  $row) {
                                                	$address_id=$row->address_id;
                                                }
                                                
                                                
                                             
                                             
                                        
                                        
                                             $data_address['get_id']=$address_id;
				                      	     $data_address['name']=$form_data->company_name;
            			                     $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                            
                                                $ppl=explode('-', $form_data->locality);
                                                $data_address['locality']=$ppl[0];
                                 
                               
                                             
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $this->Main_model->update_commen($data_address,'customers_adddrss');
                                             
                                             
                                             
                                             
                                             $datas['name']=$form_data->company_name;
                                             $datas['username']=$form_data->company_name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($data['pin']);
                                             $datas['org_password']=$data['pin'];
                                             $datas['status']=1;
                                             $datas['access']='C';
                                             $datas['customer_id']=$form_data->id;
                                            
                                              $result= $this->Main_model->where_names('admin_users','customer_id',$form_data->id);
        				                      if(count($result)>0)
        				                      { 
        				                            //$datas['get_id']=$form_data->id;
        				                            //$this->Main_model->update_commen_where($datas,'customer_id','admin_users');

        				                      }
        				                      else
        				                      {
        				                            //$this->Main_model->insert_commen($datas,'admin_users');
        				                      }
				                          
				                          
                                             
                                             
                                             
                                             
                                             
                                             
                                             

			                   
			                     
			                     $data['gst']=$form_data->gst;
			                     
			                     
			                      if($form_data->gst_status==2)
                                  {
                                     $data['gst']=0; 
                                  }
			                     
			                      $data['company_name']=$form_data->company_name;
                                  $data['landline']=$form_data->landline;
                                  $data['sales_group']=$form_data->sales_group;
                                 
                                  $sales_team_id = $this->Main_model->where_names('admin_users','id',$form_data->sales_team_id);
			                      foreach($sales_team_id as $val)
			                      {
			                          $define_saleshd_id=$val->define_saleshd_id;
			                      }
			                      
			                      
			                      $sales_head_id = $this->Main_model->where_names('admin_users','id',$define_saleshd_id);
			                      foreach($sales_head_id as $val)
			                      {
			                           $data['sales_group']=$val->sales_group_id;
			                      }
                                  $data['sales_head']=$define_saleshd_id;

                 	   $this->Main_model->update_commen($data,$tablename);
                       $array=array('error'=>'2','massage'=>'Customer successfully Updated..');
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
                          $data_driver['order_id']=0;
                          $data_driver['user_id']=$this->userid;
                          $data_driver['customer_id']=$form_data->id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          
                          
                          
                          
                                                                     
                                                                      $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->id,'party_type',1,'deleteid','0','id','ASC');
                                                                      
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
                                                                         if($creditsamount==0)
                                                                         {
                                                                          $balancetotal=$debitsamount;
                                                                         }
                                                                         
                                                                         $balancetotal=str_replace('-','',$balancetotal);
                                                                     
                          
                          
                                                                             
                                                                              if($form_data->val=='1')
                                                                              {
                                                                                                             $data_driver['reference_no']='';
                                                                                                             $data_driver['order_no']='Opening Balance';  
                                                                                                            
                                                                                                              if($balancetotal==0)
                                                                                                              {   
                                                                                                                   $data_driver['balance']=$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                   //$this->db->query("UPDATE all_ledgers SET balance='0' WHERE customer_id='".$form_data->id."' AND party_type='1'");
                                                                                                                   //$data_driver['balance']=$balancetotal+$obalance;
                                                                                                                    $data_driver['balance']=$obalance;
                                                                                                              }
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                            
                                                                                                              if($balancetotal==0)
                                                                                                              {
                                                                                                                    $data_driver['balance']='-'.$obalance;
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                  
                                                                                                                    //$this->db->query("UPDATE all_ledgers SET balance='0' WHERE customer_id='".$form_data->id."' AND party_type='1'");
                                                                                                                    //$data_driver['balance']=$balancetotal-$obalance;
                                                                                                                    $data_driver['balance']='-'.$obalance;
                                                                                                                    
                                                                                                              }
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Customer Opening Balance';
                                                                              $data_driver['payment_date']=$date;
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=1;
                                                                              
                          
                                                                              if($form_data->val!='')
                                                                              {
                                                                                   $query = $this->db->query("SELECT id FROM `all_ledgers`  WHERE customer_id='".$form_data->id."' AND party_type='1' AND order_no='Opening Balance'");
                                                                                   $resultsales_team=$query->result();
                                                                                   if(count($resultsales_team)==0)
                                                                                   {
                                                                                       $this->Main_model->insert_commen($data_driver,'all_ledgers');
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                             $data_driver['get_id']=$form_data->id;
                                                                                              $this->Main_model->update_commen_where_three($data_driver,'customer_id','order_no','Opening Balance','party_type','1','all_ledgers');
                                                                                       
                                                                                   }
                                                                                  
                                                                                   
                                                                              }
                                                                              
                                                                              
                                                                              if($obalance==0)
                                                                              {
                                                                                    $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND order_no='Opening Balance'");
                                                                              }
                          
                          
                          
                      }
                      
                      
                      $data['get_id']=$form_data->id;
                      $data[$lab]=$form_data->val;
                      
                      $this->Main_model->update_commen($data,$tablename);

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
                        
                         $where = " AND company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR gst LIKE '%" . $search . "%'";
                        
                     }
                     
                     if($searchsales!='undefined')
                     {
                         $where="  AND sales_team_id='" . $searchsales . "'";
                     }
                     
                     if($searchsales!='undefined' && $search != "")
                     {
                         $where = " AND sales_team_id='" . $searchsales . "' AND company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR gst LIKE '%" . $search . "%'";
                     }
                     
                    	                                         

                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              
                                               $sales_group_id=implode(',',$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT id,email,phone,company_name,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
                 	                          
							            	 
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id,define_saleshd_id FROM `admin_users`  WHERE id='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->define_saleshd_id;
                                                                              
                                              }
                                              
                                             
                                             
                                              $sales_group_id=implode(',',$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT id,email,phone,company_name,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
							            	 
                     }
                     elseif($this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT id,email,phone,company_name,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                 	                          
							            	 
                     }
                     else
                     {
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                       $query = $this->db->query("SELECT id,email,phone,company_name,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                           
                     }
                 	 	
                 	
                
                 	 	
                 	 
                 	 $result=$query->result();
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($result as  $value)
                 	 {
                 	     
                 	     
                 	     
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
                        }
                        
                        $locality_name ='';
                        $route_id='';
                        $user_group = $this->Main_model->where_names('locality','id',$value->locality);
                        foreach ($user_group as  $row) {
                        	$locality_name=$row->name;
                        		$route_id=$row->route_id;
                        }
                        
                        
                         $route_name ='';
                        $user_group = $this->Main_model->where_names('route','id',$route_id);
                        foreach ($user_group as  $row) {
                        	$route_name=$row->name;
                        		
                        }
                        
                        $sales_team_name ='';
                        $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                        foreach ($user_group_team as  $team) {
                        	$sales_team_name=$team->name;
                        }
                       

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
                             	 		'company_name' => $value->company_name, 
                             	 		'pin' => $value->pin, 
                             	 		'route' => $route_name, 
                             	 		'locality' => $value->locality, 
                             	 		'locality_name' => $locality_name, 
                             	 		'gst' => $value->gst, 
                             	 		'gst_status' => $value->gst_status, 
                             	 		'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                             	 		'city' => $value->city, 
                             	 		'state' => $value->state, 
                             	 		'google_map_link' => $value->google_map_link, 
                             	 		'feedback_details' => $value->feedback_details,
                             	 		'ratings'=>$value->ratings,
                             	 		'price_rateings'=>$value->price_rateings,
                             	 		'delivery_time_rateings'=>$value->delivery_time_rateings,
                             	 		'quality_rateings'=>$value->quality_rateings,
                             	 		'response_commission'=>$value->response_commission,
                             	 		'opening_balance'=>$value->opening_balance,
                             	 		'payment_status'=>$value->payment_status,
                             	 		'credit_period'=>$value->credit_period,
                             	 		'credit_limit'=>$value->credit_limit,
                             	 		'landline'=>$value->landline,
                             	 		'customer_type'=>$value->customer_type,
                             	 		'sales_team_id'=>$value->sales_team_id,
                             	 		'status' => $status, 
                             	 		'access' =>$user_group_name ,
                             	 		'sales_team_name'=>$sales_team_name
            
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
                     
                     
                 	  $result= $this->Main_model->where_three_names_limit('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid',0,$limit);
                 	  
                 	  
                 	  $i=1;
                 	  $array=array();
                 	  foreach ($result as  $value) {
                       
                     

                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'company_name' => $value->company_name, 
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
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id!=0)
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                     
                     
                   
                     
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                              $formdate=date("Y-m-d", strtotime('monday this week'));
                              $todate=date("Y-m-d", strtotime('sunday this week')); 
                               
                                
                                
                                
                                
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type=1 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql ORDER BY id DESC");
                 	            
                 	          
                 	          $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                         
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0 AND party_type=1 $sql   ORDER BY id DESC");
                 	          $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no=''  AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no!='' AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	         $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no='' AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                       
                       $resultvent= $this->Main_model->where_names('customers','id',$value->customer_id);
                         	 foreach ($resultvent as  $valuess) {
                              $name= $valuess->name; 
                              $name= $valuess->company_name;
                             
                         	 }
                               
                                     $array2=array();
                                   foreach($resultsub as $val)
                                   { 
                                       
                                       if($value->id==$val->order_id)
                                       {
                                                $balance=$val->balance;
                                             
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
                                     	 		'paid_status' => $val->paid_status, 
                                     	 		'Payoff' => $val->payin, 
                                     	 		'Payout' => $val->payout,
                                     	 		'debits' => $val->debits,
                                     	 		'credits' => $val->credits,
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
                            'name' => $name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'customer_id' => $value->customer_id,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                 	 		'balance' => $balance,
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

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                     if($customer_id!=0)
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                     
                     
                     
                     if($formdate=='undefined')
                     {
                              $formdate=date("Y-m-d", strtotime('monday this week'));
                              $todate=date("Y-m-d", strtotime('sunday this week')); 
                        
                             
                                    $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE  deleteid=0 AND party_type=1 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql   ORDER BY id DESC");
                 	     
                             
                                     
                        
                             $result=$result->result();
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND party_type=1  $sql   ORDER BY id DESC");
                 	          
                          }
                          else
                          {
                             $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'   AND deleteid=0 AND party_type=1  $sql ORDER BY id DESC");
                 	         
                          }
                         
                         
                         
                          $result=$result->result();
                        
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 
                 	  $output=array();
                 	  
                 	 foreach ($result as  $value) {
                      $output['totalpayment']= round($value->amount);
                      $output['totalpaid']= round($value->totalpaid); 
                      $output['totaldebit']= round($value->totaldebit); 
                      $output['totalcridit']= round($value->totalcridit); 
                      $output['totalblance']= round($value->totalblance); 
                      $output['outstanding']= round($value->totalcridit-$value->totaldebit); 
                      
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
    	             
    	                 $res= $this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid',0);
                 	 
        	           
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
    
    
      public function fetch_balance_by_data()
    {
               
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;  
                     
                         $pp=explode('-', $id);
                         $id=$pp[0];
                   
    	                 $output=array();
    	                 
    	                 
    	                 if($tablename=='1')
    	                 {
    	                     $table="all_ledgers";
    	                 }
    	                 elseif($tablename=='2')
    	                 {
    	                     $table="all_ledgers";
    	                 }
    	                 elseif($tablename=='3')
    	                 {
    	                     $table="all_ledgers";
    	                 }
    	                 elseif($tablename=='4')
    	                 {
    	                     $table="bankaccount_manage";
    	                 }
    	                 elseif($tablename=='5')
    	                 {
    	                     $table="all_ledgers";
    	                 }
    	                 else
    	                 {
    	                     $table="all_ledgers";
    	                 }
    	             
    	             
    	                if($tablename==4)
    	                {
    	                                     $res = $this->Main_model->where_names($table,'bank_account_id',$id);
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                 $payid=$val->id;
                                                 $debitsamount+=$val->debit;
                                                 $creditsamount+=$val->credit;
                                                 
                                             }
    	                }
    	                else
    	                {
    	                    
    	                    
    	                    
    	                                     $res =$this->Main_model->where_names_three_order_by($table,'customer_id',$id,'party_type',$tablename,'deleteid','0','id','ASC');              
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                
                                                     
                                                     
                                                 
                                                                 $payid=$val->id;
                                                                 $debitsamount+=$val->debits;
                                                                 $creditsamount+=$val->credits;
                                                                 
                                                 
                                                
                                                 
                                             }
    	                    
    	                }
    	             
        	             
                         
                         
                         
        	             
        	             $balancetotal=$creditsamount-$debitsamount;
        	             $output['opening_balance']= $balancetotal;
                          
                     
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
                      $output['company_name']= $value->company_name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['gst']= $value->gst;
                      $output['gst_status']= $value->gst_status;
                      
                      
                      
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
                      
                      
                      
                         
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $output[$label_name]= $value->$label_name; 
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

                     $result= $this->Main_model->where_id_like_and_where('customers','phone',$searchText,'deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = array(

                            'id' => $value->id, 
                            'label' => $value->company_name.'/'.$value->phone.' '

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


                        $array[] = $value->company_name.'/'.$value->phone.'/'.$value->id;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
    
     public function customer_search_full_id()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('customers','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->id.'-'.$value->company_name.'-'.$value->phone;

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
                                         
                                         
                                              $sql=' AND company_name LIKE "%'.$search.'%" OR phone LIKE "%'.$search.'%"';
                                          
                                         
                                     }

             

                     $query = $this->db->query("SELECT id,company_name,phone FROM customers  WHERE deleteid='0' $sql ORDER BY company_name ASC LIMIT 0,50");
                     $res= $query->num_rows();
                     $result=$query->result();
                     foreach ($result as  $value) {


                        $array[] = $value->company_name.'/'.$value->phone.'/'.$value->id;

                     }
                     
                   
                 echo json_encode($array);
          

    }
    
    	
		public function fetch_data_get_ledger_view_export()
	{









  
           
                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     $sql="";
                     
                     if($customer_id!=0)
                     {
                         
                         $sql=" AND customer_id='".$customer_id."'";
                     }
                     
                     
                     
                     if($customer_id_data=='')
                     {
                         
                              $formdate=date("Y-m-d", strtotime('monday this week'));
                              $todate=date("Y-m-d", strtotime('sunday this week')); 
                         
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0 AND party_type=1 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql  ORDER BY id DESC");
                 	          $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0 AND party_type=1  $sql  ORDER BY id DESC");
                 	          $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no=''  AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	     
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no!='' AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	         $resultsub=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."' AND order_no='' AND deleteid=0 AND party_type=1 $sql ORDER BY id DESC");
                 	     
                          }
                         
                         
                         
                          $result=$result->result();
                          $resultsub=$resultsub->result();
                         
                     }
                    
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('customers','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      $name= $valuess->company_name;
                      $email= $valuess->email;
                      $phone= $valuess->phone;
                      $gst= $valuess->gst;
                     
                      $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
	                 	
                 	 }
                  
                         $filename=date('d-m-Y').'_'.$name."_ledger_customers"; 
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
                          <th>Name</th>
                          <th>Date</th>
                          <th>Reference</th>
                          <th>Invoice No</th>
                          <th>Amount</th>
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
                                           <td><?php echo $name; ?></td>
                                          <td><?php echo $value->payment_date; ?> <?php echo $value->payment_time; ?></td>
                                          <td><b><?php echo $value->reference_no; ?></b></td>
                                          <td><b><?php echo $value->order_no; ?></b></td>
                                          <td><?php echo $value->amount; ?></td>
                                          <td><?php echo $value->debits; ?></td>
                                          <td><?php echo $value->credits; ?></td>
                                          <td><?php echo $balance; ?></td>
                                          <td><?php echo $value->payment_mode; ?> <small> Reg NO :<?php echo $value->reference_no; ?></small></td>
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
                                             
                     
                                                                   
                     
                     
                                             $res = $this->Main_model->where_names('customers','id',$customer_id);
                                             foreach($res as $val)
                                             {
                                                    $company_name= $val->company_name;
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
                                                        $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                          
                                              }
                              
                      
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    
                              $data_driver['order_id']=$payid;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['party_type']=1;
                             
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
                              
                                   $data_driver['process_by']='Payment received By Customer Ledger';
                                  $data_driver['account_head_id']=$form_data->account_head_id;
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $this->Main_model->insert_commen($data_driver,$tablename);
                                         	      
                     
                     
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
                     
                     
                                                                       
                     
                     
                                                                     $res = $this->Main_model->where_names('customers','id',$customer_id);
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->company_name;
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
                              $data_driver['party_type']=1;
                           
                              
                                                          
                                                             
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
                     
                     
                                                                      
                     
                     
                                                                     $res = $this->Main_model->where_names('customers','id',$customer_id);
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->company_name;
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
                              $data_driver['party_type']=1;

                              $data_driver['amount']=0;
                              $data_driver['notes']=$notes;
                           
                              
                                                          
                                                             
                                                                
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
    


}

