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
    
       public function balancereport()
    {
                  

                 
                  
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
    
    
    
    
    
    
      public function accountsreport()
    {
                  

                 
                  
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
                 	      $stat=' AND finance_status="'.$order_status.'"';
                 	 }   
                     
                     
                    
                     $result=$this->db->query("SELECT a.*,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat ORDER BY a.id DESC");
                 	
                 	 $search='';
                 	 if($cateid!='ALL') 
                 	 {
                 	     $search.=' AND categories_id="'.$cateid.'"';
                 	 }
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $search.=' AND product_id="'.$productid.'"';
                 	 }
                 	
                 	
                 	
                 	 $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 $search ORDER BY id ASC");
                 	     
                         
                     $result=$result->result();
                     $resultsub=$resultsub->result();
                         
                    
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 	  
                 	 foreach ($result as  $value) {
                       
                       
                       
                       
                       
                                   $array2=array();
                                   $total=0;
                                   foreach($resultsub as $val)
                                   { 
                                       
                                       if($value->id==$val->order_id)
                                       {
                                                 $total+=round($val->qty*$val->rate,2);
                         
                                             	$array2[] = array(
                 	 	                        'no' => $i, 
                                                'id' => $val->id, 
                                                'categories_name' => $val->categories_name, 
                                     	 		'product_name' => $val->product_name, 
                                     	 		'qty' => $val->qty, 
                                     	 		'totalamount' => round($val->qty*$val->rate,2)
                    
                                     	 	);
                                                                 
                                           
                                       }
                                          
                                       
                                   }
                       
                       
                         $status=="Pending";
                         if($value->finance_status=='3')
                         {
                             $status='Approved';
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
                 	 	    'customername' => '',
                 	 	    'create_date' =>date('d-m-Y',strtotime($value->create_date)),
                 	 		'total' => round($total,2),
                 	 		'status' => $status,
                 	 		'resultsub'=>$array2
                 	 		

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
                 	      $stat=' AND finance_status="'.$order_status.'"';
                 	 }   
                     
                     
                    
                     $result=$this->db->query("SELECT a.*,b.company_name FROM orders_process as a JOIN customers as b ON a.customer_id=b.id  WHERE  a.create_date BETWEEN '".$formdate."' AND '".$todate."' AND a.order_no!='' AND a.deleteid=0 $stat ORDER BY a.id DESC");
                 	
                 	 $search='';
                 	 if($cateid!='ALL') 
                 	 {
                 	     $search.=' AND categories_id="'.$cateid.'"';
                 	 }
                 	 
                 	 if($productid!='ALL') 
                 	 {
                 	     $search.=' AND product_id="'.$productid.'"';
                 	 }
                 	
                 	
                 	
                 	 $resultsub=$this->db->query("SELECT * FROM order_product_list_process  WHERE deleteid=0 $search ORDER BY id ASC");
                 	     
                         
                     $result=$result->result();
                     $resultsub=$resultsub->result();
                 	 
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	  $array=array();
                 
                  
                     $resultvent= $this->Main_model->where_names('driver','id',$customer_id);
                 	 foreach ($resultvent as  $valuess) {
                      $name= $valuess->name; 
                      
                      $vehicle_id= $valuess->vehicle_id;
                      $phone= $valuess->phone;
                     
                     
                     
                      
	                 	
                 	 }
                  
                         $filename='Sales_report_'.$formdate.'_TO_'.$todate; 
                         header("Content-Type: application/xls");    
                         header("Content-Disposition: attachment; filename=$filename.xls");  
                         header("Pragma: no-cache"); 
                         header("Expires: 0");
                  ?>
                  
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100"    style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                         <thead>
                             
                             
                              <tr><th colspan="8">Sales Report <?php echo $formdate; ?> To <?php echo $todate; ?></th></tr>
                           
                          
                         </thead> 
                         
                    </table>
                  
                     <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" border="1"   style="border: #d1d1d1 solid 1px;border-collapse: collapse;width: 100%;line-height: 1.5;" >
                      <thead>
                        <tr style="text-align: left;">


                          <th> No</th>
                          <th>Date</th>
                          <th>Order No</th>
                          <th>QTY</th>
                          <th>Bill Amount</th>
                          <th>Status</th>
            
                        </tr>
                      </thead>
                        <tbody>
                            
                            <?php
                            
                                 	 foreach ($result as  $value) {
                                 	     
                                 	     
                                 	              $status=="Pending";
                                                 if($value->finance_status=='3')
                                                 {
                                                     $status='Approved';
                                                 }
                                                 if($value->finance_status=='4')
                                                 {
                                                     $status='Delivered';
                                                 }
                                                 if($value->finance_status=='5')
                                                 {
                                                     $status='Reconciliation Completed';
                                                 }
                            
                                 	    ?>
                                 	      <tr >
                          
                                          <td><b><?php echo $i; ?></b></td>
                                          <td><b><?php echo date('d-m-Y',strtotime($value->create_date)); ?></b></td>
                                          <td><b><?php echo $value->order_no; ?></b></td>
                                          <td></td>
                                          <td></td>
                                          <td><?php echo $status ?></td>
                                          
                                        </tr>
                                 	    
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	        $total=0;
                                 	        foreach($resultsub as $val)
                                           { 
                                               
                                                if($value->id==$val->order_id)
                                                {
                                                    
                                                     $total+=round($val->qty*$val->rate,2);
                         
                                                    
                                                    ?>
                                         <tr >
                          
                                          <td></td>
                                          <td><?php echo $val->categories_name; ?> </td>
                                          <td><?php echo $val->product_name; ?> </td>
                                          <td><?php echo $val->qty; ?></td>
                                          <td><?php echo  round($val->qty*$val->rate,2); ?></td>
                                           <td></td>
                                            
                                        </tr>
                                                    
                                                    <?php
                                                    
                                                    
                                                }
                                               
                                               
                                           }
                                 	    ?>
                                 	    
                                 	     <tr >
                          
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td><b><?php echo  round($total,2); ?></b></td>
                                          <td></td>
                                            
                                        </tr>
                                 	    <?php
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    $i++;
                                 	 }
                            
                            ?>
                      
                        
                        
                       
                     
                        
                         
                        
                      
                      </tbody>
                    </table>
                  <?php
                  
                  
                  
                  
                  
                  
                  
                  

	}
	 public function productlist()
    {
                $form_data= json_decode(file_get_contents("php://input"));
                $array =array();
                      
                      
                     $cate_id= $form_data->cate_id;
                

                     $resultpending= $this->Main_model->where_names_two_order_by('product_list','deleteid',0,'categories_id',$cate_id,'product_name','ASC');
                     
                     foreach ($resultpending as  $value) {
                         
                           
                            $array[] = array(
                         	    'id'=>trim($value->id),
                         	    'product_name'=>$value->product_name
                               );
                         
                         	


                     }

             
                     echo json_encode($array);
                     


              

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_all()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     
                     $party_type=$_GET['party_type'];
                     $payment_status=$_GET['payment_status'];
                     
                     if($payment_status=='All')
                     {
                                
                                
                              $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          
                 	          
                 	          $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          
                 	          
                 	          
                 	          $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          
                                
                              $result=$this->db->query("SELECT * FROM customer_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          
                 	          
                 	          
                 	              
                 	              if($party_type=='All')
                 	              {
                 	                  
                 	                  $result4=$result4->result(); 
                         	          $result3=$result3->result(); 
                         	          $result2=$result2->result();
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
                 	              
                 	                 
                 	                  
                 	              
                 	          
                 	          
                 	          
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                        
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                          }
                          else
                          {
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              elseif($payment_status=='2')
                              {
                                  $St=' AND payment_mode="Cheque"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE  `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                 	        
                 	         $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE   `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                 	         $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE   `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	         $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                          }
                          
                          
                          
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
                 	 		'link' => 'customer/ledger_find?customer_id='.$customer_id, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'link' => 'driver/ledger_find?driver_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'link' => 'vendor/ledger_find?vendor_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'link' => 'employee/ledger_find?employee_id='.$customer_id, 
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                 	 		'paid_status' => $value->paid_status, 
                 	 		'Payoff' => $value->payin, 
                 	 		'Payout' => $value->payout,
                 	 		'debits' => $value->debits,
                            'credits' => $value->credits,
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 $arrayval=array_merge($array,$array1,$array2,$array3);

                     echo json_encode($arrayval);

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
    	public function fetch_data_get_ledger_view_all_accounts()
	{

                    
                              
                 	           $result2=$this->db->query("SELECT b.bank_name,SUM(a.debit) as total_debit,SUM(a.credit) as total_credit FROM `bankaccount_manage` as a JOIN bankaccount as b ON a.bank_account_id=b.id WHERE b.deleteid=0");
                 	          
                                
                               $result=$this->db->query("SELECT SUM(debits) as total_debit,SUM(credits) as total_credit FROM customer_ledger  WHERE  deleteid=0 AND payment_mode='Cash' ORDER BY id ASC");
                 	          
                 	           
                         	   $result2=$result2->result();
                         	   $result=$result->result(); 
                 	          
                 	              
                 	    
                 	 
                 
                 	 
                 	 
                 	 $i=1;
                 	 $array=array();
                 	 $array1=array();
                 	
                 	  
                 	    foreach ($result as  $value) {
                       
                         
                         
                     
                 	 	$array[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'name' => 'Cash In Hand', 
                            'total_debit' => $value->total_debit, 
                            'total_credit' => $value->total_credit, 
                            'balance' => $value->total_credit-$value->total_debit,
                 	 		

                 	 	);


                        $i++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	     $j=$i;
                 	 	 foreach ($result2 as  $value) {
                       
                         
                         
                     
                 	 	$array1[] = array(
                 	 	    
                 	 	    
                 	 	    'no' => $i, 
                            'name' => $value->bank_name, 
                            'total_debit' => $value->total_debit, 
                            'total_credit' => $value->total_credit, 
                            'balance' => $value->total_credit-$value->total_debit,
                 	 	
                 	 		

                 	 	);


                        $j++;

                 	 }
                 	 
                 	 
                 	 
                 	 
                 	
                 	 
                 	 
            
                 	 
                 	 
                 	 $arrayval=array_merge($array,$array1);

                     echo json_encode($arrayval);

	}
	
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    	public function fetch_data_get_ledger_view_total_all()
	{

                    
                     $customer_id=$_GET['customer_id'];
                     $limit=$_GET['limit'];
                     $formdate=$_GET['formdate'];
                     $party_type=$_GET['party_type'];
                     $payment_status=$_GET['payment_status'];
                     
                     
                     if($payment_status=='All')
                     {
                        
                           $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM customer_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM driver_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM vendor_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM employee_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	         
                 	       $result4=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM customer_ledger  WHERE  deleteid=0 AND payment_mode='Cash' ORDER BY id DESC");
                 	       
                 	      
                 	       
                 	       
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
                 	      
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          
                 	          $result4=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0  AND payment_mode='Cash'  ORDER BY id DESC");
                 	          
                 	          
                          }
                          else
                          {
                              
                              
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              elseif($payment_status=='2')
                              {
                                  $St=' AND payment_mode="Cheque"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	         
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	         
                 	          $result4=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND payment_mode='Cash'  AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	         
                          }
                         
                 	           
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
                     
                       $party_type=$_GET['party_type'];
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     if($payment_status=='All')
                     {
                                
                                
                              $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          $result=$this->db->query("SELECT * FROM customer_ledger  WHERE  deleteid=0 ORDER BY id ASC");
                 	          
                 	          
                 	          
                 	              if($party_type=='All')
                 	              {
                 	                  
                 	                  $result4=$result4->result(); 
                         	          $result3=$result3->result(); 
                         	          $result2=$result2->result();
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
                 	              
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                 	          $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND order_no!=''  AND deleteid=0   ORDER BY id ASC");
                 	          
                          }
                          else
                          {
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              elseif($payment_status=='2')
                              {
                                  $St=' AND payment_mode="Cheque"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                             $result=$this->db->query("SELECT * FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                 	        
                 	         $result2=$this->db->query("SELECT * FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                 	         $result3=$this->db->query("SELECT * FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	         $result4=$this->db->query("SELECT * FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND order_no!='' AND deleteid=0 $St ORDER BY id ASC");
                 	        
                          }
                         
                         
                         
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
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
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
                 	 		'balance' => $balance,
                 	 		'payment_date' => date('d-M-Y',strtotime($value->payment_date)), 
                 	 		'payment_time' => $value->payment_time,
                 	 	
                 	 		

                 	 	);


                        $l++;

                 	 }
                 	 
                 	 
                 	 $arrayval=array_merge($array,$array1,$array2,$array3);
                     
                     $arrayval=json_decode(json_encode($arrayval));
                    
                     
                     
                      if($payment_status=='All')
                     {
                        
                           $result=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM customer_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM driver_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM vendor_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	       $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(payout) as totalpaid,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(balance) as totalblance FROM employee_ledger  WHERE  deleteid=0   ORDER BY id DESC");
                 	      
                 	       
                 	       
                 	        
                 	         
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
                 	      
                             
                 	          
                     }
                     else
                     {
                          $todate=$_GET['todate'];
                          $payment_status=$_GET['payment_status'];
                          
                          
                          if($payment_status=='All')
                          {
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."' AND deleteid=0   ORDER BY id DESC");
                 	          
                 	          
                          }
                          else
                          {
                              
                              
                              if($payment_status=='1')
                              {
                                  $St=' AND payment_mode="Cash"';
                              }
                              elseif($payment_status=='2')
                              {
                                  $St=' AND payment_mode="Cheque"';
                              }
                              else
                              {
                                  $St=' AND payment_mode!="Cash"';
                              }
                              
                              $result=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM customer_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	         
                 	          $result1=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM driver_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	          $result2=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM vendor_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'   AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	          $result3=$this->db->query("SELECT SUM(amount) as amount,SUM(credits) as totalcridit,SUM(debits) as totaldebit,SUM(payout) as totalpaid,SUM(balance) as totalblance FROM employee_ledger  WHERE `payment_date` BETWEEN '".$formdate."' AND '".$todate."'  AND deleteid=0 $St ORDER BY id DESC");
                 	         
                 	         
                          }
                         
                 	           
                 	           
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
                          <th style="font-weight:800;text-align: right;">Debit</th>
                          <th style="font-weight:800;text-align: right;">Credit</th>
                         <th>Payment Mode</th>
                          
                         
            
                        </tr>
                      </thead>
                        <tbody  ng-repeat="names in namesDataledgergroup" >
                            
                            
                            
                        <?php
                        foreach($arrayval as $names)
                        {
                            ?>
                            
                             <tr  class="trpoint" >
                          
                           <td><?php echo $names->no; ?></td>
                           <td><?php echo $names->payment_date; ?> <?php echo $names->payment_time; ?></td>
                           <td><?php echo $names->party_name; ?></td>
                           <td><?php echo $names->reference_no; ?></td>
                           <td><?php echo $names->amount; ?></td>
                           <td style="font-weight:800;text-align: right;"><?php echo $names->debits; ?></td>
                           <td style="font-weight:800;text-align: right;"> <?php echo $names->credits; ?></td>
                           <td><?php echo $names->payment_mode; ?></td>
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
                                                                  <td></td>
                                                                  <td id="d_tot" style="font-weight:800;text-align: right;"><?php echo $totaldebit+$totaldebit1+$totaldebit2+$totaldebit3; ?></td>
                                                                  <td id="c_tot" style="font-weight:800;text-align: right;"><?php echo $totalcridit+$totalcridit1+$totalcridit2+$totalcridit3 ?></td>
                                                                  <td></td>
                                                                
                        </tr>
                      
                      
                      
                      
                      
                      
                      
                      
                    </table>
                   <?php

	}
	
    
    
    
    
	

}	