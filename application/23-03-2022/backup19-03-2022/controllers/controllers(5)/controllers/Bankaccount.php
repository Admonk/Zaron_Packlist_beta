<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bankaccount extends CI_Controller {

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
                                             $data['title']    = 'Bank Account Details';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('bankaccount/index.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              

                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->bank_name!='' || $form_data->account_no!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['type']=$form_data->type;
                     $data['bank_name']=$form_data->bank_name;
                     $data['account_no']=$form_data->account_no;
                     $data['ifsc_code']=$form_data->ifsc_code;
                     $data['current_amount']=$form_data->current_amount;
                     
                    
                 	 
                     
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

                   	 if($form_data->bank_name!='' || $form_data->account_no!='')
                     {
                         $tablename=$form_data->tablename;
                         $data['type']=$form_data->type;
                         $data['bank_name']=$form_data->bank_name;
                         
                         $data['account_no']=$form_data->account_no;
                         $data['ifsc_code']=$form_data->ifsc_code;
                         $data['current_amount']=$form_data->current_amount;
                          $data['get_id']=$form_data->id;
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


                 	 $result= $this->Main_model->where_names_order_by('bankaccount','deleteid','0','id','ASC');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'bank_name' => $value->bank_name, 
                 	 			'type' => $value->type,
                 	 				'account_no' => $value->account_no,
                 	 					'ifsc_code' => $value->ifsc_code,
                 	 						'current_amount' => $value->current_amount,
                 	 		

                 	 	);
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);

	}
	
	
		public function fetch_data_details()
	{

                     $account_id=$_GET['account_id'];
                 	 $result= $this->Main_model->where_names('bankaccount_manage','bank_account_id',$account_id);
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id, 
                	 		
                 	 		'name' => $value->name, 
                 	 		'ex_code' => $value->ex_code,
                 	 		'debit' => $value->debit,
                 	 		'credit' => $value->credit,
                 	 		'status_by' => $value->status_by,
                 	 		'create_date'=>date('d-m-Y',strtotime($value->create_date)),

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
                 	 	$output['bank_name'] = $value->bank_name;
                 	 	$output['type'] = $value->type;
                 	 	$output['account_no'] = $value->account_no;
                 	 	$output['ifsc_code'] = $value->ifsc_code;
                 	 	$output['current_amount'] = $value->current_amount;
                 	 	
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	