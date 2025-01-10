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
                                           



      $data['v_owners'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '30', 'deleteid', '0', 'id', 'ASC');
            

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
                     
                     if($form_data->vehicle_name!='' && $form_data->vehicle_number!='')
                     {

                     $tablename=$form_data->tablename;


                    if ($this->session->userdata["logged_in"]["access"] == "12") {
                    $data["approved_status"] = 0;
                    }

                    
                     $data['vehicle_name']=$form_data->vehicle_name;
                     $data['vehicle_owner']=$form_data->vehicle_owner;
                     $data['vehicle_number']=$form_data->vehicle_number;
                     $data['vehicle_type']=$form_data->vehicle_type;
                     $data['purchased_date']=str_replace('T18:30:00.000Z','', $form_data->purchased_date);
                     $data['insurance_date']=str_replace('T18:30:00.000Z','', $form_data->insurance_date);
                     $data['national_permit_date']=str_replace('T18:30:00.000Z','', $form_data->national_permit_date);
                     $data['fc_date']=str_replace('T18:30:00.000Z','', $form_data->fc_date);
                     $data['pollution_date']=str_replace('T18:30:00.000Z','', $form_data->pollution_date);
                     $data['state_tax']=$form_data->state_tax;
                     $data['road_tax']=$form_data->road_tax;
                     $data['route_id']=$form_data->route_id;
                     $data['user_id']=$this->userid;
                     


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

                     if($form_data->vehicle_name!='' && $form_data->vehicle_number!='')
                     {
                         $tablename=$form_data->tablename;
                          $data['get_id']=$form_data->id;
                         
                         $data['vehicle_name']=$form_data->vehicle_name;
                         $data['vehicle_owner']=$form_data->vehicle_owner;
                         $data['vehicle_number']=$form_data->vehicle_number;
                          $data['vehicle_type']=$form_data->vehicle_type;
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


                                 $datas_log['user_id']= $this->userid; 
                                 $datas_log['data_fetch']= json_encode($data);   
                                 $this->Main_model->insert_commen($datas_log,'vehicle_edit_log');



                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }

                   if ($form_data->action == "updatevalue") 
                    {
                        $tablename = $form_data->tablename;
                        $lab = $form_data->lab;
                        $data[$lab] = $form_data->val;
                        $data["approved_by"] = $this->userid;
                        $data["get_id"] = $form_data->id;

                        $this->Main_model->update_commen($data, $tablename);

          
                   }

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);



                     

                                 $datas_log['user_id']= $this->userid; 
                                 $datas_log['data_fetch']= 'Vehicle Deleted Id '.$form_data->id;   
                                 $this->Main_model->insert_commen($datas_log,'vehicle_edit_log');

                 }
                
                


    }
    

   public function fetch_data_sales_group()
    {
        $i = 1;
        $array = [];
        if ($this->session->userdata["logged_in"]["access"] == "12") {
            $result = $this->Main_model->where_names_two_order_by(
                "vehicle",
                "user_id",
                $this->userid,
                "deleteid",
                "0",
                "id",
                "DESC"
            );
        } elseif ($this->session->userdata["logged_in"]["access"] == "11") {
            $sales_team_id = [$this->userid];
            $resultsales_team = $this->Main_model->where_in_names(
                "sales_member_head",
                "sales_head_id",
                $sales_team_id
            );
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }
            $sales_team_id = implode("','", $sales_team_id);

            $result = $this->db->query(
                "SELECT * FROM vehicle  WHERE deleteid='0' AND user_id IN ('" .
                    $sales_team_id .
                    "')    ORDER BY id DESC"
            );
            $result = $query->result();
        } else {
            $result = $this->Main_model->where_names(
                "vehicle",
                "deleteid",
                "0"
            );
        }

        foreach ($result as $value) {
            if ($value->status == "1") {
                $status = "Active";
            } else {
                $status = "InActive";
            }

            $customers = $this->Main_model->where_names(
                "route",
                "id",
                $value->route_id
            );
            foreach ($customers as $csval) {
                $routename = $csval->name;
            }

            $sales_team_name = "";
            $user_group_team = $this->Main_model->where_names(
                "admin_users",
                "id",
                $value->user_id
            );
            foreach ($user_group_team as $team) {
                $sales_team_name = $team->name;
            }


            $approved_by = "";
            $user_group_team = $this->Main_model->where_names(
                "admin_users",
                "id",
                $value->approved_by
            );
            foreach ($user_group_team as $team) {
                $approved_by = $team->name;
            }


            $vehicle_owner = "";
            $user_group_team = $this->Main_model->where_names(
                "admin_users",
                "id",
                $value->vehicle_owner
            );
            foreach ($user_group_team as $team) {
                $vehicle_owner = $team->name;
            }

            $array[] = [
                "id" => $i,
                "v_id" => $value->id,
                "vehicle_name" => $value->vehicle_name,
                "vehicle_owner"=>$vehicle_owner,
                "vehicle_number" => $value->vehicle_number,
                "vehicle_type" => $value->vehicle_type,
                 "approved_by" => $approved_by,
                 "approved_status" => $value->approved_status,
                "purchased_date" => str_replace(
                    "01-01-1970",
                    "",
                    date("d-m-Y", strtotime($value->pollution_date))
                ),
                "insurance_date" => str_replace(
                    "01-01-1970",
                    "",
                    date("d-m-Y", strtotime($value->insurance_date))
                ),
                "fc_date" => str_replace(
                    "01-01-1970",
                    "",
                    date("d-m-Y", strtotime($value->fc_date))
                ),
                "routename" => $routename,
                "national_permit_date" => str_replace(
                    "01-01-1970",
                    "",
                    date("d-m-Y", strtotime($value->national_permit_date))
                ),
                "pollution_date" => str_replace(
                    "01-01-1970",
                    "",
                    date("d-m-Y", strtotime($value->pollution_date))
                ),
                "state_tax" => $value->state_tax,
                "road_tax" => $value->road_tax,
                "status" => $status,
                "username" => $sales_team_name,
            ];

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

                        $output['vehicle_name'] = $value->vehicle_name;
    $output['vehicle_owner'] = $value->vehicle_owner;



                        
                        $output['vehicle_number']= $value->vehicle_number;
                        $output['vehicle_type']= $value->vehicle_type;
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
