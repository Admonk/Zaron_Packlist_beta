<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller {

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
                                             $data['title']    = 'Production';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['Categories'] = $this->Main_model->where_names_order_by('categories', 'deleteid', '0', 'id', 'ASC');
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('production/index.php',$data);


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
                    
                        $data['categories_id']=$form_data->categories;
                        $names=explode(',', $form_data->name);
                		for($i=0; $i <count($names) ; $i++) {
                		$data['categories']=$names[$i];
                		$this->Main_model->insert_commen($data,$tablename);
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
                       $data['categories']=$form_data->name;
                        $data['categories_id']=$form_data->categories;
                      
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


                 	 $result= $this->Main_model->where_names('production','deleteid','0');
                 	 $data=array();
                 	$i=1;
                 	
                 	 foreach ($result as  $value) {
                 	     
                 	     $categories="";
                     	      $resultss= $this->Main_model->where_names('categories','id',$value->categories_id);
                     	      foreach ($resultss as  $values) {
                     	          
                     	          $categories=$values->categories;
                     	      }
                     	 
                     	 		$data[] = array(
                     	 		    
                     	 		    
                     	 		'no' => $i, 
    
                     	 		'id' => $value->id, 
                    	 		'categories_id' => $categories, 
                     	 		'name' => $value->categories, 
                     	 		
    
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
                 	 	$output['name'] = $value->categories;
                 	    $output['categories'] = $value->categories_id;
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	