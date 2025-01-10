<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {

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
                $from_date=$sess_array['from_date'];
               $to_date=$sess_array['to_date'];
               $this->from_date=$from_date;
               $this->to_date=$to_date;

               $this->userid=$userid;
               $this->user_mail=$email;

               
            }
          
    }
   
    
   public function driverview()
    {
        if (isset($this->session->userdata["logged_in"])) {
            $data["accounttype"] = $this->Main_model->where_names(
                "accountheads_sub_group",
                "deleteid",
                "0"
            );

            if ($this->session->userdata["logged_in"]["access"] == "12") {
                $data["vehicle"] = $this->Main_model->where_names_three_order_by(
                    "vehicle",
                    "user_id",
                    $this->userid,
                    "deleteid",
                    "0",
                    "approved_status",
                    '2',
                    "id",
                    "DESC"
                );
            } else {
                $data["vehicle"] = $this->Main_model->where_names_two_order_by(
                    "vehicle",
                    "approved_status",
                    '2',
                    "deleteid",
                    "0",
                    "id",
                    "DESC"
                );
            }

            $data["active_base"] = "route";
            $data["active"] = "route";
            $data["title"] = "Driver List";
            $data["top_nav"] = $this->load->view("commen/top_nav", $data, true);
            $data["side_nav"] = $this->load->view(
                "commen/side_nav",
                $data,
                true
            );
            $data["footer_copy_rights"] = $this->load->view(
                "commen/footer_copy_rights",
                $data,
                true
            );
            $this->load->view("driver/driver.php", $data);
        } else {
            redirect("index.php/adminmain");
        }
    }
    
    
      public function driverpage()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/driverpage.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function driverpage_view()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/driverpage_view.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function ledger()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                             $data['driver'] = $this->Main_model->where_names('driver','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
    
    
    
    
    
     public function ledger_find()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        { $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                             $data['customer_id']=$_GET['driver_id'];
                                             $data['driver'] = $this->Main_model->where_names('driver','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger_find.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
       public function ledger_find_delete_log()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        { $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');

                                             $data['customer_id']=$_GET['driver_id'];
                                             $data['driver'] = $this->Main_model->where_names('driver','deleteid','0');
                                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger_find_delete_log.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
     public function ledger_view()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                              
                                              
                                             $data['driver_id']=$_GET['driver_id']; 
                                             $res = $this->Main_model->where_names('driver','id',$_GET['driver_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->name;
                                             }
                                             
                                             
                                             
                                             $data['vehicle'] = $this->Main_model->where_names('vehicle','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Driver ledger List View';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('driver/ledger_view.php',$data);


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
                     
                     if($form_data->name!='' && $form_data->vehicle_id!='' && $form_data->phone!='' && $form_data->pin!='')
                     {

                                             $tablename=$form_data->tablename;
                                             $data['name']=$form_data->name;
                                             $data['vehicle_id']=$form_data->vehicle_id;
                                             $data['phone']=$form_data->phone;
                                             $data['pin']=$form_data->pin;
                                             $data['status']=$form_data->status;
                                             $data['delivery_fixced']=$form_data->delivery_fixced;
                                             $data['km_base_charge']=$form_data->km_base_charge;

                                             $data['create_date_by']=date('Y-m-d');
                                            
                                             $data['account_heads_id']=52;
                                             $data['account_heads_id_2']=104;
                                             $data['user_id']=$this->userid;


                                                if ($this->session->userdata["logged_in"]["access"] == "12" || $this->session->userdata["logged_in"]["access"] == "11") {
                                                    $data["approved_driver_status"] = 0;
                                                }

                     
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='13';
                                             $datas['delivery_fixced']=$form_data->delivery_fixced;
                                             $datas['km_base_charge']=$form_data->km_base_charge;
                                             $datas['account_heads_id']=52;
                                             $datas['account_heads_id_2']=104;
                                             $datas['user_id']=$this->userid;

                                                   if ($this->session->userdata["logged_in"]["access"] == "12") {
                                                        $datas["approved_driver_status"] = 0;
                                                    }
                                                                                 
                                            
                                      $result= $this->Main_model->where_names('admin_users','password',$datas['password']);
                                      if(count($result)>0)
                                      {

                                             $array=array('error'=>'1','massage'=>'PIN already exists');
                                             echo json_encode($array);

                                      }
                                      else
                                      {
                                          
                                              $insertid=$this->Main_model->insert_commen($data,$tablename);
                                              $datas['define_driver_id']=$insertid;
                                              $this->Main_model->insert_commen($datas,'admin_users');
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

                     if($form_data->name!='' && $form_data->vehicle_id!=''  && $form_data->phone!='' && $form_data->pin!='')
                     {
                         $tablename=$form_data->tablename;
                         $data['get_id']=$form_data->id;
                         $data['name']=$form_data->name;
                         $data['vehicle_id']=$form_data->vehicle_id;
                         $data['phone']=$form_data->phone;
                         $data['pin']=$form_data->pin;
                         $data['status']=$form_data->status;
                         $data['delivery_fixced']=$form_data->delivery_fixced;
                         $data['km_base_charge']=$form_data->km_base_charge;
                         $data['account_heads_id']=52;
                         $data['account_heads_id_2']=104;
                                             
                         
                         $this->Main_model->update_commen($data,$tablename);
                       
                       
                                $datas_log['user_id']= $this->userid; 
                                 $datas_log['data_fetch']= json_encode($data);   
                                 $this->Main_model->insert_commen($datas_log,'driver_edit_log');
                       
                       
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='13';
                                             $datas['delivery_fixced']=$form_data->delivery_fixced;
                                             $datas['km_base_charge']=$form_data->km_base_charge;
                                             $datas['define_driver_id']=$form_data->id;
                                             $datas['account_heads_id']=52;
                                             $datas['account_heads_id_2']=104;
                                             $datas['get_id']=$form_data->id;
                                              
                                          
                     
                                             
                                              $result= $this->Main_model->where_names('admin_users','define_driver_id',$form_data->id);
                                              if(count($result)>0)
                                              { 
                                                    $datas['get_id']=$form_data->id;
                                                    $this->Main_model->update_commen_where($datas,'define_driver_id','admin_users');

                                              }
                                              else
                                              {     
                                                     unset($datas['get_id']);
                                                    $this->Main_model->insert_commen($datas,'define_driver_id');
                                              }
                             
                       
                       
                       
                       
                       
                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }

                if ($form_data->action == "updatevalue") {
                    $tablename = $form_data->tablename;
                    $lab = $form_data->lab;
                    $data[$lab] = $form_data->val;
                    $data["approved_by_driver"] = $this->userid;
                    $data["get_id"] = $form_data->id;

                    $this->Main_model->update_commen($data, $tablename);

                    $this->db->query(
                        "UPDATE admin_users SET approved_by_driver='" .
                            $this->userid .
                            "',approved_driver_status='" .
                            $form_data->val .
                            "' WHERE define_driver_id='" .
                            $form_data->id .
                            "' AND access=13"
                    );


                    if($lab=='payment_status')
                    {
                        $status=$form_data->status;
                        $obalance_rent=$form_data->obalance_rent;
                        $obalance_collention=$form_data->obalance_collention;
                        $obrent_date=$form_data->obrent_date;
                        $obcollection_date=$form_data->obcollection_date;
                        if($status == 'rent'){
                            $data['opening_balance_rent']=$obalance_rent;
                            $data['payment_date_rent']=$obrent_date;
                            $data_driver['driver_collection_status']=1;
                            $data_driver['payment_date']=$obrent_date;
                            $data_driver['opening_balance_status']=1;
                            if($form_data->pay_rent=='1')
                            {            
                              $data['payment_type_rent']=1;
                              $data['op_status']=1;                           
                              $data_driver['reference_no']='Opening Balance';
                              $data_driver['order_no']='Opening Balance';    
                              $data_driver['payout']=$obalance_rent;
                              $data_driver['credits']=$obalance_rent;
                              $data_driver['debits']=0;
                            }else{
                                $data['payment_type_rent']=2;
                                $data['op_status']=2;     
                                $data_driver['reference_no']='Opening Balance';
                                $data_driver['order_no']='Opening Balance';
                                $data_driver['debits']=$obalance_rent;
                                $data_driver['credits']=0;
                                $data_driver['payout']=$obalance_rent;
                            }                                                     
                        }
                        else{
                            $data['opening_balance_collection']=$obalance_collention;
                            $data['payment_date_collection']=$obcollection_date;
                            $data_driver['opening_balance_status']=2;
                            $data_driver['driver_collection_status']=0;
                            $data_driver['payment_date']=$obcollection_date;
                            if($form_data->pay_rent=='1')
                            {                
                              $data['payment_type_collection']=1; 
                              $data['op_status']=1;                        
                              $data_driver['reference_no']='Opening Balance';
                              $data_driver['order_no']='Opening Balance';    
                              $data_driver['payout']=$obalance_collention;
                              $data_driver['credits']=$obalance_collention;
                              $data_driver['debits']=0;
                            }else{
                                $data['payment_type_collection']=2;
                                $data['op_status']=2;
                                $data_driver['reference_no']='Opening Balance';
                                $data_driver['order_no']='Opening Balance';
                                $data_driver['debits']=$obalance_collention;
                                $data_driver['credits']=0;
                                 $data_driver['payout']=$obalance_collention;
                            }

                        }

                        
                        $data_driver['order_id']=0;
                        $data_driver['user_id']=$this->userid;
                        $data_driver['customer_id']=$form_data->id;
                        $data_driver['payment_mode']='';
                        $data_driver['payment_mode_payoff']='';
                        $data_driver['paid_status']='1';
                        $data_driver['process_by']='Opening Balance';
                        $data_driver['notes']='Opening Balance';
                        $data_driver['deletemod']='OP2-'.$form_data->id;
                        $data_driver['bank_id']='25';
                        $data_driver['payment_time']=$time;
                        $data_driver['party_type']=2;
                        $data_driver['account_head_id']=52;
                        $data_driver['account_heads_id_2']=104;
                        $data_driver['payment_date']=date('2024-03-31');
                        // $data['op']=$obalance;

                                                                            
    
             // $querycheck = $this->db->query("SELECT id,customer_id,opening_balance_status FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='3' AND opening_balance_status='1'");
$querycheck = $this->db->query("SELECT id,customer_id,opening_balance_status FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='2' AND process_by='Opening Balance' AND driver_collection_status='".$data_driver['driver_collection_status']."'");
$querycheck=$querycheck->result();
$ob_rent='';
if(count($querycheck) == 0)
{

    $this->Main_model->insert_commen($data_driver,'all_ledgers');

}
else
{


      $this->db->query("UPDATE all_ledgers SET debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='2' AND process_by='Opening Balance' AND driver_collection_status='".$data_driver['driver_collection_status']."'");

    
}




 $querycheck_op_balance = $this->db->query("SELECT  SUM(credits-debits) as totalbalance FROM all_ledgers WHERE party_type='2' AND deleteid=0 AND driver_collection_status=1 AND process_by='Opening Balance'");
$querycheck_op_balance=$querycheck_op_balance->result();
$totalbalance=0;

foreach($querycheck_op_balance as $Key => $values)
{

    $totalbalance = $values->totalbalance;
    if($totalbalance>0)
    {

         $payment_status=1;
         //$this->db->query("UPDATE all_ledgers SET credits='".$totalbalance."',debits=0 WHERE customer_id='346' AND party_type='5' AND process_by='Opening Balance'");

    }
    else
    {
          
          $payment_status=2;
    	 //$this->db->query("UPDATE all_ledgers SET debits='".abs($totalbalance)."',credits=0 WHERE customer_id='346' AND party_type='5' AND process_by='Opening Balance'");


    }

//$this->db->query("UPDATE accountheads SET opening_balance='".abs($totalbalance)."',payment_status='".$payment_status."',op='".abs($totalbalance)."',op_status='".$payment_status."' WHERE id='346'");



}


                                                                                
                               $datas_log['user_id']= $this->userid;
                               $datas_log['customer_id']= $form_data->id; 
                               $datas_log['data_fetch']= json_encode($data_driver); 
                               $this->Main_model->insert_commen($datas_log,'customer_edit_log');     





                      
                                                                                    date_default_timezone_set("Asia/Kolkata"); 
                                                                                     $date= date('Y-m-d');
                                                                                     $time= date('h:i A');
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Driver Opening Balance';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($data_driver);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');











                    }
                    
                    $data['get_id']=$form_data->id;
                    // $data[$lab]=$form_data->val;
                    $this->Main_model->update_commen($data,$tablename);

                }

                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     $this->Main_model->delete_where('admin_users','define_driver_id',$id);
                     
                     //$this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE customer_id='".$id."' AND party_type=2");



                        $result = $this->Main_model->where_names_two_order_by('all_ledgers', 'customer_id', $id, 'party_type', '2', 'id', 'DESC');

                     
                             foreach ($result as  $value)
                             {
                                 
                                $deleteval= $value->deletemod;
                               

                                  if($deleteval!='')
                                {
                                     if($deleteval!='0')
                                     {
                                
                                            

                                            // $this->db->query("UPDATE bankaccount_manage SET deleteid='1',user_id='".$this->userid."' WHERE deletemod='".$deleteval."'");
                                        
                                        
                                        
                                     }
                                        
                                }


                             }



                                 $datas_log['user_id']= $this->userid; 
                                 $datas_log['data_fetch']= 'Drvier Deleted Id '.$form_data->id;   
                                 $this->Main_model->insert_commen($datas_log,'driver_edit_log');
                     

                 }
                
                


    }
    

  public function fetch_data_sales_group()
    {
        $i = 1;

        $array = [];
        if ($this->session->userdata["logged_in"]["access"] == "12") {
            $result = $this->Main_model->where_names_two_order_by(
                "driver",
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
                "SELECT * FROM driver  WHERE deleteid='0' AND user_id IN ('" .
                    $sales_team_id .
                    "') AND approved_driver_status IN('0','2')   ORDER BY id DESC"
            );
            $result = $result->result();
        } else {
            $result = $this->Main_model->where_names("driver", "deleteid", "0");
        }

        foreach ($result as $value) {
            $vehicle_name = "";
            $user_group = $this->Main_model->where_names(
                "vehicle",
                "id",
                $value->vehicle_id
            );
            foreach ($user_group as $row) {
                $vehicle_name = $row->vehicle_name.' '.$row->vehicle_number;
            }

            if ($value->status == "1") {
                $status = "Active";
            } else {
                $status = "InActive";
            }

            if ($value->status == "1") {
                $status = "Active";
            } else {
                $status = "InActive";
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
                $value->approved_by_driver
            );
            foreach ($user_group_team as $team) {
                $approved_by = $team->name;
            }

            $array[] = [
                "id" => $value->id,
                "no" => $i,
                "vehicle_id" => $vehicle_name,
                "phone" => $value->phone,
                "delivery_fixced" => $value->delivery_fixced,
                "km_base_charge" => $value->km_base_charge,
                "name" => $value->name,
                "pin" => $value->pin,
                'payment_date_rent'=>$value->payment_date_rent,
                'payment_date_collection'=>$value->payment_date_collection,
                'payment_type_rent'=>$value->payment_type_rent,
                'payment_type_collection'=>$value->payment_type_collection,
                'opening_balance_rent' => round($value->opening_balance_rent,2),
                'opening_balance_collection' => round($value->opening_balance_collection,2),
                "approved_driver_status" => $value->approved_driver_status,
                "username" => $sales_team_name,
                "opening_balance"=>$value->opening_balance,
                "payment_status"=>$value->payment_status,
                "approved_by" => $approved_by,
                "account_heads_id" => $value->account_heads_id,
                "status" => $status,
            ];

            $i++;
        }

        echo json_encode($array);
    }
    
    
    
        public function fetch_data_get_ledger()
    {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     
                     
                     
                    $result= $this->Main_model->where_three_names_limit('all_ledgers','customer_id',$customer_id,'party_type',2,'deleteid',0,$limit);
                    
                     
                     
                     $i=1;
                     $array=array();
                     foreach ($result as  $value) {
                         
                         
                           if($value->balance!='')
                         {
                             $balance=$value->balance;
                         }
                         else
                         {
                             $balance=$value->amount;
                         }
                       
                      

                        $array[] = array(
                            
                            
                            'no' => $i, 
                            'id' => $value->id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'company_name' => $value->company_name, 
                            'reference_no' => $value->reference_no, 
                            'customer_id' => $value->customer_id, 
                            'notes' => $value->notes, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'balance' => $balance,
                            'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                            'payment_time' => $value->payment_time

                        );


                        $i++;

                     }

                    echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view()
    {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                     
                    
                      $sql="";
                     if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND customer_id='".$customer_id."'";
                         
                         
                        
                     }


                      
                     if(isset($_GET['driver_collection_status']))
                     {
                         
                       $driver_collection_status=$_GET['driver_collection_status'];

                         
                         
                              $sql.=" AND driver_collection_status='".$driver_collection_status."'";
                         
                         
                        
                     
                     }
                      
                      
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     } 

                     $todate=$_GET['todate'];
                     $currentdate=date("Y-m-d");
                     if($currentdate==$todate)
                     {

                        $todate=date('Y-12-31');
                     }

                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                               $formdate=$this->from_date;
                              $todate=$this->to_date;  

                         
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."'  AND party_type=2 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."' $sql ORDER BY payment_date,id ASC");
                              
                           
                         
                  
                          
                           $result=$result->result();  
                      
                     }
                     else
                     {
                         
                          $payment_status=$_GET['payment_status'];
                          
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid='".$deleteid."' AND party_type=2 $sql   ORDER BY payment_date ASC");
                             
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid='".$deleteid."' AND party_type=2 $sql ORDER BY payment_date ASC");
                            
                          }
                         
                         
                         
                          $result=$result->result();
                          
                         
                     }
                    
                     
                     $resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=2 $sql ORDER BY payment_date ASC");
                     $resultopeing=$resultopeing->result();
                     $openingbalance=0;
                     $openingbalancec=0;
                     $openingbalanced=0;
                     $openingbalanceval=0;
                     foreach ($resultopeing as  $valuess)
                     {
                              $credits=$valuess->creditstotal;
                              $debits=$valuess->debitstotal;
                              $openingbalance=  $credits-$debits;
                              $openingbalanceval=  $credits-$debits;
                                
                                            if($openingbalance<0)
                                            {
                                                $getstatus1=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1=0;
                                                
                                            }
                                            
                         
                              
                     }
                     
                                
                                
                                if($getstatus1==1)
                                {
                                    $openingbalanced=$openingbalance;
                                    $openingbalancec=0;
                                }
                                else
                                {
                                     $openingbalanced=0;
                                     $openingbalancec=$openingbalance;
                                }
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                       $debits_opening= round($openingbalanced,2);
                       $credits_opening=  round($openingbalancec,2);
                       $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                           
                       if($openingbalance>0)
                       {
                             $credits_opening=$totalvalopeingbalance;
                             $debits_opening=0;
                       }
                       else
                       {     
                            $debits_opening=str_replace("-","",$totalvalopeingbalance);
                            $credits_opening=0;
                       }    
                                
                     
                     $array2[]=array(
                            'no' => '#', 
                            'id' => 0, 
                            'name' => 'Opening Balance', 
                            'order_id' => '', 
                            'order_no' => '', 
                            'payment_mode' => '', 
                            'reference_no' => '',
                            'customer_id' => '',
                            'notes' => '',
                            'amount' => '',
                            'paid_status' =>'',
                            'Payoff' => '',
                            'Payout' => '',
                            'debits' => $debits_opening,
                            'credits' => $credits_opening,
                            'balance' => abs($openingbalance),
                            'getstatus' => $getstatus1,
                            'bank_name'=>'',
                            'payment_date' =>date('d-M-Y',strtotime($formdate)), 
                            'payment_time' => ''
                         
                         );
                 
                     
                     
                      $i=2;
                     $j=1;
                      $array=array();
                      
                         $balanceold=array($openingbalance);


                         foreach ($result as  $value)
                         {
                              $credits=$value->credits;
                              $debits=$value->debits;
                              $balanceold[]=  $credits-$debits;
                             
                         }
                      
                     foreach ($result as  $value) {
                         
                         
                         
                           $account_head_idname="";

                    $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                    $result_account_head_text=$result_account_head->result();
                    
                   foreach($result_account_head_text as $ass)
                   {
                                              $account_head_idname=$ass->name;
                                             
                   }

                          

                   // $orders_query = $this->db->query("SELECT * FROM orders_process WHERE  order_no='".$value->order_no."' ")->result();
                   // foreach ($orders_query as $key => $value) {
                   //  $customer_query = $this->db->query("SELECT company_name FROM customers WHERE  id='".$value->customer_id."' ")->result();
                   //  var_dump($customer_query);

                   // }

                                                                      $addclass="";
                         if($value->changes_status==1)
                         {
                             $addclass="bgcolorchange";
                             
                         }
                       
                         $party_name="";
                         $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                       
                       
                                          $bank_name="";
                                         $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                         foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                         }

                                  

                                        if($driver_collection_status == 0){

                                            if($value->credits > 0){
                                                 $account_head_idname ="SALES ACCOUNT";
                                            }else{
                                                 $account_head_idname = "CASH IN HAND";
                                            }
                                        }

                                        if($driver_collection_status == 1){

                                            if($value->credits > 0){
                                                 $account_head_idname ="AUTO EXPENSES";
                                            }
                                        }

                                        if($value->process_by == 'Voucher'){
                                          $account_head_idname= $bank_name;
                                        }
                                       
                                       

                                       


                                           $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       } 
               
                                      $username="";


                                      if($value->edited_by>0)
                                      {
                                        $value->user_id=$value->edited_by;
                                        $username='Changed By ';
                                      }

                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                        $username='Deleted By ';
                                      }

                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username.= $valuess->name; 
                                          
                                         
                                       }
                                        
                     
                                              $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                                              
                                              
                                              
                                             $valueset=$balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                            $total=round($valueset,2); 
                                            $total=str_replace('-','', $total);

                                             if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }


                                      $voucher_no="";  
                                      $voucher_name='';    

                                             if($value->voucher_base == 'contra'){
                                               $voucher_no = "CONTRA";
                                             }
                                             elseif($value->voucher_base == 'journal'){
                                               $voucher_no = "JOURNAL";
                                             }
                                             elseif($value->voucher_base == 'payment'){
                                               $voucher_no = "PAYMENT";
                                             }
                                             elseif($value->voucher_base == 'receipt'){
                                               $voucher_no = "RECEIPT";
                                             }
                                             else{
                                                $voucher_no="";
                                             }

                       
                                               if($value->voucher_base){
                                                  if($value->voucher_base=='journal'){
                                                    $voucher_name = 'JOURNAL';

                                                     $voucher_name = $account_head_idname;

                                                    // $value->reference_no='JOURNAL - '.$value->voucher_no;

                                                  }
                                                  elseif($value->voucher_base=='payment'){
                                                    //$voucher_name = 'PAYMENT';
                                                       $voucher_name = $account_head_idname;

                                                    // $value->reference_no='PAYMENT - '.$value->voucher_no;

                                                  }
                                                  elseif($value->voucher_base=='receipt'){
                                                    //$voucher_name = 'RECEIPT';
                                                    $voucher_name = $account_head_idname;

                                                    // $value->reference_no='RECEIPT - '.$value->voucher_no;
                                                    //$account_head_idname=$account_head_idname;

                                                  }
                                                  
                                                  $account_head_idname=$voucher_name;
                                                 }  


                                                 if($value->process_by=='Voucher')
                                              { 
                                                  $account_head_idname=$value->dummy_customer_name;
                                                  
                                              }
                     
                        $array[] = array(
                            
                            
                            'no' => $j, 
                            'id' => $value->id, 
                            'name' => $party_name, 
                            'addclass' => $addclass, 
                            'org_amount' => $value->org_amount,
                            'username'=>$username,
                            'username_base'=>$username_base,
                            'order_id' => $value->order_id, 
                            'order_no' => $value->order_no, 
                            'payment_mode' => $value->payment_mode, 
                            'reference_no' => $value->reference_no,
                            'customer_id' => $value->customer_id, 
                            'notes' => $value->notes.' | '.$value->deletemod,
                             'process_by'=> $value->process_by, 
                            'amount' => $value->amount, 
                            'paid_status' => $value->paid_status, 
                            'Payoff' => $value->payin, 
                            'Payout' => $value->payout,
                            'deletemod' => $value->deletemod,
                            'voucher_no' => $voucher_no .'-' .$value->voucher_no,
                            'dummy_customer_id' => $value->dummy_customer_id,
                            'dummy_customer_name' =>$value->dummy_customer_name,
                            'dummy_party_type' => $value->dummy_party_type,
                            'dummy_amount' => $value->dummy_amount,
                            'credits' => round($value->credits,2),
                            'debits' => round($value->debits,2),
                            'balance' => $total,
                            'getstatus'=>$getstatus,
                            'bank_name'=>$bank_name,
                            'payment_date' => date('d-m-Y',strtotime($value->payment_date)),
                            'update_date' => date('d-m-Y g:i A',strtotime($value->update_date)), 
                            'payment_time' => $value->payment_time,
                            'account_head_name'=>$account_head_idname
                            
                            

                        );


                        $i++;
                        $j++;

                     }

                       $totalarray=array_merge($array2,$array);
                  echo json_encode($totalarray);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_group()
    {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];

                      $todate=$_GET['todate'];
                      $party_type=$_GET['party_type'];
                     
                    
                      $sql="";
                    
                         
                         if($customer_id>0)
                         {
                              $sql.=" AND a.customer_id='".$customer_id."'";
                         }



                     if(isset($_GET['driver_collection_status']))
                     {
                         
                              $driver_collection_status=$_GET['driver_collection_status'];

                         
                         
                              $sql.=" AND a.driver_collection_status='".$driver_collection_status."'";
                              
                        
                     
                     }



                     if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";

                        
                     }

                         
                    $sst="";
                     if($party_type==2)
                     {
                               
                              
                              //$sst=" AND a.payment_date<= '".$todate."'";
                              //NEW DATE
                              $sst=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                               
                     }

                      
                     
                     if($formdate=='undefined')
                     {
                         
                              
                             
                           
                         $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance_rent,b.opening_balance_collection,b.payment_type_rent,b.payment_type_collection FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2  $sql $sst GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                         
                      
                     }
                     else
                     {
                         
                         

                          $payment_status=$_GET['payment_status'];
                          
                          
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance_rent,b.opening_balance_collection,b.payment_type_rent,b.payment_type_collection FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2  $sql $sst GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                          
                          }
                          else
                          {
                             // $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance_rent,b.opening_balance_collection,b.payment_type_rent,b.payment_type_collection FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2 AND a.paid_status='".$payment_status."'  $sql $sst GROUP BY a.customer_id ORDER BY a.payment_date ASC");

                               $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name,b.opening_balance_rent,b.opening_balance_collection,b.payment_type_rent,b.payment_type_collection FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2  $sql $sst GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                              
                          }
                         
                         
                         
                          
                          
                         
                     }
                    
                     
                     $result=$result->result();  
                 
                     
                     
                     $i=1;
                      $array=array();
                      
                     foreach ($result as  $value) {
                       
                       $party_name="";
                         $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name;
                               
                           }
                       
                       
                                          $bank_name="";
                                         $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                         foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                         }
               
                       
                     
                                          $balance=$value->balance;
                         
                         
                         
                         
                                          $valueset=$value->creditstotal-$value->debitstoatal;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                           $total=round($valueset,2); 
                                           $total=str_replace('-','', $total);



                         
