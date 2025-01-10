<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
							                
							            	 
                                             $data['active_base']='dashboard';
										     $data['active']='dashboard';
								             $data['title']    = 'Dashboard';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
						                     
						                    if($this->session->userdata['logged_in']['access']=='SS')
							                {
							                      redirect('index.php/order/ordercreate');
							                }
							                else if($this->session->userdata['logged_in']['access']=='SH')
							                {
							                      redirect('index.php/order/orders_list_sales_head');
							                }
							                else if($this->session->userdata['logged_in']['access']=='5') // finance
							                {
							                      redirect('index.php/order/finance_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='6') // finance
							                {
							                      redirect('index.php/order/transport_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='4') // finance
							                {
							                      redirect('index.php/order/orders_list_purchase');
							                }
							                else if($this->session->userdata['logged_in']['access']=='10') // finance
							                {
							                      redirect('index.php/order/orders_list_md');
							                }
							                else
							                {
							                      $this->load->view('dashboard/index',$data);
							                }
						                     
						                   


										}
										else
										{

										      redirect('index.php/adminmain');

										}                    

                  


	}



}	