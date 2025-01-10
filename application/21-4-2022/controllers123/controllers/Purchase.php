<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

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
	
	public function purchase_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							                
							                 
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Purchase List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('purchase/purchase_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	
	
	
	
	
	
	
	
		public function clinet_inward_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							                
							                 
                                             $data['po_number']='O-'.substr(time(), 5).'/'.date('Y');
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Clinet Inward List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('purchase/clinet_inward_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function purchase_inward_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							                
							                 
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
							            
							            
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 
							            	 $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Purchase List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('purchase/purchase_inward',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	public function insertandupdate()
	{
	    
	    
                   date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                 $form_data = json_decode(file_get_contents("php://input"));
           
                 $label1=$form_data->label1;
                 $lab_option1=$form_data->lab_option1;
               


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->product_id!='' && $form_data->price!='' && $form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
    			                     $data['product_id']=$form_data->product_id;
    			                     $data['price']=$form_data->price;
    			                     $data['vendor_id']=$form_data->vendor_id;
                                     $data['qty']=$form_data->qty;
                                     $data['total_amount']=$form_data->total_amount;
                                     $data['coil_no']=$form_data->coil_no;
                                     $data['po_number']=$form_data->po_number;
                                     $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));
                                    
                                     

                                     $insert_id=$this->Main_model->insert_commen($data,$tablename);
				                     $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase successfully Added..');
                                     echo json_encode($array);




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	 if($form_data->product_id!='' && $form_data->price!='' && $form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                          $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                      
			                             $data['product_id']=$form_data->product_id;
        			                     $data['price']=$form_data->price;
        			                     $data['vendor_id']=$form_data->vendor_id;
                                         $data['qty']=$form_data->qty;
                                          $data['total_amount']=$form_data->total_amount;
                                         $data['coil_no']=$form_data->coil_no;
                                         $data['po_number']=$form_data->po_number;
                                        
                                        $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));

                                 	    $this->Main_model->update_commen($data,$tablename);
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	  
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                        $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Purchase successfully Updated..');
                                       echo json_encode($array);
  
                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                 if($form_data->action=="Inward")
                 {
                     
                                 
                                
                 	 
                                         $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                                         $product_id=$form_data->product_id;
                                         $data['inward_qty']=$form_data->qty;
                                         $data['total_amount']=$form_data->total_amount;
                                         $data['rack_info']=$form_data->rack_info;
                                         $data['bin_info']=$form_data->bin_info;
                                         $data['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                         
                                         $dataval['stock_id']=$form_data->id;
                                         $dataval['product_id']=$form_data->product_id;
        			                     $dataval['price']=$form_data->price;
        			                     $dataval['user_id']=$this->userid;
        			                     $dataval['total_amount']=$form_data->total_amount;
        			                     $dataval['vendor_id']=$form_data->vendor_id;
                                         $dataval['inward_qty']=$form_data->qty;
                                         $dataval['po_number']=$form_data->po_number;
                                         $dataval['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                        
                                         $result= $this->Main_model->where_names('stock_history','stock_id',$form_data->id);
                                         if(count($result)==0)
                                         {
                                         	      $this->db->query("UPDATE product_list SET stock=stock+'".$data['inward_qty']."' WHERE id='".$product_id."'");
                                         	      $this->Main_model->insert_commen($dataval,'stock_history');
                                         	      
                                         	      
                                         	      
                                         	      
                                         	                    $tablename_driver_ledger='vendor_ledger';
                                                              
                                                                $res = $this->Main_model->where_names($tablename_driver_ledger,'customer_id',$form_data->vendor_id);
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $order_no=$val->order_no;
                                                                       $amount=$val->amount;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                
                                                                
                                                                $data_driver['order_id']=$form_data->product_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='Inward';
                                                                $data_driver['notes']='Inward';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->po_number;
                                                                $data_driver['amount']=$form_data->total_amount;
                                                                
                                                                $data_driver['debits']=$form_data->total_amount;
                                                                $data_driver['balance']=$balancetotal+$form_data->total_amount;
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                $data_driver['payin']=$form_data->total_amount;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                                         	      
                                         	      
                                         }
                                         	 
                                         
                                 	     $this->Main_model->update_commen($data,$tablename);
                                         $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Purchase Product Inward..');
                                         echo json_encode($array);
  
                 	

                 }


                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                
                


	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function insertandupdateinward()
	{
	    
	    
                   date_default_timezone_set("Asia/Kolkata"); 
                  $date= date('Y-m-d');
                  $time= date('h:i A');
                 $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                
           
                 $label1=$form_data->label1;
                 $lab_option1=$form_data->lab_option1;
               


                 if($form_data->action=='Save')
                 {
                     
                     if($form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

			                     $tablename=$form_data->tablename;
			                   
    			                     $data['product_id']=$form_data->product_id;
    			                     $data['price']=$form_data->price;
    			                     $data['vendor_id']=$form_data->vendor_id;
                                     $data['qty']=$form_data->qty;
                                     $data['type']=1;
                                     $data['total_amount']=$form_data->total_amount;
                                     $data['coil_no']=$form_data->coil_no;
                                     $data['po_number']=$form_data->po_number;
                                     $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));
                                    
                                     

                                     $insert_id=$this->Main_model->insert_commen($data,$tablename);
				                     $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Inward successfully Added..');
                                     echo json_encode($array);




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	 if($form_data->po_number!='' && $form_data->vendor_id!='' && $form_data->qty!='')
                     {

                                          $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                      
			                             $data['product_id']=$form_data->product_id;
        			                     $data['price']=$form_data->price;
        			                     $data['vendor_id']=$form_data->vendor_id;
                                         $data['qty']=$form_data->qty;
                                         $data['type']=1;
                                          $data['total_amount']=$form_data->total_amount;
                                         $data['coil_no']=$form_data->coil_no;
                                         $data['po_number']=$form_data->po_number;
                                        
                                        $data['order_date']= date('Y-m-d',strtotime($form_data->order_date));

                                 	    $this->Main_model->update_commen($data,$tablename);
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	  
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                 	    
                                        $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Inward successfully Updated..');
                                       echo json_encode($array);
  
                 	 }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }

                 }
                 
                 if($form_data->action=="Inward")
                 {
                     
                                 
                                
                 	 
                                         $tablename=$form_data->tablename;
                                         $data['get_id']=$form_data->id;
                                         $product_id=$form_data->product_id;
                                         $data['inward_qty']=$form_data->qty;
                                         $data['total_amount']=$form_data->total_amount;
                                         $data['rack_info']=$form_data->rack_info;
                                         $data['bin_info']=$form_data->bin_info;
                                         $data['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                         
                                         $dataval['stock_id']=$form_data->id;
                                         $dataval['product_id']=$form_data->product_id;
        			                     $dataval['price']=$form_data->price;
        			                     $dataval['user_id']=$this->userid;
        			                     $dataval['total_amount']=$form_data->total_amount;
        			                     $dataval['vendor_id']=$form_data->vendor_id;
                                         $dataval['inward_qty']=$form_data->qty;
                                         $dataval['po_number']=$form_data->po_number;
                                         $dataval['inward_date']= date('Y-m-d',strtotime($form_data->inward_date));
                                        
                                         $result= $this->Main_model->where_names('stock_history','stock_id',$form_data->id);
                                         if(count($result)==0)
                                         {
                                         	      $this->db->query("UPDATE product_list SET stock=stock+'".$data['inward_qty']."' WHERE id='".$product_id."'");
                                         	      $this->Main_model->insert_commen($dataval,'stock_history');
                                         	      
                                         	      
                                         	      
                                         	      
                                         	                    $tablename_driver_ledger='vendor_ledger';
                                                              
                                                                $res = $this->Main_model->where_names($tablename_driver_ledger,'customer_id',$form_data->vendor_id);
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $order_no=$val->order_no;
                                                                       $amount=$val->amount;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                
                                                                
                                                                $data_driver['order_id']=$form_data->product_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='Inward';
                                                                $data_driver['notes']='Inward';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->po_number;
                                                                $data_driver['amount']=$form_data->total_amount;
                                                                
                                                                $data_driver['debits']=$form_data->total_amount;
                                                                $data_driver['balance']=$balancetotal+$form_data->total_amount;
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                $data_driver['payin']=$form_data->total_amount;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                                         	      
                                         	      
                                         }
                                         	 
                                         
                                 	     $this->Main_model->update_commen($data,$tablename);
                                         $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Purchase Product Inward..');
                                         echo json_encode($array);
  
                 	

                 }


                 if($form_data->action=='Delete')
                 {
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                
                


	}
	
	
	
	
	
	
	public function fetch_data()
	{
                     
                     
                     $i=1;
                    
                 	 $result= $this->Main_model->where_names('purchase_order','deleteid','0');
                 	 foreach ($result as  $value) {
                 	     
                 	      $product_name="";
                 	      $resultp= $this->Main_model->where_names('product_list','id',$value->product_id);
                     	  foreach ($resultp as  $valuep) {
                     	     
                     	     $product_name=$valuep->product_name;
                     	  }
                     	  
                     	  
                     	  $vendor_name="";
                 	      $resultv= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	  foreach ($resultv as  $valuev) {
                     	     
                     	     $vendor_name=$valuev->name;
                     	  }
                       
                        

                 	  if($value->type==0)
                 	  {
                 	      
                 	  

                 	 	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
      
                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $product_name, 
                 	 	    'vendor_name' => $vendor_name, 
                 	 	    'po_number' => $value->po_number, 
                 	 		'price' => $value->price,
                 	 		'coil_no'=>$value->coil_no,
                 	 		'qty'=>$value->qty,
                 	 		'total_amount'=>$value->total_amount,
                 	 		'rack_info'=>$value->rack_info,
                 	 		'bin_info'=>$value->bin_info,
                 	 		'inward_qty'=>$value->inward_qty,
                 	 		'order_date' =>  date('d-m-Y', strtotime($value->order_date)),
                 	 		'inward_date' =>  date('d-m-Y', strtotime($value->inward_date)),
                 	 		

                 	 	);
                 	 	
                 	 	
                 	  }
                 	 	

                       $i++;


                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_data_inward()
	{
                     
                     
                     $i=1;
                    
                 	 $result= $this->Main_model->where_names('purchase_order','deleteid','0');
                 	 foreach ($result as  $value) {
                 	     
                 	      $product_name="";
                 	      $resultp= $this->Main_model->where_names('product_list','id',$value->product_id);
                     	  foreach ($resultp as  $valuep) {
                     	     
                     	     $product_name=$valuep->product_name;
                     	  }
                     	  
                     	  
                     	  $vendor_name="";
                 	      $resultv= $this->Main_model->where_names('customers','id',$value->vendor_id);
                     	  foreach ($resultv as  $valuev) {
                     	     
                     	     $vendor_name=$valuev->company_name;
                     	  }
                       
                        

                 	  if($value->type==1)
                 	  {
                 	      
                 	  

                 	 	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
      
                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $product_name, 
                 	 	    'vendor_name' => $vendor_name, 
                 	 	    'po_number' => $value->po_number, 
                 	 		'price' => $value->price,
                 	 		'coil_no'=>$value->coil_no,
                 	 		'qty'=>$value->qty,
                 	 		'total_amount'=>$value->total_amount,
                 	 		'rack_info'=>$value->rack_info,
                 	 		'bin_info'=>$value->bin_info,
                 	 		'inward_qty'=>$value->inward_qty,
                 	 		'order_date' =>  date('d-m-Y', strtotime($value->order_date)),
                 	 		'inward_date' =>  date('d-m-Y', strtotime($value->inward_date)),
                 	 		

                 	 	);
                 	 	
                 	 	
                 	  }
                 	 	

                       $i++;


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

                 	  $output['id']= $value->id; 
                      $output['product_id']= $value->product_id; 
                      $output['vendor_id']= $value->vendor_id;
                      $output['po_number']= $value->po_number;
                      $output['price']= $value->price;
                      $output['coil_no']= $value->coil_no;
                      $output['qty']= $value->qty;
                      $output['order_date']= $value->order_date;
                      $output['inward_date']= $value->inward_date;
                       $output['total_amount']= $value->total_amount;
                      $output['rack_info']= $value->rack_info;
                      $output['bin_info']= $value->bin_info;
                     

                     
	                 	
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

                            

                            $this->db->query("INSERT INTO product_attachemnt  (`product_id`,`attachment`)VALUES('".$ticket_id."','".$path."')");

                         }


                   }
                   
            }
             
            

             
 
         }
         
             $output=array('1');
             echo json_encode($output);


    }
    
    
    	public function fileuplaodtosaveimage()
    {
        
        
                                $form_data = json_decode(file_get_contents("php://input"));
                                
                                $product_id=$form_data->id;
                                $img = $form_data->imgeurl;

                           
                                if($img!="")
                                {
                               
                           

                                        
                                        define('UPLOAD_DIR', 'uploads/');
                                    
                                    	$img = str_replace('data:image/png;base64,', '', $img);
                                    	$img = str_replace(' ', '+', $img);
                                    	$data = base64_decode($img);
                                    	$file = UPLOAD_DIR . uniqid() . '.png';
                                    	$success = file_put_contents($file, $data);
                                    	print $success ? $file : 'Unable to save the file.';
                                        $this->db->query("INSERT INTO product_images  (`product_id`,`product_image`)VALUES('".$product_id."','".$file."')");
                                        
                            
                              }


    }
    
    	public function productimagesave()
    {
        
            define('UPLOAD_DIR', 'uploads/');
        	$img = $_POST['imgBase64'];
        	$img = str_replace('data:image/png;base64,', '', $img);
        	$img = str_replace(' ', '+', $img);
        	$data = base64_decode($img);
        	$file = UPLOAD_DIR . uniqid() . '.png';
        	$success = file_put_contents($file, $data);
        	print $success ? $file : 'Unable to save the file.';
        
    }
    
	
	


}
