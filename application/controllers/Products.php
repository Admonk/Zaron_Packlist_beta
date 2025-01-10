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
							            	
							            	
                                    		 $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 GROUP BY name ORDER BY `layout_plan`.`id` DESC");
                                             $data['layout_plan'] = $resultmain->result();
							            	 
							            	 
							            	 
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
	
	
	
	
	
	
	
	
	
		public function products_purchase_price_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products Purchase Price List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_purchase_price_list',$data);
										
										
										}
										else
										{
										     $this->load->view('admin/index');
										}
	     

	}
	
		public function products_selling_price_list()
	{
        
		                              


									    if(isset($this->session->userdata['logged_in']))
							            {
							                
							                
                                           
							            	 $data['user_group'] = $this->Main_model->where_names('user_group','deleteid','0');
                                             $data['active_base']='customer_1';
										     $data['active']='customer_1';
								             $data['title']    = 'Products Purchase Price List';
								             $data['top_nav']  = $this->load->view('commen/top_nav', $data, TRUE);
								             $data['side_nav'] = $this->load->view('commen/side_nav', $data, TRUE);
								             $data['footer_copy_rights'] = $this->load->view('commen/footer_copy_rights', $data, TRUE);
									         $this->load->view('products/products_selling_price_list',$data);
										
										
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
                                     
                                     $data['purchase_name']=$form_data->purchase_name;
                                     $data['specification']=$form_data->specification;
                                     
                                     $data['optimal_stock']=$form_data->optimal_stock;
                                     
                                     $data['production_stock']=$form_data->production_stock;
                                     $data['min_order_stock']=$form_data->min_order_stock;
                                       
                                     $data['type']=$form_data->type;
                                 
                                      $data['create_by']=$this->userid;
                                     
                                     
                                     
                                     
                                     
                                     
                                     
                                     
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
                                      $categories_name=0;
                                      $resultcat= $this->Main_model->where_names('categories','id',$form_data->categories);
                                      foreach($resultcat as $cat)
                                      {
                                          $categories_id=$cat->id;
                                          $categories_name=$cat->categories;
                                      }
                                      
                                      
                                     $additional_information1 = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$categories_id,'sort_order_id','ASC');
                                     $dataval=array();     
                                     foreach($additional_information1 as $vl)
                                     {
                                            $label_name=strtolower($vl->label_name);
                                            
                                                   if($label_name=='categorie_type')
                                                    {
                                                        if($form_data->$label_name=='Accessories')
                                                        {
                                                            $dataval[]= 'ACC ';
                                                        }
                                                        else
                                                        {
                                                             $dataval[]=$form_data->$label_name;
                                                        }
                                                    }
                                                    else
                                                    {
                                                             $dataval[]=$form_data->$label_name;
                                                    }
                                            
                                                    $data[$label_name]= $form_data->$label_name; 
                                            
                                            
                                          
                                     }
                                     
                                     
                                     $data['product_name']=implode(' ',$dataval);
                                     $data['source_name']=implode(' ',$dataval);
    			                           
                                   
                                     
                                     $data['categories']=$categories_name;
                                     $data['categories_id']=$categories_id;
                                     $data['status']=$form_data->status;
                                     $data['description']=$form_data->description;


                                     $data['link_to_purchase']=$form_data->link_to_purchase;
                                     $result= $this->Main_model->where_names_two_order_by($tablename, 'product_name', $data['product_name'], 'deleteid', '0', 'id', 'ASC');
                                      
				                      if(count($result)>0)
				                      {

				                        	 $array=array('error'=>'3','massage'=>'Product Name already exists '.$data['product_name']);
                                             echo json_encode($array);

				                      }
				                      else
				                      {
				                      	    
				                      	    $insert_id=$this->Main_model->insert_commen($data,$tablename);
				                      	    
				                      	    
				                      	     $this->db->query("DELETE FROM product_size_guide  WHERE product_id='" . $insert_id . "'");
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
                                              
                                               
                                              $this->db->query("DELETE FROM product_size_option  WHERE product_id='" . $insert_id . "'");
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
                                         $data['purchase_price']=$form_data->purchase_price;
                                          $data['update_by']=$this->userid;
                                         
                                         
                                         
                                         
                                         
                                         
                                         $average_price_finale=0;
                                         if($data['purchase_price']>0)
                                         {
                                             
                                         
                                         
                                         
                                                $purchase_price=0;
		                                      $resultcat= $this->Main_model->where_names('product_list','id',$form_data->id);
		                                      foreach($resultcat as $cat)
		                                      {
		                                          
		                                          $purchase_price=$cat->purchase_price;
		                                      }
                                         
                                                 $purchase_data['product_id']=$form_data->id;
                                                 $purchase_data['purchase_price']=$purchase_price;
                                                 $purchase_data['create_date']=date('Y-m-d');
                                                 $this->Main_model->insert_commen($purchase_data,'purchase_price');
                                                 
                                                 
                                                 
                                                 $average_price=0;
                                                 $resultmain = $this->db->query("SELECT * FROM `purchase_price` WHERE deleteid=0 AND product_id='".$form_data->id."'");
                                                 $layout_planselete = $resultmain->result();
                                                 $diviedcount=count($layout_planselete);
                                                 foreach($layout_planselete as $vl)
                                                 {
                                                     $average_price+=$vl->purchase_price;
                                                 }
                                                 
                                                 $average_price_finale=round($average_price/$diviedcount);
                                         
                                         
                                         }
                                         $data['average_price']=$average_price_finale;
                                         
                                         
                                         
                                         
                                      
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                        
                                        
                                         $data['uom']=$form_data->uom;
                                         $data['formula']=$form_data->formula;
                                         $data['formula2']=$form_data->formula2;
                                         $data['HSN_SAC']=$form_data->HSN_SAC;
                                         $data['stock']=$form_data->stock;
                                         $data['optimal_stock']=$form_data->optimal_stock;
                                        
                                         $data['production_stock']=$form_data->production_stock;
                                         $data['min_order_stock']=$form_data->min_order_stock;
                                        
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
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                      
                                         $selling_average_price_finale=0;
                                         if($data['price']>0)
                                         {
                                             
                                         
                                         
                                         
                                                $price=0;
		                                      $resultcat= $this->Main_model->where_names('product_list','id',$form_data->id);
		                                      foreach($resultcat as $cat)
		                                      {
		                                          
		                                          $price=$cat->price;
		                                      }
		                                         
                                                 $sell_data['product_id']=$form_data->id;
                                                 $sell_data['purchase_price']=$price;
                                                 $sell_data['create_date']=date('Y-m-d');
                                                 $this->Main_model->insert_commen($sell_data,'selling_price');
                                                 
                                                 
                                                 
                                                 $average_price=0;
                                                 $resultmain = $this->db->query("SELECT * FROM `selling_price` WHERE deleteid=0 AND product_id='".$form_data->id."'");
                                                 $layout_planselete = $resultmain->result();
                                                 $diviedcount=count($layout_planselete);
                                                 foreach($layout_planselete as $vl)
                                                 {
                                                     $average_price+=$vl->purchase_price;
                                                 }
                                                 
                                                 $selling_average_price_finale=round($average_price/$diviedcount);
                                         
                                         
                                         }
                                         
                                         $data['selling_average_price']=$selling_average_price_finale;
                                         
                                         
                                         
                                         
                                          
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
                                      $categories_name=0;
                                      $resultcat= $this->Main_model->where_names('categories','id',$form_data->categories);
                                      foreach($resultcat as $cat)
                                      {
                                          $categories_id=$cat->id;
                                          $categories_name=$cat->categories;
                                      }
                                          
                                          
                                              $additional_information1 = $this->Main_model->where_names_three_order_by_new('additional_information','grouping','1','deleteid','0','category_id=',$categories_id,'sort_order_id','ASC');
                                             $dataval=array();     
                                             foreach($additional_information1 as $vl)
                                             {
                                                    $label_name=strtolower($vl->label_name);
                                                    
                                                    if($label_name=='categorie_type')
                                                    {
                                                        if($form_data->$label_name=='Accessories')
                                                        {
                                                            $dataval[]= 'ACC ';
                                                        }
                                                        else
                                                        {
                                                             $dataval[]=$form_data->$label_name;
                                                        }
                                                    }
                                                    else
                                                    {
                                                             $dataval[]=$form_data->$label_name;
                                                    }
                                                    
                                                   
                                                    
                                                    $data[$label_name]= $form_data->$label_name; 
                                                    
                                                  
                                             }
                                     
                                     
                                      if(empty($dataval))
                                      {
                                            $data['product_name']=$form_data->source_name;
                                      }
                                      else
                                      {
                                          
                                          
                                            $dataval_values=implode(' ',$dataval);
                                            if(ctype_space($dataval_values))
                                            {
                                                 $data['product_name']=$form_data->source_name;
                                               
                                            }
                                            else
                                            {
                                                $data['product_name']=implode(' ',$dataval);
                                            }
                                          
                                      }
                                     
                                     
                                        
                                        
                                 
                                     
                                        $data['categories']=$categories_name;
                                        $data['categories_id']=$categories_id;
                                        
                                        
                                        $data['status']=$form_data->status;
                                        $data['side_label']=$form_data->side_label;
                                        $data['input_label']=$form_data->input_label;
                                        $data['description']=$form_data->description;
                                        
                                        
                                              //$this->Main_model->delete_where('product_size_guide','product_id',$form_data->id);
                                              $this->db->query("DELETE FROM product_size_guide  WHERE product_id='" . $form_data->id . "'");
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
                                              
                                              
                                             $this->db->query("DELETE FROM product_size_option  WHERE product_id='" . $form_data->id . "'");
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
                 
                 
                       
                   
		             $resultcat= $this->Main_model->where_names('product_list','id',$form_data->id);
		               
                 	   $this->Main_model->update_commen($data,$tablename);

                        $datas_log['user_id']= $this->userid; 
                        $datas_log['product_id']= $form_data->id;
                        $datas_log['data_fetch']= json_encode($resultcat);   
                        $this->Main_model->insert_commen($datas_log,'product_edit_log');

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
                     
                     
                                       $username="";
                                       $resultvent= $this->Main_model->where_names('admin_users','id',$this->userid);
                                       foreach ($resultvent as  $valuess) {
                                          $username= $valuess->name; 
                                        }
                     
                     if($tablename=='all_ledgers')
                     {
                             $result= $this->Main_model->where_names($tablename,'id',$id);
                         	 foreach ($result as  $value)
                         	 {
                         	     
                         	    $deleteval= $value->deletemod;
                         	    $order_id= $value->order_id;
                         	    $party_type= $value->party_type;
                         	    
                         	    $this->db->query("UPDATE $tablename SET deleteid='1',deleted_by='".$this->userid."' WHERE id='".$id."'");
                         	    
                         	    if($party_type==1)
                         	    {
                         	        if($order_id>0)
                         	        {
                         	            
                         	              $val='ledger deleted '.$username;
                         	       //$this->db->query("UPDATE orders_process SET deleteid='1',reason='".$val."'  WHERE id='".$order_id."' AND finance_status IN('2','3')");
                         	        
                         	        
                         	        }
                         	        
                         	    }
                         	    
                         	    
                         	    if($deleteval!='')
                         	    {
                         	         if($deleteval!='0')
                         	         {
                         	    
                               $this->db->query("UPDATE $tablename SET deleteid='1',deleted_by='".$this->userid."' WHERE deletemod='".$deleteval."'");
                                 	    
                                 	    
                              $this->db->query("UPDATE bankaccount_manage SET deleteid='1',deleted_by='".$this->userid."' WHERE deletemod='".$deleteval."'");
                                 	    
                                 	    
                                 	    
                                 	    
                         	         }
                                 	    
                         	    }
                         	    
                         	    $deletelog['userid']=$this->userid; 
                         	    $deletelog['all_legers']=$id;
                         	    $deletelog['bank_legers']=$deleteval;
                         	    $this->Main_model->insert_commen($deletelog,'deleted_log');
                         	   
                         	}
                     }
                     else
                     {
                     	         $datas_log['user_id']= $this->userid; 
		                        $datas_log['product_id']= $form_data->id;
		                        $datas_log['data_fetch']= 'Product Deleted';   
		                        $this->Main_model->insert_commen($datas_log,'product_edit_log');
                     }
                     

                 }
                if($form_data->action=='updatepurcahsename')
                {
                        $tablename=$form_data->tablename;
                        $id=$form_data->id;
                 	    $data['get_id']=$id;
                 	    $data['purchase_name']=$form_data->purchase_name;
                 	    $data['specification']=$form_data->specification;
                        $this->Main_model->update_commen($data,$tablename);
                       

                 }
                 if($form_data->action=='DeleteRevart')
                {
                    
                    
                         $username="";
                         $resultvent= $this->Main_model->where_names('admin_users','id',$this->userid);
                         foreach ($resultvent as  $valuess) {
                                          $username= $valuess->name; 
                          }
                        $tablename=$form_data->tablename;
                        $id=$form_data->id;
                 	    $data['get_id']=$id;
                 	    $data['deleteid']=0;
                 	    $data['edited_by']=$this->userid;
                 	    $data['notes']='ledger reverse '.$username;
                 	    $this->Main_model->update_commen($data,$tablename);
                 	    
                 	         $result= $this->Main_model->where_names($tablename,'id',$id);
                         	 foreach ($result as  $value)
                         	 {
                         	     
                         	    $deleteval= $value->deletemod;
                         	    $order_id= $value->order_id;
                         	    $party_type= $value->party_type;
                         	    if($party_type==1)
                         	    {
                         	        if($order_id>0)
                         	        {
                         	            
                         	              $val='ledger reverse '.$username;
                         	              $this->db->query("UPDATE orders_process SET deleteid='0',reason='".$val."'  WHERE id='".$order_id."' AND finance_status IN('2','3')");
                         	        
                         	        
                         	        }
                         	        
                         	    }
                         	    
                         	     if($deleteval!='')
                         	    {


                         	         if($deleteval!='0')
                         	         {
                         	    
                               $this->db->query("UPDATE $tablename SET deleteid='0',edited_by='".$this->userid."',deleted_by=0 WHERE deletemod='".$deleteval."'");
                                 	    
                                 	    
                             $this->db->query("UPDATE bankaccount_manage SET deleteid='0',edited_by='".$this->userid."',deleted_by=0 WHERE deletemod='".$deleteval."'");
                                 	    
                                 	    
                                 	    
                                 	    
                         	         }

                         	         
                                 	    
                         	    }
                         	    
                         	    
                         	    
                         	 }
                       

                 }
                 
                 if($form_data->action=='updatestock')
                {
                      
                      $id=$form_data->id;
                        $result= $this->Main_model->where_names('product_list','id',$id);
                 	    foreach ($result as  $value) {
                 	     
                 	        $datas['product_id']=$id;
                 	        $datas['userid']=$this->userid; 
                     	    $datas['stock']=$value->stock;
                     	    $datas['optimal_stock']=$value->optimal_stock;
                     	    $datas['production_stock']=$value->production_stock;
                     	    $datas['weight']=$value->weight;
                 	        $this->Main_model->insert_commen($datas,'stock_update_history');
				                      	    
                 	     
                 	    }
                    
                        $tablename=$form_data->tablename;
                        
                 	    $data['get_id']=$id;
                 	    $data['stock']=$form_data->actual_stock;
                 	    $data['optimal_stock']=$form_data->stock_on_hold;
                 	    $data['production_stock']=$form_data->stock_production;
                 	    $data['weight']=$form_data->weight;
                        $this->Main_model->update_commen($data,$tablename);
                        
                        	
                       

                 }
                 
                 
                 
                 
                 if($form_data->action=='updatelayputplan')
                 {
                         $tablename=$form_data->tablename;
                         $tablename_sub=$form_data->tablename_sub;
                        
                         $layout_plan_id=0;
                         $resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 AND name='".$form_data->layout_plan."' AND `rangeform` <= ".$form_data->lengthvalset." AND `rangeto` >=".$form_data->lengthvalset."  ORDER BY `layout_plan`.`id` DESC");



  //$resultmain = $this->db->query("SELECT * FROM `layout_plan` WHERE deleteid=0 AND name='".$form_data->layout_plan."'   ORDER BY `layout_plan`.`id` DESC");



                         $layout_planselete = $resultmain->result();
                         foreach($layout_planselete as $vl)
                         {
                             $layout_plan_id=$vl->id;
                         }
                       
                       
                 	    $id=$form_data->id;
                 	    $data['get_id']=$id;
                 	    $data['image_layout_plan']=$layout_plan_id;
                 	    $data['length']=$form_data->lengthvalset;
                        $this->Main_model->update_commen($data,$tablename);
                       
                       
                       
                        $point['get_id']=$form_data->order_product_id;
                        $point['get_id']=$form_data->order_product_id;
                        $point['image_length']=$form_data->lengthvalset;
                        $point['base_id']=$layout_plan_id;
                        $this->Main_model->update_commen($point,$tablename_sub);

                 }
                 
                 
                  if($form_data->action=='base_name_change')
                 {
                     
                        $tablename=$form_data->tablename;
                        $id=$form_data->id;
                 	    $data['get_id']=$id;
                 	    $data['image_layout_plan']=$form_data->layout_plan;
                 	    $data['length']=0;
                 	    $data['view_base']=$form_data->view_base;
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
                          
                          $create_by="";
                          $resultvent= $this->Main_model->where_names('admin_users','id',$value->create_by);
                          foreach ($resultvent as  $valuess) {
                                           $create_by= $valuess->name; 
                           }

                           $update_by="";
                           $resultvent= $this->Main_model->where_names('admin_users','id',$value->update_by);
                           foreach ($resultvent as  $valuess) {
                                            $update_by= $valuess->name; 
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
                 	 		'weight' => $value->weight,
                 	 		'thickness' => $value->thickness,
                 	 		'stock' => round($value->stock,2),
                 	 		'optimal_stock' => round($value->optimal_stock,2),
                 	 		'production_stock' => round($value->production_stock,2),
                 	 		'min_order_stock' => round($value->min_order_stock,2),
                 	 		  'create_by' => $create_by,
                            'update_by' =>$update_by,
                 	 		'status' => $status 

                 	 	);



$i++;
                 	 }

                    echo json_encode($array);

	}
	
	
	
	
	
	
		public function fetch_data_purchase()
	{

                     $i=1;
                     
                     $product_id=$_GET['product_id'];
                 	 
                 	 $result=$this->db->query("SELECT b.*,a.product_name FROM product_list as a JOIN purchase_price as b ON a.id=b.product_id WHERE b.product_id='".$product_id."' AND b.deleteid=0 ORDER BY b.id DESC");
                     $result=$result->result(); 
                     
                 
                 	 foreach ($result as  $value) {
                       
                        
                 	 	$array[] = array(
                               
                               
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $value->product_name, 
                 	 		'purchase_price' => $value->purchase_price, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                 	 		

                 	 	);


                          $i++;
                 	 }

                    echo json_encode($array);

	}
	
	
	
		public function fetch_data_selling()
	{

                     $i=1;
                     
                     $product_id=$_GET['product_id'];
                 	 
                 	 $result=$this->db->query("SELECT b.*,a.product_name FROM product_list as a JOIN selling_price as b ON a.id=b.product_id WHERE b.product_id='".$product_id."' AND b.deleteid=0 ORDER BY b.id DESC");
                     $result=$result->result(); 
                     
                 
                 	 foreach ($result as  $value) {
                       
                        
                 	 	$array[] = array(
                               
                               
                            'no' => $i, 
                 	 		'id' => $value->id, 
                 	 		
                 	 		'product_name' => $value->product_name, 
                 	 		'purchase_price' => $value->purchase_price, 
                 	 		'create_date' => date('d-m-Y',strtotime($value->create_date)), 
                 	 		

                 	 	);


                          $i++;
                 	 }

                    echo json_encode($array);

	}
	
	
	public function fetch_data_size()
	{
                     
                     $product_id=$_GET['product_id'];
                     $array=array();
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
                              
                                  if($valuess[$i]<=$image_length)
                                  {
                                  
                                      
                                      $checkstatus=0;
                                      if($value_id==$valuess[$i])
                                      {
                                          $checkstatus=1;
                                      }
                                      
                                      $array[]=array('id'=>$valuess[$i],'base_id'=>$value->id,'profilevalsize'=>$image_length,'calculation'=>round($image_length/$valuess[$i],2),'checkstatus'=>$checkstatus);
                                  
                                  
                                  }
                                  
                              }

                 	 }
                 	 

                    echo json_encode($array);

	}







	public function fetch_data_size_options_org()
	{
                     
                     
                      $form_data = json_decode(file_get_contents("php://input"));
                     
                     
                     
                    
                     
                 
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $product_id=$form_data->product_id;
                     $base_pass_id=$form_data->base_id;
                     $click=$form_data->click;

                     $nopcs=2;
                     if(isset($form_data->nopcs))
                     {

                     	if($form_data->nopcs>0)
                        {
                     	    $nopcs=$form_data->nopcs;
                        }
                        

                     }
                     


                  
                     $nopcs = intval($nopcs);



                    
                    
                     
                   
                          $base_id=$base_pass_id;
                          $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                          foreach ($results as  $values) {
                                   
                                    $value_id= $values->value_id; 
                                    $profile= $values->profile; 
                                    $image_length= $values->image_length; 
                                    $base_id= $values->base_id;
                                    $qty= $values->qty;
                                    $uom= $values->uom; 
                          }
                    



                    if($uom==3) // FEET
                    {
                         $min=25;
                         $count=25;
                    } 


                    if($uom==4) // MM
                    {
                    	 $min=7620;
                         $count=25;
                    } 



                    if($uom==5) // MTR 
                    {
                    	 $min=7.62;
                    	 $count=25;

                    } 


                    if($uom==6) // INCH
                    {
                    	$min=300;
                    	$count=25;
                    } 
                         	 
                    
                     //$min=25;
                     //$image_length=1100000;
                     //$nopcs=2;
                 	 $limit=round($image_length/$nopcs);
                     
                     $array=array();
                   
                       
                 	          

                              for($i=0;$i<$limit; $i += $nopcs)
                              {  
                              
                                
                                      
                                     $checkstatus=0;
                                      
                                     if($i>0)
                                     {

                                        $valueset=round($image_length/$i,4);

                                        if($min>=$valueset)
                                        {

                                        	

                                        $array[]=array('id'=>$i,'base_id'=>$base_id,'profilevalsize'=>$image_length,'calculation'=>$valueset,'checkstatus'=>$checkstatus);

                                              if($i==100000)
											  {
											  
											  break;
											  
											  }


                                        }



                                     }                                  
                                  
                                  
                                  
                              }


                 

                    echo json_encode($array);

	}








	public function getsizenumbers()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $tablename=$form_data->tablename_sub;
                     $product_order_id=$form_data->order_product_id;
                     $image_length=$form_data->length;
                     $base_no= explode(',',$form_data->base_no);
                  
                    
                    
                       
                          $array=array();
                          $results= $this->Main_model->where_names($tablename,'id',$product_order_id);
                          foreach ($results as  $values) {
                                    
                                   
                                    
                                     $array['color_side']= $values->color_side; 
                                     $array['uom_image']= $values->uom_image; 
                                     $input_values=explode('|', $values->input_values);

                                     $array['input_values']= count($input_values); 

                                     $array['input_values_array']= $input_values;

                                     
                                     
                                    
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
                     
                  
                 	
                 
                     $array=array();
                     
                     
                     
                    
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
	
	
		public function fetchiornproducts_base_product()
	{
                     
                    
                     $array = array();
                     $result = $this->Main_model->where_names('product_list', 'categories_id', '3');
                     foreach ($result as $value) {
                        $array[] = trim($value->id.'-'.$value->product_name);
                     }
                     echo json_encode($array);

	}
	
	
	public function findimages()
	{
                     
                     
                     $form_data = json_decode(file_get_contents("php://input"));
                     $array=array();
                     $array1=array();

                     
                     $product_id=$form_data->product_id;
                     
                 	 $result= $this->Main_model->where_names_order_by('product_images','product_id',$product_id,'id','DESC');
                 	 foreach ($result as  $value) {
                       
                        
                    
                     if($value->deleteid==0)
                     {
                              
                              $valuseset="";
                              $layout_plan = $this->Main_model->where_names_order_by('layout_plan','id',$value->image_layout_plan,'id','ASC');
                              foreach($layout_plan as $vv)
                              {
                                 $valuseset=$vv->name;
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


                              if($value->sort_id==1)
                              {

	                              	$array1[] = array(
	    
	                     	 		'id' => $value->id, 
	                     	 		'image_layout_plan' => $value->image_layout_plan,
	                     	 		'valuseset' => $valuseset,
	                     	 		'length' => $value->length,
	                     	 		'view_base' => $value->view_base,
	                     	 		'lengthlab'=>$length,
	                     	 		'product_image' => base_url().$value->product_image,
	                     	 		'res' => ''
	    
	                     	    	);

                              }
                              else
                              {
	                              	$array[] = array(
	    
	                     	 		'id' => $value->id, 
	                     	 		'image_layout_plan' => $value->image_layout_plan,
	                     	 		'valuseset' => $valuseset,
	                     	 		'length' => $value->length,
	                     	 		'view_base' => $value->view_base,
	                     	 		'lengthlab'=>$length,
	                     	 		'product_image' => base_url().$value->product_image,
	                     	 		'res' => ''
	    
	                     	    	);
                              }
                 	 
                     	    	
                 	 	
                 	 	
                 	 	
                      }



                 	 }
                 	 
                 	 if(count($array1)>0)
                 	 {   

                 	 	 $tot=array_merge($array1,$array);
                 	     echo json_encode($tot);
                 	     
                 	 }
                 	 else
                 	 {
                 	      
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
                         
                         
                      $output['purchase_name']= $value->purchase_name;
                      $output['specification']= $value->specification;
                      
                      $output['purchase_price']= $value->purchase_price;
                      $output['average_price']= $value->average_price;
                      
                    
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
                      $output['production_stock']= $value->production_stock;
                      $output['min_order_stock']= $value->min_order_stock;
                      $output['stock']= round($value->stock);
                      $output['optimal_stock']= $value->optimal_stock;
                                      
                      $output['selling_average_price']= $value->selling_average_price;      
                                      
                      $profile_and_loss=$value->average_price-$value->selling_average_price;
                      $profile_and_loss = str_replace('-','', $profile_and_loss);
                      $output['profile_and_loss']= $profile_and_loss;
                      
                      
                      
                      
                                      
                                      
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
                          $view_base=$_GET['view_base'];
                      

                         $path = 'uploads/' .time(). $_FILES['file']['name'][$i]; 
                         if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $path))  
                         {  

                            

                            $this->db->query("INSERT INTO product_images  (`product_id`,`product_image`,`image_layout_plan`,`length`,`view_base`)VALUES('".$ticket_id."','".$path."','".$layout_plan."','".$lengthval."','".$view_base."')");

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
