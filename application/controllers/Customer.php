<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('memory_limit', '4400M');

class Customer extends CI_Controller {

  function __construct() {


             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Users_model');
             if(isset($this->session->userdata['logged_in'])){
             $sess_array =$this->session->userdata['logged_in'];
         $userid=$sess_array['userid'];
         $email=$sess_array['email'];
         $from_date=$sess_array['from_date'];
         $to_date=$sess_array['to_date'];
         $this->from_date=$from_date;
         $this->to_date=$to_date;

         $this->userid=$userid;
         $this->user_mail=$email;
         profile($this->user_mail);
      }


      
    }
    
    
     public function customersearch() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Customer Overview';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('customer/customer_overview_search', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
     public function ToObject($Array) {
     
    // Create new stdClass object
    $object = new stdClass();
     
    // Use loop to convert array into
    // stdClass object
    foreach ($Array as $key => $value) {
        if (is_array($value)) {
            $value = ToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
    }
    
    
  public function customer_add()
  {
        
                                  

                      if(isset($this->session->userdata['logged_in']))
                      {


                               $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                               $data['userid'] = $this->userid;         
                               $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                               $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');

$data['driver'] = $this->Main_model->where_names('driver','id!=','0');
 $data['accountheads'] = $this->Main_model->where_names('accountheads','id!=','0');

                               $customers_last_id= $this->Main_model->order_last_count_customer('customers');
                               $customers_last_id_set=$customers_last_id[0]->customer_id;
                               
                               $data['customers_last_id']=$customers_last_id_set+1;
                               $data['virtual_accountno']='ZARON0'.$data['customers_last_id'];



                                $data['zone'] = $this->Main_model->where_names('zone','deleteid','0');
                                $data['state'] = $this->Main_model->where_names('state','deleteid','0');
                                $data['city'] = $this->Main_model->where_names('city','deleteid','0');
                                $data['district'] = $this->Main_model->where_names('district','deleteid','0');
                             
                             
                             
                             $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                      
                                              if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                    
                                                     $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         
                                                       if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                         
                                                          if($value->deleteid==0)
                                                         {
                                                             if($value->status==1)
                                                              { 
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));
                                                              }
                                                         
                                                         }
                                                         
                                                         
                                                       }
                                                       
                                                         
                                                         
                                                     }
                       
                                              }
                                               elseif($this->session->userdata['logged_in']['access']=='12')
                                             {
                                                    
                                                     $sales_head = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                     foreach($sales_head as $value)
                                                     {
                                                         
                                                       if($value->deleteid==0)
                                                         {
                                                              if($value->status==1)
                                                              { 





                                                                  $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));






                                                              }
                                                             
                                                         
                                                         }
                                                       
                                                         
                                                         
                                                     }
                       
                                              }
                                              else
                                              {
                                                   $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                            if($value->status==1)
                                                              { 
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));
                                                              }
                                                             
                                                         
                                                         }
                                                     }
                        
                                              }
                             
                             
                             
                             
                            $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                                                          
                               
                               
                             $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
        $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','sort_order_id','ASC');
        
        $heading[]=array();
        foreach ($data['additional_information'] as  $value)
        {
             
            $heading[]=$value->heading;

        }

        $heading=array_unique($heading);
        $heading=implode(',', $heading);
        $heading=explode(',', $heading);

       
        foreach ($data['additional_information'] as  $value)
        {
             
             if(in_array($value->heading, $heading))
             {


                       $setion[$value->heading][] = array(
                      
                        'id' =>$value->id,
                        'label_name' =>$value->label_name,
                        'category_id' =>$value->category_id,
                        'type' =>$value->type,
                        'option' =>$value->option,
                        'heading' =>$value->heading,
                        'grouping' =>$value->grouping,
                        'multiselect' =>$value->multiselect,
                        'box_hide' =>$value->box_hide,
                        'required' =>$value->required,
                        'deleteid' =>$value->deleteid,
                        'sort_order_id' =>$value->sort_order_id,
                        'date_update' =>$value->date_update

                      );



              }   

        }


        
// foreach ($setion as $key => $value) {
//     echo "<h1>".$key."</h1>";
    
//     foreach ($value as $subItem) {
//         echo $subItem['label_name'];
//         echo "<br>";
//     }
    
   
// }


$data['setion']=$setion;
       // // echo "<pre>";print_r($setion);
       //  exit;
                                           
                             
                             $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                             
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Add';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_add',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }

  }

  public function customer_list_verification()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['option']='';
                               $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
                               
                               foreach($additional_information as $val)
                               {
                                   $data['option']=explode(',', $val->option);
                               }
                               
                               
                               
                               
                               
                               
                               
                               
                          if($this->session->userdata['logged_in']['access']=='11')
                          {       
                                                     $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {

                                                             if($value->define_saleshd_id==$this->userid)
                                                             {
                                                             
                                                                    $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));

                                                              }
                                                         
                                                         }
                                                     }

                          }
                          else
                          {

                               
                                                    $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                         
                                                         }
                                                     }
                          }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                   $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                   $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                   $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                   $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer List Verification';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_list_verification',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
 public function customer_list_verification_rejected()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['option']='';
                               $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
                               
                               foreach($additional_information as $val)
                               {
                                   $data['option']=explode(',', $val->option);
                               }
                               
                               
                               
                               
                               
                               
                               
                               
                          if($this->session->userdata['logged_in']['access']=='11')
                          {       
                                                     $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {

                                                             if($value->define_saleshd_id==$this->userid)
                                                             {
                                                             
                                                                    $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));

                                                              }
                                                         
                                                         }
                                                     }

                          }
                          else
                          {

                               
                                                    $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                         
                                                         }
                                                     }
                          }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                   $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                   $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                   $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                   $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'New Customers Rejected List';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_list_verification_rejected',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }

  public function customer_edit($id)
  {
        
                        
                                  

 if(isset($this->session->userdata['logged_in']))
                      {



                               $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                               $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                               $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                               $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                             $data['admin_users'] = $this->Main_model->where_names('admin_users','deleteid','0');
                                       $data['driver'] = $this->Main_model->where_names('driver','id!=','0');
 $data['accountheads'] = $this->Main_model->where_names('accountheads','id!=','0');      
                                $data['zone'] = $this->Main_model->where_names('zone','deleteid','0');
                                $data['state'] = $this->Main_model->where_names('state','deleteid','0');
                                $data['city'] = $this->Main_model->where_names('city','deleteid','0');
                                $data['district'] = $this->Main_model->where_names('district','deleteid','0');


                   $result= $this->Main_model->where_names('customers','id',$id);
                   
                   if(count($result)==0)
                   {
                            echo "Customer Data Not Found";
                            exit;
                   }
                   
                   foreach ($result as  $value) {

                 
                      $data['approved_status']= $value->approved_status;

                    }

  $data['customer_emergency_details'] = $this->Main_model->where_names('customer_emergency_details','customer_id',$id);
  $data['customer_greetings_details'] = $this->Main_model->where_names('customer_greetings_details','customer_id',$id);    

 $query_address = $this->db->query("SELECT * FROM customer_location_save  WHERE customer_id='" . $id . "' GROUP BY latitude  ORDER BY id DESC");
 $data['customer_location_save'] = $query_address->result();

 $customer_exe = $this->db->query("SELECT * FROM customer_exe_update_version  WHERE customer_id='" . $id . "' AND deviceName!='0' GROUP BY deviceName  ORDER BY id DESC LIMIT 10");
 $data['customer_exe_update_version'] = $customer_exe->result();

               $query = $this->db->query("SELECT a.*,b.gst_status as gststatus,b.gst FROM customers_adddrss as a LEFT JOIN customers as b ON a.customer_id=b.id WHERE a.customer_id='" . $id . "' AND a.deleteid = 0 AND b.deleteid = 0 ORDER BY a.id DESC");
          $data['shipping_address_details'] = $query->result();




                                              $array = array(); // Initialize the outer array

                                              $customer_from = $this->Main_model->where_names_two_order_by('customer_inter_link','customer_from',$id ,'deleteid','0','id','ASC');
                                              foreach ($customer_from as $value) {
                                                  // Create an inner array for each customer
                                                  $customerData = array(
                                                      'id' => $value->customer_to,
                                                      'name' => $value->customer_to_name
                                                  );
                                                  
                                                  // Append the inner array to the outer array using array union operator
                                                  $array[] = $customerData;
                                              }

                                              $customer_to = $this->Main_model->where_names_two_order_by('customer_inter_link','customer_to',$id ,'deleteid','0','id','ASC');
                                              foreach ($customer_to as $value) {
                                                  // Create an inner array for each customer
                                                  $customerData = array(
                                                      'id' => $value->customer_from,
                                                      'name' => $value->customer_from_name
                                                  );
                                                  
                                                  // Append the inner array to the outer array using array union operator
                                                  $array[] = $customerData;
                                              }

                                              // Now, $array contains the desired data structure with appended records

                                              $data['customer_link'] = $array;               
                                             
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                      
                        if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                    
                                                     $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         
                                                       if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                         
                                                          if($value->deleteid==0)
                                                         {
                                                             if($value->status==1)
                                                              { 
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));
                                                              }
                                                         
                                                         }
                                                         
                                                         
                                                       }
                                                       
                                                         
                                                         
                                                     }
                       
                                              }
                                              elseif($this->session->userdata['logged_in']['access']=='12')
                                              {
                                                  
                                                      $sales_head = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                      foreach($sales_head as $value)
                                                      {
                                                         if($value->deleteid==0)
                                                         {
                                                             if($value->status==1)
                                                              { 
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));
                                                              }
                                                         
                                                         }
                                                      }
                                                      
                                              }
                                              else
                                              {
                                                   $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             if($value->status==1)
                                                              { 
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name,'status'=>$value->status));
                                                              }
                                                         
                                                         }
                                                     }
                        
                                              }
                             
                             
                                             
                                             
         $customer_data= $this->Main_model->where_names_two_order_by('customers','id',$id
          ,'deleteid','0','id','ASC');
          foreach ($customer_data as $ss) {  
             $data['zone_val']=$ss->zone;
              $data['state_val']=$ss->state;
              $data['district_val']=$ss->district;
              $data['city_val']=$ss->city;
          }
  
                                             
                                             
                                             
                                              $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                                           
                              
                                             
                                             
                                             
                                              $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
                                $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','sort_order_id','ASC');
        
        $heading[]=array();
        foreach ($data['additional_information'] as  $value)
        {
             
            $heading[]=$value->heading;

        }

        $heading=array_unique($heading);
        $heading=implode(',', $heading);
        $heading=explode(',', $heading);

       
        foreach ($data['additional_information'] as  $value)
        {
             
             if(in_array($value->heading, $heading))
             {


                       $setion[$value->heading][] = array(
                      
                        'id' =>$value->id,
                        'label_name' =>$value->label_name,
                        'category_id' =>$value->category_id,
                        'type' =>$value->type,
                        'option' =>$value->option,
                        'heading' =>$value->heading,
                        'grouping' =>$value->grouping,
                        'multiselect' =>$value->multiselect,
                        'box_hide' =>$value->box_hide,
                        'required' =>$value->required,
                        'deleteid' =>$value->deleteid,
                        'sort_order_id' =>$value->sort_order_id,
                        'date_update' =>$value->date_update

                      );



              }   

        }


        
// foreach ($setion as $key => $value) {
//     echo "<h1>".$key."</h1>";
    
//     foreach ($value as $subItem) {
//         echo $subItem['label_name'];
//         echo "<br>";
//     }
    
   
// }


