<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accountheads_sub extends CI_Controller {

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
                                            
                                             $data['accounttype']= $this->Main_model->where_names('accounttype','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Account Heads';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads_sub/index.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
   

  public function opening_balance_setting()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['accounttype']= $this->Main_model->where_names('accounttype','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Account Heads';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('accountheads_sub/opening_balance_setting.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->name!='' && $form_data->account_type!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['name']=$form_data->name;
                     $data['account_type']=$form_data->account_type;
                     
                     $data['spilt_status']=$form_data->spilt_status;
                     $data['trail_balance_view']=1;
                    
                 	 
                     $data['balance']=$form_data->balance;
                    
                     $this->Main_model->insert_commen($data,$tablename);

                                             $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) {
                                                                $username=$team->name;
                                                                
                                             }

                                            $day_log['username'] = $username;
                                            $day_log['changes'] = '';
                                            $day_log['table_name'] = $tablename;
                                            $day_log['reference_no'] =$form_data->name;
                                            $day_log['create_date'] =$date;
                                            $day_log['create_time'] =$time;
                                            $day_log['details'] =$form_data->action;
                                            $this->Main_model->insert_commen($day_log, 'day_log');


                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                  	if($form_data->name!='' && $form_data->account_type!='')
                     {
                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['name']=$form_data->name;
                       $data['account_type']=$form_data->account_type;
                        $data['spilt_status']=$form_data->spilt_status;
                       $data['balance']=$form_data->balance;
                    
                 	   $this->Main_model->update_commen($data,$tablename);

                                             $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) {
                                                                $username=$team->name;
                                                                
                                             }

                                            $day_log['username'] = $username;
                                            $day_log['changes'] = '';
                                            $day_log['table_name'] = $tablename;
                                            $day_log['reference_no'] =$form_data->name;
                                            $day_log['create_date'] =$date;
                                            $day_log['create_time'] =$time;
                                            $day_log['details'] =$form_data->action;
                                            $this->Main_model->insert_commen($day_log, 'day_log');



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


                                                $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) {
                                                                $username=$team->name;
                                                                
                                             }

                                            $day_log['username'] = $username;
                                            $day_log['changes'] = '';
                                            $day_log['table_name'] = $tablename;
                                            $day_log['reference_no'] =$form_data->id;
                                            $day_log['create_date'] =$date;
                                            $day_log['create_time'] =$time;
                                            $day_log['details'] =$form_data->action;
                                            $this->Main_model->insert_commen($day_log, 'day_log');

                 }


                  if($form_data->action=='Activestatus')
                 {
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $status=$form_data->status;
                     $field=$form_data->field;
                     
                                             $this->db->query("UPDATE $tablename SET $field='".$status."' WHERE id='".$id."'");

                                             $username ='';
                                             $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                             foreach ($user_group_team as  $team) {
                                                                $username=$team->name;
                                                                
                                             }

                                            $day_log['username'] = $username;
                                            $day_log['changes'] =$form_data->status.' | '.$field;
                                            $day_log['table_name'] = $tablename;
                                            $day_log['reference_no'] =$form_data->id;
                                            $day_log['create_date'] =$date;
                                            $day_log['create_time'] =$time;
                                            $day_log['details'] =$form_data->action;
                                            $this->Main_model->insert_commen($day_log, 'day_log');

                 }
                
                
                


	}
	public function fetch_data()
	{


                 	 $result= $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                 	 $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     
                 	         $results= $this->Main_model->where_names('accounttype','id',$value->account_type);
                         	 foreach ($results as  $values) {
                         	 	$name = $values->name;
                         	 }
                 	 
                 	 		$data[] = array(
                 	 		    
                 	 		    
                 	 		'no' => $i, 

                 	 		'id' => $value->id,
                            'opeing_balance_status'=>$value->opeing_balance_status, 
                	 		'account_type' => $name,
                 	 		'name' => $value->name, 
                 	 		'balance'=>$value->balance,
                 	 		'spilt_status'=>$value->spilt_status
                 	 		

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
                 	 	$output['account_type'] = $value->account_type;
                 	 	$output['spilt_status'] = $value->spilt_status;
                 	 	 $output['balance']=$value->balance;
                    
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	