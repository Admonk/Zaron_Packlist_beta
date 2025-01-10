<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
	public function productscreate()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','id','ASC');
							            	 $data['uom'] = $this->Main_model->where_names_order_by('uom','deleteid','0','id','ASC');
							            	 $data['brand'] = $this->Main_model->where_names_order_by('brand','deleteid','0','id','ASC');
							            	 
							            	 
							            	 
							            	 $data['ys'] = $this->Main_model->where_names_order_by('ys','deleteid','0','id','ASC');
							            	 $data['color'] = $this->Main_model->where_names_order_by('color','deleteid','0','id','ASC');
							            	 $data['gsm'] = $this->Main_model->where_names_order_by('gsm','deleteid','0','id','ASC');
							            	 $data['thickness'] = $this->Main_model->where_names_order_by('thickness','deleteid','0','id','ASC');
							            	 
							            	 
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_add',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	










	public function tile()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['product_list'] = $this->Main_model->where_names_order_by('product_list','categories_id','26','id','ASC');
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Tile Calculation';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('tiles/index.php',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}







	
	public function canvas()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','id','ASC');
							            	 $data['uom'] = $this->Main_model->where_names_order_by('uom','deleteid','0','id','ASC');
							            	  $data['brand'] = $this->Main_model->where_names_order_by('brand','deleteid','0','id','ASC');
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	 $data['ys'] = $this->Main_model->where_names_order_by('ys','deleteid','0','id','ASC');
							            	 $data['color'] = $this->Main_model->where_names_order_by('color','deleteid','0','id','ASC');
							            	 $data['gsm'] = $this->Main_model->where_names_order_by('gsm','deleteid','0','id','ASC');
							            	 $data['thickness'] = $this->Main_model->where_names_order_by('thickness','deleteid','0','id','ASC');
							            	 
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
							            	  
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products Add';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/canvas',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function customer_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','id','ASC');
							            	 $data['uom'] = $this->Main_model->where_names_order_by('uom','deleteid','0','id','ASC');
							            	 $data['brand'] = $this->Main_model->where_names_order_by('brand','deleteid','0','id','ASC');
							            	 
							            	 
							            	 
							            	 
							            	 
							            	  $data['ys'] = $this->Main_model->where_names_order_by('ys','deleteid','0','id','ASC');
							            	 $data['color'] = $this->Main_model->where_names_order_by('color','deleteid','0','id','ASC');
							            	 $data['gsm'] = $this->Main_model->where_names_order_by('gsm','deleteid','0','id','ASC');
							            	 $data['thickness'] = $this->Main_model->where_names_order_by('thickness','deleteid','0','id','ASC');
							            	 
							            	 
							            	 
							            	 
                                             $data['active_base']='customer_1';
										     $data['active']   ='customer_1';
								             $data['title']    = 'Products  Edit';
								             $data['id']       = $id;
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_edit',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function products_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	public function insertandupdate()
	{

                 $form_data = json_decode(file_get_contents("php://input"));
           
                 $label1=$form_data->label1;
                 $lab_option1=$form_data->lab_option1;
               


                 if($form_data->action=='Save')
                 {
                     
                     
                     
                     
                     if($form_data->color!='')
                     {

			                         $tablename=$form_data->tablename;
			                   
    			                     $data['product_name']=$form_data->source_name.' '.$form_data->color.' '.$form_data->gsm.' '.$form_data->thickness.' '.$form_data->ys;
    			                      $data['source_name']=$form_data->source_name;
    			                     $data['price']=$form_data->price;
    			                     $data['kg_price']=$form_data->kg_price;
    			                     $data['brand']=$form_data->brand;
                                     $data['uom']=$form_data->uom;
                                     $data['formula']=$form_data->formula;
                                     $data['formula2']=$form_data->formula2;
                                     $data['HSN_SAC']=$form_data->HSN_SAC;
                                     $data['side_label']=$form_data->side_label;
                                     $data['stock']=$form_data->stock;
                                     $data['optimal_stock']=$form_data->optimal_stock;
                                     $data['type']=$form_data->type;
                                     $data['color']=$form_data->color;
                                     $data['gsm']=$form_data->gsm;
                                     $data['thickness']=$form_data->thickness;
                                     $data['ys']=$form_data->ys;
                                     
                                     
                                     
                                     if($form_data->categories=='Accesories')
                                     {
                                         $data['input_label']=1;
                                     }
                                     else
                                     {
                                         $data['input_label']=0;
                                     }
                                     
                                      $categories_id=0;
                                      $resultcat= $this->Main_model->where_names('categories','categories',$form_data->categories);
                                      foreach($resultcat as $cat)
                                      {
                                          $categories_id=$cat->id;
                                      }
                                     
                                     
                                     $data['categories']=$form_data->categories;
                                     $data['categories_id']=$categories_id;
                                     $data['status']=$form_data->status;
                                     $data['description']=$form_data->description;


                                     $data['link_to_purchase']=$form_data->link_to_purchase;

                                      $result= $this->Main_model->where_names($tablename,'product_name',$data['product_name']);
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Product already exists');
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                      	    
				                      	    $insert_id=$this->Main_model->insert_commen($data,$tablename);
				                      	    
				                      	    
				                      	    
				                      	      if($label1!="")
                                              {
                                                 
                                                 $label1=explode('|', $label1);
                                                 $label2=explode('|', $form_data->label2);
                                                 $point=explode('|', $form_data->point);

                                                 for ($i=0; $i <count($label1) ; $i++) { 
                                                     
                                                     $sizedata['product_id']=$insert_id;
                                                     $sizedata['label1']=$label1[$i];
                                                     $sizedata['label2']=$label2[$i];
                                                     $sizedata['point']=$point[$i];
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'product_size_guide');
                                            
                                                  }
                            
                                              }
                                              
                                              
                                              
                                               if($lab_option1!="")
                                              {
                                                 
                                                 $lab_option1=explode('|', $lab_option1);
                                                 $lab_option2=explode('|', $form_data->lab_option2);
                                                 

                                                 for ($i=0; $i <count($lab_option1) ; $i++) { 
                                                     
                                                     $sizedata_option['product_id']=$insert_id;
                                                     $sizedata_option['label1']=$lab_option1[$i];
                                                     $sizedata_option['label2']=$lab_option2[$i];
                                                     $this->Main_model->insert_commen($sizedata_option,'product_size_option');
                                            
                                                  }
                            
                                              }
                 
				                      	    
				                      	    
                     				                      	    
				                      	    
				                      	    $array=array('error'=>'2','insert_id'=>$insert_id,'massage'=>'Product successfully Added..');
                                            echo json_encode($array);
				                      }




			                     

                     }
                     else
                     {
                         $array=array('error'=>'1');
                         echo json_encode($array);
                     }


                 }
                 if($form_data->action=="Update")
                 {

                 	  if($form_data->price!='')
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                      
			                             $data['product_name']=$form_data->source_name.' '.$form_data->color.' '.$form_data->gsm.' '.$form_data->thickness.' '.$form_data->ys;
                                         $data['price']=$form_data->price;
                                         $data['source_name']=$form_data->source_name;
                                         $data['brand']=$form_data->brand;
                                         $data['kg_price']=$form_data->kg_price;
                                         $data['uom']=$form_data->uom;
                                         $data['formula']=$form_data->formula;
                                         $data['formula2']=$form_data->formula2;
                                         $data['HSN_SAC']=$form_data->HSN_SAC;
                                         $data['stock']=$form_data->stock;
                                         $data['optimal_stock']=$form_data->optimal_stock;
                                        
                                        
                                        
                                         $data['link_to_purchase']=$form_data->link_to_purchase;
                                        $data['type']=$form_data->type;
                                         $data['color']=$form_data->color;
                                         $data['gsm']=$form_data->gsm;
                                         $data['thickness']=$form_data->thickness;
                                         $data['ys']=$form_data->ys;
                                        
                                         if($form_data->categories=='Accesories')
                                         {
                                             $data['input_label']=1;
                                         }
                                         else
                                         {
                                             $data['input_label']=0;
                                         }
                                         
                                         
                                          $categories_id=0;
                                          $resultcat= $this->Main_model->where_names('categories','categories',$form_data->categories);
                                          foreach($resultcat as $cat)
                                          {
                                              $categories_id=$cat->id;
                                          }
                                         
                                     
                                        $data['categories']=$form_data->categories;
                                        $data['categories_id']=$categories_id;
                                        
                                        
                                        $data['status']=$form_data->status;
                                        $data['side_label']=$form_data->side_label;
                                        $data['input_label']=$form_data->input_label;
                                        $data['description']=$form_data->description;
                                        
                                        
                                              $this->Main_model->delete_where('product_size_guide','product_id',$form_data->id);
                                              if($label1!="")
                                              {
                                                
                                                 $label1=explode('|', $label1);
                                                 $label2=explode('|', $form_data->label2);
                                                 $point=explode('|', $form_data->point);

                                                 for ($i=0; $i <count($label1) ; $i++) { 
                                                     
                                                     $sizedata['product_id']=$form_data->id;
                                                     $sizedata['label1']=$label1[$i];
                                                     $sizedata['label2']=$label2[$i];
                                                     $sizedata['point']=$point[$i];
                                                    
                                                     $this->Main_model->insert_commen($sizedata,'product_size_guide');
                                            
                                                  }
                            
                                              }
                                              
                                              
                                              $this->Main_model->delete_where('product_size_option','product_id',$form_data->id);
                                              if($lab_option1!="")
                                              {
                                                 
                                                 $lab_option1=explode('|', $lab_option1);
                                                 $lab_option2=explode('|', $form_data->lab_option2);
                                                 

                                                 for ($i=0; $i <count($lab_option1) ; $i++) { 
                                                     
                                                     $sizedata_option['product_id']=$form_data->id;
                                                     $sizedata_option['label1']=$lab_option1[$i];
                                                     $sizedata_option['label2']=$lab_option2[$i];
                                                     $this->Main_model->insert_commen($sizedata_option,'product_size_option');
                                            
                                                  }
                            
                                              }
                 
                 

                                 

                 	   $this->Main_model->update_commen($data,$tablename);
                       $array=array('error'=>'2','insert_id'=>$data['get_id'],'massage'=>'Product successfully Updated..');
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
                     $tablename=$form_data->tablename;
                 	 $id=$form_data->id;
                     $this->Main_model->deleteupdate($id,$tablename);

                 }
                
                


	}
	public function fetch_data()
	{

                    
                 	 $result= $this->Main_model->where_names('product_list','deleteid','0');
                 	 foreach ($result as  $value) {
                       
                        

                 	 	if($value->status=='1')
                 	 	{
                 	 		$status='Active';
                 	 	}
                 	 	else
                 	 	{
                 	 		$status='InActive';
                 	 	}


                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $value->product_name, 
                 	 		'price' => $value->price, 
                 	 		'kg_price' => $value->kg_price, 
                 	 		'brand' => $value->brand, 
                 	 		'categories' => $value->categories,
                 	 		'uom' => $value->uom,
                 	 		'formula' => $value->formula,
                 	 		'formula2' => $value->formula2,
                 	 		'HSN_SAC' => $value->HSN_SAC, 
                 	 		'side_label' => $value->side_label,
                 	 		'description'=>$value->description,
                 	 		'input_label' => $value->input_label,
                 	 		'color' => $value->color,
                 	 		'gsm' => $value->gsm,
                 	 		'ys' => $value->ys,
                 	 		'thickness' => $value->thickness,
                 	 		'stock' => $value->stock,
                 	 		'status' => $status 

                 	 	);




                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function fetch_data_size()
	{
                     
                     $product_id=$_GET['product_id'];
                    
                 	 $result= $this->Main_model->where_names_order_by('product_size_guide','product_id',$product_id,'id','ASC');
                 	 foreach ($result as  $value) {
                       
                        

                 	 
                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_id' => $value->product_id, 
                 	 		'label1' => $value->label1, 
                 	 		'label2' => $value->label2, 
                 	 		'point' => $value->point

                 	 	);




                 	 }

                    echo json_encode($array);

	}
	
	
		public function fetch_data_size_options()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $product_id=$form_data->product_id;
                     
                     $value_id="";
                     $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                 	 foreach ($results as  $values) {
                       
                        $value_id= $values->value_id; 
                       
                 	 }
                 	 
                 	 
                 	 $dataval=explode('|', $value_id);
                 	
                 
                     
                     
                     
                     
                    
                 	 $result= $this->Main_model->where_names_order_by('product_size_option','product_id',$product_id,'id','ASC');
                 	 foreach ($result as  $value) {
                 	     
                 	     
                 	     
                 	      if (in_array($value->id, $dataval))
                          {
                             $checkstatus="1";
                          }
                          else
                          {
                             $checkstatus="0";
                          }
                                               
                        

                 	 
                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_id' => $value->product_id, 
                 	 		'label_option1' => $value->label1, 
                 	 		'label_option2' => $value->label2,
                 	 		'checkstatus'=>$checkstatus
                 	 		

                 	 	);




                 	 }

                    echo json_encode($array);

	}






	public function fetch_data_size_options_check()
	{
                     
                     
                     $product_id=$_GET['product_id'];
                     
                  
                 	
                 
                     
                     
                     
                     
                    
                 	 $result= $this->Main_model->where_names_order_by('product_size_option','product_id',$product_id,'id','ASC');
                 	 foreach ($result as  $value) {
                 	    
                 	 
                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_id' => $value->product_id, 
                 	 		'label_option1' => $value->label1, 
                 	 		'label_option2' => $value->label2
                 	 		

                 	 	);




                 	 }

                    echo json_encode($array);

	}

 		public function fetchiornproducts()
	{
                     
                    
                     $array=array();
                 	 $result= $this->Main_model->where_names_order_by('product_list','categories_id','3','id','ASC');
                 	 foreach ($result as  $value) {
                       
                        

                 	 
                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'name' => $value->product_name
                 	 		

                 	 	);




                 	 }

                    echo json_encode($array);

	}
	
	
	public function findimages()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $product_id=$form_data->product_id;
                    
                 	 $result= $this->Main_model->where_names_order_by('product_images','product_id',$product_id,'id','DESC');
                 	 foreach ($result as  $value) {
                       
                        

                 	 
                 	 	$array[] = array(

                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_image' => base_url().$value->product_image,
                 	 		'res' => ''

                 	 	);




                 	 }
                 	 
                 	 if(count($array)>0)
                 	 {
                 	     echo json_encode($array);
                 	 }
                 	 else
                 	 {
                 	      $array=array('res'=>'No Image data');
                 	      echo json_encode($array);
                 	 }
                 	 

                    

	}

    public function fetch_single_data()
    {
                      
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename;
                     $id=$form_data->id;
    	             $result= $this->Main_model->where_names($tablename,'id',$id);
                 	 foreach ($result as  $value) {

                 	  $output['id']= $value->id; 
                      $output['product_name']= $value->product_name; 
                      $output['price']= $value->price;
                      $output['kg_price']= $value->kg_price;
                      $output['brand']= $value->brand;
                      $output['categories']= $value->categories;
                      $output['uom']= $value->uom;
                      $output['formula']= $value->formula;
                      $output['formula2']= $value->formula2;
                      $output['HSN_SAC']= $value->HSN_SAC;
                      $output['description']= $value->description;
                      $output['side_label']= $value->side_label;
                      $output['input_label']= $value->input_label;
                      $output['link_to_purchase']= $value->link_to_purchase;
                      $output['gsm']= $value->gsm;
                      $output['ys']= $value->ys;
                      $output['stock']= $value->stock;
                      $output['optimal_stock']= $value->optimal_stock;
                    
                      if($value->source_name=="")
                      {
                          $output['source_name']= $value->product_name;
                      }
                      else
                      {
                          $output['source_name']= $value->source_name;
                      }
                      
                      
                      
                      $output['color']= $value->color;
                      $output['type']= $value->type;
                      $output['thickness']= $value->thickness;

                     
	                 	
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
