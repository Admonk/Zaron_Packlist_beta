<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

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
   
    public function route()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'route';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/route.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

    public function zone()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['state']= $this->Main_model->where_names('state','deleteid','0');
                                             $data['active_base']='zone';
                                             $data['active']='zone';
                                             $data['title']    = 'zone';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/zone.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }


     public function state()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='state';
                                             $data['active']='state';
                                             $data['title']    = 'state';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/state.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
    
    
        public function locality()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['route']= $this->Main_model->where_names('route','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Locality';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/locality.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }



    
        public function taluk()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['state']= $this->Main_model->where_names('state','deleteid','0');
                                             $data['district']= $this->Main_model->where_names('district','deleteid','0');
                                             $data['active_base']='taluk';
                                             $data['active']='taluk';
                                             $data['title']    = 'Taluk';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/city.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }


       public function district()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['state']= $this->Main_model->where_names('state','deleteid','0');
                                             $data['active_base']='District';
                                             $data['active']='District';
                                             $data['title']    = 'District';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/district.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }


    
    
    
        public function driver_charge_fixed()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['route']= $this->Main_model->where_names('route','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Charges';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/driver_charge_fixed.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    public function sales_group()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                            
                                             $data['sales_user_type'] = $this->Main_model->where_names_two_order_by('admin_users','access','16','deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Group';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/sales_group.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function user_group()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'User Group';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/user_group.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
        public function menu_permission()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Menu Permission';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/menu_permission.php',$data);
                                              

                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }

        public function menu_permission_user()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Menu Permission User';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('group/menu_permission_user.php',$data);
                                              

                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    public function insertandupdate()
    {

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                $tablename=$form_data->tablename;
                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->name!='')
                     {

                     $tablename=$form_data->tablename;
                     $data['name']=$form_data->name;
                     
                     if(isset($form_data->route_id))
                     {
                                $data['route_id'] = $form_data->route_id;
                     }


                      if(isset($form_data->district_id))
                     {
                                $data['district_id'] = $form_data->district_id;
                     }
                     
                     
                     if($tablename=='sales_group')
                     {
                         $data['sales_group_head'] = $form_data->sales_group_head;
                     }
                     
                     
                     $this->Main_model->insert_commen($data,$tablename);

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 
                  if($form_data->action=='menu_save')
                 {
                     
                     if($form_data->sub_menu!='')
                     {
                             $this->db->query("DELETE FROM menu_primary_save  WHERE group_id='" . $form_data->id . "'");
                             $this->db->query("DELETE FROM $tablename  WHERE group_id='" . $form_data->id . "'");
                            
                            $tablename=$form_data->tablename;
                            $data['group_id']=$form_data->id;
                            $names=explode('|', $form_data->sub_menu);
                            for($i=0; $i <count($names) ; $i++) {
                            $data['sub_menu_id']=$names[$i];
                            $this->Main_model->insert_commen($data,$tablename);
                            }
                            
                            $datas['group_id']=$form_data->id;
                            $namess=explode('|', $form_data->primary_menu);
                            for($i=0; $i <count($namess) ; $i++) {
                            $datas['sub_menu_id']=$namess[$i];
                            $this->Main_model->insert_commen($datas,'menu_primary_save');
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
                       $data['name']=$form_data->name;
                       
                       if(isset($form_data->route_id))
                       {
                                $data['route_id'] = $form_data->route_id;
                       }

                        if(isset($form_data->district_id))
                         {
                                    $data['district_id'] = $form_data->district_id;
                         }
                       
                         if($tablename=='sales_group')
                         {
                             $data['sales_group_head'] = $form_data->sales_group_head;
                         }
                       
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

                     
                                $deletelog['userid']=$this->userid; 
                                $deletelog['all_legers']='Internal user ID : '.$id;
                                $deletelog['bank_legers']='Internal Deleted';
                                $this->Main_model->insert_commen($deletelog,'deleted_log');


                 }
                
                


    }

    public function insertandupdate_user()
    {

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                $tablename=$form_data->tablename;
                if($form_data->action=='menu_save')
                 {
                     
                     if($form_data->sub_menu!='')
                     {


                             $this->db->query("DELETE FROM menu_primary_save_user  WHERE user_id='" . $form_data->id . "'");
                             $this->db->query("DELETE FROM $tablename  WHERE user_id='" . $form_data->id . "'");
                            
                            $tablename=$form_data->tablename;
                            $data['user_id']=$form_data->id;
                            $names=explode('|', $form_data->sub_menu);
                            $check_edit=explode('|', $form_data->check_edit);
                            $check_delete=explode('|', $form_data->check_delete);
                            for($i=0; $i <count($names) ; $i++) {
                            $data['sub_menu_id']=$names[$i];

                            if($names[$i]==$check_edit[$i])
                            {
                                $data['check_edit']=1;
                            }
                            else
                            {
                                $data['check_edit']=0;
                            }


                            if($names[$i]==$check_delete[$i])
                            {
                                $data['check_delete']=1;
                            }
                            else
                            {
                                $data['check_delete']=0;
                            }



                            $this->Main_model->insert_commen($data,$tablename);
                            }
                            
                            $datas['user_id']=$form_data->id;
                            $namess=explode('|', $form_data->primary_menu);
                            for($i=0; $i <count($namess) ; $i++)
                            {
                            $datas['sub_menu_id']=$namess[$i];
                            $this->Main_model->insert_commen($datas,'menu_primary_save_user');
                            }
                            
                        
                     
                    

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                
                


    }
    public function insertandupdate_locality()
    {

                 $form_data = json_decode(file_get_contents("php://input"));
                 

                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->name!='')
                     {

                     $tablename=$form_data->tablename;
                     
                     
                     $data['route_id'] = $form_data->route_id;
                     
                     
                     $name=explode(',', $form_data->name);
                     
                     for($i=0;$i<count($name);$i++)
                     {
                           $data['name']=$name[$i];
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
                       $data['name']=$form_data->name;
                       
                       if(isset($form_data->route_id))
                       {
                                $data['route_id'] = $form_data->route_id;
                       }
                       
                         if($tablename=='sales_group')
                         {
                             $data['sales_group_head'] = $form_data->sales_group_head;
                         }
                       
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
    
    
    
    
    
    
    
    
    
    
    public function insertandupdate_charges()
    {

                 $form_data = json_decode(file_get_contents("php://input"));
                 

                 if($form_data->action=='Add')
                 {
                     
                     if($form_data->fixed_km!='')
                     {

                     $tablename=$form_data->tablename;
                     
                     
                     $data['fixed_km'] = $form_data->fixed_km;
                     $data['fixed_km_from'] = $form_data->fixed_km_from;
                     $data['fixed_charge'] = $form_data->fixed_charge;
                    
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

                    if($form_data->fixed_km!='')
                     {
                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['fixed_km'] = $form_data->fixed_km;
                        $data['fixed_km_from'] = $form_data->fixed_km_from;
                       $data['fixed_charge'] = $form_data->fixed_charge;
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


                     $result= $this->Main_model->where_names('route','deleteid','0');
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

      public function fetch_data_zone()
    {


                     $result= $this->Main_model->where_names('zone','deleteid','0');
                     $data=array();
                    $i=1;
                     foreach ($result as  $value) {


                                  $routename="";
                                  $resultroute= $this->Main_model->where_names('state','id',$value->route_id);
                                 
                                  foreach($resultroute as $er)
                                  {
                                      $routename=$er->name;
                                  }
                         
                     
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            'state_id' => $routename, 
                            
                            'name' => $value->name, 
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }
    


     public function fetch_data_state()
    {


                     $result= $this->Main_model->where_names('state','deleteid','0');
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
    
    
    
    
        public function fetch_data_route()
    {


                     $result= $this->Main_model->where_names('locality','deleteid','0');
                     $data=array();
                    $i=1;
                     foreach ($result as  $value) {
                         
                                  $routename="";
                                  $resultroute= $this->Main_model->where_names('route','id',$value->route_id);
                                 
                                  foreach($resultroute as $er)
                                  {
                                      $routename=$er->name;
                                  }
                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            'route_id' =>$routename, 
                            'name' => $value->name, 
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }



        public function fetch_data_city()
    {


                     $result= $this->Main_model->where_names('city','deleteid','0');
                     $data=array();
                    $i=1;
                     foreach ($result as  $value) {
                         
                                  $routename="";
                                  $resultroute= $this->Main_model->where_names('state','id',$value->route_id);
                                 
                                  foreach($resultroute as $er)
                                  {
                                      $routename=$er->name;
                                  }


                                   $district_name="";
                                  $district= $this->Main_model->where_names('district','id',$value->district_id);
                                 
                                  foreach($district as $er)
                                  {
                                      $district_name=$er->name;
                                  }
                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            'route_id' =>$routename, 
                            'district_id' =>$district_name, 
                            'name' => $value->name, 
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }


    
        public function fetch_data_district()
    {


                     $result= $this->Main_model->where_names('district','deleteid','0');
                     $data=array();
                    $i=1;
                     foreach ($result as  $value) {
                         
                                  $routename="";
                                  $resultroute= $this->Main_model->where_names('state','id',$value->route_id);
                                 
                                  foreach($resultroute as $er)
                                  {
                                      $routename=$er->name;
                                  }
                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            'route_id' =>$routename, 
                            'name' => $value->name, 
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }




        public function fetch_data_charges()
    {


                     $result= $this->Main_model->where_names('driver_charge_fixed','deleteid','0');
                     $data=array();
                     $i=1;
                     foreach ($result as  $value) 
                     {
                         
                                 
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            'fixed_charge' =>$value->fixed_charge, 
                            'fixed_km' => $value->fixed_km, 
                            'fixed_km_from' => $value->fixed_km_from, 
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }

    public function fetch_data_sales_group()
    {


                     $result= $this->Main_model->where_names('sales_group','deleteid','0');
                     $data=array();
                    $i=1;
                     foreach ($result as  $value) {
                         
                         
                          
                            $sales_user_type = $this->Main_model->where_names_two_order_by('admin_users','id',$value->sales_group_head,'deleteid','0','id','ASC');
                            foreach($sales_user_type as $vv)
                            {
                                $value->sales_group_head=$vv->name;
                            }
                                            
                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i,
                            
                            'sales_group_head' => $value->sales_group_head, 

                            'id' => $value->id, 
                            
                            'name' => $value->name, 
                            

                        );
                        
                        $i++;
                     }
                    echo json_encode($data);

    }
     public function fetch_data_user_group()
    {


                     $result= $this->Main_model->where_names('user_group','deleteid','0');
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
    
    
    public function fetch_data_user_group_menu()
    {
                     $group_id=0;
                     if(isset($_GET['group_id']))
                     {
                         $group_id=$_GET['group_id'];
                     }
                     $result=$this->db->query("SELECT * FROM `menu_group`  WHERE deleteid='0' ORDER BY id ASC");
                     $result=$result->result(); 
                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value) {
                         
                         $array=array();
                         $result_sub=$this->db->query("SELECT * FROM `menu_sub_list`  WHERE deleteid='0' AND menu_group_id='".$value->id."' ORDER BY id ASC");
                         $resultsub=$result_sub->result(); 
                          foreach ($resultsub as  $valuesub) {
                              
                                                  $checked=0;    
                                                    $result_sub_check=$this->db->query("SELECT * FROM `menu_save`  WHERE  sub_menu_id='".$valuesub->id."' ORDER BY id ASC");
                                                    $result_sub_check=$result_sub_check->result();
                                                    foreach ($result_sub_check as  $ch) {
                                                       if($group_id==$ch->group_id) 
                                                       {
                                                           $checked=1;  
                                                       }
                                                        
                                                    }
                                         
                                         
                                         
                                         
                              
                              
                              $array[]=array(
                                  'sub_id'=>$valuesub->id,
                                  'sub_menu'=>$valuesub->sub_menu,
                                  'menu_group_id'=>$valuesub->menu_group_id,
                                  'link'=>$valuesub->link,
                                  'checked'=>$checked
                                  
                                  );
                          }
                          
                          
                          
                          
                                                    $checkedset=0;    
                                                    $result_sub_check=$this->db->query("SELECT * FROM `menu_primary_save`  WHERE  sub_menu_id='".$value->id."' ORDER BY id ASC");
                                                    $result_sub_check=$result_sub_check->result();
                                                    foreach ($result_sub_check as  $ch) {
                                                       if($group_id==$ch->group_id) 
                                                       {
                                                           $checkedset=1;  
                                                       }
                                                        
                                                    }
                                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'checked'=>$checkedset,
                            'sub_menu' => $array
                            
                            

                        );
                        
                        $i++;
                     }

                    echo json_encode($data);

    }




     public function fetch_data_user_group_menu_user()
    {
                     $user_id=0;
                     if(isset($_GET['user_id']))
                     {
                         $user_id=$_GET['user_id'];
                     }
                     $result=$this->db->query("SELECT * FROM `menu_group`  WHERE deleteid='0' ORDER BY id ASC");
                     $result=$result->result(); 
                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value) {
                         
                         $array=array();
                         $result_sub=$this->db->query("SELECT * FROM `menu_sub_list`  WHERE deleteid='0' AND menu_group_id='".$value->id."' ORDER BY id ASC");
                         $resultsub=$result_sub->result(); 
                          foreach ($resultsub as  $valuesub) {


                              
                                                    $checked=0;  
                                                   $check_edit=0;
                                                    $check_delete=0;  

            

              $base_sub=$this->db->query("SELECT * FROM `menu_save_user`  WHERE   user_id='".$user_id."'  ORDER BY id ASC");
              $base_sub=$base_sub->result();

             $result_sub_check=$this->db->query("SELECT * FROM `menu_save_user`  WHERE  sub_menu_id='".$valuesub->id."' AND user_id='".$user_id."'  ORDER BY id ASC");
             $result_sub_check=$result_sub_check->result();



                                                    foreach ($result_sub_check as  $ch) {
                                                       
                                                           $checked=1;  

                                                             $check_edit=$ch->check_edit;
                                                             $check_delete=$ch->check_delete;

                                                        
                                                    }


                                    $sales_user_type = $this->Main_model->where_names_two_order_by('admin_users','id',$user_id,'deleteid','0','id','ASC');
                                    foreach($sales_user_type as $vv)
                                    {
                                        $group_id=$vv->access;
                                    }    


                                          if(count($base_sub)==0) 
                                          {



                    $result_sub_check=$this->db->query("SELECT * FROM `menu_save`  WHERE  sub_menu_id='".$valuesub->id."' AND  group_id='".$group_id."' ORDER BY id ASC");
                                                        $result_sub_check=$result_sub_check->result();
                                                        foreach ($result_sub_check as  $ch)
                                                         {
                                                          
                                                               $checked=1;  
                                                           
                                                            
                                                        }



                                          }         
                                         
                                         
                                         
                                         
                              
                              
                              $array[]=array(
                                  'sub_id'=>$valuesub->id,
                                  'sub_menu'=>$valuesub->sub_menu,
                                  'menu_group_id'=>$valuesub->menu_group_id,
                                  'link'=>$valuesub->link,
                                  'checkedv'=>$checked,
                                  'check_edit'=>$check_edit,
                                  'check_delete'=>$check_delete
                                  
                                  );
                          }
                          
                          
                          
                          
                                                  



            $base_main=$this->db->query("SELECT * FROM `menu_primary_save_user`  WHERE   user_id='".$user_id."' ORDER BY id ASC");
            $base_main=$base_main->result();





            $checkedset=0;
            $result_sub_check=$this->db->query("SELECT * FROM `menu_primary_save_user`  WHERE  sub_menu_id='".$value->id."' AND user_id='".$user_id."' ORDER BY id ASC");
            $result_sub_check=$result_sub_check->result();
            foreach ($result_sub_check as  $ch) 
            {
                                                       
                 $checkedset=1;  
                                                        
            }




            



                                                     if(count($base_main)==0) 
                                                     {





                                                             $result_sub_check=$this->db->query("SELECT * FROM `menu_primary_save`  WHERE  sub_menu_id='".$value->id."' AND  group_id='".$group_id."' ORDER BY id ASC");
                                                            $result_sub_check=$result_sub_check->result();
                                                            foreach ($result_sub_check as  $ch) {
                                                              
                                                                   $checkedset=1;  
                                                               
                                                                
                                                            }


                                                    }
                                         
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'checked'=>$checkedset,
                            'sub_menu' => $array
                            
                            

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
                        if(isset($value->route_id))
                        {
                                $output['route_id'] = $value->route_id;
                        }
                         if(isset($value->district_id))
                        {
                                $output['district_id'] = $value->district_id;
                        }
                        if(isset($value->sales_group_head))
                        {
                                $output['sales_group_head'] = $value->sales_group_head;
                        }
                        
                     }

                    echo json_encode($output);


    }
    
    public function fetch_single_data_charges()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $result= $this->Main_model->where_names($tablename,'id',$id);
                     foreach ($result as  $value) {
                        $output['fixed_charge'] = $value->fixed_charge;
                        $output['fixed_km'] = $value->fixed_km;
                        $output['fixed_km_from'] = $value->fixed_km_from;
                        
                        
                     }

                    echo json_encode($output);


    }
    
     public function exportlocality()
    {
       
       
                           $result=$this->db->query("SELECT a.name as locality_name,b.name as route_name FROM `locality` as a JOIN route as b ON a.route_id=b.id WHERE a.deleteid='0' ORDER BY b.name ASC");
                           $result=$result->result(); 
                           
                           
                         $filename="locality_name_list"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                           
                           ?>
                           
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th>No</th>
                          <th>Route name</th>
                          <th>Locality Name</th>
                         
            
                        </tr>
                      </thead>
                      
                       <tbody>
                            
                            <?php
                                         
                                    
                                      
                                         $i=0;
                                     foreach ($result as  $value) {
                                         
                                         
                                         
                         
                                         
                                        ?>
                                          <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $value->route_name; ?> </td>
                                          <td><?php echo $value->locality_name; ?></td>
                                         
                                            
                                          </tr>
                                        
                                        <?php
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        $i++;
                                     }
                            
                            ?>
                      
                        
                        <tr >
                          
                                          
                                            
                                        </tr>
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                      
                      
                           <?php
       
    }


}   
