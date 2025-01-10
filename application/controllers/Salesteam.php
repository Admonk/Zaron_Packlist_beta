<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesteam extends CI_Controller {

	function __construct() {


error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Users_model');
             if(isset($this->session->userdata['logged_in'])){
	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;
			   profile($this->user_mail);
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
    
	public function sales_team_add()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                  $sales_group_id=array();
                                     	      $sales_group_id_name=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                  $sales_group_id[]=$values->id;
                                                  $sales_group_id_name[]=$values->name;
                                              }
							                
							                
							                 $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
											 
											 
											  if($this->session->userdata['logged_in']['access']=='16')
                                              {
                                                  	
                                                  	 $sales_head = $this->Main_model->where_names('admin_users','access','11');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     
                                                  	   if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                  	     
                                                  	      if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_head'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	     
                                                  	     
                                                       }
                                                       
                                                  	     
                                                  	     
                                                  	 }
											 
                                              }
                                              else
                                              {
                                                 	 $sales_head = $this->Main_model->where_names('admin_users','access','11');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_head'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	 }
											  
                                              }
											 
										
											 
											 
											 
											
										
											 
										
											 
											 $data['route'] = $this->Main_model->where_names('route','deleteid','0');
                                           
							                
                                           
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Sales Team Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function sales_team_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							        $data['sales_mamber'] = $this->Main_model->where_in_names('admin_users','access',array('12'));
            			                     
							                
							             // echo "<pre>";print_r($data['sales_mamber']);
							             // exit;   
							                
							                
							                
							                
							                
							                  $sales_group_id=array();
                                     	      $sales_group_id_name=array();
                                              $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                                              $resultsales_team=$query->result();
                                              foreach ($resultsales_team as  $values) {
                                                  $sales_group_id[]=$values->id;
                                                  $sales_group_id_name[]=$values->name;
                                              }
							                
							                
							                 $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
											 
											 
											  if($this->session->userdata['logged_in']['access']=='16')
                                              {
                                                  	
                                                  	 $sales_head = $this->Main_model->where_names('admin_users','access','11');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	     
                                                  	   if(array_intersect($sales_group_id,explode("|",$value->sales_group_id)))
                                                       {  
                                                           
                                                         if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_head'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	     
                                                  	     
                                                       }
                                                       
                                                  	     
                                                  	     
                                                  	 }
											 
                                              }
                                              else
                                              {
                                                 	 $sales_head = $this->Main_model->where_names('admin_users','access','11');
                                                   	 foreach($sales_head as $value)
                                                  	 {
                                                  	      if($value->deleteid==0)
                                                         {
                                                             
                                                  	     $data['sales_head'][]=$this->ToObject(array('id'=>$value->id,'name'=>$value->name));
                                                  	     
                                                         }
                                                  	 }
											  
                                              }
											 
										
										
										
											 
										      $sales_teamid = $this->Main_model->where_names('sales_team','id',$id);
							                  
							                  $sales_route_id=array();
							                  $sales_head=array();
							                  
							                  $sales_group_id=array();
							                  $mark_sales_member=array();
							                  
							                    $sales_group_id=array();
							                  $mark_sales_member=array();
							                  
							                  foreach($sales_teamid as $vl)
							                  {
							                             $sales_route_id=explode('|',$vl->route);  
							                             $sales_head=explode('|',$vl->sales_head); 
							                             
							                             $sales_group_id=explode('|',$vl->sales_group); 
							                             $mark_sales_member=explode('|',$vl->mark_sales_member); 
							                             
							                  }
							                  
							                  
							                  
							                  $data['sales_route_id']=$sales_route_id;
							                  $data['sales_head_id']=$sales_head;
							                  
							                  
							                  $data['sales_group_id']=$sales_group_id;
							                  if($mark_sales_member>0)
							                  {
							                  	$data['mark_sales_member']=$mark_sales_member;
							                  }
							                  else
							                  {
							                  	$data['mark_sales_member']=0;
							                  }
							                  
							                  
							             
											 
											 $data['route'] = $this->Main_model->where_names('route','deleteid','0');
                                           
							                
                                             $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Sales Team  Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function sales_team_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                

							                
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Sales Team List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/sales_team_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function log()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                

							                 
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Log List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('sales/log_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 


                 if($form_data->action=='Save')
                 {
                     
                      if($form_data->phone!='' && $form_data->name!='' && $form_data->sales_id!='' && $form_data->route!='' &&  $form_data->pin!='' &&  $form_data->sales_head!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['phone2']=$form_data->phone2;
			                     $data['target']=$form_data->target;
			                     
			                     $data['whatsapp_key']=$form_data->whatsapp_key;
			                     
			                     
			                     
			                     $data['sales_head']=$form_data->sales_head;
			                     
			                      $sales_group=array();
			                     
			                      $sales_head = $this->Main_model->where_in_names('sales_head_group','sales_head_id',$form_data->sales_head);
			                      foreach($sales_head as $val)
			                      {
			                          $sales_group[]=$val->sales_group_id;
			                      }
			                      
			                     
								  $data['sales_head']= implode("|",$form_data->sales_head);
                                  $data['route']= implode("|",$form_data->route);
                                 
                                 
                                  //$data['sales_group']= implode("|",$sales_group);
                                  //$data['sales_group']= implode("|",$sales_group);
                                  $data['sales_group']= $form_data->sales_group;
                                  
                                  
                                 
                                 $data['status']=$form_data->status;
                                 $data['sales_id']=$form_data->sales_id;

			                   
			                     $data['pin']=$form_data->pin;
			                     $data['name']=$form_data->name;
			                     
			                     
			                     
			                             $data['marital_status']=$form_data->marital_status;
        			                     $data['dob']=date('Y-m-d',strtotime($form_data->dob));
        			                     $data['fathername']=$form_data->fathername;
        			                     $data['mothername']=$form_data->mothername;
        			                     $data['spouse_details']=$form_data->spouse_details;
        			                     $data['spouse_name']=$form_data->spouse_name;
        			                     $data['sdob']=date('Y-m-d',strtotime($form_data->sdob));
        			                     $data['wedding_anniversary']=date('Y-m-d',strtotime($form_data->wedding_anniversary));
			                      
                                 


                                      $result= $this->Main_model->where_names($tablename,'pin',$data['pin']);
				                      if(count($result)>0)
				                      {     
				                          
				                                $sales_id=0;
				                                foreach ($result as  $row) {
                                                	$sales_id=$row->sales_id;
                                                }
                                                if($sales_id==$form_data->sales_id)
                                                {
                                                      $array=array('error'=>'3','massage'=>'Sales ID already exists');
                                                      echo json_encode($array);
                                                }
                                                else
                                                {
                                                     $array=array('error'=>'3','massage'=>'Sales PIN no already exists');
                                                      echo json_encode($array);
                                                }


				                        	

				                      }
				                      else
				                      {
				                      	      $insertid=$this->Main_model->insert_commen($data,$tablename);
				                      	      $datas['marital_status']=$form_data->marital_status;
            			                      $datas['dob']=date('Y-m-d',strtotime($form_data->dob));
            			                      $datas['fathername']=$form_data->fathername;
            			                      $datas['mothername']=$form_data->mothername;
            			                      $datas['spouse_details']=$form_data->spouse_details;
            			                      $datas['spouse_name']=$form_data->spouse_name;
            			                      $datas['sdob']=date('Y-m-d',strtotime($form_data->sdob));
            			                      $datas['wedding_anniversary']=date('Y-m-d',strtotime($form_data->wedding_anniversary));
			                                  $datas['target']=$form_data->target;
			                                  $datas['whatapp_token']=$form_data->whatsapp_key;
			                     
                				                      	    
                                             $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                            
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='12';
                                             $datas['sales_id']=$form_data->sales_id;
                                             $datas['define_saleshd_id']=$data['sales_head'];
                                             $datas['sales_group_id']=$data['sales_group'];
                                             $datas['define_salesteam_id']=$insertid;
                                             $datas['mark_sales_member']=0;
                                             // $datas['user_id']=$this->userid;
                                             $datas['create_date_by']=date('Y-m-d');
                                 

                                             
                                             
                                             $salesmemberid=$this->Main_model->insert_commen($datas,'admin_users');
        				                      	    
        				                      for($i=0;$i<count($form_data->sales_head);$i++)
        				                      {
        				                         
        				                         
        				                          $datashead['sales_member_id']=$salesmemberid;
        				                          $datashead['sales_head_id']=$form_data->sales_head[$i];	    
        				                          $this->Main_model->insert_commen($datashead,'sales_member_head');	    
				                      	    
        				                          
        				                      }
        				                      
        				                    
        				                         
        				                       $datasgroup['sales_member_id']=$salesmemberid;
        				                       $datasgroup['sales_group_id']=$data['sales_group'];	    
        				                       $this->Main_model->insert_commen($datasgroup,'sales_member_group');	    
				                      	    
        				                          
        				                     
        				                      
				                      	    
				                      	    $array=array('error'=>'2','massage'=>'Sales successfully Added..');
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

                 	 if($form_data->name!='' && $form_data->route!='' &&  $form_data->sales_head!='')
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                      
			                     $data['email']=$form_data->email;
			                     $data['phone']=$form_data->phone;
			                     $data['phone2']=$form_data->phone2;
			                     $data['sales_head']=$form_data->sales_head;
                                 $data['sales_group']=$form_data->sales_group;
                                 $data['target']=$form_data->target;
                                  $data['whatsapp_key']=$form_data->whatsapp_key;
                                  $data['assign_base']=$form_data->assign_base;

                                 if($form_data->mark_sales_member>0)
							     {
							                  	$data['mark_sales_member']=$form_data->mark_sales_member;
							      
							      }
							                 
                             
                                  
                                  $sales_group=array();
			                     
			                      $sales_head = $this->Main_model->where_in_names('sales_head_group','sales_head_id',$form_data->sales_head);
			                      foreach($sales_head as $val)
			                      {
			                          $sales_group[]=$val->sales_group_id;
			                      }
			                      
			                      
			                     
								  $data['sales_head']= implode("|",$form_data->sales_head);
                                  $data['route']= implode("|",$form_data->route);
                                  //$data['sales_group']= implode("|",$sales_group);
                                  
                                  $data['sales_group']= $form_data->sales_group;
                                
                                 
                                 
                                  
                                 $data['status']=$form_data->status;
                                 $data['sales_id']=$form_data->sales_id;

			                   
			                     $data['pin']=$form_data->pin;
			                     $data['name']=$form_data->name;
			                     
			                             $data['marital_status']=$form_data->marital_status;
        			                     $data['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
        			                     $data['fathername']=$form_data->fathername;
        			                     $data['mothername']=$form_data->mothername;
        			                     $data['spouse_details']=$form_data->spouse_details;
        			                     $data['spouse_name']=$form_data->spouse_name;
        			                     $data['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
        			                     $data['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
                         
                                

                 	             $this->Main_model->update_commen($data,$tablename);
                 	   
                 	   
                 	   
                 	   
                 	                      $datas['dob']=str_replace('T18:30:00.000Z','', $form_data->dob);
        			                      $datas['fathername']=$form_data->fathername;
        			                      $datas['mothername']=$form_data->mothername;
        			                      $datas['spouse_details']=$form_data->spouse_details;
        			                      $datas['spouse_name']=$form_data->spouse_name;
        			                      $datas['sdob']=str_replace('T18:30:00.000Z','', $form_data->sdob);
        			                      $datas['wedding_anniversary']=str_replace('T18:30:00.000Z','', $form_data->wedding_anniversary);
			                      
                             
                 	   
                 	   
                 	   
                 	                         $datas['name']=$form_data->name;
                                             $datas['username']=$form_data->name;
                                             $datas['email']=$form_data->email;
                                             $datas['phone']=$form_data->phone;
                                             $datas['password']=md5($form_data->pin);
                                             $datas['org_password']=$form_data->pin;
                                             $datas['status']=$form_data->status;
                                             $datas['access']='12';
                                             $datas['define_saleshd_id']=$data['sales_head'];
                                             $datas['sales_id']=$form_data->sales_id;
                                             $datas['sales_group_id']=$data['sales_group'];
                                             $datas['define_salesteam_id']=$form_data->id;
                                             $datas['target']=$form_data->target;
                                             $datas['whatapp_token']=$form_data->whatsapp_key;


                                             if($form_data->assign_base==1)
                                            {

				                                             if($form_data->mark_sales_member>0)
				                                             {
				                                                  $datas['mark_sales_member']=$form_data->mark_sales_member;
				                                             }

                                            }
                                            else
                                            {

                                                     $datas['mark_sales_member']=0;


                                            }
                                            
                                            


                                             
                                           
                                             
                                              $result= $this->Main_model->where_names('admin_users','define_salesteam_id',$form_data->id);
                                             
        				                      if(count($result)>0)
        				                      { 
        				                          
        				                           foreach($result as $vl)
                                                   {
                                                     $userid=  $vl->id;
                                                   }
        				                          
        				                            $datas['get_id']=$form_data->id;
        				                            $this->Main_model->update_commen_where($datas,'define_salesteam_id','admin_users');

        				                      }
        				                      else
        				                      {
        				                            unset($datas['get_id']);
        				                            $userid=$this->Main_model->insert_commen($datas,'admin_users');
        				                      }
        				                      
        				                      $this->db->query("DELETE FROM sales_member_head  WHERE sales_member_id='" . $userid . "'");
        				                      $this->db->query("DELETE FROM sales_member_group  WHERE sales_member_id='" . $userid . "'");
        				                      
        				                      
        				                      for($i=0;$i<count($form_data->sales_head);$i++)
        				                      {
        				                         
        				                         
        				                          $datashead['sales_member_id']=$userid;
        				                          $datashead['sales_head_id']=$form_data->sales_head[$i];
        				                          $this->Main_model->insert_commen($datashead,'sales_member_head');	    
				                      	    
        				                          
        				                      }
        				                      
        				                      
        				                         
        				                         
        				                      $datasgroup['sales_member_id']=$userid;
        				                      $datasgroup['sales_group_id']=$data['sales_group'];	    
        				                      $this->Main_model->insert_commen($datasgroup,'sales_member_group');	    
				                      	    
        				                         
        				                      
if($form_data->mark_sales_member>0)
{

	
        				                             
        				  

    if($form_data->assign_base==1)
    {

    	    //   $this->db->query("UPDATE customers SET mark_sales_member='".$userid."' WHERE sales_team_id='".$userid."'");

      	$this->db->query("UPDATE customers SET mark_sales_member='0' WHERE sales_team_id='".$userid."'");	
        $this->db->query("UPDATE customers SET sales_team_id='".$form_data->mark_sales_member."' WHERE sales_team_id='".$userid."'");
    
    }
    else
    {

             $this->db->query("UPDATE customers SET mark_sales_member='0' WHERE sales_team_id='".$userid."'");	
             $this->db->query("UPDATE customers SET sales_team_id='".$form_data->mark_sales_member."' WHERE sales_team_id='".$userid."'");
    }
    
   
    if($form_data->assign_base==1)
    {
		$this->db->query("UPDATE admin_users SET mark_sales_member='".$userid."' WHERE id='".$form_data->mark_sales_member."'");

	}

		 if($form_data->assign_base==0)
		 {



		    $this->db->query("UPDATE orders SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."' AND order_base IN ('0','-4','5','3')");
		    $this->db->query("UPDATE orders_quotation SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."' AND order_base IN ('0','-4','5','3')");

		    // $this->db->query("UPDATE orders_process SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."' AND order_base>0");
		    //$this->db->query("UPDATE order_sales_return_complaints SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."'");
		 $ss=$this->db->query("SELECT * FROM orders_quotation WHERE  order_base IN('0','-4','3','5') AND user_id='".$form_data->mark_sales_member."'");
  $ss=$ss->result();
  foreach($ss as $dd)
  {


    $move_id=$dd->move_id;
    $order_no=$dd->order_no;
    $this->db->query("UPDATE orders SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE  id='".$move_id."'");
    $this->db->query("UPDATE call_history SET user_id='".$form_data->mark_sales_member."' WHERE  order_no='".$order_no."'");
    
  }


  
		 }
		 else
		 {

    
		    $this->db->query("UPDATE orders SET user_id='".$form_data->mark_sales_member."',entry_user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."' AND order_base IN ('0','-4','5','3')");
		    $this->db->query("UPDATE orders_quotation SET user_id='".$form_data->mark_sales_member."',entry_user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE user_id='".$userid."' AND order_base IN ('0','-4','5','3')");
		    // $this->db->query("UPDATE orders_process SET user_id='".$form_data->mark_sales_member."' WHERE user_id='".$userid."' AND order_base>0");

		     $ss=$this->db->query("SELECT * FROM orders_quotation WHERE  order_base IN('0','-4','3','5') AND user_id='".$form_data->mark_sales_member."'");
  $ss=$ss->result();
  foreach($ss as $dd)
  {


    $move_id=$dd->move_id;
    $order_no=$dd->order_no;
    $this->db->query("UPDATE orders SET user_id='".$form_data->mark_sales_member."',old_user_id='".$userid."' WHERE  id='".$move_id."'");
    $this->db->query("UPDATE call_history SET user_id='".$form_data->mark_sales_member."' WHERE  order_no='".$order_no."'");
    
  }


  


		 }
		        				                          
        				                          
        				                          $log['staus_base']=1;
        				                          $log['olduser']=$userid;
        				                          $log['newuser']=$form_data->mark_sales_member;
        				                          $this->Main_model->insert_commen($log,'log_sales_team_change');	    
        				                         
                 	    
        				                             
        				                     }
        				                         
                 	   
                 	   
                       $array=array('error'=>'2','massage'=>'Sales successfully Updated..');
                       echo json_encode($array);

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
                     $this->db->query("UPDATE admin_users SET deleteid='1' WHERE define_salesteam_id='".$id."'");
                     

                 }
                
                


	}
	public function fetch_data()
	{

                    
                    
                    
                                            
							            	 
                    
                   
                 	  $sales_group_id=array();
                      $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                      $resultsales_team=$query->result();
                      foreach ($resultsales_team as  $values) {
                                                      
                                                      $sales_group_id[]=$values->id;
                                                      
                      }
                 	  $result= $this->Main_model->where_names('sales_team','deleteid','0');
                 	 
                 	 
                 	 
                 	 
                 	 foreach ($result as  $value) {
                       

                        $user_group_name =array();
                        $user_group = $this->Main_model->where_in_names('sales_group','id',explode("|",$value->sales_group));
                        foreach ($user_group as  $row) {
                        	$user_group_name[]=$row->name;
                        }


                        $sales_head_name =array();
                        $sales_head = $this->Main_model->where_in_names('admin_users','id',explode("|",$value->sales_head));
                        foreach ($sales_head as  $rows) {
                        	$sales_head_name[]=$rows->name;
                        }


                          $sales_main_id =0;
                        $sales_heads = $this->Main_model->where_names('admin_users','define_salesteam_id',$value->id);
                        foreach ($sales_heads as  $rowss) {
                        	$sales_main_id =$rowss->id;
                        	$whatapp_token= $rowss->whatapp_token;
                        }




                                            $route_name =array();
                                           
                                            $route = $this->Main_model->where_in_names('route','id', explode("|",$value->route));
                                            foreach ($route as  $rowss) {
                                            	$route_name[]=$rowss->name;
                                            }
                                         
                                         
                                         

                                            if($this->session->userdata['logged_in']['access']=='16')
                                            {
                                                
                                                
                                                       if(array_intersect($sales_group_id,explode("|",$value->sales_group)))
                                                       {  
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
                                                                 	 		
                                                                 	 		'email' => $value->email, 
                                                                 	 		'phone' => $value->phone, 
                                                                 	 		'phone2' => $value->phone2, 
                                                                 	 		'sales_main_id'=>$sales_main_id,
                                                                 	 		'name' => $value->name, 
                                                                 	 		'target' => $value->target, 
                                                                 	 		'pin' => $value->pin, 
                                                                 	 		'whatapp_token' => $whatapp_token,
                                                                 	 		'sales_id'=>$value->sales_id,
                                                                 	 		'sales_group' =>  implode(",",$user_group_name), 
                                                                 	 		'sales_head' =>  implode(",",$sales_head_name), 
                                                                 	 		'route' => implode(",",$route_name),
                                                                 	 		'status' => $status 
                                                
                                                                 	 	);
                                             	 	
                                                       }

							            	 
                                            }
                                            else
                                            {
                                                
                                                
                                                
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
                                             	 		
                                             	 		'email' => $value->email, 
                                             	 		'phone' => $value->phone, 
                                             	 		'phone2' => $value->phone2, 
                                             	 		'name' => $value->name, 
                                             	 		'sales_main_id'=>$sales_main_id,
                                             	 		'target' => $value->target, 
                                             	 		'pin' => $value->pin, 
                                             	 		'whatapp_token' => $whatapp_token,
                                             	 		'sales_id'=>$value->sales_id,
                                             	 		'sales_group' =>  implode(",",$user_group_name), 
                                                        'sales_head' =>  implode(",",$sales_head_name), 
                                                        'route' => implode(",",$route_name),
                                             	 		'status' => $status 
                            
                                             	 	);

                                                 
                 	                              
                 	 
							            	 
                                            }
                        

                 	 



                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_data_log()
	{

                    
                    
                    
                                            
					
                      $status=$_GET['status'];
                      
                 	  $result= $this->Main_model->where_names_order_by('log_sales_team_change','staus_base',$status,'id','DESC');
                 	  //$result = $this->db->query("SELECT * FROM `log_sales_team_change` WHERE staus_base='".$status."'  ORDER BY `id` DESC");
                      //$result->result();
                 	 
                 	 
                 	 $i=1;
                 	 foreach ($result as  $value) {
                       

                        $sales1 ='';
                        $user_group = $this->Main_model->where_in_names('admin_users','id',explode("|",$value->olduser));
                        foreach ($user_group as  $row) {
                        	$sales1=$row->name;
                        }


                        $sales2 ='';
                        $sales_head = $this->Main_model->where_in_names('admin_users','id',explode("|",$value->newuser));
                        foreach ($sales_head as  $rows) {
                        	$sales2=$rows->name;
                        }

                            
                            
                                             	 	$array[] = array(
                            
                                             	 		'id' => $i, 
                                             	 		
                                             	 		'sales1' => $sales1, 
                                             	 		'sales2' => $sales2, 
                                             	 		'create_date' => date('d-m-Y g:i A',strtotime($value->create_date)), 
                                             	 		
                                             	 		
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

                 	  $output['id']= $value->id; 
                      $output['name']= $value->name; 
                      $output['company_name']= $value->company_name;
                      $output['email']= $value->email;
                      $output['phone']= $value->phone;
                      $output['phone2']= $value->phone2;
                      $output['sales_id']= $value->sales_id;
                      $output['sales_group']= $value->sales_group; 
                      $output['sales_head']= $value->sales_head;
                      $output['route']= $value->route;
                      $output['target']= $value->target;
                      $output['status']= $value->status;
                      $output['pin']= $value->pin;
                      $output['mark_sales_member']= $value->mark_sales_member;
                      $output['assign_base']= $value->assign_base;


$whatapp_token=$value->whatsapp_key;
$results= $this->Main_model->where_names('admin_users','define_salesteam_id',$id);
                 	 foreach ($results as  $values) {

                                 $whatapp_token= $values->whatapp_token;
                 	 }


                      $output['whatsapp_key']= $whatapp_token;;



                      
                        $output['marital_status']=$value->marital_status;
			            $output['dob']=$value->dob;
			            $output['fathername']=$value->fathername;
			            $output['mothername']=$value->mothername;
			                      $output['spouse_details']=$value->spouse_details;
			                      $output['spouse_name']=$value->spouse_name;
			                      $output['sdob']=$value->sdob;
			                      $output['wedding_anniversary']=$value->wedding_anniversary;

                     
	                 	
                 	 }

                    echo json_encode($output);


    }

    
	public function updateTarget(){
		$form_data = json_decode(file_get_contents("php://input"));
			 
		$target = $form_data->target ? $form_data->target : 0;
		$id = $form_data->id;
		$reportName = $form_data->report_name;
		$catId = '-';
		if(isset($form_data->field_name)){
			$catId = $form_data->field_name;
		}
		$forMonth = date('Y-m-01', strtotime($form_data->for_date)); //$form_data->for_date;
		$getQuery = $this->db->query('SELECT modified_value FROM report_changes WHERE salesman_id='.$id.' AND report_name = "'.$reportName.'" AND for_date="'.$forMonth.'" AND field = "'.$catId.'" ')->row();
		if(isset($getQuery->modified_value)){
			return $this->db->query('UPDATE report_changes SET modified_value='.$target.' WHERE salesman_id='.$id.' AND report_name = "'.$reportName.'"  AND for_date="'.$forMonth.'" AND field = "'.$catId.'" ');
		}else{
			return $this->db->query('INSERT INTO report_changes (salesman_id, report_name, modified_value, for_date, field) VALUES ('.$id.', "'.$reportName.'" , '.$target.', "'.$forMonth.'", "'.$catId.'") ');
		}
	}
	


}

