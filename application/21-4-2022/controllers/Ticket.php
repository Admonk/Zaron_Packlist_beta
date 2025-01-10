<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

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
	public function ticketcreate()
	{
        
	


    
        		


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Ticket Create';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('ticket/ticket_create',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	public function trash()
	{
        
	


    
        		


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Ticket trash';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('ticket/trash',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function inbox()
	{
        
	


    
        		


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Ticket inbox';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('ticket/inbox',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/inbox');
										}
	     

	}
	
	
	public function ticket_view($id,$view)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Users Add';
								             $data['id']       = $id;
                                            
                                              $data['view']       = $view;

                                             $status=0;
                                             $ticket_id=0;
                                             $tickets = $this->Main_model->where_names('tickets','id',$id);
                                             foreach ($tickets as  $value) {
                                                $status= $value->status;
                                                $ticket_id= $value->ticket_id;
                                             }


                                             $data['ticket_id']= $ticket_id;

                                             $data['status']=$status;


                                                             
                                                            if($view!=1)
                                                            {
                                                                
                                                            
                                                            $this->db->query("UPDATE tickets SET status='1' WHERE id='".$id."'");
                                                            
                                                            }
            
                                                        
                                            
                                          
                                            





								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('ticket/ticket_view',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	public function ticket_history()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Ticket History';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('ticket/ticket_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function insertandupdate()
	{
                 date_default_timezone_set("Asia/Kolkata");
                 $form_data = json_decode(file_get_contents("php://input"));



                 if($form_data->action=='Create')
                 {
                     
                     if($form_data->title!='' && $form_data->message!='' && $form_data->category!='' && $form_data->priority!='' )
                     {


                                  $ticket_type=$form_data->ticket_type;
                                  $user_group=$form_data->user_group;


			                      $tablename=$form_data->tablename;
			                      $data['title']=$form_data->title;
			                      $data['category']=$form_data->category;
			                      $data['priority']=$form_data->priority;
			                      $data['message']=$form_data->message;
			                      $data['reply']=0;
			                      $data['create_date']=date('d-m-Y h:i A');
			                      
			                      
			                      $data['attachment']=$form_data->attachment;
			                      $data['ticket_id']=substr(time(), 4);
                                  $data['user_id']=$this->userid;
                                  $data['sent']=1;
                                  $data['ticket_type']=$form_data->ticket_type;
                                  
                                  
                                  
                                  
                                  if($ticket_type=='1')
                                  {
                                      
                                       if($form_data->user=='0')
                                       {
                                           
                                             $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'access',$user_group,'name','ASC');
                                             $dataid=array();
                                             foreach ($resultpending as  $value) {
                                                 
                                                   
                                                   $data['user']= $value->id;
                                                  
                                                   $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                                 	
                                             }

                                           
                                           
                                       }
                                       else
                                       {
                                            $data['user']=$form_data->user;
                                             $insert_id =$this->Main_model->insert_commen($data,$tablename);
                                           
                                       }
                                       
                                  }
                                  else
                                  {    
                                      
                                       $data['user']=1;
                                       
                                     
                                       $insert_id =$this->Main_model->insert_commen($data,$tablename);
                                       
                                  }
                                 
                                  
                                  
                                  
                                

                                 
				                  $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Ticket Created Ticket ID id '. $data['ticket_id']);
                                  echo json_encode($array);




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Submit")
                 {
            
            
            
                  
                 

                 	 if($form_data->message!='' )
                     {




				                       $tablename=$form_data->tablename;
				                       $data['message']=$form_data->message;
                                      
                                      
                                      
                                       if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                                       {
                                           $data['reply']=1;
                                       }
                                       else
                                       {
                                           $data['reply']=$form_data->reply;
                                       }
                                       
                                       
                                       
                                       
                                       $data['ticket_id']=$form_data->id;
				                       $data['user_id']=$this->userid;
                                       $data['create_date']=date('d-m-Y h:i A');
                                       
                                       
                                       $this->db->query("UPDATE tickets SET reply='1' WHERE id='".$form_data->id."'");
 

	                                   $insert_id =$this->Main_model->insert_commen($data,$tablename);
					                   $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Reply ticket submitted..');
	                                   echo json_encode($array);




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }

                 if($form_data->action=='Close')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $status=2;
                     $this->Main_model->close($id,$tablename,$status);

                 }
                
                


	}
	public function fetchData_sent()
	{
	    
	    
	              

                    
                 	$result= $this->Main_model->where_names_order_by('tickets','user_id',$this->userid,'id','DESC');
                 	
                 	$ticket_id=array();
                    $resultdelete= $this->Main_model->where_names('tickets_delete','user_id',$this->userid,'id','DESC');
                    foreach ($resultdelete as  $valuedelete) {
                        $ticket_id[]=$valuedelete->ticket_id;
                    }

                   
                     $array=array();
                 	 foreach ($result as  $value) {
                       
                       

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Closed';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='Open';
                 	 	}
                 	 	
                 	 	
                 	                         $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user,'name','ASC');
                                            
                                             foreach ($resultpending as  $valuess) {
                                                  
                                                   $username= $valuess->name;
                                                  	
                                             }
                                             
                                             
                            if($value->ticket_type==2)
                            {
                                $username="External Support Team";
                            }
 
                            $message = substr($value->message, 0, 115); 
                            
                            
                            
                             if(!in_array($value->id, $ticket_id))
                             {
                                 
                                   
                                   if($value->sent==1)
                                   {
                                       
                                   

                         	     	$array[] = array(
        
                         	 		'ticket_id' => $value->ticket_id, 
                         	 		'id' => $value->id, 
                         	 		'title' => $value->title, 
                         	 		'username' => $username,
                         	 		'lable' => 'To',
                         	 		'category' => $value->category,
                         	 		'bgcolor' => 'bgcolorgray',
                         	 		'message' => $message.'...', 
                         	 		'priority' => $value->priority, 
                         	 		'dateset' => date('M',strtotime($value->create_date)).' '.date('d',strtotime($value->create_date)), 
                         	 		'status' => $status
                         	 		
        
                         	 	    );
                         	 	    
                         	 	    
                                   }
                         	 	    
                             }




                 	 }

                    echo json_encode($array);

	}




	public function fetchData_trash()
	{
	    
	    
	              

                    
                 	$result= $this->Main_model->where_names_order_by('tickets','user_id',$this->userid,'id','DESC');
                 	
                 	$ticket_id=array();
                    $resultdelete= $this->Main_model->where_names('tickets_delete','user_id',$this->userid,'id','DESC');
                    foreach ($resultdelete as  $valuedelete) {
                        $ticket_id[]=$valuedelete->ticket_id;
                    }

                   
                     $array=array();
                 	 foreach ($result as  $value) {
                       
                       

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Closed';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='Open';
                 	 	}
                 	 	
                 	 	
                 	                         $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user,'name','ASC');
                                            
                                             foreach ($resultpending as  $valuess) {
                                                  
                                                   $username= $valuess->name;
                                                  	
                                             }
                                             
                                             
                            if($value->ticket_type==2)
                            {
                                $username="External Support Team";
                            }
 
                            $message = substr($value->message, 0, 115); 
                            
                            
                            
                             if(in_array($value->id, $ticket_id))
                             {
                                 
                            

                         	     	$array[] = array(
        
                         	 		'ticket_id' => $value->ticket_id, 
                         	 		'id' => $value->id, 
                         	 		'title' => $value->title, 
                         	 		'username' => $username,
                         	 		'lable' => 'To',
                         	 		'category' => $value->category,
                         	 		'bgcolor' => 'bgcolorgray',
                         	 		'message' => $message.'...', 
                         	 		'priority' => $value->priority, 
                         	 		'dateset' => date('M',strtotime($value->create_date)).' '.date('d',strtotime($value->create_date)), 
                         	 		'status' => $status
                         	 		
        
                         	 	    );
                         	 	    
                         	 	    
                             }




                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	public function fetchData_inbox()
	{
	    
	    
	              
                   if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                   {
                       
                      	 	$result= $this->Main_model->where_names_order_by('tickets','user',1,'id','DESC');
                      	 	$resultcount=0;
                      	 	if(count($result)==0)
                      	 	{
                      	 	    $result=$this->Main_model->where_names_two_order_by('tickets','user_id',1,'reply','1','id','DESC');
                      	 	    
                      	 	   
                      	 	}
                            
                   }
                   else
                   {
                       	    $resultcount=0;
                       	    $result= $this->Main_model->where_names_order_by('tickets','user',$this->userid,'id','DESC');
                 	        if(count($result)==0)
                      	 	{
                 	             $result=$this->Main_model->where_names_two_order_by('tickets','user_id',$this->userid,'reply','1','id','DESC');
                 	             
                      	 	}
                      	 	
                   }
                    
                    
                 	
                 	$ticket_id=array();
                    $resultdelete= $this->Main_model->where_names('tickets_delete','user_id',$this->userid,'id','DESC');
                    foreach ($resultdelete as  $valuedelete) {
                        $ticket_id[]=$valuedelete->ticket_id;
                    }

                   
                     $array=array();
                 	 foreach ($result as  $value) {
                       
                       
                        
                                         	 	if($value->status=='1')
                                         	 	{
                                         	 		$status='bgcolorgray';
                                         	 	}
                                         	 	else
                                         	 	{
                                         	 		$status='bgcolorwhite';
                                         	 	}
                 	 	                     
                 	 	                     
                 	 	                     
                 	 	                        if($value->user==$this->userid)
                 	 	                        {
                 	 	                            
                 	 	                            $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user_id,'name','ASC');
                                            
                                                    foreach ($resultpending as  $valuess) {
                                                      
                                                       $username= $valuess->name;
                                                      	
                                                    }
                                                   
                 	 	                            
                 	 	                        }
                 	 	                        else
                 	 	                        {
                 	 	                            
                 	 	                            $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user,'name','ASC');
                                            
                                                    foreach ($resultpending as  $valuess) {
                                                      
                                                       $username= $valuess->name;
                                                      	
                                                    }
                 	 	                            
                 	 	                        }
                 	 	
                 	                                          
                                                                 
                                                if($value->ticket_type==2)
                                                {
                                                    $username="External Support Team";
                                                }
                     
                                                $message = substr($value->message, 0, 115); 
                                                
                                                $replaycount="";
                                                $resultcount=$this->Main_model->where_names_order_by('tickets_sub','ticket_id',$value->id,'id','DESC');
                                                if(count($resultcount)!=0)
                                                {
                                                    $replaycount="(".count($resultcount).")";
                                                }
                                                
                                                 if(!in_array($value->id, $ticket_id))
                                                 {
                                                     
                                                     
                    
                                             	     	$array[] = array(
                            
                                             	 		'ticket_id' => $value->ticket_id, 
                                             	 		'id' => $value->id, 
                                             	 		'title' => $value->title, 
                                             	 		'username' => $username,
                                             	 		'lable' => 'From',
                                             	 		'category' => $value->category,
                                             	 		'bgcolor' => $status,
                                             	 		'replaycount' => $replaycount,
                                             	 		'message' => $message.'...', 
                                             	 		'priority' => $value->priority, 
                                             	 		'dateset' => date('M',strtotime($value->create_date)).' '.date('d',strtotime($value->create_date)), 
                                             	 		'status' => $status,
                                             	 		'status' => $value->status
                                             	 		
                            
                                             	 	    );
                                             	 	    
                                             	 	    
                                                 }




                 	 }

                    echo json_encode($array);

	}







    public function fetchData_sub()
    {

                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('tickets_sub','ticket_id',$id,'id','ASC');

                   

                     foreach ($result as  $value) {
                       
                       
                       


                       
                  

                                        if($value->status=='1')
                                        {
                                            $status='Closed';
                                        }
                                        else
                                        {
                                            $status='Open';
                                        }
                                        
                                        
                                        
                                        
                                        
                                        
                                           
                                             
                                             
                                             
                                             
                                             




                                                if($value->user_id==$this->userid)
                 	 	                        {
                 	 	                            
                 	 	                            $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user_id,'name','ASC');
                                            
                                                    foreach ($resultpending as  $valuess) {
                                                      
                                                        $reply= 'Me';
                                                      	$phone= $valuess->email;
                                                    }
                                                   
                 	 	                            
                 	 	                        }
                 	 	                        else
                 	 	                        {
                 	 	                            
                 	 	                                 $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user_id,'name','ASC');
                                            
                                                         foreach ($resultpending as  $valuess) {
                                                              
                                                               $reply= $valuess->name;
                                                               $phone= $valuess->email;
                                                              	
                                                         }
                 	 	                        }
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                            if($value->user_id==1)
                                            {
                                                $reply="External Support Team";
                                                $phone='';
                                            }

                                              $reply_set='Reply';


                                        $array[] = array(

                                            'ticket_id' => $value->ticket_id, 
                                            'id' => $value->id, 
                                            'message' => $value->message, 
                                            'phone' => $phone, 
                                            'reply' => $value->reply, 
                                            'create_date' => $value->create_date, 
                                            'user' => $reply, 
                                            'reply_set' => $reply_set, 
                                            'status' => $status
                                            

                                        );





                     }

                    echo json_encode($array);

    }




    public function attachmentmain()
    {

                    
                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('tickets_attachemnt','ticket_id',$id,'id','ASC');

                       $i=1;
                     foreach ($result as  $value) {
                       
                       



                        $array[] = array(

                          
                            'id' => $i, 
                            'url' => base_url().'/'.$value->attachment
                            

                        );



                         $i++;




                     }

                    echo json_encode($array);

    }



    public function attachmentsub()
    {

                    
                     $id=$_GET['id'];
                     $result= $this->Main_model->where_names_order_by('tickets_attachemnt_sub','ticket_id',$id,'id','ASC');

                       $i=1;
                       
                       $array=array();
                       
                     foreach ($result as  $value) {
                       
                       



                        $array[] = array(

                          
                            'id' => $i, 
                            'url' => base_url().'/'.$value->attachment
                            

                        );



                         $i++;




                     }

                    echo json_encode($array);

    }

	public function fetchData_process()
	{
                 
                 
                   if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                   {
                      	 $result= $this->Main_model->where_names('tickets','status','1');
                      
                   }
                   else
                   {
                       	
                       	 $result= $this->Main_model->where_names_two_order_by('tickets','status','1','user_id',$this->userid,'id','DESC');
                   }
                    
                 

                   

                 	 foreach ($result as  $value) {
                       
                       

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Process';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='Open';
                 	 	}


                 	 	$array[] = array(

                 	 		'ticket_id' => $value->ticket_id, 
                 	 		'id' => $value->id, 
                 	 		'title' => $value->title, 
                 	 		'category' => $value->category, 
                 	 		'priority' => $value->priority, 
                 	 		'create_date' => $value->create_date, 
                 	 		'status' => $status
                 	 		

                 	 	);




                 	 }

                    echo json_encode($array);

	}


	public function fetchData_closed()
	{

                    
                    if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                   {
                      	$result= $this->Main_model->where_names('tickets','status','2');
                      
                   }
                   else
                   {
                       	$result= $this->Main_model->where_names_two_order_by('tickets','status','2','user_id',$this->userid,'id','DESC');
                   }
                    
                    
                 	 

                   

                 	 foreach ($result as  $value) {
                       
                       

                 	 	if($value->status=='2')
                 	 	{
                 	 		$status='Closed';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='Open';
                 	 	}


                 	 	$array[] = array(

                 	 		'ticket_id' => $value->ticket_id, 
                 	 		'id' => $value->id, 
                 	 		'title' => $value->title, 
                 	 		'category' => $value->category, 
                 	 		'priority' => $value->priority, 
                 	 		'create_date' => $value->create_date, 
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
                     $view=$form_data->view;
                     
                     $lable="From";
                     if($view==1)
                     {
                         $lable="To";
                     }
                     
                     
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {




                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Closed';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='Open';
                 	 	}
                 	 	
                 	 	
                 	 	
                 	 	
                 	 	                        if($value->user==$this->userid)
                 	 	                        {
                 	 	                            
                 	 	                            $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user_id,'name','ASC');
                                            
                                                    foreach ($resultpending as  $valuess) {
                                                      
                                                       $username= $valuess->name;
                                                      	$phone= $valuess->email;
                                                    }
                                                   
                 	 	                            
                 	 	                        }
                 	 	                        else
                 	 	                        {
                 	 	                            
                 	 	                            $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'id',$value->user,'name','ASC');
                                            
                                                    foreach ($resultpending as  $valuess) {
                                                      
                                                       $username= $valuess->name;
                                                       $phone= $valuess->email;
                                                      	
                                                    }
                 	 	                            
                 	 	                        }
                 	 	
                 	 	
                 	 	
                 	 	   
                                             
                                             
                            if($value->ticket_type==2)
                            {
                                $username="External Support Team";
                                $phone='';
                            }
                 	 	
                      $output['lable']= $lable; 


                 	  $output['id']= $value->id; 
                      $output['ticket_id']= $value->ticket_id; 
                      $output['title']= $value->title; 
                      $output['username']= $username;
                      $output['phone']= $phone;
                      $output['category']= $value->category;
                      $output['priority']= $value->priority;
                      $output['message']= $value->message;
                      $output['attachment']= $value->attachment;
                      $output['create_date']= $value->create_date; 
                      $output['status']=$status;
                      
                      
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    public function fetch_single_data_count()
    {
        
        
        
        
                   if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                   {
                       
                      	 	$result= $this->Main_model->where_names_two_order_by('tickets','user',1,'status',0,'id','DESC');
                      	 	
                      	 
                            
                   }
                   else
                   {
                       	   
                       	    $result= $this->Main_model->where_names_two_order_by('tickets','user',$this->userid,'status',0,'id','DESC');
                 	        
                   }
                   
                   
                      
                     
                    $output=array();
                    if(count($result)!=0)
                    {
                        $output['countdata']= "(".count($result).")";
                    }
                      	
                     
                    echo json_encode($output);
                    
                    
                    


    }
    
    
    
    
    
    
    
    
    
    
    
    public function fileuplaod()
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

                            

                            $this->db->query("INSERT INTO tickets_attachemnt  (`ticket_id`,`attachment`)VALUES('".$ticket_id."','".$path."')");

                         }


                   }
                   
            }
             

            
             
 
         }


    }
    
     public function fileuplaod_sub()
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

                            

                            $this->db->query("INSERT INTO tickets_attachemnt_sub  (`ticket_id`,`sub_id`,`attachment`)VALUES('".$ticket_id."','".$ticket_id."','".$path."')");

                         }


                   }
                   
            }
             

            
             
 
         }


    }
	
		 public function userlist()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                      
                      
                     $user_group= $form_data->user_group;
                

                     $resultpending= $this->Main_model->where_names_two_order_by('admin_users','deleteid',0,'access',$user_group,'name','ASC');
                     
                     foreach ($resultpending as  $value) {
                         
                           
                            $array[] = array(
                         	    'id'=>trim($value->id),
                         	    'name'=>$value->name
                               );
                         
                         	


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    public function deletetticket()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                      
                      
                     $order_ticket_id= $form_data->order_ticket_id;
                     $order_ticket_idval=explode("|",$order_ticket_id);
                     
                     $userid=$this->userid;
                     
                     $tablename='tickets_delete';
                     $data['user_id']= $userid;
                     for($i=0;$i<count($order_ticket_idval);$i++)
                     {
                         
                            $data['ticket_id']= $order_ticket_idval[$i];
                            $insert_id=$this->Main_model->insert_commen($data,$tablename);
                            
                     }
                                                  
                                                  
             
                    

              

    }
    
    
    


}
