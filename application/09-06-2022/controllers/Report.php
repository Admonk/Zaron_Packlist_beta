<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

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
   
	
  
     public function salesreport()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salesreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
     public function order_balance_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Order Balance Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/order_balance_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function trial_balance()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function trial_balance_full()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             
                                             $data['accountstypename']="";
                                             if(isset($_GET['accountstype']))
                                             {
                                                 
                                                  $accounttype= $this->Main_model->where_names('accounttype','id',$_GET['accountstype']);
                                                  foreach($accounttype as $vl)
                                                  {
                                                      $accountstypename=$vl->name;
                                                  }
                                                 $data['accountstypename']=$accountstypename;
                                             }
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Trial Balance';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/trial_balance_full.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function salse_group_order_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['sales_group'] = $this->Main_model->where_names('sales_group','deleteid','0');
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['sales_head'] = $this->Main_model->where_names_two_order_by('admin_users','access',11,'deleteid','0','id','ASC');
                                             
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salse_group_order_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
      public function sales_product_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Sales Product Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/salesproductreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
     
      public function vendor_purchase_product_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['categories'] = $this->Main_model->where_names('categories','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vendor Purchase Product Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/vendor_purchase_product_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function customer_order_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Customer Order Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/customer_order_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function customer_yes_or_no_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users','access',12,'deleteid','0','id','ASC');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Customer Order Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/customer_yes_or_no_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
     public function vendor_purchase_report()
    {
                  

                 
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                            
                                             $data['vendor'] = $this->Main_model->where_names('vendor','deleteid','0');
                                             $data['active_base']='route';
                                             $data['active']='route';
                                             $data['title']    = 'Vendor Purchase Report';
                                             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
                                             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
                                             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/vendor_purchase_report.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
       public function balancereport()
    {
                  

                                         ini_set('memory_limit', '4400M');
 
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                         	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
							            	 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Balance Report';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/balancereport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
    
     public function balancereport_base_ledger()
    {
                  

                                         ini_set('memory_limit', '4400M');
 
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                         	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                         	 $data['partytype'] = $this->Main_model->where_names('partytype','deleteid','0');
							            	 $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
							            	 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
							            	 
							            	 
							            	 $data['data_title']="";
							            	 if(isset($_GET['accountshead']))
							            	 {
							            	      $accountshead = $this->Main_model->where_names('accountheads','id',$_GET['accountshead']);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $data['data_title']= $val->name;
							            	      }
							            	 }
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Balance Report';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/balancereport_base_ledger.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    
      public function accountsreport()
    {
                  

                      ini_set('memory_limit', '4400M');
                  
                                        if(isset($this->session->userdata['logged_in']))
                                        {
                                            
                                         	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 $data['customers'] = $this->Main_model->where_names('customers','deleteid','0');
							            	 $data['bankaccount'] = $this->Main_model->where_names('bankaccount','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Accounts Report';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
                                             $this->load->view('report/accountsreport.php',$data);


                                        }
                                        else
                                        {

                                              redirect('index.php/adminmain');

                                        }                    

                  


    }
    
    	public function fetch_data_get_ledger_view()
	{

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                 	 
                 	 $search='';
                 	 if($cateid!='ALL') 
                 	 {
                 	     $stat.=' AND b.categories_id="'.$cateid.'"';
                 	 }
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $stat.=' AND b.product_id="'.$productid.'"';
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $userslog="";
                  if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  b.deleteid=0 AND a.order_base='1' $userslog GROUP BY b.product_id ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                         
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND b.deleteid=0 AND a.order_base='1' $stat $userslog  GROUP BY b.product_id ORDER BY a.id DESC");
                 	
                     }
                     
                 	 
                 	
                     $result=$result->result();
                   
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                                    
                         
                                         	 	$array[] = array(
                                         	 	    
                                         	 	    
                                         	 	    'no' => $i, 
                                                    'id' => $value->id, 
                                                    'order_id' => $value->order_id, 
                                         	 		'order_no' => $value->order_no, 
                                         	 	    'product_name' => $value->product_name,
                                         	 	    'rate' => $value->rate,
                                         	 	    'qty' =>  round($value->qty,2),
                                         	 	    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                                         	 		'total' => round($value->total,2)
                                         	 		
                                         	 		
                        
                                         	 	);
                                        	 	
                                   


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
      	public function fetch_data_get_ledger_view_export()
	{









  
           
                    
                    $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                     
                     
                    
                      $search='';
                 	 if($cateid!='ALL') 
                 	 {
                 	     $stat.=' AND b.categories_id="'.$cateid.'"';
                 	 }
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $stat.=' AND b.product_id="'.$productid.'"';
                 	 }
                 	
                     
                     
                     
                     $userslog="";
                  if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  b.deleteid=0 AND a.order_base='1' $userslog GROUP BY b.product_id ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                         
                         $result=$this->db->query("SELECT a.order_no,a.create_date,b.product_name,b.rate,SUM(b.qty) as qty,SUM(b.qty*b.rate) as total FROM orders_process as a JOIN order_product_list_process as b ON a.id=b.order_id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."'  AND b.deleteid=0 AND a.order_base='1' $stat $userslog  GROUP BY b.product_id ORDER BY a.id DESC");
                 	
                     }
                 	
                 	
                  	$result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='Sales_product_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="7">Sales Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                           <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>QTY</th>
                          <th>Amount</th>
                        
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	        
                                 	     
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->product_name; ?></td>
                                          <td><?php echo $value->rate; ?></td>
                                          <td><?php echo round($value->qty,2); ?></td>
                                          <td><?php echo round($value->total,2); ?></td>
                                          
                                        </tr>
                                 	    
                                 	  
                                 	   
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
	
	
	
	
	
	
	
		public function fetch_data_sales_report()
	{

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                     $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                 	 
                 	 
                 	if(isset($_GET['sales_group']))
                 	{
                 	     if($_GET['sales_group']!='ALL') 
                     	 {
                     	      $stat.=' AND b.sales_group="'.$_GET['sales_group'].'"';
                     	 } 
                     	 else
                     	 {
                     	     $stat.='';
                     	 }
                 	    
                 	   
                 	}
                 	
                 	
                 	
                 	
                 	$userslog="";
                 	if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    
                    
                  
                     
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                      
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         
                          
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $userslog ORDER BY a.id DESC");
                 	 
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	   
                 	 
                     }
                     
                    
                     $result=$result->result();
                 	 
                 
                    
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                       
                                     $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                 	                 $resultsub=$resultsub->result();
                                     $total=0;
                                     foreach($resultsub as $val)
                                     { 
                                       
                                      
                                                 $total+=round($val->qty*$val->rate,2);
                         
                                    }
                                    
                                    
                                    
                                $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                     
                                    
                                    
                                    
                                     
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                               $define_saleshd_id=$val->define_saleshd_id;
                         
                                    }
                                    
                                    
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$define_saleshd_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                    
                                    
                                    
                                    
                       
                       
                         $status="Order Completed";
                         if($value->finance_status=='3')
                         {
                             $status='Finance Approved';
                         }
                         
                         if($value->finance_status=='4')
                         {
                             $status='Delivered';
                         }
                         
                         if($value->finance_status=='5')
                         {
                             $status='Reconciliation Completed';
                         }
                         
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no,
                 	 		'sales_group' => $sales_group,
                 	 		'sales_head' => $sales_head,
                 	 		'sales_team' => $sales_team,
                 	 	    'customername' => $value->company_name,
                 	 	    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                 	 		'total' => round($total,2),
                 	 		'status' => $status
                 	 		

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
		
		public function trial_balance_report_full()
	{

                    
                    
                    

                    
                    
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     $accountstype=$_GET['accountstype'];
                     $sql="";
                     if($accountstype!=0)
                     {
                         
                         $sql=' AND account_type="'.$accountstype.'"';
                     }
                     
                 
                     $result=$this->db->query("SELECT * FROM accountheads WHERE deleteid=0  $sql  ORDER BY id DESC");
                 	 $result=$result->result();
                 	 
                 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	         // Cash In Hand
                             $credits1=0;
                             $debit1=0;
                             $balance1=0;
                             $result=$this->db->query("SELECT SUM(credits) as totalcridit,SUM(debits) as totaldebit FROM customer_ledger WHERE deleteid=0 AND account_head_id='".$value->id."'  ORDER BY id DESC");
                 	         $result=$result->result();
                             foreach($result as $partys1ss)
                             { 
                                
                                      $credits1=$partys1ss->totalcridit;
                                      $debit1=$partys1ss->totaldebit;
                                      $balance1=$credits1-$debit1;
                             }
                             
                             
                             
                             
                             $credits2=0;
                             $debit2=0;
                             $balance2=0;
                              
                             $result1=$this->db->query("SELECT SUM(debit) as debits,SUM(credit) as credits FROM bankaccount_manage WHERE deleteid=0 AND account_head_id='".$value->id."' ORDER BY id DESC");
                 	         $result1=$result1->result();
                             foreach($result1 as $partys1)
                             {
                                 
                                 
                               
                                      $credits2=$partys1->credits;
                                      $debit2=$partys1->debits;
                                      $balance2=$credits2-$debit2;
                              
                             
                               
                             }
                              
                              
                 	        
                                $credits3=0;
                             $debit3=0;
                             $balance3=0;
                 	       
                 	          $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM manual_journals_sub WHERE deleteid=0 AND account_head_id='".$value->id."' ORDER BY id DESC");
                 	          $party1=$result1->result();
                              foreach($party1 as $partys1)
                             {
                                 
                             
                            
                              
                                      $credits3=$partys1->credits;
                                      $debit3=$partys1->debits;
                                      $balance3=$credits3-$debit3;
                              
                               
                             }
                             
                             
                             
                 	        
                             $credits4=0;
                             $debit4=0;
                             $balance4=0;
                             
                 	          $result2=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM payment_received_sub WHERE deleteid=0 AND account_head_id='".$value->id."' ORDER BY id DESC");
                 	          $party2=$result2->result();
                              foreach($party2 as $partys2)
                             {
                                 
                                       $credits4=$partys2->credits;
                                      $debit4=$partys2->debits;
                                      $balance4=$credits4-$debit4;
                             
                               
                             }
                             
                             
                             
                              $credits5=0;
                             $debit5=0;
                             $balance5=0;
                             
                 	          $result3=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM voucher_sub WHERE deleteid=0 AND account_head_id='".$value->id."' ORDER BY id DESC");
                 	          $party3=$result3->result();
                              foreach($party3 as $partys3)
                             {
                                 
                            
                                      $credits5=$partys3->credits;
                                      $debit5=$partys3->debits;
                                      $balance5=$credits5-$debit5;
                               
                             }
                         
                       
                       
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$value->id,
                 	 	    'credit' => round($credits1+$credits2+$credits3+$credits4+$credits5,2),
                 	 	    'debit' => round($debit1+$debit2+$debit3+$debit4+$debit5,2),
                 	 	    'balance' => round($balance1+$balance2+$balance3+$balance4+$balance5,2)

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
		public function trial_balance_report()
	{

                    
                    
                    

                    
                    
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND spilt_status='1' ORDER BY id DESC");
                 	 $result=$result->result();
                 	 
                 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      $datavalid=array();
                 	         $result_sub=$this->db->query("SELECT * FROM accountheads WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY id DESC");
                 	         $result_sub=$result_sub->result();
                 	         foreach ($result_sub as  $valuess) {
                 	              
                 	              $datavalid[]=$valuess->id;
                 	         }
                 	     
                 	    
                 	        $valueid= implode("','", $datavalid);
                 	     
                 	     
                 	     
                 	          $debits=0;
                              $credits=0;
                 	       
                 	       
                 	          $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM manual_journals_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party1=$result1->result();
                              foreach($party1 as $partys1)
                             {
                                 
                              
                              $credits=$partys1->credits-$partys1->debits;
                               
                             }
                             
                             
                             
                 	          $debits2=0;
                              $credits2=0;
                             
                 	          $result2=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM payment_received_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party2=$result2->result();
                              foreach($party2 as $partys2)
                             {
                                 
                              
                              $credits2=$partys2->credits-$partys2->debits;
                               
                             }
                             
                             
                              $debits3=0;
                              $credits3=0;
                 	          $result3=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM voucher_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party3=$result3->result();
                              foreach($party3 as $partys3)
                             {
                                 
                             
                              $credits3=$partys3->credits-$partys3->debits;
                               
                             }
                         
                       
                       
                             $array2=array();
                             foreach ($result_sub as  $valuess) 
                             {
                 	                  if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           	$array2[] = array(
                 	 	    
                 	 	    
                                     	 	    'no' => $i, 
                                                'id' => $valuess->id, 
                                                'name' => $valuess->name, 
                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                     	 		'credit' => 600
                                     	 		
                                     	 	 );
                                           
                                       }
                 	             
                 	         }
                     
                     
                     
                     
                     
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                 	 		'credit' => round($credits+$credits2+$credits3,2),
                 	 		'resultsub'=>$array2

                 	 	 );
                 	 	 
                 	 	 
                 	 	 
                 	 	 
                 	 	 


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
		public function trial_balance_report1()
	{

                    
                    
                    

                    
                    
                     
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                 
                     $result=$this->db->query("SELECT * FROM accounttype WHERE deleteid=0 AND spilt_status='2' ORDER BY id DESC");
                 	 $result=$result->result();
                 	 
                 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	      $datavalid=array();
                 	         $result_sub=$this->db->query("SELECT * FROM accountheads WHERE deleteid=0 AND account_type='".$value->id."'  ORDER BY id DESC");
                 	         $result_sub=$result_sub->result();
                 	         foreach ($result_sub as  $valuess) {
                 	              
                 	              $datavalid[]=$valuess->id;
                 	         }
                 	     
                 	    
                 	        $valueid= implode("','", $datavalid);
                 	     
                 	     
                 	     
                 	          $debits=0;
                              $credits=0;
                 	       
                 	       
                 	          $result1=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM manual_journals_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party1=$result1->result();
                              foreach($party1 as $partys1)
                             {
                                 
                              
                              $credits=$partys1->credits-$partys1->debits;
                               
                             }
                             
                             
                             
                 	          $debits2=0;
                              $credits2=0;
                             
                 	          $result2=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM payment_received_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party2=$result2->result();
                              foreach($party2 as $partys2)
                             {
                                 
                              
                              $credits2=$partys2->credits-$partys2->debits;
                               
                             }
                             
                             
                              $debits3=0;
                              $credits3=0;
                 	          $result3=$this->db->query("SELECT SUM(debits) as debits,SUM(credits) as credits FROM voucher_sub WHERE deleteid=0 AND account_head_id IN ('".$valueid."') ORDER BY id DESC");
                 	          $party3=$result3->result();
                              foreach($party3 as $partys3)
                             {
                                 
                             
                              $credits3=$partys3->credits-$partys3->debits;
                               
                             }
                         
                       
                       
                             $array2=array();
                             foreach ($result_sub as  $valuess) 
                             {
                 	                  if($value->id==$valuess->account_type)
                                       {
                                           
                                           
                                           	$array2[] = array(
                 	 	    
                 	 	    
                                     	 	    'no' => $i, 
                                                'id' => $valuess->id, 
                                                'name' => $valuess->name, 
                                                'url'=>base_url().'index.php/report/balancereport_base_ledger?accountshead='.$valuess->id,
                                     	 		'credit' => 600
                                     	 		
                                     	 	 );
                                           
                                       }
                 	             
                 	         }
                     
                     
                     
                     
                     
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'name' => $value->name, 
                            'url'=>base_url().'index.php/report/trial_balance_full?accountstype='.$value->id,
                 	 	    'credit' => round($credits+$credits2+$credits3,2),
                 	 		'resultsub'=>$array2

                 	 	 );
                 	 	 
                 	 	 
                 	 	 
                 	 	 
                 	 	 


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
		public function fetch_data_sales_balance_report()
	{

                    
                    
                    

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     $payment_mode=$_GET['payment_mode'];
                     
                 
                     $stat=' ';
                 	 
                 	 if($payment_mode!='undefined') 
                 	 {   
                 	     if($payment_mode!='ALL') 
                     	 {
                     	     $stat.=' AND a.payment_mode="'.$payment_mode.'"';
                     	 }
                 	     
                 	     
                 	 }
                 	 
                 	 
                 	  $stat.=' AND a.finance_status IN ("4","5")';
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  
                 	  $userslog="";
                  if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                 	  
                 	  
                 	 
                 	 
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d',strtotime('-1 days'));
                         $todate=date('Y-m-d',strtotime('-1 days'));
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	 
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	   
                     }
                     
                    
                    //echo "SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat ORDER BY a.id DESC";
                    //exit;
                    
                     $result=$result->result();
                 	 
                 
                    
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                       
                                     $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                 	                 $resultsub=$resultsub->result();
                                     $total=0;
                                     foreach($resultsub as $val)
                                     { 
                                       
                                      
                                                 $total+=round($val->qty*$val->rate,2);
                         
                                    }
                                    
                                    
                                      $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                                    
                                     
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                         
                                    }
                                    
                                    
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$value->sales_head."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                    
                                    
                                    
                                    
                       
                       
                         $status="Order Completed";
                         if($value->finance_status=='3')
                         {
                             $status='Finance Approved';
                         }
                         
                         if($value->finance_status=='4')
                         {
                             $status='Delivered';
                         }
                         
                         if($value->finance_status=='5')
                         {
                             $status='Reconciliation Completed';
                             $payment_status='Collected';
                         }
                         else
                         {
                             $payment_status='Pending';
                         }
                         
                         
                         if($value->pending_amount=='')
                         {
                              $value->pending_amount=0;
                         }
                         
                         if($value->collectamount=='')
                         {
                              $value->collectamount=0;
                         }
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no,
                 	 		'sales_group' => $sales_group,
                 	 		'sales_head' => $sales_head,
                 	 		'sales_team' => $sales_team,
                 	 	    'customername' => $value->company_name,
                 	 	    'payment_mode' => $value->payment_mode,
                 	 	    'collectamount' => $value->collectamount,
                 	 	    'pending_amount' => $value->pending_amount,
                 	 	    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                 	 		'total' => round($total,2),
                 	 		'status' => $status,
                 	 		'payment_status' => $payment_status
                 	 		

                 	 	);


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	public function fetch_data_sales_balance_report_export()
	{


           
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                      $payment_mode=$_GET['payment_mode'];
                     
                     $stat=' ';
                 	 
                 	 if($payment_mode!='undefined') 
                 	 {   
                 	     if($payment_mode!='ALL') 
                     	 {
                     	     $stat.=' AND a.payment_mode="'.$payment_mode.'"';
                     	 }
                 	     
                 	     
                 	 }
                 	 
                 	 
                 	 $stat.=' AND a.finance_status IN ("4","5")';
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $userslog="";
                  if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                     
                      if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d',strtotime('-1 days'));
                         $todate=date('Y-m-d',strtotime('-1 days'));
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	 
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	   
                     }
                    
                     $result=$result->result();
                 	 
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	
                 
                  
                   
                  
                         $filename='Sales_balance_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                        header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Sales Balance Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th>No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>Customer Name</th>
                          <th>Bill Amount</th>
                          <th>Collection</th>
                          <th>Pending Amount</th>
                          <th>Payment Mode</th>
                         
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                                   $pending_amounttotal=0;
                                                   $collectamounttotal=0;
                                      $overalltotal=0;
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	         $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                         	                 $resultsub=$resultsub->result();
                                             $total=0;
                                             foreach($resultsub as $val)
                                             { 
                                               
                                              
                                                         $total+=round($val->qty*$val->rate,2);
                                 
                                            }
                                            
                                            
                                              $minisroundoff= $value->roundoff;
                                $roundoffstatus= $value->roundoffstatus;
                                $discount= $value->discount;


                                if($roundoffstatus==1)
                                 {
                                     $total=$total-$discount+$minisroundoff;
                                 }
                                 else
                                 {
                                     $total=$total-$discount-$minisroundoff;
                                 }
                                            
                                            
                                             
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                         
                                    }
                                   
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$value->sales_head."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                 	     
                                 	     
                                 	             $status="Order Completed";
                                                 if($value->finance_status=='3')
                                                 {
                                                     $status='Finance Approved';
                                                 }
                                                 
                                                 if($value->finance_status=='4')
                                                 {
                                                     $status='Delivered';
                                                 }
                                                 
                                                 if($value->finance_status=='5')
                                                 {
                                                     $status='Reconciliation Completed';
                                                     $payment_status='Collected';
                                                 }
                                                 else
                                                 {
                                                     $payment_status='Pending';
                                                 }
                                                                         
                                                 $overalltotal+=$total;
                                                 
                                                 
                                                  $overalltotal+=$total;
                                                   $pending_amounttotal+=$value->pending_amount;
                                                   $collectamounttotal+=$value->collectamount;
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->company_name; ?></td>
                                          
                                          <td><?php echo $total; ?></td>
                                          
                                          <td><?php echo $value->collectamount; ?></td>
                                          <td><?php echo $value->pending_amount; ?></td>
                                          <td><?php echo $value->payment_mode; ?></td>
                                         
                          
                                            
                                        </tr>
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                                
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><b><?php echo  round($overalltotal,2); ?></b></td>
                                          <td><b><?php echo  round($collectamounttotal,2); ?></b></td>
                                          <td><b><?php echo  round($pending_amounttotal,2); ?></b></td>
                                          <td></td>
                     
                      
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_sales_report_export()
	{









  
           
                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $order_status=$_GET['order_status'];
                     
                     
                    $stat="";
                     if($order_status!='ALL') 
                 	 {
                 	      $stat=' AND a.finance_status="'.$order_status.'"';
                 	 }   
                     if(isset($_GET['sales_group']))
                 	{
                 	    if($_GET['sales_group']!='ALL') 
                     	 {
                     	      $stat.=' AND b.sales_group="'.$_GET['sales_group'].'"';
                     	 } 
                     	 else
                     	 {
                     	     $stat.='';
                     	 }
                 	}
                 	
                 	
                 	
                 	
                 	
                 	
                 	
                 	$userslog="";
                  if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                 	
                 	
                 	
                 	
                 	
                 	
                 	
                 	
                 	
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND  a.deleteid=0 AND a.order_base='1' $userslog  ORDER BY a.id DESC");
                 	 
                     }
                     else
                     {
                         
                       $result=$this->db->query("SELECT a.*,b.company_name,b.sales_team_id,b.sales_group,b.sales_head FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND a.order_base='1' $stat $userslog ORDER BY a.id DESC");
                 	   
                     }
                     
                    
                     $result=$result->result();
                 	 
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	
                 
                  
                   
                  
                         $filename='Sales_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                        header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Sales Day Book <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th> No</th>
                          <th>Date</th>
                          <th>Invoice No</th>
                          <th>Customer Name</th>
                          <th>Net Amount</th>
                          <!--<th>GST</th>
                          <th>Gross</th>-->
                          <th>Sales Group</th>
                          <th>Sales Head</th>
                          <th>Sales Team</th>
                          <th>Status</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                      $overalltotal=0;
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	         $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 AND order_id='".$value->id."' ORDER BY id DESC");
                         	                 $resultsub=$resultsub->result();
                                             $total=0;
                                             foreach($resultsub as $val)
                                             { 
                                               
                                              
                                                         $total+=round($val->qty*$val->rate,2);
                                 
                                            }
                                            
                                            
                                        $minisroundoff= $value->roundoff;
                                        $roundoffstatus= $value->roundoffstatus;
                                        $discount= $value->discount;
        
        
                                        if($roundoffstatus==1)
                                         {
                                             $total=$total-$discount+$minisroundoff;
                                         }
                                         else
                                         {
                                             $total=$total-$discount-$minisroundoff;
                                         }
                                                    
                                            
                                             
                                     $sales_group="";
                                     $sales_group_s=$this->db->query("SELECT name FROM sales_group  WHERE deleteid=0 AND id='".$value->sales_group."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_group=$val->name;
                         
                                    }
                                    
                                    
                                    
                                     $sales_team="";
                                     $sales_group_s=$this->db->query("SELECT name,define_saleshd_id FROM admin_users  WHERE deleteid=0 AND access='12' AND id='".$value->sales_team_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_team=$val->name;
                                               $define_saleshd_id=$val->define_saleshd_id;
                         
                                    }
                                   
                                     $sales_head="";
                                     $sales_group_s=$this->db->query("SELECT name FROM admin_users  WHERE deleteid=0 AND access='11' AND id='".$define_saleshd_id."' ORDER BY id DESC");
                 	                 $sales_group_ss=$sales_group_s->result();
                                    
                                     foreach($sales_group_ss as $val)
                                     { 
                                       
                                      
                                               $sales_head=$val->name;
                         
                                    }
                                 	     
                                 	     
                                 	             $status="Order Completed";
                                                 if($value->finance_status=='3')
                                                 {
                                                     $status='Finance Approved';
                                                 }
                                                 if($value->finance_status=='4')
                                                 {
                                                     $status='Delivered';
                                                 }
                                                 if($value->finance_status=='5')
                                                 {
                                                     $status='Reconciliation Completed';
                                                 }
                                                 
                                                 $overalltotal+=$total;
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->create_date)); ?></td>
                                          <td><?php echo $value->order_no; ?></td>
                                          <td><?php echo $value->company_name; ?></td>
                                          <td><?php echo $total; ?></td>
                                         <!-- <td>18 %</td>
                                          <td><?php echo $total; ?></td>-->
                                          <td><?php echo $sales_group; ?></td>
                                          <td><?php echo $sales_head; ?></td>
                                          <td><?php echo $sales_team; ?></td>
                                          
                                          <td><?php echo $status; ?></td>
                                          
                                       
                          
                                            
                                        </tr>
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                                
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><b><?php echo  round($overalltotal,2); ?></b></td>
                                          <td></td>
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	 public function productlist()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                      
                      
                      $cate_id= $form_data->cate_id;
                
                     if($cate_id!=0)
                     {
                         
                     
                     $resultpending= $this->Main_model->where_names_two_order_by('product_list','deleteid',0,'categories_id',$cate_id,'product_name','ASC');
                     
                     foreach ($resultpending as  $value) {
                         
                           
                            $array[] = array(
                         	    'id'=>trim($value->id),
                         	    'product_name'=>$value->product_name
                               );
                         
                         	


                     }
                     
                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_all()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     
                     $qq="";
                      $St="";
                     if($customer_id!='0')
                     {
                         $qq=' AND customer_id='.$customer_id;
                     }
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     $party_type=$_GET['party_type'];
                     $payment_status=$_GET['payment_status'];
                     
                    
                        
                          
                          
                        
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                              
                           
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE  `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	         $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE   `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	         $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE   `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	         $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq  ORDER BY id DESC");
                 	        
                         
                          
                          
                          
                                  if($party_type=='All')
                 	              {
                 	                  
                 	                                  $result=$result->result();
                 	                                  $result2=$result2->result();
                                                      $result3=$result3->result();
                                                      $result4=$result4->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	                    
                                 	                      
                 	 
                 	  
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result3=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result2=$result2->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result4=$result4->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result4=array();
                                 	              }
                 	                
                 	                  
                 	              }
                         
                         
                         
                         
               
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 $array1=array();
                 	 $array2=array();
                 	 $array3=array();
                 	  
                 	
                 	 foreach ($result as  $value) {
                       
                           $party= $this->Main_model->where_names('customers','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->company_name;
                              $customer_id=$partys->id;
                               
                           }
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'table'=>"customer_ledger",
                 	 		'link' => 'report/balancereport?type='.$payment_status.'&customer_id='.$customer_id, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $i++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 $j=$i;
                 	 	 foreach ($result2 as  $value) {
                       
                          $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Driver)';
                                $customer_id=$partys->id;
                           }
                         
                     
                 	 	$array1[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $j, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'table'=>"driver_ledger",
                 	 		'link' => 'driver/ledger_find?driver_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $j++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $k=$j;
                 	 	 foreach ($result3 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Vendor)';
                                $customer_id=$partys->id;
                           }
                           
                     
                 	 	$array2[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $k, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'table'=>"vendor_ledger",
                 	 		'link' => 'vendor/ledger_find?vendor_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $k++;

                 	 }
                 	 
                 	 
                 	 
                 	 	 
                 	 $l=$k;
                 	 	 foreach ($result4 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('admin_users','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Employee)';
                               $customer_id=$partys->id;
                           }
                           
                     
                 	 	$array3[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'table'=>"employee_ledger",
                 	 		'link' => 'employee/ledger_find?employee_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 $arrayval=array_merge($array,$array1,$array2,$array3);

                     echo json_encode($arrayval);

	}
	
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_all_base_by()
	{

                    
                     $accountshead=$_GET['accountshead'];
                     
                     $qq="";
                     $St="";
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     $party_type=$_GET['party_type'];
                   
                    
                                  if($party_type=='All')
                 	              {
                 	                  $St=' ';
                 	              }
                 	              else
                 	              {
                 	                  $St=' AND party_type='.$party_type;
                 	              }
                          
                         
                            if($accountshead!='0')
                            {
                               
                     	         $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE  deleteid=0  $St $qq  ORDER BY payment_date ASC");
                     	         $result5=$this->db->query("SELECT * FROM bankaccount_manage  WHERE  deleteid=0  $St $qq  ORDER BY create_date ASC");
                     	          
                                
                            }
                            else
                            {
                               
                                 $result4=$this->db->query("SELECT * FROM all_ledgers  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq  ORDER BY payment_date ASC");
                     	         $result5=$this->db->query("SELECT * FROM bankaccount_manage  WHERE `create_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq  ORDER BY create_date ASC");
                     	         
                                
                            }
                              
                             
                            $result4=$result4->result();
                            $result5=$result5->result();
                          
                          
                           
                 
                 	 $array3=array();
                 	 $array5=array();
                 	  
                 	
                 
                 	 
                 	 	 
                 	 $l=1;
                 	 foreach ($result4 as  $value) {
                       
                       
                        $account_head_idname="";
                           
                      if($value->debits==''){ $value->debits=0; }
                         if($value->credits==''){ $value->credits=0; }
                         
                            if($value->party_type==1)
                            {
                                $table='customers';
                                $traget='customer';
                                  $traget2='customer_id';
                                $query = $this->db->query("SELECT id,company_name as name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."'  ORDER BY company_name ASC");
                                        
                            }
                            if($value->party_type==2)
                            {
                                $table='driver';
                                $traget='driver';
                                  $traget2='driver_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                        
                            }
                             if($value->party_type==3)
                            {
                                $table='vendor';
                                $traget='vendor';
                                $traget2='vendor_id';
                                $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                            }
                            
                            if($value->party_type==5)
                            {
                                        $table='accountheads';
                                        $traget='accountheads';
                                        $traget2='customer_id';
                                        
                                         $query = $this->db->query("SELECT id,name FROM $table  WHERE deleteid='0' AND id='".$value->customer_id."' ORDER BY name ASC");
                                
                                        
                            }
                            
                            
                             $res=$query->result();
                             foreach($res as $partys)
                             {
                                                        $party_name=$partys->name;
                                                        $customer_id=$partys->id;
                             }
                             
                             
                             
                            $url=$traget.'/ledger_find?'.$traget2.'='.$customer_id.'&party_type='.$value->party_type;
                             
                         
                 	      	$array3[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'table'=>"all_ledgers",
                 	 		'link' => $url, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'accounthead'=>$account_head_idname
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                     $m=$l;
                 	 foreach ($result5 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('bankaccount','id',$value->bank_account_id);
                           foreach($party as $partys)
                           {
                               $party_name=$partys->bank_name;
                               $customer_id=$partys->id;
                           }
                           
                           
                          $account_head_idname="";
                            if($value->debits==''){ $value->debits=0; }
                         if($value->credits==''){ $value->credits=0; }
                     
                 	 	$array5[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $m, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => '', 
                 	 		'order_no' => '', 
                 	 		'payment_mode' => 'Bank', 
                 	 		'reference_no' => $value->ex_code,
                 	 		'table'=>"bankaccount_manage",
                 	 		'link' => 'bankaccount/statement?bank_id='.$customer_id.'&name='.$party_name, 
                 	 		'paid_status' => $value->payment_status, 
                 	 		'debits' => $value->debit,
                            'credits' => $value->credit,
                            'process_by' => $value->status_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->create_date)), 
                 	 		'payment_time' => $value->create_date,
                 	 		'accounthead'=>$account_head_idname
                 	 	
                 	 		

                 	 	);


                        $m++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $arrayval=array_merge($array3,$array5);

                     echo json_encode($arrayval);
                     
                     
                     

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    	public function fetch_data_get_ledger_view_all_accounts()
	{

                    
                              
                 	           $result2=$this->db->query("SELECT b.bank_name,b.id FROM  bankaccount as b WHERE b.deleteid=0");
                 	          
                                
                              
                 	           
                         	   $result2=$result2->result();
                         	  
                 	              
                 	    
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 
                 	 $array1=array();
                 	
                 	  
                 	    
                 	 
                 	 
                 	 
                 	     $j=$i;
                 	 	 foreach ($result2 as  $value) {
                       
                         
                         
                         
                                      $result_balance=$this->db->query("SELECT SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a  WHERE a.bank_account_id='".$value->id."' AND a.deleteid=0");
                                         $resultcheck=$result_balance->result(); 
                                       foreach ($resultcheck as  $valuess) {
                                           
                                           $total_debit=$valuess->total_debit;
                                           $total_credit=$valuess->total_credit;
                                       }
                         
                         
                                 	 	$array1[] = array(
                                 	 	    
                                 	 	    
                                 	 	    'no' => $i, 
                                 	 	    'id' => $value->id, 
                                            'name' => $value->bank_name, 
                                            'total_debit'  => $total_debit, 
                                            'total_credit' => $total_credit, 
                                            'balance' => round($total_credit-$total_debit,2),
                                            'ss' => base_url().'index.php/bankaccount/statement?bank_id='.$value->id.'&name='.$value->bank_name,
                                 	 	
                                 	 		
                
                                 	 	);


                        $j++;

                 	 }
                 	 
                 	 
                 	 
                 

                     echo json_encode($array1);

	}
	
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_total_all_by_base()
	{

                    
                     $accountshead=$_GET['accountshead'];
                     
                     $qq="";
                     $St="";
                     if($accountshead!='0')
                     {
                         $qq=' AND account_head_id='.$accountshead;
                     }
                     
                     
                             $limit=$_GET['limit'];
                             $formdate=$_GET['formdate'];
                             $party_type=$_GET['party_type'];
                             $todate=$_GET['todate'];
                                    
                                     
                                  
                          
                         
                         
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0  $St $qq ORDER BY id DESC");
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq ORDER BY id DESC");
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $St $qq ORDER BY id DESC");
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0  $St $qq ORDER BY id DESC");
                 	         
                 	         
                         
                 	           
                 	              
                 	              
                 	              
                 	              if($party_type=='All')
                 	              {
                 	                                      
                 	                                    
                 	                                      $result3=$result3->result(); 
                                             	          $result2=$result2->result(); 
                                             	          $result1=$result1->result();
                                             	          $result=$result->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result2=$result2->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result1=$result1->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result1=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result3=$result3->result(); 
                                 	              }
                 	                
                 	                  
                 	              }
                 	      
                         
                       
                
                 
                 	 
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                     $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     $totalpayment4=0;
                    
                 	  
                 	 foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                 	 }
                 	 
                 	
                 	 
                 	 
                 	 
                 	 foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                 	 }
                 	 
                 	 
                 	  foreach ($result2 as  $value2) {
                 	      
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	   foreach ($result3 as  $value3) {
                 	      
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                    $output=array('totaldebit'=>$totaldebit+$totaldebit1+$totaldebit2+$totaldebit3,'totalcridit'=>$totalcridit+$totalcridit1+$totalcridit2+$totalcridit3,'totalblance'=>0,'totalpaid'=>0,'outstanding'=>0);

                    echo json_encode($output);

	}
	
    
    
    
    
    	public function fetch_data_get_ledger_view_total_all()
	{

                    
                      $customer_id=$_GET['customer_id'];
                     
                     $qq="";
                      $St="";
                     if($customer_id!='0')
                     {
                         $qq=' AND customer_id='.$customer_id;
                     }
                     
                     
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $party_type=$_GET['party_type'];
                     $payment_status=$_GET['payment_status'];
                     
                     
                    
                             $todate=$_GET['todate'];
                             $payment_status=$_GET['payment_status'];
                          
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                          
                          
                          
                         
                         
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0'  $St $qq ORDER BY id DESC");
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	          $result4=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND payment_mode='Cash'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status='0' $St $qq ORDER BY id DESC");
                 	         
                 	         
                         
                 	           
                 	              $result4=$result4->result();
                 	              
                 	              
                 	              
                 	              
                 	              if($party_type=='All')
                 	              {
                 	                  
                 	                                      $result3=$result3->result(); 
                                             	          $result2=$result2->result(); 
                                             	          $result1=$result1->result();
                                             	          $result=$result->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result2=$result2->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result1=$result1->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result1=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                    $result3=array();
                                 	              }
                 	                
                 	                  
                 	              }
                 	      
                         
                       
                
                 
                 	 
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                     $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     $totalpayment4=0;
                    
                 	  
                 	 foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                 	 }
                 	 
                 	 foreach ($result4 as  $value4) {
                     
                     
                   
                      $totalpayment4= round($value4->totalcridit-$value4->totaldebit);
                    
                      
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                 	 }
                 	 
                 	 
                 	  foreach ($result2 as  $value2) {
                 	      
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	   foreach ($result3 as  $value3) {
                 	      
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                    $output=array('totalpayment'=>$totalpayment4,'totaldebit'=>$totaldebit+$totaldebit1+$totaldebit2+$totaldebit3,'totalcridit'=>$totalcridit+$totalcridit1+$totalcridit2+$totalcridit3,'totalblance'=>0,'totalpaid'=>0,'outstanding'=>0);

                    echo json_encode($output);

	}
	
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_export_all()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                       $payment_status=$_GET['payment_status'];
                       
                       
                         $qq="";
                          $St="";
                     if($customer_id!='0')
                     {
                         $qq=' AND customer_id='.$customer_id;
                     }
                     
                       $party_type=$_GET['party_type'];
                     
                        $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                        
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                          
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	        
                 	        
                 	         $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	        
                 	         $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	         $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	     
                         
                         
                         
                                   if($party_type=='All')
                 	              {
                 	                  
                 	                                  $result=$result->result();
                                                      $result2=$result2->result();
                                                      $result3=$result3->result();
                                                      $result4=$result4->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result3=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result2=$result2->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result4=$result4->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result4=array();
                                 	              }
                 	                
                 	                  
                 	              }
                         
                   
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 $array1=array();
                 	 $array2=array();
                 	 $array3=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                           $party= $this->Main_model->where_names('customers','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->company_name;
                               
                           }
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $i++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 $j=$i;
                 	 	 foreach ($result2 as  $value) {
                       
                          $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Driver)';
                               
                           }
                         
                     
                 	 	$array1[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $j, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $j++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $k=$j;
                 	 	 foreach ($result3 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Vendor)';
                               
                           }
                           
                     
                 	 	$array2[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $k, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $k++;

                 	 }
                 	 
                 	 
                 	 
                 	 	 
                 	 $l=$k;
                 	 	 foreach ($result4 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('admin_users','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Employee)';
                               
                           }
                           
                     
                 	 	$array3[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 $arrayval=array_merge($array,$array1,$array2,$array3);
                     
                     $arrayval=json_decode(json_encode($arrayval));
                    
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          
                              
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	         
                 	         
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	         
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	         
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 AND credits!='0' AND cash_trasfer_status=0 $St $qq ORDER BY id DESC");
                 	         
                 	         
                         
                         
                 	           
                 	           
                 	              if($party_type=='All')
                 	              {
                 	                  
                 	                                      $result3=$result3->result(); 
                                             	          $result2=$result2->result(); 
                                             	          $result1=$result1->result();
                                             	          $result=$result->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result2=$result2->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result1=$result1->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result1=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                    $result3=array();
                                 	              }
                 	                
                 	                  
                 	              }
                 	      
                         
                         
                  
                 	 
                 	 
                 
                 	 
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                      $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     
                     
                    
                 	  
                 	 foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result2 as  $value2) {
                 	      
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result3 as  $value3) {
                 	      
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	     $filename=date('d-m-Y').'_'.$name."_Balance_report"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  
                   ?>
                   
                      <table  id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"  style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Party Name </th>
                          <th>Reference No </th>
                          <th>Bill Amount</th>
                          
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         <th>Payment Mode</th>
                          
                         <th>Process By</th>
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                        <?php
                        foreach($arrayval as $names)
                        {
                            ?>
                            
                             <tr  class="trpoint" >
                          
                           <td><?php echo $names->no; ?></td>
                           <td><?php echo $names->payment_date; ?> </td>
                           <td><?php echo $names->party_name; ?></td>
                           <td><?php echo $names->reference_no; ?></td>
                           <td><?php echo $names->amount; ?></td>
                           
                           <td style="font-weight:800;text-align: right;"> <?php echo $names->credits; ?></td>
                           <td><?php echo $names->payment_mode; ?></td>
                           <td><?php echo $names->process_by; ?></td>
                           </tr>
                        
                            
                            <?php
                            
                            
                        }
                        
                        ?>
                       
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;"><?php echo $totaldebit+$totaldebit1+$totaldebit2+$totaldebit3; ?></td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;"><?php echo $totalcridit+$totalcridit1+$totalcridit2+$totalcridit3 ?></td>
                                                                  <td></td>
                                                                
                        </tr>
                      
                      
                      
                      
                      
                      
                      
                      
                    </table>
                   <?php

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_export_all_base_by()
	{

                    
                     $accountshead=$_GET['accountshead'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                       
                         $qq="";
                         $St="";
                         if($accountshead!='0')
                         {
                             $qq=' AND account_head_id='.$accountshead;
                         }
                     
                       $party_type=$_GET['party_type'];
                       $todate=$_GET['todate'];
                         
                          
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0  $qq ORDER BY id DESC");
                 	        
                 	        
                 	         $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0  $qq ORDER BY id DESC");
                 	        
                 	         $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0  $qq ORDER BY id DESC");
                 	         $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'    AND deleteid=0  $qq ORDER BY id DESC");
                 	     
                              $result5=$this->db->query("SELECT * FROM bankaccount_manage  WHERE `create_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 AND status_by='Bank Deposit' $St $qq  ORDER BY id DESC");
                         
                         
                                   if($party_type=='All')
                 	              {
                 	                  
                 	                                  $result=$result->result();
                                                      $result2=$result2->result();
                                                      $result3=$result3->result();
                                                      $result4=$result4->result();
                                                       $result5=$result5->result();

                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result3=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result2=$result2->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result4=$result4->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result4=$result4->result(); 
                                 	              }
                                 	              
                                 	              
                                 	                if($party_type=='Bank')
                                 	              {
                                 	                    $result5=$result5->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result5=array();
                                 	              }
                 	                
                 	                  
                 	              }
                         
                   
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 $array1=array();
                 	 $array2=array();
                 	 $array3=array();
                 	 $array5=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                           $party= $this->Main_model->where_names('customers','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->company_name;
                               
                           }
                         $accountshead = $this->Main_model->where_names('accountheads','id',$value->account_head_id);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $account_head_idname= $val->name;
							            	      }
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'account_head_idname' => $account_head_idname
                 	 	
                 	 		

                 	 	);


                        $i++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 $j=$i;
                 	 	 foreach ($result2 as  $value) {
                       
                          $party= $this->Main_model->where_names('driver','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Driver)';
                               
                           }
                         
                          $accountshead = $this->Main_model->where_names('accountheads','id',$value->account_head_id);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $account_head_idname= $val->name;
							            	      }
                     
                     
                 	 	$array1[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $j, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'account_head_idname' => $account_head_idname
                 	 	
                 	 		

                 	 	);


                        $j++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 $k=$j;
                 	 	 foreach ($result3 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('vendor','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Vendor)';
                               
                           }
                           
                            $accountshead = $this->Main_model->where_names('accountheads','id',$value->account_head_id);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $account_head_idname= $val->name;
							            	      }
                     
                           
                     
                 	 	$array2[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $k, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                            'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'account_head_idname' => $account_head_idname
                 	 	
                 	 		

                 	 	);


                        $k++;

                 	 }
                 	 
                 	 
                 	 
                 	 	 
                 	 $l=$k;
                 	 	 foreach ($result4 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('admin_users','id',$value->customer_id);
                           foreach($party as $partys)
                           {
                              $party_name=$partys->name.' (Employee)';
                               
                           }
                           
                            $accountshead = $this->Main_model->where_names('accountheads','id',$value->account_head_id);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $account_head_idname= $val->name;
							            	      }
                     
                           
                     
                 	 	$array3[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => $value->order_id, 
                 	 		'order_no' => $value->order_no, 
                 	 		'payment_mode' => $value->payment_mode, 
                 	 		'reference_no' => $value->reference_no,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                             'process_by' => $value->process_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 		'account_head_idname' => $account_head_idname
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
 $m=$l;
                 	 	 foreach ($result5 as  $value) {
                       
                       
                           $party= $this->Main_model->where_names('bankaccount','id',$value->bank_account_id);
                           foreach($party as $partys)
                           {
                               $party_name=$partys->bank_name;
                               $customer_id=$partys->id;
                           }
                           
                           
                             $accountshead = $this->Main_model->where_names('accountheads','id',$value->account_head_id);
							            	      foreach($accountshead as $val)
							            	      {
							            	         $account_head_idname= $val->name;
							            	      }
                           
                     
                 	 	$array5[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $l, 
                            'id' => $value->id, 
                            'party_name' => $party_name, 
                            'order_id' => '', 
                 	 		'order_no' => '', 
                 	 		'payment_mode' => 'Bannk', 
                 	 		'reference_no' => $value->ex_code,
                 	 		'table'=>"bankaccount_manage",
                 	 		'link' => 'index.php/bankaccount/statement?bank_id='.$customer_id.'&name='.$party_name, 
                 	 		'paid_status' => $value->payment_status, 
                 	 		'debits' => $value->debit,
                            'credits' => $value->credit,
                            'process_by' => $value->status_by,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-m-Y',strtotime($value->create_date)), 
                 	 		'payment_time' => $value->create_date,
                 	 		'account_head_idname' => $account_head_idname
                 	 	
                 	 		

                 	 	);


                        $m++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	 
                 	 
                 	   $arrayval=array_merge($array,$array1,$array2,$array3,$array5);
                     
                       $arrayval=json_decode(json_encode($arrayval));
                    
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          
                              
                             
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $qq ORDER BY id DESC");
                 	         
                 	         
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $qq ORDER BY id DESC");
                 	         
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0  $qq ORDER BY id DESC");
                 	         
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0  $qq ORDER BY id DESC");
                 	         
                 	         
                         
                         
                 	           
                 	           
                 	              if($party_type=='All')
                 	              {
                 	                  
                 	                                      $result3=$result3->result(); 
                                             	          $result2=$result2->result(); 
                                             	          $result1=$result1->result();
                                             	          $result=$result->result();
                 	                  
                 	              }
                 	              else
                 	              {
                 	                  
                 	                              if($party_type=='Customer')
                                 	              {
                                 	                    $result=$result->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result=array();
                                 	              }
                                 	              
                                 	              if($party_type=='Vendor')
                                 	              {
                                 	                   $result2=$result2->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result2=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Driver')
                                 	              {
                                 	                   $result1=$result1->result();
                                 	              }
                                 	              else
                                 	              {
                                 	                  $result1=array();
                                 	              }
                                 	              
                                 	               if($party_type=='Employee')
                                 	              {
                                 	                    $result3=$result3->result(); 
                                 	              }
                                 	              else
                                 	              {
                                 	                   $result3=$result3->result(); 
                                 	              }
                 	                
                 	                  
                 	              }
                 	      
                         
                         
                  
                 	 
                 	 
                 
                 	 
                 
                     $totalpayment=0;
                     $totaldebit=0;
                     $totalcridit=0;
                     
                     
                     $totalpayment1=0;
                     $totaldebit1=0;
                     $totalcridit1=0;
                     
                     $totalpayment2=0;
                     $totaldebit2=0;
                     $totalcridit2=0;
                     
                     
                      $totalpayment3=0;
                     $totaldebit3=0;
                     $totalcridit3=0;
                     
                     
                    
                 	  
                 	 foreach ($result as  $value) {
                     
                     
                      $totalpayment= round($value->totalcridit);
                      $totaldebit= round($value->totaldebit); 
                      $totalcridit= round($value->totalcridit);
                    
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result1 as  $value1) {
                      
                      $totalpayment1= round($value1->totalcridit);
                      $totaldebit1= round($value1->totaldebit); 
                      $totalcridit1= round($value1->totalcridit);
                      
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result2 as  $value2) {
                 	      
                      $totalpayment2= round($value2->totalcridit);
                      $totaldebit2= round($value2->totaldebit); 
                      $totalcridit2= round($value2->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 foreach ($result3 as  $value3) {
                 	      
                      $totalpayment3= round($value3->totalcridit);
                      $totaldebit3= round($value3->totaldebit); 
                      $totalcridit3= round($value3->totalcridit);
                     
                      
                 	 }
                 	 
                 	 
                 	 
                 	 
                 	     $filename=date('d-m-Y').'_'.$name."_Balance_sheet_report"; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  
                   ?>
                   
                      <table  id="datatable" class="table table-bordered dt-responsive  nowrap w-100"  border="1"  style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr>


                          <th>No</th>
                          <th>Date</th>
                          <th>Party Name </th>
                          <th>Reference No </th>
                         
                           <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         <th>Payment Mode</th>
                          
                         <th>Process By</th>
                         <th>Account Head</th>
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                        <?php
                        foreach($arrayval as $names)
                        {
                            ?>
                            
                             <tr  class="trpoint" >
                          
                           <td><?php echo $names->no; ?></td>
                           <td><?php echo $names->payment_date; ?> </td>
                           <td><?php echo $names->party_name; ?></td>
                           <td><?php echo $names->reference_no; ?></td>
                           <td style="font-weight:800;text-align: right;"> <?php echo $names->debits; ?></td>
                           <td style="font-weight:800;text-align: right;"> <?php echo $names->credits; ?></td>
                           <td><?php echo $names->payment_mode; ?></td>
                           <td><?php echo $names->process_by; ?></td>
                            <td><?php echo $names->account_head_idname; ?></td>
                           </tr>
                        
                            
                            <?php
                            
                            
                        }
                        
                        ?>
                       
                      
                      </tbody>
                      
                      
                      
                      
                      
                      
                      
                      
                       
                        <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;"><?php echo $totaldebit+$totaldebit1+$totaldebit2+$totaldebit3; ?></td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;"><?php echo $totalcridit+$totalcridit1+$totalcridit2+$totalcridit3 ?></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                
                        </tr>
                      
                      
                      
                      
                      
                      
                      
                      
                    </table>
                   <?php

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     	public function fetch_data_get_customer_order_report()
	{

                    
                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  GROUP BY b.id  ORDER BY no_of_orders DESC");
                 	  
                 	     
                 	       
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND a.customer_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY no_of_orders DESC");
                 	        
                 	      
                     }
                     
                 	
                     $result=$result->result();
                   
                         
                    
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                                       
                                       
                                        $sql="SELECT SUM(b.qty*b.rate) as totalvalue FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                 	      
                 	      
                 	  
                                       $resultsub=$this->db->query($sql);
                 	                   $resultsub=$resultsub->result();
                 	                   
                 	                 
                                       foreach($resultsub as $val)
                                       { 
                                            $totalvalue= $val->totalvalue;
                                                     
                                       }
                                      
                                      
                                      if($totalvalue=='')
                                      {
                                          $totalvalue=0;
                                      }
                                         
                                         	 	$array[] = array(
                                         	 	    
                                         	 	    
                                         	 	    'no' => $i, 
                                                     
                                         	 		'no_of_orders' => $value->no_of_orders, 
                                         	 	    'customername' => $value->company_name,
                                         	 	    'totalvalue' =>round($totalvalue,2)
                                         	 	    
                                         	 		
                        
                                         	 	);
                                         	
                                   


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
		public function fetch_data_get_customer_yes_no_order_report()
	{

                    
                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                    $userslog="";
                    if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                     
                  
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND a.sales_team_id="'.$cateid.'"';
                             $result=$this->db->query("SELECT a.company_name,a.id as customer_id,a.sales_team_id FROM customers as a WHERE  a.deleteid=0 $stat    ORDER BY a.company_name ASC LIMIT 0,200");  
                         }
                         else
                         {
                              $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name,b.sales_team_id FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat  $userslog GROUP BY b.id ORDER BY no_of_orders DESC");
                 	      }
                             
                 	
                     
                    
                 	 
                     $result=$result->result();
                   
                         
                    
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                                       
                                       
                                       $sql="SELECT SUM(b.qty*b.rate) as totalvalue,a.roundoff,a.roundoffstatus,a.discount FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                 	                   $resultsub=$this->db->query($sql);
                 	                   $resultsub=$resultsub->result();
                 	                   foreach($resultsub as $val)
                                       {  
                                           $totalvalue= $val->totalvalue;
                                           $minisroundoff= $val->roundoff;
                                           $roundoffstatus= $val->roundoffstatus;
                                           $discount= $val->discount;
                                              
                                       }
                                       
                                       
                                       $sql1="SELECT COUNT(b.id) as no_of_orders FROM orders_process as a JOIN  customers as b ON a.customer_id=b.id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0 AND a.customer_id='".$value->customer_id."'";      
                 	                   $resultsub1=$this->db->query($sql1);
                 	                   $resultsub1=$resultsub1->result();
                 	                   foreach($resultsub1 as $val1)
                                       {  
                                           $no_of_orders= $val1->no_of_orders;
                                           if($no_of_orders==0)
                                           {
                                               $orders_status='NO';
                                           }
                                           else
                                           {
                                               $orders_status='YES';
                                           }
                                       }
                                       
                                       
                                      
                                              
                                                  if($totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                                  
                                                  
                                                  
                                                    
                    
                    
                                                    if($roundoffstatus==1)
                                                     {
                                                         $totalvalue=$totalvalue-$discount+$minisroundoff;
                                                     }
                                                     else
                                                     {
                                                         $totalvalue=$totalvalue-$discount-$minisroundoff;
                                                     }
                     
                                              
                                              
                                                   $sales_team_id = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                                                   foreach($sales_team_id as $vv)
                                                   {
                                                       $sales_member=$vv->name;
                                                   }
                                         
                                         	 	$array[] = array(
                                         	 	    
                                         	 	    
                                         	 	    'no' => $i, 
                                                    'sales_member' => $sales_member, 
                                         	 		'no_of_orders' => $no_of_orders, 
                                         	 		'orders_status' => $orders_status,
                                         	 	    'customername' => $value->company_name,
                                         	 	    'totalvalue' =>round($totalvalue,2)
                                         	 	    
                                         	 		
                        
                                         	 	);
                                         	
                                   


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	 	public function fetch_data_get_customer_yes_no_order_report_export()
	{









  
           
                    
                      $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                     
                     
                     
                    $userslog="";
                    if($this->session->userdata['logged_in']['access']=='12')
                    {
                                 
                         $userslog.=' AND a.user_id="'.$this->userid.'"';        
                                 
                    }
                    
                    if($this->session->userdata['logged_in']['access']=='11')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          
                          
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                                 
                          $userslog.=' AND  a.user_id IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                    if($this->session->userdata['logged_in']['access']=='16')
                    {
                        
                        
                        
                          $sales_team_id=array();
                          $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='".$this->userid."'");
                          $resultsales_team=$query->result();
                          foreach ($resultsales_team as  $values) {
                              
                              $sales_team_id[]=$values->id;
                              
                          }
                          $sales_team_id="'".implode("','", $sales_team_id)."'";
                          $userslog.=' AND  a.sales_group IN ('.$sales_team_id.')';    
                         
                         
                                 
                    }
                    
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                          $result=$this->db->query("SELECT a.company_name,a.id as customer_id,a.sales_team_id FROM customers as a WHERE  a.deleteid=0   ORDER BY a.company_name ASC LIMIT 0,200");
                 	  
                     }
                     else
                     {
                         
                        if($cateid!='ALL')
                         {
                             $stat=' AND a.sales_team_id="'.$cateid.'"';
                             $result=$this->db->query("SELECT a.company_name,a.id as customer_id,a.sales_team_id FROM customers as a WHERE  a.deleteid=0 $stat  ORDER BY a.company_name ASC LIMIT 0,200");  
                         }
                         else
                         {
                              $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name,b.sales_team_id FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat $userslog GROUP BY b.id ORDER BY no_of_orders DESC");
                 	      }
                             
                     }
                     
                 	
                     $result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='Customer_order_status_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="4">Customer Order Status Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Sales Member </th>
                          <th>Customer Name</th>
                          <th> Order Status</th>
                          <th>NO Of Orders</th>
                          <th>Orders Value</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	     
                                 	   $sql="SELECT SUM(b.qty*b.rate) as totalvalue,a.roundoff,a.roundoffstatus,a.discount FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                 	                   $resultsub=$this->db->query($sql);
                 	                   $resultsub=$resultsub->result();
                 	                   foreach($resultsub as $val)
                                       {  
                                           $totalvalue= $val->totalvalue;
                                           
                                           $minisroundoff= $val->roundoff;
                                           $roundoffstatus= $val->roundoffstatus;
                                           $discount= $val->discount;
                                              
                                       }
                                       
                                       
                                       $sql1="SELECT COUNT(b.id) as no_of_orders FROM orders_process as a JOIN  customers as b ON a.customer_id=b.id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  AND b.deleteid=0 AND a.customer_id='".$value->customer_id."'";      
                 	                   $resultsub1=$this->db->query($sql1);
                 	                   $resultsub1=$resultsub1->result();
                 	                   foreach($resultsub1 as $val1)
                                       {  
                                           $no_of_orders= $val1->no_of_orders;
                                           if($no_of_orders==0)
                                           {
                                               $orders_status='NO';
                                           }
                                           else
                                           {
                                               $orders_status='YES';
                                           }
                                       }
                                       
                                       
                                      
                                              
                                                  if($totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                                  
                                                    if($roundoffstatus==1)
                                                     {
                                                         $totalvalue=$totalvalue-$discount+$minisroundoff;
                                                     }
                                                     else
                                                     {
                                                         $totalvalue=$totalvalue-$discount-$minisroundoff;
                                                     }
                                              
                                              
                                                   $sales_team_id = $this->Main_model->where_names('admin_users','id',$value->sales_team_id);
                                                   foreach($sales_team_id as $vv)
                                                   {
                                                       $sales_member=$vv->name;
                                                   }       
                                 	        
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo $sales_member; ?></b></td>
                                          <td><b><?php echo $value->company_name; ?></b></td>
                                          <td><b><?php echo $orders_status ?></b></td>
                                          <td><b><?php echo $no_of_orders; ?></b></td>
                                          <td><b><?php echo $totalvalue; ?></b></td>
                                          
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	     
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
	
	
	
	
      	public function fetch_data_get_customer_order_report_export()
	{









  
           
                    
                      $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0  GROUP BY b.id  ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND customer|_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.customer_id as customer_id,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY a.id DESC");
                 	
                     }
                     
                 	
                     $result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='Customer_order_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="4">Customer Order Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Customer Name</th>
                          <th>NO Of Orders</th>
                          <th>Orders Value</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	     
                                 	               $sql="SELECT SUM(b.qty*b.rate) as totalvalue FROM orders_process as a JOIN  order_product_list_process as b ON a.id=b.order_id  WHERE a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 AND b.deleteid=0  AND a.customer_id='".$value->customer_id."'";      
                 	      
                 	      
                 	  
                                                   $resultsub=$this->db->query($sql);
                             	                   $resultsub=$resultsub->result();
                             	                   
                             	                 
                                                   foreach($resultsub as $val)
                                                   { 
                                                        $totalvalue= $val->totalvalue;
                                                                 
                                                   }
                                                  
                                                  
                                                  if($totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                             	             
                                 	        
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo $value->company_name; ?></b></td>
                                          <td><b><?php echo $value->no_of_orders; ?></b></td>
                                          <td><b><?php echo $totalvalue; ?></b></td>
                                          
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	     
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
    
    
    
    
    
    
    
    
    
    
    
         	public function fetch_data_get_vendor_purchase_report()
	{

                    
                     $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                     if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.order_date,a.vendor_id as vendor_id,b.name,b.name,SUM(a.inward_qty*a.price ) as totalvalue FROM purchase_order as a JOIN vendor as b ON a.vendor_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0  GROUP BY b.id  ORDER BY a.id DESC");
                 	  
                 	     
                 	       
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND a.vendor_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.order_date,a.vendor_id as vendor_id,b.name,SUM(a.inward_qty*a.price ) as totalvalue FROM purchase_order as a JOIN vendor as b ON a.vendor_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY a.id DESC");
                 	        
                 	      
                     }
                     
                 	
                     $result=$result->result();
                   
                         
                    
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                                       
                                       
                                    
                                      
                                      
                                                  if($value->totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                                  else
                                                  {
                                                       $totalvalue=$value->totalvalue;
                                                  }
                                                     
                                         	 	$array[] = array(
                                         	 	    
                                         	 	    
                                         	 	    'no' => $i, 
                                                     
                                         	 		'no_of_orders' => $value->no_of_orders, 
                                         	 	    'customername' => $value->name,
                                         	 	     'order_date' =>date('d-m-Y',strtotime($value->order_date)),
                                         	 	    'totalvalue' =>round($totalvalue,2)
                                         	 	    
                                         	 		
                        
                                         	 	);
                                         	
                                   


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
      	public function fetch_data_get_customer_vendor_purchase_export()
	{









  
           
                    
                      $cateid=$_GET['cate_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                    
                     $stat="";
                    
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-d');
                         $todate=date('Y-m-d');
                         $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.order_date,a.vendor_id as vendor_id,b.name,b.name,SUM(a.inward_qty*a.price ) as totalvalue FROM purchase_order as a JOIN vendor as b ON a.vendor_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0  GROUP BY b.id  ORDER BY a.id DESC");
                 	  
                 	     
                 	       
                     }
                     else
                     {
                         
                         if($cateid!='ALL')
                         {
                             $stat=' AND a.vendor_id="'.$cateid.'"';
                         }
                         
                         
                        
                        $result=$this->db->query("SELECT COUNT(a.id) no_of_orders,a.order_date,a.vendor_id as vendor_id,b.name,SUM(a.inward_qty*a.price ) as totalvalue FROM purchase_order as a JOIN vendor as b ON a.vendor_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0 $stat GROUP BY b.id ORDER BY a.id DESC");
                 	        
                 	      
                     }
                 	
                     $result=$result->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='Purchase_day_book_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="5">Purchase Day Book <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">

                          <th>No</th>
                          <th>Date</th>
                          <th>Vendor Name</th>
                          <th>NO Of Purchase</th>
                          <th>Purchase Value</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	     
                                                 
                                                  if($value->totalvalue=='')
                                                  {
                                                      $totalvalue=0;
                                                  }
                                                  else
                                                  {
                                                       $totalvalue=$value->totalvalue;
                                                  }
                                             	             
                                 	        
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo date('d-m-Y',strtotime($value->order_date)); ?></b></td>
                                          <td><b><?php echo $value->name; ?></b></td>
                                          <td><b><?php echo $value->no_of_orders; ?></b></td>
                                          <td><b><?php echo $totalvalue; ?></b></td>
                                          
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	     
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
     	public function fetch_data_vendor_purchase_product_view()
	{

                    
                     $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     $stat="";
                       
                     
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT a.po_number,a.order_date,a.inward_qty as qty,a.price as rate,b.product_name,b.source_name FROM purchase_order as a JOIN product_list as b ON a.product_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                         
                        $result=$this->db->query("SELECT a.po_number,a.order_date,a.inward_qty as qty,a.price as rate,b.product_name,b.source_name FROM purchase_order as a JOIN product_list as b ON a.product_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0 $stat ORDER BY a.id DESC");
                 	
                     }
                     
                 	
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $search.=' AND a.id="'.$productid.'"';
                 	 }
                 	
                 	
                 	
                 	
                 	   
                         
                     $result=$result->result();
                   
                         
                    
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                                    
                                     
                                         	 	$array[] = array(
                                         	 	    
                                         	 	    
                                         	 	    'no' => $i, 
                                                    'id' => $value->id, 
                                                    'order_id' => $value->po_number, 
                                         	 		'order_no' => $value->po_number, 
                                         	 	    'product_name' => $value->product_name,
                                         	 	    'qty' => $value->qty, 
                                         	 	    'rate' => $value->rate, 
                                         	 	    'create_date' =>date('d-m-Y',strtotime($value->order_date)),
                                         	 		'totalamount' => round($value->qty*$value->rate,2)
                                         	 		
                        
                                         	 	);
                                       


                        $i++;

                 	 }

                    echo json_encode($array);

	}
	
	
	
	
      	public function fetch_data_vendor_purchase_product_export()
	{









  
           
                    
                       $cateid=$_GET['cate_id'];
                     $productid=$_GET['productid'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $todate=$_GET['todate'];
                     
                     
                     $stat="";
                       
                     
                     
                    if($_GET['formdate']=='undefined')
                     {
                         
                        
                         $formdate=date('Y-m-01');
                         $todate=date('Y-m-t');
                         $result=$this->db->query("SELECT a.po_number,a.order_date,a.inward_qty as qty,a.price as rate,b.product_name,b.source_name FROM purchase_order as a JOIN product_list as b ON a.product_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0  ORDER BY a.id DESC");
                 	
                     }
                     else
                     {
                         
                        $result=$this->db->query("SELECT a.po_number,a.order_date,a.inward_qty as qty,a.price as rate,b.product_name,b.source_name FROM purchase_order as a JOIN product_list as b ON a.product_id=b.id  WHERE  a.order_date BETWEEN '".$formdate."' AND '".$todate."' AND a.inward_qty!='0' AND a.deleteid=0 $stat ORDER BY a.id DESC");
                 	
                     }
                     
                 	
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $search.=' AND a.id="'.$productid.'"';
                 	 }
                 	
                 	
                 	
                 	
                 	   
                         
                     $result=$result->result();
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                    
                  
                         $filename='vendor_purchase_product_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Vendor Purchase Product Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                         
                          <th>No</th>
                          <th>Date</th>
                          <th>PO No</th>
                          <th>Product name</th>
                          <th>QTY</th>
                          <th>Price</th>
                          <th>Bill Amount</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                                     
                                     $Totalval=0;
                                 	 foreach ($result as  $value) {
                                 	     
                                 	      $Totalval+= round($value->qty*$value->rate,2);
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><?php echo $i; ?></td>
                                          <td><?php echo date('d-m-Y',strtotime($value->order_date)); ?></td>
                                          <td><?php echo $value->po_number; ?></td>
                                          <td><?php echo $value->product_name; ?></td>
                                          <td><?php echo $value->qty; ?></td>
                                          <td><?php echo $value->rate; ?></td>
                                          <td><?php echo round($value->qty*$value->rate,2); ?></td>
                                          
                                        </tr>
                                 	    
                                 	  
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                                 
                                 
                                 
                                  <tr >
                          
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><?php echo $Totalval; ?></td>
                                          
                                        </tr>
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	
	
	
	
    
    
	

}	
