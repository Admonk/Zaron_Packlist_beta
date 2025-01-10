<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

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
   
	public function route()
	{
		          

		         
                  
							            if(isset($this->session->userdata['logged_in']))
							            {
							                
							            	 
                                             $data['active_base']='route';
										     $data['active']='route';
								             $data['title']    = 'route';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
						                     $this->load->view('group/route.php',$data);


										}
										else
										{

										      redirect('index.php/adminmain');

										}                    

                  


	}
	
	
	
	
		public function locality()
	{
		          

		         
                  
							            if(isset($this->session->userdata['logged_in']))
							            {
							                
							            	 $data['route']= $this->Main_model->where_names('route','deleteid','0');
                                             $data['active_base']='route';
										     $data['active']='route';
								             $data['title']    = 'Locality';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
						                     $this->load->view('group/locality.php',$data);


										}
										else
										{

										      redirect('index.php/adminmain');

										}                    

                  


	}
	
    public function sales_group()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                            
                                             $data['sales_user_type'] = $this->Main_model->where_names_two_order_by('admin_users','access','16','deleteid','0','id','ASC');
							            	 
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Group';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/sales_group.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function user_group()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'User Group';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/user_group.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 

                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->name!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['name']=$form_data->name;
                     
                     if(isset($form_data->route_id))
                 	 {
                 	 	    	$data['route_id'] = $form_data->route_id;
                 	 }
                 	 
                 	 
                 	 if($tablename=='sales_group')
                 	 {
                 	     $data['sales_group_head'] = $form_data->sales_group_head;
                 	 }
                 	 
                     
                     $this->Main_model->insert_commen($data,$tablename);

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
                       $data['name']=$form_data->name;
                       
                       if(isset($form_data->route_id))
                 	   {
                 	 	    	$data['route_id'] = $form_data->route_id;
                 	   }
                 	   
                 	     if($tablename=='sales_group')
                     	 {
                     	     $data['sales_group_head'] = $form_data->sales_group_head;
                     	 }
                       
                 	   $this->Main_model->update_commen($data,$tablename);
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


                 	 $result= $this->Main_model->where_names('route','deleteid','0');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
	
	
		public function fetch_data_route()
	{


                 	 $result= $this->Main_model->where_names('locality','deleteid','0');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	              $routename="";
                 	              $resultroute= $this->Main_model->where_names('route','id',$value->route_id);
                 	             
                 	              foreach($resultroute as $er)
                 	              {
                 	                  $routename=$er->name;
                 	              }
                 	     
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		'route_id' =>$routename, 
                 	 		'name' => $value->name, 
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}


    public function fetch_data_sales_group()
    {


                     $result= $this->Main_model->where_names('sales_group','deleteid','0');
                     $data=array();
                   	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      
                            $sales_user_type = $this->Main_model->where_names_two_order_by('admin_users','id',$value->sales_group_head,'deleteid','0','id','ASC');
                            foreach($sales_user_type as $vv)
                            {
                                $value->sales_group_head=$vv->name;
                            }
							            	
                 	     
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i,
                 	 		
                 	 		'sales_group_head' => $value->sales_group_head, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }
                    echo json_encode($data);

    }
     public function fetch_data_user_group()
    {


                     $result= $this->Main_model->where_names('user_group','deleteid','0');
                     $data=array();
                 	 $i=1;
                 	 foreach ($result as  $value) {
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		

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
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {
                 	 	$output['name'] = $value->name;
                 	 	if(isset($value->route_id))
                 	 	{
                 	 	    	$output['route_id'] = $value->route_id;
                 	 	}
                 	    if(isset($value->sales_group_head))
                 	 	{
                 	 	    	$output['sales_group_head'] = $value->sales_group_head;
                 	 	}
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	