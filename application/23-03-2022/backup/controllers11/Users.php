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
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
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
                     
                     if($form_data->name!='' && $form_data->username!='' && $form_data->password!='' && $form_data->customer_group!='' && $form_data->phone!='' )
                     {

			                     $tablename=$form_data->tablename;
			                     $data['name']=$form_data->name;
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['access']=$form_data->customer_group;
			                     $data['username']=$form_data->username;
			                     $data['password']=md5($form_data->password);
			                     $data['org_password']=$form_data->password;


                                      $result= $this->Main_model->where_names('admin_users','username',$data['username']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Username already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                      	    $this->Main_model->insert_commen($data,$tablename);
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

                 	if($form_data->name!='' && $form_data->username!='' && $form_data->password!='' && $form_data->customer_group!='' && $form_data->phone!='' )
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['name']=$form_data->name;
			           $data['email']=$form_data->email;
			           $data['phone']=$form_data->phone;
			           $data['access']=$form_data->customer_group;
			           $data['username']=$form_data->username;
			           $data['password']=md5($form_data->password);
			           $data['org_password']=$form_data->password;

                 	   $this->Main_model->update_commen($data,$tablename);
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

                    
                 	 $result= $this->Main_model->where_names('admin_users','deleteid','0');
                 	 foreach ($result as  $value) {
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('user_group','id',$value->access);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
                        }
                        
                        if($value->access=='SS')
                        {
                            $user_group_name='Sales Team';
                        }
                        
                        if($value->access=='D')
                        {
                            $user_group_name='Driver';
                        }
                        
                        if($value->access=='SH')
                        {
                            $user_group_name='TL';
                        }
                        
                         if($value->access=='C')
                        {
                            $user_group_name='Customer';
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

                 	 		'id' => $value->id, 
                 	 		'name' => $value->name, 
                 	 		'email' => $value->email, 
                 	 		'phone' => $value->phone, 
                 	 		'username' => $value->username, 
                 	 		'org_password' => $value->org_password, 
                 	 		'status' => $status, 
                 	 		'access' =>$user_group_name 

                 	 	);




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
	                 	
                 	 }

                    echo json_encode($output);


    }
	
	


}
