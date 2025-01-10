<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {

	function __construct() {


             error_reporting(0);
             parent::__construct();
             $this->load->model('Admin/Users_model');
            if (isset($this->session->userdata['logged_in'])) {
            $sess_array = $this->session->userdata['logged_in'];
            $userid = $sess_array['userid'];
            $email = $sess_array['email'];
            $sales_id = $sess_array['sales_id'];
            $define_saleshd_id = $sess_array['define_saleshd_id'];
            $define_salesteam_id = $sess_array['define_salesteam_id'];
            $define_driver_id = $sess_array['define_driver_id'];
            $customer_id = $sess_array['customer_id'];
            $username = $sess_array['username'];
            $this->userid = $userid;
            $this->username = $username;
            $this->user_mail = $email;
            $this->sales_id = $sales_id;
            $this->define_saleshd_id = $define_saleshd_id;
            $this->define_salesteam_id = $define_salesteam_id;
            $this->define_driver_id = $define_driver_id;
            $this->customer_id = $customer_id;
            profile($this->user_mail);
        }


      
    }
	
	public function purchase_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							                
							                 
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 
							            	 
							            	    $neworder_id = 1;
                                                $order_last_count = $this->Main_model->order_last_count('purchase_orders_process');
                                                foreach ($order_last_count as $r) {
                                                    $neworder_id = $r->id + 1;
                                                }
                                                $data['neworder_id'] = base64_encode($neworder_id);
							            	 
							            	 
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
	
	
	
	
	
	
	  public function purchase_ordercreate_product() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
            
            $data['vendor'] = $this->Main_model->where_names_order_by('vendor', 'deleteid', '0', 'id', 'ASC');
            
            $data['additional_information'] = $this->Main_model->where_names_two_order_by('additional_information', 'grouping', '2', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            if ($this->session->userdata['logged_in']['access'] == '11') {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'define_saleshd_id', $this->userid, 'id', 'ASC');
            } else {
                $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            }
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);
            $data['old_tablename'] = '0';
            $data['old_tablename_sub'] = '0';
            $data['tablename'] = 'purchase_orders_process';
            $data['tablename_sub'] = 'purchase_product_list_process';
            $data['movetablename'] = 'purchase_orders_process';
            $data['movetablename_sub'] = 'purchase_product_list_process';
            $data['order_title'] = 'Requisition NO';
            $data['order_lable'] = 'Requisition Create';
            $data['missed'] = 'Requisition';
            $data['move'] = 'Enquiry';
            $data['status_base'] = 0;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('purchase_orders_process', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '00' . $neworder_quotation_id;
            }
            $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
            if (count($resorder) > 0) {
                foreach ($resorder as $data_val) {
                    $order_no = $data_val->order_no;
                    $data['order_id'] = $neworder_id;
                    $data['count_id'] = $neworder_quotation_id;
                    $data['order_no'] = $order_no;
                }
            } else {
                $data['order_id'] = $neworder_id;
                $data['count_id'] = $neworder_quotation_id;
                $data['order_no'] = $neworder_id . '/' . $this->sales_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
            }
            
            $data['iron'] = $this->Main_model->where_names_order_by('product_list', 'categories_id', '3', 'product_name', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Requisition  Add';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/purchase_order_create', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
	
	
	
	
	
	
	
	
	
	
	
	public function vendorupdate() {
	    
	    
	    
	   
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
     
	    
        $tablename = $form_data->tablenamemain;
        $insertid = $form_data->order_id;
        $basedata['id'] = $form_data->order_id;
        $basedata['order_no'] = $form_data->order_no;
        $basedata['count_id'] = $form_data->count_id;
        $basedata['create_date'] = $date;
        $basedata['create_time'] = $time;
        $basedata['user_id'] = $this->userid;
        $basedata['entry_user_id'] = $this->userid;
        $resultmain = $this->db->query("SELECT * FROM $tablename  WHERE id='" . $form_data->order_id . "' AND entry_user_id='" . $this->userid . "'");
        $resultcs = $resultmain->result();
        if (count($resultcs) > 0) {
        } else {
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users($tablename, $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            $neworder_id = 1;
            $order_last_count = $this->Main_model->order_last_count($tablename);
            foreach ($order_last_count as $r) {
                $neworder_id = $r->id + 1;
            }
            $basedata['id'] = $neworder_id;
            if ($tablename == 'orders_process') {
                $basedata['order_no'] = strtoupper(date('M') . '/' . $neworder_id);
            } else {
                $basedata['order_no'] = $neworder_id . '/' . $this->sales_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
            }
            $insertid = $this->Main_model->insert_commen($basedata, $tablename);
        }
        
        
        
        $vendor_ids = $form_data->vendor_ids;
        
        $this->db->query("DELETE FROM purchase_order_vendors  WHERE order_id='".$insertid."'");
        for($i=0;$i<count($vendor_ids);$i++)
        {
             $basedatavendor_id['vendor_id']=$vendor_ids[$i];
             $basedatavendor_id['order_id']=$insertid;
             if($vendor_ids[$i]!='')
             {
                 $this->Main_model->insert_commen($basedatavendor_id, 'purchase_order_vendors');
             }
             
        }
        
        
        
        
        
        
        $array = array('error' => '2', 'id' => base64_encode($insertid), 'base_id' => $insertid);
        echo json_encode($array);
        exit;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetchDatavendorsdata()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     
                     $i=1;
                     
                     $array=array();
                    
                 	 $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                 	 foreach ($result as  $value) {
                 	     
                 	      $name="";
                 	       $email="";
                 	        $phone="";
                 	         $gst="";
                 	          $address="";
                 	           
                 	      $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	  foreach ($resultp as  $valuep) {
                     	     
                     	     $name=$valuep->name;
                     	     $email=$valuep->email;
                     	     $phone=$valuep->phone;
                     	     $gst=$valuep->gst;
                     	     $address=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                     	  }
                     	  

                 	 	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
      
                 	 		'id' => $value->id,
                 	 		'order_id' => $value->order_id, 
                 	 		'vendor_id' => $value->vendor_id,
                 	 		'link' => $value->link,
                 	 		'name' => $name, 
                 	 		'cap'=>$name[0],
                            'vendor_name' => $vendor_name, 
                 	 	    'email' => $email, 
                 	 		'phone' => $phone,
                 	 		'gst'=>$gst,
                 	 		'address'=>$address,
                 	 		'venodrcount'=>count($result),
                 	 		

                 	 	);
                 	 	
                 	 
                 	 	

                       $i++;


                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		public function fetchcomapredata()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                 	 $result= $this->Main_model->where_names('purchase_order_quotation','order_id',$order_id);
                 	 foreach ($result as  $value) {
                 	     
                 	        $name="";
                 	        $email="";
                 	        $phone="";
                 	        
                 	        
                 	        $resultpss= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_product_list_id);
                     	     foreach ($resultpss as  $valuepss) {
                     	     
                                 	     $product_name=$valuepss->product_name;
                                 	     $qty=$valuepss->qty;
                                 	     if($valuep->uom='1')
                                 	     {
                                 	         $uom='TON';
                                 	     }
                                 	     else
                                 	     {
                                 	          $uom='KG';
                                 	     }
                     	     
                         	  }
                 	           
                 	         $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	     foreach ($resultp as  $valuep) {
                     	     
                     	     $name=$valuep->name;
                     	     $email=$valuep->email;
                     	     $phone=$valuep->phone;
                     	     
                         	  }
                         	  
    
                     	    	$array[] = array(
                     	 	    
                     	 	    'no' => $i, 
          
                     	 		'id' => $value->id,
                     	 		'order_id' => $value->order_id, 
                     	 		'vendor_id' => $value->vendor_id,
                     	 		'remarks' => $value->remarks,
                     	 		'price' => $value->price,
                     	 		'selected_status' => $value->selected_status,
                     	 		'attachement' => base_url().$value->attachement,
                     	 		'product_name' => $product_name,
                     	 		'uom' => $uom,
                     	 		'qty' => $qty,
                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date)),
                     	 		'name' => $name, 
                     	 	    'vendor_name' => $name, 
                     	 	    'email' => $email, 
                     	 		'phone' => $phone,
                     	 		'gst'=>$gst
                     	 		
    
                     	 	);
                 	 	
                 	 
                 	    

                       $i++;


                 	 }

                    echo json_encode($array);

	}
	
		public function fetchDatavendorsdataseletet()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                 	 $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                 	 foreach ($result as  $value) {
                 	     
                 	      $name="";
                 	       $email="";
                 	        $phone="";
                 	         $gst="";
                 	          $address="";
                 	          
                 	      if($vendorid==$value->vendor_id)    
                 	      {
                 	          
                 	     
                 	           
                 	        $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	    foreach ($resultp as  $valuep) {
                     	     
                     	     $name=$valuep->name;
                     	     $email=$valuep->email;
                     	     $phone=$valuep->phone;
                     	     $gst=$valuep->gst;
                     	     $address=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                     	  }
                     	  

                 	    	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
      
                 	 		'id' => $value->id,
                 	 		'order_id' => $value->order_id, 
                 	 		'vendor_id' => $value->vendor_id,
                 	 		'name' => $name, 
                 	 		'cap'=>$name[0],
                            'vendor_name' => $name, 
                 	 	    'email' => $email, 
                 	 		'phone' => $phone,
                 	 		'gst'=>$gst,
                 	 		'address'=>$address,
                 	 		'venodrcount'=>count($result),
                 	 		

                 	 	);
                 	 	
                 	 
                 	      }

                       $i++;


                 	 }

                    echo json_encode($array);

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
	
	
	
	public function vendor_page()
	{
        
		                              


									    
							                
							                
							                 $data['order_id']=base64_decode($_GET['order_id']);
							                 $data['vendor_id']=base64_decode($_GET['vendor_id']);
							                 
							                  $data['purchase_orders_process'] =$this->Main_model->where_names_two_order_by('purchase_product_list_process', 'order_id', $data['order_id'], 'deleteid', '0', 'id', 'DESC');
                                           
							                 
                                             $data['purchase_product_list_process'] =$this->Main_model->where_names_two_order_by('purchase_product_list_process', 'order_id', $data['order_id'], 'deleteid', '0', 'id', 'DESC');
                                           
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Clinet Inward List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('purchase/vendor_page',$data);
										
									

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
                 
                if($form_data->action == "InputUpdate") {
                    
                 
                        $tablename = $form_data->tablename_sub;
                        $tablenamemain = $form_data->tablenamemain;
                    
                    
                    if ($form_data->values != '' || $form_data->values == '0') {
                        $categories = "";
                        
                        if ($form_data->inputname == 'product_name') {
                            $data[$form_data->inputname] = $form_data->values;
                            $result = $this->Main_model->where_names('product_list', 'product_name', $form_data->values);
                            foreach ($result as $product) {
                                $data['product_name'] = $product->product_name;
                                $data['product_id'] = $product->id;
                                $data['categories_id'] = $product->categories_id;
                                $data['categories_name'] = $product->categories;
                                $data['rate'] = $product->price;
                                $data['fact'] = $product->formula;
                                $uom = $product->uom;
                                $formula = $product->formula;
                                $priceset = $product->price;
                                $kg_priceset = $product->kg_price;
                                $categories = $product->categories;
                            }
                        }
                        else
                        {
                             $data[$form_data->inputname] = $form_data->values;
                        }
                        $data['get_id']=$form_data->id;
                        $this->Main_model->update_commen($data, $tablename);
                        $array = array('error' => '2', 'massage' => 'successfully Updated..');
                     
                        echo json_encode($array);
                    } 
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
    
	
	public function fetch_data_table() {
        $pagenum = $_GET['page'];
        $pagesize = $_GET['size'];
        $offset = ($pagenum - 1) * $pagesize;
        $search = $_GET['search'];
        if (isset($_GET['page_next'])) {
            $offset = $_GET['page_next'];
        }
        $tablename = $_GET['tablename'];
        $order_base = $_GET['order_base'];
        $where = "";
        $sqls = "";
        if ($search != "") {
            $where = " AND order_no LIKE '%" . $search . "%'";
        }
        $i = 1;
        $array = array();
        if ($this->session->userdata['logged_in']['access'] == '12') {
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' AND user_id='" . $this->userid . "'  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT * FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' AND user_id='" . $this->userid . "' $where ORDER BY id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
            if (count($result) == 0) {
                $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' AND entry_user_id='" . $this->userid . "'  ORDER BY id DESC");
                $resultcount = $queryss->result();
                foreach ($resultcount as $cc) {
                    $count = $cc->totalcount;
                }
                $query = $this->db->query("SELECT * FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' AND entry_user_id='" . $this->userid . "' $where ORDER BY id DESC LIMIT $offset, $pagesize");
                $result = $query->result();
            }
        } elseif ($this->session->userdata['logged_in']['access'] == '11') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  user_id IN (' . $sales_team_id . ')';
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' $userslog  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT * FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "'  $userslog $where ORDER BY id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        } elseif ($this->session->userdata['logged_in']['access'] == '16') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            $sales_team_id = "'" . implode("','", $sales_team_id) . "'";
            $userslog = ' AND  sales_group IN (' . $sales_team_id . ')';
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' $userslog  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT * FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' $userslog $where ORDER BY id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        } else {
            $queryss = $this->db->query("SELECT count(id) as totalcount  FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "'  ORDER BY id DESC");
            $resultcount = $queryss->result();
            foreach ($resultcount as $cc) {
                $count = $cc->totalcount;
            }
            $query = $this->db->query("SELECT * FROM $tablename  WHERE deleteid='0' AND order_base='" . $order_base . "' $where ORDER BY id DESC LIMIT $offset, $pagesize");
            $result = $query->result();
        }
        $tablename_sub = "purchase_product_list_process";
        foreach ($result as $value) {
            $minisroundoff = $value->roundoff;
            $roundoffstatus = $value->roundoffstatus;
            $discount = $value->discount;
            $order_base = $value->order_base;
            
            $totalamount = 0;
            $commission = 0;
            $qtys=0;
            $resulttotal = $this->Main_model->where_names_two_order_by($tablename_sub, 'order_id', $value->id, 'deleteid', '0', 'id', 'DESC');
            foreach ($resulttotal as $tot) {
                $totalamount+= $tot->amount; 
                $qtys+=  $tot->qty;
                
            }
            $discountfulltotal = $totalamount;
            
            
            
            $order_by = "";
            $orderby = $this->Main_model->where_names_two_order_by('admin_users', 'id', $value->user_id, 'deleteid', '0', 'id', 'DESC');
            foreach ($orderby as $orderbyval) {
                $order_by = $orderbyval->name;
            }
            
             $vendorsname=array();
            $orderbyv = $this->Main_model->where_names('purchase_order_vendors', 'order_id', $value->id);
            foreach ($orderbyv as $orderbyvalv) {
                $vendor_id = $orderbyvalv->vendor_id;
                          
                           $vvs = $this->Main_model->where_names('vendor', 'id', $vendor_id);
                           
                           
                             foreach ($vvs as $vendor) {
                                           if($order_base==2)
                                           {
                                               
                                               
                                               if($orderbyvalv->selected_status==1)
                                               {
                                                  
                                                   $vendorsname[]=$vendor->name;
                                                 
                                               }
                                               
                                           }
                                           else
                                           {
                                               
                                                    $vendorsname[]=$vendor->name;
                                                    
                                                 
                                           }
                                           
                              }
                         
                          
                           
                
            }
            
        
            
            $vendors_names=implode(',', $vendorsname);
            
            $company_name = "";
            $email = "";
            $phone = "";
            $address = "";
            
            
            
            
            
            
            
            $array[] = array('no' => $i, 'id' => $value->id,'totalqty'=>$qtys,'vendors_names'=>$vendors_names, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal), 'commission' => round($commission), 'delivery_charge' => $value->delivery_charge, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time);
            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }
    
    
      public function getcount() {
        $tablename = $_GET['tablename'];
        if ($this->session->userdata['logged_in']['access'] == '12') {
            $resultpending = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '0', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '1', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '-1', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
            
            $resultrequestpo = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '2', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '3', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $archive = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '-3', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
        } elseif ($this->session->userdata['logged_in']['access'] == '11') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT id FROM `admin_users`  WHERE define_saleshd_id='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            
            
            $resultpending = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
           
            $resultrequestpo = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
             $archive = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'user_id', $sales_team_id, 'id', 'DESC');
            
        } elseif ($this->session->userdata['logged_in']['access'] == '16') {
            $sales_team_id = array();
            $query = $this->db->query("SELECT id FROM `sales_group`  WHERE sales_group_head='" . $this->userid . "'");
            $resultsales_team = $query->result();
            foreach ($resultsales_team as $values) {
                $sales_team_id[] = $values->id;
            }
            $resultpending = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
            $archive = $this->Main_model->where_names_three_thried_where_in_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'sales_group', $sales_team_id, 'id', 'DESC');
           
        } else {
            
            $resultpending = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'id', 'DESC');
            
            $archive = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'id', 'DESC');
            
        }
        $array = array('pending' => count($resultpending), 'proceed' => count($resultprocessed), 'cancel' => count($resultcancel), 'po' => count($resultrequestpo), 'payment_vendor' => count($payment_vendor),'archive' => count($archive));
        echo json_encode($array);
    }
    
    public function callbacksave() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        if ($form_data->remarks != '') {
            
            $tablenamemain = $form_data->tablenamemain;
            $findp['remarks'] = $form_data->remarks;
            $findp['filetype'] = $form_data->filetype;
            $findp['order_id'] = $form_data->order_id;
            $findp['user_id'] = $this->userid;
            $findp['vendor_id'] = $form_data->vendor_id;
            $insert_id = $this->Main_model->insert_commen($findp, $tablenamemain);
            $array = array('error' => '2', 'insert_id' => $insert_id, 'massage' => 'Remarks submitted');
            echo json_encode($array);
        } else {
            $array = array('error' => '1');
            echo json_encode($array);
        }
    }
    
    public function fileuplaodbyorder() {
        
        
  
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            $filetype = $_GET['filetype'];
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) 
            {
                $point['get_id'] = $ticket_id;
                $point['attachement'] = $path;
                $point['filetype'] = $filetype;
                $this->Main_model->update_commen($point, 'purchase_order_remarks');
            }
        }
        
        
        
        
        
    }
    
    
    
    
    public function fileuplaodbyorder_set() {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            $filetype = $_GET['filetype'];
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $point['get_id'] = $ticket_id;
                $point['attachement'] = $path;
                $this->Main_model->update_commen($point, 'purchase_order_quotation');
            }
        }
        
        
        
        
        
    }
    
    
    
	public function purchase_order_remarks_history()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_order_remarks', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                 	
                 	 foreach ($result as  $value) {
                 	     
                 	      $name="";
                 	       $email="";
                 	        $phone="";
                 	         $gst="";
                 	          $address="";
                 	          
                 	      if($vendorid==$value->vendor_id)    
                 	      {
                 	         $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	    foreach ($resultp as  $valuep) {
                     	     
                     	     $name=$valuep->name;
                     	     $email=$valuep->email;
                     	     $phone=$valuep->phone;
                     	     $gst=$valuep->gst;
                     	     
                     	  }
                     	  
                               
                            if($value->attachement=='')
                            {
                                   $value->attachement=0;
                            }
                               
                 	    	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id,
                 	 		'order_id' => $value->order_id, 
                 	 		'vendor_id' => $value->vendor_id,
                 	 		'remarks' => $value->remarks, 
                 	 		'attachement' => $value->attachement, 
                            'filetype' => $value->filetype,
                            'create_date' => date('d-m-Y',strtotime($value->create_date))
                 	 		);
                 	 	
                 	      }

                       $i++;


                 	 }

                    echo json_encode($array);

	}
	public function genratelink()
	{
	    
	    
                    	    $form_data = json_decode(file_get_contents("php://input"));
                    	    $order_id= $form_data->order_id;
	    
	                         $resultp= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                     	     foreach ($resultp as  $valuep) {
                     	     $vendor_id=$valuep->vendor_id;
                     	     
                     	     
                     	         $link="index.php/purchase/vendor_page?order_id=".base64_encode($order_id)."&vendor_id=".base64_encode($vendor_id);
                     	         $query = $this->db->query("UPDATE  `purchase_order_vendors` SET link='".$link."'  WHERE order_id='" . $order_id . "' AND vendor_id='".$vendor_id."'");
                     	     
                     	     
                     	     }
	    
	    
	    
	}
	
	public function vendorpriceupdate() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        if ($form_data->price != '') {
            
            
            
            $tablenamemain = $form_data->tablename;
            $this->db->query("DELETE FROM $tablenamemain  WHERE order_id='".$form_data->order_id."' AND vendor_id='".$form_data->vendor_id."' AND purchase_product_list_id='".$form_data->purchase_product_list_ids."'");
            
            $findp['remarks'] = $form_data->remarks;
            $findp['price'] = $form_data->price;
            $findp['order_id'] = $form_data->order_id;
            $findp['vendor_id'] = $form_data->vendor_id;
            $findp['purchase_product_list_id'] = $form_data->purchase_product_list_ids;
            $insert_id = $this->Main_model->insert_commen($findp, $tablenamemain);
            
            
            $array = array('error' => '2', 'insert_id' => $insert_id, 'massage' => 'Price Quotation Submitted');
            echo json_encode($array);
        } else {
            $array = array('error' => '1');
            echo json_encode($array);
        }
    }
    
    
    
    	public function order_quotation_request_select() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
            
            
            $this->db->query("UPDATE  purchase_order_vendors SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            $this->db->query("UPDATE   purchase_order_quotation SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            $this->db->query("UPDATE   purchase_order_quotation SET selected_status=1 WHERE id='".$form_data->purchase_order_quotation_id."' ");
            $this->db->query("UPDATE   purchase_order_vendors SET selected_status=1 WHERE vendor_id='".$form_data->vendor_id."' ");
            
            
           
            $array = array('error' => '2', 'insert_id' => 1, 'massage' => 'Price Quotation Seletced');
            echo json_encode($array);
        
    }
    
	public function order_quotation_request_po() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
            
            
            
            $this->db->query("UPDATE   purchase_orders_process SET order_base=2,reason='PO Genrated' WHERE id='".$form_data->order_id."'");
            $array = array('error' => '2', 'insert_id' => $form_data->order_id, 'massage' => 'PO Genrated');
            echo json_encode($array);
        
    }
    
    
      public function po() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
            $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            $data['enable_order'] = $_GET['order_id'];
            $neworder_id = base64_decode($_GET['order_id']);
            $data['old_tablename'] = $_GET['old_tablename'];
            $data['old_tablename_sub'] = $_GET['old_tablename_sub'];
            $data['tablename'] = $_GET['tablename'];
            $data['tablename_sub'] = $_GET['tablename_sub'];
            $data['movetablename'] = $_GET['movetablename'];
            $data['movetablename_sub'] = $_GET['movetablename_sub'];
            $data['order_title'] = 'Quotation NO';
            $data['order_lable'] = 'Quotation Create';
            $data['missed'] = 'Quotation';
            $data['move'] = 'Order ';
            $data['status_base'] = 10;
            $neworder_quotation_id = 1;
            $order_last_count = $this->Main_model->order_last_count_users('orders_quotation', $this->userid);
            foreach ($order_last_count as $r) {
                $neworder_quotation_id = $r->count_id + 1;
            }
            if ($neworder_quotation_id < 10) {
                $neworder_quotation_id = '00' . $neworder_quotation_id;
            }
            $resorder = $this->Main_model->where_names($data['tablename'], 'id', $neworder_id);
            if (count($resorder) > 0) {
                foreach ($resorder as $data_val) {
                    $order_no = $data_val->order_no;
                    $data['order_id'] = $neworder_id;
                    $data['count_id'] = $neworder_quotation_id;
                    $data['order_no'] = $order_no;
                }
            } else {
                $data['order_id'] = $neworder_id;
                $data['count_id'] = $neworder_quotation_id;
                $data['order_no'] = $neworder_id . '/' . $this->sales_id . '/' . $neworder_quotation_id . '/' . date('Y');
            }
            $data['overview_invoice_content_base_order'] = $this->Main_model->where_names_order_by('overview_invoice_content_base_order', 'order_id', $data['order_id'], 'id', 'ASC');
            $data['active_base'] = 'customer_1';
            $data['active'] = 'customer_1';
            $data['title'] = 'Quotation ' . $data['order_no'];
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/po', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
      public function fetchVendor()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     
                     $id=$form_data->order_id;
                     $output=array();
    	             $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$id);
                 	 foreach ($result as  $value) {
                          
                          
                          
                                 if($value->selected_status==1)
                                 {
                                     
                               
                 	             $vendor_id= $value->vendor_id; 
                                  
                                 }
                                 
                                 
                     
	                 	
                 	 }
                 	 
                 	 $resultss= $this->Main_model->where_names('vendor','id',$vendor_id);
                 	 foreach ($resultss as  $valuep) {
                 	     $output['name']=$valuep->name;
                 	      $output['phone']=$valuep->phone;
                 	       $output['email']=$valuep->email;
                 	        $output['gst']=$valuep->gst;
                     	     $output['address']=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                 	     
                 	 }

                    echo json_encode($output);


    }

}
