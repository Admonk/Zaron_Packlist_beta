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
							                
							                
                                           
							            	   $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','categories','ASC');
							            	 $data['uom'] = $this->Main_model->where_names_order_by('uom','deleteid','0','id','ASC');
							            	 $data['brand'] = $this->Main_model->where_names_order_by('brand','deleteid','0','id','ASC');
							            	 
							            	 $data['price_master'] = $this->Main_model->where_names_order_by('price_master','deleteid','0','id','ASC');
							            	 
							            	  $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							            	  
							            	  $data['additional_information'] =$this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id','0','sort_order_id','ASC');
                                              $data['additional_information1'] =$this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id!=','0','sort_order_id','ASC');
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
                                           
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
	public function product_edit($id)
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                             $data['Categories'] = $this->Main_model->where_names_order_by('categories','deleteid','0','categories','ASC');
							            	 $data['uom'] = $this->Main_model->where_names_order_by('uom','deleteid','0','id','ASC');
							            	 $data['brand'] = $this->Main_model->where_names_order_by('brand','deleteid','0','id','ASC');
							            	 $data['layout_plan'] = $this->Main_model->where_names_order_by('layout_plan','deleteid','0','id','ASC');
							            	 	 $data['price_master'] = $this->Main_model->where_names_order_by('price_master','deleteid','0','id','ASC');
							            	
							            	   $data['grouping'] = $this->Main_model->where_names_order_by('grouping','deleteid','0','id','ASC');
							            
							            
							            $product_list = $this->Main_model->where_names_order_by('product_list','id',$id,'id','ASC');
							            
							            foreach($product_list as $vl)
							            {
							                $categories_id=$vl->categories_id;
							            }
							            
							            $data['additional_information'] =$this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id','0','sort_order_id','ASC');
                                             
                                             
                                             
                                              $data['additional_information2'] =$this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id!=','0','sort_order_id','ASC');
                                           
                                             
                                              $data['additional_information1'] =$this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$categories_id,'sort_order_id','ASC');
                                           
                                           
                                           
							            	 
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
                     
                     
                     
                     
                      if($form_data->categories!='')
                     {

			                         $tablename=$form_data->tablename;
			                   
    			                     
    			                     
    			                     
    			                     
    			                      
    			                      
    			                     
    			                      
    			                      
    			                      
    			                    
    			                     
    			                     
    			                     
    			                     
    			                     $data['brand']=$form_data->brand;
    			                     $data['uom']=$form_data->uom;
                                   
                                     $data['formula']=$form_data->formula;
                                     $data['formula2']=$form_data->formula2;
                                     $data['HSN_SAC']=$form_data->HSN_SAC;
                                     $data['side_label']=$form_data->side_label;
                                     $data['stock']=$form_data->stock;
                                     $data['optimal_stock']=$form_data->optimal_stock;
                                     $data['type']=$form_data->type;
                                 
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     $price_type=$form_data->price_type;
                                     $fullprice=$form_data->price;
                                     $price_type=explode('|', $price_type);
                                     $fullprice=explode('|', $fullprice);
                                     
                                      for ($j=0; $j <count($price_type) ; $j++) { 
                                          
                                          
                                          if($price_type[$j]=='1')
                                          {
                                               $data['price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='2')
                                          {
                                               $data['conversion_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='3')
                                          {
                                               $data['retail_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='4')
                                          {
                                               $data['coil_sale_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='5')
                                          {
                                               $data['kg_price']=$fullprice[$j];
                                          }
                                          
                                      }
                                     
                                      
                                     $additional_information = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id','0','sort_order_id','ASC');
                                           
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $data[$label_name]= $form_data->$label_name; 
                                     }
                                     
                                     
                                     
                                
                                     
                                     
                                     
                                     
                                     
                                  
                                     
                                     
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
                                      
                                      
                                     $additional_information1 = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$categories_id,'sort_order_id','ASC');
                                     $dataval=array();     
                                     foreach($additional_information1 as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            
                                            $dataval[]=$form_data->$label_name;
                                            
                                            $data[$label_name]= $form_data->$label_name; 
                                           
                                          
                                     }
                                     
                                     
                                     $data['product_name']=implode(' ',$dataval);
                                     $data['source_name']=implode(' ',$dataval);
    			                           
                                   
                                     
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

                 	  if($form_data->categories!='')
                     {

                       $tablename=$form_data->tablename;
                       $data['get_id']=$form_data->id;
                      
                                          
                                           
                                         
                      
			                            
                                         $data['source_name']=$form_data->source_name;
                                        
                                        
                                         $data['uom']=$form_data->uom;
                                         $data['formula']=$form_data->formula;
                                         $data['formula2']=$form_data->formula2;
                                         $data['HSN_SAC']=$form_data->HSN_SAC;
                                         $data['stock']=$form_data->stock;
                                         $data['optimal_stock']=$form_data->optimal_stock;
                                        
                                        
                                        
                                         $data['link_to_purchase']=$form_data->link_to_purchase;
                                         $data['type']=$form_data->type;
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                     $price_type=$form_data->price_type;
                                     $fullprice=$form_data->price;
                                     $price_type=explode('|', $price_type);
                                     $fullprice=explode('|', $fullprice);
                                     
                                      for ($j=0; $j <count($price_type) ; $j++) { 
                                          
                                          
                                          if($price_type[$j]=='1')
                                          {
                                               $data['price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='2')
                                          {
                                               $data['conversion_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='3')
                                          {
                                               $data['retail_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='4')
                                          {
                                               $data['coil_sale_price']=$fullprice[$j];
                                          }
                                          
                                           if($price_type[$j]=='5')
                                          {
                                               $data['kg_price']=$fullprice[$j];
                                          }
                                          
                                      }
                                         
                                         
                                         
                                          
                                         $additional_information = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id','0','sort_order_id','ASC');
                                           
                                         foreach($additional_information as $vl)
                                         {
                                                $label_name=strtolower($vl->label_name);
                                                $data[$label_name]= $form_data->$label_name; 
                                         }
                                         
                                         
                                            
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
                                          
                                          
                                              $additional_information1 = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$categories_id,'sort_order_id','ASC');
                                             $dataval=array();     
                                             foreach($additional_information1 as $vl)
                                             {
                                                    $label_name=strtolower($vl->label_name);
                                                    
                                                    $dataval[]=$form_data->$label_name;
                                                    
                                                    $data[$label_name]= $form_data->$label_name; 
                                                   
                                                  
                                             }
                                     
                                     
                                     $data['product_name']=implode(' ',$dataval);
                                   
    			                           
                                         
                                     
                                        $data['categories']=$form_data->categories;
                                        $data['categories_id']=$categories_id;
                                        
                                        
                                        $data['status']=$form_data->status;
                                        $data['side_label']=$form_data->side_label;
                                        $data['input_label']=$form_data->input_label;
                                        $data['description']=$form_data->description;
                                        
                                        
                                              //$this->Main_model->delete_where('product_size_guide','product_id',$form_data->id);
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
                                              
                                              
                                              //$this->Main_model->delete_where('product_size_option','product_id',$form_data->id);
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
                
                if($form_data->action=='updatelayputplan')
                 {
                       $tablename=$form_data->tablename;
                 	   $id=$form_data->id;
                 	   $data['get_id']=$id;
                 	   $data['image_layout_plan']=$form_data->layout_plan;
                 	   $data['length']=$form_data->lengthvalset;
                       $this->Main_model->update_commen($data,$tablename);

                 }
                


	}
	public function fetch_data()
	{

                     $i=1;
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
                               
                               
                               'no' => $i, 
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
                 	 		'gst' => $value->gst,
                 	 		'thickness' => $value->thickness,
                 	 		'stock' => round($value->stock,3),
                 	 		'status' => $status 

                 	 	);



$i++;
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
                     $base_pass_id=$form_data->base_id;
                     $click=$form_data->click;
                    
                    
                     
                     if($click==1)
                     {
                          $base_id=$base_pass_id;
                          $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                          foreach ($results as  $values) {
                                   
                                    $value_id= $values->value_id; 
                                    $profile= $values->profile; 
                                    $image_length= $values->image_length; 
                                    $base_id= $values->base_id;
                                    $qty= $values->qty; 
                          }
                     }
                     else
                     {
                         
                          $base_id=="1";
                          $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                          foreach ($results as  $values) {
                                   
                                    $value_id= $values->value_id; 
                                    $profile= $values->profile; 
                                    $image_length= $values->image_length; 
                                    $base_id= $values->base_id;
                                    $qty= $values->qty; 
                          }
                         
                     }
                         	 
                    
                   
                     
                     
                    
                     
                     
                     $array=array();
                     $valuess=0;
                 	 $result= $this->Main_model->where_names_order_by('layout_plan','id',$base_id,'id','ASC');
                 	 foreach ($result as  $value) {
                 	     
                       
                 	 
                 	 	  $valuess= $value->values;
                          $valuess=explode(',', $valuess);
                          for($i=0;$i<count($valuess);$i++)
                          {   
                              $checkstatus=0;
                              if($value_id==$valuess[$i])
                              {
                                  $checkstatus=1;
                              }
                              
                              $array[]=array('id'=>$valuess[$i],'base_id'=>$value->id,'profilevalsize'=>$image_length,'calculation'=>round($image_length/$valuess[$i],2),'checkstatus'=>$checkstatus);
                          }

                 	 }
                 	 

                    echo json_encode($array);

	}











     public function fetchDataBaseSize()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $length=$form_data->length;
                    
                    
                     $array=array();
                   
                     
                     
                     $lengthdata=0;
                     $max=100;
                     if((0 < $length) && ($length <= 100))
                     {
                         $lengthdata=1;
                         $max=100;
                     }
                     
                     if((100 < $length) && ($length <= 200))
                     {
                         $lengthdata=101;
                         $max=200;
                     }
                     
                     if((200 < $length) && ($length <= 300))
                     {
                         $lengthdata=201;
                         $max=300;
                     }
                     
                     if((400 < $length) && ($length <= 500))
                     {
                         $lengthdata=401;
                         $max=500;
                     }
                     
                     
                     if((500 < $length) && ($length <= 600))
                     {
                         $lengthdata=501;
                         $max=600;
                     }
                     
                     
                      if((600 < $length) && ($length <= 700))
                     {
                         $lengthdata=601;
                         $max=700;
                     }
                     
                      if((700 < $length) && ($length <= 800))
                     {
                         $lengthdata=701;
                         $max=800;
                     }
                     
                     if((800 < $length) && ($length <= 900))
                     {
                         $lengthdata=801;
                         $max=900;
                     }
                     
                     
                     
                 	 $resultmain=$this->db->query("SELECT * FROM `layout_plan` WHERE `feet` BETWEEN '".$lengthdata."' AND '".$max."' AND deleteid=0 ORDER BY `id` ASC");
                     $result1=$resultmain->result(); 
                     
                    
                     
                 	 foreach ($result1 as  $value) {
                 	     
                 	     
                 	     
                           
                             

                            
                         	   $array[] = array(
        
                         	 		'id' => $value->id, 
                         	 		'name' => $value->name, 
                         	 	    'values' => $value->values, 
                         	 		
        
                         	 	);


                 	 }
                 	 
                    echo json_encode($array);
                    
                    

	}










           	public function fetch_data_size_options_input()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $image_length=$form_data->length;
                     $base_no= explode(',',$form_data->base_no);
                  
                    
                    
                         $base_id=$base_pass_id;
                          $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                          foreach ($results as  $values) {
                                    
                                    if($values->image_length!=0)
                                    {
                                        $image_length= $values->image_length; 
                                    }
                                    
                                    
                                    $value_id= $values->value_id; 
                                    $profile= $values->profile; 
                                    $qty= $values->qty; 
                          }	 
                    
                   
                     
                     
                    
                     
                     
                          $array=array();
                          for($i=0;$i<count($base_no);$i++)
                          {   
                              
                              $checkstatus=0;
                              if($value_id==$base_no[$i])
                              {
                                  $checkstatus=1;
                              }
                              $array[]=array('id'=>$base_no[$i],'profilevalsize'=>$image_length,'calculation'=>round($image_length/$base_no[$i],2),'checkstatus'=>$checkstatus,'base_id'=>$base_no[$i]);
                         
                         
                              
                          }

                          echo json_encode($array);

	}











     	public function fetch_data_base()
	{
                     
                     
                   
                    
                     $valuess=0;
                     $array=array();
                 	 $result= $this->Main_model->where_names_order_by('layout_plan','deleteid',0,'id','ASC');
                 	 foreach ($result as  $value) {
                 	     
                       
                 	 
                 	 	 $array[]=array('base_id'=>$value->id,'name'=>$value->name);

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
                     $array=array();
                     
                     $product_id=$form_data->product_id;
                     
                 	 $result= $this->Main_model->where_names_order_by('product_images','product_id',$product_id,'id','DESC');
                 	 foreach ($result as  $value) {
                       
                        
                    
                     if($value->deleteid=='0')
                     {
                              
                              $valuseset="";
                              $layout_plan = $this->Main_model->where_names_order_by('layout_plan','id',$value->image_layout_plan,'id','ASC');
                              foreach($layout_plan as $vv)
                              {
                                 $valuseset=$vv->name.' | '.$vv->values;
                              }
							            	 
                                 
                                 
                              if($value->image_layout_plan=='')
                              {
                                  $value->image_layout_plan=0;
                              }
                              
                               if($value->length=='')
                              {
                                  $value->length="";
                                  $length='';
                              }
                              else
                              {
                                  $length='Length :'.$value->length;
                              }
                 	 
                     	    	$array[] = array(
    
                     	 		'id' => $value->id, 
                     	 		'image_layout_plan' => $value->image_layout_plan,
                     	 		'valuseset' => $valuseset,
                     	 		'length' => $value->length,
                     	 		'lengthlab'=>$length,
                     	 		'product_image' => base_url().$value->product_image,
                     	 		'res' => ''
    
                     	    	);
                 	 	
                 	 	
                 	 	
                      }



                 	 }
                 	 
                 	 if(count($array)>0)
                 	 {
                 	     echo json_encode($array);
                 	 }
                 	 else
                 	 {
                 	      $array=array();
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
                      
                       $output['conversion_price']= $value->conversion_price;
                       $output['retail_price']= $value->retail_price;
                       $output['coil_sale_price']= $value->coil_sale_price;
                         
                      
                    
                      $output['categories_id']= $value->categories_id;
                      $output['categories']= $value->categories;
                      $output['uom']= $value->uom;
                      $output['formula']= $value->formula;
                      $output['formula2']= $value->formula2;
                      $output['HSN_SAC']= $value->HSN_SAC;
                      $output['description']= $value->description;
                      $output['side_label']= $value->side_label;
                      $output['input_label']= $value->input_label;
                      $output['link_to_purchase']= $value->link_to_purchase;
                      
                      
                      
                      
                     
                      
                      
                      $output['stock']= $value->stock;
                      $output['optimal_stock']= $value->optimal_stock;
                                      
                                      
                                      
                                     $additional_information = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id','0','sort_order_id','ASC');
                                           
                                     foreach($additional_information as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $output[$label_name]= $value->$label_name; 
                                     }
                                         
                                         
                                         
                                     $additional_information1 = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$value->categories_id,'sort_order_id','ASC');
                                                   
                                     foreach($additional_information1 as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            $output[$label_name]= $value->$label_name; 
                                     }
                      
                    
                      if($value->source_name=="")
                      {
                          $output['source_name']= $value->product_name;
                      }
                      else
                      {
                          $output['source_name']= $value->source_name;
                      }
                      
                      $output['source_name_full']= $output['product_name'];
                      
                      
                     
                      
                      
                      $output['type']= $value->type;
                      

                     
	                 	
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
    
    	public function fileuplaodimgsave()
    {



        
        if(!empty($_FILES))  
        { 
            
           

            $path=array();
            for ($i=0; $i <count($_FILES['file']) ; $i++) { 

                   if($_FILES['file']['name'][$i]!='')
                   {

                         $ticket_id=$_GET['id'];
                         $layout_plan=$_GET['layout_plan'];
                         $lengthval=$_GET['lengthval'];
                      

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  

                            

                            $this->db->query("INSERT INTO product_images  (`product_id`,`product_image`,`image_layout_plan`,`length`)VALUES('".$ticket_id."','".$path."','".$layout_plan."','".$lengthval."')");

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
