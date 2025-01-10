<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

    function __construct() {
        error_reporting(0);
        parent::__construct();
        $this->load->model('Admin/Users_model');
        if (isset($this->session->userdata['logged_in'])) {
            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $sales_id = $sess_array['sales_id'];
            $define_saleshd_id = $sess_array['define_saleshd_id'];
            $define_salesteam_id = $sess_array['define_salesteam_id'];
            $define_driver_id = $sess_array['define_driver_id'];
            $customer_id = $sess_array['customer_id'];
            $username = $sess_array['username'];
            $this->userid = $userid;
            $this->username = $username;
            $this->user_mail = $email;
            $this->sales_id = $sales_id;
            $this->define_saleshd_id = $define_saleshd_id;
            $this->define_salesteam_id = $define_salesteam_id;
            $this->define_driver_id = $define_driver_id;
            $this->customer_id = $customer_id;
            profile($this->user_mail);
        }
    }
   

    public function standard_reason()
    {

        if(isset($this->session->userdata['logged_in']))
        {
            $data['active_base']='route';
            $data['active']='route';
            $data['title'] = 'Standard Master';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/standard_reason.php',$data);
        }
        else
        {
            redirect('index.php/adminmain');
        }

    }

    public function rectification_alternative_action()
    {

        if(isset($this->session->userdata['logged_in']))
        {
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Rectification/Alternative Action Master';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('order/rectification_alternative_action.php',$data);
        }
        else
        {
            redirect('index.php/adminmain');
        }

    }


	public function insertandupdate()
	{

        $form_data = json_decode(file_get_contents("php://input"));

         //insert   
        if($form_data->action=='Add')
        {
            if($form_data->name!='')
            {
                $tablename=$form_data->tablename;
                $data['name']=$form_data->name;
                $data['option']=$form_data->option;
                $this->Main_model->insert_commen($data,$tablename);
            }
            else {
                $array=array('error'=>'1');
                echo json_encode($array);
            }
        }

        //update
        if($form_data->action=="Update")
        {
            if($form_data->name!='') 
            {
                $tablename=$form_data->tablename;
                $data['get_id']=$form_data->id;
                $data['name']=$form_data->name;
                $data['option']=$form_data->option;
                $this->Main_model->update_commen($data,$tablename);
            }
            else
            {
                $array=array('error'=>'1');
                echo json_encode($array);
            }
        }

        //delete
        if($form_data->action=='Delete')
        {
            $tablename=$form_data->tablename;
            $id=$form_data->id;
            $this->Main_model->deleteupdate($id,$tablename);

        }

	}


	public function fetch_data()
	{
        $tablename = $_GET['tablename'];
        $name = $_GET['togglename'];
        $query = $this->db->query("SELECT value FROM common_setting WHERE deleteid = 0 AND name = $name LIMIT 1");
        $result= $this->Main_model->where_names($tablename,'deleteid','0');
        $val = "df";
        $data=array();
        $i=1;
            foreach ($result as  $value) {
                
                $data[] = array(
                'no' => $i, 
                'id' => $value->id, 
                'name' => $value->name, 
                'option' => $value->option, 
                );

                $i++;
            }
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $data['other_option'] = $row->value;
            }
            // echo $val;exit();

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
                $output['option'] = $value->option;
            }

        echo json_encode($output);


    }


    public function updatetoggle(){

        $form_data = json_decode(file_get_contents("php://input"));

            $label = $form_data->label;
            $value = $form_data->value;

            $this->db->query("UPDATE common_setting SET value='" . $value . "' WHERE name='" . $label . "'");
            echo json_encode($response);

    }
	
}	