$data['setion']=$setion;
       // // echo "<pre>";print_r($setion);
       //  exit;
                                           
                                             
                                             $data['active_base']='customer_1';
                         $data['active']   ='customer_1';
                             $data['title']    = 'Customer  Edit';
                             $data['id']       = $id;
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_edit',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
  }

  public function customer_list()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['option']='';
                               $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
                               
                               foreach($additional_information as $val)
                               {
                                   $data['option']=explode(',', $val->option);
                               }
                               
                               
                               
                                 $sql = $this->db->query("SELECT c.area FROM customers c LEFT JOIN orders_process op ON c.id = op.customer_id WHERE c.area != '' GROUP BY c.area ORDER BY c.area")->result();
                               $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                                 if (is_object($obj) && isset($obj->area)) {
                                     return strval($obj->area);
                                 } elseif (is_array($obj) && isset($obj['area'])) {
                                     return strval($obj['area']);
                                 } else {
                                     return null; // Handle the case when 'product_id' is not found
                                 }
                               }, $sql));
                                $areas = array_unique(explode(',', $commaSeperatedCustomer));
                                    
                                $data['areas'] =  $areas;
                               
                               
                               
                               
                               
                               
                                       $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                         
                                                         }
                                                     }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                             $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                                           
                              
                                                     
                                           
                                             $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer List';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_list',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }




 public function customer_list_beta()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['option']='';
                               $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
                               
                               foreach($additional_information as $val)
                               {
                                   $data['option']=explode(',', $val->option);
                               }
                               
                               
                               
                                 $sql = $this->db->query("SELECT c.area FROM customers c LEFT JOIN orders_process op ON c.id = op.customer_id WHERE c.area != '' GROUP BY c.area ORDER BY c.area")->result();
                               $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                                 if (is_object($obj) && isset($obj->area)) {
                                     return strval($obj->area);
                                 } elseif (is_array($obj) && isset($obj['area'])) {
                                     return strval($obj['area']);
                                 } else {
                                     return null; // Handle the case when 'product_id' is not found
                                 }
                               }, $sql));
                                $areas = array_unique(explode(',', $commaSeperatedCustomer));
                                    
                                $data['areas'] =  $areas;
                               
                               
                               
                               
                               
                               
                                       $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                         
                                                         }
                                                     }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                             $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                                           
                              
                                                     
                                           
                                             $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer List';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_list_beta',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }




   public function commen_list()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['option']='';
                               $additional_information =$this->Main_model->where_names_two_order_by('additional_information','id','40','deleteid','0','id','ASC');
                               
                               foreach($additional_information as $val)
                               {
                                   $data['option']=explode(',', $val->option);
                               }
                               
                               
                               
                                 $sql = $this->db->query("SELECT c.area FROM customers c LEFT JOIN orders_process op ON c.id = op.customer_id WHERE c.area != '' GROUP BY c.area ORDER BY c.area")->result();
                               $commaSeperatedCustomer = implode(',', array_map(function ($obj) {
                                 if (is_object($obj) && isset($obj->area)) {
                                     return strval($obj->area);
                                 } elseif (is_array($obj) && isset($obj['area'])) {
                                     return strval($obj['area']);
                                 } else {
                                     return null; // Handle the case when 'product_id' is not found
                                 }
                               }, $sql));
                                $areas = array_unique(explode(',', $commaSeperatedCustomer));
                                    
                                $data['areas'] =  $areas;
                               
                               
                               
                               
                               
                               
                                       $sales_head = $this->Main_model->where_names('admin_users','access','12');
                                                     foreach($sales_head as $value)
                                                     {
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                         $data['sales_team'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                         
                                                         }
                                                     }
                                                     
                                                     
                                                     
                                                     
                                                     
                                                     
                                             $data['sales_sub_team'] =$this->Main_model->where_names_three_order_by('admin_users','access','17','deleteid','0','status','1','id','ASC');
                                           
                              
                                                     
                                           
                                             $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Commen List';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/commen_list',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
 
  public function customer_inter_link()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                               
                                     
                                           
                                          
                                             $data['active_base']='customer_1';
                           $data['active']='customer_1';
                             $data['title']    = 'Customer Inter Link';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/customer_inter_link',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
  
    public function ledger()
  {
        
                                  


                    if(isset($this->session->userdata['logged_in']))
                    {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                           
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/outstanding_customer_ledger',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  


     public function outstanding_customer_ledger()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                     {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                           
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Ooutstanding Customer Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/outstanding_customer_ledger',$data);
                    
                    
                     }
                     else
                     {
                         $this->load->view('admin/index');
                     }
       

  }
  
  
  
  
    public function common_ledger()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                           
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Common Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/common_ledger_group_beta',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  



  
    public function common_ledger_beta()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                           
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Common Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/common_ledger_group_beta',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
  
    public function ledger_find()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                             $data['customer_id']=$_GET['customer_id'];

                              $array = array();
                              $id = $_GET['customer_id'];
                              $customer_from = $this->Main_model->where_names_two_order_by('customer_inter_link','customer_from',$id ,'deleteid','0','id','ASC');
                                  foreach ($customer_from as $value) {
                                      $customerData = array(
                                          'id' => $value->customer_to,
                                          'name' => $value->customer_to_name
                                      );
                                      $array[] = $customerData;
                                  }

                              $customer_to = $this->Main_model->where_names_two_order_by('customer_inter_link','customer_to',$id ,'deleteid','0','id','ASC');
                                foreach ($customer_to as $value) {
                                    $customerData = array(
                                        'id' => $value->customer_from,
                                        'name' => $value->customer_from_name
                                    );
                                    $array[] = $customerData;
                                }
                              $data['customer_link'] = $array;
                              $data['customer_link_count'] = count($array);

                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                             //$data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/ledger_find',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       
       

  }
  
      public function ledger_find_delete_log()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                             $data['customer_id']=$_GET['customer_id'];
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            // $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger Delete Log';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/ledger_find_delete_log',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
  
      public function ledger_commen_find()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                             $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                             $data['customer_id']=$_GET['customer_id'];
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            // $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                             $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/ledger_commen_find',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
   public function ledger_find_delete_log_commen()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                              
                              
                                       $data['accountheads'] = $this->Main_model->where_names_order_by('accountheads','deleteid','0','id','ASC');


                                             $data['customer_id']=$_GET['customer_id'];
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                            // $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                             $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/ledger_find_delete_log_commen',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
    public function ledger_view()
  {
        
                                  


                      if(isset($this->session->userdata['logged_in']))
                          {
                               $data['customer_id']=$_GET['customer_id']; 
                                             $res = $this->Main_model->where_names('customers','id',$_GET['customer_id']);
                                             foreach($res as $val)
                                             {
                                                    $data['name']= $val->company_name;
                                             }
                                             
                              
                                           
                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
                         $data['active']='customer_1';
                             $data['title']    = 'Customer Ledger View';
                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                           $this->load->view('customer/ledger_view',$data);
                    
                    
                    }
                    else
                    {
                         $this->load->view('admin/index');
                    }
       

  }
  
    public function addressadd()
  {
      
      $form_data = json_decode(file_get_contents("php://input"));
      
                  
                         
                          if($form_data->name!='' && $form_data->phone!='')
                          {

                           $tablename=$form_data->tablename;
                         
                         

                                      $result= $this->Main_model->where_names($tablename,'phone',$form_data->phone);
                              if(count($result)>0)
                              {

                                   $array=array('error'=>'3','massage'=>'Contact phone no  already exists');
                                             echo json_encode($array);

                              }
                              else
                              {
                                  
                                  
                                     $data_address['customer_id']=$form_data->id;
                                     $data_address['name']=$form_data->name;
                                       $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             $data_address['locality']=$form_data->locality;
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $this->Main_model->insert_commen($data_address,$tablename);
                                    
                                    
                                    
                                    $array=array('error'=>'2','massage'=>'Address successfully Added..');
                                            echo json_encode($array);
                              }




                           

                     }
                          else
                          {
                             $array=array('error'=>'1');
                             echo json_encode($array);
                         }
                         
                         
                     
      
  }


  public function insertandupdate()
  {

                 $form_data = json_decode(file_get_contents("php://input"));
                 

                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->company_name!='')
                     {

                           $tablename=$form_data->tablename;
                         
                           $data['email']=$form_data->email;
                           $data['user_id']=$this->userid;
                           $data['create_date_by']=date('Y-m-d');
                           $op_status=$form_data->op_status;
                           $cnn_op_status=$form_data->cnn_op_status;


                            if($this->session->userdata['logged_in']['access']=='1')
                            {

                                 $data['approved_status']=2;

                            }
                            else
                            {

                                 $data['approved_status']=0;
                            }
                           
                           $data['phone']=$form_data->phone;
                           $data['print_name']=$form_data->print_name;
                           $data['create_date']=date('d-m-Y');



                           
                                  $data['address1']=$form_data->address1;
                                  $data['address2']=$form_data->address2;

                                   $data['stop_billing']=$form_data->stop_billing;
                                  $data['opening_balance_status']=$form_data->opening_balance_status;


                                  if($op_status==1)
                                  {


                                  $data['op']=$form_data->opening_balance;
                                  $data['opening_balance']=$form_data->opening_balance;


                                  }






                                 
                                 if($form_data->mark_vendor_id>0)
                                 {
                                     
                                       //$data['mark_vendor_id']=0;
                                      //$data['active_value']=0;
                                     
                                 }
                                 else
                                 {
                                      $data['mark_vendor_id']=0;
                                      $data['active_value']=0;
                                 }                                 
                                 
                                 $data['sales_team_sub_id']=$form_data->sales_team_sub_id;
                                 
                                 $ppl=explode('-', $form_data->locality);
                                 $data['locality']=$ppl[0];

 if($op_status==1)
 {


                                  if(isset($form_data->opening_balance_status))
                                 {
                                      if($form_data->opening_balance_status=='DR')
                                      {
                                             $data['payment_status']=2;
                                             $data['op_status']=2;

                                      }
                                      if($form_data->opening_balance_status=='CR')
                                      {
                                             $data['payment_status']=1;
                                             $data['op_status']=1;

                                      }

                                 }



 }

if($cnn_op_status==1)
 {
                                  if($form_data->cnn=='YES')
                                 {



                                    if(isset($form_data->cnn_payment_status))
                                   {
                                        if($form_data->cnn_payment_status=='DR')
                                        {
                                               $data['cnn_payment_status']=2;
                                               

                                        }
                                        if($form_data->cnn_payment_status=='CR')
                                        {
                                               $data['cnn_payment_status']=1;
                                              
                                        }

                                   }
                                   $data['cnn_opening_balance']=$form_data->cnn_opening_balance;
                                   


                                   


                                 }
                                 else
                                 {

                                    $data['cnn_payment_status']=0;
                                    $data['cnn_opening_balance']=0;
                                   

                                 

                                 }
                                 
                               
}                            
                                 
                                 $data['gst_status']=$form_data->gst_status;
                                 
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','sort_order_id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $data[$label_name]= $form_data->$label_name; 
                                     }
                                     

                                      
                                     $data['zone']=$form_data->zone;
                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                      $data['district']= $form_data->district;
                                     $data['google_map_link']=$form_data->google_map_link;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     $data['sales_team_id']=$form_data->sales_team_id;


                                        $data['feedback_sub']=$form_data->feedback;
                                        $data['feedback_details']=$form_data->feedback_details;
                                        $data['credit_limit']=$form_data->credit_limit;
                                        $data['credit_period']=$form_data->credit_period;
                                        
                                        
                                        $data['ratings']=$form_data->ratings;
                                        $data['price_rateings']=$form_data->price_rateings;
                                        $data['delivery_time_rateings']=$form_data->delivery_time_rateings;
                                        $data['quality_rateings']=$form_data->quality_rateings;
                                        $data['response_commission']=$form_data->response_commission;
                                        
                                        $data['account_heads_id']=68;
                                        $data['account_heads_id_2']=116;
                                        
                                       

                         
                           $data['pin']=substr(time(), 4);
                           $data['gst']=$form_data->gst;
                           
                           
                            if($form_data->gst_status==2)
                                  {
                                     $data['gst']=0; 
                                  }
                                       
                           
                           
                           
                                 $company_name=str_replace('-', ' ', $form_data->company_name);
                                 $company_name=str_replace('/', ' ', $company_name);
                           
                           
                                 $data['company_name']=$company_name;
                                 $data['landline']=$form_data->landline;
                                 $data['sales_group']=$form_data->sales_group;
                                 
                                  $sales_team_id = $this->Main_model->where_names('admin_users','id',$form_data->sales_team_id);
                            foreach($sales_team_id as $val)
                            {
                                $define_saleshd_id=$val->define_saleshd_id;
                            }
                            
                            
                            $sales_head_id = $this->Main_model->where_names('admin_users','id',$define_saleshd_id);
                            foreach($sales_head_id as $val)
                            {
                                 $data['sales_group']=$val->sales_group_id;
                            }
                                 
                                  $data['sales_head']=$define_saleshd_id;


                                  if($data['tcs_status']=='ACTIVE')
                                  {
                                    $data['tcs_status']=1;
                                  }
                                  elseif($data['tcs_status']=='INACTIVE')
                                  {
                                     $data['tcs_status']=0;
                                  }
                                  else
                                  {
                                     $data['tcs_status']=2;
                                  }



 $max_account_no = $this->db->query("SELECT MAX(account_token) as account_token FROM `customers`");
 $max=$max_account_no->result();
 foreach ($max as $maxkey) {
   $account_token=$maxkey->account_token+1;
 }

                              $result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
                              if(count($result)>0)
                              {

                                  // $array=array('error'=>'3','massage'=>'Customer phone no  already exists');
                                  // echo json_encode($array);
                                    $customer_id=$this->Main_model->insert_commen($data,$tablename);

  $accountid='ZARON0'.$account_token;
  $this->db->query("UPDATE $tablename SET account_token='".$account_token."',customer_id='".$account_token."',account_number='".$accountid."',virtual_accountno='".$accountid."' WHERE id='". $customer_id."'");          

                              }
                              else
                              {
                                  
                                  
  $customer_id=$this->Main_model->insert_commen($data,$tablename);
                                     
  $accountid='ZARON0'.$account_token;
  $this->db->query("UPDATE $tablename SET account_token='".$account_token."',customer_id='".$account_token."',account_number='".$accountid."',virtual_accountno='".$accountid."' WHERE id='". $customer_id."'");
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                           
                                     
                                             $datas['name']=$company_name;
                                             $datas['username']=$company_name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($data['pin']);
                                             $datas['org_password']=$data['pin'];
                                             $datas['status']=1;
                                             $datas['access']='C';
                                             $datas['account_heads_id']=$form_data->account_heads_id;
                                        
                                       
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             $datas['customer_id']=$customer_id;
                                             
                                             
                                            // $this->Main_model->insert_commen($datas,'admin_users');
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                    
                                     $data_address['customer_id']=$customer_id;
                                     $data_address['name']=$company_name;
                                       $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             
                                             $ppl=explode('-', $form_data->locality);
                                             $data_address['locality']=$ppl[0];
                                 
                                             
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                              $data_address['district']= $form_data->district;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $addressid=$this->Main_model->insert_commen($data_address,'customers_adddrss');
                                             
                                             
                                             $data_addressid['get_id']=$customer_id;
                                             $data_addressid['address_id']=$addressid;
                                             $this->Main_model->update_commen($data_addressid,$tablename);
                                    
                                            //$this->db->query("UPDATE vendor SET mark_customer_id='".$customer_id."' WHERE id='". $data['mark_vendor_id']."'");

 $mark_base='customer';

                                  
                                  if($data['mark_vendor_id']>0)
                                  {




                                     $active_value=0;  
                                    $getactive_vendor_id = $this->Main_model->where_names('customers','id',$customer_id);
                                    foreach($getactive_vendor_id as $vals)
                                    {
                                             $active_value=$vals->active_value;
                                    }
                                    
                             
                                     

                                     if($form_data->active=='0')
                                    {
                                        
                                      
                                        $data['mark_base']='customer';
                                        $mark_base='customer';
                                        $customer_id=$form_data->id;
                                        $data['active_value']=$form_data->mark_vendor_id;
                                        //$data['mark_vendor_id']=$form_data->active;
                                        //$data['mark_vendor_id']=0;
                                        if($form_data->mark_vendor_id>0)
                                        {
                                            $vendor_id=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        


                         $customer_id=$form_data->id;
                                        $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
                                        $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
            $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1' AND deleteid=12");


                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                         $data['mark_base']='vendor';
                                         $mark_base='vendor';
                                         $customer_id=$form_data->id;
                                       


                                      // $data['mark_vendor_id']=-1;
                                         $customer_id=$form_data->id;
                                         
                                         
                                         if($form_data->mark_vendor_id>0)
                                         {
                                            $vendor_id=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                         }
                                         else
                                         {
                                            $vendor_id=$active_value;
                                         }
                                        
                                         
                                         
                           $customer_id=$form_data->id;
                                         
                                       
                                         $this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-1 WHERE id='". $customer_id."'");
                                         $this->db->query("UPDATE vendor SET deleteid='0',mark_customer_id=-1 WHERE id='". $vendor_id."'");
$this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',party_type=3,commen_find_status='".$customer_id."' WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
$this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1' AND deleteid=12");




                                    }
                                    elseif($form_data->active=='-2')
                                    {


                                        
                                         $mark_vendor_id=$form_data->mark_vendor_id;
                                         $data['mark_base']='driver_rent';
                                         $mark_base='driver_rent';
                                         if($form_data->mark_vendor_id>0)
                                         {
                                            $vendor_id=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                         }
                                         else
                                         {
                                            $vendor_id=$active_value;
                                         }
                                         $customer_id=$form_data->id;
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=2,driver_collection_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");

$this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-2 WHERE id='". $customer_id."'");
$this->db->query("UPDATE driver SET deleteid='0',mark_customer_id=-2 WHERE id='". $vendor_id."'");


                                    }
                                    elseif($form_data->active=='-3')
                                    {
                                        
                                       
                                         $customer_id=$form_data->id;

                                         $mark_vendor_id=$form_data->mark_vendor_id;
                                         $data['mark_base']='driver_collection';
                                         $mark_base='driver_collection';
                                         if($form_data->mark_vendor_id>0)
                                         {
                                            $vendor_id=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                         }
                                         else
                                         {
                                            $vendor_id=$active_value;
                                         }
                                         $customer_id=$form_data->id;
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=2,driver_collection_status=0 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");
                                         
                                
$this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-3 WHERE id='". $customer_id."'");
$this->db->query("UPDATE driver SET deleteid='0',mark_customer_id=-3 WHERE id='". $vendor_id."'");

                                    }
                                    elseif($form_data->active=='-4')
                                    {
                                        
                                        $data['mark_base']='other';
                                        $mark_base='other';
                                         if($form_data->mark_vendor_id>0)
                                         {
                                            $vendor_id=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                         }
                                         else
                                         {
                                            $vendor_id=$active_value;
                                         }
                                        $customer_id=$form_data->id;
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=5 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");
                                         
$this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-4 WHERE id='". $customer_id."'");
$this->db->query("UPDATE accountheads SET deleteid='0',mark_customer_id=-4 WHERE id='". $vendor_id."'");     


                                    }
                                    else
                                    {
                                        
                                        
                                       $data['mark_base']='both';
                                       $mark_base='both';
                                        if($form_data->mark_vendor_id>0)
                                        {
                                            
                                            $data['mark_vendor_id']=$form_data->mark_vendor_id;
                                            $data['active_value']=$form_data->mark_vendor_id;
                                            
                                        }
                                        else
                                        {
                                              if($form_data->active>0)
                                              {
                                                
                                                 $data['mark_vendor_id']=$form_data->active;
                                                 $data['active_value']=$form_data->active;
                                                
                                              }
                                              else
                                              {
                                                 $data['mark_vendor_id']=0;
                                                 $data['active_value']=0;
                                              }
                                       }
                                        
                                       
                    $this->db->query("UPDATE vendor SET mark_customer_id='".$customer_id."',deleteid='0' WHERE id='". $data['mark_vendor_id']."'");
                    $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
          
                                        
                                       
                                        
                                        
                                    }


 $data['get_id']=$customer_id;
 $this->Main_model->update_commen($data,$tablename);
                     

                                    }




                             $e_name=explode('|',$form_data->e_name);
                             $e_title=explode('|',$form_data->e_title);
                             $e_address=explode('|',$form_data->e_address);
                             $e_phone=explode('|',$form_data->e_phone);

                             for ($i=0; $i <count($e_name) ; $i++) 
                             { 
                                

                                
                                $datass['name']=$e_name[$i];
                                $datass['title']=$e_title[$i];
                                $datass['address']=$e_address[$i];
                                $datass['phone']=$e_phone[$i];
                                $datass['customer_id']=$customer_id;  

                                 if($datass['name']!='') 
                                {


                                    $this->Main_model->insert_commen($datass,'customer_emergency_details');


                                 }


                             }






                             $relationship=explode('|',$form_data->relationship);
                             $greetings_for=explode('|',$form_data->greetings_for);
                             $g_name=explode('|',$form_data->g_name);
                             $g_date=explode('|',$form_data->g_date);
                             $age=explode('|',$form_data->age);
                             $gender=explode('|',$form_data->gender);
                             $blood_group=explode('|',$form_data->blood_group);
                             $religion=explode('|',$form_data->religion);
                             $other_details=explode('|',$form_data->other_details);


                             for ($i=0; $i <count($relationship) ; $i++) 
                             { 
                                

                                
                                $datasss['relationship']=$relationship[$i];
                                $datasss['greetings_for']=$greetings_for[$i];
                                $datasss['g_name']=$g_name[$i];
                                $datasss['g_date']=$g_date[$i];
                                $datasss['age']=$age[$i];
                                $datasss['gender']=$gender[$i];
                                $datasss['blood_group']=$blood_group[$i];
                                $datasss['religion']=$religion[$i];
                                $datasss['other_details']=$other_details[$i];
                                $datasss['customer_id']=$customer_id; 

                                if($datasss['relationship']!='') 
                                {
                                   $this->Main_model->insert_commen($datasss,'customer_greetings_details');
                                }
                               


                             }






                                        $usergroup = array(1, 15);
                                         if(in_array($this->session->userdata['logged_in']['access'], $usergroup)) 
                                         {

                                                  

                         if($mark_base=='customer')
                        {

                            if($op_status==1)
                            {
                        $this->opblance_update($customer_id,$data['opening_balance'],$data['op_status']);
                            }
                            if($cnn_op_status==1)
                            {
                        $this->opblance_update_cnn($customer_id,$data['cnn_opening_balance'],$data['cnn_payment_status']);
                            }
                            
                        }




                                        }

                                      if($this->session->userdata['logged_in']['userid']=='1562' || $this->session->userdata['logged_in']['userid']=='1541')
                                      {

                if($mark_base=='customer')
               {

                            if($op_status==1)
                            {
                        $this->opblance_update($customer_id,$data['opening_balance'],$data['op_status']);
                            }
                            if($cnn_op_status==1)
                            {
                        $this->opblance_update_cnn($customer_id,$data['cnn_opening_balance'],$data['cnn_payment_status']);
                            }


               }


                                      }



                                    $array=array('error'=>'2','insert_id'=>$customer_id,'massage'=>'Customer successfully Added..');
                                            echo json_encode($array);
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

                      if($form_data->company_name!='')
                     {

                                    $tablename=$form_data->tablename;
                                    $data['get_id']=$form_data->id;

                                    $op_status=$form_data->op_status;
                                    $cnn_op_status=$form_data->cnn_op_status;
                                    
                                    
                              $company_name=str_replace('-', ' ', $form_data->company_name);
                              $company_name=str_replace('/', ' ', $company_name);
                      
                              $data['email']=$form_data->email;
                              $data['phone']=$form_data->phone;
                              $data['address1']=$form_data->address1;
                              $data['address2']=$form_data->address2;
                              $data['gst_status']=$form_data->gst_status;


                              $data['print_name']=$form_data->print_name;


                              $data['stop_billing']=$form_data->stop_billing;

                              $data['opening_balance_status']=$form_data->opening_balance_status;
                              

                              if($op_status==1)
                              {


                                 $data['op']=$form_data->opening_balance;
                                 $data['opening_balance']=$form_data->opening_balance;


                              }

                             

                                    
                                    
                                    
                                    $active_value=0;  
                                    $getactive_vendor_id = $this->Main_model->where_names('customers','id',$form_data->id);
                                    foreach($getactive_vendor_id as $vals)
                                    {
                                             $active_value=$vals->active_value;
                                             $mark_base=$vals->mark_base;
                                    }
                                    

                                       $getactive_vendor_ids = $this->Main_model->where_names('vendor','mark_customer_id',$form_data->id);
                                    foreach($getactive_vendor_ids as $valss)
                                    {
                                             $vendor_id=$valss->id;
                                             
                                    }


                             if($op_status==1)
                             {

                                   
                                 if(isset($form_data->opening_balance_status))
                                 {
                                      if($form_data->opening_balance_status=='DR')
                                      {
                                             $data['payment_status']=2;
                                             $data['op_status']=2;

                                      }

                                      if($form_data->opening_balance_status=='CR')
                                      {
                                             $data['payment_status']=1;
                                             $data['op_status']=1;

                                      }

                                 }

                            }

                                  if($form_data->cnn=='YES')
                                 {




                                       if($cnn_op_status==1)
                                       {

                                              if(isset($form_data->cnn_payment_status))
                                             {
                                                  if($form_data->cnn_payment_status=='DR')
                                                  {
                                                         $data['cnn_payment_status']=2;
                                                         

                                                  }
                                                  if($form_data->cnn_payment_status=='CR')
                                                  {
                                                         $data['cnn_payment_status']=1;
                                                        
                                                  }

                                             }
                                             $data['cnn_opening_balance']=$form_data->cnn_opening_balance;
                                             
                                       }

                                   


                                 }
                                 else
                                 {

                                    $data['cnn_payment_status']=0;
                                    $data['cnn_opening_balance']=0;
                                   

                                 

                                 }
                                    
                            
                                    


                                       if($form_data->active=='0')
                                    {
                                        
                                      
                                        $data['mark_base']='customer';
                                        $customer_id=$form_data->id;


                                        if($form_data->mark_vendor_id>0)
                                        {
                                          $data['active_value']=$form_data->mark_vendor_id;
                                           $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                       

                        
                                       
                                        $customer_id=$form_data->id;

                                        if($mark_base=='vendor')
                                        {

                $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
              $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
            $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1' AND deleteid=12");

                                       }


                                        if($mark_base=='other')
                                        {

                $this->db->query("UPDATE accountheads SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
              $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=5 AND deleteid='0'"); 
            $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=5 AND commen_find_status='1' AND deleteid=12");

                                       }



                                         if($mark_base=='driver_rent')
                                        {

                $this->db->query("UPDATE driver SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
              $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=2 AND deleteid='0' AND driver_collection_status=1"); 
            $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=2 AND commen_find_status='1' AND deleteid=12 AND driver_collection_status=1");

                                       }


                                         if($mark_base=='driver_collection')
                                        {

                $this->db->query("UPDATE driver SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
              $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=2 AND deleteid='0' AND driver_collection_status=0"); 
            $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=2 AND commen_find_status='1' AND deleteid=12 AND driver_collection_status=0");

                                       }



                                          if($mark_base=='both')
                                        {

                $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
              $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
            $this->db->query("UPDATE all_ledgers SET customer_id='".$customer_id."',party_type=1,commen_find_status='".$vendor_id."' WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
            

                                       }

                                        //$this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1' AND deleteid=12");
                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                         $data['mark_base']='vendor';
                                         $customer_id=$form_data->id;

                                          if($form_data->mark_vendor_id>0)
                                        {
                                            $data['active_value']=$form_data->mark_vendor_id;
                                           $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                        
                                         
             
                                        
                                        
                                         $customer_id=$form_data->id;
                                         
                                       
          $this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-1 WHERE id='". $customer_id."'");
          $this->db->query("UPDATE vendor SET deleteid='0',mark_customer_id=-1 WHERE id='". $vendor_id."'");




$this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',party_type=3,commen_find_status='".$customer_id."' WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
$this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1' AND deleteid=12");




                                    }
                                    elseif($form_data->active=='-2')
                                    {


                                        
                                         $mark_vendor_id=$form_data->mark_vendor_id;
                                         $data['mark_base']='driver_rent';
                                         if($form_data->mark_vendor_id>0)
                                        {
                                            $data['active_value']=$form_data->mark_vendor_id;
                                           $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                        
                                         $customer_id=$form_data->id;
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=2,driver_collection_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");

$this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-2 WHERE id='". $customer_id."'");
$this->db->query("UPDATE driver SET deleteid='0',mark_customer_id=-2 WHERE id='". $vendor_id."'");




                                    }
                                    elseif($form_data->active=='-3')
                                    {
                                        
                                       
                                         $customer_id=$form_data->id;

                                         $mark_vendor_id=$form_data->mark_vendor_id;
                                         $data['mark_base']='driver_collection';
                                           if($form_data->mark_vendor_id>0)
                                        {
                                            $data['active_value']=$form_data->mark_vendor_id;
                                           $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                         $customer_id=$form_data->id;
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=2,driver_collection_status=0 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");
                                         
 $this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-3 WHERE id='". $customer_id."'");
$this->db->query("UPDATE driver SET deleteid='0',mark_customer_id=-3 WHERE id='". $vendor_id."'");           


                                    }
                                    elseif($form_data->active=='-4')
                                    {
                                        
                                        $data['mark_base']='other';
                                        $customer_id=$form_data->id;
                                        if($form_data->mark_vendor_id>0)
                                        {
                                            $data['active_value']=$form_data->mark_vendor_id;
                                            $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                         
                                
 $this->db->query("UPDATE all_ledgers SET customer_id='".$vendor_id."',commen_find_status='".$customer_id."',party_type=5 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'");
                                         
$this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-4 WHERE id='". $customer_id."'");
$this->db->query("UPDATE accountheads SET deleteid='0',mark_customer_id=-4 WHERE id='". $vendor_id."'");
                                


                                    }
                                    else
                                    {
                                        
                                        
                                        $customer_id=$form_data->id;
                                        //$data['mark_vendor_id']=$form_data->mark_vendor_id;
                                        $data['mark_base']='both';

                                        if($form_data->mark_vendor_id>0)
                                        {
                                            $data['active_value']=$form_data->mark_vendor_id;
                                            $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                             $vendor_id=$active_value;
                                        }
                                        

                                       
                                       // $data['mark_base']='Both';
                                        
                          $this->db->query("UPDATE vendor SET mark_customer_id='".$data['get_id']."',deleteid='0' WHERE id='". $vendor_id."'");
                          $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id='".$vendor_id."',active_value='".$vendor_id."' WHERE id='". $customer_id."'");
                                        
                                        
                                    }
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    







                                    
                                    
                                    
                                    
                                    $data['sales_team_sub_id']=$form_data->sales_team_sub_id;


                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['district']= $form_data->district;
                                     $data['google_map_link']=$form_data->google_map_link;
                                     $data['landmark']=$form_data->landmark;
                                     $data['status']=$form_data->status;
                                     $data['account_heads_id']=68;
                                     $data['account_heads_id_2']=116;
                                           
                                     $ppl=explode('-', $form_data->locality);
                                      $data['locality']=$ppl[0];
                                 
                               
                                     
                                     
                                     
                                     $data['zone']=$form_data->zone;
                                     $data['sales_team_id']=$form_data->sales_team_id;
                                     
                                     
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','sort_order_id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $data[$label_name]= $form_data->$label_name; 
                                     }
                                     
                                     
                                      
                                        $data['feedback_sub']=$form_data->feedback;
                                        $data['feedback_details']=$form_data->feedback_details;
                                        $data['credit_limit']=$form_data->credit_limit;
                                        $data['credit_period']=$form_data->credit_period;
                                        
                                        
                                        
                                        $data['ratings']=$form_data->ratings;
                                        $data['price_rateings']=$form_data->price_rateings;
                                        $data['delivery_time_rateings']=$form_data->delivery_time_rateings;
                                        $data['quality_rateings']=$form_data->quality_rateings;
                                        $data['response_commission']=$form_data->response_commission;
                                        
                                        
                                        
                                        
                                        
                                        
                                                $address_id=0;
                                                $user_group = $this->Main_model->where_names($tablename,'id',$form_data->id);
                                                foreach ($user_group as  $row) {
                                                  $address_id=$row->address_id;
                                                }
                                                
                                                
                                             
                                             
                                         
                           
                                        
                                             $data_address['get_id']=$address_id;
                                     $data_address['name']=$company_name;
                                       $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                            
                                                $ppl=explode('-', $form_data->locality);
                                                $data_address['locality']=$ppl[0];
                                 
                               
                                             
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['district']= $form_data->district;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             
                                             
                                             $this->Main_model->update_commen($data_address,'customers_adddrss');
                                             
                                             
                                             
                                             
                                             $datas['name']=$company_name;
                                             $datas['username']=$company_name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($data['pin']);
                                             $datas['org_password']=$data['pin'];
                                             $datas['status']=1;
                                             $datas['access']='C';
                                             $datas['customer_id']=$form_data->id;
                                             $datas['account_heads_id']=$form_data->account_heads_id;
                                      
                                            
                                      $result= $this->Main_model->where_names('admin_users','customer_id',$form_data->id);
                                      if(count($result)>0)
                                      { 
                                            //$datas['get_id']=$form_data->id;
                                            //$this->Main_model->update_commen_where($datas,'customer_id','admin_users');

                                      }
                                      else
                                      {
                                            //$this->Main_model->insert_commen($datas,'admin_users');
                                      }
                                  
                                  
                                             
                                             
                                             
                                             
                                             
                                             
                                             

                         
                           
                                   $data['gst']=$form_data->gst;
                           
                           
                                  if($form_data->gst_status==2)
                                  {
                                     $data['gst']=0; 
                                  }
                           
                                  $data['company_name']=$company_name;
                                  $data['landline']=$form_data->landline;
                                  $data['sales_group']=$form_data->sales_group;
                                 
                                  $sales_team_id = $this->Main_model->where_names('admin_users','id',$form_data->sales_team_id);
                                  foreach($sales_team_id as $val)
                                  {
                                    $define_saleshd_id=$val->define_saleshd_id;
                                  }
                            
                                  $sales_head_id = $this->Main_model->where_names('admin_users','id',$define_saleshd_id);
                                  foreach($sales_head_id as $val)
                                  {
                                         $data['sales_group']=$val->sales_group_id;
                                  }
                                  $data['sales_head']=$define_saleshd_id;

                                  if($data['tcs_status']=='ACTIVE')
                                  {
                                    $data['tcs_status']=1;
                                  }
                                  elseif($data['tcs_status']=='INACTIVE')
                                  {
                                     $data['tcs_status']=0;
                                  }
                                  else
                                  {
                                     $data['tcs_status']=2;
                                  }



                                  $this->Main_model->update_commen($data,$tablename);
                     
                                           
                                     
                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $form_data->id; 
                                 $datas_log['data_fetch']= json_encode($user_group); 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');





         $this->db->query("DELETE FROM customer_emergency_details  WHERE customer_id='".$customer_id."'");
         $this->db->query("DELETE FROM customer_greetings_details  WHERE customer_id='".$customer_id."'");  

                     $e_name=explode('|',$form_data->e_name);
                     $e_title=explode('|',$form_data->e_title);
                     $e_address=explode('|',$form_data->e_address);
                     $e_phone=explode('|',$form_data->e_phone);

                     for ($i=0; $i <count($e_name) ; $i++) 
                     { 
                        

                        
                        $datass['name']=$e_name[$i];
                        $datass['title']=$e_title[$i];
                        $datass['address']=$e_address[$i];
                        $datass['phone']=$e_phone[$i];
                        $datass['customer_id']=$customer_id;  


                                if($datass['name']!='') 
                                {


                                    $this->Main_model->insert_commen($datass,'customer_emergency_details');


                                 }


                     }






                    
                     $relationship=explode('|',$form_data->relationship);
                     $greetings_for=explode('|',$form_data->greetings_for);
                     $g_name=explode('|',$form_data->g_name);
                     $g_date=explode('|',$form_data->g_date);
                     $age=explode('|',$form_data->age);
                     $gender=explode('|',$form_data->gender);
                     $blood_group=explode('|',$form_data->blood_group);
                     $religion=explode('|',$form_data->religion);
                     $other_details=explode('|',$form_data->other_details);


                     for ($i=0; $i <count($relationship) ; $i++) 
                     { 
                        

                        
                        $datasss['relationship']=$relationship[$i];
                        $datasss['greetings_for']=$greetings_for[$i];
                        $datasss['g_name']=$g_name[$i];
                        $datasss['g_date']=$g_date[$i];
                        $datasss['age']=$age[$i];
                        $datasss['gender']=$gender[$i];
                        $datasss['blood_group']=$blood_group[$i];
                        $datasss['religion']=$religion[$i];
                        $datasss['other_details']=$other_details[$i];
                        $datasss['customer_id']=$customer_id;  

                          if($datasss['relationship']!='') 
                          {

                               $this->Main_model->insert_commen($datasss,'customer_greetings_details');

                          }


                     }

                     

                        if($mark_base=='customer')
                        {
                       

                         if($op_status==1)
                         {

        $this->opblance_update($customer_id,$data['opening_balance'],$data['op_status']);

                         }
                         if($cnn_op_status==1)
                         {
                
                $this->opblance_update_cnn($customer_id,$data['cnn_opening_balance'],$data['cnn_payment_status']);

                         }



                        }





                       $array=array('error'=>'2','massage'=>'Customer successfully Updated..');
                       echo json_encode($array);



                                                                                     date_default_timezone_set("Asia/Kolkata"); 
                                                                                     $date= date('Y-m-d');
                                                                                     $time= date('h:i A');
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                     }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Customer Data Update';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $customer_id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($form_data);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');
                                 




                   }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                 
                if($form_data->action=='updatelocality')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   
                   
                           $result= $this->Main_model->where_names('locality','name',$form_data->locality);
                             foreach ($result as  $value) {

                                $data['locality']=$value->id;

                             }
                   
                   
                   
                   
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 if($form_data->action=='updatefeedback')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['feedback_details']=$form_data->feedback;
                     $this->Main_model->update_commen($data,$tablename);

                 }

                  //archive customer
                 if($form_data->action == 'Archive'){
                    
                    $tablename=$form_data->tablename;

                    $this->db->query("UPDATE $tablename SET archive_status= $form_data->status , deleteid = $form_data->deleteid WHERE id='".$form_data->id."'");


                  }
                   
                 
                 if($form_data->action=='updatevalue')
                 {
                     
                       date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('Y-m-d');
                       $time= date('h:i A');
                   

                      $tablename=$form_data->tablename;
                      $lab=$form_data->lab;


                      
                      if($lab=='credit_limit')
                      {
                            if($form_data->val>0)
                            {
                                $data['credit']='YES';
                            }
                            else
                            {
                                $data['credit']='NO';
                            }
                            
                      }
                      
                      if($lab=='payment_status')
                      {
                          $obalance=$form_data->obalance;
                          $data['opening_balance']=$obalance;
                          $data['op']=$obalance;
                          $data['op_status']=$form_data->val;
                          $data_driver['order_id']=0;
                          $data_driver['user_id']=$this->userid;
                          $data_driver['customer_id']=$form_data->id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          
                          
                          
                          
                                                                     // $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                     
                          
                          
                                                                             
                                                                              if($form_data->val=='1')
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('2024-03-31');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=1;
                                                                              $data_driver['bank_id']=25;
                                                                              $data_driver['deletemod']='OP1-'.$form_data->id;
                                                                              $data_driver['account_head_id']=68;
                                                                              $data_driver['account_heads_id_2']=123;
                                                                              
                                                                              
  $querycheck = $this->db->query("SELECT id FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
  $querycheck=$querycheck->result();
  if(count($querycheck)==0)
  {
                                                                            
         $this->Main_model->insert_commen($data_driver,'all_ledgers');


       //  $this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


  }
  else
  {


$this->db->query("UPDATE all_ledgers SET user_id='".$this->userid."',debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");



//$this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


                 
          
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
                                                                                     $day_log['changes'] = 'Customer Opening Balance';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($form_data);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');



                          
                                                                            //   if($form_data->val!='')
                                                                            //   {
                                                                            //       $query = $this->db->query("SELECT id FROM `all_ledgers`  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                            //       $resultsales_team=$query->result();
                                                                            //       if(count($resultsales_team)==0)
                                                                            //       {
                                                                            //             $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                            //             $this->Main_model->insert_commen($data_driver,'all_ledgers');
                                                                            //       }
                                                                            //       else
                                                                            //       {
                                                                            //                  $data_driver['get_id']=$form_data->id;
                                                                            //                   $this->Main_model->update_commen_where_three($data_driver,'customer_id','order_no','Opening Balance','party_type','1','all_ledgers');
                                                                                       
                                                                            //       }
                                                                                  
                                                                                   
                                                                            //   }
                                                                              
                                                                              
                                                                            //   if($obalance==0)
                                                                            //   {
                                                                            //         $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                            //   }
                          
                          
                          
                      }
                      
                      if($lab=='sales_team_id')
                      {
                          
                            $sales_team_id = $this->Main_model->where_names('admin_users','id',$form_data->val);
                            foreach($sales_team_id as $val)
                            {
                                $define_saleshd_id=$val->define_saleshd_id;
                            }
                            
                            
                            $sales_head_id = $this->Main_model->where_names('admin_users','id',$define_saleshd_id);
                            foreach($sales_head_id as $val)
                            {
                                 $data['sales_group']=$val->sales_group_id;
                            }
                                 
                             $data['sales_head']=$define_saleshd_id;
                          
                      }
                      


                      $data['get_id']=$form_data->id;
                      if($lab=='approved_status') 
                      {

                               if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15')
                               {


                                $cus = $this->Main_model->where_names('customers','id',$form_data->id);
                                foreach($cus as $valss)
                                {
                                    $approved_status=$valss->approved_status;
                                }


                                  if($approved_status=='0')
                                  {

                                     $data['approved_by']=$this->userid;
                                     $data['approved_date']=date('d-m-Y');

                                  }

                                

                               }


                                $customers_last_id= $this->Main_model->order_last_count_customer('customers');
                                $customers_last_id_set=$customers_last_id[0]->customer_id;
                                //$data['customer_id']=$form_data->id;
                                //$accountid='ZARON0'.$data['customer_id'];
                                // $sales_head_id = $this->Main_model->where_names('customers','virtual_accountno',$accountid);
                                // if(count($sales_head_id)>1)
                                // {
                                //        $accountid='ZARON0'.$data['customer_id'].'1';
                                // }
                                //$data['virtual_accountno']=$accountid;
                                //$data['account_number']=$accountid;
                               

                      }
                       if($lab=='approved_status_approve') 
                      {

                      //          if($this->session->userdata['logged_in']['access']=='1' || $this->session->userdata['logged_in']['access']=='15')
                      //          {

                      //           // $data['approved_by']=$this->userid;
                      //           // $data['approved_date']=date('d-m-Y');

                      //          }


                      //           $customers_last_id= $this->Main_model->order_last_count_customer('customers');
                      //           $customers_last_id_set=$customers_last_id[0]->customer_id;
                      //           //$data['customer_id']=$form_data->id;
                      //           //$accountid='ZARON0'.$data['customer_id'];
                      //           // $sales_head_id = $this->Main_model->where_names('customers','virtual_accountno',$accountid);
                      //           // if(count($sales_head_id)>1)
                      //           // {
                      //           //        $accountid='ZARON0'.$data['customer_id'].'1';
                      //           // }
                      //           //$data['virtual_accountno']=$accountid;
                      //           //$data['account_number']=$accountid;
                                $data['approved_status']=$form_data->val;

                      }else
                      {
                         $data[$lab]=$form_data->val;
                      }
                      
                      $this->Main_model->update_commen($data,$tablename);

                     

                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $form_data->id; 
                                 $datas_log['data_fetch']= json_encode($data); 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');                                                                

                 }
                 
                   if($form_data->action=='updateratings')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['ratings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 
                 
                 
                 
                  if($form_data->action=='updateratings_a')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['price_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_b')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['delivery_time_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_c')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['quality_rateings']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                  if($form_data->action=='updateratings_d')
                 {
                     $tablename=$form_data->tablename;
                   $data['get_id']=$form_data->id;
                   $data['response_commission']=$form_data->ratings;
                     $this->Main_model->update_commen($data,$tablename);

                 }
                 
                 if($form_data->action=='Delete')
                 {
                    
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);
                     //$this->db->query("UPDATE all_ledgers SET deleteid='1' WHERE customer_id='".$id."' AND party_type=1");
                     //$this->db->query("UPDATE orders SET deleteid='1' WHERE customer_id='".$id."'");
                     //$this->db->query("UPDATE orders_process SET deleteid='1' WHERE customer_id='".$id."'");
                     //$this->db->query("UPDATE orders_quotation SET deleteid='1' WHERE customer_id='".$id."'");


                             $result = $this->Main_model->where_names_two_order_by('all_ledgers', 'customer_id', $id, 'party_type', '1', 'id', 'DESC');

                     
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
                                 $datas_log['customer_id']= $id; 
                                 $datas_log['data_fetch']= 'Customer Deleted'; 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');

                 }
                
                


  }
  
  public function customerlink()
  {
      
      
                                                      $form_data = json_decode(file_get_contents("php://input"));
          
          
                                                       $names1=explode("-",$form_data->name1);
                                                       $names2=explode("-",$form_data->name2);
           
                                                       $data['customer_from']=$names1[0];
                                                       $data['customer_from_name']=$names1[1];
                                                       $data['customer_to']=$names2[0];
                                                       $data['customer_to_name']=$names2[1];
                                                       if($names1[0]>0)
                                                       {
                                                           $insertbank= $this->Main_model->insert_commen($data,'customer_inter_link');
                                                       }
                                                       
                                                       
                                                       $array=array('error'=>'3','id'=>$customer_id);
                                                       echo json_encode($array);
                                                       
     
     
     
     
  }













  public function fetch_data_export()
  {
      
      
      
      
                     //exit;
             
                     
                     $where="";
                     $sqls="";
                     //38328
                     $from_date='2023-09-19';
                     $to_date=date('d-m-Y');
                     //$where= ' AND create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';

                     //$where= ' AND id>37848';
                     
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              
                                               $sales_group_id=implode("','",$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT regular,op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1') AND  download_status=0  AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id ASC");
                                                  
                                           
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id,define_saleshd_id FROM `admin_users`  WHERE id='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                    $sales_group_id[]=$values->define_saleshd_id;
                                                                              
                                              }
                                              
                                              
                                                     
                                               $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                               foreach ($poin_to_member as $point) {
                                                    $sales_group_id[] = $point->define_saleshd_id;
                                               }
                                              
                                             
                                             
                                                $sales_group_id=implode("','",$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT regular,op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1') AND  download_status=0  AND  sales_team_id IN ('".$sales_group_id."') $where ORDER BY id ASC");
                                                  
                                           
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                           $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT regular,op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1') AND  download_status=0  AND sales_team_id='".$this->userid."' $where ORDER BY id ASC");
                                                  
                                                  
                                                                     
                                                
                                            
                             
                     }
                      elseif($this->session->userdata['logged_in']['access']=='11')
                     {
                         
                         
                         
                                             $sales_team_id = array($this->userid);
                                              $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                              foreach ($resultsales_team as $values) {
                                                  $sales_team_id[] = $values->sales_member_id;
                                              }
                                                 $sales_team_id=implode("','",$sales_team_id);
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT regular,op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1') AND  download_status=0 AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id ASC ");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='20')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1') AND  download_status=0  AND user_id='".$this->userid."' $where ORDER BY id ASC ");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     else
                     {
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                       $query = $this->db->query("SELECT regular,op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')  AND archive_status = '0' AND mark_vendor_id IN ('0','1','-1')  $where ORDER BY id ASC ");
                           
                     }
                    
                  
                
                    
                   
                   $result=$query->result();
                   
                   
                   $i=1;
                   $array=array();
                   foreach ($result as  $value)
                   {
                       
                       
                       if($value->deleteid=='0')
                       {
                           
                      
                       
                         $this->db->query("UPDATE customers SET download_status='1' WHERE id='".$value->id."'");
                           
                      
                        
                        $locality_name ='';
                        $route_id='';
                        $user_group = $this->Main_model->where_names('locality','id',$value->locality);
                        foreach ($user_group as  $row) {
                          $locality_name=$row->name;
                            $route_id=$row->route_id;
                        }
                        
                        
                         $route_name ='';
                        $user_group = $this->Main_model->where_names('route','id',$route_id);
                        foreach ($user_group as  $row) {
                          $route_name=$row->name;
                            
                        }
                        
                        $sales_team_name ='';
                         $sales_group_id=0;
                        if($value->sales_team_id>0)
                        {

                            $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                            foreach ($user_group_team as  $team) {
                              $sales_team_name=$team->name;
                              $sales_group_id=$team->sales_group_id;
                            }
                       

                        }
                        
                       
                        $user_group_name ='';
                        if($sales_group_id>0)
                        {
                            $user_group = $this->Main_model->where_names('sales_group','id',$sales_group_id);
                            foreach ($user_group as  $row) {
                              $user_group_name=$row->name;
                            }
                         }
                       
                       
                        $sales_team_name_sub ='';
                         if($value->sales_team_sub_id>0)
                        {
                            $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->sales_team_sub_id);
                            foreach ($$user_group_team_sub as  $teamsub) {
                              $sales_team_name_sub=$teamsub->name;
                            }
                        }
                       

                    if($value->status=='1')
                    {
                      $status='Active';
                    }
                    else
                    {
                      $status='InActive';
                    }
                    



                                       
                         
                    

                    if($val->op>0)
                    {

                          $val->op=$val->op;
                          $val->op_status=$val->op_status;

                    }
                    else
                    {


                        if($val->create_date>'2023-05-19')
                        {


                               $val->op=$val->opening_balance;
                               $val->op_status=$val->payment_status;


                        }
                        else
                        {

                              $val->op=$val->op;
                              $val->op_status=$val->op_status;
                          

                        }


                          
                       
                   


                    }
                    

                    if($value->virtual_accountno=='')
                    {

                      $value->virtual_accountno=$value->account_number;
                      $value->customer_id=$value->id;
                    }

                    $value->customer_id=$value->id;
                    
                      $array[] = array(
                                    
                                    
                                    'no' => $i, 
             
                                  'id' => $value->id, 
                                  
                                  'email' => $value->email, 
                                  'phone' => $value->phone, 
                                  'company_name' => $value->company_name, 
                                  'pin' => $value->pin, 
                                  'route' => $route_name, 
                                  'locality' => $value->locality, 
                                  'locality_name' => $locality_name, 
                                  'gst' => $value->gst, 
                                  'tcs_status'=>$value->tcs_status,
                                  'gst_status' => $value->gst_status, 
                                  'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                                  'city' => $value->city, 
                                  'state' => $value->state,
                                  'factory_workshop' => $value->factory_workshop,
                                  'google_map_link' => $value->google_map_link, 
                                  'feedback_details' => $value->feedback_details,
                                  'ratings'=>$value->ratings,
                                  'price_rateings'=>$value->price_rateings,
                                  'delivery_time_rateings'=>$value->delivery_time_rateings,
                                  'quality_rateings'=>$value->quality_rateings,
                                  'response_commission'=>$value->response_commission,
                                  'commission_feed_back'=>$value->commission_feed_back,
                                  'opening_balance'=>round($value->op,2),
                                  'payment_status'=>$value->op_status,
                                  'credit_period'=>$value->credit_period,
                                  'credit_limit'=>$value->credit_limit,
                                  'landline'=>$value->landline,
                                  'customer_id'=>$value->customer_id,
                                  'virtual_accountno'=>$value->virtual_accountno,
                                  'customer_id_beta'=>str_replace('ZARON0', '', $value->virtual_accountno),
                                  'customer_type'=>$value->customer_type,
                                  'sales_team_id'=>$value->sales_team_id,
                                  'sales_team_sub_id'=>$value->sales_team_sub_id,
                                  'approved_status'=>$value->approved_status,
                                  'regular'=>$value->regular,
                                  'status' => $status, 
                                  'access' =>$user_group_name ,
                                  'sales_team_name'=>$sales_team_name,
                                  'sales_team_name_sub'=>$sales_team_name_sub
            
                                  );
                                
                                      $i++;
                        
                         
                         
                         
                         
                         
                         
                       }
                         
                         
                         
  
                   }

                         $filename='Customers_hdfc_virtual_account_'.$to_date; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");  

                   ?>


                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                          
                        <tr><th colspan="7">Customers HDFC Virtual Account <?php echo $to_date; ?></th></tr> 
                        <tr>

                          <th>ID</th>    
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Customer ID</th>
                          <th>Virtual Account</th>
                          <th>Sales Person</th>
                          <th>Opening Balance</th>
                          <th>Regular</th>
                         
            
                        </tr>
                      </thead>
                         


                        <tbody >
                            
                            <?php


                            foreach($array as $names)
                            {

                            
                             ?>
                         
                        <tr >
                           
                           <td><?php echo $names['id']; ?></td>
                           <td><?php echo $names['company_name']; ?></td>
                           <td><?php echo $names['phone']; ?></td>
                           <td>"<?php echo $names['customer_id_beta']; ?>"</td>
                           <td><?php echo $names['virtual_accountno']; ?></td>
                           <td><?php echo $names['sales_team_name']; ?></td>
                           <td><?php echo $names['opening_balance']; ?>
                             
                               <?php 

                               if($names['opening_balance']>0)
                               {



                                if($names['payment_status']==1){ echo "CR"; }
                                if($names['payment_status']==2){ echo "DR"; }


                                }


                              
                                ?>

                           </td>
                         
                           <td><?php echo $names['regular']; ?></td>
                            
                        </tr>
                               
                                <?php
                            }
                            
                            ?>


                            
                        
                      
                      </tbody>
                    </table>
                  



                   <?php



                   
                                    


  }
  
  
  public function fetch_data()
  {
      
      
      
      
                   $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     $search = $_GET['search'];
                     $searchsales = $_GET['searchsales'];
                     $archivefilter = $_GET['archivefilter'];
                     
                    //  echo $archivefilter;exit();
                     
                     if(isset($_GET['page_next']))
                     {
                         $offset = $_GET['page_next'];
                     }
                       $commen="";
                     if(isset($_GET['commen']))
                     {
                         $commen = $_GET['commen'];
                     }
                     
                     
                 if($archivefilter === '1'){
                  $del_id ='-1';
                  
                        $where="   AND archive_status =  '".$archivefilter."' ";
                        $sqls="";
                        if ($search != "")
                        {
                        
                          
                          $where .= " AND (company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR virtual_accountno LIKE '%" . $search . "%')";
                          
                          
                        }
                 }else{
                  $del_id ='0';
                     $where=" AND approved_status > 0 AND archive_status =  '".$archivefilter."'";
                     $sqls="";
                     if ($search != "")
                     {
                      
                        
                        $where .= " AND (company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR virtual_accountno LIKE '%" . $search . "%')";
                        
                        
                     }
                    }
                    // echo $del_id; exit();
                     if($searchsales>0)
                     {
                         $where .="  AND sales_team_id='" . $searchsales . "'";
                     }


                     if($commen=='0')
                     {

                      
                             $where .="  AND mark_vendor_id>'0'";
                             $this->db->query("UPDATE customers SET sales_head='1889',sales_team_id='1890',sales_group='48' WHERE mark_vendor_id>'0' AND deleteid=0");   

                     }
                     else
                     {
                           $where .="  AND mark_vendor_id IN ('0','1','-1')";
                     }





                       if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              
                                               $sales_group_id=implode("','",$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' AND sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,area,regular,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
                                            
                             
                     }
             

                     elseif( $search == '' && $this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                           $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,area,regular,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,archive_status,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                  
                                                                     
                                                
                                            
                             
                     }
                      elseif($this->session->userdata['logged_in']['access']=='11')
                     {
                         
                         
                         
                                             $sales_team_id = array($this->userid);
                                              $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                              foreach ($resultsales_team as $values) {
                                                  $sales_team_id[] = $values->sales_member_id;
                                              }
                                                 $sales_team_id=implode("','",$sales_team_id);
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,area,regular,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,archive_status,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='20')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' AND user_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,area,regular,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,archive_status,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' AND user_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     else
                     {
                         
                         
//echo "SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' $where ORDER BY id DESC";
//exit;

                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='".$del_id."' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      // echo "SELECT op,op_status,account_number,area,regular,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,archive_status,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' $where ORDER BY id DESC LIMIT $offset, $pagesize";
                      // exit;
                        
                       $query = $this->db->query("SELECT op,op_status,account_number,area,regular,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link,archive_status,approved_date,approved_by FROM `customers`  WHERE deleteid='".$del_id."' $where ORDER BY id DESC LIMIT $offset, $pagesize");

                     }
                    
                  
                
                    
                   
                   $result=$query->result();

                   
                   
                   $i=1;
                   $array=array();
                   foreach ($result as  $value)
                   {
                        if($value->archive_status=='0')
                        {
                          $archive_status='Active';
                        }
                        elseif($value->archive_status=='1'){
                              $archive_status='Archived';
                        }

                       
                       if($value->deleteid =='0' || $value->deleteid =='-1')
                       {
                           
                      
                       
                       
                        
                        $locality_name ='';
                        $route_id='';
                        $user_group = $this->Main_model->where_names('locality','id',$value->locality);
                        foreach ($user_group as  $row) {
                          $locality_name=$row->name;
                            $route_id=$row->route_id;
                        }
                        
                        
                         $route_name ='';
                        $user_group = $this->Main_model->where_names('route','id',$route_id);
                        foreach ($user_group as  $row) {
                          $route_name=$row->name;
                            
                        }
                        
                        $sales_team_name ='';
                         $sales_group_id=0;
                        if($value->sales_team_id>0)
                        {

                            $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                            foreach ($user_group_team as  $team) {
                              $sales_team_name=$team->name;
                              $sales_group_id=$team->sales_group_id;
                            }
                       

                        }
                        
                       
                        $user_group_name ='';
                        if($sales_group_id>0)
                        {
                            $user_group = $this->Main_model->where_names('sales_group','id',$sales_group_id);
                            foreach ($user_group as  $row) {
                              $user_group_name=$row->name;
                            }
                         }
                       
                       
                        $sales_team_name_sub ='';
                         if($value->sales_team_sub_id>0)
                        {
                            $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->sales_team_sub_id);
                            foreach ($$user_group_team_sub as  $teamsub) {
                              $sales_team_name_sub=$teamsub->name;
                            }
                        }
                       

                    if($value->status=='1')
                    {
                      $status='Active';
                    }
                    else
                    {
                      $status='InActive';
                    }
                    


                    $approved_by ='';
                    $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->approved_by);
                    foreach ($user_group_team_sub as  $teamsub) {
                      $approved_by=$teamsub->name;
                    }
                                       
                         
                    

                    if($val->op>0)
                    {

                          $val->op=$val->op;
                          $val->op_status=$val->op_status;

                    }
                    else
                    {


                        if($val->create_date>'2023-05-19')
                        {


                               $val->op=$val->opening_balance;
                               $val->op_status=$val->payment_status;


                        }
                        else
                        {

                              $val->op=$val->op;
                              $val->op_status=$val->op_status;
                          

                        }


                          
                       
                   


                    }
                    

                    if($value->virtual_accountno=='')
                    {

                      $value->virtual_accountno=$value->account_number;
                      $value->customer_id=$value->id;
                    }

                   
                      $value->customer_id=$value->id;
                    
                    
                      $array[] = array(
                                    
                                    
                                    'no' => $i, 
             
                                  'id' => $value->id, 
                                  
                                  'email' => $value->email, 
                                  'archive_status' => $archive_status, 
                                  'approved_date'=>$value->approved_date,
                                  'approved_by'=>$approved_by, 
                                  'regular' => $value->regular, 
                                  'area' => $value->area, 
                                  'phone' => $value->phone, 
                                  'company_name' => $value->company_name, 
                                  'pin' => $value->pin, 
                                  'route' => $route_name, 
                                  'locality' => $value->locality, 
                                  'locality_name' => $locality_name, 
                                  'gst' => $value->gst, 
                                  'tcs_status'=>$value->tcs_status,
                                  'gst_status' => $value->gst_status, 
                                  'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                                  'city' => $value->city, 
                                  'state' => $value->state,
                                  'factory_workshop' => $value->factory_workshop,
                                  'google_map_link' => $value->google_map_link, 
                                  'feedback_details' => $value->feedback_details,
                                  'ratings'=>$value->ratings,
                                  'price_rateings'=>$value->price_rateings,
                                  'delivery_time_rateings'=>$value->delivery_time_rateings,
                                  'quality_rateings'=>$value->quality_rateings,
                                  'response_commission'=>$value->response_commission,
                                  'commission_feed_back'=>$value->commission_feed_back,
                                  'opening_balance'=>round($value->op,2),
                                  'payment_status'=>$value->op_status,
                                  'credit_period'=>$value->credit_period,
                                  'credit_limit'=>$value->credit_limit,
                                  'landline'=>$value->landline,
                                  'customer_id'=>$value->customer_id,
                                  'virtual_accountno'=>$value->virtual_accountno,
                                  'customer_id_beta'=>str_replace('ZARON0', '', $value->virtual_accountno),
                                  'customer_type'=>$value->customer_type,
                                  'sales_team_id'=>$value->sales_team_id,
                                  'sales_team_sub_id'=>$value->sales_team_sub_id,
                                  'approved_status'=>$value->approved_status,
                                  'status' => $status, 
                                  'access' =>$user_group_name ,
                                  'sales_team_name'=>$sales_team_name,
                                  'sales_team_name_sub'=>$sales_team_name_sub
            
                                  );
                                
                                      $i++;
                        
                         
                         
                         
                         
                         
                         
                       }
                         
                         
                         

                   }
                   
                   
                    $myData = array('PortalActivity' => $array, 'totalCount' => $count);
                    echo json_encode($myData);
                    
                                                               


  }

   public function fetch_data_verification()
  {
      
      
      
                     $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     $search = base64_decode($_GET['search']);
                     $searchsales = $_GET['searchsales'];
                     
                     
                     
                     if(isset($_GET['page_next']))
                     {
                         $offset = $_GET['page_next'];
                     }
                     
                 
                     
                     $where="";
                     $sqls="";

                      $filter=0;
                     if(isset($_GET['filter']))
                     {
                         $filter = $_GET['filter'];
                     }

                     if($filter==0)
                     {
                        $where.="  AND approved_status IN ('0')";
                     }
                     else
                     {
                        $where.="  AND approved_status IN ('-1')";
                     }
                     



                     


                     if ($search != "")
                     {
                        
                        $where .= " AND (company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR virtual_accountno LIKE '%" . $search . "%')";
                        
                        
                     }
                    
                     if($searchsales!='undefined')
                     {
                         $where.="  AND sales_team_id='" . $searchsales . "'";
                     }
                     
                                                        

                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              
                                               $sales_group_id=implode("','",$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission, commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         
                                              $sales_group_id=array();
                                              $query = $this->db->query("SELECT id,define_saleshd_id FROM `admin_users`  WHERE id='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                    $sales_group_id[]=$values->define_saleshd_id;
                                                                              
                                              }
                                              
                                              
                                                     
                                               $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                               foreach ($poin_to_member as $point) {
                                                    $sales_group_id[] = $point->define_saleshd_id;
                                               }
                                              
                                             
                                             
                                              $sales_group_id=implode("','",$sales_group_id);
                                             
                                             
                                                                        
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_group_id."') $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,commission_feed_back,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,commission_feed_back,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='11')
                     {
                         
                         
                                              $sales_team_id = array($this->userid);
                                              $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                              foreach ($resultsales_team as $values) {
                                                  $sales_team_id[] = $values->sales_member_id;
                                              }
                                                 $sales_team_id=implode("','",$sales_team_id);
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_team_id."')  $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,commission_feed_back,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_team_id."')  $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='20')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,commission_feed_back,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     else
                     {
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                       $query = $this->db->query("SELECT  op,op_status,account_number,virtual_accountno,customer_id,approved_date,create_date,update_date,approved_by,user_id,approved_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,commission_feed_back,response_commission,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                           
                     }
                    
                  
                
                    
                   
                   $result=$query->result();
                   
                   
                   $i=1;
                   $array=array();
                   foreach ($result as  $value)
                   {
                       
                       
                       if($value->deleteid=='0')
                       {
                           
                      
                       
                       
                        
                        $locality_name ='';
                        $route_id='';
                        $user_group = $this->Main_model->where_names('locality','id',$value->locality);
                        foreach ($user_group as  $row) {
                          $locality_name=$row->name;
                            $route_id=$row->route_id;
                        }
                        
                        
                         $route_name ='';
                        $user_group = $this->Main_model->where_names('route','id',$route_id);
                        foreach ($user_group as  $row) {
                          $route_name=$row->name;
                            
                        }
                        
                        $sales_team_name ='';
                        $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                        foreach ($user_group_team as  $team) {
                          $sales_team_name=$team->name;
                          $sales_group_id=$team->sales_group_id;
                        }
                       
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$sales_group_id);
                        foreach ($user_group as  $row) {
                          $user_group_name=$row->name;
                        }
                       
                       
                        $sales_team_name_sub ='';
                        $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->sales_team_sub_id);
                        foreach ($$user_group_team_sub as  $teamsub) {
                          $sales_team_name_sub=$teamsub->name;
                        }




                        $createdby ='';
                        $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->user_id);
                        foreach ($user_group_team_sub as  $teamsub) {
                          $createdby=$teamsub->name;
                        }


                           $approved_by ='';
                        $user_group_team_sub = $this->Main_model->where_names('admin_users','id',$value->approved_by);
                        foreach ($user_group_team_sub as  $teamsub) {
                          $approved_by=$teamsub->name;
                        }
                       
                      

                    if($value->status=='1')
                    {
                      $status='Active';
                    }
                    else
                    {
                      $status='InActive';
                    }
                    
                      if($value->virtual_accountno=='')
                    {

                      $value->virtual_accountno=$value->account_number;
                      $value->customer_id=$value->id;
                    }


                      $value->customer_id=$value->id;
                    
                    
                      $array[] = array(
                                    
                                    
                                    'no' => $i, 
             
                                  'id' => $value->id, 
                                  'createdby' => $createdby, 
                                  'approved_by'=>$approved_by,
                                  
                                  'email' => $value->email, 
                                  'phone' => $value->phone, 
                                  'company_name' => $value->company_name, 
                                  'pin' => $value->pin, 
                                  'route' => $route_name, 
                                  'locality' => $value->locality, 
                                  'locality_name' => $locality_name, 
                                  'gst' => $value->gst, 
                                  'tcs_status'=>$value->tcs_status,
                                  'gst_status' => $value->gst_status, 
                                  'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                                  'city' => $value->city, 
                                  'state' => $value->state,
                                  'approved_status' => $value->approved_status,
                                  'factory_workshop' => $value->factory_workshop,
                                  'google_map_link' => $value->google_map_link, 
                                  'feedback_details' => $value->feedback_details,
                                  'ratings'=>$value->ratings,
                                  'price_rateings'=>$value->price_rateings,
                                  'delivery_time_rateings'=>$value->delivery_time_rateings,
                                  'quality_rateings'=>$value->quality_rateings,
                                  'response_commission'=>$value->response_commission,
                                  'commission_feed_back'=>$value->commission_feed_back,
                                  'opening_balance'=>$value->opening_balance,
                                  'payment_status'=>$value->payment_status,
                                  'credit_period'=>$value->credit_period,
                                  'credit_limit'=>$value->credit_limit,
                                   'approved_date'=>$value->approved_date,
                                   'customer_id'=>$value->customer_id,
                                   'virtual_accountno'=>$value->virtual_accountno,
                                  'landline'=>$value->landline,
                                  'create_date'=>$value->create_date,
                                  'customer_type'=>$value->customer_type,
                                  'sales_team_id'=>$value->sales_team_id,
                                  'sales_team_sub_id'=>$value->sales_team_sub_id,
                                  'status' => $status, 
                                  'access' =>$user_group_name ,
                                  'sales_team_name'=>$sales_team_name,
                                  'sales_team_name_sub'=>$sales_team_name_sub
            
                                  );
                                
                                      $i++;
                        
                         
                         
                         
                         
                         
                         
                       }
                         
                         
                         

                   }
                   
                   
                    $myData = array('PortalActivity' => $array, 'totalCount' => $count);
                    echo json_encode($myData);
      
                    
  }
    public function fetch_data_inter_link()
  {
      
      
      
      
                     
                 
                     
                   
                 
                     $i=1;
                     $result= $this->Main_model->where_names('customer_inter_link','deleteid','0');
                     foreach ($result as  $value) {



                        $array[] = array(

                            'id' => $value->id, 
                            'no' => $i,
                            'customer_from_name' => $value->customer_from_name, 
                            'customer_to_name' => $value->customer_to_name 
                            

                        );
                        
                        
                        $i++;

                     }

                    echo json_encode($array);

  }
  
      
  public function fetch_data_table_trasport_base_mass_search() {
         $pagenum = $_GET['page'];
        
         $pagesize = $_GET['size'];
         $offset = ($pagenum - 1) * $pagesize;
        
        
        
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        
        $tablename = $_GET['tablename'];
        $tablesub = $_GET['tablesub'];
        
        $order_base = $_GET['order_base'];
        $order_base_set = $_GET['order_base'];
        
        $assign = $_GET['assign'];
          
        
        
        
      
        $i = 1;
        $myData=array();
        $array = array();
        $where = "";
        $sqls = "";
        $sales_search="";
        if($search != "") 
        {
            
                     
                  $searchdata=explode("-",$search);
                  $where .= " AND b.id='" . $searchdata[0] . "'";
            
                  $sqls .= " AND customer_id='" . $searchdata[0] . "'";
       
        
       
        
      
        
        if ($this->session->userdata['logged_in']['access'] == '17')
        {
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0'   AND user_id='" . $this->userid . "' $sqls  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT a.* FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id WHERE a.deleteid='0'    AND a.user_id='" . $this->userid . "' $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        } elseif ($this->session->userdata['logged_in']['access'] == '11' || $this->session->userdata['logged_in']['access'] == '12') {
            
             $sales_team_id = array($this->userid);
            $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->sales_member_id;
            }
            
            
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.user_id IN (' . $sales_team_id . ')';
            $userslog1 = ' AND  user_id IN (' . $sales_team_id . ')';
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0'   $userslog1 $sqls  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT a.* FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id WHERE a.deleteid='0'   $where $userslog ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        } elseif ($this->session->userdata['logged_in']['access'] == '16') {
           $sales_team_id = array($this->userid);
            $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  a.sales_group IN (' . $sales_team_id . ')';
            $userslog1 = ' AND  sales_group IN (' . $sales_team_id . ')';
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0'   $userslog1  $sqls ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            
            $query = $this->db->query("SELECT a.* FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id WHERE a.deleteid='0'   $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
        } else {
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0'  $sqls  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            
           
            
            $query = $this->db->query("SELECT a.* FROM $tablename as a LEFT JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as c ON a.user_id=c.id LEFT JOIN driver as d ON a.driver_id=d.id LEFT JOIN vehicle as v ON a.vehicle_id=v.id WHERE a.deleteid='0'  $where ORDER BY a.id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            
            
        }
        
        
        foreach ($result as $value) {
            $tablename_sub = $tablesub;
            
            
            
            
            
            $totalamount = 0;
            $commission = 0;
        
           
                
            $loadstatus=1;
            $resulttotal = $this->Main_model->where_names_three_order_by_new($tablename_sub, 'order_id', $value->id, 'paricel_mode', $value->paricel_mode,'deleteid', '0', 'id', 'DESC');
             
           
           
           
           
            $loadamount=0;
            foreach ($resulttotal as $tot)
            {
                
                
                $totalamount+= $tot->amount + $tot->commission;
                $commission+= $tot->commission;
                
                
                 $resultload = $this->Main_model->where_names('sales_load_products', 'order_product_id', $tot->id);
            
                 foreach ($resultload as $valueload)
                 {
                    if($valueload->loadstatus==1)
                    {
                       
                        $loadamount+= $valueload->amount;
                        
                    }
                    
    
                 }
                    
                
                
            }
            
            $minisroundoff = $value->roundoff;
            $roundoffstatus = $value->roundoffstatus;
            $discount = $value->discount;
            if ($roundoffstatus == 1) {
                $discountfulltotal = $totalamount - $discount + $minisroundoff;
            } else {
                $discountfulltotal = $totalamount - $discount - $minisroundoff;
            }
            
            
            
            
            
            
            
         

            
            
            
            $order_by = "";
            $orderby = $this->Main_model->where_names_two_order_by('admin_users', 'id', $value->user_id, 'deleteid', '0', 'id', 'DESC');
            foreach ($orderby as $orderbyval) {
                $order_by = $orderbyval->name;
            }
            $order_byd = "";
            $vehicle_id="";
            $orderbyd = $this->Main_model->where_names_two_order_by('driver', 'id', $value->driver_id, 'deleteid', '0', 'id', 'DESC');
            foreach ($orderbyd as $orderbyvald) {
                $order_byd = $orderbyvald->name;
                $vehicle_id = $orderbyvald->vehicle_id;
            }
            
            $vehicle_number="";
            
            if($value->vehicle_id!=0)
            {
                
            
                   $vehicleorderbyd = $this->Main_model->where_names_two_order_by('vehicle', 'id', $value->vehicle_id, 'deleteid', '0', 'id', 'DESC');
                    foreach ($vehicleorderbyd as $orderbyvaldvv) {
                        
                        $vehicle_number = $orderbyvaldvv->vehicle_number;
                    }
            }
            
            
            $company_name = "";
            $email = "";
            $phone = "";
            $address = "";
            $tcs_status=0;
            $customers = $this->Main_model->where_names('customers', 'id', $value->customer_id);
            foreach ($customers as $csval) {
                $company_name = $csval->company_name;
                $email = $csval->email;
                $phone = $csval->phone;
                 $tcs_status = $csval->tcs_status;
                $address = $csval->address1 . ' ' . $csval->address2 . ' ' . $csval->landmark . ' ' . $csval->zone . ' ' . $csval->pincode. ' ' . $csval->state;
            }
            
                    
            $tcsamount=0;
            
            if($tcs_status==1)
            {
                                
                                                            $tcsamount=round($discountfulltotal*0.1/100);
                                
            }
           
            $discountfulltotal=$discountfulltotal+$tcsamount;
            
            
            
            
            
                                        $whole = floor($discountfulltotal); 
                                        $decimal1 = $discountfulltotal - $whole;
                                        $totalval= round($decimal1,3);
                            
                            
                            
                                       
                                       
                                        if($totalval!=0)
                                        {
                            
                            
                                                if($totalval>0.5)
                                                {
                                                       $getplusevalue=1-$totalval;
                                                       $discountfulltotal=$discountfulltotal+$getplusevalue;
                                                    
                            
                                                }
                                                else
                                                {
                            
                                                       $discountfulltotal=round($discountfulltotal-$totalval);                                                       
                                                       
                            
                                                }
                            
                            
                                        }

            
            
            
            
            
            
            
            
            
            
            
            
            
            if ($value->assign_status == 8) {
                $value->finance_status = 8;
            }
            if ($value->assign_status == 2) {
                $value->finance_status = 2;
            }
            
            
            if ($value->delivery_status == 1) {
                $delivery_status = "Client Scope";
            } else {
                $delivery_status = "Own Scope";
            }
            
            
            
            if($tablename!='orders_process')
            {
                
            
                $value->finance_status=$value->order_base;
            }
            
            
            $array[] = array('no' => $i,'tablename'=>$tablename, 'delivery_status' => $delivery_status,'payment_mode' => $value->payment_mode,'id' => $value->id,'loadamount' => round($loadamount,2),'vehicle_number' => $vehicle_number, 'base_id' => base64_encode($value->id), 'loading_status' => $value->loading_status,'selforder' => $value->selforder,'return_status' => $value->return_status,'order_no' => $value->order_no, 'name' => $company_name, 'email' => $email, 'order_byd' => $order_byd, 'totalamount' => round($discountfulltotal,2), 'commission' => round($commission,2), 'delivery_charge' => $value->delivery_charge, 'assign_status' => $value->assign_status, 'phone' => $phone, 'reason' => $value->reason, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->finance_status, 'assign_date' => date('d-m-Y', strtotime($value->assign_date)), 'assign_time' => $value->assign_time,'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time);
            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        
        }
        
        echo json_encode($myData);
    }
    
    
    public function fetch_data_search()
  {
      
      
      
      
                   $pagenum = $_GET['page'];
                     $pagesize = $_GET['size'];
                     $offset = ($pagenum - 1) * $pagesize;
                     $search = $_GET['search'];
                     
                     
                     
                     
                     $where="";
                     $array=array();
                     if($search != "")
                     {
                        
                        
                         $searchdata=explode("-",$search);
                        
                         $where = " AND id='" . $searchdata[0] . "'";
                         $query = $this->db->query("SELECT * FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC ");
                         $result=$query->result();
                   
                     
                     
                    
                    
                  
                   
                   $i=1;
                   
                   foreach ($result as  $value)
                   {
                       
                       
                       
                       
                       
                        
                        $locality_name ='';
                        $route_id='';
                        $user_group = $this->Main_model->where_names('locality','id',$value->locality);
                        foreach ($user_group as  $row) {
                          $locality_name=$row->name;
                            $route_id=$row->route_id;
                        }
                        
                        
                         $route_name ='';
                        $user_group = $this->Main_model->where_names('route','id',$route_id);
                        foreach ($user_group as  $row) {
                          $route_name=$row->name;
                            
                        }
                        
                        $sales_team_name ='';
                        $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                        foreach ($user_group_team as  $team) {
                          $sales_team_name=$team->name;
                          $sales_group_id=$team->sales_group_id;
                        }
                       
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$sales_group_id);
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
                    
                    
                    
                    
                    $fulltotal = 0;
                        $resultorder = $this->db->query("SELECT SUM(b.commission) as total_commission,SUM(b.amount) as total_amount,SUM(a.discount) as total_discount FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id WHERE a.customer_id='" . $customer_id . "'  AND a.finance_status='5'  AND b.deleteid=0 AND a.deleteid=0 AND a.order_base=1");
                        $resultorder = $resultorder->result();
                        foreach ($resultorder as $valueorder) {
                            $total_amount = $valueorder->total_amount + $valueorder->total_commission;
                            $total_discount = $valueorder->total_discount;
                            $fulltotal = $total_amount - $total_discount;
                        }
                    
                        
                        
                        if($value->credit_limit>0)
                        {
                            
                       
                                
                                $useage = 125 / $value->credit_limit * 100;
                                if (is_nan($useage) == 1) {
                                    $useage = 0;
                                }
                                if ($useage > 100) {
                                    $useage = 100;
                                }
                        
                        }
                        else
                        {
                            $useage = 0;
                        }
                        
                        
                        $useagedata = round($useage, 1);
                        
                        $fulltotal_usage = round($fulltotal, 1) . ' Rs';
                      $array[] = array(
                                    
                                    
                                    'no' => $i, 
             
                                  'id' => $value->id, 
                                  'useage' => $useagedata,
                                  'fulltotal_usage'=>$fulltotal_usage,
                                  'email' => $value->email, 
                                  'phone' => $value->phone, 
                                  'company_name' => $value->company_name, 
                                  'pin' => $value->pin, 
                                  'route' => $route_name, 
                                  'locality' => $value->locality, 
                                  'locality_name' => $locality_name, 
                                  'gst' => $value->gst, 
                                  'gst_status' => $value->gst_status, 
                                  'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->pincode.' '.$value->city.' '.$value->state,
                                  'city' => $value->city, 
                                  'state' => $value->state,
                                  'factory_workshop' => $value->factory_workshop,
                                  'google_map_link' => $value->google_map_link, 
                                  'feedback_details' => $value->feedback_details,
                                  'ratings'=>$value->ratings*20,
                                  'price_rateings'=>$value->price_rateings,
                                  'delivery_time_rateings'=>$value->delivery_time_rateings,
                                  'quality_rateings'=>$value->quality_rateings,
                                  'response_commission'=>$value->response_commission,
                                  'opening_balance'=>$value->opening_balance,
                                  'payment_status'=>$value->payment_status,
                                  'credit_period'=>$value->credit_period,
                                  'credit_limit'=>$value->credit_limit,
                                  'landline'=>$value->landline,
                                  'customer_type'=>$value->customer_type,
                                  'sales_team_id'=>$value->sales_team_id,
                                  'status' => $status, 
                                  'access' =>$user_group_name ,
                                  'sales_team_name'=>$sales_team_name
            
                                  );
                                
                                      $i++;
                        
                         
                         
                         
                         
                         
                         
                         
                         
                         
                         

                   }
                   
                   
                   
                   }
                   
                   
                    echo json_encode($array);

  }
  
  
  
  
  
  public function fetch_data_get_ledger()
  {

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     
                     
                    $result= $this->Main_model->where_three_names_limit('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid',0,$limit);
                    
                    
                    $i=1;
                    $array=array();
                    foreach ($result as  $value) {
                       
                     

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
                      'collected_amount' => $value->collected_amount, 
                      'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                      'payment_time' => $value->payment_time

                    );


                         $i++;

                   }

                    echo json_encode($array);

  }
  
  
  
  
  
  
  
  
  public function fetch_data_get_ledger_view()
  {



                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $filter=$_GET['filter'];
                     $cnn_status=$_GET['cnn_status'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id!=0)
                     {
                         
                         if($customer_id!='')
                         {
                              $sql=" AND a.customer_id='".$customer_id."'";
                              $sql1=" AND a.customer_id='".$customer_id."'";
                         }
                         
                        
                     }


                     $sql.=" AND a.cnn_status='".$cnn_status."'";
                      $sql1.=" AND a.cnn_status='".$cnn_status."'";
                     
                     $basearray=array();
                   
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }



                     $currentdate=date("Y-m-d");
                     if($currentdate==$todate)
                     {

                        //$todate=date('Y-12-31');
                     }
                     
                    
                         
                    $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'"; 


                    if($filter==1)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $base_ids=array();
                         $bill_total=array();
                         $total_picked_amount=array();

                        if($_GET['test'] && $_GET['test'] == 'true'){
                            // $resultsub_production=$this->db->query("SELECT SUM(a.amount) AS totalvalue, b.tcsamount, b.roundoff, b.roundoffstatus, b.discount FROM order_product_list_process AS a JOIN orders_process AS b ON a.order_id = b.id WHERE a.deleteid = 0 AND b.customer_id = '9002' AND DATE(b.assign_status_0_date) <= '2024-03-11' AND a.return_status = 0 AND b.order_base > 0 AND a.delivery_status = 0 AND b.reason != 'Return To Re-sale' AND b.deleteid = 0 AND( b.assign_status_1_date IS NULL OR b.assign_status_1_date > '2024-03-11' ) AND( b.assign_status_2_date IS NULL OR b.assign_status_2_date > '2024-03-11' ) GROUP BY b.id ORDER BY a.id DESC");




                               $resultsub_production=$this->db->query("SELECT 


                                        b.id as base_ids,
                                        b.current_packed_balence,
                                        b.total_picked_amount,
                                        b.total_picked_amount_confirmed,
                                        b.total_picked_amount AS totalvalue,
                                        a.rate*a.qty AS amount,
                                        os.bill_total AS bill_total,
                                        a.picked_status,a.return_status,
                                        b.current_packed_balence AS picked_status,
                                        b.order_id as id,
                                        b.order_no   


                                    FROM order_product_list_process AS a
                                   JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                   JOIN orders_process AS os ON a.order_id = os.id
                                   JOIN all_ledgers al ON al.order_id = b.order_id

                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = '".$customer_id."'  AND b.order_base>0
                                        AND b.reason != 'Return To Re-sale'
                                        AND b.deleteid IN('0','88')  AND b.return_status IN ('0','2') AND b.return_status_check=0
                                        AND (
                                            CASE
                                                WHEN b.assign_status_0_date <= '$todate'  AND (b.assign_status_12_date > '$todate' OR b.assign_status_12_date IS NULL)  AND (b.assign_status_11_date > '$todate' OR b.assign_status_11_date IS NULL)  AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL)  THEN 1
                                                ELSE 0
                                            END
                                        )  
                                    GROUP BY 
                                        b.id 
                                    ORDER BY 
                                        a.id DESC");


                         // $resultsub_production=$this->db->query("SELECT b.id,b.order_no FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND b.assign_status_0_date <= '".$todate."'  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0  AND b.reason!='Return To Re-sale' AND b.deleteid=0 AND 
                         //                                          (b.assign_status_1_date IS NULL OR b.assign_status_1_date > '".$todate."') AND
                         //                                         (b.assign_status_2_date IS NULL OR b.assign_status_2_date > '".$todate."')  GROUP BY b.id ORDER BY a.id DESC");

                       }
                       else{

                           $resultsub_production=$this->db->query("SELECT b.id,b.order_no FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND b.assign_status IN ('0')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0  AND b.reason!='Return To Re-sale' AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                       }

                         $resultsub_production=$resultsub_production->result();



                       

                            
                           
                         // echo $inproduction_total_return_val;
                         // exit;
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {


                                                                       $return_amount=$val->return_amount;
                                                                        $gst=$return_amount*18/100;
                                                                        $return_amount=round($return_amount+$gst,2);


                                                                        if($val->totalvalue>0)
                                                                        {
                                                                           $totalvalue=$val->totalvalue;
                                                                           //$totalvalue=$val->bill_total;
                                                                        }
                                                                        else
                                                                        {
                                                                            $totalvalue=$val->bill_total;
                                                                        }
                                                                    
                                                                        
                                                                        $production=round($totalvalue);


                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;


                                $current_packed_balence=0;
                                $inproduction_total_return_val=0;
                               
                                //$total_picked_amount=$val->total_picked_amount-$inproduction_total_return_val;


                                $basearray[]=array(

                                  'bill_total'=>$production,
                                  'total_picked_amount'=>$val->total_picked_amount,
                                  'total_picked_amount_return'=>$inproduction_total_return_val,
                                  'current_packed_balence'=>$current_packed_balence,
                                  'order_id'=>$val->id


                                );
                            

                                                                                        
                         }


// echo "<pre>";print_r($basearray);
// exit;

                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND a.order_no IN ('".$order_noss."')";
                             
                               

                    }

                     if($filter==2)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();

                           if($_GET['test'] && $_GET['test'] == 'true'){
 
                         $resultsub_production=$this->db->query("SELECT

                          b.id as base_ids,os.bill_total,b.total_picked_amount,b.total_picked_amount_confirmed,b.order_id as id,b.order_no   FROM 
                                        order_product_list_process AS a 
                                    
                                        JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                        JOIN orders_process AS os ON a.order_id = os.id



                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = '".$customer_id."'  AND b.order_base > 0
                                         AND b.reason != 'Return To Re-sale' AND b.return_status IN ('0','2') AND b.return_status_check=0
                                                                      AND b.deleteid = 0  
                                                                      AND (
                                                                           CASE
                                                                              WHEN (b.delivery_status = 2 AND b.assign_status_11_date <= '$todate' AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL) AND (b.assign_status_2_date > '$todate' OR b.assign_status_2_date IS NULL)) OR (b.delivery_status = 1 AND b.assign_status_11_date <= '$todate' AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL)) THEN 1
                                                                              ELSE 0
                                                                          END
                                                                      )  
                                                                  GROUP BY 
                                                                      b.id 
                                                                  ORDER BY 
                                                                      a.id DESC
                                                                  ");

                       }
                       else
                       {

                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND  b.assign_status IN ('11','12','1')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                       }

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                             $order_ids[]=$val->id;
                             $order_nos[]=$val->order_no;


                              if($val->total_picked_amount_confirmed>0)
                                                                               {
                                                                $totalvalue=$val->total_picked_amount_confirmed;
                                                                               }
                                                                               else
                                                                               {
                                                                  $totalvalue=$val->total_picked_amount;
                                                                               }

                             $basearray[]=array(

                              'bill_total'=>$val->bill_total,
                              'total_picked_amount'=>$totalvalue,
                              'total_picked_amount_return'=>0,
                              'current_packed_balence'=>0,
                              'order_id'=>$val->id


                            );
                            

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                             
                               

                    }


                     if($filter==3)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();

                           if($_GET['test'] && $_GET['test'] == 'true'){

                         $resultsub_production=$this->db->query("SELECT 


                          b.id as base_ids,os.bill_total,b.total_picked_amount,b.total_picked_amount_confirmed,b.order_id as id,b.order_no   FROM 
                                        order_product_list_process AS a 
                                    
                                        JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                        JOIN orders_process AS os ON a.order_id = os.id



                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = $customer_id 
                                        AND b.reason != 'Return To Re-sale' 
                                        AND b.deleteid = 0  AND b.return_status IN ('0','2') AND b.return_status_check=0
                                        AND (
                                             CASE
                                                WHEN (b.delivery_status = 2 AND (b.assign_status_2_date <= '$todate' AND ((b.trip_end_date >= '$todate' OR b.trip_end_date IS NULL) AND (b.trip_end_date IS NULL AND b.trip_start_date <= '$todate' )) ) )  THEN 1
                                                ELSE 0
                                            END
                                        )  
                                    GROUP BY 
                                        b.id 
                                    ORDER BY 
                                        a.id DESC");

                       }
                       else{

                        $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                       }

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;


                                                                             if($val->total_picked_amount_confirmed>0)
                                                                               {
                                                                $totalvalue=$val->total_picked_amount_confirmed;
                                                                               }
                                                                               else
                                                                               {
                                                                  $totalvalue=$val->total_picked_amount;
                                                                               }


                            $basearray[]=array(

                              'bill_total'=>$val->bill_total,
                              'total_picked_amount'=>$totalvalue,
                              'total_picked_amount_return'=>0,
                              'current_packed_balence'=>0,
                              'order_id'=>$val->id


                            );
                            

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                               

                    }
                            
  
  if($filter==4)
                    {

                            $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT osc.re_order_no  FROM order_sales_return_complaints osc LEFT JOIN orders_process as b ON osc.order_no=b.order_no WHERE osc.customer='".$customer_id."' AND osc.remarks  = 'Return To Re-Sale' ");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->re_order_no;
                            // $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                        //  $order_noss=implode("','", $order_nos);
                        $sql=" AND a.reference_no IN ('".$ids."') ";
                               

                    }

                    // if($filter != 1 && $filter != 2 && $filter != 3 && $filter != 4){
                    //      $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");
                    // }
                          
                          
                          
                       
                   // echo "SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."'  AND a.party_type=1 AND a.opening_balance_status='0' $sql   ORDER BY a.payment_date,a.id ASC";
                   // exit;

  
                    $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."'  AND a.party_type=1 AND a.opening_balance_status='0' $sql   ORDER BY a.payment_date,a.id ASC");
                    $result=$result->result();




// echo "SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."'  AND a.party_type=1 AND a.opening_balance_status='0' $sql   ORDER BY a.id ASC";
// exit;










                
                   
                 
                   $payment_date=date('d-m-Y',strtotime($formdate));
                   
                   
                   
                   $resultopeing_new=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal,a.payment_date FROM all_ledgers  as a JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=1  AND a.payment_date < '".$formdate."' $sql1 ORDER BY a.payment_date ASC");
                   $resultopeing_new=$resultopeing_new->result();
                   $openingbalance_new=0;
                   $openingbalancec_new=0;
                   $openingbalanced_new=0;
                   $openingbalanceval_new=0;
                  
                   
                   
                    foreach ($resultopeing_new as  $valuess)
                    {
                              $credits_new=$valuess->creditstotal;
                              
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }


                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }
                              


                                 if($payment_date == '01-04-2022')
                                 {
                                     $payment_date=date('d-m-Y',strtotime($valuess->payment_date));
                                 }

                              
                              $debits_new=$valuess->debitstotal;
                              $openingbalance_new=  $credits_new-$debits_new;
                               $openingbalanceval_new=  $credits_new-$debits_new;
                              
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                       }
                       
                  
                       

                              
                              if($getstatus1_new==1)
                              {
                                  $openingbalanced_new=$openingbalance_new;
                                  $openingbalancec_new=0;
                              }
                              else
                              {
                                   $openingbalanced_new=0;
                                   $openingbalancec_new=$openingbalance_new;
                              }




                         $openingbalance=0;
                         $openingbalancec=0;
                         $openingbalanced=0;
                         $openingbalanceval=0;
                          






                        $opdebits= $openingbalanced+$openingbalanced_new;
                        $opcredits= $openingbalancec+$openingbalancec_new;
                        $openingbalance= $opcredits-$opdebits;
                        $openingbalance=abs($openingbalance);
                        
                        $openingbalance_data= $opcredits-$opdebits;
                        
                        if($openingbalance_data<0)
                        {
                                                    $getstatus1_new=1;
                                                    
                        }
                        else
                        {
                                                    $getstatus1_new=0;
                                                    
                        }
                        
                        
                       $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                       $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                       $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                       
                       if($totalvalopeingbalance>0)
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
                      'name' => '', 
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
                      'balance' => round($openingbalance,2),
                      'getstatus' => $getstatus1_new,
                      'bank_name'=>'',
                      'payment_date' =>$payment_date, 
                      'payment_time' => ''
                       
                       );
                   
                   
                   
                 
                       $balanceold=array($openingbalance_data);
                       foreach ($result as  $value)
                       {
                              


                                 if(empty($basearray)) 
                                 {


                                     $credits=$value->credits;
                                     $debits=$value->debits;


                                } 
                                else 
                                {

                                 
                                          $total_picked_amount=0;
                                          $bill_total=0;

                                    for ($kj=0; $kj <count($basearray) ; $kj++) { 
                                      
                                     
                                      $order_id=$basearray[$kj]['order_id'];
                                      if($value->order_id==$order_id)
                                      {


                                        $total_picked_amount_return=$basearray[$kj]['total_picked_amount_return'];

                                      
                                        $total_picked_amount+=$basearray[$kj]['total_picked_amount']-$total_picked_amount_return;
                                        $bill_total+=$basearray[$kj]['bill_total']-$total_picked_amount_return;

                                      
                                      


                                           $credits=0;
                                           if($total_picked_amount>0)
                                           {
                                              $debits=$total_picked_amount;
                                           }
                                           else
                                           {
                                              $debits=$bill_total;
                                           }
                                           
                                      }

                                    }


                                }

                           
                              $balanceold[]=  $credits-$debits;

                             


                           
                       }
                       
                       
                     
                      
                   
                   $i=2;
                    $j=1;
                   $array=array();





                   foreach ($result as  $value)
                   {
                       
                       
                          $account_head_idname="";

                          $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                          $result_account_head_text=$result_account_head->result();
                          
                         foreach($result_account_head_text as $ass)
                         {
                                                    $account_head_idname=$ass->name;
                                                   
                         }

                        

                       
                                                     $addclass="";
                                                   if($value->changes_status==1)
                                                   {
                                                       $addclass="bgcolorchange";
                                                       
                                                   }




                                                     $commission_button_view=0;
                                                     if($value->process_by=='Commission Payment GST' || $value->process_by=='Commission Payment LEDGER')
                                                     {



                                                        $order_no_comm= $value->order_no;
                                                        $order_no_comm=explode('-',$order_no_comm);
                                                        $commission_button_view=str_replace('#','',$order_no_comm[0]);
                                                        
                                                         
                                                     }
                       
                       
                          
                                         $name="";
                                         $resultvent= $this->Main_model->where_names('customers','id',$value->customer_id);
                                       foreach ($resultvent as  $valuess) {
                                          $name= $valuess->name; 
                                          $name= $valuess->company_name;
                                         
                                       }
                                       $bank_name="";
                                       $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                       foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
                                       }

                                       if($value->bank_id > 0)
                                       {
                                                
                                            if($value->bank_id==25 && $value->account_heads_id_2==116)
                                            {

                                                  

                                                  if($value->process_by=='Collection Verified By MD')
                                                  {
                                                    $account_head_idname = 'COLLECTION VERIFICATION DISCOUNT';
                                                  }
                                                  if($value->process_by=='Order Payment Received By Driver')
                                                  {
                                                    $account_head_idname = 'CASH IN HAND';
                                                  }


                                            }
                                            else
                                            {
                                              $account_head_idname = $bank_name;
                                            }
                                            
                                       

                                       }


                                       $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
                                       
                                       
                                       $username="";



                                      if($value->edited_by>0)
                                      {
                                        $value->user_id=$value->edited_by;
                                        $username='Changed By : ';
                                      }
 


                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                        $username='Deleted By : ';
                                      }

                                       $username_base="";
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess) {
                                          $username.= $valuess->name;
                                          $username_base= $valuess->name; 
                                          
                                         
                                       }


                                       
                                       
                                       
                                       
                                          $credits=$value->credits;
                                          $debits=$value->debits;
                                          $currentrowbalance=$credits-$debits;
                                          
                                          
                                         
                                       
                                      
                                              $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                     
                                       
                                            
                                         $seti=$i;
                                          
                                       $link="#";
                                       $resultorder= $this->Main_model->where_names('orders_process','id',$value->order_id);
                                       
                                       if(count($resultorder)>0)
                                       {
                                           
                                              foreach ($resultorder as  $valueorder) 
                                              {
                                                 
                                                  $order_id= $valueorder->id;
                                                 
                                              }
                                              $link=base64_encode($order_id);
                                       }
                                      
                         
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
                                            
                                            
                                             $edit_status=0;
                                             if($link=='#')
                                             {
                                                 $edit_status=1;
                                             }
                                             
                                             if($value->notes=='Sales Return')
                                             {
                                                 $edit_status=0;
                                             }


                                             if($value->order_id>0)
                                             {
                                                          $value->payment_date=$value->order_date;
                                             }
                                             


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
                                                $voucher_name = 'PAYMENT';
                                                   $voucher_name = $account_head_idname;

                                                // $value->reference_no='PAYMENT - '.$value->voucher_no;

                                              }
                                              elseif($value->voucher_base=='receipt'){
                                                $voucher_name = 'RECEIPT';
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

                                if(!empty($basearray)) 
                                 {


                                     $total_picked_amount=0;
                                     $bill_total=0;
                                     for ($kj=0; $kj <count($basearray) ; $kj++) { 
                                      
                                    // $total_picked_amount=$basearray[$kj]['total_picked_amount'];
                                     // $bill_total=$basearray[$kj]['bill_total'];
                                      $order_id=$basearray[$kj]['order_id'];
                                      if($value->order_id==$order_id)
                                      {


                                            $total_picked_amount_return=$basearray[$kj]['total_picked_amount_return'];
                                            $total_picked_amount+=$basearray[$kj]['total_picked_amount']-$total_picked_amount_return;
                                            $bill_total+=$basearray[$kj]['bill_total']-$total_picked_amount_return;

                                               $value->credits=0;
                                               if($total_picked_amount>0)
                                               {
                                                  $value->debits=$total_picked_amount;
                                               }
                                               else
                                               {
                                                  $value->debits=$bill_total;
                                               }
                                           
                                      }

                                    }




                                }



                     
                    $array[] = array(
                        
                        
                        'no' => $j, 
                            'id' => $value->id, 
                            'name' => $name, 
                            'order_id' => $link, 
                      'order_no' => $value->order_no, 
                      'payment_mode' => $value->payment_mode, 
                      'reference_no' => $value->reference_no,
                      'addclass' => $addclass,
                      'org_amount' => $value->org_amount,
                      'username'=>$username,
                      'commission_button_view'=>$commission_button_view,
                      'customer_id' => $value->customer_id,
                      'notes' => $value->notes.' | '.$value->deletemod,
                      'amount' => $value->amount, 
                      'deletemod' => $value->deletemod,
                      'voucher_no' => $voucher_no .'-' .$value->voucher_no,
                      'paid_status' => $value->paid_status, 
                      'dummy_customer_id' => $value->dummy_customer_id,
                      'dummy_customer_name' =>$value->dummy_customer_name,
                      'dummy_party_type' => $value->dummy_party_type,
                      'dummy_amount' => $value->dummy_amount,
                      'Payoff' => $value->payin, 
                      'Payout' => $value->payout,
                      'debits' => round($value->debits,2),
                      'credits' => round($value->credits,2),
                      'party_to_party' => $value->party_to_party,
                      'process_by' => $value->process_by,
                      'balance' => $total,
                      'getstatus' => $getstatus,
                      'edit_status' => $edit_status,
                      'bank_name'=>$bank_name,
                      'username_base'=>$username_base,
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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  public function fetch_data_get_ledger_view_commen()
  {

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $filter=$_GET['filter'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }
                         
                        
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
                     
                     
                      $resultfetch = array_merge($array1, $array2);
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                               $formdate=$this->from_date;
                               $todate=$this->to_date;  
                              
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.opening_balance_status='0' $sql ORDER BY a.payment_date,a.id ASC");
                            $result=$result->result();
                     }
                     else
                     {
                         
                          $payment_status=$_GET['payment_status'];
                          
                         
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid='".$deleteid."'  AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0' $sql   ORDER BY a.payment_date,a.id ASC");
                           
                          }
                          else
                          {
                             $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.paid_status='".$payment_status."'  AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0' $sql ORDER BY a.payment_date,a.id ASC");
                          
                          }
                         
                         
                         
                          $result=$result->result();
                         
                     }
                    

















                
                   
                 
                   $payment_date=date('d-m-Y',strtotime($formdate));
                   
                   
                   
                   $resultopeing_new=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal,a.payment_date FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='1' $sql ORDER BY a.payment_date ASC");
                   $resultopeing_new=$resultopeing_new->result();
                   $openingbalance_new=0;
                   $openingbalancec_new=0;
                   $openingbalanced_new=0;
                   $openingbalanceval_new=0;
                  
                   
                   
                    foreach ($resultopeing_new as  $valuess)
                    {
                              $credits_new=$valuess->creditstotal;
                              
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }

                              if($payment_date == '01-04-2022')
                              {
                                     $payment_date=date('d-m-Y',strtotime($valuess->payment_date));
                              }
                              
                              $debits_new=$valuess->debitstotal;
                              $openingbalance_new=  $credits_new-$debits_new;
                              $openingbalanceval_new=  $credits_new-$debits_new;
                              
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                       }
                       
                  
                       
                      
                       
                   
                   
                              
                              
                              if($getstatus1_new==1)
                              {
                                  $openingbalanced_new=$openingbalance_new;
                                  $openingbalancec_new=0;
                              }
                              else
                              {
                                   $openingbalanced_new=0;
                                   $openingbalancec_new=$openingbalance_new;
                              }

























                   
                   
                   
                   $resultopeing=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal FROM all_ledgers  as a  WHERE a.payment_date < '".$formdate."'  AND a.deleteid='".$deleteid."' AND  a.opening_balance_status='0' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  $sql ORDER BY a.payment_date ASC");
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
                                            
                              $openingbalance=abs($openingbalance);
                              
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













                        $opdebits= $openingbalanced+$openingbalanced_new;
                        $opcredits= $openingbalancec+$openingbalancec_new;
                        $openingbalance= $opcredits-$opdebits;
                        $openingbalance=abs($openingbalance);
                        
                        $openingbalance_data= $opcredits-$opdebits;
                        
                        if($openingbalance_data<0)
                        {
                                                    $getstatus1_new=1;
                                                    
                        }
                        else
                        {
                                                    $getstatus1_new=0;
                                                    
                        }
                        
                        
                        
                        

                       $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                       $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                       $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                       
                        if($totalvalopeingbalance>0)
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
                      'name' => '', 
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
                      'balance' => round($openingbalance,2),
                      'getstatus' => $getstatus1_new,
                      'bank_name'=>'',
                      'payment_date' =>$payment_date, 
                      'payment_time' => ''
                       
                       );
                   
                   
                  
                   
                   
                   
                   
                  
                   
                   
                   
                   
                   
                 
                       $balanceold=array($openingbalance_data);
                       foreach ($result as  $value)
                       {
                            $credits=$value->credits;
                            $debits=$value->debits;
                              
                            //$newCredit = round($value->credits,2);
                            $balanceold[]=  $credits-$debits;
                           
                       }
                       
                       
                     
                      
                   
                   $i=2;
                    $j=1;
                   $array=array();



                     
                   foreach ($result as  $value) {
                       
                       
                       
                       
                                                     $addclass="";
                                             	     if($value->changes_status==1)
                                             	     {
                                             	         $addclass="bgcolorchange";
                                             	         
                                             	     }
                       
                       
                          
                                       $name="";
                                       $resultvent= $this->Main_model->where_names('customers','id',$value->customer_id);
                                       foreach ($resultvent as  $valuess) {
                                          $name= $valuess->name; 
                                          $name= $valuess->company_name;
                                         
                                       }
                                       
                                       $resultvent= $this->Main_model->where_names('vendor','id',$value->customer_id);
                                       foreach ($resultvent as  $valuess) {
                                          $name= $valuess->name; 
                                          
                                         
                                       }
                                       
                                    

                                         $resultventss= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultventss as  $valuesss) {
                                          
                                          $username_base= $valuesss->name; 
                                          
                                         
                                       }
                                       
                                       
                                       $username="";






                                       if($value->edited_by>0)
                                      {
                                        $value->user_id=$value->edited_by;
                                      }

                                      if($value->deleted_by>0)
                                      {
                                        $value->user_id=$value->deleted_by;
                                      }
                                      



                                       $resultvent= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                       foreach ($resultvent as  $valuess)
                                       {


                                          $username= $valuess->name; 
                                          
                                         
                                       }
                                        
                                       
                                       
                                       
                                          $credits=$value->credits;
                                          $debits=$value->debits;
                                          $currentrowbalance=$credits-$debits;
                                          
                                          
                                         
                                       
                                      
                                              $balancett=0;
                                              for($k=0;$k<$i;$k++)
                                              {
                                                 
                                                        $balancett+=$balanceold[$k];
                                                  
                                              }
                                         
                                              $balance=$balancett;
                     
                                       
                                            
                                         $seti=$i;
                                          
                                         $link="#";
                                       $resultorder= $this->Main_model->where_names('orders_process','order_no',$value->order_no);
                                       
                                       if(count($resultorder)>0)
                                       {
                                           
                                              foreach ($resultorder as  $valueorder) 
                                              {
                                                 
                                                 if($valueorder->deleteid=='0'){
                                                    $order_id= $valueorder->id; 
                                                 }
                                                
                                                  
                                                 
                                              }
                                            $link=base64_encode($order_id);
                                       }
                                      
                         
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


                              $account_head_idname="";

                          $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                          $result_account_head_text=$result_account_head->result();
                          
                         foreach($result_account_head_text as $ass)
                         {
                                                    $account_head_idname=$ass->name;
                                                   
                         }            

                                       $bank_name="";

                                       if($value->notes!='Purchase Invoice Create')
                                       {


                                       


                                          

                                           
                                           $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                           foreach ($resultvent as  $valuess) {
                                              $bank_name= $valuess->bank_name;
                                              $account_head_idname= $valuess->bank_name; 
                                              
                                             
                                           } 

                                         


                                       }

                                              

                                            if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }
     


                                             $edit_status=0;
                                             if($link=='#')
                                             {
                                                 $edit_status=1;
                                             }
                                             
                                             if($value->notes=='Sales Return')
                                             {
                                                 $edit_status=0;
                                             }


