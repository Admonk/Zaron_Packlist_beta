<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	public function customer_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							                 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','11','deleteid','0','id','DESC');
							            	 
							            	 
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
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','11','deleteid','0','id','DESC');
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
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
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
                     
                     if($form_data->phone!='' && $form_data->company_name!='' && $form_data->gst!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['address1']=$form_data->address1;
                                 $data['address2']=$form_data->address2;
                                 $data['locality']=$form_data->locality;
                                 
                                  

                                      
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
                                        $ratings=$form_data->ratings*10;
                                        $data['ratings']=$ratings*2;


			                   
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     $data['company_name']=$form_data->company_name;
                                 $data['landline']=$form_data->landline;
                                 $data['sales_group']=$form_data->sales_group;




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
                                             $data_address['locality']=$form_data->locality;
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


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['google_map_link']=$form_data->google_map_link;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     $data['locality']=$form_data->locality;
                                     $data['zone']=$form_data->zone;
                                     $data['sales_team_id']=$form_data->sales_team_id;
                                      
                                        $data['feedback_sub']=$form_data->feedback;
                                        $data['feedback_details']=$form_data->feedback_details;
                                        $data['credit_limit']=$form_data->credit_limit;
                                        $data['credit_period']=$form_data->credit_period;
                                        $ratings=$form_data->ratings*10;
                                        $data['ratings']=$ratings*2;
                                        
                                        
                                                $address_id=0;
                                                $user_group = $this->Main_model->where_names($tablename,'id',$form_data->id);
                                                foreach ($user_group as  $row) {
                                                	$address_id=$row->address_id;
                                                }
                                                
                                                
                                             
                                             
                                        
                                        
                                             $data_address['get_id']=$address_id;
				                      	     $data_address['name']=$form_data->company_name;
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
			                     $data['company_name']=$form_data->company_name;
                                 $data['landline']=$form_data->landline;
                                 $data['sales_group']=$form_data->sales_group;
                                 

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

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                
                


	}
	public function fetch_data()
	{

                    
                 	 $result= $this->Main_model->where_names('customers','deleteid','0');
                 	 $i=1;
                 	  $array=array();
                 	 foreach ($result as  $value) {
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
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
                 	 		'gst' => $value->gst, 
                 	 		'address' => $value->address1.' '.$value->address2.' '.$value->landmark.'  '.$value->zone.' '.$value->pincode.' '.$value->city.' '.$value->state,
                 	 		'city' => $value->city, 
                 	 		'state' => $value->state, 
                 	 		'google_map_link' => $value->google_map_link, 
                 	 		'status' => $status, 
                 	 		'access' =>$user_group_name ,
                 	 		'sales_team_name'=>$sales_team_name

                 	 	);


$i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	public function fetch_data_get_ledger()
	{

                    
                     $customer_id=$_GET['customer_id'];
                    $limit=$_GET['limit'];
                     
                     
                 	  $result= $this->Main_model->where_names_limit('customer_ledger','customer_id',$customer_id,$limit);
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

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                     
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                         $result= $this->Main_model->where_names_limit('customer_ledger','customer_id',$customer_id,$limit);
                 	  
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                         
                          $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND customer_id='".$customer_id."'  AND deleteid=0 ORDER BY id ASC");
                 	      $result=$result->result();
                         
                     }
                    
                 	 
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
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
	
	
	
	
	
	
	
	

    public function fetch_single_data()
    {
                      
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
                      $output['pin']= $value->pin;
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      $output['locality']= $value->locality;
                      $output['city']= $value->city;
                      $output['state']= $value->state;
                      $output['google_map_link']= $value->google_map_link;
                      $output['sales_group']= $value->sales_group;
                      $output['sales_team_id']= $value->sales_team_id;
                      $output['landline']= $value->landline;
                      
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
                      
                      if($value->ratings=="")
                      {
                          $output['ratings']= 0;
                      }
                      else
                      {
                          $output['ratings']= $value->ratings;
                      }
                      
                      
                      
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


                        $array[] = $value->company_name.'/'.$value->phone;

                             
                          

                        


                     }
                     
                     
               

             
             echo json_encode($array);
                     


              

    }
	
	


}

