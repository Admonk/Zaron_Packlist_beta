<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Additional_information extends CI_Controller {

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
                                            
                                             $data['grouping']=$this->Main_model->where_names('grouping','deleteid','0');
                                             
                                           
                                             
                                             $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','categories','ASC');
                                            
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Additional information';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('additional_information/index.php',$data);


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
                     
                     if($form_data->label_name!='')
                     {

                     $tablename=$form_data->tablename;
                     $label_name=str_replace(' ','', $form_data->label_name);
                     $data['label_name']= str_replace(' ','', $form_data->label_name);
                     $data['type']=$form_data->type;
                     $data['option']=$form_data->option;
                     $data['grouping']=$form_data->grouping;
                     $data['heading']=$form_data->heading;
                     
                     
                     if(isset($form_data->required))
                     {
                         $data['required']=$form_data->required;
                     }
                     
                     
                     if(isset($form_data->category_id))
                     {
                         $data['category_id']=$form_data->category_id;
                     }
                    
                    if(isset($form_data->sort_order_id))
                     {
                         $data['sort_order_id']=$form_data->sort_order_id;
                     }
                    
                    if($form_data->grouping=='2')
                    {
                        
                        
                                $table="order_product_list";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE   order_product_list  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                                    $this->db->query("ALTER TABLE   order_product_list_process  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                                    $this->db->query("ALTER TABLE   order_product_list_quotation  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                            $this->db->query("ALTER TABLE   order_product_list_process_return_temp  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");       
                                }
                    
                    
                    }
                    
                    
                     if($form_data->grouping=='1')
                    {
                                $table="product_list";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE product_list  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                     if($form_data->grouping=='3')
                    {
                                $table="customers";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE customers  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    if($form_data->grouping=='4')
                    {
                                $table="manual_journals";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE manual_journals  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                      if($form_data->grouping=='5')
                    {
                                $table="voucher";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE voucher  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    if($form_data->grouping=='7')
                    {
                                $table="bank_deposit";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE bank_deposit  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    
                        if($form_data->grouping=='6')
                    {
                                $table="payment_received";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE payment_received  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    
                    
                    
                     
                    
                                               
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

                    if($form_data->label_name!='')
                     {
                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                       $data['label_name']=$form_data->label_name;
                       $data['type']=$form_data->type;
                       $data['option']=$form_data->option;
                       $data['grouping']=$form_data->grouping;
                       $data['heading']=$form_data->heading;

                             $label_name=$form_data->label_name;
                             

                      

                    if($form_data->grouping=='2')
                    {
                        
                        
                                $table="order_product_list";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE   order_product_list  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                                    $this->db->query("ALTER TABLE   order_product_list_process  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                                    $this->db->query("ALTER TABLE   order_product_list_quotation  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");
                                            $this->db->query("ALTER TABLE   order_product_list_process_return_temp  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `cul`");       
                                }
                    
                    
                    }
                    
                    
                     if($form_data->grouping=='1')
                    {
                                $table="product_list";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE product_list  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                     if($form_data->grouping=='3')
                    {
                                $table="customers";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE customers  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    if($form_data->grouping=='4')
                    {
                                $table="manual_journals";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE manual_journals  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                      if($form_data->grouping=='5')
                    {
                                $table="voucher";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE voucher  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    if($form_data->grouping=='7')
                    {
                                $table="bank_deposit";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE bank_deposit  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                    
                    
                        if($form_data->grouping=='6')
                    {
                                $table="payment_received";
            
                                if($this->db->field_exists(strtolower(trim($label_name)), $table))
                                {
                                   //echo 1;
                                }
                                else
                                {
                                    
                                    $this->db->query("ALTER TABLE payment_received  ADD `".strtolower(trim($label_name))."` VARCHAR(100) NULL DEFAULT NULL AFTER `deleteid`");
                                   
                                }
                        
                    }
                    
                       
                       
                         if(isset($form_data->category_id))
                         {
                             $data['category_id']=$form_data->category_id;
                         }
                         
                          if(isset($form_data->required))
                     {
                         $data['required']=$form_data->required;
                     }
                           
                           
                         if(isset($form_data->sort_order_id))
                         {
                             $data['sort_order_id']=$form_data->sort_order_id;
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
    public function fetch_data()
    {

                  
                  
                     $grouping=  $_GET['grouping'];
                     
                     if($grouping==0)
                     {
                         $result= $this->Main_model->where_names('additional_information','deleteid','0');
                     }
                     else
                     {
                         $result = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', $grouping, 'deleteid', 0, 'id', 'ASC');
                     }
                     
                     
                      
                     
                     
                     $data=array();
                     $i=1;
                     foreach ($result as  $value) {
                     
                                 $grouping=$this->Main_model->where_names('grouping','id',$value->grouping);
                                 foreach($grouping as $vl)
                                 {
                                     $groupingname=$vl->name;
                                 }
                                 
                                 $category="";
                                  $groupingc=$this->Main_model->where_names('categories','id',$value->category_id);
                                 foreach($groupingc as $vlc)
                                 {
                                     $category=$vlc->categories;
                                 }
                                          
                        
                     
                        
                        if($value->required==0)
                        {
                             $required="No";
                        }
                        else
                        {
                            $required="Yes";
                        }
                     
                     
                            $data[] = array(
                                
                                
                            'no' => $i, 

                            'id' => $value->id, 
                            
                            'label_name' => $value->label_name, 
                            'category' => $category, 
                            'required' => $required, 
                            'sort_order_id' => $value->sort_order_id, 
                            'type' => $value->type, 
                            'heading' => $value->heading, 
                            'option' => $value->option, 
                            'grouping' => $groupingname, 
                            

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
                        $output['label_name'] = $value->label_name;
                        $output['type'] = $value->type;
                        $output['option'] = $value->option;
                        $output['grouping'] = $value->grouping;
                        $output['heading'] = $value->heading;
                        $output['category_id'] = $value->category_id;
                        $output['required'] = $value->required;
                        $output['sort_order_id'] = $value->sort_order_id;
                     
                        
                     }

                    echo json_encode($output);


    }
    



}   
