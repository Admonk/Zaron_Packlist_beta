<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tile extends CI_Controller {

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
                                            
                                             $data['product_list'] = $this->Main_model->where_names_order_by('product_list','categories_id','26','id','ASC');
							            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Tile Calculation';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('tiles/index.php',$data);


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
                     
                     if($form_data->product_name!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['product_name']=$form_data->product_name;
                     $data['length_mm']=$form_data->length_mm;
                     $data['length_feet']=$form_data->length_feet;
                     
                    		
                 	 
                     
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

                 	if($form_data->product_name!='')
                     {
                         
                         
                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['product_name']=$form_data->product_name;
                       $data['length_mm']=$form_data->length_mm;
                       $data['length_feet']=$form_data->length_feet;
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


                 	 $result= $this->Main_model->where_names('tiltes_calulation','deleteid','0');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      $resultdd= $this->Main_model->where_names('product_list','id',$value->product_name);
                 	       foreach ($resultdd as  $valuess) {
                 	           $product_name=$valuess->product_name;
                 	       }
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		'product_name' => $product_name, 
                 	 		'length_mm' => $value->length_mm, 
                 	 		'length_feet' => $value->length_feet
                 	 		

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
                 	     
                 	 	$output['product_name'] = $value->product_name;
                 	 	$output['length_mm'] = $value->length_mm;
                 	 	$output['length_feet'] = $value->length_feet;
                 	 
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	