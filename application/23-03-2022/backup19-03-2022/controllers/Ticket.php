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
	public function ticket_view($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Users Add';
								             $data['id']       = $id;
                                            


                                             $status=0;
                                             $ticket_id=0;
                                             $tickets = $this->Main_model->where_names('tickets','id',$id);
                                             foreach ($tickets as  $value) {
                                                $status= $value->status;
                                                $ticket_id= $value->ticket_id;
                                             }


                                             $data['ticket_id']= $ticket_id;

                                             $data['status']=$status;



                                           if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                                           {
                                               
                                               
                                                        if($status!='2')
                                                        {
            
                                                            $this->db->query("UPDATE tickets SET status='1' WHERE id='".$id."'");
            
                                                        } 
                                            
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





			                      $tablename=$form_data->tablename;
			                      $data['title']=$form_data->title;
			                      $data['category']=$form_data->category;
			                      $data['priority']=$form_data->priority;
			                      $data['message']=$form_data->message;
			                      $data['create_date']=date('d-m-Y H:i A');
			                      $data['attachment']=$form_data->attachment;
			                      $data['ticket_id']=substr(time(), 4);
                                  $data['user_id']=$this->userid;
                                  
                                  
                                  
                                             	$subject = "Zaron Ticket ID ".$data['ticket_id'];
                                        			$body = '<div style="width: 680px;padding: 25px;">
				
                                                    				    <div style="margin-left:0px;">
                                                    				    <table border="0" style="width: 100%;
                                                                            border: black solid 1px;
                                                                            line-height: 31px;
                                                                            padding: 13px;
                                                                            text-transform: capitalize;">
                                                                            <tr>
                                                    							<td>Subject</td>
                                                    							<td>:</td>
                                                    							<td>'.$form_data->title.'</td>
                                                    						</tr>
                                                    						<tr>
                                                    							<td>Category</td>
                                                    							<td>:</td>
                                                    							<td>'.$form_data->category.'</td>
                                                    						</tr>
                                                    						<tr>
                                                    							<td>Priority</td>
                                                    							<td>:</td>
                                                    							<td>'.$form_data->priority.'</td>
                                                    						</tr>
                                                    						
                                                    						<tr>
                                                    							<td>Message </td>
                                                    							<td>:</td>
                                                    							<td>'.$form_data->message.'</td>
                                                    						</tr>
                                                    					
                                                    				    </table>
                                                    				    </div>
                                                    				    
                                                    				</div>';
                                				
                                				
                                				
                                				$headers = "MIME-Version: 1.0" . "\r\n";
                                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                
                                                // More headers
                                                $headers .= 'From: <zaron>' . "\r\n";
                                                $headers .= 'Bcc: babu@admonk.in' . "\r\n";
                                                //$headers .= 'Bcc: prabathkar@admonk.in' . "\r\n";
                                                mail($to,$subject,$body,$headers);
                                

                                  $insert_id =$this->Main_model->insert_commen($data,$tablename);
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
                                       $data['create_date']=date('d-m-Y H:i A');


	                                   $this->Main_model->insert_commen($data,$tablename);
					                   $array=array('error'=>'2','massage'=>'Reply ticket submitted..');
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
	public function fetchData_open()
	{
	    
	    
	               if($this->session->userdata['logged_in']['userid']=='23' || $this->session->userdata['logged_in']['userid']=='1')
                   {
                        $result= $this->Main_model->where_names('tickets','status','0');
                      
                   }
                   else
                   {
                       	 $result= $this->Main_model->where_names_two_order_by('tickets','status','0','user_id',$this->userid,'id','DESC');
                   }
                    

                    
                 	

                   

                 	 foreach ($result as  $value) {
                       
                       

                 	 	if($value->status=='1')
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


                                        if($value->reply=='1')
                                        {
                                             $reply='Support Team';
                                             $reply_set='';
                                        }
                                        else
                                        {
                                            $reply='User';
                                            $reply_set='';
                                        }



                                        $array[] = array(

                                            'ticket_id' => $value->ticket_id, 
                                            'id' => $value->id, 
                                            'message' => $value->message, 
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




                 	  $output['id']= $value->id; 
                      $output['ticket_id']= $value->ticket_id; 
                      $output['title']= $value->title; 
                      $output['category']= $value->category;
                      $output['priority']= $value->priority;
                      $output['message']= $value->message;
                      $output['attachment']= $value->attachment;
                      $output['create_date']= $value->create_date; 
                      $output['status']=$status;
	                 	
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
	
	


}
