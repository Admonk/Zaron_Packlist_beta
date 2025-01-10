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
								             
								              $formdate=date('Y-m-d');
                                              $todate=date('Y-m-d');
								              
								             
								              $lastmonthfrom= date('Y-m-d', strtotime("-1 days"));
								              $lastmonthto=date('Y-m-d', strtotime("-1 days"));



                                              $data['toatalvalue']=0;
								              $resulttotalsale=$this->db->query("SELECT SUM(b.qty*b.rate) as toatalvalue FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.order_no!='' AND a.deleteid=0 AND a.order_base='1' AND b.deleteid=0");
                 	                          
                 	                          $resulttotalsale=$resulttotalsale->result();
                 	                          foreach($resulttotalsale as $totsale)
                 	                          {
                 	                               $data['toatalvalue']=$totsale->toatalvalue;
                 	                          }
                 	                          
                 	                          $data['toatalvaluels']=0;
                 	                          $resulttotalsalels=$this->db->query("SELECT SUM(b.qty*b.rate) as toatalvalue FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND  a.order_no!='' AND a.deleteid=0 AND a.order_base='1' AND b.deleteid=0");
                 	                          
                 	                          $resulttotalsalels=$resulttotalsalels->result();
                 	                          foreach($resulttotalsalels as $totsalels)
                 	                          {
                 	                               $data['toatalvaluels']=$totsalels->toatalvalue;
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                           $data['toatalvaluedd']=0;
                 	                           $resulttotalsaledd=$this->db->query("SELECT SUM(b.qty*b.rate) as toatalvalue FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.order_no!='' AND a.deleteid=0 AND b.deleteid=0 AND a.finance_status='4'");
                 	                          
                 	                          $resulttotalsaledd=$resulttotalsaledd->result();
                 	                          foreach($resulttotalsaledd as $totsaledd)
                 	                          {
                 	                               $data['toatalvaluedd']=$totsaledd->toatalvalue;
                 	                          }
                 	                          
                 	                          $data['toatalvaluelsdd']=0;
                 	                          $resulttotalsalelsdd=$this->db->query("SELECT SUM(b.qty*b.rate) as toatalvalue FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND  a.order_no!='' AND a.deleteid=0 AND b.deleteid=0 AND a.finance_status='4'");
                 	                          
                 	                          $resulttotalsalelsdd=$resulttotalsalelsdd->result();
                 	                          foreach($resulttotalsalelsdd as $totsalelsdd)
                 	                          {
                 	                               $data['toatalvaluelsdd']=$totsalelsdd->toatalvalue;
                 	                          }
								              
								              
								              
								              
								             
								              $data['totalcount']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(id) as totalcount FROM orders_process WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base='1' AND deleteid=0");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcount']=$totcount->totalcount;
                 	                          }
								             
								             
								             
								              $data['totalcountlastmonth']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(id) as totalcount FROM orders_process WHERE create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND order_base='1' AND deleteid=0");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonth']=$totcountm->totalcount;
                 	                          }
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          
                 	                          $data['totalcountdd']=0;
								              $resulttotalcount=$this->db->query("SELECT COUNT(id) as totalcount FROM orders_process WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND finance_status='4' AND deleteid=0");
                 	                          $resulttotalcount=$resulttotalcount->result();
                 	                          foreach($resulttotalcount as $totcount)
                 	                          {
                 	                               $data['totalcountdd']=$totcount->totalcount;
                 	                          }
								             
								             
								             
								              $data['totalcountlastmonthdd']=0;
								              $resulttotalcountlm=$this->db->query("SELECT COUNT(id) as totalcount FROM orders_process WHERE create_date BETWEEN '".$lastmonthfrom."' AND '".$lastmonthto."' AND finance_status='4' AND deleteid=0");
                 	                          $resulttotalcountlm=$resulttotalcountlm->result();
                 	                          foreach($resulttotalcountlm as $totcountm)
                 	                          {
                 	                               $data['totalcountlastmonthdd']=$totcountm->totalcount;
                 	                          }
								             
								             
								             
								             
								               
								             
								             
						                     
						                    if($this->session->userdata['logged_in']['access']=='12') // Sales Team
							                {
							                      redirect('index.php/order/ordercreate');
							                }
							                else if($this->session->userdata['logged_in']['access']=='11') //Sales Head
							                {
							                      redirect('index.php/order/orders_list_sales_head');
							                }
							                else if($this->session->userdata['logged_in']['access']=='6') // Transpot
							                {
							                      redirect('index.php/order/transport_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='4') // purchase
							                {
							                      redirect('index.php/order/orders_list_purchase');
							                }
							                else if($this->session->userdata['logged_in']['access']=='13') // Driver
							                {
							                      redirect('index.php/order/driver_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='7') // Production
							                {
							                      redirect('index.php/order/production_orders_list');
							                }
							                else if($this->session->userdata['logged_in']['access']=='10') // md
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
    public function monthlysaleschart()
	{
	    
	    
	    $year = date('Y'); 
	    $out = array();
	    
	    for ($month = 1; $month <= 12; $month ++)
	    {
	        
	            
	        
				 $resulttotalcountlm=$this->db->query("SELECT SUM(b.qty*b.rate) as total  FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id WHERE month(a.create_date)='$month' AND year(a.create_date)='$year' AND a.order_base='1' AND a.deleteid=0 AND b.deleteid=0");
                 $resulttotalcountlm=$resulttotalcountlm->result();
                 $out[]=round($resulttotalcountlm[0]->total,2);
                	                        
	    
	    }
	    
	    echo json_encode($out);
	    
	    
	}
	
	public function monthlysaleschartpie()
	{
	    
	             $formdate=date('Y-m-01');
                 $todate=date('Y-m-t');

                 $orders_process_count=$this->db->query("SELECT id as orders_process_count  FROM orders_process  WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base!='-1' AND deleteid=0 ");
                 $orders_process_count=$orders_process_count->result();
                 
                 $orders_count=$this->db->query("SELECT id as orders_count  FROM orders WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base!='-1' AND deleteid=0 ");
                 $orders_count=$orders_count->result();
                 
                 
                 $orders_quotation_count=$this->db->query("SELECT id as orders_quotation_count  FROM orders_quotation WHERE create_date BETWEEN '".$formdate."' AND '".$todate."' AND order_base!='-1' AND deleteid=0 ");
                 $orders_quotation_count=$orders_quotation_count->result();
                 
                 
                  
                 $out=array('total'=>array(count($orders_count),count($orders_quotation_count),count($orders_process_count)),'name'=>array('Enquiry '.count($orders_count),'Quotation '.count($orders_quotation_count),'Orders '.count($orders_process_count))); 
                  
            

             	echo json_encode($out);
	    
	    
	}
     public function fetch_localitybase()
	{

                    
                     $result=$this->db->query("SELECT *  FROM locality WHERE deleteid=0  ORDER BY name ASC");
                     $result=$result->result();
                 
                 	 foreach ($result as  $value) {
                 	     
                 	     $resultss=$this->db->query("SELECT a.company_name  FROM customers as a LEFT JOIN orders_process as o ON a.id=o.customer_id WHERE a.deleteid=0 AND a.locality='".$value->id."'");
                 	     $resultss=$resultss->result();
                       

                 	 	$array[] = array(
                            
                 	 		'name' => $value->name, 
                 	 		'count' => count($resultss), 
                 	 	
                 	 	);


                 	 }

                    echo json_encode($array);

	}
	
	public function fetchDataTopproduct()
	{

                    
                     $result=$this->db->query("SELECT  product_name,COUNT(product_id) as product_id_count  FROM order_product_list_process WHERE deleteid=0 GROUP BY product_id ORDER BY product_id_count DESC");
                     $result=$result->result();
                 
                 	 foreach ($result as  $value) {
                 	     
                 	     

                 	 	$array[] = array(
                            
                 	 		'name' => $value->product_name, 
                 	 		'count' => $value->product_id_count 
                 	 	
                 	 	);


                 	 }

                    echo json_encode($array);

	}
	

}	