if($value->process_by=='Voucher')
{ 
  $account_head_idname=$value->dummy_customer_name;
}

    $newAmount = $value->amount;
    $newCredit = round($value->credits,2);

                    $array[] = array(
                        
                        
                      'no' => $j, 
                      'id' => $value->id, 
                      'name' => $name,
                      'account_head_idname' => $account_head_idname, 
                      'order_id' => $link, 
                      'order_no' => $value->order_no, 
                      'payment_mode' => $value->payment_mode, 
                      'reference_no' => $value->reference_no,
                      'addclass' => $addclass,
                      'org_amount' => $value->org_amount,
                      'username'=>$username,
                      'customer_id' => $value->customer_id,
                      'notes' => $value->notes, 
                      'process_by' => $value->process_by,
                      'deletemod' => $value->deletemod,
                      'amount' =>  $newAmount, 
                      'paid_status' => $value->paid_status, 
                      'Payoff' => $value->payin, 
                      'Payout' => $value->payout,
                      'debits' => round($value->debits,2),
                      'credits' => $newCredit,
                      'party_to_party' => $value->party_to_party,
                      'balance' => $total,
                      'getstatus' => $getstatus,
                      'edit_status'=>$edit_status,
                      'bank_name'=>$bank_name,
                      'username_base'=>$username_base,
                      'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                      'payment_time' => $value->payment_time
                      

                    );

                    
                        $i++;
                        $j++;
                        

                   }


                    $totalarray=array_merge($array2,$array);
                    
                    
                    echo json_encode($totalarray);

  }
  
  
  
  
  
  
  
  
  
  

  
  
  
  
  
  
  
  
  
  
    public function fetch_data_get_ledger_view_group()
  {

                    
                       
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                      $cnn_status=$_GET['cnn_status'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql=" AND a.customer_id='".$customer_id."'";
                        
                        
                     }


                     $sql.=" AND a.cnn_status='".$cnn_status."'";
                     
                         
                     $sqlgetfecth_user='';
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $customer_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              $sales_group_id=implode(',',$sales_group_id);
                                              $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                              $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                           $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         $customer_id=array();              
                                               $sales_group_id=array($this->userid);
                                              
                                             
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_sub_id IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                           
                             
                     }
                     elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
                     {
                         
                         
                         
                          
                                              
                                                $sales_team_id = array($this->userid);
                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                foreach ($resultsales_team as $values) {
                                                    $sales_team_id[] = $values->sales_member_id;
                                                }
                                               
                                               
                                               
                                                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                                foreach ($poin_to_member as $point) {
                                                    $sales_team_id[] = $point->id;
                                                }
                                                
                                                
                                               
                                             
                                               
                                                
                                                   $customer_id=array();                                     
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".implode("','", $sales_team_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                  
                                               $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                               
                                               
                                               
                                            
                             
                     }
                     else
                     {
                         
                                              $sqlgetfecth_user='';
                       
                     }
                     
                   
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     if($formdate=='undefined')
                     {
                              
                              $formdate=date('2023-07-01');
                              $todate=date('Y-m-d');
                               $result=$this->db->query("SELECT a.customer_id,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op_status,b.op FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 $sql $sqlgetfecth_user GROUP BY a.customer_id  ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                     }
                     else
                     {
                           

                             // $sql.=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
                              $result=$this->db->query("SELECT a.customer_id,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op_status,b.op FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id   JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 $sql $sqlgetfecth_user GROUP BY a.customer_id  ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                         
                     }






               
                   $i=1;
                   $array=array();
                   $temp  = array();
                   foreach ($result as  $value) 
                   {




                       $totalbalance=0;
                       $totalbalanceop=0;

                      $result2=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date <= '".$todate."' AND cnn_status='".$cnn_status."'");
                        $result2=$result2->result();
                       foreach ($result2 as  $set) {
                          $totalbalance= $set->totalbalance;
                       }


                        $result3=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date<'".$formdate."' AND cnn_status='".$cnn_status."'");
                        $result3=$result3->result();
                       foreach ($result3 as  $set3) {
                          $totalbalanceop= $set3->totalbalance;
                       }
   
                                  

                                             $pageno=""; 
                                             if(!in_array($value->sales_name, $temp))
                                             {
                                                   $pageno=$value->sales_name;
                                                   $temp[] = $value->sales_name;
                                             }
                                                                       
                                             $subresult=array();
                                      
                                              $payment_status="";
                                              $opening_balance_dr="";
                                              $opening_balance_cr="";
                                                      

                                                      $value->op=$totalbalanceop;

                                              if($value->op>0)
                                              {


                                            
                                                     if($value->op_status==1)
                                                     {
                                                        $opening_balance_cr=$value->op;
                                                        $opening_balance_dr="";
                                                        $payment_status='CR';
                                                     }
                                                     if($value->op_status==2)
                                                     {
                                                         $payment_status='DR';   
                                                         $opening_balance_dr=$value->op;
                                                         $opening_balance_cr="";
                                                     }


                                             }
                                             else
                                             {

                                                     if($value->payment_status==1)
                                                     {
                                                        //$opening_balance_cr=$value->opening_balance;
                                                        //$opening_balance_dr="";
                                                        //$payment_status='CR';
                                                     }
                                                     if($value->payment_status==2)
                                                     {
                                                         //$payment_status='DR';   
                                                         //$opening_balance_dr=$value->opening_balance;
                                                         //$opening_balance_cr="";
                                                     }

                                             }







                                                    //$valueset=$value->creditstotal-$value->debitstoatal;
                                            $valueset=$totalbalance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;

                                                $DR=round($valueset,2); 
                                                $DR=abs($DR);
                                                $CR=0;

                                            }
                                            else
                                            {
                                                $getstatus=0;

                                                $CR=round($valueset,2); 
                                                $CR=abs($CR);
                                                $DR=0;

                                            }

                                            $total=round($valueset,2); 
                                             $total=abs($total);
                                             
                                             
                                             
                            
                                        if($totalbalanceop>0)
                                        {
                                          $opening_balance_dr=0;
                                          $opening_balance_cr=$totalbalanceop;
                                        }
                                        else
                                        {

                                           $opening_balance_dr=abs($totalbalanceop);
                                           $opening_balance_cr=0;

                                        }
                                     
                                
                        $result4=$this->db->query("SELECT SUM(debits) as debitstoatal,SUM(credits) as creditstotal FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."' AND cnn_status='".$cnn_status."'");
                        $result4=$result4->result();
                       foreach ($result4 as  $sets) {
                          $value->debitstoatal= $sets->debitstoatal;
                          $value->creditstotal= $sets->creditstotal;
                       }
                                    
                                $array[] = array(
                                    
                                    
                                         'no' => $i, 
                                         'id' => $value->id, 
                                         'name' => $pageno, 
                                         'company_name' => $value->company_name, 
                                         'customer_id' => $value->customer_id, 
                                         'payment_status' => $payment_status,
                                         'opening_balance' => round($value->opening_balance,2),
                                         'opening_balance_dr' => round($opening_balance_dr,2),
                                         'opening_balance_cr' => round($opening_balance_cr,2),
                                         'debits' => round($value->debitstoatal,2),
                                         'credits' => round($value->creditstotal,2),
                                         'getstatus' => $getstatus,
                                         'balance' => $total,
                                         'CR' => $CR,
                                         'DR' => $DR,
                                         'subresult'=>$subresult
                                  
            
                                );


                        $i++;

                   }

                     echo json_encode($array);
                     
                     
                     

  }
  
  
  
  
   public function fetch_data_get_ledger_view_group_new(){

                    
                       
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $cnn_status=$_GET['cnn_status'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     $trail_balance=$_GET['trail_balance'];
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND a.customer_id='".$customer_id."'";
                        
                        
                     }

                      $sql.=" AND a.cnn_status='".$cnn_status."'";
                         
                     $sqlgetfecth_user='';
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $customer_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              $sales_group_id=implode(',',$sales_group_id);
                                              $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                              $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                           $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         $customer_id=array();              
                                               $sales_group_id=array($this->userid);
                                              
                                             
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_sub_id IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                           
                             
                     }
                     elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
                     {
                         
                         
                         
                          
                                              
                                                $sales_team_id = array($this->userid);
                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                foreach ($resultsales_team as $values) {
                                                    $sales_team_id[] = $values->sales_member_id;
                                                }
                                               
                                               
                                               
                                                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                                foreach ($poin_to_member as $point) {
                                                    $sales_team_id[] = $point->id;
                                                }
                                                
                                                
                                               
                                             
                                               
                                                
                                                   $customer_id=array();                                     
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".implode("','", $sales_team_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                  
                                               $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                               
                                               
                                               
                                            
                             
                     }
                     else
                     {
                         
                                              $sqlgetfecth_user='';
                       
                     }
                     
                     $cnn="";
                    if($cnn_status==1)
                    {
                        $cnn=" AND b.cnn='YES'";
                    }




                          $commenbase='';
                          if($trail_balance==0)
                          {
                                    //$commenbase=" AND b.mark_vendor_id IN ('0','1','-1')";
                          }

                          $commenbase=" AND b.mark_vendor_id IN ('0','1','-1')";

                     $having1='';
                   

                     if($customer_id==0)
                     {
                         
                             if($cnn_status==0)
                             {
                              
                               $having1=' HAVING checkdata>0';

                             }
                               
                        
                        
                     }

                     //$having1=' HAVING checkdata>0';
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     //NEW DATE
 $Stset="";
 if($trail_balance==1)
{
 $Stset=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
}
                         

                     if($formdate=='undefined')
                     {
                              
                              $formdate=date('2023-07-01');
                              $todate=date('Y-m-d');
                               $result=$this->db->query("SELECT  SUM(a.credits+a.debits) as checkdata,SUM(a.credits-a.debits) as totalbalance,a.customer_id,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op_status,b.op,b.cnn_opening_balance,b.cnn_payment_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id LEFT JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 $Stset $commenbase $sql $sqlgetfecth_user $cnn GROUP BY a.customer_id $having1 ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                     }
                     else
                     {
                           

                             // $sql.=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
                              $result=$this->db->query("SELECT SUM(a.credits+a.debits) as checkdata,SUM(a.credits-a.debits) as totalbalance,a.customer_id,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op_status,b.op,b.cnn_opening_balance,b.cnn_payment_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  LEFT JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 $Stset $commenbase $sql $sqlgetfecth_user $cnn GROUP BY a.customer_id $having1 ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                         
                     }

                     $commaSeperatedCustomer = '';
                  
                    // OPTIMIZATION OF CUSTOMER LOOP TO REDUCE THE NUMBER OF QUERIES TO EXECUTE - STARTS
                    
                    // 0. AS THE CUSTOMER STRING WILL BE HUGE LENGTH, INCREASE THE SETTING IN MYSQL
                   // $limitExtend = " SET SESSION group_concat_max_len = 25 ";

                   // $this->db->query( $limitExtend);


                    // 1. GET ALL CUSTOMER ID AS COMMA SEPERATED
                    $commaSeperatedCustomer = implode(', ', array_map(function ($obj) {
                      if (is_object($obj) && isset($obj->customer_id)) {
                          return strval($obj->customer_id);
                      } elseif (is_array($obj) && isset($obj['customer_id'])) {
                          return strval($obj['customer_id']);
                      } else {
                          return null; // Handle the case when 'product_id' is not found
                      }
                  }, $result));


                     
                 $array=array();
                    $temp  = array();
                
                if($commaSeperatedCustomer!='')
                {

//NEW DATE
$Stsets1=" AND payment_date<='".$todate."'";
$Stsets2=" AND payment_date<='".$formdate."'";
 if($trail_balance==1)
{
 $Stsets1=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."'";
 //$Stsets2=" AND payment_date BETWEEN '".$formdate."' AND '".$todate."'";
 $Stsets2=" AND payment_date<='".$formdate."'";
}





                    // 2. GET LEDGER DATA FOR $result2 USING SINGLE QUERY AND LOOP THEM AND CREATE AN ARRAY HAVING CUSTOMER ID AS KEY 
            $result2New=$this->db->query("SELECT SUM(credits+debits) as checkdata,SUM(credits-debits) as totalbalance,customer_id FROM all_ledgers WHERE customer_id IN ($commaSeperatedCustomer) AND party_type=1 AND deleteid=0 AND cnn_status='".$cnn_status."' $Stsets1  GROUP BY customer_id $having1")->result();
                    // 3. GET LEDGER DATA FOR $result3 USING SINGLE QUERY AND LOOP THEM AND CREATE AN ARRAY HAVING CUSTOMER ID AS KEY
            $result3New=$this->db->query("SELECT SUM(credits+debits) as checkdata,SUM(credits-debits) as totalbalance,customer_id  FROM all_ledgers WHERE customer_id  IN ($commaSeperatedCustomer)  AND party_type=1 AND deleteid=0  AND cnn_status='".$cnn_status."' $Stsets2 GROUP BY customer_id $having1")->result();
                    // 4. GET LEDGER DATA FOR $result4 USING SINGLE QUERY AND LOOP THEM AND CREATE AN ARRAY HAVING CUSTOMER ID AS KEY
          $result4New=$this->db->query("SELECT SUM(credits+debits) as checkdata,SUM(credits-debits) as totalbalance,SUM(debits) as debitstoatal,SUM(credits) as creditstotal, customer_id FROM all_ledgers WHERE customer_id  IN ($commaSeperatedCustomer)  AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."' AND cnn_status='".$cnn_status."'  GROUP BY customer_id $having1")->result();
                    // OPTIMIZATION OF CUSTOMER LOOP TO REDUCE THE NUMBER OF QUERIES TO EXECUTE - ENDS


//echo "SELECT SUM(credits+debits) as checkdata,SUM(credits-debits) as totalbalance,SUM(debits) as debitstoatal,SUM(credits) as creditstotal, customer_id FROM all_ledgers WHERE customer_id  IN ($commaSeperatedCustomer)  AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."' AND cnn_status='".$cnn_status."'  GROUP BY customer_id $having1";
//exit;
                    // print_r($result2New);
                    // print_r($result3New);
                    // print_r($result4New);
                    // exit;
                    $i=1;
                  
                  
                    $result2Data = null;
                    $result3Data = null;
                    $result4Data = null;
                   
                    foreach ($result2New as  &$row2) {
                      $result2Data[$row2->customer_id]['total_balance'] = $row2->totalbalance;
                    }

                    foreach ($result3New as &$row3) {
                      $result3Data[$row3->customer_id]['total_balance'] = $row3->totalbalance;
                    }
                    foreach($result4New as &$row4) {
                      $result4Data[$row4->customer_id]['debitstoatal'] = $row4->debitstoatal;
                      $result4Data[$row4->customer_id]['creditstotal'] = $row4->creditstotal;
                    }


                  }

                    foreach ($result as  $value) {

                      $totalbalance=0;
                      $totalbalanceop=0;

                      // $result2=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date <= '".$todate."' AND cnn_status='".$cnn_status."'");
                      // $result2=$result2->result();
                      // foreach ($result2 as  $set) {
                      //   $totalbalance= $set->totalbalance;
                      // }

                      // COMMENT $result2 QUERY AND REPLACE $totalbalance FROM ARRAY


                      $totalbalance = $result2Data[$value->customer_id]['total_balance'];



                      // $result3=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date<'".$formdate."' AND cnn_status='".$cnn_status."'");
                      // $result3=$result3->result();
                      // foreach ($result3 as  $set3) {
                      //   $totalbalanceop= $set3->totalbalance;
                      // }
                      
                      // COMMENT $result3 QUERY AND REPLACE $totalbalanceop FROM ARRAY

                      $totalbalanceop= $result3Data[$value->customer_id]['total_balance'];


                      $pageno=""; 
                      if(!in_array($value->sales_name, $temp)){
                            $pageno=$value->sales_name;
                            $temp[] = $value->sales_name;
                      }
                                                
                      $subresult=array();
                                      
                      $payment_status="";
                      $opening_balance_dr="";
                      $opening_balance_cr="";
                              
                      $value->op=$totalbalanceop;

                      if($value->op>0){
                              if($value->op_status==1){
                                $opening_balance_cr=$value->op;
                                $opening_balance_dr="";
                                $payment_status='CR';
                              }
                              if($value->op_status==2){
                                  $payment_status='DR';   
                                  $opening_balance_dr=$value->op;
                                  $opening_balance_cr="";
                              }

                      }else{

                              if($value->payment_status==1)
                              {
                                //$opening_balance_cr=$value->opening_balance;
                                //$opening_balance_dr="";
                                //$payment_status='CR';
                              }
                              if($value->payment_status==2)
                              {
                                  //$payment_status='DR';   
                                  //$opening_balance_dr=$value->opening_balance;
                                  //$opening_balance_cr="";
                              }

                      }

                      //$valueset=$value->creditstotal-$value->debitstoatal;
                      $valueset=$totalbalance;
                      
                      if($valueset<0){
                          $getstatus=1;

                          $DR=round($valueset,2); 
                          $DR=abs($DR);
                          $CR=0;

                      }else{
                          $getstatus=0;

                          $CR=round($valueset,2); 
                          $CR=abs($CR);
                          $DR=0;

                      }

                      $total=round($valueset,2); 
                      $total=abs($total);
                                            
                      if($totalbalanceop>0){
                        $opening_balance_dr=0;
                        $opening_balance_cr=$totalbalanceop;
                      }else{
                          $opening_balance_dr=abs($totalbalanceop);
                          $opening_balance_cr=0;
                      }

                      // $result4=$this->db->query("SELECT SUM(debits) as debitstoatal,SUM(credits) as creditstotal FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."' AND cnn_status='".$cnn_status."'");
                      // $result4=$result4->result();
                      // foreach ($result4 as  $sets) {
                      //   $value->debitstoatal= $sets->debitstoatal;
                      //   $value->creditstotal= $sets->creditstotal;
                      // }

                      // COMMENT $result4 QUERY AND REPLACE $value->debitstoatal AND $value->creditstotal FROM ARRAY
                        $value->debitstoatal= $result4Data[$value->customer_id]['debitstoatal'];
                        $value->creditstotal= $result4Data[$value->customer_id]['creditstotal'];


 $checktotal=round($value->debitstoatal+$value->creditstotal+$total);

              if($checktotal>0)
              {
                           $done_set='d-none1';
              }
              else
              {
                           $done_set='d-none';
              }



                      if($cnn_status==1)
                      {

                            $opening_balance_cr="";
                            $opening_balance_cr="";
                        if($value->cnn_opening_balance>0){
                              if($value->cnn_payment_status==1){
                                $opening_balance_cr=$value->cnn_opening_balance;
                                $opening_balance_dr="";
                                $payment_status='CR';
                              }
                              if($value->cnn_payment_status==2){
                                  $payment_status='DR';   
                                  $opening_balance_dr=$value->cnn_opening_balance;
                                  $opening_balance_cr="";
                              }

                         }




                        $array[] = array(
                                'no' => $i, 
                                'id' => $value->id, 
                                'done_set' => $done_set,
                                'name' => $pageno, 
                                'company_name' => $value->company_name, 
                                'customer_id' => $value->customer_id, 
                                'payment_status' => $payment_status,
                                'opening_balance' => round($value->opening_balance,2),
                                'opening_balance_dr' => round($opening_balance_dr,2),
                                'opening_balance_cr' => round($opening_balance_cr,2),
                                'debits' => round($value->debitstoatal,2),
                                'credits' => round($value->creditstotal,2),
                                'getstatus' => $getstatus,
                                'balance' => $total,
                                'CR' => $CR,
                                'DR' => $DR,
                                'subresult'=>$subresult
                      );

                      $i++;


                      


                      }  
                      else
                      {


                        $array[] = array(
                                'no' => $i, 
                                'id' => $value->id,
                                'done_set' => $done_set, 
                                'name' => $pageno, 
                                'company_name' => $value->company_name, 
                                'customer_id' => $value->customer_id, 
                                'payment_status' => $payment_status,
                                'opening_balance' => round($value->opening_balance,2),
                                'opening_balance_dr' => round($opening_balance_dr,2),
                                'opening_balance_cr' => round($opening_balance_cr,2),
                                'debits' => round($value->debitstoatal,2),
                                'credits' => round($value->creditstotal,2),
                                'getstatus' => $getstatus,
                                'balance' => $total,
                                'CR' => $CR,
                                'DR' => $DR,
                                'subresult'=>$subresult
                      );

                      $i++;

                      }

                      

                   }

                     echo json_encode($array);
                     
                     
                     

  }

  
  
  
  
   public function fetch_data_get_ledger_view_group_commen_beta()
  {











                     
                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $formdateset=$_GET['formdate'];

                     if($formdate==date('Y-m-d'))
                     {
                         $formdate=date('2023-10-01');
                     }
                     $todate=$_GET['todate'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     $customer_id_datas=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     $array1=array();
                     $array2=array();
                     if($customer_id!=0)
                     {
                         
                      
                         
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }




                                               $group=" ";
                         
                         
                         
                         
                        
                     }
                     else
                     {
                         
                         
                                          $resultlocality=$this->db->query("SELECT mark_vendor_id,id FROM customers WHERE  deleteid=0 AND mark_vendor_id>0");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }


                                               $group=" GROUP BY a.customer_id";
                         
                         
                     }
                     $resultfetch = array_merge($array1, $array2);
                   
                     
                   
                     
                                 if($formdate!='undefined')
                                 {
                                     $sql=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
                                 }
                                 else
                                 {


                                   $formdate=date('Y-m-01');
                                   $todate=date('Y-m-d');
                                                
                                 }
                    
                   
                                  $i=1;





                  

  $resultsub=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal FROM all_ledgers as a   WHERE  a.deleteid=0 AND a.party_type IN ('1','3') AND a.cnn_status=0 AND  a.customer_id IN ('".implode("','", $resultfetch)."')   $sql  $group ORDER BY a.party_type ASC");
                                  $resultsub=$resultsub->result();
                                       
                                   
                                       $subresult=array();
                                       $temp = array();
                                       $url_array=array();
                                       $company_name_array=array();
                                       foreach ($resultsub as  $valuesub) 
                                       {
                                                 

                                               $payment_status=""; 
                                               $company_name=""; 
                                               $customer_id="";
                                               $resultlocality= $this->Main_model->where_names('customers','id',$valuesub->customer_id);
                                               foreach($resultlocality as $vl)
                                               {



                                                       $customer_id=$vl->id;
                                                   
                                                       $payment_status_value=$vl->op_status;
                                                       $company_name=$vl->company_name;


                                                       $vendor_id=$vl->mark_vendor_id;
                                                       $customer_id_s=$vl->id;


                                                       $opening_balance=$vl->op;
                                                       $vl='Customer';


                        $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$valuesub->customer_id."&formdate=".$formdateset."&todate=".$todate;
                                                   
                                                   
                                               }


                                            $payment_status="";  
                                            $resultlocalitys= $this->Main_model->where_names('vendor','id',$valuesub->customer_id);

                                            if(count($resultlocalitys)>0)
                                            {


                                               foreach($resultlocalitys as $vls)
                                               {
                                                   
                                                       $payment_status_value=$vls->op_status;
                                                       $vendor_id=$vls->id;
                                                       $company_name=$vls->name;
                                                       $opening_balance=$vls->op;
                                                       $mark_customer_id=$vls->mark_customer_id;
                                                       $customer_id_s=$vls->mark_customer_id;
                                                       
                                                       $vl='Vendor';

                                                       $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$mark_customer_id."&formdate=".$formdateset."&todate=".$todate;
                                                   
                                                   
                                               }




                                             }








$sqls=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
$sqlsvv=" AND a.payment_date<'".$formdate."'";









 $opeing_balal=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a   WHERE  a.deleteid=0 AND a.party_type IN ('1','3') AND  a.customer_id IN ('".$customer_id_s."','".$vendor_id."') AND a.cnn_status=0   $sqlsvv  ORDER BY a.party_type ASC");
                  $opeing_balal=$opeing_balal->result();
                  foreach ($opeing_balal as $value_op) {
                   $opening_balance=round($value_op->totalsum,2);
                  }
                        



                                             
                        
                                           
                                           
                                          
                                                 if($opening_balance>0)
                                                 {
                                                    $payment_status='CR';
                                                 }
                                                 if($opening_balance<0)
                                                 {
                                                    $payment_status='DR'; 
                                                   // $opening_balance=$opening_balance;  
                                                 }
                
$sqlss=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
//$sqlss=" AND a.payment_date<'".$todate."'";
                  $close_balal=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum FROM all_ledgers as a   WHERE  a.deleteid=0 AND a.party_type IN ('1','3') AND  a.customer_id IN ('".$customer_id_s."','".$vendor_id."') AND a.cnn_status=0 $sqls ORDER BY a.party_type ASC");
                  $close_balal=$close_balal->result();
                  foreach ($close_balal as $value_cl) {
                   $closeing_balance=round($value_cl->totalsum,2);
                  }



                                            $valueset=$closeing_balance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                           
                                              $total=round($valueset,2); 
                                              $total=abs($total);


                                              



                                      $data_driver['base']='customer';
                                      $data_driver['customer_id']=$customer_id;
                                      $data_driver['name']=$company_name;
                                      
                                       $data_driver['debit']=round($valuesub->debitstoatal,2);
                                       $data_driver['credit']=round($valuesub->creditstotal,2);





                                       $company_name_array[]=$company_name;
                                        $url_array[]=$url;
                                      
                                      
   
                                                              $subresult[] = array(
                                               
                                        
                                                                    'no' => $i, 
                                                                    'id' => $valuesub->id, 
                                                                    'name' => $company_name, 
                                                                    'url' => $url, 
                                                                    'customer_id' => $customer_id, 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $payment_status,
                                                                    'opening_balance' =>abs($opening_balance),
                                                                    'opening_balance_tot' =>$opening_balance,
                                                                    'debits' => round($data_driver['debit'],2),
                                                                    'credits' => round($data_driver['credit'],2),
                                                                    'getstatus' => $getstatus,
                                                                    'balance_tot' => round($valueset,2),
                                                                    'balance' => abs($total)
                                                              
                                        
                                                             );



                                       $i++;
                                          
                             }




$company_name_array= array_unique($company_name_array);
$company_name_array=implode('|', $company_name_array);
$company_name_array=explode('|', $company_name_array);

$url_array= array_unique($url_array);
$url_array=implode('|', $url_array);
$url_array=explode('|', $url_array);





$main_array=array();
   $ss=1;  
for ($j=0; $j <count($company_name_array) ; $j++){ 




    

$subarray=array();
           $opening_balance_final=0;
           $debit_final=0;
           $credits_final=0;
           $balance_final=0;
           foreach ($subresult as $value) {



            if($company_name_array[$j]==$value['name'])
            {

                         $opening_balance_final=$value['opening_balance_tot'];
                         $debit_final+=$value['debits'];
                         $credits_final+=$value['credits'];
                         $balance_final=$value['balance_tot'];



                                                             $subarray[] = array(
                                               
                                        
                                                                     
                                                                    'id' => $value['id'], 
                                                                    'name' => $value['name'], 
                                                                    'url' => $value['url'], 
                                                                    'customer_id' => $value['customer_id'], 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $value['payment_status'],
                                                                    'opening_balance' =>abs($value['opening_balance']),
                                                                    'opening_balance_tot' =>$value['opening_balance_tot'],
                                                                    'debits' => round($value['debits'],2),
                                                                    'credits' => round($value['credits'],2),
                                                                    'getstatus' => $value['getstatus'],
                                                                    'balance_tot' => round($value['balance_tot'],2),
                                                                    'balance' => abs($value['total'])
                                                              
                                        
                                                             );



           }
            
           }



                                                  if($balance_final>0)
                                                  {
                                                    $getstatus=0;
                                                  }
                                                  else
                                                  {
                                                    $getstatus=1;
                                                  }



                                                 if($opening_balance_final>0)
                                                 {
                                                    $payment_status='CR';
                                                 }
                                                 else
                                                 {
                                                    $payment_status='DR'; 
                                                     
                                                 }
                       

    $main_array[]=array('name'=>$company_name_array[$j],'urls'=>$url_array[$j],'no'=>$ss,'opening_balance_tot'=>$opening_balance_final,'opening_balance'=>abs($opening_balance_final),'debits'=>$debit_final,'credits'=>$credits_final,'balance_tot'=>$balance_final,'balance'=>abs($balance_final),'payment_status'=>$payment_status,'getstatus'=>$getstatus,'subarray'=>$subarray);



$ss++;


}     




                                 
                         
                                    
                     
//asort($main_array);
                     echo json_encode($main_array);










  }
  
  
  
    public function fetch_data_get_ledger_view_group_commen()
  {


                     $this->db->query("TRUNCATE commen_ledgers");
                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     if($formdate==date('Y-m-d'))
                     {
                         $formdate=date('2023-10-01');
                     }
                     $todate=$_GET['todate'];
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     $customer_id_datas=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     $array1=array();
                     $array2=array();
                     if($customer_id!=0)
                     {
                         
                      
                         
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }




                                               $group=" ";
                         
                         
                         
                         
                        
                     }
                     else
                     {
                         
                         
                                          $resultlocality=$this->db->query("SELECT mark_vendor_id,id FROM customers WHERE  deleteid=0 AND mark_vendor_id>0");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }


                                               $group=" GROUP BY a.customer_id";
                         
                         
                     }
                     $resultfetch = array_merge($array1, $array2);
                   
                     
                   
                     
                                 if($formdate!='undefined')
                                 {
                                    //$sql=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";
                                 }
                    
                   
                                  $i=1;
                  
                       
                       
                $resultsub=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal FROM all_ledgers as a   WHERE  a.deleteid=0 AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')   $sql  $group ORDER BY a.party_type ASC");
                                  $resultsub=$resultsub->result();
                                       
                                   
                                       $subresult=array();
                                       $temp = array();
                                       foreach ($resultsub as  $valuesub) 
                                       {
                                                 

                                               $payment_status=""; 
                                               $company_name=""; 
                                               $customer_id="";
                                               $resultlocality= $this->Main_model->where_names('customers','id',$valuesub->customer_id);
                                               foreach($resultlocality as $vl)
                                               {



                                                    
                                                   
                                                       $payment_status_value=$vl->op_status;
                                                       $company_name=$vl->company_name;
                                                       $opening_balance=$vl->op;
                                                       $vl='Customer';


                                                        $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$valuesub->customer_id;
                                                   
                                                   
                                               }


                                               $payment_status="";  
                                               $resultlocality= $this->Main_model->where_names('vendor','id',$valuesub->customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   
                                                       $payment_status_value=$vl->op_status;
                                                       $company_name=$vl->name;
                                                       $opening_balance=$vl->op;
                                                       $mark_customer_id=$vl->mark_customer_id;
                                                       
                                                       
                                                       $vl='Vendor';

                                                       $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$mark_customer_id;
                                                   
                                                   
                                               }
                        
                                           
                                           
                                          
                                                 if($payment_status_value==1)
                                                 {
                                                    $payment_status='CR';
                                                 }
                                                 if($payment_status_value==2)
                                                 {
                                                    $payment_status='DR';   
                                                 }
                                                   
                                            $valueset=$valuesub->creditstotal-$valuesub->debitstoatal;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;
                                            }
                                            else
                                            {
                                                $getstatus=0;
                                            }
                                            
                                           
                                              $total=round($valueset,2); 
                                              $total=abs($total);


                                              

   $customer_id=$valuesub->customer_id;

                                      $data_driver['base']='customer';
                                      $data_driver['customer_id']=$customer_id;
                                      $data_driver['name']=$company_name;
                                      if($payment_status=='DR')
                                      {

                                        $data_driver['opeing_balance_cr']=0;
                                        $data_driver['opeing_balance_dr']=round($opening_balance,2);

                                      }

                                       if($payment_status=='CR')
                                      {

                                        $data_driver['opeing_balance_dr']=0;
                                        $data_driver['opeing_balance_cr']=round($opening_balance,2);

                                      }


                                      if($getstatus=='1')
                                      {

                                        $data_driver['balance_cr']=0;
                                        $data_driver['balance_dr']=round($total,2);

                                      }

                                       if($getstatus=='0')
                                      {

                                        $data_driver['balance_dr']=0;
                                        $data_driver['balance_cr']=round($total,2);

                                      }


                                       $data_driver['debit']=round($valuesub->debitstoatal,2);
                                       $data_driver['credit']=round($valuesub->creditstotal,2);
                                      
                                      


                                      if($customer_id>0)
                                      {

                                       
                                        $this->Main_model->insert_commen($data_driver,'commen_ledgers');

                                      }


                                            


                                          
                                  }



                                   $sql="";


                                 if($customer_id_datas>0)
                                 {
                                     $sql=" AND a.customer_id='".$customer_id_datas."'";
                                 }
                       
                  $resultsub=$this->db->query("SELECT a.id,a.name,a.customer_id,
                    SUM(a.opeing_balance_cr) as opeing_balance_cr,
                    SUM(a.opeing_balance_dr) as opeing_balance_dr,
                    SUM(a.balance_dr) as balance_dr,
                    SUM(a.balance_cr) as balance_cr,
                    SUM(a.debit) as debit,
                    SUM(a.credit) as credit

                   FROM commen_ledgers as a   WHERE  a.id>0  $sql GROUP BY a.customer_id  ORDER BY a.name ASC");
                   $resultsub=$resultsub->result();



                                       $subresult=array();
                                       $temp = array();
                                       foreach ($resultsub as  $valuesub) 
                                       {
                                                 

                                             


                                                              $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$valuesub->customer_id;

                                                               $payment_status_value=round($valuesub->opeing_balance_cr-$valuesub->opeing_balance_dr);
                                                               if($payment_status_value<0)
                                                               {
                                                                  $payment_status='DR';
                                                               }
                                                               else
                                                               {
                                                                  $payment_status='CR';   
                                                               }


                                                               $total=round($valuesub->balance_cr-$valuesub->balance_dr);
                                                               if($total<0)
                                                               {
                                                                  $getstatus='1';
                                                               }
                                                               else
                                                               {
                                                                  $getstatus='0';   
                                                               }
                                                         
                                                              $subresult[] = array(
                                               
                                        
                                                                    'no' => $i, 
                                                                    'id' => $valuesub->id, 
                                                                    'name' => $valuesub->name, 
                                                                    'url' => $url, 
                                                                    'customer_id' => $valuesub->customer_id, 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $payment_status,
                                                                    'opening_balance' =>abs($payment_status_value),
                                                                    'debits' => round($valuesub->debit,2),
                                                                    'credits' => round($valuesub->credit,2),
                                                                    'getstatus' => $getstatus,
                                                                    'balance' => abs($total)
                                                              
                                        
                                                             );

                                             
                                              $i++; 

                                           


                                       


                                          
                                         }
                         
                                    
                     

                     echo json_encode($subresult);
                     
                     

  }
  
  
  
  
  
  
  
    public function fetch_data_get_ledger_view_total_group_commen()
  {

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                      $todate=$_GET['todate'];
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                   
                     $array1=array();
                     $array2=array();
                     if($customer_id!=0)
                     {
                         
                                             
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }
                         
                         
                         
                         
                        
                     }
                     else
                     {
                         
                         
                                                $resultlocality=$this->db->query("SELECT mark_vendor_id,id FROM customers WHERE  deleteid=0 AND mark_vendor_id>0");
                                               $resultlocality=$resultlocality->result();
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }
                         
                         
                     }


                     
                      if($formdate!='undefined')
                     {
                        //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }




                     // $resultfetch = array_merge($array1, $array2);
                      
                       // $result=$this->db->query("SELECT  SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers as a  WHERE  a.deleteid=0 AND a.party_type IN ('1','3')   AND  a.customer_id IN ('".implode("','", $resultfetch)."') $sql  ORDER BY a.payment_date ASC");
                       // $result=$result->result();


                    $result=$this->db->query("SELECT a.id,a.name,a.customer_id,
                    SUM(a.balance_dr) as totaldebit,
                    SUM(a.balance_cr) as totalcridit,
                    SUM(a.balance_cr-a.balance_dr) as totalblance
                    FROM commen_ledgers as a   WHERE  a.id>0 ");
                     $result=$result->result();
                      
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value)
                   {
                       
                                               $valueset=$value->totalblance;
                                                
                                                if($valueset<0)
                                                {
                                                    $getstatus=1;
                                                }
                                                else
                                                {
                                                    $getstatus=0;
                                                }
                                                
                                              
                                                $total=round($valueset,2); 
                                                $total=abs($total);
                           
                           
                                               $output['totalpayment']= round($value->amount,2);
                                               $output['totalpaid']= round($value->totalpaid,2); 
                                               $output['totaldebit']= round($value->totaldebit,2); 
                                               $output['totalcridit']= round($value->totalcridit,2); 
                                               $output['totalblance']= $total; 
                                               $output['getstatus']= $getstatus; 
                                               $output['getstatus1']= $getstatus; 
                                               $output['outstanding']= $total; 
                      
                   }

                    echo json_encode($output);

  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    public function fetch_data_get_ledger_view_total_group()
  {

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $cnn_status=$_GET['cnn_status'];
                     $trail_balance=$_GET['trail_balance'];
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND a.customer_id='".$customer_id."'";
                        
                        
                     }
                     

                     $sql.=" AND a.cnn_status='".$cnn_status."'";
                     
                     if($cnn_status==1)
                     {

                                  $sql.=" AND b.CNN='YES'";


                     }
                     
                     
                       
                      if($formdate!='undefined')
                      { 
                         //$sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                      }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     $sqlgetfecth_user='';
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $customer_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              $sales_group_id=implode(',',$sales_group_id);
                                              $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                              $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                           $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         $customer_id=array();              
                                               $sales_group_id=array($this->userid);
                                              
                                             
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_sub_id IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                           
                             
                     }
                     elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
                     {
                         
                         
                         
                          
                                              
                                                $sales_team_id = array($this->userid);
                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                foreach ($resultsales_team as $values) {
                                                    $sales_team_id[] = $values->sales_member_id;
                                                }
                                               
                                               
                                               
                                                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                                foreach ($poin_to_member as $point) {
                                                    $sales_team_id[] = $point->id;
                                                }
                                                
                                                
                                               
                                             
                                               
                                                
                                                   $customer_id=array();                                     
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".implode("','", $sales_team_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                  
                                               $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                               
                                               
                                               
                                            
                             
                     }
                     else
                     {
                         
                                              $sqlgetfecth_user='';
                       
                     }
                     
                     
                          $commenbase='';
                          if($trail_balance==0)
                          {
                                    //$commenbase=" AND b.mark_vendor_id IN ('0','1','-1')";
                          }

                          $commenbase=" AND b.mark_vendor_id IN ('0','1','-1')";


     $Stset="";
 if($trail_balance==1)
{
 $Stset=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
}
                     
              $result=$this->db->query("SELECT  SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.credits-a.debits) as totalblance FROM all_ledgers as a    JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1 $Stset $commenbase $sql $sqlgetfecth_user ORDER BY a.id ASC");
                   $result=$result->result();
                                  
                      
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value)
                   {
                       
                                               $valueset=$value->totalblance;
                                                
                                                if($valueset<0)
                                                {
                                                    $getstatus=1;
                                                }
                                                else
                                                {
                                                    $getstatus=0;
                                                }
                                                
                                                 $total=round($valueset,2); 
                                                $total=abs($total);
                           
                           
                                               $output['totalpayment']= round($value->amount,2);
                                               $output['totalpaid']= round($value->totalpaid,2); 
                                               $output['totaldebit']= round($value->totaldebit,2); 
                                               $output['totalcridit']= round($value->totalcridit,2); 
                                               $output['totalblance']= $total; 
                                               $output['getstatus']= $getstatus; 
                                               $output['getstatus1']= $getstatus; 
                                               $output['outstanding']= $total; 
                      
                   }

                    echo json_encode($output);

  }
  
    public function fetch_data_get_ledger_view_total()
  {

                    
                     $customer_id_data=$_GET['customer_id'];



if($customer_id_data>0)
{


 $query = $this->db->query("SELECT id,order_no,deleteid,create_date,reason,customer_id,delivery_status,bill_total FROM `orders_process` WHERE `create_date` <= '2024-08-06' AND deleteid='0' AND finance_status IN ('5','6') AND delivery_status=1 AND customer_id='".$customer_id_data."'");
                                              $resultsales_team=$query->result();
                                              $bill_total=0;
                                              foreach ($resultsales_team as  $values) 
                                              {

                                              	$order_no=$values->order_no;
                                              	$customer_id=$values->customer_id;
                                                                              
                                                                              $bill_total+=$values->bill_total;



// $this->db->query("UPDATE orders_process SET deleteid='1002' WHERE order_no='".$order_no."'");
 // $this->db->query("UPDATE all_ledgers SET deleteid='1002' WHERE order_no='".$order_no."'");
  //$this->db->query("UPDATE order_delivery_order_status SET deleteid='1002' WHERE order_no='".$order_no."'");                            
                                                                              
                                              }

  //$this->db->query("UPDATE all_ledgers SET debits=debits+'".$bill_total."',credits='0' WHERE customer_id='".$customer_id."' AND party_type='1' AND cnn_status=0 AND opening_balance_status=1");

                                            

}


                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $filter=$_GET['filter'];
                     $cnn_status=$_GET['cnn_status'];
                     
                    $basearray=array();
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     $sql2="";
                     $sql3="";
                     
                     if($customer_id>0)
                     {
                         
                         
                                $sql.=" AND a.customer_id='".$customer_id."'";
                                $sql2.=" AND a.customer_id='".$customer_id."'";
                                $sql3.=" AND a.customer_id='".$customer_id."'";


                        
                     }

                                  $sql.=" AND a.cnn_status='".$cnn_status."'";
                                $sql2.=" AND a.cnn_status='".$cnn_status."'";
                                $sql3.=" AND a.cnn_status='".$cnn_status."'";



                     if($formdate!='undefined')
                     {
                      

                        $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                        $sql2.=" AND a.payment_date < '".$formdate."'";


                     }
                     
                     
                     
                      if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }





                    if($filter==1)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();

                            if($_GET['test'] && $_GET['test'] == 'true'){

                         $resultsub_production=$this->db->query("SELECT b.id as base_ids,os.bill_total,b.total_picked_amount,b.order_id as id,b.order_no   FROM 
                                        order_product_list_process AS a 
                                    
                                        JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                        JOIN orders_process AS os ON a.order_id = os.id 
                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = '".$customer_id."'  AND b.order_base>0
                                       AND b.reason != 'Return To Re-sale' 
                                        AND b.deleteid IN ('0','88')  AND b.return_status IN ('0','2')
                                        AND (
                                            CASE
                                                WHEN b.assign_status_0_date <= '$todate'  AND (b.assign_status_12_date > '$todate' OR b.assign_status_12_date IS NULL)  AND (b.assign_status_11_date > '$todate' OR b.assign_status_11_date IS NULL)  AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL)  THEN 1
                                                ELSE 0
                                            END
                                        )  
                                    GROUP BY 
                                        b.id 
                                    ORDER BY 
                                        a.id DESC");

                       }else{
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND b.assign_status IN ('0')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0  AND b.reason!='Return To Re-sale' AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");
                       }

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                             $order_ids[]=$val->id;
                             $order_nos[]=$val->order_no;

                             $basearray[]=array(

                              'bill_total'=>$val->bill_total,
                              'total_picked_amount'=>$val->total_picked_amount,
                              'order_id'=>$val->id


                            );

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                             
                               

                    }

                     if($filter==2)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                           if($_GET['test'] && $_GET['test'] == 'true'){

                         $resultsub_production=$this->db->query("SELECT b.id as base_ids,os.bill_total,b.total_picked_amount,b.order_id as id,b.order_no   FROM 
                                        order_product_list_process AS a 
                                    
                                        JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                        JOIN orders_process AS os ON a.order_id = os.id
                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = '".$customer_id."'  
                                        AND b.reason != 'Return To Re-sale' AND b.return_status IN ('0','2')
                                                                      AND b.deleteid = 0  
                                                                      AND (
                                                                           CASE
                                                                              WHEN (b.delivery_status = 2 AND (b.assign_status_11_date <= '$todate' OR b.assign_status_12_date <= '$todate') AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL) AND (b.assign_status_2_date > '$todate' OR b.assign_status_2_date IS NULL)) OR (b.delivery_status = 1 AND b.assign_status_11_date <= '$todate' AND (b.assign_status_3_date > '$todate' OR b.assign_status_3_date IS NULL)) THEN 1
                                                                              ELSE 0
                                                                          END
                                                                      ) 
                                                                  GROUP BY 
                                                                      b.id 
                                                                  ORDER BY 
                                                                      a.id DESC
                                                                  ");

                       }else{

                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND  b.assign_status IN ('11','12','1')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                       }
                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                             $order_ids[]=$val->id;
                             $order_nos[]=$val->order_no;

                                  $basearray[]=array(

                              'bill_total'=>$val->bill_total,
                              'total_picked_amount'=>$val->total_picked_amount,
                              'order_id'=>$val->id


                            );

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                             
                               

                    }


                     if($filter==3)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         if($_GET['test'] && $_GET['test'] == 'true'){

                         $resultsub_production=$this->db->query("SELECT b.id as base_ids,os.bill_total,b.total_picked_amount,b.order_id as id,b.order_no   FROM 
                                        order_product_list_process AS a 
                                    
                                        JOIN order_delivery_order_status AS b ON a.order_id = b.order_id
                                        JOIN orders_process AS os ON a.order_id = os.id 
                                    WHERE 
                                        a.deleteid = 0 
                                        AND b.customer_id = $customer_id 
                                        AND b.reason != 'Return To Re-sale' 
                                        AND b.deleteid = 0  AND b.return_status IN ('0','2')
                                        AND (
                                             CASE
                                                WHEN (b.delivery_status = 2 AND (b.assign_status_2_date <= '$todate' AND ((b.trip_end_date >= '$todate' OR b.trip_end_date IS NULL) AND (b.trip_end_date IS NULL AND b.trip_start_date <= '$todate' )) ) )  THEN 1
                                                ELSE 0
                                            END
                                        )  
                                    GROUP BY 
                                        b.id 
                                    ORDER BY 
                                        a.id DESC");

                       }else{

                        $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                       }

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;

                                 $basearray[]=array(

                              'bill_total'=>$val->bill_total,
                              'total_picked_amount'=>$val->total_picked_amount,
                              'order_id'=>$val->id


                            );

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                               

                    }

                     

  if($filter==4)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT osc.re_order_no  FROM order_sales_return_complaints osc LEFT JOIN orders_process as b ON osc.order_no=b.order_no WHERE customer='".$customer_id."' AND osc.remarks  = 'Return To Re-Sale' AND b.return_id > 0 AND return_status = 0 ");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->re_order_no;
                            // $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                        //  $order_noss=implode("','", $order_nos);
                         $sql=" AND a.reference_no IN ('".$ids."') ";
                               

                    }



 $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a LEFT JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=1   $sql2   ORDER BY a.id DESC");
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



 $resultopeing_balance=$this->db->query("SELECT SUM(a.credits-a.debits) as totalopeingbalance FROM all_ledgers  as a LEFT JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=1 AND a.payment_date <= '".$todate."' $sql3   ORDER BY a.id DESC");
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



                     
                     $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers  as a LEFT JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=1   $sql   ORDER BY a.id DESC");
                     $result=$result->result();
                    
                 
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value) {
                       
                       
                      $output['totalpayment']= round($value->amount,2);
                      $output['totalpaid']= round($value->totalpaid,2); 
                      $output['totaldebit']= round($value->totaldebit,2); 
                      $output['totalcridit']= round($value->totalcridit,2); 
                      $output['totalblance']= round($total,2); 
                      $output['getstatus']= $getstatus; 
                      $output['getstatus1']= $getstatus; 
                      $output['outstanding']= round($balance,2); 
                      $output['opstatus']= round($opstatus,2);
                      $output['openingbalance']= round($openingbalance,2);
                      
                   }

                    echo json_encode($output);

  }
  
  
   public function fetch_data_get_ledger_view_total_commen()
  {

                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                     if($customer_id>0)
                     {
                         
                         
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                                }
                         
                         
                        
                     }
                     
                     
                     
                      if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                     
                     
                      $resultfetch = array_merge($array1, $array2);

                     
                     if($formdate!='undefined')
                     {
                        $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'";
                     }
                     
                     $result=$this->db->query("SELECT SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') $sql   ORDER BY a.id DESC");
                     $result=$result->result();
                    


                      $total_op=0;
                      $resultott_op=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as credits, SUM(a.debits) as debits FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  AND a.payment_date < '".$formdate."' ORDER BY a.id DESC");
                      $resultott_op=$resultott_op->result();
                      foreach ($resultott_op as  $values) 
                      {


                                                if($values->totalsum>0)
                                                {
                                                    $getstatus_op=0;
                                                }
                                                else
                                                {
                                                    $getstatus_op=1;
                                                }
                                                $total_op=abs($values->credits - $values->debits);

                      }

    
                                  
                      $total=0;
                      $resultott=$this->db->query("SELECT SUM(a.credits-a.debits) as totalsum,SUM(a.credits) as credits, SUM(a.debits) as debits FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.payment_date <= '".$todate."' ORDER BY a.id DESC");
                     $resultott=$resultott->result();
                      foreach ($resultott as  $values) {


                                                if($values->totalsum>0)
                                                {
                                                    $getstatus=0;
                                                }
                                                else
                                                {
                                                    $getstatus=1;
                                                }
                                                

                                  $total=abs($values->credits - $values->debits);
                      }
                      
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value) {
                       
                     
                      $output['totalpayment']= round($value->amount,2);
                      $output['totalpaid']= round($value->totalpaid,2); 
                      $output['totaldebit']= round($value->totaldebit,2); 
                      $output['totalcridit']= round($value->totalcridit,2); 
                      $output['totalblance']= round($total); 
                      $output['getstatus']= $getstatus; 
                      $output['getstatus1']= $getstatus; 
                      $output['outstanding']= round($total,2); 
$output['total_op']= round($total_op,2);
$output['getstatus_op']= $getstatus_op; 

                      
                   }

                    echo json_encode($output);

  }
  
  
  
  
    public function fetch_balance()
    {
               
                         $form_data = json_decode(file_get_contents("php://input"));
                         
                       
                         
                         $tablename=$form_data->tablename;
                           
                          $party_type=1;
                          if(isset($form_data->party_type))
                          {
                              $party_type=$form_data->party_type;
                          }

                          
                          

                         
                         $id=$form_data->id;  
                     
                         $pp=explode('-', $id);
                         $id=$pp[0];
                   
                       $output=array();
                   
                      if($party_type==4)
                       {

        $resultsub_production=$this->db->query("SELECT id,debit as debits,credit as credits,amount,ex_code as order_no,bank_account_id as customer_id FROM bankaccount_manage WHERE deleteid=0 AND bank_account_id='".$id."' AND party_type NOT IN('1','2','3','5') ");
        $res=$resultsub_production->result();

                       }
                       else if($party_type==9)
                       {

        $resultsub_production=$this->db->query("SELECT id,debit as debits,credit as credits,amount,ex_code as order_no,bank_account_id as customer_id FROM bankaccount_manage WHERE deleteid=0 AND bank_account_id='".$id."' AND party_type NOT IN('1','2','3','5') ");
        $res=$resultsub_production->result();

                       }
                       else if($party_type==22)
                       {

       $res= $this->Main_model->where_names_four_order_by_new('all_ledgers','customer_id',$id,'driver_collection_status','0','party_type',2,'deleteid',0,'id','DESC');

                       }
                       else if($party_type==2)
                       {

       $res= $this->Main_model->where_names_four_order_by_new('all_ledgers','customer_id',$id,'driver_collection_status','1','party_type',2,'deleteid',0,'id','DESC');

                       }
                       else
                       {

                $res= $this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$id,'party_type',$party_type,'deleteid',0);

                       }
                         $balancetotal=0;
                         $debitsamount=0;
                         $creditsamount=0;
                         
                         if($id!='')
                         {
                             
                         
                                     foreach($res as $val)
                                     {
                                         $payid=$val->id;
                                         $customer_id=$val->customer_id;
                                         $order_no=$val->order_no;
                                         $amount=$val->amount;
                                         $debitsamount+=$val->debits;
                                         $creditsamount+=$val->credits;
                                         
                                     }
                         
                         }
                       
                       $balancetotal=$creditsamount-$debitsamount;
                       $output['opening_balance']= round($balancetotal,2);
                          
                     
                         echo json_encode($output);

                     
    }
    
     public function fetch_route()
    {
               
                         $form_data = json_decode(file_get_contents("php://input"));
                         
                       
                         
                        
                         
                         $id=$form_data->id;  
                     
                         $pp=explode('-', $id);
                         $id=$pp[0];
                   
                       $output=array();
                   
                       $res= $this->Main_model->where_names('locality','id',$id);
                       if($id>0)
                       {
                             
                         
                                     foreach($res as $val)
                                     {
                                            $route_id=$val->route_id;
                                            $route_name = "";
                                            $route = $this->Main_model->where_names('route', 'id', $route_id);
                                            foreach ($route as $route_v) {
                                                $route_name = $route_v->name;
                                            }


                                         
                                     }
                         
                         }
                       
                       
                       $output['route_name']= $route_name;
                       echo json_encode($output);

                     
    }
    
      public function fetch_balance_by_data()
    {
               
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;  
                     
                         $pp=explode('-', $id);
                         $id=$pp[0];
                   
                       $output=array();
                       
                       
                       if($tablename=='1')
                       {
                           $table="all_ledgers";
                       }
                       elseif($tablename=='2')
                       {
                           $table="all_ledgers";
                       }
                       elseif($tablename=='3')
                       {
                           $table="all_ledgers";
                       }
                       elseif($tablename=='4')
                       {
                           $table="bankaccount_manage";
                       }
                       elseif($tablename=='5')
                       {
                           $table="all_ledgers";
                       }
                       else
                       {
                           $table="all_ledgers";
                       }
                   
                   
                      if($tablename==4)
                      {
                                           $res = $this->Main_model->where_names($table,'bank_account_id',$id);
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                 $payid=$val->id;
                                                 $debitsamount+=$val->debit;
                                                 $creditsamount+=$val->credit;
                                                 
                                             }
                      }
                      else
                      {
                          
                          
                          
                                           $res =$this->Main_model->where_names_three_order_by($table,'customer_id',$id,'party_type',$tablename,'deleteid','0','id','ASC');              
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                
                                                     
                                                     
                                                 
                                                                 $payid=$val->id;
                                                                 $debitsamount+=$val->debits;
                                                                 $creditsamount+=$val->credits;
                                                                 
                                                 
                                                
                                                 
                                             }
                          
                      }
                   
                       
                         
                         
                         
                       
                       $balancetotal=$creditsamount-$debitsamount;
                       $output['opening_balance']= $balancetotal;
                          
                     
                         echo json_encode($output);

                     
    }


        public function fileuplaodimgsave()
    {




  

       if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']) ; $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                         $ticket_id=$_GET['id'];
                       

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  

                           
  $this->db->query("UPDATE customers SET pan_image='".$path."' WHERE id='". $ticket_id."'");   
                          echo "yes";exit;

                         }else{
                            echo "no";exit;
                         }

                   }
                   
            }
             
            

             
 
         }
         
             $output=array('1');
             echo json_encode($output);


    }

    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
                     
                     $pp=explode('-', $id);
                     $id=$pp[0];
                     
                   $result= $this->Main_model->where_names($tablename,'id',$id);
                   
                   $output=array();
                   
                   foreach ($result as  $value) {

                    $output['id']= $value->id; 
                      $output['name']= $value->name; 
                      $output['company_name']= $value->company_name;
                      $output['pan_image']= $value->pan_image;
                       

                       if($value->print_name=='')
                       {
                        
                          $output['print_name']= $value->company_name;

                       }
                       else
                       {
                         $output['print_name']= $value->print_name;

                       }

                        if($value->archive_status=='0')
                        {
                          $output['archive_status']='Active';
                        }
                        elseif($value->archive_status=='1'){
                          $output['archive_status']='Archived';
                        }


                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['gst']= $value->gst;
                      $output['gst_status']= $value->gst_status;
                      $output['sales_team_sub_id']= $value->sales_team_sub_id;
                      
                      
                      $output['mark_vendor_id']= $value->mark_vendor_id;
                      $output['active_value']= $value->active_value;
                      
                      $output['account_heads_id']= $value->account_heads_id;
                      $output['approved_status']= $value->approved_status;
                      $output['reject_reason']= $value->reject_reason;
                      
                      
                      $output['pin']= $value->pin;
                      $output['fulladdress']= $value->address1.','.$value->landmark.$value->state; 
                      $output['address1']= $value->address1; 
                      $output['address2']= $value->address2;
                      $output['pincode']= $value->pincode;
                      $output['landmark']= $value->landmark;
                      
                       $output['district']= $value->district;


                       $output['deviceName']= $value->deviceName;
                       $output['installationTime']= $value->installationTime;
                       $output['devicecity']= $value->devicecity;
                       $output['deviceversion']= $value->deviceversion;



                       $localityname="";
                       $resultlocality= $this->Main_model->where_names('locality','id',$value->locality);
                       foreach($resultlocality as $vl)
                       {
                           
                           $localityname=$vl->name;
                       }
                       
                      
                      
                      
                      $output['locality']= $value->locality.'-'.$localityname;
                      
                      
                      
                      $output['city']= $value->city;
                      $output['state']= $value->state;
                      $output['google_map_link']= $value->google_map_link;
                      $output['sales_group']= $value->sales_group;
                      $output['sales_team_id']= $value->sales_team_id;
                      $output['landline']= $value->landline;
                      
                      
                      
                         
                                     $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','3','deleteid','0','sort_order_id','ASC');              
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $output[$label_name]= $value->$label_name; 
                                     }
                                     
                      
                      
                      
                      
                       $localityname="";
                       $resultlocality= $this->Main_model->where_names('locality','id',$value->locality);
                       foreach($resultlocality as $vl)
                       {
                           
                           $localityname=$vl->name;
                       }
                       
                        $sales_team_name ='';
                        $user_group_team = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                        foreach ($user_group_team as  $team) {
                          $sales_team_name=$team->name;
                          $sales_group_id=$team->sales_group_id;
                        }
                       
                       
                        $user_group_name ='';
                        $user_group = $this->Main_model->where_names('sales_group','id',$sales_group_id);
                        foreach ($user_group as  $row) {
                          $user_group_name=$row->name;
                        }
                       
                       
                      
                      $output['address']= $value->address1.' '.$value->address2.' '.$value->landmark.'  '.$value->zone.' '.$value->pincode.' '.$value->city.' '.$value->state;
                      
                      $output['sales_group_name']= $user_group_name;
                      $output['zone']= $value->zone;
                      $output['feedback_details']= $value->feedback_details;
                      $output['credit_limit']= $value->credit_limit;
                      $output['credit_period']= $value->credit_period;
                      
                        $output['ratings']= $value->ratings;
                           $output['price_rateings']= $value->price_rateings;
                              $output['delivery_time_rateings']= $value->delivery_time_rateings;
                                 $output['quality_rateings']= $value->quality_rateings;
                                    $output['response_commission']= $value->response_commission;
                      
                      
                      $output['feedback_sub']= $value->feedback_sub;
                        $output['customer_id']=$value->id;
                        if($value->virtual_accountno=='')
                        {

                           $output['virtual_accountno']=$value->account_number;
                           
                           
                        }
                       

                        if($value->customer_id>0)
                         {

                             $output['customer_id']=$value->customer_id;
                         }
                            

                        


                       



                                  if($output['tcs_status']=='1')
                                  {
                                    $output['tcs_status']='ACTIVE';
                                  }
                                  elseif($output['tcs_status']=='0')
                                  {
                                    $output['tcs_status']='INACTIVE';
                                  }
                                  else
                                  {
                                     $output['tcs_status']='MANUEL INACTIVE';
                                  }

                          if($value->cnn_opening_balance>0)
                         {

                                           

                                   $output['cnn_opening_balance']=$value->cnn_opening_balance;
                                   if($value->cnn_payment_status==1)
                                   {
                                     $output['cnn_payment_status']='CR';
                                   }
                                   else
                                   {
                                      $output['cnn_payment_status']='DR';
                                   }
                              
                             
                          }
                          else
                          {
                              $output['cnn_opening_balance']=0; 
                              $output['cnn_payment_status']='CR';
                          }

                         if($value->op>0)
                         {


                                           

                                   $output['opening_balance']=$value->op;
                                   if($value->op_status==1)
                                   {
                                     $output['opening_balance_status']='CR';
                                   }
                                   else
                                   {
                                      $output['opening_balance_status']='DR';
                                   }
                              
                             
                          }
                          else
                          {


                                  if($value->create_date>'2023-05-19')
                                  {


                                           if($value->opening_balance==null)
                                           {
                                              $value->opening_balance=0;
                                           }

                                           $output['opening_balance']=$value->opening_balance;
                                           if($value->op_status==1)
                                           {
                                             $output['opening_balance_status']='CR';
                                           }
                                           else
                                           {
                                              $output['opening_balance_status']='DR';
                                           }


                                  }
                                  else
                                  {

                                           if($value->op==null)
                                           {
                                              $value->op=0;
                                           }

                                           $output['opening_balance']=$value->op;
                                           if($value->op_status==1)
                                           {
                                             $output['opening_balance_status']='CR';
                                           }
                                           else
                                           {
                                              $output['opening_balance_status']='DR';
                                           }
                                      

                                  }





                                   
                                   

                          }
                      

                     
                    
                   }

                    echo json_encode($output);


    }
    
    
    
    
    
    
        
    
    
    
    public function state_find_value_find_data()
    {



           $form_data = json_decode(file_get_contents("php://input"));
          
           $tablename=$form_data->tablename;

                     if(isset($form_data->value))
                     {
                           


                             $state_name=$form_data->value;
                             $state_id = $this->Main_model->where_names('district','name',$state_name);
                             foreach ($state_id as $value) {
                               $s_id=$value->route_id;
                             }
                            
                            
                             $result= $this->Main_model->where_names($tablename,'id',$s_id);
                            

                     }
                     else
                     {
                            $result= $this->Main_model->where_names($tablename,'deleteid','0');
                     }

                  
      

                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value)
                     {
                           


                                       
                                    $data[] = array(
                                        
                                        
                                    'no' => $i, 
                                    'id' => $value->id, 
                                    'name' => $value->name, 
                                    

                                   );
                           

                     }

                    echo json_encode($data);

  

    }

    public function find_all_city_dateils()
    {



           $form_data = json_decode(file_get_contents("php://input"));
            $data=array();
           $tablename=$form_data->tablename;

                     if(isset($form_data->value))
                     {
                           


                             $state_name=$form_data->value;
                             $state_id = $this->Main_model->where_names('city','name',$state_name);
                             foreach ($state_id as $value) {
                               $s_id=$value->route_id;
                               $district_id=$value->district_id;
                             }
                            
                            

                              $query = $this->db->query("SELECT a.name as district,b.name as state FROM district as a JOIN state as b ON a.route_id=b.id WHERE a.deleteid = 0 AND b.deleteid = 0 AND a.id = '".$district_id."' ORDER BY a.id DESC");
                              $result=$query->result();


                              
                             
                               $i=1;
                               foreach ($result as  $value)
                               {
                                     


                                                 
                                              $data[] = array(
                                                  
                                                  
                                              'no' => $i, 
                                              'id' => $value->id, 
                                              'district' => $value->district, 
                                              'state' => $value->state,
                                              

                                             );
                                     

                               }


                     }

                    echo json_encode($data);

  

    }
    
    
    
    
    
    public function fetch_data_address()
  {
                        
                        
                     $customer_id= $_GET['id'];
                  
                   $result= $this->Main_model->where_names('customers_adddrss','customer_id',$customer_id);
                   $i=1;
                   $array=array();
                   foreach ($result as  $value) {
                       
                      
                   
                   if($value->deleteid==0)  
                   {
                       
                   
                                    $array[] = array(
                                        
                                        
                                        'no' => $i, 
                                             'id' => $value->id, 
                                      'phone' => $value->phone, 
                                      'name' => $value->name, 
                                      'address' => $value->address1.' '.$value->address2.' '.$value->landmark.' '.$value->zone.'-'.$value->pincode.' '.$value->city.' '.$value->state,
                                      'city' => $value->city, 
                                      'state' => $value->state,
                                      'google_map_link' => $value->google_map_link
                
                                    );
                                    
                   }


                            $i++;

                   }

                    echo json_encode($array);

  }
    
    
    
    
    
    
    
    
    
    
    
    public function pincode()
    {
        
         $form_data = json_decode(file_get_contents("php://input"));
         
     
         $pincode=$form_data->pincode;
         
         
         
         
         $output=array();
         $getres=file_get_contents("http://www.postalpincode.in/api/pincode/".$pincode);
         $data=json_decode($getres);
         if(isset($data->PostOffice[0]))
         {
                $output['city']=$data->PostOffice[0]->District;
                $output['state']=$data->PostOffice[0]->State;
                $output['locality']=$data->PostOffice[0]->Taluk;
                
         }
         
         //echo json_encode($output);
        
    }
    
      public function customer_search()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

              $searchText= $_POST['search'];
              if($searchText!="")
              {

                     $result= $this->Main_model->where_id_like_and_where('customers','phone',$searchText,'deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = array(

                            'id' => $value->id, 
                            'label' => $value->company_name.'/'.$value->phone.' '

                        );


                     }

              }
             echo json_encode($array);
                     


              

    }
    
    
    
     public function customer_search_full()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('customers','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->company_name.'/'.$value->phone.'/'.$value->id;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
    
     public function customer_search_full_id()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('customers','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->id.'-'.$value->company_name.'-'.$value->phone;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
       public function customer_search_full_locality()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

             

                     $result= $this->Main_model->where_names('locality','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->id.'-'.$value->name;

                     }
                     
                   
             echo json_encode($array);
          

    }
    
    
    public function phone_no_find()
    {
        
                    $form_data= json_decode(file_get_contents("php://input"));
                    $array =array();
                    
                    
                    if($form_data->phone>0)
                    {
                        
                    
                    //$result= $this->Main_model->where_names('customers','phone',$form_data->phone);
                    $result =$this->Main_model->where_names_two_order_by('customers','phone',$form_data->phone,'deleteid','0','id','ASC');
                                           
                    
                    if(count($result)>0)
                    {
                          $company_name=array();
                          foreach ($result as $value) {
                            $customer_id=$value->id;
                             $company_name[]=$value->company_name.' - '.$value->phone;
                             
                          }

                          $url=implode(' , ',$company_name);
                          $array=array('error'=>'1','url'=>$url);
                         
                    }
                    else
                    {
                        $array=array('error'=>'0');
                    }
                    
                    }
                    
         echo json_encode($array); 
    }
    
    
     public function company_name_find()
    {
        
                    $form_data= json_decode(file_get_contents("php://input"));
                    $array =array();
                    
                    
                    if($form_data->company_name!='')
                    {
                        
                    
                    //$result= $this->Main_model->where_names('customers','phone',$form_data->phone);
                    $result =$this->Main_model->where_names_two_order_by('customers','company_name',$form_data->company_name,'deleteid','0','id','ASC');
                                           
                    
                    if(count($result)>0)
                    {
                          $array=array('error'=>'1');
                         
                    }
                    else
                    {
                        $array=array('error'=>'0');
                    }
                    
                    }
                    
         echo json_encode($array); 
    }
    
     
     public function customer_search_full_by_single()
    {
       
                 $form_data= json_decode(file_get_contents("php://input"));
                 $array =array();
                
                              $search=$form_data->search;
                              $sql="";
                              if($search!='')
                              { 
                                  
                                $sql = ' AND company_name LIKE "%' . $search . '%" OR phone LIKE "%' . $search . '%"';
                                  
                              }

                     $query = $this->db->query("SELECT id,deleteid,company_name,phone,approved_status FROM customers  WHERE deleteid='0'   $sql  ORDER BY company_name ASC LIMIT 0,50");
                     
                     $res= $query->num_rows();
                     $result=$query->result();
                     foreach ($result as  $value) {
                         
                         if($value->deleteid=='0')
                         {

                            $array[] = $value->company_name.'/'.$value->phone.'/'.$value->id;
                        
                         }

                     }
                   
                 echo json_encode($array);

        
    }
    
      
    public function fetch_data_get_ledger_view_export()
  {







                  
                  
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $filter=$_GET['filter'];
                      $cnn_status=$_GET['cnn_status'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     $sql="";
                     $sqlba="";
                     
                     if($customer_id!=0)
                     {
                         
                         if($customer_id!='')
                         {
                              $sql=" AND a.customer_id='".$customer_id."'";
                              $sqlba=" AND a.customer_id='".$customer_id."'";

                              
                         }
                         
                        
                     }
                     
                      if(isset($_GET['deleteid']))
                     {
                         
                         $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }



                     $currentdate=date("Y-m-d");
                     if($currentdate==$todate)
                     {

                        $todate=date('Y-12-31');
                     }
                     
                     $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'"; 

                      $sql.=" AND a.cnn_status='".$cnn_status."'";
                      $sqlba.=" AND a.cnn_status='".$cnn_status."'";


                  

                    if($filter==1)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND b.assign_status IN ('0')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0  AND b.reason!='Return To Re-sale' AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                             
                               

                    }

                     if($filter==2)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND  b.assign_status IN ('11','12','1')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                             $order_ids[]=$val->id;
                             $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                             
                               

                    }


                     if($filter==3)
                    {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                               

                    }

 if($filter==4)
                   {

                         
                         $order_ids=array();
                         $order_nos=array();
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."'  AND a.return_id > 0 AND b.order_base>0  AND b.return_status > 0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.id DESC");

                         $resultsub_production=$resultsub_production->result();
                         $in_production=0;
                         foreach($resultsub_production as $val)
                         {

                                                                                                     
                            $order_ids[]=$val->id;
                            $order_nos[]=$val->order_no;

                                                                                        
                         }


                         $ids=implode("','", $order_ids);
                         $order_noss=implode("','", $order_nos);
                         $sql=" AND a.order_id IN ('".$ids."') AND  a.order_no IN ('".$order_noss."')";
                               

                    }
                          

                     
                  $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."' AND a.party_type=1 AND a.opening_balance_status='0'  $sql  ORDER BY a.payment_date,a.id ASC");
                   $result=$result->result();
                   
                   
                 
                   
                   
                   $i=1;
                    $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('customers','id',$customer_id);
                     foreach ($resultvent as  $valuess) 
                     {
                         
                         
                              $name= $valuess->name; 
                              $name= $valuess->company_name;
                              $email= $valuess->email;
                              $phone= $valuess->phone;
                              $gst= $valuess->gst;
                              $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                    }
                   
                   
                   
                   
                   
                   
                   
                         
                       $filename=date('d-m-Y').'_customers_ledger'; 
                       header("Content-Type: application/xls");    
                       header("Content-Disposition: attachment; filename=$filename.xls");  
                       header("Pragma: no-cache"); 
                       header("Expires: 0");
                         
                         if($phone!='')
                         {
                             
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="10"><?php echo $name; ?></th></tr>
                              <tr><th colspan="10"><?php echo $phone; ?></th></tr>
                              
                              <?php
                              if($gst!='')
                              {
                                  ?>
                                    <tr><th colspan="10"><?php echo $gst; ?></th></tr>
                                  <?php
                              }
                              ?>
                              
                            
                              <tr><th colspan="10"><?php echo $fulladdress; ?></th></tr>
                          
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
                          <th>User</th>
                          <th>Notes</th>
                        
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                            
                    
                    $payment_date=date('d-M-Y',strtotime($formdate));                    
                   $resultopeing_new=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal,a.payment_date FROM all_ledgers  as a JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type=1 AND a.payment_date < '".$formdate."' $sqlba ORDER BY a.payment_date ASC");
                   $resultopeing_new=$resultopeing_new->result();
                   $openingbalance_new=0;
                   $openingbalancec_new=0;
                   $openingbalanced_new=0;
                   $openingbalanceval_new=0;
                         foreach ($resultopeing_new as  $valuess)
                       {
                              $credits_new=$valuess->creditstotal;
                              $debits_new=$valuess->debitstotal;
                               $payment_date_set=date('d-M-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-M-Y',strtotime($formdate));
                              }
                              
                               
                                $openingbalance_new=  $credits_new-$debits_new;
                                $openingbalanceval_new=  $credits_new-$debits_new;
                              
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                       }
                   
                              
                              
                              if($getstatus1_new==1)
                              {
                                  $openingbalanced_new=$openingbalance_new;
                                  $openingbalancec_new=0;
                              }
                              else
                              {
                                   $openingbalanced_new=0;
                                   $openingbalancec_new=$openingbalance_new;
                              }



                            
                            
                              
                                                   
                                        $openingbalanced=0;    
                                        $openingbalancec=0;        
                                        $opdebits= $openingbalanced+$openingbalanced_new;
                                        $opcredits= $openingbalancec+$openingbalancec_new;
                                        $openingbalance= $opcredits-$opdebits;
                                        $openingbalance=abs($openingbalance);
                                        
                                        $openingbalance_data= $opcredits-$opdebits;
                                        
                                        if($openingbalance_data<0)
                                        {
                                                                    $color1='red';
                                                                    
                                        }
                                        else
                                        {
                                                                    $color1='green';
                                                                    
                                        }   
                                                    
                                         
                                         
                                         
                                         

                                           $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                       $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                        $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                       
                        if($totalvalopeingbalance>0)
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
                                              <td><?php echo $payment_date; ?></td>
                                             
                                              <td></td>
                                              <td><?php echo $debits_opening; ?></td>
                                              <td><?php echo $credits_opening; ?></td>
                                              <td style="color:<?php echo $color1; ?>"></td>
                                              <td></td>
                                              <td></td>
                                               <td></td>
                                              
                                                
                                            </tr>
                                            
                            <?php
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                      $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;
                                      $i=2;
                                      
                                      $j=1;
                                      
                                      
                                           $balanceold=array($openingbalance_data);
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

                                                    $resultventb= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                                      foreach ($resultventb as  $bb) {
                                                          $bank_name= $bb->bank_name; 
                                                      }
                                                      
                                                   if($value->bank_id > 0)
                                                   {

                                                          if($value->bank_id==25 && $value->account_heads_id_2==116)
                                                          {

                                                                 if($value->process_by=='Collection Verified By MD')
                                                                 {
                                                                  $account_head_idname = 'COLLECTION VERIFICATION DISCOUNT';
                                                                 }
                                                                 if($value->process_by=='Order Payment Received By Driver')
                                                                 {
                                                                  $account_head_idname = 'CASH IN HAND';
                                                                 }


                                                          }
                                                          else
                                                          {
                                                            $account_head_idname = $bank_name;
                                                          }
                                            


                                                    }
                                          
                                                     $resultvent= $this->Main_model->where_names('customers','id',$value->customer_id);
                                                   foreach ($resultvent as  $valuess) {
                                                      
                                                      $name= $valuess->company_name;
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
                                                  
                                                    $valueset=$balance;
                                            
                                                    if($valueset<0)
                                                    {
                                                        $color='red';
                                                    }
                                                    else
                                                    {
                                                        $color='green';
                                                    }
                                            
                                                   
                                                   $total=round($valueset,2); 
                                                   $total=str_replace('-','', $total);
                                                  
                                                  $payouttoatl+=$value->debits;
                                                  $payouttoatlcredits+=$value->credits;
                                                  
                                      
                                          
                                           
                         
                                            $seti=$j;



                                                if($value->order_date!='0')
                                             {
                                                          $value->payment_date=$value->order_date;
                                             }



                                             if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }


                                              if($value->process_by=='Voucher')
                                              { 
                                                 $account_head_idname=$value->dummy_customer_name;
                                                
                                              }


                                        
                                                ?>
                                          
                                            <tr >
                              
                                              <td><?php echo $j; ?></td>
                                              <td><?php echo $account_head_idname; ?></td>
                                              <td><?php echo  date('d-M-Y',strtotime($value->payment_date)); ?></td>
                                              <td><b>"<?php echo $value->reference_no; ?>"</b></td>
                                            
                                              <td><?php echo $value->debits; ?></td>
                                              <td><?php echo $value->credits; ?></td>
                                              <td style="color:<?php echo $color; ?>"><?php echo $total; ?></td>
                                              <td><?php
                                              
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
                                              
                                              
                                              
                                              ?> </td>
                                              <td><?php echo $username_base; ?></td>
                                              <td><?php echo $value->notes ?></td>
                                             
                                                
                                            </tr>
                                         
                                          
                                          <?php
                                        
                                        
                                     
                                      
                                      
                                      $i++;
                                      $j++;
                                   }
                            
                            ?>
                      
                        
                        
                      
                        
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  

  }




   public function fetch_data_get_ledger_view_export_commen()
  {




                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                    
                       $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                   
                     
                     
                     $sql="";
                     
                     if($customer_id>0)
                     {
                         
                                               $resultlocality= $this->Main_model->where_names('customers','id',$customer_id);
                                               foreach($resultlocality as $vl)
                                               {
                                                   if($vl->mark_vendor_id!=0 && $vl->deleteid==0)
                                                   {
                                                       $array1[]=$vl->mark_vendor_id;
                                                       $array2[]=$vl->id;
                                                   }
                                                   
                                                   
                                               }
                         
                        
                     }
                     
                      if(isset($_GET['deleteid']))
                     {
                         
                         $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                       $resultfetch = array_merge($array1, $array2);

                     $todate=$_GET['todate'];
                     $currentdate=date("Y-m-d");
                     if($currentdate==$todate)
                     {

                        $todate=date('Y-12-31');
                     }

                     if($customer_id_data=='')
                     {
                         
                               $formdate=$this->from_date;
                              $todate=$this->to_date;  
                              
                         
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.opening_balance_status='0'  $sql  ORDER BY a.payment_date,a.id ASC");
                            $result=$result->result();
                     }
                     else
                     {
                          
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0'  $sql  ORDER BY a.payment_date,a.id ASC");
                           
                          }
                          else
                          {
                             $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.paid_status='".$payment_status."'  AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  $sql ORDER BY a.payment_date,a.id ASC");
                          
                          }
                         
                         
                         
                          $result=$result->result();
                         
                         
                     }
                    
                   
                   
                 
                   
                   
                   $i=1;
                    $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('customers','id',$customer_id);
                     foreach ($resultvent as  $valuess) 
                     {
                         
                         
                              $name= $valuess->name; 
                              $name= $valuess->company_name;
                              $email= $valuess->email;
                              $phone= $valuess->phone;
                              $gst= $valuess->gst;
                              $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                    }
                   
                   
                   
                     $resultvent= $this->Main_model->where_names('vendor','id',$customer_id);
                     foreach ($resultvent as  $valuess) 
                     {
                         
                         
                              $name= $valuess->name; 
                              $email= $valuess->email;
                              $phone= $valuess->phone;
                              $gst= $valuess->gst;
                              $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                    }
                   
                   
                   
                   
                   
                   
                         
                       $filename=date('d-m-Y').'_customers_and_vendor_ledger'; 
                       header("Content-Type: application/xls");    
                       header("Content-Disposition: attachment; filename=$filename.xls");  
                       header("Pragma: no-cache"); 
                       header("Expires: 0");
                         
                         if($phone!='')
                         {
                             
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="11"><?php echo $name; ?></th></tr>
                              <tr><th colspan="11"><?php echo $phone; ?></th></tr>
                              
                              <?php
                              if($gst!='')
                              {
                                  ?>
                                    <tr><th colspan="11"><?php echo $gst; ?></th></tr>
                                  <?php
                              }
                              ?>
                              
                            
                              <tr><th colspan="11"><?php echo $fulladdress; ?></th></tr>
                          
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
                          <th>Date</th>
                          <th>Chq/Ref.No</th>
                         
                          <th>Debit</th>
                          <th>Credit</th>
                          <th>Balance</th>
                          <th>Payment Mode</th>
                          <th>User</th>
                          <th>Notes</th>
                         <th>IF Changes</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                            
                    
                                   
                   $payment_date=date('d-m-Y',strtotime($formdate));
                   
                   
                   
                   $resultopeing_new=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal,a.payment_date FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='1' $sql ORDER BY a.payment_date ASC");
                   $resultopeing_new=$resultopeing_new->result();
                   $openingbalance_new=0;
                   $openingbalancec_new=0;
                   $openingbalanced_new=0;
                   $openingbalanceval_new=0;
                  
                   
                   
                    foreach ($resultopeing_new as  $valuess)
                    {
                              $credits_new=$valuess->creditstotal;
                              
                              
                              $payment_date_set=date('d-m-Y',strtotime($valuess->payment_date));
                              
                              if($payment_date==$payment_date_set)
                              {
                                  $payment_date=$payment_date_set;
                              }
                              
                              if($payment_date_set=='01-Jan-1970')
                              {
                                   $payment_date=date('d-m-Y',strtotime($formdate));
                              }

                              if($payment_date == '01-04-2022')
                              {
                                     $payment_date=date('d-m-Y',strtotime($valuess->payment_date));
                              }
                              
                              $debits_new=$valuess->debitstotal;
                              $openingbalance_new=  $credits_new-$debits_new;
                              $openingbalanceval_new=  $credits_new-$debits_new;
                              
                                            if($openingbalance_new<0)
                                            {
                                                $getstatus1_new=1;
                                                
                                            }
                                            else
                                            {
                                                $getstatus1_new=0;
                                                
                                            }
                                            
                              $openingbalance_new=abs($openingbalance_new);
                              
                       }
                       
                  
                       
                      
                       
                   
                   
                              
                              
                              if($getstatus1_new==1)
                              {
                                  $openingbalanced_new=$openingbalance_new;
                                  $openingbalancec_new=0;
                              }
                              else
                              {
                                   $openingbalanced_new=0;
                                   $openingbalancec_new=$openingbalance_new;
                              }

























                   
                   
                   
                   $resultopeing=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal FROM all_ledgers  as a  WHERE a.payment_date < '".$formdate."'  AND a.deleteid='".$deleteid."' AND  a.opening_balance_status='0' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  $sql ORDER BY a.payment_date ASC");
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
                                            
                              $openingbalance=abs($openingbalance);
                              
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













                        $opdebits= $openingbalanced+$openingbalanced_new;
                        $opcredits= $openingbalancec+$openingbalancec_new;
                        $openingbalance= $opcredits-$opdebits;
                        $openingbalance=abs($openingbalance);
                        
                        $openingbalance_data= $opcredits-$opdebits;
                        
                        if($openingbalance_data<0)
                        {
                                                    $getstatus1_new=1;
                                                    
                        }
                        else
                        {
                                                    $getstatus1_new=0;
                                                    
                        }
                        
                        
                        
                        

                       $debits_opening= round($openingbalanced+$openingbalanced_new,2);
                       $credits_opening=  round($openingbalancec+$openingbalancec_new,2);
                        $totalvalopeingbalance= round($credits_opening-$debits_opening,2);
                       
                        if($totalvalopeingbalance>0)
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
                                              <td><?php echo $payment_date; ?></td>
                                              
                                              <td></td>
                                              <td><?php echo $debits_opening; ?></td>
                                              <td><?php echo $credits_opening; ?></td>
                                              <td style="color:<?php echo $color1; ?>"><?php echo round($openingbalance,2); ?></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              
                                                
                                            </tr>
                                            
                            <?php
                            
                            
                            
                            
                            
                            
                            
                            
                            
                                      $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;
                                      $i=2;
                                      
                                      $j=1;
                                      
                                      
                                           $balanceold=array($openingbalance_data);
                                           foreach ($result as  $value)
                                           {
                                                $credits=$value->credits;
                                                  $debits=$value->debits;
                                                $balanceold[]=  $credits-$debits;
                                               
                                           }
                                      
                                            foreach ($result as  $value) {
                                       
                                       
                                                    $resultventb= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                                      foreach ($resultventb as  $bb) {
                                                          $bank_name= $bb->bank_name; 
                                                      }
                                                  
                                          
                                                   
                                                     
                                                     
                                                     $resultvent= $this->Main_model->where_names('customers','id',$value->customer_id);
                                                   foreach ($resultvent as  $valuess) {
                                                      
                                                      $name= $valuess->company_name;
                                                     }
                                                     
                                                        $resultvent= $this->Main_model->where_names('vendor','id',$value->customer_id);
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
                                                  
                                                    $valueset=$balance;
                                            
                                                    if($valueset<0)
                                                    {
                                                        $color='red';
                                                    }
                                                    else
                                                    {
                                                        $color='green';
                                                    }
                                            
                                                   $total=round($valueset,2); 
                                                   $total=str_replace('-','', $total);
                                                  
                                                  
                                                  $payouttoatl+=$value->debits;
                                                  $payouttoatlcredits+=$value->credits;
                                                  
                                      
                                          
                                            $result_account_head=$this->db->query("SELECT * FROM accountheads_sub_group WHERE  id='".$value->account_heads_id_2."'  ORDER BY sort_order ASC");
                          $result_account_head_text=$result_account_head->result();
                          
                         foreach($result_account_head_text as $ass)
                         {
                                                    $account_head_idname=$ass->name;
                                                   
                         }       

                                          $bank_name="";
                                       if($value->notes!='Purchase Invoice Create')
                                       {
                                               $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                               foreach ($resultvent as  $valuess) {
                                                  $bank_name= $valuess->bank_name;
                                                  $account_head_idname= $valuess->bank_name; 
                                                  
                                                 
                                               }   

                                        }

                                       if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
                                             }
                         
                                            $seti=$j;
                                        
                                                ?>
                                          
                                            <tr >
                              
                                              <td><?php echo $j; ?></td>
                                              <td><?php echo $account_head_idname; ?></td>
                                              <td><?php echo  date('d-M-Y',strtotime($value->payment_date)); ?></td>
                                              <td><b><?php echo $value->reference_no; ?></b></td>
                                            
                                              <td><?php echo $value->debits; ?></td>
                                              <td><?php echo $value->credits; ?></td>
                                              <td style="color:<?php echo $color; ?>"><?php echo $total; ?></td>
                                              <td><?php
                                              
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
                                              
                                              
                                              
                                              ?> </td>
                                               <td><?php echo $username_base; ?></td>
                                              <td><?php echo $value->notes; ?> <?php echo $value->process_by; ?> - <?php echo $value->deletemod; ?></td>
                                              <td><?php echo $value->org_amount; ?></td>
                                                
                                            </tr>
                                         
                                          
                                          <?php
                                        
                                        
                                     
                                      
                                      
                                      $i++;
                                      $j++;
                                   }
                            
                            ?>
                      
                        
                        
                      
                        
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  

  }



































  public function fetch_data_get_ledger_view_export_group_outstanding_customer_ledger()
  {









           
                       $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $cnn_status=$_GET['cnn_status'];
                     $formdate='2022-04-01';
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND a.customer_id='".$customer_id."'";
                        
                        
                     }


                     $sql.=" AND a.cnn_status='".$cnn_status."'";
                     
                         
                     $sqlgetfecth_user='';
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $customer_id=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              $sales_group_id=implode(',',$sales_group_id);
                                              $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                              $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                           $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                         $customer_id=array();              
                                               $sales_group_id=array($this->userid);
                                              
                                             
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_sub_id IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                           
                             
                     }
                     elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
                     {
                         
                         
                         
                          
                                              
                                                $sales_team_id = array($this->userid);
                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                foreach ($resultsales_team as $values) {
                                                    $sales_team_id[] = $values->sales_member_id;
                                                }
                                               
                                               
                                               
                                                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                                foreach ($poin_to_member as $point) {
                                                    $sales_team_id[] = $point->id;
                                                }
                                                
                                                
                                               
                                             
                                               
                                                
                                                   $customer_id=array();                                     
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".implode("','", $sales_team_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id[]=$cc->customer_id;
                                               }    
                                               
                                                  
                                               $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id)."')";             
                                               
                                               
                                               
                                            
                             
                     }
                     else
                     {
                         
                                              $sqlgetfecth_user='';
                       
                     }
                     
                   
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     if($formdate=='undefined' || $formdate=='0')
                     {
                               
                                 $formdate=date('2023-07-01');
                              $todate=date('Y-m-d');
                              
                               $result=$this->db->query("SELECT a.customer_id,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op,b.op_status,b.cnn_opening_balance,b.cnn_payment_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0  AND a.party_type=1 AND b.mark_vendor_id IN ('0','1','-1') $sql $sqlgetfecth_user GROUP BY a.customer_id,b.company_name  ORDER BY aa.name ASC");
                              $result=$result->result();
                     }
                     else
                     {
                           
                              $result=$this->db->query("SELECT a.customer_id,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op,b.op_status,b.cnn_opening_balance,b.cnn_payment_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0  AND a.party_type=1 AND b.mark_vendor_id IN ('0','1','-1') $sql $sqlgetfecth_user GROUP BY a.customer_id  ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                         
                     }
                    
                   
                   $i=1;
                   $array=array();
                   $temp  = array();
                   foreach ($result as  $value) 
                   {
                       
                     $totalbalance=0;
                       $totalbalanceop=0;

                        $result2=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date <= '".$todate."' AND cnn_status='".$cnn_status."'");
                        $result2=$result2->result();
                       foreach ($result2 as  $set) {
                          $totalbalance= $set->totalbalance;
                       }


                        $result3=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date<'".$formdate."' AND cnn_status='".$cnn_status."'");
                        $result3=$result3->result();
                       foreach ($result3 as  $set3) {
                          $totalbalanceop= $set3->totalbalance;
                       }
   
                                    

                                             $pageno=""; 
                                             if(!in_array($value->sales_name, $temp))
                                             {
                                                   $pageno=$value->sales_name;
                                                   $temp[] = $value->sales_name;
                                             }
                                                                       
                                             $subresult=array();
                                      
                                              $payment_status="";
                                              $opening_balance_dr="";
                                              $opening_balance_cr="";
                                                      

                                                      $value->op=$totalbalanceop;

                                              if($value->op>0)
                                              {


                                            
                                                     if($value->op_status==1)
                                                     {
                                                        $opening_balance_cr=$value->op;
                                                        $opening_balance_dr="";
                                                        $payment_status='CR';
                                                     }
                                                     if($value->op_status==2)
                                                     {
                                                         $payment_status='DR';   
                                                         $opening_balance_dr=$value->op;
                                                         $opening_balance_cr="";
                                                     }


                                             }
                                             else
                                             {

                                                     if($value->payment_status==1)
                                                     {
                                                        //$opening_balance_cr=$value->opening_balance;
                                                        //$opening_balance_dr="";
                                                        //$payment_status='CR';
                                                     }
                                                     if($value->payment_status==2)
                                                     {
                                                         //$payment_status='DR';   
                                                         //$opening_balance_dr=$value->opening_balance;
                                                         //$opening_balance_cr="";
                                                     }

                                             }







                                                    //$valueset=$value->creditstotal-$value->debitstoatal;
                                            $valueset=$totalbalance;
                                            
                                            if($valueset<0)
                                            {
                                                $getstatus=1;

                                                $DR=round($valueset,2); 
                                                $DR=abs($DR);
                                                $CR=0;

                                            }
                                            else
                                            {
                                                $getstatus=0;

                                                $CR=round($valueset,2); 
                                                $CR=abs($CR);
                                                $DR=0;

                                            }

                                            $total=round($valueset,2); 
                                             $total=abs($total);
                                             
                                             
                                             
                            
                                        if($totalbalanceop>0)
                                        {
                                          $opening_balance_dr=0;
                                          $opening_balance_cr=$totalbalanceop;
                                        }
                                        else
                                        {

                                           $opening_balance_dr=abs($totalbalanceop);
                                           $opening_balance_cr=0;

                                        }
                                     
                                
                        $result4=$this->db->query("SELECT SUM(debits) as debitstoatal,SUM(credits) as creditstotal FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."' AND cnn_status='".$cnn_status."'");
                        $result4=$result4->result();
                       foreach ($result4 as  $sets) {
                          $value->debitstoatal= $sets->debitstoatal;
                          $value->creditstotal= $sets->creditstotal;
                       }      


                        if($cnn_status==1)
                      {

                            $opening_balance_cr="";
                            $opening_balance_cr="";
                            if($value->cnn_opening_balance>0)
                            {
                             
                                  if($value->cnn_payment_status==1){
                                    $opening_balance_cr=$value->cnn_opening_balance;
                                    $opening_balance_dr="";
                                    $payment_status='CR';
                                  }
                                  if($value->cnn_payment_status==2){
                                      $payment_status='DR';   
                                      $opening_balance_dr=$value->cnn_opening_balance;
                                      $opening_balance_cr="";
                                  }

                            }




                          $totalval=$value->debitstoatal+$value->creditstotal+$opening_balance_dr+$opening_balance_dr;

                           if($totalval>0)
                          {


                               $array[] = array(
                                    
                                    
                                         'no' => $i, 
                                         'id' => $value->id, 
                                         'name' => $pageno, 
                                         'company_name' => $value->company_name, 
                                         'customer_id' => $value->customer_id, 
                                         'payment_status' => $payment_status,
                                         'opening_balance' => round($value->opening_balance,2),
                                         'opening_balance_dr' => round($opening_balance_dr,2),
                                         'opening_balance_cr' => round($opening_balance_cr,2),
                                         'debits' => round($value->debitstoatal,2),
                                         'credits' => round($value->creditstotal,2),
                                         'getstatus' => $getstatus,
                                         'balance' => $total,
                                         'subresult'=>$subresult
                                  
            
                                );
                                $i++;



                               
                          }





                      }
                      else
                      {

                                $array[] = array(
                                    
                                    
                                         'no' => $i, 
                                         'id' => $value->id, 
                                         'name' => $pageno, 
                                         'company_name' => $value->company_name, 
                                         'customer_id' => $value->customer_id, 
                                         'payment_status' => $payment_status,
                                         'opening_balance' => round($value->opening_balance,2),
                                         'opening_balance_dr' => round($opening_balance_dr,2),
                                         'opening_balance_cr' => round($opening_balance_cr,2),
                                         'debits' => round($value->debitstoatal,2),
                                         'credits' => round($value->creditstotal,2),
                                         'getstatus' => $getstatus,
                                         'balance' => $total,
                                         'subresult'=>$subresult
                                  
            
                                );
                                $i++;



                      }
                                   
                                    
                               

                   }

                 
                  
                       $filename=date('d-m-Y').'outstanding_customer_ledger'; 
                       header("Content-Type: application/xls");    
                       header("Content-Disposition: attachment; filename=$filename.xls");  
                       header("Pragma: no-cache"); 
                       header("Expires: 0");
                         
                
                    ?>

                      <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Outstanding Customer Ledger FROM Date  <?php echo $formdate; ?> TO DATE  <?php echo $todate; ?> </th></tr>
                              
                           
                         </thead> 
                         
                    </table>
                    
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                      
                          <th style="width:50px;"><h5 class="font-size-14 mb-0">No</h5></th>
                          
                          <th style="width:200px;"><h5 class="font-size-14 mb-0">Customer Name</th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Opening Balance DR </h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Opening Balance CR </h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Debit</h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0">Credit</h5></th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0">Balance DR</h5> </th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0">Balance CR</h5> </th>

                           
                         
            
                        </tr>
                      </thead>
                        <tbody>

                            <?php

                                       $opening_balance_dr=0;
                                        $opening_balance_cr=0;
                                        $debits=0;
                                        $credits=0;
                                         $DR=0;
                                          $CR=0;
                                 
                                 foreach($array as $val)
                                 {

                                    ?>

                                    <tr>

                                        <td><?php echo $val['no']; ?></td>
                                        <td><b style="color:#ff5e14;"><?php echo $val['name']; ?><br></b>
                                            <?php echo $val['company_name']; ?>
                                        </td>
                                      
                                        <td><?php


                                        $opening_balance_dr+=$val['opening_balance_dr'];
                                        $opening_balance_cr+=$val['opening_balance_cr'];
                                        $debits+=$val['debits'];
                                        $credits+=$val['credits'];

                                          if($val['opening_balance_dr']!=0)
                                            {

                                        echo $val['opening_balance_dr'];

                                           }  


                                    

                                          ?></td>
                                        <td><?php 


                                         if($val['opening_balance_cr']!=0)
                                            {

                                        echo $val['opening_balance_cr'];

                                           }  


                                       



                                         ?></td>
                                        <td><?php 


                                        if($val['debits']!=0)
                                            {

                                        echo $val['debits'];

                                           }  


                                       


                                         ?></td>
                                        <td><?php 


                                           if($val['credits']!=0)
                                            {

                                        echo $val['credits'];

                                           }  


                                         ?></td>
                                         <td><?php 

                                         if($val['getstatus']==1)
                                         {

                                            $DR+=$val['balance'];
                                            if($val['balance']!=0)
                                            {
                                                echo $val['balance']; 
                                            }
                                         }

                                        


                                         ?></td>
                                          <td>
                                            <?php 

                                             if($val['getstatus']==0)
                                             {

                                                 $CR+=$val['balance'];
                                                if($val['balance']!=0)
                                                {

                                                 echo $val['balance']; 
                                                }
                                             }



                                            ?>
                                                
                                            </td>
                                    </tr>



                                    <?php

                                 }
                              
                            ?>
                            
                          <tr>


                          <th style="width:50px;"><h5 class="font-size-14 mb-0"></h5></th>
                          
                          <th style="width:200px;"><h5 class="font-size-14 mb-0"></th>

                          <th style="width:100px;"><h5 class="font-size-14 mb-0"><?php echo $opening_balance_dr; ?></h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0"><?php echo $opening_balance_cr; ?> </h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0"><?php echo $debits; ?></h5></th>
                          <th style="width:100px;"><h5 class="font-size-14 mb-0"><?php echo $credits; ?></h5></th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0"><?php echo  $DR ?></h5> </th>
                          <th style="width:100px;"> <h5 class="font-size-14 mb-0"><?php echo  $CR ?></h5> </th>

                            </tr>

                                      
                                    
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

  }

















  public function fetch_data_get_ledger_view_export_group()
  {









  
           
                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate='2022-04-01';
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     $sql="";
                     
                     if($customer_id!=0)
                     {
                         
                         if($customer_id!='')
                         {
                              $sql=" AND a.customer_id='".$customer_id."'";
                         }
                         
                        
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                         
                     $sqlgetfecth_user='';
                     if($this->session->userdata['logged_in']['access']=='16')
                     {
                         
                                              $sales_group_id=array();
                                              $customer_id_data=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                                              
                                                                              $sales_group_id[]=$values->id;
                                                                              
                                              }
                                              
                                              $sales_group_id=implode(',',$sales_group_id);
                                              $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                              $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id_data[]=$cc->customer_id;
                                               }    
                                               
                                              $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id_data)."')";             
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='17')
                     {
                         
                                               $customer_id_data=array();              
                                               $sales_group_id=array($this->userid);
                                              
                                             
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_sub_id IN ('".implode(',',$sales_group_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id_data[]=$cc->customer_id;
                                               }    
                                               
                                                $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id_data)."')";             
                                           
                             
                     }
                     elseif ($this->session->userdata['logged_in']['access'] == '11'  || $this->session->userdata['logged_in']['access'] == '12')
                     {
                         
                         
                         
                         
                                              
                                                $sales_team_id = array($this->userid);
                                                $resultsales_team = $this->Main_model->where_in_names('sales_member_head','sales_head_id',$sales_team_id);
                                                foreach ($resultsales_team as $values) {
                                                    $sales_team_id[] = $values->sales_member_id;
                                                }
                                               
                                           
                                                $poin_to_member = $this->Main_model->where_names('admin_users','mark_sales_member',$this->userid);
                                                foreach ($poin_to_member as $point) {
                                                    $sales_team_id[] = $point->id;
                                                }
                                                
                                               
                                             
                                               
                                                
                                                   $customer_id_data=array();                                     
                                               $query = $this->db->query("SELECT id as customer_id FROM `customers`  WHERE deleteid='0' AND  sales_team_id IN ('".implode("','", $sales_team_id)."')  ORDER BY id ");
                                               $dataval=$query->result();
                                               foreach ($dataval as  $cc) {
                                                   
                                                   $customer_id_data[]=$cc->customer_id;
                                               }    
                                               
                                                  
                                               $sqlgetfecth_user=" AND a.customer_id  IN ('".implode("','", $customer_id_data)."')";             
                                               
                                              
                                               
                                            
                             
                     }
                     else
                     {
                         
                                              $sqlgetfecth_user='';
                       
                     }
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     if($customer_id_data=='')
                     {
                         
                           
                             
                               $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,b.sales_team_id,SUM(a.credits) as creditstotal,aa.name as sales_name,b.opening_balance,b.payment_status FROM all_ledgers as a LEFT JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE  a.deleteid=0 AND a.party_type=1  AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."' $sql $sqlgetfecth_user GROUP BY b.sales_team_id ORDER BY aa.name ASC");
                               $result=$result->result();
                     }
                     else
                     {         
                              
                              $result=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,b.sales_team_id,SUM(a.credits) as creditstotal,aa.name as sales_name,b.opening_balance,b.payment_status FROM all_ledgers as a LEFT JOIN customers as b ON a.customer_id=b.id JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid=0  AND a.party_type=1 $sql $sqlgetfecth_user GROUP BY b.sales_team_id  ORDER BY aa.name ASC");
                              $result=$result->result();
                        
                     }
                    
                   
                   
                 
                   
                   
                   $i=1;
                    $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('customers','id',$customer_id);
                   foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      $name= $valuess->company_name;
                      $email= $valuess->email;
                      $phone= $valuess->phone;
                      $gst= $valuess->gst;
                     
                      $fulladdress= $valuess->address1.$valuess->landmark.$valuess->pincode.','.$valuess->state;
                      
                    
                   }
                   
                   
                   
                   
                   $payment_status="";
                                    if($value->payment_status==1)
                                    {
                                        $payment_status='CR';
                                    }
                                     if($value->payment_status==2)
                                    {
                                      $payment_status='DR';   
                                    }
                   
                   
                         
                         $filename=date('d-m-Y').'customers_ledger_group'; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                         
                         if($phone!='')
                         {
                             
                         
                  ?>
                  
                   <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="6"><?php echo $name; ?></th></tr>
                              <tr><th colspan="6"><?php echo $phone; ?></th></tr>
                              
                              <?php
                              if($gst!='')
                              {
                                  ?>
                                    <tr><th colspan="6"><?php echo $gst; ?></th></tr>
                                  <?php
                              }
                              ?>
                              
                            
                              <tr><th colspan="6"><?php echo $fulladdress; ?></th></tr>
                          
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
                            
                            
                                     $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;
                                      $totalbalanceget=0;
                                      $i=1;
                                   foreach ($result as  $value) {
                                       
                                       
                                             
                                                  
                                      
                                               $resultsub=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,b.company_name,b.opening_balance,b.payment_status FROM all_ledgers as a LEFT JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid=0 AND a.party_type=1  AND b.sales_team_id='".$value->sales_team_id."' $sql GROUP BY a.customer_id  ORDER BY b.company_name ASC");
                                               $resultsub=$resultsub->result();
                                               
                                               
                                               
                                              
                                       
                                        
                                        
                                      ?>
                                      
                                        <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><b style="color:#ff5e14;"><?php echo $value->sales_name; ?></b></td>
                                           </tr>
                                           <?php
                                            foreach ($resultsub as  $valuess) {
                                                
                                                
                                                 $payment_status="";
                                                 if($valuess->payment_status==1)
                                                 {
                                                    $payment_status='CR';
                                                 }
                                                 if($valuess->payment_status==2)
                                                 {
                                                  $payment_status='DR';   
                                                 }
                                                    
                                                 $balance=$valuess->balance;
                                                 $payouttoatl+=$valuess->debitstoatal;
                                                 $payouttoatlcredits+=$valuess->creditstotal;
                                                 $totalbalance= $valuess->creditstotal-$valuess->debitstoatal;
                                               
                                                 $totalbalanceget+=$totalbalance;
                    
                                           ?>
                                         <tr>
                                             <td></td>
                                          <td><?php echo $valuess->company_name; ?></td>
                                           <td><?php echo $valuess->opening_balance; ?> <?php echo $payment_status; ?></td>
                                         
                                          <td><?php echo round($valuess->debitstoatal,2); ?></td>
                                          <td><?php echo round($valuess->creditstotal,2); ?></td>
                                          <td><?php echo round($totalbalance,2); ?></td>
                                    
                                          </tr>  
                                      
                                      <?php
                                      
                                            }
                                      
                                      
                                      
                                      $i++;
                                   }
                            
                            ?>
                      
                        
                        
                        <tr >
                          
                                           <td></td>
                                           <td></td>
                                          
                                          <td></td>
                                           <td><?php echo $payouttoatl; ?></td>
                                           <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo round($totalbalanceget,2); ?></td>
                                          
                                          
                                            
                                        </tr>
                        
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

  }