$opening_balance="";
$resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a  WHERE  a.deleteid='0' AND a.party_type=2 AND a.customer_id='".$value->customer_id."' AND payment_date<'".$formdate."'  $sql   ORDER BY a.id DESC");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


  $openingbalance=  $set->totalopeingbalance;

  if($openingbalance>0)
  {
    $opstatus=1;
     $payment_status='CR';
  }
  else
  {
    $opstatus=2;
     $payment_status='DR';
  }
  $opening_balance=abs($openingbalance);

}


if($driver_collection_status==1)
 {
//$this->db->query("UPDATE driver SET payment_type_rent='".$opstatus."',opening_balance_rent='".$opening_balance."' WHERE id='" . $value->customer_id . "'");

 }

 if($driver_collection_status==0)
 {

//$this->db->query("UPDATE driver SET op_status='".$opstatus."',payment_status='".$opstatus."',opening_balance='".$opening_balance."',op='".$opening_balance."' WHERE id='" . $value->customer_id . "'");
 }




              $checktotal=round($value->debitstoatal+$value->creditstotal+$total);

              if($checktotal>0)
              {
                           $done_set='d-none1';
              }
              else
              {
                           $done_set='d-none';
              }
                     

                            $array[] = array(
                            
                            
                            'done_set' => $done_set,
                            'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'customer_id' => $value->customer_id, 
                            'order_id' => $link, 
                            'debits' => round($value->debitstoatal,2),
                            'credits' => round($value->creditstotal,2),
                            'opening_balance' =>$opening_balance,
                            'payment_status'=>$payment_status,
                            'getstatus' => $getstatus,
                            'balance' => round($total,2)
                            
                            
                            
                            

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
                     $output=array();
                     $result= $this->Main_model->where_names($tablename,'id',$id);
                     foreach ($result as  $value) {
                        $output['name'] = $value->name;
                        $output['vehicle_id']= $value->vehicle_id;
                        $output['phone']= $value->phone;
                        $output['status']= $value->status;
                        $output['delivery_fixced']= $value->delivery_fixced;
                        $output['km_base_charge']= $value->km_base_charge;
                        
                        $output['account_heads_id']= $value->account_heads_id;
                        
                        $output['pin']= $value->pin;
                        $output['id']= $value->id;
                        
                     }

                    echo json_encode($output);


    }

      public function save_to_pay()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                    $date= date('Y-m-d');
                    $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     
                     
                      $date=$form_data->payment_date;
                
                     
                     $enteramount=$form_data->enteramount;
                     $payamount=$form_data->payamount;
                     $payment_mode_payoff=$form_data->payment_mode_payoff;
                     $reference_no=$form_data->reference_no;
                     $notes=$form_data->notes;
                     $totalpending=$payamount-$enteramount;
                     $driver_id=$form_data->driver_id;
                     $bankaccount=$form_data->bankaccount;
                     
                        
                   
                     $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$driver_id,'party_type',2,'deleteid','0','id','ASC');
                      
                    
                      $balancetotal=0;
                      $balancetotalddtotal=0;
                      $debitsdd=0;
                      $creditsdd=0;
                      foreach($res as $val)
                      {
                         $payid=$val->id;
                         $order_no=$val->order_no;
                         $amount=$val->amount;
                         $debitsdd+=$val->debits;
                         $creditsdd+=$val->credits;
                         $balancetotal+=$val->balance;
                         
                      }
                                                                       
                          $balancetotal=$creditsdd-$debitsdd;
                                                              
                                                                      
                     
                                                 
                                             $account_head_id=0;
                                             $res = $this->Main_model->where_names('admin_users','define_driver_id',$driver_id);
                                             foreach($res as $val)
                                             {
                                                    $company_name= $val->name;
                                                    $account_head_id=$val->account_heads_id;
                                             }
                     
                     
                                              $account_no="";
                                              $bank_name="";
                                              $bid="";
                                              if($bankaccount!='0')
                                              {
                                                  
                                                     $resbankaccount = $this->Main_model->where_names('bankaccount','id',$bankaccount);
                                             
                                                     foreach($resbankaccount as $valb)
                                                     {
                                                         $bid=$valb->id;
                                                         $bank_name=$valb->bank_name;
                                                         $account_no=$valb->account_no;
                                                         
                                                     }
                                                     
                                                     $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bankaccount,'deleteid','0','id','ASC');

                                                              
                                                                 $bankbalancetotal=0;
                                                                 $bankdebitsamount=0;
                                                                 $bankcreditsamount=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                     $bankpayid=$val->id;
                                                                     $bankdebitsamount+=$val->debit;
                                                                     $bankcreditsamount+=$val->credit;
                                                                     $bankbalancetotal=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $bankbalancetotal=$bankcreditsamount-$bankdebitsamount;
                            
                                                     
                                                        $data_bank['bank_account_id']=$bid;
                                                        $data_bank['ex_code']=$reference_no;
                                                        
                                                        
                                                        
                                                        
                                                        
                                                                         if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=0;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=0;
                                                                          }
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        $data_bank['debit']=$enteramount;
                                                        
                                                        
                                                        
                                                        
                                                        $data_bank['credit']=0;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Driver Payment';
                                                        
                                                        
                                                        if($bid==24)
                                                         {
                                                                     $data_bank['account_head_id']=106;
                                                                     $data_bank['account_heads_id_2']=106;
                                                         }
                                                         elseif($bid==25)
                                                         {
                                                                     $data_bank['account_head_id']=105;
                                                                     $data_bank['account_heads_id_2']=105;
                                                         }
                                                         else
                                                         {
                                                                    
                                                                     $data_bank['account_head_id']=107;
                                                                     $data_bank['account_heads_id_2']=107;
                                                                    
                                                         }
                                                        
                                                        
                                                        $data_bank['user_id']=$this->userid;
                                                        $data_bank['party_type']=4;

                                                         if($bid>0)
                                                         {

                                                        $insertbank=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');

                                                         }





                                                          
                                              }
                                              
                                      
                                     
                     
                     
                     
                     
                     
                     
                              $data_driver['party_type']=2;
                              $data_driver['order_id']=0;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$driver_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['account_head_id']=52;
                              $data_driver['account_heads_id_2']=104;
                              
                              $data_driver['bank_id']=$bankaccount;
                               
                              
                              if($payment_mode_payoff=='Cash')
                              {
                                $data_driver['reference_no']='00000';
                                $data_driver['order_no']='Payout';  
                                $data_driver['cash_trasfer_status']=0;
                              }
                              else
                              {
                                $data_driver['reference_no']=$reference_no;
                                $data_driver['order_no']='Payout';
                                $data_driver['cash_trasfer_status']=1;
                              }
                              
                              
                              $data_driver['amount']=0;
                              
                                
                               if($balancetotal==0)
                               {   
                                                                   $data_driver['balance']=$enteramount;
                               }
                               else
                               {
                                                                   
                                                                   $data_driver['balance']=$balancetotal+$enteramount;
                               }
                              
                            
                             
                             
                              $data_driver['debits']=$enteramount;
                              $data_driver['credits']=0;
                              
                              $data_driver['notes']=$notes;
                              $data_driver['payout']=$enteramount;
                              $data_driver['paid_status']='Paid';
                              $data_driver['process_by']='Payment received By Driver Ledger';



                               if($bid>0)
                               {
                               $data_driver['deletemod']='PE'.$insertbank;
                               $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");
                               }
                      
                       
                              $data_driver['payment_date']=$date;
                              $data_driver['payment_time']=$time;



                              if($driver_id>0)
                              {

                              $this->Main_model->insert_commen($data_driver,$tablename);
                              
                              }
                                                  
                     
                              
                              
                              
                              


    }
    
    
            public function fetch_data_get_ledger_view_total()
    {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                      $todate=$_GET['todate'];
                      $party_type=$_GET['party_type'];
                     
                      $sql="";
                      $sql2="";
                     $sql3="";
                     
                      if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND customer_id='".$customer_id."'";
                                 $sql2.=" AND a.customer_id='".$customer_id."'";
                                $sql3.=" AND a.customer_id='".$customer_id."'";
                         
                        
                     }

                       if(isset($_GET['driver_collection_status']))
                     {
                         
                                      $driver_collection_status=$_GET['driver_collection_status'];

                         
                         
                              $sql.=" AND driver_collection_status='".$driver_collection_status."'";
                              $sql2.=" AND a.driver_collection_status='".$driver_collection_status."'";
                              $sql3.=" AND a.driver_collection_status='".$driver_collection_status."'";
                         
                         
                        
                     
                     }
                     

                      if($formdate!='undefined')
                     {
                           //$sql.=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                           $sql2.=" AND a.payment_date < '".$formdate."'";

                     }


                      $sst="";
                      $sst33="";
                      
                      //$sst3.=" AND a.payment_date <= '".$todate."'";
                     if($party_type==2)
                     {
                               
                              
                              //$sst=" AND payment_date<='".$todate."'";
                              //NEW DATE    
                              
                           

                            $sst=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                            $sst33=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                            
                               
                     }


                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }




                      $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=2   $sql2    ORDER BY a.id DESC");
                     $resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


  $openingbalance=  $set->totalopeingbalance;

  if($openingbalance>0)
  {
    $opstatus=0;
  }
  else
  {
    $opstatus=1;
  }
  $openingbalance=abs($openingbalance);

}


