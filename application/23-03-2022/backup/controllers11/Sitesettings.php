<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitesettings extends CI_Controller {

	function __construct() {
error_reporting(0);
            parent::__construct();
            $this->load->model('Admin/Site_settings');
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
                    

	                        if(isset($this->session->userdata['logged_in'])){
	                        	 $data['title']="Site settings";
							$this->load->view('admin/sitesettings',$data);
							}else{
							   $this->load->view('admin/index');
							}

	}

		public function update_data()
	{


            if(isset($this->session->userdata['logged_in']))
            {
                
                
                                        $_POST = $this->security->xss_clean($_POST);
                                        $this->form_validation->set_rules('site_name', 'Site name', 'trim|required');
                                        $this->form_validation->set_rules('phone', 'Mobile No', 'trim|required');
                                       // $this->form_validation->set_rules('address', 'Address', 'trim|required');
                                        //$this->form_validation->set_rules('meta_key', 'Meta Key', 'trim|required');
                                        $this->form_validation->set_rules('meta_content', 'Meta Content', 'trim|required');
                                        $this->form_validation->set_rules('meta_description', 'Meta Description', 'trim|required');

                                         $this->form_validation->set_rules('about_us', 'About Us content', 'trim');

                                        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

                                         $this->form_validation->set_rules('fb_link', 'FB Link', 'trim|required');
                                         $this->form_validation->set_rules('linkedin_link', 'LinkedIN Link', 'trim|required');
                                         $this->form_validation->set_rules('youtube_link', 'Youtube link', 'trim|required');
								      
								        if($this->form_validation->run() == FALSE)
										{
														
														$this->session->set_flashdata('warning',validation_errors());
													    redirect('index.php/sitesettings'); 

										}
										else
										{
				       	$_POST['address_title']=implode('=',$_POST['address_title']);
					
						$_POST['address']=implode('=',$_POST['address']);
					
                                                   if($_FILES["userfile"]['name']!="")
                                                   {

                                                   	           
                                                   	            $logo = str_replace(' ','',time().$_FILES["userfile"]['name']);
                                                   	           
		                                                        $res=do_upload($logo,'userfile');
		                                                        if($res==1)
		                                                        {
			                                                        	    $_POST['logo']= base_url().'public/uploads/'.trim($logo);
			                                                        	    $result = $this->Site_settings->update_data_value($_POST);
					                                                        $this->session->set_flashdata('success',UPDATE_DATA_SUCCESS); 
															            	redirect('index.php/sitesettings');



		                                                        }
		                                                        else
		                                                        {

			                                                        	    $this->session->set_flashdata('warning',$res); 
															            	redirect('index.php/sitesettings');

		                                                        }

                                                   }
                                                   else
                                                   {




                                                   	                        $result = $this->Site_settings->update_data_value($_POST);
					                                                        $this->session->set_flashdata('success',UPDATE_DATA_SUCCESS);
															            	redirect('index.php/sitesettings');

                                                   }


                                                      
               
                                                        

                                        }



			
			}else{
			   $this->load->view('admin/index');
			}
	     

	}



	

}