public function fetch_data_get_ledger_view_export_group_commen()
  {







  
           
                    
                     $customer_id_data=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate='2022-04-01';
                     $todate=$_GET['todate'];
                     
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     $sql="";
                     
                    
                 
                   
                   
                                  $i=1;
                   
                                if($customer_id>0)
                                 {
                                     $sql=" AND a.customer_id='".$customer_id_datas."'";
                                 }

                               
                    
                    $resultsub=$this->db->query("SELECT a.id,a.name,a.customer_id,
                    SUM(a.opeing_balance_cr) as opeing_balance_cr,
                    SUM(a.opeing_balance_dr) as opeing_balance_dr,
                    SUM(a.balance_dr) as balance_dr,
                    SUM(a.balance_cr) as balance_cr,
                    SUM(a.debit) as debit,
                    SUM(a.credit) as credit

                   FROM commen_ledgers as a   WHERE  a.id>0  $sql GROUP BY a.customer_id  ORDER BY a.name ASC");
                   $resultsub=$resultsub->result();
                                       
                                   
                                       $subresult=array();
                                        $temp = array();
                                       foreach ($resultsub as  $valuesub) 
                                       {
                                                 

                                             




                                            
                                                             $url=base_url()."index.php/customer/ledger_commen_find?customer_id=".$valuesub->customer_id;

                                                               $payment_status_value=round($valuesub->opeing_balance_cr-$valuesub->opeing_balance_dr);
                                                               if($payment_status_value<0)
                                                               {
                                                                  $payment_status='DR';
                                                               }
                                                               else
                                                               {
                                                                  $payment_status='CR';   
                                                               }


                                                               $total=round($valuesub->balance_cr-$valuesub->balance_dr);
                                                               if($total<0)
                                                               {
                                                                  $getstatus='1';
                                                               }
                                                               else
                                                               {
                                                                  $getstatus='0';   
                                                               }
                                                         
                                                              $subresult[] = array(
                                               
                                        
                                                                    'no' => $i, 
                                                                    'id' => $valuesub->id, 
                                                                    'name' => $valuesub->name, 
                                                                    'url' => $url, 
                                                                    'customer_id' => $valuesub->customer_id, 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $payment_status,
                                                                    'opening_balance' =>abs($payment_status_value),
                                                                    'debits' => round($valuesub->debit,2),
                                                                    'credits' => round($valuesub->credit,2),
                                                                    'getstatus' => $getstatus,
                                                                    'balance' => abs($total)
                                                              
                                        
                                                             );
                                             
                                              $i++; 

                                              


                                           



                                       }




                   
                         
                        $filename=date('d-m-Y').'Customer_Vendor_commen_ledger'; 
                        header("Content-Type: application/xls");    
                        header("Content-Disposition: attachment; filename=$filename.xls");  
                        header("Pragma: no-cache"); 
                        header("Expires: 0");
                         
                
                  
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
                            
                            
                                     $balancetoatal=0;
                                      $payouttoatl=0;
                                      $payouttoatlcredits=0;
                                      $totalbalanceget=0;
                                      $i=1;
                                   foreach ($subresult as  $value) {
                                       
                                       
                                        
                                      ?>
                                      
                                        <tr >
                          
                                          <td><?php echo $value['no']; ?></td>
                                         
                                           
                                           <?php
                                         
                                                
                                             
                                                 
                                                 $payouttoatl+=$value['debits'];
                                                 $payouttoatlcredits+=$value['credits'];
                                                 $totalbalance= $value['debits']-$value['credits'];
                                                 $totalbalanceget+=$totalbalance;
                    
                                           ?>
                                         
                                          
                                          <td><?php echo $value['name']; ?></td>
                                           <td><?php echo $value['opening_balance']; ?> <?php echo $value['payment_status']; ?></td>
                                         
                                          <td><?php echo round($value['debits'],2); ?></td>
                                          <td><?php echo round($value['credits'],2); ?></td>
                                          <td><?php echo round($value['balance'],2); ?></td>
                                    
                                          </tr>  
                                      
                                      <?php
                                      
                                            
                                      
                                      
                                      
                                     
                                   }
                            
                            ?>
                      
                        
                        
                        <tr >
                          
                                           <td></td>
                                           <td></td>
                                          <td></td>
                                         
                                           <td><?php echo $payouttoatl; ?></td>
                                           <td><?php echo $payouttoatlcredits; ?></td>
                                           <td><?php echo round($totalbalanceget,2); ?></td>
                                          
                                          
                                            
                                        </tr>
                        
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

  }









  
    public function save_to_pay()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     //$date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     $date=$form_data->payment_date;
                     $discountamount=$form_data->discountamount;
                     $enteramount=$form_data->enteramount;
                     $payamount=$form_data->payamount;
                     $payment_mode_payoff=$form_data->payment_mode_payoff;
                     $reference_no=$form_data->reference_no;
                     $totalpending=$payamount-$enteramount;
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                     
                     
                     $notes=$form_data->notes;
                     $writeoff=$form_data->writeoff;
                     $bankaccount=$form_data->bankaccount;
                     $payment_type=$form_data->payment_type;
                      
                      
                     
                    
                      
                      
                     
                    
                                             //$res = $this->Main_model->where_names_limit_base($tablename,'customer_id',$customer_id,1);
                                             
                                            $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid','0','id','ASC');
                     
                                             
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                 $payid=$val->id;
                                                 
                                                 $order_no=$val->order_no;
                                                 $amount=$val->amount;
                                                 $debitsamount+=$val->debits;
                                                 $creditsamount+=$val->credits;
                                                 $balancetotal+=$val->balance;
                                             }
                                             
                                             $balancetotal=$creditsamount-$debitsamount;                    
                     
                                             $account_head_id=0;
                                             $res = $this->Main_model->where_names('customers','id',$customer_id);
                                             foreach($res as $val)
                                             {
                                                    $company_name= $val->company_name;
                                                    $account_head_id= $val->account_heads_id;
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
                                                         $account_heads_id_by_bank=$valb->account_heads_id;
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
                                                        $data_bank['ex_code']=$form_data->reference_no;
                                                        $data_bank['debit']=0;
                                                        
                                                        
                                                        
                                                        
                                                                          if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=$enteramount;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal+$enteramount;
                                                                          }
                                                        
                                                        $data_bank['credit']=$enteramount;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Payment received';
                                                        
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

                                                        $insertbank= $this->Main_model->insert_commen($data_bank,'bankaccount_manage');


                                                       }
                                                       


                                                          
                                              }
                              
                      
                     
                     
                     
                     
                     
                    
                              $data_driver['order_id']=0;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['party_type']=1;
                              
                              
                              
                              
                             
                              if($payment_mode_payoff=='Cash')
                              {
                                $data_driver['reference_no']='00000';
                                $data_driver['order_no']=''; 
                                   $data_driver['cash_trasfer_status']=0;
                              }
                              else
                              {
                                  $data_driver['reference_no']=$reference_no;
                                  $data_driver['order_no']='';
                                     $data_driver['cash_trasfer_status']=1;
                              }
                              
                              $data_driver['amount']=0;
                             
                              
                              
                                                         if($payment_type=='Credit')
                                                         {
                                                             
                                                             
                                                              
                                                                      if($balancetotal!='0')
                                                                      {
                                                                          $data_driver['balance']=0;
                                                                      }
                                                                      else
                                                                      {
                                                                          $data_driver['balance']=0;
                                                                          
                                                                      }  
                                                                      
                                 
                                                          
                                                         }
                                                          
                                                          
                                                       
                                                        $data_driver['debits']=0;
                              
                              
                              
                              
                              
                                  $data_driver['paid_status']='1';
                                  $data_driver['process_by']='Payment received By Customer Ledger';
                                 
                                 
                                
                        
                                  
                                  
                                  $data_driver['deletemod']='PE'.$insertbank;
                                  if($bid>0)
                                  {

                                  $this->db->query("UPDATE bankaccount_manage SET deletemod='".$data_driver['deletemod']."' WHERE id='".$insertbank."'");

                                  }

                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $data_driver['bank_id']=$bankaccount;
                                  
                                 
                                  if($writeoff==1)
                                  {
                                      $data_driver['notes']=$notes.' Warite Off Rs '.$enteramount;
                                  }
                              
                                  if($discountamount>0)
                                  {  
                                      
                                       $data_driver['account_head_id']=147;
                                       $data_driver['account_heads_id_2']=147;
                                      $data_driver['notes']='DISCOUNT';
                                      $data_driver['credits']=$discountamount;


                                      if($customer_id>0)
                                      {


                                      $this->Main_model->insert_commen($data_driver,$tablename);

                                      }




                                  }
                                  
                                  if($enteramount>0)
                                  {  
                                        $data_driver['notes']=$notes;
                                      $data_driver['credits']=$enteramount;
                                       $data_driver['account_head_id']=68;
                                       $data_driver['account_heads_id_2']=123;


                                       if($customer_id>0)
                                      {

                                      $this->Main_model->insert_commen($data_driver,$tablename);

                                       }




                                  }
                                                  
                     
                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
      public function save_to_pay_bank_and_check()
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
                     $totalpending=$payamount-$enteramount;
                     $customer_id=$form_data->customer_id;
                     
                     $order_no=$form_data->order_no;
                     $order_id=$form_data->order_id;
                     
                     
                     if(isset($form_data->payment_id_base))
                     {
                          $payment_id_base=$form_data->payment_id_base;
                          $payment_id_base=explode("|",$payment_id_base);
                          for($k=0;$k<count($payment_id_base);$k++)
                          {
                                                 
                                    $this->db->query("UPDATE sales_load_products SET driver_payment_status='1' WHERE id='".$payment_id_base[$k]."'");                   
                                                  
                          }
                         
                     }
                     
                    
                     
                     
                     $notes=$form_data->notes;
                     $writeoff=$form_data->writeoff;
                     $bankaccount=$form_data->bankaccount;
                     $payment_type=$form_data->payment_type;
                      
                      
                     
                    
                      
                      
                     
                    
                                             //$res = $this->Main_model->where_names_limit_base($tablename,'customer_id',$customer_id,1);
                                             
                                            $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',1,'deleteid','0','id','ASC');
                     
                                             
                                             $balancetotal=0;
                                             $debitsamount=0;
                                             $creditsamount=0;
                                             foreach($res as $val)
                                             {
                                                 $payid=$val->id;
                                                 
                                              
                                                 $amount=$val->amount;
                                                 $debitsamount+=$val->debits;
                                                 $creditsamount+=$val->credits;
                                                 $balancetotal+=$val->balance;
                                             }
                                             
                                             $balancetotal=$creditsamount-$debitsamount;                    
                     
                                             $account_head_id=0;
                                             $res = $this->Main_model->where_names('customers','id',$customer_id);
                                             foreach($res as $val)
                                             {
                                                    $company_name= $val->company_name;
                                                    $account_head_id= $val->account_heads_id;
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
                                                         $account_heads_id_by_bank=$valb->account_heads_id;
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
                                                        $data_bank['ex_code']=$form_data->reference_no;
                                                        $data_bank['debit']=0;
                                                        
                                                        
                                                        
                                                        
                                                                          if($bankbalancetotal==0)
                                                                         {   
                                                                                   $data_bank['balance']=$enteramount;
                                                                         }
                                                                         else
                                                                         {
                                                                                   
                                                                                   $data_bank['balance']=$bankbalancetotal+$enteramount;
                                                                          }
                                                        
                                                        $data_bank['credit']=$enteramount;
                                                        $data_bank['name']=$company_name;
                                                        $data_bank['create_date']=date('Y-m-d');
                                                        $data_bank['status_by']='Payment received';
                                                        
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
                                                        $bankinsertid=$this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                        
                                                        $valinsertat='PA'.$bankinsertid;
                                                        $this->db->query("UPDATE bankaccount_manage SET deletemod='".$valinsertat."' WHERE id='".$bankinsertid."'");
                                                          
                                              }
                              
                      
                     
                     
                     
                     
                     
                    
                              $data_driver['order_id']=0;
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']=$payment_mode_payoff;
                              $data_driver['payment_mode_payoff']=$payment_mode_payoff;
                              $data_driver['party_type']=1;
                             
                              if($payment_mode_payoff=='Cash')
                              {
                                $data_driver['reference_no']='00000';
                                $data_driver['order_no']=$order_no; 
                                $data_driver['order_id']=0;
                                $data_driver['cash_trasfer_status']=0;
                              }
                              else
                              {
                                  $data_driver['reference_no']=$reference_no;
                                  $data_driver['order_no']=$order_no;
                                  $data_driver['order_id']=0;
                                  $data_driver['cash_trasfer_status']=1;
                              }
                              
                              $data_driver['amount']=0;
                              $data_driver['notes']=$notes.' '.$order_no;
                              if($writeoff==1)
                              {
                                  $data_driver['notes']=$notes.' Warite Off Rs '.$enteramount;
                              }
                              
                              
                                                         if($payment_type=='Credit')
                                                         {
                                                             
                                                             
                                                              
                                                                      if($balancetotal!='0')
                                                                      {
                                                                          $data_driver['balance']=$balancetotal+$enteramount;
                                                                      }
                                                                      else
                                                                      {
                                                                          $data_driver['balance']=$enteramount;
                                                                          
                                                                      }  
                                                                      
                                 
                                                          
                                                         }
                                                          
                                                          
                                                        $data_driver['credits']=$enteramount;
                                                        $data_driver['debits']=0;
                              
                              
                              
                              
                              
                                          $data_driver['paid_status']='1';
                                          $data_driver['process_by']='Payment received By Sales';
                                         
                                          $data_driver['account_head_id']=68;
                                          $data_driver['account_heads_id_2']=123;
                                          
                                          $data_driver['deletemod']=$valinsertat;
                                          $data_driver['payment_date']=$date;
                                          $data_driver['payment_time']=$time;
                                          $data_driver['bank_id']=$bankaccount;
                                          $this->Main_model->insert_commen($data_driver,$tablename);
                                                
                     
                     
                     
                     
                     
                     
                     
                     
                                             $data_addressid['get_id']=$order_id;
                                             $data_addressid['finance_status']=5;
                                             $data_addressid['reason']='Payment Received By '.$bank_name;
                                             $this->Main_model->update_commen($data_addressid,'orders_process');
                     
                     
                     
                     
                     
                     
                     
                     
                                  $array=array('error'=>'3','id'=>$customer_id);
                                  echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

  
    public function save_to_pay_transfer()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     $date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename='all_ledgers';
                     
                     $enteramount=$form_data->enteramount;
                     $date=$form_data->payment_date;
                     
                     
                     $party_type1=$form_data->party_type1;
                     $party_type2=$form_data->party_type2;
                     
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                   
                   
                   
                     $customer_id2=$form_data->customer_id2;
                     $pp2=explode('-', $customer_id2);
                     $customer_id2=$pp2[0];
                     $customer_name2=$pp2[1];
                     
                     
                     
                     
                     $notes=$form_data->notes;
                   
                     
                    $account_head_id=$form_data->account_head_id;
                      
                      
                  
                      $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$customer_id,'party_type',$party_type1,'deleteid','0','id','ASC');
                                                          
                   
                     $balancetotal=0;
                     $debitsamount=0;
                     $creditsamount=0;
                     foreach($res as $val)
                     {
                         $payid=$val->id;
                        
                         $order_no=$val->order_no;
                         $amount=$val->amount;
                         $debitsamount+=$val->debits;
                         $creditsamount+=$val->credits;
                         $balancetotal+=$val->balance;
                     }
                     
                       $balancetotal=0;
                       $checkset=0;
                       $driver_collection_status=0;
                        if(isset($form_data->l_id))
                        {
                         

                             $checkset= $form_data->l_id;
                             $result= $this->Main_model->where_names('all_ledgers','id',$checkset);
                             foreach ($result as  $value) 
                             {

                               $deletemod=$value->deletemod;
                               $driver_collection_status=$value->driver_collection_status;

                             }


                                 if($customer_id>0)
                                {


                                    if($checkset>0)
                                    {



 $del=$deletemod;  
 $this->db->query("UPDATE all_ledgers SET edited_by='".$this->userid."',deletemod='".$del."' WHERE id='".$checkset."'");
                                      
                                    }


                                }



                        }
                                                                       
                     
                                                                     $account_head_id=0;
                                                                     if($party_type1=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type1=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     if($party_type1=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                        
                                                                     if($party_type1=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id as account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                       
                                                                      $res=$res->result(); 
                                                                      $account_head_id=68;
                                                                      $account_heads_id_2=123;
                                                                     foreach($res as $val)
                                                                     {
                                                                                $company_name= $val->name;
                                                                                $account_head_id= $val->account_heads_id;
                                                                                $account_heads_id_2= $val->account_heads_id_2;
                                                                     }
                                             
                     
                                        
                     
                     
                    
                              $data_driver['order_id']='TR';
                              $data_driver['user_id']=$this->userid;
                              
                              if($party_type2==1)
                              {
                                  $setval='Customer ';
                              }
                              
                              if($party_type2==2)
                              {
                                  $setval='Driver ';
                              }
                              
                              if($party_type2==3)
                              {
                                  $setval='Vendor ';
                              }
                              
                              $data_driver['customer_id']=$customer_id;
                              $data_driver['payment_mode']='Party Transfer To '.$setval.$customer_name2;
                              $data_driver['party_to_party']=$customer_id2;
                              $data_driver['payment_mode_payoff']='0';
                             
                              
                              $data_driver['account_head_id']=$account_head_id;
                              $data_driver['account_heads_id_2']=$account_heads_id_2;
                              
                              $data_driver['reference_no']='-';
                              $data_driver['order_no']='Party Transfer To '.$setval.$customer_name2;
                              $data_driver['process_by']='Party Transfer';
                              $data_driver['amount']=0;
                              
                              $data_driver['cash_trasfer_status']=0;  
                              
                              $data_driver['deletemod']=$this->userid.$enteramount.$customer_id.$date;
                              $data_driver['notes']=$notes;
                              $data_driver['party_type']=$party_type1;
                              $data_driver['bank_id']=0;
                           
                              
                                                          
                                                             
                                                               if($balancetotal==0)
                                                              {   
                                                                   $data_driver['balance']='-'.$enteramount;
                                                              }
                                                              else
                                                              {
                                                                   
                                                                   $data_driver['balance']=$balancetotal-$enteramount;
                                                              }
                                                      
                                                                
                                                        
                                                          
                                                        $data_driver['debits']=$enteramount;
                                                        $data_driver['credits']=0;
                              
                              
                              
                              
                              
                                   $data_driver['paid_status']='1';
                              
                              
                          
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;
                                  $data_driver['driver_collection_status']=$driver_collection_status;


                                  if($checkset==0)
                                  {


                                    if($customer_id>0)
                                    {


                                         //$this->Main_model->insert_commen($data_driver,$tablename);
                              

                                    }


                                 


                                  }
                                                
                     
                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    public function save_to_pay_transfer1()
    {
                      
                     date_default_timezone_set("Asia/Kolkata"); 
                     $date= date('Y-m-d');
                     $time= date('h:i A');
                      
                     $form_data = json_decode(file_get_contents("php://input"));

                     
                     $tablename='all_ledgers';
                     
                     $party_type1=$form_data->party_type1;
                     $party_type2=$form_data->party_type2;
                     $selectedop=0;
                     

                     
                     $date=$form_data->payment_date;
                     $enteramount=$form_data->enteramount;
                   
                     $customer_id=$form_data->customer_id;
                     $pp=explode('-', $customer_id);
                     $customer_id=$pp[0];
                   
                   
                   
                     $customer_id2=$form_data->customer_id2;
                     $pp2=explode('-', $customer_id2);
                     
                     
                    
                     
                     $customer_id2=$pp2[0];
                     $customer_name2=$pp2[1];




                              if($party_type2==1)
                              {
                                  $setval='Customer ';
                              }
                              
                              if($party_type2==2)
                              {
                                  $setval='Driver ';
                              }
                              
                              if($party_type2==3)
                              {
                                  $setval='Vendor ';
                              }
                              
                     
                     
                   
                                 
                                 $notes=$form_data->notes;
                                 $payment_mode='Party Transfer From '.$setval.$customer_name2;
                               
                                 
                    
                      
                                                        
                                
                             $balancetotal=0;
                             $debitsamount=0;
                             $creditsamount=0;
                             $bank_id=0;
                             $driver_collection_status=0;

                        $deletemod=$this->userid.$enteramount.$customer_id2.$date;
                        $checkset=0;
                        $dummy_amount=0;
                        if(isset($form_data->l_id))
                        {
                         
                             $checkset= $form_data->l_id; 
                             $result= $this->Main_model->where_names('all_ledgers','id',$checkset);
                             foreach ($result as  $value) {

                            if($value->debits>0){
                              $dummy_amount =$value->debits;
                            }else{
                              $dummy_amount =$value->credits;
                            }
                               $deletemod=$value->deletemod;
                               $payment_mode=$value->payment_mode;
                               $bank_id=$value->bank_id;
                                $driver_collection_status=$value->driver_collection_status;

                             }

                              if($customer_id>0)
                             {

                                    if($checkset>0)
                                    {


                                      $del=$deletemod;  


                                      if($value->cash_trasfer_status==2)
                                      {
                                          // $this->db->query("UPDATE all_ledgers SET edited_by='".$this->userid."',deletemod='".$del."' WHERE id='".$checkset."'");
                          $this->db->query("UPDATE all_ledgers SET deleteid='1',edited_by='".$this->userid."',deletemod='".$del."' WHERE deletemod='".$value->deletemod."'");


                                      }
                        

                                    }

                              }



                        }
                     
                                                                      
                                                                     $ssname1="";
                                                                     $ssname="";
                                                                     if($party_type1=='2')
                                                                     {

                                                                            $selectedop=$form_data->selectedop;

                                                                            if($selectedop==0)
                                                                            {
                                                                              $ssname="COLLECTION ";
                                                                            }
                                                                            else
                                                                            {
                                                                              $ssname="RENT ";
                                                                            }



                                                                     }

                                                                     if($party_type2=='2')
                                                                     {


                                                                            $selectedoptiondriver=$form_data->selectedoptiondriver;

                                                                            if($selectedoptiondriver==0)
                                                                            {
                                                                              $ssname1="COLLECTION ";
                                                                            }
                                                                            else
                                                                            {
                                                                              $ssname1="RENT ";
                                                                            }



                                                                     }

                                                                     $account_head_id=0;
                                                                     if($party_type1=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type1=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                           
                                                                            
                                                                     }
                                                                     
                                                                     if($party_type1=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type1=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id as account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
                                                                     }
                                                                      $res=$res->result();
                                                                      $account_head_id=68;
                                                                      $account_heads_id_2=123;
                                                                     foreach($res as $val)
                                                                     {
                                                                            $company_name= $val->name;
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }
                                             
                     
                                        
                                                             
                                                             
                                                                  
                                                             
                              if($checkset>0)
                              {
                                     $deleteidval=$checkset;
                              }
                              else
                              {
                                     $deleteidval=substr(time(), 4);
                              }     
                 
                     
                     
                    
                              $data_driver['order_id']='TR';
                              $data_driver['user_id']=$this->userid;
                              $data_driver['customer_id']=$customer_id;
                             
                              $data_driver['dummy_customer_id']=$customer_id2;
                              $data_driver['dummy_customer_name']=$customer_name2;
                              $data_driver['dummy_party_type']=$party_type2;
                              $data_driver['dummy_amount']=$dummy_amount;
                              
                              $data_driver['payment_mode']=$payment_mode;
                              $data_driver['bank_id']=$bank_id;
                              $data_driver['payment_mode_payoff']='0';
                              
                              $data_driver['party_to_party']=$customer_id2;
                              
                              $data_driver['account_head_id']=$account_head_id;
                              $data_driver['account_heads_id_2']=$account_heads_id_2;
                              
                              $data_driver['reference_no']='Party Transfer From - '.$ssname1.' '.$customer_name2;
                              $data_driver['order_no']='Party Transfer From - '.$ssname1.' '.$customer_name2;
                              $data_driver['process_by']='Party Transfer';
                              $data_driver['party_type']=$party_type1;
                              
                              $data_driver['cash_trasfer_status']=2;  
                              

                              $data_driver['amount']=$enteramount;
                              $data_driver['notes']=$notes;
                              $data_driver['driver_collection_status']=$form_data->selectedop;
                             
                              $data_driver['credits']=$enteramount;
                              $data_driver['debits']=0;
                              
                              $data_driver['paid_status']='1';
                              
                                  $data_driver['deletemod']=$deletemod.$customer_id;
                                  $data_driver['account_head_id']=$account_head_id;
                                  $data_driver['account_heads_id_2']=$account_heads_id_2;
                                  
                                  $data_driver['payment_date']=$date;
                                  $data_driver['payment_time']=$time;


                              if($customer_id>0)
                              {


                                  $this->Main_model->insert_commen($data_driver,$tablename);
                                                
                                  if($checkset>0)
                                  {
                                      $this->db->query("UPDATE bankaccount_manage SET name='".$company_name."',credit='".$enteramount."' WHERE deletemod='".$deletemod."'");
                                  }


                              }



                                                                    

                                                                   
                                                                     if($party_type2=='1')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,company_name as name,account_heads_id,account_heads_id_2 FROM customers  WHERE deleteid='0' AND id='".$customer_id2."' ORDER BY id ASC");
                                                                     }
                                                                     if($party_type2=='2')
                                                                     {
                                                                           $res = $this->db->query("SELECT id,name,account_heads_id,account_heads_id_2 FROM driver  WHERE deleteid='0' AND id='".$customer_id2."' ORDER BY id ASC");
                                                                            
                                                                     }
                                                                     
                                                                     if($party_type2=='3')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM vendor  WHERE deleteid='0' AND id='".$customer_id2."' ORDER BY id ASC");
                                                                     }
                                                                     
                                                                     
                                                                     if($party_type2=='5')
                                                                     {
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id as account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id2."' ORDER BY id ASC");
                                                                     }


                                                                     $res=$res->result();
                                                                     
                                                                     foreach($res as $val)
                                                                     {
                                                                           
                                                                            $account_head_id= $val->account_heads_id;
                                                                            $account_heads_id_2= $val->account_heads_id_2;
                                                                     }









                              $data_driver1['order_id']='TR';
                              $data_driver1['user_id']=$this->userid;
                              $data_driver1['customer_id']=$customer_id2;

                              //$data_driver1['dummy_customer_id']=$customer_id;
                              //$data_driver1['dummy_customer_name']=$company_name;
                              //$data_driver1['dummy_party_type']=$party_type1;
                              
                              $data_driver1['dummy_amount']=$dummy_amount;
 
                              $data_driver1['payment_mode']=$payment_mode;
                              $data_driver1['bank_id']=$bank_id;
                              $data_driver1['payment_mode_payoff']='0';
                              
                              $data_driver1['party_to_party']=$customer_id;
                              
                            
                              $data_driver1['reference_no']='Party Transfer To - '.$ssname.' '.$company_name;
                              $data_driver1['order_no']='Party Transfer To - '.$ssname.' '.$company_name;
                              $data_driver1['process_by']='Party Transfer';
                              $data_driver1['party_type']=$party_type2;
                              
                              $data_driver1['cash_trasfer_status']=2;  
                              

                              $data_driver1['amount']=$enteramount;
                              $data_driver1['notes']=$notes;
                              $data_driver1['driver_collection_status']=$form_data->selectedoptiondriver;
             
                              $data_driver1['credits']=0;
                              $data_driver1['debits']=$enteramount;
                              $data_driver1['paid_status']='1';

                            
                              $data_driver1['deletemod']=$deletemod.$customer_id;

                              $data_driver1['account_head_id']=$account_head_id;
                              $data_driver1['account_heads_id_2']=$account_heads_id_2;
                                  

                             
                              $data_driver1['payment_date']=$date;
                              $data_driver1['payment_time']=$time;

                              if($customer_id2>0)
                              {


                                  $this->Main_model->insert_commen($data_driver1,$tablename);



                              }


                     
                                             $array=array('error'=>'3','id'=>$customer_id);
                                             echo json_encode($array);

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  
     public function locality_list()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

                     $result= $this->Main_model->where_names('locality','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = trim($value->name);


                     }

             
                     echo json_encode($array);
                     


              

    }
      function  opblance_update($customer_id,$obalance,$op_status)
    {






 date_default_timezone_set("Asia/Kolkata"); 
 $date= date('Y-m-d');
 $time= date('h:i A');



                          $form_data->id=$customer_id;
                          $form_data->val=$op_status;
                          $data['opening_balance']=$obalance;
                          $data['op']=$obalance;
                          $data['op_status']=$form_data->val;
                          $data_driver['order_id']=0;
                          $data_driver['user_id']=$this->userid;
                          $data_driver['customer_id']=$form_data->id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          
                          
                          
                          
                                                                     // $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                     
                          
                          
                                                                             
                                                                              if($form_data->val=='1')
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('2024-03-31');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=1;
                                                                              $data_driver['bank_id']=25;
                                                                              $data_driver['deletemod']='OP1-'.$form_data->id;
                                                                              $data_driver['account_head_id']=68;
                                                                              $data_driver['account_heads_id_2']=123;
                                                                              
                                                                              
$querycheck = $this->db->query("SELECT id FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
  $querycheck=$querycheck->result();
  if(count($querycheck)==0)
  {
                                                                            
         $this->Main_model->insert_commen($data_driver,'all_ledgers');


         //$this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


  }
  else
  {


$this->db->query("UPDATE all_ledgers SET user_id='".$this->userid."',debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1' AND deleteid=0");



//$this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


                 
          
  }

                              





                                                                                    
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Customer Opening Balance';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($data_driver);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');



                          


                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $form_data->id; 
                                 $datas_log['data_fetch']= 'Opening Balance '.json_encode($data_driver); 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');



    }

    public function state_find_data()
    {



           $form_data = json_decode(file_get_contents("php://input"));
          
           $tablename=$form_data->tablename;

                     if(isset($form_data->value))
                     {
                           


                             $state_name=$form_data->value;
                             $state_id = $this->Main_model->where_names('state','name',$state_name);
                             foreach ($state_id as $value) {
                               $s_id=$value->id;
                             }
                            
                            
                            $result =$this->Main_model->where_names_two_order_by($tablename,'route_id',$s_id,'deleteid','0','id','ASC');
                      

                            

                     }
                     else
                     {
                            $result= $this->Main_model->where_names($tablename,'deleteid','0');
                     }

                  
      

                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value)
                     {
                         
                               
                            $data[] = array(
                                
                                
                            'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            

                           );
                        
                        $i++;


                     }

                    echo json_encode($data);

  

    }
    public function city_find_data()
    {



           $form_data = json_decode(file_get_contents("php://input"));
          
           $tablename=$form_data->tablename;

                     if(isset($form_data->value))
                     {
                           


                             $state_name=$form_data->value;
                             $state_id = $this->Main_model->where_names('district','name',$state_name);
                             foreach ($state_id as $value) {
                               $s_id=$value->id;
                             }
                            
                            
                            $result =$this->Main_model->where_names_two_order_by($tablename,'district_id',$s_id,'deleteid','0','id','ASC');
                      

                            

                     }
                     else
                     {
                            $result= $this->Main_model->where_names($tablename,'deleteid','0');
                     }

                  
      

                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value)
                     {
                         
                               
                            $data[] = array(
                                
                                
                            'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            

                           );
                        
                        $i++;


                     }

                    echo json_encode($data);

  

    }

     public function zone_find_data()
    {



           $form_data = json_decode(file_get_contents("php://input"));
          
           $tablename=$form_data->tablename;

                     if(isset($form_data->value))
                     {
                           


                             $state_name=$form_data->value;
                             $state_id = $this->Main_model->where_names('district','name',$state_name);
                             foreach ($state_id as $value) {
                               $s_id=$value->id;
                             }
                            
                            
                             $result= $this->Main_model->where_names($tablename,'deleteid','0');
                            

                     }
                     else
                     {
                            $result= $this->Main_model->where_names($tablename,'deleteid','0');
                     }

                  
      

                    
                     $data=array();
                     $i=1;
                     foreach ($result as  $value)
                     {
                            $district_id=$value->district_id;
                            $district_id=explode('|', $district_id);

                            if(in_array($s_id, $district_id))
                            {


                                       
                                    $data[] = array(
                                        
                                        
                                    'no' => $i, 
                                    'id' => $value->id, 
                                    'name' => $value->name, 
                                    

                                   );
                                
                               $i++;

                          }


                     }

                    echo json_encode($data);

  

    }
    function  opblance_update_cnn($customer_id,$obalance,$op_status)
    {



                                             $res = $this->Main_model->where_names('customers','id',$customer_id);
                                             foreach($res as $val)
                                             {
                                                    $cnn= $val->cnn;
                                             }

                                             if($cnn=='YES')
                                             {
                                               $deleteid=0;
                                             }
                                             else
                                             {
                                               $deleteid=1;
                                             }
                                             


                           date_default_timezone_set("Asia/Kolkata"); 
                           $date= date('Y-m-d');
                           $time= date('h:i A');



                          $form_data->id=$customer_id;
                          $form_data->val=$op_status;
                          $data['opening_balance']=$obalance;
                          $data['op']=$obalance;
                          $data['op_status']=$form_data->val;
                          $data_driver['order_id']=0;
                          $data_driver['user_id']=$this->userid;
                          $data_driver['customer_id']=$form_data->id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          
                          
                          
                          
                                                                     // $this->db->query("DELETE FROM all_ledgers  WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");
                                                                     
                          
                          
                                                                             
                                                                              if($form_data->val=='1')
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             $data_driver['credits']=$obalance;
                                                                                                             $data_driver['debits']=0;
                                                                              }
                                                                              else
                                                                              {
                                                                                  
                                                                                                             $data_driver['reference_no']='Opening Balance';
                                                                                                             $data_driver['order_no']='Opening Balance'; 
                                                                                                             $data_driver['opening_balance_status']='1';
                                                                                                            
                                                                                                             $data_driver['payout']=$obalance;
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('2024-03-31');
                                                                              $data_driver['payment_time']=$time;
                                                                              $data_driver['party_type']=1;
                                                                              $data_driver['bank_id']=25;
                                                                              $data_driver['deletemod']='OP1-'.$form_data->id;
                                                                              $data_driver['account_head_id']=68;
                                                                              $data_driver['account_heads_id_2']=123;
                                                                              $data_driver['cnn_status']=1;
                                                                              $data_driver['deleteid']=$deleteid;
                                                                              
                                                                              
                                                                              
$querycheck = $this->db->query("SELECT id FROM all_ledgers WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1' AND cnn_status=1");
  $querycheck=$querycheck->result();
  if(count($querycheck)==0)
  {
                                                                            
         $this->Main_model->insert_commen($data_driver,'all_ledgers');


  }
  else
  {


$this->db->query("UPDATE all_ledgers SET deleteid='".$data_driver['deleteid']."',debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1' AND cnn_status='1'  AND deleteid=0");

    
          
  }

                              





                                                                                    
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Customer Opening Balance CNN';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($data_driver);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');



                          


                                 $datas_log['user_id']= $this->userid;
                                 $datas_log['customer_id']= $form_data->id; 
                                 $datas_log['data_fetch']= 'Opening Balance '.json_encode($data_driver); 
                                 $this->Main_model->insert_commen($datas_log,'customer_edit_log');




    }
    public function fetch_data_log_report()
 {






                     $formdate=$_GET['formdate'];
                 
                  
                    $userslog="";


              










    $result=$this->db->query("SELECT * FROM backup_clear_log  ORDER BY id DESC ");
    $result=$result->result();





            
                     $array=array();

                     foreach ($result as  $value)
                     {

                          


                                                          $username='';
                                                          $query = $this->db->query("SELECT name FROM `admin_users`  WHERE id='".$value->user_id."'");
                                                          $resultsales_team=$query->result();
                                                          foreach ($resultsales_team as  $values_set) 
                                                          {

                                                                $username=$values_set->name;

                                                          }




                     
                            $array[] = array(


                                
                               
                                'username' => $username,
                                'date_time_clear' => $value->date_time_clear,
                                'from_date' => $value->from_date,
                                'process' => $value->process
                               


                            );




                     }

                   

                    echo json_encode($array);

    }
    public function order_data_clear()
    {

$this->db->query("UPDATE `all_ledgers` SET `data_edited`='0'  WHERE 1");
 $this->db->query("UPDATE `bankaccount_manage` SET `data_edited`='0'  WHERE 1");

                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;

 $this->db->query("UPDATE `orders` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND order_base IN ('1','-1','-3','-2') AND deleteid=0"); 

 $this->db->query("UPDATE `orders_quotation` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND order_base IN ('1','-1','-3') AND deleteid=0");


 $this->db->query("UPDATE `orders_process` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND order_base IN ('0','-1') AND deleteid=0");
 $this->db->query("UPDATE `orders_process` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND finance_status IN ('5','6','10','14') AND deleteid=0");
 $this->db->query("UPDATE `order_delivery_order_status` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND finance_status IN ('5','6','10','14') AND deleteid=0");
 $this->db->query("UPDATE `order_delivery_order_status` SET `deleteid` = '".$fromdate."' WHERE `create_date` < '".$fromdate."' AND order_base IN ('0','-1') AND deleteid=0");


 $this->db->query("UPDATE `order_sales_return_complaints` SET `deleteid`='".$fromdate."'  WHERE order_base IN ('5','4') AND deleteid=0 AND update_date<'".$fromdate."'");



 $this->db->query("UPDATE `purchase_orders_process` SET `deleteid`='".$fromdate."' WHERE `create_date` < '".$fromdate."' AND deleteid='0'");
 $this->db->query("UPDATE `purchase_invoice` SET `deleteid`='".$fromdate."'  WHERE deleteid='0' AND update_date<'".$fromdate."'");

 $this->db->query("UPDATE `all_ledgers` SET `data_edited`='0'  WHERE 1");
 $this->db->query("UPDATE `bankaccount_manage` SET `data_edited`='0'  WHERE 1");



  $customer=$this->db->query("SELECT id,order_no,order_id,order_base,create_date,reason,finance_status FROM order_delivery_order_status WHERE `create_date`<'".$fromdate."' AND order_base>0 AND deleteid=0");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

    $this->db->query("UPDATE all_ledgers SET payment_date='".$fromdate."',order_date='".$vv->create_date."',deleteid=0 WHERE  order_no='".$vv->order_no."' AND party_type=1");


    $this->db->query("UPDATE all_ledgers SET payment_date='".$fromdate."',order_date='".$vv->create_date."',deleteid=0 WHERE  order_no='".$vv->order_no."' AND party_type=5");

 //$this->db->query("UPDATE all_ledgers SET payment_date='".$fromdate."',order_date='".$vv->create_date."',deleteid=0 WHERE  order_no='".$vv->order_no."' AND party_type=2 AND driver_collection_status=0");

    $this->db->query("UPDATE `orders_process` SET `deleteid` = '0' WHERE `id`='".$vv->order_id."'");
    
  }


  $ss=$this->db->query("SELECT * FROM orders_quotation WHERE  order_base IN('0','-4','3','5')");
  $ss=$ss->result();
  foreach($ss as $dd)
  {
                $move_id=$dd->move_id;
                $this->db->query("UPDATE orders SET deleteid='0' WHERE  id='".$move_id."'");
    
  }



                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='ENQUIRY,QUOTATION';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');




    } 


  public function dataclear_customer_without_cnn()
  {

    $this->db->query("UPDATE `all_ledgers` SET `data_edited`='0'  WHERE 1");
 $this->db->query("UPDATE `bankaccount_manage` SET `data_edited`='0'  WHERE 1");

                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $cnn_status=0;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));

                                  // CUSTOMER --------------------//

   $customer=$this->db->query("SELECT * FROM customers WHERE  deleteid='0'    ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

 $customer_id=$vv->id;



  $ss=$this->db->query("SELECT SUM(bill_total) as bill_total FROM orders_process WHERE  order_base>0 AND  customer_id='".$customer_id."' AND `deleteid`='".$fromdate."'");
  $ss=$ss->result();
  foreach($ss as $dd)
  {
            $bill_total=$dd->bill_total;
            $this->db->query("UPDATE customers SET last_bill_amount_total=last_bill_amount_total+'".$bill_total."' WHERE  id='".$customer_id."'");
    
  }
   
   
  
 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}



