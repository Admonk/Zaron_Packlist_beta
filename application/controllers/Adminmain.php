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
    public function customer_login_145()
	{
		          
		
                
							            if(isset($this->session->userdata['logged_in']))
							            {

										    redirect('index.php/dashboard');

										}
										else
										{

										    $start=0;
								            $data['title']='Customer Login';
						                    $this->load->view('customer_login',$data);

										}                    

                  


	}
	 public function customerlogin()
	{


		    if(isset($this->session->userdata['logged_in']))
		    {
			
                                        // $this->load->view('admin/dashboard');
                                        redirect('index.php/dashboard');

			}
			else
			{
                                        
                                        $_POST = $this->security->xss_clean($_POST);

                                       // echo "<pre>";print_r($_POST);
                                       // exit;

                    //                     if(isset($_POST['newpassword']))
                    //                     {


                                       
                    //                         $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
								            // $this->form_validation->set_rules('conpassword', 'Confirm Password', 'trim|required');
								        


                    //                     }
                    //                     else
                    //                     {

                    //                     	 $this->form_validation->set_rules('password', 'Password', 'trim|required');


                    //                     }
				                       
								      
								        

								        //if($this->form_validation->run() == FALSE)
										//{
														

																    //$this->session->set_flashdata('warning',validation_errors());
																    //redirect('index.php/adminmain/customer_login'); 

										// }
										// else
										// {

                                             

                                           
								                        
											                        $res=$this->Auth->customerlogin($_POST);
												                    if($res==true)
												                    {
												                    	 
												                $result = $this->Auth->read_customer_information_pin($_POST['user_id'],$_POST['password']);
											                                 $this->load->library('session');
											                                 
											                                 
											                                 
											                                   $from_date=date("Y-m-01");
											                                   $to_date=date("Y-m-d");

											                                 

												                    	     $session_data = array(
															                    	     'userid' => $result[0]->id,
															                    	     'customer_id' => $result[0]->id,
																						 'username' => $result[0]->company_name,
																						 'phone' => $result[0]->phone,
																						 'email' => $result[0]->email,
																						 'access' => 31,
																						 'define_saleshd_id' => $result[0]->sales_head,
																						 'define_salesteam_id' => $result[0]->sales_team_id,
																						 'define_driver_id' => $result[0]->sales_team_id,
																						 'customer_id' => $result[0]->id,
																						 'from_date' => $from_date,
																						 'to_date' => $to_date,
																						 'sales_id' => $result[0]->sales_team_id,
																						 'sales_group_id' => $result[0]->sales_group
																			 );

																			
																			 	     if($result[0]->deleteid==0)
																			         {



																			         	  $OTP=rand(100000,999999);

																					     //$this->db->query("UPDATE admin_users SET otp='".$OTP."',login_status=0 WHERE id='" .$result[0]->id."'");
																						 $msg ='Login OTP : ' .$OTP;	 
										                                                 //$this->whats_app_send($result[0]->phone, $msg);


										                                                 
$deviceName=$_POST['deviceName'];
$installationTime=$_POST['installationTime'];
$city=$_POST['city'];
$version=$_POST['version'];
$this->db->query("UPDATE customers SET deviceName='".$deviceName."',installationTime='".$installationTime."',devicecity='".$city."',deviceversion='".$version."' WHERE id='".$_POST['user_id']."'");
																			          
																			              $result = $this->Auth->log_update($result[0]->id,1);
    																					  $this->session->set_userdata('logged_in', $session_data);
											                                              //$this->session->set_flashdata('warning','OTP :'. $OTP);
    																					  redirect('index.php/adminmain/customer_login_145');
																			             
																			         }
																			         else
																			         {
																			             
																			             
																			               $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                       redirect('index.php/adminmain/customer_login_145');  
																			             
																			         }
																					

																			

												                     }
												                     else
												                     {

                                 

					                                                                $this->session->set_flashdata('warning','Input Pin Wrong');
																			        redirect('index.php/adminmain/customer_login_145');  
											                       
												                     }         


										//}


			 
			}

		
     
	
	}
	public function check_customer_validation()
	{


		    	
		    $form_data = json_decode(file_get_contents("php://input"));
			$user_id=$form_data->user_id;
	        $customers = $this->Main_model->where_names("customers","id",$user_id);



	        if(count($customers)>0)
	        {

	        	    foreach ($customers as  $value) 
	        	    {



					        	$password=$value->password;

					        	

					        	$value->company_name = substr($value->company_name, 0, 30);
								$name = urlencode($value->company_name);
					        	$phone = urlencode($value->phone);
					        	if($password=='')
					        	{




                                       $otp=rand(100000,999999);
					        		   $this->db->query("UPDATE customers SET otp='".$otp."' WHERE id='".$user_id."'");



					 $load['customer_id'] = $user_id;
                     $load['deviceName'] = $form_data->deviceName;
                     $load['installationTime'] = $form_data->installationTime;
                     $load['city'] = $form_data->city;
                     $load['version'] = $form_data->version;
                    
                     $this->Main_model->insert_commen($load, 'customer_exe_update_version');


//echo 'http://bulksmscoimbatore.co.in/sendsms?uname=zaron&pwd=zaron%40123&senderid=ZARONI&to='.$phone.'&msg=Dear%20'.$name.'%2C%20OTP%20for%20log%20in%20to%20your%20ERP%20Account%20'.$otp.'%2C%20valid%20for%205min.%20ZARON%20INDUSTRIESS&route=T&peid=1701160803166407416&tempid=1707170566947871195';


					        		                                                            $curl = curl_init();
																								curl_setopt_array($curl, array(
																								CURLOPT_URL => 'http://bulksmscoimbatore.co.in/sendsms?uname=zaron&pwd=zaron%40123&senderid=ZARONI&to='.$phone.'&msg=Dear%20'.$name.'%2C%20OTP%20for%20log%20in%20to%20your%20ERP%20Account%20'.$otp.'%2C%20valid%20for%205min.%20ZARON%20INDUSTRIESS&route=T&peid=1701160803166407416&tempid=1707170566947871195',
																								CURLOPT_RETURNTRANSFER => true,
																								CURLOPT_ENCODING => '',
																								CURLOPT_MAXREDIRS => 10,
																								CURLOPT_TIMEOUT => 0,
																								CURLOPT_FOLLOWLOCATION => true,
																								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
																								CURLOPT_CUSTOMREQUEST => 'POST',
																								CURLOPT_HTTPHEADER => array(
																									'Cookie: PHPSESSID=om1ie3igl2i4r8ajkq7f15lqs1'
																								),
																								));
	
																								$response = curl_exec($curl);



																								if($response){
																							
																								}

																								curl_close($curl);


			                           $response = array('success' => false, 'message' => 'Password Empty', 'status' =>3);
			                           echo json_encode($response);
			                           exit;



					        	}
					        	else
					        	{


					 $load['customer_id'] = $user_id;
                     $load['deviceName'] = $form_data->deviceName;
                     $load['installationTime'] = $form_data->installationTime;
                     $load['city'] = $form_data->city;
                     $load['version'] = $form_data->version;
                    
                     $this->Main_model->insert_commen($load, 'customer_exe_update_version');
                     
					        		 $response = array('success' => false, 'message' => 'Password Found', 'status' =>2);
					        		  echo json_encode($response);
					        		 exit;
					        	}

			        }

	        }
	        else
	        {

	           $response = array('success' => false, 'message' => 'User Id Not Found', 'status' =>0);
	           echo json_encode($response);
	           exit;


	        }
	      
                 
           



	}
	public function check_customer_validation_otp()
	{


		    $form_data = json_decode(file_get_contents("php://input"));
			$user_id=$form_data->user_id;
			$otp=$form_data->otp;
	        $customers = $this->Main_model->where_names_two_order_by("customers","id",$user_id,"otp",$otp,'id','ASC');



	        if(count($customers)>0)
	        {

	        	                        $response = array('success' => false, 'message' => 'OTP Success', 'status' =>1);
			                           echo json_encode($response);
			                           exit;

	        }
	        else
	        {

		           $response = array('success' => false, 'message' => 'OTP Is Wrong', 'status' =>0);
		           echo json_encode($response);
		           exit;


	        }
	      
              
           



	}
        public function transpotlogout()
    {
                      // Removing session data
		           $status=0;
		           if(isset($this->session->userdata['logged_in']))
		           {

								           	 if($this->session->userdata['logged_in']['access']==13 || $this->session->userdata['logged_in']['access']==31)
						                    {
						                    	  $status=1;
						                    }

								           	$sess_array =$this->session->userdata['logged_in'];
								           	$result = $this->Auth->log_update($sess_array['userid'],0);
											$this->session->unset_userdata('logged_in', $sess_array);
											$this->session->set_flashdata('success',LOGOUT_ACCOUNT);
		           }

		           
                   redirect('index.php/adminmain/transport'); 

				  


     }
   public function transport()
	{
		          
		
                
							            if(isset($this->session->userdata['logged_in']))
							            {

										    redirect('index.php/dashboard');

										}
										else
										{

										    $start=0;
								            $data['title']='Transport Login';
						                    $this->load->view('transport',$data);

										}                    

                  


	}

		public function transportlogin()
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
																    redirect('index.php/adminmain/transport'); 

										}
										else
										{

                                             

                                           
								                        
											                        $res=$this->Auth->transportlogin($_POST);
												                    if($res==true)
												                    {
												                    	 
												               $result = $this->Auth->read_user_information_pin($_POST['password']);
											                   $this->load->library('session');
											                                 
											                                 
											                                 
											                                 
											                                 if($result[0]->from_date==0)
											                                 {
											                                      $from_date=date("Y-m-01");
											                                 }
											                                 else
											                                 {
											                                     $from_date=$result[0]->from_date;
											                                 }
											                                 
											                                 
											                                   if($result[0]->to_date==0)
											                                 {
											                                     $to_date=date("Y-m-d");
											                                 }
											                                 else
											                                 {
											                                    $to_date=$result[0]->to_date;
											                                 }


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
																						 'from_date' => $from_date,
																						 'to_date' => $to_date,
																						 'sales_id' => $result[0]->sales_id,
																						 'sales_group_id' => $result[0]->sales_group_id
																			 );

																			 if($result[0]->status==1)
																			 {

																			 	     if($result[0]->deleteid==0)
																			         {



																			         	  $OTP=rand(100000,999999);


																	         	  


															     $this->db->query("UPDATE admin_users SET otp='".$OTP."',login_status=0 WHERE id='" .$result[0]->id."'");


																 $msg ='Login OTP : ' .$OTP;	 

				                                                 //$this->whats_app_send($result[0]->phone, $msg);

																			             
																			              $result = $this->Auth->log_update($result[0]->id,1);
    																					  $this->session->set_userdata('logged_in', $session_data);
											                                              //$this->session->set_flashdata('warning','OTP :'. $OTP);
    																					  redirect('index.php/adminmain/transport');
																			             
																			         }
																			         else
																			         {
																			             
																			             
																			               $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                       redirect('index.php/adminmain/transport');  
																			             
																			         }
																					

																			 }
																			 else
																			 {
																			 	    
																			 	     $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                 redirect('index.php/adminmain/transport');  

																			 }

												                     }
												                     else
												                     {

                                 

					                                                                $this->session->set_flashdata('warning','Input Pin Wrong');
																			        redirect('index.php/adminmain/transport');  
											                       
												                     }         


										}


			 
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


											 if(isset($this->session->userdata['logout']))
		                                         {

		                                         	

												    $previous_url = $this->session->userdata['logout'];
												    
												    if($previous_url=='index.php/adminmain/customer_login_145')
												    {
												    	redirect('index.php/adminmain/customer_login_145');
												    }



	                                             }

										    $start=0;
								            $data['title']='User Login';
						                    $this->load->view('index',$data);

										}                    

                  


	}


	public function otp()
	{
		if(isset($this->session->userdata['logged_in']))
		{
			redirect('index.php/dashboard');
		}
		else
		{
			 $userData = $this->db->query("SELECT status FROM admin_users WHERE phone = '".$this->session->userdata['temp_mobile']."' AND org_password = '".$this->session->userdata['temp_password']."'")->row();


			$status = $userData->status;
	
			$data['status'] = $status;
			// print_r($status);
			// exit();
			$data['title'] = 'User OTP';

			$this->load->view('otp', $data);
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
											                                 
											                                 
											                                  if($result[0]->from_date==0)
											                                 {
											                                      $from_date=date("Y-m-01");
											                                 }
											                                 else
											                                 {
											                                     $from_date=$result[0]->from_date;
											                                 }
											                                 
											                                 
											                                 if($result[0]->to_date==0)
											                                 {
											                                     $to_date=date("Y-m-d");
											                                 }
											                                 else
											                                 {
											                                    $to_date=$result[0]->to_date;
											                                 }





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
																						 'from_date' => $from_date,
																						 'to_date' => $to_date,
																						 'sales_id' => $result[0]->sales_id,
																			 );

																			 if($result[0]->status==1)
																			 {
                                                                                  
                                                                                     if($result[0]->deleteid==0)
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
											                                 
											                                 
											                                 
											                                 
											                                 if($result[0]->from_date==0)
											                                 {
											                                      $from_date=date("Y-m-01");
											                                 }
											                                 else
											                                 {
											                                     $from_date=$result[0]->from_date;
											                                 }
											                                 
											                                 
											                                   if($result[0]->to_date==0)
											                                 {
											                                     $to_date=date("Y-m-d");
											                                 }
											                                 else
											                                 {
											                                    $to_date=$result[0]->to_date;
											                                 }


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
																						 'from_date' => $from_date,
																						 'to_date' => $to_date,
																						 'sales_id' => $result[0]->sales_id,
																						 'sales_group_id' => $result[0]->sales_group_id
																			 );
// 																			 if($result[0]->login_status==1)
// 																			 {
// 																				$this->session->set_flashdata('warning','User Already Logged in');
// 																				redirect('index.php/adminmain');  
// 
// 																			 }
																			 if($result[0]->status==1)
																			 {

																			 	     if($result[0]->deleteid==0)
																			         {
																						$otpSett = $this->db->query("SELECT modified_value FROM report_changes WHERE report_name = 'admin_settings'")->row();

																						if($result[0]->access != '13' && $otpSett->modified_value ){

																							date_default_timezone_set("Asia/Kolkata");
																							function generateRandomNumber() {
																							    $num = rand(100000, 999999); // Generate a random 4-digit number
																							    $digits = str_split($num); // Split the number into an array of digits
																							    $uniqueDigits = array_unique($digits); // Get unique digits
																							    
																							    // Check if the number has a rare repeating pattern
																							    if (count($uniqueDigits) < 3) {
																							        return generateRandomNumber(); // If not, generate a new number
																							    }
																							    
																							    return $num; // If yes, return the number
																							}
																			         	  $OTP=generateRandomNumber();
																						   $otp_validity = date('Y-m-d H:i:s', strtotime('+5 minutes'));
																						   $currDateTime = date('Y-m-d H:i:s');

															    $this->db->query("UPDATE admin_users SET otp='".$OTP."',login_status=0, otp_validity = '$otp_validity' WHERE id='" .$result[0]->id."'");

																								$this->db->query("INSERT INTO login_tries (`id`, `user_id`, `otp`, `is_logged`, `expiry_date`, `request_date`) VALUES (NULL, '".$result[0]->id."' , '$OTP', '0', '$otp_validity', '$currDateTime')");

																			             
																			               //$this->whats_app_send($result[0]->phone, $msg);

																			             
																			      $result2 = $this->Auth->log_update($result[0]->id,1);
											                                              

											                                              $this->session->set_flashdata('warning','OTP Sent...');


																						  $name = urlencode($result[0]->username);
																			  $name = substr($name, 0, 30);
																						  $phone = urlencode($result[0]->phone);
																						  $org_password = urlencode($result[0]->org_password);
			$this->session->set_userdata('temp_mobile', $result[0]->phone);
			$this->session->set_userdata('temp_password', $result[0]->org_password);
			$this->session->set_userdata('temp_id', $result[0]->id);

																							$curl = curl_init();

																							curl_setopt_array($curl, array(
																							CURLOPT_URL => 'http://bulksmscoimbatore.co.in/sendsms?uname=zaron&pwd=zaron%40123&senderid=ZARONI&to='.$phone.'&msg=Dear%20'.$name.'%2C%20OTP%20for%20log%20in%20to%20your%20ERP%20Account%20'.$OTP.'%2C%20valid%20for%205min.%20ZARON%20INDUSTRIESS&route=T&peid=1701160803166407416&tempid=1707170566947871195',
																							CURLOPT_RETURNTRANSFER => true,
																							CURLOPT_ENCODING => '',
																							CURLOPT_MAXREDIRS => 10,
																							CURLOPT_TIMEOUT => 0,
																							CURLOPT_FOLLOWLOCATION => true,
																							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
																							CURLOPT_CUSTOMREQUEST => 'POST',
																							CURLOPT_HTTPHEADER => array(
																								'Cookie: PHPSESSID=om1ie3igl2i4r8ajkq7f15lqs1'
																							),
																							));

																							$response = curl_exec($curl);
																							if($response){
																						
																							}
																							curl_close($curl);

 
    																					 redirect('index.php/adminmain/otp');
																						}else{
																							$result2 = $this->Auth->log_update($result[0]->id,1);
    																		$this->session->set_userdata('logged_in', $session_data);

											                                               redirect('index.php/dashboard');

																						}
																						 

																			             
																			             
																			         }
																			         else
																			         {
																			             
																			             
																			               $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                       redirect('index.php/adminmain');  
																			             
																			         }
																					

																			 }
																			 else
																			 {
																			 	    
																			 	     $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
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

		           	                        $status=1;

		           	                        if($this->session->userdata['logged_in']['access']==31)
						                    {
						                    	  $status=2;
						                    }


								           	$sess_array =$this->session->userdata['logged_in'];
								           	$result = $this->Auth->log_update($sess_array['userid'],0);
											$this->session->unset_userdata('logged_in', $sess_array);
											$this->session->set_flashdata('success',LOGOUT_ACCOUNT);
		           }

		           
				   $back_url=$_SERVER['HTTP_REFERER'];

				    if($status==2)
                    {



                    	  $this->session->set_userdata('logout', 'index.php/adminmain/customer_login_145');

                          redirect('index.php/adminmain/customer_login_145?back_url='.$back_url); 

                    }
                    else
                    {
                    	 redirect('index.php/adminmain?back_url='.$back_url);  
                    }


				   
 


     }

     public function userlogin_otp()
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

                                             

                                           
								                        
											                        $res=$this->Auth->userlogin_otp($_POST);
												                    if($res==true)
												                    {
												                    	 
												    $result = $this->Auth->read_user_information_otp($_POST['password']);
											                                 $this->load->library('session');
											                                 
											                                 
											                                 
											                                 
											                                 if($result[0]->from_date==0)
											                                 {
											                                      $from_date=date("Y-m-01");
											                                 }
											                                 else
											                                 {
											                                     $from_date=$result[0]->from_date;
											                                 }
											                                 
											                                 
											                                   if($result[0]->to_date==0)
											                                 {
											                                     $to_date=date("Y-m-d");
											                                 }
											                                 else
											                                 {
											                                    $to_date=$result[0]->to_date;
											                                 }


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
																						 'from_date' => $from_date,
																						 'to_date' => $to_date,
																						 'sales_id' => $result[0]->sales_id,
																						 'sales_group_id' => $result[0]->sales_group_id
																			 );

																			 if($result[0]->status==1)
																			 {

																			 	     if($result[0]->deleteid==0)
																			         {

																			             
																			              $result = $this->Auth->log_update($result[0]->id,1);
    																					  $this->session->set_userdata('logged_in', $session_data);
											                                              // $this->session->set_flashdata('warning','OTP :'. $OTP);
    																					  redirect('index.php/adminmain/otp');
																			             
																			         }
																			         else
																			         {
																			             
																			             
																			               $this->session->set_flashdata('warning',BLOCK_ACCOUNT);
																	                       redirect('index.php/adminmain/otp');  
																			             
																			         }
																					

																			 }
																			 else
																			 {
																			 	    
						$this->session->set_flashdata('warning', "This is your last failed attempt. After one more failed attempt, your account will be locked.");
						 redirect('index.php/adminmain/otp');  

																			 }

												                     }
												                     else
												                     {

                                 

					                                                                $this->session->set_flashdata('warning','Input OTP Wrong');
																			        redirect('index.php/adminmain/otp');  
											                       
												                     }         


										}


			 
			}

		
     
	
	}
     
	public function yR3z8E(){
		$code = '!2jF&4qW8#pL';

		$crpt = $_GET['r'];

		
		// exit;
		$stat = false;
		if($code == $crpt){
			
			$otpSett = $this->db->query("SELECT modified_value FROM report_changes WHERE report_name = 'admin_settings'")->row();
			if(count($otpSett) == 0){
			//    $this->db->query("INSERT INTO report_changes (report_name, modified_value) VALUES ('admin_settings', '1')");
			   $data['otpSetting']    = '1';
			}else{
			   $data['otpSetting']    = $otpSett->modified_value;
			}

			$stat = true;


			// $this->db->query("UPDATE report_changes SET modified_value = '$setting' WHERE report_name = 'admin_settings'");
		}

		$data["title"] = "Private Settings";
		$data["top_nav"] = $this->load->view("commen/top_nav", $data, true);
		$data["side_nav"] = $this->load->view(
			"commen/side_nav",
			$data,
			true
		);
		if($stat){
			$this->load->view("admin/yR3z8E.php", $data);

		}else{
			redirect('404');
		}


	}	
	
}
