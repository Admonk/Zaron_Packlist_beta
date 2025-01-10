<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
	public function usersindex()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	
							            	
							            	if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                
                                                
                                                  $sales_group_id=array();
                                                  $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                                  $resultsales_team=$query->result();
                                                  foreach ($resultsales_team as  $values) {
                                                      
                                                      $sales_group_id[]=$values->id;
                                                      
                                                 }
                                                 $data['sales_group'] = $this->Main_model->where_names_two_order_by_where_in('sales_group','deleteid','0','id',$sales_group_id,'id','DESC');
							            	 
							            	 
                                            }
                                            else
                                            {
                                                $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 
                                            }
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Users Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('users/user_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function user_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							                 
							                 
							                 
							                  $admin_users = $this->Main_model->where_names('admin_users','id',$id);
							                  
							                   $sales_group_id=array();
							                  foreach($admin_users as $vl)
							                  {
							                             $sales_group_id=explode('|',$vl->sales_group_id);    
							                  }
							                  
							                  
							                  
							                  $data['sales_group_id']=$sales_group_id;
							                  
							            	
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Users Add';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('users/user_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function user_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['user_group'] = $this->Main_model->where_names_order_by('user_group','deleteid','0','id','ASC');
                                           
                                    
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Users List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('users/usergroupbase',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	public function user_list_by_group()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['user_group'] = $this->Main_model->where_names_order_by('user_group','deleteid','0','id','ASC');
                                           
                                    
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Users List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('users/user_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
           

                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->name!=''  && $form_data->pin!='' && $form_data->customer_group!='' && $form_data->phone!='' )
                     {

			                     $tablename=$form_data->tablename;
			                     $data['name']=$form_data->name;
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['username']=$form_data->name;
			                     $data['access']=$form_data->customer_group;
			                     
			                     if(isset($form_data->sales_group))
			                     {
			                          $data['sales_group_id']= implode("|",$form_data->sales_group);
			                     
			                     }
			                    
			                     
			                     
			                     $data['status']=$form_data->status;
			                     
			                      $data['marital_status']=$form_data->marital_status;
			                      $data['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
			                      $data['fathername']=$form_data->fathername;
			                      $data['mothername']=$form_data->mothername;
			                      $data['spouse_details']=$form_data->spouse_details;
			                      $data['spouse_name']=$form_data->spouse_name;
			                      $data['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
			                      $data['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			                      
			                      
			                   
			                    
        			                     $data['password']=md5($form_data->pin);
        			                     $data['org_password']=$form_data->pin;


                                      $result= $this->Main_model->where_names('admin_users','password',$data['password']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'PIN already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                          
				                          
				                      	    $userid=$this->Main_model->insert_commen($data,$tablename);
				                      	    
				                      	     if(isset($form_data->sales_group))
            			                     {
            			                          for($i=0;$i<count($form_data->sales_group);$i++)
            				                      {
            				                         
            				                         
            				                          $datashead['sales_group_id']=$form_data->sales_group[$i];
            				                          $datashead['sales_head_id']=$userid;	    
            				                          $this->Main_model->insert_commen($datashead,'sales_head_group');	    
    				                      	    
            				                          
            				                      }
            			                         
            			                     }
				                      	    
				                      	    
				                      	    
				                      	    
				                      	    $array=array('error'=>'2','massage'=>'User successfully Added..');
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

                 	if($form_data->name!=''  && $form_data->pin!='' && $form_data->customer_group!='' && $form_data->phone!='' )
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['name']=$form_data->name;
                       $data['username']=$form_data->name;
			           $data['email']=$form_data->email;
			           $data['phone']=$form_data->phone;
			           $data['access']=$form_data->customer_group;
			           
			           
			                     if(isset($form_data->sales_group))
			                     {
			                          $data['sales_group_id']= implode("|",$form_data->sales_group);
			                     
			                     }
			           
			             $data['status']=$form_data->status;
			           
			           
			                      $data['marital_status']=$form_data->marital_status;
			                      $data['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
			                      $data['fathername']=$form_data->fathername;
			                      $data['mothername']=$form_data->mothername;
			                      $data['spouse_details']=$form_data->spouse_details;
			                      $data['spouse_name']=$form_data->spouse_name;
			                      $data['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
			                      $data['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			           
			           
			           
			           
			           $data['password']=md5($form_data->pin);
			           $data['org_password']=$form_data->pin;

                 	   $this->Main_model->update_commen($data,$tablename);
                 	   
                 	   
                 	                         $this->db->query("DELETE FROM sales_head_group  WHERE sales_head_id='" . $form_data->id . "'");
                 	                         if(isset($form_data->sales_group))
            			                     {
            			                          for($i=0;$i<count($form_data->sales_group);$i++)
            				                      {
            				                         
            				                         
            				                          $datashead['sales_group_id']=$form_data->sales_group[$i];
            				                          $datashead['sales_head_id']=$form_data->id;	    
            				                          $this->Main_model->insert_commen($datashead,'sales_head_group');	    
    				                      	    
            				                          
            				                      }
            			                         
            			                     }
				                      	    
                 	   
                       $array=array('error'=>'2','massage'=>'User successfully Updated..');
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

                     $group_base=$_GET['group_base'];
                     $result= $this->Main_model->where_names_two_order_by('admin_users','access',$group_base,'deleteid','0','id','DESC');
                 	 $i=1;
                 	 
                 	 
                 	 
                 	      $sales_group_id=array();
                 	      $sales_group_id_name=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              $sales_group_id[]=$values->id;
                              $sales_group_id_name[]=$values->name;
                           }
                         
                 	 
                 	 
                 	 foreach ($result as  $value) {
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('user_group','id',$value->access);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
                        }
                        
                        
                        
                      
                        
                        
                        $sales_group_name =array();
                        $sales_group = $this->Main_model->where_in_names('sales_group','id', explode("|",$value->sales_group_id));
                        foreach ($sales_group as  $row) {
                        	$sales_group_name[]=$row->name;
                        }
                        
                        
                        if($this->session->userdata['logged_in']['access']=='16')
                       {
                        
                        if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                        {
                            
                        
                   

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
                                     	 		'name' => $value->name, 
                                     	 		'email' => $value->email, 
                                     	 		'phone' => $value->phone, 
                                     	 		'username' => $value->username, 
                                     	 		'org_password' => $value->org_password,
                                     	 		'sales_group' => implode(",",$sales_group_name), 
                                     	 		'marital_status' => $value->marital_status, 
                                     	 		'dob' => $value->dob, 
                                     	 		'fathername' => $value->fathername, 
                                     	 		'mothername' => $value->mothername, 
                                     	 		'spouse_details' => $value->spouse_details, 
                                     	 		'spouse_name' => $value->spouse_name, 
                                     	 		'sdob' => $value->sdob, 
                                     	 		'define_salesteam_id' => $value->define_salesteam_id, 
                                     	 		'wedding_anniversary' => $value->wedding_anniversary, 
                                     	 		'status' => $status, 
                                     	 		'access' =>$user_group_name 
                    
                                     	 	);
                                     	 	
                                     	 	
                                     	 	$i++;
  
			                      
			                      
                        }  
                       }
                       else
                       {
                           
                           
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
                                     	 		'name' => $value->name, 
                                     	 		'email' => $value->email, 
                                     	 		'phone' => $value->phone, 
                                     	 		'username' => $value->username, 
                                     	 		'org_password' => $value->org_password,
                                     	 		'sales_group' => implode(",",$sales_group_name), 
                                     	 		'marital_status' => $value->marital_status, 
                                     	 		'dob' => $value->dob, 
                                     	 		'fathername' => $value->fathername, 
                                     	 		'mothername' => $value->mothername, 
                                     	 		'spouse_details' => $value->spouse_details, 
                                     	 		'spouse_name' => $value->spouse_name, 
                                     	 		'sdob' => $value->sdob, 
                                     	 		'define_salesteam_id' => $value->define_salesteam_id, 
                                     	 		'wedding_anniversary' => $value->wedding_anniversary, 
                                     	 		'status' => $status, 
                                     	 		'access' =>$user_group_name 
                    
                                     	 	);
                                     	 	
                                     	 	
                                     	 	$i++;
  
                           
                       }
			                      



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
                      $output['email']= $value->email; 
                      $output['phone']= $value->phone;
                      $output['username']= $value->username;
                      $output['password']= $value->org_password; 
                      $output['access']=$value->access;
                      
                                 $output['sales_group']=explode('|',$value->sales_group_id);
			           
			                     $output['status']=$value->status;
			           
			           
			                      $output['marital_status']=$value->marital_status;
			                      $output['dob']=$value->dob;
			                      $output['fathername']=$value->fathername;
			                      $output['mothername']=$value->mothername;
			                      $output['spouse_details']=$value->spouse_details;
			                      $output['spouse_name']=$value->spouse_name;
			                      $output['sdob']=$value->sdob;
			                      $output['wedding_anniversary']=$value->wedding_anniversary;
			           
			           
	                 	
                 	 }

                    echo json_encode($output);


    }
	
	


}
