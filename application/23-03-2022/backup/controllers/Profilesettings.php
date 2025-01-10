<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profilesettings extends CI_Controller {

	function __construct() {
error_reporting(0);
            parent::__construct();
            $this->load->model('Admin/Auth');
	        if(isset($this->session->userdata['logged_in'])){
	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $this->userid=$userid;
			   $this->user_mail=$email;

			   profile($this->user_mail);
			}



    }
	public function index()
	{
                    
	                        if(isset($this->session->userdata['logged_in']))
	                        {
	                        $data['title']="Profile settings";
							$this->load->view('admin/profilesettings',$data);
							}else{
							   $this->load->view('admin/index');
							}



	}
    public function update_data()
	{


            if(isset($this->session->userdata['logged_in']))
            {
                                        $_POST = $this->security->xss_clean($_POST);
                                        $this->form_validation->set_rules('user_name', 'User name', 'trim|required');
                                        $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required');
                                        $this->form_validation->set_rules('address', 'Address', 'trim|required');
                                      
								      
								        if($this->form_validation->run() == FALSE)
										{
														
														$this->session->set_flashdata('warning',validation_errors());
													    redirect('index.php/profilesettings'); 

										}
										else
										{
                                                      
                                                   if($_FILES["userfile"]['name']!="")
                                                   {

                                                   	            $logo = time().$_FILES["userfile"]['name'];
        			                                          
		                                                        $res=do_upload($logo,'userfile');
		                                                        if($res==1)
		                                                        {



			                                                        	    $_POST['profile']= base_url().'public/uploads/'.trim($logo);
			                                                        	    $result = $this->Auth->update_data_value($this->userid,$_POST);
					                                                        $this->session->set_flashdata('success',UPDATE_DATA_SUCCESS); 
															            	redirect('index.php/profilesettings');



		                                                        }
		                                                        else
		                                                        {

			                                                        	    $this->session->set_flashdata('warning',$res); 
															            	redirect('index.php/profilesettings');

		                                                        }

                                                   }
                                                   else
                                                   {


                                                   	                        $result = $this->Auth->update_data_value($this->userid,$_POST);
					                                                        $this->session->set_flashdata('success',UPDATE_DATA_SUCCESS);
															            	redirect('index.php/profilesettings');

                                                   }


                                                      
               
                                                        

                                        }



			
			}else{
			   $this->load->view('admin/index');
			}
	     

	}
	public function passwordchange()
	{

		                                if(isset($this->session->userdata['logged_in'])){
		                                    
		                                     $_POST = $this->security->xss_clean($_POST);
		                                    
		                             	$this->form_validation->set_rules('password', 'Current password', 'trim|required');
                                        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
                                        $this->form_validation->set_rules('re_password', 'Re-Type password', 'trim|required|matches[new_password]');
                                         if($this->form_validation->run() == FALSE)
										{
														
														$this->session->set_flashdata('warning',validation_errors());
													    redirect('index.php/profilesettings'); 

										}
										else
										{


                                                                    $_POST['email']=$this->user_mail;
			                                                        $res=$this->Auth->login($_POST);
			                                                        if($res==true)
												                    {

												                    	       $result = $this->Auth->passwordupdate($this->userid,$_POST);
							                                                   $this->session->set_flashdata('success',PASSWORD_CHANGE_SUCCESS);
														                       redirect('index.php/profilesettings');


												                    }
												                    else
												                    {
												                    	      $this->session->set_flashdata('warning',ERROR_CURRENT);
												                              redirect('index.php/profilesettings');

		                                                                       
												                    }


											            

										}



							
							}else{
							   $this->load->view('admin/index');
							}

	}
	



	

}