if($opstatus==1)
{




$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=1;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=68;
                          $data_driver['account_heads_id_2']=123;
                        $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
     if($cnn_status==0)
     {

      $this->db->query("UPDATE customers SET op='".$openingbalance."',op_status='1',payment_status='1',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
      
     }
     else
     {

       $this->db->query("UPDATE customers SET cnn_payment_status='1',cnn_opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");

     }
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=1;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=68;
                          $data_driver['account_heads_id_2']=123;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}





     if($cnn_status==0)
     {

      $this->db->query("UPDATE customers SET op='".$openingbalance."',op_status='2',payment_status='2',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
    
     }
     else
     {

      $this->db->query("UPDATE customers SET cnn_payment_status='2',cnn_opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
     
     }                
     
                         

}

$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND opening_balance_status!=1");


}








                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='PURCHASE ACCOUNT';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');

       

  }

   public function dataclear_customer_with_cnn()
  {
       


        date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $cnn_status=1;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));

                                  // CUSTOMER --------------------//

   $customer=$this->db->query("SELECT * FROM customers WHERE  deleteid=0 AND cnn='YES'   ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

 $customer_id=$vv->id;




   
  
 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}

$openingbalance=0;

if($opstatus==1)
{




$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=1;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=68;
                          $data_driver['account_heads_id_2']=123;
                        $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
     if($cnn_status==0)
     {

      $this->db->query("UPDATE customers SET op='".$openingbalance."',op_status='1',payment_status='1',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
      
     }
     else
     {

       $this->db->query("UPDATE customers SET cnn_payment_status='1',cnn_opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");

     }
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=1;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=68;
                          $data_driver['account_heads_id_2']=123;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}





     if($cnn_status==0)
     {

      $this->db->query("UPDATE customers SET op='".$openingbalance."',op_status='2',payment_status='2',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
    
     }
     else
     {

      $this->db->query("UPDATE customers SET cnn_payment_status='2',cnn_opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
     
     }                
     
                         

}

$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=1  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND opening_balance_status!=1");


}








                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='INDIRECT INCOME';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');

  }
    

