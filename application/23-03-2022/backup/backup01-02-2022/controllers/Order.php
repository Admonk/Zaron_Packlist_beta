<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct() {


             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Users_model');
             if(isset($this->session->userdata['logged_in'])){
	           $sess_array =$this->session->userdata['logged_in'];
			   $userid=$sess_array['userid'];
			   $email=$sess_array['email'];
			   $sales_id=$sess_array['sales_id'];
			   
			   $define_saleshd_id=$sess_array['define_saleshd_id'];
			   $define_salesteam_id=$sess_array['define_salesteam_id'];
			   $define_driver_id=$sess_array['define_driver_id'];
			   $customer_id=$sess_array['customer_id'];
			   
			   $username=$sess_array['username'];
			   $this->userid=$userid;
			   $this->username=$username;
			   $this->user_mail=$email;
			   $this->sales_id=$sales_id;
			   
			    $this->define_saleshd_id=$define_saleshd_id;
			    $this->define_salesteam_id=$define_salesteam_id;
			    $this->define_driver_id=$define_driver_id;
			    $this->customer_id=$customer_id;
			   
			   profile($this->user_mail);
			}


      
    }
	public function ordercreate()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Customer Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/ordercreate',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function enquiries_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Enquiry List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/enquiries_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
		public function enquiries_price_request_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Enquiry List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/enquiries_price_request_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	public function quotation_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_quotation');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/quotation_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
		public function quotation_price_request_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_quotation');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/quotation_price_request_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	public function orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Order List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/orders_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function orders_list_purchase()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Purchase Verification';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/orders_list_purchase',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function orders_list_md()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'MD Price Verification';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/orders_list_md',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function orders_list_sales_head()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Sales Verification';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/sales_head_order_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function finance_orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Finance Verification';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/finance_order_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function production_orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production_orders_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function production_panel_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production_panel_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function production_quality_check_panel_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production_quality_check_panel_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function warehouse_panel_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/warehouse_panel_list_by_order',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function production_panel()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	  $data['neworder_id']=base64_encode($neworder_id);
							            	  $data['id']= base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production_panel',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function production_panel_quality_check()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	  $data['neworder_id']=base64_encode($neworder_id);
							            	  $data['id']= base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production_panel_quality_check',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
		public function warehouse_check()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 	 $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
							            
							            	  $data['neworder_id']=base64_encode($neworder_id);
							            	  $data['id']= base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Production Order';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/warehouse_panel_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
		public function transport_orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Transport List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/transport_orders_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function reconciliation_orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Transport List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/reconciliation_orders_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function driver_orders_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Driver Panel';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/driver_orders_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
			public function driver_orders_list_view()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 
							            	 $neworder_id=1;  
							            	 $order_last_count = $this->Main_model->order_last_count('orders_process');
							            	 foreach($order_last_count as $r)
							            	 {
							            	     $neworder_id=$r->id+1;
							            	 }
							            	 
							            	 
							            	 $data['neworder_id']=base64_encode($neworder_id);
							            	 
							            	 
							            	 $data['id']= $_GET['id'];
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Driver Panel View';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/driver_orders_list_view',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
	
			public function production()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            
							            	$data['production'] = $this->Main_model->where_names_order_by('production','deleteid','0','id','ASC');
							            	 
							            	
							            	
							            	 $data['purchase_order'] = $this->Main_model->where_names('purchase_order','inward_qty!=','');
							            	 
							            
							            	
							            	 
							            	 $data['id']= base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Driver Panel View';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/production',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function ordercreate_product()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
							            	 
							            	 
							            	
							            	 
                                             $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','2','deleteid','0','id','ASC');
                                           
                                           
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $data['old_tablename']='0'; 
										     $data['old_tablename_sub']='0'; 
										     $data['tablename']='orders';
										     $data['tablename_sub']='order_product_list';
										     
										     
										     $data['movetablename']='orders_quotation';
										     $data['movetablename_sub']='order_product_list_quotation';
										     
										     
										     $data['order_title']='Enquiry NO';
										     $data['order_lable']='Enquiry Create';
										     
										     $data['missed']='Enquiry';
							            	 
							            	 $data['move']='Quotation';
							            	 
							            	 $data['status_base']=0;
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 
							            	 
							            	 
							            	 
							            	 
							            	  $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
							            	 
							            	  
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Enquiry Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
		public function ordercreate_product_price_request()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $data['old_tablename']='0'; 
										     $data['old_tablename_sub']='0'; 
										     $data['tablename']='orders';
										     $data['tablename_sub']='order_product_list';
										     
										     
										     $data['movetablename']='orders_quotation';
										     $data['movetablename_sub']='order_product_list_quotation';
										     
										     
										     $data['order_title']='Enquiry NO';
										     $data['order_lable']='Enquiry Create';
										     
										     $data['missed']='Enquiry';
							            	 
							            	 $data['move']='Quotation';
							            	 
							            	 $data['status_base']=11;
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 
							            	 
							            	 
							            	 
							            	 
							            	  $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
							            	 
							            	  
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Enquiry Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	public function overview()
	{
	    
	    
	      if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
							            	 
							            	 $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content','deleteid','0','id','ASC');
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	
							            	 
							            	 
							            	 $data['old_tablename']=$_GET['old_tablename']; 
										     $data['old_tablename_sub']=$_GET['old_tablename_sub']; 
										     $data['tablename']=$_GET['tablename']; 
										     $data['tablename_sub']=$_GET['tablename_sub']; 
										     $data['movetablename']=$_GET['movetablename']; 
										     $data['movetablename_sub']=$_GET['movetablename_sub']; 
										     
										     
										     
										     
										     
							            	 
							            	 $data['order_title']='Quotation NO';
							            	 $data['order_lable']='Quotation Create';
							            	 
							            	  $data['missed']='Quotation';
							            	 
							            	 $data['move']='Order ';
							            	 $data['status_base']=10;
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order','order_id',$data['order_id'],'id','ASC');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation '.$data['order_no'];
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/overview',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
        
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function po()
	{
	    
	    
	      if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
							            	 
							            	 $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content','deleteid','0','id','ASC');
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	
							            	 
							            	 
							            	 $data['old_tablename']=$_GET['old_tablename']; 
										     $data['old_tablename_sub']=$_GET['old_tablename_sub']; 
										     $data['tablename']=$_GET['tablename']; 
										     $data['tablename_sub']=$_GET['tablename_sub']; 
										     $data['movetablename']=$_GET['movetablename']; 
										     $data['movetablename_sub']=$_GET['movetablename_sub']; 
										     
										     
										     
										     
										     
							            	 
							            	 $data['order_title']='Quotation NO';
							            	 $data['order_lable']='Quotation Create';
							            	 
							            	  $data['missed']='Quotation';
							            	 
							            	 $data['move']='Order ';
							            	 $data['status_base']=10;
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order','order_id',$data['order_id'],'id','ASC');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation '.$data['order_no'];
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/po',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
        
	
	
	}
	
	
	
	
	
	
	public function overview_commission()
	{
	    
	    
	      if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
							            	 
							            	 $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content','deleteid','0','id','ASC');
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	
							            	 
							            	 
							            	 $data['old_tablename']=$_GET['old_tablename']; 
										     $data['old_tablename_sub']=$_GET['old_tablename_sub']; 
										     $data['tablename']=$_GET['tablename']; 
										     $data['tablename_sub']=$_GET['tablename_sub']; 
										     $data['movetablename']=$_GET['movetablename']; 
										     $data['movetablename_sub']=$_GET['movetablename_sub']; 
										     
										     
										     
										     
										     
							            	 
							            	 $data['order_title']='Quotation NO';
							            	 $data['order_lable']='Quotation Create';
							            	 
							            	  $data['missed']='Quotation';
							            	 
							            	 $data['move']='Order ';
							            	 $data['status_base']=10;
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order','order_id',$data['order_id'],'id','ASC');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation '.$data['order_no'];
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/overview_commission',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
        
	
	
	}

	
		public function ordercreate_product_quotation()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
							            	  $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','2','deleteid','0','id','ASC');
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	
							            	 
							            	 
							            	 $data['old_tablename']='orders'; 
										     $data['old_tablename_sub']='order_product_list'; 
										     $data['tablename']='orders_quotation';
										     $data['tablename_sub']='order_product_list_quotation';
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
							            	 
							            	 $data['order_title']='Quotation NO';
							            	 $data['order_lable']='Quotation Create';
							            	 
							            	  $data['missed']='Quotation';
							            	 
							            	 $data['move']='Order ';
							            	 $data['status_base']=10;
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function ordercreate_product_quotation_price_request()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	
							            	 
							            	 
							            	 $data['old_tablename']='orders'; 
										     $data['old_tablename_sub']='order_product_list'; 
										     $data['tablename']='orders_quotation';
										     $data['tablename_sub']='order_product_list_quotation';
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
							            	 
							            	 $data['order_title']='Quotation NO';
							            	 $data['order_lable']='Quotation Create';
							            	 
							            	  $data['missed']='Quotation';
							            	 
							            	 $data['move']='Order ';
							            	 $data['status_base']=12;
							            	 
							            	 
							            	 $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Quotation Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
		public function ordercreate_product_process()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							                 
							                 
							                  $data['additional_information'] =$this->Main_model->where_names_two_order_by('additional_information','grouping','2','deleteid','0','id','ASC');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										      $data['missed']='Order';
										      
										      $data['move']='TL  Approval Request ';
										      $data['status_base']=1;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function ordercreate_product_process_tl_verification()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										      $data['missed']='Order';
										      $data['move']='Finacle Verification ';
										      $data['status_base']=3;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     
										     
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
			public function ordercreate_product_process_purchase_verification()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										      $data['missed']='Order';
										      $data['move']='Finacle Verification ';
										      $data['status_base']=4;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     
										     
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
			public function ordercreate_product_process_md_verification()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										      $data['missed']='Order';
										      $data['move']='Finacle Verification ';
										      $data['status_base']=5;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     
										     
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function ordercreate_product_process_finance_verification()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										      $data['missed']='Order';
										      
										      $data['move']='Finacle Verification ';
										      $data['status_base']=6;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     
										     
										     
										     
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
		public function ordercreate_product_process_transport_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                 $data['locality'] = $this->Main_model->where_names('locality','deleteid','0');
							            	 
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
							            	 $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access','12','deleteid','0','id','ASC');
							            	 $data['enable_order']=$_GET['order_id'];
							            	 $neworder_id=base64_decode($_GET['order_id']);
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
										     
										     
										      $data['order_title']='Order NO';
										      $data['order_lable']='Order Create';
										       $data['missed']='Order';
										      
										      $data['move']='Transport Setup ';
										      $data['status_base']=5;
										     
										     
										     $data['old_tablename']='orders_quotation'; 
										     $data['old_tablename_sub']='order_product_list_quotation'; 
										     $data['tablename']='orders_process';
										     $data['tablename_sub']='order_product_list_process';
										     
										     
										     
										     $data['movetablename']='orders_process';
										     $data['movetablename_sub']='order_product_list_process';
										     
										     
										     
										     
										     
										     $resorder=$this->Main_model->where_names($data['tablename'],'id',$neworder_id);
							            	 if(count($resorder)>0)
							            	 {
							            	     foreach($resorder as $data_val)
    							            	 {
    							            	       
    							            	       $order_no=$data_val->order_no;
    							            	       $data['order_id']=$neworder_id;
							            	           $data['order_no']=$order_no;
							            	 
    							            	     
    							            	 }
							            	     
							            	 }
							            	 else
							            	 {
							            	     
							            	      $data['order_id']=$neworder_id;
							            	      $data['order_no']=$this->sales_id.'/'.$neworder_id.'/'.date('Y');
							            	 
							            	     
							            	 }
										     
										     
										     
										     
										     
										     
										     $data['iron'] = $this->Main_model->where_names_order_by('product_list','categories_id','3','product_name','ASC');
								             $data['title']    = 'Order Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('order/order_product',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	public function discountupdate()
	{         
                                                	            
	                                                         $form_data = json_decode(file_get_contents("php://input"));
                                                             $datass['get_id']=$form_data->order_id;
                                                             $datass['discount']=$form_data->discount;
                                                             $tablename=$form_data->tablenamemain;
                                                             $this->Main_model->update_commen($datass,$tablename);
	         
	         
	    
	}
	
	

	
	
		public function saveRemarks()
	{         
            
                   $form_data = json_decode(file_get_contents("php://input"));
                   $fieldset=$form_data->fieldset;
                   $datass['get_id']=$form_data->order_product_id;
	               $datass[$fieldset]=$form_data->fieldsetval; 
	               $tablenamemain=$form_data->tablename_sub;  
	               $this->Main_model->update_commen($datass,$tablenamemain);
            
            
	}
	
	
	
		public function savereason()
	{         
                                                	            
	                                                         $form_data = json_decode(file_get_contents("php://input"));
	                                                         
	                                                         
	                                                         
	                                                        
	                                                         
                                                             $datass['get_id']=$form_data->order_id;
                                                             $order_no=$form_data->order_no;
                                                             $old_tablename=$form_data->old_tablename;
                                                             $datass['reason']=$form_data->reason;
                                                             
                                                             if($form_data->reason==-2)
                                                             {
                                                                 
                                                                 $datass['order_base']=-2;
                                                              
                                                                 
                                                                 $datass_old['get_id']=$form_data->order_no;
                                                                 $datass_old['order_base']=-2;
                                                                 $datass_old['reason']=$form_data->reason;
                                                                 
                                                                 $this->Main_model->update_commen_where($datass_old,'order_no',$old_tablename);
                                                                 
                                                                 
                                                             }
                                                             else
                                                             {
                                                                 $datass['order_base']=-1;
                                                             }
                                                             
                                                             
                                                             
                                                           
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             $tablename=$form_data->tablenamemain;
                                                             $movetablename=$form_data->movetablename;
                                                             
                                                             
                                                             $order_qt = $this->Main_model->where_names($movetablename,'order_no',$order_no);
                                                            
                                                             if(count($order_qt)>0)
                                                             {
                                                                 
                                                                 
                                                                             $datass_val['get_id']=$order_no;
                                                                             
                                                                             if($movetablename!='orders_process')
                                                                             {
                                                                                 
                                                                                 
                                                                                   $datass_val['deleteid']=1;
                                                                                   $this->Main_model->update_commen_where($datass_val,'order_no',$movetablename);
                                                                 
                                                                                 
                                                                             }
                                                                             
                                                                            
                                                             }
							            	 
                                                             
                                                             $this->Main_model->update_commen($datass,$tablename);
	         
	         
	    
	}
	
	
	
	public function customerupdate()
	{         
                                                	             date_default_timezone_set("Asia/Kolkata"); 
                                                                 $date= date('Y-m-d');
                                                                 $time= date('h:i A');
                                                                
                                                                  
                                                	             $form_data = json_decode(file_get_contents("php://input"));
                                                	             
                                                	         
                                                	             $tablename=$form_data->tablenamemain;
                                                	             $basedata['id']=$form_data->order_id;
                                                                 $basedata['order_no']=$form_data->order_no;
                                                                 $basedata['create_date']=$date;
                                                                 $basedata['create_time']=$time;
                                                                 $basedata['user_id']=$this->userid;
                                                                
                                                                 $result_ordercount= $this->Main_model->where_names($tablename,'id',$form_data->order_id);
                                                                 if(count($result_ordercount)==0)
                                                                 {
                                                                    $this->Main_model->insert_commen($basedata,$tablename);
                                                                 }
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	        
                                                	         $customer=$form_data->customer;
                                                	         $customer=explode('/', $customer);
                                                	         $customer_id=0;
                                                	         $result= $this->Main_model->where_names('customers','phone',$customer[1]);
                                                             foreach ($result as  $form_data_val) {
                                                                     
                                                                   $customer_id= $form_data_val->id;
                                                                   $locality= $form_data_val->locality;
                                                                     
                                                              }
                                                              
                                                              $route_id=0;
                			                                  $routeset= $this->Main_model->where_names('locality','id',$locality);
                        				                      foreach($routeset as $routesetval)
                        				                      {
                        				                                 $route_id=$routesetval->route_id;
                        				                      }
                                             
                    	       
	         
                                                             $datass['get_id']=$form_data->order_id;
                                                             $datass['customer_id']=$customer_id;
                                                             $datass['route_id']=$route_id;
                                                             $this->Main_model->update_commen($datass,$tablename);
	         
	         
	    
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function salesteam()
	{         
                                                	             date_default_timezone_set("Asia/Kolkata"); 
                                                                 $date= date('Y-m-d');
                                                                 $time= date('h:i A');
                                                                
                                                                  
                                                	             $form_data = json_decode(file_get_contents("php://input"));
                                                	             $tablename=$form_data->tablenamemain;
                                                	             $basedata['id']=$form_data->order_id;
                                                                 $basedata['order_no']=$form_data->order_no;
                                                                 $basedata['user_id']=$this->userid;
                                                                 $basedata['create_date']=$date;
                                                                 $basedata['create_time']=$time;
                                                                
                                                                 $result_ordercount= $this->Main_model->where_names($tablename,'id',$form_data->order_id);
                                                                 if(count($result_ordercount)==0)
                                                                 {
                                                                    $this->Main_model->insert_commen($basedata,$tablename);
                                                                 }
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	         
                                                	        
                                                	         $user_id=$form_data->user_id;
                                                	         
                                                	         $customer_id=0;
                                                	         $sales_id=0;
                                                	         $result= $this->Main_model->where_names('admin_users','id',$user_id);
                                                             foreach ($result as  $form_data_val) {
                                                                     
                                                                    $customer_id= $form_data_val->id;
                                                                    $sales_id= $form_data_val->sales_id;
                                                                     
                                                              }
                    	        
	         
                                                             $datass['get_id']=$form_data->order_id;
                                                             $datass['user_id']=$customer_id;
                                                             $datass['order_no']=$sales_id.'/'.$form_data->order_id.'/'.date('Y');

                                                            

                                                             $this->Main_model->update_commen($datass,$tablename);
	         
	         
	    
	}
	
	
	
	
	
	
	public function insertandupdate()
	{
                 date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');
                 $form_data = json_decode(file_get_contents("php://input"));
                 
             
              
            

                $tablename=$form_data->tablename_sub;
                $tablenamemain=$form_data->tablenamemain;


       
                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->profile!='')
                     {


           

    			                     $checkboxformula=$form_data->checkboxformula;
    			                     $profile=$form_data->profile;
                                     $profile=explode('/', $profile);
                                     
                                     
                                     
                                     
                                     
                                  

                                        $data['product_id']=0;
                                        $data['product_name']=0;
                                        
                                        
                                     
                                        if(isset($profile[0]))
                                        {


                                             $result= $this->Main_model->where_names('product_list','product_name',$profile[0]);
                                             foreach ($result as  $form_data_val) {


                                               $data['product_name']=$form_data_val->product_name;
                                               $data['product_id']=$form_data_val->id;
                                               $data['categories_id']=$form_data_val->categories_id;
                                               $data['categories_name']=$form_data_val->categories;
                                               
                                               $uom=$form_data_val->uom;
                                               $formula=$form_data_val->formula;
                                               
                                               
                                               if($form_data_val->categories_id==32)
                                               {
                                                   $data['rate']=$form_data_val->price+$form_data_val->kg_price;
                                               }
                                               else
                                               {
                                                   $data['rate']=$form_data_val->price;
                                               }
                                               
                                               
                                               
                                               
                                               
                                               $data['sort_id']=$form_data_val->id;
                                               $categories=$form_data_val->categories;
                                               $type=$form_data_val->type;
                                               

                                            }

                                        } 

                                    
                                     
                                     
                                     if($categories=='Accesories')
                                    {
                                            
                                            
                                            if($type==2)
                                            {
                                                
                                               
                                                
                                                         $data['profile']=0;
                                                        if(isset($profile[1]))
                                                        {
                                                             $data['profile']=$profile[1];
                                                        }
                    
                                                        $data['crimp']=0;
                                                        if(isset($profile[2]))
                                                        {
                                                             $data['crimp']=$profile[2];
                                                        }
                    
                                                        $data['nos']=0;
                                                        if(isset($profile[3]))
                                                        {
                                                             $data['nos']=$profile[3];
                                                        }
                    
                                                        $data['unit']=0;
                                                        if(isset($profile[4]))
                                                        {
                                                             $data['unit']=$profile[4];
                                                        }
                                                
                                            }
                                            else
                                            {
                                                
                                                
                                                                $data['profile']=0;
                                                                if(isset($profile[1]))
                                                                {
                                                                     $data['profile']=$profile[1];
                                                                }
                            
                                                                $data['nos']=0;
                                                                if(isset($profile[2]))
                                                                {
                                                                     $data['nos']=$profile[2];
                                                                }
                           
                                                
                                                                $data['crimp']=0;
                                                                if(isset($profile[3]))
                                                                {
                                                                     $data['crimp']=0;
                                                                }
                            
                                                                $data['unit']=0;
                                                                if(isset($profile[4]))
                                                                {
                                                                     $data['unit']=$profile[4];
                                                                }
                                                                
                                                
                                                
                                            }
                                        
                                           
                                            
                                            
                                            
                                        
                                    }
                                    elseif($categories=='Aluminium' || $categories=='Purlin' || $categories=='Tile sheet' || $categories=='Profile ridge & Arch' || $categories=='Decking sheet')
                                    {
                                        
                                        
                                        
                                            $data['crimp']=0;
                                            $data['unit']=0;
                                            
                                            $data['profile']=0;
                                            if(isset($profile[1]))
                                            {
                                                 $data['profile']=$profile[1];
                                            } 
                                             
                                            $data['nos']=0;
                                            if(isset($profile[2]))
                                            {
                                                 $data['nos']=$profile[2];
                                            }
        
                                           
                                        
                                        
                                    }
                                    else
                                    {
                                         
                                        
                                            $data['profile']=0;
                                            if(isset($profile[1]))
                                            {
                                                 $data['profile']=$profile[1];
                                            }
        
                                            $data['crimp']=0;
                                            if(isset($profile[2]))
                                            {
                                                 $data['crimp']=$profile[2];
                                            }
        
                                            $data['nos']=0;
                                            if(isset($profile[3]))
                                            {
                                                 $data['nos']=$profile[3];
                                            }
        
                                            $data['unit']=0;
                                            if(isset($profile[4]))
                                            {
                                                 $data['unit']=$profile[4];
                                            }
                                            
                                        
                                    }
                                   
                                    
                                   
                                    $basedata['id']=$form_data->order_id;
                                    $basedata['order_no']=$form_data->order_no;
                                    $basedata['create_date']=$date;
                                    $basedata['create_time']=$time;
                                    $basedata['user_id']=$this->userid;
                                    
                                    $result_ordercount= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
                                    if(count($result_ordercount)==0)
                                    {
                                        $this->Main_model->insert_commen($basedata,$tablenamemain);
                                    }
                                    
                                    

                                                              $data['fact']=$formula;
                                                              
                                                              
                                                              
                                                              
                                                              
                                       
                                       
                                       
                                       
                                       
                                       
                                                              if($categories=='Accesories')
                                                              { 
                                                                  
                                                                  
                                                                     if($type==1)
                                                                     {
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $profile= round($data['profile']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $profile= round($data['profile']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                   $profile= $data['profile'];
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $profile= round($data['profile']/39.37,3);
                                                                              }
                                                                         
                                                                         
                                                                         $qty=$profile*$data['nos'];
                                                                         $data['Meter_to_Sqr_feet']=$qty;
                                                                         $data['Sqr_feet_to_Meter']=$qty;
                                                                         $data['qty']=round($qty,3);
                                                                         $data['amount']=round($data['rate']*$qty,3);
                                                                     }
                                                                     
                                                                     
                                                                     if($type==2)
                                                                     {
                                                                         
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $let= round($data['crimp']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $let= round($data['crimp']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                   $let= $data['crimp'];
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $let= round($data['crimp']/39.37,3);
                                                                              }
                                                                       
                                                                       
                                                                         
                                                                         $qty=$data['profile']*$let*$data['nos'];
                                                                         $data['Meter_to_Sqr_feet']=$qty;
                                                                         $data['Sqr_feet_to_Meter']=$qty;
                                                                         $data['qty']=round($qty,3);
                                                                         $data['amount']=round($data['rate']*$qty,3);
                                                                         
                                                                     }
                                                                     
                                                                     if($type==3)
                                                                     {
                                                                         $qty=$data['nos'];
                                                                         $data['Meter_to_Sqr_feet']=$qty;
                                                                         $data['Sqr_feet_to_Meter']=$qty;
                                                                         $data['qty']=round($qty,3);
                                                                         $data['amount']=round($data['rate']*$qty,3);
                                                                     }
                                                                     
                                                                     
                                                                     
                                                                     
                                                                     if($type==0)
                                                                     {
                                                                              $subqty=$data['profile']+$data['crimp'];
                                                                          
                                                                          
                                                                          
                                                                          
                                                              
                                                              
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                   $data['Meter_to_Sqr_feet']= $subqty;
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/39.37,3);
                                                                              }
                                                       
                                                                          
                                                                          $sqft= round($subqty,3);
                                                                          $mtr=$sqft*$data['fact']; // 1.09 fact
                                                                          $data['Sqr_feet_to_Meter']=round($mtr*$data['nos'],3);
                                                                          $sqt=$data['Meter_to_Sqr_feet']; 
                                                                          $data['qty']=round($sqt*$data['nos']*$data['fact'],3);
                                                                          $data['amount']=round($data['rate']*$data['qty'],3);
                                                                          
                                                                     }
                                                                  
                                                                  
                                                                        
                                                                  
                                                              }
                                                              else
                                                              {
                                                                  
                                                                     
                                                                     if($type==4)
                                                                     {  
                                                                         
                                                                         
                                                                         
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $profile=round($data['profile']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                 
                                                                                    $profile=round($data['profile']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                    $profile=$data['profile'];
                                                                                  
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                   $profile=round($data['profile']/39.37,3);
                                                                                  
                                                                              }
                                                       
                                                                         
                                                                         
                                                                         $qty=$profile*$data['nos']*$data['fact'];
                                                                         $data['Meter_to_Sqr_feet']=$qty;
                                                                         $data['Sqr_feet_to_Meter']=$qty;
                                                                         $data['qty']=round($qty,3);
                                                                         $data['amount']=round($data['rate']*$qty,3);
                                                                         
                                                                     }
                                                                     elseif($type==5 || $type==8)
                                                                     {
                                                                         
                                                                              $subqty=$data['profile'];
                                                                             
                                                                             
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty*$data['nos']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty*$data['nos']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                   $data['Meter_to_Sqr_feet']= $subqty*$data['nos'];
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty*$data['nos']/39.37,3);
                                                                              }
                                                       
                                                                             
                                                                             
                                                                             
                                                                             $sqt=$data['Meter_to_Sqr_feet']*$data['fact'];
                                                                             $sqft= round($subqty*$data['nos'],3);
                                                                             $data['Sqr_feet_to_Meter']=$sqft*$data['fact'];
                                                                             $data['qty']=round($sqt,3);
                                                                             $data['amount']=round($rate*$data['qty'],3);
                                                                             
                                                                             
                                                                     }
                                                                     elseif($type==6)
                                                                     {
                                                                         
                                                                             
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $profile= round($data['profile']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $profile= round($data['profile']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                  $profile= $data['profile'];
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $profile= round($data['profile']/39.37,3);
                                                                                 
                                                                              }
                                                                              
                                                                              
                                                                              $qty=$profile*$data['fact']*$data['nos'];
                                                                              $data['qty']=round($qty,3);
                                                                              $data['Meter_to_Sqr_feet']= 0;
                                                                              $data['Sqr_feet_to_Meter']= round($data['rate']*$qty,3);
                                                                              $data['amount']=round($data['rate']*$qty,3);
                                                                             
                                                                             
                                                                     }
                                                                     elseif($type==7)
                                                                     {
                                                                         
                                                                         
                                                                         
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $profile= round($data['profile']/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $profile= round($data['profile']/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                  $profile= $data['profile'];
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $profile= round($data['profile']/39.37,3);
                                                                              }
                                                                         
                                                                              $qty=$profile*$data['fact']*$data['nos'];
                                                                              $data['qty']=round($qty,3);
                                                                              $data['Meter_to_Sqr_feet']= 0;
                                                                              $data['Sqr_feet_to_Meter']= round($data['rate']*$qty,3);
                                                                              $data['amount']=round($data['rate']*$qty,3);
                                                                             
                                                                             
                                                                     }
                                                                     else
                                                                     {
                                                                         
                                                                         
                                                                         
                                                                              $subqty=$data['profile']+$data['crimp'];
                                                                           
                                                                           
                                                                           
                                                                              if($checkboxformula==3)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/3.281,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==4)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/1000,3);
                                                                              }
                                                                              
                                                                              if($checkboxformula==5)
                                                                              {
                                                                                   $data['Meter_to_Sqr_feet']= $subqty;
                                                                              }
                                                                              
                                                                              if($checkboxformula==6)
                                                                              {
                                                                                  $data['Meter_to_Sqr_feet']= round($subqty/39.37,3);
                                                                              }
                                                       
                                    
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            $sqft= round($subqty,3);
                                                                            $mtr=$sqft*$data['fact']; // 1.09 fact
                                                                            $data['Sqr_feet_to_Meter']=round($mtr*$data['nos'],3);
                                                                            
                                        
                                                                            $sqt=$data['Meter_to_Sqr_feet']; 
                                                                            
                                                                           
                                        
                                                                            $data['qty']=round($sqt*$data['nos']*$data['fact'],3);
                                                                            $data['amount']=round($data['rate']*$data['qty'],3);
                                                                         
                                                                     }
                                                                     

                                                                        
                                                                  
                                                              }
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                                              
                                   
                                    
 
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    $data['uom']=$checkboxformula;
                                    $data['order_id']=$form_data->order_id;
                                    $data['order_no']=$form_data->order_no;
                                    
                                    
                                    
                                    
                                    

			                        
				                    $insertid= $this->Main_model->insert_commen($data,$tablename);
				                    
				                    
				                    
				                    
				                    
				                    $data_update['get_id']=$insertid;
                                    $data_update['sort_id']=$insertid;
                                    $this->Main_model->update_commen($data_update,$tablename);
                                    
                                    
                                    
                                    
				                    
				                    
                                     $array=array('error'=>'2');
                                     echo json_encode($array);




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="InputUpdate")
                 {



                         	 if($form_data->values!='')
                             {

                                           $categories="";
                                           
                                           $ratechange=$form_data->ratechange;
                                           
                                           $factchange=$form_data->factchange;
                                           
                                           
                                           $data['get_id']=$form_data->id;
                                           
                                           
                                           // Decking sheet rate Update
                                           if($ratechange!=0)
                                           {
                                               $data['rate']=$ratechange;
                                           }
                                           
                                           if($factchange!=0)
                                           {
                                               $data['fact']=$factchange;
                                           }
                              
                              
             
                                           if($form_data->inputname=='product_name')
                                           {
                                               
                                               
                                                 $data[$form_data->inputname]=$form_data->values;
                                                 $result= $this->Main_model->where_names('product_list','product_name',$form_data->values);
                                                 foreach ($result as  $product) {
                                                     
                                                    $data['product_name']=$product->product_name;
                                                    $data['product_id']=$product->id;
                                                    $data['categories_id']=$product->categories_id;
                                                    $data['categories_name']=$product->categories;
                                                    $data['rate']=$product->price;
                                                    $data['fact']=$product->formula;
                                                    $uom=$product->uom;
                                                    $formula=$product->formula;
                                                    
                                                    $categories=$product->categories;
                                                    
                                                 }
                                               
                                               
                                           }
                                           elseif($form_data->inputname=='tile_material_name')
                                           {
                                               
                                               
                                               
                                                 $data[$form_data->inputname]=$form_data->values;
                                                 $result= $this->Main_model->where_names('product_list','product_name',$form_data->values);
                                                 foreach ($result as  $product) {
                                                     
                                                    $data['tile_material_name']=$product->product_name;
                                                    $data['tile_material_id']=$product->id;
                                                  
                                                 }
                                               
                                               
                                           }
                                           else
                                           {
                                                          $resultff= $this->Main_model->where_names($tablename,'id',$form_data->id);
                                                          foreach ($resultff as  $ssdd) {
                                                                 $cul=$ssdd->cul;
                                                           }
                                               
                                               
                                                           $data[$form_data->inputname]=$form_data->values;
                                               
                                               
                                           }
                                           
                                           
                                           
                                          
                                           
                                           $this->Main_model->update_commen($data,$tablename);
                                           $array=array('error'=>'2','massage'=>'Customer successfully Updated..');
                                           



                                            $result= $this->Main_model->where_names($tablename,'id',$form_data->id);
                                            foreach ($result as  $form_data) {



                                                             $id=$form_data->id;
                                                             
                                                             
                                                             $profile=$form_data->profile;
                                                             
                                                             
                                                             
                                                             $uom=$form_data->uom;
                                                             $crimp=$form_data->crimp;
                                                             $nos=$form_data->nos;
                                                             $fact=$form_data->fact;
                                                            
                                                             $rate=$form_data->rate;
                                                             
                                                             
                                                             
                                                          
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                              $resultcc= $this->Main_model->where_names('product_list','id',$form_data->product_id);
                                                              foreach ($resultcc as  $productcc) {
                                                                  
                                                                  $categories=$productcc->categories;
                                                                  $type=$productcc->type;
                                                                 
                                                              }
                                                              
                                                              
                                                              
                                                              
                                                              $datass['get_id']=$id;
                                                              
                                                              
                                                              if($categories=='Accesories')
                                                              { 
                                                                  
                                                                    
                                                                   
                                                                     if($type==1)
                                                                     {
                                                                         
                                                                              if($uom==3)
                                                                              {
                                                                                  $profile= round($profile/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  $profile= round($profile/1000,3);
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                   $profile=$profile;
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  $profile= round($profile/39.37,3);
                                                                              }
                                                                         
                                                                         $qty=$profile*$nos;
                                                                         $datass['Meter_to_Sqr_feet']=$qty;
                                                                         $datass['Sqr_feet_to_Meter']=$qty;
                                                                         $datass['qty']=round($qty,3);
                                                                         $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     
                                                                     
                                                                     if($type==2)
                                                                     {
                                                                               if($uom==3)
                                                                              {
                                                                                  $let= round($crimp/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  $let= round($crimp/1000,3);
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                   $let=$crimp;
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  $let= round($crimp/39.37,3);
                                                                              }
                                                                         
                                                                         
                                                                         $qty=$profile*$let*$nos;
                                                                         $datass['Meter_to_Sqr_feet']=$qty;
                                                                         $datass['Sqr_feet_to_Meter']=$qty;
                                                                         $datass['qty']=round($qty,3);
                                                                         $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     
                                                                    
                                                                     
                                                                     if($type==3)
                                                                     {
                                                                         $qty=$nos;
                                                                         $data['Meter_to_Sqr_feet']=$qty;
                                                                         $datass['Sqr_feet_to_Meter']=$qty;
                                                                         $datass['qty']=round($qty,3);
                                                                         $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     
                                                                     
                                                                     if($type==0)
                                                                     {
                                                                         
                                                                             $subqty=$profile+$crimp;
                                                                             
                                                                             
                                                                             
                                                                             
                                                                              if($uom==3)
                                                                              {
                                                                                  $datass['Meter_to_Sqr_feet']= round($subqty/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  $datass['Meter_to_Sqr_feet']= round($subqty/1000,3);
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  $datass['Meter_to_Sqr_feet']= $subqty;
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  $datass['Meter_to_Sqr_feet']= round($subqty/39.37,3);
                                                                              }
                                                                             
                                                                             
                                                                             
                                                                             
                                                                             
                                                                             $sqft= round($subqty,3);
                                                                             $mtr=$sqft*$fact;
                                                                             $datass['Sqr_feet_to_Meter']=round($mtr*$nos,3);
                                                                             $sqt=$datass['Meter_to_Sqr_feet'];
                                                                             $datass['qty']=round($sqt*$nos*$fact,3);
                                                                             $datass['amount']=round($rate*$datass['qty'],3);
                                                                             
                                                                     }
                                                                  
                                                                  
                                                                        
                                                                  
                                                              }
                                                              else
                                                              {
                                                                  
                                                                  
                                                                     if($type==4)
                                                                     {
                                                                         
                                                                         
                                                                              if($uom==3)
                                                                              {
                                                                                   $profile=round($profile/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                    $profile=round($profile/1000,3);
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  
                                                                                  $profile=$profile;
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  
                                                                                 $profile=round($profile/39.37,3);
                                                                                 
                                                                              }
                                                                              
                                                                         
                                                                             
                                                                        
                                                                         $qty=$profile*$nos*$fact;
                                                                         $datass['Meter_to_Sqr_feet']=$qty;
                                                                         $datass['Sqr_feet_to_Meter']=$qty;
                                                                         $datass['qty']=round($qty,3);
                                                                         $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     elseif($type==5 || $type==8)
                                                                     {
                                                                         
                                                                             $subqty=$profile;
                                                                             
                                                                             
                                                                             
                                                                              if($uom==3)
                                                                              {
                                                                                    $datass['Meter_to_Sqr_feet']= round($subqty*$nos/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  
                                                                                     $datass['Meter_to_Sqr_feet']= round($subqty*$nos/1000,3);
                                                                                   
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  
                                                                                  
                                                                                     $datass['Meter_to_Sqr_feet']=$subqty*$nos;
                                                                                   
                                                                                 
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  
                                                                                    $datass['Meter_to_Sqr_feet']= round($subqty*$nos/39.37,3);
                                                                                 
                                                                                 
                                                                              }
                                                                             
                                                                             
                                                                             
                                                                           
                                                                             
                                                                             
                                                                             
                                                                             
                                                                             $sqft= round($subqty*$nos,3);
                                                                             $datass['Sqr_feet_to_Meter']=$sqft*$fact;
                                                                             $sqt=$datass['Meter_to_Sqr_feet']*$fact;
                                                                             $datass['qty']=round($sqt,3);
                                                                             $datass['amount']=round($rate*$datass['qty'],3);
                                                                     
                                                                     
                                                                     }
                                                                     elseif($type==6)
                                                                     {
                                                                              if($uom==3)
                                                                              {
                                                                                  $profile= round($profile/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  $profile= round($profile/1000,3);
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  $profile= $profile;
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  $profile= round($profile/39.37,3);
                                                                              }
                                                                         
                                                                          $qty=$profile*$fact*$nos;
                                                                          $datass['qty']=round($qty,3);
                                                                          $datass['Meter_to_Sqr_feet']= 0;
                                                                          $datass['Sqr_feet_to_Meter']= round($rate*$qty,3);
                                                                          $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     elseif($type==7)
                                                                     {
                                                                         
                                                                              if($uom==3)
                                                                              {
                                                                                 
                                                                                  $profile= round($profile/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  $profile= round($profile/1000,3);
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  $profile= $profile;
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  $profile= round($profile/39.37,3);
                                                                              }
                                                                         
                                                                          $qty=$profile*$fact*$nos;
                                                                          $datass['qty']=round($qty,3);
                                                                          $datass['Meter_to_Sqr_feet']= 0;
                                                                          $datass['Sqr_feet_to_Meter']= round($rate*$qty,3);
                                                                          $datass['amount']=round($rate*$qty,3);
                                                                     }
                                                                     else
                                                                     {
                                                                         
                                                                         
                                                                             $subqty=$profile+$crimp;
                                                                             
                                                                             
                                                                               if($uom==3)
                                                                              {
                                                                                    $datass['Meter_to_Sqr_feet']= round($subqty/3.281,3);
                                                                              }
                                                                              
                                                                              if($uom==4)
                                                                              {
                                                                                  
                                                                                     $datass['Meter_to_Sqr_feet']= round($subqty/1000,3);
                                                                                   
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==5)
                                                                              {
                                                                                  
                                                                                     $datass['Meter_to_Sqr_feet']=$subqty;
                                                                                   
                                                                                 
                                                                              }
                                                                              
                                                                              if($uom==6)
                                                                              {
                                                                                  
                                                                                    $datass['Meter_to_Sqr_feet']= round($subqty/39.37,3);
                                                                                 
                                                                                 
                                                                              }
                                                                             
                                                                             
                                                                       
                                                                          
                                                                             
                                                                             $sqft= round($subqty,3);
                                                                             
                                                                             $mtr=$sqft*$fact;
                                                                             $datass['Sqr_feet_to_Meter']=round($mtr*$nos,3);
                                                                             
                                                                             
                                                                             $sqt=$datass['Meter_to_Sqr_feet'];
                                                                             
                                                                            
                                                                             
                                                                             $datass['qty']=round($sqt*$nos*$fact,3);
                                                                             $datass['amount']=round($rate*$datass['qty'],3);
                                                                         
                                                                     }
                                                                     
                                                                    
                                                                  
                                                              }
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             
                                                             


                                                             $this->Main_model->update_commen($datass,$tablename);
                                                         
                                                        


                                            }

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
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                 
                 if($form_data->action=='Deletesub')
                 {
                     $tablename=$form_data->tablename_sub;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                 
                 if($form_data->action=='markDeliveryaddress')
                 {
                     $tablename=$form_data->tablename_sub;
                     $tablenamemain=$form_data->tablenamemain;
                     $partial=$form_data->partial;
                     $order_id=$form_data->order_id;
                     $idval=$form_data->id;
                 	 $id=explode('|', $idval);
                 	 
                 	 
                 	 
                 	  $ss['get_id']=$order_id;
                      $ss['paricel_mode']=0;
                      $this->Main_model->update_commen_where($ss,'order_id',$tablename);
                     
                     if($partial==1)
                     {
                         
                         
                                 
                                  
                         
                             	  $address_idval=$form_data->address_id;
                             	  $address_id=explode('|', $address_idval);
        
                                  for ($i=0; $i <count($id) ; $i++) { 
                                
                                  $datass_appprox['get_id']=$id[$i];
                                  $datass_appprox['address_id']=$address_id[$i];
                                  if($datass_appprox['address_id']!=0)
                                  {
                                      $datass_appprox['address_id_mark']=1;
                                  }
                                  else
                                  {
                                     $datass_appprox['address_id_mark']=0;
                                  }
                                  $datass_appprox['paricel_mode']=$partial;
                                  $this->Main_model->update_commen($datass_appprox,$tablename);
                         	    
                            	
                                  }
                             
                                  $dat['get_id']=$order_id;
                                  $dat['paricel_mode']=$partial;
                                  $this->Main_model->update_commen($dat,$tablenamemain);
                         
                     }
                     else
                     {
                         
                         
                         	 $address_idval=$form_data->address_id;
                         	 $address_id=explode('|', $address_idval);
        
                             for ($i=0; $i <count($id) ; $i++) { 
                                
                                  $datass_appprox['get_id']=$id[$i];
                                  $datass_appprox['paricel_mode']=0;
                                  $this->Main_model->update_commen($datass_appprox,$tablename);
                         	    
                            	
                             }
                             
                             
                                  $dat['get_id']=$order_id;
                                  $dat['paricel_mode']=$partial;
                                  $this->Main_model->update_commen($dat,$tablenamemain);
         
                         
                     }
                     
                 	
                 	 
                 
                 	 echo "1";
                 	 exit;
                 	

                 }
                 
                 
                 
                 
                 
                 
                 if($form_data->action=='returnproduct')
                 {
                     $tablename=$form_data->tablename_sub;
                    
                     $idval=$form_data->order_product_id;
                 	 $id=explode('|', $idval);
                 	 
                 	
                 	 
                 	 $statusv=$form_data->status;
                 	 $status=explode('|', $statusv);
                     
                           
                            $statusfinal=array_sum($status);
                            if($statusfinal==0)
                            {
                                $statusfinalbase=0;
                            }
                            else
                            {
                                $statusfinalbase=1;
                            }
                            
                       
        
                             for ($i=0; $i <count($id) ; $i++) { 
                                
                                      $datass_appprox['get_id']=$id[$i];
                                      $datass_appprox['return_status']=$status[$i];
                                      $this->Main_model->update_commen($datass_appprox,$tablename);
                                  
                                      $result= $this->Main_model->where_names($tablename,'id',$id[$i]);
                                      foreach ($result as  $form_data) {
                                         
                                         $order_id=$form_data->order_id;
                                      }
                                     
                                     
                                      
                                          $datass_appprox_order['get_id']=$order_id;
                                          $datass_appprox_order['return_status']=$status[$i];
                                          $this->Main_model->update_commen($datass_appprox_order,'orders_process');
                                      
                                      
                         	    
                            	
                             }
                 	
                 	 
                 
                 	 echo "1";
                 	 exit;
                 	

                 }
                 
                 if($form_data->action=='returnproduct_driver')
                 {
                     $tablename=$form_data->tablename_sub;
                    
                     $idval=$form_data->order_product_id;
                 	 $id=explode('|', $idval);
                 	 
                 	
                 	 
                 	 $statusv=$form_data->status;
                 	 $status=explode('|', $statusv);
                     
                           
                            $statusfinal=array_sum($status);
                            if($statusfinal==1)
                            {
                                $statusfinalbase=1;
                            }
                            else
                            {
                                $statusfinalbase=2;
                            }
                            
                       
        
                             for ($i=0; $i <count($id) ; $i++) { 
                                
                                      $datass_appprox['get_id']=$id[$i];
                                      $datass_appprox['return_status']=$status[$i];
                                      $this->Main_model->update_commen($datass_appprox,$tablename);
                                  
                                          $result= $this->Main_model->where_names($tablename,'id',$id[$i]);
                                          foreach ($result as  $form_data) {
                                             
                                             $order_id=$form_data->order_id;
                                          }
                                     
                                          $datass_appprox_order['get_id']=$order_id;
                                          $datass_appprox_order['return_status']=$status[$i];
                                          $this->Main_model->update_commen($datass_appprox_order,'orders_process');
                                      
                                      
                         	    
                            	
                             }
                 	
                 	 
                 
                 	 echo "1";
                 	 exit;
                 	

                 }
                 
                 
                 
                   if($form_data->action=='Cancel')
                 {
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $this->Main_model->cancelupdate($id,$tablename);

                 }
                 
                 
                 if($form_data->action=='process_status_assign')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->order_id;
                 	 $status=$form_data->status;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['production_assign']=$status;
                     $datass_appprox['reason']=$form_data->reason;
                     
                     $datass_appprox['production_start_date']=$date;
                     $datass_appprox['production_start_time']=$time;
                     
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 
                 
                  if($form_data->action=='actioncalculation')
                 {
                     
                     $tablename=$form_data->tablename_sub;
                 	 $id=$form_data->id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['uom']=$form_data->values;
                     $datass_appprox['profile']=$form_data->profile;
                     $datass_appprox['crimp']=$form_data->crimp;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 
                 if($form_data->action=='appprox')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->order_id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['approx']=$form_data->appprox_status;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 
                 
                 if($form_data->action=='qtymodifiy')
                 {
                     
                     $tablename=$form_data->tablename_sub;
                 	 $id=$form_data->id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['modify_qty']=$form_data->qty;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 
                 
                 if($form_data->action=='statuschange')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['assign_status']=2;
                     $datass_appprox['reason']="Driver Trip Started";
                     $datass_appprox['trip_start_date']=$date;
                     $datass_appprox['trip_start_time']=$time;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 if($form_data->action=='bayinfocnage')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['bay_info']=$form_data->value;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 if($form_data->action=='bininfocnage')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['bin_info']=$form_data->value;
                     $this->Main_model->update_commen($datass_appprox,$tablename);
                     

                 }
                 
                   if($form_data->action=='InputUpdateprocess')
                 {
                     
                     $tablename='proudtcion_order_products';
                 	 $id=$form_data->id;
                     $this->db->query("UPDATE proudtcion_order_products SET proudtcion_no=proudtcion_no+'".$form_data->values."' WHERE id='".$id."'");    
                     

                 }
                 
                 
                 if($form_data->action=='qcstatuschange')
                 {
                     
                     $order_id=$_GET['order_id'];
                     $tablename='proudtcion_order_products';
                 	 $id=$form_data->id;
                 	 $idstatus=$form_data->idstatus;
                 	 $statuss=$form_data->statuss;
                 	 $field=$form_data->field;
                 	 
                 	 if($idstatus==-1)
                 	 {
                 	      $this->db->query("UPDATE proudtcion_order_products SET $field='".$statuss."',production_status='".$idstatus."',proudtcion_no='0' WHERE id='".$id."'");    
                     
                 	 }
                 	 else
                 	 {
                 	     $this->db->query("UPDATE proudtcion_order_products SET $field='".$statuss."',production_status='".$idstatus."' WHERE id='".$id."'");    
                      
                 	 }
                 	 
                 	 
                 	 if($idstatus=='-1')
                 	 {
                 	     $reason='Production re-assign';
                 	 }
                 	 else
                 	 {
                 	     $reason='QC Verified';
                 	 }
                 	 
                     $this->db->query("UPDATE orders_process SET production_assign='".$idstatus."',reason='".$reason."' WHERE id='".$order_id."'");   

                 }
                 
                 
                 if($form_data->action=='processStatuschages')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                     $order_id=$form_data->order_id;
                 	 $id=$form_data->order_product_id;
                     
                     $orer_p_id=explode('|', $id);
                     $order_production_no=explode('|', $form_data->order_production_no);
                     $order_production_no_cmd=explode('|', $form_data->order_production_no_cmd);
                     for ($i=0; $i <count($orer_p_id) ; $i++) { 
                        
                         $datass_appprox['get_id']=$orer_p_id[$i];
                         $datass_appprox['production_status']=$form_data->status;
                         
                         if($form_data->status==1)
                         {
                             //$datass_appprox['proudtcion_no']=0;
                         }
                         elseif($form_data->status==3)
                         {
                             
                             	 $result= $this->Main_model->where_names($tablename,'id',$orer_p_id[$i]);
                                 foreach ($result as  $form_datavv) {
                                     
                                   $production_status= $form_datavv->production_status;
                                   $production_no= $form_datavv->production_no;
                                   
                                       if($order_production_no_cmd[$i]!=0)
                                       {
                                           $proudtcion_no_data=$order_production_no_cmd[$i];
                                       }
                                       else
                                       {
                                           $proudtcion_no_data=$order_production_no[$i];
                                       }
                                   
                                   
                                   
                                 }
                                 if($production_status==1)
                                 {
                                    $datass_appprox['production_status']=2; 
                                 }
                 	 
                             
                             $datass_appprox['proudtcion_no']=$proudtcion_no_data;
                             
                             
                         }
                         else
                         {
                             	 $result= $this->Main_model->where_names($tablename,'id',$orer_p_id[$i]);
                                 foreach ($result as  $form_datavv) {
                                     
                                   $production_no= $form_datavv->production_no;
                                   
                                   if($production_no==0 || $production_no="")
                                   {
                                       if($order_production_no_cmd[$i]!=0)
                                       {
                                           $proudtcion_no_data=$order_production_no_cmd[$i];
                                       }
                                       else
                                       {
                                           $proudtcion_no_data=$order_production_no[$i];
                                       }
                                       
                                   }
                                   else
                                   {
                                       $proudtcion_no_data=$production_no;
                                   }
                                   
                                   
                                 }
                                 $datass_appprox['proudtcion_no']=$proudtcion_no_data;
                              
                         }
                         
                         
                         
                         $datass_appprox['process_start_date']=$date;
                         $datass_appprox['process_start_time']=$time;
                         $this->Main_model->update_commen($datass_appprox,$tablename);
                         
                         
                     }

                     
                      $datass['get_id']=$order_id;
                      $datass['production_status']=$form_data->status;
                     $this->Main_model->update_commen($datass,'order_product_list');
                      
                      
                      $datasssd['get_id']=$order_id;
                      $datasssd['production_assign']=$form_data->status;
                      
                      if($form_data->status==2)
                      {
                          $datasssd['reason']='Production Inprogress';
                      }
                      if($form_data->status==3)
                      {
                          $datasssd['reason']='Production Completed';
                      }
                      
                      if($form_data->status==4)
                      {
                          $datasssd['reason']='Production QC Verified';
                      }
                      if($form_data->status==5)
                      {
                          $datasssd['reason']='Production Move Transport';
                          $datasssd['finance_status']=2;
                      }
                      
                      
                      $this->Main_model->update_commen($datasssd,'orders_process');
                      
                      
                     
                 }
                 
                 
                 
                 
                 if($form_data->action=='processStatuschagesAll')
                 {
                     
                     
                       $tablename=$form_data->tablenamemain;
                       $order_id=$form_data->order_id;
                       $datass_appprox['get_id']=$order_id;
                 	   $datass_appprox['production_status']=$form_data->status;
                 	   $this->Main_model->update_commen_where($datass_appprox,'order_id',$tablename);
                 	   $datass['get_id']=$order_id;
                       $datass['production_status']=$form_data->status;
                       $datass['reason']=$form_data->reason;
                       $this->Main_model->update_commen($datass,'orders_process');
                 	   
                 	   
                 }
                 
                 
                  if($form_data->action=='processStatuschages_single')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                     $order_id=$form_data->order_id;
                 	 $id=$form_data->order_product_id;
                     
                     $orer_p_id=explode('|', $id);
                     $order_production_no=explode('|', $form_data->order_production_no);
                     $order_production_no_cmd=explode('|', $form_data->order_production_no_cmd);
                     for ($i=0; $i <count($orer_p_id) ; $i++) { 
                        
                         $datass_appprox['get_id']=$orer_p_id[$i];
                         $datass_appprox['production_status']=$form_data->status;
                         
                         if($form_data->status==1)
                         {
                             //$datass_appprox['proudtcion_no']=0;
                         }
                         elseif($form_data->status==3)
                         {
                             
                             	 $result= $this->Main_model->where_names($tablename,'id',$orer_p_id[$i]);
                                 foreach ($result as  $form_datavv) {
                                     
                                   $production_status= $form_datavv->production_status;
                                   $production_no= $form_datavv->production_no;
                                   
                                       if($order_production_no_cmd[$i]!=0)
                                       {
                                           $proudtcion_no_data=$order_production_no_cmd[$i];
                                       }
                                       else
                                       {
                                           $proudtcion_no_data=$order_production_no[$i];
                                       }
                                   
                                   
                                   
                                 }
                                 if($production_status==1)
                                 {
                                    $datass_appprox['production_status']=2; 
                                 }
                 	 
                             
                             $datass_appprox['proudtcion_no']=$proudtcion_no_data;
                             
                             
                         }
                         else
                         {
                             	 $result= $this->Main_model->where_names($tablename,'id',$orer_p_id[$i]);
                                 foreach ($result as  $form_datavv) {
                                     
                                   $production_no= $form_datavv->production_no;
                                   
                                   if($production_no==0 || $production_no="")
                                   {
                                       if($order_production_no_cmd[$i]!=0)
                                       {
                                           $proudtcion_no_data=$order_production_no_cmd[$i];
                                       }
                                       else
                                       {
                                           $proudtcion_no_data=$order_production_no[$i];
                                       }
                                       
                                   }
                                   else
                                   {
                                       $proudtcion_no_data=$production_no;
                                   }
                                   
                                   
                                 }
                                 $datass_appprox['proudtcion_no']=$proudtcion_no_data;
                              
                         }
                         
                         
                         
                         $datass_appprox['process_start_date']=$date;
                         $datass_appprox['process_start_time']=$time;
                         $this->Main_model->update_commen($datass_appprox,$tablename);
                         
                         
                     }

                     
                      $datass['get_id']=$order_id;
                      $datass['production_status']=$form_data->status;
                      $this->Main_model->update_commen($datass,'order_product_list');
                      
                      
                     
                 }
                 
                 
                 
                 
                 
                 
                 if($form_data->action=='addprocessdelete')
                 {
                       $tablename=$form_data->tablenamemain;
                       $this->db->query("DELETE FROM $tablename  WHERE id='".$form_data->id."'");
                 }
                 
                 if($form_data->action=='addprocess')
                 {
                     
                     $tablename=$form_data->tablenamemain;
                 	 $datass['proudtcion_id']=$form_data->id;
                 	 
                 	 $datass['order_product_id']=$form_data->order_product_id;
                 	 
                 	 $datass['product_id']=$form_data->product_id;
                 	 
                 	 
                 	 $result= $this->Main_model->where_names('order_product_list_process','id',$form_data->order_product_id);
                     foreach ($result as  $form_datavv) {
                         
                       $datass['categorie_id']= $form_datavv->categories_id;
                       
                     }
                 	 
                 	 
                 	 $datass['order_id']=$form_data->order_id;
                 	 $datass['proudtcion_name']=$form_data->name;
                 	 $datass['userid']=$this->userid;
                 	 
                 	 
                 	 $resultmain=$this->db->query("SELECT * FROM $tablename  WHERE order_id='".$form_data->order_id."' AND order_product_id='".$form_data->order_product_id."' ORDER BY id DESC LIMIT 0,1");
                 	 $resultcs=$resultmain->result();
                 	 
                 	 if(count($resultcs)>0)
                 	 {
                 	     foreach($resultcs as $v)
                 	     {
                 	          $datass['sort_order']=$v->sort_order+1;
                 	     }
                 	 }
                 	 else
                 	 {
                 	         $datass['sort_order']=1;
                 	 }
                 	 
                 	 
                 	 $this->db->query("UPDATE order_product_list_process SET checked='1' WHERE id='".$form_data->order_product_id."'");    
                 	 
                     $datass['create_date']=$date;
                     $datass['create_time']=$time;
                     $this->Main_model->insert_commen($datass,$tablename);
                     

                 }
                 
                 
                 if($form_data->action=='addprocessloop')
                 {
                     
                       $tablename=$form_data->tablenamemain;
                 	 
                 	 
                 	 
                 	 
                 	    $order_product_id=explode('|', $form_data->order_product_id);
                        for ($i=0; $i <count($order_product_id) ; $i++) { 
                        
                        
                        $datass['order_product_id']=$order_product_id[$i];
                        $datass['proudtcion_id']=$form_data->id;
                        
                         $result= $this->Main_model->where_names('order_product_list_process','id',$order_product_id[$i]);
                         foreach ($result as  $form_datavv) {
                             
                           $datass['categorie_id']= $form_datavv->categories_id;
                           $datass['product_id']= $form_datavv->product_id;
                           
                         }
                 	 
                     	 $datass['order_id']=$form_data->order_id;
                     	 $datass['proudtcion_name']=$form_data->name;
                     	 $datass['userid']=$this->userid;
                 	 
                 	 
                     	 $resultmain=$this->db->query("SELECT * FROM $tablename  WHERE order_id='".$form_data->order_id."' AND order_product_id='".$order_product_id[$i]."' ORDER BY id DESC LIMIT 0,1");
                     	 $resultcs=$resultmain->result();
                     	 
                     	 if(count($resultcs)>0)
                     	 {
                     	     foreach($resultcs as $v)
                     	     {
                     	          $datass['sort_order']=$v->sort_order+1;
                     	     }
                     	 }
                     	 else
                     	 {
                     	         $datass['sort_order']=1;
                     	 }
                     	 
                     	  $this->db->query("UPDATE order_product_list_process SET checked='1' WHERE id='".$order_product_id[$i]."'");                  
			    
                     	 
                     	 
                         $datass['create_date']=$date;
                         $datass['create_time']=$time;
                         $this->Main_model->insert_commen($datass,$tablename);
                            
                            
                            
                        
                        
                        
                        }

                 	 
                 	 
                 	 
                 	
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                     

                 }
                 
                 
                 
                  if($form_data->action=='sizesave')
                 {
                     
                     $tablename_sub=$form_data->tablename_sub;
                 	 $id=$form_data->order_product_id;
                 	 
                 	 $ss['get_id']=$id;
                     $ss['sub_product_id']=$form_data->sub_product;
                     $ss['value_id']=0;
                     $ss['section_lable']=0;
                     $ss['section_value']=0;
                     $ss['degree']=0;
                     $this->Main_model->update_commen($ss,$tablename_sub);
                     
                 	 
                 	 
                 	
                     $datass_appprox['get_id']=$id;
                     $datass_appprox['sub_product_id']=$form_data->sub_product;
                     $datass_appprox['value_id']=$form_data->value_id;
                     $datass_appprox['section_lable']=$form_data->lab1;
                     $datass_appprox['section_value']=$form_data->lab2;
                     $datass_appprox['degree']=$form_data->degree;
                     $this->Main_model->update_commen($datass_appprox,$tablename_sub);
                     

                 }
                 
                 
                    if($form_data->action=='Cancelfinance')
                 {
                     $tablename=$form_data->tablenamemain;
                 	 $id=$form_data->id;
                     $this->Main_model->cancelupdatefinance($id,$tablename);

                 }
                 
                 
                   if($form_data->action=='Commission')
                 {
                     $tablename=$form_data->tablename_sub;
                 	 $order_id=$form_data->order_id;
                 	 $commission=$form_data->commissionval;
                     $datass['get_id']=$form_data->order_id;
                     $datass['commission']=$commission;
                     $this->Main_model->update_commen_where($datass,'order_id',$tablename);
                     
                     
                     
                     
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $val['get_id']=$form_data->order_id;
                     $val['commission_check']=1;
                     $this->Main_model->update_commen($val,$tablenamemain);
                     
                     
                     

                 }
                 
                 
                 
                 
                   if($form_data->action=='deliverystatus')
                 {
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $val['get_id']=$form_data->order_id;
                     $val['delivery_charge']=$form_data->delivery_charge;
                     $val['delivery_status']=$form_data->deliverystatus;
                      $val['delivery_mode']=$form_data->delivery_mode;
                      $val['payment_mode']=$form_data->payment_mode;
                     $this->Main_model->update_commen($val,$tablenamemain);
                     
                     

                 }


                     

                  if($form_data->action=='Copy')
                 {
                     $tablename=$form_data->tablename_sub;
                     $id=$form_data->id;

                     $result= $this->Main_model->where_names($tablename,'id',$id);
                     foreach ($result as  $form_data) {




                                     $data['product_id']=$form_data->product_id;
                                     $data['product_name']=$form_data->product_name;
                                     
                                     $data['tile_material_name']=$form_data->tile_material_name;
                                     $data['tile_material_id']=$form_data->tile_material_id;
                                     
                                     $data['categories_id']=$form_data->categories_id;
                                     $data['categories_name']=$form_data->categories_name;
                                     $data['profile']=$form_data->profile;
                                     $data['crimp']=$form_data->crimp;
                                     $data['Meter_to_Sqr_feet']=$form_data->Meter_to_Sqr_feet;
                                     $data['Sqr_feet_to_Meter']=$form_data->Sqr_feet_to_Meter;
                                     $data['nos']=$form_data->nos;
                                     $data['uom']=$form_data->uom;
                                     $data['commission']=$form_data->commission;
                                     $data['address_id']=$form_data->address_id;
                                     $data['address_id_mark']=$form_data->address_id_mark;
                                     
                                     
                                     $data['reference_image']=$form_data->reference_image;
                                     
                                     
                                      $data['section_lable']=$form_data->section_lable;
                                      $data['section_value']=$form_data->section_value;
                                      $data['degree']=$form_data->degree;
                                     
                                     $data['sub_product_id']=$form_data->sub_product_id;
                                     $data['value_id']=$form_data->value_id;
                                    
                                     $data['unit']=$form_data->unit;
                                     $data['order_id']=$form_data->order_id;
                                     $data['order_no']=$form_data->order_no;
                                     $data['fact']=$form_data->fact;
                                     $data['rate']=$form_data->rate;
                                     $data['qty']=$form_data->qty;
                                     $data['sort_id']=$form_data->sort_id;
                                     $data['amount']=$form_data->amount;
                                     $this->Main_model->insert_commen($data,$tablename);
                                    
                       
                       



                 

                     }
                     
                                     $array=array('success'=>'2');
                                     echo json_encode($array);
                     
                 }
                     
                     
                 if($form_data->action=='Copygroup')
                 {
                     
                     
                         
               
                 
                     
                     $tablename=$form_data->tablename_sub;
                     $id=$form_data->id;
                     $rows_input=$form_data->rows_input;
                     
                     
                     
                     for ($i=0; $i < $rows_input; $i++) { 
                         
                        
                    

                                     $result= $this->Main_model->where_names($tablename,'id',$id);
                                     foreach ($result as  $form_data) {
                
                
                                                     $data['product_id']=$form_data->product_id;
                                                     $data['product_name']=$form_data->product_name;
                                                     
                                                     $data['tile_material_name']=$form_data->tile_material_name;
                                                     $data['tile_material_id']=$form_data->tile_material_id;
                                                     
                                                     $data['categories_id']=$form_data->categories_id;
                                                     $data['categories_name']=$form_data->categories_name;
                                                     $data['profile']=$form_data->profile;
                                                     $data['crimp']=$form_data->crimp;
                                                     $data['Meter_to_Sqr_feet']=$form_data->Meter_to_Sqr_feet;
                                                     $data['Sqr_feet_to_Meter']=$form_data->Sqr_feet_to_Meter;
                                                     $data['nos']=$form_data->nos;
                                                     $data['uom']=$form_data->uom;
                                                     $data['commission']=$form_data->commission;
                                                     
                                                     $data['address_id']=$form_data->address_id;
                                                     $data['address_id_mark']=$form_data->address_id_mark;
                                                     
                                                     
                                                         $data['reference_image']=$form_data->reference_image;
                                                         $data['sub_product_id']=$form_data->sub_product_id;
                                                         $data['value_id']=$form_data->value_id;
                                                         
                                                            $data['section_lable']=$form_data->section_lable;
                                                            $data['section_value']=$form_data->section_value;
                                                            $data['degree']=$form_data->degree;
                                                     
                                                     $data['unit']=$form_data->unit;
                                                     $data['order_id']=$form_data->order_id;
                                                     $data['order_no']=$form_data->order_no;
                                                     $data['fact']=$form_data->fact;
                                                     $data['rate']=$form_data->rate;
                                                     $data['qty']=$form_data->qty;
                                                     $data['sort_id']=$form_data->sort_id;
                                                     $data['amount']=$form_data->amount;
                                                     $this->Main_model->insert_commen($data,$tablename);
                                                    
                                 
                
                                     }
                                     
                     }
                     
                     
                     
                     
                     
                                     $array=array('success'=>'2');
                                     echo json_encode($array);
                     
                     

                 }
                 
                 
                 
                 
                 if($form_data->action=='Copyempty')
                 {
                     
                     
                 
                     
                     $tablename=$form_data->tablename_sub;
                     $id=$form_data->id;
                     $rows_input=$form_data->rows_input;
                     
                     
                     
                     for ($i=0; $i < $rows_input; $i++) { 
                         
                        
                    
                
                
                                                     $data['product_id']="";
                                                     $data['product_name']="";
                                                     $data['tile_material_name']="";
                                                     $data['tile_material_id']="";
                                                     $data['categories_id']="";
                                                     $data['categories_name']="";
                                                     $data['profile']="0";
                                                     $data['crimp']="0";
                                                     $data['commission']="0";
                                                     $data['address_id']="0";
                                                     $data['address_id_mark']="0";
                                                     $data['nos']="0";
                                                     $data['unit']="0";
                                                     $data['order_id']=$form_data->order_id;
                                                     $data['order_no']=$form_data->order_no;
                                                     $data['fact']="0";
                                                     $data['uom']="0";
                                                     $data['rate']="0";
                                                     $data['qty']="0";
                                                     $data['sort_id']="1";
                                                     $data['amount']="0";
                                                     $this->Main_model->insert_commen($data,$tablename);
                                                    
                                 
                
                                    
                                     
                     }
                     
                     
                     
                     
                     
                                     $array=array('success'=>'2');
                                     echo json_encode($array);
                     
                     

                 }
                
                
             
                     
                     
                     

                                     

	}
	
	
	public function fetch_data()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     $convert=$_GET['convert'];
                     
                  
                    
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$_GET['order_id']."' AND deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='".$_GET['order_id']."' AND deleteid=0 ORDER BY sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                    $amountdata=$value->rate*$value->qty;
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $kg_price=0;
                                     $og_price=0;
                                     $og_formula=0;
                                     $kg_formula2=0;
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                     foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                         $type=$csval->type;
                                         
                                         
                                         $kg_price=$csval->kg_price;
                                         $og_price=$csval->price;
                                         
                                         
                                         
                                         $og_formula=$csval->formula;
                                         $kg_formula2=$csval->formula2;
                                         
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='".$_GET['order_id']."' AND a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                 	
                                 	
                                 	
                                     
                                     
                                     
                                   $this->db->query("UPDATE $tablename_sub SET cul='3' WHERE id='".$value->id."'");   
                             
                                   $qty= round($value->qty,3);
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   if($convert==2)
                                   {
                                       $qty= round($value->qty*10.764,3); 
                                      
                                   }
                                   
                                  
                                   if($convert=='undefined')
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   
                                   $profile=$value->profile;
                                   $crimp= $value->crimp; 
                                  
                                   
                                   
                               
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'tile_material_name' => $value->tile_material_name, 
                         	 		'tile_material_id' => $value->tile_material_id, 
                         	 		'categories'=>$categories,
                         	 		'type'=>$type,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $profile, 
                         	 		'crimp_tab' => $crimp, 
                         	 		'checked' => $value->checked,
                         	 		'proudtcion_no' => $value->proudtcion_no, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'return_status' => $value->return_status,
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'kg_price' => $kg_price,
                         	 		'og_price' => $og_price,
                         	 		'og_formula' => $og_formula,
                         	 		'kg_formula2' => $kg_formula2,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                         	 		'cul' => $value->cul, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
		public function fetch_data_get()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     $convert=$_GET['convert'];
                     
                  
                    
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$_GET['order_id']."' AND deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='".$_GET['order_id']."' AND deleteid=0 ORDER BY sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                                    
                                    if($value->paricel_mode==1)
                                    {
                                        
                                             if($value->modify_qty=="")
                                            {
                                                $amountdata=$value->rate*$value->qty;
                                            }
                                            else
                                            {
                                                $amountdata=$value->rate*$value->modify_qty;
                                            }
                                        
                                    }
                                    else
                                    {
                                            $amountdata=$value->rate*$value->qty;
                                    }
                                    
                                    
                                    
                                    
                                    
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                     foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                         $type=$csval->type;
                                         
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='".$_GET['order_id']."' AND a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                 	
                                 	
                                 	
                                     
                                     
                                     
                                 
                             
                                   $qty= round($value->qty,3);
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   if($convert==2)
                                   {
                                       $qty= round($value->Sqr_feet_to_Meter,3); 
                                      
                                   }
                                   
                                  
                                   if($convert=='undefined')
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   
                                   $profile=$value->profile;
                                   $crimp= $value->crimp; 
                                   if($convert==3)
                                   {
                                       
                                       
                                       if($type==4)
                                       {
                                                $profile= round($value->profile/304.8,3); 
                                                $crimp= round($value->crimp/304.8,3); 
                                   
                                       }
                                       else
                                       {
                                                $profile= $value->profile; 
                                                $crimp= $value->crimp;
                                                
                                   
                                       }
                                        
                                        
                                      
                                   }
                                  
                                   if($convert==4)
                                   {
                                       if($type==4)
                                       {
                                               $profile= $value->profile; 
                                               $crimp= $value->crimp;
                                   
                                       }
                                       else
                                       {
                                              $profile= round($value->profile*304.8,3); 
                                              $crimp= round($value->crimp*304.8,3);
                                                
                                   
                                       }
                                       
                                      
                                      
                                   }
                                   
                                   if($convert==5)
                                   {
                                      $profile= round($value->profile/3.281,3); 
                                      $crimp= round($value->crimp/3.281,3);
                                      
                                   }
                                   if($convert==6)
                                   {
                                       $profile= round($value->profile*12,3); 
                                       $crimp= round($value->crimp*12,3);
                                      
                                   }
                                   
                                   
                                    if($value->paricel_mode==1)
                                    {
                                       $modify_qty= $value->modify_qty;
                                       
                                    }
                                    else
                                    {
                                       $modify_qty=0;
                                    }
                                   
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'tile_material_name' => $value->tile_material_name, 
                         	 		'tile_material_id' => $value->tile_material_id, 
                         	 		'categories'=>$categories,
                         	 		'type'=>$type,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $profile, 
                         	 		'crimp_tab' => $crimp, 
                         	 		'checked' => $value->checked,
                         	 		'address_id' => $value->address_id,
                         	 		'proudtcion_no' => $value->proudtcion_no, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'return_status' => $value->return_status,
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'paricel_mode' => $value->paricel_mode,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                         	 		'cul' => $value->cul, 
                         	 		'modify_qty' =>$modify_qty, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
		public function fetch_data_calculation()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     
                     $cid=$_GET['cid'];
                     $typev=$_GET['type'];
                     $convert=$_GET['convert'];
                     
                  
                    
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$_GET['order_id']."' AND deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='".$_GET['order_id']."'  AND deleteid=0 ORDER BY sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                    $amountdata=$value->rate*$value->qty;
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                      foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                          $type=$csval->type;
                                         
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='".$_GET['order_id']."' AND a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                   
                                   
                                   $qty= round($value->qty,3);
                                   $profile=$value->profile;
                                   $crimp= $value->crimp; 
                                   if($cid==$value->id)
                                   {
                                       
                                       
                                                            $this->db->query("UPDATE $tablename_sub SET cul='".$convert."' WHERE id='".$value->id."'");   
                                                            if($convert==5)
                                                            {
                                                              $profile= round($value->profile/3.281,3); 
                                                              $crimp= round($value->crimp/3.281,3);
                                                              
                                                            }
                                                            if($convert==6)
                                                            {
                                                               $profile= round($value->profile*12,3); 
                                                               $crimp= round($value->crimp*12,3);
                                                              
                                                            }
                                                             if($convert==3)
                                                            {
                                                                
                                                                           if($type==4)
                                                                           {
                                                                                    $profile= round($value->profile/304.8,3); 
                                                                                    $crimp= round($value->crimp/304.8,3); 
                                                                       
                                                                           }
                                                                           else
                                                                           {
                                                                                    $profile= $value->profile; 
                                                                                    $crimp= $value->crimp;
                                                                                    
                                                                       
                                                                           }
                                                                            
                                                                
                                                            }
                                                            
                                                               if($convert==4)
                                                               {
                                                                   if($type==4)
                                                                   {
                                                                           $profile= $value->profile; 
                                                                           $crimp= $value->crimp;
                                                               
                                                                   }
                                                                   else
                                                                   {
                                                                          $profile= round($value->profile*304.8,3); 
                                                                          $crimp= round($value->crimp*304.8,3);
                                                                            
                                                               
                                                                   }
                                                                   
                                                                  
                                                                  
                                                               }
                                        
                                   
                                   }
                                   
                                
                                  
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'categories'=>$categories,
                         	 		'type'=>$type,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'tile_material_name' =>  $value->tile_material_name,
                         	 		'tile_material_id' =>  $value->tile_material_id,
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $profile, 
                         	 		'crimp_tab' => $crimp, 
                         	 		'checked' => $value->checked,
                         	 		'proudtcion_no' => $value->proudtcion_no, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'return_status' => $value->return_status,
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                         	 		'cul' => $value->cul, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_production()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     $convert=$_GET['convert'];
                       $status=$_GET['status'];
                     
                      
                      $sqlstatus='';
                      if($status==1)
                      {
                          $sqlstatus=' AND  b.production_status=1 OR b.production_status=-1 OR b.production_status=2';
                      }
                      elseif($status==3)
                      {
                          $sqlstatus=' AND   b.production_status=4 OR b.production_status=5 OR b.production_status='.$status;
                      }
                      elseif($status==4)
                      {
                          $sqlstatus=' AND   b.production_status=5 OR b.production_status='.$status;
                      }
                      elseif($status==10)
                      {
                          $sqlstatus=' AND  b.production_status=4 OR b.production_status=-1 OR b.production_status=5 OR b.production_status=3';
                      }
                      else
                      {
                          $sqlstatus=' AND  b.production_status='.$status;
                      }
                     
                     

                     
                  
                    $order_id=$_GET['order_id'];
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$order_id."' AND  deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT a.*,b.color,b.color_qty,b.thickness,b.thickness_qty,b.corners,b.corners_qty,b.crimp_check,b.crimp_check_qty,b.bay_info,b.bin_info,b.proudtcion_no as proudtcion_no_val,b.id as labelid,b.production_status as production_status,b.proudtcion_id as proudtcion_id FROM $tablename_sub as a JOIN proudtcion_order_products as b ON a.id=b.order_product_id  WHERE a.order_id='".$order_id."' AND  a.deleteid=0 $sqlstatus ORDER BY a.sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                    $amountdata=$value->rate*$value->qty;
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                      foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                         $type=$csval->type;
                                         
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE  a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                     
                                     
                                     
                                     
                             
                                   $qty=0;
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   if($convert==2)
                                   {
                                       $qty= round($value->Sqr_feet_to_Meter,3); 
                                      
                                   }
                                   
                                   if($convert==3)
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   if($convert=='undefined')
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   
                                   if($convert==4)
                                   {
                                       $qty= round($value->profile*$value->nos*304.8,3); 
                                      
                                   }
                                   
                                   if($convert==5)
                                   {
                                      $qty= round($value->profile*$value->nos/3.2808,3); 
                                      
                                   }
                                   if($convert==6)
                                   {
                                       $qty= round($value->profile*$value->nos*12,3); 
                                      
                                   }
                                   
                                   
                                   if($value->proudtcion_no_val==0 || $value->proudtcion_no_val=='')
                                   {
                                       $proudtcion_no_val=$value->nos;
                                       $cmp_no=0;
                                       
                                      
                                       
                                   }
                                   else
                                   {   
                                        $cmp_no=$value->proudtcion_no_val;
                                        $proudtcion_no_val=$value->nos-$value->proudtcion_no_val;
                                        
                                       
                                   }
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'labelid' => $value->labelid, 
                         	 		'order_no' => $value->order_no, 
                         	 		'type' => $type, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'categories'=>$categories,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'tile_material_name' =>  $value->tile_material_name,
                         	 		'tile_material_id' =>  $value->tile_material_id,
                         	 		'proudtcion_id' =>  $value->proudtcion_id, 
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $value->profile, 
                         	 		'crimp_tab' => $value->crimp, 
                         	 		'checked' => $value->checked, 
                         	 		'production_status' => $value->production_status, 
                         	 		'bay_info' => $value->bay_info, 
                         	 		'bin_info' => $value->bin_info,
                         	 		'color' => $value->color,
                         	 		'color_qty' => $value->color_qty,
                         	 		'thickness' => $value->thickness,
                         	 		'thickness_qty' => $value->thickness_qty,
                         	 		'corners' => $value->corners,
                         	 		'corners_qty' => $value->corners_qty,
                         	 		'crimp_check' => $value->crimp_check,
                         	 		'crimp_check_qty' => $value->crimp_check_qty,
                         	 		'proudtcion_no' => $proudtcion_no_val, 
                         	 		'cmp_no' => $cmp_no, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'return_status' => $value->return_status,
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
		public function fetch_data_order_process()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                    
                     $tablenamemain=$_GET['tablename'];
                     $order_id=$_GET['order_id'];
                     $order_product_id=$_GET['order_product_id'];
                     
                  
                 	$result=  $this->db->query("SELECT * FROM $tablenamemain  WHERE order_id='".$_GET['order_id']."' AND order_product_id='".$_GET['order_product_id']."' AND deleteid=0 ORDER BY sort_order ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 	
                         	 		'order_id' => $value->order_id, 
                         	 		'product_id' =>  $value->product_id, 
                         	 		'order_product_id' =>  $value->order_product_id, 
                         	 		'proudtcion_id' => $value->proudtcion_id, 
                         	 		'proudtcion_name' => $value->proudtcion_name, 
                         	 		'sort_order' => $value->sort_order, 
                         	 		'create_date' => $value->create_date, 
                         	 		'create_time' => $value->create_time
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
		public function fetch_data_vendor()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     $convert=$_GET['convert'];
                     
                  
                    
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$_GET['order_id']."' AND deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT a.* FROM $tablename_sub as a JOIN product_list as b ON b.id=a.product_id WHERE a.order_id='".$_GET['order_id']."' AND b.link_to_purchase=1 AND a.deleteid=0 ORDER BY a.sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                    $amountdata=$value->rate*$value->qty;
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                      foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                         
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='".$_GET['order_id']."' AND a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                     
                                     
                                     
                                     
                             
                                   $qty=0;
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   if($convert==2)
                                   {
                                       $qty= round($value->Sqr_feet_to_Meter,3); 
                                      
                                   }
                                   
                                   if($convert==3)
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   if($convert=='undefined')
                                   {
                                       
                                      $qty= round($value->qty,3);
                                      
                                      
                                   }
                                   
                                   if($convert==4)
                                   {
                                       $qty= round($value->profile*$value->nos*304.8,3); 
                                      
                                   }
                                   
                                   if($convert==5)
                                   {
                                      $qty= round($value->profile*$value->nos/3.2808,3); 
                                      
                                   }
                                   if($convert==6)
                                   {
                                       $qty= round($value->profile*$value->nos*12,3); 
                                      
                                   }
                                   
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'categories'=>$categories,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'tile_material_name' =>  $value->tile_material_name,
                         	 		'tile_material_id' =>  $value->tile_material_id,
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $value->profile, 
                         	 		'crimp_tab' => $value->crimp, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
		public function fetch_data_similer()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $tablenamemain=$_GET['tablenamemain'];
                     $convert=$_GET['convert'];
                     $product_id=$_GET['product_id'];
                  
                    
                   
                    
                     $customer_id=0;
                     $resultmain=$this->db->query("SELECT * FROM $tablenamemain  WHERE id='".$_GET['order_id']."' AND deleteid=0 ORDER BY id ASC");
                 	 $resultcs=$resultmain->result();
                 	 foreach ($resultcs as  $valuecs) {
                 	     
                 	     $customer_id=$valuecs->customer_id;
                 	 }
                 
                 

                 	 
                 	$result=  $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id!='".$_GET['order_id']."' AND product_id='".$product_id."' AND deleteid=0 ORDER BY sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                    $amountdata=$value->rate*$value->qty;
                                    $amount=$amountdata+$value->commission;
                                
                                     $description="";
                                     $product_name="";
                                     $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                      foreach($product_list as $csval)
                                     {
                                         
                                         $description=$csval->description;
                                         $product_name=$csval->product_name;
                                         $categories=$csval->categories;
                                         $categories_id=$csval->categories_id;
                                          $type=$csval->type;
                                         
                                         if($categories_id=='1')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='26')
                                         {
                                             $cate_status=1;
                                         }
                                         elseif($categories_id=='32')
                                         {
                                             $cate_status=1;
                                         }
                                         else
                                         {
                                             $cate_status=0;
                                         }
                                         
                                         
                                     }
                                     
                                     
                                     
                                     
                                     
               
                                    $resultsameqty=  $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='".$_GET['order_id']."' AND a.product_id='".$value->product_id."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.sort_id ASC");
                                 	$resultsameqty=$resultsameqty->result();
                                 	
                                 	$same=0;
                                 	if(count($resultsameqty)>0)
                                 	{
                                 	    $same=1;
                                 	}
                                     
                                     
                                     
                                     
                             
                                     $qty= round($value->qty,3);
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   if($convert==2)
                                   {
                                       $qty= round($value->Sqr_feet_to_Meter,3); 
                                      
                                   }
                                   
                                  
                                   if($convert=='undefined')
                                   {
                                      $qty= round($value->qty,3);
                                      
                                   }
                                   
                                   
                                   $profile=$value->profile;
                                   if($convert==3)
                                   {
                                      $profile= $value->profile;
                                      
                                   }
                                   
                                   if($convert==4)
                                   {
                                       $profile= round($value->profile*304.8,3); 
                                      
                                   }
                                   
                                   if($convert==5)
                                   {
                                      $profile= round($value->profile/3.281,3); 
                                      
                                   }
                                   if($convert==6)
                                   {
                                       $profile= round($value->profile*12,3); 
                                      
                                   }
                                   
                                   
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'same'=>$same,
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'categories'=>$categories,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'tile_material_name' =>  $value->tile_material_name,
                         	 		'tile_material_id' =>  $value->tile_material_id,
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $profile, 
                         	 		'type' => $type,
                         	 		'crimp_tab' => $value->crimp, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	public function fetch_data_commission()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $convert=$_GET['convert'];
                     
                  
               
                 	 
                 	$result=  $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='".$_GET['order_id']."' AND deleteid=0 ORDER BY sort_id ASC");
                 	$result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                            $amountdata=$value->rate*$value->qty;
                            $amount=$amountdata;
                        
                             $description="";
                             $product_name="";
                             $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                              foreach($product_list as $csval)
                             {
                                 
                                 $description=$csval->description;
                                 $product_name=$csval->product_name;
                                 $categories=$csval->categories;
                                 $categories_id=$csval->categories_id;
                                 
                                 
                                 if($categories_id=='1')
                                 {
                                     $cate_status=1;
                                 }
                                 elseif($categories_id=='26')
                                 {
                                             $cate_status=1;
                                 }
                                 elseif($categories_id=='32')
                                 {
                                             $cate_status=1;
                                 }
                                 else
                                 {
                                     $cate_status=0;
                                 }
                                 
                                 
                             }
                             
                             
                             
                                   if($convert==1)
                                   {
                                     $qty= round($value->qty,3);
                                   }
                                   else
                                   {
                                       $qty= round($value->Sqr_feet_to_Meter,3); 
                                      
                                   }
                                   
                         	 	$array[] = array(
        
                                    'no' => $i,
        
                         	 		'id' => $value->id, 
                         	 		'order_id' => $value->order_id, 
                         	 		'product_name_tab' => $product_name, 
                         	 		'categories'=>$categories,
                         	 		'description' => $description,
                         	 		'product_id' =>  $value->product_id, 
                         	 		'tile_material_name' =>  $value->tile_material_name,
                         	 		'tile_material_id' =>  $value->tile_material_id,
                         	 		'categories_id' =>  $value->categories_id, 
                         	 		'profile_tab' => $value->profile, 
                         	 		'crimp_tab' => $value->crimp, 
                         	 		'nos_tab' => $value->nos, 
                         	 		'unit_tab' => $value->unit, 
                         	 		'fact_tab' => $value->fact,
                         	 		'uom' => $value->uom,
                         	 		'billing_options' => $value->billing_options,
                         	 		'commission_tab' => $value->commission,
                         	 		'cate_status' => $cate_status, 
                         	 		'categories_id_get'=>$categories_id,
                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                         	 		'rate_tab' => $value->rate, 
                                    'qty_tab' => $qty, 
                                    'amount_tab' => round($amount,4)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetchDataCategorybase()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $convert=$_GET['convert'];
                     
                     
                     
                    
                 	 $result=  $this->db->query("SELECT b.type,a.id,a.categories_name,SUM(a.Sqr_feet_to_Meter) as Sqr_feet_to_Meter,a.product_name,a.categories_id,SUM(a.commission) as commission_total,SUM(a.nos) as nos_total,SUM(a.fact) as fact_total,SUM(a.qty) as qty_total,SUM(a.amount) as amount_total FROM $tablename_sub as a JOIN product_list as b ON a.product_id=b.id WHERE a.order_id='".$_GET['order_id']."' AND a.deleteid=0 GROUP BY a.categories_id,b.type ORDER BY a.sort_id ASC");
                 	 $result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                                if($convert==1)
                                {
                                    $qty= $value->qty_total;
                                }
                                else
                                {
                                    $qty= $value->Sqr_feet_to_Meter;
                                   
                                }
                                  
                                  
                                  
                                  if($value->type=='2')
                                  {
                                       $lable='Height';
                                       $lable2='Length';
                                       $labletype=2;
                                      
                                  }
                                  elseif($value->type=='4')
                                  {
                                       $lable='Length';
                                       $lable2='0';
                                       $labletype=4;
                                      
                                  }
                                  elseif($value->type=='5')
                                  {
                                       $lable='Length';
                                       $lable2='0';
                                       $labletype=5;
                                      
                                  }
                                  elseif($value->type=='6')
                                  {
                                       $lable='Length';
                                       $lable2='0';
                                       $labletype=6;
                                      
                                  }
                                  elseif($value->type=='7')
                                  {
                                       $lable='Length';
                                       $lable2='0';
                                       $labletype=7;
                                      
                                  }
                                  elseif($value->type=='8')
                                  {
                                       $lable='Crimp';
                                       $lable2='0';
                                       $labletype=8;
                                      
                                  }
                                  elseif($value->type=='0')
                                  {
                                       $lable='Profile';
                                       $lable2='0';
                                       $labletype=1;
                                      
                                  }
                                  else
                                  {
                                       $lable='Length';
                                       $lable2='0';
                                       $labletype=1;
                                  }
                            
                                 
                         	 	$array[] = array(
        
                                    'no' => $i,
                                    'id' => $value->id, 
                         	 		'categories_id' => $value->categories_id,
                         	 		'type' => $value->type,
                         	 		'lable' => $lable,
                         	 		'lable2' => $lable2,
                         	 		'labletype' => $labletype,
                         	 		'categories_name' => $value->categories_name,
                         	 		'commission_total'=> round($value->commission_total,2),
                         	 		'nos_total'=> round($value->nos_total,2),
                         	 		'fact_total'=> round($value->fact_total,2),
                         	 		'qty_total'=>round($qty,2),
                         	 		'amount_total'=>round($value->amount_total,2)
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	public function fetchDataCategorybase_order_process_group()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $convert=$_GET['convert'];
                     $order_id=$_GET['order_id'];
                     
                     
                     
                      
                      
                      $sqlstatus='';
                      if($convert==1)
                      {
                          $sqlstatus=' AND  b.production_status=1 OR b.production_status=-1 OR b.production_status=2';
                      }
                      elseif($convert==3)
                      {
                          $sqlstatus=' AND  b.production_status=4 OR  b.production_status=5 OR b.production_status='.$convert;
                      }
                      elseif($convert==4)
                      {
                          $sqlstatus=' AND   b.production_status=5 OR b.production_status='.$convert;
                      }
                      elseif($convert==10)
                      {
                          $sqlstatus=' AND b.production_status=4 OR b.production_status=-1 OR b.production_status=5 OR b.production_status=3';
                      }
                      else
                      {
                          $sqlstatus=' AND  b.production_status='.$convert;
                      }

                     
                     
                     
                     
                
                     
                 	 $result=  $this->db->query("SELECT a.id,a.categories_id,a.categories_name,b.proudtcion_name,b.proudtcion_id FROM $tablename_sub as a JOIN proudtcion_order_products as b ON a.id=b.order_product_id  WHERE  a.order_id='". $order_id."' AND a.deleteid=0 $sqlstatus  GROUP BY b.proudtcion_id ORDER BY b.sort_order ASC");
                 	 $result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                         	 	$array[] = array(
        
                                    'no' => $i,
                                    'id' => $value->id, 
                         	 		'categories_id' => $value->categories_id, 
                         	 		'categories_name' => $value->categories_name,
                         	 		'proudtcion_id' => $value->proudtcion_id,
                         	 		'proudtcion_name' => $value->proudtcion_name
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	public function fetchDataCategorybase_order_process_panel()
	{

                     $i=1;
                     $array =array();
                     $cate_status='0';
                     $tablename_sub=$_GET['tablename_sub'];
                     $convert=$_GET['convert'];
                    $order_id=$_GET['order_id'];
                    
                      $sqlstatus='';
                      if($convert==1)
                      {
                          $sqlstatus=' AND  b.production_status=1 OR b.production_status=-1 OR b.production_status=2';
                      }
                      elseif($convert==3)
                      {
                          $sqlstatus=' AND  b.production_status=4 OR b.production_status=5 OR b.production_status='.$convert;
                      }
                      elseif($convert==4)
                      {
                          $sqlstatus=' AND  b.production_status=5 OR b.production_status='.$convert;
                      }
                      elseif($convert==10)
                      {
                          $sqlstatus=' AND  b.production_status=4 OR b.production_status=-1 OR b.production_status=5 OR b.production_status=3';
                      }
                      else
                      {
                         $sqlstatus=' AND  b.production_status='.$convert;
                      }


                     
                 	 $result=  $this->db->query("SELECT a.id,a.categories_id,a.categories_name,b.proudtcion_name,b.proudtcion_id FROM $tablename_sub as a JOIN proudtcion_order_products as b ON a.id=b.order_product_id  WHERE  a.order_id='". $order_id."' AND a.deleteid=0  $sqlstatus GROUP BY a.categories_id ORDER BY a.sort_id ASC");
                 	 $result=$result->result();
                 	  
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                         	 	$array[] = array(
        
                                    'no' => $i,
                                    'id' => $value->id, 
                         	 		'categories_id' => $value->categories_id, 
                         	 		'categories_name' => $value->categories_name
        
                         	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
		
	public function getcount()
	{
	     $tablename= $_GET['tablename'];
	     
	     
	     
	      if($this->session->userdata['logged_in']['access']=='12')
          {
                         
                         $resultpending= $this->Main_model->where_names_three_order_by($tablename,'order_base','0','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $resultprocessed= $this->Main_model->where_names_three_order_by($tablename,'order_base','1','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $resultcancel= $this->Main_model->where_names_three_order_by($tablename,'order_base','-1','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $resultrequest= $this->Main_model->where_names_three_order_by($tablename,'order_base','3','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $purchase_team= $this->Main_model->where_names_three_order_by($tablename,'order_base','4','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $md_team= $this->Main_model->where_names_three_order_by($tablename,'order_base','5','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $finance_team= $this->Main_model->where_names_three_order_by($tablename,'order_base','7','user_id',$this->userid,'deleteid','0','id','DESC');
                	     $reassign= $this->Main_model->where_names_three_order_by($tablename,'order_base','-2','user_id',$this->userid,'deleteid','0','id','DESC');
                	     
                	     
                	     
                	     
                  if($tablename=='orders')
                  {
                   
                    $tablenamemain='order_product_list';  
                    
                  }
                  if($tablename=='orders_process')
                  {
                      
                       $tablenamemain='order_product_list_process';  
                       
                  }
                  if($tablename=='orders_quotation')
                  {
                      
                       $tablenamemain='order_product_list_quotation'; 
                       
                  }
                
                
                  $resultsameqty=  $this->db->query("SELECT a.customer_id FROM $tablename as a JOIN $tablenamemain as b ON b.order_id=a.id JOIN product_list as c ON c.id=b.product_id WHERE  c.link_to_purchase=1 GROUP BY b.order_id ORDER BY a.id DESC");
                  $vendor_po_order=$resultsameqty->result();
                	     
                	     
                	     
          }
          elseif($this->session->userdata['logged_in']['access']=='11')
          {
              
              
                      
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT b.id FROM `sales_team` as a JOIN admin_users as  b ON a.id=b.define_salesteam_id WHERE a.sales_head='".$this->define_saleshd_id."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
              
              
              
                         
                    //      $resultpending= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','0','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $resultprocessed= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','1','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $resultcancel= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','-1','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $resultrequest= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','3','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $purchase_team= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','4','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $md_team= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','5','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $finance_team= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','7','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   //  $reassign= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base','-2','deleteid','0','user_id',$sales_team_id,'id','DESC');
                	   
                	   
                	   
                	   
                	   
                 $resultpending= $this->Main_model->where_names_two_order_by($tablename,'order_base','0','deleteid','0','id','DESC');
        	     $resultprocessed= $this->Main_model->where_names_two_order_by($tablename,'order_base','1','deleteid','0','id','DESC');
        	     $resultcancel= $this->Main_model->where_names_two_order_by($tablename,'order_base','-1','deleteid','0','id','DESC');
        	     $resultrequest= $this->Main_model->where_names_two_order_by($tablename,'order_base','3','deleteid','0','id','DESC');
        	     $purchase_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','4','deleteid','0','id','DESC');
        	     $md_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','5','deleteid','0','id','DESC');
        	     $finance_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','7','deleteid','0','id','DESC');
        	     $reassign= $this->Main_model->where_names_two_order_by($tablename,'order_base','-2','deleteid','0','id','DESC');
                	   
                
                  
                  
                  if($tablename=='orders')
                  {
                   
                    $tablenamemain='order_product_list';  
                    
                  }
                  if($tablename=='orders_process')
                  {
                      
                       $tablenamemain='order_product_list_process';  
                       
                  }
                  if($tablename=='orders_quotation')
                  {
                      
                       $tablenamemain='order_product_list_quotation'; 
                       
                  }
                
                
                  $resultsameqty=  $this->db->query("SELECT a.customer_id FROM $tablename as a JOIN $tablenamemain as b ON b.order_id=a.id JOIN product_list as c ON c.id=b.product_id WHERE  c.link_to_purchase=1 GROUP BY b.order_id ORDER BY a.id DESC");
                  $vendor_po_order=$resultsameqty->result();
                                 		   
                	   
                
                	   
                	   
                	     
          }
          else
          {
              
                 $resultpending= $this->Main_model->where_names_two_order_by($tablename,'order_base','0','deleteid','0','id','DESC');
        	     $resultprocessed= $this->Main_model->where_names_two_order_by($tablename,'order_base','1','deleteid','0','id','DESC');
        	     $resultcancel= $this->Main_model->where_names_two_order_by($tablename,'order_base','-1','deleteid','0','id','DESC');
        	     $resultrequest= $this->Main_model->where_names_two_order_by($tablename,'order_base','3','deleteid','0','id','DESC');
        	     $purchase_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','4','deleteid','0','id','DESC');
        	     $md_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','5','deleteid','0','id','DESC');
        	     $finance_team= $this->Main_model->where_names_two_order_by($tablename,'order_base','7','deleteid','0','id','DESC');
        	     $reassign= $this->Main_model->where_names_two_order_by($tablename,'order_base','-2','deleteid','0','id','DESC');
        	     
        	     
        	       
                  if($tablename=='orders')
                  {
                   
                    $tablenamemain='order_product_list';  
                    
                  }
                  if($tablename=='orders_process')
                  {
                      
                       $tablenamemain='order_product_list_process';  
                       
                  }
                  if($tablename=='orders_quotation')
                  {
                      
                       $tablenamemain='order_product_list_quotation'; 
                       
                  }
                
            
                
                  $resultsameqty=  $this->db->query("SELECT a.customer_id FROM $tablename as a JOIN $tablenamemain as b ON b.order_id=a.id JOIN product_list as c ON c.id=b.product_id WHERE  c.link_to_purchase=1 GROUP BY b.order_id ORDER BY a.id DESC");
                  $vendor_po_order=$resultsameqty->result();
	     
              
          }
	     
	    
	     
	     
	     
	     
	     
	     
	     
	     $array = array(

                            'pending' => count($resultpending),
                            'proceed' => count($resultprocessed),
                            'cancel' => count($resultcancel),
                            'purchase_team' => count($purchase_team),
                            'request' => count($resultrequest),
                            'requestp' => count($purchase_team),
                            'md_team' => count($md_team),
                            'reassign' => count($reassign),
                            'finance_team' => count($finance_team),
                            'vendor_po_order'=>count($vendor_po_order)

         );
	     
	     echo json_encode($array);
	     
	}
	
	
		public function getcount_finance()
	{
	     $tablename= $_GET['tablename'];
	     
	     $resultpending= $this->Main_model->where_names_three_order_by($tablename,'finance_status','0','deleteid','0','order_base','1');
	     
	    
	     $resultprocessed= $this->Main_model->where_names_two_order_by($tablename,'order_base','1','deleteid','0','id','DESC');
	     
	     $resultcancel= $this->Main_model->where_names_three_order_by($tablename,'finance_status','-1','deleteid','0','order_base','1');
	     $resultrequest= $this->Main_model->where_names_three_order_by($tablename,'finance_status','1','deleteid','0','order_base','1');
	     $transpot= $this->Main_model->where_names_three_order_by($tablename,'finance_status','3','deleteid','0','order_base','1');
	     $delivered= $this->Main_model->where_names_three_order_by($tablename,'finance_status','4','deleteid','0','order_base','1');
	     $reconciliation= $this->Main_model->where_names_three_order_by($tablename,'finance_status','5','deleteid','0','order_base','1');
	     
	     
	     $array = array(

                            'pending' => count($resultpending),
                            'proceed' => count($resultprocessed),
                            'cancel' => count($resultcancel),
                            'request' => count($resultrequest),
                            'transpot' => count($transpot),
                            'delivered'=>count($delivered),
                            'reconciliation'=>count($reconciliation)

         );
	     
	     echo json_encode($array);
	     
	}
	
	
	public function getcount_production()
	{
	     $tablename= $_GET['tablename'];
	     
	     $allprocess= $this->Main_model->where_names_three_order_by($tablename,'order_base','1','deleteid','0','order_base','1');
	     $production_assign= $this->Main_model->where_names_two_order_by($tablename,'production_assign','1','deleteid','0','id','DESC');
	     $production_inprogress= $this->Main_model->where_names_two_order_by($tablename,'production_assign','2','deleteid','0','id','DESC');
	     $production_re_assign= $this->Main_model->where_names_two_order_by($tablename,'production_assign','-1','deleteid','0','id','DESC');
	     $production_assign_completed= $this->Main_model->where_names_two_order_by($tablename,'production_assign','3','deleteid','0','id','DESC');
	     $production_qc_completed= $this->Main_model->where_names_two_order_by($tablename,'production_assign','4','deleteid','0','id','DESC');
	     $moveto_transpot= $this->Main_model->where_names_two_order_by($tablename,'production_assign','5','deleteid','0','id','DESC');
	     
	     $array = array(

                            'production_assign' => count($production_assign),
                            'production_assign_completed' => count($production_assign_completed),
                            'production_inprogress' => count($production_inprogress),
                            'production_re_assign' => count($production_re_assign),
                            'production_qc_completed' => count($production_qc_completed),
                            'moveto_transpot'=>count($moveto_transpot),
                            'allprocess' => count($allprocess)

         );
	     
	     echo json_encode($array);
	     
	}
	
	
	
	
	
	public function fetch_data_table()
	{
	    
	    
	    
	    
	    
	    
	                $tablename= $_GET['tablename'];
	                $order_base= $_GET['order_base'];

                     $i=1;
                     $array =array();
                     
                     
                     
                     
                     if($this->session->userdata['logged_in']['access']=='12')
                     {
                         
                         $result= $this->Main_model->where_names_three_order_by($tablename,'order_base',$order_base,'user_id',$this->userid,'deleteid','0','id','DESC');
                         
                 	 
                     }
                     elseif($this->session->userdata['logged_in']['access']=='11')
                     {
                         
                         
                         
                 
                        //   $sales_team_id=array();
                        //   $query = $this->db->query("SELECT b.id FROM `sales_team` as a JOIN admin_users as  b ON a.id=b.define_salesteam_id WHERE a.sales_head='".$this->define_saleshd_id."'");
                        //   $resultsales_team=$query->result();
                        //   foreach ($resultsales_team as  $values) {
                              
                        //       $sales_team_id[]=$values->id;
                              
                        //   }
                         
                         
                         
                        //  $result= $this->Main_model->where_names_three_thried_where_in_order_by($tablename,'order_base',$order_base,'deleteid','0','user_id',$sales_team_id,'id','DESC');
                         $result= $this->Main_model->where_names_two_order_by($tablename,'order_base',$order_base,'deleteid','0','id','DESC');
                 	 
                     }
                     else
                     {
                        $result= $this->Main_model->where_names_two_order_by($tablename,'order_base',$order_base,'deleteid','0','id','DESC');
                 	  
                     }
                     
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 if($tablename=='orders')
                 	 {
                 	     $tablename_sub="order_product_list";
                 	 }
                 	 
                 	 if($tablename=='orders_quotation')
                 	 {
                 	     $tablename_sub="order_product_list_quotation";
                 	 }
                 	 
                 	 if($tablename=='orders_process')
                 	 {
                 	     $tablename_sub="order_product_list_process";
                 	 }
                 	 
                 	
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                       
                       
                        
                            $company_name= "";
                            $email= "";
                            $phone= "";
                            $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                 
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                             }
							            	
                        if($value->reason==1)
                        {
                            $value->reason='Moved';
                        }
                        if($value->reason=='-2')
                        {
                            $value->reason='TL Re-Assigned';
                        }
                     
                 	 	$array[] = array(

                            'no' => $i,
                 	 		'id' => $value->id, 
                 	 		'base_id' => base64_encode($value->id), 
                 	 		'order_no' => $value->order_no, 
                 	 		'reason' => $value->reason, 
                 	 		'name' => $company_name, 
                 	 		'email' => $email, 
                 	 		'phone' => $phone, 
                 	 		'totalamount' => round($totalamount,2), 
                 	 		'commission' => round($commission,2), 
                 	 		'address' => $address, 
                 	 		'order_base' =>  $value->order_base, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                            'create_time' => $value->create_time

                 	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
		public function fetch_data_table_po()
	{
	    
	    
	    
	    
	    
	    
	                $tablename= $_GET['tablename'];
	                $order_base= $_GET['order_base'];

                     $i=1;
                     $array =array();
                     
                     
                     
                     
                
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 if($tablename=='orders')
                 	 {
                 	     $tablename_sub="order_product_list";
                 	 }
                 	 
                 	 if($tablename=='orders_quotation')
                 	 {
                 	     $tablename_sub="order_product_list_quotation";
                 	 }
                 	 
                 	 if($tablename=='orders_process')
                 	 {
                 	     $tablename_sub="order_product_list_process";
                 	 }
                 	 
                 	

                    $resultsameqty=  $this->db->query("SELECT a.* FROM $tablename as a JOIN $tablename_sub as b ON b.order_id=a.id JOIN product_list as c ON c.id=b.product_id WHERE  c.link_to_purchase=1 GROUP BY b.order_id ORDER BY a.id DESC");
                    $result=$resultsameqty->result();
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                       
                       
                        
                            $company_name= "";
                            $email= "";
                            $phone= "";
                            $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                 
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                             }
							            	
                       
                     
                 	 	$array[] = array(

                            'no' => $i,
                 	 		'id' => $value->id, 
                 	 		'base_id' => base64_encode($value->id), 
                 	 		'order_no' => $value->order_no, 
                 	 		'reason' => 'Vendor PO Order', 
                 	 		'name' => $company_name, 
                 	 		'email' => $email, 
                 	 		'phone' => $phone, 
                 	 		'totalamount' => round($totalamount,2), 
                 	 		'commission' => round($commission,2), 
                 	 		'address' => $address, 
                 	 		'order_base' =>  $value->order_base, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                            'create_time' => $value->create_time

                 	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	public function fetch_data_table_finance()
	{
	    
	    
	    
	    
	    
	    
	                 $tablename= $_GET['tablename'];
	                 $order_base= $_GET['order_base'];

                     $i=1;
                     $array =array();
                     
                     if($order_base==111)
                     {
                         
                       $result= $this->Main_model->where_names_two_order_by($tablename,'order_base','1','deleteid','0','id','DESC');
                 	   
                     }
                     else
                     {
                       $result= $this->Main_model->where_names_three_order_by_new($tablename,'finance_status',$order_base,'order_base','1','deleteid','0','id','DESC');
                 	    
                     }
                     
                 	 
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                            
                            $tablename_sub="order_product_list_process";
                            
                            
                             $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                            
                            
                        
                            $company_name= "";
                            $email= "";
                            $phone= "";
                            $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                 
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                             }
							            	
                        

                 	 	$array[] = array(

                            'no' => $i,
                 	 		'id' => $value->id, 
                 	 		'base_id' => base64_encode($value->id), 
                 	 		'order_no' => $value->order_no, 
                 	 		'name' => $company_name, 
                 	 		'email' => $email, 
                 	 		'totalamount' => round($totalamount,2), 
                            'commission' => round($commission,2), 
                 	 		'phone' => $phone, 
                 	 		'reason' => $value->reason, 
                 	 		'address' => $address, 
                 	 		'order_base' =>  $value->finance_status, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                            'create_time' => $value->create_time

                 	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetch_data_table_production()
	{
	    
	    
	    
	    
	    
	    
	                 $tablename= $_GET['tablename'];
	                 $order_base= $_GET['order_base'];

                     $i=1;
                     $array =array();
                     
                     if($order_base==111)
                     {
                         
                       $result= $this->Main_model->where_names_two_order_by($tablename,'order_base','1','deleteid','0','id','DESC');
                 	   
                     }
                     else
                     {
                       $result= $this->Main_model->where_names_three_order_by_new($tablename,'production_assign',$order_base,'order_base','1','deleteid','0','id','DESC');
                 	    
                     }
                     
                 	 
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                       
                       
                            
                            $tablename_sub="order_product_list_process";
                            
                            
                             $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                            
                            
                        
                            $company_name= "";
                            $email= "";
                            $phone= "";
                            $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                 
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                             }
							            	
                        

                 	 	$array[] = array(

                            'no' => $i,
                 	 		'id' => $value->id, 
                 	 		'base_id' => base64_encode($value->id), 
                 	 		'order_no' => $value->order_no, 
                 	 		'name' => $company_name, 
                 	 		'email' => $email, 
                 	 		'totalamount' => round($totalamount,2), 
                            'commission' => round($commission,2), 
                 	 		'phone' => $phone, 
                 	 		'reason' => $value->reason, 
                 	 		'address' => $address, 
                 	 		'order_base' =>  $value->production_assign, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                            'create_time' => $value->create_time

                 	 	);


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
		public function fetch_data_table_transpot()
	{
	    
	    
	    
	    
	    
	    
	                 $tablename= $_GET['tablename'];
	                 $order_base= $_GET['order_base'];
	                 $route_id= $_GET['route_id'];

                     $i=1;
                     $array =array();
                 	 $result= $this->Main_model->where_names_three_order_by_new($tablename,'finance_status',$order_base,'order_base','1','deleteid','0','id','DESC');
                 	 
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     $tablename_sub="order_product_list_process";
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                       
                       if($route_id==0)
                       {
                           $route_id_base=0;
                       }
                       else{
                           $route_id_base=$value->route_id;
                       }
                       
                       
                       if($route_id==$route_id_base && $value->assign_status==0)
                       {
                           
                       
                        
                             $company_name= "";
                             $email= "";
                             $phone= "";
                             $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                                 
                                 
                                 
                             }
                             
                             
                             if($value->customer_address_id=="")
                             {
                             
                             
                                     $customers_adddrss = $this->Main_model->where_names('customers_adddrss','id',$value->customer_address_id);
                                     foreach($customers_adddrss as $customers_adddrss_v)
                                     {
                                         
                                         $address=$customers_adddrss_v->address1.' '.$customers_adddrss_v->address2.' '.$customers_adddrss_v->landmark.' '.$customers_adddrss_v->zone.' '.$customers_adddrss_v->pincode;
                                        
                                     }
                             
                             }
                             
                             
                           
                          
                             
                             
                             
                             
                             $vehicle_number="";
                             $vehicle = $this->Main_model->where_names('vehicle','route_id',$value->route_id);
                             foreach($vehicle as $vehicle_v)
                             {
                                 
                                 $vehicle_number=$vehicle_v->vehicle_number;
                                 $vehicle_id=$vehicle_v->id;
                             }
                             
                             
                             $route_name="";
                             $route = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($route as $route_v)
                             {
                                 
                                 $route_name=$route_v->name;
                                 
                             }
                             
                             
                             $driver_name="";
                             $driver_phone="";
                             $driver = $this->Main_model->where_names('driver','vehicle_id',$vehicle_id);
                             foreach($vehicle as $driver_v)
                             {
                                 
                                 $driver_name=$driver_v->name;
                                 $driver_phone=$driver_v->phone;
                             }
							            	
                        

                     	 	$array[] = array(
    
                                'no' => $i,
                     	 		'id' => $value->id, 
                     	 		'base_id' => base64_encode($value->id), 
                     	 		'order_no' => $value->order_no, 
                     	 		'name' => $company_name, 
                     	 		'email' => $email, 
                     	 		'phone' => $phone, 
                     	 		'reason' => $value->reason, 
                     	 		'totalamount' => round($totalamount,2), 
                                'commission' => round($commission,2), 
                     	 		'vehicle_number' => $vehicle_number,
                     	 		'driver_phone' => $driver_phone,
                     	 		'driver_name' => $driver_name,
                     	 		'route_names_val'=>$route_name,
                     	 		'address' => $address, 
                     	 		'delivery_mode' =>  $value->delivery_mode,
                     	 		'order_base' =>  $value->finance_status, 
                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                                'create_time' => $value->create_time
    
                     	 	);
                 	 	
                 	 	
                 	 	
                 	 	
                       }


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_data_table_transpot_vehicle()
	{
	              $route_id= $_GET['route_id'];
	         
    	           if($route_id==0)
    	           {
    	                 $result=  $this->db->query("SELECT c.name as route_name,a.vehicle_number as vehicle_number,b.phone as driver_phone,b.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN driver as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id WHERE a.deleteid=0 AND b.deleteid=0 ORDER BY a.id ASC");
                         $result=$result->result();
    	           }
    	           else
    	           {
    	                $result=  $this->db->query("SELECT c.name as route_name,a.vehicle_number as vehicle_number,b.phone as driver_phone,b.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN driver as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id WHERE a.route_id='".$route_id."' AND  a.deleteid=0 AND b.deleteid=0 ORDER BY a.id ASC");
                        $result=$result->result();
    	           }
	           
	           
    	             $array=array();
    	             $i=1;
    	         	 foreach ($result as  $value) {
    	         	     
    	         	     	$array[] = array(
        
                                    'no' => $i,
                         	 		'vehicle_id' => $value->vehicle_id, 
                         	 		'route_name' => $value->route_name, 
                         	 	    'vehicle_number' => $value->vehicle_number,
                         	 		'driver_phone' =>  $value->driver_phone,
                         	 		'driver_name' => $value->driver_name
        
                         	 	);
    	         	     
    	         	    $i++; 
    	         	 }
	           
	                echo json_encode($array);
	         
	    
	}
	
	
	
	
	
	
	
	    public function fetch_data_table_transpot_vehicle_delivered_order_list()
    {
                    $status= $_GET['status'];
                    $vehicle_id= $_GET['vehicle_id'];
                    
                    
                    
             
                    $result=  $this->db->query("SELECT b.order_no,b.id as order_id,b.trip_end_date,b.trip_end_time,c.name as route_name,a.vehicle_number as vehicle_number,d.phone as driver_phone,d.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status='4' AND b.vehicle_id='".$vehicle_id."' ORDER BY a.id DESC");
                    $result=$result->result();
               
               
                     $array=array();
                     $i=1;
                     foreach ($result as  $value) {
                         
                            $array[] = array(
        
                                    'no' => $i,
                                    'order_id' => $value->order_id, 
                                    'order_no' => $value->order_no, 
                                    'trip_end_date' => date('d-M-Y',strtotime($value->trip_end_date)),  
                                    'trip_end_time' => $value->trip_end_time, 
                                    'vehicle_id' => $value->vehicle_id, 
                                    'route_name' => $value->route_name, 
                                    'vehicle_number' => $value->vehicle_number,
                                    'driver_phone' =>  $value->driver_phone,
                                    'driver_name' => $value->driver_name,
                                    'count'=>count($result)
        
                                );
                         
                        $i++; 
                     }
               
                    echo json_encode($array);
             
        
    }
	
	
	
	  public function fetch_data_table_transpot_vehicle_delivered_order_list_by_id()
    {
                    $status= $_GET['status'];
                    $order_id= $_GET['order_id'];
                    
                    
                    
             
                    $result=  $this->db->query("SELECT b.order_no,b.customer_id,b.delivery_charge,b.payment_mode,b.payment_image,b.reference_no,b.id as order_id,b.trip_end_date,b.trip_end_time,c.name as route_name,a.vehicle_number as vehicle_number,d.id as driver_id,d.phone as driver_phone,d.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status='4' AND b.id='".$order_id."' ORDER BY a.id DESC");
                    $result=$result->result();
               
               
                     $array=array();
                     $i=1;
                     foreach ($result as  $value) {
                         
                         
                         $totalamount=0;
                         $resultpp=  $this->db->query("SELECT SUM(amount) as totalamount FROM order_product_list_process  WHERE order_id='".$value->order_id."' AND deleteid=0");
                         $results=$resultpp->result();
                         foreach ($results as  $valuep) {
                             
                             $totalamount=$valuep->totalamount;
                         }
                         
                            if($value->payment_image!="")
                             {
                                $payment_image= base_url().$value->payment_image;
                             }
                             else
                             {
                                 $payment_image=0;
                             }

                         
                         
                             $array[] = array(
        
                                    'no' => $i,
                                    'order_id' => $value->order_id, 
                                    'order_no' => $value->order_no, 
                                    'trip_end_date' => date('d-M-Y',strtotime($value->trip_end_date)),  
                                    'trip_end_time' => $value->trip_end_time, 
                                    'vehicle_id' => $value->vehicle_id, 
                                    'route_name' => $value->route_name, 
                                    'vehicle_number' => $value->vehicle_number,
                                    'driver_phone' =>  $value->driver_phone,
                                    'driver_name' => $value->driver_name,
                                    'driver_id' => $value->driver_id,
                                    'customer_id' => $value->customer_id,
                                    'payment_mode' => $value->payment_mode,
                                    'reference_no' => $value->reference_no,
                                    'delivery_charge' => $value->delivery_charge,
                                    'payment_image' => $payment_image,
                                    'totalamount' => $totalamount
                                    
        
                            );
                                
                                
                                
                         
                        $i++; 
                     }
               
                    echo json_encode($array);
             
        
    }
	
	
	
	
	
	
	
		public function fetch_data_table_transpot_vehicle_delivered()
	{
	                $status= $_GET['status'];
	                
	                
	                
	                $result1=  $this->db->query("SELECT c.name as route_name,a.vehicle_number as vehicle_number,d.phone as driver_phone,d.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status='4'  ORDER BY a.id ASC");
                    $result1=$result1->result();
	         
    	            $result=  $this->db->query("SELECT c.name as route_name,a.vehicle_number as vehicle_number,d.phone as driver_phone,d.name as driver_name,a.id as vehicle_id FROM vehicle as a JOIN orders_process as b ON a.id=b.vehicle_id JOIN route as c ON c.id=a.route_id JOIN driver as d ON d.id=b.driver_id  WHERE  b.finance_status='4' GROUP BY b.vehicle_id  ORDER BY a.id ASC");
                    $result=$result->result();
	           
	           
    	             $array=array();
    	             $i=1;
    	         	 foreach ($result as  $value) {
    	         	     
    	         	     	$array[] = array(
        
                                    'no' => $i,
                         	 		'vehicle_id' => $value->vehicle_id, 
                         	 		'route_name' => $value->route_name, 
                         	 	    'vehicle_number' => $value->vehicle_number,
                         	 		'driver_phone' =>  $value->driver_phone,
                         	 		'driver_name' => $value->driver_name,
                         	 		'count'=>count($result1)
        
                         	 	);
    	         	     
    	         	    $i++; 
    	         	 }
	           
	                echo json_encode($array);
	         
	    
	}
	
	
	
	
	
	
	
	 
	
	
	
	
	
		
	  public function cash_mode()
    {
                    $status= $_GET['status'];
                    $order_id= $_GET['order_id'];
                    
                    $result=  $this->db->query("SELECT * FROM denomination WHERE  order_id='".$order_id."' ORDER BY id DESC");
                    $result=$result->result();
               
               
                     $array=array();
                     $i=1;
                     foreach ($result as  $value) {
                         
                         
                             $array = array(
        
                                    'no' => $i,
                                    'order_id' => $value->order_id, 
                                    'c50rs' => $value->c50rs, 
                                    'c100rs' => $value->c100rs, 
                                    'c200rs' => $value->c200rs, 
                                    'c500rs' => $value->c500rs, 
                                    'c2000rs' => $value->c2000rs,
                                    'c50rs_s' =>  50*$value->c50rs, 
                                    'c100rs_s' => 100*$value->c100rs, 
                                    'c200rs_s' => 200*$value->c200rs, 
                                    'c500rs_s' => 500*$value->c500rs, 
                                    'c2000rs_s' => 200*$value->c2000rs,
                                    
        
                            );
                         
                        $i++; 
                     }
               
                    echo json_encode($array);
             
        
    }
	
	
		public function fetch_data_table_transpot_driver()
	{
	              $route_id= $_GET['route_id'];
	         
    	            $result=  $this->db->query("SELECT * FROM driver  WHERE deleteid=0  ORDER BY name ASC");
                    $result=$result->result();
	           
	           
    	             $array=array();
    	             $i=1;
    	         	 foreach ($result as  $value) {
    	         	     
    	         	     	$array[] = array(
        
                                    'no' => $i,
                         	 		'id' => $value->id, 
                         	 		'name' => $value->name, 
                         	 	    'phone' => $value->phone
        
                         	 	);
    	         	     
    	         	    $i++; 
    	         	 }
	           
	                echo json_encode($array);
	         
	    
	}
	
	
	public function fetch_data_table_transpot_assign_data()
	{
	    
	    
	    
	    
	    
	    
	                 $tablename= $_GET['tablename'];
	                 $order_base= $_GET['order_base'];
	                 $route_id= $_GET['route_id'];
	                 $assigen_status= $_GET['assaignstates'];

                     $i=1;
                     $array =array();
                 	 $result= $this->Main_model->where_names_three_order_by_new($tablename,'finance_status',$order_base,'order_base','1','deleteid','0','id','DESC');
                 	 
                 	 
                
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	    
                 	     
                 	         $tablename_sub="order_product_list_process";
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                 	     
                 	     
                       
                           if($route_id==0)
                           {
                               $route_id_base=0;
                           }
                           else{
                               $route_id_base=$value->route_id;
                           }
                       
                       
                       if($route_id==$route_id_base && $value->assign_status==$assigen_status)
                       {
                       
                           
                       
                        
                             $company_name= "";
                             $email= "";
                             $phone= "";
                             $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                                 
                                 
                                 
                             }
                             
                             
                             if($value->customer_address_id!="")
                             {
                             
                             
                                     $customers_adddrss = $this->Main_model->where_names('customers_adddrss','id',$value->customer_address_id);
                                     foreach($customers_adddrss as $customers_adddrss_v)
                                     {
                                         
                                          $company_name=$customers_adddrss_v->name;
                                          $phone=$customers_adddrss_v->phone;
                                          $address=$customers_adddrss_v->address1.' '.$customers_adddrss_v->address2.' '.$customers_adddrss_v->landmark.' '.$customers_adddrss_v->zone.' '.$customers_adddrss_v->pincode;
                                        
                                     }
                             
                             }
                             
                             
                           
                          
                             
                             
                             
                             
                             $vehicle_number="";
                             $vehicle = $this->Main_model->where_names('vehicle','id',$value->vehicle_id);
                             foreach($vehicle as $vehicle_v)
                             {
                                 
                                  $vehicle_number=$vehicle_v->vehicle_number;
                                  $vehicle_id=$vehicle_v->id;
                             }
                             
                           
                             
                             
                             $route_name="";
                             $route = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($route as $route_v)
                             {
                                 
                                 $route_name=$route_v->name;
                                 
                             }
                             
                             
                             $driver_name="";
                             $driver_phone="";
                             $driver = $this->Main_model->where_names('driver','vehicle_id',$vehicle_id);
                             foreach($driver as $driver_v)
                             {
                                 
                                  $driver_name=$driver_v->name;
                                  $driver_phone=$driver_v->phone;
                             }
                             
                             
                             
                             
                             if($assigen_status=='1')
                             {
                                 $statusval="Waiting";
                             }
                             
                             
                             if($assigen_status=='2')
                             {
                                 $statusval="Trip Started";
                             }
							    
							  
                             if($assigen_status=='3')
                             {
                                 $statusval="Delivered";
                             }           	
                        

                     	 	$array[] = array(
    
                                'no' => $i,
                     	 		'id' => $value->id, 
                     	 		'base_id' => base64_encode($value->id), 
                     	 		'order_no' => $value->order_no, 
                     	 		'name' => $company_name, 
                     	 		'email' => $email, 
                     	 		'phone' => $phone, 
                     	 		'totalamount' => round($totalamount,2), 
                                'commission' => round($commission,2), 
                     	 		'reason' => $value->reason, 
                     	 		'sort_id' => $value->sort_id, 
                     	 		'vehicle_number' => $vehicle_number,
                     	 		'driver_phone' => $driver_phone,
                     	 		'driver_name' => $driver_name,
                     	 		'route_name'=>$route_name,
                     	 		'address' => $address,
                     	 		'statusval'=>$statusval,
                     	 		'delivery_mode' =>  $value->delivery_mode, 
                     	 		'order_base' =>  $value->finance_status, 
                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                                'create_time' => $value->create_time
    
                     	 	);
                 	 	
                 	 	
                 	 	
                       }


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_table_transpot_assign_data_driver_list()
	{
	    
	    
	    
	    
	    
	    
	                 $tablename= $_GET['tablename'];
	                 $order_base= $_GET['order_base'];
	                 $route_id= $_GET['route_id'];
	                 $assigen_status= $_GET['assaignstates'];

                     $i=1;
                     $array =array();
                 	 $result= $this->Main_model->where_names_three_order_by_new($tablename,'finance_status',$order_base,'order_base','1','deleteid','0','id','DESC');
                 	 
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	         $tablename_sub="order_product_list_process";
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                 	     
                 	     
                       
                           if($route_id==0)
                           {
                               $route_id_base=0;
                           }
                           else{
                               $route_id_base=$value->route_id;
                           }
                       
                       
                       if($route_id==$route_id_base && $value->assign_status==$assigen_status)
                       {
                       
                           
                       
                        
                             $company_name= "";
                             $email= "";
                             $phone= "";
                             $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                                 
                                 
                                 
                             }
                             
                             
                             if($value->customer_address_id!="")
                             {
                             
                             
                                     $customers_adddrss = $this->Main_model->where_names('customers_adddrss','id',$value->customer_address_id);
                                     foreach($customers_adddrss as $customers_adddrss_v)
                                     {
                                         $company_name=$customers_adddrss_v->name;
                                         $phone=$customers_adddrss_v->phone;
                                         $address=$customers_adddrss_v->address1.' '.$customers_adddrss_v->address2.' '.$customers_adddrss_v->landmark.' '.$customers_adddrss_v->zone.' '.$customers_adddrss_v->pincode;
                                        
                                     }
                             
                             }
                             
                             
                           
                          
                             
                             
                             
                             
                             $vehicle_number="";
                             $vehicle = $this->Main_model->where_names('vehicle','id',$value->vehicle_id);
                             foreach($vehicle as $vehicle_v)
                             {
                                 
                                 $vehicle_number=$vehicle_v->vehicle_number;
                                 $vehicle_id=$vehicle_v->id;
                             }
                             
                             
                             $route_name="";
                             $route = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($route as $route_v)
                             {
                                 
                                 $route_name=$route_v->name;
                                 
                             }
                             
                             
                             $driver_name="";
                             $driver_phone="";
                             $driver = $this->Main_model->where_names('driver','vehicle_id',$vehicle_id);
                             foreach($driver as $driver_v)
                             {
                                 
                                 $driver_name=$driver_v->name;
                                 $driver_phone=$driver_v->phone;
                             }
                             
                             
                             
                             
                             if($assigen_status=='1')
                             {
                                 $statusval="Waiting";
                             }
                             
                             
                             if($assigen_status=='2')
                             {
                                 $statusval="Trip Started";
                             }
							    
							  
                             if($assigen_status=='3')
                             {
                                 $statusval="Delivered";
                             }           	
                        

                     	 	$array[] = array(
    
                                'no' => $i,
                     	 		'id' => $value->id, 
                     	 		'base_id' => base64_encode($value->id), 
                     	 		'order_no' => $value->order_no, 
                     	 		'name' => $company_name, 
                     	 		'email' => $email, 
                     	 		'phone' => $phone, 
                     	 		'totalamount' => round($totalamount,2), 
                                'commission' => round($commission,2), 
                     	 		'reason' => $value->reason, 
                     	 		'sort_id' => $value->sort_id, 
                     	 		'vehicle_number' => $vehicle_number,
                     	 		'driver_phone' => $driver_phone,
                     	 		'driver_name' => $driver_name,
                     	 		'route_name'=>$route_name,
                     	 		'address' => $address,
                     	 		'statusval'=>$statusval,
                     	 		'assign_status' =>  $value->assign_status, 
                     	 		'order_base' =>  $value->finance_status, 
                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                                'create_time' => $value->create_time
    
                     	 	);
                 	 	
                 	 	
                 	 	
                       }


                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
		
		public function fetchCustomerdetails()
	{
	    
	    
	    
	    
	    
	                 $form_data = json_decode(file_get_contents("php://input"));
	                 $tablename= $form_data->tablename;
	                 $order_id= $form_data->id;
	               
                     $i=1;
                     $array =array();
                 	 $result= $this->Main_model->where_names($tablename,'id',$order_id);
                 	 
                 	 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	         $tablename_sub="order_product_list_process";
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                 	     
                 	     
                       
                           if($route_id==0)
                           {
                               $route_id_base=0;
                           }
                           else{
                               $route_id_base=$value->route_id;
                           }
                       
                       
                      
                           
                       
                        
                             $company_name= "";
                             $email= "";
                             $phone= "";
                             $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                $map=$csval->google_map_link;
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                                 
                                 
                                 
                             }
                             
                             
                             if($value->customer_address_id!="")
                             {
                             
                             
                                     $customers_adddrss = $this->Main_model->where_names('customers_adddrss','id',$value->customer_address_id);
                                     foreach($customers_adddrss as $customers_adddrss_v)
                                     {
                                         $company_name=$customers_adddrss_v->name;
                                         $phone=$customers_adddrss_v->phone;
                                         $map=$customers_adddrss_v->google_map_link;
                                         $address=$customers_adddrss_v->address1.' '.$customers_adddrss_v->address2.' '.$customers_adddrss_v->landmark.' '.$customers_adddrss_v->zone.' '.$customers_adddrss_v->pincode;
                                        
                                     }
                             
                             }
                             
                             
                           
                          
                             
                             
                             
                             
                             $vehicle_number="";
                             $vehicle = $this->Main_model->where_names('vehicle','route_id',$value->route_id);
                             foreach($vehicle as $vehicle_v)
                             {
                                 
                                 $vehicle_number=$vehicle_v->vehicle_number;
                                 $vehicle_id=$vehicle_v->id;
                             }
                             
                             
                             $route_name="";
                             $route = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($route as $route_v)
                             {
                                 
                                 $route_name=$route_v->name;
                                 
                             }
                             
                             
                             $driver_name="";
                             $driver_phone="";
                             $driver = $this->Main_model->where_names('driver','vehicle_id',$vehicle_id);
                             foreach($vehicle as $driver_v)
                             {
                                 
                                 $driver_name=$driver_v->name;
                                 $driver_phone=$driver_v->phone;
                             }
                             
                             
                             
                             
                             if($assigen_status=='1')
                             {
                                 $statusval="Waiting";
                             }
                             
                             
                             if($assigen_status=='2')
                             {
                                 $statusval="Trip Started";
                             }
							    
							  
                             if($assigen_status=='3')
                             {
                                 $statusval="Delivered";
                             }           	
                             
                             
                             
                             if($value->delivery_status==1)
                             {
                                 $delivery_status="Own Scope";
                             }
                             else
                             {
                                  $delivery_status="Client Scope";
                             }
                             
                             if($value->payment_image!="")
                             {
                                $payment_image= base_url().$value->payment_image;
                             }
                             else
                             {
                                 $payment_image=0;
                             }

                     	 	$array = array(
    
                                'no' => $i,
                     	 		'id' => $value->id, 
                     	 		'base_id' => base64_encode($value->id), 
                     	 		'order_no' => $value->order_no, 
                     	 		'name' => $company_name, 
                     	 		'email' => $email, 
                     	 		'phone' => $phone,
                     	 		'map' => $map, 
                     	 		'payment_mode' => $value->payment_mode,
                     	 		'payment_image' =>$payment_image,
                     	 		'reference_no' => $value->reference_no,
                     	 		'delivery_mode' => $value->delivery_mode, 
                     	 		'delivery_status' => $value->delivery_status, 
                     	 		'delivery_status_name' => $delivery_status, 
                     	 		'delivery_charge' => round($value->delivery_charge,2), 
                     	 		'totalamount' => round($totalamount+$value->delivery_charge,2), 
                                'commission' => round($commission,2), 
                     	 		'reason' => $value->reason, 
                     	 		'sort_id' => $value->sort_id, 
                     	 		'vehicle_number' => $vehicle_number,
                     	 		'driver_phone' => $driver_phone,
                     	 		'driver_name' => $driver_name,
                     	 		'route_name'=>$route_name,
                     	 		'address' => $address,
                     	 		'statusval'=>$statusval,
                     	 		'assign_status' =>  $value->assign_status, 
                     	 		'order_base' =>  $value->finance_status, 
                     	 		'create_date' => date('d-m-Y',strtotime($value->trip_start_date)).' '.$value->trip_start_time, 
                               
    
                     	 	);
                 	 	
                 	 	
                

                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	public function fetchInvoiceloop()
	{
	    
	    
	                 $form_data = json_decode(file_get_contents("php://input"));
	                 $tablename= $form_data->tablename;
	                 $tablename_sub=$form_data->tablename_sub;
	                 $order_id= $form_data->id;
	                 
	                $array=array();
	                $resultsub=  $this->db->query("SELECT address_id,order_id FROM $tablename_sub  WHERE order_id='".$order_id."' AND deleteid=0 GROUP BY address_id");
                    $resultsubcheck=$resultsub->result();
                    $i=1;
                    foreach ($resultsubcheck as  $value) {
                         
                         	$array[] = array(
                         	    
                                    'no' => $i,
                         	 		'address_id' => $value->address_id,
                         	 		'order_id' => $value->order_id,
                         	 		'base_order_id' => base64_encode($value->order_id)
                         	 	
                         	);
                         	
                         $i++;	
                     }
                    

	                 
	                 
	          echo json_encode($array);
	                 
	    
	    
	}
	
	
		public function fetchCustomerdetails_view_order()
	{
	    
	    
	    
	    
	    
	                 $form_data = json_decode(file_get_contents("php://input"));
	                 $tablename= $form_data->tablename;
	                 $tablename_sub=$form_data->tablename_sub;
	                 $order_id= $form_data->id;
	               
                     $i=1;
                     $array =array();
                 	 $result= $this->Main_model->where_names($tablename,'id',$order_id);
                 	 
                 	 
                 
                 
                 
                 
                 
                 	 
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	         
                 	     
                 	         $totalamount=0;
                         	 $commission=0;
                         	 $resulttotal= $this->Main_model->where_names_two_order_by($tablename_sub,'order_id',$value->id,'deleteid','0','id','DESC');
                         	 foreach ($resulttotal as  $tot) {
                         	   $totalamount+=$tot->amount+$tot->commission;
                         	   $commission+=$tot->commission;
                         	 }
                       
                 	     
                 	     
                       
                           if($route_id==0)
                           {
                               $route_id_base=0;
                           }
                           else{
                               $route_id_base=$value->route_id;
                           }
                       
                       
                      
                           
                       
                        
                             $company_name= "";
                             $email= "";
                             $phone= "";
                             $address="";
                             $customers = $this->Main_model->where_names('customers','id',$value->customer_id);
                             foreach($customers as $csval)
                             {
                                 
                                $company_name= $csval->company_name;
                                $email= $csval->email;
                                $phone= $csval->phone;
                                $map=$csval->google_map_link;
                                $address=$csval->address1.' '.$csval->address2.' '.$csval->landmark.' '.$csval->zone.' '.$csval->pincode;
                                 
                                 
                                 
                                 
                             }
                             
                             
                             if($value->customer_address_id!="")
                             {
                             
                             
                                     $customers_adddrss = $this->Main_model->where_names('customers_adddrss','id',$value->customer_address_id);
                                     foreach($customers_adddrss as $customers_adddrss_v)
                                     {
                                         $company_name=$customers_adddrss_v->name;
                                         $phone=$customers_adddrss_v->phone;
                                         $map=$customers_adddrss_v->google_map_link;
                                         $address=$customers_adddrss_v->address1.' '.$customers_adddrss_v->address2.' '.$customers_adddrss_v->landmark.' '.$customers_adddrss_v->zone.' '.$customers_adddrss_v->pincode;
                                        
                                     }
                             
                             }
                             
                             
                           
                          
                             
                             
                             
                             
                             $vehicle_number="";
                             $vehicle = $this->Main_model->where_names('vehicle','route_id',$value->route_id);
                             foreach($vehicle as $vehicle_v)
                             {
                                 
                                 $vehicle_number=$vehicle_v->vehicle_number;
                                 $vehicle_id=$vehicle_v->id;
                             }
                             
                             
                             $route_name="";
                             $route = $this->Main_model->where_names('route','id',$value->route_id);
                             foreach($route as $route_v)
                             {
                                 
                                 $route_name=$route_v->name;
                                 
                             }
                             
                             
                             $driver_name="";
                             $driver_phone="";
                             $driver = $this->Main_model->where_names('driver','vehicle_id',$vehicle_id);
                             foreach($vehicle as $driver_v)
                             {
                                 
                                 $driver_name=$driver_v->name;
                                 $driver_phone=$driver_v->phone;
                             }
                             
                             
                             
                             
                             if($assigen_status=='1')
                             {
                                 $statusval="Waiting";
                             }
                             
                             
                             if($assigen_status=='2')
                             {
                                 $statusval="Trip Started";
                             }
							    
							  
                             if($assigen_status=='3')
                             {
                                 $statusval="Delivered";
                             }           	
                             
                             
                             
                             if($value->delivery_status==1)
                             {
                                 $delivery_status="Own Scope";
                             }
                             else
                             {
                                  $delivery_status="Client Scope";
                             }

                     	 	$array = array(
    
                                'no' => $i,
                     	 		'id' => $value->id, 
                     	 		'base_id' => base64_encode($value->id), 
                     	 		'order_no' => $value->order_no, 
                     	 		'name' => $company_name, 
                     	 		'email' => $email, 
                     	 		'phone' => $phone,
                     	 		'map' => $map, 
                     	 		'payment_mode' => $value->payment_mode,
                     	 		'delivery_status' => $value->delivery_status, 
                     	 		'delivery_mode' => $value->delivery_mode, 
                     	 		'delivery_status_name' => $delivery_status, 
                     	 		'delivery_charge' => round($value->delivery_charge,2), 
                     	 		'totalamount' => round($totalamount+$value->delivery_charge,2), 
                                'commission' => round($commission,2), 
                     	 		'reason' => $value->reason, 
                     	 		'sort_id' => $value->sort_id, 
                     	 		'vehicle_number' => $vehicle_number,
                     	 		'driver_phone' => $driver_phone,
                     	 		'driver_name' => $driver_name,
                     	 		'route_name'=>$route_name,
                     	 		'address' => $address,
                     	 		'statusval'=>$statusval,
                     	 		'assign_status' =>  $value->assign_status, 
                     	 		'order_base' =>  $value->finance_status, 
                     	 		'create_date' => date('d-m-Y',strtotime($value->trip_start_date)).' '.$value->trip_start_time, 
                               
    
                     	 	);
                 	 	
                 	 	
                

                      $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	

    public function fetch_single_data_total()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $discount=0;
                     $fullqty=0;
                     
                       $nos=0;
                       $unit=0;
                       $fact=0;
                       $commission=0;
                       $amounttotal_with_out_commission=0;
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                     $convert=$form_data->convert;
                    
    	             $result= $this->Main_model->where_names_two_order_by($tablename,'order_id',$_GET['order_id'],'deleteid','0','id','DESC');
                 	 foreach ($result as  $value) {

                 	   $amounttotal+=round($value->rate*$value->qty+$value->commission,3);
                 	   
                 	   $amounttotal_with_out_commission+=round($value->rate*$value->qty,3);

                       $Meter_to_Sqr_feet+=$value->Meter_to_Sqr_feet;
                       $Sqr_feet_to_Meter+=$value->Sqr_feet_to_Meter;

                       
                       $commission+=$value->commission;
                       
                       
                       $fullqty+=$value->qty;
                       
                       $nos+=$value->nos;
                       $unit+=$value->unit;
                       $fact+=$value->fact;
                      
	                 	
                 	 }
                 	 
                 	 
                 	  $resultdis= $this->Main_model->where_names_two_order_by($tablenamemain,'id',$_GET['order_id'],'deleteid','0','id','DESC');
                 	  foreach ($resultdis as  $valuedis) {

                 	   $production_assign= $valuedis->production_assign;
                 	   $discount= $valuedis->discount;
                       $order_no= $valuedis->order_no;
                       $user_id= $valuedis->user_id;
                       $user_id= $valuedis->user_id;
                       $create_date=date('d/m/Y',strtotime($valuedis->create_date));
                       $create_time=$valuedis->create_time;
                       $reason=$valuedis->reason;
                       

                      
	                 	
                 	 }
                 	 
                 	 
                 	      $salesphone="";
                 	      $salesname="";
                 	 $resultsales= $this->Main_model->where_names('admin_users','id',$user_id);
                 	 foreach ($resultsales as  $valuesales) {
                 	     
                 	      $salesphone=$valuesales->phone;
                 	      $salesphone2=$valuesales->phone2;
                 	      $salesname=$valuesales->name;
                 	 }
                 	 
                 	 


                      $array = array(
                            'order_no_id' => $order_no,
                            'user_id' => $user_id,
                            'salesphone' => $salesphone,
                            'salesphone2' => $salesphone2,
                            'salesname' => $salesname,
                            'reason' => $reason,
                            'production_assign' => $production_assign,
                            'create_date' => $create_date,
                            'create_time' => $create_time,
                            'fulltotal' => round($amounttotal,4),
                            'discountfulltotal' => round($amounttotal-$discount),
                            'totalitems' => count($result),
                            'discount' => round($discount),
                            'commission' => round($commission),
                            'amounttotal_with_out_commission'=>round($amounttotal_with_out_commission,2),
                            'Meter_to_Sqr_feet'=>round($Meter_to_Sqr_feet,3),
                            'Sqr_feet_to_Meter'=>round($Sqr_feet_to_Meter,3),
                            'NOS'=>round($nos,3),
                            'UNIT'=>round($unit,3),
                            'FACT'=>round($fact,3),
                            'fullqty'=>round($fullqty,3)

                      );

                    echo json_encode($array);


    }
    
    
    
    
    
    
    
    
     public function fetch_single_data_totaldel()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $discount=0;
                     $fullqty=0;
                     
                       $nos=0;
                       $unit=0;
                       $fact=0;
                       $commission=0;
                       $amounttotal_with_out_commission=0;
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                     $convert=$form_data->convert;
                    
    	             $result= $this->Main_model->where_names_two_order_by($tablename,'order_id',$_GET['order_id'],'deleteid','0','id','DESC');
                 	 foreach ($result as  $value) {


                       if($value->paricel_mode==1)
                       {
                                  $amounttotal+=round($value->rate*$value->modify_qty+$value->commission,3);
                 	              $amounttotal_with_out_commission+=round($value->rate*$value->modify_qty,3);
                 	              $fullqty+=$value->modify_qty;
                           
                       }
                       else
                       {
                                $amounttotal+=round($value->rate*$value->qty+$value->commission,3);
                 	            $amounttotal_with_out_commission+=round($value->rate*$value->qty,3);
                 	            $fullqty+=$value->qty;
                       }

                 	  

                       $Meter_to_Sqr_feet+=$value->Meter_to_Sqr_feet;
                       $Sqr_feet_to_Meter+=$value->Sqr_feet_to_Meter;
                       $commission+=$value->commission;
                       
                       
                       
                       
                      
                       
                       $nos+=$value->nos;
                       $unit+=$value->unit;
                       $fact+=$value->fact;
                      
	                 	
                 	 }
                 	 
                 	 
                 	  $resultdis= $this->Main_model->where_names_two_order_by($tablenamemain,'id',$_GET['order_id'],'deleteid','0','id','DESC');
                 	  foreach ($resultdis as  $valuedis) {

                 	   $production_assign= $valuedis->production_assign;
                 	   $discount= $valuedis->discount;
                       $order_no= $valuedis->order_no;
                       $user_id= $valuedis->user_id;
                       $user_id= $valuedis->user_id;
                       $paricel_mode=$valuedis->paricel_mode;
                       $create_date=date('d/m/Y',strtotime($valuedis->create_date));
                       $create_time=$valuedis->create_time;
                       $reason=$valuedis->reason;
                       

                      
	                 	
                 	 }
                 	 
                 	 
                 	      $salesphone="";
                 	      $salesname="";
                 	 $resultsales= $this->Main_model->where_names('admin_users','id',$user_id);
                 	 foreach ($resultsales as  $valuesales) {
                 	     
                 	      $salesphone=$valuesales->phone;
                 	      $salesphone2=$valuesales->phone2;
                 	      $salesname=$valuesales->name;
                 	 }
                 	 
                 	 


                      $array = array(
                            'order_no_id' => $order_no,
                            'user_id' => $user_id,
                            'salesphone' => $salesphone,
                            'salesphone2' => $salesphone2,
                            'salesname' => $salesname,
                            'reason' => $reason,
                            'paricel_mode'=>$paricel_mode,
                            'production_assign' => $production_assign,
                            'create_date' => $create_date,
                            'create_time' => $create_time,
                            'fulltotal' => round($amounttotal,4),
                            'discountfulltotal' => round($amounttotal-$discount),
                            'totalitems' => count($result),
                            'discount' => round($discount),
                            'commission' => round($commission),
                            'amounttotal_with_out_commission'=>round($amounttotal_with_out_commission,2),
                            'Meter_to_Sqr_feet'=>round($Meter_to_Sqr_feet,3),
                            'Sqr_feet_to_Meter'=>round($Sqr_feet_to_Meter,3),
                            'NOS'=>round($nos,3),
                            'UNIT'=>round($unit,3),
                            'FACT'=>round($fact,3),
                            'fullqty'=>round($fullqty,3)

                      );

                    echo json_encode($array);


    }
    
    
    
    
    
    
    
    
    
    
    
    public function fetch_single_data_total_vendor()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $discount=0;
                     $fullqty=0;
                     
                       $nos=0;
                       $unit=0;
                       $fact=0;
                       $commission=0;
                       $amounttotal_with_out_commission=0;
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                     $convert=$form_data->convert;
                    
    	              
    	              
    	              
    	          
    	            $result=  $this->db->query("SELECT a.* FROM $tablename as a JOIN product_list as b ON b.id=a.product_id WHERE a.order_id='".$_GET['order_id']."' AND b.link_to_purchase=1 AND a.deleteid=0 ORDER BY a.sort_id ASC");
                 		$result=$result->result();
                 		
                 	 foreach ($result as  $value) {

                 	   $amounttotal+=round($value->rate*$value->qty+$value->commission,3);
                 	   
                 	   $amounttotal_with_out_commission+=round($value->rate*$value->qty,3);

                       $Meter_to_Sqr_feet+=$value->Meter_to_Sqr_feet;
                       $Sqr_feet_to_Meter+=$value->Sqr_feet_to_Meter;

                       
                       $commission+=$value->commission;
                       
                       
                       $fullqty+=$value->qty;
                       
                       $nos+=$value->nos;
                       $unit+=$value->unit;
                       $fact+=$value->fact;
                      
	                 	
                 	 }
                 	 
                 	 
                 	  $resultdis= $this->Main_model->where_names_two_order_by($tablenamemain,'id',$_GET['order_id'],'deleteid','0','id','DESC');
                 	 
                 	 
                 	 
                 	  foreach ($resultdis as  $valuedis) {

                 	  

                       $discount= $valuedis->discount;
                       $order_no= $valuedis->order_no;
                       $user_id= $valuedis->user_id;
                       $user_id= $valuedis->user_id;
                       $create_date=date('d/m/Y',strtotime($valuedis->create_date));
                       $create_time=$valuedis->create_time;
                       $reason=$valuedis->reason;
                       

                      
	                 	
                 	 }
                 	 
                 	 
                 	      $salesphone="";
                 	      $salesname="";
                 	 $resultsales= $this->Main_model->where_names('admin_users','id',$user_id);
                 	 foreach ($resultsales as  $valuesales) {
                 	     
                 	      $salesphone=$valuesales->phone;
                 	      $salesphone2=$valuesales->phone2;
                 	      $salesname=$valuesales->name;
                 	 }
                 	 
                 	 


                      $array = array(
                            'order_no_id' => $order_no,
                            'user_id' => $user_id,
                            'salesphone' => $salesphone,
                            'salesphone2' => $salesphone2,
                            'salesname' => $salesname,
                            'reason' => $reason,
                            'create_date' => $create_date,
                            'create_time' => $create_time,
                            'fulltotal' => round($amounttotal,4),
                            'discountfulltotal' => round($amounttotal-$discount),
                            'totalitems' => count($result),
                            'discount' => round($discount),
                            'commission' => round($commission),
                            'amounttotal_with_out_commission'=>round($amounttotal_with_out_commission,2),
                            'Meter_to_Sqr_feet'=>round($Meter_to_Sqr_feet,3),
                            'Sqr_feet_to_Meter'=>round($Sqr_feet_to_Meter,3),
                            'NOS'=>round($nos,3),
                            'UNIT'=>round($unit,3),
                            'FACT'=>round($fact,3),
                            'fullqty'=>round($fullqty,3)

                      );

                    echo json_encode($array);


    }
    
    
    
    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $id=$form_data->order_product_id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['sub_product_id']= $value->sub_product_id; 
                       $imagestatus=1;
                      if($value->reference_image=='')
                      {
                          $imagestatus=0;
                      }
                      
                      $output['reference_image']= base_url().$value->reference_image; 
                      $output['imagestatus']= $imagestatus; 
                      $output['value_id']= $value->value_id; 
                     

                     
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
      public function fetchcustomerorderdata()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                     $customer_id=0;
    	             $result= $this->Main_model->where_names_two_order_by($tablenamemain,'id',$_GET['order_id'],'deleteid','0','id','DESC');
    	             
    	               $approx=0;
    	               $order_base=0;
    	             
    	               $commission_check=0;
                       $packaging=0;
                       $print=0;
                       $others=0;
                       
                       
                       $competitorname="";
                       $details="";
    	             
                 	 foreach ($result as  $valuec) {

                 	   $customer_id=$valuec->customer_id;
                       $order_base=$valuec->order_base;
                       $finance_status=$valuec->finance_status;
                       
                       $commission_check=$valuec->commission_check;
                       $packaging=$valuec->packaging;
                       $print=$valuec->print;
                       $others=$valuec->others;
                       
                       
                       $competitorname=$valuec->competitorname;
                       $details=$valuec->details;
                       
                       
                       
                       
                       $customer_address_id=$valuec->customer_address_id;
                       
                       
                       if($valuec->approx!="")
                       {
                           $approx=$valuec->approx;
                       }
                       
                      
	                 	
                 	 }
                 	 
                 	 
                 	 $delivery_address="";
                 	 $de_address= $this->Main_model->where_names('customers_adddrss','id',$customer_address_id);
                 	 foreach ($de_address as  $valuedd) {
                 	     
                 	     $delivery_address= $valuedd->address1.' '.$valuedd->address2.' '.$valuedd->zone.' '.$valuedd->city.' '.$valuedd->pincode.' '.$valuedd->state;
                                 
                 	 }
                 	 
                 	  $fulltotal=0;
                 	  
                 	 
                 	  
                 	  $resultorder=  $this->db->query("SELECT SUM(b.commission) as total_commission,SUM(b.amount) as total_amount,SUM(a.discount) as total_discount FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id WHERE a.customer_id='".$customer_id."'  AND a.finance_status='5'  AND b.deleteid=0 AND a.deleteid=0 AND a.order_base=1");
                 	  $resultorder=$resultorder->result();
                 	  
                 	  
                 
                 	  
                 	  foreach ($resultorder as  $valueorder) {
                 	     
                 	   $total_amount=  $valueorder->total_amount+$valueorder->total_commission;
                 	   $total_discount=   $valueorder->total_discount;
                 	   $fulltotal=$total_amount-$total_discount;
                 	     
                 	  }
                 	  
                 	  
                 
                 	 
                 	 $output=array();
                     $resultcc= $this->Main_model->where_names('customers','id',$customer_id);
                 	 foreach ($resultcc as  $value) {
                 	     
                 	     
                 	              $output['id']= $value->id; 
                                  $output['name']= $value->name; 
                                  $output['company_name']= $value->company_name;
                                  $output['email']= $value->email;
                                  $output['phone']= $value->phone;
                                  $output['gst']= $value->gst;
                                  $output['pin']= $value->pin;
                                  $output['approx']= $approx ;
                                  $output['address1']= $value->address1; 
                                  $output['address2']= $value->address2;
                                  
                                  
                                              
                                 if($customer_address_id!='')
                                 {
                                    $output['delivery_address']= $delivery_address;
                                 
                                 }
                                 else
                                 {
                                    $output['delivery_address']= $value->address1.' '.$value->address2.' '.$value->zone.' '.$value->city.' '.$value->pincode.' '.$value->state;
                                  
                                 }
                                              
                     
                     
                                  
                                  $output['pincode']= $value->pincode;
                                  $output['landmark']= $value->landmark;
                                  $output['locality']= $value->locality;
                                  $output['city']= $value->city;
                                  $output['state']= $value->state;
                                  $output['sales_group']= $value->sales_group;
                                  $output['landline']= $value->landline;
                                  $output['order_base']= $order_base;
                                  $output['finance_status']= $finance_status;
                                  
                                  
                                     $output['commission_check']= $commission_check;
                                     $output['packaging']= $packaging;
                                     $output['print']= $print;
                                     $output['others']= $others;
                                     
                                     
                                     $output['competitorname']= $competitorname;
                                     $output['details']= $details;
                                  
                                  
                                
                                  
                                   $localityname="";
                                   $resultlocality= $this->Main_model->where_names('locality','id',$value->locality);
                                   foreach($resultlocality as $vl)
                                   {
                                       
                                       $localityname=$vl->name;
                                   }
                                   
                                    $user_group_name ='';
                                    $user_group = $this->Main_model->where_names('sales_group','id',$value->sales_group);
                                    foreach ($user_group as  $row) {
                                    	$user_group_name=$row->name;
                                    }
                                   
                                   
                                  
                                  $output['address']= $value->address1.' , '.$value->address2.' '.$value->landmark.' , '.$localityname.' , '.$value->pincode;
                                  
                                  $output['sales_group_name']= $user_group_name;
                                  $output['zone']= $value->zone;
                                  $output['feedback_details']= $value->feedback_details;
                                  $output['credit_limit']= $value->credit_limit.' Rs';
                                  $output['credit_period']= $value->credit_period;
                                  $output['ratings']= $value->ratings;
                                  $output['locality_name']= $localityname;
                                  
                        
                                  $useage=$fulltotal/$value->credit_limit*100;
                                  
                                  
                                  if(is_nan($useage)==1)
                                  {
                                       $useage=0;
                                  }
                                 
                                 
                                 
                                  
                                  $output['useage']= round($useage,1);
                                  $output['fulltotal_usage']= round($fulltotal,1).' Rs';
                                  
                                  
                                  
                                  
                                  if($value->ratings=="")
                                  {
                                      $output['ratings']= 0;
                                  }
                                  else
                                  {
                                      $output['ratings']= $value->ratings;
                                  }
                                  
                                  
                                  
                                  $output['feedback_sub']= $value->feedback_sub;
                             	     
                 	     
                 	 }


                    

                    echo json_encode($output);


    }
    
    
    
    
    
    
    
    
    
    public function fetchCustomerorderdelevieryaddress()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                     $customer_id=0;
    	             $result= $this->Main_model->where_names_two_order_by($tablenamemain,'id',$_GET['order_id'],'deleteid','0','id','DESC');
    	             
    	            
    	             $order_base=0;
                 	 foreach ($result as  $valuec) {

                 	   $customer_id=$valuec->customer_id;
                       $order_base=$valuec->order_base;
                       $customer_address_id=$valuec->customer_address_id;
                      
	                 	
                 	 }
                 	 
                 	 
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
   
    
    
    
    
    
    
    
    
    
    
    
        public function fetchpricelist()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                   
                 	 
                 	 
                 	 $result= $this->Main_model->where_names('competitor_price_list','product_id',$form_data->product_id);
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($result as  $value) {
                       
                      
                 	 
                 	 if($value->deleteid==0)	
                 	 {
                 	     
                 	 
                                 	 	$array[] = array(
                                 	 	    
                                 	 	    
                                 	 	    'no' => $i, 
                                            'sqft' => $value->sqft, 
                                 	 		'price' => $value->price, 
                                 	 		'vendor_name' => $value->vendor_name,
                                 	 		'updated_by' => $value->updated_by
                                 	 		
                
                                 	 	);
                                 	 	
                 	 }


                            $i++;

                 	 }

                    echo json_encode($array);




    }
    
    
    
    public function addresspoint()
    {
                      
                     $amounttotal =0; 
                     $Meter_to_Sqr_feet =0;
                     $Sqr_feet_to_Meter =0;
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename=$form_data->tablename_sub;
                
                
                     $datass['get_id']=$form_data->order_id;
                     $datass['customer_address_id']=$form_data->address_id;
                     
                     
                     
                                              $locality=0;
			                                  $laoclatset= $this->Main_model->where_names('customers_adddrss','id',$form_data->address_id);
        				                      foreach($laoclatset as $lolval)
        				                      {
        				                                 $locality=$lolval->locality;
        				                      }
        				                      
        				                      
        				                      $route_id=0;
			                                  $routeset= $this->Main_model->where_names('locality','id',$locality);
        				                      foreach($routeset as $routesetval)
        				                      {
        				                                 $route_id=$routesetval->route_id;
        				                      }
                                             
                                             
                     
                     
                     
                     $datass['route_id']=$route_id;
                     
                     
                     $this->Main_model->update_commen($datass,$tablenamemain);
            
    }
    
    
    
    public function fetchproduct()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

              $searchText= $_POST['search'];
              if($searchText!="")
              {

                     $result= $this->Main_model->where_id_like_and_where('product_list','product_name',$searchText,'deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = array(

                          

                            'id' => $value->id, 
                            'label' => $value->product_name,
                            'price' => $value->price,
                            'brand' => $value->brand,
                            'categories' => $value->categories,
                            'HSN_SAC' => $value->HSN_SAC,
                            'uom' => $value->uom

                        );


                     }

              }
             echo json_encode($array);
                     


              

    }
    
    
     public function fetchproduct_full()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

                     $result= $this->Main_model->where_names('product_list','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->product_name.'/';


                     }

             
                     echo json_encode($array);
                     


              

    }
    
         public function fetchproduct_full2()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

                     $result= $this->Main_model->where_names('product_list','deleteid','0');
                     foreach ($result as  $value) {


                        $array[] = $value->product_name;


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
        public function fetchproduct_full2_basecaetgary()
    {
             // $form_data= json_decode(file_get_contents("php://input"));
                $array =array();

                     $result= $this->Main_model->where_names('product_list','categories_id','3');
                     foreach ($result as  $value) {


                        $array[] = $value->product_name;


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
    
    public function fetchproduct_fullmm()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $product_id=$form_data->id;
                $convert=$form_data->convert;
                $array =array();


                     $resultpending= $this->Main_model->where_names('tiltes_calulation','deleteid','0','id','DESC');
                     
                     foreach ($resultpending as  $value) {
                         
                           
                           
                           if($convert==4)
                           {
                               $array[] = array(
                         	    'length_mm'=>$value->length_mm,
                         	    'length_feet'=>round($value->length_mm/304.8,3),
                         	    'product_name'=>$value->product_name
                               );
                           }
                           else
                           {
                               $array[] = array(
                                 'length_feet'=>round($value->length_mm/304.8,3),
                         	    'length_mm'=>round($value->length_mm/304.8,3),
                         	    'product_name'=>$value->product_name
                               );
                           }
                         
                         	


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    	public function customeradd()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
          


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->company_name!='' && $form_data->gst!='')
                     {

			                     $tablename=$form_data->tablename;
			                     $tablenamemain=$form_data->tablenamemain;
    			                   
    			                     $data['email']=$form_data->email;
    			                     $data['phone']=$form_data->phone;
    			                     $data['address1']=$form_data->address1;
                                     $data['address2']=$form_data->address2;
                                     $data['locality']=$form_data->locality;
                                 
                                  

                                      
                                     $data['zone']=$form_data->zone;
                                     $data['city']=$form_data->city;
                                     $data['pincode']=$form_data->pincode;
                                     $data['state']=$form_data->state;
                                     $data['landmark']=$form_data->landmark;
                                     
                                     $data['sales_team_id']=$form_data->sales_team_id;
                                     
                                     $data['status']=$form_data->status;
                                     $data['google_map_link']=$form_data->google_map_link;


                                        $data['feedback_sub']="";
                                        $data['feedback_details']="";
                                        $data['credit_limit']=0;
                                        $ratings=5*10;
                                        $data['ratings']=$ratings*2;


			                   
			                     $data['pin']=substr(time(), 4);
			                     $data['gst']=$form_data->gst;
			                     $data['company_name']=$form_data->company_name;
                                 $data['landline']=$form_data->landline;
                                 $data['sales_group']=$form_data->sales_group;




                                      $result= $this->Main_model->where_names($tablename,'phone',$data['phone']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Customer phone no  already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                          
				                          
				                      	     $customer_id=$this->Main_model->insert_commen($data,$tablename);
				                      	    
				                      	     $data_address['customer_id']=$customer_id;
				                      	     $data_address['name']=$form_data->company_name;
            			                     $data_address['address1']=$form_data->address1;
                                             $data_address['address2']=$form_data->address2;
                                             $data_address['locality']=$form_data->locality;
                                             $data_address['phone']=$form_data->phone;
                                             $data_address['zone']=$form_data->zone;
                                             $data_address['city']=$form_data->city;
                                             $data_address['pincode']=$form_data->pincode;
                                             $data_address['state']=$form_data->state;
                                             $data_address['landmark']=$form_data->landmark;
                                             $data_address['status']=$form_data->status;
                                             $data_address['google_map_link']=$form_data->google_map_link;
                                             
                                             
                                              $route_id=0;
			                                  $routeset= $this->Main_model->where_names('locality','id',$form_data->locality);
        				                      foreach($routeset as $routesetval)
        				                      {
        				                                 $route_id=$routesetval->route_id;
        				                      }
                                             
                                             
                                             
                                             $datass['get_id']=$form_data->order_id;
                                             $datass['customer_id']=$customer_id;
                                             $datass['route_id']=$route_id;
                                             $datass['user_id']=$this->userid;
                                             $this->Main_model->update_commen($datass,$tablenamemain);
                                             
                                             
                                             $addressid=$this->Main_model->insert_commen($data_address,'customers_adddrss');
                                             
                                             
                                             
                                             $data_addressid['get_id']=$customer_id;
                                             $data_addressid['address_id']=$addressid;
                                             $this->Main_model->update_commen($data_addressid,$tablename);
				                      	    
				                      	    
				                      	    
				                      	    $array=array('error'=>'2','massage'=>'Customer successfully Added..');
                                            echo json_encode($array);
				                      }




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 
                


	}
	
	
	
		public function customeradd_address()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
          
    

                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->phone!='' && $form_data->name!='' && $form_data->address1!='')
                     {

			                       $tablename=$form_data->tablename;
			                       $tablenamemain=$form_data->tablenamemain;
			                       
			                       
			                         
			                                  $result= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
        				                      if(count($result)>0)
        				                      {
        				                          
        				                             foreach($result as $cus)
        				                             {
        				                                 $customer_id=$cus->customer_id;
        				                             }
        				                             
        				                             if($customer_id!="")
        				                             {
        				                                 
        				                                 
        				                                   
                    				                      	     $data_address['customer_id']=$customer_id;
                    				                      	     $data_address['name']=$form_data->name;
                                			                     $data_address['address1']=$form_data->address1;
                                                                 $data_address['address2']=$form_data->address2;
                                                                 $data_address['locality']=$form_data->locality;
                                                                 $data_address['phone']=$form_data->phone;
                                                                 $data_address['zone']=$form_data->zone;
                                                                 $data_address['city']=$form_data->city;
                                                                 $data_address['pincode']=$form_data->pincode;
                                                                 $data_address['state']=$form_data->state;
                                                                 $data_address['landmark']=$form_data->landmark;
                                                                 $data_address['status']=$form_data->status;
                                                                 $data_address['google_map_link']=$form_data->google_map_link;
                                                                 $addressid=$this->Main_model->insert_commen($data_address,'customers_adddrss');
                                                                 
                                                                 
                                                                 
                                                                  $route_id=0;
                    			                                  $routeset= $this->Main_model->where_names('locality','id',$form_data->locality);
                            				                      foreach($routeset as $routesetval)
                            				                      {
                            				                                 $route_id=$routesetval->route_id;
                            				                      }
                                                                 
                                                                 
                                                                 
                                                                 $datass['get_id']=$form_data->order_id;
                                                                 $datass['customer_address_id']=$addressid;
                                                                 $datass['route_id']=$route_id;
                                                                 $this->Main_model->update_commen($datass,$tablenamemain);
                                                                 
                                                                 
                                                                 $array=array('error'=>'2','massage'=>'Customer address successfully Added..');
                                                                 echo json_encode($array);
                                             
                                                                 
                                                                 
                                                                 
                                                                 
        				                                 
        				                             }
        				                             else
        				                             {
        				                                  $array=array('error'=>'3','massage'=>'Please select Customer');
                                                          echo json_encode($array);
        				                             }
        
        				                        	 
        
        				                      }
        				                      else
        				                      {
        				                                   $array=array('error'=>'3','massage'=>'Please select Customer');
                                                           echo json_encode($array);
        				                          
        				                      }
    			                 
    			                 

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 
                


	}
	
	
	
	
	
	
	
	
			public function saveCompetitor()
	{

                  $form_data = json_decode(file_get_contents("php://input"));
                 
                  $tablename=$form_data->tablename;
			      $tablenamemain=$form_data->tablenamemain;
			                        
			      $point['get_id']=$form_data->order_id;                           
    			  $point['competitorname']=$form_data->competitorname;
    			  $point['details']=$form_data->details;
                  $this->Main_model->update_commen($point,$tablenamemain); 
                


	}
	
	
	
	
	public function pointtodriver()
	{

                  $form_data = json_decode(file_get_contents("php://input"));
                 
                  $tablename='driver';
			      $this->db->query("UPDATE $tablename SET vehicle_id='0' WHERE vehicle_id='".$form_data->vehicle_id."'");                  
			                       
			      $point['get_id']=$form_data->driver_id;                           
    			  $point['vehicle_id']=$form_data->vehicle_id;
    			  
    			  
    			  if($form_data->driver_id!="" && $form_data->vehicle_id!="")
    			  {
    			       $this->Main_model->update_commen($point,$tablename); 
    			  }
    			  
    			 
                


	}
	
	
	public function payment_collected()
	{
	       date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');

                  $form_data = json_decode(file_get_contents("php://input"));
                  
                  $order_id=$form_data->order_id;
                  $collectamount=$form_data->collectamount;
                  $checkid=$form_data->checkid;
                  $drivercharge=$form_data->drivercharge;
                  $driver_id=$form_data->driver_id;
                  $customer_id=$form_data->customer_id;
                  $fulltotal=$form_data->fulltotal;
                 
                  
                  
                  if($collectamount!="" && $drivercharge!="")
    			  {   
    			      
    			      
    			           $tablename='orders_process';
    			           $tablename_customer_ledger='customer_ledger';
    			           $tablename_driver_ledger='driver_ledger';
    			      
    			      
        			       $result_order= $this->Main_model->where_names($tablename,'id',$order_id);
        			       foreach($result_order as $val)
        			       {
        			           $payment_mode=$val->payment_mode;
        			           $reference_no=$val->reference_no;
        			           $order_no=$val->order_no;
        			       }
        			       
        			       
        			         $totalamount=0;
                             $resultpp=  $this->db->query("SELECT SUM(amount) as totalamount FROM order_product_list_process  WHERE order_id='".$order_id."' AND deleteid=0");
                             $results=$resultpp->result();
                             foreach ($results as  $valuep) {
                                 
                                 $totalamount=$valuep->totalamount;
                             }
                             
                             
                             
                             
                             
                                                                $data_address['order_id']=$order_id;
                                                                $data_address['customer_id']=$customer_id;
                                                                $data_address['payment_mode']=$payment_mode;
                                                                $data_address['order_no']=$order_no;
                                                                $data_address['reference_no']=$reference_no;
                                                                $data_address['amount']=$totalamount;
                                                                $data_address['paid_status']=$totalamount-$collectamount;
                                                                $data_address['collected_amount']=$collectamount;
                                                                $data_address['payment_date']=$date;
                                                                $data_address['payment_time']=$time;
                                                                $this->Main_model->insert_commen($data_address,$tablename_customer_ledger);
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                $data_driver['order_id']=$order_id;
                                                                $data_driver['customer_id']=$driver_id;
                                                                $data_driver['payment_mode']=$payment_mode;
                                                                $data_driver['order_no']=$order_no;
                                                                $data_driver['amount']=$drivercharge;
                                                                
                                                                if($checkid==1)
                                                                { 
                                                                    $data_driver['payout']=$drivercharge;
                                                                    $data_driver['payin']=0;
                                                                    $data_driver['paid_status']='Paid';
                                                                }
                                                                else
                                                                {  
                                                                    $data_driver['payout']=0;
                                                                    $data_driver['payin']=$drivercharge;
                                                                    $data_driver['paid_status']='Un-Paid';
                                                                }
                                                                
                                                                
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                             
                             
                             
                             
    			       
                                                			   $point['get_id']=$order_id;                           
                                                			   $point['finance_status']=5;
                                                			   $point['reason']='Payment Recived';
                                                			   $point['payment_recived_date']=$date;
                                                			   $point['payment_recived_time']=$time;
                                                			   $this->Main_model->update_commen($point,$tablename); 
                                                			        
            			        
            			        
            			        
    			        
    			        
    			  }


	}
	
	
	
	
		public function tripcomplete()
	{

                  $form_data = json_decode(file_get_contents("php://input"));
                 
                  date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                  $otp=str_replace('|','',$form_data->otp);
                  
                 
                 if($otp!="")
                 {
                     
                     
                     
                     
                 
                 
                       $order_id=$form_data->order_id;
                     
                       $paymentmode=$form_data->paymentmode;
                       $reference_no=$form_data->reference_no;
                       
                       
                        $resultpending= $this->Main_model->where_names_two_order_by('orders_process','id',$order_id,'otp',$otp,'id','DESC');
                        
                       
        	     
                        if(count($resultpending)==1)
                        {
                            
                        
                       
                       $data_address['c50rs']=$form_data->c50_rs;
                       $data_address['c100rs']=$form_data->c100_rs;
                       $data_address['c200rs']=$form_data->c200_rs;
                       $data_address['c500rs']=$form_data->c500_rs;
                       $data_address['c2000rs']=$form_data->c2000_rs;
                       $data_address['order_id']=$order_id;
                       
                       
                       
                       
                                                                 $result_order= $this->Main_model->where_names('denomination','order_id',$order_id);
                                                                 if(count($result_order)==0)
                                                                 {
                                                                     
                                                                     
                                                                           $this->Main_model->insert_commen($data_address,'denomination');
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     
                                                                     
                                                                          $datass['get_id']=$order_id;
                                                                          $this->Main_model->update_commen_where($data_address,'order_id','denomination');
                                                                     
                                                                 }
                                                
                       
                       
                       
                  $point['payment_mode']=$paymentmode;                           
                  $point['reference_no']=$reference_no;
                  $point['get_id']=$order_id;
                  $point['trip_end_date']=$date;
                  $point['trip_end_time']=$time;
                  $point['assign_status']=3;
                  $point['finance_status']=4;
                  $point['finance_status']=4;
                  $point['reason']='Trip Completed';
                  $this->Main_model->update_commen($point,'orders_process'); 
    			  
    			  
    			  
                        }
                        else
                        {
                                                                    $array=array('error'=>'1','massage'=>'OTP Is Wrong');
                                                                   echo json_encode($array);
                        }
    			  
    			                                                  
    			  
    			  
                 }
                 else
                 {
                  
                                                                   $array=array('error'=>'1','massage'=>'OTP Is required');
                                                                   echo json_encode($array);
                     
                 }
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
    			  
                


	}
	
	
	
	
	
		public function addprice()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
                 
          
    

                
                     
                     if($form_data->name!='' && $form_data->price!='')
                     {



			                                                       $data_address['product_id']=$form_data->product_id;
                    				                      	       $data_address['vendor_name']=$form_data->name;
                                			                       $data_address['price']=$form_data->price;
                                			                       $data_address['sqft']=$form_data->sqft;
                                			                       $data_address['updated_by']=$this->username;
                                			                       $addressid=$this->Main_model->insert_commen($data_address,'competitor_price_list');
                                			                       $array=array('error'=>'2','massage'=>'Price successfully Added..');
                                                                   echo json_encode($array);
                                             
                                   

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


          
                 
                


	}
	
	
		public function order_quotation_move()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=$form_data->deleteid;
                 
                 
             
                 
                 if($deleteid==0)
                 {
                     
                                                 $datassfirst['get_id']=$form_data->order_id;
                                                 $datassfirst['order_base']=1;
                                                 
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $datassfirst['reason']=1;
                                                 }
                                                 
                                                 
                                                 $this->Main_model->update_commen($datassfirst,$tablenamemain);
                                               
                     
                                            $result_order= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
                                            foreach($result_order as $orders)
                                            {
                                                
                                                                //$find['id']=$orders->id;
                                                                $find['order_no']=$orders->order_no;
                                                                $find['discount']=$orders->discount;
                                                                $find['customer_id']=$orders->customer_id;
                                                                $find['move_id']=$form_data->order_id;
                                                                $find['customer_address_id']=$orders->customer_address_id;
                                                                $find['route_id']=$orders->route_id;
                                                                $find['user_id']=$orders->user_id;
                                                                $find['create_date']=$date;
                                                                $find['create_time']=$time;
                                                                $find['status']=1;
                                                                $find['deleteid']=$deleteid;
                                                                $find['order_base']=0;
                                                                $find['commission_check']=$orders->commission_check;
                                                                
                                                                
                                                                $find['delivery_charge']=$orders->delivery_charge;
                                                                $find['delivery_status']=$orders->delivery_status;
                                                                $find['payment_mode']=$orders->payment_mode;
                                                                
                                                                $find['others']=$orders->others;
                                                                $find['print']=$orders->print;
                                                                $find['packaging']=$orders->packaging;
                                                                $find['competitorname']=$orders->competitorname;
                                                                $find['details']=$orders->details;
                                                
                                                
                                                            
                                                            
                                                                 $result_order= $this->Main_model->where_names($oldtablename,'order_no',$orders->order_no);
                                                                 if(count($result_order)==0)
                                                                 {
                                                                     
                                                                     
                                                                          $insertid= $this->Main_model->insert_commen($find,$oldtablename);
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     
                                                                          foreach($result_order as $orderst)
                                                                          {
                                                                             $insertid=$orderst->id;
                                                                          }
                                                                     
                                                                          $datass['get_id']=$form_data->order_no;
                                                                          $datass['order_base']=0;
                                                                          $datass['deleteid']=$deleteid;
                                                                          $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                                                                     
                                                                 }
                                                
                                                
                                                
                                                                 
                                                                 $this->Main_model->delete_where($oldtablename_sub,'order_id',$insertid);
                                                                
                                                                 $result_order_product= $this->Main_model->where_names($tablename_sub,'order_id',$form_data->order_id);
                                                                 foreach($result_order_product as $orders_product)
                                                                 {
                                                                     
                                                                     // $findp['id']=$orders_product->id;
                                                                      $findp['order_id']=$insertid;
                                                                      $findp['order_no']=$orders->order_no;
                                                                      $findp['product_name']=$orders_product->product_name;
                                                                      $findp['product_id']=$orders_product->product_id;
                                                                      
                                                                      
                                                                      $findp['tile_material_name']=$orders_product->tile_material_name;
                                                                      $findp['tile_material_id']=$orders_product->tile_material_id;
                                                                      
                                                                      $findp['categories_name']=$orders_product->categories_name;
                                                                      $findp['categories_id']=$orders_product->categories_id;
                                                                      
                                                                      $findp['profile']=$orders_product->profile;
                                                                      $findp['commission']=$orders_product->commission;
                                                                      
                                                                      $findp['address_id']=$orders_product->address_id;
                                                                      $findp['address_id_mark']=$orders_product->address_id_mark;
                                                                      
                                                                      
                                                                      
                                                                      
                                                                      $findp['crimp']=$orders_product->crimp;
                                                                      $findp['uom']=$orders_product->uom;
                                                                      $findp['billing_options']=$orders_product->billing_options;
                                                                      
                                                                      $findp['Meter_to_Sqr_feet']=$orders_product->Meter_to_Sqr_feet;
                                                                      $findp['Sqr_feet_to_Meter']=$orders_product->Sqr_feet_to_Meter;
                                                                      $findp['nos']=$orders_product->nos;
                                                                      $findp['unit']=$orders_product->unit;
                                                                      $findp['fact']=$orders_product->fact;
                                                                      
                                                                      $findp['section_lable']=$orders_product->section_lable;
                                                                      $findp['section_value']=$orders_product->section_value;
                                                                      
                                                                      $findp['degree']=$orders_product->degree;
                                                                      
                                                                      $findp['sub_product_id']=$orders_product->sub_product_id;
                                                                      $findp['value_id']=$orders_product->value_id;
                                                                      $findp['reference_image']=$orders_product->reference_image;
                                                                     
                                                                      
                                                                      $findp['rate']=$orders_product->rate;
                                                                      $findp['qty']=$orders_product->qty;
                                                                      $findp['amount']=$orders_product->amount;
                                                                      $findp['deleteid']=$orders_product->deleteid;
                                                                      $findp['create_date']=$orders_product->create_date;
                                                                      
                                                                      
                                                                      $this->Main_model->insert_commen($findp,$oldtablename_sub);
                                                                      
                                                                    
                                                                    
                                                                 }
                                                       
                                                
                                            }
                                            
                                            
                                            
                                               
                                            
                     
                     
                 }
                 else
                 {
                                 
                                                 $point['get_id']=$form_data->order_no;
                                                 $point['order_base']=0;
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $point['reason']="";
                                                 }
                                                
                                                 $this->Main_model->update_commen_where($point,'order_no',$tablenamemain);
                                                 
                                                 
                     
                                                 $datass['get_id']=$form_data->order_no;
                                                 $datass['deleteid']=$deleteid;
                                                 $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                     
                 }
                 
               
                 
          


              
                 
                


	}
	
	
		public function order_quotation_move_finish()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=0;
                 
                 
             
                 
                 if($deleteid==0)
                 {
                     
                                                 $datassfirst['get_id']=$form_data->order_id;
                                                 $datassfirst['order_base']=1;
                                                 
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $datassfirst['reason']=1;
                                                 }
                                                 
                                                 
                                                 $this->Main_model->update_commen($datassfirst,$tablenamemain);
                                               
                     
                                            $result_order= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
                                            foreach($result_order as $orders)
                                            {
                                                
                                                                //$find['id']=$orders->id;
                                                                $find['order_no']=$orders->order_no;
                                                                $find['discount']=$orders->discount;
                                                                $find['customer_id']=$orders->customer_id;
                                                                $find['move_id']=$form_data->order_id;
                                                                $find['customer_address_id']=$orders->customer_address_id;
                                                                $find['route_id']=$orders->route_id;
                                                                $find['user_id']=$orders->user_id;
                                                                $find['create_date']=$date;
                                                                $find['create_time']=$time;
                                                                $find['status']=1;
                                                                $find['deleteid']=$deleteid;
                                                                $find['order_base']=1;
                                                                $find['finance_status']=0;
                                                                $find['commission_check']=$orders->commission_check;
                                                                
                                                                
                                                                $find['delivery_charge']=$orders->delivery_charge;
                                                                $find['delivery_status']=$orders->delivery_status;
                                                                $find['payment_mode']=$orders->payment_mode;
                                                                $find['paricel_mode']=$orders->paricel_mode;
                                                                $find['reason']='Process To Production';
                                                                
                                                                $find['others']=$orders->others;
                                                                $find['print']=$orders->print;
                                                                $find['packaging']=$orders->packaging;
                                                                $find['competitorname']=$orders->competitorname;
                                                                $find['details']=$orders->details;
                                                
                                                
                                                            
                                                            
                                                                 $result_order= $this->Main_model->where_names($oldtablename,'order_no',$orders->order_no);
                                                                 if(count($result_order)==0)
                                                                 {
                                                                     
                                                                     
                                                                          $insertid= $this->Main_model->insert_commen($find,$oldtablename);
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     
                                                                          foreach($result_order as $orderst)
                                                                          {
                                                                             $insertid=$orderst->id;
                                                                          }
                                                                     
                                                                          $datass['get_id']=$form_data->order_no;
                                                                          $datass['order_base']=1;
                                                                          $datass['finance_status']=0;
                                                                          $datass['deleteid']=$deleteid;
                                                                          $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                                                                     
                                                                 }
                                                
                                                
                                                
                                                                 
                                                                 $this->Main_model->delete_where($oldtablename_sub,'order_id',$insertid);
                                                                
                                                                 $result_order_product= $this->Main_model->where_names($tablename_sub,'order_id',$form_data->order_id);
                                                                 foreach($result_order_product as $orders_product)
                                                                 {
                                                                     
                                                                     // $findp['id']=$orders_product->id;
                                                                      $findp['order_id']=$insertid;
                                                                      $findp['order_no']=$orders->order_no;
                                                                      $findp['product_name']=$orders_product->product_name;
                                                                      $findp['product_id']=$orders_product->product_id;
                                                                      
                                                                      $findp['tile_material_name']=$orders_product->tile_material_name;
                                                                      $findp['tile_material_id']=$orders_product->tile_material_id;
                                                                      
                                                                      $findp['categories_name']=$orders_product->categories_name;
                                                                      $findp['categories_id']=$orders_product->categories_id;
                                                                      
                                                                      $findp['profile']=$orders_product->profile;
                                                                      $findp['commission']=$orders_product->commission;
                                                                      
                                                                      $findp['address_id']=$orders_product->address_id;
                                                                      $findp['address_id_mark']=$orders_product->address_id_mark;
                                                                      $findp['paricel_mode']=$orders_product->paricel_mode;
                                                                     
                                                                      
                                                                      
                                                                      
                                                                      $findp['crimp']=$orders_product->crimp;
                                                                      $findp['Meter_to_Sqr_feet']=$orders_product->Meter_to_Sqr_feet;
                                                                      $findp['Sqr_feet_to_Meter']=$orders_product->Sqr_feet_to_Meter;
                                                                      $findp['nos']=$orders_product->nos;
                                                                      $findp['uom']=$orders_product->uom;
                                                                      $findp['billing_options']=$orders_product->billing_options;
                                                                      $findp['unit']=$orders_product->unit;
                                                                      $findp['fact']=$orders_product->fact;
                                                                      
                                                                      $findp['section_lable']=$orders_product->section_lable;
                                                                      $findp['section_value']=$orders_product->section_value;
                                                                      
                                                                      $findp['degree']=$orders_product->degree;
                                                                      
                                                                      $findp['sub_product_id']=$orders_product->sub_product_id;
                                                                      $findp['value_id']=$orders_product->value_id;
                                                                      $findp['reference_image']=$orders_product->reference_image;
                                                                     
                                                                      
                                                                      $findp['rate']=$orders_product->rate;
                                                                      $findp['qty']=$orders_product->qty;
                                                                      $findp['amount']=$orders_product->amount;
                                                                      $findp['deleteid']=$orders_product->deleteid;
                                                                      $findp['create_date']=$orders_product->create_date;
                                                                      
                                                                      
                                                                      $this->Main_model->insert_commen($findp,$oldtablename_sub);
                                                                      
                                                                    
                                                                    
                                                                 }
                                                       
                                                
                                            }
                                            
                                            
                                            
                                               
                                            
                     
                     
                 }
                 else
                 {
                                 
                                                 $point['get_id']=$form_data->order_no;
                                                 $point['order_base']=0;
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $point['reason']="";
                                                 }
                                                
                                                 $this->Main_model->update_commen_where($point,'order_no',$tablenamemain);
                                                 
                                                 
                     
                                                 $datass['get_id']=$form_data->order_no;
                                                 $datass['deleteid']=$deleteid;
                                                 $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                     
                 }
                 
               
                 
          


              
                 
                


	}
	
	
		public function order_quotation_move_finish_by_deilvered()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                  $oldtablename_sub=$form_data->movetablename_sub;
                  $oldtablename=$form_data->movetablename;
                 
                  $tablenamemain=$form_data->tablenamemain;
                  $tablename_sub=$form_data->tablename_sub;
                 
            
                  $order_id=$form_data->order_id;
                  $order_no=$form_data->order_no;
                  $deleteid=0;
                 
                 
               
                     
                 $datassfirst['get_id']=$form_data->order_id;
                 $datassfirst['order_base']=1;
                 $datassfirst['reason']="Process To Production";
                 $this->Main_model->update_commen($datassfirst,$tablenamemain);
                                               
                  
                  
                 $datassfirst1['get_id']=$form_data->order_id;
                // $datassfirst1['order_base']=1;
                 $datassfirst1['reason']="Process To Production";
                 $this->Main_model->update_commen($datassfirst1,'orders_quotation');
                         


	}
	
	
	
		public function order_quotation_move_status()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
               
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 $orderstatus=$form_data->orderstatus;
                 $namestatus=$form_data->namestatus;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=$form_data->deleteid;
                 
                 
             
                 
                 if($deleteid==0)
                 {
                     
                                                 $datassfirst['get_id']=$form_data->order_id;
                                                 $datassfirst['order_base']=$orderstatus;
                                                 $datassfirst['reason']=$namestatus;
                                                 $this->Main_model->update_commen($datassfirst,$tablenamemain);
                                               
                     
                                            $result_order= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
                                            foreach($result_order as $orders)
                                            {
                                                
                                                                //$find['id']=$orders->id;
                                                                $find['order_no']=$orders->order_no;
                                                                $find['discount']=$orders->discount;
                                                                $find['customer_id']=$orders->customer_id;
                                                                $find['move_id']=$form_data->order_id;
                                                                $find['customer_address_id']=$orders->customer_address_id;
                                                                $find['route_id']=$orders->route_id;
                                                                $find['user_id']=$orders->user_id;
                                                                $find['create_date']=$date;
                                                                $find['create_time']=$time;
                                                                $find['status']=1;
                                                                $find['deleteid']=$deleteid;
                                                                $find['order_base']=$orderstatus;
                                                                $find['commission_check']=$orders->commission_check;
                                                                $find['reason']=$namestatus;
                                                                
                                                                $find['delivery_charge']=$orders->delivery_charge;
                                                                $find['delivery_status']=$orders->delivery_status;
                                                                $find['payment_mode']=$orders->payment_mode;
                                                                
                                                                $find['others']=$orders->others;
                                                                $find['print']=$orders->print;
                                                                $find['packaging']=$orders->packaging;
                                                                $find['competitorname']=$orders->competitorname;
                                                                $find['details']=$orders->details;
                                                
                                                
                                                            
                                                            
                                                                 $result_order= $this->Main_model->where_names($oldtablename,'order_no',$orders->order_no);
                                                                 if(count($result_order)==0)
                                                                 {
                                                                     
                                                                     
                                                                          $insertid= $this->Main_model->insert_commen($find,$oldtablename);
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     
                                                                          foreach($result_order as $orderst)
                                                                          {
                                                                             $insertid=$orderst->id;
                                                                          }
                                                                     
                                                                          $datass['get_id']=$form_data->order_no;
                                                                          $datass['order_base']=$orderstatus;
                                                                          $datass['reason']=$namestatus;
                                                                          $datass['deleteid']=$deleteid;
                                                                          $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                                                                     
                                                                 }
                                                
                                                
                                                
                                                                 
                                                                 $this->Main_model->delete_where($oldtablename_sub,'order_id',$insertid);
                                                                
                                                                 $result_order_product= $this->Main_model->where_names($tablename_sub,'order_id',$form_data->order_id);
                                                                 foreach($result_order_product as $orders_product)
                                                                 {
                                                                     
                                                                     // $findp['id']=$orders_product->id;
                                                                      $findp['order_id']=$insertid;
                                                                      $findp['order_no']=$orders->order_no;
                                                                      $findp['product_name']=$orders_product->product_name;
                                                                      $findp['product_id']=$orders_product->product_id;
                                                                      
                                                                      
                                                                       $findp['tile_material_name']=$orders_product->tile_material_name;
                                                                      $findp['tile_material_id']=$orders_product->tile_material_id;
                                                                      
                                                                      $findp['categories_name']=$orders_product->categories_name;
                                                                      $findp['categories_id']=$orders_product->categories_id;
                                                                      
                                                                      $findp['profile']=$orders_product->profile;
                                                                      $findp['commission']=$orders_product->commission;
                                                                      
                                                                      
                                                                      $findp['address_id']=$orders_product->address_id;
                                                                      $findp['address_id_mark']=$orders_product->address_id_mark;
                                                                      $findp['billing_options']=$orders_product->billing_options;
                                                                      $findp['uom']=$orders_product->uom;
                                                                      
                                                                      $findp['crimp']=$orders_product->crimp;
                                                                      $findp['Meter_to_Sqr_feet']=$orders_product->Meter_to_Sqr_feet;
                                                                      $findp['Sqr_feet_to_Meter']=$orders_product->Sqr_feet_to_Meter;
                                                                      $findp['nos']=$orders_product->nos;
                                                                      $findp['unit']=$orders_product->unit;
                                                                      $findp['fact']=$orders_product->fact;
                                                                      
                                                                      $findp['section_lable']=$orders_product->section_lable;
                                                                      $findp['section_value']=$orders_product->section_value;
                                                                      
                                                                      $findp['degree']=$orders_product->degree;
                                                                      
                                                                      $findp['sub_product_id']=$orders_product->sub_product_id;
                                                                      $findp['value_id']=$orders_product->value_id;
                                                                      $findp['reference_image']=$orders_product->reference_image;
                                                                     
                                                                      
                                                                      $findp['rate']=$orders_product->rate;
                                                                      $findp['qty']=$orders_product->qty;
                                                                      $findp['amount']=$orders_product->amount;
                                                                      $findp['deleteid']=$orders_product->deleteid;
                                                                      $findp['create_date']=$orders_product->create_date;
                                                                      
                                                                      
                                                                      $this->Main_model->insert_commen($findp,$oldtablename_sub);
                                                                      
                                                                    
                                                                    
                                                                 }
                                                       
                                                
                                            }
                                            
                                            
                                            
                                               
                                            
                     
                     
                 }
                 else
                 {
                                 
                                                 $point['get_id']=$form_data->order_no;
                                                 $point['order_base']=0;
                                                 $point['reason']=$namestatus;
                                                 $this->Main_model->update_commen_where($point,'order_no',$tablenamemain);
                                                 
                                                 
                     
                                                 $datass['get_id']=$form_data->order_no;
                                                 $datass['deleteid']=$deleteid;
                                                 $datass['reason']=$namestatus;
                                                 $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                     
                 }
                 
               
                 
          


              
                 
                


	}
	
	
	
	
	
	
		public function order_quotation_move_finish_sh()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=0;
                 
                 
             
                 
                 if($deleteid==0)
                 {
                     
                                                 $datassfirst['get_id']=$form_data->order_id;
                                                 $datassfirst['order_base']=1;
                                                 
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $datassfirst['reason']="Sales Head Price Approved";
                                                 }
                                                 
                                                 
                                                 $this->Main_model->update_commen($datassfirst,$tablenamemain);
                                               
                     
                                            $result_order= $this->Main_model->where_names($tablenamemain,'id',$form_data->order_id);
                                            foreach($result_order as $orders)
                                            {
                                                
                                                                //$find['id']=$orders->id;
                                                                $find['order_no']=$orders->order_no;
                                                                $find['discount']=$orders->discount;
                                                                $find['customer_id']=$orders->customer_id;
                                                                $find['move_id']=$form_data->order_id;
                                                                $find['customer_address_id']=$orders->customer_address_id;
                                                                $find['route_id']=$orders->route_id;
                                                                $find['user_id']=$orders->user_id;
                                                                $find['create_date']=$date;
                                                                $find['create_time']=$time;
                                                                $find['status']=1;
                                                                $find['deleteid']=$deleteid;
                                                                $find['order_base']=1;
                                                                $find['finance_status']=0;
                                                                $find['commission_check']=$orders->commission_check;
                                                                $findp['paricel_mode']=$orders_product->paricel_mode;
                                                                 
                                                                $find['delivery_charge']=$orders->delivery_charge;
                                                                $find['delivery_status']=$orders->delivery_status;
                                                                $find['payment_mode']=$orders->payment_mode;
                                                                
                                                                $find['others']=$orders->others;
                                                                $find['print']=$orders->print;
                                                                $find['packaging']=$orders->packaging;
                                                                $find['competitorname']=$orders->competitorname;
                                                                $find['details']=$orders->details;
                                                
                                                
                                                            
                                                            
                                                                 $result_order= $this->Main_model->where_names($oldtablename,'order_no',$orders->order_no);
                                                                 if(count($result_order)==0)
                                                                 {
                                                                     
                                                                     
                                                                          $insertid= $this->Main_model->insert_commen($find,$oldtablename);
                                                                     
                                                                 }
                                                                 else
                                                                 {
                                                                     
                                                                          foreach($result_order as $orderst)
                                                                          {
                                                                             $insertid=$orderst->id;
                                                                          }
                                                                     
                                                                          $datass['get_id']=$form_data->order_no;
                                                                          $datass['order_base']=1;
                                                                          $datass['finance_status']=0;
                                                                          $datass['deleteid']=$deleteid;
                                                                          $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                                                                     
                                                                 }
                                                
                                                
                                                
                                                                 
                                                                 $this->Main_model->delete_where($oldtablename_sub,'order_id',$insertid);
                                                                
                                                                 $result_order_product= $this->Main_model->where_names($tablename_sub,'order_id',$form_data->order_id);
                                                                 foreach($result_order_product as $orders_product)
                                                                 {
                                                                     
                                                                     // $findp['id']=$orders_product->id;
                                                                      $findp['order_id']=$insertid;
                                                                      $findp['order_no']=$orders->order_no;
                                                                      $findp['product_name']=$orders_product->product_name;
                                                                      $findp['product_id']=$orders_product->product_id;
                                                                      
                                                                      $findp['tile_material_name']=$orders_product->tile_material_name;
                                                                      $findp['tile_material_id']=$orders_product->tile_material_id;
                                                                      
                                                                      $findp['billing_options']=$orders_product->billing_options;
                                                                      $findp['uom']=$orders_product->uom;
                                                                      
                                                                      $findp['categories_name']=$orders_product->categories_name;
                                                                      $findp['categories_id']=$orders_product->categories_id;
                                                                      
                                                                      $findp['profile']=$orders_product->profile;
                                                                      $findp['commission']=$orders_product->commission;
                                                                      
                                                                      
                                                                      $findp['address_id']=$orders_product->address_id;
                                                                      $findp['address_id_mark']=$orders_product->address_id_mark;
                                                                      
                                                                      $findp['crimp']=$orders_product->crimp;
                                                                      $findp['Meter_to_Sqr_feet']=$orders_product->Meter_to_Sqr_feet;
                                                                      $findp['Sqr_feet_to_Meter']=$orders_product->Sqr_feet_to_Meter;
                                                                      $findp['nos']=$orders_product->nos;
                                                                      $findp['unit']=$orders_product->unit;
                                                                      $findp['fact']=$orders_product->fact;
                                                                      
                                                                      $findp['section_lable']=$orders_product->section_lable;
                                                                      $findp['section_value']=$orders_product->section_value;
                                                                      
                                                                      $findp['degree']=$orders_product->degree;
                                                                      
                                                                      $findp['sub_product_id']=$orders_product->sub_product_id;
                                                                      $findp['value_id']=$orders_product->value_id;
                                                                      $findp['reference_image']=$orders_product->reference_image;
                                                                     
                                                                      
                                                                      $findp['rate']=$orders_product->rate;
                                                                      $findp['qty']=$orders_product->qty;
                                                                      $findp['amount']=$orders_product->amount;
                                                                      $findp['deleteid']=$orders_product->deleteid;
                                                                      $findp['create_date']=$orders_product->create_date;
                                                                      
                                                                      
                                                                      $this->Main_model->insert_commen($findp,$oldtablename_sub);
                                                                      
                                                                    
                                                                    
                                                                 }
                                                       
                                                
                                            }
                                            
                                            
                                            
                                               
                                            
                     
                     
                 }
                 else
                 {
                                 
                                                 $point['get_id']=$form_data->order_no;
                                                 $point['order_base']=0;
                                                 if($tablenamemain=='orders')
                                                 {
                                                     $point['reason']="";
                                                 }
                                                
                                                 $this->Main_model->update_commen_where($point,'order_no',$tablenamemain);
                                                 
                                                 
                     
                                                 $datass['get_id']=$form_data->order_no;
                                                 $datass['deleteid']=$deleteid;
                                                 $this->Main_model->update_commen_where($datass,'order_no',$oldtablename);
                     
                 }
                 
               
                 
          


              
                 
                


	}
	
	
	
	
	
	
		public function order_price_request()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 
                  $deleteid=$form_data->deleteid;
                 
                
                 
                 $datass['get_id']=$form_data->order_id;
                 $datass['order_base']=$deleteid;
                 $datass['reason']="Price Request";
                 $this->Main_model->update_commen($datass,$tablenamemain);
               
                 
          


              
                 
                


	}
	
	
	
	
	
	
	
	
	
		public function order_quotation_request()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
               
              
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=$form_data->deleteid;
                 $status=$form_data->status;
                 $reason=$form_data->reason;
                 
                   
                                              
                   $point['get_id']=$form_data->order_id;
                   $point['order_base']=$status;
                   
                   if($status==3)
                   {
                       $point['reason']='Sales Approval Requested ';
                   }
                   else
                   {
                       $point['reason']=$reason;
                   }
                   
                   
                   
                   
                   
                   
                   if($tablenamemain=='orders_process')
                   { 
                       if($deleteid==1)
                       {   
                           $point['finance_status']=0;
                           $point['assign_status']=0;
                       }
                       
                   }
                   
                   $this->Main_model->update_commen($point,$tablenamemain); 
                                            
                                            
                                               
                                            
                     
                   
                


	}
	
	
	
		public function order_quotation_request_finance()
	{
	    
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                
               
                 
                 $oldtablename_sub=$form_data->movetablename_sub;
                 $oldtablename=$form_data->movetablename;
                 
                 $tablenamemain=$form_data->tablenamemain;
                 $tablename_sub=$form_data->tablename_sub;
                 
                 
                 
                 $order_id=$form_data->order_id;
                 $order_no=$form_data->order_no;
                 $deleteid=$form_data->deleteid;
                 $reason=$form_data->reason;
                 
                   
                                              
                   $point['get_id']=$form_data->order_id;
                  
                   $point['finance_status']=$deleteid;
                   $point['reason']=$reason;
                   
                   $this->Main_model->update_commen($point,$tablenamemain); 
                                            
                                            
                                               
                                            
                     
                   
                


	}
	
	
	
	
	
	
	
	
	
	
	 
            public function fetchCustomerorcallbackhistroy()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                 
                 	 
                 	 $resultpending= $this->Main_model->where_names_order_by('call_history','order_no',$form_data->order_no,'id','DESC');
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($resultpending as  $value) {
                       
                      
                                          if($value->status_data=='Call Back')
                                          {
                                              $value->status_data=$value->status_data.' '.date('d-m-Y',strtotime($value->call_back_date));
                                          }
                 	                  

                                 	 	$array[] = array(
                                 	 	    
                                 	 	    
                                 	 	    'no' => $i, 
                                            'order_id' => $value->order_id, 
                                 	 		'order_no' => $value->order_no, 
                                 	 		'user_id' => $value->user_id,
                                 	 		'status_data' => $value->status_data,
                                 	 		'remarks' => $value->remarks,
                                 	 		'call_back_date' => date('d-m-Y',strtotime($value->call_back_date)),
                                 	 		'audio' => $value->audio,
                                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                 	 		'create_time' =>$value->create_time
                                 	 		
                
                                 	 	);
                                 	 	
                 	 


                            $i++;

                 	 }

                    echo json_encode($array);




    }
    
	
	
	
	
	
	
	
	
	
	
	
	public function fetchCustomerororderhistroy_driver()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $order_id=$form_data->order_id;
                     
                                             $result_c= $this->Main_model->where_names($tablenamemain,'id',$order_id);
                                             foreach($result_c as $orders_c)
                                             {
                                                 
                                                 $customer_id=$orders_c->customer_id;
                                                 
                                             }
                     
                     
                 
                 	 
                 	 $resultorder= $this->Main_model->where_names_order_by($tablenamemain,'customer_id',$customer_id,'id','DESC');
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($resultorder as  $value) {
                 	     
                 	     
                 	     
                         	                 $result_order_product= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                             foreach($result_order_product as $orders_product)
                                             {
                                                  $name=$orders_product->name;
                                             }
                                 
                                 
                                             
                                                           if($value->return_status!=0)
                                                           {
                                                               
                                                          
                      
                                                     	   	 $array[] = array(
                                                     	 	    
                                                     	 	    
                                                     	 	    'no' => $i, 
                                                                'id' => $value->id, 
                                                                'base_id' => base64_encode($value->id),
                                                     	 		'order_no' => $value->order_no, 
                                                     	 		'user_name' => $name,
                                                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                                     	 		'create_time' =>$value->create_time
                                                     	 		
                                    
                                                     	 	  );
                                     	 	  
                                                           }
                                 	 	
                 	 


                            $i++;

                 	 }

                    echo json_encode($array);




    }
	
	
	
	
      public function fetchCustomerororderhistroyorderlist_driver()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename_sub=$form_data->tablename_sub;
                     $order_id=$form_data->order_id;
                     
                                             $result_c= $this->Main_model->where_names($tablenamemain,'id',$order_id);
                                             foreach($result_c as $orders_c)
                                             {
                                                 
                                                 $customer_id=$orders_c->customer_id;
                                                 
                                             }
                     
                     
                 
                 	 
                 	 
                 	 $resultorder=$this->db->query("SELECT a.* FROM $tablename_sub as a JOIN orders_process as b ON a.order_id=b.id  WHERE a.return_status!='0' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.id DESC");
                 	 $resultorder=$resultorder->result();
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($resultorder as  $value) {
                 	     
                 	     
                                             
                                                 
                                                 
                                                                $amountdata=$value->rate*$value->qty;
                                                                $amount=$amountdata+$value->commission;
                                                            
                                                                 $description="";
                                                                 $product_name="";
                                                                 $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                                                  foreach($product_list as $csval)
                                                                 {
                                                                     
                                                                     $description=$csval->description;
                                                                     $product_name=$csval->product_name;
                                                                     $categories=$csval->categories;
                                                                     $categories_id=$csval->categories_id;
                                                                     
                                                                     
                                                                 }
                                                                 
                                     
                                 
                      
                                                     	   	 	$array[] = array(
        
                                                                    'no' => $i,
                                                                    'id' => $value->id, 
                                                         	 		'order_id' => $value->order_id, 
                                                         	 		'order_no' => $value->order_no, 
                                                         	 		'product_name_tab' => $product_name, 
                                                         	 		'categories'=>$categories,
                                                         	 		'description' => $description,
                                                         	 		'product_id' =>  $value->product_id, 
                                                         	 		'tile_material_name' =>  $value->tile_material_name,
                                                         	 		'tile_material_id' =>  $value->tile_material_id,
                                                         	 		'categories_id' =>  $value->categories_id, 
                                                         	 		'profile_tab' => $value->profile, 
                                                         	 		'crimp_tab' => $value->crimp, 
                                                         	 		'nos_tab' => $value->nos, 
                                                         	 		'unit_tab' => $value->unit, 
                                                         	 		'return_status' => $value->return_status, 
                                                         	 		'fact_tab' => $value->fact,
                                                         	 		'uom' => $value->uom,
                                                         	 		'billing_options' => $value->billing_options,
                                                         	 		'commission_tab' => $value->commission,
                                                         	 		'categories_id_get'=>$categories_id,
                                                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                                                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                                                         	 		'rate_tab' => $value->rate, 
                                                                    'qty_tab' => $value->qty, 
                                                                    'amount_tab' => round($amount,4)
                                        
                                                         	 	);
                                     	 	  
                                            
                                 	
                            $i++;

                 	 }

                    echo json_encode($array);




    }
    
    
	
	
	
    public function fetchCustomerororderhistroy()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $order_no=$form_data->order_no;
                     
                                             $result_c= $this->Main_model->where_names($tablenamemain,'order_no',$order_no);
                                             foreach($result_c as $orders_c)
                                             {
                                                 
                                                 $customer_id=$orders_c->customer_id;
                                                 
                                             }
                     
                     
                 
                 	 
                 	 $resultorder= $this->Main_model->where_names_order_by($tablenamemain,'customer_id',$customer_id,'id','DESC');
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($resultorder as  $value) {
                 	     
                 	     
                 	     
                         	                 $result_order_product= $this->Main_model->where_names('admin_users','id',$value->user_id);
                                             foreach($result_order_product as $orders_product)
                                             {
                                                  $name=$orders_product->name;
                                             }
                                 
                                 
                                             if($value->order_no!=$order_no)
                                             {
                                     
                                 
                      
                                                     	   	 $array[] = array(
                                                     	 	    
                                                     	 	    
                                                     	 	    'no' => $i, 
                                                                'id' => $value->id, 
                                                                'base_id' => base64_encode($value->id),
                                                     	 		'order_no' => $value->order_no, 
                                                     	 		'user_name' => $name,
                                                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)),
                                                     	 		'create_time' =>$value->create_time
                                                     	 		
                                    
                                                     	 	  );
                                     	 	  
                                            }
                                 	 	
                 	 


                            $i++;

                 	 }

                    echo json_encode($array);




    }
    
    
    
    
    
    
      public function fetchCustomerororderhistroyorderlist()
    {
                      
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $tablenamemain=$form_data->tablenamemain;
                     $tablename_sub=$form_data->tablename_sub;
                     $order_no=$form_data->order_no;
                     
                                             $result_c= $this->Main_model->where_names($tablenamemain,'order_no',$order_no);
                                             foreach($result_c as $orders_c)
                                             {
                                                 
                                                 $customer_id=$orders_c->customer_id;
                                                 
                                             }
                     
                     
                 
                 	 
                 	 
                 	 $resultorder=$this->db->query("SELECT a.* FROM $tablename_sub as a JOIN orders_process as b ON a.order_id=b.id  WHERE b.order_no!='".$order_no."' AND b.customer_id='".$customer_id."' AND a.deleteid=0 ORDER BY a.id DESC");
                 	 $resultorder=$resultorder->result();
                 	 $i=1;
                 	 $array=array();
                 	 foreach ($resultorder as  $value) {
                 	     
                 	     
                                             
                                                 
                                                 
                                                                $amountdata=$value->rate*$value->qty;
                                                                $amount=$amountdata+$value->commission;
                                                            
                                                                 $description="";
                                                                 $product_name="";
                                                                 $product_list = $this->Main_model->where_names('product_list','id',$value->product_id);
                                                                  foreach($product_list as $csval)
                                                                 {
                                                                     
                                                                     $description=$csval->description;
                                                                     $product_name=$csval->product_name;
                                                                     $categories=$csval->categories;
                                                                     $categories_id=$csval->categories_id;
                                                                     
                                                                     
                                                                 }
                                                                 
                                     
                                 
                      
                                                     	   	 	$array[] = array(
        
                                                                    'no' => $i,
                                                                    'id' => $value->id, 
                                                         	 		'order_id' => $value->order_id, 
                                                         	 		'order_no' => $value->order_no, 
                                                         	 		'product_name_tab' => $product_name, 
                                                         	 		'categories'=>$categories,
                                                         	 		'description' => $description,
                                                         	 		'product_id' =>  $value->product_id, 
                                                         	 		'tile_material_name' =>  $value->tile_material_name,
                                                         	 		'tile_material_id' =>  $value->tile_material_id,
                                                         	 		'categories_id' =>  $value->categories_id, 
                                                         	 		'profile_tab' => $value->profile, 
                                                         	 		'crimp_tab' => $value->crimp, 
                                                         	 		'nos_tab' => $value->nos, 
                                                         	 		'unit_tab' => $value->unit, 
                                                         	 		'return_status' => $value->return_status, 
                                                         	 		'fact_tab' => $value->fact,
                                                         	 		'uom' => $value->uom,
                                                         	 		'billing_options' => $value->billing_options,
                                                         	 		'commission_tab' => $value->commission,
                                                         	 		'categories_id_get'=>$categories_id,
                                                         	 		'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet,3), 
                                                         	 		'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter,3), 
                                                         	 		'rate_tab' => $value->rate, 
                                                                    'qty_tab' => $value->qty, 
                                                                    'amount_tab' => round($amount,4)
                                        
                                                         	 	);
                                     	 	  
                                            
                                 	
                            $i++;

                 	 }

                    echo json_encode($array);




    }
    
    
    
    
    
    
    
    
	
	public function callbacksave()
	{
	    
	             date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
              
                 
                 
                 
                     if($form_data->call_status!='')
                     {
                         
                                     
                                     $findp['status_data']=$form_data->call_status;
                                     $findp['call_back_date']=$form_data->call_back_date;
                                     $findp['order_id']=$form_data->order_id;
                                     $findp['order_no']=$form_data->order_no;
                                     $findp['user_id']=$this->sales_id;
                                     
                                     
                                     $findp['audio']=$form_data->audiolink;
                                     $findp['remarks']=$form_data->remarks;
                                     
                                     $findp['create_date']=$date;
                                     $findp['create_time']=$time;
                                     
                                     
                                     $customer_id=0;
                                     $result_order_product= $this->Main_model->where_names($form_data->tablenamemain,'id',$form_data->order_id);
                                     foreach($result_order_product as $orders_product)
                                     {
                                          $customer_id=$orders_product->customer_id;
                                     }
                                     
                                     
                                     $findp['customer_id']=$customer_id;
                                     
                                     $insert_id=$this->Main_model->insert_commen($findp,'call_history');
                                                                      
                                     $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Call Back submitted');
                                     echo json_encode($array);

                     }
                     else
                     {
                         
                         
                                     $array=array('error'=>'1');
                                     echo json_encode($array);
                         
                     }
                 
	    
	                                                                 
                                                                   
                                                                     
	    
	    
	    
	}
	
	public function fileuplaod()
    {

        
      
        
        if(!empty($_FILES))  
        { 

                     $path=array();
            

                         $ticket_id=$_GET['id'];
                         echo $path = 'uploads/' .time(). $_FILES['file']['name']; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
                         {  

                            
                              $point['get_id']=$ticket_id;
                              $point['audio']=$path;
                              $this->Main_model->update_commen($point,'call_history'); 
                          
                         }


          
             

            
             
 
         }


    }
    
    
    	public function fileuplaodimage()
    {

        
      
        
        if(!empty($_FILES))  
        { 

                     $path=array();
            

                         $ticket_id=$_GET['id'];
                         echo $path = 'uploads/' .time(). $_FILES['file']['name']; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
                         {  

                            
                              $point['product_id']=$ticket_id;
                              $point['product_image']=$path;
                              $this->Main_model->insert_commen($point,'product_images'); 
                          
                         }


 
         }


    }
    
    
    
    	public function payment_image()
    {

        
      
        
        if(!empty($_FILES))  
        { 

                     $path=array();
            

                         $ticket_id=$_GET['id'];
                         echo $path = 'uploads/' .time(). $_FILES['file']['name']; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
                         {  

                            
                              $point['get_id']=$ticket_id;
                              $point['payment_image']=$path;
                              $this->Main_model->update_commen($point,'orders_process'); 
                          
                         }


 
         }


    }
	
	public function group_gy_route()
    {
        
        	        $result= $this->Main_model->where_names('route','deleteid','0');
                    $data=array();
                 	$i=1;
                 	 foreach ($result as  $value) {
                 	     
                 	  $result= $this->Main_model->where_names_three_order_by_new('orders_process','finance_status','2','order_base','1','route_id',$value->id,'id','DESC');
                 	  
                 	     
                         	  if(count($result)>0)
                         	  {
                         	      
                         	  
                         	 		$data[] = array(
                         	 		    
                         	 		    
                         	 		'no' => $i, 
        
                         	 		'id' => $value->id, 
                        	 		
                         	 		'name' => $value->name, 
                         	 		'count'=>count($result)
                         	 		
        
                         	 	    );
                         	 	
                         	 	
                         	  }	
                 	 	
                 	 	$i++;
                 	 }

                    echo json_encode($data);
        
    }
    
    
    public function orderassign()
    {
        
        
                 date_default_timezone_set("Asia/Kolkata"); 
                 $date= date('Y-m-d');
                 $time= date('h:i A');

                 $form_data = json_decode(file_get_contents("php://input"));
                 
            
                 
                 $sortingInput_data=$form_data->sortingInput_data;
                 $sortingInput_data= explode('|', $sortingInput_data);
                 $orderid_data=$form_data->orderid_data;
                 $orderid_data= explode('|', $orderid_data);
                 
                 $vehicle_id_data=$form_data->vehicle_id_data;
                // $vehicle_id_data= explode('|', $vehicle_id_data);
                 
                   for ($i=0; $i <count($orderid_data) ; $i++) { 
                       
                       
                       $datass['get_id']=$orderid_data[$i];
                       $datass['vehicle_id']=$vehicle_id_data;
                       
                       
                            $result= $this->Main_model->where_names('driver','vehicle_id',$vehicle_id_data);
                            foreach ($result as  $value) {
                                 	     
                                 	     $driver_id=$value->id;
                            }
                            
                       
                       $datass['driver_id']=$driver_id;
                       $datass['assign_status']=1;
                       $datass['assign_date']=$date;
                       $datass['assign_time']=$time;
                       $datass['finance_status']=3;
                       $datass['reason']='Driver Assigned';
                       $datass['otp']='1234';
                                                             
                       $datass['sort_id']=$sortingInput_data[$i];
                       $tablename=$form_data->tablenamemain;
                       $this->Main_model->update_commen($datass,$tablename);
                       
                    
                   }
                    
                   
                 
        
        
    }
	public function save_content_by_overview()
    {
     
     
     
     $input_text=$_POST['input_text'];
     $order_id=$_POST['order_id'];
     
     
     
     
     $this->Main_model->delete_where('overview_invoice_content_base_order','order_id',$order_id);
                                                                
      for ($i=0; $i <count($input_text) ; $i++) { 
         
          $datass['input_text']=$input_text[$i];
          $datass['order_id']=$order_id;
          $this->Main_model->insert_commen($datass,'overview_invoice_content_base_order');
          
      }
      
       redirect($_SERVER['HTTP_REFERER']);
     
    }
    
     	public function productimagesave()
    {
        
            $form_data = json_decode(file_get_contents("php://input"));
            $tablename_sub=$form_data->tablename_sub;
            $id=$form_data->order_product_id;
            $product_id=$form_data->product_id;
        
            define('UPLOAD_DIR', 'uploads/');
        	$img = $form_data->imgBase64;
        	$img = str_replace('data:image/png;base64,', '', $img);
        	$img = str_replace(' ', '+', $img);
        	$data = base64_decode($img);
        	$file = UPLOAD_DIR . uniqid() . '.png';
        	$success = file_put_contents($file, $data);
        	print $success ? $file : 'Unable to save the file.';
        	
        	$datass_val['get_id']=$id;
        	$datass_val['reference_image']=$file;
            $this->Main_model->update_commen_where($datass_val,'id',$tablename_sub);
            
            
            
            
            $datass['product_id']=$product_id;
            $datass['product_image']=$file;
            $this->Main_model->insert_commen($datass,'product_images');    
            
                                                                 
        	
        
    }
    
    
     	public function productimagesavechoose()
    {
        
            $form_data = json_decode(file_get_contents("php://input"));
            
            
           
            
            $tablename_sub=$form_data->tablename_sub;
            $id=$form_data->order_product_id;
        	$image_id = $form_data->image_id;
            $result= $this->Main_model->where_names('product_images','id',$image_id);
            $file="";
            foreach ($result as  $value) {
                 	     
                 	     $file=$value->product_image;
            }
                 	 
          
        	
        	$datass_val['get_id']=$id;
        	$datass_val['reference_image']=$file;
            $this->Main_model->update_commen_where($datass_val,'id',$tablename_sub);
                                                                 
        	
        
    }
    
    
    
    
    
    
    
    
    
     	public function checkValCommission()
    {
        
            $form_data = json_decode(file_get_contents("php://input"));
            
            
           
            
            $tablenamemain=$form_data->tablenamemain;
            $status=$form_data->status;
        	$id = $form_data->order_id;
            	 
          
        	
        	$datass_val['get_id']=$id;
        	$datass_val['commission_check']=$status;
            $this->Main_model->update_commen($datass_val,$tablenamemain);
            
            
                if($status==0)
                {
                    
                    
                      $tablename_sub=$form_data->tablename_sub;
                      $datass['get_id']=$id;
                      $datass['commission']=0;
                      $this->Main_model->update_commen_where($datass,'order_id',$tablename_sub);
                    
                }
                     
                                                                 
        	
        
    }
    
    
    
    
    
    
    
    
    
    
    		public function specificationFind()
	{
                     
                      $additional_information =$this->Main_model->where_names_two_order_by('additional_information','grouping','2','deleteid','0','id','ASC');
							            	 
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     
                     
                     $product_id=$form_data->product_id;
                     
                     $value_id="";
                  
                     $output=array();
                     $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                 	 foreach ($results as  $values) {
                 	     
                 	     
                 	     
                     	     foreach($additional_information as $vl)
                     	     {
                     	          $label_name=strtolower($vl->label_name);
                     	          $output[$label_name]= $values->$label_name; 
                     	     }
                       
                             $output['product_name']= $values->product_name;
                       
                        
                         
                         
                       
                 	 }
                 	 
                 
                 	 
                    echo json_encode($output);
              
                    

	}
    
    
    
			public function fetch_data_size_options_values()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $product_id=$form_data->product_id;
                     
                     $value_id="";
                     $viewstatus=1; 
                     $section_lable=array();
                     $section_value=array();
                     $degree_value=array();
                     $array=array();
                     $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                 	 foreach ($results as  $values) {
                       
                       
                        
                       
                        if($values->categories_id==32)
                        {
                                $viewstatus=0;
                                if($values->section_lable!="")
                                {
                                     $section_lable=  str_replace('|','',$values->section_lable); 
                                     $section_value=  str_replace('|','',$values->section_value);
                                     $degree_value=   str_replace('|','',$values->degree);
                                }
                        }
                        else
                        {
                            $viewstatus=1; 
                            if($values->section_lable!="")
                            {
                                 $section_lable=  explode('|', $values->section_lable); 
                                 $section_value=  explode('|', $values->section_value);
                                 $degree_value=  explode('|', $values->degree);
                            }
                            
                        }
                         
                         
                       
                 	 }
                 	 
                 	
                     if(count($section_lable) != 0)
                     {
                            if($viewstatus==0)
                            {
                                $array[]=array('viewstatus'=>$viewstatus,'section_lable'=>$section_lable,'section_value'=>$section_value,'degree_value'=>$degree_value,'lable'=>$lable);
                          
                            }
                            else
                            {
                                
                                $lable=range('A', 'Z');
                         	 for ($i=0; $i <count($section_lable) ; $i++) { 
                         	     
                         	      
                         	 
                                  $array[]=array('viewstatus'=>$viewstatus,'section_lable'=>$section_lable[$i],'section_value'=>$section_value[$i],'degree_value'=>$degree_value[$i],'lable'=>$lable[$i]);
                             }
                                
                            }
                             
                             
                            
                     
                     }
                     
                 	 
                    echo json_encode($array);
                    
                    
                    
                    
                    

	}

	public function fetch_data_size_options_values_total()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $product_id=$form_data->product_id;
                     
                     $value_id="";
                     $section_lable=array();
                     $section_value=array();
                     $degree_value=array();
                     $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                 	 foreach ($results as  $values) {
                       
                       
                        if($values->section_lable!="")
                        {
                             $section_lable=  explode('|', $values->section_lable); 
                             $section_value=  explode('|', $values->section_value);
                             $degree_value=  explode('|', $values->degree);
                        }
                       
                        
                         
                         
                       
                 	 }
                 	 
                 	  $sizetotal=0;
                     if(count($section_lable) != 0)
                     {
                           
                             $lable=range('A', 'Z');
                         	 for ($i=0; $i <count($section_lable) ; $i++) { 
                         	     
                         	      
                         	      $sizetotal+=$section_lable[$i];
                                  
                             }
                             
                            $array=array('sizetotal'=>$sizetotal);
                     
                     }
                     
                 	 
                    echo json_encode($array);
                    
                    
                    
                    
                    

	}
	
	
	
	


}

