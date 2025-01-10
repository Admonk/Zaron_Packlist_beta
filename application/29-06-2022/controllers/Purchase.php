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
    
    
     public function fetch_single_data_total() {
        $amounttotal = 0;
        $Meter_to_Sqr_feet = 0;
        $Sqr_feet_to_Meter = 0;
        $discount = 0;
        $fullqty = 0;
        $nos = 0;
        $unit = 0;
        $fact = 0;
        $commission = 0;
        $amounttotalgst = 0;
        $amounttotal_with_out_commission = 0;
        $form_data = json_decode(file_get_contents("php://input"));
        $tablenamemain = $form_data->tablenamemain;
        $tablename = $form_data->tablename_sub;
        $convert = $form_data->convert;
        $result = $this->Main_model->where_names_two_order_by($tablename, 'order_id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($result as $value) {
            
            
            if($value->rate_edit!=0)
            {
                 $value->rate=$value->rate_edit;
                
            }
            
            if($value->qty_edit!=0)
            {
                  $value->qty=$value->qty_edit;
                
            }
            
           
             $amounttotal+= round($value->rate * $value->qty, 3);
            
            $amounttotal_with_out_commission+= round($value->rate * $value->qty, 3);
            $Meter_to_Sqr_feet+= $value->Meter_to_Sqr_feet;
            $Sqr_feet_to_Meter+= $value->Sqr_feet_to_Meter;
            $amounttotalgst+= round($value->rate * $value->qty * $value->gst / 100);
            $commission+= $value->commission;
            $fullqty+= $value->qty;
            $nos+= $value->nos;
            $unit+= $value->unit;
            $fact+= $value->fact;
        }
        $resultdis = $this->Main_model->where_names_two_order_by($tablenamemain, 'id', $_GET['order_id'], 'deleteid', '0', 'id', 'DESC');
        foreach ($resultdis as $valuedis) {
            $production_assign = $valuedis->production_assign;
            $discount = $valuedis->discount;
            $order_no = $valuedis->order_no;
            $minisroundoff = $valuedis->roundoff;
            $roundoffstatus = $valuedis->roundoffstatus;
            $user_id = $valuedis->user_id;
            $user_id = $valuedis->user_id;
            $create_date = date('d/m/Y', strtotime($valuedis->create_date));
            $create_time = $valuedis->create_time;
            $reason = $valuedis->reason;
            $paricel_mode = $valuedis->paricel_mode;
            $order_base = $valuedis->order_base;
            $reason = $valuedis->reason;
        }
        if ($minisroundoff == '') {
            $minisroundoff = 0;
        }
        $salesphone = "";
        $salesname = "";
        $resultsales = $this->Main_model->where_names('admin_users', 'id', $user_id);
        foreach ($resultsales as $valuesales) {
            $salesphone = $valuesales->phone;
            $salesphone2 = $valuesales->phone2;
            $salesname = $valuesales->name;
        }
        
        $roundoff = round($amounttotal);
        $discountfulltotal = $roundoff ;
        
        $array = array('order_no_id' => $order_no,'order_base'=>$order_base,'reason'=>$reason, 'user_id' => $user_id, 'salesphone' => $salesphone, 'salesphone2' => $salesphone2, 'salesname' => $salesname, 'reason' => $reason, 'paricel_mode' => $paricel_mode, 'production_assign' => $production_assign, 'create_date' => $create_date, 'create_time' => $create_time, 'minisroundoff' => $minisroundoff, 'fulltotal' => round($discountfulltotal, 4), 'discountfulltotal' => $discountfulltotal, 'totalitems' => count($result), 'gsttotal' => $amounttotalgst, 'discount' => round($discount), 'commission' => round($commission), 'amounttotal_with_out_commission' => round($amounttotal_with_out_commission, 2), 'Meter_to_Sqr_feet' => round($Meter_to_Sqr_feet, 3), 'Sqr_feet_to_Meter' => round($Sqr_feet_to_Meter, 3), 'NOS' => round($nos, 3), 'UNIT' => round($unit, 3), 'FACT' => round($fact, 3), 'fullqty' => round($fullqty, 3));
        echo json_encode($array);
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
	
	
	public function purchase_list_po()
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
									         $this->load->view('purchase/purchase_list_po',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
	public function purchase_list_inward()
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
									         $this->load->view('purchase/purchase_list_inward',$data);
										
										
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
            $data['bankaccount'] = $this->Main_model->where_names_order_by('bankaccount', 'deleteid', '0', 'id', 'ASC');
            
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
                 	        
                 	        $uom="";
                 	        $resultpss= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_product_list_id);
                     	     foreach ($resultpss as  $valuepss) {
                     	                 
                     	                 $qty=$valuepss->qty;
                                 	     $product_name=$valuepss->product_name;
                                 	     $specifications=$valuepss->specifications;
                                 	     $uom=$valuepss->uom;
                                 	     
                                 	     
                                 	   
                                 	     
                                 	    
                                 	    
                     	     
                         	  }
                         	  
                         	             if($uom==1)
                                 	     {
                                 	          $uom='TON';
                                 	     }
                                 	     else
                                 	     {
                                 	           $uom='KG';
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
                     	 		'timeline' => $value->timeline,
                     	 		'extra_included' => $value->extra_included,
                     	 		'payment_terms' => $value->payment_terms,
                     	 		'due_date' => $value->due_date,
                     	 		'specifications' => $specifications,
                     	 		'extra' => $value->extra,
                     	 		'price' => $value->price,
                     	 		'total' => round($value->price+$value->extra,2),
                     	 		'selected_status' => $value->selected_status,
                     	 		'attachement' => base_url().$value->attachement,
                     	 		'product_name' => $product_name,
                     	 		'uom' => $uom,
                     	 		'qty' => round($qty,2),
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
	
	
	public function fetchcomapredata_selected()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result  =$this->Main_model->where_names_two_order_by('purchase_order_quotation', 'order_id', $order_id, 'selected_status', '1', 'id', 'DESC');
                                           
                 
                 	 foreach ($result as  $value) {
                 	     
                 	        $name="";
                 	        $email="";
                 	        $phone="";
                 	        
                 	        $uom="";
                 	        $resultpss= $this->Main_model->where_names('purchase_product_list_process','id',$value->purchase_product_list_id);
                     	     foreach ($resultpss as  $valuepss) {
                     	                 
                     	                 $qty=$valuepss->qty;
                                 	     $product_name=$valuepss->product_name;
                                 	     $specifications=$valuepss->specifications;
                                 	     $uom=$valuepss->uom;
                                 	     
                                 	     
                                 	   
                                 	     
                                 	    
                                 	    
                     	     
                         	  }
                         	  
                         	             if($uom==1)
                                 	     {
                                 	          $uom='TON';
                                 	     }
                                 	     else
                                 	     {
                                 	           $uom='KG';
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
                     	 		'timeline' => $value->timeline,
                     	 		'extra_included' => $value->extra_included,
                     	 		'payment_terms' => $value->payment_terms,
                     	 		'due_date' => $value->due_date,
                     	 		'specifications' => $specifications,
                     	 		'extra' => $value->extra,
                     	 		'price' => $value->price,
                     	 		'total' => $value->price+$value->extra,
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
	
	
	
	
		public function fetchcomapredata_unic_vendor()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                    
                     $queryss = $this->db->query("SELECT * FROM purchase_order_quotation  WHERE order_id='".$order_id."' GROUP BY  vendor_id ORDER BY id DESC");
                     $result = $queryss->result();
                     foreach ($result as  $value) {
                 	     
                 	       
                         	  
    
                     	    	$array[] = array(
                     	 	    
                     	 	    'no' => $i, 
          
                     	 		'id' => $value->id,
                     	 		'order_id' => $value->order_id, 
                     	 		'vendor_id' => $value->vendor_id,
                     	 		'remarks' => $value->remarks,
                     	 		'timeline' => $value->timeline,
                     	 		'extra_included' => $value->extra_included,
                     	 		'payment_terms' => $value->payment_terms,
                     	 		'due_date' => $value->due_date,
                     	 	    'extra' => $value->extra,
                     	 		'price' => $value->price,
                     	 		'selected_status' => $value->selected_status,
                     	 		'attachement' => base_url().$value->attachement,
                     	 		'create_date' => date('d-m-Y',strtotime($value->create_date))
                     	 		
                     	 		
    
                     	 	);
                 	 	
                 	 
                 	    

                       $i++;


                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetchcomapredata_vendor()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                    
                     $i=1;
                     
                     $array=array();
                    
                 	 $result= $this->Main_model->where_names('purchase_order_vendors','order_id',$order_id);
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	         $resultp= $this->Main_model->where_names('vendor','id',$value->vendor_id);
                     	     foreach ($resultp as  $valuep)
                     	     {
                     	     
                     	     $name=$valuep->name;
                     	     $email=$valuep->email;
                     	     $phone=$valuep->phone;
                     	     
                         	 }
    
                 	     
                 	       
                     	    	$array[] = array(
                     	 	    
                     	 	    'no' => $i, 
                                'id' => $value->id,
                     	 		'order_id' => $value->order_id, 
                     	 		'vendor_id' => $value->vendor_id,
                     	 	    'vendor_name' => $name
                     	 		
    
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
							                 
							                 
							                 $data['vendor'] = $this->Main_model->where_names('vendor','id',$data['vendor_id']);
							                 
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
	
	
	
	
		public function purchase_return_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
							                
							                 
                                             $data['po_number']='PO-'.substr(time(), 5).'/'.date('Y');
							            
							            
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
							            	 
							            	 $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Purchase Return';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('purchase/purchase_return_list',$data);
										
										
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function purchase_return_data()
	{
	    
	    
                   date_default_timezone_set("Asia/Kolkata"); 
                   $date= date('Y-m-d');
                   $time= date('h:i A');
                   $form_data = json_decode(file_get_contents("php://input"));
                 
                 
                
           
                                         $label1=$form_data->label1;
                                         $lab_option1=$form_data->lab_option1;
               
                                         $tablename=$form_data->tablename;
                                         $product_id=$form_data->product_id;
                                         $data['return_qty']=$form_data->qty;
                                         $data['product_id']=$product_id;
                                         $data['stock_id']=$form_data->id;
                                         $data['vendor_id']=$form_data->vendor_id;
                                         $data['user_id']=$this->userid;
                                         $data['po_number']=$form_data->po_number;
                                         $data['total_amount']=$form_data->total_amount;
                                         $data['return_date']= $form_data->return_date;
                                         $data['remarks']= $form_data->remarks;
                                         
                                         $insert_id=$this->Main_model->insert_commen($data,$tablename);
                                         
                                         
                                         
                                         

                                                                 $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                 
                                                                $data_driver['order_id']='PR-'.$insert_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='';
                                                                $data_driver['notes']='Purchase Return';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->po_number;
                                                                $data_driver['amount']=$form_data->total_amount;
                                                                $data_driver['reference_no']=$form_data->po_number;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=$form_data->total_amount;
                                                                $data_driver['credits']=0;
                                                                $data_driver['balance']=$balancetotal+$form_data->total_amount;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $data_driver['account_head_id']=104;
                                                                $data_driver['account_heads_id_2']=120;
                                                                $this->Main_model->insert_commen($data_driver,'all_ledgers');
                                                                 
                                                                 
                                         $datass['get_id']=$form_data->id;   
                                         $datass['return_status']=1;
                                 	     $this->Main_model->update_commen($datass,'purchase_order');
                                 	      


                                 	     
                                         $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Purchase Return Success');
                                         echo json_encode($array);
  
                 	


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
                                         $data['coil_no']=$form_data->coil_no;
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
                                         	   
                                         	      $this->Main_model->insert_commen($dataval,'stock_history');
                                         	  
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
	
	
	
	
	
	
		public function insertandupdateinward_by_purchase()
	{
	    
	    
                                                   date_default_timezone_set("Asia/Kolkata"); 
                                                  $date= date('Y-m-d');
                                                  $time= date('h:i A');
                                                  $form_data = json_decode(file_get_contents("php://input"));
                                                  $id=$form_data->id;
                                                 
                                              
                                                     
                                            
                                                 $data['stock_id']=$form_data->id;
                                             
                                             	 $result= $this->Main_model->where_names('purchase_product_list_process','id',$id);
                                            	 foreach ($result as  $value) {
                                            	     $product_id=$value->product_id;
                                            	     $order_no=$value->order_no;
                                            	     $price=$value->rate;
                                            	     $qty=$value->qty;
                                            	     $amount=round($value->rate*$value->qty,2);
                                            	     $order_id=$value->order_id;
                                            	 }
                                            	 
                                            	 
                                        	 
                                            	 $resulttotal = $this->Main_model->where_names_two_order_by('purchase_order_vendors', 'order_id', $order_id, 'selected_status', '1', 'id', 'DESC');
                                                 foreach ($resulttotal as $tot) {
                                                  
                                                    $vendor_id=  $tot->vendor_id;
                                                    
                                                 }
                                                 
                                                 
                                                 if($form_data->rate_edit!=0)
                                                 {
                                                     $price=$form_data->rate_edit;
                                                     $amount=$price*$qty;
                                                 }
                                                 
                                                 
                                                 if($form_data->qty_edit!=0)
                                                 {
                                                     $qty=$form_data->qty_edit;
                                                     $amount=$price*$qty;
                                                 }
                     	     
                                         
                                         
                                                 $data['product_id']=$product_id;
                                                 $data['vendor_id']=$vendor_id;
                                                 $data['po_number']=$order_no;
                                                 $data['user_id'] = $this->userid;
                                                 
                                                 $data['price']=$price;
                                                 $data['qty']=$qty;
                                                 $data['total_amount']=$amount;
                                                 
                                                 
                                                 
                                                 $data['inward_date']= $date;
                                                 $data['rack_info']= $form_data->rack_info;
                                                 $data['bin_info']= $form_data->bin_info;
                                                 
                                                 
                                                 $result= $this->Main_model->where_names('purchase_order','stock_id',$form_data->id);
                                                 if(count($result)==0)
                                                 {
                                                     
                                                 	      $this->db->query("UPDATE product_list SET stock=stock+'".$qty."' WHERE id='".$product_id."'");
                                                 	      $res_id=$this->Main_model->insert_commen($data,'purchase_order');
                                                 	      $this->db->query("UPDATE purchase_product_list_process SET checked='1',rack_info='". $form_data->rack_info."',bin_info='". $form_data->bin_info."' WHERE id='".$form_data->id."'"); 
                                                 	      
                                                 }
                                                 else
                                                 {         
                                                          $res_id=$form_data->id;
                                                          $data['get_id']=$form_data->id;
                                                          $this->Main_model->update_commen_where($data,'stock_id','purchase_order');
                                                          $this->db->query("UPDATE purchase_product_list_process SET checked='1',rack_info='". $form_data->rack_info."',bin_info='". $form_data->bin_info."' WHERE id='".$form_data->id."'"); 
                                                 	      
                                                 }
                                                 	 
                                                 $this->db->query("UPDATE purchase_orders_process SET order_base='8',reason='Inward ID : ". $res_id."' WHERE id='".$order_id."'"); 
                                                 	      
                                         	  
                                                 $array=array('error'=>'2','insert_id'=>1,'massage'=>'Purchase Product Inward..');
                                                 echo json_encode($array);
          
                         	
        
                      


                
                


	}
	
	
	
	
	
	
	
		public function purchase_fetch_return()
	{
                     
                     
                     $i=1;
                     
                     
                     $id=$_GET['id'];
                      $array=array();
                 	 $result= $this->Main_model->where_names('purchase_order_return','stock_id',$id);
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
                       
                        

                 	    
                 	  

                 	 	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
      
                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $product_name, 
                 	 	    'vendor_name' => $vendor_name, 
                 	 	    'po_number' => $value->po_number, 
                 	 		'qty'=>$value->qty,
                 	 		'total_amount'=>$value->total_amount,
                 	 	    'return_qty'=>$value->return_qty,
                 	 	    'remarks'=>$value->remarks,
                 	 		'return_date' =>  date('d-m-Y', strtotime($value->return_date)),
                 	 		

                 	 	);
                 	 	
                 	 	
                 	  
                 	 	

                       $i++;


                 	 }

                    echo json_encode($array);

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
                 	 		'return_status'=>$value->return_status,
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
                        $output=array();
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
    
    
     public function fetch_data_purchase_details()
    {
                      
                     $output=array();
                     $id=$_GET['order_id'];
    	             $result= $this->Main_model->where_names('purchase_orders_process','id',$id);
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['arrival_date']= date('d-m-Y',strtotime($value->arrival_date)); 
                      $output['arrival_date1']= $value->arrival_date; 
                      $output['price_details']= $value->price_details;
                      $output['availability']= $value->availability;
                      
                      if($value->invoice_attachment=='0')
                      {
                           $output['invoice']=0;
                        
                      }
                      else
                      {
                         $output['invoice']= base_url().$value->invoice_attachment;
                        
                      }
                      
                      $company_name="";
                      $phone="";
                      $results= $this->Main_model->where_names('customers','id',$value->customer_id);
                      foreach ($results as  $values) {
                          $company_name=$values->company_name;
                          $phone=$values->phone;
                      }
                     
                       $output['company_name']= $company_name;
                       $output['phone']= $phone;
	                 	
                 	 }

                    echo json_encode($output);


    }
    
    
    
    
     public function fetch_data_purchase_details_by_sales()
    {
                      
                     $output=array();
                     $id=$_GET['product_order_id'];
    	             $result= $this->Main_model->where_names('purchase_product_list_process','sale_purchase_op_id',$id);
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['arrival_date']= date('d-m-Y',strtotime($value->arrival_date)); 
                      $output['arrival_date1']= $value->arrival_date; 
                      $output['price_details']= $value->rate;
                      $output['availability']= $value->availability;
                      
	                 	
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
        if ($this->session->userdata['logged_in']['access'] == '4112') {
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
        }
        else {
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
                
                
                 if($tot->rate_edit!=0)
                {
                     $tot->rate=$tot->rate_edit;
                    
                }
                
                if($tot->qty_edit!=0)
                {
                      $tot->qty=$tot->qty_edit;
                    
                }
                
                $totalamount+= $tot->qty*$tot->rate; 
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
                                           if($order_base>=2)
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
            
            
           
           
           if($value->invoice_attachment=='0')
           {
                $invoice=0;
           }
           else
           {
               $invoice=base_url().$value->invoice_attachment;
           }
            
            
            
            
            $array[] = array('no' => $i, 'id' => $value->id,'totalqty'=>$qtys,'vendors_names'=>$vendors_names,'invoice' => $invoice, 'base_id' => base64_encode($value->id), 'order_no' => $value->order_no, 'reason' => $value->reason, 'name' => $company_name, 'email' => $email, 'phone' => $phone, 'totalamount' => round($discountfulltotal), 'commission' => round($commission), 'delivery_charge' => $value->delivery_charge, 'address' => $address, 'order_by' => $order_by, 'order_base' => $value->order_base, 'create_date' => date('d-m-Y', strtotime($value->create_date)), 'create_time' => $value->create_time);
            $i++;
        }
        $myData = array('PortalActivity' => $array, 'totalCount' => $count);
        echo json_encode($myData);
    }
    
    
      public function getcount() {
        $tablename = $_GET['tablename'];
        if ($this->session->userdata['logged_in']['access'] == '455') {
            $resultpending = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '0', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '1', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '-1', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
            
            $resultrequestpo = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '2', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '3', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $payment_vendor_f = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '4', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
            
            $dispath = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '5', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '6', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
            
             $inward= $this->Main_model->where_names_three_order_by($tablename, 'order_base', '8', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
            
            $archive = $this->Main_model->where_names_three_order_by($tablename, 'order_base', '-3', 'user_id', $this->userid, 'deleteid', '0', 'id', 'DESC');
            
        } else {
            
            $resultpending = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '0', 'deleteid', '0', 'id', 'DESC');
            $resultprocessed = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '1', 'deleteid', '0', 'id', 'DESC');
            $resultcancel = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-1', 'deleteid', '0', 'id', 'DESC');
            $resultrequestpo = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '2', 'deleteid', '0', 'id', 'DESC');
            $payment_vendor = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '3', 'deleteid', '0', 'id', 'DESC');
             $payment_vendor_f = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '4', 'deleteid', '0', 'id', 'DESC');
            
            $dispath = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '5', 'deleteid', '0', 'id', 'DESC');
            $deliverd = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '6', 'deleteid', '0', 'id', 'DESC');
            
             $inward = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '8', 'deleteid', '0', 'id', 'DESC');
             
            $archive = $this->Main_model->where_names_two_order_by($tablename, 'order_base', '-3', 'deleteid', '0', 'id', 'DESC');
            
        }
        $array = array('pending' => count($resultpending),'dispath' => count($dispath),'inward' => count($inward),'deliverd' => count($deliverd), 'payment_vendor_f' => count($payment_vendor_f),'proceed' => count($resultprocessed), 'cancel' => count($resultcancel), 'po' => count($resultrequestpo), 'payment_vendor' => count($payment_vendor),'archive' => count($archive));
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
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $point['get_id'] = $ticket_id;
                $point['attachement'] = $path;
                $point['filetype'] = $filetype;
                $this->Main_model->update_commen($point, 'purchase_order_remarks');
            }
        }
        
        
        
        
        
    }
    
    
    
      public function fileuplaodbyorder_invoice() {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
           
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                $point['get_id'] = $ticket_id;
                $point['invoice_attachment'] = $path;
                $this->Main_model->update_commen($point, 'purchase_orders_process');
            }
        }
        
        
        
        
        
    }
    
    
    
    public function fileuplaodbyorder_set() {
        
        
      
        
        if (!empty($_FILES)) {
            $path = array();
            $ticket_id = $_GET['id'];
            $filetype = $_GET['filetype'];
            $ticket_id=explode('|', $ticket_id);
            
            echo $path = 'uploads/' . time() . $_FILES['file']['name'];
            if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
                
                
                for($i=0;$i<count($ticket_id);$i++)
                {
                         $point['get_id'] = $ticket_id[$i];
                         $point['attachement'] = $path;
                         $this->Main_model->update_commen($point, 'purchase_order_quotation');
                
                }
                
              
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
        
        
        
     
        
        $price=explode('|', $form_data->price);
        $purchase_product_list_ids=explode('|', $form_data->purchase_product_list_ids);
        
        
        
        
        if ($form_data->price != '') {
            
            
            
            $tablenamemain = $form_data->tablename;
            
            $insert_id=array();
            for($i=0;$i<count($purchase_product_list_ids);$i++)
            {        
                
                
                       if($price[$i]!='')
                       {
                           
                       
                   
                        $this->db->query("DELETE FROM $tablenamemain  WHERE order_id='".$form_data->order_id."' AND vendor_id='".$form_data->vendor_id."' AND purchase_product_list_id='".$purchase_product_list_ids[$i]."'");
                        $findp['remarks'] = $form_data->remarks;
                        $findp['price'] = $price[$i];
                        $findp['extra_included'] = $form_data->extra_included;
                        $findp['timeline'] = $form_data->timeline;
                        $findp['payment_terms'] = $form_data->payment_terms;
                        $findp['due_date'] = $form_data->due_date;
                        $findp['extra'] = $form_data->extra;
                        $findp['order_id'] = $form_data->order_id;
                        $findp['vendor_id'] = $form_data->vendor_id;
                        $findp['purchase_product_list_id'] = $purchase_product_list_ids[$i];
                        $insert_id[] = $this->Main_model->insert_commen($findp, $tablenamemain);
                        
                        
                       }
                        
            
            }
             
             $iddata=implode('|',$insert_id);
             
            
            $array = array('error' => '2', 'insert_id' => $iddata, 'massage' => 'Price Quotation Submitted');
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
        
          
            $this->db->query("UPDATE   purchase_order_vendors SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            $this->db->query("UPDATE   purchase_order_quotation SET selected_status=0 WHERE order_id='".$form_data->order_id."'");
            
            
             $this->db->query("UPDATE   purchase_order_quotation SET selected_status=1 WHERE id='".$form_data->purchase_order_quotation_id."' ");
             $this->db->query("UPDATE   purchase_order_vendors SET selected_status=1 WHERE vendor_id='".$form_data->vendor_id."' AND order_id='".$form_data->order_id."'");
            
            
            
            
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$form_data->vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
            
            
                                                                 $tablename_driver_ledger='all_ledgers';
                                                                 $this->db->query("DELETE FROM $tablename_driver_ledger  WHERE order_id='".$form_data->order_id."'");
                                                                
                                                                
                                                                
                                                                
                                                                 $resw = $this->Main_model->where_names('purchase_product_list_process','order_id',$form_data->order_id);
                                                                 $valsqtyprice=0;
                                                                 foreach($resw as $vals)
                                                                 {
                                                                       $order_no=$vals->order_no;
                                                                       $valsqtyprice+=$vals->qty*$vals->rate;
                                                                 }
                                                                 
                                                                 
                                                                 $valsqtyprice=$form_data->amount;
            
                                                              
                                                                 
                                         	                     $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                 
                                                                
                                                                
                                                                $data_driver['order_id']=$form_data->order_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']='';
                                                                $data_driver['notes']='Purchase Request';
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$order_no;
                                                                $data_driver['amount']=$valsqtyprice;
                                                                $data_driver['reference_no']=$order_no;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['debits']=0;
                                                                $data_driver['credits']=$valsqtyprice;
                                                                $data_driver['balance']=$balancetotal+$valsqtyprice;
                                                                
                                                                
                                                                
                                                                
                                                                
                                                              
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                
                                                                
                                                                
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
            
            
            
            
            
            
            
            
           
           
            $array = array('error' => '2', 'insert_id' => 1, 'massage' => 'Price Quotation Seletced');
            echo json_encode($array);
        
    }
    
    
    
    
    
    
    
    
    
    	public function purchase_order_payment_history()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_payout', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                 	
                 	 foreach ($result as  $value) {
                 	     
                 	         $bankname="";
                 	         $resultp= $this->Main_model->where_names('bankaccount','id',$value->bankaccount);
                     	     foreach ($resultp as  $valuep) {
                     	     $bankname=$valuep->bankname;
                     	     }
                            
                 	    	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id,
                 	 		'order_id' => $value->order_id, 
                 	 		'vendor_id' => $value->vendor_id,
                 	 		'notes' => $value->notes, 
                 	 		'amount' => $value->amount, 
                            'payment_type' => $value->payment_type,
                            'payment_mode' => $value->payment_mode,
                            'bankname' => $bankname,
                            'create_date' => date('d-m-Y',strtotime($value->create_date))
                 	 		);
                 	 	
                 	    

                       $i++;


                 	 }

                    echo json_encode($array);

	}
    
    
    
    
    
    
    
    
    
    
    
    	public function purchase_order_delevery_history()
	{
                     
                     
                     
                     $order_id=$_GET['order_id'];
                     $vendorid=$_GET['vendorid'];
                     
                     $i=1;
                     
                     $array=array();
                    
                    
                     $result = $this->Main_model->where_names_three_order_by('purchase_delivery_history', 'order_id', $order_id,'vendor_id', $vendorid, 'deleteid', '0', 'id', 'DESC');
           
                 	
                 	 foreach ($result as  $value) {
                 	     
                 	    	$array[] = array(
                 	 	    
                 	 	    'no' => $i, 
                            'id' => $value->id,
                 	 		'order_id' => $value->order_id, 
                 	 		'vendor_id' => $value->vendor_id,
                 	 		'notes' => $value->notes, 
                 	 		'status' => $value->status_name, 
                             'create_date' => date('d-m-Y',strtotime($value->update_date))
                 	 		);
                 	 	
                 	    

                       $i++;


                 	 }

                    echo json_encode($array);

	}
    
    
    
    
    
    
    	public function payment_save() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
        
        
        
        
                                                                       if($form_data->payment_type=='Full')
                                                                       {
                                                                            
                                                                            $this->db->query("UPDATE purchase_orders_process SET order_base=4,reason='Full Payout' WHERE id='".$form_data->order_id."'");
                                                                           
                                                                       }
                                                                       else
                                                                       {
                                                                           $this->db->query("UPDATE purchase_orders_process SET order_base=3,reason='Partial Payout' WHERE id='".$form_data->order_id."'");
                                                                         
                                                                       }
                                                                   
                                                                   
                                                                        $payout['order_id']=$form_data->order_id;
                                                                        $payout['user_id']=$this->userid;
                                                                        $payout['notes']=$form_data->notes;
                                                                        $payout['payment_mode']=$form_data->payment_mode_payoff;
                                                                        $payout['payment_type']=$form_data->payment_type;
                                                                        $payout['amount']=$form_data->amount;
                                                                        $payout['bankaccount']=$form_data->bankaccount;
                                                                        $payout['vendor_id']=$form_data->vendor_id;
                                                                        $insertid=$this->Main_model->insert_commen($payout,'purchase_payout');
            
            
            
          
           
            
                                                                  $account_head_id=0;
                                                                  $res = $this->Main_model->where_names('vendor','id',$form_data->vendor_id);
                                                                  foreach($res as $val)
                                                                  {
                                                                        $company_name= $val->name;
                                                                        $account_head_id= $val->account_heads_id;
                                                                        $account_head_id_2= $val->account_heads_id_2;
                                                                  }
            
            
                                                                 $tablename_driver_ledger='all_ledgers';
                                                            
            
                                         	                     $res =$this->Main_model->where_names_three_order_by('all_ledgers','customer_id',$form_data->vendor_id,'party_type',3,'deleteid','0','id','ASC');
                                                                 $debitsdd=0;
                                                                 $creditsdd=0;
                                                                 $balancetotal=0;
                                                                 foreach($res as $val)
                                                                 {
                                                                       $payid=$val->id;
                                                                       $customer_id=$val->customer_id;
                                                                       $amount=$val->amount;
                                                                       $debitsdd+=$val->debits;
                                                                       $creditsdd+=$val->credits;
                                                                       $balancetotal+=$val->balance;
                                                                 }
                                                                 
                                                                $balancetotal=$creditsdd-$debitsdd;
                                                                
                                                                
                                                                
                                                                  $bankaccount=$form_data->bankaccount;            
                                                                  $account_no="";
                                                                  $bank_name="";
                                                                  $bid="";
                                                                  if($bankaccount!='0')
                                                                  {
                                                                      
                                                                      
                                                                      
                                                                                             $resbankaccount = $this->Main_model->where_names('bankaccount','id',$bankaccount);
                                                                                             foreach($resbankaccount as $valb)
                                                                                             {
                                                                                                  $bid=$valb->id;
                                                                                                  $bank_name=$valb->bank_name;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_no=$valb->account_no;
                                                                                                  $account_heads_id_by_bank=$valb->account_heads_id;
                                                                                                  $account_heads_id_by_bank_2=$valb->account_heads_id_2;
                                                                                             }
                                                                         
                                                                                             $res =$this->Main_model->where_names_two_order_by('bankaccount_manage','bank_account_id',$bankaccount,'deleteid','0','id','ASC');
                                                                                           
                                                                                             $bankbalancetotal=0;
                                                                                             $bankdebitsamount=0;
                                                                                             $bankcreditsamount=0;
                                                                                             foreach($res as $val)
                                                                                             {
                                                                                                 $bankpayid=$val->id;
                                                                                                 $bankdebitsamount+=$val->debit;
                                                                                                 $bankcreditsamount+=$val->credit;
                                                                                                 $bankbalancetotal=$val->balance;
                                                                                             }
                                                                                             
                                                                                     
                                                                                            $bankbalancetotal=$bankcreditsamount-$bankdebitsamount;
                                                                         
                                                                                            $data_bank['bank_account_id']=$bid;
                                                                                            $data_bank['ex_code']=$form_data->notes;
                                                                            
                                                                                            if($bankbalancetotal==0)
                                                                                             {   
                                                                                                       $data_bank['balance']='-'.$form_data->amount;
                                                                                             }
                                                                                             else
                                                                                             {
                                                                                                       
                                                                                                       $data_bank['balance']=$bankbalancetotal-$form_data->amount;
                                                                                              }
                                                                            
                                                                            
                                                                            
                                                                                            $data_bank['debit']=$form_data->amount;
                                                                                            $data_bank['credit']=0;
                                                                                            $data_bank['name']=$company_name;
                                                                                            $data_bank['create_date']=date('Y-m-d');
                                                                                            $data_bank['deletemod']='PY'.$insertid;
                                                                                            $data_bank['status_by']='Purchase Payout';
                                                                                            
                                                                                            
                                                                                             if($bid==24)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=106;
                                                                                                 $data_bank['account_heads_id_2']=106;
                                                                                            }
                                                                                            elseif($bid==25)
                                                                                            {
                                                                                                 $data_bank['account_head_id']=105;
                                                                                                 $data_bank['account_heads_id_2']=105;
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                                
                                                                                                 $data_bank['account_head_id']=107;
                                                                                                 $data_bank['account_heads_id_2']=107;
                                                                                                
                                                                                            }
                                                                                            
                                                                                            
                                                                                            $data_bank['party_type'] = 4;
                                                                                            $this->Main_model->insert_commen($data_bank,'bankaccount_manage');
                                                                              
                                                                  }
                                                                  
                                                                 
                                                                
                                                                
                                                                
                                                             
            
                                                                
                                                                $data_driver['order_id']=$form_data->order_id;
                                                                $data_driver['customer_id']=$form_data->vendor_id;
                                                                $data_driver['payment_mode']=$form_data->payment_mode_payoff;
                                                                $data_driver['notes']=$form_data->notes;
                                                                $data_driver['user_id']=$this->userid;
                                                                $data_driver['order_no']=$form_data->order_no;
                                                                $data_driver['amount']=$form_data->amount;
                                                                $data_driver['reference_no']=$form_data->order_no;
                                                                $data_driver['party_type']=3;
                                                                $data_driver['deletemod']='PY'.$insertid;
                                                                $data_driver['debits']=$form_data->amount;
                                                                $data_driver['credits']=0;
                                                                $data_driver['balance']=$balancetotal-$form_data->amount;
                                                                $data_driver['paid_status']='Un-Paid';
                                                                $data_driver['payment_date']=$date;
                                                                $data_driver['payment_time']=$time;
                                                                $data_driver['bank_id']=$form_data->bankaccount;
                                                                $data_driver['account_head_id']=$account_head_id;
                                                                $data_driver['account_heads_id_2']=$account_head_id_2;
                                                                $this->Main_model->insert_commen($data_driver,$tablename_driver_ledger);
                                                                
                                                                
                                                                
                                                                
            
            
            
           
            $array = array('error' => '2', 'insert_id' => $insertid, 'massage' => 'Payout Success');
            echo json_encode($array);
        
    }
    
    
    
    
    	public function delivery_save() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
        
        if($form_data->delivery_status==5)
        {
            $rs=$form_data->notes." Dispatched";
            $rs1="Dispatched";
        }
        elseif($form_data->delivery_status==7)
        {
            $rs=$form_data->notes." Production Complete";
            $rs1="Production Complete";
        }
        else
        {
            $rs=$form_data->notes." Delivered";
            $rs1="Delivered";
        }
        
        
        
          $payout['order_id']=$form_data->order_id;
          $payout['user_id']=$this->userid;
          $payout['notes']=$form_data->notes;
          $payout['status']=$form_data->delivery_status;
          $payout['status_name']=$rs1;
          $payout['update_date']=$form_data->delivery_date;
          $payout['vendor_id']=$form_data->vendor_id;
          $insertid=$this->Main_model->insert_commen($payout,'purchase_delivery_history');
            
        
        
        
        
        $this->db->query("UPDATE purchase_orders_process SET order_base='".$form_data->delivery_status."',reason='".$rs."' WHERE id='".$form_data->order_id."'");
          
        $array = array('error' => '2', 'insert_id' => 1, 'massage' => 'Status Updated');
        echo json_encode($array);
        
    }
    
    
   public function fetch_data_purchase_details_save() 
   {
      
       
       $name= $_GET['name'];
       $value= $_GET['value'];
       $order_id= $_GET['order_id'];
       
       $sql= "UPDATE purchase_orders_process SET $name='".$value."' WHERE id='".$order_id."'";
       
       $this->db->query($sql);
       
       
       $sql1= "UPDATE purchase_product_list_process SET $name='".$value."' WHERE order_id='".$order_id."'";
       
       $this->db->query($sql1);
                                    
       
   }
    
   public function purchase_order_request() 
   {
    	    
    	        date_default_timezone_set("Asia/Kolkata");
                $date = date('Y-m-d');
                $time = date('h:i A');
                $form_data = json_decode(file_get_contents("php://input"));
                
                
                $order_product_id=$form_data->order_product_id;
                $order_product_id=explode('|',$order_product_id);
                
                
                
                                        
                
                for($i=0;$i<count($order_product_id);$i++)
                {
                    
               
                
                
               
                            $resultp= $this->Main_model->where_names($form_data->tablename_sub,'id',$order_product_id[$i]);
                     	    foreach ($resultp as  $valuep) {
                     	                
                     	                
                     	                 $order_id=$valuep->order_id;
                                 	     $product_id=$valuep->product_id;
                                 	     $product_name=$valuep->product_name;
                                 	     $categories_name=$valuep->categories_name;
                                 	     $categories_id=$valuep->categories_id;
                                 	     $qty=$valuep->qty;
                                 	     $rate=$valuep->rate;
                                 	     $unit=2;
                                 	    
                     	    }
                     	    
                     	    $resultpss= $this->Main_model->where_names($form_data->tablenamemain,'id',$order_id);
                     	    foreach ($resultpss as  $valuepss) {
                     	        
                     	        $customer_id=$valuepss->customer_id;
                     	    }
                     	    
                     	    
                     	    
                     	                $tablename = 'purchase_orders_process';
                                        $basedata['count_id'] = 1;
                                        $basedata['create_date'] = $date;
                                        $basedata['create_time'] = $time;
                                        $basedata['user_id'] = $this->userid;
                                        $basedata['entry_user_id'] = $this->userid;
                                        
                                        $basedata['arrival_date'] = $form_data->arrival_date;
                                        $basedata['price_details'] = $form_data->price_details;
                                        $basedata['availability'] = $form_data->availability;
                                        $basedata['customer_id'] = $customer_id;
                                        
                                        
                                        
                                        
                                    
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
                                            $order_no = strtoupper(date('M') . '/' . $neworder_id);
                                        } else {
                                            $order_no = $neworder_id . '/' . $this->sales_id . '/PO' . $neworder_quotation_id . '/' . date('Y');
                                        }
                                        
                                        $basedata['order_no'] = $order_no;
                                        $basedata['mark_request_to_sales'] = $form_data->order_no;
                                       
                     	    
                     	    
                     	    $tablename_sub=$form_data->tablename_sub;
                     	    $tablenamemain=$form_data->tablenamemain;
                     	    
                     	    
                     $purchase_product_list_process = $this->Main_model->where_names_two_order_by('purchase_product_list_process', 'sale_purchase_op_id', $order_product_id[$i], 'sale_purchase_o_no', $form_data->order_no, 'id', 'ASC');
                     if(count($purchase_product_list_process)==0)
                     {
                               
                                     	$insertid = $this->Main_model->insert_commen($basedata, $tablename);
                     	    
                      
                                        $basedataproduct['sale_purchase_op_id'] = $order_product_id[$i];
                                        $basedataproduct['sale_purchase_o_no'] = $form_data->order_no;
                                        $basedataproduct['order_no'] = $order_no;
                                        $basedataproduct['order_id'] = $insertid;
                                        $basedataproduct['product_id'] = $product_id;
                                        $basedataproduct['product_name'] = $product_name;
                                        $basedataproduct['categories_name'] = $categories_name;
                                        $basedataproduct['categories_id'] = $categories_id;
                                        $basedataproduct['unit'] = $unit;
                                        $basedataproduct['uom'] = $unit;
                                        $basedataproduct['qty'] = $qty;
                                        $basedataproduct['rate'] = $rate;
                                        $this->Main_model->insert_commen($basedataproduct, 'purchase_product_list_process');
                                        
                                        
                                        $this->db->query("UPDATE $tablename_sub SET purchase_request=1,purchase_id='".$insertid."' WHERE id='".$order_product_id[$i]."'");
                     	                $this->db->query("UPDATE $tablenamemain SET purchase_request=1,purchase_id='".$insertid."' WHERE id='".$order_id."'");
                     	               // $this->db->query("UPDATE purchase_orders_process SET customer_id='".$customer_id."' WHERE id='".$insertid."'");
                                    
                            
                        }    
                            
                            
                            
                            
                }           
                            
                
               
                
    	    
   }
    
    
    
	public function order_quotation_request_po() {
        date_default_timezone_set("Asia/Kolkata");
        $date = date('Y-m-d');
        $time = date('h:i A');
        $form_data = json_decode(file_get_contents("php://input"));
        
            
            
            
            $this->db->query("UPDATE   purchase_orders_process SET order_base=2,reason='PO Generated' WHERE id='".$form_data->order_id."'");
             
            $array = array('error' => '2', 'insert_id' => $form_data->order_id, 'massage' => 'PO Generated');
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
    
    
    
    
    
    
    
    
    public function dc() {
        if (isset($this->session->userdata['logged_in'])) {
            
            $dc_id=$_GET['dc_id'];
            
           
            $data['purchase_order_return'] = $this->Main_model->where_names_order_by('purchase_order_return', 'id', $dc_id, 'id', 'ASC');
           
            $data['vendor'] = $this->Main_model->where_names_order_by('vendor', 'deleteid', 0, 'id', 'ASC');
            
            $data['product_list'] = $this->Main_model->where_names_order_by('product_list', 'deleteid', 0, 'id', 'ASC');
            
            $data['active'] = 'customer_1';
            $data['title'] = 'DC ';
            $data['top_nav'] = $this->load->view('commen/top_nav', $data, TRUE);
            $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
            $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
            $this->load->view('purchase/dc', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
      public function po_edit() {
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
            $this->load->view('purchase/po_edit', $data);
        } else {
            $this->load->view('admin/index');
        }
    }
    
    
    
    
    
    
    
    
    
      public function po_inward() {
        if (isset($this->session->userdata['logged_in'])) {
            $data['locality'] = $this->Main_model->where_names('locality', 'deleteid', '0');
            $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan', 'deleteid', '0', 'id', 'ASC');
            $data['overview_invoice_content'] = $this->Main_model->where_names_order_by('overview_invoice_content', 'deleteid', '0', 'id', 'ASC');
            $data['user_group'] = $this->Main_model->where_names('sales_group', 'deleteid', '0');
            $data['sales_team'] = $this->Main_model->where_names_two_order_by('admin_users', 'access', '12', 'deleteid', '0', 'id', 'ASC');
            
            $data['racksetup'] = $this->Main_model->where_names('racksetup','id','1');
            
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
            $this->load->view('purchase/po_inward', $data);
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
                 	      $output['vendor_id']=$vendor_id;
                 	      $output['phone']=$valuep->phone;
                 	       $output['email']=$valuep->email;
                 	        $output['gst']=$valuep->gst;
                     	     $output['address']=$valuep->address1.' '.$valuep->address2.' '.$valuep->pincode.' '.$valuep->landmark.' '.$valuep->city.' '.$valuep->state;
                 	     
                 	 }

                    echo json_encode($output);


    }
    public function fetch_data_purchase() {
        $i = 1;
        $array = array();
        $cate_status = '0';
        $tablename_sub = $_GET['tablename_sub'];
        $tablenamemain = $_GET['tablenamemain'];
        $convert = $_GET['convert'];
        $customer_id = 0;
        $resultmain = $this->db->query("SELECT * FROM $tablenamemain  WHERE id='" . $_GET['order_id'] . "' AND deleteid=0 ORDER BY id ASC");
        $resultcs = $resultmain->result();
        foreach ($resultcs as $valuecs) {
            $customer_id = $valuecs->customer_id;
        }
        $result = $this->db->query("SELECT * FROM $tablename_sub  WHERE order_id='" . $_GET['order_id'] . "' AND deleteid=0  ORDER BY sort_id ASC");
        $result = $result->result();
        foreach ($result as $value) {
            $amountdata = $value->rate * $value->qty;
            $amount = $amountdata + $value->commission;
            $amountdata_edit = $value->rate_edit * $value->qty_edit;
            
            if($amountdata_edit==0)
            {
                $amountdata_edit=$amount;
            }
           
            $description = "";
            $product_name = "";
            $kg_price = 0;
            $og_price = 0;
            $og_formula = 0;
            $kg_formula2 = 0;
            $stock = 0;
            $product_list = $this->Main_model->where_names('product_list', 'id', $value->product_id);
            foreach ($product_list as $csval) {
                $description = $csval->description;
                $product_name = $csval->product_name;
                $categories = $csval->categories;
                $categories_id = $csval->categories_id;
                $type = $csval->type;
                $gst = $csval->gst;
                $kg_price = $csval->kg_price;
                $og_price = $csval->price;
                $stock = round($csval->stock, 3);
                $og_formula = $csval->formula;
                $kg_formula2 = $csval->formula2;
                if ($categories_id == '1') {
                    $cate_status = 1;
                } elseif ($categories_id == '26') {
                    $cate_status = 1;
                } elseif ($categories_id == '5') {
                    $cate_status = 1;
                } elseif ($categories_id == '32') {
                    $cate_status = 1;
                } elseif ($categories_id == '40') {
                    $cate_status = 1;
                } elseif ($categories_id == '41') {
                    $cate_status = 1;
                } else {
                    $cate_status = 0;
                }
            }
            $resultsameqty = $this->db->query("SELECT b.customer_id FROM $tablename_sub as a  JOIN $tablenamemain as b ON a.order_id=b.id WHERE a.order_id!='" . $_GET['order_id'] . "' AND a.product_id='" . $value->product_id . "' AND b.customer_id='" . $customer_id . "' AND a.deleteid=0 ORDER BY a.sort_id ASC");
            $resultsameqty = $resultsameqty->result();
            $same = 0;
            if (count($resultsameqty) > 0) {
                $same = 1;
            }
            $this->db->query("UPDATE $tablename_sub SET cul='3' WHERE id='" . $value->id . "'");
            $qty = round($value->qty, 3);
            if ($convert == 1) {
                $qty = round($value->qty, 3);
            }
            if ($convert == 2) {
                $qty = round($value->qty * 10.764, 3);
            }
            if ($convert == 'undefined') {
                $qty = round($value->qty, 3);
            }
            $profile = $value->profile;
            $crimp = $value->crimp;
            if ($value->base_id == "") {
                $value->base_id = 1;
            }
            $imagestatus = 1;
            if ($value->reference_image == '') {
                $imagestatus = 0;
            }
            if ($value->gst == '') {
                $value->gst = $gst;
            }
            if ($value->count_id != '') {
                $count_id = $value->count_id;
            } else {
                $count_id = $i;
            }
            
            
            
            if($value->rack_info=='0')
            {
                $value->rack_info='Select';
            }
            
            if($value->bin_info=='0')
            {
                $value->bin_info='Select';
            }
            
            
            
            $array[] = array('no' => $count_id, 'id' => $value->id, 'same' => $same, 'imagestatus' => $imagestatus, 'order_id' => $value->order_id,'rack_info' => $value->rack_info,'bin_info' => $value->bin_info,'purchase_request' => $value->purchase_request,'purchase_id' => $value->purchase_id, 'product_name_tab' => $product_name, 'tile_material_name' => $value->tile_material_name, 'tile_material_id' => $value->tile_material_id, 'categories' => $categories, 'type' => $type, 'description' => $description, 'product_id' => $value->product_id, 'qty_edit' => $value->qty_edit,'rate_edit' => $value->rate_edit, 'categories_id' => $value->categories_id, 'specifications' => $value->specifications, 'profile_tab' => $profile, 'crimp_tab' => $crimp, 'checked' => $value->checked, 'dim_two' => $value->dim_two, 'dim_one' => $value->dim_one, 'dim_three' => $value->dim_three, 'image_length' => $value->image_length, 'gst' => $value->gst, 'gst_check' => $value->gst_check, 'extra_crimp' => $value->extra_crimp, 'back_crimp' => $value->back_crimp, 'proudtcion_no' => $value->proudtcion_no, 'nos_tab' => $value->nos, 'unit_tab' => $value->unit, 'return_status' => $value->return_status, 'fact_tab' => $value->fact, 'uom' => $value->uom, 'base_id' => $value->base_id, 'stock' => $stock, 'kg_price' => $kg_price, 'og_price' => $og_price, 'og_formula' => $og_formula, 'kg_formula2' => $kg_formula2, 'billing_options' => $value->billing_options, 'commission_tab' => $value->commission, 'cate_status' => $cate_status, 'categories_id_get' => $categories_id, 'Meter_to_Sqr_feet' => round($value->Meter_to_Sqr_feet, 3), 'Sqr_feet_to_Meter' => round($value->Sqr_feet_to_Meter, 3), 'rate_tab' => $value->rate, 'cul' => $value->cul, 'qty_tab' => $qty, 'amountdata_edit' => round($amountdata_edit, 2),'amount_tab' => round($amount, 2));
            $i++;
        }
        echo json_encode($array);
    }

}
