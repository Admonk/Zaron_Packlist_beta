<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partytype extends CI_Controller {

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
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Party type';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('partytype/index.php',$data);


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


                 	 $result= $this->Main_model->where_names('partytype','deleteid','0');
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
                 	 
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	