public function dataclear_vendor()
{



                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $cnn_status=0;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));


  $customer=$this->db->query("SELECT * FROM vendor WHERE  deleteid=0    ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

 $customer_id=$vv->id;


 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}



if($opstatus==1)
{



$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=3;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=104;
                          $data_driver['account_heads_id_2']=119;
                        $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
     $this->db->query("UPDATE vendor SET op='".$openingbalance."',op_status='1',payment_status='1',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
      
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=3;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=104;
                          $data_driver['account_heads_id_2']=119;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}



 



      $this->db->query("UPDATE vendor SET op='".$openingbalance."',op_status='2',payment_status='2',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
                 
     
                         

}


$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=3  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND opening_balance_status!=1");

 }



                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='DIRECT EXPENSES';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');
       

}
                     //CUSTOMER END --------------------//





  public function dataclear_driver1()
  {

               
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $driver_collection_status=0;
                   $cnn_status=0;

$this->db->query("UPDATE site_settings SET cleared_date='".$fromdate."' WHERE id='1'");
    

                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));




   $customer=$this->db->query("SELECT * FROM driver WHERE  deleteid=0  ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

 $customer_id=$vv->id;



  
 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}
//$openingbalance=0;


if($opstatus==1)
{


 

$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['driver_collection_status']=$driver_collection_status;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=2;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=52;
                          $data_driver['account_heads_id_2']=104;
                         $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
    
      $this->db->query("UPDATE driver SET opening_balance_collection='".$openingbalance."',payment_type_collection='1' WHERE id='".$customer_id."'");
      
     
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['driver_collection_status']=$driver_collection_status;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=2;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=52;
                          $data_driver['account_heads_id_2']=104;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}



 

    $this->db->query("UPDATE driver SET opening_balance_collection='".$openingbalance."',payment_type_collection='2' WHERE id='".$customer_id."'");
      
                  
     
                         

}


