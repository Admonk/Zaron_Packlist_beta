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

  public function customer_edit($id)
  {
        
                                  

 if(isset($this->session->userdata['logged_in']))
                      {



                               $data['accounttype'] = $this->Main_model->where_names('accountheads_sub_group','deleteid','0');
                               $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
                               $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                               $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                             
                                             
                                $data['zone'] = $this->Main_model->where_names('zone','deleteid','0');
                                $data['state'] = $this->Main_model->where_names('state','deleteid','0');
                                $data['city'] = $this->Main_model->where_names('city','deleteid','0');
                                $data['district'] = $this->Main_model->where_names('district','deleteid','0');


                   $result= $this->Main_model->where_names('customers','id',$id);
                   
                   
                   
                   foreach ($result as  $value) {

                 
                      $data['approved_status']= $value->approved_status;

                    }

  $data['customer_emergency_details'] = $this->Main_model->where_names('customer_emergency_details','customer_id',$id);
  $data['customer_greetings_details'] = $this->Main_model->where_names('customer_greetings_details','customer_id',$id);                
                             
                                             
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
                           $this->load->view('customer/common_ledger_group',$data);
                    
                    
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


                            if($this->session->userdata['logged_in']['access']=='12')
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
                                  $data['op']=$form_data->opening_balance;
                                  $data['opening_balance']=$form_data->opening_balance;






                                 
                                 if($form_data->mark_vendor_id>0)
                                 {
                                     
                                      $data['mark_vendor_id']=$form_data->mark_vendor_id;
                                      $data['active_value']=$form_data->mark_vendor_id;
                                     
                                 }
                                 else
                                 {
                                      $data['mark_vendor_id']=0;
                                      $data['active_value']=0;
                                 }                                 
                                 
                                 $data['sales_team_sub_id']=$form_data->sales_team_sub_id;
                                 
                                 $ppl=explode('-', $form_data->locality);
                                 $data['locality']=$ppl[0];



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
                                  else
                                  {
                                     $data['tcs_status']=0;
                                  }



                              $result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
                              if(count($result)>0)
                              {

                                  // $array=array('error'=>'3','massage'=>'Customer phone no  already exists');
                                  // echo json_encode($array);
                                    $customer_id=$this->Main_model->insert_commen($data,$tablename);

  $accountid='ZARON0'.$customer_id;
  $this->db->query("UPDATE $tablename SET customer_id='".$customer_id."',account_number='".$accountid."',virtual_accountno='".$accountid."' WHERE id='". $customer_id."'");          

                              }
                              else
                              {
                                  
                                  
  $customer_id=$this->Main_model->insert_commen($data,$tablename);
                                     
  $accountid='ZARON0'.$customer_id;
  $this->db->query("UPDATE $tablename SET customer_id='".$customer_id."',account_number='".$accountid."',virtual_accountno='".$accountid."' WHERE id='". $customer_id."'");
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                           
                                     
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
                                    
                                            $this->db->query("UPDATE vendor SET mark_customer_id='".$customer_id."' WHERE id='". $data['mark_vendor_id']."'");



                                  
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
                                        
                                        $data['mark_vendor_id']=0;
                                        if($form_data->mark_vendor_id>0)
                                        {
                                            $vendor_id=$form_data->mark_vendor_id;
                                        }
                                        else
                                        {
                                            $vendor_id=$active_value;
                                        }
                                        
                                        
                        $this->db->query("UPDATE vendor SET deleteid='1',mark_customer_id=0 WHERE id='". $vendor_id."'");
                        $this->db->query("UPDATE customers SET deleteid='0' WHERE id='". $customer_id."'");
                        $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
                        $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1'");
                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                         $data['mark_vendor_id']=-1;
                                         $customer_id=$form_data->id;
                                         
                                         
                                         if($form_data->mark_vendor_id>0)
                                         {
                                            $vendor_id=$form_data->mark_vendor_id;
                                         }
                                         else
                                         {
                                            $vendor_id=$active_value;
                                         }
                                        
                                         
                                         $this->db->query("UPDATE customers SET deleteid='1' WHERE id='". $customer_id."'");
                                         $this->db->query("UPDATE vendor SET deleteid='0',mark_customer_id=0 WHERE id='". $vendor_id."'");
                                         $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
                                         $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1'");
                                    }
                                    else
                                    {
                                        
                                        
                                     
                                        
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
                    $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status=1"); 
                    $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$data['mark_vendor_id']."' AND party_type=3 AND commen_find_status=1"); 
                                    
                                        
                                        
                                    }

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







                                                                
                                    $this->opblance_update($customer_id,$data['opening_balance'],$data['op_status']);
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
                              $data['op']=$form_data->opening_balance;
                              $data['opening_balance']=$form_data->opening_balance;
                                    
                                    
                                    
                                    $active_value=0;  
                                    $getactive_vendor_id = $this->Main_model->where_names('customers','id',$form_data->id);
                                    foreach($getactive_vendor_id as $vals)
                                    {
                                             $active_value=$vals->active_value;
                                    }
                                    

                                       $getactive_vendor_ids = $this->Main_model->where_names('vendor','mark_customer_id',$form_data->id);
                                    foreach($getactive_vendor_ids as $valss)
                                    {
                                             $vendor_id=$valss->id;
                                             
                                    }
                             
                                   
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
                                    
                            
                                    
                                     if($form_data->active=='0')
                                    {
                                        
                                      
                                       
                                        $customer_id=$form_data->id;
                                        $this->db->query("UPDATE vendor SET deleteid='1' WHERE id='". $vendor_id."'");
                                        $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id=0 WHERE id='". $customer_id."'");
                                        $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$vendor_id."' AND party_type=3 AND deleteid='0'"); 
                                        $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status='1'");
                                        
                                    }
                                    elseif($form_data->active=='-1')
                                    {
                                        
                                        
                                         $customer_id=$form_data->id;
                                         
                                       
                                         $this->db->query("UPDATE customers SET deleteid='1',mark_vendor_id=-1 WHERE id='". $customer_id."'");
                                         $this->db->query("UPDATE vendor SET deleteid='0' WHERE id='". $vendor_id."'");
                                         $this->db->query("UPDATE all_ledgers SET deleteid='1',commen_find_status=1 WHERE customer_id='".$customer_id."' AND party_type=1 AND deleteid='0'"); 
                                         $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status='1'");
                                    }
                                    else
                                    {
                                        
                                        
                                        $customer_id=$form_data->id;
                                        
                                    
                                        
                                       
                           $this->db->query("UPDATE vendor SET mark_customer_id='".$data['get_id']."',deleteid='0' WHERE id='". $vendor_id."'");
                          $this->db->query("UPDATE customers SET deleteid='0',mark_vendor_id='".$vendor_id."',active_value='".$vendor_id."' WHERE id='". $customer_id."'");
                          $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$customer_id."' AND party_type=1 AND commen_find_status=1"); 
                          $this->db->query("UPDATE all_ledgers SET deleteid='0' WHERE customer_id='".$vendor_id."' AND party_type=3 AND commen_find_status=1"); 
                                    
                                        
                                        
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
                                  else
                                  {
                                     $data['tcs_status']=0;
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

                     

                       

                       $this->opblance_update($customer_id,$data['opening_balance'],$data['op_status']);
                       $array=array('error'=>'2','massage'=>'Customer successfully Updated..');
                       echo json_encode($array);



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
                 
                 
                 if($form_data->action=='updatevalue')
                 {
                     
                       date_default_timezone_set("Asia/Kolkata"); 
                       $date= date('Y-m-d');
                       $time= date('h:i A');
                   

                      $tablename=$form_data->tablename;
                      $lab=$form_data->lab;
                      
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
                                                                                                            
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('Y-06-30');
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


         $this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


  }
  else
  {


$this->db->query("UPDATE all_ledgers SET debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");



$this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


                 
          
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
                                                                                     $day_log['changes'] = 'Customer Account Changes';
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

                                $data['approved_by']=$this->userid;
                                $customers_last_id= $this->Main_model->order_last_count_customer('customers');
                                $customers_last_id_set=$customers_last_id[0]->customer_id;
                                $data['customer_id']=$form_data->id;
                                $accountid='ZARON0'.$data['customer_id'];
                                // $sales_head_id = $this->Main_model->where_names('customers','virtual_accountno',$accountid);
                                // if(count($sales_head_id)>1)
                                // {
                                //        $accountid='ZARON0'.$data['customer_id'].'1';
                                // }
                                $data['virtual_accountno']=$accountid;
                                $data['account_number']=$accountid;
                                $data['approved_date']=date('d-m-Y');

                      }
                      

                      $data[$lab]=$form_data->val;
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
      
      
      
      
                     
               
                     
                     $where="";
                     $sqls="";
                    
                     $from_date='2023-09-19';
                     $to_date=date('Y-m-d');
                     //$where= ' AND create_date BETWEEN "'.$from_date .'" AND "'.$to_date .'"';

                     $where= ' AND id>37847';
                     
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
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')   AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id ASC");
                                                  
                                           
                                            
                             
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
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')   AND  sales_team_id IN ('".$sales_group_id."') $where ORDER BY id ASC");
                                                  
                                           
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                           $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')   AND sales_team_id='".$this->userid."' $where ORDER BY id ASC");
                                                  
                                                  
                                                                     
                                                
                                            
                             
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
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')  AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id ASC ");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='20')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')   AND user_id='".$this->userid."' $where ORDER BY id ASC ");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     else
                     {
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                       $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND approved_status IN ('2','1')    $where ORDER BY id ASC ");
                           
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
                                  'factory_workshop' => $value->factory_workshop,tcs_status,
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

                         $filename='Customers_hdfc_virtual_account'.$formdate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");  

                   ?>


                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                          
                        <tr><th colspan="7">Customers HDFC Virtual Account</th></tr> 
                        <tr>

                          <th>ID</th>    
                          <th>Customer Name</th>
                          <th>Phone</th>
                          <th>Customer ID</th>
                          <th>Virtual Account</th>
                          <th>Sales Person</th>
                          <th>Opening Balance</th>
                         
            
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
                           <td><?php echo $names['customer_id']; ?></td>
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
                     $search = base64_decode($_GET['search']);
                     $searchsales = $_GET['searchsales'];
                     
                     
                     
                     if(isset($_GET['page_next']))
                     {
                         $offset = $_GET['page_next'];
                     }
                     
                 
                     
                     $where="";
                     $sqls="";
                     if ($search != "")
                     {
                     	
                        
                        $where .= " AND (company_name LIKE '%" . $search . "%' OR phone LIKE '%" . $search . "%' OR virtual_accountno LIKE '%" . $search . "%')";
                        
                        
                     }
                     
                     if($searchsales>0)
                     {
                         $where .="  AND sales_team_id='" . $searchsales . "'";
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
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND  sales_group IN ('".$sales_group_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                           
                                            
                             
                     }
             

                     elseif( $search == '' && $this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         
                           $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND sales_team_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                  
                                                                     
                                                
                                            
                             
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
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,account_number,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND sales_team_id IN ('".$sales_team_id."') $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     elseif($this->session->userdata['logged_in']['access']=='20')
                     {
                         
                         
                         
                         
                         
                                               $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC");
                                               $resultcount=$queryss->result();
                                               foreach ($resultcount as  $cc) {
                                                   
                                                   $count=$cc->totalcount;
                                               }
                                                
                                               $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,gst_status,gst,address1,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' AND user_id='".$this->userid."' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                                                  
                                                                     
                                                
                                            
                             
                     }
                     else
                     {
                         
                         
                       $queryss = $this->db->query("SELECT count(id) as totalcount  FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC");
                       $resultcount=$queryss->result();
                       foreach ($resultcount as  $cc) {
                           
                           $count=$cc->totalcount;
                       }
                       
                       
                      
                        
                       $query = $this->db->query("SELECT op,op_status,account_number,virtual_accountno,customer_id,approved_status,op,op_status,id,sales_team_sub_id,deleteid,email,phone,company_name,factory_workshop,tcs_status,address1,gst_status,gst,landline,customer_type,feedback_details,opening_balance,payment_status,credit_limit,credit_period,ratings,price_rateings,delivery_time_rateings,quality_rateings,response_commission,commission_feed_back,address2,landmark,pincode,city,state,status,sales_team_id,locality,sales_group,google_map_link FROM `customers`  WHERE deleteid='0' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                           
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

                    if($value->customer_id=='')
                    {
                      $value->customer_id=$value->id;
                    }
                    
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
                                  'factory_workshop' => $value->factory_workshop,tcs_status,
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
                     $where.="  AND approved_status IN ('0','-1')";
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


                     if($value->customer_id=='')
                    {
                      $value->customer_id=$value->id;
                    }
                    
                    
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
                                  'factory_workshop' => $value->factory_workshop,tcs_status,
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
                     
                     
                   
                     
                     
                     if(isset($_GET['deleteid']))
                     {
                         
                          $deleteid=$_GET['deleteid'];
                     }
                     else
                     {
                          $deleteid=0;
                     }
                     
                    
                         
                    $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'"; 


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
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.user_id DESC");

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
                          
                          
                       
                   

  
                    $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."'  AND a.party_type=1 AND a.opening_balance_status='0' $sql   ORDER BY a.id ASC");
                    $result=$result->result();















                
                   
                 
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
                            $credits=$value->credits;
                              $debits=$value->debits;
                              
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

                            $voucher_name='';
                         if($value->voucher_base){
                          if($value->voucher_base=='journal'){
                            $voucher_name = 'JOURNAL';
                          }
                          elseif($value->voucher_base=='payment'){
                            $voucher_name = 'PAYMENT';
                          }
                          elseif($value->voucher_base=='receipt'){
                            $voucher_name = 'RECEIPT';
                          }
                          
                          $account_head_idname=$voucher_name;
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


                                                if($value->order_date!='0')
                                             {
                                                          $value->payment_date=$value->order_date;
                                             }
                                             


                                             if($value->payment_mode_payoff!='')
                                             {
                                                   $value->payment_mode=$value->payment_mode_payoff;
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
                     
                     if($formdate=='undefined' || $formdate=='0')
                     {
                               $formdate=$this->from_date;
                               $todate=$this->to_date;  
                              
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."' AND a.opening_balance_status='0' $sql ORDER BY a.id ASC");
                            $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                         
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid='".$deleteid."'  AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0' $sql   ORDER BY a.id ASC");
                           
                          }
                          else
                          {
                             $result=$this->db->query("SELECT a.* FROM all_ledgers as a   WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.paid_status='".$payment_status."'  AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0' $sql ORDER BY a.id ASC");
                          
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
                                       
                                       
                                       $bank_name="";
                                       $resultvent= $this->Main_model->where_names('bankaccount','id',$value->bank_id);
                                       foreach ($resultvent as  $valuess) {
                                          $bank_name= $valuess->bank_name; 
                                          
                                         
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
                      'customer_id' => $value->customer_id,
                      'notes' => $value->notes, 
                      'amount' => $value->amount, 
                      'paid_status' => $value->paid_status, 
                      'Payoff' => $value->payin, 
                      'Payout' => $value->payout,
                      'debits' => round($value->debits,2),
                       'credits' => round($value->credits,2),
                       'party_to_party' => $value->party_to_party,
                      'balance' => $total,
                      'getstatus' => $getstatus,
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
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql=" AND a.customer_id='".$customer_id."'";
                        
                        
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
                     
                   
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     if($formdate=='undefined')
                     {
                              
                              $formdate=date('Y-07-01');
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

                      $result2=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date <= '".$todate."'");
                        $result2=$result2->result();
                       foreach ($result2 as  $set) {
                          $totalbalance= $set->totalbalance;
                       }


                        $result3=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date<'".$formdate."'");
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
                                     
                                
                        $result4=$this->db->query("SELECT SUM(debits) as debitstoatal,SUM(credits) as creditstotal FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."'");
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
  
  
  
  
  
  
  
  
  
  
  
    public function fetch_data_get_ledger_view_group_commen()
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




                                               $group=" ";
                         
                         
                         
                         
                        
                     }
                     else
                     {
                         
                         
                                               $resultlocality= $this->Main_model->where_names('customers','deleteid',0);
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
                                               $resultlocality= $this->Main_model->where_names('customers','id',$valuesub->customer_id);
                                               foreach($resultlocality as $vl)
                                               {



                                                       $customer_id=$valuesub->customer_id;
                                                   
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
                                                       $customer_id=$vl->mark_customer_id;
                                                       
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


                                              //if(!in_array($customer_id, $temp))
                                              //{
                                             


                                            
                                                              $subresult[] = array(
                                               
                                        
                                                                    'no' => $i, 
                                                                    'id' => $valuesub->id, 
                                                                    'name' => $company_name, 
                                                                    'vl' => $vl, 
                                                                    'url' => $url, 
                                                                    'customer_id' => $valuesub->customer_id, 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $payment_status,
                                                                    'opening_balance' =>round($opening_balance,2),
                                                                    'debits' => round($valuesub->debitstoatal,2),
                                                                    'credits' => round($valuesub->creditstotal,2),
                                                                    'getstatus' => $getstatus,
                                                                    'balance' => $total
                                                              
                                        
                                                             );

                                             
                                              $i++; 

                                              //}


                                             $temp[] = $customer_id;   


                                          
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
                         
                         
                                               $resultlocality= $this->Main_model->where_names('customers','deleteid',0);
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




                      $resultfetch = array_merge($array1, $array2);
                      
                       $result=$this->db->query("SELECT  SUM(a.amount) as amount,SUM(a.payout) as totalpaid,SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.balance) as totalblance FROM all_ledgers as a  WHERE  a.deleteid=0 AND a.party_type IN ('1','3')   AND  a.customer_id IN ('".implode("','", $resultfetch)."') $sql  ORDER BY a.payment_date ASC");
                       $result=$result->result();
                    
                      
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value)
                   {
                       
                                              $valueset=$value->totalcridit-$value->totaldebit;
                                                
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
                    
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                        
                     $sql="";
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql.=" AND a.customer_id='".$customer_id."'";
                        
                        
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
                     
                     
                     
                     

                     
                   $result=$this->db->query("SELECT  SUM(a.credits) as totalcridit,SUM(a.debits) as totaldebit,SUM(a.credits-a.debits) as totalblance FROM all_ledgers as a    JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id WHERE  a.deleteid=0 AND b.deleteid=0 AND a.party_type=1  $sql $sqlgetfecth_user ORDER BY a.id ASC");
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
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $filter=$_GET['filter'];
                     
                    
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
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.user_id DESC");

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
                      $resultott_op=$this->db->query("SELECT SUM(a.credits-a.debits) as total FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  AND a.payment_date < '".$formdate."' ORDER BY a.id DESC");
                     $resultott_op=$resultott_op->result();
                      foreach ($resultott_op as  $values) {


                                                if($values->total>0)
                                                {
                                                    $getstatus_op=0;
                                                }
                                                else
                                                {
                                                    $getstatus_op=1;
                                                }
                                                

                                  $total_op=abs($values->total);
                      }



                         $total=0;
                      $resultott=$this->db->query("SELECT SUM(a.credits-a.debits) as total FROM all_ledgers  as a  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  ORDER BY a.id DESC");
                     $resultott=$resultott->result();
                      foreach ($resultott as  $values) {


                                                if($values->total>0)
                                                {
                                                    $getstatus=0;
                                                }
                                                else
                                                {
                                                    $getstatus=1;
                                                }
                                                

                                  $total=abs($values->total);
                      }
                 
                 
                   
                 
                    $output=array();
                    
                   foreach ($result as  $value) {
                       
                     
                      $output['totalpayment']= round($value->amount,2);
                      $output['totalpaid']= round($value->totalpaid,2); 
                      $output['totaldebit']= round($value->totaldebit,2); 
                      $output['totalcridit']= round($value->totalcridit,2); 
                      $output['totalblance']= $total; 
                      $output['getstatus']= $getstatus; 
                      $output['getstatus1']= $getstatus; 
                      $output['outstanding']= $total; 
$output['total_op']= $total_op;
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
                   
                       $res= $this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$id,'party_type',$party_type,'deleteid',0);
                   
                     
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
                       

                       if($value->print_name=='')
                       {
                        
                          $output['print_name']= $value->company_name;

                       }
                       else
                       {
                         $output['print_name']= $value->print_name;

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

                        if($value->virtual_accountno=='')
                        {

                           $output['virtual_accountno']=$value->account_number;
                           $output['customer_id']=$value->id;
                           
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
                                         
                                         
                                              $sql=' AND company_name LIKE "%'.$search.'%" OR phone LIKE "%'.$search.'%"';
                                          
                                         
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
                     
                     $sql.=" AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'"; 



                  

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
                         $resultsub_production=$this->db->query("SELECT b.id,b.order_no  FROM order_product_list_process as a JOIN orders_process as b  ON a.order_id=b.id WHERE a.deleteid=0 AND b.customer_id='".$customer_id."' AND b.assign_status IN ('2')  AND a.return_status=0 AND b.order_base>0 AND a.delivery_status=0 AND b.deleteid=0  GROUP BY b.id ORDER BY a.user_id DESC");

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


                     
                  $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."' AND a.party_type=1 AND a.opening_balance_status='0'  $sql  ORDER BY a.id ASC");
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

                     if($customer_id_data=='')
                     {
                         
                               $formdate=$this->from_date;
                              $todate=$this->to_date;  
                              
                         
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.opening_balance_status='0'  $sql  ORDER BY a.id ASC");
                            $result=$result->result();
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'    AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0'  $sql  ORDER BY a.id ASC");
                           
                          }
                          else
                          {
                             $result=$this->db->query("SELECT a.* FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date BETWEEN '".$formdate."' AND '".$todate."'  AND a.paid_status='".$payment_status."'  AND a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')  $sql ORDER BY a.id ASC");
                          
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
                            
                            
                    
                    $payment_date=date('d-M-Y',strtotime($formdate));                    
                   $resultopeing_new=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal,a.payment_date FROM all_ledgers  as a JOIN customers as b ON a.customer_id=b.id WHERE  a.deleteid='".$deleteid."' AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='1' $sql ORDER BY a.payment_date ASC");
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



                            
                            
                            
                               $resultopeing=$this->db->query("SELECT SUM(a.credits) as creditstotal,SUM(a.debits) as debitstotal FROM all_ledgers as a JOIN customers as b ON a.customer_id=b.id  WHERE a.payment_date < '".$formdate."'  AND a.deleteid='".$deleteid."' AND  a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."') AND a.opening_balance_status='0' AND b.mark_vendor_id=0 $sql ORDER BY a.payment_date ASC");
                               $resultopeing=$resultopeing->result();
                               $openingbalance=0;
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
                                              <td style="color:<?php echo $color1; ?>"><?php echo round($openingbalance,2); ?></td>
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
                                                  
                                      
                                          
                                           
                         
                                            $seti=$j;
                                        
                                                ?>
                                          
                                            <tr >
                              
                                              <td><?php echo $j; ?></td>
                                              <td><?php echo $name; ?></td>
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
                                              <td><?php echo $value->notes; ?></td>
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
                     $formdate='2022-04-01';
                     
                  
                     $pp=explode('-', $customer_id_data);
                     $customer_id=$pp[0];
                     
                     
                     
                     
                     
                     $sql="";
                     
                     
                     if($customer_id>0)
                     {
                         
                         
                              $sql=" AND a.customer_id='".$customer_id."'";
                        
                        
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
                     
                   
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     if($formdate=='undefined' || $formdate=='0')
                     {
                               
                                 $formdate=date('Y-07-01');
                              $todate=date('Y-m-d');
                              
                               $result=$this->db->query("SELECT a.customer_id,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0  AND a.party_type=1 $sql $sqlgetfecth_user GROUP BY a.customer_id,b.company_name  ORDER BY aa.name ASC");
                              $result=$result->result();
                     }
                     else
                     {
                           
                              $result=$this->db->query("SELECT a.customer_id,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal,aa.name as sales_name,b.sales_team_id,b.company_name,b.opening_balance,b.payment_status,b.op,b.op_status FROM all_ledgers as a  JOIN customers as b ON a.customer_id=b.id  JOIN admin_users as aa ON aa.id=b.sales_team_id  WHERE  a.deleteid=0 AND b.deleteid=0  AND a.party_type=1 $sql $sqlgetfecth_user GROUP BY a.customer_id  ORDER BY aa.name,b.company_name ASC");
                              $result=$result->result();
                         
                     }
                    
                   
                   $i=1;
                   $array=array();
                   $temp  = array();
                   foreach ($result as  $value) 
                   {
                       
                     $totalbalance=0;
                       $totalbalanceop=0;

                        $result2=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date <= '".$todate."'");
                        $result2=$result2->result();
                       foreach ($result2 as  $set) {
                          $totalbalance= $set->totalbalance;
                       }


                        $result3=$this->db->query("SELECT SUM(credits-debits) as totalbalance FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND payment_date<'".$formdate."'");
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
                                     
                                
                        $result4=$this->db->query("SELECT SUM(debits) as debitstoatal,SUM(credits) as creditstotal FROM all_ledgers WHERE customer_id='".$value->customer_id."' AND party_type=1 AND deleteid=0 AND  payment_date  BETWEEN '".$formdate."' AND '".$todate."'");
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
                                         'subresult'=>$subresult
                                  
            
                                );


                        $i++;

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
                         
                         
                                               $resultlocality= $this->Main_model->where_names('customers','deleteid',0);
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
                     
                   
                   
                   
                 
                   
                   
                   $i=1;
                   
                  

                                 if($formdate!='undefined')
                                 {
                                    //$sql=" AND a.payment_date  BETWEEN '".$formdate."' AND '".$todate."'";

                                 }
                    
                     $resultsub=$this->db->query("SELECT a.*,SUM(a.debits) as debitstoatal,SUM(a.credits) as creditstotal FROM all_ledgers as a   WHERE  a.deleteid=0 AND a.party_type IN ('1','3') AND  a.customer_id IN ('".implode("','", $resultfetch)."')   $sql $group  ORDER BY a.party_type ASC");
                              


                                  $resultsub=$resultsub->result();
                                       
                                   
                                       $subresult=array();
                                        $temp = array();
                                       foreach ($resultsub as  $valuesub) 
                                       {
                                                 

                                              $payment_status="";  
                                               $resultlocality= $this->Main_model->where_names('customers','id',$valuesub->customer_id);
                                               foreach($resultlocality as $vl)
                                               {



                                                       $customer_id=$valuesub->customer_id;
                                                   
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
                                                       $customer_id=$vl->mark_customer_id;
                                                       
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


                                              //if(!in_array($customer_id, $temp))
                                              //{
                                             


                                            
                                                              $subresult[] = array(
                                               
                                        
                                                                    'no' => $i, 
                                                                    'id' => $valuesub->id, 
                                                                    'name' => $company_name, 
                                                                    'vl' => $vl, 
                                                                    'url' => $url, 
                                                                    'customer_id' => $valuesub->customer_id, 
                                                                    'order_id' => '', 
                                                                    'payment_status' => $payment_status,
                                                                    'opening_balance' =>round($opening_balance,2),
                                                                    'debits' => round($valuesub->debitstoatal,2),
                                                                    'credits' => round($valuesub->creditstotal,2),
                                                                    'getstatus' => $getstatus,
                                                                    'balance' => $total
                                                              
                                        
                                                             );

                                             
                                              $i++; 

                                               //}


                                               $temp[] = $customer_id;   





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
                          <th>Base</th>
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
                                          <td><b style="color:#ff5e14;"><?php echo $value['vl'] ?></b></td>
                                           
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
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
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
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id."' ORDER BY id ASC");
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
                                                                           $res = $this->db->query("SELECT  id,name,account_heads_id,account_heads_id_2 FROM accountheads  WHERE deleteid='0' AND id='".$customer_id2."' ORDER BY id ASC");
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
                                                                                                            
                                                                                                             
                                                                                                             
                                                                                                             
                                                                                                             $data_driver['debits']=$obalance;
                                                                                                             $data_driver['credits']=0;
                                                                                  
                                                                              }
                          
                          
                                                                              
                                                                              $data_driver['paid_status']='1';
                                                                              $data_driver['process_by']='Opening Balance';
                                                                              $data_driver['opening_balance_status']='1';
                                                                              $data_driver['payment_date']=date('Y-06-30');
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


         $this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


  }
  else
  {


$this->db->query("UPDATE all_ledgers SET debits='".$data_driver['debits']."',credits='".$data_driver['credits']."',payment_date='".$data_driver['payment_date']."' WHERE customer_id='".$form_data->id."' AND party_type='1' AND opening_balance_status='1'");



$this->db->query("UPDATE all_ledgers SET deleteid=1,notes='Last Year Data Deleted customers' WHERE customer_id='".$form_data->id."' AND payment_date < '2023-04-01' AND party_type='1' AND opening_balance_status='0' AND deleteid=0");
                 


                 
          
  }

                              





                                                                                    
                                                                                     $username ='';
                                                                                     $user_group_team = $this->Main_model->where_names('admin_users','id',$this->userid);
                                                                                     foreach ($user_group_team as  $team) {
                                                                                                        $username=$team->name;
                                                                                                    
                                                                                    }
                                                                                     $day_log['username'] = $username;
                                                                                     $day_log['changes'] = 'Customer Account Changes';
                                                                                     $day_log['table_name'] = 'all_ledgers';
                                                                                     $day_log['reference_no'] = $form_data->id;
                                                                                     $day_log['create_date'] =$date;
                                                                                     $day_log['create_time'] =$time;
                                                                                     $day_log['details'] =json_encode($form_data);
                                                                                     $this->Main_model->insert_commen($day_log, 'day_log');



                          






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
    


}

