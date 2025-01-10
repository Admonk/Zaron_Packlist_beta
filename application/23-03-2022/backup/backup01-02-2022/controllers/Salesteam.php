<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesteam extends CI_Controller {

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
	public function sales_team_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
											 $data['sales_head'] = $this->Main_model->where_names('admin_users','access','11');
											 
											 
										
											 
											 $data['route'] = $this->Main_model->where_names('route','deleteid','0');
                                           
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Sales Team Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function sales_team_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                 $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
											 $data['sales_head'] = $this->Main_model->where_names('admin_users','access','11');
											 
											 $data['route'] = $this->Main_model->where_names('route','deleteid','0');
                                           
							                
                                             $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Sales Team  Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function sales_team_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                

							                 
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Sales Team List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_list',$data);
										
										
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
                     
                      if($form_data->phone!='' && $form_data->name!='' && $form_data->sales_id!='' &&  $form_data->pin!='' &&  $form_data->sales_head!='' &&  $form_data->sales_group!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['phone2']=$form_data->phone2;
			                     $data['sales_head']=$form_data->sales_head;
                                 $data['sales_group']=$form_data->sales_group;
                                 $data['route']=$form_data->route;
                                 $data['status']=$form_data->status;
                                 $data['sales_id']=$form_data->sales_id;

			                   
			                     $data['pin']=$form_data->pin;
			                     $data['name']=$form_data->name;
			                     
			                     
			                     
			                             $data['marital_status']=$form_data->marital_status;
        			                     $data['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
        			                     $data['fathername']=$form_data->fathername;
        			                     $data['mothername']=$form_data->mothername;
        			                     $data['spouse_details']=$form_data->spouse_details;
        			                     $data['spouse_name']=$form_data->spouse_name;
        			                     $data['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
        			                     $data['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			                      
                                 


                                      $result= $this->Main_model->where_names($tablename,'pin',$data['pin']);
				                      if(count($result)>0)
				                      {     
				                          
				                                $sales_id=0;
				                                foreach ($result as  $row) {
                                                	$sales_id=$row->sales_id;
                                                }
                                                if($sales_id==$form_data->sales_id)
                                                {
                                                      $array=array('error'=>'3','massage'=>'Sales ID already exists');
                                                      echo json_encode($array);
                                                }
                                                else
                                                {
                                                     $array=array('error'=>'3','massage'=>'Sales PIN no already exists');
                                                      echo json_encode($array);
                                                }


				                        	

				                      }
				                      else
				                      {
				                      	    $insertid=$this->Main_model->insert_commen($data,$tablename);
				                      	    
				                      	    
				                      	    
				                      	    
				                      	    
				                      	    
				                      	     
                                              $datas['marital_status']=$form_data->marital_status;
            			                      $datas['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
            			                      $datas['fathername']=$form_data->fathername;
            			                      $datas['mothername']=$form_data->mothername;
            			                      $datas['spouse_details']=$form_data->spouse_details;
            			                      $datas['spouse_name']=$form_data->spouse_name;
            			                      $datas['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
            			                      $datas['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			                      
                				                      	    
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                            
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='12';
                                             $datas['sales_id']=$form_data->sales_id;
                                             $datas['define_salesteam_id']=$insertid;
                                             
                                             $this->Main_model->insert_commen($datas,'admin_users');
        				                      	    
        				                      	    
				                      	    
				                      	    
				                      	    $array=array('error'=>'2','massage'=>'Sales successfully Added..');
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

                 	 if($form_data->name!='')
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                      
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['phone2']=$form_data->phone2;
			                     $data['sales_head']=$form_data->sales_head;
                                 $data['sales_group']=$form_data->sales_group;
                                 $data['route']=$form_data->route;
                                 $data['status']=$form_data->status;
                                 $data['sales_id']=$form_data->sales_id;

			                   
			                     $data['pin']=$form_data->pin;
			                     $data['name']=$form_data->name;
			                     
			                      $data['marital_status']=$form_data->marital_status;
        			                     $data['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
        			                     $data['fathername']=$form_data->fathername;
        			                     $data['mothername']=$form_data->mothername;
        			                     $data['spouse_details']=$form_data->spouse_details;
        			                     $data['spouse_name']=$form_data->spouse_name;
        			                     $data['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
        			                     $data['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
                         
                                

                 	             $this->Main_model->update_commen($data,$tablename);
                 	   
                 	   
                 	   
                 	   
                 	                       $datas['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
        			                      $datas['fathername']=$form_data->fathername;
        			                      $datas['mothername']=$form_data->mothername;
        			                      $datas['spouse_details']=$form_data->spouse_details;
        			                      $datas['spouse_name']=$form_data->spouse_name;
        			                      $datas['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
        			                      $datas['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			                      
                             
                 	   
                 	   
                 	   
                 	                         $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='SS';
                                             $datas['sales_id']=$form_data->sales_id;
                                             $datas['define_salesteam_id']=$form_data->id;
                                             
                                             
                                             
                                              $result= $this->Main_model->where_names('admin_users','define_salesteam_id',$form_data->id);
        				                      if(count($result)>0)
        				                      { 
        				                            $datas['get_id']=$form_data->id;
        				                            $this->Main_model->update_commen_where($datas,'define_salesteam_id','admin_users');

        				                      }
        				                      else
        				                      {
        				                           unset($datas['get_id']);
        				                            $this->Main_model->insert_commen($datas,'admin_users');
        				                      }
				                          
				                          
                                             
                                             
                                             
                                           
                 	   
                 	   
                 	   
                 	   
                 	   
                 	   
                       $array=array('error'=>'2','massage'=>'Sales successfully Updated..');
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
                     $this->Main_model->delete_where('admin_users','define_salesteam_id',$id);

                 }
                
                


	}
	public function fetch_data()
	{

                    
                 	 $result= $this->Main_model->where_names('sales_team','deleteid','0');
                 	 foreach ($result as  $value) {
                       

                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
                        }



                        $sales_head_name ='';
                        $sales_head = $this->Main_model->where_names('admin_users','id',$value->sales_head);
                        foreach ($sales_head as  $rows) {
                        	$sales_head_name=$rows->name;
                        }


                        $route_name ='';
                        $route = $this->Main_model->where_names('route','id',$value->route);
                        foreach ($route as  $rowss) {
                        	$route_name=$rowss->name;
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
                 	 		
                 	 		'email' => $value->email, 
                 	 		'phone' => $value->phone, 
                 	 		'phone2' => $value->phone2, 
                 	 		'name' => $value->name, 
                 	 		'pin' => $value->pin, 
                 	 		'sales_id'=>$value->sales_id,
                 	 		'sales_group' => $user_group_name, 
                 	 		'sales_head' => $sales_head_name, 
                 	 		'route' => $route_name, 
                 	 		'status' => $status 

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
                      $output['company_name']= $value->company_name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['phone2']= $value->phone2;
                      $output['sales_id']= $value->sales_id;
                      $output['sales_group']= $value->sales_group; 
                      $output['sales_head']= $value->sales_head;
                      $output['route']= $value->route;
                   
                      $output['status']= $value->status;
                      $output['pin']= $value->pin;
                      
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
