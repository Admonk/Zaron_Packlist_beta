<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle extends CI_Controller {

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
   
	
    public function vehicle_view()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['route'] = $this->Main_model->where_names('route','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vehicle';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('vehicle/vehicle.php',$data);


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
                     
                     if($form_data->vehicle_name!='' && $form_data->vehicle_number!='' && $form_data->purchased_date!='' && $form_data->insurance_date!='')
                     {

                     $tablename=$form_data->tablename;
                    
                     $data['vehicle_name']=$form_data->vehicle_name;
                     $data['vehicle_number']=$form_data->vehicle_number;
                     $data['purchased_date']=str_replace('T18:30:00.000Z','', $form_data->purchased_date);
                     $data['insurance_date']=str_replace('T18:30:00.000Z','', $form_data->insurance_date);
                     $data['national_permit_date']=str_replace('T18:30:00.000Z','', $form_data->national_permit_date);
                     $data['fc_date']=str_replace('T18:30:00.000Z','', $form_data->fc_date);
                     $data['pollution_date']=str_replace('T18:30:00.000Z','', $form_data->pollution_date);
                     $data['state_tax']=$form_data->state_tax;
                     $data['road_tax']=$form_data->road_tax;
                     $data['route_id']=$form_data->route_id;
                     


                     $data['status']=$form_data->status;

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

                 	 if($form_data->vehicle_name!='' && $form_data->vehicle_number!='' && $form_data->purchased_date!='' && $form_data->insurance_date!='')
                     {
                         $tablename=$form_data->tablename;
                          $data['get_id']=$form_data->id;
                         
                         $data['vehicle_name']=$form_data->vehicle_name;
                         $data['vehicle_number']=$form_data->vehicle_number;
                         $data['purchased_date']=str_replace('T18:30:00.000Z','', $form_data->purchased_date);
                         $data['insurance_date']=str_replace('T18:30:00.000Z','', $form_data->insurance_date);
                         $data['national_permit_date']=str_replace('T18:30:00.000Z','', $form_data->national_permit_date);
                         $data['fc_date']=str_replace('T18:30:00.000Z','', $form_data->fc_date);
                         $data['pollution_date']=str_replace('T18:30:00.000Z','', $form_data->pollution_date);
                         $data['state_tax']=$form_data->state_tax;
                         $data['road_tax']=$form_data->road_tax;
                         $data['route_id']=$form_data->route_id;

                         $data['status']=$form_data->status;
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
	

    public function fetch_data_sales_group()
    {


                     $result= $this->Main_model->where_names('vehicle','deleteid','0');
                     foreach ($result as  $value) {
                        
                        if($value->status=='1')
                        {
                            $status='Active';
                        }
                        else
                        {
                            $status='InActive';
                        }
                        
                        
                             $customers = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($customers as $csval)
                             {
                                 
                                $routename= $csval->name;
                              
                                 
                             }
							       


                        $array[] = array(

                                 'id' => $value->id, 
                                  'vehicle_name' => $value->vehicle_name, 
                                  'vehicle_number' => $value->vehicle_number, 
                                  'purchased_date' =>str_replace('01-01-1970','', date('d-m-Y',strtotime($value->pollution_date))), 
                                  'insurance_date' => str_replace('01-01-1970','', date('d-m-Y',strtotime($value->insurance_date))), 
                                  'fc_date' => str_replace('01-01-1970','', date('d-m-Y',strtotime($value->fc_date))), 
                                  'routename' => $routename, 
                                  'national_permit_date' =>str_replace('01-01-1970','', date('d-m-Y',strtotime($value->national_permit_date))), 
                                  'pollution_date' => str_replace('01-01-1970','', date('d-m-Y',strtotime($value->pollution_date))), 
                                  'state_tax' => $value->state_tax, 
                                  'road_tax' => $value->road_tax, 
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

                 	 	$output['vehicle_name'] = $value->vehicle_name;
                        $output['vehicle_number']= $value->vehicle_number;
                        $output['purchased_date']= $value->purchased_date;
                        $output['status']= $value->status;
                        $output['insurance_date']= $value->insurance_date;
                        $output['route_id']= $value->route_id;

                            $output['fc_date']= $value->fc_date;
                            $output['national_permit_date']= $value->national_permit_date;
                            $output['pollution_date']= $value->pollution_date;
                            $output['state_tax']= $value->state_tax;
                            $output['road_tax']= $value->road_tax;


                        $output['id']= $value->id;
	                 	
                 	 }

                    echo json_encode($output);


    }
	



}	