$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND opening_balance_status!=1 AND driver_collection_status='".$driver_collection_status."'");


}
    





                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='IN DIRECT EXPENSES';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');
        


                     //CUSTOMER END --------------------//




   }
   public function dataclear_driver2()
  {
                     


                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $driver_collection_status=1;
                   $cnn_status=0;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));




   $customer=$this->db->query("SELECT * FROM driver WHERE  deleteid=0  ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

 $customer_id=$vv->id;



  
 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}
//$openingbalance=0;


if($opstatus==1)
{


 

$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['driver_collection_status']=$driver_collection_status;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=2;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=52;
                          $data_driver['account_heads_id_2']=104;
                         $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
    
      $this->db->query("UPDATE driver SET opening_balance_collection='".$openingbalance."',payment_type_collection='1' WHERE id='".$customer_id."'");
      
     
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND order_no='Opening Balance' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND driver_collection_status='".$driver_collection_status."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['driver_collection_status']=$driver_collection_status;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=2;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=52;
                          $data_driver['account_heads_id_2']=104;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}



 

    $this->db->query("UPDATE driver SET opening_balance_collection='".$openingbalance."',payment_type_collection='2' WHERE id='".$customer_id."'");
      
                  
     
                         

}


$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=2  AND cnn_status='".$cnn_status."' AND customer_id='".$customer_id."' AND opening_balance_status!=1 AND driver_collection_status='".$driver_collection_status."'");


}
    





                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='FIXED ASSETS';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');
        


                     //CUSTOMER END --------------------//




}
                   




    public function dataclear_other()
  {



                  date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                   $cnn_status=0;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));






  $cnn_status=0;

                                  // CUSTOMER --------------------//

  $customer=$this->db->query("SELECT * FROM accountheads WHERE  deleteid=0    ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

   $customer_id=$vv->id;
  $account_heads_id= $vv->account_heads_id;


  
 $resultopeing_balance=$this->db->query("SELECT SUM(credits-debits) as totalopeingbalance FROM all_ledgers  WHERE  deleteid='0' AND payment_date<'".$fromdate."' AND party_type=5   AND customer_id='".$customer_id."'");
$resultopeing_balance=$resultopeing_balance->result();
foreach ($resultopeing_balance as  $set) 
{


        $openingbalance=  $set->totalopeingbalance;

        if($openingbalance>0)
        {
          $opstatus=1;
        }
        else
        {
          $opstatus=0;
        }
        $openingbalance=abs($openingbalance);




}



if($opstatus==1)
{



$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=5   AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='".$openingbalance."',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=5  AND customer_id='".$customer_id."' AND data_edited=0");
     


}
else
{


                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=$openingbalance;
                          $data_driver['debits']=0;
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=5;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=$account_heads_id;
                          $data_driver['account_heads_id_2']=$account_heads_id;
                          $this->Main_model->insert_commen($data_driver,'all_ledgers');




}



    
     
     $this->db->query("UPDATE accountheads SET op='".$openingbalance."',op_status='1',payment_status='1',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
      
                          
                      
}
else
{


$check=$this->db->query("SELECT id FROM all_ledgers  WHERE  deleteid='0' AND order_no='Opening Balance' AND party_type=5   AND customer_id='".$customer_id."'");
$check=$check->result();
if(count($check)>0)
{


 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='".$openingbalance."' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=5   AND customer_id='".$customer_id."' AND data_edited=0");
    

}
else
{




                          $data_driver['order_id']=0;
                          $data_driver['user_id']=1777;
                          $data_driver['customer_id']=$customer_id;
                          $data_driver['payment_mode']='';
                          $data_driver['payment_mode_payoff']='';
                          $data_driver['reference_no']='Opening Balance';
                          $data_driver['order_no']='Opening Balance'; 
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payout']=$openingbalance;
                          $data_driver['credits']=0;
                          $data_driver['debits']=$openingbalance;
                          $data_driver['paid_status']='1';
                          $data_driver['data_edited']='1';
                          $data_driver['cnn_status']=$cnn_status;
                          $data_driver['process_by']='Opening Balance';
                          $data_driver['opening_balance_status']='1';
                          $data_driver['payment_date']=$opdate;
                          $data_driver['payment_time']='12:11 PM';
                          $data_driver['party_type']=5;
                          $data_driver['bank_id']=25;
                          $data_driver['deletemod']='OP1-'.$customer_id;
                          $data_driver['account_head_id']=$account_heads_id;
                          $data_driver['account_heads_id_2']=$account_heads_id;
                       $this->Main_model->insert_commen($data_driver,'all_ledgers');



}



 



      $this->db->query("UPDATE accountheads SET op='".$openingbalance."',op_status='2',payment_status='2',opening_balance='".$openingbalance."' WHERE id='".$customer_id."'");
                 
     
                         

}


$this->db->query("UPDATE all_ledgers SET deleteid='".$opdate."',process_by='OLD DATA DELETE' WHERE deleteid='0' AND payment_date<='".$opdate."' AND party_type=5   AND customer_id='".$customer_id."' AND opening_balance_status!=1");


}
                     //CUSTOMER END --------------------//










                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='CURRENT LIABILITIES';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');



   }

   public function dataclear_bank()
   {



                       date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('d-m-Y');
                       $time= date('h:i A');
                       $form_data = json_decode(file_get_contents("php://input"));
                       $fromdate=$form_data->fromdate;
                       $cnn_status=0;
                       $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));
 $customer=$this->db->query("SELECT * FROM bankaccount WHERE  deleteid=0    ORDER BY id ASC");
  $customer=$customer->result();
  foreach($customer as $vv)
  {

   $account_id=$vv->id;

                     $result=$this->db->query("SELECT SUM(credit-debit) as total FROM bankaccount_manage as a  WHERE  a.bank_account_id='".$account_id."' AND a.deleteid=0 AND create_date < '".$fromdate."' AND a.party_type NOT IN('1','2','3','5')  ORDER BY a.create_date ASC");
                      $result=$result->result();
                     foreach ($result as  $value) 
                     {
                         
                                            $totals_opeing=$value->total;
                                            if($totals_opeing>0)
                                            {
                                                $opstatus=1;
                                            }
                                            else
                                            {
                                                $opstatus=0;
                                            }
                                            
                                            $totals_opeing=abs($totals_opeing);

                     }
                     $openingbalance=$totals_opeing;
                    if($opstatus==1)
                    {

                        $this->db->query("UPDATE bankaccount_manage SET create_date='".$opdate."',data_edited=1,credit='".$openingbalance."',debit='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=4   AND bank_account_id='".$account_id."' AND data_edited=0");
$this->db->query("UPDATE bankaccount SET data_edited=1,payment_status='2',current_amount='".$openingbalance."' WHERE id='".$account_id."' AND data_edited=0");


                    }
                    else
                    {


                          $this->db->query("UPDATE bankaccount_manage SET create_date='".$opdate."',data_edited=1,debit='".$openingbalance."',credit='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=4   AND bank_account_id='".$account_id."' AND data_edited=0");
$this->db->query("UPDATE bankaccount SET data_edited=1,payment_status='1',current_amount='".$openingbalance."' WHERE id='".$account_id."' AND data_edited=0");


                    }



                    $this->db->query("UPDATE bankaccount_manage SET deleteid='".$opdate."',status_by='OLD DATA DELETE' WHERE deleteid='0' AND create_date<='".$opdate."' AND party_type=4 AND bank_account_id='".$account_id."' AND opening_balance_status!=1");


}


                        $data_address['user_id']=$this->userid;
                        $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                        $data_address['process']='CAPITAL ACCOUNT';
                        $data_address['date_time_clear']=$date.' '.$time;
                        $this->Main_model->insert_commen($data_address,'backup_clear_log');



   }


