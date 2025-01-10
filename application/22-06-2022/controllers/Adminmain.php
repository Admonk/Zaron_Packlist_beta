<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmain extends CI_Controller {

    function __construct() {
             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Auth');

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

										    redirect('index.php/dashboard');

										}
										else
										{

										    $start=0;
								            $data['title']='User Login';
						                    $this->load->view('index',$data);

										}                    

                  


	}
	
	public function adminloginpage()
	{
		          
                            
	
							            if(isset($this->session->userdata['logged_in']))
							            {

										    redirect('index.php/dashboard');

										}
										else
										{

										    $start=0;
								            $data['title']='Admin Login';
						                    $this->load->view('admin_login',$data);

										}                    

                  


	}
	public function login()
	{


		    if(isset($this->session->userdata['logged_in']))
		    {
			
                                        // $this->load->view('admin/dashboard');
                                        redirect('index.php/dashboard');

			}
			else
			{
                                        
                                        $_POST = $this->security->xss_clean($_POST);
				                        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
								        $this->form_validation->set_rules('password', 'Password', 'trim|required');
								        if($this->form_validation->run() == FALSE)
										{
														

																    $this->session->set_flashdata('warning',validation_errors());
																    redirect('index.php/adminmain'); 

										}
										else
										{

                                             

                                           
								                        
											                        $res=$this->Auth->login($_POST);
												                    if($res==true)
												                    {
												                    	 
												                    	     $result = $this->Auth->read_user_information($_POST['email']);
											                                 $this->load->library('session');


												                    	     $session_data = array(
															                    	     'userid' => $result[0]->id,
															                    	     'customer_id' => $result[0]->customer_and_executive_id,
																						 'username' => $result[0]->name,
																						 'email' => $result[0]->email,
																						 'access' => $result[0]->access,
																						 'define_saleshd_id' => $result[0]->define_saleshd_id,
																						 'define_salesteam_id' => $result[0]->define_salesteam_id,
																						 'define_driver_id' => $result[0]->define_driver_id,
																						 'customer_id' => $result[0]->customer_id,
																						 'sales_id' => $result[0]->sales_id,
																			 );

																			 if($result[0]->status==1)
																			 {

																			 	     $result = $this->Auth->log_update($result[0]->id,1);
																					 $this->session->set_userdata('logged_in', $session_data);
																					 redirect('index.php/dashboard');
																					

																			 }
																			 else
																			 {
																			 	    
																			 	     $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                 redirect('index.php/adminmain');  

																			 }

												                     }
												                     else
												                     {

                                 

					                                                                $this->session->set_flashdata('warning',ERROR_ACCOUNT);
																			        redirect('index.php/adminmain');  
											                       
												                     }         


										}


			 
			}

		
     
	
	}
	
	
	public function userlogin()
	{


		    if(isset($this->session->userdata['logged_in']))
		    {
			
                                        // $this->load->view('admin/dashboard');
                                        redirect('index.php/dashboard');

			}
			else
			{
                                        
                                        $_POST = $this->security->xss_clean($_POST);
				                       
								        $this->form_validation->set_rules('password', 'PIN', 'trim|required');
								        if($this->form_validation->run() == FALSE)
										{
														

																    $this->session->set_flashdata('warning',validation_errors());
																    redirect('index.php/adminmain'); 

										}
										else
										{

                                             

                                           
								                        
											                        $res=$this->Auth->userlogin($_POST);
												                    if($res==true)
												                    {
												                    	 
												                    	     $result = $this->Auth->read_user_information_pin($_POST['password']);
											                                 $this->load->library('session');
											                                 
											                                 
											                               


												                    	     $session_data = array(
															                    	     'userid' => $result[0]->id,
															                    	     'customer_id' => $result[0]->customer_and_executive_id,
																						 'username' => $result[0]->name,
																						 'email' => $result[0]->email,
																						 'access' => $result[0]->access,
																						 'define_saleshd_id' => $result[0]->define_saleshd_id,
																						 'define_salesteam_id' => $result[0]->define_salesteam_id,
																						 'define_driver_id' => $result[0]->define_driver_id,
																						 'customer_id' => $result[0]->customer_id,
																						 'sales_id' => $result[0]->sales_id,
																			 );

																			 if($result[0]->status==1)
																			 {

																			 	     $result = $this->Auth->log_update($result[0]->id,1);
																					 $this->session->set_userdata('logged_in', $session_data);
																					 redirect('index.php/dashboard');
																					

																			 }
																			 else
																			 {
																			 	    
																			 	     $this->session->set_flashdata('warning','Input Pin Wrong');
																	                 redirect('index.php/adminmain');  

																			 }

												                     }
												                     else
												                     {

                                 

					                                                                $this->session->set_flashdata('warning','Input Pin Wrong');
																			        redirect('index.php/adminmain');  
											                       
												                     }         


										}


			 
			}

		
     
	
	}

	public function logout()
    {
                      // Removing session data
		          
		           if(isset($this->session->userdata['logged_in']))
		           {

								           	$sess_array =$this->session->userdata['logged_in'];
								           	$result = $this->Auth->log_update($sess_array['userid'],0);
											$this->session->unset_userdata('logged_in', $sess_array);
											$this->session->set_flashdata('success',LOGOUT_ACCOUNT);
		           }

		           
				   redirect('index.php/adminmain');  


     }
     
		
	
}