// echo "SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=2 $sst33  $sql3   ORDER BY a.id DESC";
// exit;
 $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type=2 $sst33  $sql3   ORDER BY a.id DESC");
                     $resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


          $balance=  $set->totalopeingbalance;

          if($balance>0)
          {
            $getstatus=0;
          }
          else
          {
            $getstatus=1;
          }
          $balance=abs($balance);

}


// echo "SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=2  $sql $sst ORDER BY id DESC";
// exit;
                     
                     $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=2  $sql $sst ORDER BY id DESC");
                     $result=$result->result();
                               
                    
                 
                      $output=array();
                      
                     foreach ($result as  $value) {
                         
                         
                          
                         
                       $output['totalpayment']= round($value->totaldebit,2);
                       $output['totalpaid']= round($value->totalpaid,2); 
                       $output['totaldebit']= round($value->totaldebit,2); 
                       $output['totalcridit']= round($value->totalcridit,2); 
                       $output['totalblance']= $balance;
                       $output['getstatus']= $getstatus; 
                       $output['getstatus1']= $getstatus; 
                       $output['outstanding']= round($balance,2); 

                       $output['opstatus']= round($opstatus,2);
                       $output['openingbalance']= round($openingbalance,2);
                      
                     }

                    echo json_encode($output);

    }
    
    
    
    
    
        public function fetch_data_get_ledger_view_export()
    {









  
           
                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                      $sql="";
                     if($customer_id>0)
                     {
                         
                        
                         
                              $sql.=" AND customer_id='".$customer_id."'";
                        
                         
                        
                     }

                       if(isset($_GET['driver_collection_status']))
                     {
                         
                       $driver_collection_status=$_GET['driver_collection_status'];

                         
                         
                            $sql.=" AND driver_collection_status='".$driver_collection_status."'";
                         
                         
                        
                     
                     }

                     
                     
                     
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }




                     $todate=$_GET['todate'];
                     $currentdate=date("Y-m-d");
                     if($currentdate==$todate)
                     {

                        $todate=date('Y-12-31');
                     }

                     
                     
                     
                     
                     if($customer_id=='')
                     {
                         
                              $formdate=$this->from_date;
                              $todate=$this->to_date;  
                         
                           $result=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid='".$deleteid."' AND party_type=2 AND `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  ORDER BY payment_date,id ASC");
                           $result=$result->result();  
                      
                     }
                     else
                     {
                         
                          $payment_status=$_GET['payment_status'];
                           
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid='".$deleteid."' AND party_type=2  $sql  ORDER BY payment_date,id ASC");
                              
                          }
                          else
                          {
                             $result=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND paid_status='".$payment_status."'  AND deleteid='".$deleteid."' AND party_type=2 $sql ORDER BY payment_date,id ASC");
                             
                          }
                         
                         
                         
                          $result=$result->result();
                         
                         
                     }
                    
                     
                     
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('driver','id',$customer_id);
                     foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $vehicle_id= $valuess->vehicle_id;
                      $phone= $valuess->phone;
                     
                     
                        
                     }
                  
                         $filename=date('d-m-Y')."driver_ledger"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                         
                           if($phone!='')
                         {
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="10"><?php echo $name; ?></th></tr>
                              <tr><th colspan="10"><?php echo $phone; ?></th></tr>
                              
                             
                          
                         </thead> 
                         
                    </table>
                   <?php
                         }
                    ?>
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                         
                          <th> No</th>
                          <th>Particular</th>
                          <th>Date</th>
                          <th>Chq/Ref.No</th>
                         
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                          <th>Payment Mode</th>
                          <th>Notes</th>
                          <th>User</th>
                        
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                            
                             $resultopeing=$this->db->query("SELECT SUM(credits) as creditstotal,SUM(debits) as debitstotal FROM all_ledgers  WHERE `payment_date` < '".$formdate."'   AND deleteid='".$deleteid."' AND party_type=2 $sql ORDER BY payment_date ASC");
                                         $resultopeing=$resultopeing->result();
                                         $openingbalance=0;
                                         $openingbalancec=0;
                                         $openingbalanced=0;
                                         $openingbalanceval=0;
                                         foreach ($resultopeing as  $valuess)
                                             {
                                                  $credits=$valuess->creditstotal;
                                                  $debits=$valuess->debitstotal;
                                                  $openingbalance=  $credits-$debits;
                                                  
                                                    
                                                                if($openingbalance<0)
                                                                {
                                                                    $getstatus1=1;
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    $getstatus1=0;
                                                                    
                                                                }
                                                                
                                                
                                             }  
                                             
                                             
                                             
                                        if($getstatus1==1)
                                        {
                                            $openingbalanced=$openingbalance;
                                            $openingbalancec=0;
                                        }
                                        else
                                        {
                                             $openingbalanced=0;
                                             $openingbalancec=$openingbalance;
                                        }
                                      
                                          
                                       $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;    
                                      
                                      
                                      
                                      
                                      
                                         $balanceold=array($openingbalance);
                                         foreach ($result as  $value)
                                         {
                                              $credits=$value->credits;
                                              $debits=$value->debits;
                                              $balanceold[]=  $credits-$debits;
                                             
                                         }
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                           $debits_opening= round($openingbalanced,2);
                                           $credits_opening=  round($openingbalancec,2);
                                           $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                                               
                                           if($openingbalance>0)
                                           {
                                                 $credits_opening=$totalvalopeingbalance;
                                                 $debits_opening=0;
                                           }
                                           else
                                           {     
                                                $debits_opening=str_replace("-","",$totalvalopeingbalance);
                                                $credits_opening=0;
                                           }    
                                                             
                                         
                                         
                                         
                                         
                                         ?>
                                     
                                        <tr style="background: #dfdfdf;">
                          
                                          <td>#</td>
                                          <td>Opening Balance</td>
                                          <td><?php echo date('d-m-Y',strtotime($formdate)); ?></td>
                                          <td></td>
                                          
                                       
                                          <td><?php echo $debits_opening; ?></td>
                                          <td><?php echo $credits_opening; ?></td>
                                          <td><?php echo $openingbalance; ?></td>
                                           <td></td>
                                          <td></td>
                                           <td></td>
                                           
                                           
                                          
                                            
                                        </tr>
                                     <?php
                                     
                         
                                      
                                      
                                      $i=2;
                                      $j=1;
                                     foreach ($result as  $value) {
                                         
                                             $account_head_idname="";

                                            $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                                            $result_account_head_text=$result_account_head->result();
                                            
                                           foreach($result_account_head_text as $ass)
                                           {
                                                                      $account_head_idname=$ass->name;
                                                                     
                                           }

                                            if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }
                                             
                                                   $resultventb= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                                      foreach ($resultventb as  $bb) {
                                                          $bank_name= $bb->bank_name; 
                                                      }
                                                      
                                                 
                                                if($driver_collection_status == 0){

                                                    if($value->credits > 0){
                                                         $account_head_idname ="SALES ACCOUNT";
                                                    }else{
                                                         $account_head_idname = "CASH IN HAND";
                                                    }
                                                }

                                                if($driver_collection_status == 1){

                                                    if($value->credits > 0){
                                                         $account_head_idname ="AUTO EXPENSES";
                                                    }
                                                }
                                          
                                                     $resultvent= $this->Main_model->where_names('driver','id',$value->customer_id);
                                                     foreach ($resultvent as  $valuess) {
                                                      
                                                      $name= $valuess->name;
                                                     }




                                       $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }





                                                     
                                              $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                                             
                                             
                                                 $balancetoatal+=$balance;
                                          $payouttoatl+=$value->debits;
                                          $payouttoatlcredits+=$value->credits;




                                              if($value->process_by=='Voucher')
                                              { 
                                                
                                                  $account_head_idname=$value->dummy_customer_name;
                                                 
                                              }
                                         
                                        ?>
                                          <tr >
                          <td><?php echo $j; ?></td>
                                          <td><b><?php echo $account_head_idname; ?></b></td>
                                          <td><?php echo $value->payment_date; ?> <?php echo $value->payment_time; ?></td>
                                          <td><b>"<?php echo $value->order_no; ?>"</b></td>
                                          
                                          
                                          <td><?php echo $value->debits; ?></td>
                                          <td><?php echo $value->credits; ?></td>
                                           <td><?php echo $balance; ?></td>
                                           <td>
                                               
                                               <?php
                                               
                                                      if($value->payment_mode!='Cash')
                                                      {
                                                           echo $value->payment_mode;
                                                           echo "<br>";
                                                           echo  $bank_name;
                                                      }
                                                      else
                                                      {
                                                          echo $value->payment_mode;
                                                         
                                                      }
                                                      
                                               ?>
                                               
                                           </td>
                                           
                                           <td><?php echo $value->notes; ?></td>
                                            <td><?php echo $username_base; ?></td>
                                             
                                        </tr>
                                        
                                        <?php
                                        
                                        
                                        $i++;
                                        $j++;
                                     }
                            
                            ?>
                                
                                
                                   <tr >
                          
                                           <td></td>
                                           <td></td>
                                           
                                           <td></td>
                                           <td></td>
                                           <td><?php echo $payouttoatl; ?></td>
                                            <td><?php echo $payouttoatlcredits; ?></td>
                                          
                                           <td></td>
                                           <td></td>
                                         
                                            
                                        </tr>
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
        public function fetch_data_get_ledger_view_export_group()
    {









  
           
                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate='2022-04-01';
                     
                    
                      $sql="";
                     if($customer_id>0)
                     {
                         
                        
                              $sql.=" AND customer_id='".$customer_id."'";
                       
                        
                     }

                     if(isset($_GET['driver_collection_status']))
                     {
                         
                                      $driver_collection_status=$_GET['driver_collection_status'];

                         
                              $sql.=" AND driver_collection_status='".$driver_collection_status."'";
                            
                     
                     }
                     
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                         
                             $formdate=$this->from_date;
                              $todate=$this->to_date;  
                             
                           
                         $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2  $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                         $result=$result->result();  
                      
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                         
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2  $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                          
                          }
                          else
                          {
                              $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.name FROM all_ledgers as a LEFT JOIN driver as b ON a.customer_id=b.id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=2 AND a.paid_status='".$payment_status."'  $sql GROUP BY a.customer_id ORDER BY a.payment_date ASC");
                              
                          }
                         
                         
                         
                          $result=$result->result();
                          
                         
                     }
                 
                     
                     
                     $i=1;
                      $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('driver','id',$customer_id);
                     foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $vehicle_id= $valuess->vehicle_id;
                      $phone= $valuess->phone;
                     
                     
                        
                     }


                     if($driver_collection_status==1)
                     {
                            $ss="RENT";
                     }
                     else
                     {
                            $ss="COLLECTION";
                     }


                  
                         $filename=date('d-m-Y')."driver_ledger_".$ss; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                         
                           if($phone!='')
                         {
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="6"><?php echo $name; ?></th></tr>
                              <tr><th colspan="6"><?php echo $phone; ?></th></tr>
                              
                             
                          
                         </thead> 
                         
                    </table>
                   <?php
                         }
                    ?>
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                         
                          <th> No</th>
                          <th>Name</th>
                          <th>Opening Balance</th>
                          <th>Debit</th>
                          <th>Credit</th>
                           <th>Balance</th>
                         
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                      $i=1;
                                          
                                     $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;     
                                     foreach ($result as  $value) {
                                         
                                         
                                                   $resultventb= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                                      foreach ($resultventb as  $bb) {
                                                          $bank_name= $bb->bank_name; 
                                                      }
                                                  
                                          
                                                     $resultvent= $this->Main_model->where_names('driver','id',$value->customer_id);
                                                     foreach ($resultvent as  $valuess) {
                                                      
                                                      $name= $valuess->name;
                                                     }
                                             $balance=$value->balance;
                                             
                                             
                                                 $balancetoatal+=round($value->creditstotal-$value->debitstoatal,2);
                                          $payouttoatl+=$value->debitstoatal;
                                          $payouttoatlcredits+=$value->creditstotal;



     $opening_balance="";

                            if($driver_collection_status==1)
                            {
                                       

                                       $opening_balance=$value->opening_balance_rent;
                                          $payment_status="";
                                            if($value->payment_type_rent==1)
                                            {
                                                $payment_status='CR';
                                            }
                                            if($value->payment_type_rent==2)
                                            {
                                            $payment_status='DR';   
                                            }


                            }   


                              if($driver_collection_status==0)
                            {


                                $opening_balance=$value->opening_balance_collection;

                                            $payment_status="";
                                            if($value->payment_type_collection==1)
                                            {
                                                $payment_status='CR';
                                            }
                                            if($value->payment_type_collection==2)
                                            {
                                               $payment_status='DR';   
                                            }


                            }                    


                                         
                                        ?>
                                          <tr >
                          <td><?php echo $i; ?></td>
                                          <td><b><?php echo $ss; ?> - <?php echo $name; ?></b></td>
                                          
                                           <td><?php echo $opening_balance; ?> <?php echo $payment_status; ?></td>
                                         
                                          <td><?php echo round($value->debitstoatal,2); ?></td>
                                          <td><?php echo round($value->creditstotal,2); ?></td>
                                            <td><?php echo round($value->creditstotal-$value->debitstoatal,2); ?></td>
                                        
                                            
                                        </tr>
                                        
                                        <?php
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                                
                                
                                   <tr >
                          
                                           <td></td>
                                           <td></td>
                                            <td></td>
                                           
                                           <td><?php echo $payouttoatl; ?></td>
                                            <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo $balancetoatal; ?></td>
                                          
                                          
                                            
                                        </tr>
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

    }
    
    
    
    
    

    

}   