public function advance_op_balance_zero()
{


                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('d-m-Y');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fromdate=$form_data->fromdate;
                    $cnn_status=0;
                   $opdate=date('Y-m-d',strtotime($fromdate."-1 days"));






           $query = $this->db->query("SELECT b.id FROM accounttype as a  JOIN accountheads_sub_group as b ON a.id=b.account_type WHERE  b.opeing_balance_status=1 AND a.deleteid = 0 AND b.deleteid = 0 ORDER BY a.id DESC");
           $account_data = $query->result();

           foreach($account_data as $vv)
           { 
            


               $sss = $this->db->query("SELECT * FROM accountheads  WHERE account_heads_id='".$vv->id."' AND deleteid=0");
               $sss = $sss->result();
                foreach($sss as $bb)
               { 



 $this->db->query("UPDATE accountheads SET op='0',op_status='2',payment_status='2',opening_balance='0' WHERE id='".$bb->id."'");
 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=5   AND customer_id='".$bb->id."' AND  data_edited IN ('1','0')");
    

               }




           }

$this->db->query("UPDATE accountheads SET op='0',op_status='2',payment_status='2',opening_balance='0' WHERE id='720'");
 $this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=5   AND customer_id='720' AND  data_edited IN ('1','0')");

 //$this->db->query("UPDATE accountheads SET op='0',op_status='2',payment_status='2',opening_balance='0' WHERE id IN ('252','372','163','332','328','220','389','381','375','15','299','303','530','307','534','536','532','173','3','157','180','229','270','329','228','373','222','156','221','570','529','535','560','561','376','562','563','564','565','180','378','537','569','566','567','568','571','225','343','366','13','368','582','583','370','388','371','15','299','303','530','307','538','534','385','536','532','173','169')");
 //$this->db->query("UPDATE all_ledgers SET payment_date='".$opdate."',data_edited=1,credits='0',debits='0' WHERE deleteid='0' AND opening_balance_status=1  AND party_type=5 AND customer_id IN ('252','372','163','332','328','220','389','381','375','15','299','303','530','307','534','536','532','173','3','157','180','229','270','329','228','373','222','156','221','570','529','535','560','561','376','562','563','564','565','180','378','537','569','566','567','568','571','225','343','366','13','368','582','583','370','388','371','15','299','303','530','307','538','534','385','536','532','173','169') AND data_edited IN ('1','0')");







                    $data_address['user_id']=$this->userid;
                    $data_address['from_date']=date('d-m-Y',strtotime($fromdate));
                    $data_address['process']='CURRENT ASSETS';
                    $data_address['date_time_clear']=$date.' '.$time;
                    $this->Main_model->insert_commen($data_address,'backup_clear_log');




}
public function data_clear() {
        if (isset($this->session->userdata['logged_in'])) {


    $ss=$this->db->query("SELECT * FROM orders_quotation WHERE  order_base='0'");
    $ss=$ss->result();
    foreach($ss as $dd)
    {
      $move_id=$dd->move_id;
      $this->db->query("UPDATE orders SET deleteid='0' WHERE  id='".$move_id."'");
      
    }


            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count('orders_process');
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $data['neworder_id'] = base64_encode($neworder_id);
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Database Backup Clear';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('customer/data_clear', $data);
        } else {
            $this->load->view('admin/index');
        }
    }


}

