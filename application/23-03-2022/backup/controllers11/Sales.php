<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

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
   
	
    public function sales_head()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                               $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
											
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Head';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('sales/sales_head.php',$data);


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
                     
                     if($form_data->name!='' && $form_data->phone!='')
                     {
                         
                         

                                         $tablename=$form_data->tablename;
                                         $data['name']=$form_data->name;
                                         $data['sales_group']=$form_data->sales_group;
                                         $data['email']=$form_data->email;
                                         $data['phone']=$form_data->phone;
                                         $data['pin']=$form_data->pin;
                                         $data['status']=$form_data->status;
                    
                                         $insertid=$this->Main_model->insert_commen($data,$tablename);
                                         
                                         
                                         
                                         $datas['name']=$form_data->name;
                                         $datas['username']=$form_data->name;
                                         $datas['email']=$form_data->email;
                                         $datas['phone']=$form_data->phone;
                                         $datas['password']=md5($form_data->pin);
                                         $datas['org_password']=$form_data->pin;
                                         $datas['status']=$form_data->status;
                                         $datas['access']='SH';
                                         $datas['sales_id']='SH'.$insertid;
                                         $datas['define_saleshd_id']=$insertid;
                                         
                                         $this->Main_model->insert_commen($datas,'admin_users');
                                         
                                         
                                         

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	if($form_data->name!='' && $form_data->phone!='')
                     {
                         $tablename=$form_data->tablename;
                         $data['get_id']=$form_data->id;
                         $data['name']=$form_data->name;
                         $data['email']=$form_data->email;
                         $data['phone']=$form_data->phone;
                         $data['pin']=$form_data->pin;
                         $data['sales_group']=$form_data->sales_group;
                         $data['status']=$form_data->status;
                 	     $this->Main_model->update_commen($data,$tablename);
                 	     
                 	     
                         	     
                         	 $datas['name']=$form_data->name;
                             $datas['username']=$form_data->name;
                             $datas['email']=$form_data->email;
                             $datas['phone']=$form_data->phone;
                             $datas['password']=md5($form_data->pin);
                             $datas['org_password']=$form_data->pin;
                             $datas['status']=$form_data->status;
                             $datas['access']='SH';
                             $datas['sales_id']='SH'.$form_data->id;
                             $datas['define_saleshd_id']=$form_data->id;
                             $datas['get_id']=$form_data->id;
                             
                             
                             
                                              $result= $this->Main_model->where_names('admin_users','define_saleshd_id',$form_data->id);
        				                      if(count($result)>0)
        				                      { 
        				                            $datas['get_id']=$form_data->id;
        				                            $this->Main_model->update_commen_where($datas,'define_saleshd_id','admin_users');

        				                      }
        				                      else
        				                      {     unset($datas['get_id']);
        				                            $this->Main_model->insert_commen($datas,'admin_users');
        				                      }
                             
                           
                 	     
                 	     
                 	     
                 	     
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
                     
                     
                     $this->Main_model->delete_where('admin_users','define_saleshd_id',$id);
                     
                     
                     

                 }
                
                


	}
	

    public function fetch_data_sales_group()
    {

                       $i=1;
                     $result= $this->Main_model->where_names('sales_head','deleteid','0');
                     foreach ($result as  $value) {
                         
                         
                         
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                        foreach ($user_group as  $row) {
                        	$user_group_name=$row->name;
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
                            'no' => $i, 
                            'email' => $value->email, 
                            'sales_group' => $user_group_name, 
                            'phone' => $value->phone, 
                            'name' => $value->name, 
                            'pin' => $value->pin, 
                            'status' => $status 

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
                 	 	$output['name'] = $value->name;
                        $output['email']= $value->email;
                        $output['phone']= $value->phone;
                        $output['sales_group']= $value->sales_group;
                        $output['status']= $value->status;
                        $output['pin']= $value->pin;
                        $output['id']= $value->id;
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	